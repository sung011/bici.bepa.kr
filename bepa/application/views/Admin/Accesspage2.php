<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 

?>
<style>

</style>
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
						   <ul class="restab">
								<li class="tablinks" onclick="first_moving();">
									접속자집계
								</li>
								<li id="AcDomain" class="tablinks "  onclick="access_moving('AcDomain');">
									도메인
								</li>
								<li id="AcBrowser" class="tablinks" onclick="access_moving('AcBrowser');">
									브라우저
								</li>
								<li id="AcOs" class="tablinks  " onclick="access_moving('AcOs');">
									운영체제
								</li>
								<li id="AcTime" class="tablinks" onclick="access_moving('AcTime');">
									시간
								</li>
								<li id="AcWeek" class="tablinks " onclick="access_moving('AcWeek');">
									요일
								</li>
								<li id="AcDay" class="tablinks" onclick="access_moving('AcDay');">
									일
								</li>
								<li id="AcMonth" class="tablinks" onclick="access_moving('AcMonth');">
									월
								</li>
								<li id="AcYear" class="tablinks" onclick="access_moving('AcYear');">
									년
								</li>
						  </ul>
						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
								<div class="col-lg-12 snic-search">
															
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
									<input type="hidden" name="nowpage" id="nowpage">
									<div class="col-lg-2 sear-box">
										<button type="button" class="btn sm dark" onclick="access_list('1')" style="width:100%;">검색</button>
									</div>								
								</div>
								<table class="table table-hover" id="notice_table">
									<thead>
										<tr class="tr-th-top">											

											<th><?php echo $firstd; ?></th>											
											<th>그래프</th>
											<th>접속자수</th>
											<th>비율</th>
	
										</tr>
									</thead>
									<tbody id="access_tbody">								
									<?php
									  if(is_array($reponseData)){
										  $j=1;
										  foreach($reponseData as $key => $val){
												$ratio = round($val['cnt'] / $Total_cnt * 100,1);
									  ?>
										 <tr>
							
											<td><?php echo $val['vi_date']; ?></td>
											<td>
											<div class="progress">
											<div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="<?php echo $ratio; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ratio; ?>%">
											  
											</div>
										  </div>
											</td>
											<td><?php echo number_format($val['cnt'],0); ?></td>
											<td><?php echo $ratio; ?>%</td>											
										  </tr>
									  <?php
											$j++;
										  }
										}
									  ?>						
									</tbody>							
								</table>									
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
<script>
$("#<?php echo $sel_page;?>").addClass('active');
function first_moving(){
	location.href="/index.php/SuAdmin/Accessor";
}

function access_moving(mul){
	location.href="/index.php/SuAccess/"+mul;
}
</script>