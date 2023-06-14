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
                    <h2 class="sub_tit">농공단지</h2>
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
                                <li><a class="active" id="tab_1" onclick="openPaging('tab_1');">정관농공단지</a></li>
                            </ul>
                        </div>
                    </div>
                        <!--// tab -->
    
                        <div class="basic-body-wrap">
                            <!-- tab01-->
                            <div id="tab01">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">정관농공단지</h2>
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=426010" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/정관농공단지.jpg">
                                        </p>
                                    </div>
                                    <!-- <ul class="basic">
                                        <li class="list_first mb_2"><a href="/assets/files/첨부4_정관농공_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                            <ul class="list_disc">
                                                <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                            </ul>
                                        </li>
                                    </ul> -->
                                    <p class="list_first">
                                        <a href="/assets/images/정관농공단지_안내도.jpg" target="_blank">산업단지 안내도</a>
                                        <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                    </p>
                                    <ul class="basic">
                                        <li class="list_first mb_2">사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 기장군 정관읍 일원</li>
                                                <li>조성목적(특징) : 농어촌지역 소득증대 및 경제활성화, 균등발전 도모</li>
                                                <li>면적 : 258,083㎡(산업시설 189,317㎡, 지원시설 4,186㎡, 공공시설 64,580㎡)</li>
                                                <li>사업기간 : 1987. ~ 1988.</li>
                                                <li>사업비 : 63억원</li>
                                                <li>사업시행자 : 기장군(공영개발)</li>
                                                <li>관리기관 : 부산경제진흥원 센텀사무소 ☏ 051-742-8701</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>1987.02.25. : 농공단지 지정</li>
                                                <li>1987.09.15. : 조성공사 착공</li>
                                                <li>1988.11.30. : 산업단지 준공</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>기계·금속 : 22, 25, 29, 30</li>
                                                <li>섬유·화학 : 13, 20</li>
                                                <li>첨단업종 : 24, 26, 27</li>
                                                <li>
                                                    기타제조업 : 28<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>
                                        <!-- <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>자료 필요(후에 기재)</li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                             
                        </div>
                </div>
                
                <!-- top_tab_2 조성중 컨텐츠-->
                <div id="proceeding_con" class="hidd">
                     <!-- tab -->
                     <div class="tab_wrap">
                        <div class="tab_menu">
                            조성중인 산업단지가 없습니다.
                        </div>
                    </div>
                        <!--// tab -->
    
                        <div class="basic-body-wrap"> 
                        </div>
                </div>
                <!-- // 20210426 전은신 상위 tab --> 
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
            $("#tab01").removeClass('hidd');       
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