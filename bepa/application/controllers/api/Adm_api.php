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
class Adm_api extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('/admin/InAdmData_m');
		$this->load->model('/admin/Admain_m');
    }


    /*******************
     * 메인 view
     * anyorder_07.html
     *******************/
    public function BannerList_post()
    {

		$nowpage = $this->post('nowpage');
		if ($nowpage > 0) {
			if ($nowpage == '1'){ 
				$nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}
		$this->InAdmData_m->param_data = $this->post();
		$returnData = $this->InAdmData_m->Bannlist();
		$Totalcnt = $this->InAdmData_m->BannerCnt();
		$j =0;
		if($Totalcnt[0]['cnt'] > 0){
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$date_array[] = array(
						'wr_id' => $val['wr_id'],
						'wr_subject' => $val['wr_subject'],
						'wr_content' => $val['wr_content'],
						'banner_img' => $val['bf_file'],
						'wr_link1' => $val['wr_link1'],
						'wr_sno' => $sno,
						'wr_datetime' => $val['wr_datetime'],
						'wr_hit' => $val['wr_hit'],					
						'Totalcnt' => $Totalcnt[0]['cnt']
				);
				$j++;
			}

			//print_r($date_array);
			//exit;
			echo json_encode($date_array);
		}else{
			$error_date ="E500";
			echo json_encode($error_date);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }
	public function BannerDel_post()
    {

		$wrid = $this->post('wrid');

		$this->InAdmData_m->param_data = $this->post();
		$returnData = $this->InAdmData_m->BannerDel();

		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }

	public function PopupDel_post()
    {

		$wrid = $this->post('wrid');

		$this->Admain_m->param_data = $this->post();
		$returnData = $this->Admain_m->PopupDel();

		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }

	public function CustomDel_post()
    {

		$mb_no = $this->post('mb_no');

		$this->InAdmData_m->param_data = $this->post();
		$returnData = $this->InAdmData_m->CustomDel();

		if($returnData['success']==true){		
			$date_array ="E200";
			echo json_encode($date_array);
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);			
    }


}