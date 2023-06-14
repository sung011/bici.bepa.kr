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
class Video extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('/notice/video_m');
    }


    /*******************
     * 메인 view
     * anyorder_07.html
     *******************/
    public function List_post()
    {
		//echo "aaa";
		//exit;  
		$nowpage = $this->post('nowpage');

		//echo $nowpage;
		//exit;
		if ($nowpage > 0) {
			if ($nowpage == '1'){ $nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}

		$this->video_m->param_data = $this->post();
		$returnData = $this->video_m->Vlist();
		$Totalcnt = $this->video_m->Countlist();
		
		$j =0;
		if($Totalcnt[0]['cnt'] > 0){
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$date_array[] = array(
						'wr_subject' => $val['wr_subject'],
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
}