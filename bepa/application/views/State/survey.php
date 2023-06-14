<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<link rel="stylesheet" href="/assets/css/table.css">
<style>
.reply-indication {
    border-left: 1px dotted #b5b5b5;
    border-bottom: 1px dotted #b5b5b5;
    display: inline-block;
    width: 7px;
    height: 10px;
}

.margin-right-5 {
    color: #fa8d00;
    margin-right: 5px;
}
</style>

<!-- Features -->
<div class="features">
    <div class="container">
        <div class="features_row row">
            <!-- Features Item -->
            <div class="feature_col col-lg-3 block_pad bg-white m-hidden" style="min-height: 50vh">
                <!-- left menu -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>
            </div>
            <!-- Features Item -->
            <div class="col-xs-12 col-lg-9 feature_col block_pad bg-white">
                <div class="notice_title">
                    <h2><?= $co_subject ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>기업경영실태조사</li>
                                            <li><?= $co_subject ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="notice_table notice-block2">
                    <input type="hidden" id="nowpage" name="nowpage">
                    <div class="snic-search">
                        <span>검색</span>        
                        <div class="snic-input" style="max-width: 200px">
                            <div class="input-group">
                                <input type="text" id="after_search" class="form-control datepicker" placeholder="이후" aria-describedby="basic-addon1">
                                <span id="basic-addon1" class="input-group-addon">이후</span>
                            </div>
                        </div> 
                        <div class="snic-input" style="max-width: 200px">
                            <div class="input-group">
                                <input type="text" id="previous_search" class="form-control datepicker" placeholder="이전" aria-describedby="basic-addon2">
                                <span id="basic-addon2" class="input-group-addon">이전</span>
                            </div>
                        </div> 
                        <div class="snic-input">
                            <label for="q_searchVal" class="sr-only">검색어 입력</label>
                            <input type="text" id="q_searchVal" name="q_searchVal" value="">
                        </div>
                        <button type="button" class="btn sm dark" onclick="story_list('1');">검색</button>
                    </div>
                    <div style="width: 100%;overflow: auto">
                        <table id="notice_table" class="table table-hover mb-3">
                            <thead>
                                <tr class="tr-th-top">
                                    <th width="5%">번호</th>
                                    <th>제목</th>
                                    <th width="15%">설문조사 시작일</th>
                                    <th width="15%">설문조사 종료일</th>
                                    <th width="5%">항목</th>
                                    <th width="10%">참여자수</th>
                                    <th width="10%">응답하기</th>
                                </tr>
                            </thead>
                            <tbody id="notice_listtable"></tbody>
                        </table>
                    </div>
                    <div id="paging" class="m-0"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- footer -->
<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/footer.php'; ?>

<script>
function story_list(nowpage) {
    if (!nowpage) {
        nowpage = '1';
    }

    var set_content = '';
    var Totalcnt = '';
    var after = $('#after_search').val();
    var previous = $('#previous_search').val();
    var searkeyword = $('#q_searchVal').val();

    $.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/index.php/State/InList',
        data: {
            'nowpage': nowpage,
            'after': after, // 이후
            'previous': previous, // 이전
            'searkeyword': searkeyword // 검색
        },
        cache: false,
        beforeSend: function () {
            $('.nabis-loading').show();
        },
        success: function (json) {
            if (json === 'E500') {
                set_content += '<tr>';
                set_content += '<td colspan="7" class="text-center"><strong>등록된 설문지가 없습니다.</strong></td>';
                set_content += '</tr>';

                $('#notice_listtable').html(set_content);   

                return false;
            } else {
                var list_array = json;
                // console.log('list_array: ' + JSON.stringify(list_array));
                // var list_total = list_array.length;
                var set_content = '';

                if (list_array) {
                    for (var i = 0; i < list_array.length; i++) {
                        var sno = list_array[i]['sno']; // 번호
                        var survey_title = list_array[i]['survey_title']; // 제목
                        var survey_start = list_array[i]['survey_start']; // 시작일
                        var survey_end = list_array[i]['survey_end']; // 종료일
                        var response_person = list_array[i]['response_person']; // 참여자
                        var inquery_cnt = list_array[i]['inquery_cnt']; // 질문수
                        var survey_idx = list_array[i]['survey_idx'];
                        
                        Totalcnt = list_array[i]['Totalcnt'];

                        set_content += '<tr>';
                        set_content += '<td class="td-num">' + sno + '</td>';
                        set_content += '<td class="td-num text-left">' + survey_title + '</td>';
                        set_content += '<td class="td-num">' + survey_start + '</td>';
                        set_content += '<td class="td-num">' + survey_end + '</td>';
                        set_content += '<td class="td-num">' + inquery_cnt + '</td>';
                        set_content += '<td class="td-num">' + response_person + '</td>';
                        set_content += '<td class="td-num"><a href="/index.php/State/surveyInfo?survey_idx=' + survey_idx + '"><span class="ntype ntype_1" style="background-color: #17a2b8 !important">응답하기</span></a></td>';
                        set_content += '</tr>';
                    }
                } else {
                    set_content += '<tr>';
                    set_content += '<td colspan="7" class="text-center"><strong>등록된 설문지가 없습니다.</strong></td>';
                    set_content += '</tr>';
                }

                $('#notice_listtable').html(set_content);
            }
        }
        , complete: function () {
            $('#nowpage').val(nowpage);

            var totalData = Totalcnt;
            var dataPerPage = 15;
            var pageCount = totalData / dataPerPage;

            pageCount = Math.ceil(pageCount);

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
    var html = '<ul class="pagination">';

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