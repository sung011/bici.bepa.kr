<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>

<link rel="stylesheet" href="/application/views/common/css/table.css"> 
<style>
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li>입주안내</li>
								<li>민원서식 다운로드</li>
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
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>
				</div>

				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
					<!--<div class="movein-title-image">
						<div class="board-title-caption">
							<h2 >입주안내</h2>
							<span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
						</div>
					</div>-->

					<div class="notice_title">
						<h2>자료실</h2>
					</div>
					
					<div class="notice_table notice-block2">
						<div class="rows pad10">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6" style="text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>							
						</div>
						<table class="table table-hover" id="notice_table">
							<thead>
								<tr class="tr-th-top">
									<th class="hidden-md hidden-sm">번호</th>
									<th>제목</th>
									<th class="hidden-xs">작성자</th>
									<th class="hidden-xs">작성일</th>
									<th class="hidden-xs"><a href="/bbs/board.php?bo_table=ym_notice&amp;sop=and&amp;sst=wr_hit&amp;sod=desc&amp;sfl=&amp;stx=&amp;sca=&amp;page=1">조회</a></th>
								</tr>
							</thead>
							<tbody>
								<tr class="board-notice">
									<td colspan="5" style="text-align:center;"><strong class="color-red">게시물이 없습니다.</strong></td>                                 
                                 </tr>	
							</tbody>
							
						</table>
						<div class="rows pad10">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6" style="text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>							
						</div>
						<div><div class="sub-footer">                </div>            </div>
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
	
</script>
</body>
</html>