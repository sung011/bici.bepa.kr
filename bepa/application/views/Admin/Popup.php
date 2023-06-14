<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
$start_date = date("Y-m-d");
?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">

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
							<button type="button" class="btn btn-info btn-pup" onclick="Popup_new();">팝업레이어 추가<i class="fa fa-plus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
								<div class="col-lg-12 snic-search">
									<div class="col-lg-5 sear-box"> 
										 <span >팝업제목</span>
										 <input class='popup-input' type="text" name="p_subject" id="p_subject" value="" >
									</div>
									<div class="col-lg-5 sear-box">
										 <span>접속기기</span>
										 <select class='popup-input' name="p_device" id="p_device">
											<option value="">전체</option>
											<option value="both">PC와 모바일</option>
											<option value="pc">PC</option>
											<option value="mobile">모바일</option>
										</select>
									</div>
							
									<div class="col-lg-9 sear-box">
										<span>납짜검색</span>
										<div class="inline-group" style="float:left;">
											<div class="form-group" style="text-align:left;">
												<input type="text" id="begin_date" name="begin_date" class="form-control"  style="width:20%;display:inline;">
												<input type="text" id="end_date" name="end_date" class="form-control"  style="width:20%;display:inline;">
												<div class="search-btns" style="width:70%;display:inline;">
													<button type="button" onclick="date_modify('1');" class="btn-e btn-e-sm btn-e-default">오늘</button>
													<button type="button" onclick="date_modify('2');" class="btn-e btn-e-sm btn-e-default">어제</button>
													<button type="button" onclick="date_modify('3');" class="btn-e btn-e-sm btn-e-default">이번주</button>											
													<button type="button" onclick="date_modify('4');" class="btn-e btn-e-sm btn-e-default">이번달</button>
													<!--<button type="button" onclick="date_modify('5');" class="btn-e btn-e-sm btn-e-default">지난주</button>
													<button type="button" onclick="date_modify('6');" class="btn-e btn-e-sm btn-e-default">지난달</button>
													-->
												</div>
											</div>
																					
										</div>
									</div>
									<div class="col-lg-2 sear-box">
										<button type="button" class="btn sm dark" onclick="layer_list('1')">검색</button>
									</div>								
								</div>
								<table class="table table-hover" id="notice_table">
									<thead>
										<tr class="tr-th-top">											
											<th>No</th>
											<th>관리</th>											
											<th>제목</th>
											<th>접속기기</th>
											<th>시작일시</th>
											<th>종료일시</th>
											<th>시간</th>
											<th>Left</th>
											<th>Top</th>
											<th>Width</th>
											<th>Height</th>
										</tr>
									</thead>
									<tbody id="layer_listtable">								
															
									</tbody>
									
								</table>
								<div id="paging"></div>
									
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
<script src="<?=base_url('assets/inc/js/admin_ajax.js')?>"></script>
<script src="<?=base_url('assets/inc/js/popup.js')?>"></script>
