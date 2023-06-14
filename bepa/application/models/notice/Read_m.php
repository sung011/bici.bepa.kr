<?php

class Read_m extends CI_Model
{
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
    public function rlist()
    {
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 			
			$search_table = "g5_write_".$bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			$rs = $this->master->get();			
			$rows = $rs->result_array();
			//echo $this->master->last_query();
			//exit;
			return $rows;
    }

	public function secretlist()
    {			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 	
	
			$search_table = "g5_write_".$bo_table;	
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
			$this->master->where("wr_option", 'secret');
			$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			$rs = $this->master->get();			
			$rows = $rs->result_array();
	
			return $rows;
    }

	public function hit_update()
    {
			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 			
			$search_table = "g5_write_".$bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$query_data = array(
					"wr_hit" => $this->wr_hit +1
			);
			$this->master->update($search_table, $query_data);
    }

    public function hit_update_read_count($bo_table, $wr_id)
    {
        $bo_table = (isset($bo_table)) ? $bo_table : NULL;
        $search_table = "g5_write_".$bo_table;

        $sql = "
        UPDATE {$search_table}
        SET 
        wr_hit = wr_hit + 1
        WHERE wr_id = {$wr_id};
        ";

        $this->master->query($sql);
    }
	
	public function nextsno()
    {			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$wr_id = (isset($wr_id)) ? $wr_id : 0; 			
			$search_table = "g5_write_".$bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			//if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id");
			$this->master->where(" wr_id > '".$wr_id."' ");
			//$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			$this->master->limit(1, 0);
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }
	
	public function prevsno()
    {
			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$wr_id = (isset($wr_id)) ? $wr_id : 0; 			
			$search_table = "g5_write_".$bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			//if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id");
			$this->master->where(" wr_id < '".$wr_id."' ");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			$this->master->limit(1, 0);
			$rs = $this->master->get();
			$rows = $rs->result_array();
			return $rows;
    }

	public function noticefile()
    {
			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$wr_id = (isset($wr_id)) ? $wr_id : 0; 			
			$search_table = $bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			//if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->where(" wr_id = '".$wr_id."' and bo_table='".$search_table."' ");
			$this->master->order_by("bf_no", 'asc');
			$this->master->from("g5_board_file");	
			$rs = $this->master->get();
			$rows = $rs->result_array();
			//echo $this->master->last_query();
			//exit;
			return $rows;
    }

    public function boardfile($wr_id){
		$this->master->select('bf_file');
		$this->master->where(" wr_id = '{$wr_id}' and bo_table='ym_notice' ");
		$this->master->order_by("bf_no", 'asc');
		$this->master->from('g5_board_file');
		$rs = $this->master->get();
		$rows = $rs->result_array();
		//echo $this->master->last_query();
		//exit;
		return $rows;
	}

	public function boardfiles($wr_id,$bo_table){
		$this->master->select('bf_file');
		$this->master->where(" wr_id = '{$wr_id}' and bo_table='{$bo_table}' ");
		$this->master->order_by("bf_no", 'asc');
		$this->master->from('g5_board_file');
		$rs = $this->master->get();
		$rows = $rs->result_array();
		//echo $this->master->last_query();
		//exit;
		return $rows;
	}

		public function businessfile()
    {
			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$wr_id = (isset($wr_id)) ? $wr_id : 0; 			
			$search_table = $bo_table;
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			//if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->where(" wr_id = '1' and bo_table='gi_business' ");
			$this->master->order_by("bf_no", 'asc');
			$this->master->from('g5_board_file');	
			$rs = $this->master->get();
			$rows = $rs->result_array();
			//echo $this->master->last_query();
			//exit;
			return $rows;
    }

	public function boardsave()
    {
			
			extract($this->param_data);
			
			$bo_table = (isset($bo_table)) ? $bo_table : ''; 
			$wr_content = (isset($wr_content)) ? $wr_content : ''; 
			$wr_subject = (isset($wr_subject)) ? $wr_subject : ''; 
			$wr_link1 = (isset($wr_link1)) ? $wr_link1 : ''; 
			$wr_html = (isset($wr_html)) ? $wr_html : ''; 
			$wr_id = (isset($wr_id)) ? $wr_id : NULL; 
			$wr_option = (isset($wr_option)) ? $wr_option : '';
			$ca_name = (isset($ca_name)) ? $ca_name : '';


			$search_table = "g5_write_".$bo_table;
			$wr_ip = $_SERVER["REMOTE_ADDR"];
			$nowDate = date("Y-m-d H:i:s");
			$wr_num="";
			if($wr_id){
				
				if($bf_file_del){
					$file_del_cnt = count($bf_file_del);
					//echo $file_del_cnt;
					//exit;
					if($file_del_cnt > 0){				
						for($k=0;$k < $file_del_cnt;$k++){
							unlink("./data/file/".$bo_table."/".$bf_file_del[$k]);
							$this->master->where("bo_table='".$bo_table."' and  wr_id in (".$wr_id.") and bf_file='".$bf_file_del[$k]."' ");
							$this->master->delete("g5_board_file");
							//echo $this->master->last_query();
							//print_r($result_array);
							//exit;
						}
					}
				}
				
				if($file_cnt > 0){
					for($j=0; $j<2;$j++){
						$upload[$j]['upload_data']['file_name'] = (isset($upload[$j]['upload_data']['file_name'])) ? $upload[$j]['upload_data']['file_name'] : ''; 
						if($upload[$j]['upload_data']['file_name']){
							$bfile_name =	$upload[$j]['upload_data']['file_name'];
							$bfile_type =	$upload[$j]['upload_data']['file_type'];
							$bfull_path =	$upload[$j]['upload_data']['full_path'];
							$borig_name =	$upload[$j]['upload_data']['orig_name'];
							$bfile_ext =	$upload[$j]['upload_data']['file_ext'];
							$bfile_size =	$upload[$j]['upload_data']['file_size'] * 1024;
							$bimage_type =	$upload[$j]['upload_data']['image_type'];
							$image_size_str =	$upload[$j]['upload_data']['image_size_str'];

							$this->master->select("count(*) as cnt");
							$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."' and bf_no='".$j."' ");
							$this->master->from("g5_board_file");

							$rs = $this->master->get();
							$bfrows = $rs->result_array();
						
							if($bfrows[0]['cnt'] > 0){

								$file_Date = array(
									"bf_no" => $j,
									"bf_source" => $borig_name,		
									"bf_file" => $bfile_name,
									"bf_download" => 0,
									"bf_content" => '',
									"bf_filesize" => $bfile_size,
									"bf_width" => 0,
									"bf_height" => 0,
									"bf_type" => 0,
									"bf_datetime" =>$nowDate
								);
								$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."' ");
								$this->master->update('g5_board_file', $file_Date);		
							}else{
								$file_Date = array(
									"bo_table" => $bo_table,
									"wr_id" => $wr_id,
									"bf_no" => $j,
									"bf_source" => $borig_name,		
									"bf_file" => $bfile_name,
									"bf_download" => 0,
									"bf_content" => '',
									"bf_filesize" => $bfile_size,
									"bf_width" => 0,
									"bf_height" => 0,
									"bf_type" => 0,
									"bf_datetime" =>$nowDate		
								);
								$this->master->insert('g5_board_file', $file_Date);
							}
						}
					}
				}

				$this->master->select("count(*) as cnt");
				$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."'  ");
				$this->master->from("g5_board_file");

				$rs = $this->master->get();
				$flcrow = $rs->result_array();

				$query_data = array(
					"wr_subject" => $wr_subject
					,"wr_content" => $wr_content
					,"wr_link1" => $wr_link1
					,"wr_file" => $flcrow[0]['cnt']
					,"mb_id" => $_SESSION['mb_id']
					,"wr_password" => $_SESSION['mb_password']
					,"wr_name" => $_SESSION['mb_name']
					,"wr_email" => $_SESSION['mb_email']
					,"wr_last" => $nowDate
					,"wr_option" => $wr_option,
					"ca_name" => $ca_name,
				);
				$this->master->where(" wr_id =".$wr_id." ");
				$this->master->update($search_table, $query_data);	
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
				$result_array['wr_id'] = $wr_id;
				return $result_array;

			}else{
				$this->master->select("MAX(wr_id) +1 as next_id");
				$this->master->from($search_table);
				$rs = $this->master->get();

				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];
				if($next_wrid){
					$wr_num = "-".$next_wrid;
				}else{
					$next_wrid = 1;
					$wr_num = -1;
				}
				//echo $wr_num;
				//exit;			
				$add_Date = array(
					"wr_id" => $next_wrid,
					"wr_num" => $wr_num,
					"wr_reply" => '',
					"wr_parent" => $next_wrid,		
					"wr_option" => $wr_option,
					"wr_comment_reply" => '',
					"ca_name" => $ca_name,
					"wr_subject" => $wr_subject,
					"wr_content" => $wr_content,
					"wr_link1" => $wr_link1,
					"wr_link2" => '',
					"mb_id" =>$_SESSION['mb_id'],
					"wr_password" => $_SESSION['mb_password'],
					"wr_name" => $_SESSION['mb_name'],
					"wr_email" => $_SESSION['mb_email'],
					"wr_homepage" => '',
					"wr_datetime" => $nowDate,
					"wr_file" => $file_cnt,
					"wr_last" => $nowDate,
					"wr_ip" => $wr_ip,
					"wr_facebook_user" => '',
					"wr_twitter_user" => '',
					"wr_1" => '',
					"wr_2" => '',
					"wr_3" => '',
					"wr_4" => '',
					"wr_5" => '',
					"wr_6" => '',
					"wr_7" => '',
					"wr_8" => '',
					"wr_9" => '',
					"wr_10" => '',
					"eb_1" => '',
					"eb_2" => '',
					"eb_3" => '',
					"eb_4" => '',
					"eb_5" => '',
					"eb_6" => '',
					"eb_7" => '',
					"eb_8" => '',
					"eb_9" => '',
					"eb_10" => ''
				);

				$this->master->insert($search_table, $add_Date);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}

				if($file_cnt > 0){
					for($j=0; $j<2;$j++){
						if(isset($upload[$j]['upload_data']['file_name'])){
							$bfile_name =	$upload[$j]['upload_data']['file_name'];
							$bfile_type =	$upload[$j]['upload_data']['file_type'];
							$bfull_path =	$upload[$j]['upload_data']['full_path'];
							$borig_name =	$upload[$j]['upload_data']['orig_name'];
							$bfile_ext =	$upload[$j]['upload_data']['file_ext'];
							$bfile_size =	$upload[$j]['upload_data']['file_size'] * 1024;
							$bimage_type =	$upload[$j]['upload_data']['image_type'];
							$image_size_str =	$upload[$j]['upload_data']['image_size_str'];

							$file_Date = array(
								"bo_table" => $bo_table,
								"wr_id" => $next_wrid,
								"bf_no" => $j,
								"bf_source" => $borig_name,		
								"bf_file" => $bfile_name,
								"bf_download" => 0,
								"bf_content" => '',
								"bf_filesize" => $bfile_size,
								"bf_width" => 0,
								"bf_height" => 0,
								"bf_type" => 0,
								"bf_datetime" =>$nowDate
			
							);
							$this->master->insert('g5_board_file', $file_Date);
						}
					}
				}
				$result_array['wr_id'] = $next_wrid;
				return $result_array;
			}
    }

	public function boardreply()
    {
			
			extract($this->param_data);
			
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
			$wr_content = (isset($wr_content)) ? $wr_content : NULL; 
			$wr_subject = (isset($wr_subject)) ? $wr_subject : NULL; 
			$wr_link1 = (isset($wr_link1)) ? $wr_link1 : NULL; 
			$wr_html = (isset($wr_html)) ? $wr_html : NULL; 
			$wr_id = (isset($wr_id)) ? $wr_id : NULL; 
			$wr_1 = (isset($wr_1)) ? $wr_1 : NULL;
			$wr_2 = (isset($wr_2)) ? $wr_2 : NULL;
			$wr_3 = (isset($wr_3)) ? $wr_3 : NULL;
			$wr_3 = (isset($wr_3)) ? $wr_3 : NULL;
			$ca_name = (isset($ca_name)) ? $ca_name : NULL; 
			

			$search_table = "g5_write_".$bo_table;
			$wr_ip = $_SERVER["REMOTE_ADDR"];
			$nowDate = date("Y-m-d H:i:s");
			$wr_num="";
			
				$this->master->select("MAX(wr_id) +1 as next_id");
				$this->master->from($search_table);
				$rs = $this->master->get();
				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];
				if($next_wrid){
					$wr_num = "-".$next_wrid;
				}else{
					$next_wrid = 1;
					$wr_num = -1;
				}

				$this->master->select("MAX(wr_reply) +1 as reply_id");
				$this->master->from($search_table);
				$prs = $this->master->get();
				$prows = $prs->result_array();
				$reply_id = $prows[0]['reply_id'];
				if($reply_id){			
				}else{
					$reply_id = 1;
				}


				//echo $wr_num;
				//exit;			
				$add_Date = array(
					"wr_id" => $next_wrid,
					"wr_num" => $wr_num,
					"wr_reply" => $reply_id,
					"wr_parent" => $wr_id,		
					"wr_option" => 'html1',
					"wr_comment_reply" => '',
					"ca_name" => $ca_name,
					"wr_subject" => $wr_subject,
					"wr_content" => $wr_content,
					"wr_link1" => $wr_link1,
					"wr_link2" => '',
					"mb_id" =>$_SESSION['mb_id'],
					"wr_password" => $_SESSION['mb_password'],
					"wr_name" => $_SESSION['mb_name'],
					"wr_email" => $_SESSION['mb_email'],
					"wr_homepage" => '',
					"wr_datetime" => $nowDate,
					"wr_file" => $file_cnt,
					"wr_last" => $nowDate,
					"wr_ip" => $wr_ip,
					"wr_facebook_user" => '',
					"wr_twitter_user" => '',
					"wr_1" => $wr_1,
					"wr_2" => $wr_2,
					"wr_3" => $wr_3,
					"wr_4" => '',
					"wr_5" => '',
					"wr_6" => '',
					"wr_7" => '',
					"wr_8" => '',
					"wr_9" => '',
					"wr_10" => '',
					"eb_1" => '',
					"eb_2" => '',
					"eb_3" => '',
					"eb_4" => '',
					"eb_5" => '',
					"eb_6" => '',
					"eb_7" => '',
					"eb_8" => '',
					"eb_9" => '',
					"eb_10" => ''
				);

				$this->master->insert($search_table, $add_Date);
				//echo $this->master->last_query();
				//exit;
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}

				if($file_cnt > 0){
					for($j=0; $j<$file_cnt;$j++){
						$bfile_name =	$upload[$j]['upload_data']['file_name'];
						$bfile_type =	$upload[$j]['upload_data']['file_type'];
						$bfull_path =	$upload[$j]['upload_data']['full_path'];
						$borig_name =	$upload[$j]['upload_data']['orig_name'];
						$bfile_ext =	$upload[$j]['upload_data']['file_ext'];
						$bfile_size =	$upload[$j]['upload_data']['file_size'] * 1024;
						$bimage_type =	$upload[$j]['upload_data']['image_type'];
						$image_size_str =	$upload[$j]['upload_data']['image_size_str'];

						$file_Date = array(
							"bo_table" => $bo_table,
							"wr_id" => $next_wrid,
							"bf_no" => $j,
							"bf_source" => $borig_name,		
							"bf_file" => $bfile_name,
							"bf_download" => 0,
							"bf_content" => '',
							"bf_filesize" => $bfile_size,
							"bf_width" => 0,
							"bf_height" => 0,
							"bf_type" => 0,
							"bf_datetime" =>$nowDate
		
						);
						$this->master->insert('g5_board_file', $file_Date);
					}
				}
				$result_array['wr_id'] = $next_wrid;
				return $result_array;
			
    }

	public function noticesave()
    {

			extract($this->param_data);


			$ca_name = (isset($ca_name)) ? $ca_name : ''; 
			$wr_html = (isset($wr_html)) ? $wr_html : ''; 
			$bo_table = (isset($bo_table)) ? $bo_table : ''; 
			$wr_id = (isset($wr_id)) ? $wr_id : ''; 
			$wr_subject = (isset($wr_subject)) ? $wr_subject : ''; 
			$wr_1 = (isset($wr_1)) ? $wr_1 : ''; 
			$wr_2 = (isset($wr_2)) ? $wr_2 : ''; 
			$wr_3 = (isset($wr_3)) ? $wr_3 : ''; 
			$wr_content = (isset($wr_content)) ? $wr_content : ''; 
			$wr_link1 = (isset($wr_link1)) ? $wr_link1 : ''; 
			$bf_file_del = (isset($bf_file_del)) ? $bf_file_del : ''; 
			$notice = (isset($notice)) ? $notice : ''; 
			$wr_option = (isset($wr_option)) ? $wr_option : ''; 			
			//echo $bo_table;
			//exit;
			$search_table = "g5_write_".$bo_table;

			$wr_ip = $_SERVER["REMOTE_ADDR"];
			$nowDate = date("Y-m-d H:i:s");
			$wr_num="";
			if($wr_id){
				
				if($bf_file_del){
					$file_del_cnt = count($bf_file_del);
					if($file_del_cnt > 0){				
						for($k=0;$k < $file_del_cnt;$k++){
							@unlink("./data/file/".$bo_table."/".$bf_file_del[$k]);
							$this->master->where("bo_table='".$bo_table."' and  wr_id in (".$wr_id.") and bf_file='".$bf_file_del[$k]."' ");
							$this->master->delete("g5_board_file");
							//echo $this->master->last_query();
							//exit;
						}
					}
				}
				
				if($file_cnt > 0){
					for($j=0; $j<4;$j++){
						$upload[$j]['upload_data']['file_name'] = (isset($upload[$j]['upload_data']['file_name'])) ? $upload[$j]['upload_data']['file_name'] : ''; 
						if($upload[$j]['upload_data']['file_name']){
							$bfile_name =	$upload[$j]['upload_data']['file_name'];
							$bfile_type =	$upload[$j]['upload_data']['file_type'];
							$bfull_path =	$upload[$j]['upload_data']['full_path'];
							$borig_name =	$upload[$j]['upload_data']['orig_name'];
							$bfile_ext =	$upload[$j]['upload_data']['file_ext'];
							$bfile_size =	$upload[$j]['upload_data']['file_size'] * 1024;
							$bimage_type =	$upload[$j]['upload_data']['image_type'];
							$image_size_str =	$upload[$j]['upload_data']['image_size_str'];

							$this->master->select("count(*) as cnt");
							$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."' and bf_no='".$j."' ");
							$this->master->from("g5_board_file");

							$rs = $this->master->get();
							$bfrows = $rs->result_array();
						
							if($bfrows[0]['cnt'] > 0){

								$file_Date = array(
									"bf_no" => $j,
									"bf_source" => $borig_name,		
									"bf_file" => $bfile_name,
									"bf_download" => 0,
									"bf_content" => '',
									"bf_filesize" => $bfile_size,
									"bf_width" => 0,
									"bf_height" => 0,
									"bf_type" => 0,
									"bf_datetime" =>$nowDate
								);
								$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."' ");
								$this->master->update('g5_board_file', $file_Date);		
							}else{
								$file_Date = array(
									"bo_table" => $bo_table,
									"wr_id" => $wr_id,
									"bf_no" => $j,
									"bf_source" => $borig_name,		
									"bf_file" => $bfile_name,
									"bf_download" => 0,
									"bf_content" => '',
									"bf_filesize" => $bfile_size,
									"bf_width" => 0,
									"bf_height" => 0,
									"bf_type" => 0,
									"bf_datetime" =>$nowDate		
								);
								$this->master->insert('g5_board_file', $file_Date);
							}
						}
					}
				}

				$this->master->select("count(*) as cnt");
				$this->master->where(" wr_id =".$wr_id." and bo_table='".$bo_table."'  ");
				$this->master->from("g5_board_file");

				$rs = $this->master->get();
				$flcrow = $rs->result_array();

				$query_data = array(
                    "ca_name" => $ca_name,
					"wr_subject" => $wr_subject
					,"wr_content" => $wr_content
					,"wr_link1" => $wr_link1
					,"wr_file" => $flcrow[0]['cnt']
					,"mb_id" => $_SESSION['mb_id']
					,"wr_password" => $_SESSION['mb_password']
					,"wr_name" => $_SESSION['mb_name']
					,"wr_email" => $_SESSION['mb_email']
					,"wr_last" => $nowDate
					,"wr_10" => $notice
					,"wr_option" => $wr_option,
                    "wr_1" => $wr_1,
                    "wr_2" => $wr_2,
                    "wr_3" => $wr_3,
				);
				/*var_dump($query_data);
				exit();*/
				$this->master->where(" wr_id =".$wr_id." ");
				$this->master->update($search_table, $query_data);	
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
				$result_array['wr_id'] = $wr_id;
				return $result_array;

			}else{
				$this->master->select("MAX(wr_id) +1 as next_id");
				$this->master->from($search_table);
				$rs = $this->master->get();
				//echo $this->master->last_query();
				//exit;
				$rows = $rs->result_array();
				$next_wrid = $rows[0]['next_id'];

				if($next_wrid){
					$wr_num = "-".$next_wrid;
				}else{
					$next_wrid = 1;
					$wr_num = -1;
				}
				//echo $wr_num;
				//exit;			
				$add_Date = array(
					"wr_id" => $next_wrid,
					"wr_num" => $wr_num,
					"wr_reply" => '',
					"wr_parent" => $next_wrid,		
					"wr_option" => $wr_option,
					"wr_comment_reply" => '',
					"ca_name" => $ca_name,
					"wr_subject" => $wr_subject,
					"wr_content" => $wr_content,
					"wr_link1" => $wr_link1,
					"wr_link2" => '',
					"mb_id" =>$_SESSION['mb_id'],
					"wr_password" => $_SESSION['mb_password'],
					"wr_name" => $_SESSION['mb_name'],
					"wr_email" => $_SESSION['mb_email'],
					"wr_homepage" => '',
					"wr_datetime" => $nowDate,
					"wr_file" => $file_cnt,
					"wr_last" => $nowDate,
					"wr_ip" => $wr_ip,
					"wr_facebook_user" => '',
					"wr_twitter_user" => '',
					"wr_1" => $wr_1,
					"wr_2" => $wr_2,
					"wr_3" => $wr_3,
					"wr_4" => '',
					"wr_5" => '',
					"wr_6" => '',
					"wr_7" => '',
					"wr_8" => '',
					"wr_9" => '',
					"wr_10" => $notice,
					"eb_1" => '',
					"eb_2" => '',
					"eb_3" => '',
					"eb_4" => '',
					"eb_5" => '',
					"eb_6" => '',
					"eb_7" => '',
					"eb_8" => '',
					"eb_9" => '',
					"eb_10" => ''
				);
			
				$this->master->insert($search_table, $add_Date);
				//echo $this->master->last_query();
				//exit;
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}

				if($file_cnt > 0){
					for($j=0; $j<4;$j++){

						if(isset($upload[$j]['upload_data']['file_name'])){
							$bfile_name =	$upload[$j]['upload_data']['file_name'];
							$bfile_type =	$upload[$j]['upload_data']['file_type'];
							$bfull_path =	$upload[$j]['upload_data']['full_path'];
							$borig_name =	$upload[$j]['upload_data']['orig_name'];
							$bfile_ext =	$upload[$j]['upload_data']['file_ext'];
							$bfile_size =	$upload[$j]['upload_data']['file_size'] * 1024;
							$bimage_type =	$upload[$j]['upload_data']['image_type'];
							$image_size_str =	$upload[$j]['upload_data']['image_size_str'];

							$file_Date = array(
								"bo_table" => $bo_table,
								"wr_id" => $next_wrid,
								"bf_no" => $j,
								"bf_source" => $borig_name,		
								"bf_file" => $bfile_name,
								"bf_download" => 0,
								"bf_content" => '',
								"bf_filesize" => $bfile_size,
								"bf_width" => 0,
								"bf_height" => 0,
								"bf_type" => 0,
								"bf_datetime" =>$nowDate			
							);
							$this->master->insert('g5_board_file', $file_Date);
						}
					}
				}

				$result_array['wr_id'] = $next_wrid;
				return $result_array;
			}
    }

	
	public function linklist()
    {
			
			extract($this->param_data);
			$bo_table = (isset($bo_table)) ? $bo_table : NULL; 			
			$search_table = "g5_write_".$bo_table;
	
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$this->master->select("wr_id,wr_subject,wr_name,wr_hit,date_format(wr_datetime,'%Y-%m-%d') as wr_datetime,wr_link1,wr_link1_hit,wr_content,ca_name,date_format(wr_last,'%Y-%m-%d') as wr_last,wr_1,wr_2,wr_3,wr_file");
			$this->master->order_by("wr_id", 'desc');
			$this->master->from($search_table);
			$rs = $this->master->get();			
			$rows = $rs->result_array();
			
			if (!empty($this->sql_select)) $this->master->select($this->sql_select);
			if (!empty($this->add_sql)) $this->master->where($this->add_sql);
			$query_data = array(
					"wr_link1_hit" => $rows[0]['wr_link1_hit'] +1
			);
			$this->master->update($search_table, $query_data);
			return $rows;
    }

	public function boardel()
    {
			
		extract($this->param_data);
		$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
		$wrid = (isset($wrid)) ? $wrid : NULL; 		
		$search_table = "g5_write_".$bo_table;
		if(!empty($this->add_sql)) $this->master->where($this->add_sql);
		if($wrid){

			$this->master->where(" wr_id = '".$wrid."' and bo_table='".$bo_table."' ");
			$this->master->order_by("bf_no", 'asc');
			$this->master->from("g5_board_file");	
			$rs = $this->master->get();
			//$rows = $rs->result_array();
			foreach ($rs->result_array() as $row)
			{
				@unlink("./data/file/".$bo_table."/".$row['bf_file']);
			}

			$this->master->where(" wr_id in (".$wrid.")  ");
			$this->master->delete($search_table);	
			
			$this->master->where("bo_table='".$bo_table."' and  wr_id in (".$wrid.")  ");
			$this->master->delete("g5_board_file");
		}
		if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
			$this->db_error = $this->master->error();
			$result_array['success'] = "E400";
		}else{
			$result_array['success'] = "E200";
		}
		return $result_array;
    }


    // 게시판_설문조사(삭제)
    public function delete_survey()
    {
		extract($this->param_data); 
		$wrid = (isset($wrid)) ? $wrid : NULL; 		
		
		if (!empty($this->add_sql)) $this->master->where($this->add_sql);

		if ($wrid)
		{
			$this->db->trans_start();
			$this->master->where('survey_idx in ('.$wrid.')');
			$this->master->delete('complex_survey_result');
			$this->master->where('survey_idx in ('.$wrid.')');
			$this->master->delete('complex_survey_chart');
			$this->master->where('survey_idx in ('.$wrid.')');
			$this->master->delete('complex_survey_production');
			$this->master->where('survey_idx in ('.$wrid.')');
			$this->master->delete('complex_survey');	
			$this->db->trans_complete(); 	
		}

		if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) 
		{
			$this->db_error = $this->master->error();
			$result_array['success'] = 'E400';
		}
		else
		{
			$result_array['success'] = 'E200';
		}

		return $result_array;
    }
    


    public function su_boardel(){
		extract($this->param_data);
		$bo_table = (isset($bo_table)) ? $bo_table : NULL;
		$wrid = (isset($wrid)) ? $wrid : NULL;
		$search_table = $bo_table;
		if(!empty($this->add_sql)) $this->master->where($this->add_sql);
		if($wrid){
			$this->master->where(" survey_idx in (".$wrid.")  ");
			$this->master->delete($search_table);

			$this->master->where(" company_idx in (".$wrid.")  ");
			$this->master->delete("complex_survey_chart");

			$this->master->where(" survey_idx in (".$wrid.")  ");
			$this->master->delete("complex_survey_production");

			$this->master->where(" survey_idx in (".$wrid.")  ");
			$this->master->delete("complex_survey_result");

		}
		if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
			$this->db_error = $this->master->error();
			$result_array['success'] = "E400";
		}else{
			$result_array['success'] = "E200";
		}
		return $result_array;
	}

	public function eotrmfIn()
    {			
		extract($this->param_data);
		$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
		$wr_id = (isset($wr_id)) ? $wr_id : NULL; 
		$co_id = (isset($co_id)) ? $co_id : NULL; 
		$wr_comment = (isset($wr_comment)) ? $wr_comment : NULL;
		$co_datetime = date("Y-m-d H:i:s");
		if($co_id){
			$up_Date = array(		
				"co_datetime" => $co_datetime,
				"wr_comment" => $wr_comment,
			);
			$this->master->where(" co_id =".$co_id." and bo_table='".$bo_table."' and wr_id='".$wr_id."' ");
			$this->master->update("g5_read_comment", $up_Date);		
			
			if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
				$this->db_error = $this->master->error();
				$result_array['success'] = "E400";
			}else{
				$result_array['success'] = "E200";
			}
		}else{
			$this->master->select("MAX(co_id) +1 as next_id");
			$this->master->from("g5_read_comment");
			$rs = $this->master->get();
			$rows = $rs->result_array();
			$next_wrid = $rows[0]['next_id'];

			if($next_wrid){
			}else{
				$next_wrid = 1;
			}
			

			$add_Date = array(
					"co_id" => $next_wrid,
					"bo_table" => $bo_table,
					"wr_id" => $wr_id,
					"wr_parent" => $wr_id,		
					"co_datetime" => $co_datetime,
					"mb_id" =>$_SESSION['mb_id'],
				    "mb_name" =>$_SESSION['mb_name'],
					"wr_comment" => $wr_comment,					
				);
				$this->master->insert("g5_read_comment", $add_Date);
				if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
					$this->db_error = $this->master->error();
					$result_array['success'] = "E400";
				}else{
					$result_array['success'] = "E200";
				}
		}		
		return $result_array;
    }

	public function eotrmfList()
    {
			
		extract($this->param_data);
		$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
		$wr_id = (isset($wr_id)) ? $wr_id : NULL; 
		$co_id = (isset($co_id)) ? $co_id : NULL; 

		$this->master->where(" wr_id = '".$wr_id."' and bo_table='".$bo_table."' ");
		$this->master->order_by("co_id", 'asc');
		$this->master->from("g5_read_comment");
		$rs = $this->master->get();
			
		$rows = $rs->result_array();
		return $rows;
    }

	public function eotrmfDel()
    {			
		extract($this->param_data);
		$bo_table = (isset($bo_table)) ? $bo_table : NULL; 
		$wr_id = (isset($wr_id)) ? $wr_id : NULL; 
		$co_id = (isset($co_id)) ? $co_id : NULL;
		$this->master->where(" wr_id = '".$wr_id."' and bo_table='".$bo_table."' and co_id='".$co_id."' ");
		
		$this->master->delete("g5_read_comment");
		
		if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
			$this->db_error = $this->master->error();
			$result_array['success'] = "E400";
		}else{
			$result_array['success'] = "E200";
		}
		return $result_array;
    }
	

}
