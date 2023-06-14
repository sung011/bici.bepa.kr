<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
?>
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
						  <h3 class="box-title box-stitle">배너 등록 </h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
						
								<div class="rows pad10">
									<div class="col-xs-6" style="float:left;width:50%;">
										<button type="button" class='btn-write' onclick="ban_del();">선택삭제</button>
									</div>
									<div class="col-xs-6" style="float:left;width:50%;text-align:right;">
										<button type="button" class='btn-write' onclick="ban_write();">등록</button>
									</div>							
								</div>
								<div class="banner_all" style="clear:both;padding:16px;">
									<input type="checkbox" name="ban_all_ck" id="ban_all_ck"> 현재 페이지 전체선택
								</div>
								<div id="banner_block" style="clear:both;padding-top:20px;padding-bottom:20px;">
								
								</div>
								<div id="paging"></div>
								<div class="rows pad10">
									<div class="col-xs-6" style="float:left;width:50%;">
										<button type="button" class='btn-write' onclick="ban_del();">선택삭제</button>
									</div>
									<div class="col-xs-6" style="float:left;width:50%;text-align:right;">
										<button type="button" class='btn-write' onclick="ban_write();">등록</button>
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
<script src="<?=base_url('assets/inc/js/banner.js')?>"></script>
<script>

</script>
