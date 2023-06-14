<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php'; ?>

<link rel="stylesheet" href="/assets/css/jquery-ui.css">



<link rel="stylesheet" href="<?=base_url('assets/css/complex.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/support.css')?>">
<link rel="stylesheet" href="<?=base_url('assets/css/table.css')?>">

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
	<section class="content">
        <div class="row"> 
            <div class="col-xs-12 col-lg-12" style="padding: 0px">   
                <div class="group_box_wrap col-lg-12" style="padding: 0px;margin: 0px">
                    <div class="group_box col-lg-12" style="display: flex;justify-content: space-between">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title box-stitle"><?= $Title2 ?></h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn-write" onclick="notice_write();">
                                        수정
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
							<form name="survey_form" id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                            <div class="box-body" style="min-height: 70vh;padding: 1em">
								<div id="tab0_1">
									<div class="btn_wrap" style="text-align: end">
										<button type="button" class="btn btn-info active btn_text" id="basics"
												onclick="openTab('basics');">기본현황
										</button>
										<button type="button" class="btn btn-info btn_text" id="details"
												onclick="openTab('details');">상세현황
										</button>
										<button type="button" class="btn btn-info btn_text" id="survey"
												onclick="openTab('survey');">조사내용
										</button>
										<button type="button" class="btn btn-info btn_text" id="photo"
												onclick="openTab('photo');">사진정보
										</button>
									</div>
									<div id="tab_1">
										<div class="form_wrap">
											<table class="table_st1">
												<colgroup>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
												</colgroup>
												<tbody>
												<tr>
													<th>구분</th>
													<th>가동여부</th>
													<th>현상태</th>
													<th>업체명</th>
													<th>대표자명</th>
													<!--<th>법정동</th>-->
													<th colspan="2">지번</th>
												</tr>
												<tr>
													<td>
														<?php echo $infocom['0']['CPX_NUM']?>
														<input type="hidden" name="CPX_NUM" value="<?php echo $infocom['0']['CPX_NUM']?>">
													</td>
													<td>
														<select name="opr_chk" class="form-control">
															<?php
															for ($i = 0; $i < count($decode); $i++){
																?>
																<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CHAN_CODE'] == $infocom['0']['OPR_CHK']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
													</td>
													<td>
														<select name="cur_con" class="form-control">
															<?php
																for ($i = 0; $i < count($decode); $i++){
																	?>
																	<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CHAN_CODE'] == $infocom['0']['CUR_CON']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																	<?php
																}
															?>
														</select>
													</td>
													<td>
														<input type="text" class="form-control" name="inc_nam" value="<?php echo $infocom['0']['INC_NAM']?>">
													</td>
													<td>
														<input type="text" class="form-control" name="ceo_nam" value="<?php echo $infocom['0']['CEO_NAM']?>">
													</td>
													<!--<td>
														<select name="cur_con" class="form-control">
															<?php
/*															for ($i = 0; $i < count($decode); $i++){
																*/?>
																<option value="<?php /*echo $decode[$i]['CODE_NUM']*/?>" <?php /*if($decode[$i]['CHAN_CODE'] == $infocom['0']['BJD_NAM']){*/?> selected <?php /*} */?>><?/*=$decode[$i]['CHAN_CODE']*/?></option>
																<?php
/*															}
															*/?>
														</select>

													</td>-->
													<td style="border-right:none;">
														<input type="text" class="form-control" name="jibun" value="<?php echo $infocom['0']['JIBUN']?>">
													</td>
												</tr>
												<tr>
													<th>부대시설면적</th>
													<th>신설구분</th>
													<th>대표전화</th>
													<th>팩스번호</th>
													<th colspan="3">도로명주소</th>
												</tr>
												<tr>
													<td>
														<select name="etc_fac" class="form-control">
															<?php
															for ($i = 0; $i < count($decode); $i++){
																?>
																<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CHAN_CODE'] == $infocom['0']['ETC_FAC']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
														<!--<input type="text" class="form-control" name="etc_fac" value="<?php /*echo $infocom['0']['ETC_FAC']*/?>">-->
													</td>
													<td>
														<select name="NEW_CHK" class="form-control">
															<?php
															for ($i = 0; $i < count($decode); $i++){
																?>
																<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CHAN_CODE'] == $infocom['0']['NEW_CHK']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
														<!--<input type="text" class="form-control" name="NEW_CHK" value="<?php /*echo $infocom['0']['NEW_CHK']*/?>">-->
													</td>
													<td>
														<input type="text" class="form-control" name="TEL_NUM" value="<?php echo $infocom['0']['TEL_NUM']?>">
													</td>
													<td>
														<input type="text" class="form-control" name="FAX_NUM" value="<?php echo $infocom['0']['FAX_NUM']?>">
													</td>
													<td colspan="3" style="border-right:none;">
														<input type="text" class="form-control" name="NEW_ADD" value="<?php echo $infocom['0']['NEW_ADD']?>">
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab_2" class="hidd">
										<div class="form_wrap">
											<table class="table_st1">
												<colgroup>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
												</colgroup>
												<tbody>
												<tr>
													<th>사업자등록번호</th>
													<th>주민/법인 번호</th>
													<th colspan="2">대표업종</th>
													<th colspan="2">생산품목</th>
													<th>생산액<br>(백만원)</th>
													<th>수출액<br>(천달러)</th>
												</tr>
												<tr>
													<td>
														<input type="text" class="form-control" name="BSN_LIC" value="<?php echo $infocom['0']['BSN_LIC']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="INC_LIC" value="<?php echo $infocom['0']['INC_LIC']?>">
													</td>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="REP_SPC" value="<?php echo $infocom['0']['REP_SPC']?>">
													</td>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="GOD_ITM" value="<?php echo $infocom['0']['GOD_ITM']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="GOD_MNY" value="<?php echo $infocom['0']['GOD_MNY']?>">
													</td>
													<td id="" style="border-right:none;">
														<input type="text" class="form-control" name="EXP_MNY" value="<?php echo $infocom['0']['EXP_MNY']?>">
													</td>
												</tr>
												<tr>
													<th colspan="2">부동산_계약시</th>
													<th colspan="2">부동산_완료시</th>
													<th colspan="2">입주_계약시</th>
													<th colspan="2">입주_완료시</th>
												</tr>
												<tr>
													<th>용지면적</th>
													<th>건축면적</th>
													<th>용지면적</th>
													<th>건축면적</th>
													<th>계약신청일</th>
													<th>입주계약변경일</th>
													<th>등록신청일</th>
													<th>공장등록변경일</th>
												</tr>
												<tr>
													<td id="">
														<input type="text" class="form-control" name="STC_ARA" value="<?php echo $infocom['0']['STC_ARA']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="BDC_ARA" value="<?php echo $infocom['0']['BDC_ARA']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="SIT_ARA" value="<?php echo $infocom['0']['SIT_ARA']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="BLD_ARA" value="<?php echo $infocom['0']['BLD_ARA']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="CON_DAT" value="<?php echo $infocom['0']['CON_DAT']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="COC_DAT" value="<?php echo $infocom['0']['COC_DAT']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="REG_DAT" value="<?php echo $infocom['0']['REG_DAT']?>">
													</td>
													<td id="" colspan="3" style="border-right:none;">
														<input type="text" class="form-control" name="REC_DAT" value="<?php echo $infocom['0']['REC_DAT']?>">
													</td>
												</tr>
												<tr>
													<th colspan="8">부동산_임대</th>
												</tr>
												<tr>
													<th>소유구분</th>
													<th>임대구분</th>
													<th>보증금</th>
													<th>임대료</th>
													<th colspan="2">임대기간</th>
													<th colspan="2">임대업체</th>
												</tr>
												<tr>
													<td id="">
														<select name="OWN_CHK" class="form-control">
															<?php
															for ($i = 0; $i < count($decode); $i++){
																?>
																<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CHAN_CODE'] == $infocom['0']['OWN_CHK']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
														<!--<input type="text" class="form-control" name="OWN_CHK" value="<?php /*echo $infocom['0']['OWN_CHK']*/?>">-->
													</td>
													<td id="">
														<select name="LES_CHK" class="form-control">
															<?php
															for ($i = 0; $i < count($decode); $i++){
																?>
																<option value="<?php echo $decode[$i]['CODE_NUM']?>" <?php if($decode[$i]['CODE_NUM'] == $infocom['0']['LES_CHK']){?> selected <?php } ?>><?=$decode[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
														<!--<input type="text" class="form-control" name="LES_CHK" value="<?php /*echo $infocom['0']['LES_CHK']*/?>">-->
													</td>
													<td id="">
														<input type="text" class="form-control" name="DEP_MNY" value="<?php echo $infocom['0']['DEP_MNY']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="LES_MNY" value="<?php echo $infocom['0']['LES_MNY']?>">
													</td>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="LES_POD" value="<?php echo $infocom['0']['LES_POD']?>">
													</td>
													<td id="" colspan="2" style="border-right:none;">
														<input type="text" class="form-control" name="LES_INC" value="<?php echo $infocom['0']['LES_INC']?>">
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab_3" class="hidd">
										<div class="form_wrap">
											<table class="table_st1">
												<colgroup>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
													<col>
												</colgroup>
												<tbody>
												<tr>
													<th colspan="3">종사자유형</th>
													<th colspan="5">종사자지역</th>
												</tr>
												<tr>
													<th>총인원</th>
													<th>사무직</th>
													<th>생상직</th>
													<th>부산</th>
													<th>김해</th>
													<th>울산</th>
													<th>양산</th>
													<th>창원</th>
												</tr>
												<tr>
													<td id="">
														<input type="text" class="form-control" name="TOT_MAN" value="<?php echo $infocom['0']['TOT_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="WHT_MAN" value="<?php echo $infocom['0']['WHT_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="BLU_MAN" value="<?php echo $infocom['0']['BLU_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="BSN_MAN" value="<?php echo $infocom['0']['BSN_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="KIM_MAN" value="<?php echo $infocom['0']['KIM_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="ULS_MAN" value="<?php echo $infocom['0']['ULS_MAN']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="YAS_MAN" value="<?php echo $infocom['0']['YAS_MAN']?>">
													</td>
													<td id="" colspan="3" style="border-right:none;">
														<input type="text" class="form-control" name="CHA_MAN" value="<?php echo $infocom['0']['CHA_MAN']?>">
													</td>
												</tr>
												<tr>
													<th colspan="8">종업원_남녀</th>
												</tr>
												<tr>
													<th colspan="2">남종업원</th>
													<th colspan="2">여종업원</th>
													<th colspan="2">외국인(남)</th>
													<th colspan="2">외국인(여)</th>
												</tr>
												<tr>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="MAL_WOK" value="<?php echo $infocom['0']['MAL_WOK']?>">
													</td>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="FML_WOK" value="<?php echo $infocom['0']['FML_WOK']?>">
													</td>
													<td id="" colspan="2">
														<input type="text" class="form-control" name="MAL_FOR" value="<?php echo $infocom['0']['MAL_FOR']?>">
													</td>
													<td id="" colspan="2" style="border-right:none;">
														<input type="text" class="form-control" name="FML_FOR" value="<?php echo $infocom['0']['FML_FOR']?>">
													</td>
												</tr>
												<th>통근버스보유</th>
												<th colspan="5">출퇴근</th>
												<th colspan="2">안전관리책임자</th>
												</tr>
												<tr>
													<th>대수</th>
													<th>통근버스</th>
													<th>기관운행버스</th>
													<th>자가용</th>
													<th>대중교통</th>
													<th>도보</th>
													<th>담당자명</th>
													<th>연락처</th>
												</tr>
												<tr>
													<td id="">
														<input type="text" class="form-control" name="BUS_NUM" value="<?php echo $infocom['0']['BUS_NUM']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="INC_BUS" value="<?php echo $infocom['0']['INC_BUS']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="CMP_BUS" value="<?php echo $infocom['0']['CMP_BUS']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="SEF_CAR" value="<?php echo $infocom['0']['SEF_CAR']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="PUB_TRS" value="<?php echo $infocom['0']['PUB_TRS']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="COM_WAK" value="<?php echo $infocom['0']['COM_WAK']?>">
													</td>
													<td id="">
														<input type="text" class="form-control" name="CAL_MAN" value="<?php echo $infocom['0']['CAL_MAN']?>">
													</td>
													<td id="" colspan="3" style="border-right:none;">
														<input type="text" class="form-control" name="CAL_CEL" value="<?php echo $infocom['0']['CAL_CEL']?>">
													</td>
												</tr>
												</tbody>
											</table>
										</div>
									</div>
									<div id="tab_4" class="hidd">
										<div class="form_wrap">
											이미지 영역
										</div>
									</div>
									<div class="table_st1">
										<div id="map" style="margin-top: 10px; height:600px;left: 15%; width: 70%;"></div>
									</div>

								</div>
                            </div>
							</form>
                        </div>
                    </div>  
                </div>      
            </div>
        </div>
    </section>
</div>


<script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>

<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=eeda10ed03288a39a8e9d7d09d77fe85&libraries=services"></script>

<script>

	$(document ).ready(function(){
		myMarker('<?php echo $infocom['0']['NEW_ADD']?>');
	})

	var number = '';
	var mapContainer = document.getElementById('map'), // 지도의 중심좌표
			mapOption = {
				center: new kakao.maps.LatLng(35.1847746, 129.0788739), // 지도의 중심좌표
				level: 3 // 지도의 확대 레벨
			};

	var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

	// 주소-좌표 변환 객체를 생성합니다
	var geocoder = new kakao.maps.services.Geocoder();


	var marker = [];

	function myMarker(address){
		// 주소로 좌표를 검색합니다
		geocoder.addressSearch(address, function(result, status) {
			// 정상적으로 검색이 완료됐으면
			if (status === kakao.maps.services.Status.OK) {

				var coords = new kakao.maps.LatLng(result[0].y, result[0].x);

				// 결과값으로 받은 위치를 마커로 표시합니다
				marker = new kakao.maps.Marker({
					map: map,
					position: coords
				});

				// 인포윈도우로 장소에 대한 설명을 표시합니다
				/*var infowindow = new kakao.maps.InfoWindow();
				infowindow.open(map, marker);*/

				// 지도의 중심을 결과값으로 받은 위치로 이동시킵니다
				map.setCenter(coords);
			}
		});
	}

	function relayout() {
		map.relayout();
	}

	function remove_in(){
		$("#in_list *").remove();
	}

	function remove_into(){
		$("#in_list01 *").remove();
	}



	function myMarkername(){
		marker.setMap(null);
	}

	function openTab(name) {
		//alert(number);
		if (name == 'basics') {

			$("#tab_2").addClass("hidd");
			$("#tab_3").addClass("hidd");
			$("#tab_4").addClass("hidd");
			$("#tab_1").removeClass("hidd");
		}

		if (name == 'details') {

			$("#tab_2").removeClass("hidd");
			$("#tab_1").addClass("hidd");
			$("#tab_3").addClass("hidd");
			$("#tab_4").addClass("hidd");
		}

		if (name == 'survey') {

			$("#tab_1").addClass("hidd");
			$("#tab_2").addClass("hidd");
			$("#tab_4").addClass("hidd");
			$("#tab_3").removeClass("hidd");
		}

		if (name == 'photo') {

			$("#tab_1").addClass("hidd");
			$("#tab_2").addClass("hidd");
			$("#tab_3").addClass("hidd");
			$("#tab_4").removeClass("hidd");
		}


	}

	function notice_write(){
		var con = confirm("수정 하시겠습니까.");
		if(con){
			var frm = document.survey_form;
			var formData = new FormData(frm);

			$.ajax({
				method: 'POST',
				url: '/index.php/SuAdmin/status_edit_ajax',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend:function(){},
				success: function(result){
					console.log(result);
					var list_array = JSON.parse(result);
					var list_total = list_array.length;
					if(list_array[0]['success'] == '200'){
						alert('수정 되었습니다.')
						location.reload();
					}
				}
				,complete:function(){}
			})
		}
	}

</script>
