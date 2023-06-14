<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url','html'));
		$this->load->model('/notice/Read_m');
		$this->load->model('/notice/Support_m');
		$this->load->model('/admin/InAdmData_m');
		$this->load->model('/admin/Admain_m');
        $this->load->model('Log_visit_m');
    }

    public function log(){
        if($this->session->userdata('mb_id') != null){
            $log_date = $this->Log_visit_m->Log_dateGet();
            if(!$log_date){
                $this->Log_visit_m->Log_visitIn();
            }
        }
    }

    public function Csave()
    {   
        /*var_dump("aaa");
        var_dump(json_encode($_POST));
        var_dump(json_encode($_FILES['userfile']['name'][0]));
        exit();*/
		$_POST['bf_file_del'] = (isset($_POST['bf_file_del'])) ? $_POST['bf_file_del'] : NULL;
        $data_array = array(
			"wr_content" => $_POST['wr_content'],
			"wr_subject" => $_POST['wr_subject'],
			"wr_link1" => $_POST['wr_link1'],
			"wr_html" => $_POST['html'],
			"bo_table" => $_POST['bo_table'],
			"wr_id" => $_POST['wr_id'],
			"bf_file_del" => $_POST['bf_file_del'],
			"wr_option" => $_POST['wr_option'],
			"ca_name" => $_POST['ca_name'],
	    );
		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_upload=[];

			$file_cnt=0;
			for($i=0; $i<$cpt; $i++)
			{
				if($files['userfile']['name'][$i]){

					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];

					$this->upload->initialize($this->set_upload_options($_POST['bo_table']));
					$this->upload->do_upload();

					$data_upload[$i] = array('upload_data' => $this->upload->data());
					$file_cnt++;
				}
			}

		$data_array['file_cnt'] = $file_cnt;
		$data_array['upload'] = $data_upload;
		$this->Read_m->param_data = $data_array;
		$responseData = $this->Read_m->boardsave();

		$files_w = $this->Read_m->boardfiles($responseData['wr_id'],$_POST['bo_table']);

		$result_array[] = array(
			'success' => $responseData['success'],
			'wr_id' => $responseData['wr_id'],
			'files' => $files_w,
			'count' => count($files_w),
		);
		echo  json_encode($result_array);
    }

	public function Business()
    {
		$_POST['bf_file_del'] = (isset($_POST['bf_file_del'])) ? $_POST['bf_file_del'] : NULL;
        $data_array = array(
			"wr_id" => $_POST['wr_id'],
			"bo_table" => $_POST['bo_table'],
	    );

		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_upload=[];
		$file_cnt=0;
		for($i=0; $i<$cpt; $i++)
		{
			if($files['userfile']['name'][$i]){

				$_FILES['userfile']['name']= $files['userfile']['name'][$i];
				$_FILES['userfile']['type']= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']= $files['userfile']['size'][$i];

				$this->upload->initialize($this->set_upload_options($_POST['bo_table']));
				$this->upload->do_upload();

				$data_upload[$i] = array('upload_data' => $this->upload->data());
				$file_cnt++;
			}
		}
		$data_array['file_cnt'] = $file_cnt;
		$data_array['upload'] = $data_upload;
		$this->Read_m->param_data = $data_array;
		$responseData = $this->Read_m->boardsave();
		$result_array[] = array(
			'success' => $responseData['success'],
			'wr_id' => $responseData['wr_id']
		);

		echo  json_encode($result_array);
    }

	public function Nsave()
    {
        header("Content-Type:text/html;charset=utf-8");
		$_POST['bf_file_del'] = (isset($_POST['bf_file_del'])) ? $_POST['bf_file_del'] : NULL;
		$_POST['notice'] = (isset($_POST['notice'])) ? $_POST['notice'] : NULL;
        $data_array = array(
			"ca_name" => $_POST['ca_name'],
			"wr_html" => $_POST['html'],
			"bo_table" => $_POST['bo_table'],
			"wr_id" => $_POST['wr_id'],
			"wr_subject" => $_POST['wr_subject'],
			"wr_1" => $_POST['wr_1'],
			"wr_2" => $_POST['wr_2'],
			"wr_3" => $_POST['wr_3'],
			"wr_content" => $_POST['wr_content'],
			"wr_link1" => $_POST['wr_link1'],
			"bf_file_del" => $_POST['bf_file_del'],
			"notice" => $_POST['notice'],
			"wr_option" => $_POST['wr_option'],
	    );

        /*var_dump(json_encode($data_array, JSON_UNESCAPED_UNICODE));
        exit();*/

		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_upload=[];
		//print_r($_POST);
		//exit;
		$file_cnt=0;
		for($i=0; $i<$cpt; $i++)
		{
			if($files['userfile']['name'][$i]){

				$_FILES['userfile']['name']= $files['userfile']['name'][$i];
				$_FILES['userfile']['type']= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']= $files['userfile']['size'][$i];

				$this->upload->initialize($this->set_upload_options($_POST['bo_table']));
				$this->upload->do_upload();

				$data_upload[$i] = array('upload_data' => $this->upload->data());
				$file_cnt++;
			}
		}

		$data_array['file_cnt'] = $file_cnt;
		$data_array['upload'] = $data_upload;
		$this->Read_m->param_data = $data_array;
		$responseData = $this->Read_m->noticesave();
		$files_q = $this->Read_m->boardfile($responseData['wr_id']);
		//echo $responseData['success'];
		$result_array[] = array(
			'success' => $responseData['success'],
			'wr_id' => $responseData['wr_id'],
			'files' => $files_q,
			'count' => count($files_q),
		);
		//$responseData = json_encode($result_array, JSON_UNESCAPED_UNICODE);
		//echo $this->response($responseData, 200);
		echo  json_encode($result_array);
    }

	public function Asave()
    {
        $data_array = array(
			"co_content" => $_POST['co_content'],
			"co_subject" => $_POST['co_subject'],
			"co_id" => $_POST['co_id'],
	    );
		//print_r($data_array);
		//exit;
		$this->InAdmData_m->param_data = $data_array;
		$responseData = $this->InAdmData_m->GcontentSave();
		echo $responseData['success'];
    }

	public function BanSave()
    {
        $data_array = array(
			"wr_subject" => $_POST['wr_subject'],
			"wr_link1" => $_POST['wr_link1'],
			"wr_id" => $_POST['wr_id'],
	    );
		$_POST['bf_file_del'] = (isset($_POST['bf_file_del'])) ? $_POST['bf_file_del'] : "";
		$data_array['bf_file_del'] = $_POST['bf_file_del'];

		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_upload=[];

			$file_cnt=0;
			for($i=0; $i<$cpt; $i++)
			{
				if($files['userfile']['name'][$i]){

					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];

					$this->upload->initialize($this->set_upload_options2());
					$this->upload->do_upload();

					$data_upload[$i] = array('upload_data' => $this->upload->data());

					$file_cnt++;
				}
			}

			$data_array['file_cnt'] = $file_cnt;
			$data_array['upload'] = $data_upload;

		$this->InAdmData_m->param_data = $data_array;
		$responseData = $this->InAdmData_m->BannIn();
		echo $responseData['success'];
    }

	private function set_upload_options($subdir)
	{
		//upload an image options
		$upload_dir ="./data/file/".$subdir;
		//echo $upload_dir;
		//exit;
		if(!is_dir($upload_dir)){
			 mkdir($upload_dir);
		}
		$config = array();
		$config['upload_path'] = $upload_dir;
		$config['allowed_types'] = 'gif|jpg|png|hwp|pdf|xlsx|xlx|mp4|ppt|doc|docx|txt|zip|xls';
		$config['encrypt_name'] = TRUE;
		return $config;
	}

	private function set_upload_options2()
	{

		$config = array();
		$config['upload_path'] = './data/file/main_banner/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['encrypt_name'] = TRUE;
		//$config['max_width']        = 170;
		//$config['max_height']       = 60;
		return $config;
	}

	public function PopupSave()
    {

		$_POST['nw_id'] = (isset($_POST['nw_id'])) ? $_POST['nw_id'] : "";
        $data_array = array(
			"nw_id" => $_POST['nw_id'],
			"nw_division" => $_POST['nw_division'],
			"nw_device" => $_POST['nw_device'],
			"nw_begin_time" => $_POST['nw_begin_time'],
			"nw_end_time" => $_POST['nw_end_time'],
			"nw_disable_hours" => $_POST['nw_disable_hours'],
			"nw_subject" => $_POST['nw_subject'],
			"nw_content" => $_POST['nw_content'],
	    );


		$this->Admain_m->param_data = $data_array;
		$responseData = $this->Admain_m->PopupIn();
		echo $responseData['success'];
    }

	public function CustomSave()
    {

		$_POST['mb_no'] = (isset($_POST['mb_no'])) ? $_POST['mb_no'] : "";
		$_POST['mb_nick'] = (isset($_POST['mb_nick'])) ? $_POST['mb_nick'] : "";
		$_POST['mb_level'] = (isset($_POST['mb_level'])) ? $_POST['mb_level'] : "";
		$_POST['mb_homepage'] = (isset($_POST['mb_homepage'])) ? $_POST['mb_homepage'] : "";
		$_POST['mb_zip1'] = (isset($_POST['mb_zip1'])) ? $_POST['mb_zip1'] : "";
		$_POST['mb_addr1'] = (isset($_POST['mb_addr1'])) ? $_POST['mb_addr1'] : "";
		$_POST['mb_addr2'] = (isset($_POST['mb_addr2'])) ? $_POST['mb_addr2'] : "";
		$_POST['mb_memo'] = (isset($_POST['mb_memo'])) ? $_POST['mb_memo'] : "";
		$_POST['mb_leave_date'] = (isset($_POST['mb_leave_date'])) ? $_POST['mb_leave_date'] : "";
		$_POST['mb_intercept_date'] = (isset($_POST['mb_intercept_date'])) ? $_POST['mb_intercept_date'] : "";
		$_POST['mb_mailling'] = (isset($_POST['mb_mailling'])) ? $_POST['mb_mailling'] : "0";
		$_POST['mb_open'] = (isset($_POST['mb_open'])) ? $_POST['mb_open'] : "0";
		$_POST['mb_profile'] = (isset($_POST['mb_profile'])) ? $_POST['mb_profile'] : "";
		$_POST['uid'] = (isset($_POST['uid'])) ? $_POST['uid'] : "";
		$_POST['mb_company'] = (isset($_POST['mb_company'])) ? $_POST['mb_company'] : "";

        $data_array = array(
			"mb_no" => $_POST['mb_no'],
			"mb_id" => $_POST['mb_email'],
			"mb_password" => $_POST['mb_password'],
			"mb_name" => $_POST['mb_name'],
			"mb_nick" => $_POST['mb_nick'],
			"mb_level" => $_POST['mb_level'],
			"mb_email" => $_POST['mb_email'],
			"mb_homepage" => $_POST['mb_homepage'],
			"mb_hp" => $_POST['mb_hp'],
			"mb_tel" => $_POST['mb_tel'],
			"mb_zip1" => $_POST['mb_zip1'],
			"mb_addr1" => $_POST['mb_addr1'],
			"mb_addr2" => $_POST['mb_addr2'],
			"mb_mailling" => $_POST['mb_mailling'],
			"mb_open" => $_POST['mb_open'],
			"mb_profile" => $_POST['mb_profile'],
			"mb_memo" => $_POST['mb_memo'],
			"mb_leave_date" => $_POST['mb_leave_date'],
			"mb_intercept_date" => $_POST['mb_intercept_date'],
			"uid" => $_POST['uid'],
			"mb_company" => $_POST['mb_company']
	    );
		$this->InAdmData_m->param_data = $data_array;
        $responseData = $this->InAdmData_m->CustomIn();
		echo $responseData['success'];
    }

	public function Resave()
    {
		//print_r($_POST);
		//exit;
		$_POST['bf_file_del'] = (isset($_POST['bf_file_del'])) ? $_POST['bf_file_del'] : '';
		$_POST['notice'] = (isset($_POST['notice'])) ? $_POST['notice'] : '';
		$_POST['ca_name'] = (isset($_POST['ca_name'])) ? $_POST['ca_name'] : '';
		$_POST['wr_1'] = (isset($_POST['wr_1'])) ? $_POST['wr_1'] : '';
		$_POST['wr_2'] = (isset($_POST['wr_2'])) ? $_POST['wr_2'] : '';
		$_POST['wr_3'] = (isset($_POST['wr_3'])) ? $_POST['wr_3'] : '';
        $data_array = array(
			"ca_name" => $_POST['ca_name'],
			"wr_html" => $_POST['html'],
			"wr_content" => $_POST['wr_content'],
			"wr_subject" => $_POST['wr_subject'],
			"wr_link1" => $_POST['wr_link1'],
			"wr_1" => $_POST['wr_1'],
			"wr_2" => $_POST['wr_2'],
			"wr_3" => $_POST['wr_3'],
			"bo_table" => $_POST['bo_table'],
			"wr_id" => $_POST['wr_id'],
			"bf_file_del" => $_POST['bf_file_del'],
			"answer_reply" => $_POST['answer_reply'],
			"notice" => $_POST['notice'],
	    );

		$this->load->library('upload');
		$files = $_FILES;
		$cpt = count($_FILES['userfile']['name']);
		$data_upload=[];

			$file_cnt=0;
			for($i=0; $i<$cpt; $i++)
			{
				if($files['userfile']['name'][$i]){

					$_FILES['userfile']['name']= $files['userfile']['name'][$i];
					$_FILES['userfile']['type']= $files['userfile']['type'][$i];
					$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
					$_FILES['userfile']['error']= $files['userfile']['error'][$i];
					$_FILES['userfile']['size']= $files['userfile']['size'][$i];

					$this->upload->initialize($this->set_upload_options($_POST['bo_table']));
					$this->upload->do_upload();

					$data_upload[$i] = array('upload_data' => $this->upload->data());
					$file_cnt++;
				}
			}

		$data_array['file_cnt'] = $file_cnt;
		$data_array['upload'] = $data_upload;
		$this->Read_m->param_data = $data_array;
		$responseData = $this->Read_m->boardreply();
		$result_array[] = array(
			'success' => $responseData['success'],
			'wr_id' => $responseData['wr_id']
		);

		echo  json_encode($result_array);
		//echo $responseData['success'];
    }

	public function Meetingsave()
    {

		//exit;
		$_POST['mode'] = (isset($_POST['mode'])) ? $_POST['mode'] : "";
		$_POST['cp_code'] = (isset($_POST['cp_code'])) ? $_POST['cp_code'] : "";
		$_POST['bk_carkind_c'] = (isset($_POST['bk_carkind_c'])) ? $_POST['bk_carkind_c'] : "";
        $data_array = array(
			"mode" => $_POST['mode'],
			"sch_day" => $_POST['sch_day'],
			"bo_table" => $_POST['bo_table'],
			"od_id" => $_POST['od_id'],
			"cp_code" => $_POST['cp_code'],
			"rm_ix" => $_POST['rm_ix'],
			"rm_time" => $_POST['rm_time'],
			"rm_price" => $_POST['rm_price'],
			"rm_cnt" => $_POST['rm_cnt'],
			"bk_name" => $_POST['bk_name'],
			"bk_rname" => $_POST['bk_rname'],
			"bk_hp" => $_POST['bk_hp'],
			"bk_carnum" => $_POST['bk_carnum'],
			"bk_ho" => $_POST['bk_ho'],
			"bk_carkind_c" => $_POST['bk_carkind_c'],
			"bk_carkind" => $_POST['bk_carkind'],
			"bk_email" => $_POST['bk_email'],
			"bk_memo" => $_POST['bk_memo'],
			"reserv_price" => $_POST['reserv_price'],
			"org_bk_price" => $_POST['org_bk_price'],
			"bk_payment" => $_POST['bk_payment'],
			"bk_bank_account" => $_POST['bk_bank_account'],
			"bk_deposit_name" => $_POST['bk_deposit_name'],
	    );
		$this->Support_m->param_data = $data_array;
		$responseData = $this->Support_m->RoomSave();
		if($responseData['success']=='E200'){
				$rm_cnt = count($_POST['rm_ix']);
				$rever_time ="";
				$mail_time ="";
				for($i=0;$i<$rm_cnt;$i++){
					if($_POST['rm_ix'][$i] =='1'){
						$rm_room ="대회의실";
					}else{
						$rm_room ="소회의실";
					}
					$rever_time .= $_POST['rm_time'][$i]." &nbsp; ";
					if($_POST['rm_time'][$i]=='09:00'){
						$mail_time .=" 오전 (09시~13시)";
					}
					if($_POST['rm_time'][$i]=='13:00'){
						$mail_time .=" 오후 (13시~17시)";
					}
				}
				$bk_carkind ="";
				if(is_array($_POST['bk_carkind_c'])){
					$carkind_cnt = count($_POST['bk_carkind_c']);

					if($carkind_cnt > 0){
						for($j=0;$j<$carkind_cnt;$j++){
							if($j> 0){
								$bk_carkind .= ",".$_POST['bk_carkind_c'][$j];
							}else{
								$bk_carkind .= $_POST['bk_carkind_c'][$j];
							}
						}
					}
				}

				$nowWday = date("Y-m-d");
				$nowDate = date("Y-m-d H:i:s");
				$week = array("일" , "월"  , "화" , "수" , "목" , "금" ,"토") ;
				$weekday = $week[date('w'  , strtotime($nowWday)  ) ] ;
				$weekday2 = $week[date('w'  , strtotime($_POST['sch_day'])  ) ] ;
			    $to = "tax8200122@naver.com";
			    $to2 = $_POST['bk_email'];
				$subject = $_POST['bk_name']."님의 예약 신청 정보 입니다.";
				$contents ='<div style="margin: 30px auto; width: 700px;">
								<div style="border-radius: 7px; border: 1px solid rgb(205, 205, 205); border-image: none;">
									<h1 style="background: rgb(247, 247, 247); margin: 0px 0px 20px; padding: 15px 30px 10px; color: rgb(85, 85, 85); font-size: 1.4em;">
										&nbsp;
									</h1>

									<p style="padding: 10px 10px 40px; text-align: center; font-size: 1.2em;">
										'.$_POST['bk_name'].'님의 예약 신청 정보 입니다.        </p>

									<div style="margin: 0px auto 16px; border: 0px currentColor; border-image: none; width: 94%; border-collapse: collapse;">
										<strong>예약번호 '.$_POST['od_id'].'</strong><br>
										본 메일은 '.$nowDate .' ('.$weekday.')을 기준으로 작성되었습니다.
									</div>
									
									<div style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 예약자정보</div>

									<table style="margin: 0px auto 20px; padding: 0px; width: 94%;" cellspacing="0" cellpadding="0"> 
									<colgroup><col width="140"><col></colgroup>
									<tbody><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											회사명
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$_POST['bk_name'].'						
										</td></tr><tr><td height="1" style="background: rgb(66, 66, 64);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											담당자
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$_POST['bk_rname'].'				
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											연락처
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$_POST['bk_hp'].'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											이메일주소
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$_POST['bk_email'].'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr><tr><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											기타사항
										</td><td style="padding: 5px; font-family: dotum,; font-size: 12px;">
											'.$_POST['bk_memo'].'
										</td></tr><tr><td height="1" style="background: rgb(213, 213, 213);" colspan="2"></td></tr></tbody>
									</table>
									
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 예약정보</p>
									
									<table style="margin: 0px auto 20px; padding: 0px; width: 94%; clear: both; border-collapse: collapse; border-spacing: 0;" cellspacing="0" cellpadding="0"> 
										<colgroup><col width="140"><col><col width="140"><col></colgroup>
										<tbody><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="4"></td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												행사명
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$_POST['bk_carnum'].'			
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												참가인원
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$_POST['bk_ho'].'명			
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
												'.$rm_room.'				
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												이용일자/예약시간
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">
												'.$_POST['sch_day'].'('.$weekday2.') / '.$mail_time.'                </td><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												예약건
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">
												'.$rm_cnt.'건
											</td></tr><tr><td style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">
												합계
											</td><td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;" colspan="3">
												'.$_POST['reserv_price'].' 원  (VAT포함)
											</td></tr></tbody>
										</table>

										
											
											<div style="height: 10px;"></div>
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 결제정보</p>
									<table style="margin: 0px auto 20px; padding: 0px; width: 94%; clear: both; border-collapse: collapse; border-spacing: 0;" cellspacing="0" cellpadding="0"> 
										<colgroup><col width="33%"><col width="33%"><col width="34%"></colgroup>
										<thead><tr><td height="2" style="background: rgb(66, 66, 64);" colspan="3"></td></tr><tr><th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">예약금</th>
										<th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">잔금</th><th colspan="1" rowspan="1" scope="col" style="padding: 7px 0px; border: 1px solid rgb(213, 213, 213); border-image: none; text-align: center; color: rgb(102, 102, 102); vertical-align: middle;">총이용금액</th></tr></thead>
										<tbody><tr>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">'.$_POST['reserv_price'].' 원 (VAT 포함, 미결제)</td>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;">0 원 (미결제)</td>
										<td style="padding: 7px; border: 1px solid rgb(213, 213, 213); border-image: none; color: rgb(76, 76, 76); vertical-align: middle;"><strong>'.$_POST['reserv_price'].' 원 (VAT 포함, 미결제)</strong></td></tr></tbody>
									</table>
											
									<div style="height: 10px;"></div>

											<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; font-weight: bold; border-collapse: collapse;">■ 환불규정</p>
									<div style="margin: 0px auto 20px; border: 1px solid rgb(223, 223, 223); border-image: none; width: 94%;">
										<div style="padding: 15px;">
										<p>- 사용일 기준 7일 전까지만 환불요청이 가능 합니다.</p>
										</div>
									</div>
									
											<div style="margin: 0px auto 20px; border: 1px solid rgb(223, 223, 223); border-image: none; width: 94%;">
										<div style="padding: 15px;">
										예약 신청 후, 5일 안에 100% 입금이 완료되어야 예약이 확정됩니다.<br>
										예약접수에 감사드립니다.
										</div>
									</div>
									
									<p style="margin: 0px auto 7px; border: 0px currentColor; border-image: none; width: 94%; border-collapse: collapse;"> 본 메일은 발신전용 메일입니다. 문의가 있으시면 고객센터로 문의주세요.</p>
									<a style="background: rgb(34, 76, 163); padding: 30px 0px; text-align: center; color: rgb(255, 255, 255); font-weight: bold; text-decoration: none; display: block;" href="http://www.snic.or.kr" target="_blank" rel="noreferrer noopener">예약상세내역 확인</a>

								</div>
							</div>';


				//$contents = $_POST['bk_name']."님께서<br>".$_POST['sch_day']." ".$rever_time." 시로<br> ".$rm_room." 예약을 하셨습니다.<br>관리자페이지에서 확인해주세요.";
				$headers = "Content-Type: text/html; charset=utf-8\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "From:  info@snic.or.kr \r\n";

				$result = mail($to, $subject, $contents, $headers);
				$result2 = mail($to2, $subject, $contents, $headers);
				if($result){
				}else{
				}
		}
		echo $responseData['success'];
    }

	public function Email_confirm()
    {
		 $characters  = "0123456789";
		$characters .= "abcdefghijklmnopqrstuvwxyz";
		$characters .= "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
		$characters .= "_";

		$string_generated = "";

		$nmr_loops = 8;
		while ($nmr_loops--)
		{
			$string_generated .= $characters[mt_rand(0, strlen($characters) - 1)];
		}

		$data_array = array(
			"Snic_email" => trim($_POST['Snic_email']),
			"Snic_pwd" => $string_generated,
	    );
		//print_r($data_array);
		//exit;
		$this->InAdmData_m->param_data = $data_array;
		$responseData = $this->InAdmData_m->Emailconfirm();
		if(count($responseData) > 0){
				$to = trim($_POST['Snic_email']);
				$subject = $responseData[0]['mb_name']."님 안녕하세요. 부산산업단지관리공단에서 알려드립니다. ";
				$contents = "<p>".$responseData[0]['mb_name']."님 </p>";
				$contents .= "<p>회원님의 아이디는 [".$responseData[0]['mb_id']."]  </p>";
				$contents .= "<p>패스워드 [".$string_generated."] 입니다. </p>";
				$headers = "Content-Type: text/html; charset=utf-8\r\n";
				$headers .= "MIME-Version: 1.0\r\n";
				$headers .= "From:  info@snic.or.kr \r\n";

				$result = mail($to, $subject, $contents, $headers);
				if($result){
					echo "E200";
				}else{
				}
		}else{
			echo "E500";
		}

	}
}


