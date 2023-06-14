<?php


include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
if($wr_1 != ''){
    $to_date = $wr_1;
}else{
    $to_date = date("Y-m-d");
}

?>
<link rel="stylesheet" href="/assets/css/jquery-ui.css">

	<!-- Home -->
	<!--<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">알림마당</a></li>
								<li>공단 공지/지원사업</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>-->
	<!-- Features -->

	<div class="features">
		<div class="container">

			<div class="row features_row">
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
	
					<div class="notice_title">
						<h2 style="font-size:18px;">지원사업안내 글쓰기</h2>
					</div>

					<div class="notice_table write-div">
						<form method="post" name="wfrm"  enctype="multipart/form-data">
						<div class="form-group" style="width:50%;float:left">
						  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> 분류</label>
						  <select class="form-control" name="ca_name" id="ca_name"  >
						    <option value="">선택하세요- 필수</option>
							<option value="공지">공지</option>
							<option value="지원">지원사업안내</option>
						  </select>				
						</div>
						
						<div class="form-group"  style="float:left;width:40%;padding-top:30px;">
								<label for="notice" class="checkbox"><input type="checkbox" id="notice" name="notice" value="1"><i></i>&nbsp;&nbsp;공지</label>			
								<input type="hidden" value="html1" name="html">
								<input type="hidden" value="<?php echo $read_table; ?>" name="bo_table">
								<input type="hidden" value="<?php echo $wr_id; ?>" name="wr_id">
								<input type="hidden" value="<?php echo $answer_reply; ?>" name="answer_reply">
								<input type="hidden" value="html1" name="wr_option" id="wr_option">
								<div style="float:right;">
						
									<select class="form-control" name="w_secret" id="w_secret" onchange="imsi_call();" >
										<option value="">-- 임시저장 불러오기 --</option>
										<?php
										foreach($secrets as $secret){
										?>
										<option value="<?=$secret['wr_id']?>"><?=$secret['wr_subject']?></option>
										<?php
										}
										?>
										
									</select>	
								</div>
						</div>
                        
						<div class="form-group has-success" style="clear:both;">
						  <label class="control-label" for="wr_subject"><i class="fa fa-check"></i> 제목</label>
						  <input type="text" class="form-control" id="wr_subject" name="wr_subject" placeholder="제목을 입력해 주세요."  value="<?php echo $wr_subject; ?>">					
						</div>	
						<div class="form-group" >
							<label style="display:block;">기간</label>											
							<div class="input-group date" style="width:25%;display:inline-flex;">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" autocomplete="off" class="form-control pull-right" id="start_date" name="wr_1" value="<?php echo $to_date; ?>">
							</div>												
							<div class="input-group date" style="width:25%;display:inline-flex;">
							  <div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							  </div>
							  <input type="text" autocomplete="off" class="form-control pull-right" id="end_date" name="wr_2" value="<?php echo $wr_2;?>">
							</div>			
							<!-- /.input group -->
						</div>

						<div class="form-group">
						  <label style="display:block;">구분</label>
						  <div class="radio">
							<label>
							  <input type="radio" name="wr_3" value="공지">
							  공지
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="wr_3" value="진행">
							  진행
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="wr_3" value="마감">
							  마감
							</label>
						  </div>
						  <div class="radio">
							<label>
							  <input type="radio" name="wr_3" value="" >
							  미선택
							</label>
						  </div>
						</div>
						
						<div class="noti_contents" style="clear:both;margin-top: 15px; margin-bottom: 10px;">
							<textarea name="wr_content" id="ir1" rows="15" style="width:100%;">
								<?php echo $wr_content; ?>
							</textarea>
						</div>
						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file0"> Find</label> </span>
								 <input type="file" id="no_file0" name="userfile[]" class="upload-hidden">
							</div>
							<?php 
							if(isset($bf_source[0])){ ?>
							<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[0]; ?>"><i></i> <?php echo $bf_source[0]; ?> (<?php echo $bf_filesize[0]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>

						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file1"> Find</label> </span>
								 <input type="file" id="no_file1" name="userfile[]" class="upload-hidden">
							</div>
							<?php 
							if(isset($bf_source[1])){ ?>
							<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[1]; ?>"><i></i> <?php echo $bf_source[1]; ?> (<?php echo $bf_filesize[1]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>
						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file2"> Find</label> </span>
								 <input type="file" id="no_file2" name="userfile[]" class="upload-hidden">
							</div>		
							<?php 
							if(isset($bf_source[2])){ ?>
							<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[2]; ?>"><i></i> <?php echo $bf_source[2]; ?> (<?php echo $bf_filesize[2]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>
						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_fil3"> Find</label> </span>
								 <input type="file" id="no_fil3" name="userfile[]" class="upload-hidden">
							</div>
							<?php 
							if(isset($bf_source[3])){ ?>
							<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[3]; ?>"><i></i> <?php echo $bf_source[3]; ?> (<?php echo $bf_filesize[3]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>

						<div class="form-group">
							<label class="control-label" ><i class="fa fa-check"></i>관련링크</label>
							<div class="input-group">
								<input type="text" class="form-control" name="wr_link1" id="wr_link1"  value="<?php echo $wr_link1; ?>">
								<span class="input-group-addon"><i class="fa fa-check"></i></span>
							</div>
						</div>
						</form>
						<div style="text-align:center;">
							<?php if(empty($wr_id)){?>
							<button type="button" class="btn btn-info" style="font-size:13px;" onclick="write_notcie_imsi();">임시저장</button>
							<?php }?>
							<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="write_notcie_send();">작성완료</button>
							<button type="button" class="btn btn-success" onclick="info_list();" style="font-size:13px;">목록가기</button>
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
<script type="text/javascript" src="/assets/SE28/js/HuskyEZCreator.js" charset="utf-8"></script>
<script>
 var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
	oAppRef: oEditors,
	elPlaceHolder: "ir1",
	sSkinURI: "/assets/SE28/SmartEditor2Skin.html",
	fOnAppLoad:function(){
		oEditors.getById['ir1'].setDefaultFont( "맑은 고딕", 11);
	},
	fCreator: "createSEditor2"
});

var fileTarget = $('.filebox .upload-hidden');
fileTarget.on('change', function(){  // 값이 변경되면
if(window.FileReader){  // modern browser
  var filename = $(this)[0].files[0].name;
}

else {  // old IE
  var filename = $(this).val().split('/').pop().split('\\').pop();  // 파일명만 추출
}
// 추출한 파일명 삽입
$(this).siblings('.upload-name').val(filename);
});


var clareCalendar = {
    format: 'yyyy-mm-dd',
    language : "kr",
};
$("#start_date").datepicker(clareCalendar);
$("#end_date").datepicker(clareCalendar);
$("img.ui-datepicker-trigger").attr("style","margin-left:5px; *margin-top:-11px; vertical-align:middle; cursor:pointer;"); //이미지버튼 style적용
$("#ui-datepicker-div").hide(); //자동으로 생성되는 div객체 숨김



function pasteHTML(filepath) {
// var sHTML = "<span style='color:#FF0000;'>이미지도 같은 방식으로 삽입합니다.<\/span>";
 var sHTML = '<span style="color:#FF0000;"><img src="'+filepath+'"></span>';
 oEditors.getById["content"].exec("PASTE_HTML", [sHTML]);
}
function write_notcie_send(){
	$("#wr_option").val('html1');
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	var ca_name = $("#ca_name").val();
	var wr_subject = $("#wr_subject").val();

	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}	
	var formData = new FormData(frm);

	if(ca_name ==""){
		alert('분류를 선택해주세요.');
		return false;
	}
	if (frm.wr_content.value=="<p>&nbsp;</p>" || frm.wr_content.value=="") {

        alert('내용을 입력해주세요.');
        return;
    }
	if(wr_subject ==""){
		alert('제목을 입력해주세요.');
		return false;
	}
	<?php if($answer_reply =='re'){?>
		$.ajax({
			type: 'POST',
			url: '/index.php/Form/Resave',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){},
			success: function(result){

				var list_array = JSON.parse(result);		
				var list_total = list_array.length;
				if(list_array[0]['success']=="E400"){
					alert("등록 실패 되었습니다.");
				}else{
					alert("저장 되었습니다.");
					location.href="/index.php/info/read?bo_table=<?php echo $read_table;?>&wr_id="+list_array[0]['wr_id'];
				}
			}
			,complete:function(){}
		});
	<?php }else{?>
		$.ajax({
				type: 'POST',
				url: '/index.php/Form/Nsave',
				data: formData,
				cache: false,
				processData: false,
				contentType: false,
				beforeSend:function(){
				},
				success: function(result){
					//alert(result);
                    console.log(result);
					var list_array = JSON.parse(result);		
					var list_total = list_array.length;
					if(list_array[0]['success']=="E400"){
						alert("등록 실패 되었습니다.");
					}else{
						alert("저장 되었습니다.");
						location.href="/index.php/info/read?bo_table=<?php echo $read_table; ?>&wr_id="+list_array[0]['wr_id'];
					}
				}
				,complete:function(){
			 
				}
			});
	<?php }?>
}

function write_notcie_imsi(){
	$("#wr_option").val('secret');
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	var ca_name = $("#ca_name").val();
	var wr_subject = $("#wr_subject").val();
	 
	var formData = new FormData(frm);

	if(ca_name ==""){
		alert('분류를 선택해주세요.');
		return false;
	}
	if (frm.wr_content.value=="<p>&nbsp;</p>" || frm.wr_content.value=="") {

        alert('내용을 입력해주세요.');
        return;
    }
	if(wr_subject ==""){
		alert('제목을 입력해주세요.');
		return false;
	}	
	$.ajax({
		type: 'POST',
		url: '/index.php/Form/Nsave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend:function(){
		},
		success: function(result){
			//alert(result);
			var list_array = JSON.parse(result);		
			var list_total = list_array.length;
			if(list_array[0]['success']=="E400"){
				alert("등록 실패 되었습니다.");
			}else{
				alert("임시저장 되었습니다.");
			}
		}
		,complete:function(){
	 
		}
	});
}
function info_list(){
	location.href="/index.php/Info/notice";
}

function imsi_call(){
	var wsecret = $("#w_secret option:selected").val();
	location.href = '/index.php/info/nwrite?bo_table=ym_notice&wr_id='+wsecret;
}

document.getElementById("ca_name").value = "<?php echo $ca_name; ?>";
$("input:radio[name='wr_3']:radio[value='<?php echo $wr_3; ?>']").prop('checked', true); // 선택하기
</script>
</body>
</html>