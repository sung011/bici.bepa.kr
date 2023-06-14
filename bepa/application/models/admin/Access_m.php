<?php

class Access_m extends CI_Model
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

    /**************
     * 매장 설정 조회
     **************/
    public function AccessList()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0; 
			$begin_date = (isset($begin_date)) ? $begin_date : ''; 
			$end_date = (isset($end_date)) ? $end_date : '';   

			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);

			if($begin_date){
				$this->master->where(" vi_date > '".$begin_date."'  " );
			}
			if($end_date){
				$this->master->where(" vi_date < '".$end_date."'  " );
			}
			$this->master->order_by("vi_id", 'desc');
			$this->master->from("g5_visit");

		
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

	public function AccessCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;
			$begin_date = (isset($begin_date)) ? $begin_date : ''; 
			$end_date = (isset($end_date)) ? $end_date : ''; 
		
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("count(vi_id) as cnt");	
			
			if($begin_date){
				$this->master->where(" vi_date > '".$begin_date."'  " );
			}
			if($end_date){
				$this->master->where(" vi_date < '".$end_date."'  " );
			}
			$this->master->order_by("vi_id", 'desc');
			$this->master->from("g5_visit");
			$rs = $this->master->get();
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessDomain()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT 
						SUBSTRING_INDEX(vi_referer,'/',3) as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					GROUP BY SUBSTRING_INDEX(vi_referer,'/',3) 
					ORDER BY cnt DESC
					LIMIT 10
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessBrowser()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT 
						HE.vi_name, HE.cnt
					FROM(

					SELECT 'Chrome' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%Chrome%'

					UNION ALL

					SELECT 'MSIE' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%MSIE%' AND vi_agent NOT LIKE '%Opera%'

					UNION ALL

					SELECT 'Firefox' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%Firefox%'

					UNION ALL

					SELECT 'Safari' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%Safari%'

					UNION ALL

					SELECT 'Opera' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%Opera%'

					UNION ALL

					SELECT 'Netscape' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%Netscape%'
					)HE
					ORDER by HE.cnt desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessOs()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT 
						HE.vi_name, HE.cnt

					FROM(

					SELECT 'linux' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%linux%'

					UNION ALL

					SELECT 'windows' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%windows%' or vi_agent LIKE '%win32%'

					UNION ALL

					SELECT 'mac' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent LIKE '%macintosh%' or vi_agent LIKE '%mac os x%'

					UNION ALL

					SELECT 'Other' as vi_name,COUNT(*) AS cnt 
					FROM g5_visit 
					WHERE vi_agent not LIKE '%linux%' AND vi_agent not LIKE '%windows%' AND vi_agent not LIKE '%win32%' AND vi_agent not LIKE '%macintosh%' AND vi_agent not LIKE '%mac os x%'


					)HE
					ORDER by HE.cnt desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessTime()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT LEFT(vi_time, 2) as vi_date,COUNT(*) AS cnt FROM g5_visit GROUP BY LEFT(vi_time, 2) ORDER BY vi_date desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessUser()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT LEFT(vi_time, 2) as vi_date,COUNT(*) AS cnt FROM g5_visit GROUP BY LEFT(vi_time, 2) ORDER BY vi_date asc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }


	public function AccessDay()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT vi_date,COUNT(*) AS cnt FROM g5_visit GROUP BY vi_date ORDER BY vi_date desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessMonth()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT LEFT(vi_date, 7) as vi_date,COUNT(*) AS cnt FROM g5_visit GROUP BY LEFT(vi_date, 7) ORDER BY vi_date desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessYear()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT LEFT(vi_date, 4) as vi_date,COUNT(*) AS cnt FROM g5_visit GROUP BY LEFT(vi_date, 4) ORDER BY vi_date desc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function AccessWEEKDAY()
    {		
			extract($this->param_data);		
			$sql ="
					SELECT 
					 case  WEEKDAY(vi_date) 
						when '0' then '월요일'
						when '1' then '화요일'
						when '2' then '수요일'
						when '3' then '목요일'
						when '4' then '금요일'
						when '5' then '토요일'
						when '6' then '일요일'
						end as vi_date
						,COUNT(*) AS cnt
						,WEEKDAY(vi_date) as week 
					FROM g5_visit GROUP BY WEEKDAY(vi_date) ORDER BY week asc
			";
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }


	

}