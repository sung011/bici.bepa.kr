<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

<link rel="stylesheet" href="<?=base_url('assets/css/complex.css')?>">

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
                <!--
                <div class="board-title-image">
                    <div class="board-title-caption">
                        <h2 >단지안내</h2>
                        <span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
                    </div>
                </div>
                -->

                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>부산 산업 단지 정보</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table complex-block">
                    <!-- 20210426 전은신 추기-->
                    <div class="photo_frame mb_5">
                        <p>
                            <img alt="ULSAN INDUSTRIAL COMPLEX INFORMATION" src="<?=base_url('assets/images/compinfo_topbg.jpg')?>">
                        </p>
                    </div>
                    <div class="sub_docu">
                        <h2 class="sub_tit">산업단지 관리체계</h2>
                        <p class="txt_last">
                            산업단지 관리’라 함은 「산업입지 및 개발에 관한 법률」에 의하여 조성한 국가산업단지, 일반산업단지, 도시첨단산업단지,
                            농공단지에 대하여 관리기관으로 하여금 산업단지의 용지 및 시설의 매각·임대 및 사후관리, 기반시설의 설치·유지·보수 및 개량, 입주기업체 및 지원기관의 사업활동을 지원하는 것을 의미함
                        </p>
                        <p class="txt_last">
                            산업단지의 관리주체는 「산업집적활성화 및 공장설립에 관한 법률」에 의한 관리권자와 관리권자로부터 산업단지 관리업무를 수행하기 위하여 위임·위탁받은 <br />관리기관이 있음
                        </p>
                        <table class="Base">
                            <caption>산업단지 관리체계</caption>
                            <colgroup>
                                <col width="30%">
                                <col width="70%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">관리권자</th>
                                <th scope="col">관리기관</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">
                                    <p class="align_left">
                                        · 국가산업단지 : 산업통상자원부장관<br>
                                        · 일반, 도시첨단산업단지 : 시·도지사<br>
                                        · 농공단지 : 시장·군수·구청장<br>
                                    </p>
                                </th>
                                <td>
                                    <p class="align_left">
                                        · 관리권자 및 지방자치단체의 장<br>
                                        · 한국산업단지공단, 산업단지관리공단<br>
                                        · 입주기업체협의회<br>
                                        · 지방공사, 지역농업협동조합<br>
                                        · 중소기업협동조합<br>
                                        · 제주국제자유도시개발센터<br>
                                        · 산업기술단지를 조성·운영하기 위해 산업통상부장관이 지정하는 사업시행자<br>
                                        · 관리권자가 장으로 있는 지방자치단체의 조례로 정하는 관리업무를 수행할 능력이 있다고 인정되는 기관
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <h2 class="sub_main_tit">산업단지 관리업무의 범위(산업집적법 시행령 제5조 제1항)</h2>
                        <ul class="list_one">
                            <li>1. 산업단지관리기본계획의 수립 및 그 집행에 관한 업무</li>
                            <li>2. 공공시설, 지원시설 및 공동시설에 관한 계획의 수립과 그 설치 및 운영에 관한 업무</li>
                            <li>3. 산업용지의 매각ㆍ임대, 그 사후관리 및 산업단지의 입주에 관한 업무</li>
                            <li>4. 입주기업체 및 지원기관을 위한 공장ㆍ지식산업센터, 그 밖의 시설의 설치와 그 매각 및 임대에 관한 업무</li>
                            <li>5. 입주기업체 및 지원기관을 위한 용수ㆍ전기ㆍ증기ㆍ가스 및 유류의 공급에 관한 업무</li>
                            <li>6. 산업용지 및 시설의 설치ㆍ유지ㆍ보수 또는 개량에 따른 이용자로부터의 비용징수에 관한 업무</li>
                            <li>7. 산업단지구조고도화에 관한 업무</li>
                            <li>8. 입주기업에 대한 자금ㆍ기술ㆍ인력ㆍ판로 등의 지원에 관한 업무</li>
                            <li>9. 환경친화적 산업단지의 구축 및 환경오염방지에 관한 업무</li>
                            <li>10. 산업단지 안의 시설의 경비 및 산업재해예방에 관한 업무</li>
                            <li>11. 그 밖에 산업단지의 운영 및 입주기업체의 생산활동지원에 필요한 업무</li>
                        </ul>
                        <h2 class="sub_main_tit">부산지역 산업단지의 경우, 조성중인 산업단지는 관리권자가 관리하며, 조성완료 산업단지는 아래의 기관에 위임·위탁 관리</h2>
                        <ul class="list_one">
                            <li>- 국가산업단지는 관리권자인 산업통상자원부장관에 의하여 한국산업단지공단에 위탁(녹산)</li>
                            <li>- 일반산업단지 중 부산진해경제자유구역 내 신생산업단지의 경우는<br />
                                      부산진해경제자유구역청에 위임(생곡, 미음, 국제산업물류도시(1단계) 일반산업단지)</li>
                            <li>- 산업단지관리공단이 설립되어 있는 산업단지는 자체 관리공단에 관리업무 위탁(신평장림(기존), 명례일반산업단지)</li>
                            <li>- 신평장림일반산업단지 중 협업화 단지는 한국산업단지공단 사하사무소에 위탁</li>
                            <li>- 그 외 산업단지(일반산업단지 18개, 도시첨단산업단지 2개, 농공단지 1개)는 부산경제진흥원에 관리 위탁(관리일원화 추진)<br />
                                      ※ 부산광역시 산업용지 확충 등에 관한 조례 제7조의4(관리업무 위탁기관)</li>
                        </ul>
                        <h2 class="sub_tit">산업단지 관리기관 현황</h2>
                        <p class="dataSource">*신평장림일반산업단지의 경우, 기존단지와 협업화단지로 구분 관리</p>
                        <table class="Base">
                            <caption>산업단지 관리기관 현황</caption>
                            <colgroup>
                                <col width="5%">
                                <col width="18%">
                                <col>
                                <col width="30%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">연번</th>
                                <th scope="col">관리기관</th>
                                <th scope="col">관리 산업단지(조성완료)</th>
                                <th scope="col">관리기관 위치</th>
                                <th scope="col">문의처</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk3">
                                <th>1</th>
                                <td>부산광역시 산업입지과</td>
                                <td>(산업단지 관리 총괄)</td>
                                <td>연제구 중앙대로 1001(연산동, 부산광역시청)</td>
                                <td>051-888-4915</td>
                            </tr>
                            <tr class="chk3 sub_t">
                                <th rowspan="4" scope="row">2</th>
                                <td>부산경제진흥원</td>
                                <td>(21개 산업단지)</td>
                                <td>연제구 중앙대로 1090(연산동, 프라임시티빌딩)</td>
                                <td>051-600-1733</td>
                            </tr>
                            <tr>
                                <td>부산경제진흥원 동부사무소<br />
                                    (동부산권 10개소)</td>
                                <td>정관, 정관농공, 장안, 기룡1·2, 정관코리, 부산신소재, <br>반룡, 오리, 에코장안</td>
                                <td>기장군 장안읍 장안산단3로 43</td>
                                <td>051-728-8047</td>
                            </tr>
                            <tr>
                                <td>부산경제진흥원 서부사무소<br />
                                    (서부산권 9개소)</td>
                                <td>신호, 화전, 모라, 부산과학, 강서보고, 지사2, 성우, <br>풍상, 정주</td>
                                <td>강서구 녹산산단232로 38-26<br />
                                    (부산진해경제자유구역청 4층)</td>
                                <td>051-600-1832</td>
                            </tr>
                            <tr>
                                <td>부산경제진흥원 센텀사무소<br />
                                    (해운대·금정구 2개소)</td>
                                <td>센텀시티, 회동석대</td>
                                <td>해운대구 센텀서로 30, 907호(우동, KNN타워)</td>
                                <td>051-742-8701</td>
                            </tr>
                            <tr class="chk3">
                                <th>3</th>
                                <td><a href="https://www.kicox.or.kr/index.do" target="_blank">한국산업단지공단<br />
                                    (부산지역본부)</a></td>
                                <td>명지녹산 국가산업단지</td>
                                <td>강서구 녹산산단335로 5(송정동)</td>
                                <td>070-8895-7847</td>
                            </tr>
                            <tr class="chk3">
                                <th>4</th>
                                <td><a href="https://www.kicox.or.kr/index.do" target="_blank">한국산업단지공단<br />
                                    (사하사무소)</a></td>
                                <td>신평장림일반산업단지(협업화단지)</td>
                                <td>사하구 하신중앙로27번길 17, 104호<br />
                                    (장림동, 에이스밀)</td>
                                <td>070-8895-7861</td>
                            </tr>
                            <tr class="chk3">
                                <th>5</th>
                                <td><a href="https://www.bjfez.go.kr/main.web" target="_blank">부산진해경제자유구역청<br />
                                    (기업정책과)</a></td>
                                <td>생곡, 미음, 국제산업물류도시(1단계)</td>
                                <td>강서구 녹산산단232로 38-26<br />
                                    (부산진해경제자유구역청 1층)</td>
                                <td>051-979-5325</td>
                            </tr>
                            <tr class="chk3">
                                <th>6</th>
                                <td><a href="http://www.sjbu.com/" target="_blank">신평장림산업단지관리공단</a></td>
                                <td>신평장림일반산업단지(기존단지)</td>
                                <td>사하구 신산로 169(신평동)</td>
                                <td>051-205-0212</td>
                            </tr>
                            <tr class="chk3">
                                <th>7</th>
                                <td><a href="http://www.myoungrye.or.kr/" target="_blank">명례일반산업단지관리공단</a></td>
                                <td>명례일반산업단지</td>
                                <td>기장군 장안읍 명례산단5로 57-1</td>
                                <td>051-915-7772</td>
                            </tr>

                            </tbody>
                        </table>

                        <h2 class="sub_tit">산업단지 관련 입주기업 협의회 현황</h2>
                        <table class="Base">
                            <caption>산업단지 관련 입주기업 협의회 현황</caption>
                            <colgroup>
                                <col width="5%">
                                <col width="15%">
                                <col width="18%">
                                <col width="11%">
                                <col>
                                <col width="16%">
                                <col width="15%">
                            </colgroup>
                            <thead>
                            <tr>
                                <th scope="col">연번</th>
                                <th scope="col">단체명</th>
                                <th scope="col">대상 산업단지</th>
                                <th scope="col">설립연도</th>
                                <th scope="col">소재지</th>
                                <th scope="col">대표(업체)</th>
                                <th scope="col">문의처</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="chk3">
                                <th>1</th>
                                <td>부산지방정관산업단지<br />
                                    입주기업협의회</td>
                                <td>정관일반산업단지</td>
                                <td>2016년</td>
                                <td>기장군 정관읍 산단7로 89</td>
                                <td>노응범
                                    (동신제지)</td>
                                <td>051-728-2376</td>
                            </tr>
                            <tr class="chk3">
                                <th>2</th>
                                <td>정관농공단지<br />
                                    입주기업협의회</td>
                                <td>정관농공단지</td>
                                <td>1989년</td>
                                <td>기장군 정관읍 농공길 4</td>
                                <td>서영성
                                    (서일캐스팅)</td>
                                <td>051-728-5276</td>
                            </tr>
                            <tr class="chk3">
                                <th>3</th>
                                <td>녹산국가산단<br />
                                    경영자협의회</td>
                                <td>녹산국가산업단지</td>
                                <td>2001년</td>
                                <td>강서구 송정동 녹산산단335로 5</td>
                                <td>이남규
                                    (광명잉크제조)</td>
                                <td>051-831-7800</td>
                            </tr>
                            <tr class="chk3">
                                <th>4</th>
                                <td>반룡산업단지<br />
                                    입주기업협의회</td>
                                <td>반룡일반산업단지</td>
                                <td>2020년</td>
                                <td>기장군 장안읍 장안산단3로 43</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            </tbody>
                        </table>

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
</script>
</body>
</html>