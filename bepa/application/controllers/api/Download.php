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
class Download extends REST_Controller
{


    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
		$this->load->library('session');
		$this->load->model('/util/Download_m');
        $this->load->helper('download');
    }


    /*******************
     * 다운로드

     *******************/
    public function index_get()
    {
		
		$bo_table = $this->get('bo_table');
		$wr_id = $this->get('wr_id');		
		$bf_no = $this->get('no');


		$search_table = $bo_table;
		$this->Download_m->add_sql ="";
		$this->Download_m->add_sql .= " bo_table='".$search_table."' and wr_id='".$wr_id."' and bf_no='".$bf_no."' ";

		$this->Download_m->param_data = $this->get();
		$returnData = $this->Download_m->board_list();
        //var_dump($returnData);
		foreach($returnData as $key => $val){			
			$lodate ="./data/file/".$bo_table."/".$val['bf_file'];
			$data = file_get_contents($lodate);
			$val['bf_source'] = iconv('utf-8', 'euc-kr', $val['bf_source']);
			force_download( $val['bf_source'], $data);
		}	

		//echo json_encode($returnData, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE);				
    }
}