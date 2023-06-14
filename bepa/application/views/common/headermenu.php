<?php
$var = '210215_4';
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript" src="<?=base_url('assets/slick-1.8.1/slick/slick.min.js')?>"></script>
    <!--<script type="text/javascript" src="/application/views/common/js/sidemenu.js"></script>-->
    <title>부산광역시 산업단지 관리시스템</title>
    <meta name="description" content="부산광역시 산업단지 관리시스템 메인입니다.">
    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/slick-1.8.1/slick/slick.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/main_layout.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/main_reset.css')?>">
    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')?>">
    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')?>">
    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/animate.css')?>">

    <link rel="stylesheet" href="<?=base_url('assets/css/nanumbarungothic.css')?>" />
    <!--<link rel="stylesheet" type="text/css" href="/application/views/common/styles/bootstrap4/bootstrap.min.css?ver=<?/* echo $var */?>">-->
    <link href="<?=base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css')?>" rel="stylesheet" type="text/css">

    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')?>">
    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')?>">
    <link rel="stylesheet" type="text/css"
          href="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/animate.css')?>">

    <!--<link rel="stylesheet" type="text/css" href="/application/views/common/styles/main_styles.css?ver=<?/*echo $var */?>">-->

    <!--<link rel="stylesheet" type="text/css" href="/application/views/common/css/nabis.css?ver=<?/* echo $var */?>">-->
    <!--<link rel="stylesheet" type="text/css" href="/application/views/common/css/tjdska.css?ver=<?/* echo $var */?>">-->
</head>
<script>
    //로그인아이콘 리스트 열기
    $(document).on("click", ".btn-open", function (e) {
        var target = $(this).attr("href");
        $(target).addClass("show");
    });

    // 외부영역 클릭 시 리스트닫기
    $(document).mouseup(function (e) {
        var LayerPopup = $(".info");
        if (LayerPopup.has(e.target).length === 0) {
            LayerPopup.removeClass("show");
        }
    });

</script>
<style>
.test_text {
	text-shadow: -1px 0 #fff, 0 1px #fff, 1px 0 #fff, 0 -1px #fff;
}
</style>
<body>
<div class="wrapper">
    <div class="visual_box">
        <div class="txt">
            <ul>
                <li class="test_text">부산광역시 산업단지 지원시스템<br><span>BUSAN INDUSTRIAL COMPLEX<br>SUPPORT SYSTEM</span></li>
            </ul>
        </div>
        <div class="slidebox" style="margin-top: -15px;">
            <div id="slider-div">
                <div class="img1"></div>
                <div class="img3"></div>
            </div>
        </div>
        <div class="brb"></div>
        <div class="header">
            <div class="gnb">
                <ul>
                    <li><a href="#-">알림마당</a>
                        <ul>
                            <li>
                                <dl>
                                    <dd><a href="<?=base_url('index.php/Info/notice')?>">기업지원사업</a></dd>
                                    <dd><a href="/index.php/Info/parcelout">분양정보</a></dd>
                                    <dd><a href="/index.php/Info/disposal">산업단지 입주안내</a></dd>
                                    <dd><a href="/index.php/Movein/book">자료실</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/Complex/Location">산업단지 개요</a></dd>
                                    <dd><a href="/index.php/management/instatus">산업단지 산업동향</a></dd>
                                    <dd><a href="/index.php/Movein/current">산업단지 현황</a></dd>
                                    <dd><a href="/index.php/Movein/status">입주기업체 정보</a></dd>                                                                                                                                                                                  
                                    <dd><a href="/index.php/management/movingin">산업단지 업종 검색</a></dd>
                                    <dd><a href="/index.php/management/agency">관리기관 정보</a></dd>
                                    <dd><a href="/index.php/management/notification">산업단지고시 정보</a></dd>
                                </dl>
                                <dl>
                                    <!--<dd><a href="/index.php/Communicat/inquire">질문·건의사항</a></dd>-->
                                    <dd><a href="/index.php/Communicat/faq">산업단지FAQ</a></dd>
                                    <dd><a href="/index.php/Support/prefer">기업사이트 특전</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/State/survey">설문조사</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#-">부산 산업단지 정보</a>
                        <ul>
                            <li>
                                <dl>
                                    <dd><a href="/index.php/Info/notice">기업지원사업</a></dd>
                                    <dd><a href="/index.php/Info/parcelout">분양정보</a></dd>
                                    <dd><a href="/index.php/Info/disposal">산업단지 입주안내</a></dd>
                                    <dd><a href="/index.php/Movein/book">자료실</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/Complex/Location">산업단지 개요</a></dd>
                                    <dd><a href="/index.php/management/instatus">산업단지 산업동향</a></dd>
                                    <dd><a href="/index.php/management/description">산업단지 업종검색</a></dd>
                                    <dd><a href="/index.php/Movein/current">산업단지 현황</a></dd>
                                    <dd><a href="/index.php/Movein/status">산단별 입주기업 정보</a></dd>
                                    <dd><a href="/index.php/management/movingin">입주기업체 검색</a></dd>
                                    <dd><a href="/index.php/management/agency">관리기관 정보</a></dd>
                                    <dd><a href="/index.php/management/notification">산업단지고시 정보</a></dd>
                                </dl>
                                <dl>
                                    <!--<dd><a href="/index.php/Communicat/inquire">질문·건의사항</a></dd>-->
                                    <dd><a href="/index.php/Communicat/faq">산업단지FAQ</a></dd>
                                    <dd><a href="/index.php/Support/prefer">기업사이트 특전</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/State/survey">설문조사</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#-">소통광장</a>
                        <ul>
                            <li>
                                <dl>
                                    <dd><a href="/index.php/Info/notice">기업지원사업</a></dd>
                                    <dd><a href="/index.php/Info/parcelout">분양정보</a></dd>
                                    <dd><a href="/index.php/Info/disposal">산업단지 입주안내</a></dd>
                                    <dd><a href="/index.php/Movein/book">자료실</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/Complex/Location">산업단지 개요</a></dd>
                                    <dd><a href="/index.php/management/trends">산업단지 산업동향</a></dd>
                                    <dd><a href="/index.php/Movein/current">산업단지 현황</a></dd>
                                    <dd><a href="/index.php/Movein/status">입주기업체 정보</a></dd>
                                    <dd><a href="/index.php/management/movingin">입주기업체 검색</a></dd>
                                    <dd><a href="/index.php/management/agency">관리기관 정보</a></dd>
                                    <dd><a href="/index.php/management/notification">산업단지고시 정보</a></dd>
                                </dl>
                                <dl>
                                    <!--<dd><a href="/index.php/Communicat/inquire">질문·건의사항</a></dd>-->
                                    <dd><a href="/index.php/Communicat/faq">산업단지FAQ</a></dd>
                                    <dd><a href="/index.php/Support/prefer">기업사이트 특전</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/State/survey">설문조사</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#-">기업경영실태 조사</a>
                        <ul>
                            <li>
                                <dl>
                                    <dd><a href="/index.php/Info/notice">기업지원사업</a></dd>
                                    <dd><a href="/index.php/Info/parcelout">분양정보</a></dd>
                                    <dd><a href="/index.php/Info/disposal">산업단지 입주안내</a></dd>
                                    <dd><a href="/index.php/Movein/book">자료실</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/Complex/Location">산업단지 개요</a></dd>
                                    <dd><a href="/index.php/management/trends">산업단지 산업동향</a></dd>
                                    <dd><a href="/index.php/Movein/current">산업단지 현황</a></dd>
                                    <dd><a href="/index.php/Movein/status">입주기업체 정보</a></dd>
                                    <dd><a href="/index.php/management/movingin">입주기업체 검색</a></dd>
                                    <dd><a href="/index.php/management/agency">관리기관 정보</a></dd>
                                    <dd><a href="/index.php/management/notification">산업단지고시 정보</a></dd>
                                </dl>
                                <dl>
                                    <!--<dd><a href="/index.php/Communicat/inquire">질문·건의사항</a></dd>-->
                                    <dd><a href="/index.php/Communicat/faq">산업단지FAQ</a></dd>
                                    <dd><a href="/index.php/Support/prefer">기업사이트 특전</a></dd>
                                </dl>
                                <dl>
                                    <dd><a href="/index.php/State/survey">설문조사</a></dd>
                                </dl>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="headerbx">
                <h1 class="logo"><a href="/index.php/main"><img src="<?=base_url('assets/images/logo.png')?>" alt="로고"><span
                                class="hide">부산광역시 산업단지 관리시스템</span></a></h1>

                <div class="s_l_box">

                    <ul>
                        <!--<li class="search"><a href="#-"></a></li>-->
                        <!--로그인 했을때-->
                        <?php

                        if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
                            ?>
                            <li class="login"><a href="#info" class="btn-open"></a>
                                <div>
                                    <dl class="loglist info" id="info">
                                        <dd><a href="/index.php/Login/LogOut">로그아웃</a></dd>
                                        <dd><a href="/index.php/Login/Myinfo">정보수정</a></dd>
                                        <?php
                                        if($this->session->userdata('mb_level') =='10'){
                                            ?>
                                            <dd><a href=/index.php/SuAdmin/">관리자</a></dd>
                                            <?php
                                        }
                                        ?>
                                    </dl>
                                </div>
                            </li>
                            <?php
                        }else{
                            ?>
                            <!--로그인 안 했을때-->
                            <li class="logout"><a href="#info" class="btn-open"></a>
                                <div>
                                    <dl class="loglist info" id="info">
                                        <dd><a href="/index.php/Register/Login">로그인</a></dd>

                                        <dd><a href="/index.php/Register/Agree">회원가입</a></dd>

                                    </dl>
                                </div>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <!--change color bar pc-->
        <script>
            $(function () {
                var rollHeader = 100;
                $(window).scroll(function () {
                    var scroll = getCurrentScroll();
                    if (scroll >= rollHeader) {
                        $('.header').addClass('roll');
                    } else {
                        $('.header').removeClass('roll');
                    }
                });

                function getCurrentScroll() {
                    return window.pageYOffset || document.documentElement.scrollTop;
                }
            });

        </script>
        <div class="m_header">
            <div class="navi">
                <h1 class="m_logo"><a href="/index.php/main"><img src="/assets/images/m_logo.png" alt="로고"><span
                                class="hide">부산광역시 산업단지 관리시스템</span></a></h1>

                <?php
                if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
                    ?>
                    <!--로그인 했을때-->
                    <div class="login"><a href="#info1" class="btn-open"><span></span></a>
                        <dl class="loglist info" id="info1">

                            <dd><a href="/index.php/Login/LogOut">로그아웃</a></dd>
                            <dd><a href="/index.php/Login/Myinfo">정보수정</a></dd>
                            <?php
                            if($this->session->userdata('mb_level') =='10'){
                                ?>
                                <dd><a href=/index.php/SuAdmin/">관리자</a></dd>
                                <?php
                            }
                            ?>
                        </dl>
                    </div>
                    <?php
                }else{
                    ?>
                    <!--로그인 안 했을때-->
                    <div class="logout"><a href="#info1" class="btn-open"><span></span></a>
                        <dl class="loglist info" id="info1">
                            <dd><a href="/index.php/Register/Login">로그인</a></dd>
                            <dd><a href="/index.php/Register/Agree">회원가입</a></dd>
                        </dl>
                    </div>
                    <?php
                }
                ?>


                <div class="ham_menu hamburger " id="hamburger">
                    <span class="line"></span>
                    <span class="line"></span>
                    <span class="line"></span>
                </div>
                <!-- hamburger script-->
                <script>
                    $(document).ready(function () {
                        $(".hamburger").click(function () {
                            $(this).toggleClass("is-active");
                        });
                    });

                </script>
                <nav>
                    <ul>
                        <li class="tit">알림마당</li>
                        <li><a href="/index.php/Info/notice">기업지원사업</a></li>
                        <li><a href="/index.php/Info/parcelout">분양정보</a></li>
                        <li><a href="/index.php/Info/disposal">산업단지 입주안내</a></li>
                        <li><a href="/index.php/Movein/book">자료실</a></li>
                        <li class="tit">부산 산업단지 정보</li>
                        <li><a href="/index.php/Complex/Location">산업단지 개요</a></li>
                        <li><a href="/index.php/management/trends">산업단지 산업동향</a></li>
                        <li><a href="/index.php/Movein/current">산업단지 현황</a></li>
                        <li><a href="/index.php/Movein/status">입주기업체 정보</a></li>
                        <li><a href="/index.php/management/movingin">입주기업체 검색S</a></li>
                        <li><a href="/index.php/management/agency">관리기관 정보</a></li>
                        <dd><a href="/index.php/management/notification">산업단지고시 정보</a></dd>
                        <li class="tit">소통광장</li>
                        <li><a href="/index.php/Communicat/inquire">질문·건의사항</a></li>
                        <li><a href="/index.php/Communicat/faq">산업단지FAQ</a></li>
                        <li class="tit">기업경영실태 조사</li>
                        <li><a href="/index.php/State/survey">설문조사</a></li>
                    </ul>
                </nav>
                <!-- sidemenu script-->
                <script>
                    $(document).ready(function () {
                        $('.ham_menu').click(function () {
                            $('nav').toggleClass('active')
                        })
                    })

                </script>
            </div>
        </div>
        <!--change color bar mobile_tablet-->
        <script>
            $(function () {
                var rollHeader = 100;
                $(window).scroll(function () {
                    var scroll = getCurrentScroll();
                    if (scroll >= rollHeader) {
                        $('.m_header').addClass('roll');
                    } else {
                        $('.m_header').removeClass('roll');
                    }
                });

                function getCurrentScroll() {
                    return window.pageYOffset || document.documentElement.scrollTop;
                }
            });

        </script>
    </div>
