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
class Complex extends REST_Controller
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
    public function Location_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();

		$this->InAdmData_m->add_sql = " co_id='ic_about_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();
		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}
        $data['menu'] = 'just';
        $data['co_subject'] = '산업단지 개요';
        $this->load->view('/complex/com_location',$data);
    }

	public function Status_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$this->InAdmData_m->add_sql = " co_id='ic_condi_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}
        $data['co_subject'] = '일반현황';
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/complex/com_status',$data);
    }

	public function Map_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
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
		//print_r($data);
		//exit;
        $data['co_subject'] = '공단위치도';
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/complex/com_map',$data);
    }

	public function Area_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$this->InAdmData_m->add_sql = " co_id='ic_area_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();

		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}
        $data['co_subject'] = '조성면접';
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/complex/com_area',$data);
    }

}