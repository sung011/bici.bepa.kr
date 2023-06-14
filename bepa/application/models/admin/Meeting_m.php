<?php

class Meeting_m extends CI_Model
{
    private $master = '';
	private $db_error = [];
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $page = 0;
    public $param_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('master', true);
    }

    /**************
     * 매장 설정 조회
     **************/
    public function MeetingList()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0; 
			$searkey = (isset($searkey)) ? $searkey : ''; 
			$searkeyword = (isset($searkeyword)) ? $searkeyword : '';   
			$sch_room = (isset($sch_room)) ? $sch_room : '';
			$sch_status = (isset($sch_status)) ? $sch_status : '';
			$end_date = (isset($end_date)) ? $end_date : '';
			$start_date = (isset($start_date)) ? $start_date : '';

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			//echo $sch_status;
			//exit;
			$this->master->select("b.bk_ix, b.od_id, b.bk_name, b.bk_subject, b.bk_hp, b.bk_email, b.bk_payment, b.bk_deposit_name, b.bk_receipt_price, b.bk_misu, b.bk_price, b.bk_time, r.rms_date, r.rm_ix, r.rms_time, r.rms_status, r.rms_month, r.rms_day, r.rms_year");
			if($searkeyword){
				$this->master->like($searkey, $searkeyword);
			}
			//if($sch_room){
			//	$this->master->where("replace(bk_hp,'-','')", $user_hp);
			//}
			if($sch_room){
				$this->master->where("r.rm_ix", $sch_room);
			}
			if($sch_status){
				$this->master->where("b.bk_status", $sch_status);
			}
			if($start_date){
				$beforeDay = date("Y-m-d", strtotime($start_date." -1 day"));

				$this->master->where(" r.rms_date > '".$beforeDay." 23:59:59'   " );
			}
			if($end_date){
				$this->master->where(" r.rms_date < '".$end_date." 23:59:59'  " );
			}
			$this->master->order_by("b.bk_ix", 'desc');
			$this->master->from("g5_wzb3_booking as b");
			$this->master->join("g5_wzb3_room_status AS r", "b.bk_ix=r.bk_ix", 'LEFT');
		
			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function MeetingCnt()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;
			$searkey = (isset($searkey)) ? $searkey : ''; 
			$searkeyword = (isset($searkeyword)) ? $searkeyword : '';   
			$sch_room = (isset($sch_room)) ? $sch_room : '';
			$sch_status = (isset($sch_status)) ? $sch_status : '';
			$start_date = (isset($start_date)) ? $start_date : '';
			$end_date = (isset($end_date)) ? $end_date : '';

			
		
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(b.bk_ix) as cnt");	
			if($searkeyword){
				$this->master->like($searkey, $searkeyword);
			}
			if($sch_room){
				$this->master->where("r.rm_ix", $sch_room);
			}
			if($sch_status){
				$this->master->where("b.bk_status", $sch_status);
			}
			if($start_date){
				$beforeDay = date("Y-m-d", strtotime($start_date." -1 day"));
				$this->master->where(" r.rms_date > '".$beforeDay." 23:59:59'  " );
			}
			if($end_date){
				$this->master->where(" r.rms_date < '".$end_date." 23:59:59'  " );
			}
			$this->master->order_by("b.bk_ix", 'desc');
			$this->master->from("g5_wzb3_booking as b");
			$this->master->join("g5_wzb3_room_status AS r", "b.bk_ix=r.bk_ix", 'LEFT');
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function MeetingDel()
    {		
			extract($this->param_data);
			$bk_ix = (isset($bk_ix)) ? $bk_ix : NULL;     
		
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
	
			$this->master->where(" bk_ix in (".$bk_ix.") ");
			$this->master->delete("g5_wzb3_booking");

			$this->master->where(" bk_ix in (".$bk_ix.") ");
			$this->master->delete("g5_wzb3_room_status");

			$this->master->where(" bk_ix in (".$bk_ix.") ");
			$this->master->delete("g5_wzb3_booking_room");
			//echo $this->master->last_query();
			//exit;
			 if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
				$this->db_error = $this->master->error();
			 }
			require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

			return $result_array;
    }

	public function MeetingStatus()
    {		
			extract($this->param_data);
			$bk_ix = (isset($bk_ix)) ? $bk_ix : NULL;
			$bk_status = (isset($bk_status)) ? $bk_status : '';    
			$this->master->where("b.bk_ix", $bk_ix);
			$this->master->from("g5_wzb3_booking as b");	
			$rs = $this->master->get();
			
			foreach ($rs->result() as $rows){
				$bk_ix = $rows->bk_ix;
				$od_id = $rows->od_id;
				$bk_name = $rows->bk_name;
				$bk_subject = $rows->bk_subject;
				$bk_hp = $rows->bk_hp;
				$bk_email = $rows->bk_email;
				$bk_memo = $rows->bk_memo;
				$bk_payment = $rows->bk_payment;
				$bk_deposit_name = $rows->bk_deposit_name;
				$bk_price = $rows->bk_price;
				$bk_reserv_price = $rows->bk_reserv_price;
				$bk_receipt_price = $rows->bk_receipt_price;
				$bk_misu = $rows->bk_misu;				
				$bk_receipt_time = $rows->bk_receipt_time;
				$bk_time = $rows->bk_time;
				$bk_ho = $rows->bk_ho;
				$bk_carkind = $rows->bk_carkind;
				$bk_carnum = $rows->bk_carnum;
				$bk_rname = $rows->bk_rname;
				$bk_carkind = $rows->bk_carkind;
				$bk_carkind = $rows->bk_carkind;
			}
			
			$mail_time ="";
			$this->master->where("bk_ix", $bk_ix);
			$this->master->from("g5_wzb3_room_status");	
			$rs = $this->master->get();

			foreach ($rs->result() as $row)
			{
				$rms_ix = $row->rms_ix;
				$rmsbk_ix = $row->bk_ix;
				$rms_year = $row->rms_year;
				$rms_month = $row->rms_month;
				$rms_day = $row->rms_day;
				$rms_date = $row->rms_date;
				$rms_time = $row->rms_time;
				$rms_status = $row->rms_status;
				if($rms_time=='09:00'){
					$mail_time .=" 오전 (09시~13시)";
				}
				if($rms_time=='13:00'){
					$mail_time .=" 오후 (13시~17시)";
				}

			}	


			$nowWday = date("Y-m-d");
			$nowDate = date("Y-m-d H:i:s");
			$week = array("일" , "월"  , "화" , "수" , "목" , "금" ,"토") ;
			$weekday = $week[date('w'  , strtotime($nowWday)  ) ] ;
			$weekday2 = $week[date('w'  , strtotime($rms_date)  ) ] ;
				
				$to = "tax8200122@naver.com";
			    $to2 = $bk_email;
				$subject = $bk_name."님의 예약 취소 정보 입니다.";
				$contents ='<div style="margin: 30px auto; width: 700px;">
								<div style="border-radius: 7px; border: 1px solid rgb(205, 205, 205); border-image: none;">
									<h1 style="background: rgb(247, 247, 247); margin: 0px 0px 20px; padding: 15px 30px 10px; color: rgb(85, 85, 85); font-size: 1.4em;">
										&nbsp;
									</h1>

									<p style="padding: 10px 10px 40px; text-align: center; font-size: 1.2em;">
										'.$bk_name.'님의 예약 취소 정보 입니다.        </p>

									<div style="margin: 0px auto 16px; border: 0px currentColor; border-image: none; width: 94%; border-collapse: collapse;">
										<strong>예약번호 '.$od_id.'</strong><br>
										본 메일은 '.$nowDate .' ('.$weekday.')을 기준으로 작성되었습니다.
									</div>
									
									<div style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 예약자정보</div>

									<table style="margin: 0px auto 20px; padding: 0px; width: 94%;" cellspacing="0" cellpadding="0"> 
									<colgroup><col width="140"><col></colgroup>
									<tbody><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											회사명
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$bk_name.'						
										</td></tr><tr><td height="1" style="background: rgb(66, 66, 64);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											담당자
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$bk_rname.'				
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											연락처
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$bk_hp.'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											이메일주소
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$bk_email.'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											기타사항
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$bk_memo.'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr></tbody>
									</table>
									
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 예약정보</p>
									
									<table style="margin: 0px auto 20px; padding: 0px; width: 94%; clear: both; border-collapse: collapse; border-spacing: 0;" cellspacing="0" cellpadding="0"> 
										<colgroup><col width="140"><col><col width="140"><col></colgroup>
										<tbody><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="4"></td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												행사명
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$bk_carnum.'			
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												참가인원
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$bk_ho.'명			
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												시설신청
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$bk_carkind.'				
											</td></tr></tbody>
										</table>
									

									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 이용서비스정보</p>

									
										<table style="margin: 0px auto 20px; padding: 0px; width: 94%; clear: both; border-collapse: collapse; border-spacing: 0;" cellspacing="0" cellpadding="0"> 
										<colgroup><col width="140"><col><col width="140"><col></colgroup>
										<tbody><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="4"></td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												회의실
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$bk_subject.'				
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												이용일자/예약시간
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">
												'.$rms_month.'/'.$rms_day.' ('.$weekday2.') / '.$mail_time.'                </td><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												예약건
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">
												1 건
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												합계
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$bk_reserv_price.' 원  (VAT포함)
											</td></tr></tbody>
										</table>

										
											
											<div style="height: 10px;"></div>
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 결제정보</p>
									<table style="margin: 0px auto 20px; padding: 0px; width: 94%; clear: both; border-collapse: collapse; border-spacing: 0;" cellspacing="0" cellpadding="0"> 
										<colgroup><col width="33%"><col width="33%"><col width="34%"></colgroup>
										<thead><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="3"></td></tr><tr><th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">예약금</th>
										<th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">잔금</th><th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">총이용금액</th></tr></thead>
										<tbody><tr>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">'.$bk_reserv_price.' 원 (VAT 포함, 미결제)</td>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">'.$bk_receipt_price.' 원 (미결제)</td>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;"><strong>'.$bk_reserv_price.' 원 (VAT 포함, 미결제)</strong></td></tr></tbody>
									</table>
											
									<div style="height: 10px;"></div>

											<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 환불규정</p>
									<div style="margin: 0px auto 20px; border: 1px solid rgb(223, 223, 223); border-image: none; width: 94%;">
										<div style="padding: 15px;">
										<p>- 사용일 기준 7일 전까지만 환불요청이 가능 합니다.</p>
										</div>
									</div>
																													
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; border-collapse: collapse;"> 본 메일은 발신전용 메일입니다. 문의가 있으시면 고객센터로 문의주세요.</p>
									<a style="background: rgb(34, 76, 163); padding: 30px 0px; text-align: center; color: rgb(255, 255, 255); font-weight: bold; text-decoration: none; display: block;" href="http://www.snic.or.kr" target="_blank" rel="noreferrer noopener">예약상세내역 확인</a>

								</div>
							</div>';
				
				$headers = "Content-Type: text/html; charset=utf-8\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "From:  info@snic.or.kr \r\n";

				$result = mail($to, $subject, $contents, $headers);
				$result2 = mail($to2, $subject, $contents, $headers);
			
		
			if($bk_status=='1'){
				$status ="완료";
			}else if($bk_status=='2'){
				$status ="대기";
			}else if($bk_status=='3'){
				$status ="취소";
			}
			
			$query_data = array(
                  "bk_status" => $status
            );
	 
			$this->master->where(" bk_ix in (".$bk_ix.") ");
			$this->master->update("g5_wzb3_booking", $query_data);

			$query_data = array(
                  "rms_status" => $status
            );
			$this->master->where(" bk_ix in (".$bk_ix.") ");
			$this->master->update("g5_wzb3_room_status", $query_data);

			///echo $this->master->last_query();
			//exit;
			if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
				$this->db_error = $this->master->error();
			}
			
			require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

			return $result_array;
    }

	public function MeetingUpdate()
    {		
			extract($this->param_data);
			$todaya = date("Y-m-d");
			$bk_ix = (isset($bk_ix)) ? $bk_ix : NULL;
			$od_id = (isset($od_id)) ? $od_id : '';
			$bk_status = (isset($bk_status)) ? $bk_status : '';
			$bk_receipt_price = (isset($bk_receipt_price)) ? $bk_receipt_price : '0';
			$bk_receipt_price = str_replace(',','',$bk_receipt_price);
			if($bk_receipt_price =='')$bk_receipt_price=0;
			$bk_misu = (isset($bk_misu)) ? $bk_misu : '0';
			$bk_misu = str_replace(',','',$bk_misu);
			if($bk_misu =='')$bk_misu=0;
			$bk_receipt_time = (isset($bk_receipt_time)) ? $bk_receipt_time : $todaya;
			if($bk_receipt_time =='')$bk_receipt_time='0000-00-00';

			$bk_name = (isset($bk_name)) ? $bk_name : ''; 
			$bk_rname = (isset($bk_rname)) ? $bk_rname : ''; 
			$bk_hp = (isset($bk_hp)) ? $bk_hp : ''; 
			$bk_email = (isset($bk_email)) ? $bk_email : ''; 
			$bk_memo = (isset($bk_memo)) ? $bk_memo : ''; 

					
			if($od_id){
				$query_data = array(
					"bk_name" => $bk_name,
					"bk_rname" => $bk_rname,
					"bk_hp" => $bk_hp,
					"bk_email" => $bk_email,
					"bk_memo" => $bk_memo,
				); 
				$this->master->where(" od_id = '".$od_id."' ");
				$this->master->update("g5_wzb3_booking", $query_data);
			}else{
				$query_data = array(
					"bk_status" => $bk_status,
					"bk_receipt_price" => $bk_receipt_price,
					"bk_misu" => $bk_misu,
					"bk_receipt_time" => $bk_receipt_time
				); 
				$this->master->where(" bk_ix = '".$bk_ix."' ");
				$this->master->update("g5_wzb3_booking", $query_data);
				//echo $this->master->last_query();
			//exit;
				$query_data = array(
                  "rms_status" => $bk_status
				);
				$this->master->where(" bk_ix = '".$bk_ix."'  ");
				$this->master->update("g5_wzb3_room_status", $query_data);
			
			}

			
			 if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
				$this->db_error = $this->master->error();
			 }
			require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

			return $result_array;
    }

	public function MeetingSchedule($yy,$mm,$dd,$rm_ix)
    {		
			extract($this->param_data);
			$mm = (isset($mm)) ? $mm : NULL;
			$dd = (isset($dd)) ? $dd : '';
			$yy = (isset($yy)) ? $yy : '';
			$rm_ix = (isset($rm_ix)) ? $rm_ix : '1';  
			
			$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
			$dd = str_pad($dd, 2, "0", STR_PAD_LEFT);

			$sch_date = $yy."-".$mm."-".$dd;

			$sql = "SELECT *
					FROM g5_wzb3_room_status
					WHERE rms_year='".$yy."' and rms_month='".$mm."' and rms_day='".$dd."'
					and rm_ix='".$rm_ix."'
					ORDER BY rms_ix
			";		
			$query  = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;

			$str ="";
			$cnt = count($query->result());
			if($cnt == 1){
				$str .="<br>";
				$str1="";
				$str2="";
				foreach ($query->result() as $row)
				{

					if($row->rms_time == "09:00"){
						$rms_day = "오전";
						$rms_day2 = "오후";
					}else{
						$rms_day = "오후";
						$rms_day2 = "오전";
					}				
					$str1 .= "<p style='color:blue;'><a href='/Schedule/Meeting?sch_room=$rm_ix&sch_startdate=$sch_date&sch_enddate=$sch_date' style='color:blue;'>- ".$rms_day." 예약</a></p>";
				}
				$str2 .= "<p><a href='/Schedule/Meeting?sch_room=$rm_ix&sch_startdate=$sch_date&sch_enddate=$sch_date'>".$rms_day2." (0/1)</a></p>";
				if($rms_day =="오전"){
					$str = $str1."".$str2;
				}else{
					$str = $str2."".$str1;
				}
			}else if($cnt == 2){
				$str .="<br>";
				foreach ($query->result() as $row)
				{

					if($row->rms_time == "09:00"){
						$rms_day = "오전";
					}else{
						$rms_day = "오후";
					}				
					$str .= "<p ><a href='/Schedule/Meeting?sch_room=$rm_ix&sch_startdate=$sch_date&sch_enddate=$sch_date' style='color:blue;'>- ".$rms_day." 예약</a></p>";
				}
			}else{
				$str .="<br><p ><a href='/Schedule/Meeting?sch_room=$rm_ix&sch_startdate=$sch_date&sch_enddate=$sch_date'>오전 (0/1)</a></p><p><a href='/Schedule/Meeting?sch_room=$rm_ix&sch_startdate=$sch_date&sch_enddate=$sch_date'>오후 (0/1)</a></p>";
			}
			return $str;
    }

	public function MeetingClist($yy,$mm,$dd)
    {		
			extract($this->param_data);
			$mm = (isset($mm)) ? $mm : NULL;
			$dd = (isset($dd)) ? $dd : '';
			$yy = (isset($yy)) ? $yy : '';
		
			$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
			$dd = str_pad($dd, 2, "0", STR_PAD_LEFT);

			$sch_date = $yy."-".$mm."-".$dd;

			$sql = "SELECT *
					FROM g5_wzb3_room_close
					WHERE rmc_year='".$yy."' and rmc_month='".$mm."' and rmc_day='".$dd."'		
					ORDER BY rmc_ix
			";		
			$query  = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;

			$str ="";
			$cnt = count($query->result());
			if($cnt > 0){
				foreach ($query->result() as $row)
				{
					$str .= $row->rm_ix;					
				}							
			}else{			
			}
			return $str;
    }


	public function MeetingClose()
    {		
			extract($this->param_data);
			$rm_ix = (isset($rm_ix)) ? $rm_ix : NULL;
			$rmc_year = (isset($rmc_year)) ? $rmc_year : '';
			$rmc_month = (isset($rmc_month)) ? $rmc_month : '';
			$rmc_day = (isset($rmc_day)) ? $rmc_day : '';
			$rmc_gu = (isset($rmc_gu)) ? $rmc_gu : '';
			$rmc_month = str_pad($rmc_month, 2, "0", STR_PAD_LEFT);
			$rmc_day = str_pad($rmc_day, 2, "0", STR_PAD_LEFT);
			$rmc_date = $rmc_year."-".$rmc_month."-".$rmc_day;

			if($rmc_gu =='1'){
				

				$this->master->select("MAX(rmc_ix) +1 as next_id");
				$this->master->from("g5_wzb3_room_close");
				$rs = $this->master->get();

				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];
				if($next_wrid){
				}else{
					$next_wrid = 1;
				}	
				
				$query_data = array(
					"cp_ix" => '1',
					"rmc_ix" => $next_wrid,
					"rm_ix" => $rm_ix,
					"rmc_year" => $rmc_year,
					"rmc_month" => $rmc_month,
					"rmc_day" => $rmc_day,
					"rmc_date" => $rmc_date
				);
				$this->master->insert("g5_wzb3_room_close", $query_data);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
			}
			if($rmc_gu =='2'){

				$this->master->where("rm_ix='".$rm_ix."' and rmc_year =".$rmc_year." and rmc_month =".$rmc_month." and rmc_day =".$rmc_day."  ");
				$this->master->delete("g5_wzb3_room_close");
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
			}
			//require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';
			return $result_array;
    }

	public function MeetingHoliday($yy,$mm,$dd)
    {		
			extract($this->param_data);
			$mm = (isset($mm)) ? $mm : '';
			$dd = (isset($dd)) ? $dd : '';
			$yy = (isset($yy)) ? $yy : '';	
			$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
			$dd = str_pad($dd, 2, "0", STR_PAD_LEFT);

			$sch_date = $yy."-".$mm."-".$dd;
			$sql = "SELECT *
					FROM g5_wzb3_holiday
					WHERE hd_year='".$yy."' and hd_month='".$mm."' and hd_day='".$dd."'	
			";		
			$query  = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$str ="";
			$cnt = count($query->result());
			if($cnt > 0){
				foreach ($query->result() as $row)
				{
					$str .= $row->hd_date;					
				}							
			}else{			
			}
			return $str;
			
    }

	public function MeetingHosave()
    {		
			extract($this->param_data);
			$hd_year = (isset($hd_year)) ? $hd_year : '';
			$hd_month = (isset($hd_month)) ? $hd_month : '';
			$hd_day = (isset($hd_day)) ? $hd_day : '';
			$hd_gu = (isset($hd_gu)) ? $hd_gu : '';
			$hd_month = str_pad($hd_month, 2, "0", STR_PAD_LEFT);
			$hd_day = str_pad($hd_day, 2, "0", STR_PAD_LEFT);
			$hd_date = $hd_year."-".$hd_month."-".$hd_day;

			if($hd_gu =='1'){
				

				$this->master->select("MAX(hd_ix) +1 as next_id");
				$this->master->from("g5_wzb3_holiday");
				$rs = $this->master->get();

				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];
				if($next_wrid){
				}else{
					$next_wrid = 1;
				}	
				
				$query_data = array(
					"cp_ix" => '1',
					"hd_ix" => $next_wrid,
					"hd_subject" => '',
					"hd_loop_year" => 0,
					"hd_year" => $hd_year,
					"hd_month" => $hd_month,
					"hd_day" => $hd_day,
					"hd_date" => $hd_date
				);
				$this->master->insert("g5_wzb3_holiday", $query_data);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
			}
			if($hd_gu =='2'){

				$this->master->where(" hd_year =".$hd_year." and hd_month =".$hd_month." and hd_day =".$hd_day."  ");
				$this->master->delete("g5_wzb3_holiday");
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
			}
			//require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';
			return $result_array;
			
    }

	public function MeetingPayment()
    {		
			extract($this->param_data);
			$start_date = (isset($start_date)) ? $start_date : '';
			$end_date = (isset($end_date)) ? $end_date : '';
			$where ="";
			if($start_date){
				$beforeDay = date("Y-m-d", strtotime($start_date." -1 day"));
				$where .=" and bk_time >'".$beforeDay." 23:59:59' ";
			}
			if($end_date){
				$where .=" and bk_time < '".$end_date." 23:59:59' ";
			}

			$sql = "SELECT 
						SUM(bk_receipt_price) as T_receipt_price, COUNT(bk_ix) as cnt  , bk_payment 
					FROM g5_wzb3_booking 
					WHERE bk_receipt_price > 0 AND bk_status='완료'
					$where 
					GROUP BY bk_payment;
			";		
			$query  = $this->master->query($sql);
			$rows = $query->result_array();
			return $rows;		
    }

	

}