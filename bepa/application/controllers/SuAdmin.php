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
class SuAdmin extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('/admin/InAdmData_m');
		$this->load->model('/admin/Admain_m');
		$this->load->model('/admin/Meeting_m');
        $this->load->model('Log_visit_m');

		$this->load->model('/notice/List_m');
		$this->load->model('/notice/Read_m');
		$this->load->model('/notice/Yard_m');
		$this->load->model('Assocation_m');
        $this->load->model('/notice/Movein_m');
        $this->load->model('/notice/Management_m');
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
    public function Index_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = 'Dashboard';

		$data['BeforeData']="0";
		$data['TodayData']="0";

		$NowData = $this->Admain_m->Visitlist();
		$TodayData = $this->Admain_m->Visitlist2();
	
		$data['NowData'] = $NowData[0]['cnt'];
		if(isset($TodayData[0]['vs_count'])){
		$data['TodayData'] = $TodayData[0]['vs_count'];
		}
		if(isset($TodayData[1]['vs_count'])){
		$data['BeforeData'] = $TodayData[1]['vs_count'];
		}

		$VisitMax = $this->Admain_m->VisitMax();
		$VisitSum = $this->Admain_m->VisitSum();
		$data['VisitMax'] = $VisitMax[0]['vs_count'];
		$data['VisitSum'] = $VisitSum[0]['tcnt'];

		$NewMember = $this->Admain_m->NewMember();
		$SumMember = $this->Admain_m->SumMember();
		$data['NewMember'] = $NewMember[0]['mcnt'];
		$data['SumMember'] = $SumMember[0]['mcnt'];

		$BoardSum = $this->Admain_m->BoardSum();
		$data['BoardSum'] = $BoardSum;

		$NewMemberList = $this->Admain_m->NewMemberList();
		$data['NewMemberList']=$NewMemberList;

		$BoardList = $this->Admain_m->BoardList();
		$data['BoardList']=$BoardList;


		$this->load->view('/Admin/Main',$data);
    }

	

	public function Banner_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '메인배너관리';
		$this->load->view('/Admin/Banner',$data);	
    }
	public function Organization_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$this->InAdmData_m->add_sql = " co_id='ia_system_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '조직/기능';
		$this->load->view('/Admin/Organization',$data);	
    }
	public function Location_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$this->InAdmData_m->add_sql = " co_id='ic_about_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '개요/입지여건';
		$this->load->view('/Admin/Location',$data);	
    }
	public function Area_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$this->InAdmData_m->add_sql = " co_id='ic_area_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '조성면적';
		$this->load->view('/Admin/Area',$data);	
    }

	public function Status_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$this->InAdmData_m->add_sql = " co_id='ic_condi_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '일반현황';
		$this->load->view('/Admin/Status',$data);	
    }

	public function Map_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$this->InAdmData_m->add_sql = " co_id='ic_map_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}

		//$this->InAdmData_m->add_sql = " co_id='ic_map_e' ";
		$returnFile = $this->InAdmData_m->Mapfile();

		foreach($returnFile as $key2 => $val2){	
			$data['bo_table'][$key2] = $val2['bo_table'];
			$data['bf_source'][$key2] = $val2['bf_source'];
			$data['bf_file'][$key2] = $val2['bf_file'];
			$data['bf_download'][$key2] = $val2['bf_download'];
			$data['bf_filesize'][$key2] = round($val2['bf_filesize'] / 1024,1);
		}

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '공단지도';

		$this->load->view('/Admin/Map',$data);	
    }

	public function Bwrite_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();
		$wr_id = $this->get('wr_id');

		$data['wr_id']='';
		$data['wr_subject']='';
		$data['wr_link1']='';
		$data['wr_hit']='';
		$data['bf_source']='';
		$data['bf_file']='';

		if($wr_id){
			$this->InAdmData_m->add_sql = " B.wr_id='".$wr_id."' ";
			$this->InAdmData_m->param_data = $this->get();
			$returnData = $this->InAdmData_m->Bannlist();

			foreach($returnData as $key => $val){	
				$data['wr_id'] = $val['wr_id'];
				$data['wr_subject'] = $val['wr_subject'];
				$data['wr_link1'] = $val['wr_link1'];
				$data['wr_hit'] = $val['wr_hit'];
				$data['bf_source'] = $val['bf_source'];
				$data['bf_file'] = $val['bf_file'];
				$data['bf_filesize'] = round($val['bf_filesize']/1024,1);
			}
		}
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '설정통계';
		$data['Title2'] = '배너관리';
		$data['Title3'] = '배너등록';
		$data['return_url'] = '/index.php/SuAdmin/Banner';
		
		$this->load->view('/Admin/Bwrite',$data);	
    }

	public function PopupLayer_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		//$returnData = $this->InAdmData_m->Popuplayerlist();

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '환경설정';
		$data['Title2'] = '팝업레이어관리';
		$this->load->view('/Admin/Popup',$data);	
    }

	public function PopupForm_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$nw_id = $this->get('nw_id');

		$data['nw_id']='';
		$data['nw_division']='';
		$data['nw_device']='';
		$data['nw_begin_time']='';
		$data['nw_end_time']='';
		$data['nw_disable_hours']='';
		$data['nw_subject']='';
		$data['nw_content']='';

		if($nw_id){
			$this->Admain_m->add_sql = " nw_id='".$nw_id."' ";
			$this->Admain_m->param_data = $this->get();
			$returnData = $this->Admain_m->PopupSearch();

			foreach($returnData as $key => $val){	
				$data['nw_id'] = $val['nw_id'];
				$data['nw_division'] = $val['nw_division'];
				$data['nw_device'] = $val['nw_device'];
				$data['nw_begin_time'] = $val['nw_begin_time'];
				$data['nw_end_time'] = $val['nw_end_time'];
				$data['nw_disable_hours'] = $val['nw_disable_hours'];
				$data['nw_subject'] = $val['nw_subject'];
				$data['nw_content'] = $val['nw_content'];
			}
		}

		
		//$returnData = $this->InAdmData_m->Popuplayerlist();

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '환경설정';
		$data['Title2'] = '팝업등록';
		$this->load->view('/Admin/PopupForm',$data);	
    }

	public function LayerList_post()
    {
		$this->load->helper('date');
		$this->api_header_m->api_admin_header_check();	
		$nowpage = $this->post('nowpage');
		$p_subject = $this->post('p_subject');
		$p_device = $this->post('p_device');
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
		$this->InAdmData_m->add_sql =" nw_id is not null";
		if($p_subject){
			$this->InAdmData_m->add_sql .= " and nw_subject like '%".$p_subject."%' ";
		}
		if($p_device){
			$this->InAdmData_m->add_sql .= " and nw_device = '".$p_device."' ";
		}
		if($begin_date){
			$this->InAdmData_m->add_sql .= " and nw_begin_time < '".$begin_date."' ";
		}
		if($end_date){
			$this->InAdmData_m->add_sql .= " and nw_end_time > '".$end_date."' ";
		}

		$this->request->body = $this->post();
		$this->InAdmData_m->param_data = $this->post();

		$returnData = $this->InAdmData_m->Popuplayerlist();
		$Totalcnt = $this->InAdmData_m->PopuplayerCount();
		if($Totalcnt[0]['cnt'] > 0){ 
			$j=0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;

				$val['nw_begin_time'] =substr($val['nw_begin_time'],0,-3) ;
				$val['nw_end_time'] = substr($val['nw_end_time'],0,-3);
				if($val['nw_device']=="both"){
					$val['nw_device'] ="모두";
				}else if($val['nw_device']=="mobile"){
					$val['nw_device'] ="모바일";
				}else if($val['nw_device']=="pc"){
					$val['nw_device'] ="PC";
				}

				$date_array[] = array(
					'nw_id' => $val['nw_id'],
					'nw_division' => $val['nw_division'],
					'nw_device' => $val['nw_device'],
					'nw_begin_time' => $val['nw_begin_time'],
					'nw_end_time' => $val['nw_end_time'],
					'nw_disable_hours' => $val['nw_disable_hours'],
					'nw_left' => $val['nw_left'],
					'nw_top' => $val['nw_top'],
					'nw_height' => $val['nw_height'],
					'nw_width' => $val['nw_width'],
					'nw_subject' => $val['nw_subject'],
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

	public function CustomList_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();	
		
		//$returnData = $this->InAdmData_m->Popuplayerlist();
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '회원관리';
		$data['Title2'] = '회원관리';
		$this->load->view('/Admin/Custom',$data);	
    }

	public function CustomSearch_post()
    {
		$this->load->helper('date');
		$this->api_header_m->api_admin_header_check();	
		$nowpage = $this->post('nowpage');
		$searkey = $this->post('searkey');
		$searkeyword = $this->post('searkeyword');
		$mb_level = $this->post('mb_level');
		$mb_open = $this->post('mb_open');
		$mb_mailling = $this->post('mb_mailling');
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

		$this->InAdmData_m->add_sql =" mb_no is not null";
		if($searkeyword){
			$this->InAdmData_m->add_sql .= " and $searkey like '%".$searkeyword."%' ";
		}
		if($mb_level){
			$this->InAdmData_m->add_sql .= " and mb_level = '".$mb_level."' ";
		}
		if($mb_open){
			$this->InAdmData_m->add_sql .= " and mb_open = '".$mb_open."' ";
		}
		if($mb_mailling){
			$this->InAdmData_m->add_sql .= " and mb_mailling = '".$mb_mailling."' ";
		}
		if($begin_date){
			$this->InAdmData_m->add_sql .= " and mb_datetime > '".$begin_date."' ";
		}
		if($end_date){
			$this->InAdmData_m->add_sql .= " and mb_datetime < '".$end_date."' ";
		}


		$this->request->body = $this->post();
		$this->InAdmData_m->param_data = $this->post();

		$returnData = $this->InAdmData_m->Customlist();
		$Totalcnt = $this->InAdmData_m->CustomCount();
		
		if($Totalcnt[0]['cnt'] > 0){
			$j=0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;

				$val['mb_today_login'] =substr($val['mb_today_login'],0,-3) ;
				$val['mb_datetime'] = substr($val['mb_datetime'],0,-3);
	
				if($val['mb_leave_date']){
					$val['mb_leave_date'] ="탈퇴함";
				}else{
					$val['mb_leave_date'] ="정상";
				}
				if($val['mb_email_certify']){
					$val['mb_email_certify']="Yes";
				}else{
					$val['mb_email_certify']="No";
				}

				$date_array[] = array(
					'mb_no' => $val['mb_no'],
					'mb_id' => $val['mb_id'],
					'mb_name' => $val['mb_name'],
					'mb_nick' => $val['mb_nick'],
					'mb_level' => $val['mb_level'],
					'mb_email' => $val['mb_email'],
					'mb_email_certify' => $val['mb_email_certify'],
					'mb_mailling' => $val['mb_mailling'],
					'mb_sms' => $val['mb_sms'],
					'mb_open' => $val['mb_open'],
					'mb_today_login' => $val['mb_today_login'],
					'mb_datetime' => $val['mb_datetime'],
					'mb_leave_date' => $val['mb_leave_date'],
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

	public function CustomForm_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		$mb_no = $this->get('mb_no');

		$data['mb_no']='';
		$data['mb_id']='';
		$data['mb_name']='';
		$data['mb_nick']='';
		$data['mb_email']='';
		$data['mb_level']='';
		$data['mb_homepage']='';
		$data['mb_tel']='';
		$data['mb_hp']='';
		$data['mb_zip1']='';
		$data['mb_addr1']='';
		$data['mb_addr2']='';
		$data['mb_mailling']='1';
		$data['mb_open']='1';
		$data['mb_profile']='';
		$data['mb_memo']='';
		$data['mb_leave_date']='';
		$data['mb_intercept_date']='';
		$data['Title2'] = '회원등록';


		if($mb_no){
			$this->InAdmData_m->add_sql = " mb_no='".$mb_no."' ";
			$this->InAdmData_m->param_data = $this->get();
			$returnData = $this->InAdmData_m->Customlist();

			foreach($returnData as $key => $val){	
				$data['mb_no'] = $val['mb_no'];
				$data['mb_id'] = $val['mb_id'];
				$data['mb_name'] = $val['mb_name'];
				$data['mb_nick'] = $val['mb_nick'];
				$data['mb_email'] = $val['mb_email'];
				$data['mb_level'] = $val['mb_level'];
				$data['mb_homepage'] = $val['mb_homepage'];
				$data['mb_tel'] = $val['mb_tel'];
				$data['mb_hp'] = $val['mb_hp'];
				$data['mb_zip1'] = $val['mb_zip1'];
				$data['mb_addr1'] = $val['mb_addr1'];
				$data['mb_addr2'] = $val['mb_addr2'];
				$data['mb_mailling'] = $val['mb_mailling'];
				$data['mb_open'] = $val['mb_open'];
				$data['mb_profile'] = $val['mb_profile'];
				$data['mb_memo'] = $val['mb_memo'];
				$data['mb_leave_date'] = $val['mb_leave_date'];
				$data['mb_intercept_date'] = $val['mb_intercept_date'];
				$data['Title2'] = '회원수정';
			}
		}		
		//$returnData = $this->InAdmData_m->Popuplayerlist();
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '환경설정';
		
		$this->load->view('/Admin/CustomForm',$data);	
    }

	public function Accessor_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();		
		//$returnData = $this->InAdmData_m->Popuplayerlist();
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '접속자집계';
		$data['Title2'] = '접속자집계';
		$this->load->view('/Admin/Accessor',$data);	
    }

	public function BoardList_get()
    {
        $this->log();
		$this->api_header_m->api_admin_header_check();

		
		//$returnData = $this->InAdmData_m->Popuplayerlist();

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '환경설정';
		$data['Title2'] = '새글모음';
		$this->load->view('/Admin/BoardList',$data);	
    }



    public function cwrite_get()
    {
    	$this->log();
		$this->api_header_m->api_header_check();
		
		$botable = $this->get('bo_table');
		$wr_id = $this->get('wr_id');
		$ans = $this->get('ans');
		$ans = (isset($ans)) ? $ans : ''; 
		
		if ($botable == 'ym_notice') 
		{
			$data['wr_title'] = '기업지원사업';
			$data['Title1'] = '게시판';
			$data['Title2'] = '기업지원사업';
			$data['return_url'] = '/index.php/SuAdmin/notice';
		}		

		if ($botable == 'ym_parcelout') 
		{
			$data['wr_title'] = '분양정보';
			$data['Title1'] = '게시판';
			$data['Title2'] = '분양정보';
			$data['type'] = 'C';
			$data['return_url'] = '/index.php/SuAdmin/parcelout';
		}

		if ($botable == 'ga_form')
		{
			$data['wr_title'] = '자료실';
			$data['Title1'] = '게시판';
			$data['Title2'] = '자료실';
			$data['return_url'] = '/index.php/SuAdmin/book';
		}

		if ($botable == 'ym_trends')
		{
			// $data['Title1'] = '통계자료 글쓰기';
			// $data['Title2'] = '글쓰기';

			$data['wr_title'] = '통계자료';
			$data['Title1'] = '게시판';
			$data['Title2'] = '통계자료';
			$data['type'] = 'C';
			$data['return_url'] = '/index.php/SuAdmin/trends';
		}

        if ($botable == 'ym_faq')
        {
			// $data['Title1'] = 'FAQ 글쓰기';
			// $data['Title2'] = '글쓰기';

			$data['wr_title'] = '산업단지 FAQ';
			$data['Title1'] = '게시판';
			$data['Title2'] = '산업단지 FAQ';
			$data['return_url'] = '/index.php/SuAdmin/Faq';
		}

		if ($botable == 'ym_notification')
		{
			// $data['Title1'] = '산업단지고시정보 글쓰기';
			// $data['Title2'] = '글쓰기';
			$data['complex'] = $this->Admain_m->defineCodeList();
			$data['wr_title'] = '산업단지고시 정보';
			$data['Title1'] = '게시판';
			$data['Title2'] = '산업단지고시 정보';
			$data['type'] = 'C';
			$data['return_url'] = '/index.php/SuAdmin/Notification';
		}

		$data['read_table'] = $botable;
        $data['pageTitle'] = '부산산업단지관리공단';
		$data['wr_id'] = '';
		$data['wr_subject'] = '';
		$data['wr_content'] = '';
		$data['wr_link1'] = '';
		$data['wr_file'] = 0;
		$data['answer_reply'] = $ans;

		$this->Read_m->add_sql = '';
		
		if ($wr_id) 
		{
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
			$this->Read_m->param_data = $this->get();
			$returnData = $this->Read_m->rlist();

			if ($ans == 're') 
			{
				foreach ($returnData as $key => $val)
				{			
					$data['wr_subject'] = 'Re: '.$val['wr_subject'];
					$data['wr_id'] = $val['wr_id'];
				}
			}
			else
			{
				foreach ($returnData as $key => $val)
				{			
					$data['wr_subject'] = $val['wr_subject'];
					$data['ca_name'] = $val['ca_name'];
					$data['wr_last'] = $val['wr_last'];
					$data['wr_1'] = $val['wr_1'];
					$data['wr_2'] = $val['wr_2'];
					$data['wr_3'] = $val['wr_3'];
					$data['wr_name'] = $val['wr_name'];
					$data['wr_datetime'] = $val['wr_datetime'];
					$data['wr_hit'] = $val['wr_hit'];
					$data['wr_id'] = $val['wr_id'];
					$data['wr_link1'] = $val['wr_link1'];
					$data['wr_link1_hit'] = $val['wr_link1_hit'];
					$data['wr_content'] = $val['wr_content'];
					$data['wr_file'] = $val['wr_file'];
				}

				$data['bf_source'] = [];
				
				if ($data['wr_file'] > 0)
				{
					$returnFile = $this->Read_m->noticefile();

					foreach ($returnFile as $fkey => $fval)
					{						
						$data['bf_no'][$fval['bf_no']] = $fval['bf_no'];
						$data['bf_source'][$fval['bf_no']] = $fval['bf_source'];
						$data['bf_file'][$fval['bf_no']] = $fval['bf_file'];
						$data['bf_download'][$fval['bf_no']] = $fval['bf_download'];
						$data['bf_filesize'][$fval['bf_no']] = $fval['bf_filesize'];
						$data['bf_datetime'][$fval['bf_no']] = $fval['bf_datetime'];					
					}
				}
			}
		}

		$this->Read_m->param_data = $this->get();
		$secretData = $this->Read_m->secretlist();
		$data['secrets'] = $secretData;
		//var_dump($data);
        $this->load->view('/Admin/common_write_v', $data);
    }

    public function read_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		
		$botable = $this->get('bo_table');       
        $wr_id = $this->get('wr_id');

		if ($botable == 'ym_notice')
		{
			$data['wr_title'] = '기업지원사업안내';
			$data['Title1'] = '게시판';
			$data['Title2'] = '기업지원사업안내';
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_1';
			$data['type'] = 'A';
            $data['is_comment'] = false;
			$data['return_url']= '/index.php/SuAdmin/notice';
		}
		
		if ($botable == 'ym_parcelout') 
		{
			$data['wr_title'] = '분양정보';
            $data['Title1'] = '게시판';
			$data['Title2'] = '분양정보';
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_2';
			$data['type'] = 'C';
            $data['is_comment'] = true;
			$data['return_url'] = '/index.php/SuAdmin/parcelout';
		}

		if ($botable == 'ga_form')
		{
			$data['wr_title'] = '자료실';
			$data['Title1'] = '게시판';
			$data['Title2'] = '자료실';
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_3';
            $data['is_comment'] = false;
			$data['return_url'] = '/index.php/SuAdmin/book';
		}
        
  //       if ($botable == 'ym_parcelout') {
		// 	$data['Title1'] = '분양정보';
		// 	$data['return_url'] = '/index.php/SuAdmin/parcelout';
		// }

		if ($botable == 'ym_trends')
		{
			// $data['Title1'] = '통계자료';

			$data['wr_title'] = '통계자료';
			$data['Title1'] = '게시판';
			$data['Title2'] = '통계자료';
			$data['type'] = 'C';
			$data['return_url'] = '/index.php/SuAdmin/Trends';
		}

		if ($botable == 'ym_faq')
		{
			// $data['Title1'] = '산업단지FAQ';

			$data['wr_title'] = '산업단지 FAQ';
			$data['Title1'] = '게시판';
			$data['Title2'] = '산업단지 FAQ';
			$data['return_url'] = '/index.php/SuAdmin/faq';
		}

		if ($botable == 'ym_notification')
		{
			// $data['Title1']="산업단지고시 정보";
			$data['type'] = 'C';
			$data['wr_title'] = '산업단지고시 정보';
			$data['Title1'] = '게시판';
			$data['Title2'] = '산업단지고시 정보';
			$data['return_url']="/index.php/SuAdmin/Notification";
		}
		
		$data['read_table'] = $botable;

        $this->Read_m->hit_update_read_count($botable, $wr_id);
		$this->Read_m->add_sql = '';
		
		if ($wr_id)
		{
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
		}

		$this->Read_m->param_data = $this->get();
		$returnData = $this->Read_m->rlist();

		foreach ($returnData as $key => $val)
		{
			if($val['ca_name'] != 'all'){
				$ca_name = $this->Yard_m->defineCode($val['ca_name']);
			}else{
				$ca_name = "전체";
			}
			$data['wr_subject'] = $val['wr_subject'];
			$data['ca_name'] = ($ca_name == '전체')? '':$ca_name[0]['CHAN_CODE'];
			$data['wr_last'] = $val['wr_last'];
			$data['wr_1'] = $val['wr_1'];
			$data['wr_2'] = $val['wr_2'];
			$data['wr_3'] = $val['wr_3'];
			$data['wr_name'] = $val['wr_name'];
			$data['wr_datetime'] = $val['wr_datetime'];
			$data['wr_hit'] = $val['wr_hit'];
			$data['wr_id'] = $val['wr_id'];
			$data['wr_link1'] = $val['wr_link1'];
			$data['wr_link1_hit'] = $val['wr_link1_hit'];
			$data['wr_content'] = $val['wr_content'];
			$data['wr_file'] = $val['wr_file'];

			$this->Read_m->wr_hit = $val['wr_hit'];
			// $returnData = $this->Read_m->hit_update();
		}

		$Nextnum = $this->Read_m->nextsno();
		
		if ($Nextnum)
		{
			$data['nextbtn'] = $Nextnum[0]['wr_id'];
		}
		else
		{
			$data['nextbtn'] = '';
		}
		
		$Prevnum = $this->Read_m->prevsno();
		
		if ($Prevnum)
		{
			$data['prevbtn'] = $Prevnum[0]['wr_id'];
		}
		else
		{
			$data['prevbtn'] = '';
		}
	
		if ($data['wr_file'] > 0) 
		{
			$returnFile = $this->Read_m->noticefile();

			foreach ($returnFile as $fkey => $fval)
			{			
				$data['bf_no'][$fval['bf_no']] = $fval['bf_no'];
				$data['bf_source'][$fval['bf_no']] = $fval['bf_source'];
				$data['bf_file'][$fval['bf_no']] = $fval['bf_file'];
				$data['bf_download'][$fval['bf_no']] = $fval['bf_download'];
				$data['bf_filesize'][$fval['bf_no']] = $fval['bf_filesize'];
				$data['bf_datetime'][$fval['bf_no']] = $fval['bf_datetime'];				
			}
		}

        $data['pageTitle'] = '부산산업단지관리공단';
      
        $this->load->view('/Admin/common_detail_v', $data);
    }

    public function nwrite_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();

		$botable = $this->get('bo_table');
		$wr_id = $this->get('wr_id');
		$ans = $this->get('ans');
		$ans = (isset($ans)) ? $ans : ''; 

		if ($botable == 'ym_media') 
		{
			$data['wr_title'] = '공지/지원사업안내';
			$data['return_url'] = '/index.php/SuAdmin/notice';		
		}	

		$data['read_table'] = $botable;
        $data['pageTitle'] = '부산산업단지관리공단';
        $data['wr_title'] = '지원사업안내';
		$data['Title1'] = '게시판';
		$data['Title2'] = '지원사업안내';
		$data['wr_subject'] = '';
		$data['ca_name'] = '';
		$data['wr_last'] = '';
		$data['wr_1'] = '';
		$data['wr_2'] = '';
		$data['wr_3'] = '';
		$data['wr_name'] = '';
		$data['wr_datetime'] = '';
		$data['wr_hit'] = '';
		$data['wr_id'] = '';
		$data['wr_link1'] = '';
		$data['wr_link1_hit'] = '';
		$data['wr_content'] = '';
		$data['wr_file'] = 0;
		$data['answer_reply'] = $ans;
		
		if ($wr_id)
		{
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
			$this->Read_m->param_data = $this->get();
			$returnData = $this->Read_m->rlist();

			if ($ans == 're')
			{
				foreach ($returnData as $key => $val)
				{			
					$data['wr_subject'] = 'Re: '.$val['wr_subject'];
					$data['wr_id'] = $val['wr_id'];
				}
			}
			else
			{
				foreach ($returnData as $key => $val)
				{			
					$data['wr_subject'] = $val['wr_subject'];
					$data['ca_name'] = $val['ca_name'];
					$data['wr_last'] = $val['wr_last'];
					$data['wr_1'] = $val['wr_1'];
					$data['wr_2'] = $val['wr_2'];
					$data['wr_3'] = $val['wr_3'];
					$data['wr_name'] = $val['wr_name'];
					$data['wr_datetime'] = $val['wr_datetime'];
					$data['wr_hit'] = $val['wr_hit'];
					$data['wr_id'] = $val['wr_id'];
					$data['wr_link1'] = $val['wr_link1'];
					$data['wr_link1_hit'] = $val['wr_link1_hit'];
					$data['wr_content'] = $val['wr_content'];
					$data['wr_file'] = $val['wr_file'];
				}

				$data['bf_source'] = [];

				if ($data['wr_file'] > 0) 
				{
					$returnFile = $this->Read_m->noticefile();
					
					foreach ($returnFile as $fkey => $fval)
					{						
						$data['bf_no'][$fval['bf_no']] = $fval['bf_no'];
						$data['bf_source'][$fval['bf_no']] = $fval['bf_source'];
						$data['bf_file'][$fval['bf_no']] = $fval['bf_file'];
						$data['bf_download'][$fval['bf_no']] = $fval['bf_download'];
						$data['bf_filesize'][$fval['bf_no']] = $fval['bf_filesize'];
						$data['bf_datetime'][$fval['bf_no']] = $fval['bf_datetime'];						
					}
				}
			}			
		}

		$this->Read_m->param_data = $this->get();
		$secretData = $this->Read_m->secretlist();
		$data['secrets'] = $secretData;

        $this->load->view('/Admin/notice_write_v', $data);
    }

    public function tkrwp_post()
    {

		$wrid = $this->post('wrid');
		$bo_table = $this->post('bo_table');		
		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->boardel();
		echo $this->response($returnData['success'], 200);		
    }

    public function UrlLink_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();

		$bo_table = $this->get('bo_table');   
        $wr_id = $this->get('wr_id');

		if ($wr_id)
		{
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
		}

		$this->Read_m->param_data = $this->get();
		$returnData = $this->Read_m->linklist();

		foreach ($returnData as $key => $val)
		{					
			redirect($val['wr_link1']);
		}
    }

    public function eotrmfWrite_post()
    {
		$wr_id = $this->post('wr_id');
		$bo_table = $this->post('bo_table');
		$co_id = $this->post('co_id');
		$wr_comment = $this->post('wr_comment');
		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->eotrmfIn();
		echo $this->response($returnData['success'], 200);
		// echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);				
    }

    public function eotrmfRead_post()
    {
		$wr_id = $this->post('wr_id');
		$bo_table = $this->post('bo_table');
		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->eotrmfList();
		
		if ($returnData)
		{
			$j = 0;

			foreach ($returnData as $key => $val)
			{			
				$date_array[] = array(
					'co_id' => $val['co_id'],
					'bo_table' => $val['bo_table'],
					'wr_id' => $val['wr_id'],
					'co_datetime' => $val['co_datetime'],
					'wr_comment' => $val['wr_comment'],
					'mb_id' => $val['mb_id'],
					'mb_name' => $val['mb_name'],
				);

				$j++;
			}

			echo json_encode($date_array);
		}
		else
		{
			$error_date = 'E500';
			echo json_encode($error_date);
		}				
    }

    public function eotrmfDel_post()
    {
		$wrid = $this->post('wrid');
		$bo_table = $this->post('bo_table');
		$co_id = $this->post('co_id');
		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->eotrmfDel();
		echo $this->response($returnData['success'], 200);		
    }

    // 게시판_기업지원사업
    public function notice_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$Notice_cnt = $this->List_m->NoticeCount();
		$Support_cnt = $this->List_m->SupportCount();

		$data['Notice_tnum'] = $Notice_cnt[0]['Tcnt'];
		$data['Notice_nnum'] = $Notice_cnt[0]['Ncnt'];
		$data['Notice_enum'] = $Notice_cnt[0]['Ecnt'];
		$data['Notice_jnum'] = $Notice_cnt[0]['Jcnt'];
		$data['Support_num'] = $Notice_cnt[0]['Kcnt'];
		$data['bo_table'] = "ym_notice";
        
		$data['botable'] = 'notice';
		$data['menu'] = 'notify';
		$data['type'] = 'A';

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '기업지원사업';

        $this->load->view('/Admin/info_notice_v', $data);
    }

    // 게시판_분양정보 
    public function parcelout_get() 
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='ym_parcelout' "; 
        $returnData = $this->Yard_m->BoardList();

        $data['bo_subject'] = '분양정보';
        $data['botable'] = 'parcelout';
        $data['bo_table'] = 'ym_parcelout'; 
        $data['menu'] = 'notify';

        $data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '분양정보';
		$data['type'] = 'C';
        
        $this->load->view('/Admin/parcelout_v', $data);
    }

 	// 게시판_자료실
    public function book_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='ga_form' ";
        $returnData = $this->Yard_m->BoardList();

        $data['bo_subject'] = '자료실';
        $data['botable'] = 'form';
        $data['bo_table'] = 'ga_form';
        $data['menu'] = 'notify';

        $data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '자료실';
        
        $this->load->view('/Admin/info_combine_v', $data);
    }

    // 게시판_통계자료
    public function Trends_get() {
		// $data['Title1'] = '통계자료';
		// $data['Title2'] = '새글모음';

    	$data['bo_table'] = 'ym_trends';
		$data['type'] = 'C';
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '통계자료';
		
		$this->load->view('/Admin/board_v', $data);
	}
    
    // 게시판_산업단지 FAQ
    public function Faq_get() {
		// $data['Title1'] = 'FAQ';
		// $data['Title2'] = '새글모음';

		$this->log();
		$this->api_header_m->api_admin_header_check();
		$data['bo_table'] = 'ym_faq';
		
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '산업단지 FAQ';
		
		$this->load->view('/Admin/Faq_v',$data);
	}
    
    // 게시판_산업단지고시 정보
    public function Notification_get() {
		// $data['Title1'] = '산업단지고시정보';
		// $data['Title2'] = '새글모음';

		$this->log();
		$this->api_header_m->api_admin_header_check();
		$data['bo_table'] = 'ym_notification';

		$data['complex'] = $this->Admain_m->defineCodeList();
		$data['type'] = 'C';
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '산업단지고시 정보';
		
		$this->load->view('/Admin/Notification_v', $data);
	}

    // 게시판_설문조사
	public function Survey_get() {
		// $data['Title1'] = '설문지';
		// $data['Title2'] = '새글모음';
		
		$this->log();
		$this->api_header_m->api_admin_header_check();
		$data['bo_table'] = 'complex_survey';

		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '설문조사';

    	$this->load->view('/Admin/survey_v', $data);
	}

    // 게시판_설문조사(삭제)
	public function delete_survey_post()
    {
		$wrid = $this->post('wrid');		
		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->delete_survey();
		echo $this->response($returnData['success'], 200);		
    }

	public function stateWrite_get()
	{
		$data['pageTitle'] = '부산산업단지관리공단';
		$data['Title1'] = '게시판';
		$data['Title2'] = '설문조사';

		$this->load->view('/Admin/stateWrite_v', $data);
	}

	public function survey_submit_ajax_post()
	{
        $params = $this->post();
        $data['result'] = $this->Assocation_m->set_survey_ajax($params);
    }

	public function surveyInfo_get()
    {
        $num = $this->get('survey_idx');

        $this->log();
        $data['co_subject'] = '설문조사';

        $data['wr_title'] = '설문조사';
		$data['Title1'] = '게시판';
		$data['Title2'] = '설문조사';
		
        $data['suheaders'] = $this->Assocation_m->get_survey_header_list($num);
        $data['sudetails'] = $this->Assocation_m->get_survey_detail_list($num);

        $this->load->view('/Admin/survey_info_v', $data);
    }



    public function survey_detail_get()
    {
        $this->log();
        
        $muid = $this->session->userdata('muid');
        $num = $this->get('survey_idx');

        $data['co_subject'] = '설문조사';
        $data['menu'] = 'survey';

        $data['pageTitle'] = '부산산업단지관리공단';
        $data['wr_title'] = '설문조사';
		$data['Title1'] = '게시판';
		$data['Title2'] = '설문조사';

        $data['item'] = $this->Assocation_m->get_survey($num);
        $data['production_item'] = $this->Assocation_m->get_survey_production($num);

        // 텍스트 입력(주관식), 단일 선택(객관식)
        $data['result_list'] = $this->Assocation_m->get_survey_result_list($num);

        // 텍스트 입력(주관식)
        // $data['result_item'] = $this->Assocation_m->get_survey_result_item($num, $muid);

        // 단일 선택(객관식)
        //$data['item1_total'] = $this->Assocation_m->get_survey_result_count($num, '1');
        //$data['item2_total'] = $this->Assocation_m->get_survey_result_count($num, '2');
        //$data['item3_total'] = $this->Assocation_m->get_survey_result_count($num, '3');
        //$data['item4_total'] = $this->Assocation_m->get_survey_result_count($num, '4');
        //$data['item5_total'] = $this->Assocation_m->get_survey_result_count($num, '5');

        // 항목 여러개 통계
        // $data['test'] = $this->Assocation_m->get_test($num, '4');

        // $data['suheaders'] = $this->Assocation_m->get_survey_header_list($num);
        // $data['sudetails'] = $this->Assocation_m->get_survey_detail_list($num);
    	//var_dump($data);
        $this->load->view('/Admin/survey_detail_v', $data);
    }    
    
    public function StatusEdit_get(){
		$this->log(); 
		$data['pageTitle'] = '입주기업체 정보 ';
		$data['Title1'] = '입주기업체 정보 ';
		$data['Title2'] = '입주기업체 정보 ';
		$data['large'] = $this->Management_m->large();
		$this->load->view('/Admin/StatusEdit_v', $data);
	}
    
    public function statusEdi_get(){
    	$company = $this->get('company');
		$data['infocom'] = $this->Movein_m->companyInfo($company);

		$data['decode'] = $this->Movein_m->cptcorpdt();


		$data['pageTitle'] = '입주기업체 정보 수정';
		$data['Title1'] = '입주기업체 정보 수정';
		$data['Title2'] = '입주기업체 정보 수정';
		//var_dump($data);
		$this->load->view('/Admin/statusEdi_e', $data);
	}
    
    public function status_edit_ajax_post(){
		$params = $this->post();
		$data['result'] = $this->Assocation_m->status_edit_ajax_post($params);
	}

}
