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
                    <h2 class="sub_tit">국가산업단지</h2>
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
                                <li><a class="active" id="tab_1" onclick="openPaging('tab_1');">명지녹산국가산업단지</a></li>
                            </ul>
                        </div>
                    </div>
                        <!--// tab -->
    
                        <div class="basic-body-wrap">
                            <!-- tab01-->
                            <div id="tab01">
                                <div class="mb_50">
                                    <h2 class="sub_main_tit">명지녹산국가산업단지</h2>
                                    <p class="list_first">
                                        <a href="https://www.industryland.or.kr/web/gis/Views/ilis_map.jsp?map=20a0f5be14c8f8a6f04ca3044e575d469a8589f7&switch=off&di=126011" target="_blank">위치도</a>
                                        <span class="text-danger">※ '위치도'를 클릭하시면 산업입지정보시스템(국토교통부) 지도로 연결됩니다.</span>
                                    </p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/명지녹산국가산업단지.jpg')?>">
                                        </p>
                                    </div>                          
                                    <!-- <ul class="basic">
                                        <li class="list_first mb_2"><a href="/assets/files/첨부4_녹산_안내도.pdf" target="_blank" style="text-decoration: underline;">산업단지 안내도</a></p>
                                            <ul class="list_disc">
                                                <li><span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span></li>                                       
                                            </ul>
                                        </li>
                                    </ul> -->
                                    <p class="list_first">
                                        <a href="/assets/files/첨부4_녹산_안내도.pdf" target="_blank">산업단지 안내도</a>
                                        <span class="text-danger">※ 안내도 상 기업정보는 현재 현황과 일치하지 않을 수 있습니다.</span>
                                    </p>                
                                    <ul class="basic">
                                        <li class="list_first mb_2">사업개요</p>
                                            <ul class="list_disc">
                                                <li>위치 : 부산광역시 강서구 명지동, 송정동 일원, 경상남도 창원시 진해구 용원동 일원</li>
                                                <li>조성목적(특징) : 부산 대도시권의 광역적 정비 및 도시환경 개선, 산업기반 강화</li>
                                                <li>면적 : 6,998,042㎡(산업시설 4,112,450㎡, 지원시설 677,742㎡, 공공시설 2,207,850㎡)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                ※ 용원동 녹산지구(주거단지) 1,672,153㎡, 명지동 명지지구(주거단지) 1,842,878㎡ 별도</li>
                                                <li>사업기간 : 1989. ~ 2002.</li>
                                                <li>사업비 : 7,590억원</li>
                                                <li>사업시행자 : 한국토지주택공사(공영개발)</li>
                                                <li>관리기관 : 한국산업단지공단 부산지역본부 ☏ 070-8895-7847</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">추진현황</p>
                                            <ul class="list_disc">
                                                <li>1989.10.20. : 명지·녹산 산업기지개발구역 지정(건설부 고시)</li>
                                                <li>1989.12.01. : 사업시행자 지정(한국토지개발공사)</li>
                                                <li>1991.04.30. : 국가공업단지로 관리(상공부 고시)</li>
                                                <li>1999.08.31. : 1단계 조성사업 준공인가</li>
                                                <li>2000.07.18. : 2단계 조성사업 준공인가</li>
                                                <li>2002.04.30. : 3단계 조성사업 준공인가</li>
                                            </ul>
                                        </li>
                                        <li class="list_first mb_2">유치업종</p>
                                            <ul class="list_disc">
                                                <li>전 제조업</li>
                                                <li>지식산업 및 정보통신산업</li>
                                                <li>창고·운송업 : 52101, 52102, 49301, 49302, 49303, 49401, 50112, 52942</li>
                                            </ul>
                                        </li>
                                        <li class="list_first">제한업종</p>
                                            <ul class="list_disc">
                                                <li>
                                                    아래 제조업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료 / 재활용 / 기타<br>
                                                    <span class="text-danger">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;※ 업종별 배치가능구역, 구역별 건축할 건축물의 범위 등 상세한 사항은 산업단지 고시정보 및 관리기관을 통하여 확인하시기 바랍니다.</span>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                    <p class="list_first">용도별 구역도</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부2_녹산_용도별 구역.png">
                                        </p>
                                    </div>
                                    <p class="list_first">업종별 배치도</p>
                                    <div class="photo_frame mb_2 pr_20">
                                        <p class="border_light">
                                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/assets/images/첨부3_녹산_업종별 배치.png">
                                        </p>
                                    </div>
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