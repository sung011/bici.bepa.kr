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
class Photo extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('/notice/Photo_m');
    }


    /*******************
     * 메인 view
     * anyorder_07.html
     *******************/
    public function PhotoList_post()
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

		$this->Photo_m->param_data = $this->post();

		$returnData = $this->Photo_m->Blist();

		$Totalcnt = $this->Photo_m->Countlist();
		
		$j =0;
		if($Totalcnt[0]['cnt'] > 0){
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
		
				//$img_tex = explode('{',$val['eb_3']);
				//$img_tex2 =  explode(';',$img_tex[2]);
				//$img_tex3 =  explode(':',$img_tex2[1]);
				//$photo_img = str_replace('"','',$img_tex3[2]);
				$contents = $val['wr_content'];
				preg_match_all("/<img[^>]*src=[\'\"]?([^>\'\"]+)[\'\"]?[^>]*>/", $contents, $matches);
				$photo_img = $matches[1][0];
				//echo $photo_img;
				//exit;
				$date_array[] = array(
						'wr_subject' => $val['wr_subject'],
						'photo_img' =>$photo_img,
						'wr_name' => $val['wr_name'],
						'wr_sno' => $sno,
						'wr_datetime' => $val['wr_datetime'],
						'wr_hit' => $val['wr_hit'],
						'wr_id' => $val['wr_id'],
						'Totalcnt' => $Totalcnt[0]['cnt']
				);
				$j++;

			}
			echo json_encode($date_array);
		}else{
			$error_date ="E500";
			echo json_encode($error_date);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);		
    }

	public function PhotoDel_post()
    {
		$wrid = $this->post('wrid');

		if($wrid){
			$this->Photo_m->param_data = $this->post();
			$returnData = $this->Photo_m->PhotoDel();

			if($returnData['success']==true){		
				$date_array ="E200";
				echo json_encode($date_array);
			}else{
				$date_array ="E500";
				echo json_encode($date_array);
			}
		}else{
			$date_array ="E500";
			echo json_encode($date_array);
		}
		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);		
    }
}