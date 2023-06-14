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
class Movein extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
        $this->load->library('session');
        $this->load->model('api_header_m');
        $this->load->model('/notice/Yard_m');
        $this->load->model('/notice/Read_m');
        $this->load->model('/notice/Movein_m');
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
     * 입주안내

     *******************/
    public function info_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단'; 
        $this->load->view('/movein/movein_info',$data);
    }

    public function contract_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단'; 
        $this->load->view('/movein/movein_contract',$data);
    }

    public function book_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='ga_form' ";
        $returnData = $this->Yard_m->BoardList();

        /*foreach($returnData as $key => $val){
            $data['bo_table']= $val['bo_table'];
            $data['gr_id'] = $val['gr_id'];
            $data['bo_subject'] = $val['bo_subject'];
        }*/
        $data['bo_subject'] = '자료실';
        $data['pageTitle'] = '성남산업단지관리공단';
        $data['botable'] = 'form';
        $data['bo_table'] = 'ga_form';
        $data['menu'] = 'notify';
        $this->load->view('/info/info_combine',$data);
    }

    public function inquire_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $data['bo_table']= "ym_column";
        $data['gr_id'] = "ym";
        $data['bo_subject'] = '질문,건의';
        $data['botable'] = 'column'; 
        $this->load->view('/info/info_combine',$data);
    }

    public function status_get()
    {


        $status_list = $this->Movein_m->status_list();
        $data['menu'] = 'just';
        $data['status_list'] = $status_list;
        $this->log();
        /*$this->api_header_m->api_header_check();
        $this->Yard_m->add_sql = " bo_table='gi_business' ";
        $returnData = $this->Yard_m->BoardList();

        foreach($returnData as $key => $val){   
            $data['bo_table']= $val['bo_table'];
            $data['gr_id'] = $val['gr_id'];
            $data['bo_subject'] = $val['bo_subject'];
        }
        $returnFile = $this->Read_m->businessfile();
        $data['wr_file'] = count($returnFile);
        $data['wr_id'] = 1;
        
        //exit;
        if($data['wr_file'] > 0){
            foreach($returnFile as $fkey => $fval){                     
                $data['bf_no'][$fval['bf_no']] = $fval['bf_no'];
                $data['bf_source'][$fval['bf_no']] = $fval['bf_source'];
                $data['bf_file'][$fval['bf_no']] = $fval['bf_file'];
                $data['bf_download'][$fval['bf_no']] = $fval['bf_download'];
                $data['bf_filesize'][$fval['bf_no']] = $fval['bf_filesize'];
                $data['bf_datetime'][$fval['bf_no']] = $fval['bf_datetime'];                    
            }
        }*/
        $this->load->view('/movein/movein_status',$data);
    }

    public function bwrite_get()
    {
        $this->log();
        $this->api_header_m->api_header_check();
        $botable = $this->get('bo_table');

        if($botable == "gi_business"){
            $data['wr_title']="입주업체현황";
            $data['return_url']="/Movein/status";           
        }   
        $data['read_table']= $botable;
        $data['pageTitle'] = '성남산업단지관리공단';
        $data['wr_id'] = "";
        $data['wr_subject'] = "";
        $data['wr_content'] = "";
        $data['wr_link1'] = "";
        $data['wr_file'] = 0;

        $this->Read_m->add_sql = "";
        $this->Read_m->add_sql .= " wr_id ='1' ";
        $this->Read_m->param_data = $this->get();
        $returnData = $this->Read_m->rlist();

        
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
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/movein/movein_bwrite',$data);
    }

    public function industry_list_get() {
        if (!$_GET['type'])
        {
            $industry_list = $this->Movein_m->industry_all_list();
        }
        else 
        {
            $industry_list = $this->Movein_m->industry_list($_GET['type']);  
        }
        
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($industry_list));
    }

    public function companyInfo_get(){
        $num = $this->get("num");
        $infocom = $this->Movein_m->companyInfo($num);
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($infocom));
    }

    public function companyInfo01_get(){
        $pnu = $this->get('pnu');
        $pnuinfo = $this->Movein_m->complexsear($pnu);
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($pnuinfo));
    }

    public function buildinfo_get(){
        $pnu = $this->get('pnu');
        $buildinfo = $this->Movein_m->buildinfo($pnu);
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($buildinfo));
    }

    public function just_list_get(){
        $nowpage = $_GET['nowpage'];
        $pagelimit = 15;
        $sm = 1;

        if($nowpage == '1'){
            $nowpage = 0;
        }

        if ($nowpage >= 1){
            $pagelimit =  $nowpage * 15;
        }
        /*echo $_GET['type'];
        echo $_GET['just'];*/
        //echo $_GET['just'].",".$_GET['type'];
        //var_dump($nextsno.",".$nextsno);
        $just_num = $this->Movein_m->just_name($_GET['just']);
        $code_num = $just_num[0]['code_num'];
        //var_dump($code_num);
        //$just_list =$this->Movein_m->just_list($_GET['type'],$code_num,$nextsno,$pagelimit);
        //var_dump($just_list);
        $just_count = $this->Movein_m->just_count($_GET['type'],$code_num);
        $data_list['just_list'] = array(
            //'data' => $just_list,
            'data'=>$just_count,
            'page' => $_GET['nowpage'],
            'pagelimit'=>  $pagelimit,
            'total' => count($just_count),
        );
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($data_list));
    }

    // public function current_get(){
    //     $data['co_subject'] = '산업단지 현황';
    //     $this->load->view('/movein/movein_current',$data);
    // }

    public function current_get() {
        $data['co_subject'] = '산업단지 현황';
        $data['menu'] = 'just';
        $this->load->view("/movein/movein_current_normal_v", $data);
    }

    public function current_city_get() {
        $data['co_subject'] = '산업단지 현황';
        $data['menu'] = 'just';
        $this->load->view('/movein/movein_current_city_v', $data);
    }

    public function current_agriculture_get() {
        $data['co_subject'] = '산업단지 현황';
        $data['menu'] = 'just';
        $this->load->view('/movein/movein_current_agriculture_v', $data);
    }

    public function current_country_get() {
        $data['co_subject'] = '산업단지 현황';
        $data['menu'] = 'just';
        $this->load->view('/movein/movein_current_country_v', $data);
    }

    public function just_search_list_get(){
        $nowpage = $_GET['nowpage'];
        $pagelimit = 15;
        $sm = 1;

        if($nowpage == '1'){
            $nowpage = 0;
        }

        if ($nowpage >= 1){
            $pagelimit =  $nowpage * 15;
        }
        $snam = $this->get('snam'); // 단지 이름

        $KeyTy = $this->get('KeyTy'); // 업체명, 주소
        $typ = $this->get('typ'); // 구 번호
        $q_Val = $this->get('q_Val'); // 검색
        $just_num = $this->Movein_m->just_name($snam);
        $code_num = $just_num[0]['code_num'];
        $just_search =  $this->Movein_m->just_search($KeyTy,$typ,$q_Val,$code_num);
        $data_list['just_list'] = array(
            //'data' => $just_list,
            'data'=>$just_search,
            'page' => $_GET['nowpage'],
            'pagelimit'=>  $pagelimit,
            'total' => count($just_search),
        );
        $this->output->set_content_type('text/json');
        $this->output->set_output(json_encode($data_list));
    }

}