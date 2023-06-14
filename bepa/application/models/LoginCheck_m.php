<?php

class LoginCheck_m extends CI_Model
{
    private $master = '';
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $page = 0;
    public $param_data = [];

    public function __construct()
    {
        parent::__construct();
		//$this->load->library('encrypt');
        $this->master = $this->load->database('master', true);
		
    }

    /**************
     * 매장 설정 조회
     **************/
    public function get_member()
    {
		extract($this->param_data);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $rs = $this->master->get("g5_member");
	    //echo $this->master->last_query();
        //exit;
        $rows = $rs->result_array();
        return $rows;
    }
	
	public function passcheck($request_body = [])
    {
		$password = get_encrypt_string($request_body);
		//$password = encode($request_body);
		$sql = "select sha2(hex('".$password."'), 256) as pass";
		$rs =  $this->master->query($sql);
		
        $rows = $rs->result_array();
        return $rows;
    }

	public function VisitIn()
    {
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

	 public function get_company()
    {
		extract($this->param_data);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $rs = $this->master->get("CPT_CORP_DT");
	    //echo $this->master->last_query();
        //exit;
        $rows = $rs->result_array();
        return $rows;
    }


}