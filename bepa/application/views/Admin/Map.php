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
						  <h3 class="box-title box-stitle"><?php echo $co_subject; ?></h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
						
								<form method="post" name="wfrm"  enctype="multipart/form-data">
									<input type="text" name="co_id" id="co_id" value="<?php echo $co_id; ?>">	
									<input type="text" name="co_subject" id="co_subject" value="<?php echo $co_subject; ?>">
																									
								<div class="noti_contents" style="clear:both;margin-top: 15px; margin-bottom: 10px;">
									<label class="control-label" for="co_content"><i class="fa fa-check"></i> 본문내용</label>
									<textarea name="co_content" id="ir1" rows="20" style="width:100%;" >
										<?php echo $co_content; ?>
									</textarea>
								</div>
								<div id="up_div2" class="form-group" >		  
									<div class="input-group filebox">								
										 <input class="form-control upload-name" disabled  placeholder="File upload"  >
										 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file"> Find</label> </span>
										 <input type="file" id="no_file" name="userfile[]" class="upload-hidden">
									</div>	
									<?php if($bf_source[0]){ ?>
									<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[0]; ?>"><i></i> <?php echo $bf_source[0]; ?> (<?php echo $bf_filesize[0]; ?>K) 파일삭제</label>
									<?php } ?>
								</div>

								<div id="up_div2" class="form-group" >		  
									<div class="input-group filebox">								
										 <input class="form-control upload-name" disabled  placeholder="File upload"  >
										 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file2"> Find</label> </span>
										 <input type="file" id="no_file2" name="userfile[]" class="upload-hidden">
									</div>	
									<?php if($bf_source[1]){ ?>
									<label for="bf_file_del0" class="bncheckbox"><input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?php echo $bf_file[1]; ?>"><i></i> <?php echo $bf_source[1]; ?> (<?php echo $bf_filesize[1]; ?>K) 파일삭제</label>
									<?php } ?>
								</div>
								
								</form>
								<div style="text-align:center;">
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="organsend();">작성완료</button>
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="organsend();">취소</button>
									
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
    sSkinURI: "/application/views/common/SE28/SmartEditor2Skin.html",
	fOnAppLoad:function(){
		oEditors.getById['ir1'].setDefaultFont( "맑은 고딕", 11);;
	},
    fCreator: "createSEditor2"
});

function organsend(){
	var frm = document.wfrm;
    oEditors.getById["ir1"].exec("UPDATE_CONTENTS_FIELD", []);
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}
	var formData = new FormData(frm);
	if (frm.co_content.value=="<p>&nbsp;</p>" || frm.co_content.value=="" ) {
		ir1.focus();
        alert('내용을 입력해주세요.');
        return;
    }
	$.ajax({
		type: 'POST',
		url: '/index.php/Form/Asave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend:function(){
		},
		success: function(json){
			if(json=="E200"){
				alert("저장 되었습니다.");			
			}else{
				alert("등록 실패 되었습니다.");			
			}
		}
		,complete:function(){	 
		}
	});
}
</script>
