<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">알림마당</a></li>
								<li>공단포토뉴스</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	

	<!-- Features -->

	<div class="features" >
		<div class="container">

			<div class="row features_row" >	
	

				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
					<div class="board-title-image">
						<div class="board-title-caption">
							<h2 >알림마당</h2>
							<span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
						</div>
					</div>
					<div class="notice_title">
						<h2 style="font-size:18px;">공단포토뉴스 글쓰기</h2>
					</div>

					<div class="notice_table write-div">
		
						<div class="form-group has-success">
						  <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> 제목</label>
						  <input type="text" class="form-control" id="inputSuccess" placeholder="제목을 입력해 주세요.">					
						</div>									
						<div class="noti_contents" style="clear:both;margin-top: 15px; margin-bottom: 10px;">
							<label class="control-label">본문내용</label>
							<textarea name="notice_contents" id="ir1" rows="10" style="width:100%;">
							
							</textarea>
						</div>
						<div id="up_div" class="form-group" >		
							<label class="control-label">파일업로드1</label>
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file"> Find</label> </span>
								 <input type="file" id="no_file" name="no_file[]" class="upload-hidden">
							</div>							
						</div>
						<div id="up_div2" class="form-group" >	
							<label class="control-label">파일업로드2</label>
							<div class="input-group filebox">								
								 <input class="form-control upload-name" disabled  placeholder="File upload"  >
								 <span class="input-group-addon" style="padding:0px;background-color:#fff;border:none;"><label for="no_file2"> Find</label> </span>
								 <input type="file" id="no_file2" name="no_file[]" class="upload-hidden">
							</div>							
						</div>
		
						<div class="form-group">
							<label class="control-label" ><i class="fa fa-check"></i>관련링크</label>
							<div class="input-group">
								<input type="text" class="form-control">
								<span class="input-group-addon"><i class="fa fa-check"></i></span>
							</div>
						</div>
						<div style="text-align:center;">
							<button type="button" class="btn btn-primary" style="font-size:13px;">작성완료</button>
							<button type="button" class="btn btn-success" onclick="info_list();" style="font-size:13px;">목록가기</button>
						</div>			
				</div>

		

			</div>
		</div>
	</div>
	
	<!-- Footer -->

<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>
<script type="text/javascript" src="/application/views/common/SE2/js/HuskyEZCreator.js" charset="utf-8"></script>
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
    sSkinURI: "/application/views/common/SE2/SmartEditor2Skin.html",
    fCreator: "createSEditor2"
});

function info_list(){
	location.href="/info/one";
}
	
</script>
</body>
</html>