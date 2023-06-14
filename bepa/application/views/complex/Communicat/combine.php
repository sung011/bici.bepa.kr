<?php
include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/header.php";
$admin_cert = $this->session->userdata('mb_level');
?>

<link rel="stylesheet" href="/application/views/common/css/table.css">
<style>
    .reply-indication {
        display: inline-block;
        width: 7px;
        height: 10px;
        border-left: 1px dotted #b5b5b5;
        border-bottom: 1px dotted #b5b5b5;
    }

    .margin-right-5 {
        margin-right: 5px;
        color: #fa8d00;
    }
</style>

<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT'] . "/application/views/common/left_menu.php";
                ?>

            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;">
                <!--
                <div class="board-title-image">
                    <div class="board-title-caption">
                        <h2 >알림마당</h2>
                        <span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
                    </div>
                </div>
                -->
                <div class="notice_title">
                    <h2><?php echo $bo_subject; ?> </h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>소통광장</li>
                                            <li><?php echo $bo_subject; ?> </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="notice_table notice-block2">
                    <?php
                    if ($this->session->userdata('mb_level') == '10' && $this->session->userdata('mb_id')) {
                        ?>
                        <div class="rows pad10">
                            <div class="col-xs-6">
                            </div>
                            <div class="col-xs-6" style="text-align:right;">
                                <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <input type="hidden" name="nowpage" id="nowpage">
                    <div class="snic-search">
                        <span>검색</span>
                        <div class="snic-select">
                            <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                            <select name="q_searchKeyTy" id="q_searchKeyTy">
                                <option value="wr_subject">제목</option>
                                <option value="wr_content">내용</option>
                                <option value="subcont">제목 + 내용</option>
                            </select>
                        </div>
                        <div class="snic-input">
                            <label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text"
                                                                                           name="q_searchVal"
                                                                                           id="q_searchVal" value="">
                        </div>
                        <button type="button" class="btn sm dark" onclick="story_list('1')">검색</button>
                    </div>
                    <table class="table table-hover" id="notice_table">
                        <thead>
                        <tr class="tr-th-top">
                            <?php
                            if ($this->session->userdata('mb_level') == '10' && $this->session->userdata('mb_id')) {
                                ?>
                                <th><input type="checkbox" name="selected_all"></th>
                            <?php } ?>
                            <th class="hidden-md hidden-sm">번호</th>
                            <th>제목</th>
                            <th>작성자</th>
                            <th>작성일</th>
                            <th class="hidden-xs">조회</th>
                        </tr>
                        </thead>
                        <tbody id="notice_listtable">

                        </tbody>

                    </table>
                    <div id="paging"></div>
                    <?php
                    if ($this->session->userdata('mb_level') == '10' && $this->session->userdata('mb_id')) {
                        ?>
                        <div class="rows pad10">
                            <div class="col-xs-6" style="float:left;width:50%;">

                                <button type="button" class='btn-write' onclick="notice_del();">선택삭제</button>
                                <!-- <button type="button" class='btn-search' onclick="search_notice();"><i class="fa fa-search" aria-hidden="true"></i></button> -->
                            </div>
                            <div class="col-xs-6" style="float:left;width:50%;text-align:right;">
                                <button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>

            </div>

        </div>
    </div>
</div>

<!-- Footer -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';

?>
<script>
    $('input[name=selected_all]').on('change', function () {
        $('.rmacheck_ship').trigger('click');
        //$('.rmacheck_ship').prop('checked', this.checked);
    });

    function notice_del() {
        var chk = document.getElementsByName("rma_ship[]");
        var checkCnt = 0;
        var wrid = "";
        if (chk.length) {
            for (var i = 0; i < chk.length; i++) {
                if (chk[i].checked == true) {//체크박스가 활성화인것중에 전체체크 실행
                    checkCnt++;
                    if (wrid) {
                        wrid += "," + chk[i].value;
                    } else {
                        wrid += chk[i].value;
                    }
                }
            }
        }

        if (checkCnt) {
            var con_test = confirm("해당 게시판을 삭제하시겠습니까?");
            if (con_test == true) {
                $.ajax({
                    type: 'POST',
                    dataType: "json",
                    url: "/Info/tkrwp",
                    data: {
                        'wrid': wrid,
                        'bo_table': '<?php echo $bo_table;?>',
                    },
                    cache: false,
                    beforeSend: function () {
                    },
                    success: function (json) {
                        if (json == "E200") {
                            location.reload();
                        } else {
                            alert("전산장애로 삭제 실패하였습니다.");
                        }
                    }
                    , complete: function () {
                    }
                });
            } else {
            }

        } else {
            alert("삭제할 리스트를 선택해주세요.");
            return;
        }
    }

    function notice_write() {
        location.href = '/info/cwrite?bo_table=<?php echo $bo_table; ?>';
    }

    function story_list(nowpage) {
        if (!nowpage) {
            nowpage = '1';
        }
        var set_content = '';
        var Totalcnt = "";
        var searkey = $("#q_searchKeyTy").val();
        var searkeyword = $("#q_searchVal").val();
        var admin_cert = "<?php echo $admin_cert; ?>";

        $.ajax({
            type: 'POST',
            dataType: "json",
            url: "/api/Yard/InList",
            data: {
                'nowpage': nowpage,
                'bo_table': '<?php echo $bo_table; ?>',
                'searkey': searkey,
                'searkeyword': searkeyword
            },
            cache: false,
            beforeSend: function () {
                //$('.nabis-loading').removeClass('display-none');
                $('.nabis-loading').show();
            },
            success: function (json) {
                if (json == 'E500') {
                    set_content += "<tr >";
                    if (admin_cert == 10) {
                        set_content += "<td colspan=\"6\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";
                    } else {
                        set_content += "<td colspan=\"5\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";
                    }
                    set_content += "</tr >";
                    $('#notice_listtable').html(set_content);
                    return false;
                } else {
                    var list_array = json;
                    var list_total = list_array.length;

                    for (i = 0; i < list_total; i++) {

                        var wr_subject = list_array[i]['wr_subject'];
                        var wr_name = list_array[i]['wr_name'];
                        var wr_datetime = list_array[i]['wr_datetime'];
                        var wr_hit = list_array[i]['wr_hit'];
                        var wr_id = list_array[i]['wr_id'];
                        var wr_sno = list_array[i]['wr_sno'];
                        var wr_reply = list_array[i]['wr_reply'];
                        Totalcnt = list_array[i]['Totalcnt'];

                        set_content += "<tr >";
                        if (admin_cert == 10) {
                            set_content += "<td style='text-align:center;'><input type='checkbox' class='rmacheck_ship' id='rma_ship_" + i + "' name='rma_ship[]' value='" + wr_id + "' ></td>";
                        }

                        set_content += "<td class='td-num'><a href='/info/read?bo_table=<?php echo $bo_table; ?>&wr_id=" + wr_id + "'>" + wr_sno + "</a></td>";
                        set_content += "<td class='td-subj-wrap'><a href='/info/read?bo_table=<?php echo $bo_table; ?>&wr_id=" + wr_id + "'><div class='td-subject ellipsis'>";
                        set_content += "";
                        if (wr_reply) {
                            set_content += "<span class='reply-indication' style='margin-left:20px;'></span><i class='fa fa-circle margin-right-5'></i>" + wr_subject + "</div></a></td>";
                        } else {
                            set_content += "" + wr_subject + "</div></a></td>";
                        }
                        set_content += "<td class='td-name talign_c'><a href='/info/read?bo_table=<?php echo $bo_table; ?>&wr_id=" + wr_id + "'>" + wr_name + "</a></td>";
                        set_content += "<td class='td-date'><a href='/info/read?bo_table=<?php echo $bo_table; ?>&wr_id=" + wr_id + "'>" + wr_datetime + "</a></td>";
                        set_content += "<td class='td-num'><a href='/info/read?bo_table=<?php echo $bo_table; ?>&wr_id=" + wr_id + "'>" + wr_hit + "</a></td>";
                        set_content += "</tr>";
                    }
                    $('#notice_listtable').html(set_content);
                }
            }
            , complete: function () {
                $('#nowpage').val(nowpage);
                //$('.nabis-loading').addClass('display-none');
                var totalData = Totalcnt;    // 총 데이터 수
                var dataPerPage = 15;    // 한 페이지에 나타낼 데이터 수
                var pageCount = totalData / dataPerPage;
                pageCount = Math.ceil(pageCount);   // 한 화면에 나타낼 페이지 수
                if (pageCount > 10) pageCount = 10;
                var selectedPage = nowpage;

                if (totalData > 15) {
                    paging(totalData, dataPerPage, pageCount, selectedPage);
                }
            }
        });
    }

    function paging(totalData, dataPerPage, pageCount, currentPage) {
        var totalPage = Math.ceil(totalData / dataPerPage);    // 총 페이지 수
        var pageGroup = Math.ceil(currentPage / pageCount);    // 페이지 그룹


        var last = pageGroup * pageCount;    // 화면에 보여질 마지막 페이지 번호
        if (last > totalPage)
            last = totalPage;
        var first = last - (pageCount - 1);    // 화면에 보여질 첫번째 페이지 번호
        var next = last + 1;
        var prev = first - 1;

        var $pingingView = $("#paging");
        var html = "<ul class='pagination'>";
        //if(prev > 0)
        html += "<li><a href=# id='prev'><</a></li> ";
        for (var i = first; i <= last; i++) {
            html += "<li><a href='#' id=" + i + ">" + i + "</a></li> ";
        }
        //if(last < totalPage){
        html += "<li><a href=# id='next'>></a></li>";
        //}
        html += "</ul>";

        $("#paging").html(html);    // 페이지 목록 생성
        $("#paging a").css("color", "black");
        $("#paging a#" + currentPage).css({
            "text-decoration": "none",
            "color": "#fff",
            "background": "#4B4B4D",
            "font-weight": "bold"
        });    // 현재 페이지 표시

        $("#paging a").click(function () {
            var $item = $(this);
            var $id = $item.attr("id");
            var selectedPage = $item.text();
            var prepage = $('#nowpage').val();
            if ($id == "next") selectedPage = parseInt(prepage) + 1;
            if ($id == "prev") selectedPage = parseInt(prepage) - 1;
            story_list(selectedPage);
        });
    }

    $("document").ready(function () {
        story_list();
    });


</script>
</body>
</html>