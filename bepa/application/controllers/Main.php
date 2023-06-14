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
class Main extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('LoginCheck_m');
		$this->load->model('/notice/List_m');
		$this->load->model('/notice/Photo_m');
		$this->load->model('/admin/InAdmData_m');
		$this->load->model('Log_visit_m');
        $this->load->model('/notice/Yard_m');
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
    public function index01_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();

		$VisitData = $this->LoginCheck_m->VisitIn();
		//공지
		$NoticeData = $this->List_m->MainNlist();
		$data['NoticeData'] = $NoticeData;

		//지원안내
		$SupportData = $this->List_m->Mainslist();
		$data['SupportData'] = $SupportData;
		//포토뉴스
		$PhotoData = $this->Photo_m->MainPlist();
		$data['PhotoData'] = $PhotoData;

		$BannerData = $this->InAdmData_m->Bannlist();
		$data['BannerData'] = $BannerData;

		$PopupData = $this->InAdmData_m->MainPopup();
		$data['PopupData'] = $PopupData;
		//print_r($data['PopupData']);
		//exit;
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('Main',$data);
    }

    public function index_get()
    {
        $this->log();
	
        $this->api_header_m->api_header_check();

        $VisitData = $this->LoginCheck_m->VisitIn();
        //공지
        $NoticeData = $this->List_m->MainNlist();
        $NoticeData1 = $this->List_m->MainNlist1();
        //입찰 공고
        $returnData = $this->Yard_m->YmTender();
        $returnData1 = $this->Yard_m->YmTender1();

        $data['returnData'] = $returnData;
        $data['returnData1'] = $returnData1;

        $data['NoticeData'] = $NoticeData;
        $data['NoticeData1'] = $NoticeData1;

        //지원안내
        $SupportData = $this->List_m->Mainslist();
        $data['SupportData'] = $SupportData;
        //포토뉴스
        $PhotoData = $this->Photo_m->MainPlist();
        $data['PhotoData'] = $PhotoData;

        $BannerData = $this->InAdmData_m->Bannlist();
        $data['BannerData'] = $BannerData;

        $PopupData = $this->InAdmData_m->MainPopup();
        $data['PopupData'] = $PopupData;
        //print_r($data['PopupData']);
        //exit;
        $data['pageTitle'] = '부산산업단지 지원시스템';
	
	$this->load->view('Main01',$data);
    }

	public function Search_get()
    {
        $this->log();

		$Searval = $this->get('Searval');
		
		$this->request->body = $this->get();
		$this->List_m->param_data = $this->get();
		$returnData = $this->List_m->MainsSearch();
		$data['boardlist']=$returnData;
		$data['pageTitle'] = '성남산업단지관리공단';
	
        $this->load->view('/Search',$data);	
    }
}