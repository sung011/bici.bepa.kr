<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

<link rel="stylesheet" href="<?=base_url('assets/css/complex.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/disposal.css')?>">


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
                                            <li>알림마당</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table complex-block" >
                    <!-- 20210504 전은신 입주업무 안내 -->
                    <div class="sub_docu">
                        <h2 class="sub_tit">공장등록 행정절차</h2>
                        <div class="rentbox">
                            <ol>
                                <li class="step_box01 heightR arrowR">
                                    <div class="fix bg01">
                                        <h3>
                                            STEP 01<br>
                                            <span>공장 양수 또는 임차</span>
                                        </h3>
                                        <ul class="basic">
                                            <li>제한업종 등 산업단지 입주 가능 여부 확인
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="step_box01 heightR arrowR">
                                    <div class="fix bg03">
                                        <h3>
                                            STEP 02<br>
                                            <span>입주계약 체결</span>
                                        </h3>
                                        <ul class="basic">
                                            <li>필요서류 [자가]
                                                <ul>
                                                    <li>처분신고서*</li>
													<li>부동산매매계약서</li>
													<li>토지‧건물등기부등본</li>
													<li>입주계약신청서*</li>
													<li>사업계획서*</li>
                                                </ul>
                                            </li>
											<li>필요서류 [임대]
                                                <ul>
                                                    <li>임대신고서*</li>
													<li>부동산임대차계약서</li>
													<li>토지‧건물등기부등본</li>
													<li>입주계약신청서*</li>
													<li>사업계획서*</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <!--<li class="step_box01 heightR arrowR">
                                    <div class="fix bg03">
                                        <h3>
                                            STEP 03<br>
                                            <span>소유권 이전</span>
                                        </h3>
                                        <ul class="basic">
                                            <li>(시) 잔금완납 여부를 확인 후 <strong class="point_b_blue">소유권 이전 위임장 발급</strong>
                                            </li>
                                            <li>(입주업체) 소유권 이전등기</li>
                                        </ul>
                                    </div>
                                </li>-->
                                <li class="step_box01 heightR arrowR">
                                    <div class="fix bg04">
                                        <h3>
                                            STEP 03<br>
                                            <span>공장설립 완료신고</span>
                                        </h3>
                                        <ul class="basic">
											<li>담당자 직접 공장 방문</li>
                                            <li>안내
                                                <ul>
                                                    <li>유선, 팩스 등을 통하여 신고하시면 담당자가 직접 공장을 방문하여 완료신고를 도와드립니다.</li>
                                                </ul>
                                            </li>
											<li>필요서류
                                                <ul>
                                                    <li>완료신고서*</li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="step_box01 heightR arrowR">
                                    <div class="fix bg05">
                                        <h3>
                                            STEP 04<br>
                                            <span>공장설립(등록) 완료</span>
                                        </h3>
                                        <ul class="basic">
                                            <li>공장등록증명서 발급
                                                <ul>
                                                    <li><a href="https://www.factoryon.go.kr/" target="_blank">www.factoryon.go.kr</a> 에서 출력 가능</li>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </div>
                                </li>
                            </ol>
                        </div>

                        <ul class="basic">
                            <li class="mb_2">
                                <h2 class="sub_tit">법률규정 :『산업집적활성화 및 공장설립에 관한 법률』</h2>
                                <table class="Base">
									<caption>산업단지 관리체계</caption>
									<colgroup>
										<col width="8%">
										<col>
										<col width="30%">
									</colgroup>
									<thead>
									<tr>
										<th scope="col">구분</th>
										<th scope="col">내용</th>
										<th scope="col">관련근거</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th scope="row">입주계약</th>
										<td style="text-align:left">산업단지에서 제조업을 하거나 하려는 자는 관리기관과 그 입주에 관한 계약을 체결하여야 함</td>
										<td>제38조(입주계약 등)</td>
									</tr>
									<tr>
										<th scope="row">완료신고</th>
										<td style="text-align:left">산업단지 입주계약을 체결한 후 기계‧장치의 설치를 완료한 날로부터 2개월 이내에 <br>관리기관에 완료신고를 하여야 함</td>
										<td>제15조(공장설립등의 완료신고 등) 동법 시행령 <br>제20조 (공장설립등의 완료신고)</td>
									</tr>
									<tr>
										<th scope="row">승인취소</th>
										<td style="text-align:left">산업단지 입주계약을 체결한 후 4년이 지난 날까지 완료신고를 하지 아니하거나 <br>공장착공 후 1년이상 공사를 중단한 경우 그 공장설립등의 승인의 취소를 명할 수 있음</td>
										<td>제13조의5(공장설립등의 승인의 취소)제3호</td>
									</tr>
									<tr>
										<th scope="row" rowspan="2">벌   칙</th>
										<td style="text-align:left">ㅇ3년 이하의 징역 또는 3천만원 이하의 벌금<br>
											-완료신고 전 공장 등을 처분하려는 경우<br>
											ㅇ3년 이하의 징역 또는 1천5백만원 이하의 벌금<br>
											-입주계약을 체결하지 아니하고 제조업 또는 그 외의 사업을 한 자
										</td>
										<td>제52조(벌칙)</td>
									</tr>
									<tr>
										<td style="text-align:left">ㅇ200만원 이하의 과태료<br>
											-공장설립등의 완료신고를 하지 아니하거나 거짓신고를 하고 공장을 가동하는 자
										</td>
										<td>제55조(과태료)제2항제3호</td>
									</tr>
									</tbody>
								</table>
                            </li>
                        </ul>
						<ul class="basic">
                            <li class="mb_2">
                                <h2 class="sub_tit">상세문의</h2>
                                <table class="Base">
									<caption>산업단지 관리체계</caption>
									<colgroup>
										<col width="20%">
										<col>
										<col width="15%">
									</colgroup>
									<thead>
									<tr>
										<th scope="col">구분</th>
										<th scope="col">관할 산업단지</th>
										<th scope="col">문의처</th>
									</tr>
									</thead>
									<tbody>
									<tr>
										<th scope="row">부산경제진흥원 동부사무소</th>
										<td style="text-align:left">정관, 정관농공, 장안, 기룡1·2, 정관코리, 부산신소재, 반룡, 오리, 에코장안</td>
										<td>051-728-8047</td>
									</tr>
									<tr>
										<th scope="row">부산경제진흥원 서부사무소</th>
										<td style="text-align:left">신호, 화전, 모라, 부산과학, 강서보고, 지사2, 성우, 풍상, 정주</td>
										<td>051-600-1832</td>
									</tr>
									<tr>
										<th scope="row">부산경제진흥원 센텀사무소</th>
										<td style="text-align:left">센텀시티, 회동석대</td>
										<td>051-742-8701</td>
									</tr>
									<tr>
										<th scope="row">한국산업단지공단<br>(부산지역본부)</th>
										<td style="text-align:left">명지녹산 국가산업단지</td>
										<td>070-8895-7847</td>
									</tr>
									<tr>
										<th scope="row">한국산업단지공단<br>(사하사무소)</th>
										<td style="text-align:left">신평장림일반산업단지(협업화단지)</td>
										<td>070-8895-7861</td>
									</tr>
									<tr>
										<th scope="row">부산진해경제자유구역청<br>(기업정책과)</th>
										<td style="text-align:left">생곡, 미음, 국제산업물류도시(1단계)</td>
										<td>051-979-5325</td>
									</tr>
									<tr>
										<th scope="row">신평장림산업단지관리공단</th>
										<td style="text-align:left">신평장림일반산업단지(기존단지)</td>
										<td>051-205-0212</td>
									</tr>
									<tr>
										<th scope="row">명례일반산업단지관리공단</th>
										<td style="text-align:left">명례일반산업단지</td>
										<td>051-915-7772</td>
									</tr>
									</tbody>
								</table>
                            </li>
                        </ul>
                    </div>
                    <!-- 20210504 전은신 입주업무 안내 추가 end-->
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