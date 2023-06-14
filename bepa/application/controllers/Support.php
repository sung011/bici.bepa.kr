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
class Support extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('/notice/Support_m');
		$this->load->model('/notice/Yard_m');
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
     * 메인 view
     * anyorder_07.html
     *******************/
    public function prefer_get()
    {
        $this->log();
        $data['menu'] = 'comm';
		$this->api_header_m->api_header_check();
        /*$data['pageTitle'] = '성남산업단지관리공단';*/
        $this->load->view('/support/support_prefer',$data);
    }

	public function space_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_space',$data);
    }

	public function space2_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='cs_space02' ";
		$returnData = $this->Yard_m->BoardList();

		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'space02';	

        $this->load->view('/support/support_list',$data);
    }

	public function space3_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='cs_space03' ";
		$returnData = $this->Yard_m->BoardList();

		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'space03';	
        $this->load->view('/support/support_list',$data);
    }


	public function health_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_health',$data);
    }

	public function reservation_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_reservation',$data);
    }

	public function sreservate_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_reservation2',$data);
    }

	public function recancel_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		if($this->session->userdata('mb_id')){
			$data_array = array(
			"mb_id" => $this->session->userdata('mb_id'),
			);
			$this->Support_m->param_data = $data_array;
			$statusData = $this->Support_m->RoomConfirm();
			$data['room_data'] = $statusData;
			//print_r($data);
			//exit;
		}
		
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_reservation3',$data);
    }

	public function research_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$data['od_id'] = $this->get('od_id');
		$data['od_id'] = base64_decode($data['od_id']);
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
        $this->load->view('/support/support_reservation4',$data);
    }

	public function MeetingConfirm_post()
    {
		$this->api_header_m->api_header_check();
		$data['user_nm'] = $this->post('user_nm');
		$data['user_hp'] = $this->post('user_hp');
		$data['user_no'] = $this->post('user_no');
		$this->Support_m->param_data = $this->post();
		$returnData = $this->Support_m->RoomConfirm();

		if($returnData){
		foreach($returnData as $key => $val){			
				$date_array[] = array(
					'od_id' => base64_encode($val['od_id']),
					'mb_id' => base64_encode($val['mb_id']),
					'bk_name' => base64_encode($val['bk_name']),
					'bk_subject' => $val['bk_subject'],
					'bk_hp' => $val['bk_hp'],
				);			
		}
			$responseData = json_encode($date_array, JSON_UNESCAPED_UNICODE);
			//print_R($responseData);
			//exit;
			echo $this->response($responseData, 200);
		}else{
			$error_date ="E500";
			echo $error_date;
		}
    }

	public function reserwrite_post()
    {
		//print_r($_POST);
		//exit;
		$data['mode'] = $this->post('mode');
		$data['sch_day'] = $this->post('sch_day');
		$data['sch_day'] =  sprintf('%02d',$data['sch_day']);
		$data['sch_month'] = $this->post('sch_month');
		$data['sch_month'] =  sprintf('%02d',$data['sch_month']);
		$data['sch_year'] = $this->post('sch_year');
		$data['sch_room'] = $this->post('sch_room');
		$data['sch_time1'] = $this->post('sch_time1');
		$data['sch_time2'] = $this->post('sch_time2');

		$week = array("일" , "월"  , "화" , "수" , "목" , "금" ,"토") ;

		$now_day = $data['sch_year']."-".$data['sch_month']."-".$data['sch_day'];
		$data['now_day'] = $now_day;
		$data['weekday'] = $week[ date('w'  , strtotime($now_day)  ) ] ;
		$od_id1 = substr(date("Y"),2,2);
		$od_id2 = date("mdHis");
		$rand_num = sprintf('%03d',rand(100,999));
		$od_id = "1".$od_id1."".$od_id2."".$rand_num ;
		$data['od_id'] = $od_id;

		$this->Support_m->param_data = $this->post();
		$returnData = $this->Support_m->Roomtimelist();
		$data['sch_data'] = $returnData;
		/*
		foreach($returnData as $key => $val){			
			$data['rmt_ix'] = $val['rmt_ix'];
			$data['rm_ix'] = $val['rm_ix'];
			$data['rmt_time'] = $val['rmt_time'];
			$data['rmt_price'] = $val['rmt_price'];
		}
		*/
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_reserwrite',$data);
    }

	public function roomstatus_post()
    {
		//print_r($_POST);
		//exit;
		$data['rms_year'] = $this->post('rms_year');
		$data['rms_month'] = $this->post('rms_month');
		$data['rm_ix'] = $this->post('rm_ix');
		$data['rms_day'] = $this->post('rms_day');
		
		
		$this->Support_m->param_data = $this->post();
		$returnData = $this->Support_m->Roomstatuslist();
		if($returnData){
			foreach($returnData as $key => $val){			
					$date_array[] = array(
						'rms_year' => $val['rms_year'],
						'rms_month' => $val['rms_month'],
						'rms_day' => $val['rms_day'],
						'rms_date' => $val['rms_date'],
						'rms_time' => $val['rms_time'],
						'rms_status' => $val['rms_status'],
						'bk_ix' => $val['bk_ix'],
						'rm_ix' => $val['rm_ix']
					);			
			}
			echo json_encode($date_array);

		}else{
			$error_date ="E500";
			echo $error_date;
		}

    }

	public function roomclose_post()
    {
		//print_r($_POST);
		//exit;
		$data['rms_year'] = $this->post('rms_year');
		$data['rms_month'] = $this->post('rms_month');
		$data['rm_ix'] = $this->post('rm_ix');
		$data['rms_day'] = $this->post('rms_day');
		
		
		$this->Support_m->param_data = $this->post();
		//$returnData = $this->Support_m->RoomCloselist();
		$returnData = $this->Support_m->RoomCloselist2();
		if($returnData){
			foreach($returnData as $key => $val){			
					$date_array[] = array(
						'rm_ix' => $val['rm_ix'],
						'rms_year' => $val['rms_year'],
						'rms_month' => $val['rms_month'],
						'rms_day' => $val['rms_day'],
						'rms_date' => $val['rms_date'],
						'rms_time' => $val['rms_time']
					);			
			}

			echo json_encode($date_array);
		}else{
			$error_date ="E500";
			echo $error_date;
		}

    }

    public function reservationtemp_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/support/support_reservation_temp',$data);
    }

}