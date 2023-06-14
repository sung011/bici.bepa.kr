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
                                        글쓰기
                                        <i class="fa fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="box-body" style="min-height: 70vh;padding: 1em">
                                <input type="hidden" id="nowpage" name="nowpage">
                                <div class="snic-search" style="margin-bottom: 10px">
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
                                </div>   
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
                                                <th width="15%">작성자</th>
                                                <th width="15%">작성일</th>
                                                <th width="5%">조회</th>
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
            if (chk[i].checked === true) { 
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
        var message = confirm('해당 게시글을 삭제하시겠습니까?');
        
        if (message) {
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
                    if (json === 'E200') {
                        alert('게시글 삭제가 완료되었습니다.');
                        location.reload();
                    } else {
                        alert('전산장애로 게시글 삭제에 실패하였습니다.');
                    }
                }
                , complete: function () {
                }
            });
        } else {
        }
    } else {
        alert('삭제할 게시글을 선택해주세요.');
        return;
    }
}

function notice_write() {
    location.href = '/index.php/SuAdmin/cwrite?bo_table=<?php echo $bo_table; ?>'; 
}

function story_list(nowpage) {
    if (!nowpage) {
        nowpage = '1';
    }

    var Totalcnt = '';
    var searkey = $('#q_searchKeyTy').val();
    var searkeyword = $('#q_searchVal').val();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/index.php/admin/api/Yard/InList', 
        data: {
            'nowpage': nowpage,
            'bo_table': '<?php echo $bo_table; ?>',
            'searkey': searkey,
            'searkeyword': searkeyword
        },
        cache: false,
        beforeSend: function () {
        },
        success: function (json) {
            if (json === 'E500') {
                set_content += '<tr>';
                set_content += '<td colspan="6" style="text-align: center"><strong>등록된 게시글이 없습니다.</strong></td>';
                set_content += '</tr>';

                $('#notice_listtable').html(set_content);

                return false;
            } else {
                var list_array = json;
                var list_total = list_array.length;
                var set_content = '';

                for (i = 0; i < list_total; i++) {
                    var wr_subject = list_array[i]['wr_subject'];
                    var wr_name = list_array[i]['wr_name'];
                    var wr_datetime = list_array[i]['wr_datetime'];
                    var wr_hit = list_array[i]['wr_hit'];
                    var wr_id = list_array[i]['wr_id'];
                    var wr_sno = list_array[i]['wr_sno'];
                    var wr_reply = list_array[i]['wr_reply'];

                    Totalcnt = list_array[i]['Totalcnt'];

                    set_content += '<tr>';
                    set_content += '<td style="text-align: center"><input type="checkbox" id="rma_ship_' + i + '" name="rma_ship[]" class="rmacheck_ship" value="' + wr_id + '"></td>';
                    set_content += '<td class="td-num"><a href="/index.php/SuAdmin/read?bo_table=<?php echo $bo_table; ?>&wr_id=' + wr_id + '">' + wr_sno + '</a></td>';
                    set_content += '<td class="td-subj-wrap"><a href="/index.php/SuAdmin/read?bo_table=<?php echo $bo_table; ?>&wr_id=' + wr_id + '"><div class="td-subject ellipsis">';
                    set_content += '';

                    if (wr_reply) {
                        set_content += '<span class="reply-indication" style="margin-left: 20px"></span><i class="fa fa-circle margin-right-5"></i>' + wr_subject + '</div></a></td>';
                    } else {
                        set_content += '' + wr_subject + '</div></a></td>';
                    }

                    set_content += '<td class="td-name talign_c"><a href="/index.php/SuAdmin/read?bo_table=<?php echo $bo_table; ?>&wr_id=' + wr_id + '">' + wr_name + '</a></td>';
                    set_content += '<td class="td-date"><a href="/index.php/SuAdmin/read?bo_table=<?php echo $bo_table; ?>&wr_id=' + wr_id + '">' + wr_datetime + '</a></td>';
                    set_content += '<td class="td-num"><a href="/index.php/SuAdmin/read?bo_table=<?php echo $bo_table; ?>&wr_id=' + wr_id + '">' + wr_hit + '</a></td>';
                    set_content += '</tr>';
                }

                $('#notice_listtable').html(set_content);   
            }
        }
        , complete: function () {
            $('#nowpage').val(nowpage);

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
    
    html += '<li><a href="#" id="prev"><</a></li>';

    for (var i = first; i <= last; i++) {
        html += '<li><a href="#" id="' + i + '">' + i + '</a></li>';
    }

    html += '<li><a href="#" id="next">></a></li>';
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
    story_list();
});
</script>