<?php


class Management_m extends CI_Model
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

    public function large(){
        $sql = "SELECT * FROM business_large";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function InList($nowpage,$searkey,$searkeyword,$q_sear){
        //var_dump($nowpage,$searkey,$searkeyword);
        $nowpage = (isset($nowpage)) ? $nowpage : 0;
        if($nowpage > 0){
            if ($nowpage == '1'){ $nowpage = 0;
            }else{
                $nowpage = $nowpage -1;
                $nowpage = $nowpage * 15;
            }
        }
        $sql = "
select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_num = a.SIGNGU_SE and b.code_nam='sgg')SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code from define_code b where b.code_num = a.INS_NAME and b.code_nam='complex'),'-')INS_NAME,												/* 산업단지명 */
	   IFNULL(PNU, '-')PNU,																													/* 토지코드 */
	   IFNULL((select chan_code from define_code b where b.code_num = a.opr_chk and b.table_nam='CPT_CORP_DT' and b.code_nam='01'),'-') OPR_CHK,												/* 가동여부 */
	   IFNULL((select chan_code from define_code b where b.code_num = a.CUR_CON and b.table_nam='CPT_CORP_DT' and b.code_nam='02'),'-')CUR_CON,												/* 현재상태 */
	   IFNULL(INC_NAM, '-')INC_NAM,																											/* 업체명 */
	   IFNULL(CEO_NAM, '-')CEO_NAM,																											/* 대표자명 */
	   IFNULL((select chan_code from define_code b where b.code_num = a.BJD_NAM and b.code_nam = 'emd'),'-')BJD_NAM,												/* 법정동 */
	   IFNULL(JIBUN, '-')JIBUN,																												/* 지번 */
	   IFNULL(TEL_NUM, '-')TEL_NUM,																											/* 대표전화 */
	   IFNULL(FAX_NUM, '-')FAX_NUM,																											/* 팩스번호 */
	   IFNULL(NEW_ADD, '-')NEW_ADD,																											/* 도로명주소 */
	   IFNULL(BSN_LIC, '-')BSN_LIC,																											/* 사업자등록번호 */
	   IFNULL(INC_LIC, '-')INC_LIC,																											/* 주민/법인번호 */
	   IFNULL(REP_SPC, '-')REP_SPC,																											/* 대표업종 */
	   IFNULL(REP_COD, '-')REP_COD,																											/* 업종코드 */
	   IFNULL(GOD_ITM, '-')GOD_ITM,																											/* 생산품목 */
	   IFNULL(GOD_MNY, '-')GOD_MNY,																											/* 생산액(백만원) */
	   IFNULL(EXP_MNY, '-')EXP_MNY,																											/* 수출액(천달러) */
	   IFNULL(CON_DAT, '-')CON_DAT,																											/* 계약신청일 */
	   IFNULL(COC_DAT, '-')COC_DAT,																											/* 입주계약일/변경 */
	   IFNULL(STC_ARA, '0')STC_ARA,																											/* 용지면적(계약) */
	   IFNULL(BDC_ARA, '0')BDC_ARA,																											/* 건축면적(계약) */
	   IFNULL(REG_DAT, '-')REG_DAT,																											/* 등록신청일 */
	   IFNULL(REC_DAT, '-')REC_DAT,																											/* 공장등록일/변경 */
	   IFNULL(SIT_ARA, '0')SIT_ARA,																											/* 용지면적(완료) */
	   IFNULL(BLD_ARA, '0')BLD_ARA,																											/* 건축면적(완료) */
	   IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.ETC_FAC),'-')ETC_FAC,					/* 부대시설종류 */
	   IFNULL((select chan_code from define_code b where b.code_num = a.OWN_CHK),'-')OWN_CHK,												/* 소유구분 */
	   IFNULL(LES_CHK, '-')LES_CHK,																											/* 임대구분 */
	   IFNULL(DEP_MNY, '0')DEP_MNY,																											/* 보증금 */
	   IFNULL(LES_MNY, '0')LES_MNY,																											/* 임대료 */
	   IFNULL(LES_POD, '-')LES_POD,																											/* 임대기간 */
	   IFNULL(LES_INC, '-')LES_INC,																											/* 임대업체 */
	   IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.NEW_CHK),'-')NEW_CHK,					/* 신설구분 */
	   IFNULL(PRE_LOC, '-')PRE_LOC,																											/* 산단입주전소재지 */
	   IFNULL(SAM_MOV, '-')SAM_MOV,																											/* 동일이전 */
	   IFNULL(EXP_MOV, '-')EXP_MOV,																											/* 확장이전 */
	   IFNULL(ADD_MOV, '-')ADD_MOV,																											/* 증설이전 */
	   IFNULL(PRO_POS, '-')PRO_POS,																											/* 건의사항 */
	   IFNULL(TOT_MAN, '0')TOT_MAN,																											/* 총인원 */
	   IFNULL(ADD_MAN, '0')ADD_MAN,																											/* 산단입주후증가인원 */
	   IFNULL(WHT_MAN, '0')WHT_MAN,																											/* 직무별_사무직 */
	   IFNULL(BLU_MAN, '0')BLU_MAN,																											/* 직무별_생산직 */
	   IFNULL(MAL_WOK, '0')MAL_WOK,																											/* 국적성별_남종업원 */
	   IFNULL(FML_WOK, '0')FML_WOK,																											/* 국적성별_여종업원 */
	   IFNULL(MAL_FOR, '0')MAL_FOR,																											/* 국적성별_외국인(남) */
	   IFNULL(FML_FOR, '0')FML_FOR,																											/* 국적성별_외국인(여) */
	   IFNULL(TEN_AGE, '0')TEN_AGE,																											/* 연령별 10~20대 */
	   IFNULL(FOR_AGE, '0')FOR_AGE,																											/* 연령별 30~50대 */
	   IFNULL(SIX_AGE, '0')SIX_AGE,																											/* 연령별 60대 이상 */
	   IFNULL(BSN_MAN, '0')BSN_MAN,																											/* 거주지별_부산 */
	   IFNULL(KIM_MAN, '0')KIM_MAN,																											/* 거주지별_김해 */
	   IFNULL(ULS_MAN, '0')ULS_MAN,																											/* 거주지별_울산 */
	   IFNULL(YAS_MAN, '0')YAS_MAN,																											/* 거주지별_양산 */
	   IFNULL(CHA_MAN, '0')CHA_MAN,																											/* 거주지별_창원 */
	   IFNULL(BUS_NUM, '0')BUS_NUM,																											/* 통근버스보유대수 */
	   IFNULL(INC_BUS, '0')INC_BUS,																											/* 출퇴근_통근버스 */
	   IFNULL(CMP_BUS, '0')CMP_BUS,																											/* 출퇴근_기관운행버스 */
	   IFNULL(SEF_CAR, '0')SEF_CAR,																											/* 출퇴근_자가용 */
	   IFNULL(PUB_TRS, '0')PUB_TRS,																											/* 출퇴근_대중교통 */
	   IFNULL(COM_WAK, '0')COM_WAK,																											/* 출퇴근_도보 */
	   IFNULL(CAL_MAN, '-')CAL_MAN,																											/* 담당자명 */
	   IFNULL(CAL_CEL, '-')CAL_CEL,																											/* 휴대폰번호 */
	   IFNULL(EXP1_IMG, '-')EXP1_IMG,																										/* 사진_외부1 */
	   IFNULL(EXP2_IMG, '-')EXP2_IMG,																										/* 사진_외부2 */
	   IFNULL(IN1_IMG, '-')IN1_IMG,																											/* 사진_내부1 */
	   IFNULL(IN2_IMG, '-')IN2_IMG,																											/* 사진_내부2 */
	   IFNULL(a.SIGNGU_SE,'-')CD_SIGNGU_SE, 
	   IFNULL(a.INS_NAME,'-')CD_INS_NAME
  from CPT_CORP_DT a
 where (instr( {$searkey}, '{$q_sear}') AND instr(INC_NAM,'{$searkeyword}'))  order by CPX_NUM desc LIMIT  ".$nowpage.", 15
        ";
        $rs = $this->master->query($sql);
        /*echo json_encode($this->master->last_query());
        exit;*/
        $rows = $rs->result_array();
        return $rows;
    }

    public function InCount($searkey,$searkeyword,$q_sear){
        $sql = "
select 
    count(*) as cnt
  from CPT_CORP_DT a
 where (instr( {$searkey}, '{$q_sear}') AND instr(INC_NAM,'{$searkeyword}'))
        ";
        $rs =  $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }   
}