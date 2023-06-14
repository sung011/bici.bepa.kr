<?php

class List_m extends CI_Model
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
     * 공지 리스트
     **************/
    public function Noticelist()
    {			
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : 'ALL';   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;    
			if(empty($ca_name)) $ca_name="ALL";
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			//print_r($ca_name);
			//exit;
			$this->master->where("wr_option",'html1');
			if($ca_name =="ALL" || $ca_name =="ALL2"){
			$this->master->order_by("wr_10", 'desc');
			$this->master->order_by("wr_datetime", 'desc');
			}
			$this->master->order_by("wr_datetime", 'desc');
			$this->master->order_by("wr_parent", 'desc');
			$this->master->order_by("wr_reply", 'asc');
			$this->master->from("g5_write_ym_notice");

			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$this->master->limit(15, $nowpage);
			}
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function Countlist()
    {		
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : NULL;   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("a.wr_id", 'desc');
			$this->master->from("g5_write_ym_notice as a");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function Ncountlist()
    {		
		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->where(" ca_name='공지' ");
			$this->master->order_by("a.wr_id", 'desc');
			$this->master->from("g5_write_ym_notice as a");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function Ecountlist()
    {		
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : NULL;   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #		
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(*) as cnt");	
			$this->master->order_by("a.wr_id", 'desc');
			$this->master->from("g5_write_ym_notice as a");
			$this->master->where(" ca_name='행사' ");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function NoticeCount()
    {		
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : NULL;   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #		
			$this->master->select("COUNT(wr_id) AS Tcnt");
			$this->master->select(",sum(if(ca_name='공지',1,0)) AS Ncnt");	
			$this->master->select(",sum(if(ca_name='행사',1,0)) AS Ecnt");	
			$this->master->select(",sum(if(ca_name='교육',1,0)) AS Jcnt");
			$this->master->select(",sum(if(ca_name='지원',1,0)) AS Kcnt");
			$this->master->from("g5_write_ym_notice");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function SupportCount()
    {		
			extract($this->param_data);
			$ca_name = (isset($ca_name)) ? $ca_name : NULL;   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 0;     #		
			$this->master->select("COUNT(wr_id) AS Tcnt");
			$this->master->from("g5_write_cs_support");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function MainNlist()
    {

			extract($this->param_data);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
			$this->master->where("ca_name != '지원'");
            $this->master->order_by("wr_1", 'desc');
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_notice");
			$this->master->limit(4,0);
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }
    public function MainNlist1(){
        extract($this->param_data);
        $this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
        $this->master->where("ca_name != '지원'");
        $this->master->order_by("wr_id", 'desc');
        $this->master->from("g5_write_ym_notice");
        $this->master->limit(1,0);
        $rs = $this->master->get();
        $rows = $rs->result_array();
        return $rows;
    }

	public function Mainslist()
    {	
			extract($this->param_data);	
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
			$this->master->where("ca_name = '지원'");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from("g5_write_ym_notice");
			$this->master->limit(4,0);		
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();		
			return $rows;
    }

	public function MainsSearch()
    {	
			extract($this->param_data);	
			$Searval = (isset($Searval)) ? $Searval : '';   #검색어
			$nowpage = (isset($nowpage)) ? $nowpage : 1; 

			$where ="";
			if($Searval){
				$where .=" and ( HE.wr_subject like '%".$Searval."%' or HE.wr_content like '%".$Searval."%') ";
			}

			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 10;
				}
				$limit = "LIMIT $nowpage,100 ";
			}

			$sql="
				SELECT 
					HE.wgu, HE.bo_table,bo_subject, HE.gr_id, HE.wr_id,HE.wr_subject,HE.wr_content,HE.wr_name,HE.wr_datetime
				FROM  
				(
					SELECT * , '기업지원서비스' AS wgu, 'cs_share' AS bo_table, 'cs' AS gr_id
					FROM 
					g5_write_cs_share

					UNION ALL 

					SELECT *  , '기업지원서비스' AS wgu, 'cs_space01p' AS bo_table, 'cs' AS gr_id
					FROM 
					g5_write_cs_space01p

					UNION ALL 

					SELECT *  , '기업지원서비스' AS wgu, 'cs_space02' AS bo_table, 'cs' AS gr_id
					FROM 
					g5_write_cs_space02

					UNION ALL 

					SELECT * , '기업지원서비스' AS wgu, 'cs_space03' AS bo_table, 'cs' AS gr_id
					FROM 
					g5_write_cs_space03

					UNION ALL 

					SELECT * , '기업지원서비스' AS wgu, 'cs_support' AS bo_table, 'cs' AS gr_id
					FROM 
					g5_write_cs_support

					UNION ALL 

					SELECT * , '입주안내' AS wgu, 'ga_form' AS bo_table, 'ga' AS gr_id
					FROM 
					g5_write_ga_form

					UNION ALL 

					SELECT * , '입주업체정보' AS wgu, 'gi_business' AS bo_table, 'gi' AS gr_id
					FROM 
					g5_write_gi_business

					UNION ALL 

					SELECT * , '산업단지현황' AS wgu, 'ic_map_p' AS bo_table, 'ic' AS gr_id
					FROM 
					g5_write_ic_map_p 

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_column' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_column

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_hitech' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_hitech

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_job' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_job

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_media' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_media

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_notice' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_notice

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_photo' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_photo

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_story' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_story

					UNION ALL 

					SELECT * , '알림마당' AS wgu, 'ym_tender' AS bo_table, 'ym' AS gr_id
					FROM 
					g5_write_ym_tender
				) HE
				LEFT JOIN g5_board ON HE.bo_table=g5_board.bo_table AND HE.gr_id=g5_board.gr_id
				where HE.wr_id is not null
				$where 
				ORDER BY HE.wr_datetime DESC
				$limit 
			";
			
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;			
    }

	

}