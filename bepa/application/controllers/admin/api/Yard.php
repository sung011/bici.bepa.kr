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
class Yard extends REST_Controller
{
    private $any_order = '';
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $page = 0;
    public $param_data = [];

    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
        $this->load->model('notice/Yard_m');
    }


    /*******************
     * 알림마당
     *******************/
	public function InList_post()
    {
		$ca_name = $this->post('ca_name');
		$nowpage = $this->post('nowpage');
		$bo_table = $this->post('bo_table');
		$searkey = $this->post('searkey');
		$searkeyword = $this->post('searkeyword');
		$complex = $this->post('complex');

		//echo json_encode($ca_name);

		if ($nowpage > 0) {
			if ($nowpage == '1'){ 
				$nextsno = 0;
			}else{
				$nextsno = $nowpage -1;
				$nextsno = $nextsno * 15;
			}
		}
		$this->Yard_m->add_sql ="";
		if($ca_name == "ym1"){
			$this->Yard_m->add_sql .= " ca_name='일반'  ";
		}else if($ca_name == "ym4"){
			$this->Yard_m->add_sql .= " ca_name='민원'  ";
		}
		if($searkeyword){
			if($searkey =="subcont"){
				$this->Yard_m->add_sql .= " ( wr_subject like '%".$searkeyword."%' or wr_content like '%".$searkeyword."%' )";
			}else{
				$this->Yard_m->add_sql .= " $searkey like '%".$searkeyword."%' ";
			}
		}

		if($bo_table == 'ym_notification'){
			if ($complex != 'all'){
				$this->Yard_m->add_sql = " ca_name = '{$complex}'";
			}
		}


		$this->request->body = $this->post();
		$this->Yard_m->param_data = $this->post();
		//$this->Yard_m->add_sql = " wr_subject =''  ";
		$returnData = $this->Yard_m->Inlist();
		//echo json_encode($returnData);
		$Totalcnt = $this->Yard_m->InCount();

		$j =0;
		if($Totalcnt[0]['cnt'] > 0){
			foreach($returnData as $key => $val){
				if($bo_table == 'ym_notification') {
					if ($val['ca_name'] != 'all') {
						$ca_name = $this->Yard_m->defineCode($val['ca_name']);
					} else {
						$ca_name = "전체";
					}
				}
				$sno = $Totalcnt[0]['cnt'] - $j- $nextsno;
				$date_array[] = array(
						'wr_subject' => $val['wr_subject'],
						'wr_name' => $val['wr_name'],
						'wr_sno' => $sno,
						'wr_datetime' => $val['wr_datetime'],
						'wr_hit' => $val['wr_hit'],
						'wr_id' => $val['wr_id'],
					    'wr_reply' => $val['wr_reply'],
						'Totalcnt' => $Totalcnt[0]['cnt'],
						'ca_name' => $ca_name,
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

    public function TechList_post()
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
		$this->request->body = $this->post();
		$this->Yard_m->param_data = $this->post();
		//$this->Yard_m->add_sql = " wr_subject =''  ";
		$returnData = $this->Yard_m->Techlist();
		$Totalcnt = $this->Yard_m->TechCount();
		
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

	public function StoryList_post()
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


		$this->request->body = $this->post();
		$this->Yard_m->param_data = $this->post();
		//$this->Yard_m->add_sql = " wr_subject =''  ";
		$returnData = $this->Yard_m->Storylist();
		$Totalcnt = $this->Yard_m->StoryCount();
		
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

	public function JobList_post()
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


		$this->request->body = $this->post();
		$this->Yard_m->param_data = $this->post();
		//$this->Yard_m->add_sql = " wr_subject =''  ";
		$returnData = $this->Yard_m->Joblist();
		$Totalcnt = $this->Yard_m->JobCount();
		
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
