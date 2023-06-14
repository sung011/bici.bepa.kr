<?php

class InAdmData_m extends CI_Model
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
    public function Bannlist()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;

        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->select("B.wr_id,B.wr_subject,B.wr_content,B.wr_link1,B.wr_hit,date_format(B.wr_datetime,'%Y-%m-%d') as wr_datetime,B.eb_3");
        $this->master->select("F.bf_source,F.bf_file,F.bf_filesize");
        $this->master->where('eb_10 != 2 ');
        $this->master->order_by("B.wr_id", 'desc');
        $this->master->from("g5_write_main_banner as B");
        $this->master->join("g5_board_file AS F", "F.wr_id = B.wr_id AND F.bo_table ='main_banner'", 'LEFT');
        if ($nowpage > 0) {
            if ($nowpage == '1') {
                $nowpage = 0;
            } else {
                $nowpage = $nowpage - 1;
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


    public function BannerCnt()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;     #

        //if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->where('eb_10 != 2 ');
        $this->master->select("count(*) as cnt");
        $this->master->order_by("wr_id", 'desc');
        $this->master->from("g5_write_main_banner");

        $rs = $this->master->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function BannerDel()
    {
        extract($this->param_data);
        $wrid = (isset($wrid)) ? $wrid : NULL;

        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $query_data = array(
            "eb_10" => '2'
        );
        $this->master->where(" wr_id in (" . $wrid . ") ");
        $this->master->update("g5_write_main_banner", $query_data);
        //$this->master->delete("g5_write_main_banner");
        //echo $this->master->last_query();
        //exit;
        if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
            $this->db_error = $this->master->error();
        }
        require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';

        return $result_array;
    }

    public function BannIn()
    {

        extract($this->param_data);

        $wr_subject = (isset($wr_subject)) ? $wr_subject : NULL;
        $wr_link1 = (isset($wr_link1)) ? $wr_link1 : NULL;
        $wr_id = (isset($wr_id)) ? $wr_id : NULL;
        $bf_file_del = (isset($bf_file_del)) ? $bf_file_del : NULL;


        $bo_table = "main_banner";
        $wr_ip = $_SERVER["REMOTE_ADDR"];
        $nowDate = date("Y-m-d H:i:s");
        $wr_num = "";
        if ($wr_id) {
            //echo "bbb";
            //print_r($bf_file_del);
            if ($bf_file_del) {
                $file_del_cnt = count($bf_file_del);
                if ($file_del_cnt > 0) {
                    //echo "cccc";
                    for ($k = 0; $k < $file_del_cnt; $k++) {
                        unlink("./data/file/main_banner/" . $bf_file_del[$k]);
                    }
                }
            }

            //exit;
            $query_data = array(
                "wr_subject" => $wr_subject
            , "wr_content" => $wr_subject
            , "wr_link1" => $wr_link1
            , "mb_id" => $_SESSION['mb_id']
            , "wr_password" => '6d9ba7dd764f0173'
            , "wr_name" => $_SESSION['mb_name']
            , "wr_email" => $_SESSION['mb_email']
            , "wr_last" => $nowDate
            );
            $this->master->where(" wr_id =" . $wr_id . " ");
            $this->master->update("g5_write_main_banner", $query_data);
            if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
                $this->db_error = $this->master->error();
                $result_array['success'] = "E400";
            } else {
                $result_array['success'] = "E200";
            }

            if ($file_cnt > 0) {
                for ($j = 0; $j < $file_cnt; $j++) {
                    $bfile_name = $upload[$j]['upload_data']['file_name'];
                    $bfile_type = $upload[$j]['upload_data']['file_type'];
                    $bfull_path = $upload[$j]['upload_data']['full_path'];
                    $borig_name = $upload[$j]['upload_data']['orig_name'];
                    $bfile_ext = $upload[$j]['upload_data']['file_ext'];
                    $bfile_size = $upload[$j]['upload_data']['file_size'] * 1024;
                    $bimage_type = $upload[$j]['upload_data']['image_type'];
                    $image_size_str = $upload[$j]['upload_data']['image_size_str'];

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
                        "bf_datetime" => $nowDate
                    );
                    $this->master->where(" wr_id =" . $wr_id . " and bo_table='" . $bo_table . "' ");
                    $this->master->update('g5_board_file', $file_Date);
                }
            }


        } else {
            //echo "aaaa";
            //exit;
            $this->master->select("MAX(wr_id) +1 as next_id");
            $this->master->from("g5_write_main_banner");
            $rs = $this->master->get();

            $rows = $rs->result_array();
            $next_wrid = $rows[0]['next_id'];
            if ($next_wrid) {
                $wr_num = "-" . $next_wrid;
            } else {
                $next_wrid = 1;
                $wr_num = -1;
            }

            $add_Date = array(
                "wr_id" => $next_wrid,
                "wr_num" => $wr_num,
                "wr_reply" => '',
                "wr_parent" => $next_wrid,
                "wr_is_comment" => 0,
                "wr_comment" => 0,
                "wr_comment_reply" => '',
                "ca_name" => '',
                "wr_option" => '',
                "wr_subject" => $wr_subject,
                "wr_content" => $wr_subject,
                "wr_link1" => $wr_link1,
                "wr_link2" => '',
                "mb_id" => $_SESSION['mb_id'],
                "wr_password" => '6d9ba7dd764f0173',
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

            $this->master->insert("g5_write_main_banner", $add_Date);

            if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
                $this->db_error = $this->master->error();
                $result_array['success'] = "E400";
            } else {
                $result_array['success'] = "E200";
            }

            if ($file_cnt > 0) {
                for ($j = 0; $j < $file_cnt; $j++) {
                    $bfile_name = $upload[$j]['upload_data']['file_name'];
                    $bfile_type = $upload[$j]['upload_data']['file_type'];
                    $bfull_path = $upload[$j]['upload_data']['full_path'];
                    $borig_name = $upload[$j]['upload_data']['orig_name'];
                    $bfile_ext = $upload[$j]['upload_data']['file_ext'];
                    $bfile_size = $upload[$j]['upload_data']['file_size'] * 1024;
                    $bimage_type = $upload[$j]['upload_data']['image_type'];
                    $image_size_str = $upload[$j]['upload_data']['image_size_str'];

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
                        "bf_datetime" => $nowDate
                    );
                    $this->master->insert('g5_board_file', $file_Date);
                }
            }
        }
        return $result_array;
    }

    public function Admcontentlist()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;

        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->select("B.co_id,B.co_subject,B.co_content,B.co_html");
        $this->master->from("g5_content as B");
        //$this->master->join("g5_board_file AS F", "F.wr_id = B.wr_id AND F.bo_table ='main_banner'", 'LEFT');

        $rs = $this->master->get();
        $rows = $rs->result_array();
        //echo $this->master->last_query();
        //exit;
        return $rows;
    }

    public function Mapfile()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;

        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        //if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        //$this->master->select("B.co_id,B.co_subject,B.co_content,B.co_html");
        $this->master->where(" bo_table='ic_map_p' ");
        $this->master->from("g5_board_file");

        $rs = $this->master->get();
        $rows = $rs->result_array();

        return $rows;
    }

    public function GcontentSave()
    {
        extract($this->param_data);
        $co_content = (isset($co_content)) ? $co_content : NULL;
        $co_subject = (isset($co_subject)) ? $co_subject : NULL;
        $co_id = (isset($co_id)) ? $co_id : NULL;
        if ($co_id) {
            $query_data = array(
                "co_content" => $co_content
            , "co_subject" => $co_subject
            );
            $this->master->where(" co_id ='" . $co_id . "' ");
            $this->master->update("g5_content", $query_data);
            //echo $this->master->last_query();
            //exit;
            if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
                $this->db_error = $this->master->error();
                $result_array['success'] = "E400";
            } else {
                $result_array['success'] = "E200";
            }
        }
        return $result_array;
    }

    public function MainPopup()
    {
        extract($this->param_data);
        $to_date = date("Y-m-d");
        //if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        //if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->where(" nw_begin_time < '" . $to_date . "' AND nw_end_time > '" . $to_date . "' ");
        $this->master->order_by("nw_id", 'desc');
        $this->master->from("g5_new_win");
        $rs = $this->master->get();
        //echo $this->master->last_query();
        //exit;
        $rows = $rs->result_array();

        return $rows;
    }

    public function Popuplayerlist()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        $p_subject = (isset($p_subject)) ? $p_subject : NULL;
        $p_device = (isset($p_device)) ? $p_device : NULL;
        $begin_date = (isset($begin_date)) ? $begin_date : NULL;
        $end_date = (isset($end_date)) ? $end_date : NULL;

        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->order_by("nw_id", 'desc');
        $this->master->from("g5_new_win");
        if ($nowpage > 0) {
            if ($nowpage == '1') {
                $nowpage = 0;
            } else {
                $nowpage = $nowpage - 1;
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

    public function PopuplayerCount()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        $p_subject = (isset($p_subject)) ? $p_subject : NULL;
        $p_device = (isset($p_device)) ? $p_device : NULL;
        $begin_date = (isset($begin_date)) ? $begin_date : NULL;
        $end_date = (isset($end_date)) ? $end_date : NULL;


        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->select("count(*) as cnt");
        $this->master->order_by("nw_id", 'desc');
        $this->master->from("g5_new_win");
        //echo $this->master->last_query();
        //exit;
        $rs = $this->master->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function Customlist()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        $searkey = (isset($searkey)) ? $searkey : 0;
        $searkeyword = (isset($searkeyword)) ? $searkeyword : 0;

        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->order_by("mb_no", 'desc');
        $this->master->from("g5_member");
        if ($nowpage > 0) {
            if ($nowpage == '1') {
                $nowpage = 0;
            } else {
                $nowpage = $nowpage - 1;
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

    public function CustomCount()
    {
        extract($this->param_data);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        $searkey = (isset($searkey)) ? $searkey : 0;
        $searkeyword = (isset($searkeyword)) ? $searkeyword : 0;


        if (!empty($this->sql_select)) $this->master->select($this->sql_select);
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->select("count(*) as cnt");
        $this->master->from("g5_member");

        $rs = $this->master->get();
        $rows = $rs->result_array();
        return $rows;
    }

    public function CustomIn()
    {
        extract($this->param_data);
        function sql_old_password($value)
        {
            if ($value == '')
                return '';

            $nr = 1345345333;
            $add = 7;
            $nr2 = 0x12345671;
            foreach (str_split($value) as $c) {
                if ($c == ' ' or $c == "\t")
                    continue;
                $tmp = ord($c);
                $nr ^= ((($nr & 63) + $add) * $tmp) + (($nr << 8) & 0xFFFFFFFF);
                $nr2 += (($nr2 << 8) & 0xFFFFFFFF) ^ $nr;
                $add += $tmp;
            }

            if ($nr2 > PHP_INT_MAX)
                $nr2 += PHP_INT_MAX + 1;

            $bit = (1 << 31) - 1;

            return sprintf("%08lx%08lx", $nr & $bit, $nr2 & $bit);
        }

        $mb_no = (isset($mb_no)) ? $mb_no : NULL;
        $mb_password = (isset($mb_password)) ? $mb_password : NULL;
        $mb_level = (isset($mb_level)) ? $mb_level : '2';

        $pass = sql_old_password($mb_password);

        /*$sql = "SELECT OLD_PASSWORD('" . $mb_password . "') as passwd";
        $query = $this->master->query($sql);
        $pass = $query->result_array();*/
        $mb_nick_date = "0000-00-00";
        if ($mb_nick) {
            $mb_nick_date = date("Y-m-d");
        }
        $mb_datetime = date("Y-m-d H:i:s");
        $mb_open_date = date("Y-m-d");
        $mb_today_login = date("Y-m-d H:i:s");
        $mb_email_certify = date("Y-m-d H:i:s");
        $mb_login_ip = $_SERVER["REMOTE_ADDR"];
        if (empty($mb_level)) $mb_level = '2';

        if ($mb_no) {
            $query_data = array(
                "mb_id" => $mb_id,
                /*"mb_password" => $pass[0]['passwd'],*/
                "mb_password" => $pass,
                "mb_name" => $mb_name,
                "mb_nick" => $mb_nick,
                "mb_nick_date" => $mb_nick_date,
                "mb_level" => $mb_level,
                "mb_email" => $mb_email,
                "mb_homepage" => $mb_homepage,
                "mb_hp" => $mb_hp,
                "mb_tel" => $mb_tel,
                "mb_zip1" => $mb_zip1,
                "mb_addr1" => $mb_addr1,
                "mb_addr2" => $mb_addr2,
                "mb_mailling" => $mb_mailling,
                "mb_open" => $mb_open,
                "mb_profile" => $mb_profile,
                "mb_memo" => $mb_memo,
                "mb_leave_date" => $mb_leave_date,
                "mb_intercept_date" => $mb_intercept_date,
                "mb_1" => $uid,
                "mb_2" => $mb_company,
            );
            $this->master->where(" mb_no =" . $mb_no . " ");
            $this->master->update("g5_member", $query_data);
            //echo $this->master->last_query();
            //exit;
            if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
                $this->db_error = $this->master->error();
                $result_array['success'] = "E400";
            } else {
                $result_array['success'] = "E200";
            }

        } else {

            $this->master->select("MAX(mb_no) +1 as next_id");
            $this->master->from("g5_member");
            $rs = $this->master->get();

            $rows = $rs->result_array();
            $next_wrid = $rows[0]['next_id'];
            if ($next_wrid) {
            } else {
                $next_wrid = 1;
            }
            //echo $mb_level;
            //exit;
            $add_Date = array(
                "mb_no" => $next_wrid,
                "mb_id" => $mb_id,
                /*"mb_password" => $pass[0]['passwd'],*/
                "mb_password" => $pass,
                "mb_name" => $mb_name,
                "mb_nick" => $mb_nick,
                "mb_level" => $mb_level,
                "mb_email" => $mb_email,
                "mb_homepage" => $mb_homepage,
                "mb_hp" => $mb_hp,
                "mb_tel" => $mb_tel,
                "mb_zip1" => $mb_zip1,
                "mb_addr1" => $mb_addr1,
                "mb_addr2" => $mb_addr2,
                "mb_profile" => $mb_profile,
                "mb_memo" => $mb_memo,
                "mb_leave_date" => $mb_leave_date,
                "mb_intercept_date" => $mb_intercept_date,
                "mb_signature" => "",
                "mb_lost_certify" => "",
                "mb_mailling" => $mb_mailling,
                "mb_open_date" => $mb_open_date,
                "mb_email_certify" => $mb_email_certify,
                "mb_open" => $mb_open,
                "mb_datetime" => $mb_datetime,
                "mb_today_login" => $mb_today_login,
                "mb_login_ip" => $mb_login_ip,
                "mb_1" => $uid,
                "mb_2" => $mb_company,
            );

            $this->master->insert("g5_member", $add_Date);

            if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
                $this->db_error = $this->master->error();
                $result_array['success'] = "E400";
            } else {
                $result_array['success'] = "E200";
            }
        }
        return $result_array;
    }

    public function CustomDel()
    {
        extract($this->param_data);
        $mb_no = (isset($mb_no)) ? $mb_no : NULL;
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);

        $this->master->where(" mb_no in (" . $mb_no . ") ");
        $this->master->delete("g5_member");
        //echo $this->master->last_query();
        //exit;
        if ($this->master->error()['code'] !== 0 && empty($this->db_error['code'])) {
            $this->db_error = $this->master->error();
        }
        require $_SERVER['DOCUMENT_ROOT'] . '/common/query_check.php';
        return $result_array;
    }

    public function Emailconfirm()
    {
        extract($this->param_data);
        $Snic_email = (isset($Snic_email)) ? $Snic_email : NULL;
        $Snic_pwd = (isset($Snic_pwd)) ? $Snic_pwd : NULL;
        if (!empty($this->add_sql)) $this->master->where($this->add_sql);
        $this->master->select("*");
        $this->master->where(" mb_email = '" . $Snic_email . "' ");
        $this->master->from("g5_member");
        $rs = $this->master->get();
        $rows = $rs->result_array();
        $mb_name = $rows[0]['mb_name'];


        if ($mb_name) {
            $sql = "SELECT OLD_PASSWORD('" . $Snic_pwd . "') as passwd";
            $query = $this->master->query($sql);
            $pass = $query->result_array();

            $query_data = array(
                "mb_password" => $pass[0]['passwd'],
            );
            $this->master->where(" mb_email ='" . $Snic_email . "' ");
            $this->master->update("g5_member", $query_data);

        } else {

        }

        return $rows;
    }

}