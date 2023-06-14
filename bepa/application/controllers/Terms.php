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
class Terms extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();
        # 로그인 체크
		$this->load->library('session');
		$this->load->model("api_header_m");
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
    public function provision_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/terms/provision',$data);
    }

	public function privacy_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/terms/privacy',$data);
    }

	public function emailembargo_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/terms/emailembargo',$data);
    }
	
}