<?php
    $var = '210215_2';
?>

<head>
    <title>부산광역시 산업단지 관리시스템</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="성남산업단지">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=base_url('assets/css/nanumbarungothic.css')?>" />
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/styles/bootstrap4/bootstrap.min.css')?>">
    <link href="<?=base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/animate.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/styles/main_styles.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/nabis.css')?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/tjdska.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/datepicker.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/icons.min.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/movein.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/complex.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/table.css')?>">
</head>
<style>
    #paging {
        position: relative;
        text-align: center;
        padding: 7px;
        margin-top: 30px;
    }
    .pagination {
        position: relative;
        list-style: none;
        display: inline-block;
        padding: 0;
        margin: 0;
    }
    .pagination li {
        display: inline;
    }
    .pagination a {
        display: inline-block;
        font-size: 14px;
        text-decoration: none;
        min-width: 28px;
        height: 28px;
        padding: 0 5px;
        color: #fff;
        border: 1px solid transparent;
        line-height: 26px;
        text-align: center;
        color: #757575;
        position: relative;
        z-index: 1;
    }
    .search_button i, .shopping_cart i {
        font-size: 16px;
        color: #fff !important;
        padding-top:1px;
    }
    .main-link{color:#fff;font-weight:bold;}
    .main-link:hover{color:#ddd;font-weight:bold;}
    .top_bar{background:#004195;}
</style>
<body>
<div class="super_container">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar" style="height:35px;">
            <div class="top_bar_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="top_bar_content flex-row align-items-center justify-content-start" style="padding:7px;">

                                <?php
                                if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
                                    ?>
                                    <div class="flo-right" >
                                        <a href="/index.php/Login/LogOut" class="top-heada" >로그아웃</a>
                                    </div>
                                    <div class="flo-right" >
                                        <a href="/index.php/Login/Myinfo" class="top-heada" >정보수정</a>
                                    </div>
                                    <?php
                                }else{
                                    ?>
                                    <div class="flo-right">
                                        <a href="/index.php/Register/Agree" class="top-heada" >회원가입</a>
                                    </div>
                                    <div class="flo-right" >
                                        <a href="/index.php/Register/Login" class="top-heada" >로그인</a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <?php
                                if($this->session->userdata('mb_level') =='10'){
                                    ?>
                                    <div class="flo-right" >
                                        <a href="/index.php/SuAdmin/" class="top-heada" >관리자</a>
                                    </div>
                                    <?php
                                }
                                ?>
                                <!--<div class="flo-right search_button" ><i class="fa fa-search" aria-hidden="true"></i></div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Content -->
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start" >
                            <div class="logo_container">
                                <a href="/index.php/main">
                                    <div class="logo_text"><img src="<?=base_url('assets/images/6e78fb0e6e9555e029ba.png')?>"><span></span></div>
                                </a>
                            </div>
                            <nav class="main_nav_contaner ml-auto">
                                <ul class="main_nav">
                                    <li id="header_info" class="active"><a href="#" >알림마당</a></li>
                                    <li><a href="#">부산 산업단지 정보</a></li>
                                    <li><a href="#">소통광장</a></li>
                                    <li><a href="#">기업경영실태조사</a></li>
                                    <!--<li id="header_introduce"><a href="#" >공단소개</a></li>-->
                                </ul>

                                <div class="hamburger menu_mm">
                                    <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="header_search_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
                            <form action="/Main/Search" class="header_search_form">
                                <input type="search" class="search_input" name="Searval" id="Searval" placeholder="Search" required="required">
                                <button class="header_search_button d-flex flex-column align-items-center justify-content-center" onclick="InSearch();">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="gnb_2dep" >
            <div class="container" style="padding:0px;">
                <div class="row">
                    <div class="col sub-col" >
                        <div class="sub-menu" style="">&nbsp;</div>
                        <div class="" style="float:right;">
                            <div class="sub-first">
                                <ul class="sub-menu-ul">
                                    <li><a href="/index.php/Info/notice" class="hvr-shutter-in-vertical">기업지원사업</a></li>
                                    <li><a href="/index.php/Info/parcelout_info" class="hvr-shutter-in-vertical">분양정보</a></li>
                                    <li><a href="/index.php/Info/disposal" class="hvr-shutter-in-vertical">산업단지 입주안내</a></li>
                                    <li><a href="/index.php/Movein/book" class="hvr-shutter-in-vertical">자료실</a></li>
                                </ul>
                            </div>
                            <div class="sub-two-block" style="margin-right: -5px;">
                                <ul class="sub-menu-ul">
                                    <li><a href="/index.php/Complex/Location" class="hvr-shutter-in-vertical">산업단지 개요</a></li>
                                    <li><a href="/index.php/management/instatus" class="hvr-shutter-in-vertical">산업단지 산업동향</a></li>
                                    <li><a href="/index.php/management/description" class="hvr-shutter-in-vertical">산업단지 업종검색</a></li>
                                    <li><a href="/index.php/Movein/current" class="hvr-shutter-in-vertical">산업단지 현황</a></li>
                                    <li><a href="/index.php/Movein/status" class="hvr-shutter-in-vertical">산단별 입주기업 정보</a></li>
                                    <li><a href="/index.php/management/movingin" class="hvr-shutter-in-vertical">입주기업체 검색</a></li>
                                    <li><a href="/index.php/management/agency" class="hvr-shutter-in-vertical">관리기관 정보</a></li>
                                    <li><a href="/index.php/management/notification" class="hvr-shutter-in-vertical">산업단지고시 정보</a></li>
                                </ul>
                            </div>

                            <div class="sub-menu1" style="margin-right: 95px;">
                                <ul class="sub-menu-ul">
                                    <!--<li><a href="/index.php/Communicat/inquire" class="hvr-shutter-in-vertical">질문·건의사항</a></li>-->
                                    <li><a href="/index.php/Communicat/faq" class="hvr-shutter-in-vertical">산업단지FAQ</a></li>
                                    <li><a href="/index.php/Support/prefer" class="hvr-shutter-in-vertical">기업사이트 특전</a></li>
                                    <!--<li><a href="/Support/health" class="hvr-shutter-in-vertical">건강관리서비스</a></li>-->
                                    <!--<li><a href="/Company/newly" class="hvr-shutter-in-vertical">신규거래처발굴</a></li>-->
                                </ul>
                            </div>
                            <div class="sub-menu1" style="margin-right: 10px;">
                                <ul class="sub-menu-ul">
                                    <li><a href="/index.php/State/survey" class="hvr-shutter-in-vertical">설문조사</a></li>
                                    <!--<li><a href="/Complex/Status" class="hvr-shutter-in-vertical">일반현황</a></li>
                                    <li><a href="/Complex/Area" class="hvr-nashutter-in-vertical">조성면적</a></li>
                                    <li><a href="/Complex/Map" class="hvr-shutter-in-vertical">공단위치도</a></li>-->
                                </ul>
                            </div>
                            <!--<div class="sub-menu2" >
                                <ul class="sub-menu-ul">
                                    <li><a href="/Introduce/greeting" class="hvr-shutter-in-vertical">CEO 인사말</a></li>
                                    <li><a href="/Introduce/history" class="hvr-shutter-in-vertical">설립 및 연혁</a></li>
                                    <li><a href="/Introduce/vision" class="hvr-shutter-in-vertical">비전 및 목표</a></li>
                                    <li><a href="/Introduce/organize" class="hvr-shutter-in-vertical">조직/기능</a></li>
                                    <li><a href="/Introduce/load" class="hvr-shutter-in-vertical">찾아오는길</a></li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu d-flex flex-column align-items-end justify-content-start text-left menu_mm trans_400">
        <div class="menu_close_container"><div class="menu_close" onclick="closeMenu();"><div></div><div></div></div></div>
        <nav class="menu_nav" style="width:100%">
            <ul class="menu_mm">
                <li class="menu_mm1">
                    <a href="#" class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>알림마당</a>
                    <ul>
                        <li><a href="/index.php/Info/notice" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>기업지원사업</a></li>
                        <li><a href="/index.php/Info/parcelout" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>분양정보</a></li>
                        <li><a href="/index.php/Info/disposal" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 입주안내</a></li>
                        <li><a href="/index.php/Movein/book" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>자료실</a></li>
                    </ul>
                </li>
                <li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>부산 산업 단지 정보</a>
                    <ul>
                        <li><a href="/index.php/Complex/Location" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 개요</a></li>
                        <li><a href="/index.php/management/trends" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 사업 동향</a></li>
                        <li><a href="/index.php/management/description" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 업종검색</a></li>
                        <li><a href="/index.php/Movein/current" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 현황</a></li>
                        <li><a href="/index.php/Movein/status" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>입주기업체 정보</a></li>
                        <li><a href="/index.php/management/movingin" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>입주기업체 검색</a></li>
                        <li><a href="/index.php/management/agency" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>관리기관 정보</a></li>
                        <li><a href="/index.php/management/notification" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지고시 정보</a></li>
                    </ul>
                </li>
                <li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>소통광장</a>
                    <ul >
                        <li><a href="/index.php/Communicat/inquire" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>질문·건의사항</a></li>
                        <li><a href="/index.php/Communicat/faq" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지FAQ</a></li>\
                        <li><a href="/index.php/Support/prefer" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>기업사이트 특전</a></li>
                    </ul>
                </li>
                <li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>기업경영실태조사</a>
                    <ul>
                        <li><a href="/index.php/State/survey" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>설문조사</a></li>
                    </ul>
                </li>
                <!--<li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>공단소개</a>
                    <ul>
                        <li><a href="/Introduce/greeting" class="hvr-grow">CEO 인사말</a></li>
                        <li><a href="/Introduce/history" class="hvr-grow">설립 및 연혁</a></li>
                        <li><a href="/Introduce/vision" class="hvr-grow">비전 및 목표</a></li>
                        <li><a href="/Introduce/organize" class="hvr-grow">조직/기능</a></li>
                        <li><a href="/Introduce/load" class="hvr-grow">찾아오는길</a></li>
                    </ul>
                </li>-->
            </ul>
        </nav>
    </div>
