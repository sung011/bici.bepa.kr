<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/headermenu.php";
?>
<h2 class="tit_service"><!--OUR SERVICE--></h2>
<div class="service_box">
	<div class="service_di">
        <div class="service2">
			<a href="/index.php/Movein/current">
                <ul>
                    <li class="service_img"></li>
                </ul>
            </a>
		</div>
	</div>
    <div class="service_di">
        <div class="service">
			<a href="/index.php/Complex/Location">
                <ul>
                    <li class="service_img2" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>산업단지 정보</span>
                </ul>
            </a>
			<div style="padding-top:20px;"></div>
            <a href="/index.php/management/description">
                <ul>
                    <li class="service_img1" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>산업단지 업종검색</span>
                </ul>
            </a>
			<div style="padding-top:10px;"></div>
			<a href="/index.php/Movein/status">
                <ul>
                    <li class="service_img1" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>입주기업체 정보</span>
                </ul>
            </a>
        </div>
    </div>
    <div class="service_di">
        <div class="service">
			<a href="/index.php/Info/parcelout_info">
                <ul>
                    <li class="service_img4" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>분양정보</span>
                </ul>
            </a>
			<div style="padding-top:20px;"></div>
			<a href="/index.php/management/notification">
                <ul>
                    <li class="service_img3" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>산업단지 고시정보 </span>
                </ul>
            </a>
			<div style="padding-top:10px;"></div>
			<a href="/index.php/management/agency">
                <ul>
                    <li class="service_img3" style="font-size:20px;font-weight:700;padding-top:40px;color:#fff;"><span>관리기관(입주문의)</span>
                </ul>
            </a>
        </div>
    </div>
	<div class="service_di">
        <div class="service" style="width:34%">			
			<div style="padding-top:20px;"></div>
			<a href="/assets/files/01_부산 산업단지 현황도(전체).pdf" target="_blank">
                <ul>
                    <li class="service_img5" style="font-size:20px;font-weight:700;padding-top:15px;color:#000;"><span>부산산업단지 현황도</span>
                </ul>
            </a>
			<div style="padding-top:10px;"></div>
			<a href="https://kssc.kostat.go.kr:8443/ksscNew_web/kssc/common/ClassificationContent.do?gubun=1&strCategoryNameCode=001&categoryMenu=007&addGubun=no" target="_blank">
                <ul>
                    <li class="service_img5" style="font-size:20px;font-weight:700;padding-top:15px;color:#000;"><span>표준산업분류 검색</span>
                </ul>
            </a>
			<div style="padding-top:10px;"></div>
			<a href="http://www.eum.go.kr/web/mp/mpMapDet.jsp" target="_blank">
                <ul>
                    <li class="service_img5" style="font-size:20px;font-weight:700;padding-top:15px;color:#000;"><span>토지이용계획 열람</span>
                </ul>
            </a>
			<div style="padding-top:10px;"></div>
			<a href="https://www.busan.go.kr/economy/ahattraction001" target="_blank">
                <ul>
                    <li class="service_img5" style="font-size:20px;font-weight:700;padding-top:15px;color:#000;"><span>부산 투자기업 지원</span>
                </ul>
            </a>
        </div>
    </div>
</div>
<h2 class="tit_notice1"><span>NOTICE</span></h2>
<div class="notice_box">
    <div class="inner">
        <h2 class="tit_notice"><span>NOTICE</span></h2>
        <div class="notice">
            <ul>
                <li class="tit">공지사항<a href="/index.php/Info/notice"><span class="more">자세히보기</span></a></li>
                <?php
                if(is_array($NoticeData1)){
                    foreach ($NoticeData1 as $key => $val) {
                        ?>
                        <li class="list"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=<?=$val['wr_id']?>"><?=$val['wr_subject']?><br><span><?=$val['wr_1']?></span></a></li>
                        <?php
                    }
                }
                ?>
                <?php
                if(is_array($NoticeData)){
                    foreach ($NoticeData as $key => $val){
                        ?>
                        <li class="list"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=<?=$val['wr_id']?>"><span><?=$val['wr_subject']?></span> <em><?=$val['wr_1']?></em></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
        <div class="bidding">
            <ul>
                <li class="tit">분양정보<a href="/index.php/Info/parcelout"><span class="more">자세히보기</span></a></li>
                <?php
                if(is_array($returnData1)){
                    foreach ($returnData1 as $key => $val){
                        ?>
                        <li class="list"><a href="/index.php/info/read?bo_table=ym_tender&wr_id=<?=$val['wr_id']?>"><?=$val['wr_subject']?><br><span><?=substr($val['wr_datetime'],0,10)?></span></a></li>
                        <?php
                    }
                }
                ?>
                <?php
                if(is_array($returnData)){
                    foreach ($returnData as $key => $val){
                        ?>
                        <li class="list"><a href="/index.php/info/read?bo_table=ym_tender&wr_id=<?=$val['wr_id']?>"><span><?=$val['wr_subject']?></span> <em><?=substr($val['wr_datetime'],0,10)?></em></a></li>
                        <?php
                    }
                }
                ?>
            </ul>
        </div>
    </div>
</div>
<div class="banner">
    <ul class="owl-carousel owl-theme partners_slider">
        <?php
        if (is_array($BannerData)) {
            foreach ($BannerData as $key => $val) {
                ?>
                <li><a target="_blank" href="<?php echo $val['wr_link1']; ?>"><img src="/data/file/main_banner/<?php echo $val['bf_file']; ?>" alt=""><span class="hide">banner</span></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>
<div class="m_banner">
    <ul class="owl-carousel owl-theme partners_slider">
        <?php
        if (is_array($BannerData)) {
            foreach ($BannerData as $key => $val) {
                ?>
                <li><a target="_blank" href="<?php echo $val['wr_link1']; ?>"><img src="/data/file/main_banner/<?php echo $val['bf_file']; ?>" alt=""><span class="hide">banner</span></a></li>
                <?php
            }
        }
        ?>
    </ul>
</div>
<div class="footer">
    <div class="inner">
        <div class="f_logo"><img src="<?=base_url('assets/images/f_logo.png')?>" alt="logo"><span class="hide">부산광역시 산업단지 관리시스템</span></div>
        <div class="m_f_logo"><img src="<?=base_url('assets/images/m_f_logo.png')?>" alt="logo"><span class="hide">부산광역시 산업단지 관리시스템</span></div>
        <div class="copyright">
            <ul>
                <li><a href="/index.php/Terms/provision">이용약관</a></li>
                <li><a href="/index.php/Terms/privacy">개인정보처리방침</a></li>
                <li><a href="/index.php/Terms/emailembargo">이메일무단수집거부</a></li>
            </ul>

        </div>
        <div class="address">주소: 부산광역시 연제구 중앙대로 1090, <br>프라임시티 B/D 3,4층. <br>Tel : 051-600-1731~3. <br>Fax : 051-600-1802.</div>
        <div class="copy">Copyright © 2021 부산광역시 산업단지<br> all rights reserved.</div>
    </div>
</div>
</div>
<script src="<?= base_url('assets/styles/bootstrap4/popper.js') ?>"></script>
<script src="<?= base_url('assets/styles/bootstrap4/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-ui.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/scrollmagic/ScrollMagic.min.js') ?>"></script>
<script src="<?= base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js') ?>"></script>
<script src="<?= base_url('assets/js/custom.js') ?>"></script>
<script src="<?= base_url('assets/js/menu.js') ?>"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=eeda10ed03288a39a8e9d7d09d77fe85&libraries=services"></script>
<!--slick slider-->
<script>
    $(function() {
        $('#slider-div').slick({
            slide: 'div',
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            speed: 100,
            arrows: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 10000,
            pauseOnHover: true,
            vertical: false,
            prevArrow: "<button type='button' class='slick-prev'>Previous</button>",
            nextArrow: "<button type='button' class='slick-next'>Next</button>",
            dotsClass: "slick-dots",
            draggable: true,
            responsive: [
                {
                    breakpoint: 1240,
                    settings: {
                        slidesToShow: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]

        });
    })
</script>
</body>

</html>
