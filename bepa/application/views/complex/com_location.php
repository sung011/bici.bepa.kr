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
                    <!-- 20210426 전은신 산업단지 개요 추기 start-->
                    <div class="photo_frame">
                        <p>
                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION"
                                 src="<?=base_url('assets/images/img_top01_all.jpg')?>">
                        </p>
                        <p class="list_first d-inline-block mb-0">
                            <a href="/assets/files/01_부산 산업단지 현황도(전체).pdf" target="_blank">부산 산업단지 현황도(전체)</a>    
                        </p>
                        <p class="list_first d-inline-block mb-0">
                            <a href="/assets/files/02_동부산권 산업단지 현황도.pdf" target="_blank">동부산권 산업단지 현황도</a>
                        </p>
                        <p class="list_first d-inline-block mb-0">
                            <a href="/assets/files/03_서부산권 산업단지 현황도.pdf" target="_blank">서부산권 산업단지 현황도</a>
                        </p>
                    </div>
                    <div class="sub_docu">
                        <h2 class="sub_tit">산업단지 개발개요</h2>
                        <p class="txt_last">
                            ‘산업단지’라 함은 공장·지식산업관련시설·문화산업관련시설·정보통신산업관련시설·재활용산업관련시설·자원비축시설·물류시설·굥육연구시설 등과
                            이와 관련된 교육·연구·업무·지원·정보처리·유통 시설 및 이들 시설의 기능향상을 위하여 주거·문화·환경·공원녹지·의료·관광·체육·복지시설
                            등을 집단적으로 설치하기 위하여 포괄적 계획에 따라 지정·개발되는 일단의 토지로서 국가산업단지, 일반산업단지, 도시첨단산업단지 농공단지로 구분됨
                        </p>
                        <h2 class="sub_tit">산업단지 관리체계</h2>
                        <table class="Base">
                            <caption>산업단지 관리체계</caption>
                            <colgroup>
                                <col width="15%">
                                <col>
                                <col>
                                <col width="12%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">내용</th>
                                <th scope="col">지정권자</th>
                                <th scope="col">규모제한</th>
                                <th scope="col">관리기관</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">국가산업단지</th>
                                <td>국가기간산업·과학기술산업 육성,낙후지역 개발</td>
                                <td>국토교통부장관</td>
                                <td>&nbsp;</td>
                                <td>산업통상자원부장관</td>
                            </tr>
                            <tr>
                                <th scope="row">일반산업단지</th>
                                <td>산업의 적정분산, 지역경제 활성화</td>
                                <td>시·도지사(인구 50만명 이상 시의 시장)</td>
                                <td>3만㎡ 이상</td>
                                <td>시·도지사</td>
                            </tr>
                            <tr>
                                <th scope="row">도시첨단산업단지</th>
                                <td>지식, 문화, 정보통신 등 첨단산업 육성·개발 촉진</td>
                                <td>국토교통부장관, 시·도지사</td>
                                <td>1만㎡ 이상</td>
                                <td>시·도지사</td>
                            </tr>
                            <tr>
                                <th scope="row">농공단지</th>
                                <td>농어민 소득증대를 위한 산업 유치 육성</td>
                                <td>특별자치도지사,시장·군수·구청장<br>(시·도지사 승인)</td>
                                <td>3만㎡ 이상 <br/> 33만㎡ 이하</td>
                                <td>시장·군수·구청장</td>
                            </tr>
                            </tbody>
                        </table>

                        <h2 class="sub_tit">부산광역시 산업입지 공급방향</h2>
                        <ul class="list_one">
                            <li>▹ 서부산권은 기계부품산업, 동부산권은 IT산업 및 지식기반서비스산업, 중부산권은 도시형 서비스 산업입지 고도화</li>
                            <li>▹ 신평장림산단, 사상·금사 공업지역의 산업단지 재정비 및 구조고도화</li>
                            <li>▹ 바이오메디컬산업은 지사외국인, 강서보고, 지사2, 오리, 지사글로벌 등에 유치</li>
                            <li>▹ 지능형기계부품은 로봇기반 육성지원사업과 연계하여 모라도시첨단, 미음 등에 집적</li>
                            <li>▹ 지능정보서비스는 해운대를 중심으로 도심권 산단(사상, 신평장림)의 스마트화 등 IoT기반 스마트시티 플랫폼 육성</li>
                            <li>▹ 클린에너지산업은 녹산산단을 중심으로 에코델타시티, 지사글로벌 등에 집적</li>
                        </ul>
                        <h2 class="sub_tit">부산광역시 산업단지 현황</h2>
                        <h5 class="mt_1">❍ 조성완료</h5>
                        <p class="dataSource">27개 단지 3,517만㎡(서부산권 2,759만㎡, 동부산권 758만㎡)</p>
                        <table class="Base">
                            <caption>조성완료</caption>
                            <colgroup>
                                <col width="16%">
                                <col width="12%">
                                <col width="12%">
                                <col>
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">개소</th>
                                <th scope="col">면적</th>
                                <th scope="col">산업단지명</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk2">
                                <th scope="row">계</th>
                                <td>27개</td>
                                <td>3,517만㎡</td>
                                <td>국가 1개소, 일반 23개소, 도시첨단 2개소, 농공 1개소</td>
                            </tr>
                            <tr>
                                <th scope="row">서부산권<br/>(강서,사하,사상,북구)</th>
                                <td>14개</td>
                                <td>2,759만㎡</td>
                                <td>(국가) 명지녹산
                                    (일반) 신평장림, 신호, 과학, 화전, 강서보고, 생곡, 성우, 풍상, 미음, 지사2, <br>국제산업물류도시(1단계), 정주
                                    (도시첨단) 모라
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">동부산권<br/>(기장,해운대,금정구)</th>
                                <td>13개</td>
                                <td>758만㎡</td>
                                <td>(일반) 센텀시티, 기룡1, 기룡2, 정관, 장안, 정관코리, 명례, 부산신소재, 반룡, 오리, <br>에코장안
                                    (도시첨단) 회동석대
                                    (농공) 정관농공
                                </td>
                            </tr>
                            </tbody>
                        </table>

                        <h5 class="mt_1">❍ 조성중</h5>
                        <p class="dataSource">(9개 단지 663만㎡(공영개발 516만㎡, 민간개발 147만㎡)</p>
                        <table class="Base">
                            <caption>조성중</caption>
                            <colgroup>
                                <col width="16%">
                                <col>
                                <col width="12%">
                                <col width="12%">
                                <col width="12%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">구분</th>
                                <th scope="col">산업단지명</th>
                                <th scope="col">사업기간</th>
                                <th scope="col">면적(만㎡)</th>
                                <th scope="col">착공(예정)일</th>
                                <th scope="col">비고</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk3">
                                <th rowspan="3" scope="row">공영개발(3개)</th>
                                <td>동남권 방사선 의과학</td>
                                <td>’12～’21</td>
                                <td>148</td>
                                <td>’14. 4</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>에코델타시티 도시첨단</td>
                                <td>’15～’23</td>
                                <td>66</td>
                                <td>’15. 3</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>사상재생사업지구</td>
                                <td>’15～’30</td>
                                <td>302</td>
                                <td>-</td>
                                <td>재생시행계획 수립</td>
                            </tr>
                            <tr class="chk3">
                                <th rowspan="6" scope="row">민간개발(6개)</th>
                                <td>산양</td>
                                <td>’09～’22</td>
                                <td>5</td>
                                <td>’15.4</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>명동</td>
                                <td>’09～’22</td>
                                <td>51</td>
                                <td>’14.7</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>기장대우</td>
                                <td>’10～’22</td>
                                <td>34</td>
                                <td>’19.7</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>지사글로벌</td>
                                <td>’17～’22</td>
                                <td>42</td>
                                <td>’20.2</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>

                                <td>강서해성</td>
                                <td>’17～’23</td>
                                <td>10</td>
                                <td>’21.10</td>
                                <td>보상 협의 중</td>
                            </tr>
                            <tr>

                                <td>금곡 도시첨단</td>
                                <td>’20～’22</td>
                                <td>5</td>
                                <td>’21. 4</td>
                                <td>보상 추진 중</td>
                            </tr>
                            </tbody>
                        </table>

                        <h2 class="sub_tit">지역별 산업단지 현황</h2>
                        <h5 class="mt_1">❍ 서부산권(강서구, 사하구, 사상구, 북구)</h5>
                        <p class="dataSource">&nbsp;</p>
                        <table class="Base">
                            <caption>서부산권(강서구, 사하구, 사상구, 북구)</caption>
                            <colgroup>
                                <col width="8%">
                                <col width="8%">
                                <col>
                                <col width="20%">
                                <col width="12%">
                                <col width="12%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">추진현황</th>
                                <th scope="col">구분</th>
                                <th scope="col">산업단지명</th>
                                <th scope="col">위치</th>
                                <th scope="col">사업기간</th>
                                <th scope="col">면적(㎡)</th>
                                <th scope="col">산업단지 관리기관(문의처)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk3">
                                <th rowspan="14" scope="row">조성완료</th>
                                <td>일반</td>
                                <td>신호(경제자유구역)</td>
                                <td>강서구 신호동</td>
                                <td>1993 ~ 2002</td>
                                <td>3,121,132.0</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>부산과학(경제자유구역)</td>
                                <td>강서구 지사동</td>
                                <td>1991 ~ 2007</td>
                                <td>1,962,373.7</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>화전(경제자유구역)</td>
                                <td>강서구 화전동</td>
                                <td>2003 ~ 2011</td>
                                <td>2,447,767.1</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>강서보고</td>
                                <td>강서구 지사동</td>
                                <td>2010 ~ 2014</td>
                                <td>103,700.5</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>성우</td>
                                <td>강서구 지사동</td>
                                <td>2009 ~ 2016</td>
                                <td>63,452.7</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>풍상</td>
                                <td>강서구 지사동</td>
                                <td>2011 ~ 2017</td>
                                <td>61,759.0</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>지사2</td>
                                <td>강서구 지사동</td>
                                <td>2012 ~ 2017</td>
                                <td>98,660.0</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>정주</td>
                                <td>강서구 지사동</td>
                                <td>2014 ~ 2020</td>
                                <td>96,578.0</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>모라</td>
                                <td>사상구 모라동</td>
                                <td>2012 ~ 2015</td>
                                <td>11,080.7</td>
                                <td>부산경제진흥원 서부사무소<br>(051-600-1832)</td>
                            </tr>
                            <tr>
                                <td>국가</td>
                                <td>명지녹산</td>
                                <td>강서구 명지동, 송정동</td>
                                <td>1989 ~ 2002</td>
                                <td>6,998,000.0</td>
                                <td>한국산업단지공단<br>(070-8895-7847)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>신평장림</td>
                                <td>사하구 신평동, 장림동</td>
                                <td>1986 ~ 1990</td>
                                <td>1,929,758.8</td>
                                <td>한국산업단지공단<br>(070-8895-7861),<br>신평장림관리공단<br>(051-205-0212)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>생곡(경제자유구역)</td>
                                <td>강서구 생곡동</td>
                                <td>2009 ~ 2015</td>
                                <td>557,070.5</td>
                                <td>부산진해경제자유구역청<br>(051-979-5324)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>미음(경제자유구역)</td>
                                <td>강서구 구랑동, 미음동</td>
                                <td>2007 ~ 2010</td>
                                <td>3,548,873.0</td>
                                <td>부산진해경제자유구역청<br>(051-979-5324)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>국제산업물류도시(1단계)<br>(경제자유구역)
                                </td>
                                <td>강서구 미음동, 송정동</td>
                                <td>2010 ~ 2019</td>
                                <td>5,707,590.6</td>
                                <td>부산진해경제자유구역청<br>(051-979-5324)</td>
                            </tr>
                            <tr class="chk3">
                                <th rowspan="7" scope="row">조성중</th>
                                <td>일반</td>
                                <td>사상재생사업지구</td>
                                <td>사상구 주례, 감전, 학장동</td>
                                <td>2015 ~ 2030</td>
                                <td>3,021,000</td>
                                <td>부산시 지역균형개발과<br>(051-888-2775)</td>
                            </tr>
                            <tr>
                                <td>도시첨단</td>
                                <td>에코델타시티</td>
                                <td>강서구 명지동</td>
                                <td>2015 ~ 2023</td>
                                <td>659,037</td>
                                <td>부산시 지역균형개발과<br>(051-888-2852)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>산양</td>
                                <td>사하구 다대동</td>
                                <td>2009 ~ 2022</td>
                                <td>54,440.0</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>지사글로벌</td>
                                <td>강서구 지사동</td>
                                <td>2017 ~ 2022</td>
                                <td>417,133</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>강서해성</td>
                                <td>강서구 지사동</td>
                                <td>2017 ~ 2023</td>
                                <td>104,290</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            <tr>
                                <td>도시첨단</td>
                                <td>금곡</td>
                                <td>북구 금곡동</td>
                                <td>2020 ~ 2022</td>
                                <td>46,264</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>명동(경제자유구역)</td>
                                <td>강서구 지사동</td>
                                <td>2009 ~ 2022</td>
                                <td>506,238.0</td>
                                <td>부산진해경제자유구역청<br>(051-979-5324)</td>
                            </tr>
                            </tbody>
                        </table>

                        <h5 class="mt_1">❍ 동부산권(기장군, 해운대구, 금정구)</h5>
                        <p class="dataSource">&nbsp;</p>
                        <table class="Base">
                            <caption>동부산권(기장군, 해운대구, 금정구)</caption>
                            <colgroup>
                                <col width="8%">
                                <col width="8%">
                                <col>
                                <col width="20%">
                                <col width="12%">
                                <col width="12%">
                                <col width="20%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">추진현황</th>
                                <th scope="col">구분</th>
                                <th scope="col">산업단지명</th>
                                <th scope="col">위치</th>
                                <th scope="col">사업기간</th>
                                <th scope="col">면적(㎡)</th>
                                <th scope="col">산업단지 관리기관(문의처)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk3">
                                <th rowspan="13" scope="row">조성완료</th>
                                <td>일반</td>
                                <td>센텀시티</td>
                                <td>해운대구 우동, 재송동</td>
                                <td>1997 ~ 2007</td>
                                <td>1,178,043</td>
                                <td>부산경제진흥원 동부사무소<br>(051-742-8701)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>기룡1</td>
                                <td>기장군 장안읍</td>
                                <td>2005 ~ 2008</td>
                                <td>83,411</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>기룡2</td>
                                <td>기장군 장안읍</td>
                                <td>2007 ~ 2011</td>
                                <td>46,308</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>정관</td>
                                <td>기장군 장안읍</td>
                                <td>2001 ~ 2010</td>
                                <td>1,209,272</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>장안</td>
                                <td>기장군 장안읍</td>
                                <td>2005 ~ 2011</td>
                                <td>1,300,922</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>정관코리</td>
                                <td>기장군 정관읍</td>
                                <td>2010 ~ 2013</td>
                                <td>83,981</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>부산신소재</td>
                                <td>기장군 장안읍</td>
                                <td>2013 ~ 2017</td>
                                <td>255,229</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>반룡</td>
                                <td>기장군 장안읍</td>
                                <td>2013 ~ 2018</td>
                                <td>546,599</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>오리</td>
                                <td>기장군 장안읍</td>
                                <td>2013 ~ 2020</td>
                                <td>607,852</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>에코장안</td>
                                <td>기장군 장안읍</td>
                                <td>2014 ~ 2019</td>
                                <td>200,811</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>도시첨단</td>
                                <td>회동석대</td>
                                <td>해운대구 석대동,<br/>
                                    금정구 회동동
                                </td>
                                <td>2008 ~ 2013</td>
                                <td>228,603</td>
                                <td>부산경제진흥원 동부사무소<br>(051-742-8701)</td>
                            </tr>
                            <tr>
                                <td>농공</td>
                                <td>정관농공</td>
                                <td>기장군 정관읍</td>
                                <td>1987 ~ 1988</td>
                                <td>258,083</td>
                                <td>부산경제진흥원 동부사무소<br>(051-728-8047)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>명례</td>
                                <td>기장군 장안읍</td>
                                <td>2008 ~ 2014</td>
                                <td>1,566,006</td>
                                <td>명례산업단지관리공단<br>(051-915-7772)</td>
                            </tr>
                            <tr class="chk3">
                                <th rowspan="2" scope="row">조성중</th>
                                <td>일반</td>
                                <td>동남권방사선의과학</td>
                                <td>기장군 장안읍</td>
                                <td>2012 ~ 2021</td>
                                <td>1,478,772</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            <tr>
                                <td>일반</td>
                                <td>기장대우</td>
                                <td>기장군 장안읍</td>
                                <td>2010 ~ 2022</td>
                                <td>343,720</td>
                                <td>부산시 산업입지과<br>(051-888-4915)</td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- 20210426 전은신 산업단지 개요 추기 end-->

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
<script>
</script>
</body>
</html>