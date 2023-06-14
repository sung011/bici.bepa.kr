<?php
class Log_visit_m extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->master = $this->load->database('master', true);
    }

    public function Log_visitIn(){
        $log_ip = $_SERVER['REMOTE_ADDR'];
        $log_date = date('Y-m-d');
        $log_time = date('H:i:s');
        $log_id = $this->session->userdata('mb_id');
        $in_date = array(
            "log_ip" => $log_ip,
            "log_date" => $log_date,
            "log_time" => $log_time,
            "log_referer" => $_SERVER['REQUEST_URI'],
            "log_id" => $log_id,
            "log_agent" => $_SERVER['HTTP_USER_AGENT'],
        );
        $this->master->insert('log_visit', $in_date);
    }

    public function Log_dateGet(){
        $log_date = date('Y-m-d');
        $log_id = $this->session->userdata('mb_id');
        //$_SERVER['REQUEST_URI']

        $this->db->select("log_date");
        $this->db->where("log_date",$log_date);
        $this->db->where("log_id",$log_id);
        $this->db->where("log_referer",$_SERVER['REQUEST_URI']);
        $this->db->from("log_visit");
        $rs = $this->db->get();
        $rows = $rs->result_array();
        return $rows;
    }
}