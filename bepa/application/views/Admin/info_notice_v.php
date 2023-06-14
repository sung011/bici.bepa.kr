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
                            <div class="kind-category">
								<div class="nkindlist">
									<span><p class="active" onclick="notice_list('1', 'ALL', this);">전체 (<?php echo $Notice_tnum; ?>)</p></span>
									<span><p onclick="notice_list('1', 'ym1', this);">공지 (<?php echo $Notice_nnum; ?>)</p></span>
									<span><p onclick="notice_list('1', 'ym4', this);">지원사업안내 (<?php echo $Support_num; ?>)</p></span>
									<span class="fake-span"></span>
								</div>				
							</div>
                            <div class="box-body" style="min-height: 70vh;padding: 1em">
                                <input type="hidden" id="nowpage" name="nowpage">
                                <div class="snic-search">
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
                                    <button type="button" class="btn sm dark" onclick="notice_list('1');">검색</button>
                                </div>   
                                <div class="rows pad10" style="float: left">
                                    <div class="col-xs-6" style="width: 50%;float: left">                                  
                                        <button type="button" class="btn-write" onclick="notice_del();">선택삭제</button>                              
                                    </div>
                                    <div class="col-xs-6" style="width: 50%;float: left;text-align: right">   
                                    </div>                          
                                </div>
                                <div style="width: 100%;overflow: auto;clear: both">
                                	<input type="hidden" id="nowpage" name="nowpage">
									<input type="hidden" id="nkind" name="nkind">
                                    <table id="notice_table" class="table table-hover" style="min-width: 1200px">
                                        <thead>
                                            <tr class="tr-th-top">                                     
                                                <th><input type="checkbox" name="selected_all"></th>                    
                                                <th class="hidden-sm hidden-md">번호</th>
                                                <th>제목</th>
												<th>기간</th>
												<th>구분</th>
												<th>조회</th>
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
                    wrid += "," + chk[i].value;
                } else {
                    wrid += chk[i].value;
                }
            }
        }
    }

    if (checkCnt) {
        var con_test = confirm('해당 게시글을 삭제하시겠습니까?');
		var arr = new Array();
		var notice_type = '<?php echo $type?>';
		arr = {'complex_idx' : wr_id, 'notice_type': notice_type};
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
						$.ajax({
							type: 'POST',
							//url: 'http://api.nabs.kr/api/v1/association/notice/delete',
							url: 'http://api.nabs.kr/api/v1/association/notice/delete?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
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
								location.reload();
							}
						})

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
    location.href = '/index.php/SuAdmin/nwrite?bo_table=<?php echo $bo_table; ?>'; 
}

function notice_list(nowpage, sort, ith) {
	if (sort !='ALL2') {
		$('.nkindlist span p').removeClass('active');
		$(ith).addClass('active');
	}

	if (!nowpage) { nowpage = '1'; }
	
	if (sort) {
		$('#nkind').val(sort);
	} else {
		sort = $('#nkind').val();
	}

	var Totalcnt = '';
	var searkey = $('#q_searchKeyTy').val();
	var searkeyword = $('#q_searchVal').val();

    console.log('sort: ' + sort);
    console.log('nowpage: ' + nowpage);
    console.log('searkey: ' + searkey);
    console.log('searkeyword: ' + searkeyword);
	   
    $.ajax({
		type: 'POST',
		dataType: 'json',
		url: '/index.php/admin/api/Notice/List',
		data: {
			'ca_name': sort,
			'nowpage': nowpage,
			'searkey': searkey,
			'searkeyword': searkeyword

		},
		cache: false,
		beforeSend: function () {
			// $('.nabis-loading').show();
		},
		success: function (json) {
		  // alert(json);
		    if (json == 'E500') {
				set_content += '<tr>';
				set_content += '<td colspan="6" style="text-align: center"><strong class="color-red">게시물이 없습니다.</strong></td>';
				set_content += '</tr>';
				$('#notice_listtable').html(set_content);	
				return false;
		  	} else { 
			  	// var list_array = JSON.parse(json);
			    var list_array = json;
			    var list_total = list_array.length;
		        var set_content = '';

			    for (i = 0; i < list_total; i++) {
				    var wr_subject = list_array[i]['wr_subject'];
				    var wr_1 = list_array[i]['wr_1'];
				  	var wr_2 = list_array[i]['wr_2'];
				  	var wr_3 = list_array[i]['wr_3'];
				  	var wr_hit = list_array[i]['wr_hit'];
				  	var ca_name = list_array[i]['ca_name'];
				  	var wr_id = list_array[i]['wr_id'];
				  	var wr_sno = list_array[i]['wr_sno'];
				  	var wr_10 = list_array[i]['wr_10'];
				  	var wr_reply = list_array[i]['wr_reply'];
					Totalcnt = list_array[i]['Totalcnt'];

				    if (wr_2) {
				 		var c_date = wr_1 + ' ~ <br>' + wr_2;
				    } else {
				 	    var c_date = wr_1;
				    }

					if (wr_3 == '공지') {
						var btype = '<span class="ntype ntype_1">' + wr_3 + '</span>';
					} else if (wr_3 == '진행') {
						var btype = '<span class="ntype ntype_2">' + wr_3 + '</span>';
					} else if (wr_3 == '마감') {
						var btype = '<span class="ntype ntype_3">' + wr_3 + '</span>';
					} else {
						var btype = wr_3;
					}
					
					set_content += '<tr>';	 
					set_content += '<td style="text-align: center"><input type="checkbox" id="rma_ship_' + i + '" name="rma_ship[]" class="rmacheck_ship" value="' + wr_id + '"></td>';

					if (wr_10) {
						set_content += '<td class="td-num" style="color: red"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '">공지</a></td>';
						set_content += '<td class="td-subj-wrap"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '"><div class="td-subject ellipsis">';
					} else {
						set_content += '<td class="td-num"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + wr_sno + '</a></td>';
					  	set_content += '<td class="td-subj-wrap"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '"><div class="ellipsis">';
					}

					if (wr_reply) {
					 	set_content += '<span class="reply-indication" style="margin-left: 20px"></span><i class="fa fa-circle margin-right-5"></i>[' + ca_name + ']' + wr_subject + '</div></a></td>';
				  	} else {
					 	set_content += '[' + ca_name + ']' + wr_subject + '</div></a></td>';
				  	}
					
				  	set_content += '<td class="text-center"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + c_date + '</a></td>';
					set_content += '<td class="text-center"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + btype + '</a></td>';
					set_content += '<td class="td-num"><a href="/index.php/SuAdmin/read?bo_table=ym_notice&wr_id=' + wr_id + '">'+ wr_hit + '</a></td>';
					set_content += '</tr>';	
				}

				$('#notice_listtable').html(set_content);	
				$('#Total_num').html(Totalcnt);		
			}
		}
		, complete: function () {				
			// $('.nabis-loading').fadeOut();
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
        notice_list(selectedPage);
        var offset = $('#paging').offset();
		$('html, body').animate({scrollTop: offset.top}, 1000);
    });
}

$('document').ready(function () {
    notice_list('1', 'ALL2');
});
</script>
</body>
</html>
