<?php 
include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php'; 

if ($wr_1 != '') {
    $to_date = $wr_1;
} else {
    $to_date = date('Y-m-d');
}
?>

<link rel="stylesheet" href="/assets/css/jquery-ui.css">


    <section class="content">
      	<div class="row">	
			<div class="col-xs-12 col-lg-12" style="padding: 0px">   
				<div class="group_box_wrap col-lg-12" style="padding: 0px;margin: 0px">
                    <div class="group_box col-lg-12" style="display: flex;justify-content: space-between">
						<div class="box box-success">
							<div class="box-header with-border">
						  		<h3 class="box-title box-stitle" style="color: #004195"><?= $Title2 ?></h3>
						  		<div class="box-tools pull-right">
									<button type="button" class="btn btn-box-tool" data-widget="collapse">
										<i class="fa fa-minus"></i>
									</button>						
						  		</div>
							</div>
							<div class="box-body" style="min-height: 70vh;padding: 1em">
								<div class="notice_table write-div" style="margin: 0px">
									<form method="post" name="wfrm" enctype="multipart/form-data">
										<!-- <div class="form-group">
											<label for="notice">
											<input type="checkbox" id="notice" name="notice" value="1"><i></i>&nbsp;&nbsp;공지</label>		
										</div> -->
										<input type="hidden" name="html" value="html1">
										<input type="hidden" name="bo_table" value="<?= $read_table ?>">
										<input type="hidden" name="wr_id" value="<?= $wr_id ?>">
										<input type="hidden" name="answer_reply" value="<?= $answer_reply ?>">
										<input type="hidden" id="wr_option" name="wr_option" value="html1">
										<div class="form-group" style="width: 40%">
											<select id="w_secret" name="w_secret" class="form-control" onchange="imsi_call();">
												<option value="">-- 임시저장 불러오기 --</option>
												<?php foreach ($secrets as $secret): ?>
													<option value="<?= $secret['wr_id'] ?>"><?= $secret['wr_subject'] ?></option>
												<?php endforeach ?>
											</select>	
										</div>
										<div class="form-group" style="width: 40%">
						  					<label for="inputSuccess" class="control-label"><i class="fa fa-check"></i>분류</label>
						  					<select id="ca_name" name="ca_name" class="form-control">
						    					<option value="">선택하세요- 필수</option>
												<option value="공지">공지</option>
												<option value="지원">지원사업안내</option>
						 					</select>				
										</div>				      		
										<div class="form-group has-success" style="clear: both">
						  					<label for="wr_subject" class="control-label"><i class="fa fa-check"></i>제목</label>
						  					<input type="text" id="wr_subject" name="wr_subject" class="form-control" value="<?= $wr_subject ?>" placeholder="제목을 입력해 주세요.">					
										</div>	
										<div class="form-group">
											<label style="display: block">기간</label>				
											<div class="input-group date" style="width: 25%;display: inline-flex">
							  					<!-- <div class="input-group-addon">
													<i class="fa fa-calendar"></i>
							  					</div> -->
							  					<input type="text" id="start_date" name="wr_1" class="form-control pull-right" value="<?php echo $to_date; ?>" autocomplete="off">
											</div>												
											<div class="input-group date" style="width: 25%;display: inline-flex">
							  					<!-- <div class="input-group-addon">
													<i class="fa fa-calendar"></i>
							  					</div> -->
							  					<input type="text" id="end_date" name="wr_2" class="form-control pull-right" value="<?php echo $wr_2; ?>" autocomplete="off">
											</div>			
										</div>
										<div class="form-group">
						  					<label style="display: block">구분</label>
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
							  						<input type="radio" name="wr_3" value="">
							  						미선택
												</label>
						  					</div>
										</div>
										<div class="noti_contents" style="margin-top: 15px; margin-bottom: 10px;clear: both">
											<label for="wr_content" class="control-label"><i class="fa fa-check"></i>본문내용</label>
											<textarea id="ir1" name="wr_content" style="width: 100%" rows="15">
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
											<button type="button" class="btn btn-info" style="font-size: 13px" onclick="write_notcie_imsi();">임시저장</button>
										<?php endif ?>
										<button type="button" class="btn btn-primary" style="font-size: 13px" onclick="write_notcie_send();">작성완료</button>
										<button type="button" class="btn btn-success" style="font-size: 13px" onclick="info_list();">목록가기</button>
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
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.kr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/common.js')?>"></script>
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

var clareCalendar = {
    format: 'yyyy-mm-dd',
    language : 'kr',
	templates : {
		leftArrow: '&laquo;',
		rightArrow: '&raquo;'
	},
};

$('#start_date').datepicker(clareCalendar);
$('#end_date').datepicker(clareCalendar);
$('img.ui-datepicker-trigger').attr('style', 'margin-top: -11px;margin-left: 5px;vertical-align: middle;cursor: pointer'); //이미지버튼 style적용
$('#ui-datepicker-div').hide(); //자동으로 생성되는 div객체 숨김

function pasteHTML(filepath) {
	var sHTML = '<span style="color: #ff0000"><img src="' + filepath + '"></span>';
	oEditors.getById['content'].exec('PASTE_HTML', [sHTML]);
}
<?php if($_GET['wr_id'] != null){?>
 function write_notcie_send(){
	 $('#wr_option').val('html1');
	 var frm = document.wfrm;
	 oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	 var ca_name = $('#ca_name').val();
	 var wr_subject = $('#wr_subject').val();
	 var start_date = $('#start_date').val();
	 var end_date = $('#end_date').val();
	 var wr_3 = $('input[name=wr_3]').val();
	 var wr_link1 = $('#wr_link1').val();
	 var n_contents = oEditors.getById["ir1"].getIR();
	 var notice_contents = n_contents + "<br>" + wr_link1;

	 var bf_file_del0 = $('#bf_file_del0').val();
	 var bf_file_del1 = $('#bf_file_del1').val();

	 console.log(notice_contents);
	 var type = '';
	 var wr3_type = '';
	 if(ca_name == '공지'){
		 type = 'A';
	 }else{
		 type = 'C';
	 }

	 switch (wr_3){
		 case '공지':
			 wr3_type = 'A';
			 break;
		 case '진행':
			 wr3_type = 'B';
			 break;
		 case '마감':
			 wr3_type = 'C';
			 break;
		 default:
			 wr3_type = 'D';
			 break;
	 }

	 var formData = new FormData(frm);
	 var arr = new Array();

	 formData.append('notice_type',type);
	 formData.append('notice_title',wr_subject);
	 formData.append('show_date',start_date);
	 formData.append('end_date',end_date);
	 formData.append('wr_3',wr_3);
	 formData.append('notice_contents',notice_contents);
	 formData.append('association_type','5');

	 $.ajax({
		 type: 'POST',
		 url: '/index.php/admin/Form/Nsave',
		 data: formData,
		 cache: false,
		 processData: false,
		 contentType: false,
		 beforeSend: function () {},
		 success: function (result) {
			 console.log(result);
			 var list_array = JSON.parse(result);
			 var list_total = list_array.length;
			 if (list_array[0]['success'] == 'E400') {
				 alert('등록 실패 되었습니다.');
			 } else {
				 if(list_array[0]['success'] == 'E200'){
					 if(list_array[0]['count'] == '1'){
						 arr = {
							 'notice_type':type,
							 'notice_title':wr_subject,
							 'show_date':start_date,
							 'end_date':end_date,
							 'wr_3':wr3_type,
							 'notice_contents':notice_contents,
							 'association_type':'5',
							 'complex_idx': '<?php echo $_GET['wr_id']?>',
							 'file_link':{
								 'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
							 },
						 };
					 }else if(list_array[0]['count'] == '2'){
						 arr = {
							 'notice_type':type,
							 'notice_title':wr_subject,
							 'show_date':start_date,
							 'end_date':end_date,
							 'wr_3':wr3_type,
							 'notice_contents':notice_contents,
							 'association_type':'5',
							 'complex_idx': '<?php echo $_GET['wr_id']?>',
							 'file_link':{
								 'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
								 'file2':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][1]['bf_file'],
							 },
						 };
					 }else{
						 arr = {
							 'notice_type':type,
							 'notice_title':wr_subject,
							 'show_date':start_date,
							 'end_date':end_date,
							 'wr_3':wr3_type,
							 'notice_contents':notice_contents,
							 'association_type':'5',
							 'complex_idx': '<?php echo $_GET['wr_id']?>',
							 'file_link':{

							 },
						 };
					 }

					 console.log(JSON.stringify(arr));
					 // 파일 주소 : http://127.0.0.1/data/file/ym_notice/2de15d2841bb2e8269a4d0be9a964ef8.txt
					 $.ajax({
						 type: 'POST',
						 //url: 'http://api.nabs.kr/api/v1/association/notice/modify',
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
					 });
				 }
			 }
		 }
		 ,complete: function () {}
	 });

 }
<?php }else{?>
function write_notcie_send() {
	$('#wr_option').val('html1');
	var frm = document.wfrm;
	oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	var ca_name = $('#ca_name').val();
	var wr_subject = $('#wr_subject').val();
	var start_date = $('#start_date').val();
	var end_date = $('#end_date').val();
	var wr_3 = $('input[name=wr_3]').val();
	var wr_link1 = $('#wr_link1').val();
	var n_contents = oEditors.getById["ir1"].getIR();
	var notice_contents = n_contents + "<br>" + wr_link1;

	var type = '';
	var wr3_type = '';
	if(ca_name == '공지'){
		type = 'A';
	}else{
		type = 'C';
	}

	switch (wr_3){
		case '공지':
			wr3_type = 'A';
			break;
		case '진행':
			wr3_type = 'B';
			break;
		case '마감':
			wr3_type = 'C';
			break;
		default:
			wr3_type = 'D';
			break;
	}
	console.log(type);
	// if ($('input:checkbox[name=notice]'').is(':checked') == true) {
	// }
	var formData = new FormData(frm);
	var arr = new Array();
	formData.append('notice_type',type);
	formData.append('notice_title',wr_subject);
	formData.append('show_date',start_date);
	formData.append('end_date',end_date);
	formData.append('wr_3',wr_3);
	formData.append('notice_contents',notice_contents);
	formData.append('association_type','5');

	for (let value of formData) {
		console.log(JSON.stringify(value));
	}



	if (ca_name == '') {
		alert('분류를 선택해주세요.');
		return false;
	}

	if (wr_subject == '') {
		alert('제목을 입력해주세요.');
		return false;
	}

	if (frm.wr_content.value == '<p>&nbsp;</p>' || frm.wr_content.value == '') {
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
	$.ajax({
		type: 'POST',
		url: '/index.php/admin/Form/Nsave',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend: function () {},
		success: function (result) {
			console.log(result);
			var list_array = JSON.parse(result);
			var list_total = list_array.length;
			if (list_array[0]['success'] == 'E400') {
				alert('등록 실패 되었습니다.');
			} else {
				if(list_array[0]['success'] == 'E200'){
					if(list_array[0]['count'] == '1'){
						arr = {
							'notice_type':type,
							'notice_title':wr_subject,
							'show_date':start_date,
							'end_date':end_date,
							'wr_3':wr3_type,
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
							},
						};
					}else if(list_array[0]['count'] == '2'){
						arr = {
							'notice_type':type,
							'notice_title':wr_subject,
							'show_date':start_date,
							'end_date':end_date,
							'wr_3':wr3_type,
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'file_link':{
								'file1':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][0]['bf_file'],
								'file2':'http://183.103.55.160/data/file/<?php echo $read_table; ?>/'+list_array[0]['files'][1]['bf_file'],
							},
						};
					}else{
						arr = {
							'notice_type':type,
							'notice_title':wr_subject,
							'show_date':start_date,
							'end_date':end_date,
							'wr_3':wr3_type,
							'notice_contents':notice_contents,
							'association_type':'5',
							'complex_idx': list_array[0]['wr_id'],
							'file_link':{

							},
						};
					}

					console.log(JSON.stringify(arr));
					// 파일 주소 : http://127.0.0.1/data/file/ym_notice/2de15d2841bb2e8269a4d0be9a964ef8.txt
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
					});
				}
			}
		}
		,complete: function () {}
	});
	<?php } ?>
}
<?php }?>




function write_notcie_imsi() {
	$('#wr_option').val('secret');
	var frm = document.wfrm;
    oEditors.getById['ir1'].exec('UPDATE_CONTENTS_FIELD', []);
	var ca_name = $('#ca_name').val();
	var wr_subject = $('#wr_subject').val();
	var formData = new FormData(frm);

	if (ca_name == '') {
		alert('분류를 선택해주세요.');
		return false;
	}
	
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
		url: '/index.php/admin/Form/Nsave',
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

function info_list() {
	location.href = '/index.php/SuAdmin/notice';
}

function imsi_call() {
	var wsecret = $('#w_secret option:selected').val();
	location.href = '/index.php/SuAdmin/nwrite?bo_table=ym_notice&wr_id=' + wsecret;
}

document.getElementById('ca_name').value = '<?php echo $ca_name; ?>';
$('input:radio[name="wr_3"]:radio[value="<?php echo $wr_3; ?>"]').prop('checked', true); // 선택하기
</script>
</body>
</html>
