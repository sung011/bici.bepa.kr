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
class Company extends REST_Controller{

    //private $http_state_code = 500;

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        # 로그인 체크
        $this->load->library('session');
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

    public function newly_get()
    {
        $this->log();
        $this->load->view('/company/newly');
    }

    public function integrated_get(){
        $this->log();
        $this->load->view('/company/integrated');
    }

    public function around_get(){
        $this->log();
        $this->load->view('/company/around');
    }
}