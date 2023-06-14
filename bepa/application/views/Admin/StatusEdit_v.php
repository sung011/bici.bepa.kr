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
                                    <!--<button type="button" class="btn-write" onclick="notice_write();">
                                        글쓰기
                                        <i class="fa fa-plus"></i>
                                    </button>-->
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body" style="min-height: 70vh;padding: 1em">
                                <input type="hidden" id="nowpage" name="nowpage">
                                <div class="snic-search">
									<!-- 산업공단명 -->

									<!---->
                                    <div class="snic-select" style="max-width: 100px;">
                                        <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                                        <select id="q_searchKeyTy" name="q_searchKeyTy">
                                            <option value="INC_NAM">업체명</option>
                                            <option value="REP_SPC">업종명</option>
											<option value="GOD_ITM">생산품</option>
                                        </select>
                                    </div> 
									<div class="snic-input" id="q_searKeyTy" style="display: none; max-width: 150px;">
										<label for="q_searKey" class="sr-only">검색어 입력</label>
										<input type="text" id="q_searKey" name="q_searKey" placeholder="">
									</div>
                                    <div class="snic-input">
                                        <label for="q_searchVal" class="sr-only">검색어 입력</label> 
                                        <input type="text" id="q_searchVal" name="q_searchVal" placeholder="기업명">
                                    </div>
                                    <button type="button" class="btn sm dark" onclick="story_list('1');">검색</button>
                                </div>   
                                <div class="rows pad10" style="float: left">
                                    <div class="col-xs-6" style="width: 50%;float: left;text-align: right">   
                                    </div>                          
                                </div>
                                <div style="width: 100%;overflow: auto;clear: both">
                                    <table id="notice_table" class="table table-hover" style="min-width: 1200px">
                                        <tbody id="notice_listtable"></tbody>
                                    </table>
                                </div>
                                <div id="paging"></div>
                            </div>
                        </div>
                    </div>  
                </div>      
            </div>
        </div>
    </section>
</div>

<script src="/assets/inc/js/admin_ajax.js"></script>
<script>

	$(function (){
		$("#q_searchKeyTy").change(function () {
			//console.log(this.value);
			if(this.value == 'REP_SPC' || this.value == 'GOD_ITM'){
				$("#q_searKeyTy").css("display","inline-block");
				if(this.value == 'REP_SPC'){
					$("#q_searKey").attr("placeholder",'업종');
					$("#q_searKey").val("");
					$("#q_searchVal").val("");
				}else if(this.value == 'GOD_ITM'){
					$("#q_searKey").attr("placeholder",'생산품');
					$("#q_searKey").val("");
					$("#q_searchVal").val("");
				}
			}else{
				$("#q_searKeyTy").css("display","none");
				$("#q_searchVal").val("");
			}
		});

	})

function story_list(nowpage) {
	if (!nowpage) {
		nowpage = '1';
	}
	var set_content = '';
	var Totalcnt = "";
	var searkey = $("#q_searchKeyTy").val(); // 기업명 , 대표업종, 생산품
	var searkeyword = $("#q_searchVal").val(); //
	var q_sear = $("#q_searKey").val();
	$.ajax({
		type: 'POSt',
		dataType: 'json',
		url:'/index.php/api/Management/InList',
		data:{
			'nowpage': nowpage,
			'searkey': searkey,
			'searkeyword': searkeyword,
			'q_sear' : q_sear,
		},
		cache: false,
		beforeSend: function () {
			$('.nabis-loading').show();
		},
		success:function (json){
			console.log(json);
			if(json == 'E500' || json == null){
				set_content += "<tr >";
				set_content += "<td colspan=\"5\" style=\"text-align:center;\"><strong class=\"color-red\">조회된 기업정보가 없습니다.</strong></td> ";
				set_content += "</tr >";
				$('#notice_listtable').html(set_content);
				return false;
			}else{
				var list_array = json;
				var list_total = 0;
				if (list_array != null) {
					list_total = list_array.length
				}

				for (var i = 0; i < list_total; i++){
					var ceo_nsam = list_array[i]['ceo_nsam'];
					var inc_nam = list_array[i]['inc_nam'];
					var new_add = list_array[i]['new_add'];
					var tel_num = list_array[i]['tel_num'];
					var cpx_num = list_array[i]['cpx_num'];
					var repp_spc = list_array[i]['repp_spc'];
					Totalcnt = list_array[i]['Totalcnt'];
					/!*alert(Totalcnt);*!/
					set_content += "<tr >";
					set_content += "<td colspan=\"5\" style='border-top: solid 1px #14bdee;font-weight:900;font-size:16px;'>" + inc_nam + "</td>";
					set_content += "</tr >";
					set_content += "<tr >";
					set_content += "<td class='td-num'><a>대표 : " + ceo_nsam + "</a></td>";
					set_content += "<td class='td-num'><a>전화번호 : " + tel_num + "</a></td>";
					set_content += "<td class='td-num'><a>주소 : " + new_add + "</a></td>";
					set_content += "<td class='td-num'><a>대표업종 : " + repp_spc + "</a></td>";
					set_content += "<td class='td-num'><a href='/index.php/SuAdmin/statusEdi?company="+cpx_num+"' >수정하기</a></td>";
					set_content += "</tr >";
				}

				$('#notice_listtable').html(set_content);
			}
		},
		complete: function () {
			$('#nowpage').val(nowpage);
			var totalData = Totalcnt;    // 총 데이터 수
			var dataPerPage = 15;    // 한 페이지에 나타낼 데이터 수
			var pageCount = totalData / dataPerPage;
			pageCount = Math.ceil(pageCount);   // 한 화면에 나타낼 페이지 수
			if (pageCount > 10) pageCount = 10;
			var selectedPage = nowpage;
			if (Totalcnt == "") {
				$("#paging").html("");
			}
			if (totalData > 15) {
				paging(totalData, dataPerPage, pageCount, selectedPage);
			}
		}
	})
}

function paging(totalData, dataPerPage, pageCount, currentPage) {
    var totalPage = Math.ceil(totalData / dataPerPage); // 총 페이지 수
    var pageGroup = Math.ceil(currentPage / pageCount); // 페이지 그룹

    var last = pageGroup * pageCount; // 화면에 보여질 마지막 페이지 번호
    if (last > totalPage) last = totalPage;
    var first = last - (pageCount - 1); // 화면에 보여질 첫번째 페이지 번호
    var next = last + 1;
    var prev = first - 1;
    var $pingingView = $('#paging');
    var html = '<ul class="pagination">';
    // if (prev > 0)
    html += '<li><a href="#" id="prev"><</a></li>';
    for (var i = first; i <= last; i++) {
        html += '<li><a href="#" id="' + i + '">' + i + '</a></li>';
    }

    // if (last < totalPage) {
    html += '<li><a href="#" id="next">></a></li>';
    // }
    html += '</ul>';

    $('#paging').html(html); // 페이지 목록 생성
    $('#paging a').css('color', 'black');
    $('#paging a#' + currentPage).css({
        'text-decoration': 'none',
        'color': '#fff',
        'background': '#4B4B4D',
        'font-weight': 'bold'
    }); // 현재 페이지 표시

    $('#paging a').click(function () {
        var $item = $(this);
        var $id = $item.attr('id');
        var selectedPage = $item.text();
        var prepage = $('#nowpage').val();
        if ($id == 'next') selectedPage = parseInt(prepage) + 1;
        if ($id == 'prev') selectedPage = parseInt(prepage) - 1;
        story_list(selectedPage);
    });
}

/*$('document').ready(function () {
    story_list('1');
});*/
</script>
