<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 

?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
<style>

</style>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">	
		<div class="col-lg-12 col-xs-12" style="padding:0px;">
	
			<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
				<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
					
					<div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title box-stitle"><?php echo $Title2; ?> </h3>

						  <div class="box-tools pull-right">

							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
								<input type="hidden" name="nowpage" id="nowpage">
								<div class="col-lg-12 snic-search">
									<div class="col-lg-2 sear-box"> 
										<select class="form-control" name="gr_id" id="gr_id" style="display:inline;float:left;">
											<option value="">전체그룹</option>
											<option value="ym">알림마당</option>
											<option value="cs">기업지원서비스</option>
											<option value="ga">입주안내</option>
											<option value="gi">입주업체정보</option>
											<option value="ic">산업단지현황</option>
											
										</select>
									</div>
									<div class="col-lg-2 sear-box">
										<select class="form-control" name="reply" id="reply" style="display:inline;float:left;">
											<option value="">전체게시물</option>
											<option value="w">원문만</option>
											<option value="c">댓글만</option>
										</select>
										
									</div>
									<div class="col-lg-4 sear-box">
									 <input class="form-control" type="text" name="searkeyword" id="searkeyword" value=""  style="display:inline;float:left;">
									</div>
																
									<div class="col-lg-2 sear-box">
										<button type="button" class="btn sm dark" onclick="board_list('1')" style="width:100%;">검색</button>
									</div>								
								</div>
								<div class="rows pad10" style="float:left;">
									<div class="col-xs-6" style="float:left;width:50%;">									
										<button type="button" class='btn-write' onclick="board_del();">선택삭제</button>									
									</div>
									<div class="col-xs-6" style="float:left;width:50%;text-align:right;">	
									</div>							
								</div>
								<div style="clear:both;overflow:auto;width:100%;">
								<table class="table table-hover" id="notice_table" style="">
									<thead>
										<tr class="tr-th-top">											
											<th><input type="checkbox" name="selected_all"></th>
											<th>제목</th>											
											<th>그룹</th>
											<th>게시판</th>
											<th>이름</th>
											<th>일시</th>
										</tr>
									</thead>
									<tbody id="layer_listtable">								
															
									</tbody>
									
								</table>
								</div>
								<div id="paging"></div>
								<div class="rows pad10">
									<div class="col-xs-6" style="float:left;width:50%;">									
										<button type="button" class='btn-write' onclick="board_del();">선택삭제</button>									
									</div>
									<div class="col-xs-6" style="float:left;width:50%;text-align:right;">	
									</div>							
								</div>
									
						</div>
					</div>

				</div>	
			</div>		
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script src="<?=base_url('assets/inc/js/board.js')?>"></script>
