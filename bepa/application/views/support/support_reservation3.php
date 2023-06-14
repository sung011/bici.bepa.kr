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
								<li>대회의실 예약</li>
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
					
					<div class="notice_table " style="padding:15px 5px 15px 5px;">						
			
					<ul class="restab">
						<li class="tablinks" onclick="Room_moving('1');">
							대회의실 실시간예약
						</li>
						<li class="tablinks" onclick="Room_moving('2');">
							소회의실 실시간예약
						</li>
						<li class="tablinks active" >
							예약확인/취소
						</li>
					</li>
					</div>
					<?php
					if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
					?>
					<div id="Sground1" class="tabcontent" style="min-height:1200px;" >
						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-user fa-lg"></i> 예약안내</strong></div>
							<div class="table-responsive">
								<table class="table form-group form-group-sm table-bordered font-color-gray">
								<thead>
									<tr>
										<th scope="col" class="talign_c">예약정보</th> 
										<th scope="col" class="talign_c">예약자명</th>
										<th scope="col" class="talign_c">이용요금</th>            
										<th scope="col" class="talign_c">예약상태</th>
										<th scope="col" class="talign_c">결제방식</th>        
									</tr>
								</thead>
								<tbody>
								<?php
									$rcnt =count($room_data);
									if($rcnt > 0){
										$room_title="";
										$t_price =0;
										for($i=0;$i<$rcnt;$i++){
											if($room_data[$i]['bk_status']=="대기"){
												$rstatus = "<button type='button' class='btn btn-warning'>대기</button>";
											}else if($room_data[$i]['bk_status']=="완료"){
												$rstatus = "<button type='button' class='btn btn-info'>완료</button>";
											}else if($room_data[$i]['bk_status']=="취소"){
												$rstatus = "<button type='button' class='btn btn-danger'>취소</button>";
											}
											$od_id = base64_encode($room_data[$i]['od_id']);
										
										
								?>
									<tr>
										<td data-title="예약정보"><a class="room-sear" href="/Support/research?od_id=<?php echo $od_id;?>"><?php echo $room_data[$i]['bk_subject'];?>&nbsp;&nbsp;<i class="fa fa-search-plus"></i></a></td>
										<td data-title="예약자명"><?php echo $room_data[$i]['bk_name'];?></td>
										<td data-title="이용요금"><?php echo number_format($room_data[$i]['bk_reserv_price'],0);?> </td>
										<td data-title="예약상태"><?php echo $rstatus;?></td>
										<td data-title="결제방식"><?php echo $room_data[$i]['bk_payment'];?> </td>
									</tr>
								<?php
										}
									}else{
								?>
									<tr>
										<td colspan="7" style="text-align:center">
												예약내역이 존재하지 않습니다.
										</td>
									</tr>
								<?php
									}
								?>
								</tbody>
								</table>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 이용규정안내</strong></div>
							<div class="panel-body">
							
								<div class="bs-callout bs-callout-info">
									<h4 style="display:none">예약안내</h4>
									<p>- 사업자등록증 팩스 송부 및 입금이 완료되어야 예약이 확정됩니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span>&nbsp;</p><p>- 개별사정으로 예약취소 시<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>취소신청서와 함께 관리공단의 승인을 받아야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 예약취소로 인한 환불은 예약날짜 기준 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">7</span>일 전까지만 가능합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 주차는 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">1</span>시간 무료이며 이후 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">30</span>분당 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">500</span>원을 개별 납부하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 회의실 사용 전 준비 및 사용 후 정리정돈은 사용자가 하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 회의실 내 간단한 다과 및 음료 외의 음식물 반입을 금지합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 집기비품은 별도 제공이 불가하며<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>필요하실 경우 사용자가 가져오셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p>- 사용자 과오로 회의실 시설물 훼손 및 파손 시<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">, </span>사용자가 일체 변상하셔야 합니다<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">.</span></p><p><br></p><p>※ 산업단지 입주업체 및 공공기관을 기준이며, 그 외 업체의 경우 2배 금액을 적용합니다.</p><p>※ 회의실 운영시간은 평일 09:00 ~ 17:00까지 입니다&nbsp;</p><p>※ 현수막 사이즈 : 가로 6m × 세로 90㎝ (대회의실 기준)</p><p>※ 빔프로젝트 사용하실 노트북은 따로 준비하셔야 합니다.</p><p>※ 입금계좌번호 : 기업은행 성남하이테크지점 165-000158-01-082&nbsp; 예금주 : 성남산업단지관리공단<br></p><p><br></p><p>*&nbsp;문의 : 관리공단 관리팀 이상인 과장 <span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">(</span>전화<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">:031-750-2805 / </span>팩스<span lang="EN-US" style="font-family: 함초롬바탕; letter-spacing: 0pt;">:031-750-2818)</span></p><p><br></p>        </div>
								
										<div class="bs-callout bs-callout-warning" style="display:none">
									<h4>이용 안내</h4>
									이용안내&nbsp;- 관리자화면에서 에디터로 수정가능        </div>
								
										<div class="bs-callout bs-callout-warning" style="display:none">
									<h4>환불규정</h4>
									<p>- 사용일 기준 7일 전까지만 환불요청이 가능 합니다.</p>        
								</div>
								
							</div>

						</div>
					</div>
					<?php
					}else{
					?>
					<div id="Sground1" class="tabcontent">
						<div style="margin-top:30px;margin-right: auto;margin-left: auto;width:500px;">
							<form class="signup-form" name="wfrm">
								<h4class="text-center">예약자 정보를 입력하세요.</h4>
								<hr>
								<div class="form-group">
									<input type="text" name="user_nm" id="user_nm" class="form-control" placeholder="예약자명" required="required">
								</div>
								<div class="form-group">
									<input type="number" name="user_hp" id="user_hp" class="form-control" placeholder="핸드폰 '-' 제외" required="required">
								</div>
								<div class="form-group">
									<input type="number" name="user_no" id="user_no" class="form-control" placeholder="예약번호" required="required">
								</div>
						
								<div class="form-group text-center">
									<button type="button" class="btn btn-blue btn-block" onclick="MgetNext();"><i class="fa fa-calendar-check-o fa-lg"></i>&nbsp;&nbsp;예약정보확인</button>
								</div>
							</form>
						</div>						
					</div>	
					<?php
					}
					?>
				</div>	
			</div>
		</div>
	</div>
	
	<!-- Footer -->

<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>

<script>
function MgetNext(){

	if($("#user_nm").val()==""){
		alert("예약자명을 입력해주세요.");
		return false;
	}
	if($("#user_hp").val()==""){
		alert("핸드폰을 입력해주세요.");
		return false;
	}
	if($("#user_no").val()==""){
		alert("예약번호를 입력해주세요.");
		return false;
	}

	var frm = document.wfrm;
	var formData = new FormData(frm);
	var od_id="";
	$.ajax({
			type: 'POST',
			url: '/Support/MeetingConfirm',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){},
			success: function(result){
				//alert(result);
				if(result=="E500"){
					alert("정보가 일치하지 않습니다.");
				}else{
					var list_array = JSON.parse(result);
					var list_total = list_array.length;
					//alert(list_total);
					for(i=0; i < list_total; i++) {			
					   var od_id = list_array[i]['od_id'];
					   var bk_name = list_array[i]['bk_name'];						  
					}			
					location.href="/Support/research?od_id="+od_id;
				}
			}
			,complete:function(){}
		});
}

function Room_moving(mov){	
	if(mov=='1'){
		location.href='/Support/reservation';
	}else if(mov=='2'){
		location.href='/Support/sreservate';
	}
}
</script>
</body>
</html>