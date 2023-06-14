<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">	
		<div class="col-lg-12 col-xs-12" style="padding:0px;">
	
			<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
				<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
					
					<div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title box-stitle">배너 등록하기 </h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
						
								<form method="post" name="wfrm"  enctype="multipart/form-data">		
								<br><br>
								<input type="hidden" name="wr_id" id="wr_id" value="<?php echo $wr_id; ?>">
								<div class="form-group has-success" style="clear:both;">
								  <label class="control-label" for="wr_subject"><i class="fa fa-check"></i> 배너 이름</label>
								  <input type="text" class="form-control" id="wr_subject" name="wr_subject" placeholder="이름을 입력해 주세요." value="<?php echo $wr_subject; ?>">					
								</div>																	
								<br>
								<div id="up_div2" class="form-group" >		
									<label class="control-label" ><i class="fa fa-check"></i>배너이미지 업로드(최적사이즈:가로 170px, 세로 60px)</label>
									<div class="input-group filebox">								
										 <input class="form-control upload-name" disabled  placeholder="배너이미지 업로드"  >
										 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file"> Find</label> </span>
										 <input type="file" id="no_file" name="userfile[]" class="upload-hidden">
									</div>		
									<?php if($bf_source){ ?>
									<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file; ?>"><i></i> <?php echo $bf_source; ?> (<?php echo $bf_filesize; ?>K) 파일삭제</label>
									<?php } ?>
								</div>
								<br>
								<div class="form-group">
									<label class="control-label" ><i class="fa fa-check"></i>연결주소</label>
									<div class="input-group">
										<input type="text" class="form-control" name="wr_link1" id="wr_link1" value="<?php echo $wr_link1; ?>">
										<span class="input-group-addon"><i class="fa fa-check"></i></span>
									</div>
								</div>
								</form>
								<div style="text-align:center;">
									<?php if($wr_id){ ?>
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="ban_send();">수정하기</button>
									<?php }else{ ?>
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="ban_send();">작성완료</button>
									<?php } ?>
									
									<button type="button" class="btn btn-success" style="font-size:13px;"><a href="<?php echo $return_url; ?>" style="color:#fff;">목록가기</a></button>
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

function ban_send(){
	var frm = document.wfrm;
	var wr_subject = $("#wr_subject").val();
	var wr_link1 = $("#wr_link1").val();
	var wr_id = $("#wr_id").val();
	if(!wr_id){
		var fileCheck = document.getElementById("no_file").value;
		if(!fileCheck){
			alert("파일을 첨부해 주세요");
			return false;
		}
	}
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}	
	var formData = new FormData(frm);

	if(wr_subject ==""){
		alert('배너 이름을 입력해주세요.');
		return false;
	}

	if(wr_link1 ==""){
		alert('연결 주소를 입력해주세요.');
		return false;
	}
	
	$.ajax({
			type: 'POST',
			url: '/index.php/Form/BanSave',
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
					//location.href="<?php echo $return_url; ?>";
				}
			}
			,complete:function(){
		 
			}
		});
}
</script>
