<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>

/* Style the tab */
.restab {
	position: relative;
    padding-left: 0;
    list-style: none;
	margin-top: 0;
	height:49px;
	border-bottom: 1px solid #ddd;
}

/* Style the buttons inside the tab */
.restab .tablinks {
  position: relative;
  display: block;
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding:10px 13px;
  transition: 0.3s;
  font-size: 17px;
  margin-bottom:-1px;
  
}

/* Change background color of buttons on hover */
.restab .tablinks:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.restab li.active  {
    color: #555;
    background-color: #fff;
    border: 1px solid #ddd;
    border-bottom-color: transparent;
	 z-index:100000;
}

/* Style the tab content */
.tabcontent {
  clear:both;
  display: none;
  padding: 6px 12px;
  border-top: none;
  height:500px;
}
.shcjel-table{min-width:665px;}
.schjel-th{
	padding:10px;
	text-align:center;
	border-left:1px solid #eee;
	border-bottom:1px solid #eee;
}
.schjel-td{
	background:#fff;
	padding:5px;
	height:90px;
	border-left:1px solid #eee;
	border-bottom:1px solid #eee;
}
.schjel-td-right{
	background:#fff;
	padding:5px;
	height:90px;
	border-left:1px solid #eee;
	border-right:1px solid #eee;
	border-bottom:1px solid #eee;
}
.shcjel-table td p{text-align:right;margin:0px;}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">기업지원</a></li>
								<li>공간공유서비스 예약</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->
	<div class="features" >
		<div class="container" >

			<div class="row features_row" >	
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >					
					<div class="notice_title">
						<h2 >공간공유서비스</h2>
					</div>
					<div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;height:700px;">						
			
						<ul class="restab">
							<li class="tablinks active" onclick="resRoom(event, 'Sground1')">
								실시간예약
							</li>
							<li class="tablinks" onclick="resRoom(event, 'Sground2')">
							예약확인/취소
							</li>
						</li>
						<div id="Sground1" class="tabcontent">
							<?php
								//$yy = $_REQUEST['yy'];
								//$mm = $_REQUEST['mm'];
								$yy ="";
								$mm ="";
								if($yy == '') $yy = date('Y');
								if($mm == '') $mm = date('m');

								function sel_yy($yy, $func) {
									if($yy == '') $yy = date('Y');

									if($func=='') {
										$str = "<select name='yy'>\n<option value=''></option>\n";
									} else {
										$str = "<select name='yy' onChange='$func'>\n<option value=''></option>\n";
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
										$str = "<select name='mm'>\n";
									} else {
										$str = "<select name='mm' onChange='$func'>\n";
									}
									for($i=1;$i<13;$i++) {
										if($mm == $i) $str .= "<option value='$i' selected>{$i}월</option>";
										else $str .= "<option value='$i'>{$i}월</option>";
									}
									$str .= "</select>";
									return $str;
								}

								function get_schedule($yy,$mm,$dd) {
									$mm = str_pad($mm, 2, "0", STR_PAD_LEFT);
									$dd = str_pad($dd, 2, "0", STR_PAD_LEFT);
									$dtstr = $yy."-".$mm."-".$dd;
									$sql = "SELECT *
											FROM schedule
											WHERE frdt <= '$dtstr'
												AND todt >= '$dtstr'
												ORDER BY frdt, todt";
									$ret = dbquery($sql) or die(mysql_error());
									while($row = dbfetch($ret)) {
										$str .= "<font style='font-size:8pt;'>- $row[name]</font><br>";
									}
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
								<div style="padding:10px;font-size:15px;text-align:center;">
									<?php echo $yy."년 ".$mm."월"; ?>
								</div>
								<table class="shcjel-table" >
								<thead>
									<tr class="tr-th-top">
										<th class="schjel-th">일</th>
										<th class="schjel-th">월</th>
										<th class="schjel-th">화</th>
										<th class="schjel-th">수</th>
										<th class="schjel-th">목</th>
										<th class="schjel-th">금</th>
										<th class="schjel-th" style="border-right:1px solid #eee;">토</th>									
									</tr>
								</thead>
							
								<tbody>
								<?php
								$today_yy = date('Y');
								$today_mm = date('m');
								// 5. 화면에 표시할 화면의 초기값을 1로 설정
								$day=1;

								// 6. 총 주 수에 맞춰서 세로줄 만들기
								for($i=1; $i <= $total_week; $i++){?>
								<tr>
								<?php
									// 7. 총 가로칸 만들기
									for ($j=0; $j<7; $j++){
								?>
								<?php
								if($j == '6'){
									echo "<td class='schjel-td-right' >";
								}else{
									echo "<td class='schjel-td' >";
								}
								?>
									
								  <?php
									// 8. 첫번째 주이고 시작요일보다 $j가 작거나 마지막주이고 $j가 마지막 요일보다 크면 표시하지 않아야하므로
									//    그 반대의 경우 -  ! 으로 표현 - 에만 날자를 표시한다.
									if (!(($i == 1 && $j < $start_week) || ($i == $total_week && $j > $last_week))){
										echo "<p >";
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
											echo "";
										}										
										// 13. 날자 출력
										echo $day."";

										if($today_yy == $yy && $today_mm == $mm && $day == date("j")){
											echo "";
										}
										
										echo "</b></font> &nbsp;";
										echo "</p>";
										echo "<p style='border:1px solid #f8f8f8;height:50px;'>&nbsp;</p>";

										//스케줄 출력
										//$schstr = get_schedule($yy,$mm,$day);
										//echo $schstr;

										// 14. 날자 증가
										$day++;
									}
									?>
								</td>
								<?php 
								}
								?>
								</tr>
								<?php
								}
								?>
								</table> 
								</form>
						</div>
						<div id="Sground2" class="tabcontent">
							bbb
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
function resRoom(evt, resblock) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(resblock).style.display = "block";
  evt.currentTarget.className += " active";
}

$("#Sground1").css('display','block');
</script>
</body>
</html>