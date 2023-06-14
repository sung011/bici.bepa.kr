<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<link rel="stylesheet" href="<?=base_url('assets/css/complex.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/movein.css')?>">
<style>
    .v_file_cont {
        max-width: 950px;
        margin: 40px auto;
        border: 1px solid #d6d6d6;
        padding: 45px 0;
        text-align: center;
        border-radius: 3px !important;
    }

    .v_file_cont img {
        display: block;
        margin: auto;
        margin-bottom: 20px;
    }

    img {
        vertical-align: middle;
    }

    .hidd {
        display: none;
    }

    .sub_section {
        text-align: end;
    }

    .down_btn {
        float: none;
        padding: 10px;
        display: inline-block;
    }
</style>
<!-- Features -->
<div class="features" style="">
    <div class="container" style="">
        <div class="row features_row sub_feat_row" style="">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <!-- left menu -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>

            </div>
            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;">
                <div class="notice_table notice_title">
                    <h2>산업단지 현황</h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li><a href="index.html">부산 산업 단지 정보</a></li>
                                            <li>산업단지 현황</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="sub_tit">일반산업단지</h2>
                </div>
                <div class="tab_wrap border_none pb_0">
                    <div class="tab_menu_top">
                        <ul>
                            <li><a class="active" id="complate" onclick="openPaging('complate');">조성완료</a></li>
                            <li><a id="proceeding" onclick="openPaging('proceeding');">조성중</a></li>
                        </ul>
                    </div>
                </div>  
                <div id="complate_con">
                     <div class="tab_wrap">          
                        <div class="tab_menu">
                            <!-- <div class="notice_table">
                                <h2 class="sub_tit" style="margin: 0px !important">일반산업단지: 서부산권</h2>
                            </div> -->
                            <ul>
                                <li><a class="active" id="tab_1" onclick="openPaging('tab_1');">신평장림일반산업단지(기존단지)</a></li>
                                <li><a id="tab_2" onclick="openPaging('tab_2');">신평장림일반산업단지(협업화단지)</a></li>
                                <li><a id="tab_3" onclick="openPaging('tab_3');">신호일반산업단지</a></li>
                                <li><a id="tab_4" onclick="openPaging('tab_4');">부산과학일반산업단지</a></li>
                                <li><a id="tab_5" onclick="openPaging('tab_5');">화전일반산업단지</a></li>
                                <li><a id="tab_6" onclick="openPaging('tab_6');">강서보고일반산업단지</a></li>
                                <li><a id="tab_7" onclick="openPaging('tab_7');">생곡일반산업단지</a></li>
                                <li><a id="tab_8" onclick="openPaging('tab_8');">성우일반산업단지</a></li>
                                <li><a id="tab_9" onclick="openPaging('tab_9');">풍상일반산업단지</a></li>
                                <li><a id="tab_10" onclick="openPaging('tab_10');">미음일반산업단지</a></li>
                                <li><a id="tab_11" onclick="openPaging('tab_11');">지사2일반산업단지</a></li>
                                <li><a id="tab_12" onclick="openPaging('tab_12');">부산신항배후 국제산업물류도시(1단계)</a></li>
                                <li><a id="tab_13" onclick="openPaging('tab_13');">정주일반산업단지</a></li>
                            
                                <li><a id="tab_19" onclick="openPaging('tab_19');">센텀시티일반산업단지</a></li>
                                <li><a id="tab_20" onclick="openPaging('tab_20');">기룡1일반산업단지</a></li>
                                <li><a id="tab_21" onclick="openPaging('tab_21');">정관일반산업단지</a></li>
                                <li><a id="tab_22" onclick="openPaging('tab_22');">장안일반산업단지</a></li>
                                <li><a id="tab_23" onclick="openPaging('tab_23');">기룡2일반산업단지</a></li>
                                <li><a id="tab_24" onclick="openPaging('tab_24');">정관코리일반산업단지</a></li>
                                <li><a id="tab_25" onclick="openPaging('tab_25');">명례일반산업단지</a></li>
                                <li><a id="tab_26" onclick="openPaging('tab_26');">부산신소재일반산업단지</a></li>
                                <li><a id="tab_27" onclick="openPaging('tab_27');">반룡일반산업단지</a></li>
                                <li><a id="tab_28" onclick="openPaging('tab_28');">오리일반산업단지</a></li>
                                <li><a id="tab_29" onclick="openPaging('tab_29');">에코장안일반산업단지</a></li>
                            </ul>
                            <!-- <div class="notice_table">
                                <h2 class="sub_tit" style="margin: 0px !important">일반산업단지: 동부산권</h2>
                            </div> -->            
                            <!-- <ul>
                                <li><a id="tab_19" onclick="openPaging('tab_19');">센텀시티일반산업단지</a></li>
                                <li><a id="tab_20" onclick="openPaging('tab_20');">기룡1일반산업단지</a></li>
                                <li><a id="tab_21" onclick="openPaging('tab_21');">정관일반산업단지</a></li>
                                <li><a id="tab_22" onclick="openPaging('tab_22');">장안일반산업단지</a></li>
                                <li><a id="tab_23" onclick="openPaging('tab_23');">기룡2일반산업단지</a></li>
                                <li><a id="tab_24" onclick="openPaging('tab_24');">정관코리일반산업단지</a></li>
                                <li><a id="tab_25" onclick="openPaging('tab_25');">명례일반산업단지</a></li>
                                <li><a id="tab_26" onclick="openPaging('tab_26');">부산신소재일반산업단지</a></li>
                                <li><a id="tab_27" onclick="openPaging('tab_27');">반룡일반산업단지</a></li>
                                <li><a id="tab_28" onclick="openPaging('tab_28');">오리일반산업단지</a></li>
                                <li><a id="tab_29" onclick="openPaging('tab_29');">에코장안일반산업단지</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="basic-body-wrap">
                        <!-- tab01-->
                        <div id="tab01">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(기존단지)</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226030" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/신평장림(기존).jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_신평장림(기존)_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_신평장림(기존)_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구 신평동, 장림동 일원</li>
                                            <li>조성목적(특징) : 도심지내 비공업지역 공장을 이전 및 변두리지역 개발 촉진</li>
                                            <li>면적 : 885,247㎡(산업시설 604,331㎡, 지원시설 67,766㎡, 공공시설 213,150㎡)</li>
                                            <li>사업기간 : 1980. ~ 1984.</li>
                                            <li>사업시행자 : 한국토지주택공사</li>
                                            <li>관리기관 : 신평장림산업단지관리공단 ☏ 051-205-0212</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>1980.09.22. : 산업단지 지정</li>
                                            <li>1984.06.27. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>한국표준산업 분류표상 전 제조업</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                관리기관이 공해, 용수, 기타의 사정으로 산업단지 입주 부적격업종에 대하여는 입주를 제한할 수 있음(염색, 피혁, 도금업종 등 용수 다소비업종 입주 불가)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--tab_02-->
                        <div id="tab02" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(협업화단지)</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226030" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/신평장림(협업).jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_신평장림(협업)_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_신평장림(협업)_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>                                    
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">      
                                            <li>위치 : 부산광역시 사하구 신평동, 장림동, 다대동 일원</li>
                                            <li>조성목적(특징) : 도심지 내 공해업체 이전 및 집단화, 공동 공해방지시설 운영으로 공해저감</li>
                                            <li>면적 : 1,929,759㎡(산업시설 1,143,117㎡, 지원시설 102,486㎡, 공공시설 684,156㎡)</li>
                                            <li>사업기간 : 1988. ~ 1990.</li>
                                            <li>사업시행자 : 한국수자원공사</li>
                                            <li>관리기관 : 한국산업단지공단 사하사무소 ☏ 070-8895-7861</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>1988.12.31. : 산업단지 지정</li>
                                            <li>1990.06.30. : 산업단지 준공</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_용도별 배치계획도(신평장림_협업).png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_업종별 배치계획도(신평장림_협업).png">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab03-->
                        <div id="tab03" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신호일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226020" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>    
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/신호일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_신호_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_신호_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>    
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 신호동 일원</li>
                                            <li>조성목적(특징) : 도시공간구조 정비 및 개편으로 도시기능 활성화 유도, 부산지역 산업기반 강화</li>
                                            <li>면적 : 3,121,132㎡(산업시설 1,712,673㎡, 지원시설 145,272㎡, 주거시설 447,575㎡, 공공시설 815,612㎡)</li>
                                            <li>사업기간 : 1993. ~ 2007.</li>
                                            <li>사업비 : 7,040억원</li>
                                            <li>사업시행자 : 부산광역시(건설본부)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>1993.12.31. : 지방공단 지정승인(건설부)</li>
                                            <li>1994.01.27. : 지방공단 지정(부산시)</li>
                                            <li>1995.07.12. : 1공구(자동차부지) 착공</li>
                                            <li>2000.03.11. : 1단계(1공구, 4공구) 준공</li>
                                            <li>2002.07.29. : 3단계 공사 착공</li>
                                            <li>2002.12.12. : 2단계(2공구, 하수처리장) 준공</li>
                                            <li>2007.01.26. : 전체 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>24, 25, 28, 29, 30</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab04-->
                        <div id="tab04" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산과학일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226011" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/부산과학일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_부산과학_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> --> 
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_부산과학_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원(경제자유구역)</li>
                                            <li> 조성목적(특징) : 산업구조의 고도화(첨단화)와 기술집약적 산업의 자립체제 구축</li>
                                            <li>면적 : 1,967,010㎡(산업시설 1,030,154㎡, 지원시설 63,055㎡, 공공시설 618,064㎡, 기타(주택건설, 상업업무, 유보지 등) 255,737㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 외국인투자지역(298,142㎡) 포함</li>
                                            <li>사업기간 : 1991. ~ 2008.</li>
                                            <li>사업비 : 2,350억원</li>
                                            <li>사업시행자 : 한국토지주택공사(1단계), 부산광역시(2단계, 과학기술구역)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832 / 외국인투자지역 : 부산진해경제자유구역청 ☏ 051-979-5322</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>1991.12. : 지방공단 지정(건설부, 6,612천㎡)</li>
                                            <li>2002.11. : 실시계획 변경승인(부산시, 2,008천㎡)</li>
                                            <li>2006.06. : 1-1단계 준공</li>
                                            <li>2007.07. : 2단계 준공</li>
                                            <li>2008.11. : 1-2단계 준공</li>          
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 29, 30, 31</li>
                                            <li>신소재 : 24, 25, 28, 27</li>
                                            <li>정밀화학 : 19, 20, 22</li>
                                            <li>정보통신 : 26, 28</li>
                                            <li>기타 일반제조업 : 10, 13, 14, 15, 16, 17, 18, 22, 23, 24, 31, 33</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab05-->
                        <div id="tab05" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">화전일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226090" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/화전일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_화전_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_화전_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 화전동 일원(경제자유구역)</li>
                                            <li>조성목적(특징) : 신호일반산업단지와 연계한 기계 및 부품, 첨단생산시설 유치, 단지 일부에 외국인 전용단지 조성</li>
                                            <li>면적 : 2,447,767㎡(산업시설 1,423,990㎡, 지원시설 219,863㎡, 공공시설 803,914㎡)</li>
                                            <li>사업기간 : 2003. ~ 2011.</li>
                                            <li>사업비 : 7,645억원</li>
                                            <li>사업시행자 : 부산도시공사</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2003.10.30. : 경제자유구역 지정(재정경제부)</li>
                                            <li>2005.12.30. : 개발계획 변경 및 실시계획 승인(재정경제부)</li>
                                            <li>2006.08.14. : 조성공사 착공</li>
                                            <li>2011.01.05. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">         
                                            <li>메카트로닉스 : 24, 25, 29, 28</li>
                                            <li>일렉트로닉스 : 26</li>
                                            <li>자동차 및 운송장비 : 30, 31</li>
                                            <li>물류 : 52</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;고무 및 플라스틱 제조업<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab06-->
                        <div id="tab06" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">강서보고일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226180" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/강서보고일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_강서보고_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_강서보고_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p> 
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원</li>
                                            <li>조성목적(특징) : 산업시설용지 적기 공급 및 지역기업 역외 이전 방지</li>
                                            <li>면적 : 103,701㎡(산업시설 50,434㎡, 지원시설 6,348㎡, 공공시설 46,919㎡)</li>
                                            <li>사업기간 : 2010. ~ 2014.</li>
                                            <li>사업비 : 255억원</li>
                                            <li>사업시행자 : ㈜보고지사테크</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2010.05.04. : 산업단지계획 승인</li>
                                            <li>2012.04.04. : 조성공사 착공</li>
                                            <li>2014.12.26. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 13, 21, 24, 25, 26, 28, 29, 31, 32</li>
                                            <li>
                                                운수업 : 52<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터없음 (추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- tab07-->
                        <div id="tab07" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">생곡일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226160" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/생곡일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 생곡동 일원(부산진해경제자유구역)</li>
                                            <li>조성목적(특징) : 산업용지 적기공급 및 계획적 개발을 통한 균형적 도시발전 도모</li>
                                            <li>면적 : 557,071㎡(산업시설 333,174㎡, 지원시설 57,081㎡, 공공시설 166,816㎡)</li>
                                            <li>사업기간 : 2009. ~ 2015.</li>
                                            <li>사업비 : 2,550억원</li>
                                            <li>사업시행자 : 부산도시공사(공영개발)</li>
                                            <li>관리기관 : 부산진해경제자유구역청 ☏ 051-979-5324</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2009.07.31. : 산업단지개발계획 승인 고시(지식경제부)</li>
                                            <li>2010.09.15. : 조성공사 착공</li>
                                            <li>2015.10.28. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>자원순환특화 관련 산업<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                - 금속 관련 원료재생업 및 제조업 : 24, 25, 29, 3831<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                - 비금속 관련 원료재생업 및 제조업 : 13, 16, 17, 20, 22, 23, 3832</li>
                                            <li>메카트로닉스 관련 산업 : 25, 29, 31</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                2431, 2432, 25922, 25923<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_생곡_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_생곡_업종별 배치.PNG">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab08-->
                        <div id="tab08" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">성우일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226130" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/성우일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_성우_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> --> 
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_성우_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p> 
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원</li>
                                            <li>조성목적(특징) : 산업용지의 원활한 공급으로 지역발전 및 지속적인 산업발전 도모</li>
                                            <li>면적 : 63,453㎡(산업시설 32,965㎡, 지원시설 359㎡, 공공시설 30,129㎡)</li>
                                            <li>사업기간 : 2009. ~ 2016.</li>
                                            <li>사업비 : 217억원</li>
                                            <li>사업시행자 : 성우공영개발(민간개발)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2009.06.24.. : 산업단지계획 승인 고시(거화일반산업단지)</li>
                                            <li>2010.02.04. : 조성공사 착공</li>
                                            <li>2015.11.04. : 산업단지계획 변경(산업단지 명칭변경 : 성우일반산업단지)</li>
                                            <li>2016.12.14. : 산업단지 준공</li>
                                            <li>2017.07.13. : 경제자유구역 지정해제</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 13, 16, 17, 19, 20, 22, 24, 25, 26, 27, 28, 29, 30, 31, 33</li>
                                            <li>운수업 : 52(제조업체가 부가적으로 필요한 경우에만 허용)</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                13401, 13402, 13403, 13404, 13409, 16212, 17902, 19221, 20129, 20131, 20132, 20411, 20412, 20422, 25200, 25922<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_성우_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_성우_업종별 배치.PNG">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab09-->
                        <div id="tab09" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">풍상일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226200" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/풍상일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부2_풍상_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부2_풍상_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>  
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원</li>
                                            <li>조성목적(특징) : 산업용지의 적기 공급 및 지역기업의 역외 이전 방지</li>
                                            <li>면적 : 61,284㎡(산업시설 51,995㎡, 공공시설 9,289㎡)</li>
                                            <li>사업기간 : 2011. ~ 2016.</li>
                                            <li>사업비 : 218억원</li>
                                            <li>사업시행자 : ㈜나라코퍼레이션(민간개발)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2011.03.09.. : 산업단지계획 승인 고시</li>
                                            <li>2013.05.06. : 조성공사 착공</li>
                                            <li>2016.12.28. : 산업단지 준공</li>
                                            <li>2017.07.13. : 경제자유구역 지정해제</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">유치업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                23, 25, 29<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터 없음 추후기재</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_풍상_용도별 구역.jpg">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab10-->
                        <div id="tab10" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">미음일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226100" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/미음일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 녹산동(구랑, 미음) 일원(부산진해경제자유구역)</li>
                                            <li>조성목적(특징) : 부산지역 부족한 산업용지 확보 및 지역경제 활성화 도모</li>
                                            <li>면적 : 3,548,873㎡(산업시설 1,927,040㎡, 지원시설 55,572㎡, 공공시설 1,566,261㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                - 외국인투자지역 299,584㎡, 연구개발특구 706,103㎡ 포함<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 외국인투자기업 장기임대단지 64,426㎡</li>
                                            <li>사업기간 : 2007. ~ 2017.</li>
                                            <li>사업비 : 10,687억원</li>
                                            <li>사업시행자 : 부산도시공사(공영개발)</li>
                                            <li>관리기관 : 부산진해경제자유구역청 ☏ 051-979-5325 / 연구개발특구진흥재단 ☏ 293-4852</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2007.05.30. : 미음지구 개발계획 변경 고시</li>
                                            <li>2008.12.31. : 조성공사 착공</li>
                                            <li>2014.07.02. : 산업단지 준공(1단계)</li>
                                            <li>2017.01.04. : 산업단지 준공(2단계)</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 24, 25, 28, 29, 30, 31</li>
                                            <li>일렉트로닉스 : 26, 27, 28</li>
                                            <li>정보서비스 : 62, 63</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 2431, 2432, 2520, 25922, 25923, 3012, 3191, 3192</li>
                                            <li>
                                                일렉트로닉스 : 도금업 관련 시설, 대기 및 수질 1,2종 사업장<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_미음_용도별 구역.gif">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_미음_업종별 배치.PNG">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab11-->
                        <div id="tab11" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">지사2일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226220" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/지사2일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_지사2_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_지사2_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>   
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 1408번지 일원</li>
                                            <li>조성목적(특징) : 산업단지의 직접개발로 현 공장의 부족한 산업시설용지 확보</li>
                                            <li>면적 : 99,012㎡(산업시설 48,530㎡, 지원시설 746㎡, 공공시설 49,736㎡)</li>
                                            <li>사업기간 : 2012. ~ 2017.</li>
                                            <li>사업비 : 276억원</li>
                                            <li>사업시행자 : 진우일반산업단지(주)(실수요자 개발)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2012.02.29. : 산업단지계획 승인 고시(진우일반산업단지)</li>
                                            <li>2014.03.19. : 조성공사 착공</li>
                                            <li>2014.06.05. : 산업단지계획 변경(산업단지 명칭 변경 : 지사2일반산업단지)</li>
                                            <li>2017.07.17. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li> 13, 16, 2011, 2049, 25, 29, 5210, 35119</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                13401, 13402, 13403, 13404, 13409, 16212, 20111, 20494<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_지사2_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_지사2_업종별 배치.PNG">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab12-->
                        <div id="tab12" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산신항배후 국제산업물류도시(1단계)</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226150" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/국제산업물류도시(1단계).jpg')?>">
                                    </p>
                                </div>                                   
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 미음동, 녹산동, 송정동 일원(부산진해경제자유구역)</li>
                                            <li>조성목적(특징) : 경제자유구역 내 국제산업물류도시 및 첨단산업벨트 조성</li>
                                            <li>면적 : 5,707,590㎡(산업시설 3,185,757㎡, 지원시설 273,819㎡, 공공시설 2,248,014㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                - 연구개발특구지역(4,201,338㎡)은 연구개발특구 관리계획에 따라 별도 관리</li>
                                            <li>사업기간 : 2010. ~ 2019.</li>
                                            <li>사업비 : 21,397억원</li>
                                            <li>사업시행자 : 부산도시공사(공영개발)</li>
                                            <li>관리기관 : 부산진해경제자유구역청 ☏ 051-979-5324 / 연구개발특구진흥재단 ☏ 293-4852</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2010.03.03. : 산업단지계획 승인 고시</li>
                                            <li>2010.03.21. : 조성공사 착공</li>
                                            <li>2017.02.15. : 산업단지(1-1단계) 준공</li>
                                            <li>2019.10.16. : 산업단지(1-2단계) 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>복합산업 : 1521,1522(신발산업집적화단지로 한정), 24, 25, 26, 27, 28, 29, 30, 31, 33</li>
                                            <li>메카트로닉스 : 29, 30, 31</li>
                                            <li>일렉트로닉스 : 26, 27, 28, 35119</li>
                                            <li>정보서비스 : 62, 63</li>
                                            <li>물류운송 : 52, 29, 31, 33</li>
                                            <li>연구개발 : 70</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                15151, 2431, 2432, 2520, 25922, 25923, 3012, 3191, 52104, 52999<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_국제산업_용도별 구역.png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_국제산업_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!-- tab13-->
                        <div id="tab13" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">정주일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226280" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/정주일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원</li>
                                            <li>조성목적(특징) : 산업단지 직접개발로 현 공장의 부족한 산업시설용지 확보</li>
                                            <li>면적 : 96,578㎡(산업시설 40,401㎡, 지원시설 7,585㎡, 공공시설 48,592㎡)</li>
                                            <li>사업기간 : 2014. ~ 2020.</li>
                                            <li>사업비 : 233억원</li>
                                            <li>사업시행자 : 에스디상사(주), 원더그린(주)(실수요자 개발)</li>
                                            <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2014.11.26. : 산업단지계획 승인</li>
                                            <li>2017.05.10. : 조성공사 착공</li>
                                            <li>2020.09.30. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>16 (목재 및 나무제품(가구제외) 제조업)</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                16212 (강화 및 재생 목재 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_정주_용도별 구역.jpg">
                                    </p>
                                </div>  
                            </div>
                        </div>
                        <!-- tab19-->
                        <div id="tab19"  class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">센텀시티일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226040" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/센텀시티일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/images/첨부4_센텀시티_안내도.jpg" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/images/첨부4_센텀시티_안내도.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p> 
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 해운대구 우동, 재송동 일원</li>
                                            <li>조성목적(특징) : 부산지역 산업구조의 고도화 및 21세기 세계화·정보화 시대에 부응하는 정보단지 조성사업 시행</li>
                                            <li>면적 : 1,178,043㎡(산업시설 210,153㎡, 지원시설 469,229㎡, 공공시설 498,661㎡)</li>
                                            <li>사업기간 : 1997. ~ 2007.</li>
                                            <li>사업비 : 8,071억원</li>
                                            <li>사업시행자 : 부산광역시(센텀시티주식회사)(공영개발)</li>
                                            <li>관리기관 : 부산경제진흥원 센텀사무소 ☏ 051-742-8701</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>1997.08.01. : 일반산업단지 지정 승인(건설교통부)</li>
                                            <li>2000.10.12. : 조성공사 착공</li>
                                            <li>2006.03.08. : 산업단지(1단계) 준공</li>
                                            <li>2007.06.13. : 산업단지(2단계 : 고교부지) 준공</li>
                                            <li>2007.07.11. : 센텀시티(주) 청산종결 등기</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 141, 181, 259, 261, 263, 264, 265, 266, 271, 272, 273, 274, 284, 285, 28903, 291, 331, 334, 339</li>
                                            <li>정보통신업 : 581, 582, 591, 592, 601, 612, 620, 631</li>
                                            <li>전문, 과학 및 기술서비스업 : 701, 702, 711, 712, 713, 714, 715, 721, 729, 732, 739</li>
                                            <li>사업시설관리, 사업지원 및 임대서비스업 : 75320, 75991, 75992</li>
                                            <li>교육서비스업 : 853, 856</li>
                                            <li>예술, 스포츠 및 여가관련 서비스업 : 901, 902</li>
                                            <li>
                                                문화산업진흥기본법 제2조제1호의 문화산업 업종(영화, 음반, 출판, 문화재 관련산업 등)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_센텀_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_센텀_업종별 배치.PNG">
                                    </p>
                                </div>  
                            </div>
                        </div>
                        <!--tab_20-->
                        <div id="tab20" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">기룡1일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226070" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/기룡1일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_기룡1_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/images/첨부4_명례_안내도.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>  
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 기룡리 1114번지 일원(대선주조(주) 기장공장)</li>
                                            <li>조성목적(특징) : 소규모 산업단지 개발의 활성화를 통하여 실수요자에게 부지공급</li>
                                            <li>면적 : 83,411㎡(산업시설 57,969㎡, 지원시설 2,091㎡, 공공시설 23,351㎡)</li>
                                            <li>사업기간 : 2005. ~ 2008.</li>
                                            <li>사업비 : 229억원</li>
                                            <li>사업시행자 : 대선주조(주)(실수요자 직접개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2005.11.02. : 산업단지 지정</li>
                                            <li>2006.04.26. : 산업단지 실시계획 승인</li>
                                            <li>2006.12.06. : 조성공사 착공</li>
                                            <li>2008.08.29. : 산업단지 준공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                11 (음료 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터 없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- tab21-->
                        <div id="tab21" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">정관일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226060" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/정관일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_정관_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_정관_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>                               
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 정관읍 달산리 일원</li>
                                            <li>조성목적(특징) : 부산지역 신흥 개발지로서 자족적 산업기반 확보, 기존 공장의 수용 및 기술·자본 집약적 산업의 적극 유치</li>
                                            <li>면적 : 1,209,272㎡(산업시설 612,082㎡, 지원시설 99,949㎡, 공공시설 497,241㎡)</li>
                                            <li>사업기간 : 2001. ~ 2010.</li>
                                            <li>사업비 : 1,609억원</li>
                                            <li>사업시행자 : 한국토지주택공사(공영개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2001.10.25. : 산업단지 지정</li>
                                            <li>2003.06.05. : 산업단지 지정 변경 및 실시계획 승인</li>
                                            <li>2003.08.12. : 조성공사 착공</li>
                                            <li>2007.03.07. : 산업단지(1단계) 준공인가</li>
                                            <li>2010.03.10. : 산업단지(2단계) 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>목재·비금속 : 16, 17, 23</li> 
                                            <li>철강·기계 : 24, 25, 28, 29, 30</li>
                                            <li>운송장비 : 30, 31</li>
                                            <li>유통설비 : 52</li>
                                            <li>기타제조업 : 10, 11, 14, 15, 16, 17, 23, 26, 27, 30, 32, 33</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;고무 및 플라스틱 제조업<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_정관_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_정관_업종별 배치.PNG">
                                    </p>
                                </div>  
                            </div>
                        </div>
                        <!-- tab22-->
                        <div id="tab22" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">장안일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226080" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/장안일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_장안_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/images/장안.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>      
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 반룡리 일원</li>
                                            <li>조성목적(특징) : 동남해안경제권 벨트 내 자동차부품 생산거점기지 육성 및 부산지역 산업용지 확보</li>
                                            <li>면적 : 1,300,922㎡(산업시설 771,276㎡, 지원시설 44,341㎡, 공공시설 485,305㎡)</li>
                                            <li>사업기간 : 2005. ~ 2011.</li>
                                            <li>사업비 : 2,327억원</li>
                                            <li>사업시행자 : 기장군, 부산도시공사 *대행개발: 자동차부품협동조합</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2005.11.16. : 산업단지 지정</li>
                                            <li>2006.12.13. : 산업단지 실시계획 승인</li>
                                            <li>2007.06.14. : 조성공사 착공</li>
                                            <li>2010.12.08. : 산업단지(1단계) 준공인가</li>
                                            <li>2011.05.11. : 산업단지(2단계) 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li> 26, 27, 28, 29, 30, 49, 52</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;고무 및 플라스틱 제조업<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_장안_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_장안_업종별 배치.PNG">
                                    </p>
                                </div>  
                            </div>
                        </div>
                        <!-- tab23-->
                        <div id="tab23" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">기룡2일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226110" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/기룡2일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_기룡2_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/images/첨부4_명례_안내도.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p> 
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 기룡리 1127번지 일원</li>
                                            <li>조성목적(특징) : 소규모 산업단지 개발 활성화를 통한 실수요자 부지공급</li>
                                            <li>면적 : 46,308㎡(산업시설 32,680㎡, 공공시설 13,628㎡)</li>
                                            <li>사업기간 : 2007. ~ 2011.</li>
                                            <li>사업비 : 139억원</li>
                                            <li>사업시행자 : ㈜우석STS(실수요자 개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2007.08.29. : 산업단지 지정</li>
                                            <li>2008.01.23. : 산업단지 실시계획 승인</li>
                                            <li>2008.04.07. : 조성공사 착공</li>
                                            <li>2011.01.12. : 산업단지(1단계) 준공인가</li>
                                            <li>2011.07.13. : 산업단지(2단계) 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>24 (1차 금속 제조업)</li>
                                            <li>
                                                25 (금속 가공제품 제조업; 기계 및 가구 제외)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab24-->
                        <div id="tab24" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">정관코리일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226190" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/정관코리일반산업단지.jpg')?>">
                                    </p>
                                </div> 
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/files/첨부4_정관코리_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/files/첨부4_정관코리_안내도.pdf" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>                                      
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 정관읍 달산리 1260번지 일원</li>
                                            <li>조성목적(특징) : 부산시의 부족한 산업용지를 실수요자가 직접 개발하여 역외이전을 방지하고 기조성된 정관일반산업단지와 연계하여 산업 육성</li>
                                            <li>면적 : 83,981㎡(산업시설 59,372㎡, 공공시설 24,609㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            *산업시설용지 입주계획 : 3개업체(필지)</li>
                                            <li>사업기간 : 2010. ~ 2013.</li>
                                            <li>사업비 : 257억원</li>
                                            <li>사업시행자 : ㈜코리녹스(민간개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2010.10.20. : 산업단지 지정</li>
                                            <li>2011.03.28. : 조성공사 착공</li>
                                            <li>2013.04.17. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                24, 25, 26, 28, 29, 30, 31, 33<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_정관코리_용도별 구역.jpg">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- tab25-->
                        <div id="tab25" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">명례일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226120" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/명례일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <!-- <ul class="basic">
                                    <li class="list_first mb_2"><a href="/assets/images/첨부4_명례_안내도.jpg" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                        <ul class="list_disc">
                                            <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                        </ul>
                                    </li>
                                </ul> -->
                                <p class="list_first">
                                    <a href="/assets/images/첨부4_명례_안내도.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 명례리 일원</li>
                                            <li>조성목적(특징) : 부산지역 부족한 산업용지 확보를 통한 지역경제 활성화</li>
                                            <li>면적 : 1,566,006㎡(산업시설 868,395㎡, 지원시설 96,385㎡, 공공시설 601,226㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            *산업시설 입주계획 : 76개 업체(필지기준)</li>
                                            <li>사업기간 : 2008. ~ 2014.</li>
                                            <li>사업비 : 3,184억원</li>
                                            <li>사업시행자 : 부산상공산업단지개발(주)(민간개발)</li>
                                            <li>관리기관 : 명례일반산업단지관리공단 ☏ 051-915-7772</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2008.12.03. : 산업단지 지정</li>
                                            <li>2009.12.23. : 산업단지계획 승인</li>
                                            <li>2010.03.13. : 조성공사 착공</li>
                                            <li>2014.01.08. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 10, 14, 24, 25, 28, 29, 31, 32</li>
                                            <li>운수업 : 52</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                제조업 : 1420, 2411, 2421, 2520, 25922, 25923, 282, 3112, 3120, 3191, 3192, 3199, 32022<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_명례_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_명례_업종별 배치.PNG">
                                    </p>
                                </div>  
                            </div>
                        </div>
                        <!-- tab26-->
                        <div id="tab26" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산신소재일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226240" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/부산신소재일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">
                                    <a href="/assets/images/신소재.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 반룡리 875번지 일원</li>
                                            <li>조성목적(특징) : 부산주공주식회사의 본사이전 및 사업확장을 위한 산업단지 조성</li>
                                            <li>면적 : 255,229㎡(산업시설 168,302㎡, 지원시설 25,864㎡, 공공시설 61,063㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            *산업시설 입주계획 : 4개 업체(필지기준)</li>
                                            <li>사업기간 : 2013. ~ 2017.</li>
                                            <li>사업비 : 756억원</li>
                                            <li>사업시행자 : 부산주공주식회사(실수요자개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2013.01.16. : 산업단지계획 승인</li>
                                            <li>2013.10.25. : 조성공사 착공</li>
                                            <li>2017.03.29. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>27 (의료, 정밀, 광학 기기 및 시계 제조업)</li>
                                            <li>28 (전기장비 제조업)</li>
                                            <li>
                                                30 (자동차 및 트레일러 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터 없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_신소재_용도별 구역.png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_신소재_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!-- tab27-->
                        <div id="tab27" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">반룡일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226250" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/반룡일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">
                                    <a href="/assets/images/반룡.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 반룡리 일원</li>
                                            <li>조성목적(특징) : 기장군 일원의 산업단지와 연계한 부산권 거점 산업단지 조성</li>
                                            <li>면적 : 546,599㎡(산업시설 334,051㎡, 지원시설 44,887㎡, 공공시설 167,661㎡)</li>
                                            <li>입주계획(필지기준) : 산업시설 60개 업체, 지원시설 32개 업체</li>
                                            <li>사업기간 : 2013. ~ 2018.</li>
                                            <li>사업비 : 1,503억원</li>
                                            <li>사업시행자 : 성창아이엔디(주)(민간개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2013.05.22. : 산업단지계획 승인</li>
                                            <li>2015.01.29. : 조성공사 착공</li>
                                            <li>2018.03.30. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 1022, 1071, 1079, 16, 26, 28, 29, 30, 31, 3202</li>
                                            <li>
                                                운수업 : 52<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_반룡_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_반룡_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!-- tab28-->
                        <div id="tab28" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">오리일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226260" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>   
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/오리일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">
                                    <a href="/assets/images/오리.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 오리 일원</li>
                                            <li>조성목적(특징) : 부산지역 전략산업(해양바이오, 고령친화산업 등)의 육성과 산업용지 적기공급을 통한 지역경제 활성화</li>
                                            <li>면적 : 607,852㎡(산업시설 393,536㎡, 지원시설 6,545㎡, 공공시설 207,771㎡)</li>
                                            <li>입주계획(필지기준) : 산업시설 79개업체, 지원시설 10개업체</li>
                                            <li>사업기간 : 2013. ~ 2020.</li>
                                            <li>사업비 : 1,547억원</li>
                                            <li>사업시행자 : 부산도시공사(공영개발)</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2013.07.31. : 산업단지계획 승인</li>
                                            <li>2015.10.01. : 조성공사 착공</li>
                                            <li>2020.03.11. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 10, 11, 2042, 24, 25, 27, 28, 29, 30, 31, 33</li>
                                            <li>
                                                전문, 과학 및 기술서비스업 : 70, 72<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_오리_용도별 구역.png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_오리_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!-- tab29-->
                        <div id="tab29" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">에코장안일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226270" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>   
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/에코장안일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 기룡리 1147번지 일원</li>
                                            <li>조성목적(특징) : 부산지역 부족한 산업용지 확보를 통한 기업유치 지역경제 활성화</li>
                                            <li>면적 : 200,811㎡(산업시설 128,337㎡, 지원시설 2,473㎡, 공공시설 70,001㎡)</li>
                                            <li>사업기간 : 2014. ~ 2019.</li>
                                            <li>사업비 : 688억원</li>
                                            <li>사업시행자 : 에코장안일반산업단지개발(주)(실수요자, 일반분양)</li>
                                            <li>입주계획(필지기준) : 산업시설 24개업체, 지원시설 1개업체</li>
                                            <li>관리기관 : 부산경제진흥원 동부사무소 ☏ 051-728-8047</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2014.06.25. : 산업단지계획 승인</li>
                                            <li>2015.09.17. : 조성공사 착공</li>
                                            <li>2019.12.28. : 산업단지 준공인가</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 10, 13, 22, 23, 24, 28, 29, 30, 31</li>
                                            <li>운수업 : 52</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>제조업 : 101, 102, 103, 104, 108, 221, 2225, 2229, 23311, 23991, 2411, 2421, 282, 3120, 3191</li>
                                            <li>
                                                운수업 : 52104<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_에코장안_용도별 구역.png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_에코장안_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <!-- </div> -->
                </div>
                
                <!-- top_tab_2 조성중 컨텐츠-->
                <div id="proceeding_con" class="hidd">
                    <div class="tab_wrap">
                        <div class="tab_menu">
                            <!-- <div class="notice_table">
                                <h2 class="sub_tit" style="margin: 0px !important">일반산업단지: 서부산권</h2>
                            </div> -->
                            <ul>
                                <li><a class="active" id="tab_14" onclick="openPaging('tab_14');">사상재생사업지구</a></li>
                                <li><a id="tab_15" onclick="openPaging('tab_15');">산양일반산업단지</a></li>
                                <li><a id="tab_16" onclick="openPaging('tab_16');">명동일반산업단지</a></li>
                                <li><a id="tab_17" onclick="openPaging('tab_17');">지사글로벌일반산업단지</a></li>
                                <li><a id="tab_18" onclick="openPaging('tab_18');">강서해성일반산업단지</a></li>
                            
                                <li><a id="tab_30" onclick="openPaging('tab_30');">동남권방사선의과학 일반산업단지</a></li>
                                <li><a id="tab_31" onclick="openPaging('tab_31');">기장대우일반산업단지</a></li>
                            </ul>
                            <!-- <div class="notice_table">
                                <h2 class="sub_tit" style="margin: 0px !important">일반산업단지: 동부산권</h2>
                            </div> -->
                            <!-- <ul>
                                <li><a id="tab_30" onclick="openPaging('tab_30');">동남권방사선의과학 일반산업단지</a></li>
                                <li><a id="tab_31" onclick="openPaging('tab_31');">기장대우일반산업단지</a></li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="basic-body-wrap">
                        <!-- tab014-->
                        <div id="tab14">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">사상재생사업지구</h2>
                                <p class="list_first">위치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/사상재생사업지구.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">조감도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_사상재생_조감도.jpg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사상구 주례동, 감전동, 학장동 일원</li>
                                            <li>조성목적(특징) : 사상공업지역 산업구조 개편을 통한 신성장동력 확보, 부족한 기반시설 및 지원시설의 확충으로 서부산권 균형발전 도모</li>
                                            <li>면적 : 3,021,000㎡(산업시설 1,873,825㎡, 복합구역 2,015㎡, 지원시설 183,421㎡, 공공시설 961,739㎡)</li>
                                            <li>사업기간 : 2015. ~ 2030.</li>
                                            <li>사업시행자 : 부산광역시(공영개발)</li>
                                            <li>관리기관 : 부산광역시 지역균형개발과 ☏ 051-888-2775</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2015.04.08. : 재생사업지구 지정</li>
                                            <li>2020.10.14. : 재생시행계획 승인</li>
                                            <li>2020.12.21. : 새벽로 확장공사 착공</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>전통산업육성지구 : 10, 13, 14, 15, 16, 17, 18, 19, 20, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33</li>
                                            <li>스마트 융합·부품 산업지구 : 10, 13, 15, 24, 26, 27, 29, 30, 31</li>
                                            <li>지능형 메카트로닉스 산업지구 : 26, 27, 28, 29, 30, 31, 62</li>
                                            <li>지식·문화산업 복합용지지구 : 58, 59, 60, 61, 62, 63, 70, 71, 72, 73, 75, 85, 90(식물원, 동물원 및 자연공원 운영업 제외)</li>
                                            <li>물류관련 업종 : 49(도로화물 운송업에 한함), 52(보관 및 창고업, 그 외 기타 운송관련 서비스업에 한함)</li>
                                            <li>기타 첨단사업 등 : 산업집적법 등에 의한 지식기반산업, 첨단산업, 문화산업, 정보통신산업</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                허용업종 중 입주제한업종(세세분류) 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--tab_15-->
                        <div id="tab15" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">산양일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226140" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>   
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/산양일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">조감도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_산양_조감도.jpg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구 다대동 산31-6번지 일원</li>
                                            <li> 조성목적(특징) : 실수요 중심의 산업용지 적기공급으로 지역경제 활성화 도모</li>
                                            <li>면적 : 53,727㎡(산업시설 25,219㎡, 지원시설 500㎡, 공공시설 28,008㎡)</li>
                                            <li>사업기간 : 2009. ~ 2022.</li>
                                            <li>사업비 : 390억원</li>
                                            <li>사업시행자 : ㈜산양(실수요자 민간개발)</li>
                                            <li>관리기관 : 부산광역시 산업입지과 ☏ 051-888-4915</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2009.12.30. : 산업단지계획 승인</li>
                                            <li>2015.04.01. : 조성공사 착공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>24 (1차 금속 제조업)</li>
                                            <li>
                                                29 (기타 기계 및 장비 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터 없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- tab16-->
                        <div id="tab16" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">명동일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226210" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/명동일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 일원</li>
                                            <li>조성목적(특징) : 원전부품소재단지의 육성을 고려한 산업단지의 조성</li>
                                            <li>면적 : 505,694㎡(산업시설 325,137㎡, 지원시설 22,937㎡, 공공시설 157,620㎡)</li>
                                            <li>사업기간 : 2009. ~ 2022.</li>
                                            <li>사업비 : 1,866억원</li>
                                            <li>사업시행자 : 지사융합산업단지개발(주)(민간개발)</li>
                                            <li>관리기관 : 부산진해경제자유구역청 ☏ 051-979-5324</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2009.07.31. : 산업단지 지정</li>
                                            <li>2012.12.19. : 산업단지 실시계획 승인</li>
                                            <li>2014.07.01. : 조성공사 착공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>25 (금속 가공제품 제조업; 기계 및 가구 제외)</li>
                                            <li>28 (전기장비 제조업)</li>
                                            <li>29 (기타 기계 및 장비 제조업)</li>
                                            <li>
                                                31 (기타 운송장비 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터 없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_명동_용도별 구역.PNG">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_명동_업종별 배치.PNG">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!-- tab17-->
                        <div id="tab17" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">지사글로벌일반산업단지
                                </h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226300" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/지사글로벌일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">조감도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_지사글로벌_조감도.jpg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2"><p>사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 산137번지 일원</li>
                                            <li>조성목적(특징) : 지역 우량 중소기업 유치를 통한 지역경제 활성화 도모</li>
                                            <li>면적 : 417,133㎡(산업시설 223,378㎡, 지원시설 21,448㎡, 공공시설 172,307㎡)</li>
                                            <li>사업기간 : 2017. ~ 2022.</li>
                                            <li>사업비 : 1,828억원</li>
                                            <li>사업시행자 : ㈜코람코자산신탁(실수요자 신탁개발)  ※ 신탁자: ㈜지사글로벌개발</li>
                                            <li>관리기관 : 부산광역시 산업입지과 ☏ 051-888-4915</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2"><p>추진현황</p>
                                        <ul class="list_disc">
                                            <li>2017.02.15. : 산업단지계획 승인</li>
                                            <li>2020.02.28. : 조성공사 착공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>25 (금속 가공제품 제조업; 기계 및 가구 제외)</li> 
                                            <li>27 (의료, 정밀, 광학 기기 및 시계 제조업)</li> 
                                            <li>28 (전기장비 제조업)</li> 
                                            <li>29 (기타 기계 및 장비 제조업)</li> 
                                            <li>30 (자동차 및 트레일러 제조업)</li> 
                                            <li>
                                                31 (기타 운송장비 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br/>
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료</li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- tab18-->
                        <div id="tab18" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">강서해성일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226310" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/강서해성일반산업단지.png')?>">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구 지사동 산213-3번지 일원</li>
                                            <li>조성목적(특징) : 실수요 중심의 산업단지 조성으로 산업시설용지 적기 공급</li>
                                            <li>면적 : 104,290㎡(산업시설 69,260㎡, 공공시설 35,030㎡)</li>
                                            <li>사업기간 : 2017. ~ 2022.</li>
                                            <li>사업비 : 8,071억원</li>
                                            <li>사업시행자 : 해성메탈(주) 외 3개사(실수요자 민간개발)</li>
                                            <li>관리기관 : 부산경제진흥원 센텀사무소 ☏ 051-742-8701</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2017.07.12. : 산업단지계획 승인</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>25 (금속 가공제품 제조업; 기계 및 가구 제외)</li>
                                            <li>29 (기타 기계 및 장비 제조업)</li>
                                            <li>
                                                31 (기타 운송장비 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br/>
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 
                                                / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / 고무 및 플라스틱 제조업 
                                            </li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                        <!-- tab30-->
                        <div id="tab30"  class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">동남권방사선의과학 일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226230" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/동남권방사선의과학_일반산업단지.jpg')?>">
                                    </p>
                                </div>
                                <p class="list_first">
                                    <a href="/assets/images/동남권방사선의과학.jpg" target="_blank">산업단지 안내도</a>
                                    <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                </p>
                                <p class="list_first">조감도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_동남권_조감도.jpg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 좌동리, 임랑리, 반룡리 일원</li>
                                            <li>조성목적(특징) : 원전 비발전분야 국책연구시설이 집적한 입지요인을 활용하여 원전 클러스터 및 특화단지 조성</li>
                                            <li>면적 : 1,478,772㎡(산업시설 726,336㎡, 지원시설 210,817㎡, 공공시설 541,619㎡)</li>
                                            <li>사업기간 : 2012. ~ 2021.</li>
                                            <li>사업비 : 4,287억원</li>
                                            <li>사업시행자 : 기장군(공영개발)</li>
                                            <li>관리기관 : 부산광역시 산업입지과 ☏ 051-888-4915</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2012.06.27. : 산업단지계획 승인</li>
                                            <li>2014.04.14. : 조성공사 착공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>의료용 물질 및 의약품 : 21101, 21102, 21210, 21220, 21230, 21300</li>
                                            <li>금속가공제품 : 25130</li>
                                            <li>전자부품, 컴퓨터, 영상, 음향 및 통신장비 : 26111, 26112, 26129, 26224, 26295</li>
                                            <li>의료, 정밀, 광학기기 및 시계 : 27111, 27212, 27213, 27301</li>
                                            <li>전기장비 : 28114, 28119, 28901</li>
                                            <li>기타 기계 및 장비 : 29271, 29272, 29280, 29299</li>
                                            <li>기타 운송장비 : 31312</li>
                                            <li>건축기술, 엔지니어링 및 기타 과학기술 서비스업 : 72122, 72911, 72919</li>
                                            <li>연구개발업 : 70111, 70112, 70113, 70119, 70121, 70129, 70130</li>
                                        </ul>
                                    </li>
                                    <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>물환경보전법 1종, 2종 폐수배출시설</li>
                                            <li>대기환경보전법 1종, 2종 대기오염물질 배출시설</li>
                                            <li>
                                                악취방지법 악취배출시설<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <p class="list_first">용도별 구역도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_동남권_용도별 구역.png">
                                    </p>
                                </div>
                                <p class="list_first">업종별 배치도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_동남권_업종별 배치.png">
                                    </p>
                                </div> 
                            </div>
                        </div>
                        <!--tab_31-->
                        <div id="tab31" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">기장대우일반산업단지</h2>
                                <p class="list_first">
                                    <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=226170" target="_blank">위치도</a>
                                    <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                </p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/기장대우일반산업단지.jpg')?>">
                                    </p>
                                </div>   
                                <p class="list_first">조감도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_기장대우_조감도.jpg">
                                    </p>
                                </div>                             
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 기장군 장안읍 오리 산187번지 일원</li>
                                            <li>조성목적(특징) : 대우버스 유치를 통한 관련산업 육성 및 지역경제 활성화</li>
                                            <li>면적 : 343,720㎡(산업시설 248,155㎡, 지원시설 4,157㎡, 공공시설 91,408㎡)</li>
                                            <li>사업기간 : 2010. ~ 2022.</li>
                                            <li>사업비 : 687억원</li>
                                            <li>사업시행자 : 자일상용차(주)(실수요자 직접개발)</li>
                                            <li>관리기관 : 부산광역시 산업입지과 ☏ 051-888-4915</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">추진현황</p>
                                        <ul class="list_disc">
                                            <li>2010.05.04. : 산업단지계획 승인</li>
                                            <li>2019.07.01. : 조성공사 착공</li>
                                        </ul>
                                    </li>
                                    <li class="list_first mb_2">유치업종</p>
                                        <ul class="list_disc">
                                            <li>
                                                30 (자동차 및 트레일러 제조업)<br>
                                                <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                            </li>   
                                        </ul>
                                    </li>
                                    <!-- <li class="list_first">제한업종</p>
                                        <ul class="list_disc">
                                            <li>데이터없음(추후기재)</li>
                                        </ul>
                                    </li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>     
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/footer.php'; ?>

<script>
    function openPaging(name, type, tab_3) {
        //alert(type);
        if (name == 'tab_1') {
            $("#tab_1").addClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab01").removeClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_2') {
            $("#tab_2").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab02").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_3') {
            $("#tab_3").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab03").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_4') {
            $("#tab_4").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab04").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_5') {
            $("#tab_5").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab05").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');            
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_6') {
            $("#tab_6").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab06").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');            
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_7') {
            $("#tab_7").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');           
            $("#tab_6").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab07").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');     
            $("#tab06").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_8') {
            $("#tab_8").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');            
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab08").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');           
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_9') {
            $("#tab_9").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');            
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab09").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_10') {
            $("#tab_10").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab10").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');           
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_11') {
            $("#tab_11").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');          
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab11").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd'); 
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }
        if (name == 'tab_12') {
            $("#tab_12").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_13").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');

            $("#tab12").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab13").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
        }

        if (name == 'tab_13') {
            $("#tab_13").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            
            $("#tab13").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');     
        }

        if (name == 'tab_19') {
            $("#tab_19").addClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab19").removeClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_20') {
            $("#tab_20").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab20").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_21') {
            $("#tab_21").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab21").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_22') {
            $("#tab_22").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab22").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_23') {
            $("#tab_23").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab23").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_24') {
            $("#tab_24").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab24").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_25') {
            $("#tab_25").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab25").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_26') {
            $("#tab_26").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab26").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_27') {
            $("#tab_27").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab27").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_28') {
            $("#tab_28").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_29").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab28").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab29").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }

        if (name == 'tab_29') {
            $("#tab_29").addClass('active');
            $("#tab_19").removeClass('active');
            $("#tab_20").removeClass('active');
            $("#tab_21").removeClass('active');
            $("#tab_22").removeClass('active');
            $("#tab_23").removeClass('active');
            $("#tab_24").removeClass('active');
            $("#tab_25").removeClass('active');
            $("#tab_26").removeClass('active');
            $("#tab_27").removeClass('active');
            $("#tab_28").removeClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');
            
            $("#tab29").removeClass('hidd');
            $("#tab19").addClass('hidd');
            $("#tab20").addClass('hidd');
            $("#tab21").addClass('hidd');
            $("#tab22").addClass('hidd');
            $("#tab23").addClass('hidd');
            $("#tab24").addClass('hidd');
            $("#tab25").addClass('hidd');
            $("#tab26").addClass('hidd');
            $("#tab27").addClass('hidd');
            $("#tab28").addClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }


        if (name == 'tab_14') {
            $("#tab_14").addClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_18").removeClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_31").removeClass('active');
           
            $("#tab14").removeClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab18").addClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab31").addClass('hidd');
        }

        if (name == 'tab_15') {
            $("#tab_15").addClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_18").removeClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_31").removeClass('active');
           
            $("#tab15").removeClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab18").addClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab31").addClass('hidd');
        }

        if (name == 'tab_16') {
            $("#tab_16").addClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_18").removeClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_31").removeClass('active');
           
            $("#tab16").removeClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab18").addClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab31").addClass('hidd');
        }

        if (name == 'tab_17') {
            $("#tab_17").addClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_18").removeClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_31").removeClass('active');
           
            $("#tab17").removeClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab18").addClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab31").addClass('hidd');
        }

        if (name == 'tab_18') {
            $("#tab_18").addClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_31").removeClass('active');
           
            $("#tab18").removeClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab31").addClass('hidd');
        }

        if (name == 'tab_30') {
            $("#tab_30").addClass('active');
            $("#tab_31").removeClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_18").removeClass('active');
            
            $("#tab30").removeClass('hidd');
            $("#tab31").addClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab18").addClass('hidd');
        }

        if (name == 'tab_31') {
            $("#tab_31").addClass('active');
            $("#tab_30").removeClass('active');
            $("#tab_14").removeClass('active');
            $("#tab_15").removeClass('active');
            $("#tab_16").removeClass('active');
            $("#tab_17").removeClass('active');
            $("#tab_18").removeClass('active');
            
            $("#tab31").removeClass('hidd');
            $("#tab30").addClass('hidd');
            $("#tab14").addClass('hidd');
            $("#tab15").addClass('hidd');
            $("#tab16").addClass('hidd');
            $("#tab17").addClass('hidd');
            $("#tab18").addClass('hidd');
        }
        
        /* top_tab 기능*/
        if (name == 'complate') {
            $("#complate").addClass('active');
            $("#proceeding").removeClass('active');

            $("#complate_con").removeClass('hidd');
            $("#proceeding_con").addClass('hidd');
        }

        if (name == 'proceeding') {
            $("#proceeding").addClass('active');
            $("#complate").removeClass('active');

            $("#proceeding_con").removeClass('hidd');
            $("#complate_con").addClass('hidd');
        }
    }
</script>
</body>
</html>