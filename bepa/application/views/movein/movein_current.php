<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

<link rel="stylesheet" href="/application/views/common/css/complex.css">
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
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
                ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >

                <div class="notice_table notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li><a href="index.html">부산 사업 단지 정보</a></li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="sub_tit">일반산업단지</h2>
                    <h4 class="sub_mid_tit">서부산권</h4>

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
                </div>
                <!-- top_tab_1 조성완료 컨텐츠-->
                <div id="complate_con">
                    <!-- tab -->
                    <div class="tab_wrap">
                        <div class="tab_menu">
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
                            </ul>
                        </div>
                    </div>
                    <!--// tab -->
                    <div class="basic-body-wrap">
                        <!-- tab01-->
                        <div id="tab01">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(기존단지)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요</p>
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>전 제조업</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>관리기관이 공해, 용수, 기타의 사정으로 산업단지 입주 부적격업종에 대하여는 입주를 제한할 수 있음
                                                (염색, 피혁, 도금업종 등 용수 다소비업종 입주 불가)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--tab_02-->
                        <div id="tab02" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(협업화단지)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab03-->
                        <div id="tab03" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신호일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>24, 25, 28, 29, 30</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab04-->
                        <div id="tab04" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산과학일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : **년</li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 29, 30, 31</li>
                                            <li>신소재 : 24, 25, 28, 27</li>
                                            <li>정밀화학 : 19, 20, 22</li>
                                            <li>정보통신 : 26, 28</li>
                                            <li>기타 일반제조업 : 10, 13, 14, 15, 16, 17, 18, 22, 23, 24, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab05-->
                        <div id="tab05" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">화전일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : **년</li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 24, 25, 29, 28</li>
                                            <li>일렉트로닉스 : 26</li>
                                            <li>자동차 및 운송장비 : 30, 31</li>
                                            <li>물류 : 52</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업
                                                / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / 고무 및 플라스틱 제조업
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
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab07-->
                        <div id="tab07" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">생곡일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab08-->
                        <div id="tab08" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">성우일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab09-->
                        <div id="tab09" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">풍상일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab10-->
                        <div id="tab10" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">미음일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab11-->
                        <div id="tab11" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">지사2일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab12-->
                        <div id="tab12" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산신항배후 국제산업물류도시(1단계)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab13-->
                        <div id="tab13" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">정주일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div id="proceeding_con" class="hidd">
                    조성중 컨텐츠 추가
                    <!-- tab -->
                    <div class="tab_wrap">
                        <div class="tab_menu">
                            <ul>
                                <li><a class="active" id="tab_1" onclick="openPaging('tab_1');">사상재생사업지구(조성중)</a></li>
                                <li><a id="tab_2" onclick="openPaging('tab_2');">산양일반산업단지(조성중)</a></li>
                                <li><a id="tab_3" onclick="openPaging('tab_3');">명동일반산업단지(조성중)</a></li>
                                <li><a id="tab_4" onclick="openPaging('tab_4');">지사글로벌일반산업단지(조성중)</a></li>
                                <li><a id="tab_5" onclick="openPaging('tab_5');">강서해성일반산업단지(조성중)</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--// tab -->

                    <div class="basic-body-wrap">
                        <!-- tab01-->
                        <div id="tab01">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(기존단지)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>전 제조업</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>관리기관이 공해, 용수, 기타의 사정으로 산업단지 입주 부적격업종에 대하여는 입주를 제한할 수 있음
                                                (염색, 피혁, 도금업종 등 용수 다소비업종 입주 불가)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--tab_02-->
                        <div id="tab02" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신평장림일반산업단지(협업화단지)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab03-->
                        <div id="tab03" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">신호일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : </li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>24, 25, 28, 29, 30</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab04-->
                        <div id="tab04" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산과학일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : **년</li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 29, 30, 31</li>
                                            <li>신소재 : 24, 25, 28, 27</li>
                                            <li>정밀화학 : 19, 20, 22</li>
                                            <li>정보통신 : 26, 28</li>
                                            <li>기타 일반제조업 : 10, 13, 14, 15, 16, 17, 18, 22, 23, 24, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업 / 염색 / 피혁 / 도금 / 염안료</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab05-->
                        <div id="tab05" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">화전일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 강서구</li>
                                            <li>면적 : </li>
                                            <li>사업기간 : **년</li>
                                            <li>사업비 : </li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>메카트로닉스 : 24, 25, 29, 28</li>
                                            <li>일렉트로닉스 : 26</li>
                                            <li>자동차 및 운송장비 : 30, 31</li>
                                            <li>물류 : 52</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>아래 업종 중 입주금지업종 있음(자세한 내용은 산업단지 관리기본계획 참고)<br />
                                                - 연탄, 석탄 / 시멘트 및 시멘트제품 / 아스팔트 및 포장재료 / 도정 및 도축업 / 제지업
                                                / 염색 / 피혁 / 도금 / 염안료 / 섬유제품 / 화합물 및 화학제품 / 고무 및 플라스틱 제조업
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
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab07-->
                        <div id="tab07" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">생곡일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab08-->
                        <div id="tab08" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">성우일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab09-->
                        <div id="tab09" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">풍상일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab10-->
                        <div id="tab10" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">미음일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab11-->
                        <div id="tab11" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">지사2일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab12-->
                        <div id="tab12" class="hidd">
                            <div class="mb_50">
                                <h2 class="sub_main_tit">부산신항배후 국제산업물류도시(1단계)</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- tab13-->
                        <div id="tab13" class="hidd">

                            <div class="mb_50">
                                <h2 class="sub_main_tit">정주일반산업단지</h2>
                                <p class="list_first">업종별 배치도</p>

                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_plat01.jpeg">
                                    </p>
                                </div>
                                <p class="list_first">안내도</p>
                                <div class="photo_frame mb_2 pr_20">
                                    <p class="border_light">
                                        <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="/application/views/common/images/img_viewpic1.jpeg">
                                    </p>
                                </div>
                                <ul class="basic">
                                    <li class="list_first mb_2">사업개요
                                        <ul class="list_disc">
                                            <li>위치 : 부산광역시 사하구</li>
                                            <li>면적 : 561천㎡ ※분양면적 304천㎡</li>
                                            <li>사업기간 : 2002 ~ 2006년</li>
                                            <li>사업비 : 611억원(공사 341, 보상 250, 기타 20)</li>
                                        </ul>
                                    </li>

                                    <li class="list_first mb_2">유치업종
                                        <ul class="list_disc">
                                            <li>기계 : 2412, 25, 27, 28, 29, 31, 33</li>
                                            <li>염색 : 13</li>
                                            <li>표면처리 : 25922</li>
                                            <li>수산물가공 : 102, 103, 151</li>
                                            <li>자동차부품 : 30, 25, 27, 28, 29, 31, 33</li>
                                        </ul>
                                    </li>

                                    <li class="list_first">제한업종
                                        <ul class="list_disc">
                                            <li>폐수처리장을 운영하는 조합구역 내에는 배치업종 이외 타 업종의 입주를 제한함(표면처리, 염색, 수산물가공)</li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
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
<script>
    function openPaging(name) {
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
        }
        if (name == 'tab_4') {

            //setBounds();

            $("#tab_4").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab04").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }

        if (name == 'tab_5') {
            $("#tab_5").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab05").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }
        if (name == 'tab_6') {
            $("#tab_6").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab06").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }
        if (name == 'tab_7') {
            $("#tab_7").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab07").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }
        if (name == 'tab_8') {
            $("#tab_8").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab08").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }
        if (name == 'tab_9') {
            $("#tab_9").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab09").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }

        if (name == 'tab_10') {
            $("#tab_10").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab10").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');


        }
        if (name == 'tab_11') {
            $("#tab_11").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab11").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab13").addClass('hidd');
        }
        if (name == 'tab_12') {
            $("#tab_12").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_11").removeClass('active');
            $("#tab_13").removeClass('active');

            $("#tab12").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab11").addClass('hidd');
            $("#tab13").addClass('hidd');
        }
        if (name == 'tab_13') {
            $("#tab_13").addClass('active');
            $("#tab_1").removeClass('active');
            $("#tab_3").removeClass('active');
            $("#tab_4").removeClass('active');
            $("#tab_5").removeClass('active');
            $("#tab_2").removeClass('active');
            $("#tab_7").removeClass('active');
            $("#tab_8").removeClass('active');
            $("#tab_9").removeClass('active');
            $("#tab_10").removeClass('active');
            $("#tab_6").removeClass('active');
            $("#tab_12").removeClass('active');
            $("#tab_11").removeClass('active');

            $("#tab13").removeClass('hidd');
            $("#tab01").addClass('hidd');
            $("#tab03").addClass('hidd');
            $("#tab04").addClass('hidd');
            $("#tab05").addClass('hidd');
            $("#tab02").addClass('hidd');
            $("#tab07").addClass('hidd');
            $("#tab08").addClass('hidd');
            $("#tab09").addClass('hidd');
            $("#tab10").addClass('hidd');
            $("#tab06").addClass('hidd');
            $("#tab12").addClass('hidd');
            $("#tab11").addClass('hidd');
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