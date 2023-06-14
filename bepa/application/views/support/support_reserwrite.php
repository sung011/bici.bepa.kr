<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<link rel="stylesheet" href="/application/views/common/css/support.css">

	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">기업지원</a></li>
								<li>회의실 예약</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	

	<!-- Features -->

	<div class="features" >
		<div class="container">

			<div class="row features_row" >	
	

				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
					
				

					<div style="padding:15px;">
		
						<form method="post" name="wzfrm" id="wzfrm" autocomplete="off">
						<input type="hidden" name="mode" id="mode" value="step3">
						<input type="hidden" name="sch_day" id="sch_day" value="<?php echo $now_day;?>">
						<input type="hidden" name="bo_table" id="bo_table" value="cs_space01p">
						<input type="hidden" name="od_id" id="od_id" value="<?php echo $od_id;?>">
						<input type="hidden" name="cp_code" id="cp_code" value="">

						<div class="panel panel-default">

							<div class="panel-heading"><strong><i class="fa fa-calculator fa-lg"></i> 이용서비스정보</strong></div>
							<div class="table-responsive">
								<table class="table form-group form-group-sm table-bordered font-color-gray">
								<thead>
								<tr>
									<th scope="col">회의실</th>
									<th scope="col">이용일자</th>
									<th scope="col">예약시간</th>
									<th scope="col">예약건</th>
									<th scope="col">요금</th>
									<th scope="col">합계</th>
								</tr>
								</thead>
								<tbody>
									<?php
									$rcnt =count($sch_data);
									if($rcnt > 0){
										$room_title="";
										$t_price =0;
										for($i=0;$i<$rcnt;$i++){
											if($sch_data[$i]['rm_ix']=='1'){$room_title="대회의실";}
											if($sch_data[$i]['rm_ix']=='2'){$room_title="소회의실";}
											if($sch_data[$i]['rmt_time']=='09:00'){$room_time="오전 (09시 ~ 13시)";}
											if($sch_data[$i]['rmt_time']=='13:00'){$room_time="오후 (13시 ~ 17시)";}
											$t_price = $t_price + $sch_data[$i]['rmt_price'];
										
									?>
									<input type="hidden" name="rm_ix[]" value="<?php echo $sch_data[$i]['rm_ix'];?>">
									<input type="hidden" name="rm_time[]" id="rm_time_0" value="<?php echo $sch_data[$i]['rmt_time'];?>">
									<input type="hidden" name="rm_price[]"  value="<?php echo $sch_data[$i]['rmt_price'];?>">
									<tr>
										<td data-title="회의실"><?php echo $room_title;?></td>
										<td data-title="이용일자"><?php echo $sch_month;?>/<?php echo $sch_day;?>(<?php echo $weekday;?>)</td>
										<td data-title="예약시간"><?php echo $room_time;?></td>
										<td data-title="예약건">
												<select name="rm_cnt[]" id="rm_cnt_0" data-price="330000" data-price-type="인당" class="form-control" style="width:60px;">
													<option value="1">1</option>     
												</select>
										</td>
										<td data-title="요금"> <?php echo number_format($sch_data[$i]['rmt_price'],0);?></td>
										<td data-title="합계"><span id="time-total-0"><?php echo number_format($sch_data[$i]['rmt_price'],0);?></span> (VAT포함)</td>
									</tr>
									<?php
										}
										if($rcnt ==2){
										$t_price = $t_price - 110000;
										}
									}
									?>
														
								</tbody>
								<thead>
								<tr>
									<th colspan="5">합계</th>
									<th><span id="all-total"><?php echo number_format($t_price,0);?></span> (VAT포함)</th>
								</tr>
								</thead>
								
								</table>
							</div>
						</div>


						<div class="row">
							<div class="col-md-12" >
								<div class="panel panel-default">
									<div class="panel-heading"><strong><i class="fa fa-user fa-lg"></i> 예약자정보</strong></div>

									<div class="panel-body" >

										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_name">회사명</label>
											<div class="col-sm-10" >
												<div class="form-inline">
													<div id="helpblock_bk_name" class="help-block"><small class="text-dotum">회사명을 입력해주세요</small></div>
													<div class="input-group" >
														<input type="text" name="bk_name" value="" id="bk_name" required="" class="form-control" maxlength="20" aria-describedby="helpblock_bk_name">
														<span class="fa fa-check form-control-feedback"></span>
													</div>

												</div>
											</div>
										</div>
										
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_rname">담당자</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="text" name="bk_rname"  id="bk_rname" required="" value="<?php echo $this->session->userdata('mb_name');?>" class="form-control" maxlength="20" aria-describedby="helpblock_bk_name">
														<span class="fa fa-check form-control-feedback"></span>
													</div>

												</div>
											</div>
										</div>
														
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_hp">연락처</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="text" name="bk_hp" value="<?php echo $this->session->userdata('mb_hp');?>" id="bk_hp" required="" class="form-control" maxlength="20">
														<span class="fa fa-phone form-control-feedback"></span>
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_carnum">행사명</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="text" name="bk_carnum" value="" id="bk_carnum" required="" class="form-control" site="15" maxlength="30">
													</div>
												</div>
											</div>
										</div>
										
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_ho">참가인원</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="text" name="bk_ho" value="" id="bk_ho" required="" class="form-control" site="5" maxlength="20">
													</div> 명
												</div>
											</div>
										</div>
										
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_carkind_c">시설신청</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="checkbox" name="bk_carkind_c[]" value="빔프로젝트"> 빔프로젝트&nbsp;&nbsp;&nbsp;
														<input type="checkbox" name="bk_carkind_c[]" value="냉난방"> 냉난방&nbsp;&nbsp;&nbsp;
														<input type="checkbox" name="bk_carkind_c[]" value="마이크"> 마이크
														<input type="hidden" name="bk_carkind">
													</div>
												</div>
											</div>
										</div>				
										
										<div class="form-group form-group-sm">
											<label class="col-sm-2 control-label" for="bk_email">이메일</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<div class="input-group">
														<input type="email" name="bk_email" id="bk_email" value="<?php echo $this->session->userdata('mb_email');?>" required="" class="form-control email" size="35" maxlength="100">
														<span class="fa fa-envelope form-control-feedback"></span>
													</div> (세금계산서 수신 메일)
												</div>
											</div>
										</div>

										<div class="form-group has-feedback form-group-sm">
											<label class="col-sm-2 control-label" for="bk_memo">기타사항(선택)</label>
											<div class="col-sm-10">
												<div class="form-inline">
													<textarea name="bk_memo" id="bk_memo" class="form-control" cols="50" rows="5"></textarea>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>


						<div class="panel panel-default" style="clear:both;" >
							<div class="panel-heading"><strong><i class="fa fa-credit-card fa-lg"></i> 결제정보</strong></div>

							<div class="panel-body " style="height:230px;">
								<div class="form-group form-group-sm">
									<label class="col-xs-4 col-sm-2 control-label">총이용금액</label>
									<label class="col-xs-8 col-sm-2 control-label">
										<span id="pg-price-all"><?php echo number_format($t_price,0);?></span> 원  (VAT포함)
									</label>
								</div>
								<div class="form-group form-group-sm">
									<label class="col-xs-4 col-sm-2 control-label"><strong>예약금</strong></label>
									<label class="col-xs-8 col-sm-2 control-label">
										<input type="hidden" name="reserv_price" id="reserv_price" value="<?php echo $t_price;?>">
										<input type="hidden" name="org_bk_price" id="org_bk_price" value="<?php echo $t_price;?>">
										<strong><span id="od_tot_price"><?php echo number_format($t_price,0);?></span> 원  (VAT포함)</strong>
									</label>
									<div class="col-sm-7">
										<label class="control-label text-muted font-12">(결제/입금이 완료되어야 최종 예약이 완료됩니다.)</label>
									</div>
								</div>

								<div class="form-group form-group-sm">
									<label class="col-xs-4 col-sm-2 control-label">결제방법</label>
									<div class="col-xs-8 col-sm-10 radio-line">
										<label><input type="radio" name="bk_payment" id="bk_payment_bank" class="payment_type" value="무통장" checked="checked"> 무통장입금</label>            </div>
								</div>

								<div id="bank_info_box" style="display:">
									<div class="form-group form-group-sm">
										<label class="col-xs-4 col-sm-2 control-label" for="od_bank_account">입금계좌</label>
										<div class="col-xs-8 col-sm-5">
											<select name="bk_bank_account" id="bk_bank_account" class="form-control">
												<option value="기업은행  165-000158-01-082  성남산업단지관리공단">기업은행  165-000158-01-082  성남산업단지관리공단</option>
											</select>
										</div>
									</div>

									<div class="form-group form-group-sm">
										<label class="col-xs-4 col-sm-2 control-label" for="od_deposit_name">입금자명</label>
										<div class="col-xs-8 col-sm-2">
											<input type="text" name="bk_deposit_name" id="bk_deposit_name" class="form-control" placeholder="입금자명" maxlength="20">
										</div>
									</div>

								</div>
							</div>
						</div>


						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 이용규정안내</strong></div>
							<div class="panel-body">

								<div class="bs-callout bs-callout-info">
									<h4 style="display:none">기본예약안내</h4>
									<p>- 사업자등록증 팩스 송부 및 입금이 완료되어야 예약이 확정됩니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span>&nbsp;</p>
									<p>- 개별사정으로 예약취소 시<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>취소신청서와 함께 관리공단의 승인을 받아야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 예약취소로 인한 환불은 예약날짜 기준 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">7</span>일 전까지만 가능합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p>
									<p>- 주차는 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">1</span>시간 무료이며 이후 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">30</span>분당 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">500</span>원을 개별 납부하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p>
									<p>- 회의실 사용 전 준비 및 사용 후 정리정돈은 사용자가 하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 회의실 내 간단한 다과 및 음료 외의 음식물 반입을 금지합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p>
									<p>- 집기비품은 별도 제공이 불가하며<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>필요하실 경우 사용자가 가져오셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 사용자 과오로 회의실 시설물 훼손 및 파손 시<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>사용자가 일체 변상하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p>
									<p><br></p>
									<p>※ 산업단지 입주업체 및 공공기관을 기준이며, 그 외 업체의 경우 2배 금액을 적용합니다.</p><p>※ 회의실 운영시간은 평일 09:00 ~ 17:00까지 입니다&nbsp;</p>
									<p>※ 현수막 사이즈 : 가로 6m × 세로 90㎝ (대회의실 기준)</p>
									<p>※ 빔프로젝트 사용하실 노트북은 따로 준비하셔야 합니다.</p>
									
									<p>※ 입금계좌번호 : 기업은행 성남하이테크지점 165-000158-01-082&nbsp; 예금주 : 성남산업단지관리공단<br></p>
									<p><br></p>
									<p>*&nbsp;문의 : 관리공단 관리팀 이상인 과장 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">(</span>전화<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">:031-750-2805 / </span>팩스<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">:031-750-2818)</span></p>
									<p><br></p>        
								</div>
								
								<div class="bs-callout bs-callout-warning" style="display:none">
									<h4>이용 안내</h4>
									이용안내&nbsp;- 관리자화면에서 에디터로 수정가능       
								</div>
								
								<div class="bs-callout bs-callout-warning">
									<h4>환불규정</h4>
									<p>- 사용일 기준 7일 전까지만 환불요청이 가능 합니다.</p>        
								</div>
								
							</div>
							<div class="panel-footer">
								<label><input type="checkbox" name="agree1" value="1" id="agree1"> 상기의 내용을 숙지하고 예약규정에 동의 합니다.</label>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 개인정보 활용 동의</strong></div>
							<div class="panel-body">

								귀하의 소중한 개인정보는 개인정보보호법의 관련 규정에 의하여 예약 및 조회 등 아래의 목적으로 수집 및 이용됩니다.
									<ul class="purpose">
									<li>1. 개인정보의 수집·이용 목적 - 예약, 조회를 위한 본인 확인 절차</li>
									<li>2. 개인정보 수집 항목 - 연락처, 이메일</li>
									<li>3. 개인정보의 보유 및 이용기간 - 이용자의 개인정보는 원칙적으로 개인정보의 처리목적이 달성되면 지체 없이 파기합니다.</li>
								</ul>

								예약을 위하여 수집된 개인정보는 ‘전자상거래 등에서의 소비자보호에 관한 법률’ 제6조에의거 정해진 기간동안 보유됩니다.<br>
								※ 상기 내용은 고객님께 예약서비스를 제공하는데 필요한 최소한의 정보입니다.<br>
								※ 상기 내용에 대하여 본인이 동의하지 않을 수 있으나, 그러할 경우 예약 서비스 제공에 차질이 발생할 수 있습니다.

							</div>
							<div class="panel-footer">
								<label><input type="checkbox" name="agree2" value="1" id="agree2"> 개인정보 활용에 동의 합니다.</label>
							</div>
						</div>

						<div class="row">

							<div id="display_pay_button" class="col-md-12 btn-group-justified" role="group">
								<div class="btn-group" role="group">
									<button type="button" class="btn btn-lg btn-pre" onclick="location.href='/support/reservation';"><i class="fa fa-chevron-left fa-sm"></i> 이전단계</button>
								</div>
								<div class="btn-group" role="group">
									<button type="button" id="submit_next" data-loading-text="Loading..." autocomplete="off" class="btn btn-lg btn-info" onclick="getNext();"><i class="fa fa-check-circle-o fa-sm"></i> 예약하기</button>
								</div>
							</div>

							<div id="display_pay_process" style="display:none;">
								결제가 진행중입니다...
							</div>

							
						</div>

						</form>			
				</div>

		

			</div>
		</div>
	</div>
	
	<!-- Footer -->

<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>

<script>
function getNext(){
	if($("input:checkbox[id='agree1']").is(":checked") == false){
		alert('예약규정 내용에 동의를 해주세요.');
		return false;
	}
	if($("input:checkbox[id='agree2']").is(":checked") == false){
		alert('개인정보 활용에 동의를 해주세요.');
		return false;
	}
	if($("#bk_name").val()==""){
		alert("회사명을 입력해주세요.");
		return false;
	}
	if($("#bk_rname").val()==""){
		alert("담당자명을 입력해주세요.");
		return false;
	}
	if($("#bk_hp").val()==""){
		alert("연락처를 입력해주세요.");
		return false;
	}
	if($("#bk_email").val()==""){
		alert("이메일을 입력해주세요.");
		return false;
	}

	var frm = document.wzfrm;
	var formData = new FormData(frm);

	$.ajax({
			type: 'POST',
			url: '/Form/Meetingsave',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){},
			success: function(result){
	
				if(result=="E200"){
					alert("저장 되었습니다.");
					location.href='/support/reservation';
				}else{
					alert("등록 실패 되었습니다.");
				
				}
			}
			,complete:function(){}
		});
}
</script>
</body>
</html>