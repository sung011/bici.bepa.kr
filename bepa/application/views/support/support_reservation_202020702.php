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
		<div class="container" >

			<div class="row features_row" >	
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >	
				<!--
					<div class="notice_title">
						<h2 >공간공유서비스</h2>
					</div>-->
					<div class="notice_table notice-block2" style="padding:15px 5px 15px 5px;min-height:800px;">						
			
						<ul class="restab">
							<li class="tablinks active" >
								대회의실 실시간예약
							</li>
							<li class="tablinks " onclick="Room_moving('2');">
								소회의실 실시간예약
							</li>
							<li class="tablinks" onclick="Room_moving('3');">
								예약확인/취소
							</li>
						</li>
						<div id="Sground1" class="tabcontent">
							<div class="content-right" style="float:left;width:60%;">
								<table id="calendar" class="shcjel-table">
								  <thead>
									<tr style="height:50px;">
									  <td style="border:none;">										
										<button id="before" class="btn btn-default" onclick="beforem()">이전</button>									
									  </td>
									  <td  style="border:none;font-size:18px;" align="center" id="yearmonth" colspan="5">
									  </td>
									  <td style="border:none;">
										<button id="next" class="btn btn-default" onclick="nextm()">다음</button>							
									  </td>
									</tr>
									<tr  class="tr-th-top">
										<th class = "schjel-th">Sun</td>
										<th class = "schjel-th">Mon</td>
										<th class = "schjel-th">Tue</td>
										<th class = "schjel-th">Wed</td>
										<th class = "schjel-th">Thu</td>
										<th class = "schjel-th">Fri</td>
										<th class = "schjel-th">Sat</td>
									  </tr>
								  </thead>
								  <tbody id="calendar-body" class="calendar-body"></tbody>
								</table>
							</div>
							<div class="content-left" style="float:left;width:39%;padding:5px 5px 5px 15px;">
							
								<div class="reserdate">
									<div class="">예약일 : <span id="select-date-text"></span></div>
								</div>

								<form method="post" name="wzfrm" id="wzfrm" action="/support/reserwrite" onload="reset();">
								<input type="hidden" name="mode" id="mode" value="step2">
								<input type="hidden" name="sch_day" id="sch_day" value="">
								<input type="hidden" name="sch_month" id="sch_month" value="">
								<input type="hidden" name="sch_year" id="sch_year" value="">
								<input type="hidden" name="sch_room" id="sch_room" value="">
								<input type="hidden" name="sch_time1" id="sch_time1" value="">
								<input type="hidden" name="sch_time2" id="sch_time2" value="">

						
								<div class="row">

									<div class="col-md-12">

										<div id="room-select-list">
							
											<div class="media-body info">
												<h4 class="room-heading" id="top-aligned-media">대회의실</h4>
												<div class="room-desc">13시(PM 1시) 기준 오전 및 오후로 예약 가능합니다.
													<br>종일 예약시에는 오전과 오후 2건을 함께 선택 후 '다음단계'로 이동하시기 바랍니다.
													<br>* 종일 예약을 하실때는 꼭 '오전' 을 먼저 선택하신 후 '오후'를 선택하시기 바랍니다.</div>
												</div>

												<ul class="bx-times">
													<li>
														<a href="#none"  class="btn-time cal_rm_list" data-rm-ix="1" data-time="09:00" data-index="1" id="btn_time_1_1"><span class="time">오전</span><span class="time_i">09시 ~ 13시</span></a></li>
													<li>
														 <a href="#none"  class="btn-time cal_rm_list" data-rm-ix="1" data-time="13:00" data-index="2" id="btn_time_1_2"><span class="time">오후</span><span class="time_i">13시 ~ 17시</span></a></li>
												</ul>				
												<div id="room-select-form"></div>
											</div>
									</div>
								</div>

								<div class="row">

									<div class="col-md-12" >
											<button type="button" class="btn btn-block btn-step" onclick="schejul_step3();">다음단계 <i class="fa fa-chevron-right fa-sm"></i></button>
									</div>

								</div>

								</form>

								<div class="clearfix" style="height:15px;"></div>

								<div class="panel panel-default hidden-md hidden-lg">
												<!-- List group -->
									<ul class="list-group">
										<li class="list-group-item"><i class="fa fa-check-circle-o" aria-hidden="true"></i> 달력에서 원하시는 예약일을 선택하시면 이용가능한 정보가 출력됩니다.</li>
										<li class="list-group-item"><i class="fa fa-check-circle-o" aria-hidden="true"></i> 예약 전 반드시 주의사항을 숙지하시기 바랍니다.</li>
									</ul>

									<div class="panel-body">
										<p></p><p>- 대회의실 : 면적&nbsp;282.86㎡, 수용인원 100석, 현수막 사용가능, 음향시설 사용가능, 빔프로젝트 사용가능, 냉온풍기 사용가능.<br></p><p>- 소회의실 : 면적&nbsp;132.77㎡, 수용인원 20석, 현수막 사용불가, 음향시설 사용불가, 빔프로젝트 사용가능, 냉온풍기 사용가능.</p><p>- 종일 예약은 오전과 오후 2건을 선택하신 후 '다음단계' 로 이동하시기 바랍니다.</p><p></p>
									</div>

								</div>					
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
function pad(n, width) {
  n = n + '';
  return n.length >= width ? n : new Array(width - n.length + 1).join('0') + n;
}

var today = new Date(); // 오늘 날짜
var date = new Date();
 
function beforem() //이전 달을 today에 값을 저장
{ 
	today = new Date(today.getFullYear(), today.getMonth() - 1, today.getDate());
	build(); //만들기
}

function nextm()  //다음 달을 today에 저장
{
	today = new Date(today.getFullYear(), today.getMonth() + 1, today.getDate());
	build();
}

function build()
{
	var nMonth = new Date(today.getFullYear(), today.getMonth(), 1); //현재달의 첫째 날
	var lastDate = new Date(today.getFullYear(), today.getMonth() + 1, 0); //현재 달의 마지막 날
	var tbcal = document.getElementById("calendar"); // 테이블 달력을 만들 테이블
	var yearmonth = document.getElementById("yearmonth"); //  년도와 월 출력할곳
	yearmonth.innerHTML = today.getFullYear() + "년 "+ (today.getMonth() + 1) + "월"; //년도와 월 출력
	/*
	if(today.getMonth()+1==12) //  눌렀을 때 월이 넘어가는 곳
	{
		before.innerHTML=(today.getMonth())+"월";
		next.innerHTML="1월";
	}
	else if(today.getMonth()+1==1) //  1월 일 때
	{
	before.innerHTML="12월";
	next.innerHTML=(today.getMonth()+2)+"월";
	}
	else //   12월 일 때
	{
		before.innerHTML=(today.getMonth())+"월";
		next.innerHTML=(today.getMonth()+2)+"월";
	}
	*/
	var status_array = [];
	var rms_time_array = [];
	var rm_ix_array = [];
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: "/Support/roomstatus",
		data: {
			'rm_ix':'1',
			'rms_year':today.getFullYear(),
			'rms_month':today.getMonth() +1
		},
		cache: false,
		beforeSend:function(){	
		},
		success: function(json){				
			if(json=="E500"){

			}else{
			  var list_array =  json;
			  var list_total = list_array.length;
				for(i=0; i < list_total; i++) {	
				   var rms_day = list_array[i]['rms_day'];
				   var rms_time = list_array[i]['rms_time'];
				   var rm_ix = list_array[i]['rm_ix'];
				   //status_array[i] = "['"+rms_day+"','"+rm_ix+"','"+rms_time+"']";
				   status_array[i] = rms_day;
				   rms_time_array[i] = rms_time;
				   rm_ix_array[i] = rm_ix;
				}				
			}
		}
		,complete:function(){	
				//console.log(status_array);
				
				while (tbcal.rows.length > 2) 
				{
					tbcal.deleteRow(tbcal.rows.length - 1);
				}
				var row = null;
				row = tbcal.insertRow();
				var cnt = 0;

				// 1일 시작칸 찾기
				for (i = 0; i < nMonth.getDay(); i++) 
				{
					
					cell = row.insertCell();
					
					cnt = cnt + 1;
				}
				var selcontent="";
				var matcher = false;
				
				// 달력 출력
				//alert(today.getMonth());
				//alert(date.getMonth()+2);
				for (i = 1; i <= lastDate.getDate(); i++) // 1일부터 마지막 일까지
				{ 
					var matching = pad(i, 2);
		
					var display_time="";
					var display_ix="";
					var display_Meeting="";
					var j =0;
					
					for (var key in status_array) { 
						if(status_array[key] == matching){
							matcher = true;
							if(rm_ix_array[key]=='1'){
								display_ix = "대회의실";							
							}else{
								display_ix ="소회의실";
							}
							if(rms_time_array[key]=='09:00'){
								display_time = "오전";							
							}else{
								display_time ="오후";
							}
							display_Meeting += "<p class='table-sp'>"+display_time+" 예약완료</p>";
							j++;							
						}else{
						}
						
					}
					
					cell = row.insertCell();
					cnt = cnt + 1;
					if((today.getFullYear()==date.getFullYear()&&today.getMonth() < date.getMonth()) || (today.getFullYear()==date.getFullYear()&&today.getMonth()==date.getMonth()&&i < date.getDate()) || (today.getFullYear()==date.getFullYear()&&today.getMonth() > date.getMonth()+ 1)) 
					{
						cell.innerHTML = "<div class='cel-num'>"+i+"</div>";
						cell.innerHTML += "<div class='cel-txt'>&nbsp;</div>";
						cell.setAttribute('id', 'abcdefgh'+i);
					}else{
						
						if(matcher == true){
							var bincnt = 2 - j;
							cell.innerHTML = "<div class='cel-num' onclick=\"schejule_step('"+i+"')\">"+i+"</div>";
							cell.innerHTML += "<div class='cel-txt' onclick=\"schejule_step('"+i+"')\">"+display_Meeting+"<p class='table-sp'>공실("+bincnt+")</p></div>";
						}else{
							cell.innerHTML = "<div class='cel-num' onclick=\"schejule_step('"+i+"')\">"+i+"</div>";
							cell.innerHTML += "<div class='cel-txt' onclick=\"schejule_step('"+i+"')\">공실(2)</div>";
						}
						
						
						cell.setAttribute('id', 'abcdefgh'+i);
						if((cnt % 7 == 1) || (cnt % 7 == 0)) {
						
						}else{
							cell.setAttribute('class', 'schtd');
						}
					}
					
					cell.style.height = "90px";

					
					//cell.addClass('schjel-td'); 
					
					if (cnt % 7 == 1) {//일요일 계산
						cell.innerHTML = "<div class='cel-num'><font color=#FF9090>" + i+"</div>";//일요일에 색
						cell.innerHTML += "<div class='cel-txt'>&nbsp;</div>";
						cell.bgColor = "#f5f5f5"; //오늘날짜배경색
					}
					if (cnt % 7 == 0) { // 1주일이 7일 이므로 토요일 계산
						cell.innerHTML = "<div class='cel-num'><font color=#7ED5E4>" + i+"</div>";//토요일에 색
						cell.innerHTML += "<div class='cel-txt'>&nbsp;</div>";
						cell.style.borderRight = "1px solid #ddd";
						cell.bgColor = "#f5f5f5"; //오늘날짜배경색
						row = calendar.insertRow();// 줄 추가
					}
					if(i == lastDate.getDate()){
						cell.style.borderRight = "1px solid #ddd";
					}if((today.getFullYear()==date.getFullYear()&&today.getMonth() < date.getMonth()) || (today.getFullYear()==date.getFullYear()&&today.getMonth()==date.getMonth()&&i < date.getDate()) || (today.getFullYear()==date.getFullYear()&&today.getMonth() > date.getMonth()+ 1)) 
					{
						cell.bgColor = "#f5f5f5"; //오늘날짜배경색
					}
					
					if(today.getFullYear()==date.getFullYear()&&today.getMonth()==date.getMonth()&&i==date.getDate()) 
					{
						cell.bgColor = "#c3e2ef"; //오늘날짜배경색
					}
				}
		}
	});

	// 남은 테이블 줄 삭제
	

}


function schejule_step(seq){
	
	if(typeof seq=="undefined" || seq==null || seq==""  ){ 
		seq = date.getDate();
	}
	document.getElementById("wzfrm").reset();
	$('.bx-times>li >a').removeClass('btn-active')
	$('.bx-times2>li >a').removeClass('btn-active')
	
	var selecttext = document.getElementById("select-date-text");
	selecttext.innerHTML = today.getFullYear() + "년 "+ (today.getMonth() + 1) + "월" + seq + "일"; //년도와 월 출력
	var syear =today.getFullYear();
	var sMonth =today.getMonth() + 1;
	$('.bx-times>li >a').removeClass('btn-disabled');
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: "/Support/roomstatus",
		data: {
			'rm_ix':'1',
			'rms_year':syear,
			'rms_month':sMonth,
			'rms_day':seq,
		},
		cache: false,
		beforeSend:function(){	
		},
		success: function(json){				
			if(json=="E500"){
		
			}else{
			  var list_array =  json;
			  var list_total = list_array.length;
				for(i=0; i < list_total; i++) {	
	
				   var rms_time = list_array[i]['rms_time'];
				   
				   if(rms_time =="09:00"){
	
						$('#btn_time_1_1').addClass('btn-disabled');
				   }
				   if(rms_time =="13:00"){
					    $('#btn_time_1_2').addClass('btn-disabled');
				   }			   
				}				
			}
		}
		,complete:function(){	
			$('#sch_day').val(seq);
			$('#sch_month').val(sMonth);
			$('#sch_year').val(syear);
			$('.schtd').css('background','#fff');
			$('#abcdefgh' + seq ).css('background','#c3e2ef');
		}
	});
	

}



$('.bx-times>li >a').on('click', function(){
	if ($('.bx-times2>li >a').hasClass('btn-active')) {	
		return false;
	}
	var bbsreplll = $(this).attr('id'); 
	//alert(bbsreplll);
	if ($('#'+bbsreplll).hasClass('btn-disabled')) {
		alert("이미 예약된 시간입니다.");
		return false;
	}
	$(this).removeAttr('href');	
	var element = $(this);
	if (element.hasClass('btn-active')) {
		element.removeClass('btn-active');
		var dataindex = element.attr( 'data-index' );
		if ($('.bx-times>li >a').hasClass('btn-active')) {		
		}else{
			$('#sch_room').val('');
		}
		if(dataindex =='1'){$('#sch_time1').val('');}
		if(dataindex =='2'){$('#sch_time2').val('');}

	}else{
		element.addClass('btn-active');
		var dataindex = element.attr( 'data-index' );
		$('#sch_room').val('1');
		if(dataindex =='1'){$('#sch_time1').val('1');}
		if(dataindex =='2'){$('#sch_time2').val('2');}		
	}
	
});

function schejul_step3(){
	var sroom = $('#sch_room').val();
	if(sroom == ""){
		alert("회의실을 선택해 주세요.");
		return false;
	}
	var frm = document.wzfrm;
	frm.submit();
}

function Room_moving(mov){	
	if(mov=='2'){
		location.href='/Support/sreservate';
	}else if(mov=='3'){
		location.href='/Support/recancel';
	}
}

$("document").ready(function(){     
	build();	
	$("#Sground1").css('display','block');
	schejule_step();
});

</script>
</body>
</html>