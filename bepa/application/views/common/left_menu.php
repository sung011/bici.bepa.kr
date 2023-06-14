<div id='cssmenu' style="border:none;">
    <ul>
        <li class='active'><span>부산 산업단지 지원시스템</span><br><span class="pos"> </span></li>
        <li class='has-sub <?php if($menu == 'notify'){?>open<?php } ?> '><a href='#' id="company_menu01"><span>알림마당</span></a>
            <ul <?php if($menu == 'notify'){?>style="display: block;"<?php } ?>>
                <li><a href='/index.php/Info/notice' <?php if($sub_m == 'notify_1'){?>class="liactive" <?php }?> ><span>기업지원사업</span></a></li>
            
                <!-- <li><a href='/index.php/Info/parcelout' <?php if($sub_m == 'notify_2'){?>class="liactive" <?php }?> ><span>분양정보</span></a></li> -->

                <li class="has-sub"><a href="#"><span>분양정보</span></a>
                    <ul>
                        <li><a href="/index.php/Info/parcelout_info">산업단지 분양현황</a></li>
                        <li><a href="/index.php/Info/parcelout">분양 공고문</a></li>
                    </ul>
                </li>


                <li><a href='/index.php/Info/disposal'><span>입주업무 안내</span></a></li>
                <li><a href='/index.php/Movein/book' <?php if($sub_m == 'notify_3'){?>class="liactive" <?php }?> ><span>자료실</span></a></li>국가

            </ul>농공
        </li>


        <!-- <li class='has-sub'><a href='#' id="company_menu02"><span>부산 산업 단지 정보</span></a>
            <ul>
                <li><a href='/index.php/Complex/Location' ><span>산업단지 개요</span></a></li>
                <li><a href='/index.php/management/trends' ><span>산업단지 산업동향</span></a></li>
                <li class="has-sub"><a href='#' id="company_menu05"><span>산업단지 현황</span></a>
                    <ul>
                        <li><a href='/index.php/Movein/current'><span>일반산업단지</span></a></li>
                        <li><a href='/index.php/Movein/current_city'><span>도시첨단산업단지</span></a></li>
                        <li><a href='/index.php/Movein/current_agriculture'><span>농공단지</span></a></li>
                        <li class="last"><a href='/index.php/Movein/current_country'><span>국가산업단지</span></a></li>
                    </ul>
                </li>
                <li><a href='/index.php/Movein/status' ><span>입주기업체 정보</span></a></li>
                <li><a href='/index.php/management/movingin' ><span>산업단지 업종 검색</span></a></li>
                <li class='last'><a href='/index.php/management/agency'><span>관리기관 정보</span></a></li>
            </ul>
        </li> -->

        <li class="has-sub <?php if($menu == 'just'){?>open<?php } ?>"><a href="#" id="company_menu02"><span>부산 산업단지 정보</span></a>
            <ul <?php if($menu == 'just'){?>style="display: block;"<?php } ?>>
                <li><a href="/index.php/Complex/Location"><span>산업단지 개요</span></a></li>
                <li class="has-sub"><a href="#" ><span>산업단지 산업동향</span></a>
                    <ul>
                        <li><a href="/index.php/management/instatus">산업단지 입주 및 운영현황</a></li>
                        <li><a href="/index.php/management/trends">통계자료</a></li>
                    </ul>
                </li>
                <li><a href="/index.php/management/description"><span>산업단지 업종검색</span></a></li>
                <li class="has-sub"><a href="#" id="company_menu02"><span>산업단지 현황</span></a>
                    <ul>
                        <li><a href="/index.php/Movein/current"><span>일반산업단지</span></a></li>
                        <li><a href="/index.php/Movein/current_city"><span>도시첨단산업단지</span></a></li>
                        <li><a href="/index.php/Movein/current_agriculture"><span>농공단지</span></a></li>
                        <li class="last"><a href="/index.php/Movein/current_country"><span>국가산업단지</span></a></li>
                    </ul>
                </li>
                <li><a href="/index.php/Movein/status"><span>산단별 입주기업 정보</span></a></li>
                <li><a href="/index.php/management/movingin"><span>입주기업체 검색</span></a></li>
                <li><a href="/index.php/management/agency"><span>관리기관 정보</span></a></li>
                <li class="last"><a href="/index.php/management/notification" <?php if($sub_m == 'just_2'){?>class="liactive" <?php }?> ><span>산업단지고시 정보</span></a></li>
            </ul>
        </li>


        <li class='has-sub <?php if($menu == 'comm'){?>open<?php } ?>'><a href='#' id="company_menu04"><span>소통광장</span></a>
            <ul <?php if($menu == 'comm'){?>style="display: block;"<?php } ?>>
                <!--<li><a href='/index.php/Communicat/inquire' <?php if($sub_m == 'comm_1'){?>class="liactive" <?php }?>><span>질문·건의사항</span></a></li>-->
                <li><a href='/index.php/Communicat/faq' <?php if($sub_m == 'comm_2'){?>class="liactive" <?php }?>><span>산업단지FAQ</span></a></li>
                <li><a href='/index.php/Support/prefer' ><span>기업사이트 특전</span></a></li>
            </ul>
        </li>
        <li class='has-sub <?php if($menu == 'survey'){?>open<?php } ?>'><a href='#' id="company_menu03"><span>기업 경영 실태 조사</span></a>
            <ul <?php if($menu == 'survey'){?>style="display: block;"<?php } ?>>
                <li><a href='/index.php/State/survey'><span>설문조사</span></a></li>
            </ul>
        </li>

    </ul>
</div>