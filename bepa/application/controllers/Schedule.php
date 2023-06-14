<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Schedule extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->load->library('session');
        $this->load->helper(array('form', 'url','html'));
		$this->load->model('/admin/Meeting_m');
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

	public function Meeting()
    {
        $this->log();
		$_GET['sch_room'] = (isset($_GET['sch_room'])) ? $_GET['sch_room'] : ''; 
		$_GET['sch_startdate'] = (isset($_GET['sch_startdate'])) ? $_GET['sch_startdate'] : '';
		$_GET['sch_enddate'] = (isset($_GET['sch_enddate'])) ? $_GET['sch_enddate'] : '';
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '회의실 예약시스템';
		$data['sch_room'] = $_GET['sch_room'];
		$data['start_date'] = $_GET['sch_startdate'];
		$data['end_date'] = $_GET['sch_enddate'];
		$this->load->view('/Admin/Meeting',$data);	
    }
    
	public function Meeting2()
    {
		//$print_r($_POST);
        $this->log();
		$_POST['mm'] = (isset($_POST['mm'])) ? $_POST['mm'] : ''; 
		$_POST['yy'] = (isset($_POST['yy'])) ? $_POST['yy'] : '';
		$_POST['rm_ix'] = (isset($_POST['rm_ix'])) ? $_POST['rm_ix'] : '1';
		$data['mm'] = $_POST['mm'];
		$data['yy'] = $_POST['yy'];
		$data['rm_ix'] = $_POST['rm_ix'];
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '회의실 예약현황';
		
		$this->load->view('/Admin/MeetCalendar',$data);	
    }

	public function Meeting3()
    {
		//$print_r($_POST);
        $this->log();
		$_POST['mm'] = (isset($_POST['mm'])) ? $_POST['mm'] : ''; 
		$_POST['yy'] = (isset($_POST['yy'])) ? $_POST['yy'] : '';

		$data['mm'] = $_POST['mm'];
		$data['yy'] = $_POST['yy'];

		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '회의실 이용상태관리';
		
		$this->load->view('/Admin/MeetCalendar2',$data);	
    }

	public function Meeting4()
    {
		//$print_r($_POST);
        $this->log();
		$_POST['mm'] = (isset($_POST['mm'])) ? $_POST['mm'] : ''; 
		$_POST['yy'] = (isset($_POST['yy'])) ? $_POST['yy'] : '';

		$data['mm'] = $_POST['mm'];
		$data['yy'] = $_POST['yy'];

		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '회의실 공휴일관리';
		
		$this->load->view('/Admin/MeetCalendar3',$data);	
    }

	public function Meeting5()
    {
        $this->log();
		$_POST['start_date'] = (isset($_POST['start_date'])) ? $_POST['start_date'] : ''; 
		$_POST['end_date'] = (isset($_POST['end_date'])) ? $_POST['end_date'] : '';
		$this->Meeting_m->param_data = $_POST;
		$returnData = $this->Meeting_m->MeetingPayment();
		/*
		foreach($returnData as $key => $val){			
			$data['T_receipt_price'] = $val['T_receipt_price'];
			$data['cnt'] = $val['cnt'];
			$data['bk_payment'] = $val['bk_payment'];
		}
		*/
		$data['start_date'] = $_POST['start_date'];
		$data['end_date'] = $_POST['end_date'];
		$data['reponseData'] = $returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '회의실 결제통계정보';
		
		$this->load->view('/Admin/MeetingPayment',$data);	
    }

	public function MeetingClose()
    {
		//$print_r($_POST);	
		$_POST['rm_ix'] = (isset($_POST['rm_ix'])) ? $_POST['rm_ix'] : ''; 
		$_POST['rmc_year'] = (isset($_POST['rmc_year'])) ? $_POST['rmc_year'] : '';
		$_POST['rmc_month'] = (isset($_POST['rmc_month'])) ? $_POST['rmc_month'] : '';
		$_POST['rmc_day'] = (isset($_POST['rmc_day'])) ? $_POST['rmc_day'] : '';
		$_POST['rmc_gu'] = (isset($_POST['rmc_gu'])) ? $_POST['rmc_gu'] : '';

		$data_array = array(
			"rm_ix" => $_POST['rm_ix'],
			"rmc_year" => $_POST['rmc_year'],
			"rmc_month" => $_POST['rmc_month'],
			"rmc_day" => $_POST['rmc_day'],
			"rmc_gu" => $_POST['rmc_gu']	
	    );
		$this->Meeting_m->param_data = $data_array;
		$responseData = $this->Meeting_m->MeetingClose();


		echo json_encode($responseData['success']);		
    }

	public function MeetingHoly()
    {
		//$print_r($_POST);	
		$_POST['hd_year'] = (isset($_POST['hd_year'])) ? $_POST['hd_year'] : '';
		$_POST['hd_month'] = (isset($_POST['hd_month'])) ? $_POST['hd_month'] : '';
		$_POST['hd_day'] = (isset($_POST['hd_day'])) ? $_POST['hd_day'] : '';
		$_POST['hd_gu'] = (isset($_POST['hd_gu'])) ? $_POST['hd_gu'] : '';

		$data_array = array(
			"hd_year" => $_POST['hd_year'],
			"hd_month" => $_POST['hd_month'],
			"hd_day" => $_POST['hd_day'],
			"hd_gu" => $_POST['hd_gu']	
	    );
		$this->Meeting_m->param_data = $data_array;
		$responseData = $this->Meeting_m->MeetingHosave();


		echo json_encode($responseData['success']);		
    }


}


