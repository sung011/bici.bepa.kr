<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<link rel="stylesheet" href="/application/views/common/css/support.css">
<link rel="stylesheet" href="/application/views/common/css/table.css">
<style>
    .hidd{
        display: none;
    }
</style>
	<!-- Features -->
	<div class="features" >
		<div class="container" >

			<div class="row features_row sub_feat_row" >
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>
				</div>
				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
				<div class="notice_title">
					<h2>공단공지/지원사업 안내</h2>
					<!-- Home -->
					<div class="home-sub">
						<div class="breadcrumbs_container">
							<div class="row">
								<div class="col">
									<div class="breadcrumbs">
										<ul>
											<li><a href="index.html">기업지원</a></li>
											<li>공간공유서비스</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kind-category">
							<div class="nkindlist">
								<span><p class="active" id="space" onclick="openRoom('space');">회의실</p></span>
								<span><p id="space2" onclick="openRoom('space2');">문화놀이터</p></span>
								<span><p id="space3" onclick="openRoom('space3');">지식산업센터 회의실</p></span>
								<span class="fake-span"></span>
							</div>
					</div>
				</div>
					<div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;overflow:hidden">
						<div class="case_study_area case_page" style="">
							<div class="row"><!--
									<div class="col-xl-12">
										<div class="portfolio-menu text-center">
											<button class="tablinks active" onclick="openRoom('space')">회의실</button>
											<button class="tablinks" onclick="openRoom('space2')">문화놀이터</button>
											<button class="tablinks" onclick="openRoom('space3')">지식산업센터 회의실</button>
										</div>
									</div>
								</div>-->
                                <div id="tab01">

                                    <div class="grid">
                                        <div id="Sground1" class="tabcontent">
                                            <div class="col-md-12">
                                                <h3 class="info_hd_s">회의실 사용 안내
                                                    <div class="btn_regist_con2">
                                                        <button type="button" id="submit_next" data-loading-text="Loading..." autocomplete="off" class="btn btn-lg btn-info btn_type2" onclick="go_regist();">예약하기</button>
                                                    </div>
                                                </h3>

                                                <div class="info_c_body" style="margin-left:-15px;">
                                                    <ol type="1" class="info_c_ol">
                                                        <li>
                                                            <div style="padding:10px;font-weight: bold;">시설현황</div>
                                                            <div>
                                                                <table class="room-table">
                                                                    <colgroup>
                                                                        <col>
                                                                        <col width="13%;">
                                                                        <col width="13%;">
                                                                        <col width="13%;">
                                                                        <col width="13%;">
                                                                        <col width="13%;">
                                                                        <col width="13%;">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr class="tr-th-top" style="">
                                                                        <th >구분</th>
                                                                        <th>면적</th>
                                                                        <th>수용<span class="xs_use"><br></span>인원</th>
                                                                        <th class="xs_w50">현수막</th>
                                                                        <th class="xs_w50">음향<span class="xs_use"><br></span>시설</th>
                                                                        <th class="xs_w50">빔프<span class="xs_use"><br></span>로젝트</th>
                                                                        <th class="xs_w50">냉온<span class="xs_use"><br></span>풍기</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_left"><strong>대회의실</strong></th>
                                                                        <td>282.86㎡</td>
                                                                        <td>100석</td>
                                                                        <td colspan="4">사용가능</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_left">
                                                                            <strong>소회의실</strong>
                                                                        </th>
                                                                        <td>132.77㎡</td>
                                                                        <td>20석</td>
                                                                        <td colspan="2">사용불가</td>
                                                                        <td colspan="2">사용가능</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <br>

                                                            <ul class="room-img-ul" >
                                                                <li  style="padding:0px;">
                                                                    <div style="padding:10px;font-weight: bold;">(1) 소회의실</div>
                                                                    <div class="room-div " >
                                                                        <ul  style="padding:0px;clear:both;">
                                                                            <li><img src="/application/views/common/images/rroom_s1.jpg"></li>
                                                                            <li><img src="/application/views/common/images/rroom_s2.jpg"></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li  style="padding:0px;clear:both;">
                                                                    <div style="padding:10px;font-weight: bold;">(2) 대회의실</div>
                                                                    <div class="room-div ">
                                                                        <ul style="padding:0px;">
                                                                            <li><img src="/application/views/common/images/rroom_b1.jpg"></li>
                                                                            <li><img src="/application/views/common/images/rroom_b2.jpg"></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li style="margin-top:10px;clear:both;">
                                                            <div style="padding:10px;font-weight: bold;">사용료 안내</div>

                                                            <div>
                                                                <table class="room-table">
                                                                    <colgroup>
                                                                        <col width="25%;">
                                                                        <col width="25%;">
                                                                        <col width="25%;">
                                                                        <col width="25%;">
                                                                    </colgroup>
                                                                    <tbody>
                                                                    <tr class="tr-th-top">
                                                                        <th rowspan="2">구분</th>
                                                                        <th colspan="2">사용료</th>
                                                                        <th rowspan="2">비고</th>
                                                                    </tr>
                                                                    <tr class="tr-th-top">
                                                                        <th><strong>4시간 미만</strong><br>
                                                                            13시(pm1시)기준<br>
                                                                            오전 및 오후만 가능
                                                                        </th>
                                                                        <th class="rline"><strong>4시간 초과</strong><br>
                                                                            1일 사용</th>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_left">
                                                                            <strong>대회의실</strong>
                                                                        </th>
                                                                        <td>330,000원 (VAT포함)</td>
                                                                        <td>550,000원 (VAT포함)</td>
                                                                        <td rowspan="2">
                                                                            <ul class="ls_none">
                                                                                <li>- 기자재 및 냉⦁온풍기 별도의 사용료 없음, 생수제공(냉⦁온수기)</li>
                                                                                <li>- 준비차량 2대 무료주차</li>
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="th_left">
                                                                            <strong>소회의실</strong></th>
                                                                        <td>220,000원 (VAT포함)</td>
                                                                        <td class="rline">330,000원 (VAT포함)</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <ul style="margin-top:10px;">
                                                                <li class="nn">※ 산업단지 입주업체 및 공공기관을 기준이며, 그 외 업체의 경우 2배 금액을 적용합니다.</li>
                                                                <li class="nn">※ 회의실 운영시간은 평일 09:00 ~ 17:00까지 입니다. </li>
                                                                <li class="nn">※ 현수막 사이즈 : 가로 6m × 세로 90㎝ (대회의실 기준)</li>
                                                                <li class="nn">※ 빔프로젝트 사용하실 노트북은 따로 준비하셔야 합니다.</li>

                                                                <li class="nn">※ 입금계좌번호 : 기업은행 성남하이테크지점 165-000158-01-082  예금주 : 성남산업단지관리공단</li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            안내사항
                                                            <ul>
                                                                <li>가. 사업자등록증 팩스(FAX. 031-750-2819) 송부 및 입금이 완료되어야 예약이 확정됩니다.</li>
                                                                <li>나. 개별사정으로 예약취소 시, 취소신청서와 함께 관리공단의 승인을 받아야 합니다.</li>
                                                                <li>다. 예약취소로 인한 환불은 예약날짜 기준 7일 전까지만 가능합니다.</li>
                                                                <li>라. 주차는 1시간 무료이며 이후 30분당 500원을 개별 납부하셔야 합니다.</li>
                                                                <li>마. 회의실 사용 전 준비 및 사용 후 정리정돈은 사용자가 하셔야 합니다.</li>
                                                                <li>바. 회의실 내 간단한 다과 및 음료 외의 음식물 반입을 금지합니다.</li>
                                                                <li>사. 집기비품은 별도 제공이 불가하며, 필요하실 경우 사용자가 가져오셔야 합니다.</li>
                                                                <li>아. 사용자 과오로 회의실 시설물 훼손 및 파손 시, 사용자가 일체 변상하셔야 합니다.</li>
                                                                <li>■ 문의 : 관리공단 관리팀 이상인 과장 (전화:031-750-2805 / 팩스:031-750-2818)</li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            대관절차

                                                            <ul class="rroom_f_con">
                                                                <li>
                                                                    <h2>○ 대관 신청</h2>
                                                                    <div class="rroom_p_flow">
                                                                        <ul>
                                                                            <li>대관신청서<br>
                                                                                (사업자등록증 팩스발송)
                                                                            </li>
                                                                            <li>100% 입금</li>
                                                                            <li class="li_e">예약확정</li>
                                                                            <li>회의실 사용</li>
                                                                            <li class="li_e">세금계산서 발행</li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li>
                                                                    <h2>○ 대관 취소</h2>
                                                                    <div class="rroom_p_flow">
                                                                        <ul>
                                                                            <li>취소 신청서 발송</li>
                                                                            <li class="li_e">취소 승인 후 개별통지</li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                        <li>
                                                            관련 신청서

                                                            <ul class="rroom_file_con">
                                                                <li >
                                                                    <a href="/Upload/support/mroom_cancel_application_form.hwp"><i class="fa fa-file"></i> 회의실 취소 신청서</a>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="Sground2" class="tabcontent">
                                            <table class="table table-hover" id="playground1">
                                                <thead>
                                                <tr class="tr-th-top">
                                                    <th class="hidden-md hidden-sm">번호</th>
                                                    <th>제목</th>
                                                    <th>작성자</th>
                                                    <th>작성일</th>
                                                    <th class="hidden-xs"><a href="/bbs/board.php?bo_table=ym_notice&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">조회</a></th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                <tr class="board-notice">
                                                    <td colspan="5" style="text-align:center;"><strong class="color-red">게시물이 없습니다.</strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div id="Sground3" class="tabcontent">
                                            <table class="table table-hover" id="playground2">
                                                <thead>
                                                <tr class="tr-th-top">
                                                    <th class="hidden-md hidden-sm">번호</th>
                                                    <th>제목</th>
                                                    <th>작성자</th>
                                                    <th>작성일</th>
                                                    <th class="hidden-xs"><a href="/bbs/board.php?bo_table=ym_notice&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">조회</a></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr class="board-notice">
                                                    <td colspan="5" style="text-align:center;"><strong class="color-red">게시물이 없습니다.</strong></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </div>
                                <div id="tab02" class="hidd" style="width: 100%">
                                    <div class="col-lg-12">
                                        <div class="notice_table notice-block2">
                                            <?php
                                            if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                ?>
                                                <div class="rows pad10">
                                                    <div class="col-xs-6">
                                                    </div>
                                                    <div class="col-xs-6" style="text-align:right;">
                                                        <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" name="nowpage" id="nowpage">
                                            <div class="snic-search">
                                                <span>검색</span>
                                                <div class="snic-select">
                                                    <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                                                    <select name="q_searchKeyTy" id="q_searchKeyTy">
                                                        <option value="wr_subject">제목</option>
                                                        <option value="wr_content">내용</option>
                                                        <option value="subcont">제목 + 내용</option>
                                                    </select>
                                                </div>
                                                <div class="snic-input">
                                                    <label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text" name="q_searchVal" id="q_searchVal" value="" >
                                                </div>
                                                <button type="button" class="btn sm dark" onclick="story_list('1')">검색</button>
                                            </div>
                                            <table class="table table-hover" id="notice_table">
                                                <thead>
                                                <tr class="tr-th-top">
                                                    <?php
                                                    if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                        ?>
                                                        <th><input type="checkbox" name="selected_all"></th>
                                                    <?php } ?>
                                                    <th class="hidden-md hidden-sm">번호</th>
                                                    <th>제목</th>
                                                    <th>작성자</th>
                                                    <th>작성일</th>
                                                    <th class="hidden-xs">조회</th>
                                                </tr>
                                                </thead>
                                                <tbody id="notice_listtable">

                                                </tbody>

                                            </table>
                                            <div id="paging"></div>
                                            <?php
                                            if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                ?>
                                                <div class="rows pad10">
                                                    <div class="col-xs-6" style="float:left;width:50%;">

                                                        <button type="button" class='btn-write' onclick="notice_del();">선택삭제</button>
                                                        <!-- <button type="button" class='btn-search' onclick="search_notice();"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                                                    </div>
                                                    <div class="col-xs-6" style="float:left;width:50%;text-align:right;">
                                                        <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                </div>
                                <div id="tab03" class="hidd" style="width: 100%">
                                    <div class="col-lg-12">
                                        <div class="notice_table notice-block2">
                                            <?php
                                            if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                ?>
                                                <div class="rows pad10">
                                                    <div class="col-xs-6">
                                                    </div>
                                                    <div class="col-xs-6" style="text-align:right;">
                                                        <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                            <input type="hidden" name="nowpage" id="nowpage">
                                            <div class="snic-search">
                                                <span>검색</span>
                                                <div class="snic-select">
                                                    <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                                                    <select name="q_searchKeyTy" id="q_searchKeyTy">
                                                        <option value="wr_subject">제목</option>
                                                        <option value="wr_content">내용</option>
                                                        <option value="subcont">제목 + 내용</option>
                                                    </select>
                                                </div>
                                                <div class="snic-input">
                                                    <label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text" name="q_searchVal" id="q_searchVal" value="" >
                                                </div>
                                                <button type="button" class="btn sm dark" onclick="story_list('1')">검색</button>
                                            </div>
                                            <table class="table table-hover" id="notice_table">
                                                <thead>
                                                <tr class="tr-th-top">
                                                    <?php
                                                    if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                        ?>
                                                        <th><input type="checkbox" name="selected_all"></th>
                                                    <?php } ?>
                                                    <th class="hidden-md hidden-sm">번호</th>
                                                    <th>제목</th>
                                                    <th>작성자</th>
                                                    <th>작성일</th>
                                                    <th class="hidden-xs">조회</th>
                                                </tr>
                                                </thead>
                                                <tbody id="notice_listtable">

                                                </tbody>

                                            </table>
                                            <div id="paging"></div>
                                            <?php
                                            if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
                                                ?>
                                                <div class="rows pad10">
                                                    <div class="col-xs-6" style="float:left;width:50%;">

                                                        <button type="button" class='btn-write' onclick="notice_del();">선택삭제</button>
                                                        <!-- <button type="button" class='btn-search' onclick="search_notice();"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                                                    </div>
                                                    <div class="col-xs-6" style="float:left;width:50%;text-align:right;">
                                                        <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
							<!--<div class="grid">
								<div id="Sground1" class="tabcontent">
									<div class="col-md-12">
										<h3 class="info_hd_s">회의실 사용 안내
											<div class="btn_regist_con2">
												<button type="button" id="submit_next" data-loading-text="Loading..." autocomplete="off" class="btn btn-lg btn-info btn_type2" onclick="go_regist();">예약하기</button>
											</div>
										</h3>

										<div class="info_c_body" style="margin-left:-15px;">
											<ol type="1" class="info_c_ol">
												<li>
													<div style="padding:10px;font-weight: bold;">시설현황</div>
													<div>
														<table class="room-table">
															<colgroup>
																<col>
																<col width="13%;">
																<col width="13%;">
																<col width="13%;">
																<col width="13%;">
																<col width="13%;">
																<col width="13%;">
															</colgroup>
															<tbody>
																<tr class="tr-th-top" style="">
																	<th >구분</th>
																	<th>면적</th>
																	<th>수용<span class="xs_use"><br></span>인원</th>
																	<th class="xs_w50">현수막</th>
																	<th class="xs_w50">음향<span class="xs_use"><br></span>시설</th>
																	<th class="xs_w50">빔프<span class="xs_use"><br></span>로젝트</th>
																	<th class="xs_w50">냉온<span class="xs_use"><br></span>풍기</th>
																</tr>
																<tr>
																	<th class="th_left"><strong>대회의실</strong></th>
																	<td>282.86㎡</td>
																	<td>100석</td>
																	<td colspan="4">사용가능</td>
																</tr>
																<tr>
																	<th class="th_left">
																		<strong>소회의실</strong>
																	</th>
																	<td>132.77㎡</td>
																	<td>20석</td>
																	<td colspan="2">사용불가</td>
																	<td colspan="2">사용가능</td>
																</tr>
															</tbody>
														</table>
													</div>
													<br>

													<ul class="room-img-ul" >
														<li  style="padding:0px;">
															<div style="padding:10px;font-weight: bold;">(1) 소회의실</div>
															<div class="room-div " >
																<ul  style="padding:0px;clear:both;">
																	<li><img src="/application/views/common/images/rroom_s1.jpg"></li>
																	<li><img src="/application/views/common/images/rroom_s2.jpg"></li>
																</ul>
															</div>
														</li>
														<li  style="padding:0px;clear:both;">
														<div style="padding:10px;font-weight: bold;">(2) 대회의실</div>
															<div class="room-div ">
																<ul style="padding:0px;">
																	<li><img src="/application/views/common/images/rroom_b1.jpg"></li>
																	<li><img src="/application/views/common/images/rroom_b2.jpg"></li>
																</ul>
															</div>
														</li>
													</ul>
												</li>
												<li style="margin-top:10px;clear:both;">
													<div style="padding:10px;font-weight: bold;">사용료 안내</div>

													<div>
														<table class="room-table">
															<colgroup>
																<col width="25%;">
																<col width="25%;">
																<col width="25%;">
																<col width="25%;">
															</colgroup>
															<tbody>
																<tr class="tr-th-top">
																	<th rowspan="2">구분</th>
																	<th colspan="2">사용료</th>
																	<th rowspan="2">비고</th>
																</tr>
																<tr class="tr-th-top">
																	<th><strong>4시간 미만</strong><br>
																		13시(pm1시)기준<br>
																		오전 및 오후만 가능
																	</th>
																	<th class="rline"><strong>4시간 초과</strong><br>
																		1일 사용</th>
																</tr>
																<tr>
																	<th class="th_left">
																		<strong>대회의실</strong>
																	</th>
																	<td>330,000원 (VAT포함)</td>
																	<td>550,000원 (VAT포함)</td>
																	<td rowspan="2">
																		<ul class="ls_none">
																			<li>- 기자재 및 냉⦁온풍기 별도의 사용료 없음, 생수제공(냉⦁온수기)</li>
																			<li>- 준비차량 2대 무료주차</li>
																		</ul>
																	</td>
																</tr>
																<tr>
																	<th class="th_left">
																		<strong>소회의실</strong></th>
																	<td>220,000원 (VAT포함)</td>
																	<td class="rline">330,000원 (VAT포함)</td>
																</tr>
															</tbody>
														</table>
													</div>
													<ul style="margin-top:10px;">
														<li class="nn">※ 산업단지 입주업체 및 공공기관을 기준이며, 그 외 업체의 경우 2배 금액을 적용합니다.</li>
														<li class="nn">※ 회의실 운영시간은 평일 09:00 ~ 17:00까지 입니다. </li>
														<li class="nn">※ 현수막 사이즈 : 가로 6m × 세로 90㎝ (대회의실 기준)</li>
														<li class="nn">※ 빔프로젝트 사용하실 노트북은 따로 준비하셔야 합니다.</li>

														<li class="nn">※ 입금계좌번호 : 기업은행 성남하이테크지점 165-000158-01-082  예금주 : 성남산업단지관리공단</li>
													</ul>
												</li>
												<li>
													안내사항
													<ul>
														<li>가. 사업자등록증 팩스(FAX. 031-750-2819) 송부 및 입금이 완료되어야 예약이 확정됩니다.</li>
														<li>나. 개별사정으로 예약취소 시, 취소신청서와 함께 관리공단의 승인을 받아야 합니다.</li>
														<li>다. 예약취소로 인한 환불은 예약날짜 기준 7일 전까지만 가능합니다.</li>
														<li>라. 주차는 1시간 무료이며 이후 30분당 500원을 개별 납부하셔야 합니다.</li>
														<li>마. 회의실 사용 전 준비 및 사용 후 정리정돈은 사용자가 하셔야 합니다.</li>
														<li>바. 회의실 내 간단한 다과 및 음료 외의 음식물 반입을 금지합니다.</li>
														<li>사. 집기비품은 별도 제공이 불가하며, 필요하실 경우 사용자가 가져오셔야 합니다.</li>
														<li>아. 사용자 과오로 회의실 시설물 훼손 및 파손 시, 사용자가 일체 변상하셔야 합니다.</li>
														<li>■ 문의 : 관리공단 관리팀 이상인 과장 (전화:031-750-2805 / 팩스:031-750-2818)</li>
													</ul>
												</li>
												<li>
													대관절차

													<ul class="rroom_f_con">
														<li>
															<h2>○ 대관 신청</h2>
															<div class="rroom_p_flow">
																<ul>
																	<li>대관신청서<br>
																		(사업자등록증 팩스발송)
																		</li>
																	<li>100% 입금</li>
																	<li class="li_e">예약확정</li>
																	<li>회의실 사용</li>
																	<li class="li_e">세금계산서 발행</li>
																</ul>
															</div>
														</li>
														<li>
															<h2>○ 대관 취소</h2>
															<div class="rroom_p_flow">
																<ul>
																	<li>취소 신청서 발송</li>
																	<li class="li_e">취소 승인 후 개별통지</li>
																</ul>
															</div>
														</li>
													</ul>
												</li>
												<li>
													관련 신청서

													<ul class="rroom_file_con">
														<li >
															<a href="/Upload/support/mroom_cancel_application_form.hwp"><i class="fa fa-file"></i> 회의실 취소 신청서</a>
														</li>
													</ul>
												</li>
											</ol>
										</div>
									</div>
								</div>

								<div id="Sground2" class="tabcontent">
									<table class="table table-hover" id="playground1">
										<thead>
											<tr class="tr-th-top">
												<th class="hidden-md hidden-sm">번호</th>
												<th>제목</th>
												<th>작성자</th>
												<th>작성일</th>
												<th class="hidden-xs"><a href="/bbs/board.php?bo_table=ym_notice&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">조회</a></th>
											</tr>
										</thead>

										<tbody>
											<tr class="board-notice">
												<td colspan="5" style="text-align:center;"><strong class="color-red">게시물이 없습니다.</strong></td>
											</tr>
										</tbody>
									</table>
								</div>

								<div id="Sground3" class="tabcontent">
								  <table class="table table-hover" id="playground2">
										<thead>
											<tr class="tr-th-top">
												<th class="hidden-md hidden-sm">번호</th>
												<th>제목</th>
												<th>작성자</th>
												<th>작성일</th>
												<th class="hidden-xs"><a href="/bbs/board.php?bo_table=ym_notice&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">조회</a></th>
											</tr>
										</thead>
										<tbody>
											<tr class="board-notice">
												<td colspan="5" style="text-align:center;"><strong class="color-red">게시물이 없습니다.</strong></td>
											</tr>
										</tbody>
									</table>
								</div>

							</div>-->

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
function go_regist(){
location = "/support/reservation";
}
function openRoom(unid) {
	//location.href="/support/"+unid;
    if(unid == 'space'){
        $('#space').addClass('active');
        $('#space2').removeClass('active');
        $('#space3').removeClass('active');


        $("#tab01").removeClass('hidd');
        $("#tab02").addClass('hidd');
        $("#tab03").addClass('hidd');
    }

    if(unid == 'space2'){
        $('#space2').addClass('active');
        $('#space').removeClass('active');
        $('#space3').removeClass('active');

        $("#tab02").removeClass('hidd');
        $("#tab01").addClass('hidd');
        $("#tab03").addClass('hidd');
    }

    if(unid == 'space3'){
        $('#space3').addClass('active');
        $('#space').removeClass('active');
        $('#space2').removeClass('active');

        $("#tab03").removeClass('hidd');
        $("#tab02").addClass('hidd');
        $("#tab01`").addClass('hidd');
    }
}





</script>
</body>
</html>