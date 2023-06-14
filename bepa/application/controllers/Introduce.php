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
class Introduce extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->library('session');
		$this->load->model("api_header_m");
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

     *******************/
    public function greeting_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/introduce/introduce_greeting',$data);
    }

	public function history_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/introduce/introduce_history',$data);
    }

	public function vision_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/introduce/introduce_vision',$data);
    }

	public function organize_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$this->InAdmData_m->add_sql = " co_id='ia_system_e' ";
		$returnData = $this->InAdmData_m->Admcontentlist();
		foreach($returnData as $key => $val){	
			$data['co_id'] = $val['co_id'];
			$data['co_subject'] = $val['co_subject'];
			$data['co_content'] = $val['co_content'];
			$data['co_html'] = $val['co_html'];
		}

        $data['co_subject'] = '조직/기능';
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/introduce/introduce_organize',$data);
    }

	public function load_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/introduce/introduce_load',$data);
    }

}