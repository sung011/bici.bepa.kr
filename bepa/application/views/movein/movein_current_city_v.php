<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<link rel="stylesheet" href="/assets/css/complex.css">
<link rel="stylesheet" href="/assets/css/movein.css">
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
                    <h2 class="sub_tit">도시첨단산업단지</h2>
                </div>
                <!-- 20210426 전은신 상위 tab -->
                <div class="tab_wrap border_none pb_0">
                    <div class="tab_menu_top">
                        <ul>
                            <li><a class="active" id="complate" onclick="openPaging('complate');">조성완료</a></li>
                            <li><a id="proceeding" onclick="openPaging('proceeding');">조성중</a></li>
                        </ul>
                    </div>
                </div>	
                <!-- // 20210426 전은신 상위 tab -->
                <!-- top_tab_1 조성완료 컨텐츠-->
                <div id="complate_con">
                     <!-- tab -->
                     <div class="tab_wrap">
                        <div class="tab_menu">
                            <ul>
                                <li><a class="active" id="tab_1" onclick="openPaging('tab_1');">모라도시첨단산업단지</a></li>
                                <li><a id="tab_2" onclick="openPaging('tab_2');">회동석대도시첨단산업단지</a></li>
                            </ul>
                        </div>
                    </div>
                        <!--// tab -->
    
                        <div class="basic-body-wrap">
                            <!-- tab01-->
                            <div id="tab01">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">모라도시첨단산업단지</h2>
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=326030" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/모라도시첨단산업단지.jpg">
                                        </p>
                                    </div>
                                    <ul class="basic">
                                        <li class="list_first mb_2">사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 사상구 모라동 1375번지 일원(부산벤처타워)</li>
                                                <li>조성목적(특징) : 산업시설용지 적기 공급으로 첨단산업을 유치하고, 산재된 부산울산벤처기업협회 회원사의 집적화 도모</li>
                                                <li>면적 : 11,081㎡(산업시설 6,474㎡, 지원시설 3,163㎡, 공공시설 1,444㎡)</li>
                                                <li>사업기간 : 2012. ~ 2015.</li>
                                                <li>사업비 : 210억원</li>
                                                <li>사업시행자 : 부산벤처산업단지개발(주)</li>
                                                <li>관리기관 : 부산경제진흥원 서부사무소 ☏ 051-600-1832</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>2012.04.11. : 산업단지계획 승인</li>
                                                <li>2012.07.23. : 조성공사 착공</li>
                                                <li>2014.06.12. : 지식산업센터 공사 착공(부산벤처타워)</li>
                                                <li>2015.04.29. : 산업단지 준공 인가</li>
                                                <li>2017.11.30. : 지식산업센터 사용승인(부산벤처타워)</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>제조업 : 21, 25, 26, 27, 28, 29, 30, 31</li>
                                                <li>출판, 영상, 방송통신 및 정보서비스업 : 58, 59, 61, 62, 63</li>
                                                <li>전문, 과학 및 기술 서비스업 : 70, 71, 72, 73</li>
                                                <li>사업시설관리 및 사업지원 서비스업 : 75</li>
                                                <li>
                                                    교육서비스업 : 85<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>자료 없음(추후 기재)</li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!--tab_02-->
                            <div id="tab02" class="hidd">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">회동석대 도시첨단산업단지</h2>
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=326010" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/회동석대_도시첨단산업단지.jpg" height="550px">
                                        </p>
                                    </div>
                                    <!-- <ul class="basic">
                                        <li class="list_first mb_2"><a href="/assets/images/첨부4_1_회동_안내도.jpg" target="_blank" style="text-decoration: underline;">산업단지 안내도(회동)</a><a href="/assets/images/첨부4_2_석대_안내도.jpg" target="_blank" style="text-decoration: underline;">산업단지 안내도(석대)</a></p>
                                            <ul class="list_disc">
                                                <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                            </ul>
                                        </li>
                                    </ul> -->
                                    <p class="list_first">
                                        <a href="/assets/images/첨부4_1_회동_안내도.jpg" target="_blank">산업단지 안내도(회동)</a>
                                        <a href="/assets/images/첨부4_2_석대_안내도.jpg" target="_blank">산업단지 안내도(석대)</a>
                                        <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                    </p>
                                    <ul class="basic">
                                        <li class="list_first mb_2">사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 금정구 회동동 및 해운대구 석대동 일원</li>
                                                <li>조성목적(특징) : 21세기 정보화시대에 부응하는 산업구조의 고도화 및 산업시설용지 적기 공급</li>
                                                <li>면적 : 228,604㎡(산업시설 126,831㎡, 지원시설 20,300㎡, 공공시설 81,473㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                ※ 금정구 회동동 106,205㎡, 해운대구 석대동 122,399㎡</li>
                                                <li>사업기간 : 2008. ~ 2013.</li>
                                                <li>사업비 : 1,195억원</li>
                                                <li>사업시행자 : ㈜부산첨단산업단지개발</li>
                                                <li>관리기관 : 부산경제진흥원 센텀사무소 ☏ 051-742-8701</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>2008.08.27. : 도시첨단산업단지 지정</li>
                                                <li>2010.05.26. : 산업단지계획 승인</li>
                                                <li>2010.07.20. : 조성공사 착공</li>
                                                <li>2013.12.30. : 산업단지 준공인가</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>제조업 : 261, 262, 263, 264, 265, 266, 271, 272, 274, 281, 282, 283, 284, 285, 289, 259, 291, 292, 303</li>
                                                <li>출판, 영상, 방송통신 및 정보서비스업 : 631,639</li>
                                            </ul>
                                        </li>
                                        <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>
                                                    25,29,30 업종 중 산업집적법 시행규칙 [별표5]의 첨단업종이 아닌 업종<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>                                        
                                    </ul>
                                    <p class="list_first">용도별 구역도(회동)</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_1_회동_용도별 구역.PNG">
                                        </p>
                                    </div>
                                    <p class="list_first">용도별 구역도(석대)</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_2_석대_용도별 구역.PNG">
                                        </p>
                                    </div>
                                    <p class="list_first">업종별 배치도(회동)</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_1_회동_업종별 배치.PNG">
                                        </p>
                                    </div> 
                                    <p class="list_first">업종별 배치도(석대)</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_2_석대_업종별 배치.PNG">
                                        </p>
                                    </div>
                                </div>
                            </div>   
                        </div>
                </div>
                
                <!-- top_tab_2 조성중 컨텐츠-->
                <div id="proceeding_con" class="hidd">
                    <!-- 조성중 컨텐츠 추가 -->
                     <!-- tab -->
                     <div class="tab_wrap">
                        <div class="tab_menu">
                            <ul>
                                <li><a class="active" id="tab_3" onclick="openPaging('tab_3');">에코델타시티도시첨단산업단지</a></li>
                                <li><a id="tab_4" onclick="openPaging('tab_4');">금곡도시첨단산업단지</a></li>
                            </ul>
                        </div>
                    </div>
                        <!--// tab -->
    
                        <div class="basic-body-wrap">
                            <!-- tab03-->
                            <div id="tab03">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">에코델타시티도시첨단산업단지</h2>            
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=326040" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/부산에코델타시티도시첨단산업단지.jpg">
                                        </p>
                                    </div>
                                    <p class="list_first">조감도</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_에코델타_조감도.jpg">
                                        </p>
                                    </div>
                                    <ul class="basic">
                                        <li class="list_first mb_2">사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 강서구 명지동 일원</li>
                                                <li>조성목적(특징) : 친환경도시로서의 에코델타시티 산업기능의 체계적인 개발 및 도시첨단산업의 육성</li>
                                                <li>면적 : 659,037㎡(산업시설 306,187㎡, 지원시설 15,158㎡, 공공시설 337,692㎡)</li>
                                                <li>사업기간 : 2015. ~ 2023.</li>
                                                <li>사업시행자 : 부산광역시, 한국수자원공사, 부산도시공사(공영개발)</li>
                                                <li>관리기관 : 부산광역시 지역균형개발과 ☏ 051-888-2854</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>2015.12.30. : 도시첨단산업단지 지정</li>
                                                <li>2016.08.18. : 도시첨단산업단지 실시계획 승인</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>첨단업종 : 24, 25, 26, 27, 28, 29, 30, 31<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                ※ 24,25 업종의 경우 산업집적법 시행규칙 제15조 [별표5(첨단업종)]에 해당하는 업종만 허용</li>
                                                <li>지식·문화·정보·통신산업 : 58, 59, 60, 61, 62, 63, 71, 72, 73, 75, 85, 90</li>
                                            </ul>
                                        </li>
                                        <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>
                                                    대기환경보전법 시행규칙 별표1 및 별표2에 명시된 물질을 배출하는 시설<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>  
                                    </ul>
                                    <p class="list_first">업종별 배치도</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_에코델타_업종별 배치.PNG">
                                        </p>
                                    </div> 
                                </div>
                            </div>
                            <!--tab_04-->
                            <div id="tab04" class="hidd">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">금곡도시첨단산업단지</h2>
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=326050" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/금곡도시첨단산업단지.jpg">
                                        </p>
                                    </div>
                                    <p class="list_first">조감도</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부1_금곡_조감도.jpg">
                                        </p>
                                    </div>
                                    <ul class="basic">
                                        <li class="list_first mb_2"><p>사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 북구 금곡동 1010번지 일원</li>
                                                <li>조성목적(특징) : 북부산 지역의 산업용지 공급 및 지식·정보통신산업 등 첨단산업 육성</li>
                                                <li>면적 : 46,264㎡(산업시설 17,367㎡, 복합 6,825㎡, 주거 12,861㎡, 공공시설 9,211㎡)</li>
                                                <li>사업기간 : 2020. ~ 2022.</li>
                                                <li>사업비 : 692억원</li>
                                                <li>사업시행자 : ㈜금곡벤처밸리(민간개발)</li>
                                                <li>관리기관 : 부산광역시 산업입지과 ☏ 051-888-4915</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>2020.03.18. : 산업단지계획 승인</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>도시첨단산업단지 및 지식산업센터에 입주가능한 업종</li>
                                                <li>제조업 중 첨단업종</li>
                                                <li>지식·문화·정보통신산업</li>
                                            </ul>
                                        </li>
                                        <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>
                                                    산업집적법 시행령 제34조에 따른 도시형공장의 범위에 해당하여야 하고, 한국표준산업분류 상 악취·소음·진동·폐수·분진·중량·위험물 등 <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;공해배출요인이 있는 업종은 입주 불가<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                </div>
                <!-- // 20210426 전은신 상위 tab -->	
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
 
            $("#tab01").removeClass('hidd');
            $("#tab02").addClass('hidd');
        }

        if (name == 'tab_2') {
            $("#tab_2").addClass('active');
            $("#tab_1").removeClass('active');
            
            $("#tab02").removeClass('hidd');
            $("#tab01").addClass('hidd');
        }

        if (name == 'tab_3') {
            $("#tab_3").addClass('active');   
            $("#tab_4").removeClass('active');
            
            $("#tab03").removeClass('hidd');        
            $("#tab04").addClass('hidd');         
        }

        if (name == 'tab_4') {
            //setBounds();
            $("#tab_4").addClass('active');
            $("#tab_3").removeClass('active');
            
            $("#tab04").removeClass('hidd');
            $("#tab03").addClass('hidd');   
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