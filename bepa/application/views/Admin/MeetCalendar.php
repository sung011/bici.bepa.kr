<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 


if($yy == '') $yy = date('Y');
if($mm == '') $mm = date('m');
if($rm_ix == '') $rm_ix = '1';

function sel_yy($yy, $func) {
	if($yy == '') $yy = date('Y');

	if($func=='') {
		$str = "<select class='cal_sel' name='yy'>\n<option value=''></option>\n";
	} else {
		$str = "<select class='cal_sel' name='yy' onChange='$func'>\n<option value=''></option>\n";
	}
	$gijun = date('Y');
	for($i=$gijun-5;$i<$gijun+2;$i++) {
		if($yy == $i) $str .= "<option value='$i' selected>$i</option>";
		else $str .= "<option value='$i'>$i</option>";
	}
	$str .= "</select>";
	return $str;
}

function sel_mm($mm, $func) {
	if($func=='') {
		$str = "<select class='cal_sel' name='mm'>\n";
	} else {
		$str = "<select class='cal_sel' name='mm' onChange='$func'>\n";
	}
	for($i=1;$i<13;$i++) {
		if($mm == $i) $str .= "<option value='$i' selected>{$i}월</option>";
		else $str .= "<option value='$i'>{$i}월</option>";
	}
	$str .= "</select>";
	return $str;
}

// 1. 총일수 구하기
$last_day = date("t", strtotime($yy."-".$mm."-01"));

// 2. 시작요일 구하기
$start_week = date("w", strtotime($yy."-".$mm."-01"));

// 3. 총 몇 주인지 구하기
$total_week = ceil(($last_day + $start_week) / 7);

// 4. 마지막 요일 구하기
$last_week = date('w', strtotime($yy."-".$mm."-".$last_day));
?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
<style>
.cal_navi {
    text-align: center;
    margin: 10px 0;
}
a:link, a:visited {
    color: #000;
    text-decoration: none;
}
.cal_navi .title_red {
    font-weight: bold;
    line-height: 40px;
}
.cal_navi .title_red, .cal_navi .btn_reserve_prev, .cal_navi .btn_reserve_next {
    font-size: 14px;
    display: inline-block;
    margin: 0;
}
.tbl_head01 table {
    clear: both;
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}
.tbl_head01 tbody th {
    border: 1px solid #d6dce7;
    padding: 5px;
    text-align: center;
	width:14%;
}
.tbl_head01 tbody td {
    border: 1px solid #d6dce7;
    padding: 5px;
    text-align: right;
}
.cal_sel{
	padding:5px 10px;
	border:1px solid #ddd;
}
</style>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">	
		<div class="col-lg-12 col-xs-12" style="padding:0px;">
	
			<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
				<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
					
					<div class="box box-success">
						<form name="cfrm" method="post" action="<?php  $_SERVER['PHP_SELF']?>">
						<div class="box-header with-border">
						  <h3 class="box-title box-stitle"><?php echo $Title2; ?> </h3>
						 <div class="box-tools pull-right">				
							<select class='form-control' name="rm_ix" id="rm_ix" onchange="cal_send();">
								<option value='1'>대회의실</option>
								<option value='2'>소회의실</option>
							</select>
							
						
						  </div>
						</div>
						
						<div class="box-body" style="min-height:70vh;padding:2em;">
							<div class="tbl_head01 tbl_wrap">
						
								<div class="cal_navi">
									<?php echo sel_yy($yy,'submit();'); ?>&nbsp;년 <?php echo sel_mm($mm,'submit();'); ?>&nbsp;월 </td>
								</div>

								<table border="0" cellpadding="0" cellspacing="0" class="caltable-adm">
									<tbody>
									<tr height="30">
										<th class="sunday">일</th>
										<th>월</th>
										<th>화</th>
										<th>수</th>
										<th>목</th>
										<th>금</th>
										<th class="saturday">토</th>
									</tr>
									<?php
									$today_yy = date('Y');
									$today_mm = date('m');
									// 5. 화면에 표시할 화면의 초기값을 1로 설정
									$day=1;

									// 6. 총 주 수에 맞춰서 세로줄 만들기
									for($i=1; $i <= $total_week; $i++){
									?>
									<tr>
									<?php
										// 7. 총 가로칸 만들기
										for ($j=0; $j<7; $j++){
									?>
										<td height="120" align="left" valign="top" bgcolor="#FFFFFF">
									  <?php
										// 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않아야하므로
										//    그 반대의 경우 -  ! 으로 표현 - 에만 날자를 표시한다.
										if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))){

											if($j == 0){
												// 9. $j가 0이면 일요일이므로 빨간색
												echo "<font color='#FF0000'><b>";
											}else if($j == 6){
												// 10. $j가 0이면 일요일이므로 파란색
												echo "<font color='#0000FF'><b>";
											}else{
												// 11. 그외는 평일이므로 검정색
												echo "<font color='#000000'><b>";
											}

											// 12. 오늘 날자면 굵은 글씨
											if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
												echo "<u>";
											}
											
											// 13. 날자 출력
											echo $day;

											if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
												echo "</u>";
											}

											echo "</b></font> &nbsp;";

											//스케줄 출력

											if($j == 0){
																							
											}else if($j == 6){
												
											}else{
												$schstr = $this->Meeting_m->MeetingSchedule($yy,$mm,$day,$rm_ix);
												echo $schstr;
											}

											// 14. 날자 증가
											$day++;
										}
										?>
									</td>
										<?php }?>
									</tr>
									<?php }?>
									</tbody>
								</table>							
							</div>
						</div>
						</form>
					</div>

				</div>	
			</div>		
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script>
function cal_send(){
	var frm = document.cfrm;
	frm.submit();
}
document.cfrm.rm_ix.value="<?php echo $rm_ix; ?>";
</script>