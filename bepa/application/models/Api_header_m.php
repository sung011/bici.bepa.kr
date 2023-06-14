<?php

class Api_header_m extends CI_Model
{
    public $method = 'POST';
    public $request_case = '';

    public function __construct()
    {
        parent::__construct();
		 $this->master = $this->load->database('master', true);
    }

    ## 인증
    function api_header_check()
    {
		/*
        $header_info = getallheaders();
		
		if (!$_SESSION['ss_mb_buid']) { // 로그인중
			 alert("로그인 후 이용하실 수 있습니다.", "");
			 exit;      
		} 
		*/
		$vi_ip = $_SERVER['REMOTE_ADDR'];		
		$vi_date = date('Y-m-d');
		$vi_time = date('H:i:s');
		$vi_agent = $_SERVER['HTTP_USER_AGENT']; 
		$_SERVER['HTTP_REFERER'] = (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] :"";	
		$vi_referer = $_SERVER['HTTP_REFERER'];
		
		$this->master->select("COUNT(vi_id) AS Tcnt");
		$this->master->where("vi_ip='".$vi_ip."' and vi_date='".$vi_date."' ");
		$this->master->from("g5_visit");
		$rs = $this->master->get();
		$rows = $rs->result_array();
		
		if($rows[0]['Tcnt'] >0){
			$in_Date = array(
				"vi_time" => $vi_time,
			);
			$this->master->where("vi_ip='".$vi_ip."' and vi_date='".$vi_date."' ");
			$this->master->update('g5_visit', $in_Date);
			
		}else{

			$this->master->select("MAX(vi_id) +1 as next_id");
			$this->master->from('g5_visit');
			$rs = $this->master->get();

			$nrows = $rs->result_array();
			$next_viid = $nrows[0]['next_id'];
		
			$in_Date = array(
				"vi_id" => $next_viid,
				"vi_ip" => $vi_ip,
				"vi_date" => $vi_date,
				"vi_time" => $vi_time,
				"vi_referer" => $vi_referer,		
				"vi_agent" => $vi_agent,
			);
			$this->master->insert('g5_visit', $in_Date);
			
			$this->master->select("vs_count");
			$this->master->where("vs_date='".$vi_date."' ");
			$this->master->from("g5_visit_sum");
			$rs = $this->master->get();
			$vrows = $rs->result_array();
			$vrows[0]['vs_count'] = (isset($vrows[0]['vs_count'])) ? $vrows[0]['vs_count'] :0;	

			if($vrows[0]['vs_count'] > 0){
				$up_Date = array(
				"vs_count" => $vrows[0]['vs_count'] + 1
				);
				$this->master->where("vs_date='".$vi_date."' ");
				$this->master->update('g5_visit_sum', $up_Date);
			}else{
				$up_Date = array(
				"vs_date" => $vi_date,
				"vs_count" => 1
				);
				$this->master->insert('g5_visit_sum', $up_Date);
			}
			//exit;
		}

    }

	function api_admin_header_check()
    {
        $header_info = getallheaders();
		if ($_SESSION['mb_level'] !='10'){
			alert('관리자권한이 없습니다.','/Main');
			exit;      
		} 
    }

    function content_check_blank()
    {
        header('charset=UTF-8');
        if ($_SERVER['CONTENT_TYPE'] != '') {
            header('HTTP/1.1 400 Check `CONTENT_TYPE`', true, 400);
            echo json_encode(array('success' => false));
            exit;
        }
    }

    function content_check_json($request_body = [])
    {
        if (!in_array('application/json', explode(';', $_SERVER['CONTENT_TYPE']))) {
            header('HTTP/1.1 400 Check `CONTENT_TYPE`', true, 400);
            echo json_encode(array('success' => false, 'message' => 'Check `CONTENT_TYPE`'));
            exit;
        }

        if (count($request_body) === 0) {
            header('HTTP/1.1 400 json data format error', true, 400);
            echo json_encode(array('success' => false, 'message' => 'json data format error'));
            exit;
        }

        header('Content-Type: application/json; charset=UTF-8');
    }

	 function content_check_json2()
    {
        header('Content-Type: application/json; charset=UTF-8');

        if (!in_array('application/json', explode(';', $_SERVER['CONTENT_TYPE']))) {
            echo json_encode(array('result_code' => 'E001'));
            exit;
        }
    }

    function content_check_urlencoded()
    {
        header('Content-Type: application/x-www-form-urlencoded; charset=UTF-8');

        if (!in_array('application/x-www-form-urlencoded', explode(';', $_SERVER['CONTENT_TYPE']))) {
            header('HTTP/1.1 400 Check `CONTENT_TYPE`', true, 400);
            echo json_encode(array('success' => false));
            exit;
        }
    }
}