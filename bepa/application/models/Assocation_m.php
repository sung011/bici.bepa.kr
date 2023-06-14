<?php


class Assocation_m extends CI_Model{
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

    public function set_survey_result_ajax($params){
        $sub_cnt = count($params['inquery_sno']);

        $now = time();
        $survey_date = date('Y-m-d H:i:s');

        $data = array(
            'muid' => $params['muid'],
            'buid' => $params['buid'],
            'survey_title' => $params['survey_title'],
            'survey_start' => $params['start_date'],
            'survey_end' => $params['end_date'],
            'regdate' => $survey_date,
            'inquery_cnt' => $params['page_incnt'],
            'is_use' => 'Y'
        );

        $this->master->insert("complex_survey", $data);

        $sql=" SELECT LAST_INSERT_ID() as last_id";

        $rs = $this->master->query($sql);
        $row = $rs->row();
        if (isset($row))
        {
            $survey_idx = $row->last_id;
        }

        for($i=0;$i<$sub_cnt;$i++){
            $params['inquery_content'][$i][0] = (isset($params['inquery_content'][$i][0])) ? $params['inquery_content'][$i][0] : '';
            $params['inquery_content'][$i][1] = (isset($params['inquery_content'][$i][1])) ? $params['inquery_content'][$i][1] : '';
            $params['inquery_content'][$i][2] = (isset($params['inquery_content'][$i][2])) ? $params['inquery_content'][$i][2] : '';
            $params['inquery_content'][$i][3] = (isset($params['inquery_content'][$i][3])) ? $params['inquery_content'][$i][3] : '';
            $params['inquery_content'][$i][4] = (isset($params['inquery_content'][$i][4])) ? $params['inquery_content'][$i][4] : '';

            $data = array(
                'survey_idx' => $survey_idx,
                'muid' => $params['muid'],
                'buid' => $params['buid'],
                'survey_type' => $params['inquery_type'][$i],
                'survey_subtitle' => $params['inquery_title'][$i],
                'item1' => $params['inquery_content'][$i][0],
                'item2' => $params['inquery_content'][$i][1],
                'item3' => $params['inquery_content'][$i][2],
                'item4' => $params['inquery_content'][$i][3],
                'item5' => $params['inquery_content'][$i][4],
                'survey_date' => $survey_date
            );
            //var_dump($data);
            //$builder->insert($data);
            $this->master->insert("complex_survey_production", $data);
            if($params['inquery_type'][$i]=='radio' || $params['inquery_type'][$i]=='checkbox'){
                $con_cnt = count($params['inquery_content'][$i]);

                $sql=" SELECT LAST_INSERT_ID() as last_id ";
                $rs = $this->master->query($sql);
                $row = $rs->row();
                if (isset($row))
                {
                    $company_idx = $row->last_id;
                }
                for($k=0; $k < $con_cnt;$k++){
                    $item_sno = $k + 1;
                    if($params['inquery_content'][$i][$k] !=''){
                        //$builder = $this->db->table('complex_survey_chart');
                        $data = array(
                            'company_idx' => $company_idx,
                            'survey_idx' => $survey_idx,
                            'survey_type' => $params['inquery_type'][$i],
                            'survey_subtitle' => $params['inquery_title'][$i],
                            'item_sno' => $item_sno,
                            'item_title' => $params['inquery_content'][$i][$k],
                            'survey_date' => $survey_date
                        );
                        //$builder->insert($data);
                        $this->master->insert("complex_survey_chart", $data);
                    }
                }
            }
        }
		$num_sql = "
			select survey_idx FROM complex_survey order by survey_idx desc LIMIT 1
		";
		$rs = $this->master->query($num_sql);
		$rowNu = $rs->result_array();


		$result_array[] = array(
			'success' => '200',
			'complex_survey_index' => $rowNu[0],
			'params' => $params,
		);
		echo json_encode($result_array,JSON_UNESCAPED_UNICODE);

        //return TRUE;
        /*$this->db->transComplete();
        if ($this->db->transStatus() === FALSE) {
            $this->db->transRollback();
            return FALSE;
        } else {
            $this->db->transCommit();
            return TRUE;
        }*/
    }

    public function Inlist($add_sql,$nowpage){
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        $buid = $this->session->userdata('buid');
        if ($nowpage > 0) {
            if ($nowpage == '1'){ $nowpage = 0;
            }else{
                $nowpage = $nowpage -1;
                $nowpage = $nowpage * 15;
            }
        }
        if($add_sql == null){
            $sql = "select survey_idx, muid, buid, survey_title, inquery_cnt, survey_start, survey_end, response_person from complex_survey 
            where buid = '{$buid}' order by survey_idx DESC LIMIT ".$nowpage." ,15 ";
        }else{
            $sql = "select survey_idx, muid, buid, survey_title, inquery_cnt, survey_start, survey_end, response_person from complex_survey 
            where buid = '{$buid}' ".$add_sql."  order by survey_idx DESC LIMIT ".$nowpage." ,15 ";
        }

        $rs =  $this->master->query($sql);
        /*echo $this->master->last_query();
        exit;*/
        $rows = $rs->result_array();
        return $rows;
    }

    public function InCount(){
        $buid = $this->session->userdata('buid');
        $sql = "select COUNT(*) as cnt from complex_survey where buid = '{$buid}'";
        $rs =  $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function get_survey_header_list($num){
        $sql = "
            select survey_idx, muid, buid, survey_title, inquery_cnt, survey_start, survey_end from complex_survey where survey_idx = '{$num}'
order by survey_idx desc;
        ";
        $rs =  $this->master->query($sql);
        $rows = $rs->row_array();
        return $rows;
    }

    public function get_survey_detail_list($num){
        $sql = "
            select survey_idx, muid, buid, company_idx, survey_subtitle, survey_type, item1, item2, item3, item4, item5 from complex_survey_production
where survey_idx ='{$num}' order by company_idx desc
        ";
        $rs =  $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    // 단일 선택(객관식)
    public function get_survey($id)
    {
      $this->db->where('survey_idx', $id);
      $query = $this->db->get('complex_survey');
      return $query->row();
    }

    // 단일 선택(객관식)
    public function get_survey_production($id)
    {
      $this->db->where('survey_idx', $id);
      $query = $this->db->get('complex_survey_production');
      return $query->result_array();
    }

    // 텍스트 입력(주관식), 단일 선택(객관식)
    public function get_survey_result_list($id)
    {
      $this->db->where('survey_idx', $id);
      $query = $this->db->get('complex_survey_result');
      return $query->result_array();
    }

    // 단일 선택(객관식)
    public function get_survey_result_count($id, $item_sno) 
    {
      $this->db->where('survey_idx', $id);
      $this->db->where('item_sno', $item_sno); 
      return $this->db->count_all_results('complex_survey_result');
    }

    // 텍스트 입력(주관식)
    public function get_survey_result_item($id, $muid)
    {
      $this->db->where('survey_idx', $id);
      $this->db->where('muid', $muid);
      $query = $this->db->get('complex_survey_result');
      return $query->row();
    }

    // 다중 선택(객관식)
    public function get_survey_production_count($id) 
    {
      $this->db->where('survey_idx', $id);
      return $this->db->count_all_results('complex_survey_production');
    }

    public function set_survey_ajax($params){
        $sub_cnt = count($params['company_idx']);
        $survey_date = date('Y-m-d H:i:s');
        $sur_query =  " UPDATE complex_survey SET response_person= response_person+1 WHERE survey_idx='".$params['survey_idx']."' ";
        $this->db->query($sur_query);

        for($i = 0; $i  < $sub_cnt; $i++){
           if($params['survey_type'][$i] == "checkbox"){
               $check_cnt = count($params['s_answer_'.$i]);
               for ($j = 0; $j < $check_cnt; $j++){
                   $reponse_array = explode('|',$params['s_answer_'.$i][$j]);
                   $reponse_answer[$j] = (isset($reponse_array[0])) ? $reponse_array[0] : '';
                   $reponse_sno[$j] = (isset($reponse_array[1])) ? $reponse_array[1] : '';

                   $builder = $this->db->table('complex_survey_result');
                   $data = array(
                       'survey_idx' => $params['survey_idx'],
                       'company_idx' => $params['company_idx'][$i],
                       'muid' => $params['muid'],
                       'buid' => $params['buid'],
                       'survey_type' => $params['survey_type'][$i],
                       'survey_subtitle' => $params['survey_subtitle'][$i],
                       'response' => $reponse_answer[$k],
                       'item_sno' => $reponse_sno[$k],
                       'survey_date' => $survey_date
                   );
                   $builder->insert($data);

                   $builder = $this->db->table('complex_survey_chart');
                   $builder->select('item_count');
                   $builder->where('survey_idx',$params['survey_idx']);
                   $builder->where('company_idx',$params['company_idx'][$i]);
                   $builder->where('survey_type',$params['survey_type'][$i]);
                   $builder->where('item_sno',$reponse_sno[$k]);

                   $count = $builder->get()->getRow()->item_count;
                   $item_count = $count + 1;

                   $builder = $this->db->table('complex_survey_chart');
                   $data = array('item_count' => $item_count);
                   $builder->where('survey_idx',$params['survey_idx']);
                   $builder->where('company_idx',$params['company_idx'][$i]);
                   $builder->where('survey_type',$params['survey_type'][$i]);
                   $builder->where('item_sno',$reponse_sno[$k]);
                   //$sql = $builder->set($data)->getCompiledupdate('complex_survey_chart');
                   //echo $sql;
                   //exit;
                   $builder->update($data);
               }
           }else{
               $reponse_array = explode('|',$params['s_answer_'.$i]);
               $reponse_answer[$i] = (isset($reponse_array[0])) ? $reponse_array[0] : '';
               $reponse_sno[$i] = (isset($reponse_array[1])) ? $reponse_array[1] : '';

               $data = array(
                   'survey_idx' => $params['survey_idx'],
                   'company_idx' => $params['company_idx'][$i],
                   'muid' => $params['muid'],
                   'buid' => $params['buid'],
                   'survey_type' => $params['survey_type'][$i],
                   'survey_subtitle' => $params['survey_subtitle'][$i],
                   'response' => $reponse_answer[$i],
                   'item_sno' => $reponse_sno[$i],
                   'survey_date' => $survey_date
               );
               $this->master->insert('complex_survey_result', $data);
               //var_dump($data);
               if($params['survey_type'][$i] == "radio"){

                   $sql = "select item_count from complex_survey_chart where survey_idx = '{$params['survey_idx']}' AND
                    company_idx = '{$params['company_idx'][$i]}' AND survey_type = '{$params['survey_type'][$i]}' AND item_sno = '$reponse_sno[$i]'";
                   //var_dump($sql);
                   $rs =  $this->master->query($sql);
                   $count = $rs->row_array();
                   //echo $count['item_count'];
                   $item_count = $count['item_count'] + 1;
                   //var_dump($item_count);

                   $data = array('item_count' => $item_count);
                   $where = array(
                       'survey_idx' => $params['survey_idx'],
                       'company_idx' => $params['company_idx'][$i],
                       'survey_type' => $params['survey_type'][$i],
                       'item_sno' => $reponse_sno[$i],
                   );
                   /*$builder->where('survey_idx',$params['survey_idx']);
                   $builder->where('company_idx',$params['company_idx'][$i]);
                   $builder->where('survey_type',$params['survey_type'][$i]);
                   $builder->where('item_sno',$reponse_sno[$i]);
                   $builder->update($data);*/
                   //$sql = $builder->set($data)->getCompiledupdate('complex_survey_chart');
                   //echo $sql;
                   //exit;

                   $this->master->update('complex_survey_chart',$data, $where);


               }
           }
        }

		$result_array[] = array(
			'success' => '200',
			'complex_survey_index' => $params['survey_idx'],
			'params' => $params,
		);
		echo json_encode($result_array, JSON_UNESCAPED_UNICODE);
        //echo "1";
    }
    
    public function status_edit_ajax_post($params){
		$data = array(
			'OPR_CHK' => $params['opr_chk'],
			'INC_NAM' => $params['inc_nam'],
			'CEO_NAM' => $params['ceo_nam'],
			'JIBUN' => $params['jibun'],
			'CUR_CON' => $params['cur_con'],
			'TEL_NUM' => $params['TEL_NUM'],
			'FAX_NUM' => $params['FAX_NUM'],
			'NEW_ADD' => $params['NEW_ADD'],
			'BSN_LIC' => $params['BSN_LIC'],
			'INC_LIC' => $params['INC_LIC'],
			'REP_SPC' => $params['REP_SPC'],
			'GOD_ITM' => $params['GOD_ITM'],
			'GOD_MNY' => $params['GOD_MNY'],
			'EXP_MNY' => $params['EXP_MNY'],
			'STC_ARA' => $params['STC_ARA'],
			'BDC_ARA' => $params['BDC_ARA'],
			'SIT_ARA' => $params['SIT_ARA'],
			'CON_DAT' => $params['CON_DAT'],
			'COC_DAT' => $params['COC_DAT'],
			'REG_DAT' => $params['REG_DAT'],
			'LES_CHK' => $params['LES_CHK'],
			'DEP_MNY' => $params['DEP_MNY'],
			'LES_MNY' => $params['LES_MNY'],
			'LES_POD' => $params['LES_POD'],
			'LES_INC' => $params['LES_INC'],
			'TOT_MAN' => $params['TOT_MAN'],
			'WHT_MAN' => $params['WHT_MAN'],
			'BLU_MAN' => $params['BLU_MAN'],
			'BSN_MAN' => $params['BSN_MAN'],
			'KIM_MAN' => $params['KIM_MAN'],
			'ULS_MAN' => $params['ULS_MAN'],
			'YAS_MAN' => $params['YAS_MAN'],
			'CHA_MAN' => $params['CHA_MAN'],
			'MAL_WOK' => $params['MAL_WOK'],
			'FML_WOK' => $params['FML_WOK'],
			'MAL_FOR' => $params['MAL_FOR'],
			'FML_FOR' => $params['FML_FOR'],
			'BUS_NUM' => $params['BUS_NUM'],
			'INC_BUS' => $params['INC_BUS'],
			'CMP_BUS' => $params['CMP_BUS'],
			'SEF_CAR' => $params['SEF_CAR'],
			'COM_WAK' => $params['COM_WAK'],
			'CAL_MAN' => $params['CAL_MAN'],
			'CAL_CEL' => $params['CAL_CEL'],
		);
		$this->master->where("CPX_NUM='".$params['CPX_NUM']."' ");
		$this->master->update('CPT_CORP_DT', $data);

		$result_array[] = array(
			'success' => '200',
		);
		echo json_encode($result_array, JSON_UNESCAPED_UNICODE);
	}

}
