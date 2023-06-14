<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

<link rel="stylesheet" href="/assets/css/complex.css">

</style>
<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
                ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
                <!--
                <div class="board-title-image">
                    <div class="board-title-caption">
                        <h2 >단지안내</h2>
                        <span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
                    </div>
                </div>
                -->

                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>부산 산업 단지 정보</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table notice-block2">

                    <input type="hidden" name="nowpage" id="nowpage">
                    <div class="snic-search">
                        <span>검색</span>
                        <div class="snic-select">
                            <label for="q_searchKeyTy" class="sr-only">검색조건</label>
                            <select name="q_searchKeyTy" id="q_searchKeyTy">
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
                        <!--<div class="snic-input">
                            <label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text"
                                                                                           name="q_searchVal"
                                                                                           id="q_searchVal" value="">
                        </div>-->
                        <button type="button" class="btn sm dark" onclick="story_list('1')">검색</button>
                    </div>
					<span style="color:red;font-weight:400;padding-top:0px;">※ 산업단지 내 입주기업체를 검색조건(업체명, 업종명, 생산품)을 선택하여 검색할 수 있습니다.</span>
                    <table id="notice_table" class="table table-hover">
                        <colgroup>
                            <col width="22%" class="text-left">
                            <col width="18%">
                            <col>
                            <col>
                            <col width="8%">
                        </colgroup>
                        <tbody id="notice_listtable">

                        </tbody>

                    </table>
                    <div id="paging"></div>
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
    function story_list(nowpage){
        if (!nowpage) {
            nowpage = '1';
        }
        var set_content = '';
        var Totalcnt = "";
        var searkey = $("#q_searchKeyTy").val();
        var searkeyword = $("#q_searchVal").val();
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
                //console.log(json);
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
                        var ins_name = list_array[i]['ins_name'];
                        var inc_nam = list_array[i]['inc_nam'];
                        var new_add = list_array[i]['new_add'];
                        var tel_num = list_array[i]['tel_num'];
                        var cpx_num = list_array[i]['cpx_num'];
                        var repp_spc = list_array[i]['repp_spc'];
                        Totalcnt = list_array[i]['Totalcnt'];
                        set_content += "<tr >";
                        set_content += "<td colspan=\"5\" style='border-top: solid 1px #14bdee;font-weight:900;font-size:16px;'>" + inc_nam + "</td>";
                        set_content += "</tr >";
                        set_content += "<tr >";
                        set_content += "<td class='td-num' style='text-align:left;'><a>산업단지명 : " + ins_name + "</a></td>";
                        set_content += "<td class='td-num'><a>전화번호 : " + tel_num + "</a></td>";
                        set_content += "<td class='td-num'><a>주소 : " + new_add + "</a></td>";
                        set_content += "<td class='td-num'><a>대표업종 : " + repp_spc + "</a></td>";
                        set_content += "<td class='td-num'><a href='/index.php/Movein/status?company="+cpx_num+"' >상세보기</a></td>";
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


</script>
</body>
</html>