<?php

class RctReview_m extends CI_Model
{
    private $any_order = '';
    private $db_error = [];
    public $add_sql_array = [];
    public $add_sql;
    public $sql_select;
    public $param_data = [];

    public function __construct()
    {
        parent::__construct();
        $this->any_order = $this->load->database('any_order', true);
    }

    /******************
     * 리뷰 검색
     ******************/
    public function get_list()
    {
        if (!empty($this->sql_select)) $this->any_order->select($this->sql_select);
        if (!empty($this->add_sql)) $this->any_order->where($this->add_sql);
        $this->any_order->from("AO_STORE_REVIEW ASR");
        $this->any_order->join("AO_MEMBER AM", "ASR.MEMBER_ID=AM.MEMBER_ID", "LEFT");
        $this->any_order->order_by("ASR.SR_UDATE", "DESC");
        $rs = $this->any_order->get();
        $rows = $rs->result_array();

        return $rows;
    }

    /****************
     * 리뷰 등록, 수정
     ***************/
    public function save()
    {
        extract($this->param_data);
        $result_array = [];

        $query_data = [];

        # 분기
        $mode = isset($mode) ? $mode : '';

        # 리뷰 번호
        $rvId = isset($rvId) ? $rvId : '';

        # 회원 번호
        $memberId = isset($memberId) ? $memberId : '';

        # api id
        $comId = isset($comId) ? $comId : '';

        # 가맹점 코드
        $rctCode = isset($rctCode) ? $rctCode : '';

        # 평가
        $rating = isset($rating) ? $rating : 1;

        # 즐겨찾기 메모
        $rvContents = isset($rvContents)? $rvContents : '';

        if ($mode === 'insert') {
            $query_data = array(
                  "MEMBER_ID" => $memberId
                , "COM_ID" => $comId
                , "RCT_CODE" => $rctCode
                , "RV_CONTENTS" => $rvContents
            );
            $this->any_order->set('RATING', $rating, FALSE);
            $this->any_order->insert("AO_STORE_REVIEW", $query_data);
        } else if ($mode === 'update') {
            $query_data = array(
                  "RATING" => $rating
                , "RV_CONTENTS" => $rvContents
            );
            $this->any_order->where("RV_ID", $rvId);
            $this->any_order->update("AO_STORE_REVIEW", $query_data);
        }

        if ($this->any_order->error()['code'] !== 0 && empty($this->db_error['code'])) {
            $this->db_error = $this->any_order->error();
        }

        require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

        return $result_array;
    }

    /***********
     * 리뷰 삭제
     ***********/
    public function delete()
    {
        $result_array = [];
        if (!empty($this->add_sql)) $this->any_order->where($this->add_sql);
        $this->any_order->delete("AO_STORE_REVIEW");

        if ($this->any_order->error()['code'] !== 0 && empty($this->db_error['code'])) {
            $this->db_error = $this->any_order->error();
        }

        require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

        return $result_array;
    }


    ###################################################################################
}