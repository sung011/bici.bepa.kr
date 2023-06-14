<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
if($user_data['bk_misu'] > 0){
	$receipt = "미결제";
}else{
	$receipt = "결제완료";
}
//if(empty($nw_disable_hours)){$nw_disable_hours="24";}
?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">	
		<div class="col-lg-12 col-xs-12" style="padding:0px;">
	
			<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
				<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
					
					<div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title box-stitle"><?php echo $Title2; ?> </h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-danger btn-pup" style="width:200px;" onclick="Meetingdel();">삭제</button>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
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
								<div class="panel-heading"><strong><i class="fa fa-cart-plus fa-lg"></i> 결제 정보</strong></div>					
								<div class="table-responsive">
									<form name="payfrm" method="post">
									<input type="hidden" name="bk_ix" id="bk_ix" value="<?php echo $user_data['bk_ix'];?>">
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
											<select name="bk_status" id="bk_status" class="form-control" style="width:100px;display:inline">
												<option value="대기">대기</option>
												<option value="완료">완료</option>	
												<option value="취소">취소</option>	
											</select>
								
											&nbsp;&nbsp;&nbsp;입금액
											<input type="text" class="form-control" name="bk_receipt_price" id="bk_receipt_price" value="<?php echo number_format($user_data['bk_receipt_price'],0);?>" style="width:100px;display:inline">
											<button type="button" class="btn btn-info" onclick="payfor();">총 이용금액입금</button>
											&nbsp;&nbsp;&nbsp;미수금
											<input type="text" class="form-control" name="bk_misu" id="bk_misu" value="<?php echo number_format($user_data['bk_misu'],0);?>" style="width:100px;display:inline">
											</td>
										</tr> 
										<tr>
											<th scope="col">결제완료일시</th>
											<td>
											<input type="text" class="form-control" name="bk_receipt_time" id="bk_receipt_time" value="<?php echo $user_data['bk_receipt_time'];?>" style="width:40%;display:inline">
											&nbsp;&nbsp;&nbsp;<label for="begin_ck" class="checkbox" style="display:inline;width:35%;"><input type="checkbox" name="begin_ck" id="begin_ck" onclick="beginck();">
												현재시간으로 설정</label>
											</td>
										</tr>
									 </tbody>
									 </table>
									 </form>
								</div>
								<div class="panel-footer"> 
									<button type="button" class="btn btn-primary" onclick="Pay_modify();">결제처리 변경</button>
									<button type="button" class="btn btn-success" onclick="go_Meeting();">목록으로 가기</button>
								</div>
							</div>
							<br>

							<div class="panel panel-default">
								<div class="panel-heading"><strong><i class="fa fa-cart-plus fa-lg"></i> 예약자 정보</strong></div>					
								<div class="table-responsive">
									<form name="usrfrm" method="post">
									<table class="table form-group form-group-sm table-bordered font-color-gray">
										<caption></caption>
										<colgroup>
											<col width="100px;">
											<col>
										</colgroup>
										<tbody>
										<tr>
											<th scope="col">예약번호</th>
											<td>
												<strong style="color:#000;"><?php echo $user_data['od_id'];?></strong>
												<input type="hidden" name="od_id" id="od_id" value="<?php echo $user_data['od_id'];?>">
												
											</td>
										</tr>
										<tr>
											<th scope="col">예약일시</th>
											<td><?php echo $user_data['bk_time'];?></td>
										</tr> 
										<tr>
											<th scope="col">회사명</th>
											<td><input type="text" class="form-control" name="bk_name" id="bk_name" value="<?php echo $user_data['bk_name'];?>" style="width:40%;"></td>
										</tr> 
										<tr>
											<th scope="col">담당자</th>
											<td><input type="text" class="form-control" name="bk_rname" id="bk_rname" value="<?php echo $user_data['bk_rname'];?>" style="width:40%;"></td>
										</tr>
										<tr>
											<th scope="col">연락처</th>
											<td><input type="text" class="form-control" name="bk_hp" id="bk_hp" value="<?php echo $user_data['bk_hp'];?>" style="width:40%;"></td>
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
											<td><input type="text" class="form-control" name="bk_email" id="bk_email" value="<?php echo $user_data['bk_email'];?>" style="width:40%;"></td>
										</tr>
										<tr>
											<th scope="col">기타사항</th>
											<td><textarea name="bk_memo" id="bk_memo" colspan="4" style="width:100%;"><?php echo $user_data['bk_memo'];?></textarea></td>
										</tr>
									</tbody>
									</table>
									</form>
								</div>
								<div class="panel-footer"> 
									<button type="button" class="btn btn-primary" onclick="Rever_modify();">예약자 정보 변경</button>
									<button type="button" class="btn btn-success" onclick="go_Meeting();">목록으로 가기</button>
								</div>		
							</div>								
						</div>

					</div>

				</div>	
			</div>		
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script src="<?=base_url('assets/inc/js/meetingdetail.js')?>"></script>
<script>
document.payfrm.bk_status.value="<?php echo $user_data['bk_status']; ?>";
</script>