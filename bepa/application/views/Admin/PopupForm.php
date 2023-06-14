<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
$start_date = date("Y-m-d");

if(empty($nw_disable_hours)){$nw_disable_hours="24";}
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
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
							<div class="notice_table write-div">
								<form method="post" name="wfrm"  enctype="multipart/form-data">
								
								<input type="hidden" name="nw_id" id="nw_id" value="<?php echo $nw_id;?>">
								<div class="form-group has-success" style="clear:both;">
								  <label class="control-label" for="nw_subject"><i class="fa fa-check"></i>팝업 제목</label>
								  <input type="text" class="form-control" id="nw_subject" name="nw_subject" placeholder="제목을 입력해 주세요." value="<?php echo $nw_subject;?>">					
								</div>	
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" ><i class="fa fa-check"></i>구분</label>
									<select class="form-control" name="nw_division" id="nw_division"  >
										<option value="comm">홈페이지</option>
			
									</select>	
								</div>
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label" ><i class="fa fa-check"></i>접속기기</label>
									<select class="form-control" name="nw_device" id="nw_device"  >
										<option value="both">PC와 모바일</option>
										<option value="pc">PC</option>
										<option value="mobile">모바일</option>

									</select>	
								</div>
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check" ></i>시간</label>
									<div class="input-group date" style="width:25%;">
									  <div class="input-group-addon" style="width:60px;">
										<i class="fa fa-clock-o"></i>
									  </div>
									  <input type="text" class="form-control pull-right" id="nw_disable_hours" name="nw_disable_hours" value="<?php echo $nw_disable_hours;?>">
									</div>		
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" style="width:100%;"><i class="fa fa-check"></i>시작일시</label>
									<div class="input-group date" style="width:48%;display:inline-flex;">
									  <div class="input-group-addon" style="width:60px;">
										<i class="fa fa-clock-o"></i>
									  </div>
									  <input type="text" class="form-control " autocomplete="off" id="nw_begin_time" name="nw_begin_time" value="<?php echo $nw_begin_time;?>">
									 
									</div>
									<label for="begin_ck" class="checkbox" style="float:right;display: table-cell;width:45%;"><input type="checkbox" name="begin_ck" id="begin_ck" onclick="beginck();">시작일시를 오늘로</label>
								</div>
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label"  style="width:100%;"><i class="fa fa-check"></i>종료일시</label>

									<div class="input-group date" style="width:48%;display:inline-flex;">
									  <div class="input-group-addon" style="width:60px;">
										<i class="fa fa-clock-o"></i>
									  </div>
									  <input type="text" class="form-control " autocomplete="off" id="nw_end_time" name="nw_end_time" value="<?php echo $nw_end_time;?>">								  
									</div>											
									<label for="end_ck" class="checkbox" style="float:right;display: table-cell;width:45%;"><input type="checkbox" name="end_ck" id="end_ck" onclick="endck();">종료일시를 7일후로</label>
								</div>
								<div class="noti_contents" style="clear:both;margin-top: 15px; margin-bottom: 10px;">
									<label class="control-label" for="nw_content"><i class="fa fa-check"></i> 본문내용</label>
									<textarea name="nw_content" id="ir1" rows="15" style="width:100%;" value="">	
										<?php echo $nw_content;?>
									</textarea>
								</div>																
								</form>
								<div style="text-align:center;">					
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="PopupNew_send();">작성완료</button>											
									<button type="button" class="btn btn-success" style="font-size:13px;"><a href="/SuAdmin/PopupLayer" style="color:#fff;">목록가기</a></button>
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
<script type="text/javascript" src="<?=base_url('assets/SE28/js/HuskyEZCreator.js')?>" charset="utf-8"></script>
<script>






 var oEditors = [];
	nhn.husky.EZCreator.createInIFrame({
		oAppRef: oEditors,
		elPlaceHolder: "ir1",
		sSkinURI: "<?=base_url('assets/SE28/SmartEditor2Skin.html')?>",
		fOnAppLoad:function(){
			oEditors.getById['ir1'].setDefaultFont( "맑은 고딕", 11);
		},
		fCreator: "createSEditor2"
	});

var clareCalendar = {
		monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yy-mm-dd', //형식(20120303)
		autoSize: false, //오토리사이즈(body등 상위태그의 설정에 따른다)
		changeMonth: true, //월변경가능
		changeYear: true, //년변경가능
		showMonthAfterYear: true, //년 뒤에 월 표시
		//buttonImageOnly: true, //이미지표시
		//buttonText: '달력선택', //버튼 텍스트 표시
		//buttonImage: '/bootstrap/img/calender.gif', //이미지주소
		//showOn: "both", //엘리먼트와 이미지 동시 사용(both,button)
		yearRange: "2002:<?=date('Y')+1?>" //1990년부터 2020년까지
	};
	$("#nw_begin_time").datepicker(clareCalendar);
	$("#nw_end_time").datepicker(clareCalendar);
	//$("img.ui-datepicker-trigger").attr("style","margin-left:5px; *margin-top:-11px; vertical-align:middle; cursor:pointer;"); //이미지버튼 style적용


function beginck(){

	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();
	$("input:checkbox[name=begin_ck]").each(function() {		
		  if(this.checked == true){
			  if(theMonth < 10) theMonth = "0"+theMonth;
			  if(theDate < 10) theDate = "0"+theDate;
				var nowDate = theYear + '-' + theMonth + '-' + theDate ;
				$("#nw_begin_time").val(nowDate);
		  }else{
			  $("#nw_begin_time").val('');
		  }
	});
}

function endck(){
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	var theDate  = currentDay.getDate();
	var the7day = new Date(theYear,theMonth-1,theDate); // 2014-03-01
	the7day.setDate(the7day.getDate()+7);
	var theYear2 = the7day.getFullYear();
	var theMonth2 = the7day.getMonth() +1;
	var theDate2  = the7day.getDate();
	$("input:checkbox[name=end_ck]").each(function() {		
		  if(this.checked == true){
			  if(theMonth2 < 10) theMonth2 = "0"+theMonth2;
			  if(theDate2 < 10) theDate2 = "0"+theDate2;
				var nowDate = theYear2 + '-' + theMonth2 + '-' + theDate2 ;
				$("#nw_end_time").val(nowDate);
		  }else{
			  $("#nw_end_time").val('');
		  }
	});
}

function PopupNew_send(){
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	var nw_begin_time = $("#nw_begin_time").val();
	var nw_subject = $("#nw_subject").val();
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}	
	var formData = new FormData(frm);

	if(nw_begin_time ==""){
		alert('시작일시를 입력해주세요.');
		return false;
	}
	if (frm.nw_content.value=="<p>&nbsp;</p>") {
		ir1.focus();
        alert('내용을 입력해주세요.');
        return;
    }
	if(nw_subject ==""){
		alert('제목을 입력해주세요.');
		return false;
	}
	$.ajax({
			type: 'POST',
			url: '/index.php/Form/PopupSave',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){
			},
			success: function(json){
				if(json=="E400"){
					alert("등록 실패 되었습니다.");
				}else{
					alert("저장 되었습니다.");
					location.href="/index.php/SuAdmin/PopupLayer";
				}
			}
			,complete:function(){
		 
			}
		});
}

document.wfrm.nw_device.value="<?php echo $nw_device;?>";

</script>