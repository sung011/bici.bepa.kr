<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';


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

class Notice extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('/notice/List_m');
    }


    /*******************
     * 메인 view
     * anyorder_07.html
     *******************/
    public function List_post()
    {
		//echo "aaa";
		//exit;  
        $ca_name = $this->post('ca_name');
		$nowpage = $this->post('nowpage');
		$searkey = $this->post('searkey');
		$searkeyword = $this->post('searkeyword');
		//echo $nowpage;
		//exit;
		if ($nowpage > 0) {
			if ($nowpage == '1'){ $nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}
		$this->List_m->add_sql ="";
		if($ca_name == "ym1"){
			$this->List_m->add_sql .= " ca_name='공지'  ";
		}else if($ca_name == "ym2"){
			$this->List_m->add_sql .= " ca_name='행사'  ";
		}else if($ca_name == "ym3"){
			$this->List_m->add_sql .= " ca_name='교육'  ";
		}else if($ca_name == "ym4"){
			$this->List_m->add_sql .= " ca_name='지원'  ";
		}

		if($searkeyword){
			if($searkey =="subcont"){
				$this->List_m->add_sql .= " ( wr_subject like '%".$searkeyword."%' or wr_content like '%".$searkeyword."%' )";
			}else{
				$this->List_m->add_sql .= " $searkey like '%".$searkeyword."%' ";
			}
		}

		$this->List_m->param_data = $this->post();
		$returnData = $this->List_m->Noticelist();
		$Totalcnt = $this->List_m->Countlist();
		
		
		if($Totalcnt[0]['cnt'] > 0){
			$j =0;
			foreach($returnData as $key => $val){
				
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$date_array[] = array(
					'wr_subject' => $val['wr_subject'],
					'wr_sno' => $sno,
					'wr_1' => $val['wr_1'],
					'wr_2' => $val['wr_2'],
					'wr_3' => $val['wr_3'],
					'wr_hit' => $val['wr_hit'],
					'ca_name' => $val['ca_name'],
					'wr_id' => $val['wr_id'],
					'eb_2' => $val['eb_2'],
					'wr_10' => $val['wr_10'],
					'wr_reply' => $val['wr_reply'],
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