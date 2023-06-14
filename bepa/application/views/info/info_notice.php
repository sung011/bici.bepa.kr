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

a .td-subject {
	color: #106ece !important;
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
					<h2>기업지원사업</h2>
					<!-- Home -->
					<div class="home-sub">
						<div class="breadcrumbs_container">
							<div class="row">
								<div class="col">
									<div class="breadcrumbs">
										<ul>
											<li>알림마당</li>
											<li>기업지원사업</li>
										</ul>
									</div>
								</div>
							</div>
						</div>			
					</div>	
				</div>
				<div class="kind-category">
					<div class="nkindlist">
						<span><p id="ALL" class="active" onclick="notice_list('1', 'ALL', this);">전체 (<?= $Notice_tnum ?>)</p></span>
						<span><p id="ym1" onclick="notice_list('1', 'ym1', this);">공지 (<?= $Notice_nnum ?>)</p></span>
						<span><p id="ym4" onclick="notice_list('1', 'ym4', this);">지원사업안내 (<?= $Support_num ?>)</p></span>
						<span class="fake-span"></span>
					</div>				
				</div>
				<div class="notice_table notice-block2">
					<input type="hidden" id="nowpage" name="nowpage">
					<input type="hidden" id="nkind" name="nkind">
					<div class="snic-search">
						<span>검색</span>
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
					<div style="width: 100%;overflow: auto">
						<table id="notice_table" class="table table-hover mb-3">
							<thead>
								<tr class="tr-th-top">
									<th width="5%">번호</th>
									<th>제목</th>
									<th width="15%">기간</th>
									<th width="5%">구분</th>
									<th width="5%">조회</th>
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
$('input[name=selected_all]').on('change', function () {	
	$('.rmacheck_ship').trigger('click');
});

function notice_list(nowpage, sort, ith) {
	if (sort != 'ALL2') {
		$('.nkindlist span p').removeClass('active');
		$(ith).addClass('active');
	}

	if (!nowpage) { 
		nowpage = '1'; 
	}

	if (sort) {
		$('#nkind').val(sort);
	} else {
		sort = $('#nkind').val();
	}

	var set_content = '';
	var Totalcnt = '';
	var searkey = $('#q_searchKeyTy').val();
	var searkeyword = $('#q_searchVal').val();

	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '/index.php/api/Notice/List',
		data: {
			'ca_name': sort,
			'nowpage': nowpage,
			'searkey': searkey,
			'searkeyword': searkeyword
		},
		cache: false,
		beforeSend: function () {
			$('.nabis-loading').show();
		},
		success: function (json) {
			if (json === 'E500') {
				set_content += '<tr>';
				set_content += '<td colspan="5" class="text-center"><strong>등록된 게시글이 없습니다.</strong></td>';
				set_content += '</tr>';

				if ($('#nkind').val() === 'ALL' || $('#nkind').val() === 'ALL2') {
					$('#ALL').addClass('active');
				} else if ($('#nkind').val() === 'ym1') {
					$('#ym1').addClass('active');
				} else if ($('#nkind').val() === 'ym4') {
					$('#ym4').addClass('active');
				} 

				$('#notice_listtable').html(set_content);	
				
				return false;
			} else { 
				var list_array = json;
			    var set_content = '';

			    if (list_array) {
					for (var i = 0; i < list_array.length; i++) {
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

						if (wr_3 === '공지') {
							var btype = '<span class="ntype ntype_1">' + wr_3 + '</span>';
						} else if (wr_3 === '진행') {
							var btype = '<span class="ntype ntype_2">' + wr_3 + '</span>';
						} else if (wr_3 === '마감') {
							var btype = '<span class="ntype ntype_3">' + wr_3 + '</span>';
						} else {
							var btype = wr_3;
						}
						
						set_content += '<tr>';

					    if (wr_10) {
					    	set_content += '<td class="td-num" style="color: red"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '">공지</a></td>';
							set_content += '<td class="td-subj-wrap"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '"><div class="td-subject ellipsis">';
						} else {
							set_content += '<td class="td-num"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + wr_sno + '</a></td>';
						  	set_content += '<td class="td-subj-wrap"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '"><div class="ellipsis">';
						}

						if (wr_reply) {
						 	set_content += '<span class="reply-indication" style="margin-left: 20px"></span><i class="fa fa-circle margin-right-5"></i>[' + ca_name + ']' + wr_subject + '</div></a></td>';
					  	} else {
						 	set_content += '[' + ca_name + ']' + wr_subject + '</div></a></td>';
					  	}
					
						set_content += '<td class="text-center"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + c_date + '</a></td>';
						set_content += '<td class="text-center"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '">' + btype + '</a></td>';
						set_content += '<td class="td-num"><a href="/index.php/info/read?bo_table=ym_notice&wr_id=' + wr_id + '">'+ wr_hit + '</a></td>';
						set_content += '</tr>';  
					}
				} else {
					set_content += '<tr>';
					set_content += '<td colspan="5" class="text-center"><strong>등록된 게시글이 없습니다.</strong></td>';
					set_content += '</tr>';
				}

				if ($('#nkind').val() === 'ALL' || $('#nkind').val() === 'ALL2') {
					$('#ALL').addClass('active');
				} else if ($('#nkind').val() === 'ym1') {
					$('#ym1').addClass('active');
				} else if ($('#nkind').val() === 'ym4') {
					$('#ym4').addClass('active');
				}

				$('#notice_listtable').html(set_content);	
				$('#Total_num').html(Totalcnt);
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

        notice_list(selectedPage);

        var offset = $('#paging').offset();

		$('html, body').animate({scrollTop: offset.top}, 1000);
    });
}

$('document').ready(function () {
    notice_list('1', 'ALL2');
});
</script>