<?php
include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/header.php";

?>
<link rel="stylesheet" href="/assets/css/complex.css">

<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/left_menu.php";
                ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;">


                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>부산 산업 단지 정보</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table complex-block">
                    <div class="snic-search">
                        <span>업종코드검색</span>
                        <div class="snic-input">
                            <label for="q_searchVal" class="sr-only">검색어 입력</label> 
                            <input type="text" name="q_searchVal" id="q_searchVal" value="">
                        </div>
                        <button type="button" class="btn sm dark" onclick="search()">검색</button>
                        <br>
                        <span style="color:blue;font-weight:400;">※ 한국표준산업분류 상 중분류(2자리 숫자)로 입주가능한 산업단지를 검색할 수 있습니다.<a href="#" onclick="openModal()">[표준산업분류보기]</a></span>
                    </div>
                    <div class="sub_docu">
                        <h2 class="sub_tit">산업단지 업종현황</h2>
                        <table id="comp_div_table" class="Base mb-3">
                            <caption>산업단지 업종현황</caption>
                            <colgroup>
                                <col width="27%">
                                <col width="13%">
                                <col width="32%">
                                <col>
                            </colgroup>

                            <!-- <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="18%">
                                <col width="11%">
                                <col>
                                <col width="16%">
                                <col width="15%">
                            </colgroup> -->

                            <thead>
                                <tr>
                                    <th scope="col">산업단지 명칭</th>
                                    <th scope="col">유치업종(중분류)</th>
                                    <th scope="col">상세 유치업종</th>
                                    <th scope="col">제한업종</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">강서보고 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>13,21,24,25,26,28,29,31,32,52</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 13, 21, 24, 25, 26, 28, 29, 31, 32<br>
                                        ○ 운수업 : 52
                                    </td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <!-- <th scope="row"><a href="/index.php/Movein/current" target="_self">부산신항배후 국제산업물류도시(1단계) <br>일반산업단지</a></th> -->
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">국제산업물류도시(1단계)<br>일반산업단지<br>(강서구 미음동,송정동)</a></th>
                                    <td>15,24,25,26,27,<br>28,29,30,31,33,52,62,63,70</td>
                                    <td style="text-align: justify">
                                        ○ 복합산업 : 1521,<br>1522(신발산업집적화단지로 한정), 24, 25, 26, 27, 28, 29, 30, 31, 33<br>
                                        ○ 메카트로닉스 : 29, 30, 31<br>
                                        ○ 일렉트로닉스 : 26, 27, 28, 35119<br>
                                        ○ 정보서비스 : 62, 63<br>
                                        ○ 물류운송 : 52, 29, 31, 33<br>
                                        ○ 연구개발 : 70
                                    </td>
                                    <td style="text-align: justify">○ 15151, 2431, 2432, 2520, 25922, <br>25923, 3012, 3191, 52104, 52999</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_country" target="_self">명지녹산 국가산업단지<br>(강서구 송정동,명지동)</a></th>
                                    <td>10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,49,50,52</td>
                                    <td style="text-align: justify">
                                        ○ 전 제조업<br>
                                        ○ 지식산업 및 정보통신산업<br>
                                        ○ 창고·운송업 : 52101, 52102, 49301, 49302, <br>49303, 49401, 50112, 52942
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 아래 제조업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료 / 재활용 / <br>기타
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">미음 일반산업단지<br>(강서구 미음동,구랑동)</a></th>
                                    <td>24,25,26,27,28,29,30,31,62,63</td>
                                    <td style="text-align: justify">
                                        ○ 메카트로닉스 : 24, 25, 28, 29, 30, 31<br>
                                        ○ 일렉트로닉스 : 26, 27, 28<br>
                                        ○ 정보서비스 : 62, 63
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 메카트로닉스 : 2431, 2432, 2520, <br>25922, 25923, 3012, 3191, 3192<br>
                                        ○ 일렉트로닉스 : 도금업 관련 시설, <br>대기 및 수질 1,2종 사업장
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">부산과학 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>10,13,14,15,16,17,18,19,20,22,23,24,25,26,27,28,29,30,31,33</td>
                                    <td style="text-align: justify">
                                        ○ 메카트로닉스 : 29, 30, 31<br>
                                        ○ 신소재 : 24, 25, 28, 27<br>
                                        ○ 정밀화학 : 19, 20, 22<br>
                                        ○ 정보통신 : 26, 28<br>
                                        ○ 기타 일반제조업 : 10, 13, 14, 15, 16, 17, 18, <br>22, 23, 24, 31, 33
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 아래 업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">생곡 일반산업단지<br>(강서구 생곡동)</a></th>
                                    <td>13,16,17,20,22,23,24,25,29,31,38</td>
                                    <td style="text-align: justify">
                                        ○ 자원순환특화 관련 산업<br>
                                          - 금속 관련 원료재생업 및 제조업 : 24, 25, 29, <br>3831<br>
                                          - 비금속 관련 원료재생업 및 제조업 : 13, 16, 17, <br>20, 22, 23, 3832<br>
                                        ○ 메카트로닉스 관련 산업 : 25, 29, 31
                                    </td>
                                    <td style="text-align: justify">○ 2431, 2432, 25922, 25923</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">성우 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>13,16,17,19,20,22,24,25,26,27,<br>28,29,30,31,33,52</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 13, 16, 17, 19, 20, 22, 24, 25, 26, 27, 28, 29, 30, 31, 33<br>
                                        ○ 운수업 : 52<br>(제조업체가 부가적으로 필요한 경우에만 허용)
                                    </td>
                                    <td style="text-align: justify">○ 13401, 13402, 13403, 13404, 13409, <br>16212, 17902, 19221, 20129, 20131, <br>20132, 20411, 20412, 20422, 25200, <br>25922</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">신호 일반산업단지<br>(강서구 신호동)</a></th>
                                    <td>24,25,28,29,30</td>
                                    <td style="text-align: justify">○ 24, 25, 28, 29, 30</td>
                                    <td style="text-align: justify">
                                        ○ 아래 업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">정주 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>16</td>
                                    <td style="text-align: justify">○ 16</td>
                                    <td style="text-align: justify">○ 16212</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">지사2 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>13,16,20,25,29,52</td>
                                    <td style="text-align: justify">○ 13, 16, 2011, 2049, 25, 29, 5210, 35119</td>
                                    <td style="text-align: justify">○ 13401, 13402, 13403, 13404, 13409, <br>16212, 20111, 20494</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">풍상 일반산업단지<br>(강서구 지사동)</a></th>
                                    <td>23,25,29</td>
                                    <td style="text-align: justify">○ 23, 25, 29</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">화전 일반산업단지<br>(강서구 화전동)</a></th>
                                    <td>24,25,26,28,29,30,31,52</td>
                                    <td style="text-align: justify">
                                        ○ 메카트로닉스 : 24, 25, 29, 28<br>
                                        ○ 일렉트로닉스 : 26<br>
                                        ○ 자동차 및 운송장비 : 30, 31<br>
                                        ○ 물류 : 52
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 아래 업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료 / <br>섬유제품 / 화합물 및 화학제품 / <br>고무 및 플라스틱 제조업
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">기룡1 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>11</td>
                                    <td style="text-align: justify">○ 11</td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">기룡2 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>24,25</td>
                                    <td style="text-align: justify">○ 24, 25</td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">명례 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>10,14,24,25,28,29,31,32,52</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 10, 14, 24, 25, 28, 29, 31, 32<br>
                                        ○ 운수업 : 52
                                    </td>
                                    <td style="text-align: justify">○ 제조업 : 1420, 2411, 2421, 2520, <br>25922, 25923, 282, 3112, 3120, 3191, <br>3192, 3199, 32022</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">반룡 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>10,16,26,28,29,<br>30,31,32,52</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 1022, 1071, 1079, 16, 26, 28, 29, 30, 31, 3202<br>
                                        ○ 운수업 : 52
                                    </td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">부산신소재 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>27,28,30</td>
                                    <td style="text-align: justify">○ 27, 28, 30</td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">에코장안 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>10,13,22,23,24,28,29,30,31,52</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 10, 13, 22, 23, 24, 28, 29, 30, 31<br>
                                        ○ 운수업 : 52
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 101, 102, 103, 104, 108, 221, <br>2225, 2229, 23311, 23991, 2411, 2421, <br>282, 3120, 3191<br>
                                        ○ 운수업 : 52104
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">오리 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>10,11,20,24,25,27,28,29,30,31,33,70,72</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 10, 11, 2042, 24, 25, 27, 28, 29, 30, <br>31, 33<br>
                                        ○ 전문, 과학 및 기술서비스업 : 70, 72
                                    </td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">장안 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>26,27,28,29,30,49,52</td>
                                    <td style="text-align: justify">○ 26, 27, 28, 29, 30, 49, 52</td>
                                    <td style="text-align: justify">
                                        ○ 아래 업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료 / <br>섬유제품 / 화합물 및 화학제품 / <br>고무 및 플라스틱 제조업
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_agriculture" target="_self">정관 농공단지<br>(기장군 정관읍)</a></th>
                                    <td>13,20,22,24,25,26,27,28,29,30</td>
                                    <td style="text-align: justify">
                                        ○ 기계·금속 : 22, 25, 29, 30<br>
                                        ○ 섬유·화학 : 13, 20<br>
                                        ○ 첨단업종 : 24, 26, 27<br>
                                        ○ 기타제조업 : 28
                                    </td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">정관 일반산업단지<br>(기장군 장안읍)</a></th>
                                    <td>10,11,14,15,16,17,23,24,25,26,27,28,29,30,31,32,33,52</td>
                                    <td style="text-align: justify">
                                        ○ 목재·비금속 : 16, 17, 23<br>
                                        ○ 철강·기계 : 24, 25, 28, 29, 30<br>
                                        ○ 운송장비 : 30, 31<br>
                                        ○ 유통설비 : 52<br>
                                        ○ 기타제조업 : 10, 11, 14, 15, 16, 17, 23, 26, 27, 30, 32, 33
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 아래 업종 중 입주금지업종 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                        - 연탄, 석탄 / 시멘트 및 시멘트제품 / <br>아스팔트 및 포장재료 / 도정 및 도축업 / <br>제지업 / 염색 / 피혁 / 도금 / 염안료 / <br>섬유제품 / 화합물 및 화학제품 / <br>고무 및 플라스틱 제조업
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">정관코리 일반산업단지<br>(기장군 정관읍)</a></th>
                                    <td>24,25,26,28,29,30,31,33</td>
                                    <td style="text-align: justify">○ 24, 25, 26, 28, 29, 30, 31, 33</td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">신평장림 일반산업단지(기존단지)<br>(사하구 신평동,장림동)</a></th>
                                    <td>10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34</td>
                                    <td style="text-align: justify">○  전 제조업</td>
                                    <td style="text-align: justify">○ 관리기관이 공해, 용수, 기타의 사정으로 <br>산업단지 입주 부적격업종에 대하여는 <br>입주를 제한할 수 있음<br>(염색, 피혁, 도금업종 등 용수 다소비업종 <br>입주 불가)
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">신평장림 일반산업단지(협업단지)<br>(사하구 신평동,장림동,다대동)</a></th>
                                    <td>10,13,15,24,25,27,28,29,30,31,33</td>
                                    <td style="text-align: justify">
                                        ○ 기계 : 2412, 25, 27, 28, 29, 31, 33<br>
                                        ○ 염색 : 13<br>
                                        ○ 표면처리 : 25922<br>
                                        ○ 수산물가공 : 102, 103, 151<br>
                                        ○ 자동차부품 : 30, 25, 27, 28, 29, 31, 33
                                    </td>
                                    <td style="text-align: justify">○ 폐수처리장을 운영하는 조합구역 내에는 <br>배치업종 이외 타 업종의 입주를 제한함<br>(표면처리, 염색, 수산물가공)</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_city" target="_self">모라 도시첨단산업단지<br>(사상구 모라동)</a></th>
                                    <td>21,25,26,27,28,29,30,31,58,59,61,62,63,70,71,72,73,75,85</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 21, 25, 26, 27, 28, 29, 30, 31<br>
                                        ○ 출판, 영상, 방송통신 및 정보서비스업 : 58, 59, <br>61, 62, 63<br>
                                        ○ 전문, 과학 및 기술 서비스업 : 70, 71, 72, 73<br>
                                        ○ 사업시설관리 및 사업지원 서비스업 : 75<br>
                                        ○ 교육서비스업 : 85
                                    </td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">사상재생사업지구 일반산업단지(조성중)<br>(사상구 주례동,감전동,학장동)</a></th>
                                    <td>10,13,14,15,16,17,18,19,20,22,23,24,25,26,27,28,29,30,31,32,33,49,52,58,59,60,61,62,63,70,71,72,73,75,85,90</td>
                                    <td style="text-align: justify">
                                        ○ 전통산업육성지구 : 10, 13, 14, 15, 16, 17, 18, <br>19, 20, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, <br>32, 33<br>
                                        ○ 스마트 융합·부품 산업지구 : 10, 13, 15, 24, 26, <br>27, 29, 30, 31<br>
                                        ○ 지능형 메카트로닉스 산업지구 : 26, 27, 28, 29, <br>30, 31, 62<br>
                                        ○ 지식·문화산업 복합용지지구 : 58, 59, 60, 61, <br>62, 63, 70, 71, 72, 73, 75, 85, <br>90(식물원, 동물원 및 자연공원 운영업 제외)<br>
                                        ○ 물류관련 업종 : 49(도로화물 운송업에 한함), <br>52(보관 및 창고업, <br>그 외 기타 운송관련 서비스업에 한함)<br>
                                        ○ 기타 첨단사업 등 : 산업집적법 등에 의한 <br>지식기반산업, 첨단산업, 문화산업, 정보통신산업
                                    </td>
                                    <td style="text-align: justify">○ 허용업종 중 입주제한업종(세세분류) 있음<br>(자세한 내용은 산업단지 관리기본계획 참고)</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">센텀시티 일반산업단지<br>(해운대구 우동,재송동)</a></th>
                                    <td>14,18,25,26,27,28,29,33,58,59,60,61,62,63,70,71,72,73,75,85,90</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 141, 181, 259, 261, 263, 264, 265, <br>266, 271, 272, 273, 274, 284, 285, 28903, <br>291, 331, 334, 339<br>
                                        ○ 정보통신업 : 581, 582, 591, 592, 601, 612, <br>620, 631<br>
                                        ○ 전문, 과학 및 기술서비스업 : 701, 702, 711, <br>712, 713, 714, 715, 721, 729, 732, 739<br>
                                        ○ 사업시설관리, 사업지원 및 임대서비스업 : <br>75320, 75991, 75992<br>
                                        ○ 교육서비스업 : 853, 856<br>
                                        ○ 예술, 스포츠 및 여가관련 서비스업 : 901, 902<br>
                                        ○ 문화산업진흥기본법 제2조제1호의 문화산업 업종<br>(영화, 음반, 출판, 문화재 관련산업 등)
                                    </td>
                                    <td style="text-align: justify">&nbsp;</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_city" target="_self">회동석대 도시첨단산업단지<br>(금정구 회동동, 해운대구 석대동)</a></th>
                                    <td>25,26,27,28,29,30,63</td>
                                    <td style="text-align: justify">
                                        ○ 제조업 : 261, 262, 263, 264, 265, 266, 271, <br>272, 274, 281, 282, 283, 284, 285, 289, 259, <br>291, 292, 303<br>
                                        ○ 출판, 영상, 방송통신 및 정보서비스업 : 631,639
                                    </td>
                                    <td style="text-align: justify">○ 25,29,30 업종 중 산업집적법 시행규칙 <br>[별표5]의 첨단업종이 아닌 업종</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">강서해성 일반산업단지(조성중)<br>(강서구 지사동)</a></th>
                                    <td>25,29,31</td>
                                    <td style="text-align: justify">○ 25, 29, 31</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">명동 일반산업단지(조성중)<br>(강서구 지사동)</a></th>
                                    <td>25,28,29,31</td>
                                    <td style="text-align: justify">○ 25, 28, 29, 31</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_city" target="_self">에코델타시티 도시첨단산업단지(조성중)<br>(강서구 명지동)</a></th>
                                    <td>24,25,26,27,28,29,30,31,58,59,60,61,62,63,71,72,73,75,85,90</td>
                                    <td style="text-align: justify">
                                        ○ 첨단업종 : 24, 25, 26, 27, 28, 29, 30, 31<br>
                                          - 24,25 업종의 경우 산업집적법 시행규칙 제15조 [별표5(첨단업종)]에 해당하는 업종만 허용<br>
                                        ○ 지식·문화·정보·통신산업 : 58, 59, 60, 61, 62, <br>63, 71, 72, 73, 75, 85, 90
                                    </td>
                                    <td style="text-align: justify">○ 대기환경보전법 시행규칙 별표1 및 별표2에 <br>명시된 물질을 배출하는 시설</td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">지사글로벌 일반산업단지(조성중)<br>(강서구 지사동)</a></th>
                                    <td>25,27,28,29,30,31</td>
                                    <td style="text-align: justify">○ 25, 27, 28, 29, 30, 31</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">기장대우 일반산업단지(조성중)<br>(기장군 장안읍)</a></th>
                                    <td>30</td>
                                    <td style="text-align: justify">○ 30</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">동남권방사선의과학 일반산업단지<br>(조성중)<br>(기장군 장안읍)</a></th>
                                    <td>21,25,26,27,28,29,31,72,70</td>
                                    <td style="text-align: justify">
                                        ○ 의료용 물질 및 의약품 : 21101, 21102, 21210, <br>21220, 21230, 21300<br>
                                        ○ 금속가공제품 : 25130<br>
                                        ○ 전자부품, 컴퓨터, 영상, 음향 및 통신장비 : 26111, <br>26112, 26129, 26224, 26295<br>
                                        ○ 의료, 정밀, 광학기기 및 시계 : 27111, 27212, <br>27213, 27301<br>
                                        ○ 전기장비 : 28114, 28119, 28901<br>
                                        ○ 기타 기계 및 장비 : 29271, 29272, 29280, <br>29299<br>
                                        ○ 기타 운송장비 : 31312<br>
                                        ○ 건축기술, 엔지니어링 및 기타 과학기술 서비스업 : <br>72122, 72911, 72919<br>
                                        ○ 연구개발업 : 70111, 70112, 70113, 70119, <br>70121, 70129, 70130
                                    </td>
                                    <td style="text-align: justify">
                                        ○ 물환경보전법 1종, 2종 폐수배출시설<br>
                                        ○ 대기환경보전법 1종, 2종 대기오염물질 <br>배출시설<br>
                                        ○ 악취방지법 악취배출시설
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current" target="_self">산양 일반산업단지(조성중)<br>(사하구 다대동)</a></th>
                                    <td>24,29</td>
                                    <td style="text-align: justify">○ 24, 29</td>
                                    <td style="text-align: justify"></td>
                                </tr>
                                <tr>
                                    <th scope="row"><a href="/index.php/Movein/current_city" target="_self">금곡 도시첨단산업단지(조성중)<br>(북구 금곡동)</a></th>
                                    <td></td>
                                    <td style="text-align: justify">
                                        ○ 도시첨단산업단지 및 지식산업센터에 <br>입주가능한 업종<br>
                                        ○ 제조업 중 첨단업종<br>
                                        ○ 지식·문화·정보통신산업
                                    </td>
                                    <td style="text-align: justify">○ 산업집적법 시행령 제34조에 따른 <br>도시형공장의 범위에 해당하여야 하고, <br>한국표준산업분류 상 악취·소음·진동·폐수·<br>분진·중량·위험물 등 공해배출요인이 있는 <br>업종은 입주 불가</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="sub_docu">
                        <span class="text-danger">※ 산업단지 입주대상 업종 중 산업단지 조성 목적에 부합되지 않거나, 주변 업체에 지장을 초래할 우려가 있는 업종은 추가로 제한할 수 있으며 한국표준산업분류상의 악취·소음·진동·폐수·분진·중량·위험물·대기오염 등 공해배출 요인이 있거나 실제 영위하는 업태가 공해배출요인이 있다면 관리기관은 입주를 제한할 수 있으므로 최종적인 입주가능여부는 해당 산업단지의 관리기관에 확인하여야 합니다.</span>
                    </div>
                    <div class="sub_docu">
                        <span class="text-danger">※ 검색된 허용업종은 해당 산업단지에 일반적으로 허용된 업종을 의미하며 업종별 배치가능한 입지는 해당 산업단지별 산업단지 관리기본계획 및 산업단지 관리기관에 확인하여야 합니다.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-add-receiver">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">표준산업분류코드</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="Base" id="comp_div_table">
                <caption>표준산업분류코드</caption>
                <colgroup>
                    <col style="width: 40%;">
                    <col style="width: 20%;">
                    <col style="width: 40%;">
                </colgroup>
                <thead>
                <tr>
                    <th scope="col">대분류</th>
                    <th scope="col">분류코드(중분류)</th>
                    <th scope="col">분류명</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td style='text-align: justify' rowspan="25">C. 제조업(10~34)</td>
                    <td>10</td>
                    <td style='text-align: justify'>식료품 제조업</td>
                </tr>
                <tr>
                <td>11</td> <td style='text-align: justify'>음료 제조업</td>
                </tr>
                <tr>
                <td>12</td> <td style='text-align: justify'>담배 제조업</td>
                </tr>
                <tr><td>13</td> <td style='text-align: justify'>섬유제품 제조업; 의복제외</td></tr>
                <tr><td>14</td> <td style='text-align: justify'>의복, 의복액세서리 및 모피제품 제조업</td></tr>
                <tr><td>15</td> <td style='text-align: justify'>가죽, 가방 및 신발 제조업</td></tr>
                <tr><td>16</td> <td style='text-align: justify'>목재 및 나무제품 제조업; 가구 제외</td></tr>
                <tr><td>17</td> <td style='text-align: justify'>펄프, 종이 및 종이제품 제조업</td></tr>
                <tr><td>18</td> <td style='text-align: justify'>인쇄 및 기록매체 복제업</td></tr>
                <tr><td>19</td> <td style='text-align: justify'>코크스, 연탄 및 석유정제품 제조업</td></tr>
                <tr><td>20</td> <td style='text-align: justify'>화학물질 및 화학제품 제조업; 의약품제외</td></tr>
                <tr><td>21</td> <td style='text-align: justify'>의료용 물질 및 의약품 제조업</td></tr>
                <tr><td>22</td> <td style='text-align: justify'>고무 및 플라스틱제품 제조업</td></tr>
                <tr><td>23</td> <td style='text-align: justify'>비금속 광물제품 제조업</td></tr>
                <tr><td>24</td> <td style='text-align: justify'>1차 금속 제조업</td></tr>
                <tr><td>25</td> <td style='text-align: justify'>금속 가공제품 제조업; 기계 및 가구 제외</td></tr>
                <tr><td>26</td> <td style='text-align: justify'>전자부품, 컴퓨터, 영상, 음향 및 통신장비 제조업</td></tr>
                <tr><td>27</td> <td style='text-align: justify'>의료, 정밀, 광학기기 및 시계 제조업</td></tr>
                <tr><td>28</td> <td style='text-align: justify'>전기장비 제조업</td></tr>
                <tr><td>29</td> <td style='text-align: justify'>기타 기계 및 장비 제조업</td></tr>
                <tr><td>30</td> <td style='text-align: justify'>자동차 및 트레일러 제조업</td></tr>
                <tr><td>31</td> <td style='text-align: justify'>기타 운송장비 제조업</td></tr>
                <tr><td>32</td> <td style='text-align: justify'>가구 제조업</td></tr>
                <tr><td>33</td> <td style='text-align: justify'>기타 제품 제조업</td></tr>
                <tr><td>34</td> <td style='text-align: justify'>산업용 기계 및 장비 수리업</td></tr>
                <tr>    <td style='text-align: justify'>D. 전기, 가스, 증기 및 공기 조절 공급업(35)</td>  <td>35</td> <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>E. 수도, 하수 및 폐기물 처리, 원료 재생업(36~39)</td>  <td>36~39</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>F. 건설업(41~42)</td>  <td>41~42</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>G. 도매 및 소매업(45~47)</td> <td>45~47</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>H. 운수 및 창고업(49~52)</td> <td>49~52</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>I. 숙박 및 음식점업(55~56)</td>    <td>55~56</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>J. 정보통신업(58~63)</td>    <td>58~63</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>K. 금융 및 보험업(64~66)</td> <td>64~66</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>L. 부동산업(68)</td>    <td>68</td> <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>M. 전문, 과학 및 기술 서비스업(70~73)</td> <td>70~73</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>N. 사업시설 관리, 사업 지원 및 임대 서비스업(74~76)</td> <td>74~76</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>O. 공공 행정, 국방 및 사회보장 행정(84)</td> <td>84</td> <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>P. 교육 서비스업(85)</td> <td>85</td> <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>Q. 보건업 및 사회복지 서비스업(86~87)</td>  <td>86~87</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>R. 예술, 스포츠 및 여가관련 서비스업(90~91)</td>  <td>90~91</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>S. 협회 및 단체, 수리 및 기타 개인 서비스업(94~96)</td> <td>94~96</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>T. 가구 내 고용활동 및 달리 분류되지 않은 자가 소비 생산활동(97~98)</td>    <td>97~98</td>  <td style='text-align: justify'></td>   </tr>
                <tr>    <td style='text-align: justify'>U. 국제 및 외국기관(99)</td>   <td>99</td> <td style='text-align: justify'></td>   </tr>

                </tbody>
            </table>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<!-- Footer -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';

?>
<script>
    function search() {
        var k = $("#q_searchVal").val();
        $("#comp_div_table > tbody > tr").hide();
        var temp = $("#comp_div_table > tbody > tr > td:nth-child(4n+2):contains('" + k + "')");

        $(temp).parent().show();
    }
    $("#q_searchVal").keyup(function() {
        var k = $(this).val();
        $("#comp_div_table > tbody > tr").hide();
        var temp = $("#comp_div_table > tbody > tr > td:nth-child(4n+2):contains('" + k + "')");

        $(temp).parent().show();               
    })
    function openModal() {
        $("#modal-add-receiver").modal('show');
    }
</script>
</body>
</html>