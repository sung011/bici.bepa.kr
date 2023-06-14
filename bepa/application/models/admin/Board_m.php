<?php

class Board_m extends CI_Model
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
    public function BoardList()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0; 
			$searkeyword = (isset($searkeyword)) ? $searkeyword : ''; 
			$gr_id = (isset($gr_id)) ? $gr_id : ''; 
			$reply = (isset($reply)) ? $reply : '';

			$where ="";
			if($searkeyword){
				$where .=" and HE.wr_subject like '%".$searkeyword."%' ";
			}
			if($gr_id){
				$where .=" and  HE.gr_id ='".$gr_id."' ";
			}
			
			if($reply=='c'){
				$where .=" and HE.wr_is_comment != '' ";
			}

			if ($nowpage > 0) {
				if ($nowpage == '1'){ $nowpage = 0;
				}else{
					$nowpage = $nowpage -1;
					$nowpage = $nowpage * 15;
				}
				$limit = "LIMIT $nowpage,15 ";
			}

			$sql="
				SELECT 
					HE.wgu, HE.bo_table,bo_subject, HE.gr_id, HE.wr_id,HE.wr_subject,HE.wr_name,HE.wr_datetime
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

	public function BoardCount()
    {		
			extract($this->param_data);
			$nowpage = (isset($nowpage)) ? $nowpage : 0;
			$searkeyword = (isset($searkeyword)) ? $searkeyword : ''; 
			$gr_id = (isset($gr_id)) ? $gr_id : ''; 
			$reply = (isset($reply)) ? $reply : '';

			$where ="";
			if($searkeyword){
				$where .=" and HE.wr_subject like '%".$searkeyword."%' ";
			}
			if($gr_id){
				$where .=" and HE.gr_id ='".$gr_id."' ";
			}
			
			if($reply=='c'){
				$where .=" and HE.wr_is_comment != '' ";
			}
		
			$sql="
				SELECT 
					COUNT(HE.wr_id) AS cnt
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
			";
			
			$rs = $this->master->query($sql);
			//echo $this->master->last_query();
			//exit;
			$rows = $rs->result_array();
			return $rows;
    }

	public function boardel()
    {
			
		extract($this->param_data);
		$wval = (isset($wval)) ? $wval : NULL; 	
		$wval_array = explode(',',$wval);
		$Tcnt = count($wval_array);

	
		for($i=0;$i<$Tcnt;$i++){
			$dval_array = explode("|",$wval_array[$i]);
			$wr_id = $dval_array[0];
			$bo_table = $dval_array[1];
			$search_table = "g5_write_".$bo_table;

			if($wr_id){
				$this->master->where(" wr_id in (".$wr_id.")  ");
				$this->master->delete($search_table);				
				$this->master->where("bo_table='".$bo_table."' and  wr_id in (".$wr_id.")  ");
				$this->master->delete("g5_board_file");
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
			}	
		}
	
		return $result_array;
    }

	

}