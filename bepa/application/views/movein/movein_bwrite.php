<?php

//print_r($bf_source);exit;
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

$to_date = date("Y-m-d");

?>
<link rel="stylesheet" href="/application/views/common/css/jquery-ui.css">
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
						
						<div class="form-group"  style="float:left;width:100%;padding-top:30px;">
									
								<input type="hidden" value="html1" name="html">
								<input type="hidden" value="<?php echo $read_table; ?>" name="bo_table">
								<input type="hidden" value="<?php echo $wr_id; ?>" name="wr_id">
						</div>
                        
						
						<div id="up_div2" class="form-group" >
							<label class="control-label" for="no_file">일반공장 현황파일 업로드</label>
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
							<label class="control-label" for="no_file2">지식산업센터 현황파일 업로드</label>
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
	
						</form>
						<div style="text-align:center;">
		
							<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="write_ym_send();">작성완료</button>							
							<button type="button" class="btn btn-success" style="font-size:13px;"><a href="<?php echo $return_url; ?>" style="color:#fff;">목록가기</a></button>
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


function write_ym_send(){
	var frm = document.wfrm;

	var formData = new FormData(frm);
	$.ajax({
		type: 'POST',
		url: '/Form/Business',
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
				location.href="/Movein/status";
			}
		}
		,complete:function(){}
	});
}
</script>
</body>
</html>