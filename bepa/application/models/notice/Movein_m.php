<?php


class Movein_m extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->master = $this->load->database('master', true);
    }


    public function status_list()
    {
  //       $sql = "
  //       select DISTINCT a.signgu_se,																									/* 시군구코드 */
	 //  (select chan_code from define_code b where b.code_num = a.signgu_se and code_nam='sgg')name,								/* 시군구 */
	 //  count(a.INS_NAME) ins_num,																								/* 합계(계) */
	 //  (select round(SUM(b.INS_AREA),1) from ins_info_dt b where b.signgu_se=a.signgu_se) ins_area,								/* 합계(면적) */
	 //  (select count(b.INS_ING) from ins_info_dt b where b.ins_ing='ing001' and b.signgu_se=a.signgu_se) ing001,					/* 조성완료(계) */
	 //  (select round(SUM(b.INS_AREA),1) from ins_info_dt b where b.ins_ing='ing001' and b.signgu_se=a.signgu_se) ing001_area,	/* 조성완료(면적) */
	 //  (select count(b.INS_ING) from ins_info_dt b where b.ins_ing='ing002' and b.signgu_se=a.signgu_se) ing002,					/* 조성중(계) */
	 //  (select SUM(b.INS_AREA) from ins_info_dt b where b.ins_ing='ing002' and b.signgu_se=a.signgu_se) ing002_area, /* 조성중(면적) */
	 //  (select count(b.INS_TYPE) from ins_info_dt b where b.ins_type='INS001' and b.signgu_se=a.signgu_se) ins001,				/* 산단종류(국가산단) */
	 //  (select count(b.INS_TYPE) from ins_info_dt b where b.ins_type='INS002' and b.signgu_se=a.signgu_se) ins002,				/* 산단종류(일반산단) */
	 //  (select count(b.INS_TYPE) from ins_info_dt b where b.ins_type='INS003' and b.signgu_se=a.signgu_se) ins003,				/* 산단종류(도시첨단) */
	 //  (select count(b.INS_TYPE) from ins_info_dt b where b.ins_type='INS004' and b.signgu_se=a.signgu_se) ins004,				/* 산단종류(농공산단) */
	 //  (select count(b.PRO_TYPE) from ins_info_dt b where b.PRO_TYPE='PRO001' and b.signgu_se=a.signgu_se) PRO001,				/* 사업유형(공공사업) */
	 //  (select count(b.PRO_TYPE) from ins_info_dt b where b.PRO_TYPE='PRO002' and b.signgu_se=a.signgu_se) PRO002,				/* 사업유형(민간사업) */
	 //  (select count(b.PRO_TYPE) from ins_info_dt b where b.PRO_TYPE='PRO003' and b.signgu_se=a.signgu_se) PRO003,				/* 사업유형(신탁사업) */
	 //  (select sum(b.BSNS_COST) from ins_info_dt b where b.signgu_se=a.signgu_se) BSNS_COST,										/* 사업비(억) */
	 //  (select count(b.INC_NAM) from cpt_corp_dt b where b.signgu_se=a.signgu_se) inc_nam,										/* 업체수 */
	 //  IFNULL((select sum(b.tot_man) from snicorkr.cpt_corp_dt b where b.signgu_se=a.signgu_se), 0) employee_cnt										/* 종업원수 */
  // from INS_INFO_DT a group by a.signgu_se order by name asc 
  //       ";


    	$sql = "select DISTINCT A.signgu_se                                                                                       							  /* 군구코드 */
     , (SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.signgu_se AND code_nam = 'sgg') name    							  /* 군구 */
     , COUNT(A.ins_name) ins_num																				  							  /* 합계(계) */
	 , (SELECT ROUND(SUM(B.ins_area), 1) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se) ins_area                  			  /* 합계(면적) */
     , (SELECT COUNT(B.ins_ing) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_ing = 'ing001') ing001   			 	  /* 조성완료(계) */										
     , (SELECT ROUND(SUM(B.ins_area), 1) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_ing = 'ing001') ing001_area    /* 조성완료(면적) */
     , (SELECT COUNT(B.ins_ing) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_ing = 'ing002') ing002   			 	  /* 조성중(계) */	
     , (SELECT ROUND(SUM(B.ins_area), 1) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_ing = 'ing002') ing002_area    /* 조성중(면적) */
     , (SELECT COUNT(B.ins_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_type = 'ins001') ins001   			  /* 산업단지종류(국가) */	
     , (SELECT COUNT(B.ins_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_type = 'ins002') ins002   			  /* 산업단지종류(일반) */
     , (SELECT COUNT(B.ins_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_type = 'ins003') ins003   			  /* 산업단지종류(도시첨단) */
	 , (SELECT COUNT(B.ins_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_type = 'ins004') ins004   			  /* 산업단지종류(농공단지) */
     , (SELECT COUNT(B.pro_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.pro_type = 'pro001') PRO001   			  /* 사업유형(공영개발) */
	 , (SELECT COUNT(B.pro_type) FROM snicorkr.ins_info_dt B WHERE B.signgu_se = A.signgu_se AND B.pro_type = 'pro002') PRO002   			  /* 사업유형(민간개발) */
	 -- , (SELECT COUNT(B.pnu) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se) inc_nam                                              /* 업체수 */
     , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se) inc_nam	 									  /* 업체수 */
     , (SELECT SUM(IFNULL(B.tot_man, 0)) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se) employee_cnt							  /* 종업원수 */
  FROM snicorkr.ins_info_dt A GROUP BY A.signgu_se ORDER BY ins_num DESC, ins_area DESC";

        $rs = $this->master->query($sql);
        $rows = $rs->result_array();

        return $rows;
    }

    public function company_list()
    {
        $sql = "
        select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_nam = 'sgg' and b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code from define_code b where b.code_nam = 'complex' and b.code_num = a.INS_NAME),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a order by a.CPX_NUM desc
        ";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function industry_all_list()
    {
    	$sql = "select (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.signgu_se AND code_nam='sgg') g_name         /* 군구 */
	 , A.signgu_se g_code                                                                                                /* 군구코드 */
     , (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.ins_name AND B.code_nam='complex') name      /* 단지명 */  
     , ins_name                                                                                                          /* 단지코드 */
     , (SELECT REPLACE(B.chan_code, '산업단지', '') FROM snicorkr.define_code B WHERE B.code_num = A.ins_type) ins_type    /* 산단종류 */
     , (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.ins_ing) ins_ing                             /* 현황구분 */
     , A.ins_area                                                                                                        /* 면적 */
     , A.ji_date                                                                                                         /* 단지지정일자 */
     , CASE WHEN ((SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.pro_type) = '공공사업') THEN '공영개발'
            WHEN ((SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.pro_type) = '민간사업') THEN '민간개발'
			ELSE ''
             END pro_type    /* 사업유형 */
     , A.enforcer_name                                                                                                   /* 사업시행자 */
     -- , (SELECT COUNT(B.cpx_num) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) inc_nam					     /* 업체수 */
     -- , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) inc_nam					 /* 업체수 */
     -- , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se) inc_nam	 				 /* 업체수 */
	 , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_name = A.ins_name) inc_nam    /* 업체수 */
     -- , (SELECT SUM(IFNULL(B.tot_man, 0)) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) tot_man				 /* 종업원수 */
     , IFNULL((SELECT SUM(IFNULL(B.tot_man, 0)) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_name = A.ins_name), 0) tot_man    /* 종업원수 */
  FROM snicorkr.ins_info_dt A ORDER BY FIELD(g_name, '강서구', '기장군', '사하구', '사상구', '해운대구', '금정구', '북구'), name";

        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function industry_list($num)
    {
 //        $sql = "
 //        select (select chan_code from snicorkr.define_code b where b.code_num = a.signgu_se and code_nam='sgg') g_name,
 //       (select b.chan_code from define_code b where b.code_nam='complex' and b.code_num=a.INS_NAME) name ,						/* 산업단지명 */
	//    ins_name,																												/* 산업단지코드 */
	//    (select REPLACE(b.chan_code, '산업단지', '') from define_code b where  b.code_num=a.INS_TYPE) ins_type,											/* 산단종류 */
	//    (select b.chan_code from define_code b where  b.code_num=a.INS_ING) ins_ing,												/* 현황구분 */
	//    a.ins_area,																												/* 산단면적 */
	//    a.ji_date,																												/* 단지지정일자 */
	//    (select b.chan_code from define_code b where  b.code_num=a.PRO_TYPE) pro_type,											/* 사업유형 */
	//    a.enforcer_name,																											/* 사업시행자 */
	//    IFNULL((select b.chan_code from define_code b where  b.code_num=a.site_code),'-') site_code,								/* 관리기관 */
	//    (select count(b.INC_NAM) from cpt_corp_dt b where b.ins_name=a.ins_name) inc_nam,										/* 업체수 */
	//    IFNULL((select sum(b.tot_man) from cpt_corp_dt b where b.ins_name=a.ins_name), 0) tot_man								/* 종업원수 */
 //  from INS_INFO_DT a
 // where signgu_se='{$num}'
 //        ";

    	$sql = "select (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.signgu_se AND code_nam='sgg') g_name         /* 군구 */
     , (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.ins_name AND B.code_nam='complex') name      /* 단지명 */  
     , ins_name                                                                                                          /* 단지코드 */
     , (SELECT REPLACE(B.chan_code, '산업단지', '') FROM snicorkr.define_code B WHERE B.code_num = A.ins_type) ins_type    /* 산단종류 */
     , (SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.ins_ing) ins_ing                             /* 현황구분 */
     , A.ins_area                                                                                                        /* 면적 */
     , A.ji_date                                                                                                         /* 단지지정일자 */
     , CASE WHEN ((SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.pro_type) = '공공사업') THEN '공영개발'
            WHEN ((SELECT B.chan_code FROM snicorkr.define_code B WHERE B.code_num = A.pro_type) = '민간사업') THEN '민간개발'
			ELSE ''
             END pro_type    /* 사업유형 */
     , A.enforcer_name                                                                                                   /* 사업시행자 */
     -- , (SELECT COUNT(B.cpx_num) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) inc_nam					     /* 업체수 */
     -- , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) inc_nam					 /* 업체수 */
     -- , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se) inc_nam	 				 /* 업체수 */
	 , (SELECT COUNT(B.inc_nam) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_name = A.ins_name) inc_nam    /* 업체수 */
     -- , (SELECT SUM(IFNULL(B.tot_man, 0)) FROM snicorkr.cpt_corp_dt B WHERE B.ins_name = A.ins_name) tot_man				 /* 종업원수 */
     , IFNULL((SELECT SUM(IFNULL(B.tot_man, 0)) FROM snicorkr.cpt_corp_dt B WHERE B.signgu_se = A.signgu_se AND B.ins_name = A.ins_name), 0) tot_man    /* 종업원수 */
  FROM snicorkr.ins_info_dt A
 WHERE signgu_se = '{$num}' ORDER BY name";

        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function industry_name($num)
    {
        $sql = "select chan_code from define_code where CODE_NUM = '{$num}'";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function companyInfo($num) {
 //        $sql = "
 //        select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
 //       (select chan_code from define_code b where b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	//    IFNULL((select chan_code from define_code b where b.code_nam = 'complex' and b.code_num = a.INS_NAME),'-')INS_NAME,												/* 산업단지명 */
 //       IFNULL((SELECT C.chan_code FROM snicorkr.INS_INFO_DT B, snicorkr.define_code C WHERE B.INS_NAME = a.INS_NAME AND C.code_num = B.site_code), '-') SITE_CODE, /* 관리기관 */
	//    IFNULL(PNU, '-')PNU,																													/* 토지코드 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.opr_chk and b.table_nam='CPT_CORP_DT' and b.code_nam='01'),'-') OPR_CHK,												/* 가동여부 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.CUR_CON and b.table_nam='CPT_CORP_DT' and b.code_nam='02'),'-')CUR_CON,												/* 현재상태 */
	//    IFNULL(INC_NAM, '-')INC_NAM,																											/* 업체명 */
	//    IFNULL(CEO_NAM, '-')CEO_NAM,																											/* 대표자명 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.BJD_NAM and b.code_nam = 'emd'),'-')BJD_NAM,												/* 법정동 */
	//    IFNULL(JIBUN, '-')JIBUN,																												/* 지번 */
	//    IFNULL(TEL_NUM, '-')TEL_NUM,																											/* 대표전화 */
	//    IFNULL(FAX_NUM, '-')FAX_NUM,																											/* 팩스번호 */
	//    IFNULL(NEW_ADD, '-')NEW_ADD,																											/* 도로명주소 */
	//    IFNULL(BSN_LIC, '-')BSN_LIC,																											/* 사업자등록번호 */
	//    IFNULL(INC_LIC, '-')INC_LIC,																											/* 주민/법인번호 */
	//    IFNULL(REP_SPC, '-')REP_SPC,																											/* 대표업종 */
	//    IFNULL(REP_COD, '-')REP_COD,																											/* 업종코드 */
	//    IFNULL(GOD_ITM, '-')GOD_ITM,																											/* 생산품목 */
	//    IFNULL(GOD_MNY, '-')GOD_MNY,																											/* 생산액(백만원) */
	//    IFNULL(EXP_MNY, '-')EXP_MNY,																											/* 수출액(천달러) */
	//    IFNULL(CON_DAT, '-')CON_DAT,																											/* 계약신청일 */
	//    IFNULL(COC_DAT, '-')COC_DAT,																											/* 입주계약일/변경 */
	//    IFNULL(STC_ARA, '0')STC_ARA,																											/* 용지면적(계약) */
	//    IFNULL(BDC_ARA, '0')BDC_ARA,																											/* 건축면적(계약) */
	//    IFNULL(REG_DAT, '-')REG_DAT,																											/* 등록신청일 */
	//    IFNULL(REC_DAT, '-')REC_DAT,																											/* 공장등록일/변경 */
	//    IFNULL(SIT_ARA, '0')SIT_ARA,																											/* 용지면적(완료) */
	//    IFNULL(BLD_ARA, '0')BLD_ARA,																											/* 건축면적(완료) */
	//    IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.ETC_FAC),'-')ETC_FAC,					/* 부대시설종류 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.OWN_CHK),'-')OWN_CHK,												/* 소유구분 */
	//    IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = a.LES_CHK), '-') LES_CHK,									/* 임대구분 */
	//    IFNULL(DEP_MNY, '0')DEP_MNY,																											/* 보증금 */
	//    IFNULL(LES_MNY, '0')LES_MNY,																											/* 임대료 */
	//    IFNULL(LES_POD, '-')LES_POD,																											/* 임대기간 */
	//    IFNULL(LES_INC, '-')LES_INC,																											/* 임대업체 */
	//    IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.NEW_CHK),'-')NEW_CHK,					/* 신설구분 */
	//    IFNULL(PRE_LOC, '-')PRE_LOC,																											/* 산단입주전소재지 */
	//    IFNULL(SAM_MOV, '-')SAM_MOV,																											/* 동일이전 */
	//    IFNULL(EXP_MOV, '-')EXP_MOV,																											/* 확장이전 */
	//    IFNULL(ADD_MOV, '-')ADD_MOV,																											/* 증설이전 */
	//    IFNULL(PRO_POS, '-')PRO_POS,																											/* 건의사항 */
	//    IFNULL(TOT_MAN, '0')TOT_MAN,																											/* 총인원 */
	//    IFNULL(ADD_MAN, '0')ADD_MAN,																											/* 산단입주후증가인원 */
	//    IFNULL(WHT_MAN, '0')WHT_MAN,																											/* 직무별_사무직 */
	//    IFNULL(BLU_MAN, '0')BLU_MAN,																											/* 직무별_생산직 */
	//    IFNULL(MAL_WOK, '0')MAL_WOK,																											/* 국적성별_남종업원 */
	//    IFNULL(FML_WOK, '0')FML_WOK,																											/* 국적성별_여종업원 */
	//    IFNULL(MAL_FOR, '0')MAL_FOR,																											/* 국적성별_외국인(남) */
	//    IFNULL(FML_FOR, '0')FML_FOR,																											/* 국적성별_외국인(여) */
	//    IFNULL(TEN_AGE, '0')TEN_AGE,																											/* 연령별 10~20대 */
	//    IFNULL(FOR_AGE, '0')FOR_AGE,																											/* 연령별 30~50대 */
	//    IFNULL(SIX_AGE, '0')SIX_AGE,																											/* 연령별 60대 이상 */
	//    IFNULL(BSN_MAN, '0')BSN_MAN,																											/* 거주지별_부산 */
	//    IFNULL(KIM_MAN, '0')KIM_MAN,																											/* 거주지별_김해 */
	//    IFNULL(ULS_MAN, '0')ULS_MAN,																											/* 거주지별_울산 */
	//    IFNULL(YAS_MAN, '0')YAS_MAN,																											/* 거주지별_양산 */
	//    IFNULL(CHA_MAN, '0')CHA_MAN,																											/* 거주지별_창원 */
	//    IFNULL(BUS_NUM, '0')BUS_NUM,																											/* 통근버스보유대수 */
	//    IFNULL(INC_BUS, '0')INC_BUS,																											/* 출퇴근_통근버스 */
	//    IFNULL(CMP_BUS, '0')CMP_BUS,																											/* 출퇴근_기관운행버스 */
	//    IFNULL(SEF_CAR, '0')SEF_CAR,																											/* 출퇴근_자가용 */
	//    IFNULL(PUB_TRS, '0')PUB_TRS,																											/* 출퇴근_대중교통 */
	//    IFNULL(COM_WAK, '0')COM_WAK,																											/* 출퇴근_도보 */
	//    IFNULL(CAL_MAN, '-')CAL_MAN,																											/* 담당자명 */
	//    IFNULL(CAL_CEL, '-')CAL_CEL,																											/* 휴대폰번호 */
	//    IFNULL(EXP1_IMG, '-')EXP1_IMG,																										/* 사진_외부1 */
	//    IFNULL(EXP2_IMG, '-')EXP2_IMG,																										/* 사진_외부2 */
	//    IFNULL(IN1_IMG, '-')IN1_IMG,																											/* 사진_내부1 */
	//    IFNULL(IN2_IMG, '-')IN2_IMG,																											/* 사진_내부2 */
	//    IFNULL(a.SIGNGU_SE,'-')CD_SIGNGU_SE, 
	//    IFNULL(a.INS_NAME,'-')CD_INS_NAME
 //  from CPT_CORP_DT a
 // where CPX_NUM = '{$num}'
 //        ";



    	$sql = "select IFNULL(cpx_num, '-') CPX_NUM														                   							 	 /* 고유번호 */
     , (SELECT chan_code FROM snicorkr.define_code B WHERE b.code_nam = 'sgg' and B.code_num = A.signgu_se) SIGNGU_SE             							 	 /* 지자체 */
	, IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.ins_name AND B.code_nam = 'complex'), '-') INS_NAME  							 	 /* 산업단지명 */
    , IFNULL((SELECT C.chan_code FROM snicorkr.INS_INFO_DT B, snicorkr.define_code C WHERE B.INS_NAME = a.INS_NAME AND C.code_num = B.site_code), '-') SITE_CODE /* 관리기관 */
	 , IFNULL(pnu, '-') PNU																				   							 	 /* 토지코드 */
	 , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.opr_chk and b.table_nam='CPT_CORP_DT' and b.code_nam='01'), '-') OPR_CHK    							 	 /* 가동여부 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.cur_con and b.table_nam='CPT_CORP_DT' and b.code_nam='02'), '-') CUR_CON    							 	 /* 현재상태 */
     , IFNULL(inc_nam, '-') INC_NAM                                                                        							 	 /* 업체명 */
     , IFNULL(ceo_nam, '-') CEO_NAM                                                                        							 	 /* 대표자명 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.bjd_nam and b.code_nam = 'emd'), '-') BJD_NAM    							 	 /* 법정동 */
     , IFNULL(jibun, '-') JIBUN                                                                            							 	 /* 지번 */
     , IFNULL(tel_num, '-') TEL_NUM                                                                        							 	 /* 대표전화 */
     , IFNULL(fax_num, '-') FAX_NUM                                                                        							 	 /* 팩스번호 */
     , IFNULL(new_add, '-') NEW_ADD                                                                        							 	 /* 도로명주소 */
     , IFNULL(bsn_lic, '-') BSN_LIC                                                                        							 	 /* 사업자등록번호 */
     , IFNULL(inc_lic, '-') INC_LIC                                                                        							 	 /* 주민/법인번호 */
     , IFNULL(rep_spc, '-') REP_SPC                                                                        							 	 /* 대표업종 */
     , IFNULL(tit_rep_cod, '-') REP_COD                                                                        							 	 /* 업종코드 */
     , IFNULL(god_itm, '-') GOD_ITM                                                                        							 	 /* 생산품목 */
     , IFNULL(god_mny, '-') GOD_MNY                                                                        							 	 /* 생산액(백만원) */
     , IFNULL(exp_mny, '-') EXP_MNY                                                                        							 	 /* 수출액(천달러) */
     , IFNULL(con_dat, '-') CON_DAT                                                                        							 	 /* 계약신청일 */
     , IFNULL(coc_dat, '-') COC_DAT                                                                        							 	 /* 입주계약일/변경 */
     , IFNULL(stc_ara, 0.0) STC_ARA                                                                        							 	 /* 용지면적(계약) */
     , IFNULL(bdc_ara, 0.0) BDC_ARA                                                                        							 	 /* 건축면적(계약) */
	 , IFNULL(reg_dat, '-') REG_DAT                                                                        							 	 /* 등록신청일 */
     , IFNULL(rec_dat, '-') REC_DAT                                                                          						 	 /* 공장등록일/변경 */
     , TRUNCATE(IFNULL(sit_ara, 0.0), 0) SIT_ARA                                                                    					 /* 용지면적(완료) */
     , IFNULL(bld_ara, 0.0) BLD_ARA                                                                          						 	 /* 건축면적(완료) */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE table_nam = 'cpt_corp_dt' AND code_num = A.etc_fac), '-') ETC_FAC    	 /* 부대시설종류 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B where B.code_num = A.own_chk), '-') OWN_CHK								 	 /* 소유구분 */
	 , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.LES_CHK), '-') LES_CHK								     /* 임대구분 */
     , IFNULL(dep_mny, 0.0) DEP_MNY                                                                          							 /* 보증금 */
     , IFNULL(les_mny, 0.0) LES_MNY                                                                          						  	 /* 임대료 */
     , IFNULL(les_pod, '-') LES_POD			                                                                 						  	 /* 임대기간 */
     , IFNULL(les_inc, '-') LES_INC                                                                          						     /* 임대업체 */
     , IFNULL((SELECT B.chan_code FROM snicorkr.define_code B WHERE table_nam = 'cpt_corp_dt' AND code_num = A.new_chk), '-') NEW_CHK    /* 신설구분 */
	 , IFNULL(pre_loc, '-') PRE_LOC                                                                        							 	 /* 산단입주전소재지 */
     , IFNULL(sam_mov, '-') SAM_MOV                                                                        							 	 /* 동일이전 */
     , IFNULL(exp_mov, '-') EXP_MOV                                                                        							 	 /* 확장이전 */
	 , IFNULL(add_mov, '-') ADD_MOV                                                                        							 	 /* 증설이전 */
     , IFNULL(pro_pos, '-') PRO_POS                                                                        							 	 /* 건의사항 */
     , IFNULL(tot_man, 0.0) TOT_MAN																									 	 /* 총인원 */
     , IFNULL(add_man, 0.0) ADD_MAN                                                                        							 	 /* 산단입주후증가인원 */
     , IFNULL(wht_man, 0.0) WHT_MAN                                                                        							 	 /* 직무별_사무직 */
     , IFNULL(blu_man, 0.0) BLU_MAN                                                                        							 	 /* 직무별_생산직 */
     , IFNULL(mal_wok, 0.0) MAL_WOK                                                                        							 	 /* 국적성별_남종업원 */
     , IFNULL(fml_wok, 0.0) FML_WOK                                                                        							 	 /* 국적성별_여종업원 */
     , IFNULL(mal_for, 0.0) MAL_FOR                                                                        							  	 /* 국적성별_외국인(남) */
     , IFNULL(fml_for, 0.0) FML_FOR                                                                        							 	 /* 국적성별_외국인(여) */
     , IFNULL(ten_age, 0.0) TEN_AGE                                                                        							 	 /* 연령별 10~20대 */
     , IFNULL(for_Age, 0.0) FOR_AGE		                                                                   							 	 /* 연령별 30~50대 */
     , IFNULL(six_age, 0.0) SIX_AGE																									 	 /* 연령별 60대 이상 */
     , IFNULL(bsn_man, 0.0) BSN_MAN                                                                        							 	 /* 거주지별_부산 */
     , IFNULL(kim_man, 0.0) KIM_MAN																		      					 	 	 /* 거주지별_김해 */
     , IFNULL(uls_man, 0.0) ULS_MAN                                                                        							 	 /* 거주지별_울산 */
     , IFNULL(yas_man, 0.0) YAS_MAN																									 	 /* 거주지별_양산 */
     , IFNULL(cha_man, 0.0) CHA_MAN																									 	 /* 거주지별_창원 */
     , IFNULL(bus_num, 0.0) BUS_NUM																									 	 /* 통근버스보유대수 */
     , IFNULL(inc_bus, 0.0) INC_BUS                                                                                                  	 /* 출퇴근_통근버스 */
     , IFNULL(cmp_bus, 0.0) CMP_BUS                                                                         						 	 /* 출퇴근_기관운행버스 */
     , IFNULL(sef_car, 0.0) SEF_CAR																		   							 	 /* 출퇴근_자가용 */
     , IFNULL(pub_trs, 0.0) PUB_TRS                                                                          						 	 /* 출퇴근_대중교통 */
     , IFNULL(com_wak, 0.0) COM_WAK                                                                         						  	 /* 출퇴근_도보 */
     , IFNULL(cal_man, '-') CAL_MAN                                                                         					     	 /* 담당자명 */
     , IFNULL(cal_cel, '-') CAL_CEL                                                                         						 	 /* 휴대폰번호 */
     , IFNULL(exp1_img, '-') EXP1_IMG                                                                     						     	 /* 사진_외부1 */
     , IFNULL(exp2_img, '-') EXP2_IMG                                                                      							 	 /* 사진_외부2 */
     , IFNULL(in1_img, '-') IN1_IMG                                                                       						     	 /* 사진_내부1 */
     , IFNULL(in2_img, '-') IN2_IMG																									 	 /* 사진_내부2 */
  FROM snicorkr.cpt_corp_dt A
 WHERE cpx_num = '{$num}'";

        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function company_all($num)
    {
 //        $sql = "
 //        select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
 //       (select chan_code from define_code b where b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.INS_NAME),'-')INS_NAME,												/* 산업단지명 */
	//    IFNULL(PNU, '-')PNU,																													/* 토지코드 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.opr_chk and b.table_nam='CPT_CORP_DT' and b.code_nam='01'),'-') OPR_CHK,												/* 가동여부 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.CUR_CON and b.table_nam='CPT_CORP_DT' and b.code_nam='02'),'-')CUR_CON,												/* 현재상태 */
	//    IFNULL(INC_NAM, '-')INC_NAM,																											/* 업체명 */
	//    IFNULL(CEO_NAM, '-')CEO_NAM,																											/* 대표자명 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.BJD_NAM and b.code_nam = 'emd'),'-')BJD_NAM,												/* 법정동 */
	//    IFNULL(JIBUN, '-')JIBUN,																												/* 지번 */
	//    IFNULL(TEL_NUM, '-')TEL_NUM,																											/* 대표전화 */
	//    IFNULL(FAX_NUM, '-')FAX_NUM,																											/* 팩스번호 */
	//    IFNULL(NEW_ADD, '-')NEW_ADD,																											/* 도로명주소 */
	//    IFNULL(BSN_LIC, '-')BSN_LIC,																											/* 사업자등록번호 */
	//    IFNULL(INC_LIC, '-')INC_LIC,																											/* 주민/법인번호 */
	//    IFNULL(REP_SPC, '-')REP_SPC,																											/* 대표업종 */
	//    IFNULL(REP_COD, '-')REP_COD,																											/* 업종코드 */
	//    IFNULL(GOD_ITM, '-')GOD_ITM,																											/* 생산품목 */
	//    IFNULL(GOD_MNY, '-')GOD_MNY,																											/* 생산액(백만원) */
	//    IFNULL(EXP_MNY, '-')EXP_MNY,																											/* 수출액(천달러) */
	//    IFNULL(CON_DAT, '-')CON_DAT,																											/* 계약신청일 */
	//    IFNULL(COC_DAT, '-')COC_DAT,																											/* 입주계약일/변경 */
	//    IFNULL(STC_ARA, '0')STC_ARA,																											/* 용지면적(계약) */
	//    IFNULL(BDC_ARA, '0')BDC_ARA,																											/* 건축면적(계약) */
	//    IFNULL(REG_DAT, '-')REG_DAT,																											/* 등록신청일 */
	//    IFNULL(REC_DAT, '-')REC_DAT,																											/* 공장등록일/변경 */
	//    IFNULL(SIT_ARA, '0')SIT_ARA,																											/* 용지면적(완료) */
	//    IFNULL(BLD_ARA, '0')BLD_ARA,																											/* 건축면적(완료) */
	//    IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.ETC_FAC),'-')ETC_FAC,					/* 부대시설종류 */
	//    IFNULL((select chan_code from define_code b where b.code_num = a.OWN_CHK),'-')OWN_CHK,												/* 소유구분 */
	//    IFNULL(LES_CHK, '-')LES_CHK,																											/* 임대구분 */
	//    IFNULL(DEP_MNY, '0')DEP_MNY,																											/* 보증금 */
	//    IFNULL(LES_MNY, '0')LES_MNY,																											/* 임대료 */
	//    IFNULL(LES_POD, '-')LES_POD,																											/* 임대기간 */
	//    IFNULL(LES_INC, '-')LES_INC,																											/* 임대업체 */
	//    IFNULL((select b.chan_code from define_code b where table_nam ='cpt_corp_dt' and code_num= a.NEW_CHK),'-')NEW_CHK,					/* 신설구분 */
	//    IFNULL(PRE_LOC, '-')PRE_LOC,																											/* 산단입주전소재지 */
	//    IFNULL(SAM_MOV, '-')SAM_MOV,																											/* 동일이전 */
	//    IFNULL(EXP_MOV, '-')EXP_MOV,																											/* 확장이전 */
	//    IFNULL(ADD_MOV, '-')ADD_MOV,																											/* 증설이전 */
	//    IFNULL(PRO_POS, '-')PRO_POS,																											/* 건의사항 */
	//    IFNULL(TOT_MAN, '0')TOT_MAN,																											/* 총인원 */
	//    IFNULL(ADD_MAN, '0')ADD_MAN,																											/* 산단입주후증가인원 */
	//    IFNULL(WHT_MAN, '0')WHT_MAN,																											/* 직무별_사무직 */
	//    IFNULL(BLU_MAN, '0')BLU_MAN,																											/* 직무별_생산직 */
	//    IFNULL(MAL_WOK, '0')MAL_WOK,																											/* 국적성별_남종업원 */
	//    IFNULL(FML_WOK, '0')FML_WOK,																											/* 국적성별_여종업원 */
	//    IFNULL(MAL_FOR, '0')MAL_FOR,																											/* 국적성별_외국인(남) */
	//    IFNULL(FML_FOR, '0')FML_FOR,																											/* 국적성별_외국인(여) */
	//    IFNULL(TEN_AGE, '0')TEN_AGE,																											/* 연령별 10~20대 */
	//    IFNULL(FOR_AGE, '0')FOR_AGE,																											/* 연령별 30~50대 */
	//    IFNULL(SIX_AGE, '0')SIX_AGE,																											/* 연령별 60대 이상 */
	//    IFNULL(BSN_MAN, '0')BSN_MAN,																											/* 거주지별_부산 */
	//    IFNULL(KIM_MAN, '0')KIM_MAN,																											/* 거주지별_김해 */
	//    IFNULL(ULS_MAN, '0')ULS_MAN,																											/* 거주지별_울산 */
	//    IFNULL(YAS_MAN, '0')YAS_MAN,																											/* 거주지별_양산 */
	//    IFNULL(CHA_MAN, '0')CHA_MAN,																											/* 거주지별_창원 */
	//    IFNULL(BUS_NUM, '0')BUS_NUM,																											/* 통근버스보유대수 */
	//    IFNULL(INC_BUS, '0')INC_BUS,																											/* 출퇴근_통근버스 */
	//    IFNULL(CMP_BUS, '0')CMP_BUS,																											/* 출퇴근_기관운행버스 */
	//    IFNULL(SEF_CAR, '0')SEF_CAR,																											/* 출퇴근_자가용 */
	//    IFNULL(PUB_TRS, '0')PUB_TRS,																											/* 출퇴근_대중교통 */
	//    IFNULL(COM_WAK, '0')COM_WAK,																											/* 출퇴근_도보 */
	//    IFNULL(CAL_MAN, '-')CAL_MAN,																											/* 담당자명 */
	//    IFNULL(CAL_CEL, '-')CAL_CEL,																											/* 휴대폰번호 */
	//    IFNULL(EXP1_IMG, '-')EXP1_IMG,																										/* 사진_외부1 */
	//    IFNULL(EXP2_IMG, '-')EXP2_IMG,																										/* 사진_외부2 */
	//    IFNULL(IN1_IMG, '-')IN1_IMG,																											/* 사진_내부1 */
	//    IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
 //  from CPT_CORP_DT a
 // where SIGNGU_SE = '{$num}' order by a.CPX_NUM desc
 //        ";

    	$sql = "select IFNULL(cpx_num, '-') CPX_NUM														                   							 	 /* 고유번호 */
     , (SELECT chan_code FROM snicorkr.define_code B WHERE b.code_nam = 'sgg' and B.code_num = A.signgu_se) SIGNGU_SE             							 	 /* 지자체 */
	 , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE b.code_nam = 'complex' and B.code_num = A.ins_name), '-') INS_NAME  							 	 /* 산업단지명 */
	 , IFNULL(pnu, '-') PNU																				   							 	 /* 토지코드 */
	 , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.opr_chk and b.table_nam='CPT_CORP_DT' and b.code_nam='01'), '-') OPR_CHK    							 	 /* 가동여부 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.cur_con and b.table_nam='CPT_CORP_DT' and b.code_nam='02'), '-') CUR_CON    							 	 /* 현재상태 */
     , IFNULL(inc_nam, '-') INC_NAM                                                                        							 	 /* 업체명 */
     , IFNULL(ceo_nam, '-') CEO_NAM                                                                        							 	 /* 대표자명 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE B.code_num = A.bjd_nam and b.code_nam = 'emd'), '-') BJD_NAM    							 	 /* 법정동 */
     , IFNULL(jibun, '-') JIBUN                                                                            							 	 /* 지번 */
     , IFNULL(tel_num, '-') TEL_NUM                                                                        							 	 /* 대표전화 */
     , IFNULL(fax_num, '-') FAX_NUM                                                                        							 	 /* 팩스번호 */
     , IFNULL(new_add, '-') NEW_ADD                                                                        							 	 /* 도로명주소 */
     , IFNULL(bsn_lic, '-') BSN_LIC                                                                        							 	 /* 사업자등록번호 */
     , IFNULL(inc_lic, '-') INC_LIC                                                                        							 	 /* 주민/법인번호 */
     , IFNULL(rep_spc, '-') REP_SPC                                                                        							 	 /* 대표업종 */
     , IFNULL(rep_cod, '-') REP_COD                                                                        							 	 /* 업종코드 */
     , IFNULL(god_itm, '-') GOD_ITM                                                                        							 	 /* 생산품목 */
     , IFNULL(god_mny, '-') GOD_MNY                                                                        							 	 /* 생산액(백만원) */
     , IFNULL(exp_mny, '-') EXP_MNY                                                                        							 	 /* 수출액(천달러) */
     , IFNULL(con_dat, '-') CON_DAT                                                                        							 	 /* 계약신청일 */
     , IFNULL(coc_dat, '-') COC_DAT                                                                        							 	 /* 입주계약일/변경 */
     , IFNULL(stc_ara, 0.0) STC_ARA                                                                        							 	 /* 용지면적(계약) */
     , IFNULL(bdc_ara, 0.0) BDC_ARA                                                                        							 	 /* 건축면적(계약) */
     , IFNULL(reg_dat, '-') REG_DAT                                                                        							 	 /* 등록신청일 */
     , IFNULL(rec_dat, '-') REC_DAT                                                                          						 	 /* 공장등록일/변경 */
     , IFNULL(sit_ara, 0.0) SIT_ARA                                                                    							     	 /* 용지면적(완료) */
     , IFNULL(bld_ara, 0.0) BLD_ARA                                                                          						 	 /* 건축면적(완료) */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B WHERE table_nam = 'cpt_corp_dt' AND code_num = A.etc_fac), '-') ETC_FAC    	 /* 부대시설종류 */
     , IFNULL((SELECT chan_code FROM snicorkr.define_code B where B.code_num = A.own_chk), '-') OWN_CHK								 	 /* 소유구분 */
	 , IFNULL(les_chk, '-') LES_CHK                                                                          						 	 /* 임대구분 */
     , IFNULL(dep_mny, 0.0) DEP_MNY                                                                          							 /* 보증금 */
     , IFNULL(les_mny, 0.0) LES_MNY                                                                          						  	 /* 임대료 */
     , IFNULL(les_pod, '-') LES_POD			                                                                 						  	 /* 임대기간 */
     , IFNULL(les_inc, '-') LES_INC                                                                          						     /* 임대업체 */
     , IFNULL((SELECT B.chan_code FROM snicorkr.define_code B WHERE table_nam = 'cpt_corp_dt' AND code_num = A.new_chk), '-') NEW_CHK    /* 신설구분 */
	 , IFNULL(pre_loc, '-') PRE_LOC                                                                        							 	 /* 산단입주전소재지 */
     , IFNULL(sam_mov, '-') SAM_MOV                                                                        							 	 /* 동일이전 */
     , IFNULL(exp_mov, '-') EXP_MOV                                                                        							 	 /* 확장이전 */
     , IFNULL(add_mov, '-') ADD_MOV                                                                        							 	 /* 증설이전 */
     , IFNULL(pro_pos, '-') PRO_POS                                                                        							 	 /* 건의사항 */
     , IFNULL(tot_man, 0.0) TOT_MAN																									 	 /* 총인원 */
     , IFNULL(add_man, 0.0) ADD_MAN                                                                        							 	 /* 산단입주후증가인원 */
     , IFNULL(wht_man, 0.0) WHT_MAN                                                                        							 	 /* 직무별_사무직 */
     , IFNULL(blu_man, 0.0) BLU_MAN                                                                        							 	 /* 직무별_생산직 */
     , IFNULL(mal_wok, 0.0) MAL_WOK                                                                        							 	 /* 국적성별_남종업원 */
     , IFNULL(fml_wok, 0.0) FML_WOK                                                                        							 	 /* 국적성별_여종업원 */
     , IFNULL(mal_for, 0.0) MAL_FOR                                                                        							  	 /* 국적성별_외국인(남) */
     , IFNULL(fml_for, 0.0) FML_FOR                                                                        							 	 /* 국적성별_외국인(여) */
     , IFNULL(ten_age, 0.0) TEN_AGE                                                                        							 	 /* 연령별 10~20대 */
     , IFNULL(for_Age, 0.0) FOR_AGE		                                                                   							 	 /* 연령별 30~50대 */
     , IFNULL(six_age, 0.0) SIX_AGE																									 	 /* 연령별 60대 이상 */
     , IFNULL(bsn_man, 0.0) BSN_MAN                                                                        							 	 /* 거주지별_부산 */
     , IFNULL(kim_man, 0.0) KIM_MAN																		      					 	 	 /* 거주지별_김해 */
     , IFNULL(uls_man, 0.0) ULS_MAN                                                                        							 	 /* 거주지별_울산 */
     , IFNULL(yas_man, 0.0) YAS_MAN																									 	 /* 거주지별_양산 */
     , IFNULL(cha_man, 0.0) CHA_MAN																									 	 /* 거주지별_창원 */
     , IFNULL(bus_num, 0.0) BUS_NUM																									 	 /* 통근버스보유대수 */
     , IFNULL(inc_bus, 0.0) INC_BUS                                                                                                  	 /* 출퇴근_통근버스 */
     , IFNULL(cmp_bus, 0.0) CMP_BUS                                                                         						 	 /* 출퇴근_기관운행버스 */
     , IFNULL(sef_car, 0.0) SEF_CAR																		   							 	 /* 출퇴근_자가용 */
     , IFNULL(pub_trs, 0.0) PUB_TRS                                                                          						 	 /* 출퇴근_대중교통 */
     , IFNULL(com_wak, 0.0) COM_WAK                                                                         						  	 /* 출퇴근_도보 */
     , IFNULL(cal_man, '-') CAL_MAN                                                                         					     	 /* 담당자명 */
     , IFNULL(cal_cel, '-') CAL_CEL                                                                         						 	 /* 휴대폰번호 */
     , IFNULL(exp1_img, '-') EXP1_IMG                                                                     						     	 /* 사진_외부1 */
     , IFNULL(exp2_img, '-') EXP2_IMG                                                                      							 	 /* 사진_외부2 */
     , IFNULL(in1_img, '-') IN1_IMG                                                                       						     	 /* 사진_내부1 */
     , IFNULL(in2_img, '-') IN2_IMG																									 	 /* 사진_내부2 */
  FROM snicorkr.cpt_corp_dt A
 WHERE signgu_se = '{$num}' 
 ORDER BY A.cpx_num DESC;
 
 ";

        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        
        return $rows;
    }

    public function just_name($name)
    {
        $sql = "select code_num from define_code where CHAN_CODE = '{$name}'";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public  function just_list($num,$jnum, $page, $limit){
        $sql = "
        select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_num = '{$jnum}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 where SIGNGU_SE = '{$num}' limit {$page}, {$limit}
        ";
        //limit 0 , 15
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public  function just_count($num,$jnum){
        $sql = "
        select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_num = '{$jnum}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 where SIGNGU_SE = '{$num}' AND INS_NAME = '{$jnum}'
        ";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function just_search($KeyTy,$typ,$q_Val,$code_num){
        if($KeyTy == 'inc_nam'){
            $sql = "
            select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_nam = 'sgg' and b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_nam = 'complex' and b.code_num = '{$code_num}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 WHERE 1 = 1 
   AND CASE WHEN '{$typ}' != '' THEN  SIGNGU_SE = '{$typ}'
            ELSE 1 = 1 
             END 
   AND a.inc_nam LIKE '%{$q_Val}%' 
   AND CASE WHEN '{$code_num}' != '' THEN  ins_name = '{$code_num}'
            ELSE 1 = 1 
             END";
        }else if($KeyTy == 'new_add'){
            $sql = "
            select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_nam = 'sgg' and b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_nam = 'complex' and b.code_num = '{$code_num}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 WHERE 1 = 1 
   AND CASE WHEN '{$typ}' != '' THEN  SIGNGU_SE = '{$typ}'
            ELSE 1 = 1 
             END 
   AND a.new_add LIKE '%{$q_Val}%' 
   AND CASE WHEN '{$code_num}' != '' THEN  ins_name = '{$code_num}'
            ELSE 1 = 1 
             END";
        } else if($KeyTy == 'rep_spc'){
            $sql = "
            select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_nam = 'sgg' and b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_nam = 'complex' and b.code_num = '{$code_num}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 WHERE 1 = 1 
   AND CASE WHEN '{$typ}' != '' THEN  SIGNGU_SE = '{$typ}'
            ELSE 1 = 1 
             END 
   AND a.rep_spc LIKE '%{$q_Val}%' 
   AND CASE WHEN '{$code_num}' != '' THEN  ins_name = '{$code_num}'
            ELSE 1 = 1 
             END";
        } else if($KeyTy == 'god_itm'){
            $sql = "
            select IFNULL(CPX_NUM, '-')CPX_NUM,																											/* 고유번호 */
       (select chan_code from define_code b where b.code_nam = 'sgg' and b.code_num = a.SIGNGU_SE)SIGNGU_SE,														/* 지자체 */
	   IFNULL((select chan_code  from define_code b where b.code_nam = 'complex' and b.code_num = '{$code_num}'),'-')INS_NAME,												/* 산업단지명 */
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
	   IFNULL(IN2_IMG, '-')IN2_IMG																											/* 사진_내부2 */
  from CPT_CORP_DT a
 WHERE 1 = 1 
   AND CASE WHEN '{$typ}' != '' THEN  SIGNGU_SE = '{$typ}'
            ELSE 1 = 1 
             END 
   AND a.god_itm LIKE '%{$q_Val}%' 
   AND CASE WHEN '{$code_num}' != '' THEN  ins_name = '{$code_num}'
            ELSE 1 = 1 
             END";
        }
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function complexsear($pnu){
        $sql = "
        select a.pnu, 
	   (select chan_code from define_code b
	     where b.code_num = a.INS_NAME and b.code_nam = 'complex')INS_NAME, 
	   (select chan_code from define_code b
	     where b.code_num = a.SGG_NAM and b.code_nam = 'sgg')SGG_NAM, 
	   (select chan_code from define_code b
	     where b.code_num = a.BJD_NAM and b.code_nam = 'emd')BJD_NAM, 
	   a.JIBUN, 
	   a.JIMOK, 
	   (select chan_code from define_code b
	     where b.code_num = a.jimok and b.code_nam = '01' and table_nam = 'INS_LAND_DT')JIMOK1,AREA, 
	   a.USE_AREA, 
	   (select chan_code from define_code b
	     where b.code_num = a.USE_AREA and b.code_nam = '05' and table_nam = 'INS_LAND_DT')USE_AREA1, 
	   (select chan_code from define_code b
	     where b.code_num = a.MVMN_RESN and b.code_nam = '03' and table_nam = 'INS_LAND_DT')MVMN_RESN, 
	   MVMN_DATE, 
	   (select chan_code from define_code b
	     where b.code_num = a.OWNER_KIND and b.code_nam = '02' and table_nam = 'INS_LAND_DT')OWNER_KIND, 
	   IFNULL( a.OWNER_ADD,'-') OWNER_ADD, 
	   a.OWNER, 
	   (select chan_code from define_code b
	     where b.code_num = a.OWNER_MVMN and b.code_nam = '04' and table_nam = 'INS_LAND_DT')OWNER_MVMN, 
	   OWNER_DATE, 
	   ROUND(a.OWNER_MEM,0)OWNER_MEM, 
	   JIKA, 
	   JIKA_2014, 
	   JIKA_2013, 
	   JIKA_2012, 
	   JIKA_2011
  from INS_LAND_DT a
 where a.PNU = '{$pnu}';
        ";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;
    }

    public function buildinfo($pun){
        $sql = "
        select a.PNU, a.BUI_SEQ, (select chan_code from define_code b
				where b.code_num = a.SIGNGU_SE and b.code_nam = 'sgg') SIGNGU_SE, 
				(select chan_code from define_code b
				where b.code_num = a.INS_NAME and b.code_nam = 'complex') INS_NAME, 
				(select chan_code from define_code b
				where b.code_num = a.BJD_NAM and b.code_nam = 'emd') BJD_NAM, 
				a.JIBUN, a.NEW_ADD, a.BUI_BUN, a.BUI_NAME, a.MAIN_DONG, 
				BUI_AREA1, 
				BUI_AREA2, 
				BUI_AREA3,
				BUI_AREA4,
				VL_RAT, 
				BC_RAT, 
				HIGH, 
				MAIN_GRL, 
				MAIN_BML, 
				BUI_DATE1, 
				BUI_DATE2, 
				BUI_DATE3, 
				a.MAIN_STR, a.MAIN_STR_CODE, a.MAIN_STR_NAME, a.DONG_STR_NAME
			from INS_BUILD_DT a
			where PNU = '{$pun}';
        ";
        $rs = $this->master->query($sql);
        $rows = $rs->result_array();
        return $rows;

    }
    
    public function cptcorpdt(){
		$sql = "
    		select * from define_code where TABLE_NAM = 'CPT_CORP_DT';
    	";
		$rs = $this->master->query($sql);
		$rows = $rs->result_array();
		return $rows;
	}
}