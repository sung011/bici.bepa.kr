<?php

//print_r($bf_source);exit;
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

$to_date = date("Y-m-d");

?>
<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<style>
input[id="notice"] {
    position: relative;
    top: 3px;
}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">알림마당</a></li>
								<li><?php echo $wr_title; ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	

	<!-- Features -->

	<div class="features">
		<div class="container">

			<div class="row features_row">
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
					<!--
					<div class="board-title-image">
						<div class="board-title-caption">
							<h2 >알림마당</h2>
							<span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
						</div>
					</div>
					-->
					<div class="notice_title">
						<h2 style="font-size:18px;"><?php echo $wr_title; ?> 글쓰기</h2>
					</div>

					<div class="notice_table write-div">
						<form method="post" name="wfrm"  enctype="multipart/form-data">
						
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
						  <input type="text" class="form-control" id="wr_subject" name="wr_subject" placeholder="제목을 입력해 주세요." value="<?php echo $wr_subject; ?>">					
						</div>																	
						<div class="noti_contents" style="clear:both;margin-top: 15px; margin-bottom: 10px;">
							<label class="control-label" for="wr_content"><i class="fa fa-check"></i> 본문내용</label>
							<textarea name="wr_content" id="ir1" rows="15" style="width:100%;" value="">
								<?php echo $wr_content; ?>
							</textarea>
						</div>
						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file"> Find</label> </span>
								 <input type="file" id="no_file" name="userfile[]" class="upload-hidden">
								 
							</div>	
							<?php 
							if(isset($bf_source[0])){ ?>
							<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[0]; ?>"><i></i> <?php echo $bf_source[0]; ?> (<?php echo $bf_filesize[0]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>

						<div id="up_div2" class="form-group" >		  
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file2"> Find</label> </span>
								 <input type="file" id="no_file2" name="userfile[]" class="upload-hidden">

							</div>	
							<?php 
							if(isset($bf_source[1])){ ?>
							<label for="bf_file_del1" class="bncheckbox"><input type="checkbox" id="bf_file_del1" name="bf_file_del[]" value="<?php echo $bf_file[1]; ?>"><i></i> <?php echo $bf_source[1]; ?> (<?php echo $bf_filesize[1]; ?>K) 파일삭제</label>
							<?php } ?>
						</div>
						<div class="form-group">
							<label class="control-label" ><i class="fa fa-check"></i>관련링크</label>
							<div class="input-group">
								<input type="text" class="form-control" name="wr_link1" id="wr_link1" value="<?php echo $wr_link1; ?>">
								<span class="input-group-addon"><i class="fa fa-check"></i></span>
							</div>
						</div>
						</form>
						<div style="text-align:center;">
							<?php if(empty($wr_id)){?>
							<button type="button" class="btn btn-info" style="font-size:13px;" onclick="write_ym_imsi();">임시저장</button>
							<?php }?>
							<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="write_ym_send();">작성완료</button>							
							<button type="button" class="btn btn-success" style="font-size:13px;" onclick="comm_list();">목록가기</button>
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

$(document).ready(function() {
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
});

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


function write_ym_send(){
	$("#wr_option").val('html1');
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	var wr_subject = $("#wr_subject").val();
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}	
	var formData = new FormData(frm);
	if (frm.wr_content.value=="<p>&nbsp;</p>") {
		ir1.focus();
        alert('내용을 입력해주세요.');
        return;
    }
	if(wr_subject ==""){
		alert('제목을 입력해주세요..');
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
					location.href="/index.php/info/read?bo_table=<?php echo $read_table; ?>&wr_id="+list_array[0]['wr_id'];
				}
			}
			,complete:function(){}
		});
	<?php }else{?>
		$.ajax({
			type: 'POST',
			url: '/index.php/Form/Csave',
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
					location.href="/index.php/info/read?bo_table=<?php echo $read_table; ?>&wr_id="+list_array[0]['wr_id'];
				}
			}
			,complete:function(){}
		});
	<?php }?>
}

function write_ym_imsi(){

	$("#wr_option").val('secret');
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);

	var wr_subject = $("#wr_subject").val();
	 
	var formData = new FormData(frm);


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
		url: '/index.php/Form/Csave',
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
function imsi_call(){
	var wsecret = $("#w_secret option:selected").val();
	location.href = '/index.php/info/cwrite?bo_table=<?php echo $read_table; ?>&wr_id='+wsecret;
}
function comm_list(){
	location.href = '<?php echo $return_url; ?>';
}
</script>
</body>
</html>