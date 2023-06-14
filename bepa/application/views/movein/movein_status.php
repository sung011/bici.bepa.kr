<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<link rel="stylesheet" href="/assets/css/complex.css">
<link rel="stylesheet" href="/assets/css/support.css">
<link rel="stylesheet" href="/assets/css/table.css">

<style>
    img {
        vertical-align: middle;
    }

    .down_btn {
        display: inline-block;
        padding: 10px;
        float: none;
    }

    .hidd {
        display: none;
    }

    .sub_section {
        text-align: end;
    }

    .v_file_cont {
        border: 1px solid #d6d6d6;
        border-radius: 3px !important;
        max-width: 950px;
        padding: 45px 0;
        margin: 40px auto;
        text-align: center;
    }

    .v_file_cont img {
        display: block;
        margin: auto;
        margin-bottom: 20px;
    }
</style>

<!-- Features -->
<div class="features">
    <div class="container">
        <div class="features_row sub_feat_row row">
            <!-- Features Item -->
            <div class="feature_col col-lg-3 block_pad bg-white m-hidden" style="min-height: 50vh">
                <!-- left menu -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>
            </div>
            <!-- Features Item -->
            <div class="col-xs-12 col-lg-9 feature_col block_pad bg-white">
                <div class="notice_title">
                    <h2>산단별 입주기업 정보</h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>부산 산업 단지 정보</li>
                                            <li>산단별 입주기업 정보</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kind-category mb-3">
                    <div class="nkindlist">
                        <span><p id="borough" class="active mt-0" onclick="openPaging('borough');">자치구군별</p></span>
                        <span><p id="industry" class="mt-0" onclick="openPaging('industry');">산업단지별</p></span>
                        <span><p id="just" class="mt-0" onclick="openPaging('just');">산업단지별업체</p></span>
                        <span><p id="company" class="mt-0" onclick="openPaging('company');relayout();">업체정보</p></span>
                        <!--<span><p id="map01" onclick="openPaging('map');">지도</p></span>-->
                        <span class="fake-span"></span>
                    </div>
                </div>
                <div class="notice_table notice-block2">
                    <div class="basic-body-wrap">
                        <div id="tab01">
                            <div class="sub_section">
                                <!-- <div class="down_btn pt-0 pr-0 pb-3">
                                    <a href="<?= base_url('/index.php/ExcelDow?excel=statistics')?>" class="btn btn-primary btn-sch mb-0">통계다운로드(엑셀)</a>
                                </div>
                                <div class="down_btn pt-0 pr-0 pb-3 pl-3">
                                    <a href="<?= base_url('/index.php/ExcelDow?excel=company')?>" class="btn btn-primary btn-sch mb-0">업체다운로드(엑셀)</a>
                                </div> -->
                                <div class="down_btn pt-0 pr-0 pb-3 pl-3">
                                    <a href="<?= base_url('/index.php/ExcelDow?excel=statistics')?>" class="btn btn-primary btn-sch mb-0">통계다운로드(엑셀)</a>
                                </div>
                                <div class="form_wrap">
                                    <div class="w-100" style="overflow: auto">
                                        <table class="table_st1">
                                            <tbody>
                                                <tr>
                                                    <th rowspan="2" class="backslash_w" width="8%">구군</th>
                                                    <th colspan="2" width="13%">합계</th>
                                                    <th colspan="2" width="13%">조성완료</th>
                                                    <th colspan="2" width="13%">조성중</th>
                                                    <th colspan="4">산업단지종류</th>
                                                    <th colspan="2" width="12%">사업유형</th>
                                                    <th rowspan="2" width="8%">업체수</th>
                                                    <th rowspan="2" width="8%">종업원수</th>
                                                </tr>
                                                <tr>
                                                    <th width="3%">계</th>
                                                    <th width="10%">면적(m<sup>2</sup>)</th>
                                                    <th width="3%">계</th>
                                                    <th width="10%">면적(m<sup>2</sup>)</th>
                                                    <th width="3%">계</th>
                                                    <th width="10%">면적(m<sup>2</sup>)</th>
                                                    <th width="6%">국가</th>
                                                    <th width="6%">일반</th>
                                                    <th width="6%">도시첨단</th>
                                                    <th width="6%">농공단지</th>
                                                    <th>공영개발</th>
                                                    <th>민간개발</th>
                                                </tr>
                                                <?php if (empty($status_list)): ?>
                                                    <tr>
                                                        <td colspan="15" class="text-center"><strong>등록된 정보가 없습니다.</strong></td>
                                                    </tr>
                                                <?php else: ?>
                                                    <?php foreach ($status_list as $key => $val): ?>
                                                        <?php 
                                                        $ins_num += $val['ins_num'];
                                                        $ins_area += $val['ins_area'];
                                                        $ing001 += $val['ing001'];
                                                        $ing001_area += $val['ing001_area'];
                                                        $ing002 += $val['ing002'];
                                                        $ing002_area += $val['ing002_area'];
                                                        $ins001 += $val['ins001'];
                                                        $ins002 += $val['ins002'];
                                                        $ins003 += $val['ins003'];
                                                        $ins004 += $val['ins004'];
                                                        $PRO001 += $val['PRO001'];
                                                        $PRO002 += $val['PRO002'];
                                                        $inc_nam += $val['inc_nam'];
                                                        $employee_cnt += $val['employee_cnt'];
                                                        ?>
                                                        <tr>
                                                            <th class="th_r">
                                                                <strong onclick="openPaging('industry', '<?= $val['signgu_se'] ?>');remove_in();" style="cursor: pointer">
                                                                    <?= $val['name'] ?>
                                                                </strong>
                                                            </th>
                                                            <td class="text-right"><?= number_format($val['ins_num']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ins_area']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ing001']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ing001_area']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ing002']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ing002_area']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ins001']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ins002']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ins003']) ?></td>
                                                            <td class="text-right"><?= number_format($val['ins004']) ?></td>
                                                            <td class="text-right"><?= number_format($val['PRO001']) ?></td>
                                                            <td class="text-right"><?= number_format($val['PRO002']) ?></td>
                                                            <!-- <td><?= $val['PRO003'] ?></td> -->
                                                            <!-- <td><?= number_format($val['BSNS_COST']) ?></td> -->
                                                            <td class="text-right"><?= number_format($val['inc_nam']) ?></td>
                                                            <td class="text-right" style="border-right: none"><?= number_format($val['employee_cnt']) ?></td>
                                                        </tr>
                                                    <?php endforeach ?>
                                                    <tr>
                                                        <th class="th_r"><strong>합계</strong></th>
                                                        <td class="text-right"><?= number_format($ins_num) ?><br></td>
                                                        <td class="text-right"><?= number_format($ins_area) ?></td>
                                                        <td class="text-right"><?= number_format($ing001) ?></td>
                                                        <td class="text-right"><?= number_format($ing001_area) ?></td>
                                                        <td class="text-right"><?= number_format($ing002) ?></td>
                                                        <td class="text-right"><?= number_format($ing002_area) ?></td>
                                                        <td class="text-right"><?= number_format($ins001) ?></td>
                                                        <td class="text-right"><?= number_format($ins002) ?></td>
                                                        <td class="text-right"><?= number_format($ins003) ?></td>
                                                        <td class="text-right"><?= number_format($ins004) ?></td>
                                                        <td class="text-right"><?= number_format($PRO001) ?></td>
                                                        <td class="text-right"><?= number_format($PRO002) ?></td>
                                                        <td class="text-right"><?= number_format($inc_nam) ?></td>
                                                        <td class="text-right" style="border-right: none"><?= number_format($employee_cnt) ?></td>
                                                    </tr>
                                                <?php endif ?>
                                            </tbody>
                                        </table>
                                        <iframe id="txtArea1" class="d-none"></iframe>
                                        <p class="text-danger my-1 text-left">※ 산업단지별 업체수, 종업원수는 공장설립 온라인 지원시스템(팩토리온) 상의 입력정보와 연동되어, 관리기관과 입주계약이 체결된 업체가 표시되므로 실제 가동중인 공장의 업체수, 종업원수와 차이가 있을 수 있습니다.</p>
                                        <p class="text-danger text-left">※ 회동석대 도시첨단산업단지의 경우, 해운대구와 금정구에 걸쳐서 소재하고 있으나, 편의상 금정구로 분류하였습니다.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="tab02" class="hidd">
                            <div class="sub_section">
                                <!-- <div class="down_btn pt-0 pr-0 pb-3">
                                    <a href="" id="excel_1" class="btn btn-primary btn-sch mb-0">통계다운로드(엑셀)</a>
                                </div>
                                <div class="down_btn pt-0 pr-0 pb-3 pl-3">
                                    <a href="" id="excel_2" class="btn btn-primary btn-sch mb-0">업체다운로드(엑셀)</a>
                                </div> -->
                                <!-- <div class="down_btn pt-0 pr-0 pb-3">
                                    <a href="" id="excel_1" class="btn btn-primary btn-sch mb-0">통계다운로드(엑셀)</a>
                                </div> -->
                                <div class="down_btn pt-0 pr-0 pb-3 pl-3">
                                    <a href="" id="excel_1" class="btn btn-primary btn-sch mb-0">통계다운로드(엑셀)</a>
                                </div>
                                <div class="form_wrap">
                                    <div class="w-100" style="overflow: auto">
                                        <table class="table_st1">
                                            <thead>
                                                <tr>
                                                    <th class="g_name" width="8%">구군명</th>
                                                    <th>단지명</th>
                                                    <th width="6%">산단종류</th>
                                                    <th width="6%">현황구분</th>
                                                    <th width="10%">면적(m<sup>2</sup>)</th>
                                                    <th width="10%">단지지정일자</th>
                                                    <th width="10%">사업유형</th>
                                                    <th>사업시행자</th>
                                                    <!-- <th>관리기관</th> -->
                                                    <th width="8%">업체수</th>
                                                    <th width="8%">종업원수</th>
                                                </tr>
                                            </thead>
                                            <tbody id="in_list"></tbody>
                                            <tbody>
                                                <tr style="border-top: 1px solid #bab9c1">
                                                    <td>합계</td>
                                                    <td class="g_name"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td id="all_m" class="text-right"></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <!-- <td></td> -->
                                                    <td id="all_c" class="text-right"></td>
                                                    <td id="all_u" class="text-right" style="border-right: none"></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div id="tab05" class="hidd">
                            <div class="sub_section">
                                <input type="hidden" id="s_type">
                                <input type="hidden" id="s_name">
                                <div class="snic-search">
                                    <span>검색</span>
                                    <div class="snic-select">
                                        <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                                        <select name="q_searchKeyTy" id="q_searchKeyTy">
                                            <option value="inc_nam">업체명</option>
                                            <option value="new_add">도로명 주소</option>
                                            <option value="rep_spc">업종</option>
                                            <option value="god_itm">생산품</option>
                                        </select>
                                    </div>
                                    <div class="snic-input">
                                        <label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text" name="q_searchVal" id="q_searchVal" value="">
                                    </div>
                                    <button type="button" class="btn sm dark" onclick="remove_into(),notice_list()">검색</button>
                                </div>

                                <div class="down_btn pt-0 pr-0 pb-3 pl-3">
                                    <button class="btn btn-primary btn-sch mb-0" style="cursor: pointer" onclick="ReportToExcelConverter();">다운로드(엑셀)</button>
                                </div>

                                <div class="form_wrap">
                                    <table id="TableToExcel" class="table_st1">
                                        <colgroup>
                                            <col>
                                            <col>
                                            <col>
                                        </colgroup>
                                        <thead>
                                        <tr>
                                            <th>업체명</th>
                                            <!-- <th>지번</th> -->
                                            <th>도로명주소</th>
                                            <th>업종</th>
                                            <th>생산품</th>
                                        </tr>
                                        </thead>
                                        <tbody id="in_list01"></tbody>

                                    </table>
                                    <div id="paging"></div>
                                </div>
                            </div>
                        </div>



                        <div id="tab03" class="hidd">
                            <div class="sub_section">
                                <div class="nkindlist pull-left">
                                    <span>
                                        <p id="company_01" class="active" onclick="openTab('company');">업체정보</p>
                                    </span>
                                    <!--<span><p id="land_01" onclick="openTab('land')">토지대장</p></span>
                                    <span><p id="building_01" onclick="openTab('architecture');">건축물대장</p></span>-->
                                </div>
                                <div class="down_btn pt-3 pr-0 pb-3 pl-3">
                                    <a href="" id="excel_3" class="btn btn-primary btn-sch mb-0">다운로드(엑셀)</a>
                                </div>
                                <div id="tab0_1">
                                    <div class="btn_wrap">
                                        <button type="button" id="basics" class="btn btn-info btn_text active mt-0" onclick="openTab('basics');">기본현황
                                        </button>
                                        <button type="button" id="details" class="btn btn-info btn_text mt-0" onclick="openTab('details');">상세현황
                                        </button>
                                        <!-- <button type="button" class="btn btn-info btn_text" id="survey"
                                                onclick="openTab('survey');">조사내용
                                        </button> -->
                                        <!-- <button type="button" class="btn btn-info btn_text" id="photo"
                                                onclick="openTab('photo');">사진정보
                                        </button> -->
                                    </div>
                                    <div id="tab_1">
                                        <div class="form_wrap">
                                            <table id="TableToExcel2" class="table_st1">
                                                <!-- <colgroup>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                </colgroup> -->
                                                <tbody>
                                                    <tr>
                                                        <th>구분</th>
                                                        <!-- <th>가동여부</th> -->
                                                        <!-- <th>현상태</th> -->
                                                        <th>단지명</th>
                                                        <th>관리기관</th>
                                                        <th>업체명</th>
                                                        <th>대표자명</th>
                                                        <!--<th>법정동</th>-->
                                                        <th colspan="2">지번주소</th>
                                                    </tr>
                                                    <tr>
                                                        <td id="cpx_num"></td>
                                                        <!-- <td id="opr_chk"></td> -->
                                                        <!-- <td id="CUR_CON"></td> -->
                                                        <td id="INS_NAME"></td>
                                                        <td id="SITE_CODE"></td>
                                                        <td id="INC_NAM"></td>
                                                        <td id="CEO_NAM"></td>
                                                        <!--<td id="BJD_NAM"></td>-->
                                                        <td id="JIBUN" style="border-right: none"></td>
                                                    </tr>
                                                    <!-- <tr>
                                                        <th>부대시설면적</th>
                                                        <th>신설구분</th>
                                                        <th>대표전화</th>
                                                        <th>팩스번호</th>
                                                        <th colspan="2">도로명주소</th>
                                                    </tr> -->
                                                    <tr>
                                                        <th>전화번호</th>
                                                        <th>팩스번호</th>
                                                        <th>대표업종번호</th>
                                                        <th>업종명</th>
                                                        <th>생산품</th>
                                                        <th colspan="2">도로명주소</th>
                                                    </tr>
                                                    <!-- <tr>
                                                        <td id="ETC_FAC"></td>
                                                        <td id="NEW_CHK"></td>
                                                        <td id="TEL_NUM"></td>
                                                        <td id="FAX_NUM"></td>
                                                        <td id="NEW_ADD" colspan="2" style="border-right:none;">
                                                        </td>
                                                    </tr> -->
                                                    <tr>
                                                        <td id="TEL_NUM"></td>
                                                        <td id="FAX_NUM"></td>
                                                        <td id="REP_COD"></td>
                                                        <td id="REP_SPC"></td>
                                                        <td id="GOD_ITM"></td>
                                                        <td colspan="2" id="NEW_ADD" style="border-right: none">
                                                        <!-- <td id="ETC_FAC"></td> -->
                                                        <!-- <td id="NEW_CHK"></td> -->
                                                        <!-- <td id="TEL_NUM"></td> -->
                                                        <!-- <td id="FAX_NUM"></td> -->
                                                        <!-- <td id="NEW_ADD" colspan="2" style="border-right:none;"> -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab_2" class="hidd">
                                        <div class="form_wrap">
                                            <table class="table_st1">
                                                <!-- <colgroup>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                </colgroup> -->
                                                <tbody>
                                                <!-- <tr>
                                                    <th>사업자등록번호</th>
                                                    <th>주민/법인 번호</th>
                                                    <th colspan="2">대표업종</th>
                                                    <th colspan="2">생산품목</th>
                                                    <th>생산액<br>(백만원)</th>
                                                    <th>수출액<br>(천달러)</th>
                                                </tr> -->
                                                <tr>
                                                    <!-- <th>사업자등록번호</th> -->
                                                    <th>용지면적용지면적(m<sup>2</sup>)</th>
                                                    <th>입주형태</th>
                                                    <th>소유구분</th>
                                                    <th>입주계약</th>
                                                    <th>공장등록(최종)</th>
                                                </tr>
                                                <!-- <tr>
                                                    <td id="BSN_LIC"></td>
                                                    <td id="INC_LIC"></td>
                                                    <td id="REP_SPC" colspan="2"></td>
                                                    <td id="GOD_ITM" colspan="2"></td>
                                                    <td id="GOD_MNY"></td>
                                                    <td id="EXP_MNY" style="border-right:none;"></td>
                                                </tr> -->
                                                <tr>
                                                    <!-- <td id="BSN_LIC"></td> -->
                                                    <td id="SIT_ARA"></td>
                                                    <td id="LES_CHK"></td>
                                                    <td id="OWN_CHK"></td>
                                                    <td id="CON_DAT"></td>
                                                    <td id="REG_DAT"></td>
                                                    <!-- <td id="GOD_ITM" colspan="2"></td>
                                                    <td id="GOD_MNY"></td>
                                                    <td id="EXP_MNY" style="border-right:none;"></td> -->
                                                </tr>
                                                <!-- <tr>
                                                    <th colspan="2">부동산_계약시</th>
                                                    <th colspan="2">부동산_완료시</th>
                                                    <th colspan="2">입주_계약시</th>
                                                    <th colspan="2">입주_완료시</th>
                                                </tr> -->
                                                <tr>
                                                    <!-- <th rowspan="2">변경등록</th> -->
                                                    <th colspan="5">종업원수</th>
                                                </tr>
                                                <!-- <tr>
                                                    <th>용지면적</th>
                                                    <th>건축면적</th>
                                                    <th>용지면적</th>
                                                    <th>건축면적</th>
                                                    <th>계약신청일</th>
                                                    <th>입주계약변경일</th>
                                                    <th>등록신청일</th>
                                                    <th>공장등록변경일</th>
                                                </tr> -->
                                                <tr>
                                                    <th>총인원</th>
                                                    <th>남종업원</th>
                                                    <th>여종업원</th>
                                                    <th>외국인(남)</th>
                                                    <th>외국인(여)</th>
                                                </tr>
                                                <tr>
                                                    <!-- <td id="REG_DAT"></td> -->
                                                    <td id="TOT_MAN"></td>
                                                    <td id="MAL_WOK"></td>
                                                    <td id="FML_WOK"></td>
                                                    <td id="MAL_FOR"></td>
                                                    <td id="FML_FOR"></td>
                                                </tr>
                                                <!-- <tr>
                                                    <td id="STC_ARA"></td>
                                                    <td id="BDC_ARA"></td>
                                                    <td id="SIT_ARA"></td>
                                                    <td id="BLD_ARA"></td>
                                                    <td id="CON_DAT"></td>
                                                    <td id="COC_DAT"></td>
                                                    <td id="REG_DAT"></td>
                                                    <td id="REG_DAT" colspan="3" style="border-right:none;"></td>
                                                </tr> -->
                                                <!-- <tr>
                                                    <th colspan="8">부동산_임대</th>
                                                </tr>
                                                <tr>
                                                    <th>소유구분</th>
                                                    <th>입주형태</th>
                                                    <th>보증금</th>
                                                    <th>임대료</th>
                                                    <th colspan="2">임대기간</th>
                                                    <th colspan="2">임대업체</th>
                                                </tr>
                                                <tr>
                                                    <td id="OWN_CHK"></td>
                                                    <td id="LES_CHK"></td>
                                                    <td id="DEP_MNY"></td>
                                                    <td id="LES_MNY"></td>
                                                    <td id="LES_POD" colspan="2"></td>
                                                    <td id="LES_INC" colspan="2" style="border-right:none;"></td>
                                                </tr> -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tab_3" class="hidd">
                                        <div class="form_wrap">
                                            <!-- <table class="table_st1">
                                                <colgroup>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                </colgroup>
                                                <tbody>
                                                <tr>
                                                    <th colspan="3">종사자유형</th>
                                                    <th colspan="5">종사자지역</th>
                                                </tr>
                                                <tr>
                                                    <th>총인원</th>
                                                    <th>사무직</th>
                                                    <th>생상직</th>
                                                    <th>부산</th>
                                                    <th>김해</th>
                                                    <th>울산</th>
                                                    <th>양산</th>
                                                    <th>창원</th>
                                                </tr>
                                                <tr>
                                                    <td id="TOT_MAN"></td>
                                                    <td id="WHT_MAN"></td>
                                                    <td id="BLU_MAN"></td>
                                                    <td id="BSN_MAN"></td>
                                                    <td id="KIM_MAN"></td>
                                                    <td id="ULS_MAN"></td>
                                                    <td id="YAS_MAN"></td>
                                                    <td id="CHA_MAN" colspan="3" style="border-right:none;"></td>
                                                </tr>
                                                <tr>
                                                    <th colspan="8">종업원_남녀</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2">남종업원</th>
                                                    <th colspan="2">여종업원</th>
                                                    <th colspan="2">외국인(남)</th>
                                                    <th colspan="2">외국인(여)</th>
                                                </tr>
                                                <tr>
                                                    <td id="MAL_WOK" colspan="2"></td>
                                                    <td id="FML_WOK" colspan="2"></td>
                                                    <td id="MAL_FOR" colspan="2"></td>
                                                    <td id="FML_FOR" colspan="2" style="border-right:none;"></td>
                                                </tr>
                                                <th>통근버스보유</th>
                                                <th colspan="5">출퇴근</th>
                                                <th colspan="2">안전관리책임자</th>
                                                </tr>
                                                <tr>
                                                    <th>대수</th>
                                                    <th>통근버스</th>
                                                    <th>기관운행버스</th>
                                                    <th>자가용</th>
                                                    <th>대중교통</th>
                                                    <th>도보</th>
                                                    <th>담당자명</th>
                                                    <th>연락처</th>
                                                </tr>
                                                <tr>
                                                    <td id="BUS_NUM"></td>
                                                    <td id="INC_BUS"></td>
                                                    <td id="CMP_BUS"></td>
                                                    <td id="SEF_CAR"></td>
                                                    <td id="PUB_TRS"></td>
                                                    <td id="COM_WAK"></td>
                                                    <td id="CAL_MAN"></td>
                                                    <td id="CAL_CEL" colspan="3" style="border-right:none;"></td>
                                                </tr>
                                                </tbody>
                                            </table> -->
                                        </div>
                                    </div>
                                    <div id="tab_4" class="hidd">
                                        <div class="form_wrap">
                                            이미지 영역
                                        </div>
                                    </div>
                                    <div id="map" style="width: 100%;height: 350px;margin-top: 10px"></div>
                                </div>
                                <!--<div id="tab0_2" class="hidd">
                                    <div class="form_wrap">
                                        <table class="table_st1">
                                            <colgroup>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                            </colgroup>
                                            <tbody>
                                            <tr style="border-top:1px solid #bab9c1;">
                                                <th style="width:25%;">산업단지명</th>
                                                <td id="INS_NAME" style="width:25%;"></td>
                                                <th style="width:25%;">지목</th>
                                                <td id="JIMOK1" style="width:25%; border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>주소</th>
                                                <td id="BJD_NAM01" colspan="3" style="border-right:none;">
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>면적(m<sup>2</sup>)</th>
                                                <td id="AREA"></td>
                                                <th>용도지역</th>
                                                <td id="USE_AREA1" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>토지이동사유</th>
                                                <td id="MVMN_RESN"></td>
                                                <th>토지이동일자</th>
                                                <td id="MVMN_DATE" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>소유명</th>
                                                <td colspan="3"
                                                    style="border-right:none;line-height: 32px;"><span id="OWNER"></span>
                                                    <button style="width:110px;float:right;"
                                                            type='button'
                                                            class='btn btn-primary btn-sch' onclick="">
                                                        소유자변동조회
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>소유자주소</th>
                                                <td style="white-space: break-spaces;" id="OWNER_ADD"></td>
                                                <th>소유구분</th>
                                                <td id="OWNER_KIND" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>소유자변동원인</th>
                                                <td id="OWNER_MVMN"></td>
                                                <th>소유권변경일자</th>
                                                <td id="OWNER_DATE" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>공유인수</th>
                                                <td id="OWNER_MEM"></td>
                                                <th>공시지가</th>
                                                <td id="JIKA" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>2014년 공시지가</th>
                                                <td id="JIKA_2014"></td>
                                                <th>2013년 공시지가</th>
                                                <td id="JIKA_2013" style="border-right:none;"></td>
                                            </tr>
                                            <tr>
                                                <th>2012년 공시지가</th>
                                                <td id="JIKA_2012"></td>
                                                <th>2011년 공시지가</th>
                                                <td style="border-right:none;">0</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="tab0_3" class="hidd">
                                    <div class="form_wrap">
                                        <table class="table_st1">
                                            <colgroup>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                                <col>
                                            </colgroup>
                                            <tbody id="buildinfo">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>-->

                            </div>
                        </div>
                        <!--<div id="tab04" class="hidd">
                            <div id="map" style="width:100%;height:350px;"></div>
                        </div>-->
                        <div class="page-title"></div>
                        <div>
                            <div class="basic-body-wrap"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
?>

<script type="text/javascript" src="/assets/js/jquery-1.11.0.js"></script>
<script type="text/javascript" src="/assets/js/jquery.table2excel.js"></script>

<script>
    var number = '';
    var mapContainer = document.getElementById('map'), // 지도의 중심좌표
        mapOption = {
            center: new kakao.maps.LatLng(35.1847746, 129.0788739), // 지도의 중심좌표
            level: 3 // 지도의 확대 레벨
        };

    var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

    // 주소-좌표 변환 객체를 생성합니다
    var geocoder = new kakao.maps.services.Geocoder();

    var marker = [];

    function myMarker(address) {
        // 주소로 좌표를 검색합니다
        geocoder.addressSearch(address, function(result, status) {
            // 정상적으로 검색이 완료됐으면
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

                // 결과값으로 받은 위치를 마커로 표시합니다
                marker = new kakao.maps.Marker({
                    map: map,
                    position: coords
                });

                // 인포윈도우로 장소에 대한 설명을 표시합니다
                /*var infowindow = new kakao.maps.InfoWindow();
                infowindow.open(map, marker);*/

                // 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
                map.setCenter(coords);
            }
        });
    }

    function relayout() {
        map.relayout();
    }

    function remove_in(){
        $('#in_list *').remove();
    }

    function remove_into(){
        $('#in_list01 *').remove();
    }

    function myMarkername() {
        marker.setMap(null);
    }
</script>
<script>
    function comma(num) {
        var len, point, str;

        num   = num + '';
        point = num.length % 3;
        len   = num.length;
        str   = num.substring(0, point);
        
        while (point < len) {
            if (str != '') str += ',';

            str += num.substring(point, point + 3);
            point += 3;
        }

        return str;
    }

    function business_write() {
        location.href = '/index.php/movein/bwrite?bo_table=<?php echo $bo_table; ?>&wr_id=1';
    }

    function openPaging(name, type, just) {
        if (name === 'borough') {
            $('#borough').addClass('active');
            $('#industry').removeClass('active');
            $('#just').removeClass('active');
            $('#company').removeClass('active');
            $('#map01').removeClass('active');
            
            $('#tab01').removeClass('hidd');
            $('#tab02').addClass('hidd');
            $('#tab03').addClass('hidd');
            $('#tab04').addClass('hidd');
            $('#tab05').addClass('hidd');
        }

        if (name === 'industry') {
            $('#industry').addClass('active');
            $('#borough').removeClass('active');
            $('#just').removeClass('active');
            $('#company').removeClass('active');
            $('#map01').removeClass('active');

            $('#tab02').removeClass('hidd');
            $('#tab01').addClass('hidd');
            $('#tab03').addClass('hidd');
            $('#tab04').addClass('hidd');
            $('#tab05').addClass('hidd');

            if (!type) {
                $('#excel_1').attr('href', '/index.php/ExcelDow?excel=stati&u_se=all');
            } else {
                $('#excel_1').attr('href', '/index.php/ExcelDow?excel=stati&u_se=' + type);
            }

            $('#excel_2').attr('href', '/index.php/ExcelDow?excel=compa&u_se=' + type);

            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: '/index.php/Movein/industry_list',
                data: {
                    'type': type
                },
                success: function (data) {
                    var total_m = 0;
                    var total_c = 0;
                    var total_u = 0;

                    var add_data = '';

                    $.each(data, function (index, item) {
                        add_data += '<tr>';
                        
                        if (!type) {
                            add_data += '<td>';
                            add_data += item.g_name;
                            add_data += '</td>';

                            $('.g_name').removeClass('d-none');
                        } else {
                            $('.g_name').addClass('d-none');
                        }

                        // alert(type);
                        if (!type) {
                            add_data += '<td class="text-left" style="cursor: pointer" onclick="openPaging(\'just\',' + item.g_code + ',\'' + item.name + '\');remove_into();">';
                        } else {
                            add_data += '<td class="text-left" style="cursor: pointer" onclick="openPaging(\'just\',' + type + ',\'' + item.name + '\');remove_into();">';
                        }

                        add_data += item.name;
                        add_data += '</td>';
                        add_data += '<td>';
                        add_data += item.ins_type;
                        add_data += '</td>';
                        add_data += '<td>';
                        add_data += item.ins_ing;
                        add_data += '</td>';
                        add_data += '<td class="text-right">';
                        add_data += comma(parseInt(item.ins_area));
                        add_data += '</td>';
                        add_data += '<td>';
                        add_data += item.ji_date;
                        add_data += '</td>';
                        add_data += '<td>';
                        add_data += item.pro_type;
                        add_data += '</td>';
                        add_data += '<td class="text-left">';
                        add_data += item.enforcer_name;
                        add_data += '</td>';
                        // add_data += '<td>';
                        // add_data += item.site_code;
                        // add_data += '</td>';
                        add_data += '<td class="text-right">';
                        // add_data += comma(item.inc_nam);
                        add_data += comma(item.inc_nam);
                        add_data += '</td>';
                        add_data += '<td class="text-right" style="border-right: none">';
                        add_data += comma(item.tot_man);
                        add_data += '</td>';
                        add_data += '</tr>';

                        // $('#in_list').append(add_data);
                        
                        total_m += parseInt(item.ins_area);
                        total_c += parseInt(item.inc_nam);
                        total_u += parseInt(item.tot_man);
                    });

                    $('#in_list').html(add_data);

                    $('#all_m').html(comma(total_m));
                    $('#all_c').html(comma(total_c));
                    $('#all_u').html(comma(total_u));
                }
            })
        }



        if (name === 'just') {
            $('#just').addClass('active');
            $('#industry').removeClass('active');
            $('#borough').removeClass('active');
            $('#company').removeClass('active');
            $('#map01').removeClass('active');
            
            $('#tab05').removeClass('hidd');
            $('#tab01').addClass('hidd');
            $('#tab02').addClass('hidd');
            $('#tab03').addClass('hidd');
            $('#tab04').addClass('hidd');

            var nowpage = 1, pagelimit = 10, total = 0;

            $('#s_type').val(type);
            $('#s_name').val(just);
            
            if (type) {

                $.ajax({
                    type: 'GET',
                    url: '/index.php/Movein/just_list',
                    data: {
                        'type': type,
                        'just': just,
                        'nowpage': nowpage
                    },
                    success: function (data) {



                        if (data.just_list) {
                            var dataArr = data.just_list.data;

                            total = data.just_list.total;

                            var html = '';
                            for (var i = 0; i < dataArr.length; i++) {
                                number = dataArr[i].PNU;
                                html = '<tr>' +
                                    // '<td style="cursor: pointer" onclick="openPaging(\'company\',\''+dataArr[i].CPX_NUM+'\'); relayout(); myMarkername();">'+dataArr[i].INC_NAM +'</td>'+
                                    // "<td style='white-space: break-spaces;'>"+dataArr[i].JIBUN +"</td>"+
                                    // "<td style='border-right:none; white-space: break-spaces;'>"+dataArr[i].NEW_ADD+"</td>"+
                                    '<td class="text-left" style="cursor: pointer" onclick="openPaging(\'company\', \'' + dataArr[i].CPX_NUM + '\'); relayout(); myMarkername();">'+ dataArr[i].INC_NAM +'</td>'+
                                    '<td class="text-left" style="white-space: break-spaces">' + dataArr[i].NEW_ADD + '</td>' +
                                    '<td class="text-left" style="white-space: break-spaces">' + dataArr[i].REP_SPC + '</td>'+
                                    '<td class="text-left" style="border-right: none;white-space: break-spaces">' + dataArr[i].GOD_ITM + '</td>'+
                                    '</tr>';
                                $('#in_list01').append(html);
                            }
                        }
                    }
                });

            }
        }



        if (name === 'company') {
            if (!type) {
                alert('업체를 선택해주세요.');
                window.location.reload();
            } else {            
                //setBounds();
                $('#company').addClass('active');
                $('#just').removeClass('active');
                $('#industry').removeClass('active');
                $('#borough').removeClass('active');
                $('#map01').removeClass('active');

                $('#tab03').removeClass('hidd');
                $('#tab01').addClass('hidd');
                $('#tab02').addClass('hidd');
                $('#tab04').addClass('hidd');
                $('#tab05').addClass('hidd');

                $('#excel_3').attr('href', '/index.php/ExcelDow?excel=pany&u_se=' + type);
            }
            
            console.log(type);
            
            $.ajax({
                type: 'GET',
                url: '/index.php/Movein/companyInfo',
                data: {
                    'num': type
                },
                success: function (data) {
                    //console.log(data[0].PNU);

                    $('#cpx_num').html(data[0].CPX_NUM);
                    $('#INS_NAME').html(data[0].INS_NAME);
                    $('#SITE_CODE').html(data[0].SITE_CODE);

                    if (data[0].INS_NAME == '국제산업물류도시(1단계)일반산업단지' || data[0].INS_NAME == '미음 일반산업단지') {
                        $('#SITE_CODE').html('부산진해경제자유구역청');
                    } 

                    $('#INC_NAM').html(data[0].INC_NAM);
                    $('#CEO_NAM').html(data[0].CEO_NAM);
                    $('#JIBUN').html(data[0].JIBUN);

                    $('#TEL_NUM').html(data[0].TEL_NUM);
                    $('#FAX_NUM').html(data[0].FAX_NUM);
                    $('#REP_COD').html(data[0].REP_COD);
                    $('#REP_SPC').html(data[0].BJD_NAM);
                    $('#GOD_ITM').html(data[0].GOD_ITM);
                    $('#NEW_ADD').html(data[0].NEW_ADD);

                    $('#BSN_LIC').html(data[0].BSN_LIC);
                    $('#SIT_ARA').html(data[0].SIT_ARA);
                    $('#LES_CHK').html(data[0].LES_CHK);
                    $('#OWN_CHK').html(data[0].OWN_CHK);
                    $('#CON_DAT').html(data[0].CON_DAT);
                    $('#REG_DAT').html(data[0].REG_DAT);

                    // $('#REG_DAT').html(data[0].REG_DAT);
                    $('#TOT_MAN').html(data[0].TOT_MAN);
                    $('#MAL_WOK').html(data[0].MAL_WOK);
                    $('#FML_WOK').html(data[0].FML_WOK);
                    $('#MAL_FOR').html(data[0].MAL_FOR);
                    $('#FML_FOR').html(data[0].FML_FOR);



                    $('#opr_chk').html(data[0].OPR_CHK);
                    $('#CUR_CON').html(data[0].CUR_CON);
                    $('#BJD_NAM').html(data[0].BJD_NAM);  
                    $('#ETC_FAC').html(data[0].ETC_FAC);
                    $('#NEW_CHK').html(data[0].NEW_CHK);
                    $('#INC_LIC').html(data[0].INC_LIC);
                    $('#REP_SPC').html(data[0].REP_SPC);           
                    $('#GOD_MNY').html(data[0].GOD_MNY);
                    $('#EXP_MNY').html(data[0].EXP_MNY);
                    $('#STC_ARA').html(data[0].STC_ARA);
                    $('#BDC_ARA').html(data[0].BDC_ARA);                   
                    $('#BLD_ARA').html(data[0].BLD_ARA);                    
                    $('#COC_DAT').html(data[0].COC_DAT);          
                    $('#DEP_MNY').html(data[0].DEP_MNY);
                    $('#LES_MNY').html(data[0].LES_MNY);
                    $('#LES_POD').html(data[0].LES_POD);
                    $('#LES_INC').html(data[0].LES_INC);
                    $('#WHT_MAN').html(data[0].WHT_MAN);
                    $('#BLU_MAN').html(data[0].BLU_MAN);
                    $('#BSN_MAN').html(data[0].BSN_MAN);
                    $('#KIM_MAN').html(data[0].KIM_MAN);
                    $('#ULS_MAN').html(data[0].ULS_MAN);
                    $('#YAS_MAN').html(data[0].YAS_MAN);
                    $('#BUS_NUM').html(data[0].BUS_NUM);
                    $('#INC_BUS').html(data[0].INC_BUS);
                    $('#CMP_BUS').html(data[0].CMP_BUS);
                    $('#SEF_CAR').html(data[0].SEF_CAR);
                    $('#PUB_TRS').html(data[0].PUB_TRS);
                    $('#COM_WAK').html(data[0].COM_WAK);
                    $('#CAL_MAN').html(data[0].CAL_MAN);
                    $('#CAL_CEL').html(data[0].CAL_CEL);
                    
                    if (data[0].NEW_ADD == undefined || data[0].NEW_ADD == "") {
                        myMarker(data[0].JIBUN);
                    } else {
                        myMarker(data[0].NEW_ADD);
                    }

                    $.ajax({
                        type: 'GET',
                        url: '/index.php/Movein/companyInfo01',
                        data: {
                            'pnu': data[0].PNU
                        },
                        success: function (result) {
                            //console.log(data[0].PNU);

                            $('#INS_NAME').html(result[0].INS_NAME);
                            $('#JIMOK1').html(result[0].JIMOK1);
                            $('#BJD_NAM01').html(result[0].BJD_NAM + ' ' + result[0].JIBUN);
                            $('#MVMN_RESN').html(result[0].MVMN_RESN);
                            $('#MVMN_DATE').html(result[0].MVMN_DATE);
                            $('#OWNER').html(result[0].OWNER);
                            $('#OWNER_ADD').html(result[0].OWNER_ADD);
                            $('#OWNER_KIND').html(result[0].OWNER_KIND);
                            $('#OWNER_MVMN').html(result[0].OWNER_MVMN);
                            $('#OWNER_DATE').html(result[0].OWNER_DATE);
                            $('#OWNER_MEM').html(result[0].OWNER_MEM);
                            $('#JIKA').html(comma(result[0].JIKA));
                            $('#JIKA_2014').html(result[0].JIKA_2014);
                            $('#JIKA_2013').html(result[0].JIKA_2013);
                            $('#JIKA_2012').html(result[0].JIKA_2012);
                            $('#JIKA_2011').html(result[0].JIKA_2011);
                            $('#AREA').html(comma(result[0].AREA));
                            $('#USE_AREA1').html(result[0].USE_AREA1);
                        }
                    })

                    //alert(data[0].PNU);
                   
                    $.ajax({
                        type: 'GET',
                        url: '/index.php/Movein/buildinfo',
                        data: {
                            'pnu': data[0].PNU
                        },
                        success: function (result) {
                            console.log(result);
                            
                            var html01 = '';
                            
                            for (var i = 0; i < result.length; i++) {
                                
                                html01 =
                                    "<tr style='border-top:1px solid #bab9c1;'>"+
                                        "<th style='width:25%;'>건물순번</th>"+
                                        "<td style='width:25%;'>"+result[i].BUI_SEQ+"</td>"+
                                        "<th style='width:25%;'>단지명</th>"+
                                        "<td style='width:25%; border-right:none;'>"+result[i].INS_NAME+"</td>"+
                                    "</tr>"+
                                    "<tr>"+
                                    "<th>법정동</th>"+
                                    "<td>"+result[i].BJD_NAM+"</td>"+
                                    "<th>지번</th>"+
                                    "<td style='border-right:none;'>"+result[i].JIBUN+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>주소</th>"+
                                    "<td colspan='3' style='border-right:none;'>"+result[i].BJD_NAM+" "+result[i].JIBUN+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>도로명주소</th>"+
                                    "<td colspan='3' style='border-right:none;'>"+result[i].NEW_ADD+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>건물명</th>"+
                                    "<td colspan='3' style='border-right:none;line-height: 32px;'>"+
                                        result[i].BUI_NAME+
                                        "<button style='width:110px;float:right;' type='button' class='btn btn-primary btn-sch' onclick=''>소유자변동조회 </button>"+
                                    "</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>동명칭</th>"+
                                    "<td>"+result[i].MAIN_DONG+"</td>"+
                                    "<th>동대지면적(m<sup>2</sup>)</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_AREA1+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>동연면적(m<sup>2</sup>)</th>"+
                                    "<td>"+result[i].BUI_AREA2+"</td>"+
                                    "<th>동건축면적(m<sup>2</sup>)</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_AREA3+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>용적률선전용면적</th>"+
                                    "<td>"+result[i].BUI_AREA4+"</td>"+
                                    "<th>동용적율</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_AREA3+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>건폐율</th>"+
                                    "<td>"+result[i].BC_RAT+"</td>"+
                                    "<th>높이</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_BUN+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>지상층수</th>"+
                                    "<td>"+result[i].MAIN_GRL+"</td>"+
                                    "<th>지하층수</th>"+
                                    "<td style='border-right:none;'>"+result[i].MAIN_BML+"</td>"+
                                "</tr>"+
                                /*"<tr>"+
                                    "<th>소유자변동원인</th>"+
                                    "<td>소유권이전</td>"+
                                    "<th>소유권변경일자</th>"+
                                    "<td style='border-right:none;'>2015/06/24</td>"+
                                "</tr>"+*/
                                "<tr>"+
                                    "<th>건축허가일</th>"+
                                    "<td>"+result[i].BUI_DATE1+"</td>"+
                                    "<th>착공일</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_DATE2+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<th>주구조</th>"+
                                    "<td>"+result[i].MAIN_STR+"</td>"+
                                    "<th>사용승인일자</th>"+
                                    "<td style='border-right:none;'>"+result[i].BUI_DATE3+"</td>"+
                                "</tr>"+
                                "<tr style='margin-bottom: 20px;'>"+
                                    "<th>주용도명</th>"+
                                    "<td>"+result[i].MAIN_STR_NAME+"</td>"+
                                    "<th>동기타용도</th>"+
                                    "<td style='border-right:none;'>"+result[i].DONG_STR_NAME+"</td>"+
                                "</tr>"+
                                "<tr>"+
                                    "<td colspan='4' style='border-bottom: 1px solid #ffffff;'></td>"+
                                "</tr>";

                                $("#buildinfo").append(html01);
                            }
                        }
                        
                    })


                }
            })
        }



        if (name === 'map') {
            relayout();

            $("#map01").addClass('active');
            $("#industry").removeClass('active');
            $("#company").removeClass('active');
            $("#borough").removeClass('active');
            $("#just").removeClass('active');

            $("#tab04").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab05").addClass('hidd');
        }
    }

    function openTab(name) {
        //alert(number);
        if (name == 'basics') {
            $("#basics").addClass("active");
            $("#details").removeClass("active");
            $("#survey").removeClass("active");
            $("#photo").removeClass("active");

            $("#tab_2").addClass("hidd");
            $("#tab_3").addClass("hidd");
            $("#tab_4").addClass("hidd");
            $("#tab_1").removeClass("hidd");
        }

        if (name == 'details') {
            $("#details").addClass("active");
            $("#basics").removeClass("active");
            $("#survey").removeClass("active");
            $("#photo").removeClass("active");

            $("#tab_2").removeClass("hidd");
            $("#tab_1").addClass("hidd");
            $("#tab_3").addClass("hidd");
            $("#tab_4").addClass("hidd");
        }

        if (name == 'survey') {
            $("#survey").addClass("active");
            $("#basics").removeClass("active");
            $("#details").removeClass("active");
            $("#photo").removeClass("active");

            $("#tab_1").addClass("hidd");
            $("#tab_2").addClass("hidd");
            $("#tab_4").addClass("hidd");
            $("#tab_3").removeClass("hidd");
        }

        if (name == 'photo') {
            $("#photo").addClass("active");
            $("#basics").removeClass("active");
            $("#details").removeClass("active");
            $("#survey").removeClass("active");

            $("#tab_1").addClass("hidd");
            $("#tab_2").addClass("hidd");
            $("#tab_3").addClass("hidd");
            $("#tab_4").removeClass("hidd");
        }

        if (name == 'company') {
            $('#company_01').addClass('active');
            $('#land_01').removeClass('active');
            $('#building_01').removeClass('active');

            $('#tab0_1').removeClass('hidd');
            $('#tab0_2').addClass('hidd');
            $('#tab0_3').addClass('hidd');
        }
        if (name == 'land') {
            $('#land_01').addClass('active');
            $('#company_01').removeClass('active');
            $('#building_01').removeClass('active');

            $('#tab0_2').removeClass('hidd');
            $('#tab0_1').addClass('hidd');
            $('#tab0_3').addClass('hidd');

            $("#excel_3").attr("href", "/ExcelDow?excel=land&u_se="+number);
        }
        if (name == 'architecture') {
            $('#building_01').addClass('active');
            $('#land_01').removeClass('active');
            $('#company_01').removeClass('active');

            $('#tab0_3').removeClass('hidd');
            $('#tab0_1').addClass('hidd');
            $('#tab0_2').addClass('hidd');
        }
    }



    function notice_list(nowpage) {
        if (!nowpage) {
            nowpage = '1';
        }

        var set_content = '';
        var Totalcnt = "";
        var typ   = $('#s_type').val();
        var snam  = $('#s_name').val();
        var KeyTy = $('#q_searchKeyTy').val();
        var q_Val = $('#q_searchVal').val();
        
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: '/index.php/Movein/just_search_list',
            data: {
                'typ': typ,
                'snam': snam,
                'nowpage': nowpage,
                'KeyTy': KeyTy,
                'q_Val': q_Val,
            },
            success: function (result) {
                console.log(result);
                
                if (result.just_list) {
                    var dataArr = result.just_list.data;

                    total = result.just_list.total;

                    var html = '';

                    for (var i = 0; i < dataArr.length; i++) {
                        number = dataArr[i].PNU;
                        html = '<tr>'+
                            '<td class="text-left" style="cursor: pointer" onclick="openPaging(\'company\', \'' + dataArr[i].CPX_NUM + '\'); relayout(); myMarkername();">' + dataArr[i].INC_NAM + '</td>' +
                            // "<td style='white-space: break-spaces;'>"+dataArr[i].BJD_NAM++dataArr[i].NEW_ADD +"</td>"+
                            '<td class="text-left" style="white-space: break-spaces">' + dataArr[i].NEW_ADD + '</td>' +
                            '<td class="text-left" style="white-space: break-spaces">' + dataArr[i].REP_SPC + '</td>' +
                            '<td class="text-left" style="border-right: none;white-space: break-spaces">' + dataArr[i].GOD_ITM + '</td>' +
                            '</tr>';

                        $('#in_list01').append(html);
                    }
                }
            },
            // complete: function () {
            //     $('#nowpage').val(nowpage);

            //     var totalData = Totalcnt; // 총 데이터 수
            //     var dataPerPage = 15; // 한 페이지에 나타낼 데이터 수
            //     var pageCount = totalData / dataPerPage;
                
            //     pageCount = Math.ceil(pageCount); // 한 화면에 나타낼 페이지 수
               
            //     if (pageCount > 10) pageCount = 10;

            //     var selectedPage = nowpage;
                
            //     if (Totalcnt == '') {
            //         $('#paging').html(''); 
            //     }

            //     paging(totalData, dataPerPage, pageCount, selectedPage);
            // }
        });
    }

    // function paging(totalData, dataPerPage, pageCount, currentPage) {
    //     var totalPage = Math.ceil(totalData / dataPerPage); // 총 페이지 수
    //     var pageGroup = Math.ceil(currentPage / pageCount); // 페이지 그룹

    //     var last = pageGroup * pageCount; // 화면에 보여질 마지막 페이지 번호

    //     if (last > totalPage) last = totalPage;
        
    //     var first = last - (pageCount - 1); // 화면에 보여질 첫번째 페이지 번호
    //     var next = last + 1;
    //     var prev = first - 1;
    //     var $pingingView = $('#paging');
    //     var html = '<ul class="pagination">';
        
    //     html += '<li><a href="#" id="prev"><</a></li>';
        
    //     for (var i = first; i <= last; i++) {
    //         html += '<li><a href="#" id="' + i + '">' + i + '</a></li>';
    //     }

    //     html += '<li><a href="#" id="next">></a></li>';
    //     html += '</ul>';

    //     $('#paging').html(html); // 페이지 목록 생성
    //     $('#paging a').css('color', 'black');
    //     $('#paging a#' + currentPage).css({
    //         'text-decoration': 'none',
    //         'color': '#fff',
    //         'background': '#4B4B4D',
    //         'font-weight': 'bold'
    //     }); // 현재 페이지 표시

    //     $('#paging a').click(function () {
    //         var $item = $(this);
    //         var $id = $item.attr('id');
    //         var selectedPage = $item.text();
    //         var prepage = $('#nowpage').val();

    //         if ($id == 'next') selectedPage = parseInt(prepage) + 1;
    //         if ($id == 'prev') selectedPage = parseInt(prepage) - 1;

    //         notice_list(selectedPage);

    //         var offset = $('#paging').offset();

    //         $('html, body').animate({scrollTop: offset.top}, 1000);
    //     });
    // }




    // function notice_list() {
    //     var typ   = $('#s_type').val();
    //     var snam  = $('#s_name').val();
    //     var KeyTy = $('#q_searchKeyTy').val();
    //     var q_Val = $('#q_searchVal').val();
        
    //     $.ajax({
    //         type: 'GET',
    //         url: '/index.php/Movein/just_search_list',
    //         data: {
    //             'typ': typ,
    //             'snam': snam,
    //             'KeyTy': KeyTy,
    //             'q_Val': q_Val,
    //         },
    //         dataType: 'JSON',
    //         success: function (result) {
    //             console.log(result);
                
    //             if (result.just_list) {
    //                 var dataArr = result.just_list.data;

    //                 total = result.just_list.total;

    //                 var html = '';

    //                 for (var i = 0; i < dataArr.length; i++) {
    //                     number = dataArr[i].PNU;
    //                     html = '<tr>'+
    //                         '<td style="cursor: pointer" onclick="openPaging(\'company\', \'' + dataArr[i].CPX_NUM + '\'); relayout(); myMarkername();">' + dataArr[i].INC_NAM + '</td>' +
    //                         // "<td style='white-space: break-spaces;'>"+dataArr[i].BJD_NAM++dataArr[i].NEW_ADD +"</td>"+
    //                         '<td style="white-space: break-spaces">' + dataArr[i].NEW_ADD + '</td>' +
    //                         '<td style="white-space: break-spaces">' + dataArr[i].REP_SPC + '</td>' +
    //                         '<td style="border-right: none;white-space: break-spaces">' + dataArr[i].GOD_ITM + '</td>' +
    //                         '</tr>';

    //                     $('#in_list01').append(html);
    //                 }
    //             }
    //         }
    //     });
    // }
    <?php
    if($_GET['company'] != ""){
        ?>
    $("document").ready(function () {
        openPaging('company','<?=$_GET['company']?>');
        relayout();
    });
    <?php
    }
    ?>

    function ReportToExcelConverter() {
        $('#TableToExcel').table2excel({
            exclude: '.noExl',
            name: '산업단지별업체',
            filename: '산업단지별업체' +'.xls', // 확장자를 여기서 붙여줘야한다.
            fileext: '.xls',
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true,
            preserveColors: true
        });
    };

    /*function ReportToExcelConverter2() {
        $('#TableToExcel2').table2excel({
            exclude: '.noExl',
            name: '업체정보',
            filename: '업체정보' +'.xls', // 확장자를 여기서 붙여줘야한다.
            fileext: '.xls',
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true,
            preserveColors: true
        });
    };*/
</script>