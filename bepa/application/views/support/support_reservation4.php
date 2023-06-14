<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
if($user_data['bk_misu'] > 0){
	$receipt = "미결제";
}else{
	$receipt = "결제완료";
}
$bk_ix = $user_data['bk_ix'];
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
								<li>예약 확인</li>
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
					if($od_id){
					?>
					<div id="Sground1" class="tabcontent" style="min-height:1200px;" >
						<div class="alert alert-success alert-dismissible pay-bank-notice" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>						
							<strong class="res-message-title">예약 신청이 완료되었습니다.</strong>
							<ul class="desc">
								<li><i class="fa fa-info-circle fa-lg"></i> 예약 신청 후, 5일 안에 100% 입금이 완료되어야 예약이 확정됩니다.</li>
								<li><i class="fa fa-info-circle fa-lg"></i> 인터넷 예약 특성상 입금시간이 지체되면 예약이 중복될수 있어 빠른입금 부탁드립니다.</li>
								<li><i class="fa fa-info-circle fa-lg"></i> 입금완료 후 미리 준비할 수 있도록 이용전 통화하시는것이 좋습니다.</li>
							</ul>												
						</div>

						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-user fa-lg"></i> 예약정보</strong></div>
							<div class="table-responsive">
								<table class="table form-group form-group-sm table-bordered font-color-gray">
								<thead>
								<tr>
									<th scope="col">회의실</th>
									<th scope="col">이용일자</th>
									<th scope="col">예약시간</th>
									<th scope="col">예약건</th>
									<th scope="col">합계</th>
								</tr>
								</thead>
								<tbody>
								<?php
									$rcnt =count($room_data);
									if($rcnt > 0){
										$room_title="";
										$t_price =0;
										for($i=0;$i<$rcnt;$i++){
								
											if($room_data[$i]['bkr_time']=='09:00'){$room_time="오전 (09시 ~ 13시)";}
											if($room_data[$i]['bkr_time']=='13:00'){$room_time="오후 (13시 ~ 17시)";}
											$week = array("일" , "월"  , "화" , "수" , "목" , "금" ,"토") ;
											$weekday = $week[ date('w'  , strtotime($room_data[$i]['bkr_date'])  ) ] ;
											

											$t_price = $t_price + $room_data[$i]['bkr_price'];
										
								?>
									<tr>
										<td data-title="회의실"><?php echo $room_data[$i]['bkr_subject'];?></td>
										<td data-title="이용일자"><?php echo $room_data[$i]['bkr_date'];?>(<?php echo $weekday;?>)</td>
										<td data-title="예약시간"><?php echo $room_time;?> </td>
										<td data-title="예약건">1</td>
										<td data-title="합계"><?php echo number_format($room_data[$i]['bkr_price'],0);?> 원 (VAT 포함)</td>
									</tr>
								<?php
										}
									}
								?>
								</tbody>						
								<thead>
								<tr>
									<th colspan="4">합계</th>
									<th><?php echo  number_format($user_data['bk_reserv_price'],0);?>원 (VAT 포함)</th>
								</tr> 
								</thead>								
								</table>
							</div>
						</div>
						<div class="row">

							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">예약금</h3>
									</div>
									<div class="panel-body">
										<?php echo  number_format($user_data['bk_reserv_price'],0);?> (VAT 포함)
										<span class="pull-right badge"><?php echo $receipt;?></span>
									</div>
								</div>
							</div>

							<div class="col-sm-4">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h3 class="panel-title">잔금</h3>
									</div>
									<div class="panel-body">
										0원
										<div class="pull-right badge"><?php echo $receipt;?></div>
									</div>
								</div>
							</div>
							
							<div class="col-sm-4">
								<div class="panel panel-success">
									<div class="panel-heading">
										<h3 class="panel-title">총이용금액</h3>
									</div>
									<div class="panel-body">
										<?php echo  number_format($user_data['bk_reserv_price'],0);?>원 (VAT 포함)
										<div class="pull-right badge"><?php echo $receipt;?></div>
									</div>
								</div>
							</div>

						</div>
						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-cart-plus fa-lg"></i> 예약자 정보</strong></div>					
							<div class="table-responsive">
								<table class="table form-group form-group-sm table-bordered font-color-gray">
								<caption></caption>
								<colgroup>
									<col width="100px;">
									<col>
								</colgroup>
								<tbody>														
									<tr>
										<th>결제방법</th>
										<td><?php echo $user_data['bk_payment'];?></td>
									</tr>
									
									<tr>

										<th>입금정보</th>
										<td>입금자명 : <?php echo $user_data['bk_deposit_name'];?>&nbsp;&nbsp;&nbsp;입금계좌 : <?php echo $user_data['bk_bank_account'];?></td>											 
									</tr>	
									<tr>
										<th scope="col">예약상태</th>
										<td>
										<?php echo $user_data['bk_status'];
										if($user_data['bk_status'] =="대기"){
										?>

										<button type="button" class="btn btn-xs btn-danger" onclick="getCancel('<?php echo $bk_ix;?>');">예약취소</button>           
										<?php } ?>
										</td>
									</tr> 
									<tr>
										<th scope="col">예약번호</th>
										<td><strong style="color:#000;"><?php echo $user_data['od_id'];?></strong></td>
									</tr>
									<tr>
										<th scope="col">예약일시</th>
										<td><?php echo $user_data['bk_time'];?></td>
									</tr> 
									<tr>
										<th scope="col">회사명</th>
										<td><?php echo $user_data['bk_name'];?></td>
									</tr> 
									<tr>
										<th scope="col">담당자</th>
										<td><?php echo $user_data['bk_rname'];?></td>
									</tr>
									<tr>
										<th scope="col">연락처</th>
										<td><?php echo $user_data['bk_hp'];?></td>
									</tr>
									<tr>
										<th scope="col">행사명</th>
										<td><?php echo $user_data['bk_subject'];?></td>
									</tr>
									<tr>
										<th scope="col">참가인원</th>
										<td><?php echo $user_data['bk_ho'];?></td>
									</tr>
									<tr>
										<th scope="col">시설신청</th>
										<td><?php echo $user_data['bk_carkind'];?></td>
									</tr>
									<tr>
										<th scope="col">이메일</th>
										<td><?php echo $user_data['bk_email'];?></td>
									</tr>
									<tr>
										<th scope="col">기타사항</th>
										<td><?php echo $user_data['bk_memo'];?></td>
									</tr>
								</tbody>
								</table>
							</div>
						</div>
					</div>
					<?php
					}
					?>
					<div style="text-align:center;margin-bottom:20px;">
						<a href="/Support/recancel"><button type="button" class="btn btn-info">뒤로가기</button></a>
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
function getCancel(bkix){
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: "/SuAccess/MeetingStatus",
		data: {
			'bk_ix':bkix,
			'bk_status':'3'
		},
		cache: false,
		beforeSend:function(){	
		},
		success: function(json){				
			if(json=="E200"){
				location.reload();
			}else{
				alert("전산장애로 상태변경 실패하였습니다.");
			}
		}
		,complete:function(){			 
		}
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