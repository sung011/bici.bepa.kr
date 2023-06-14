<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php'; ?>

<link rel="stylesheet" href="/assets/css/complex.css">
<link rel="stylesheet" href="<?=base_url('assets/css/nanumbarungothic.css')?>" >
<!--<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/styles/bootstrap4/bootstrap.min.css')*/?>">-->
<link href="<?=base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.css')?>" rel="stylesheet" type="text/css">
<!--<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.css')*/?>">
<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')*/?>">
<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/plugins/OwlCarousel2-2.2.1/animate.css')*/?>">
<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/styles/main_styles.css')*/?>">
<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/css/nabis.css')*/?>">
<link rel="stylesheet" type="text/css" href="<?/*=base_url('assets/css/tjdska.css')*/?>">-->

<style>
	.font15 {
        font-size: 15px !important;
    }

    .font22 {
        font-size: 22px;
    }

    .card, .card-group {
		border: 1px solid #dfdfdf;
		background: #ffffff;
	}

    .sus-stitle {
    	color: #005bb0;
        font-size: 18px;
        text-align: left;
    }
	.btn-secondary {
		color: #fff;
		background-color: #868e96;
		border-color: #868e96;
	}

	input[type=checkbox], input[type=radio] {
		box-sizing: border-box;
		padding: 0;
	}
	.custom-control-input {
		position: absolute;
		z-index: -1;
		opacity: 0;
	}

	.bleft {
		float: left;
	}

	.bright {
		float: right;
	}

	.fwidth {
		width: 100%;
	}

	.inquery-block {
		width: 100%;
		border: 1px solid #ddd;
		padding: 5px;
		border-radius: 5px;
		margin-bottom: 10px;
		margin-left: 0;
	}

	.wr80 {
		width: 80%;
	}

	.item-list {
		min-height: 50px;
		margin-top: 10px;
	}

	.odd {
		background: #eee;
	}

	.form-control:disabled, .form-control[readonly] {
		background-color: #ddd;
		opacity: 1;
	}

	input[id="notice"] {
		position: relative;
		top: 3px;
	}

	.input-group {
		position: relative;
		display: -ms-flexbox;
		/*display: flex;*/
		-ms-flex-align: stretch;
		align-items: stretch;
		width: 100%;
	}

</style>

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
							<form id="survey_form" name="survey_form" enctype="multipart/form-data" autocomplete="off">
								<!--<input type="hidden" name="<?/*= csrf_token() */?>" value="<?/*= csrf_hash() */?>"/>-->
								<input type="hidden" name="survey_idx" value="0"/>
								<input type="hidden" name="muid" value="<?=$this->session->userdata['muid']?>"/>
								<input type="hidden" name="buid" value="0"/>
							<div class="card">
								<div class="card-body">
									<h4 class="mt-0 header-title"></h4>
									<div class="general-label">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-append">
															<span class="input-group-text">설문지 제목</span>
														</div>
														<input type="text" class="form-control " name="survey_title"
															   id="survey_title" value="" placeholder="">

													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-append">
															<span class="input-group-text">설문조사 시작일</span>
														</div>
														<input type="text" class="form-control datepicker" name="start_date"
															   id="start_date" value="" placeholder="">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-append">
															<span class="input-group-text">설문조사 종료일</span>
														</div>
														<input type="text" class="form-control datepicker" name="end_date"
															   id="end_date" value="" placeholder="">
													</div>
												</div>
											</div>
											<div class="col-md-4">
												<div class="form-group">
													<div class="input-group">
														<div class="input-group-append">
															<span class="input-group-text">섹션별 질문수</span>
														</div>
														<select class="form-control" name="page_incnt" id="page_incnt">
															<option value="3">3</option>
															<option value="5">5</option>
															<option value="7">7</option>
														</select>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="inquery_div">
												<div class="row inquery-block">
													<input type="hidden" name="inquery_sno[]" id="inquery_sno0" value="0">
													<div class="form-group fwidth">

														<div class="col-sm-7 bleft">
															<input type="text" class="form-control"
																   placeholder="질문 내용을 입력해주세요" name="inquery_title[]"
																   value="">
														</div><!--end col-->

														<div class="col-sm-3 bleft">

															<select class="form-control" name="inquery_type[]"
																	id="inquery_type0"
																	onchange="Inquery_type_select('0',this);">
																<option value="" selected>작성방식을 선택해주세요.</option>
																<option value="text">텍스트입력(주관식)</option>
																<option value="radio">단일 선택(객관식)</option>
																<!-- <option value="checkbox">다중 선택(객관식)</option> -->
															</select>
														</div><!--end col-->


													</div><!--end row-->
													<div class="form-group fwidth">
														<div class="col-sm-12 item-list bclear" id="inquery_item0">
															&nbsp;&nbsp;
														</div>
													</div>

												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group " style="margin-bottom:10px;">
													<div class="col-sm-12">
													<span class="btn btn-secondary btn-md" onclick="add_block();">
														<span class="fa fa-plus"></span> 질문 추가
													</span>
														<!--<span class="btn btn-secondary btn-md" onclick="add_copy();">
															<span class="fa fa-plus" ></span> 설문지 복사
														</span>-->
													</div><!--end col-->
												</div><!--end row-->
											</div>

										</div>
									</div>

								</div><!--end card-body-->
								<div class="col-md-12 card-footer" style="height:60px;">


									<button type="button" class="btn btn-primary bright" onclick="survey_save();"> 저장
									</button>

								</div>

							</div><!--end card-->
							</form>
                    	</div>
                	</div>
            	</div>
            </div>
        </div>
    </section>



<script>
function survey_submit() {
    var frm = document.survey_form;
    var formData = new FormData(frm);
    
    $.ajax({
        method: 'POST',
        url: '/index.php/State/survey_submit_ajax',
        // url: '/index.php/SuAdmin/survey_submit_ajax',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (result) {
            if (result == '1') {
                alert('참여해 주셔셔 감사합니다.');
                // location.href="/index.php/State/survey";
                location.href = '/index.php/SuAdmin/Survey';
            }

        }
        , complete: function () {}
    });
}
</script>







   
<script id="category-tmpl" type="text/x-jquery-tmpl">
	<option value="${name}" rel="${idx}">${name}</option>


            </script>
<script id="Upjong-tmpl" type="text/x-jquery-tmpl">
	<option value="${upjong_cd}" rel="${upjong_cd}">${upjong_nm}</option>


            </script>
<script id="inquery-tmpl" type="text/x-jquery-tmpl">
  <div class="row inquery-block ${row_class}" id="item_inquery_block${num}">
     <input type="hidden" name="inquery_sno[]" id="inquery_sno${num}" value="${num}">
	 <div class="form-group fwidth" >

		<div class="col-sm-7 bleft">
			<input type="text" class="form-control" placeholder="질문 내용을 입력해주세요" name="inquery_title[]"  value="">
		</div>
		<div class="col-sm-3 bleft">

			<select class="form-control" name="inquery_type[]" id="inquery_type${num}" onchange="Inquery_type_select('${num}');">
				<option value="">작성방식을 선택해주세요.</option>
				<option value="text">텍스트입력(주관식)</option>
				<option value="radio">단일 선택(객관식)</option>
				<!--<option value="checkbox">다중 선택(객관식)</option>-->
			</select>
		</div>

		<div class="col-sm-2 bleft">
			<span class="btn btn-danger btn-sm" onclick="item_block_del('${num}')" >
				<span class="far fa-trash-alt mr-1"></span> Delete
			</span>
		</div>

	</div>
	<div class="form-group fwidth" >
		<div class="col-sm-12 item-list bclear" id="inquery_item${num}">
			&nbsp;&nbsp;
		</div>
	</div>
 </div>




            </script>
<SCRIPT TYPE="text/javascript" SRC="<?=base_url('assets/js/jquery.tmpl.min.js')?>"></SCRIPT>
<script type="text/javascript" src="<?=base_url('assets/SE28/js/HuskyEZCreator.js')?>" charset="utf-8"></script>

<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.kr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/common.js')?>"></script>




<script>
	function Inquery_type_select(seq) {

		var stype = $("#inquery_type" + seq + "").val();

		console.log()
		//alert(stype);
		//exit;
		var set_content = "";
		if (stype == "text") {
			set_content += "<input type='text' class='form-control' placeholder='텍스트 문항' name='inquery_content[" + seq + "][]'  value='' readonly>	";
		} else if (stype == "radio") {
			set_content += "<p>최대 5문항까지 작성 가능합니다.설문지에서는 적으신 문항까지만 보여집니다.</p>";
			set_content += "<div class='my-2'>";
			set_content += "<div class='custom-control custom-radio'>";
			set_content += "<input type='radio' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' id='content_1' placeholder='1번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='my-2'>";
			set_content += "<div class='custom-control custom-radio'>";
			set_content += "<input type='radio' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' id='content_2' placeholder='2번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='my-2'>";
			set_content += "<div class='custom-control custom-radio'>";
			set_content += "<input type='radio' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' id='content_3' placeholder='3번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='my-2'>";
			set_content += "<div class='custom-control custom-radio'>";
			set_content += "<input type='radio' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' id='content_4' placeholder='4번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='my-2'>";
			set_content += "<div class='custom-control custom-radio'>";
			set_content += "<input type='radio' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' id='content_5' placeholder='5번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";

		} else if (stype == "checkbox") {
			set_content += "<p>최대 5문항까지 작성 가능합니다.설문지에서는 적으신 문항까지만 보여집니다.</p>";
			set_content += "<div class='checkbox my-2'>";
			set_content += "<div class='custom-control custom-checkbox'>";
			set_content += "<input type='checkbox' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='1번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='checkbox my-2'>";
			set_content += "<div class='custom-control custom-checkbox'>";
			set_content += "<input type='checkbox' class='custom-control-input' >";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='2번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='checkbox my-2'>";
			set_content += "<div class='custom-control custom-checkbox'>";
			set_content += "<input type='checkbox' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='3번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='checkbox my-2'>";
			set_content += "<div class='custom-control custom-checkbox'>";
			set_content += "<input type='checkbox' class='custom-control-input' >";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='4번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";
			set_content += "<div class='checkbox my-2'>";
			set_content += "<div class='custom-control custom-checkbox'>";
			set_content += "<input type='checkbox' class='custom-control-input'>";
			set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='5번 문항 내용을 입력해주세요'></label>";
			set_content += "</div></div>";

		}
		//alert(set_content);
		$("#inquery_item" + seq + "").html(set_content);
		//alert(stype);
	}

	function add_block() {
		var chk = document.getElementsByName("inquery_sno[]");
		console.log(chk);
		var chval = "";
		if (chk.length) {
			for (var i = 0; i < chk.length; i++) {
				chval = chk[i].value;
			}
		}
		var vnum = parseInt(chval) + 1;
		if (vnum % 2 == 0) {
			var b_class = "even";
		} else {
			var b_class = "odd";
		}


		var items = [{num: vnum, row_class: b_class}];
		console.log(items);
		$('#inquery-tmpl').tmpl(items).appendTo("#inquery_div");

	}

	function item_block_del(seq) {
		$("#item_inquery_block" + seq + "").remove();
	}


	function survey_save() {
		var appchval = []
		var chk = document.getElementsByName("inquery_sno[]");
		if (chk.length) {
			for (var i = 0; i < chk.length; i++) {
				appchval.push(chk[i].value)
			}
		}


		var survey_title = $("#survey_title").val(); // 설문지 제목
		var start_date = $("#start_date").val(); // 시작일
		var end_date = $("#end_date").val(); // 종요일
		var page_incnt = $('#page_incnt').val();

		var title_chk = document.getElementsByName("inquery_title[]");
		var type_chk = document.getElementsByName("inquery_type[]");
		var inquery_content = document.getElementsByName('inquery_content[0][]');
		console.log(inquery_content);
		var chval = 0;
		var chval2 = 0;
		var nachval = [];
		var typechval2 = [];


		if (title_chk.length) {
			for (var i = 0; i < title_chk.length; i++) {
				if (title_chk[i].value == "") {
					chval++;
				}
				nachval.push(title_chk[i].value);
			}
		}
		if (type_chk.length) {
			for (var i = 0; i < type_chk.length; i++) {
				if (type_chk[i].value == "") {
					chval2++;
				}
				typechval2.push(type_chk[i].value);
			}
		}
		if (chval > 0) {
			alert("질문내용을 입력해주세요.");
			return false;
		}
		if (chval2 > 0) {
			alert("작성 방식을 선택해주세요.");
			return false;
		}

		if (survey_title == "") {
			alert("설문지 제목을 입력해주세요.");
			return false;
		}

		if (start_date == "") {
			alert("설문지 시작일을 입력해주세요.");
			return false;
		}

		if (end_date == "") {
			alert("설문지 종료일을 입력해주세요.");
			return false;
		}

		var frm = document.survey_form;
		//var formData = new FormData(frm);
		var formData = new FormData(frm);
		var arr = new Array();
		for (let value of formData){
			console.log(value);
		}

		$.ajax({
			method: 'POST',
			url: '/index.php/State/surveySaveAjax',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend: function () {
			},
			success: function (result) {
				console.log(result);

				var list_array = JSON.parse(result);
				var list_total = list_array.length;

				if (list_array[0]['success'] == '200') {

					arr = {
						'complex_survey_index':list_array[0]['complex_survey_index']['survey_idx'],
						'association_type':'5',
						'id':'<?= $this->session->userdata('mb_email') ?>',
						'survey_idx' :list_array[0]['params']['survey_idx'],
						'muid':list_array[0]['params']['muid'],
						'buid':list_array[0]['params']['buid'],
						'survey_title':list_array[0]['params']['survey_title'],
						'start_date':list_array[0]['params']['start_date'],
						'end_date':list_array[0]['params']['end_date'],
						'page_incnt':list_array[0]['params']['page_incnt'],
						'inquery_sno':list_array[0]['params']['inquery_sno'],
						'inquery_title':list_array[0]['params']['inquery_title'],
						'inquery_type':list_array[0]['params']['inquery_type'],
						'inquery_content':list_array[0]['params']['inquery_content'],
					}

					console.log(arr);

					$.ajax({
						type: 'POST',
						//url: 'http://api.nabs.kr/api/v1/association/notice/add',
						url: 'http://api.nabs.kr/api/v1/association/survey/add?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
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
							alert('설문지 작성 완료 되었습니다.');
							location.href = "/index.php/SuAdmin/Survey";
						}
					});
				}

			}
			, complete: function () {
			}
		});
	}

	/*function add_copy() {
		location.href = './survey_copy';
	}*/
</script>
