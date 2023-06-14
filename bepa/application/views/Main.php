<?php
//print_r($NoticeData);
//exit;
include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/header.php";
?>
<style>

    .main-link2 {
        color: #333;
        font-weight: 700;
        text-transform: uppercase;
        text-decoration: none;
    }

    /*
    .main-link2:hover{
        text-decoration: underline;
    }
    */
    [class^="link-"] {
        display: inline-block;
    }

    /* linkone */
    .link-1 a:before, .link-1 a:after {
        content: '';
        border-bottom: solid 2px #1d72c8;
        position: absolute;
        bottom: 0;
        width: 0;
    }

    .link-1 a:before {
        left: 0;
    }

    .link-1 a:after {
        right: 0;
    }

    .link-1 a:hover:before, .link-1 a:hover:after {
        width: 50%;
    }

    .link-1 a:before, .link-1 a:after {
        -webkit-transition: all 0.2s ease;
        transition: all 0.2s ease;
    }

    .box-height {
        padding: 17px;
    }

    .box.box-first {
        border-top-color: #2b5bbb;
    }

    .team_image:hover, .team_image:focus, .team_image:active {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
        border-radius: 4px;
        transition: all .3s linear;
    }

    .team_col {
        cursor: pointer;
    }

    .section_title {
        cursor: pointer;
    }

    .section_title:hover {
        transform: scale(1.1);
        border-radius: 4px;
        transition: all .3s linear;
    }

    .btn-box-tool {
        cursor: pointer;
    }

    .btn-box-tool:hover {
        transform: scale(1.3);
        border-radius: 4px;
        transition: all .3s linear;
    }

</style>
<!-- Home -->

<div class="home" style="margin:0px;">
    <div class="home_slider_container">

        <!-- Home Slider -->
        <div class="owl-carousel owl-theme home_slider">

            <!-- Home Slider Item -->
            <div class="owl-item">
                <div class="home_slider_background" style="top:120px;">
                    <img src="/application/views/common/images/main_img01.jpg" class="slide-img">
                </div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">

                            <div class="col text-center">
                                <div class="home_slider_title"><br><br><br></div>
                                <div class="home_slider_subtitle"
                                     style="color:#fff;text-shadow: 0px 0px 7px #000;font-size:40px;">
                                    <strong>
                                        <span class="line_l1"><span class="line_l2">스타트업 활성화와</span> <span
                                                    class="line_l2">비즈니스 지원플랫폼으로</span></span>
                                        <br>
                                        <span class="line_l1"><span class="line_l2">창업하기 좋은</span> <span
                                                    class="line_l2">부산산업단지지원시스템</span></span></strong>
                                </div>
                                <div class="home_slider_form_container">

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="home_slider_background" style="top:120px;">
                    <img src="/application/views/common/images/main_img02.jpg" class="slide-img">
                </div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="home_slider_title"><br><br><br></div>
                                <div class="home_slider_subtitle" style="color:#fff;font-size:40px;">
                                    <strong>
                                        <span class="line_l1"><span class="line_l2">일자리 창출과</span> <span
                                                    class="line_l2">기업성장 지원으로</span></span>
                                        <br>
                                        <span class="line_l1"><span class="line_l2">사람과 기업이 행복한</span> <span
                                                    class="line_l2">부산산업단지지원시스템</span></span></strong>
                                </div>
                                <div class="home_slider_form_container">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="home_slider_background" style="top:120px;">
                    <img src="/application/views/common/images/main_img03.jpg" class="slide-img">
                </div>
                <div class="home_slider_content">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="home_slider_title"><br><br><br></div>
                                <div class="home_slider_subtitle" style="color:#fff;font-size:40px;">
                                    <strong>
                                        <span class="line_l1"><span class="line_l2">제조 첨단산업 융합과</span> <span
                                                    class="line_l2">경쟁력 강화 생태계</span></span>
                                        <br>
                                        <span class="line_l1"><span class="line_l2">구축으로 기업하기 좋은</span> <span
                                                    class="line_l2">부산산업단지지원시스템</span></span></strong>
                                </div>
                                <div class="home_slider_form_container">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-item">
                <div class="home_slider_background" style="top:120px;">
                    <img src="/application/views/common/images/main_img04.jpg" class="slide-img">
                </div>
                <div class="home_slider_content">
                    <!--
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <div class="home_slider_title"><br><br><br></div>
                                <div class="home_slider_subtitle" style="color:#fff;font-size:40px;">
                                    <strong>
                                    <span class="line_l1"><span class="line_l2">거래처 관리</span> <span class="line_l2">명함 관리</span></span>
                                    <br>
                                    <span class="line_l1"><span class="line_l2">공유 플랫폼 제공하는</span> <span class="line_l2">성남하이테크밸리</span></span></strong>
                                </div>
                                <div class="home_slider_form_container">
                                </div>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
    <!-- Home Slider Nav -->
    <div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
    <div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
</div>

<!-- Features -->

<div class="features" style="">
    <div class="contents_title_bar">
        <div class="contents_title">
            <h2>BEPA</h2>
            <h4>부산광역시 산업용지 관리시스템</h4>
        </div>

    </div>
    <div class="container" style="margin: 40px auto;">
        <div class="row features_row" style="">
            <!-- 공단구역 상세도 -->
            <div class="feature_col">
                <a href="/Complex/Map" class='main-link'>
                    <div class="small-box" style="background:#29b8a6;height:202px;">
                        <div class="inner">
                            <div class="icon">
                                <img src="/application/views/common/images/main_icon01.png">
                            </div>
                            <p style="color:#fff;">공단구역을 한눈에 볼 수 있습니다.</p>
                        </div>
                        <div class="inner_bottom">
                            <h3>공단구역 상세도</h3>
                        </div>
                        <!--<a href="/Complex/Map" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </a>
            </div>

            <!-- 민원서식 -->
            <div class="feature_col">
                <a href="/Movein/book" class='main-link'>
                    <div class="small-box" style="background:#32a6d9;height:202px;">
                        <div class="inner">
                            <div class="icon">
                                <img src="/application/views/common/images/main_icon02.png">
                            </div>
                            <p style="color:#fff;">필요한 민원서식을 다운받으세요</p>
                        </div>
                        <div class="inner_bottom">
                            <h3>민원서식</h3>
                        </div>
                        <!-- <a href="/Support/prefer" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </a>
            </div>
            <!-- 기업특전 -->
            <div class="feature_col">
                <a href="/Movein/book" class='main-link'>
                    <div class="small-box" style="background:#2977b7;height:202px;">
                        <div class="inner">
                            <div class="icon">
                                <img src="/application/views/common/images/main_icon03.png">
                            </div>
                            <p style="color:#fff;">기업특전을 확인하세요</p>
                        </div>
                        <div class="inner_bottom">
                            <h3>기업특전</h3>
                        </div>
                        <!-- <a href="/Movein/book" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </a>
            </div>
            <!-- 산업용지관리시스템 -->
            <div class="feature_col" style="">
                <a href="/Support/space" class='main-link'>
                    <div class="small-box" style="background:#896aae;height:202px;">
                        <div class="inner">
                            <div class="icon">
                                <img src="/application/views/common/images/main_icon04.png">
                            </div>
                            <p style="color:#fff;">산업용지관리시스템 이용</p>
                        </div>
                        <div class="inner_bottom">
                            <h3>산업용지관리시스템</h3>
                        </div>

                        <!--<a href="/Support/space" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- notices -->
    <div class="notices_wrap">
        <div class="block_pad notice_wr" style="">
            <div class="counter_left_img">
                <img src="/application/views/common/images/main_notice_img.jpg">
            </div>

            <div class="counter_content" style="">
                <div class="counter_title">
                    <div class="main_notice">
                        <h3 class="box-title">Notice</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool"
                                    onclick="javascript:location.href='/info/notice';">more
                            </button>
                        </div>
                    </div>
                    <div class="box-body" style="height:280px;">
                        <ul class="todo-list2">
                            <?php
                            if (is_array($NoticeData)) {
                                foreach ($NoticeData as $key => $val) {
                                    ?>
                                    <li onclick="location.href='/info/read?bo_table=ym_notice&wr_id=<?php echo $val['wr_id']; ?>'" style="cursor: pointer">
                                        <div class="link-1">
                                            <a href='/info/read?bo_table=ym_notice&wr_id=<?php echo $val['wr_id']; ?>'
                                               class='main-link2'><?php echo $val['wr_subject']; ?></a>
                                        </div>
                                        <div class="tools" style="text-align:right;color: #666;">
                                            <?php echo $val['wr_last']; ?>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- 배너 -->
<div class="partners" style="border-top:1px solid #eee;">
    <div class="container">
        <div class="row">
            <div class="col">

                <div class="partners_slider_container">
                    <div class="owl-carousel owl-theme partners_slider">
                        <?php
                        if (is_array($BannerData)) {
                            foreach ($BannerData as $key => $val) {
                                ?>
                                <div class="owl-item partner_item">
                                    <a target="_blank" href="<?php echo $val['wr_link1']; ?>"><img src="/data/file/main_banner/<?php echo $val['bf_file']; ?>" alt=""></a>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
?>

<style>
    .modal-con img {
        width: 100%;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="PopupModal" tabindex="-1" role="dialog">
    <div class="modal-dialog popup-dialog">
        <div class="modal-content">
            <div class="modal-header popup-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align:center;">
                <?php
                if (is_array($PopupData)) {
                    foreach ($PopupData as $key => $val) {
                        ?>
                        <!--	<h2><?php echo $val['nw_subject']; ?></h2>-->
                        <div class="modal-con modal-swipe" style="padding:0px;">
                            <?= str_replace('http', 'https', $val['nw_content']); ?>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="home_slider_nav pop_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                <div class="home_slider_nav pop_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="Popup_cookie();">24시간 동안 열지 않기</button>
            </div>
        </div>
    </div>
</div>
<style>
    .pop_slider_prev{
        left: 75px;
    }
    .pop_slider_next {
        right: 75px;
    }
</style>
<script>
    var count = 0;
    $(function () {
        $('.modal-swipe').hide();
        $('.modal-swipe').eq(count).show();
        var modal_length = $('.modal-swipe').length;
        setInterval(function () {
            count ++;
            if(modal_length <= count){
                count = 0;
            }
            $('.modal-swipe').hide();
            $('.modal-swipe').eq(count).toggle( "slide" );
        }, 3000);

        $('.pop_slider_next').on('click', function () {
            count ++;
            if(modal_length <= count){
                count = 0;
            }
            $('.modal-swipe').hide();
            $('.modal-swipe').eq(count).toggle( "slide" );
        });
        $('.pop_slider_prev').on('click', function () {
            count --;
            if(count <= -1){
                count = modal_length - 1;
            }
            $('.modal-swipe').hide();
            $('.modal-swipe').eq(count).toggle( "slide" );
        });
    });

    function photo_page() {
        location.href = "/index.php/info/photo";
    }

    function photo_read(wid) {
        location.href = '/index.php/info/read?bo_table=ym_photo&wr_id=' + wid;
    }

    function Popup_cookie() {
        setCookieMobile("todayCookie", "done", 1);
        //setCookieMobile( "todayCookie", "" , -1);
        $("#PopupModal").modal('hide');
    }

    function setCookieMobile(name, value, expiredays) {
        var todayDate = new Date();
        todayDate.setDate(todayDate.getDate() + expiredays);
        document.cookie = name + "=" + escape(value) + "; path=/; expires=" + todayDate.toGMTString() + ";"
    }

    function getCookie(name) {
        var value = document.cookie.match('(^|;) ?' + name + '=([^;]*)(;|$)');
        return value ? value[2] : null;
    }

    function getCookieMobile() {
        var cookiedata = document.cookie;
        if (getCookie('todayCookie') == "done") {
            $("#PopupModal").modal('hide');
        } else {
            $("#PopupModal").modal('show');
        }
    }
    getCookieMobile();
</script>

