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
class LoginCheck extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('LoginCheck_m');
    }


    /*******************
     * 메인 view
     * anyorder_07.html
     *******************/
    public function index_post()
    {

		session_unset();

		# 아이디
        $id = $this->post('id');
		$id = trim($id);
		$id = str_replace('-','', $id);
			
        # 비밀번호
        $password = $this->post('password');
		$password = trim($password);


		//$this->LoginCheck_m->param_data = $password;
		//$passck = $this->LoginCheck_m->passcheck($password);

		$row['pass'] ="d8d1a55d76c355d2ded6348acef48cb21489a4e77a2ced266d0367de7a803b02";
		//if (!$id || !$password)
		//alert('회원아이디 또는 비밀번호를 입력해 주세요.');
		$this->LoginCheck_m->add_sql = " id = TRIM('$id')  ";
		$mb = $this->LoginCheck_m->get_member();

		//print_r($mb);
		//echo $mb[0]['id'];
		//exit;
		

		if (empty($mb[0]['id']) || (trim($row['pass']) != trim($mb[0]['password']))) {
			alert('가입된 회원아이디가 아니거나 비밀번호가 틀립니다.\\n비밀번호는 대소문자를 구분합니다.');
			exit;
		}

		session_start();
		
		$_SESSION["ss_mb_id"] = $mb[0]['id'];
		$_SESSION["ss_mb_buid"] = $mb[0]['buid'];
		$_SESSION["ss_mb_key"] =  md5($mb[0]['regist_date']."".get_real_client_ip()."".$_SERVER['HTTP_USER_AGENT']);
		//set_session('ss_mb_id', $mb['id']);
		//set_session('ss_mb_buid', $mb['buid']);
		//set_session('ss_mb_key', md5($mb['regist_date'] . get_real_client_ip() . $_SERVER['HTTP_USER_AGENT']));
		//print_r($_SESSION);
		//EXIT;
        $data['pageTitle'] = '기업관리자';
        //$this->load->view('BizMain',$data);
		
        redirect(base_url() . 'BizMain');
    }
}