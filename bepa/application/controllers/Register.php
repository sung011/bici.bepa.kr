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
class Register extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->helper('captcha');
		$this->load->library('session');
		$this->load->model('api_header_m');
		$this->load->model('LoginCheck_m');
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
    public function Agree_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('RegisterAgree',$data);
    }

	public function Join_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('RegisterJoin',$data);
    }

	public function Mod_get()
    {
        $this->log();
		$this->api_header_m->api_header_check();
		$Snid =	$this->session->userdata('mb_id');
		if($Snid){
			$this->LoginCheck_m->add_sql .= " mb_id ='".$Snid."' ";
		}	
		$this->LoginCheck_m->param_data = $this->get();
		$returnData = $this->LoginCheck_m->get_member();
	
		$data['responseData'] = $returnData;
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('RegisterUpdate',$data);
    }

	public function Login_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('Login',$data);
    }
	public function IdFind_get()
    {
        $this->log();
		//$this->api_header_m->api_header_check();
		$captcha_word = $this->input->post('captcha_word');

		if($captcha_word != '') {
			$data['result'] = $captcha_word == $this->session->flashdata('captcha_word') ? 'SUCESS' : 'FAIL';
		} else {
			$data['result'] = '';
		}
		$data['cap'] = $this->_auth_img();
		

        $data['pageTitle'] = '성남산업단지관리공단';
		//print_r($data);
		//exit;
        $this->load->view('Idfind',$data);
    }

	function _auth_img()
	{
		$captcha_word = rand(23678190, 96523469);
		$config = array(
		    'word'	 => $captcha_word,
		    'img_path'	 => FCPATH . 'sample/cap/',
		    'img_url'	 => site_url('sample/cap') . '/',
		    'font_path'	 => BASEPATH . 'fonts/texb.ttf',
		    'img_width'	 => '150',
		    'img_height' => 30,
		    'expiration' => 30
	    );
	 
	   $this->session->set_flashdata('captcha_word', $captcha_word);
	    
		return create_captcha($config);
	}
}