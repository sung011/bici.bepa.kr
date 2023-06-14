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
                                    <button type="button" class="btn-write" onclick="notice_write();">
                                        등록
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body" style="min-height: 70vh;padding: 1em">
                                <input type="hidden" id="nowpage" name="nowpage">
                                


                                <!-- <div class="snic-search">
                                    <div class="snic-select">
                                        <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                                        <select id="q_searchKeyTy" name="q_searchKeyTy">
                                            <option value="wr_subject">제목</option>
                                            <option value="wr_content">내용</option>
                                            <option value="subcont">제목 + 내용</option>
                                        </select>
                                    </div>
                                    <div class="snic-input">
                                        <label for="q_searchVal" class="sr-only">검색어 입력</label> 
                                        <input type="text" id="q_searchVal" name="q_searchVal" value="">
                                    </div>
                                    <button type="button" class="btn sm dark" onclick="story_list('1');">검색</button>
                                </div> -->
                                


                                <!-- <div class="snic-search">
			                        <div class="snic-input" style="max-width: 200px;">
			                            <div class="input-group">
			                                <input type="text" class="form-control datepicker" id="after_search" placeholder="이후" aria-describedby="basic-addon1">
			                                <span class="input-group-addon" id="basic-addon1">이후</span>
			                            </div>
			                        </div> 
			                        <div class="snic-input" style="max-width: 200px;">
			                            <div class="input-group">
			                                <input type="text" class="form-control datepicker" id="previous_search" placeholder="이전" aria-describedby="basic-addon2">
			                                <span class="input-group-addon" id="basic-addon2">이전</span>
			                            </div>
			                        </div> 
			                        <div class="snic-input">
			                            <label for="q_searchVal" class="sr-only">검색어 입력</label>
			                            <input type="text" name="q_searchVal" id="q_searchVal" value="">
			                        </div>
			                        <button type="button" class="btn sm dark" onclick="story_list('1');">검색</button>
			                    </div> -->



			                   	<div class="row" style="margin-bottom: 10px">
			                   		<div class="col-lg-12">
			                   			<button type="button" class="btn-write" onclick="notice_del();">선택삭제</button>	
			                   		</div>
			                   	</div>
                                <div style="width: 100%;margin-bottom: 10px;overflow: auto">
                                    <table id="notice_table" class="table table-hover" style="min-width: 1200px;margin-bottom: 0px">
                                        <thead>
                                            <tr class="tr-th-top">
                                            	<th width="5%"><input type="checkbox" name="selected_all"></th>
                                                <th width="5%">번호</th>
												<th>제목</th>
												<th width="15%">설문조사 시작일</th>
												<th width="15%">설문조사 종료일</th>
												<th width="5%">항목</th>
												<th width="10%">참여자수</th>
												<th width="10%">결과보기</th>
                                            </tr>
                                        </thead>
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
$('input[name=selected_all]').on('change', function () {
    $('.rmacheck_ship').trigger('click');
});

function notice_del() {
    var chk = document.getElementsByName('rma_ship[]');
    var checkCnt = 0;
    var wrid = '';
    
    if (chk.length) {
        for (var i = 0; i < chk.length; i++) {
            if (chk[i].checked == true) { 
                checkCnt++;
                
                if (wrid) {
                    wrid += ',' + chk[i].value;
                } else {
                    wrid += chk[i].value;
                }
            }
        }
    }

    if (checkCnt) {
        var con_test = confirm('해당 설문을 삭제하시겠습니까?');
        
        if (con_test == true) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/index.php/SuAdmin/tkrwp',
                data: {
                    'wrid': wrid,
                    'bo_table': '<?php echo $bo_table; ?>',
                },
                cache: false,
                beforeSend: function () {
                },
                success: function (json) {
                    if (json == 'E200') {
                        location.reload();
                    } else {
                        alert('전산장애로 삭제 실패하였습니다.');
                    }
                }
                , complete: function () {
                }
            });
        } else {
        }
    } else {
        alert('삭제할 리스트를 선택해주세요.');
        return;
    }
}

function notice_write() {
    location.href = '/index.php/SuAdmin/stateWrite';
}

function story_list(nowpage) {
    if (!nowpage) {
        nowpage = '1';
    }

    var set_content = '';
    var Totalcnt = '';
	var after = $('#after_search').val();
	var previous = $('#previous_search').val();
	var searkeyword = $('#q_searchVal').val();
	// var searkey = $('#q_searchKeyTy').val();

	$.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/index.php/admin/State/InList', 
        data: {
            // 'bo_table': '<?php echo $bo_table; ?>',
            // 'searkey': searkey,
            'nowpage': nowpage,
			'after': after, // 이후
			'previous': previous, // 이전
			'searkeyword': searkeyword // 검색
        },
        cache: false,
        beforeSend: function () {
            // $('.nabis-loading').removeClass('display-none');
            $('.nabis-loading').show();
        },
        success: function (json) {
            if (json == 'E500') {
                set_content += '<tr>';
                set_content += '<td colspan="8" style="text-align: center"><strong class="color-red">게시물이 없습니다.</strong></td>';
                set_content += '</tr>';
                $('#notice_listtable').html(set_content);
                return false;
            } else {
                var list_array = json;
                var list_total = list_array.length;
                var set_content = '';

                for (i = 0; i < list_total; i++) {
                    var sno = list_array[i]['sno']; // 번호
					var survey_title = list_array[i]['survey_title']; // 제목
					var survey_start = list_array[i]['survey_start']; // 시작일
					var survey_end = list_array[i]['survey_end']; // 종료일
					var response_person = list_array[i]['response_person']; // 참여자
					var inquery_cnt = list_array[i]['inquery_cnt']; // 질문수
					var survey_idx = list_array[i]['survey_idx'];
					Totalcnt = list_array[i]['Totalcnt'];

                    set_content += '<tr>';
             	    set_content += '<td style="text-align: center"><input type="checkbox" id="rma_ship_' + i + '" name="rma_ship[]" class="rmacheck_ship" value="' + survey_idx + '"></td>';
                    set_content += '<td class="td-num">' + sno + '</td>';
                    set_content += '<td class="td-num" style="text-align: left">' + survey_title + '</td>';
                    set_content += '<td class="td-num">' + survey_start + '</td>';
                    set_content += '<td class="td-num">' + survey_end + '</td>';
                    set_content += '<td class="td-num">' + inquery_cnt + '</td>';
                    set_content += '<td class="td-num">' + response_person + '</td>';
					set_content += '<td class="td-num"><a href="/index.php/SuAdmin/survey_detail?survey_idx=' + survey_idx + '"><span class="ntype ntype_1">결과보기</span></a></td>';
					set_content += '</tr>';
                }

                $('#notice_listtable').html(set_content);   
            }
        }
        , complete: function () {
            $('#nowpage').val(nowpage);
            //$('.nabis-loading').addClass('display-none');
            var totalData = Totalcnt; // 총 데이터 수
            var dataPerPage = 15; // 한 페이지에 나타낼 데이터 수
            var pageCount = totalData / dataPerPage;
            pageCount = Math.ceil(pageCount); // 한 화면에 나타낼 페이지 수
            if (pageCount > 10) pageCount = 10;
            var selectedPage = nowpage;

            paging(totalData, dataPerPage, pageCount, selectedPage);
        }
    });
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
    var html = '<ul class="pagination" style="margin: 0px">';
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

$('document').ready(function () {
    story_list('1');
});
</script>