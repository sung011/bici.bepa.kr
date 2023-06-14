<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php'; ?>

<link rel="stylesheet" href="/assets/css/jquery-ui.css">

    <section class="content">
      	<div class="row">
			<div class="col-xs-12 col-lg-12" style="padding: 0px">
				<div class="group_box_wrap col-lg-12" style="padding: 0px;margin: 0px">
                    <div class="group_box col-lg-12" style="display: flex;justify-content: space-between">
						<div class="box box-success">
							<div class="box-header with-border">
						  		<h3 class="box-title box-stitle"><?= $Title2 ?></h3>
						  		<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse">
										<i class="fa fa-minus"></i>
									</button>
						  		</div>
							</div>
							<div class="box-body" style="min-height: 70vh;padding: 1em">
								<div class="notice_table write-div" style="margin: 0px">
									<form method="post" name="wfrm" enctype="multipart/form-data">
										<div class="form-group" style="width: 40%;float: left">
											<input type="hidden" name="html" value="html1">
											<input type="hidden" name="bo_table" value="<?= $read_table ?>">
											<input type="hidden" name="wr_id" value="<?= $wr_id ?>">
											<input type="hidden" name="answer_reply" value="<?= $answer_reply ?>">
											<input type="hidden" name="type" id="type" value="<?= $type ?>">
											<input type="hidden" id="wr_option" name="wr_option" value="html1">
											<div class="form-group">
												<select id="w_secret" name="w_secret" class="form-control" onchange="imsi_call();">
													<option value="">-- 임시저장 불러오기 --</option>
													<?php foreach ($secrets as $secret): ?>
														<option value="<?= $secret['wr_id'] ?>"><?= $secret['wr_subject'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
										</div>
										<?php 
										if($_GET['bo_table'] == 'ym_notification' or $_GET['bo_table'] == 'ga_form'){
											?>
											<div class="form-inline" style="width: 100%; display: flex;">
												<div class="form-group has-success " style="clear: both; margin-right: 5px; width: 30%">
													<label for="wr_subject" class="control-label" style="display: block;"><i class="fa fa-check"></i>산업단지</label>

													<?php if($_GET['bo_table'] == 'ym_notification'){ ?>
														<select name="ca_name" id="ca_name" class="form-control" style="width: 100%;">
															<option value="all">-- 산업단지 선택 --</option>
															<option value="all">전체</option>
															<?php
															for ($i = 0; $i< count($complex);$i++){
																?>
																<option value="<?= $complex[$i]['CODE_NUM']?>" <?php if($complex[$i]['CODE_NUM'] == $ca_name){ ?>selected  <?php }?> ><?= $complex[$i]['CHAN_CODE']?></option>
																<?php
															}
															?>
														</select>
													<?php }elseif ($_GET['bo_table'] == 'ga_form'){ ?>
														<select name="ca_name" id="ca_name" class="form-control" style="width: 100%;">
															<option value="일반">일반자료실</option>
															<option value="민원">민원서식</option>
														</select>
													<?php } ?>

												</div>
												<div class="form-group has-success " style="clear: both; margin-left: 5px; width: 70%;">
													<label for="wr_subject" class="control-label" style="display: block;"><i class="fa fa-check"></i>제목</label>
													<input type="text" id="wr_subject" name="wr_subject" class="form-control" style="width: 100%;" value="<?= $wr_subject ?>" placeholder="제목을 입력해 주세요.">
												</div>
											</div>
											<?php
										}else{
											?>
											<div class="form-group has-success" style="clear: both">
												<label for="wr_subject" class="control-label"><i class="fa fa-check"></i>제목</label>
												<input type="text" id="wr_subject" name="wr_subject" class="form-control" value="<?= $wr_subject ?>" placeholder="제목을 입력해 주세요.">
											</div>
											<?php
										}
										?>



										<div class="noti_contents" style="margin-top: 15px; margin-bottom: 10px;clear: both">
											<label for="wr_content" class="control-label"><i class="fa fa-check"></i>본문내용</label>
											<textarea id="ir1" name="wr_content" style="width: 100%" value="" rows="15">
												<?= $wr_content ?>
											</textarea>
										</div>
										<div id="up_div2" class="form-group">
											<div class="filebox input-group">
												<input class="form-control upload-name" placeholder="File upload" disabled>
												<span class="input-group-addon" style="border: none;background-color: #fff;padding: 0px"><label for="no_file">Find</label></span>
												<input type="file" id="no_file" name="userfile[]" class="upload-hidden">
											</div>
											<?php if (isset($bf_source[0])): ?>
												<label for="bf_file_del0" class="bncheckbox">
												<input type="checkbox" id="bf_file_del0" name="bf_file_del[]" value="<?= $bf_file[0] ?>">
												<i></i>
												<?= $bf_source[0] ?> (<?= $bf_filesize[0] ?>K) 파일삭제</label>
											<?php endif ?>
										</div>
										<div id="up_div2" class="form-group">
											<div class="filebox input-group">
												<input class="form-control upload-name" placeholder="File upload" disabled>
												<span class="input-group-addon" style="border: none;background-color: #fff;padding: 0px"><label for="no_file2">Find</label></span>
												<input type="file" id="no_file2" name="userfile[]" class="upload-hidden">
											</div>
											<?php if (isset($bf_source[1])): ?>
												<label for="bf_file_del1" class="bncheckbox">
												<input type="checkbox" id="bf_file_del1" name="bf_file_del[]" value="<?= $bf_file[1] ?>">
												<i></i>
												<?= $bf_source[1] ?> (<?= $bf_filesize[1] ?>K) 파일삭제</label>
											<?php endif ?>
										</div>
										<div class="form-group">
											<label class="control-label"><i class="fa fa-check"></i>관련링크</label>
											<div class="input-group">
												<input type="text" id="wr_link1" name="wr_link1" class="form-control" value="<?= $wr_link1 ?>">
												<span class="input-group-addon"><i class="fa fa-check"></i></span>
											</div>
										</div>
									</form>
									<div style="text-align: center">
										<?php if (empty($wr_id)): ?>
											<button type="button" class="btn btn-info" style="font-size: 13px" onclick="write_ym_imsi();">임시저장</button>
										<?php endif ?>
										<button type="button" class="btn btn-primary" style="font-size: 13px" onclick="write_ym_send();">작성완료</button>
										<button type="button" class="btn btn-success" style="font-size: 13px" onclick="comm_list();">목록가기</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
      	</div>
    </section>
</div>

<script type="text/javascript" src="/assets/SE28/js/HuskyEZCreator.js"></script>
<script>
$(document).ready(function () {
	var fileTarget = $('.filebox .upload-hidden');
	fileTarget.on('change', function () { // 값이 변경되면
		if (window.FileReader) { // modern browser
	  		var filename = $(this)[0].files[0].name;
		} else { // old IE
	  		var filename = $(this).val().split('/').pop().split('\\').pop(); // 파일명만 추출
		}
		// 추출한 파일명 삽입
		$(this).siblings('.upload-name').val(filename);
	});
});

var oEditors = [];
nhn.husky.EZCreator.createInIFrame({
    oAppRef: oEditors,
    elPlaceHolder: 'ir1',
    sSkinURI: '/assets/SE28/SmartEditor2Skin.html',
	fOnAppLoad: function () {
		oEditors.getById['ir1'].setDefaultFont('맑은 고딕', 11);
	},
    fCreator: 'createSEditor2'
});
<?php if($_GET['wr_id'] != null){ ?>
function write_ym_send() {
	$('#wr_option').val('html1');
	var frm = document.wfrm;
	oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	var wr_subject = $('#wr_subject').val(); // 제목
	var type = '<?= $type ?>'; // 게시판
	var n_contents = oEditors.getById["ir1"].getIR(); //내용
	var wr_link1 = $("#wr_link1").val(); // 링크
	var notice_contents = n_contents + "<br>" + wr_link1;
	// if ($('input:checkbox[name=notice]'').is(':checked') == true) {
	// }

	var ca_name = $("#ca_name").val();

	var caSubject = "[정보]"+wr_subject;

	var formData = new FormData(frm);

	for (let value of formData){
		console.log(value);
	}

	if (wr_subject == '') {
		alert('제목을 입력해주세요.');
		return false;
	}

	if (frm.wr_content.value == '<p>&nbsp;</p>') {
		ir1.focus();
		alert('내용을 입력해주세요.');
		return;
	}

	<?php if ($answer_reply == 're') { ?>
	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Resave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {},
		success: function (result) {
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				alert('저장 되었습니다.');
				location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];
			}
		}
		,complete: function () {}
	});
	<?php } else { ?>
	var arr = new Array();
	formData.append('notice_type',type); // 게시판 종유
	formData.append('notice_title',wr_subject); //제목
	formData.append('notice_contents',notice_contents); // 내용
	formData.append('association_type','5'); // 부산
	console.log("bbbb");
	for (var value of formData) {
		console.log(value);
	}
	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Csave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {},
		success: function (result) {
			console.log(result)
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				if(list_array[0]['success'] == 'E200'){
					if(list_array[0]['count'] == '1'){
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
							},
						}
					}else if(list_array[0]['count'] == '2'){
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
								'file2':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][1]['bf_file'],
							},
						}
					}else{
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{

							},
						}
					}
					console.log(JSON.stringify(arr));

					$.ajax({
						type: 'POST',
						//url: 'http://api.nabs.kr/api/v1/association/notice/add',
						url: 'http://api.nabs.kr/api/v1/association/notice/modify?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
						contentType: 'application/json; charset=utf-8',
						dataType   : 'json',
						data: JSON.stringify(arr),
						cache: false,
						processData: false,
						contentType: false,
						headers: {'auth_token':'ehdskavkdnjxpr20186315650033dbfldzmssil'},
						beforeSend:function(request){
							request.setRequestHeader("auth_token", 'ehdskavkdnjxpr20186315650033dbfldzmssil');
						},
						success: function(json){
							console.log(json);
						},
						complete:function(){
							alert('저장 되었습니다.');
							location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];
						}
					})
				}

				/*alert('저장 되었습니다.');
				location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];*/
			}
		}
		,complete: function () {}
	});
	<?php } ?>
}
<?php } else { ?>
function write_ym_send() {
	$('#wr_option').val('html1');
	var frm = document.wfrm;
	oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	var wr_subject = $('#wr_subject').val(); // 제목
	var type = '<?= $type ?>'; // 게시판
	var n_contents = oEditors.getById["ir1"].getIR(); //내용
	var wr_link1 = $("#wr_link1").val(); // 링크
	var notice_contents = n_contents + "<br>" + wr_link1;
	// if ($('input:checkbox[name=notice]'').is(':checked') == true) {
	// }
	var caSubject = "[정보]"+wr_subject;
	var ca_name = $("#ca_name").val();

	var formData = new FormData(frm);

	for (let value of formData){
		console.log(value);
	}

	if (wr_subject == '') {
		alert('제목을 입력해주세요.');
		return false;
	}

	if (frm.wr_content.value == '<p>&nbsp;</p>') {
		ir1.focus();
		alert('내용을 입력해주세요.');
		return;
	}

	<?php if ($answer_reply == 're') { ?>
	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Resave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {},
		success: function (result) {
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				alert('저장 되었습니다.');
				location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];
			}
		}
		,complete: function () {}
	});
	<?php } else { ?>
	var arr = new Array();
	formData.append('notice_type',type); // 게시판 종유
	formData.append('notice_title',wr_subject); //제목
	formData.append('notice_contents',notice_contents); // 내용
	formData.append('association_type','5'); // 부산
	console.log("aaaaa");
	for (var value of formData) {
		console.log(value);
	}
	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Csave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {},
		success: function (result) {
			console.log(result)
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				if(list_array[0]['success'] == 'E200'){
					if(list_array[0]['count'] == '1'){
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
							},
						}
					}else if(list_array[0]['count'] == '2'){
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
								'file2':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][1]['bf_file'],
							},
						}
					}else{
						arr = {
							'notice_type':type,
							'notice_title':caSubject,
							'show_date':'',
							'end_date':'',
							'wr_3':'',
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'chan_code':ca_name,
							'code_num':ca_name,
							'file_link':{

							},
						}
					}
					console.log(JSON.stringify(arr));

					$.ajax({
						type: 'POST',
						//url: 'http://api.nabs.kr/api/v1/association/notice/add',
						url: 'http://api.nabs.kr/api/v1/association/notice/add?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
						contentType: 'application/json; charset=utf-8',
						dataType   : 'json',
						data: JSON.stringify(arr),
						cache: false,
						processData: false,
						contentType: false,
						headers: {'auth_token':'ehdskavkdnjxpr20186315650033dbfldzmssil'},
						beforeSend:function(request){
							request.setRequestHeader("auth_token", 'ehdskavkdnjxpr20186315650033dbfldzmssil');
						},
						success: function(json){
							console.log(json);
						},
						complete:function(){
							alert('저장 되었습니다.');
							location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];
						}
					})
				}

				/*alert('저장 되었습니다.');
				location.href = '/index.php/SuAdmin/read?bo_table=<?php echo $read_table; ?>&wr_id=' + list_array[0]['wr_id'];*/
			}
		}
		,complete: function () {}
	});
	<?php } ?>
}
<?php } ?>


function write_ym_imsi() {
	$('#wr_option').val('secret');
	var frm = document.wfrm;
    oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	var wr_subject = $('#wr_subject').val();
	var formData = new FormData(frm);

	if (wr_subject == '') {
		alert('제목을 입력해주세요.');
		return false;
	}

	if (frm.wr_content.value == '<p>&nbsp;</p>' || frm.wr_content.value == '') {
        alert('내용을 입력해주세요.');
        return;
    }

	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Csave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {
		},
		success: function (result) {
			// alert(result);
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				alert('임시저장 되었습니다.');
			}
		}
		,complete: function () {
		}
	});
}

function imsi_call() {
	var wsecret = $('#w_secret option:selected').val();
	location.href = '/index.php/SuAdmin/cwrite?bo_table=<?php echo $read_table; ?>&wr_id=' + wsecret;
}

function comm_list() {
	location.href = '<?php echo $return_url; ?>';
}
</script>

</body>
</html>
