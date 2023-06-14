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

class Login extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 체크
		$this->load->helper(array('form', 'url'));
		//$this->load->helpers('alert');
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

     *******************/
    public function Userck_post()
    {

        function sql_old_password($value) {
            if ($value == '')
                return '';

            $nr = 1345345333;
            $add = 7;
            $nr2 = 0x12345671;
            foreach(str_split($value) as $c) {
                if ($c == ' ' or $c == "\t")
                    continue;
                $tmp = ord($c);
                $nr ^= ((($nr & 63) + $add) * $tmp) + (($nr << 8) & 0xFFFFFFFF);
                $nr2 += (($nr2 << 8) & 0xFFFFFFFF) ^ $nr;
                $add += $tmp;
            }

            if ($nr2 > PHP_INT_MAX)
                $nr2 += PHP_INT_MAX + 1;

            $bit = (1 << 31) -1;

            return sprintf("%08lx%08lx", $nr & $bit, $nr2 & $bit);
        }

		//$this->api_header_m->api_header_check();
		$Snic_id = $this->post('Snic_id');
		$Snic_pw = $this->post('Snic_pw');

		$sn_pw = sql_old_password($Snic_pw);


        //var_dump("asd");
		//var_dump(sql_old_password($Snic_pw));
		$this->LoginCheck_m->add_sql = "";

		if($Snic_id){
			$this->LoginCheck_m->add_sql .= " mb_id ='".$Snic_id."' and mb_password = '".$sn_pw."'";
		}

		$this->LoginCheck_m->param_data = $this->get();
		$returnData = $this->LoginCheck_m->get_member();
		$logindata = count($returnData);
		

		if($logindata > 0){
			foreach($returnData as $key => $val){
				session_unset();
				$this->session->set_userdata( 'mb_id', $val['mb_id'] );
				$this->session->set_userdata( 'mb_name', $val['mb_name'] );
				$this->session->set_userdata( 'mb_hp', $val['mb_hp'] );
				$this->session->set_userdata( 'mb_email', $val['mb_email'] );
				$this->session->set_userdata( 'mb_level', $val['mb_level'] );
				$this->session->set_userdata( 'mb_password', $val['mb_password'] );
				$this->session->set_userdata( 'mb_oripw', $Snic_pw);
				$this->session->set_userdata( 'muid', $val['mb_no']);
				$this->session->set_userdata( 'buid', $val['mb_1']);
			}
//var_dump($this->session);
//        exit();

			redirect('/Main');
		}else{
			session_unset();
            echo "<script>alert('일치하지 않는 아이디입니다.'); location.replace('/index.php/Register/Login'); </script>";
			//alert('일치하지 않는 아이디입니다.');
		}

    }

	public function LogOut_get()
    {
		//$this->api_header_m->api_header_check();	
		session_unset();
		//print_r($_SESSION);
		//exit;
		//alert('로그아웃 되었습니다..','/Main');
		//redirect('/Main');
		echo "<script>alert('로그아웃 되었습니다..')</script>";
		redirect('/Main');
		
    }
	public function Myinfo_get()
    {			
		$this->api_header_m->api_header_check();
        $data['pageTitle'] = '성남산업단지관리공단';
        $this->load->view('/terms/cert',$data);		
    }

	public function Passck_post()
    {
		$this->api_header_m->api_header_check();
		$passck = $this->post('passck');
		$Snid =	$this->session->userdata('mb_id');
		if($passck){
			$this->LoginCheck_m->add_sql .= " mb_id ='".$Snid."' and mb_password = old_password('".$passck."')";
		}	
		$this->LoginCheck_m->param_data = $this->get();
		$returnData = $this->LoginCheck_m->get_member();
		$logindata = count($returnData);
		if($logindata == 1){
			$responseData ="E200";
		}else{
			$responseData ="E500";
		}
		echo $this->response($responseData, 200);				
    }

	public function Duplication_post()
    {
		$this->api_header_m->api_header_check();
		$Duplval = $this->post('Duplval');
		$searkey = trim($this->post('searkey'));
		$this->LoginCheck_m->add_sql = "";
		if($Duplval =="mb_id"){
			$this->LoginCheck_m->add_sql .= " mb_id ='".$searkey."' ";
		}
		if($Duplval =="mb_nick"){
			$this->LoginCheck_m->add_sql .= " mb_nick ='".$searkey."' ";
		}	
		if($Duplval =="mb_email"){
			$this->LoginCheck_m->add_sql .= " mb_email ='".$searkey."' ";
		}	
		$this->LoginCheck_m->param_data = $this->get();
		$returnData = $this->LoginCheck_m->get_member();
		$logindata = count($returnData);
		if($logindata == 0){
			$responseData ="E200";
		}else{
			$responseData ="E500";
		}
		echo $this->response($responseData, 200);				
    }

	public function Company_post()
    {
		$this->api_header_m->api_header_check();
		$searkey = trim($this->post('searkey'));
		$this->LoginCheck_m->add_sql = "";
		if($searkey){
			$this->LoginCheck_m->add_sql .= " (INC_NAM like '%".$searkey."%' or CEO_NAM like '%".$searkey."%')";
		}

		$this->LoginCheck_m->param_data = $this->get();
		$returnData = $this->LoginCheck_m->get_company();
		if($returnData){
			$j =0;
			foreach($returnData as $key => $val){			
				$date_array[] = array(
					'name' => $val['INC_NAM'],
					'ceo_name' => $val['CEO_NAM'],
					'uid' => $val['uid'],
					'cert_num' => $val['cert_num'],
					'add' => $val['NEW_ADD'],
					'tel_n' => $val['TEL_NUM'],
					'fax_n' => $val['FAX_NUM'],
					'rep_s' =>$val['REP_SPC'],
					'bsn_l' =>$val['BSN_LIC'],
				);
				$j++;

			}
			echo json_encode($date_array);
		}else{
			$error_date ="E500";
			echo json_encode($error_date);
		}					
    }
}