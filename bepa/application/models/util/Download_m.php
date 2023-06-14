<?php

class Download_m extends CI_Model
{
    private $db_error = [];
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $param_data = [];
	public $downcnt_data = [];

    public function __construct()
    {
        parent::__construct();
         $this->master = $this->load->database('master', true);
    }

    /******************
     * 다운로드
     ******************/
    public function board_update()
    {

		extract($this->downcnt_data);
		$bf_download = (isset($bf_download)) ? $bf_download : NULL; 
        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);

		
		//echo $this->master->last_query();
		//exit;

    }

	  public function board_list()
    {
        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);

		$this->master->from("g5_board_file ");
        $rs = $this->master->get();
        $rows = $rs->result_array();

		if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
		$query_data = array(
                "bf_download" => $rows[0]['bf_download'] +1
        );
        $this->master->update("g5_board_file", $query_data);
		//echo $this->master->last_query();
		//exit;

        return $rows;
    }




    ###################################################################################
}