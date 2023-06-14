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
class Management extends REST_Controller
{
    private $any_order = '';
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $page = 0;
    public $param_data = [];

    private $http_state_code = 500;


    function __construct()
    {

        // Construct the parent class
        parent::__construct();

        # 로그인 검증 로직
        $this->load->library('session');
        $this->load->model('notice/Management_m');
    }

    function InList_post(){
        $nowpage = $this->post('nowpage'); // 페이지
        $searkey = $this->post('searkey'); // 검색 조건 대표업종
        $searkeyword = $this->post('searkeyword'); // 검색어
		$q_sear = $this->post("q_sear"); // 업종, 생산품

        if ($nowpage > 0) {
            if ($nowpage == '1'){
                $nextsno = 0;
            }else{
                $nextsno = $nowpage -1;
                $nextsno = $nextsno * 15;
            }
        }


        $returnData = $this->Management_m->InList($nowpage,$searkey,$searkeyword,$q_sear);
        //var_dump($returnData);
        $Totalcnt = $this->Management_m->InCount($searkey,$searkeyword, $q_sear);
        /*echo json_encode($Totalcnt);
        exit();*/
        $i = 0;
        if($Totalcnt > 0){
            foreach ($returnData as $key => $val){
                $sno = $Totalcnt[0]['cnt'] - $i - $nextsno;
                $date_array[] = array(
                    'cpx_num' => $val['CPX_NUM'], // 고유번호
                    'ins_name' => $val['INS_NAME'], // 산업단지명
                    'inc_nam' => $val['INC_NAM'], // 업체명
                    'ceo_nsam' => $val['CEO_NAM'], //대표 이름
                    'tel_num' => $val['TEL_NUM'], // 전화번호
                    'new_add' => $val['NEW_ADD'], // 주소
                    'repp_spc' => $val['REP_SPC'], // 대표업종
                    'Totalcnt' => $Totalcnt[0]['cnt'],
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