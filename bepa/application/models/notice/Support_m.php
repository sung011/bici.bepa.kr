<?php

class Support_m extends CI_Model
{
    private $any_order = '';
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
     * 회의실 리스트
     **************/
    public function Roomtimelist()
    {			
			extract($this->param_data);
			$mode = (isset($mode)) ? $mode : 'ALL';   #검색어
			$sch_day = (isset($sch_day)) ? $sch_day : '';
			$sch_room = (isset($sch_room)) ? $sch_room : '';   
			$sch_time1 = (isset($sch_time1)) ? $sch_time1 :'';   
			$sch_time2 = (isset($sch_time2)) ? $sch_time2 : '';   
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			if($sch_room ){
			$this->master->where("rm_ix", $sch_room);
			}
			if(($sch_time1=='1') && ($sch_time2=='2')){
				$this->master->where("(rmt_time='09:00' or rmt_time='13:00')" );
			}else{
				if($sch_time1=='1'){
					$this->master->where("rmt_time", '09:00');
				}
				if($sch_time2=='2'){
					$this->master->where("rmt_time", '13:00');
				}
			}
			$this->master->from("g5_wzb3_room_time");	
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function RoomSave()
    {
			
			extract($this->param_data);
			
			$mode = (isset($mode)) ? $mode : NULL; 
			$cp_code = (isset($cp_code)) ? $cp_code : NULL; 
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$bk_carnum = (isset($bk_carnum)) ? $bk_carnum : NULL; 
			$bk_deposit_name = (isset($bk_deposit_name)) ? $bk_deposit_name : "";
			$_SESSION['mb_id'] = (isset($_SESSION['mb_id'])) ? $_SESSION['mb_id'] : ""; 
					
			$wr_ip = $_SERVER["REMOTE_ADDR"];
			$nowDate = date("Y-m-d H:i:s");
			$bkrDate = date("Y-m-d");
			$bk_carkind ="";
			if(is_array($bk_carkind_c)){
				$carkind_cnt = count($bk_carkind_c);

				if($carkind_cnt > 0){
					for($j=0;$j<$carkind_cnt;$j++){		
						if($j> 0){
							$bk_carkind .= ",".$bk_carkind_c[$j];
						}else{
							$bk_carkind .= $bk_carkind_c[$j];
						}
					}
				}
			}
	
			$this->master->select("MAX(bk_ix) +1 as next_ix");
			$this->master->from('g5_wzb3_booking');
			$rs = $this->master->get();
			$rows = $rs->result_array();
			$next_ix = $rows[0]['next_ix'];
			if($next_ix){
			}else{
				$next_ix = 1;
			}
			$rms_day = explode('-',$sch_day);
			$rms_year = $rms_day[0];
			$rms_month = $rms_day[1];
			$rms_day = $rms_day[2];

			$rm_cnt = count($rm_ix);
			$bk_subject ="";
			for($i=0;$i<$rm_cnt;$i++){

				$this->master->select("MAX(bkr_ix) +1 as next_bkr");
				$this->master->from('g5_wzb3_booking_room');
				$rs = $this->master->get();
				$rows = $rs->result_array();
				$next_bkr = $rows[0]['next_bkr'];
				if($next_bkr){
				}else{
					$next_bkr = 1;
				}

				if($rm_ix[$i]=='1'){
					$bk_subject ="대회의실";
					
				}
				if($rm_ix[$i]=='2'){
					$bk_subject ="소회의실";
				}

				$add_Date2 = array(
					"cp_ix" => 1,
					"bkr_ix" => $next_bkr,
					"bk_ix" => $next_ix,
					"rm_ix" => $rm_ix[$i],
					"bkr_subject" => $bk_subject,		
					"bkr_price" => $rm_price[$i],
					"bkr_date" => $sch_day,
					"bkr_time" => $rm_time[$i],
					"bkr_cnt" => 1					
				);
				$this->master->insert('g5_wzb3_booking_room', $add_Date2);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}

				$this->master->select("MAX(rms_ix) +1 as next_rms");
				$this->master->from('g5_wzb3_room_status');
				$rs = $this->master->get();
				$rows = $rs->result_array();
				$next_rms = $rows[0]['next_rms'];
				if($next_rms){
				}else{
					$next_rms = 1;
				}

				$add_Date3 = array(
					"cp_ix" => 1,
					"rms_ix" => $next_rms,				
					"rm_ix" => $rm_ix[$i],
					"bk_ix" => $next_ix,
					"rms_year" => $rms_year,		
					"rms_month" => $rms_month,
					"rms_day" => $rms_day,
					"rms_date" => $sch_day,
					"rms_time" => $rm_time[$i],
					"rms_status" =>'대기',
					"rms_loop_year" => 0,
					"rms_cnt" => 1,
				);
				$this->master->insert('g5_wzb3_room_status', $add_Date3);

			}
			if($rm_cnt =='2'){$bk_subject .=" 외1건";}

				//echo $wr_num;
				//exit;			
				$add_Date = array(
					"cp_ix" => 1,
					"bk_ix" => $next_ix,
					"od_id" => $od_id,
					"mb_id" => $_SESSION['mb_id'],		
					"bk_name" => $bk_name,
					"bk_subject" => $bk_subject,
					"bk_hp" => $bk_hp,
					"bk_email" => $bk_email,
					"bk_memo" => $bk_memo,
					"bk_payment" => $bk_payment,
					"bk_deposit_name" => $bk_deposit_name,
					"bk_bank_account" =>  $bk_bank_account,
					"bk_price" => $reserv_price,
					"bk_reserv_price" => $reserv_price,
					"bk_receipt_price" => 0,
					"bk_pg_price" => 0,
					"bk_pg_cancel" => 0,
					"bk_misu" => $reserv_price,
					"bk_receipt_time" => '0000-00-00 00:00:00',
					"bk_mobile" => 0,
					"bk_time" => $nowDate,
					"bk_ip" => $wr_ip,
					"bk_status" => '대기',
					"bk_ho" => $bk_ho,
					"bk_carkind" => $bk_carkind,
					"bk_carnum" => $bk_carnum,
					"bk_rname" => $bk_rname,
					"bk_log" => '',
					"bk_pg" => '',
					"bk_tno" => '',
					"bk_app_no" => '',
					"bk_cancel_time" => '0000-00-00 00:00:00',
					"bk_cancel_ip" => '',
					"bk_cancel_pos" => ''
				);

				$this->master->insert('g5_wzb3_booking', $add_Date);
				//echo $this->master->last_query();
				//exit;
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}		
				return $result_array;			
    }

	public function Roomstatuslist()
    {			
			extract($this->param_data);
			$rms_year = (isset($rms_year)) ? $rms_year : ''; 
			$rm_ix = (isset($rm_ix)) ? $rm_ix : '';   
			$rms_month = (isset($rms_month)) ? $rms_month : '';
			if($rms_month){
			$rms_month =  sprintf('%02d',$rms_month);
			}
			$rms_day = (isset($rms_day)) ? $rms_day : '';   
			if($rms_day){
			$rms_day =  sprintf('%02d',$rms_day);
			}
			$bk_ix = (isset($bk_ix)) ? $bk_ix : '';   
		
			if($rms_year){
			$this->master->where("rms_year", $rms_year);
			}
			if($rms_month){
			$this->master->where("rms_month", $rms_month);
			}
			if($rms_day){
			$this->master->where("rms_day", $rms_day);
			}
			if($rm_ix ){
			$this->master->where("rm_ix", $rm_ix);
			}
			if($bk_ix ){
			$this->master->where("bk_ix", $bk_ix);
			}
			$this->master->order_by("rms_day", 'asc');
			$this->master->from("g5_wzb3_room_status");	
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function RoomCloselist()
    {			
			extract($this->param_data);
			$rms_year = (isset($rms_year)) ? $rms_year : ''; 
			$rm_ix = (isset($rm_ix)) ? $rm_ix : '';   
			$rms_month = (isset($rms_month)) ? $rms_month : '';
			if($rms_month){
			$rms_month =  sprintf('%02d',$rms_month);
			}
			$rms_day = (isset($rms_day)) ? $rms_day : '';   
			if($rms_day){
			$rms_day =  sprintf('%02d',$rms_day);
			}
			
		
			if($rms_year){
			$this->master->where("rmc_year", $rms_year);
			}
			if($rms_month){
			$this->master->where("rmc_month", $rms_month);
			}
			if($rms_day){
			$this->master->where("rmc_day", $rms_day);
			}
			if($rm_ix ){
			$this->master->where("rm_ix", $rm_ix);
			}
		
			$this->master->from("g5_wzb3_room_close");	
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function RoomCloselist2()
    {			
			extract($this->param_data);
			$rms_year = (isset($rms_year)) ? $rms_year : ''; 
			$rm_ix = (isset($rm_ix)) ? $rm_ix : '';   
			$rms_month = (isset($rms_month)) ? $rms_month : '';
			if($rms_month){
			$rms_month =  sprintf('%02d',$rms_month);
			}
			$where ="";
			$where2 ="";
			$rms_day = (isset($rms_day)) ? $rms_day : '';   

			if($rms_day){
			$rms_day =  sprintf('%02d',$rms_day);
			 $where = " and rms_day='".$rms_day."'";
			 $where2 = " and rmc_day='".$rms_day."'";
			}
			
		
			$sql="
				SELECT 
					HE.rm_ix
					,HE.rms_year
					,HE.rms_month
					,HE.rms_day
					,HE.rms_date
					,HE.rms_time
				FROM
					(
					SELECT rm_ix,rms_year,rms_month,rms_day,rms_date,rms_time
					FROM g5_wzb3_room_status
					WHERE rms_year = '".$rms_year."'
					AND rms_month = '".$rms_month."'
					AND rm_ix = '".$rm_ix."'
					$where
					UNION all

					SELECT rm_ix,rmc_year,rmc_month,rmc_day,rmc_date,'24' as rms_time
					FROM g5_wzb3_room_close
					WHERE rmc_year = '".$rms_year."'
					AND rmc_month = '".$rms_month."'
					AND rm_ix = '".$rm_ix."'
					$where2
					) HE
				ORDER BY rms_date asc
			";
	
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function RoomConfirm()
    {			
			extract($this->param_data);
			$user_nm = (isset($user_nm)) ? $user_nm : ''; 
			$user_hp = (isset($user_hp)) ? $user_hp : '';   
			$user_no = (isset($user_no)) ? $user_no : '';
			$user_hp = str_replace('-','',$user_hp);
			$od_id = (isset($od_id)) ? $od_id : '';
			$mb_id = (isset($mb_id)) ? $mb_id : '';
			if($od_id){
				$od_id = base64_decode($od_id);
			}
			if($user_nm){
				$this->master->where("bk_rname", $user_nm);
			}
			if($user_hp){
				$this->master->where("replace(bk_hp,'-','')", $user_hp);
			}
			if($od_id){
				$this->master->where("od_id", $od_id);
			}
			/*
			if($user_no){
				$this->master->where("od_id", $user_no);
			}
			*/
			if($mb_id){
				$this->master->where("mb_id", $mb_id);
			}
			
			$this->master->from("g5_wzb3_booking");	
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function Roombooking()
    {			
			extract($this->param_data);
			$rm_ix = (isset($rm_ix)) ? $rm_ix : '';   
			$bk_ix = (isset($bk_ix)) ? $bk_ix : '';     
			if($bk_ix ){
			$this->master->where("bk_ix", $bk_ix);
			}
			if($rm_ix ){
			$this->master->where("rm_ix", $rm_ix);
			}

			$this->master->from("g5_wzb3_booking_room");	
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

}