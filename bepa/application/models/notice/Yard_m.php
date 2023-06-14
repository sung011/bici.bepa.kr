<?php

class Yard_m extends CI_Model
{
    private $any_order = '';
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

    /**************
     * 알림마당 조회
     **************/
	public function Inlist()
    {
			
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : '';   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;  
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			
			$search_table = "g5_write_".$bo_table;
			if(empty($ca_name)) $ca_name= '';
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_reply,ca_name");
			$this->master->where("wr_option",'html1');
			$this->master->order_by("wr_parent", 'desc');
			$this->master->order_by("wr_reply", 'asc');
			$this->master->from($search_table);
			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function InCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			
			$search_table = "g5_write_".$bo_table;
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

    public function defineCode($ca_name){
		$sql = "
			select CHAN_CODE from define_code where CODE_NUM = '{$ca_name}';
		";
		$rs =  $this->master->query($sql);
		$rows = $rs->result_array();
		return $rows;
	}

    public function Techlist()
    {
			
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_hitech");
			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }


	public function TechCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_hitech");
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function Storylist()
    {
			
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_story");
			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }


	public function StoryCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_story");
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function Joblist()
    {
			
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_job");
			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }


	public function JobCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_job");
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function BoardList()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);

			$this->master->from("g5_board");
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

    public function YmTender(){
        $this->master->select("wr_id, wr_subject, wr_datetime");
        $this->master->from("g5_write_ym_parcelout");
        $this->master->order_by("wr_1", 'desc');
        $this->master->order_by("wr_id", 'desc');
        $this->master->limit(4,0);
        $rs = $this->master->get();
        $rows = $rs->result_array();
	    return $rows;
    }

    public function YmTender1(){
        $this->master->select("wr_id, wr_subject, wr_datetime");
        $this->master->from("g5_write_ym_parcelout");
        $this->master->order_by("wr_id", 'desc');
        $this->master->limit(1,0);
        $rs = $this->master->get();
        $rows = $rs->result_array();
	    return $rows;
    }

}
