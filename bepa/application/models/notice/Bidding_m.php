<?php

class Bidding_m extends CI_Model
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
     * 매장 설정 조회
     **************/
    public function Blist()
    {
			
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_tender");
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


	public function Countlist()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("a.wr_id", 'desc');
			$this->master->from("g5_write_ym_tender as a");
			//echo $this->master->last_query();
			//exit;
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }
	

}