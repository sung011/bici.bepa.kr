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
class Info extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('/notice/List_m');
		$this->load->model('/notice/Read_m');
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
     * 알림마당
     *******************/
    public function notice_get()
    {
        $this->log();

		$this->api_header_m->api_header_check();
		$Notice_cnt = $this->List_m->NoticeCount();
		$Support_cnt = $this->List_m->SupportCount();

		$data['Notice_tnum']=$Notice_cnt[0]['Tcnt'];
		$data['Notice_nnum']=$Notice_cnt[0]['Ncnt'];
		$data['Notice_enum']=$Notice_cnt[0]['Ecnt'];
		$data['Notice_jnum']=$Notice_cnt[0]['Jcnt'];
		$data['Support_num']=$Notice_cnt[0]['Kcnt'];
		$data['bo_table']= "ym_notice";
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'notice';
		$data['menu'] = 'notify';
        $this->load->view('/info/info_notice',$data);
    }

	public function photo_get()
    {
        $this->log();

		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='ym_photo' ";
		$returnData = $this->Yard_m->BoardList();
	
		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'photo';
        $this->load->view('/info/info_photo',$data);
    }

	public function media_get()
    {
        $this->log();

		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='ym_media' ";
		$returnData = $this->Yard_m->BoardList();

		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['bo_subject'] = '기업홍보영상';
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'media';		
        $this->load->view('/info/info_combine',$data);
    }

	public function tender_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='ym_tender' ";
		$returnData = $this->Yard_m->BoardList();
		foreach($returnData as $key => $val){
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}

		$data['bo_subject'] = '입찰공고';
        /*$data['pageTitle'] = '성남산업단지관리공단';*/
		$data['botable'] = 'tender';


		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['bo_subject'] = '하이테크보드';
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'hitech';
        $this->load->view('/info/info_combine',$data);
    }

	public function story_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='ym_story' ";
		$returnData = $this->Yard_m->BoardList();
	
		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['bo_subject'] = '기업협업스토리';
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'story';
        $this->load->view('/info/info_combine',$data);
    }

	public function job_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$this->Yard_m->add_sql = " bo_table='ym_job' ";
		$returnData = $this->Yard_m->BoardList();

		foreach($returnData as $key => $val){	
			$data['bo_table']= $val['bo_table'];
			$data['gr_id'] = $val['gr_id'];
			$data['bo_subject'] = $val['bo_subject'];
		}
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['botable'] = 'job';
        $this->load->view('/info/info_combine',$data);
    }

	public function read_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$botable = $this->get('bo_table');       
        $wr_id = $this->get('wr_id');

		if($botable == "ym_media"){
			$data['wr_title']="기업홍보영상";
			$data['return_url']="/index.php/Info/media";			
		}	
		if($botable == "ym_tender"){
			$data['wr_title']="입찰공고";
			$data['return_url']="/index.php/Info/tender";
		}		
		if($botable == "ym_hitech"){
			$data['wr_title']="하이테크";
			$data['return_url']="/index.php/Info/hitech";
		}
		if($botable == "ym_story"){
			$data['wr_title']="기업협업스토리";
			$data['return_url']="/index.php/Info/story";
		}
		if($botable == "ym_job"){
			$data['wr_title']="채용안내";
			$data['return_url']="/index.php/Info/job";
		}
		if($botable == "ym_notice"){
			$data['wr_title']="기업지원사업안내";
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_1';
			$data['return_url']="/index.php/Info/notice";
		}
		if($botable == "ym_photo"){
			$data['wr_title']="포토뉴스";
			$data['return_url']="/index.php/Info/photo";
		}
		if($botable == "ga_form"){
			$data['wr_title']="자료실";
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_3';
			$data['return_url']="/index.php/Movein/book";
		}
		if($botable == "ym_column"){
			$data['wr_title']="질문,건의";
            $data['menu'] = 'comm';
            $data['sub_m'] = 'comm_1';
			$data['return_url']="/index.php/Communicat/inquire";
		}
		if($botable == "cs_space02"){
			$data['wr_title']="문화놀이터";
			$data['return_url']="/index.php/Support/space2";
		}
		if($botable == "cs_space03"){
			$data['wr_title']="지식산업센터 회의실";
			$data['return_url']="/index.php/Support/space3";
		}

		if ($botable == 'ym_parcelout') {
			$data['wr_title'] = '분양정보';
            $data['menu'] = 'notify';
            $data['sub_m'] = 'notify_2';
			$data['return_url'] = '/index.php/Info/parcelout';
		}

		if($botable == 'ym_trends'){
			$data['wr_title'] = '산업단지 산업동향';
            $data['menu'] = 'just';
            $data['sub_m'] = 'just_1';
			$data['return_url'] = '/index.php/management/trends';
		}
		if($botable == "ym_notification"){
			$data['wr_title']="산업단지고시 정보";
            $data['menu'] = 'just';
            $data['sub_m'] = 'just_2';
			$data['return_url']="/index.php/management/notification";			
		}
		if($botable == 'ym_faq'){
			$data['wr_title'] = '산업단지FAQ';
            $data['menu'] = 'comm';
            $data['sub_m'] = 'comm_2';
			$data['return_url'] = '/index.php/Communicat/faq';
		}

		$data['read_table']= $botable;
        $this->Read_m->hit_update_read_count($botable, $wr_id);
		$this->Read_m->add_sql = "";
		if($wr_id){
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
		}
		$this->Read_m->param_data = $this->get();
		$returnData = $this->Read_m->rlist();

		foreach($returnData as $key => $val){
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
			//$returnData = $this->Read_m->hit_update();
		}

		$Nextnum = $this->Read_m->nextsno();
		if($Nextnum){
			$data['nextbtn'] = $Nextnum[0]['wr_id'];
		}else{
			$data['nextbtn'] = "";
		}
		
		$Prevnum = $this->Read_m->prevsno();
		if($Prevnum){
			$data['prevbtn'] = $Prevnum[0]['wr_id'];
		}else{
			$data['prevbtn'] = "";
		}
	
		if($data['wr_file'] > 0){
			$returnFile = $this->Read_m->noticefile();
			foreach($returnFile as $fkey => $fval){			
				$data['bf_no'][$fval['bf_no']] = $fval['bf_no'];
				$data['bf_source'][$fval['bf_no']] = $fval['bf_source'];
				$data['bf_file'][$fval['bf_no']] = $fval['bf_file'];
				$data['bf_download'][$fval['bf_no']] = $fval['bf_download'];
				$data['bf_filesize'][$fval['bf_no']] = $fval['bf_filesize'];
				$data['bf_datetime'][$fval['bf_no']] = $fval['bf_datetime'];				
			}
		}

        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/info/inforead',$data);
    }

	public function UrlLink_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$bo_table = $this->get('bo_table');   
        $wr_id = $this->get('wr_id');
		if($wr_id){
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
		}
		$this->Read_m->param_data = $this->get();
		$returnData = $this->Read_m->linklist();
		foreach($returnData as $key => $val){					
			redirect($val['wr_link1']) ;
		}
		
    }

	 public function nwrite_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$botable = $this->get('bo_table');
		$wr_id = $this->get('wr_id');
		$ans = $this->get('ans');
		$ans = (isset($ans)) ? $ans : ""; 
		if($botable == "ym_media"){
			$data['wr_title']="공지/지원사업안내";
			$data['return_url']="/Info/notice";			
		}	
		$data['read_table']= $botable;
        $data['pageTitle'] = '성남산업단지관리공단';

		$data['wr_subject'] = "";
		$data['ca_name'] = "";
		$data['wr_last'] = "";
		$data['wr_1'] = "";
		$data['wr_2'] = "";
		$data['wr_3'] = "";
		$data['wr_name'] = "";
		$data['wr_datetime'] = "";
		$data['wr_hit'] = "";
		$data['wr_id'] = "";
		$data['wr_link1'] = "";
		$data['wr_link1_hit'] = "";
		$data['wr_content'] = "";
		$data['wr_file'] = 0;
		$data['answer_reply'] = $ans;
		if($wr_id){
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
			$this->Read_m->param_data = $this->get();
			$returnData = $this->Read_m->rlist();

			if($ans =="re"){
				foreach($returnData as $key => $val){			
					$data['wr_subject'] = "Re: ".$val['wr_subject'];
					$data['wr_id'] = $val['wr_id'];
				}
			}else{
				foreach($returnData as $key => $val){			
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
				$data['bf_source']=[];
				if($data['wr_file'] > 0){
					$returnFile = $this->Read_m->noticefile();
					foreach($returnFile as $fkey => $fval){						
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

        $this->load->view('/info/notice_write',$data);
    }

	public function phwrite_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/info/photowrite',$data);
    }

	public function cwrite_get()
    {

        $this->log();

		$this->api_header_m->api_header_check();
		$botable = $this->get('bo_table');
		$wr_id = $this->get('wr_id');
		$ans = $this->get('ans');
		$ans = (isset($ans)) ? $ans : ""; 
		if($botable == "ym_media"){
			$data['wr_title']="기업홍보영상";
			$data['return_url']="/index.php/Info/media";
		}	
		if($botable == "ym_tender"){
			$data['wr_title']="입찰공고";
			$data['return_url']="/index.php/Info/tender";
		}	
		if($botable == "ym_hitech"){
			$data['wr_title']="하이테크";
			$data['return_url']="/index.php/Info/hitech";
		}
		if($botable == "ym_story"){
			$data['wr_title']="기업협업스토리";
			$data['return_url']="/index.php/Info/story";
		}
		if($botable == "ym_job"){
			$data['wr_title']="채용안내";
			$data['return_url']="/index.php/Info/job";
		}
		if($botable == "ym_notice"){
			$data['wr_title']="공지/행사/교육";
			$data['return_url']="/index.php/Info/notice";
		}		
		if($botable == "ym_photo"){
			$data['wr_title']="포토뉴스";
			$data['return_url']="/index.php/Movein/inquire";
		}
		if($botable == "ym_column"){
			$data['wr_title']="자주하는질문";
			$data['return_url']="/index.php/Info/media";
		}
		if($botable == "cs_space02"){
			$data['wr_title']="문화놀이터";
			$data['return_url']="/index.php/Support/space2";
		}
		if($botable == "cs_space03"){
			$data['wr_title']="지식산업센터 회의실";
			$data['return_url']="/index.php/Support/space3";
		}
		if($botable == "ga_form"){
			$data['wr_title']="자료실";
			$data['return_url']="/index.php/movein/book";
		}

		if ($botable == 'ym_parcelout') {
			$data['wr_title'] = '분양정보';
			$data['return_url'] = '/index.php/Info/parcelout';
		}
		
		$data['read_table']= $botable;
        $data['pageTitle'] = '성남산업단지관리공단';
		$data['wr_id'] = "";
		$data['wr_subject'] = "";
		$data['wr_content'] = "";
		$data['wr_link1'] = "";
		$data['wr_file'] = 0;
		$data['answer_reply'] = $ans;
		$this->Read_m->add_sql = "";
		if($wr_id){
			$this->Read_m->add_sql .= " wr_id ='".$wr_id."' ";
			$this->Read_m->param_data = $this->get();
			$returnData = $this->Read_m->rlist();

			if($ans =="re"){
				foreach($returnData as $key => $val){			
					$data['wr_subject'] = "Re: ".$val['wr_subject'];
					$data['wr_id'] = $val['wr_id'];
				}
			}else{
				foreach($returnData as $key => $val){			
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
				$data['bf_source']=[];
				if($data['wr_file'] > 0){
					$returnFile = $this->Read_m->noticefile();
					foreach($returnFile as $fkey => $fval){						
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

        $this->load->view('/info/comm_write',$data);
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
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);				
    }

	public function eotrmfRead_post()
    {

		$wr_id = $this->post('wr_id');
		$bo_table = $this->post('bo_table');

		$this->request->body = $this->post();
		$this->Read_m->param_data = $this->post();
		$returnData = $this->Read_m->eotrmfList();
		if($returnData){
			$j =0;
			foreach($returnData as $key => $val){			
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
		}else{
			$error_date ="E500";
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

    public function parcelout_info_get() 
    {
    	$this->log();
        $data['menu'] = 'notify';
        $data['bo_subject'] = '산업단지 분양현황';
        $this->load->view('/info/parcelout_info_v', $data);
    }

    public function parcelout_get() 
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='ym_parcelout' "; 
        $returnData = $this->Yard_m->BoardList();

        // $data['co_subject'] = '분양정보';
        $data['bo_subject'] = '분양정보';
        $data['pageTitle'] = '성남산업단지관리공단';
        $data['botable'] = 'parcelout';
        $data['bo_table'] = 'ym_parcelout'; 
        $data['menu'] = 'notify';
        $this->load->view('/info/parcelout', $data);
    }

    public function disposal_get(){
        $this->log();
        $data['co_subject'] = '산업단지 입주업무 안내';
        $data['menu'] = 'notify';
        $this->load->view('/info/disposal',$data);
    }

}
