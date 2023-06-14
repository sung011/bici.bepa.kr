<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
require APPPATH . 'libraries/REST_Controller.php';
;
/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */
class State extends REST_Controller {
    function __construct()
    {
        // Construct the parent class
        parent::__construct();
        # 로그인 체크
        $this->load->library('session');
        $this->load->model('Log_visit_m');
        $this->load->model('Assocation_m');
    }

    public function log(){
        if($this->session->userdata('mb_id') != null){
            $log_date = $this->Log_visit_m->Log_dateGet();
            if(!$log_date){
                $this->Log_visit_m->Log_visitIn();
            }
        }
    }

    public function survey_get()
    {
        $data['menu'] = 'survey';
        $this->log();
        $data['co_subject'] = '설문조사';
        $this->load->view('/State/survey',$data);
    }

    public function stateWrite_get(){
        $this->log();
        $data['wr_title'] = '설문조사';
        $this->load->view('/State/state_write',$data);
    }

    public function survey_detail_get()
    {
        $this->log();
        
        $muid = $this->session->userdata('muid');
        $num = $this->get('survey_idx');

        $data['co_subject'] = '설문조사';
        $data['menu'] = 'survey';

        $data['item'] = $this->Assocation_m->get_survey($num);
        $data['production_item'] = $this->Assocation_m->get_survey_production($num);

        $data['result_list'] = $this->Assocation_m->get_survey_result_list($num);

        // 텍스트 입력(주관식)
        $data['result_item'] = $this->Assocation_m->get_survey_result_item($num, $muid);

        // 단일 선택(객관식)
        $data['item1_total'] = $this->Assocation_m->get_survey_result_count($num, '1');
        $data['item2_total'] = $this->Assocation_m->get_survey_result_count($num, '2');
        $data['item3_total'] = $this->Assocation_m->get_survey_result_count($num, '3');
        $data['item4_total'] = $this->Assocation_m->get_survey_result_count($num, '4');
        $data['item5_total'] = $this->Assocation_m->get_survey_result_count($num, '5');

        // $data['suheaders'] = $this->Assocation_m->get_survey_header_list($num);
        // $data['sudetails'] = $this->Assocation_m->get_survey_detail_list($num);
    
        $this->load->view('/State/survey_detail_v', $data);
    }

    public function surveySaveAjax_post(){
        //var_dump($_POST);
        $params = $_POST;
        //var_dump($params);
        $this->Assocation_m->set_survey_result_ajax($params);
        //echo $data['result'];
    }

    public function surveyInfo_get(){
        $num = $this->get('survey_idx');

        $this->log();
        $data['co_subject'] = '설문조사';
        $data['suheaders'] = $this->Assocation_m->get_survey_header_list($num);

        $data['sudetails'] = $this->Assocation_m->get_survey_detail_list($num);

        $this->load->view('/State/surveyInfo',$data);
    }

    public function survey_submit_ajax_post(){
        //var_dump($this->post());
        $params = $this->post();
        $data['result'] = $this->Assocation_m->set_survey_ajax($params);
    }


    public function InList_post(){
        $nowpage = $this->post('nowpage');
        $after = $this->post('after'); //이후
        $previous =  $this->post('previous'); // 이전
        $searkeyword = $this->post('searkeyword'); // 검색
        $buid = $this->session->userdata('buid');
        //var_dump($buid);

        if ($nowpage > 0) {
            if ($nowpage == '1'){
                $nextsno = 0;
            }else{
                $nextsno = $nowpage -1;
                $nextsno = $nextsno * 15;
            }
        }

        if($after && $previous && $searkeyword){
            $add_sql = " AND survey_title LIKE '%{$searkeyword}%' AND survey_start >= '{$after}' AND survey_end <= '{$previous}' ";
        }elseif ($after && $previous){
            $add_sql = " AND survey_start >= '{$after}' AND survey_end <= '{$previous}' ";
        }elseif ($after && $searkeyword){
            $add_sql = " AND survey_title LIKE '%{$searkeyword}%' AND survey_start >= '{$after}' ";
        }elseif ($previous  && $searkeyword){
            $add_sql = " AND survey_title LIKE '%{$searkeyword}%' AND survey_end <= '{$previous}' ";
        }elseif ($after){
            $add_sql = " AND survey_start >= '{$after}' ";
        }elseif ($previous){
            $add_sql = " AND survey_end <= '{$previous}' ";
        }elseif ($searkeyword){
            $add_sql = " AND survey_title LIKE '%{$searkeyword}%' ";
        }
        $returnData = $this->Assocation_m->Inlist($add_sql,$nowpage);
        //var_dump($returnData);
        $Totalcnt = $this->Assocation_m->InCount();
        //var_dump($Totalcnt['cnt']);
        $i = 0;
        if($Totalcnt[0]['cnt'] > 0){
            foreach ($returnData as $key => $val){
                $sno = $Totalcnt[0]['cnt'] - $i- $nextsno;
                $date_array[] = array(
                    'survey_idx' => $val['survey_idx'],
                    'muid' => $val['muid'],
                    'survey_title' => $val['survey_title'],
                    'inquery_cnt' => $val['inquery_cnt'],
                    'survey_start' => $val['survey_start'],
                    'survey_end' => $val['survey_end'],
                    'Totalcnt'=> $Totalcnt[0]['cnt'],
                    'sno' =>$sno,
                    'response_person' => $val['response_person'],
                );
                $i++;
            }
            echo json_encode($date_array);
        }else{
            $error_date ="E500";
            echo json_encode($error_date);
        }
    }

}