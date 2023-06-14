<?php

class Admain_m extends CI_Model
{
    private $master = '';
	private $db_error = [];
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $page = 0;
    public $param_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('master', true);
    }

	public function Visitlist()
    {		
			$vi_time = date("H:i:s",strtotime("-10 min")) ;
			$vi_date = date("Y-m-d");	
			$this->master->select("COUNT(*) AS cnt");
			$this->master->where(" vi_date='".$vi_date."' AND vi_time > '".$vi_time."'  ");
			$this->master->from("g5_visit");
			$rs = $this->master->get();		
			$rows =  $rs->result_array();					
			return $rows;
    }

	public function Visitlist2()
    {		
			$vi_date = date("Y-m-d");
			$beforeDay = date("Y-m-d", strtotime(" -1 day"));
			$this->master->select("vs_count");
			$this->master->where(" vs_date in ('".$vi_date."','".$beforeDay."') ");
			$this->master->order_by("vs_date", 'desc');
			$this->master->from("g5_visit_sum");
			$rs = $this->master->get();		
			//echo $this->master->last_query();
			//exit;
			$rows =  $rs->result_array();					
			return $rows;
    }

	public function VisitMax()
    {					
			$this->master->select("vs_count");
			$this->master->order_by("vs_count", 'desc');
			$this->master->from("g5_visit_sum");
			$this->master->limit(1,0);
			$rs = $this->master->get();		
			$rows =  $rs->result_array();				
			return $rows;
    }

	public function VisitSum()
    {					
			$this->master->select("sum(vs_count) as tcnt");
			$this->master->from("g5_visit_sum");
			$rs = $this->master->get();		
			$rows =  $rs->result_array();				
			return $rows;
    }

	public function NewMember()
    {					
			$vi_date = date("Y-m-d");
			$this->master->select("count(*) as mcnt");
			$this->master->where(" mb_datetime > '".$vi_date."' ");
			$this->master->from("g5_member");
			$rs = $this->master->get();		
			$rows =  $rs->result_array();				
			return $rows;
    }

	public function SumMember()
    {					
			$vi_date = date("Y-m-d");
			$this->master->select("count(*) as mcnt");
			$this->master->from("g5_member");
			$rs = $this->master->get();		
			$rows =  $rs->result_array();				
			return $rows;
    }

	public function BoardSum()
    {							
			$this->master->select("*");
			$this->master->from("g5_board");
			$rs = $this->master->get();		
			$rows =  $rs->result_array();		
			$boardsum = 0;
			foreach($rows as $key => $val){
				
				$search_table = "g5_write_".$val['bo_table'];

				$this->master->select("count(*) as cnt");
				$this->master->from($search_table);
				$srs = $this->master->get();		
				$srows =  $srs->result_array();
				$boardsum =	$boardsum +	$srows[0]['cnt'];
			}
			return $boardsum;
    }

	public function NewMemberList()
    {					
			$this->master->select("*");
			$this->master->order_by("mb_datetime", 'desc');
			$this->master->from("g5_member");
			$this->master->limit(4,0);
			$rs = $this->master->get();		
			$rows =  $rs->result_array();				
			return $rows;			
    }
    
    public function defineCodeList(){
		$sql ="
			select * from define_code where CODE_NAM = 'complex' order by CODE_NAM ASC;
		";
		$rs = $this->master->query($sql);
		$rows =  $rs->result_array();
		return $rows;
	}

	public function BoardList()
    {					
		$sql = "
		SELECT HE.wr_subject, HE.wr_name,HE.wr_datetime
		FROM (
		SELECT * FROM g5_write_ym_notice
		UNION ALL
		SELECT * FROM g5_write_ym_tender
		UNION ALL
		SELECT * FROM g5_write_ym_hitech
		UNION ALL
		SELECT * FROM g5_write_ym_photo
		UNION ALL
		SELECT * FROM g5_write_ym_media
		UNION ALL
		SELECT * FROM g5_write_ym_story
		UNION ALL
		SELECT * FROM g5_write_ym_job
		UNION ALL
		SELECT * FROM g5_write_ga_form
		UNION ALL
		SELECT * FROM g5_write_cs_support

		) HE
		ORDER BY HE.wr_datetime DESC
		LIMIT 5";
        $rs = $this->master->query($sql);
		$rows =  $rs->result_array();				
		return $rows;		
    }

	public function PopupSearch()
    {		
			extract($this->param_data);
			$nw_id = (isset($nw_id)) ? $nw_id : NULL;     
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->order_by("nw_id", 'desc');
			$this->master->from("g5_new_win");
			$rs = $this->master->get();	
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			
			return $rows;
    }

	public function PopupDel()
    {		
			extract($this->param_data);
			$wrid = (isset($wrid)) ? $wrid : NULL;     
		
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
	
			$this->master->where(" nw_id in (".$wrid.") ");
			 //$this->master->update("g5_new_win", $query_data);
			$this->master->delete("g5_new_win");
			//echo $this->master->last_query();
			//exit;
			 if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
				$this->db_error = $this->master->error();
			 }
			require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

			return $result_array;
    }

	public function PopupIn()
    {
			
			extract($this->param_data);
			
			$nw_id = (isset($nw_id)) ? $nw_id : NULL; 
			$nw_division = (isset($nw_division)) ? $nw_division : 'comm'; 
			$nw_device = (isset($nw_device)) ? $nw_device : 'both';
			$nw_begin_time = (isset($nw_begin_time)) ? $nw_begin_time :''; 
			$nw_end_time = (isset($nw_end_time)) ? $nw_end_time : '';  
			$nw_disable_hours = (isset($nw_disable_hours)) ? $nw_disable_hours : '24'; 
			$nw_subject = (isset($nw_subject)) ? $nw_subject : ''; 
			$nw_content = (isset($nw_content)) ? $nw_content : ''; 

			if($nw_id){

				$query_data = array(
					"nw_division" => $nw_division
					,"nw_device" => $nw_device
					,"nw_begin_time" => $nw_begin_time
					,"nw_end_time" => $nw_end_time
					,"nw_disable_hours" => $nw_disable_hours
					,"nw_subject" => $nw_subject
					,"nw_content" => $nw_content
				);
				$this->master->where(" nw_id =".$nw_id." ");
				$this->master->update("g5_new_win", $query_data);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}

			}else{

				$this->master->select("MAX(nw_id) +1 as next_id");
				$this->master->from("g5_new_win");
				$rs = $this->master->get();

				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];
				if($next_wrid){
				}else{
					$next_wrid = 1;
				}		

				$add_Date = array(
					"nw_id" => $next_wrid,
					"nw_division" => $nw_division,
					"nw_device" => $nw_device,
					"nw_begin_time" => $nw_begin_time,
					"nw_end_time" => $nw_end_time,
					"nw_disable_hours" => $nw_disable_hours,
					"nw_left" => 0,							
					"nw_top" => 0,
					"nw_height" => 0,
					"nw_width" => 0,
					"nw_subject" => $nw_subject,
					"nw_content" => $nw_content,					
					"nw_content_html" => 0
				);

				$this->master->insert("g5_new_win", $add_Date);
				
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}				
			}
			return $result_array;
    }



}