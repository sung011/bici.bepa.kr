<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<!-- Features -->
<div class="features">
    <div class="container">
        <div class="features_row row">
            <!-- Features Item -->
            <div class="feature_col col-lg-3 block_pad bg-white m-hidden" style="min-height: 50vh">
                <!-- left menu -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>
            </div>
            <!-- Features Item -->
            <div class="col-xs-12 col-lg-9 feature_col block_pad bg-white">
                <div class="notice_title">
                    <h2><?= $bo_subject ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>알림마당</li>
                                            <li><?= $bo_subject ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notice_table complex-block">
                	<div class="sub_docu">
                        <h2 class="sub_tit">산업단지 분양현황<h2>
                        <table class="Base" id="comp_div_table" class="mb-0">                     
                            <thead>
                                <tr>
                                    <th width="17%">산업단지명</th>
                                    <th width="11%">소재지</th>
                                    <th width="12%">산업용지 총면적<br>(m<sup>2</sup>)</th>
                                    <th width="8%">조성원가<br>(원/m<sup>2</sup>)</th>
                                    <th width="14%">문의처</th>
                                    <th width="13%">비고</th>
                                    <th>링크</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>오리<br>일반산업단지</td>
                                    <td>기장군 장안읍</td>
                                    <td>393,536</td>
                                    <td>382,827</td>
                                    <td>부산도시공사<br>(051-810-1272)</td>
                                    <td>분양매물목록 확인</td>
                                    <td><a href="https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=40&mId=0101020300" target="_blank">https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=40&mId=0101020300</a></td>
                                </tr>
                                <!-- <tr>
                                    <td>생곡<br>일반산업단지</td>
                                    <td>강서구 생곡동</td>
                                    <td>333,174</td>
                                    <td>585,084</td>
                                    <td>부산도시공사<br>(051-810-1255)</td>
                                    <td>분양매물목록 확인</td>
                                    <td><a href="https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=45&mId=0101020800" target="_blank">https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=45&mId=0101020800</a></td>
                                </tr> -->
                                <tr>
                                    <td>미음<br>일반산업단지</td>
                                    <td>강서구 <br>구랑동,미음동</td>
                                    <td>1,927,040</td>
                                    <td>509,425</td>
                                    <td>부산도시공사<br>(051-810-1255)</td>
                                    <td>분양매물목록 확인</td>
                                    <td><a href="https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=1&mId=0101020600" target="_blank">https://www.bmc.busan.kr/bmc/buy/list.do?searchArea=1&mId=0101020600</a></td>
                                </tr>
                                <tr>
                                    <td>국제산업물류도시(1단계)<br>일반산업단지</td>
                                    <td>강서구 <br>미음동,녹산동,<br>송정동</td>
                                    <td>3,185,757</td>
                                    <td>628,874</td>
                                    <td>부산도시공사<br>(051-810-1273)</td>
                                    <td>분양매물목록 확인</td>
                                    <td><a href="https://www.bmc.busan.kr/bmc/buy/list.do?mId=0101020100" target="_blank">https://www.bmc.busan.kr/bmc/buy/list.do?mId=0101020100</a></td>
                                </tr>
                                <tr>
                                    <td>동남권방사선의과학<br>일반산업단지<br>(조성중)</td>
                                    <td>기장군 장안읍</td>
                                    <td>726,336</td>
                                    <td>419,000</td>
                                    <td>기장군<br>(051-709-4717)</td>
                                    <td>분양공고문 확인</td>
                                    <td><a href="/assets/files/동남권방사선의과학일반산업단지분양공고문_5차일반분양.pdf" target="_blank">동남권방사선의과학일반산업단지분양공고문_5차일반분양.pdf</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/footer.php'; ?>