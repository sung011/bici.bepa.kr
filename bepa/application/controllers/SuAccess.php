<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
;
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class SuAccess extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('/admin/Access_m');
		$this->load->model('/admin/Meeting_m');
		$this->load->model('/admin/Board_m');
		$this->load->model('/notice/Support_m');
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

    /*******************
     * 관리자 페이지 view
     *******************/
	public function MeetingSearch_post()
    {
		$this->api_header_m->api_admin_header_check();
		$nowpage = $this->post('nowpage');
		$searkeyword = $this->post('searkeyword');
		$searkey = $this->post('searkey');
		$sch_room = $this->post('sch_room');
		$sch_status = $this->post('sch_status');
		$start_date = $this->post('start_date');
		$end_date = $this->post('end_date');

		if ($nowpage > 0) {
			if ($nowpage == '1'){ 
				$nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}
		$present_day = date("Y-m-d");
		//$diff_now = new DateTime($present_day);
	
		$this->request->body = $this->post();
		$this->Meeting_m->param_data = $this->post();

		$returnData = $this->Meeting_m->MeetingList();
		$Totalcnt = $this->Meeting_m->MeetingCnt();
		
		if($Totalcnt[0]['cnt'] > 0){
			$j=0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				if($val['rm_ix']=='1'){
					$val['rm_ix'] ="대회의실";
				}else{
					$val['rm_ix'] ="소회의실";
				}
				if($val['rms_time']=='09:00'){
					$val['rms_time'] ="오전 1건";
				}else if($val['rms_time']=='13:00'){
					$val['rms_time'] ="오후 1건";
				}
				$week = array("일" , "월"  , "화" , "수" , "목" , "금" ,"토") ;
				$val['weekday'] = $week[ date('w'  , strtotime($val['rms_date'])  ) ] ;
	
				$diff_day  = (strtotime($present_day) - strtotime($val['bk_time'])) / 86400;
				$diff_day = round($diff_day,0);

				$date_array[] = array(
					'bk_ix' => $val['bk_ix'],
					'od_id' => $val['od_id'],
					'encrypt_od_id' => base64_encode($val['od_id']),
					'bk_name' => $val['bk_name'],
					'bk_subject' => $val['bk_subject'],
					'bk_hp' => $val['bk_hp'],
					'bk_email' => $val['bk_email'],
					'bk_payment' => $val['bk_payment'],
					'bk_price' => number_format($val['bk_price'],0),					
					'rm_ix' => $val['rm_ix'],
					'rms_status' => $val['rms_status'],
					'rms_date' => $val['rms_date'],
					'rms_year' => $val['rms_year'],
					'rms_month' => $val['rms_month'],
					'rms_day' => $val['rms_day'],
					'weekday' => $val['weekday'],
					'rms_time' => $val['rms_time'],
					'bk_misu' => $val['bk_misu'],
					'diff_day' => $diff_day ,
					'Totalcnt' => $Totalcnt[0]['cnt']
				);
				$j++;
			}
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
    }

	public function MeetingDel_post()
    {

		$bk_ix = $this->post('bk_ix');

		$this->Meeting_m->param_data = $this->post();
		$returnData = $this->Meeting_m->MeetingDel();

		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }

	public function MeetingStatus_post()
    {

		$bk_ix = $this->post('bk_ix');
		$bk_status = $this->post('bk_status');

		$this->Meeting_m->param_data = $this->post();
		$returnData = $this->Meeting_m->MeetingStatus();

		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }

	public function MeetingDetail_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$od_id = $this->get('od_id');
		$data['od_id'] = base64_decode($od_id);

		$this->Support_m->param_data = $this->get();
		$returnData = $this->Support_m->RoomConfirm();
		$data['user_data'] = $returnData[0];

		$data_array = array(
			"bk_ix" => $returnData[0]['bk_ix'],
		);
		$this->Support_m->param_data = $data_array;
		$statusData = $this->Support_m->Roombooking();
		$data['room_data'] = $statusData;

		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '회의실 설정';
		$data['Title2'] = '회의실 상세페이지';
		$this->load->view('/Admin/MeetingDetail',$data);	
    }

	public function Meetingupdate_post()
    {
		$this->api_header_m->api_admin_header_check();
		$od_id = $this->post('od_id');
		//$data['od_id'] = base64_decode($od_id);

		$this->Meeting_m->param_data = $this->post();
		$returnData = $this->Meeting_m->MeetingUpdate();
		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}	
    }

	public function AccessList_post()
    {
		$this->load->helper('date');
		$this->api_header_m->api_admin_header_check();	
		$nowpage = $this->post('nowpage');
		$begin_date = $this->post('begin_date');
		$end_date = $this->post('end_date');

		if ($nowpage > 0) {
			if ($nowpage == '1'){ 
				$nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}


		$this->request->body = $this->post();
		$this->Access_m->param_data = $this->post();

		$returnData = $this->Access_m->AccessList();
		$Totalcnt = $this->Access_m->AccessCount();
		if($Totalcnt[0]['cnt'] > 0){ 
			$j=0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$browser="";
				$os = "";
				if($val['vi_agent'] !=''){
					$userAgent = $val['vi_agent']; 
					if(preg_match('/MSIE/i',$userAgent) && !preg_match('/Opera/i',$userAgent)){
						$browser = 'Internet Explorer';
					}
					else if(preg_match('/Firefox/i',$userAgent)){
						$browser = 'Mozilla Firefox';
					}
					else if (preg_match('/Chrome/i',$userAgent)){
						$browser = 'Google Chrome';
					}
					else if(preg_match('/Safari/i',$userAgent)){
						$browser = 'Apple Safari';
					}
					elseif(preg_match('/Opera/i',$userAgent)){
						$browser = 'Opera';
					}
					elseif(preg_match('/Netscape/i',$userAgent)){
						$browser = 'Netscape';
					}
					else{
						$browser = 'Other';
					}

					if (preg_match('/linux/i', $userAgent)){ 
						$os = 'linux';}
					elseif(preg_match('/macintosh|mac os x/i', $userAgent)){
						$os = 'mac';}
					elseif (preg_match('/windows|win32/i', $userAgent)){
						$os = 'windows';}
					else {
						$os = 'Other';
					}
				}

				$date_array[] = array(
					'vi_id' => $val['vi_id'],
					'vi_ip' => $val['vi_ip'],
					'vi_date' => $val['vi_date'],
					'vi_time' => $val['vi_time'],
					'vi_referer' => $val['vi_referer'],
					'vi_agent' => $val['vi_agent'],
					'os' => $os,
					'browser' => $browser,
					'Totalcnt' => $Totalcnt[0]['cnt']
				);
				$j++;
			}
			echo json_encode($date_array);
		}else{
			$date_array="E500";
			echo json_encode($date_array);
		}
    }

	public function BoardSearch_post()
    {
		$this->api_header_m->api_admin_header_check();
		$nowpage = $this->post('nowpage');
		$searkeyword = $this->post('searkeyword');
		$gr_id = $this->post('gr_id');
		$reply = $this->post('reply');

		if ($nowpage > 0) {
			if ($nowpage == '1'){ 
				$nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}
	
		$this->request->body = $this->post();
		$this->Board_m->param_data = $this->post();

		$returnData = $this->Board_m->BoardList();
		$Totalcnt = $this->Board_m->BoardCount();
		
		if($Totalcnt[0]['cnt'] > 0){
			$j=0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$btable = explode('_',$val['bo_table']);

				$date_array[] = array(
					'wgu' => $val['wgu'],
					'bo_table' => $val['bo_table'],
					'btable' => $btable[1],
					'bo_subject' => $val['bo_subject'],
					'gr_id' => $val['gr_id'],
					'wr_id' => $val['wr_id'],
					'wr_subject' => $val['wr_subject'],
					'wr_name' => $val['wr_name'],
					'wr_datetime' => $val['wr_datetime'],
					'Totalcnt' => $Totalcnt[0]['cnt']
				);
				$j++;
			}
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
    }
	public function BoardDel_post()
    {
		$wval = $this->post('wval');
		
		$this->request->body = $this->post();
		$this->Board_m->param_data = $this->post();
		$returnData = $this->Board_m->boardel();
		echo $this->response($returnData['success'], 200);
    }

	public function AcDomain_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessDomain();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '브라우저';
		$data['firstd'] = '접속도메인';
		$data['sel_page'] = 'AcDomain';
		$this->load->view('/Admin/Accesspage',$data);	
    }

	public function AcBrowser_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessBrowser();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '브라우저';
		$data['firstd'] = '브라우저';
		$data['sel_page'] = 'AcBrowser';
		$this->load->view('/Admin/Accesspage',$data);	
    }

	public function AcOs_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessOs();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '운영체제';
		$data['firstd'] = '운영체제';
		$data['sel_page'] = 'AcOs';
		$this->load->view('/Admin/Accesspage',$data);	
    }

	public function AcTime_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessTime();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '시간대별';
		$data['firstd'] = '시간대별';
		$data['sel_page'] = 'AcTime';
		$this->load->view('/Admin/Accesspage2',$data);	
    }

	public function AcWeek_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessWEEKDAY();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '요일별';
		$data['firstd'] = '요일별';
		$data['sel_page'] = 'AcWeek';
		$this->load->view('/Admin/Accesspage2',$data);	
    }

	public function AcDay_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessDay();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '일별';
		$data['firstd'] = '일별';
		$data['sel_page'] = 'AcDay';
		$this->load->view('/Admin/Accesspage2',$data);	
    }

	public function AcMonth_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessMonth();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '월별';
		$data['firstd'] = '월별';
		$data['sel_page'] = 'AcMonth';
		$this->load->view('/Admin/Accesspage2',$data);	
    }

	public function AcYear_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessYear();
		$Total_cnt =0;
		foreach($returnData as $key => $val){
			$Total_cnt += $val['cnt'];
		}
		$data['Total_cnt'] = $Total_cnt;
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '년도별';
		$data['firstd'] = '년도별';
		$data['sel_page'] = 'AcYear';
		$this->load->view('/Admin/Accesspage2',$data);	
    }

	public function AcBrowser_post()
    {
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessBrowser();
		$Total_cnt =0;
		$table['cols'] = array(
		 array('label' => 'symptom', 'type' => 'string'),
		 array('label' => 'Percentage', 'type' => 'number')
		);
	
		foreach($returnData as $key => $val){		
			$temp = array();				
			$temp[] = array('v' => (string) $val['vi_name']); 
			$temp[] = array('v' => (int) $val['cnt']);
			$rows[] = array('c' => $temp);
		}
		$table['rows'] = $rows;
		echo json_encode($table);		
    }

	public function AcUser_post()
    {
		$this->api_header_m->api_admin_header_check();
		$returnData = $this->Access_m->AccessUser();
		$Total_cnt =0;
		$table['cols'] = array(
			array('label' => 'symptom', 'type' => 'string'),
			array('label' => '시간', 'type' => 'number')
		);
		foreach($returnData as $key => $val){		
			$temp = array();				
			$temp[] = array('v' => (string) $val['vi_date']); 
			$temp[] = array('v' => (int) $val['cnt']);
			$rows[] = array('c' => $temp);
		}
		$table['rows'] = $rows;
		echo json_encode($table);		
    }

}