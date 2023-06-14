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
class Management extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        # 로그인 체크
        $this->load->library('session');
        $this->load->model('Log_visit_m');
        $this->load->model('/admin/Admain_m');
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

    public function agency_get(){
        $this->log();
        $data['menu'] = 'just';
        $data['co_subject'] = '관리기관 정보';
        $this->load->view('/management/agency',$data);
    }

    public function movingin_get(){
        $this->log();
        $data['menu'] = 'just';
        $data['co_subject'] = '입주기업체 검색';
        $data['large'] = $this->Management_m->large();
        $this->load->view('/management/movingin',$data);
    }

    public function trends_get(){
        $this->log();
        $data['bo_table']= "ym_trends";
        $data['menu'] = 'just';
        $data['co_subject'] = '통계자료';
        $this->load->view('/management/trends',$data);
    }

    public function description_get(){
        $this->log();
       //$data['bo_table']= "ym_trends";
        $data['menu'] = 'just';
        $data['co_subject'] = '산업단지 업종검색';
        $this->load->view('/management/description',$data);
    }

    public function notification_get(){
        $this->log();
        $data['bo_table']= "ym_notification";
        $data['menu'] = 'just';
        $data['co_subject'] = '산업단지고시 정보';
        $data['complex'] = $this->Admain_m->defineCodeList();
        $this->load->view('/management/notification',$data);
    }
	public function instatus_get(){
        $this->log();
       //$data['bo_table']= "ym_trends";
        $data['menu'] = 'just';
        $data['co_subject'] = '산업단지 입주 및 운영현황';
        $this->load->view('/management/instatus',$data);
    }
}