<?php

//print_r($bf_source);exit;
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

$to_date = date("Y-m-d");

?>

<style>
    input[id="notice"] {
        position: relative;
        top: 3px;
    }
</style>
<style>

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
                <div class="notice_title">
                    <h2 style="font-size:18px;"><?php echo $wr_title; ?> 등록</h2>
                </div>

                <form id="survey_form" name="survey_form" enctype="multipart/form-data" autocomplete="off">
                    <!--<input type="hidden" name="<?/*= csrf_token() */?>" value="<?/*= csrf_hash() */?>"/>-->
                    <input type="hidden" name="survey_idx" value=""/>
                    <input type="hidden" name="muid" value="<?=$this->session->userdata['muid']?>"/>
                    <input type="hidden" name="buid" value="<?=$this->session->userdata['buid']?>"/>
                    <div class="row mt-4">
                        <div class="col-lg-12">
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
													<!-- <span class="btn btn-secondary btn-md" onclick="add_block();">
														<span class="fa fa-plus"></span> 질문 추가
													</span> -->
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

                        </div> <!-- end col -->

                    </div> <!-- end row -->
                </form>

            </div>
        </div>
    </div>
</div>

    <!-- Footer -->
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
				<option value="checkbox">다중 선택(객관식)</option>
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
    <?php
    include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
    ?>
    <SCRIPT TYPE="text/javascript" SRC="/application/views/common/js/jquery.tmpl.min.js"></SCRIPT>
    <script type="text/javascript" src="/application/views/common/SE28/js/HuskyEZCreator.js" charset="utf-8"></script>
    <script>
        function Inquery_type_select(seq) {

            var stype = $("#inquery_type" + seq + "").val();
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
                set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='1번 문항 내용을 입력해주세요'></label>";
                set_content += "</div></div>";
                set_content += "<div class='my-2'>";
                set_content += "<div class='custom-control custom-radio'>";
                set_content += "<input type='radio' class='custom-control-input'>";
                set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='2번 문항 내용을 입력해주세요'></label>";
                set_content += "</div></div>";
                set_content += "<div class='my-2'>";
                set_content += "<div class='custom-control custom-radio'>";
                set_content += "<input type='radio' class='custom-control-input'>";
                set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='3번 문항 내용을 입력해주세요'></label>";
                set_content += "</div></div>";
                set_content += "<div class='my-2'>";
                set_content += "<div class='custom-control custom-radio'>";
                set_content += "<input type='radio' class='custom-control-input'>";
                set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='4번 문항 내용을 입력해주세요'></label>";
                set_content += "</div></div>";
                set_content += "<div class='my-2'>";
                set_content += "<div class='custom-control custom-radio'>";
                set_content += "<input type='radio' class='custom-control-input'>";
                set_content += "<label class='custom-control-label wr80'><input type='text' class='form-control' name='inquery_content[" + seq + "][]' placeholder='5번 문항 내용을 입력해주세요'></label>";
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
            var survey_title = $("#survey_title").val();
            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            var title_chk = document.getElementsByName("inquery_title[]");
            var type_chk = document.getElementsByName("inquery_type[]");
            var chval = 0;
            var chval2 = 0;
            if (title_chk.length) {
                for (var i = 0; i < title_chk.length; i++) {
                    if (title_chk[i].value == "") {
                        chval++;
                    }
                }
            }
            if (type_chk.length) {
                for (var i = 0; i < type_chk.length; i++) {
                    if (type_chk[i].value == "") {
                        chval2++;
                    }
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
            formData = new FormData(frm);

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
                    //console.log(result);
                    if (result == '1') {
                        alert('설문지 작성 완료 되었습니다.');
                        location.href = "/index.php/State/survey";
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
    </body>
    </html>