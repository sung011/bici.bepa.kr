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
							<button type="button" class="btn btn-info btn-pup" onclick="Custom_new();">신규회원 추가<i class="fa fa-plus"></i></button>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
								<input type="hidden" name="nowpage" id="nowpage">
								<div class="col-lg-12 snic-search">
									<div class="col-lg-6 sear-box"> 
										 <span >검색어</span>
										 <select class='popup-input' name="searkey" id="searkey" style="width:100px;display:inline;float:left;">
											<option value="mb_name">이름</option>
											<option value="mb_id">아이디</option>
											<option value="mb_nick">닉네임</option>
											<option value="mb_email">이메일</option>
											<option value="mb_tel">전화번호</option>
											<option value="mb_hp">휴대폰번호</option>
										</select>
										 <input class='popup-input' type="text" name="searkeyword" id="searkeyword" value=""  style="width:250px;display:inline;float:left;">
									</div>
									<div class="col-lg-4 sear-box">
										 <span>회원레벨</span>
										 <select class='popup-input' name="mb_level" id="mb_level">
											<option value="">전체</option>
											<option value="1">1레벨</option>
											<option value="2">2레벨</option>
											<option value="3">3레벨</option>
											<option value="4">4레벨</option>
											<option value="5">5레벨</option>
											<option value="6">6레벨</option>
											<option value="7">7레벨</option>
											<option value="8">8레벨</option>
											<option value="9">9레벨</option>
											<option value="10">10레벨</option>
										</select>
									</div>
									<div class="col-lg-6 sear-box" style="text-align:center;">
										 <span>정보공개</span>
										 
										 <div class="radio">
											<label>
											  <input type="radio" name="mb_open" value="" >
											  전체
											</label>
										  </div>
										  <div class="radio">
											<label>
											  <input type="radio" name="mb_open" value="1">
											  예
											</label>
										  </div>
										  <div class="radio">
											<label>
											  <input type="radio" name="mb_open" value="0" >
											  아니오
											</label>
										  </div>									
									</div>
									<div class="col-lg-4 sear-box">
										 <span>메일수신</span>
										  <div class="radio">
											<label>
											  <input type="radio" name="mb_mailling" value="" >
											  전체
											</label>
										  </div>
										  <div class="radio">
											<label>
											  <input type="radio" name="mb_mailling" value="1">
											  예
											</label>
										  </div>
										  <div class="radio">
											<label>
											  <input type="radio" name="mb_mailling" value="0" >
											  아니오
											</label>
										  </div>
				
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
										<button type="button" class="btn sm dark" onclick="custom_list('1')" style="width:100%;">검색</button>
									</div>								
								</div>
								<div class="rows pad10" style="float:left;">
									<div class="col-xs-6" style="float:left;width:50%;">									
										<button type="button" class='btn-write' onclick="custom_del();">선택삭제</button>									
									</div>
									<div class="col-xs-6" style="float:left;width:50%;text-align:right;">	
									</div>							
								</div>
								<div style="clear:both;overflow:auto;width:100%;">
								<table class="table table-hover" id="notice_table" style="min-width:1200px;">
									<thead>
										<tr class="tr-th-top">											
											<th><input type="checkbox" name="selected_all"></th>
											<th>관리</th>											
											<th>아이디</th>
											<th>이름</th>
											<th>닉네임</th>
											<th>권한</th>
											<th>메일인증</th>
											<th>정보공개</th>
											<th>메일수신</th>
											<th>접근차단</th>
											<th>상태</th>
											<th>가입일</th>
											<th>최신로그인</th>
										</tr>
									</thead>
									<tbody id="layer_listtable">								
															
									</tbody>
									
								</table>
								</div>
								<div id="paging"></div>
								<div class="rows pad10">
									<div class="col-xs-6" style="float:left;width:50%;">									
										<button type="button" class='btn-write' onclick="custom_del();">선택삭제</button>									
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
<script src="<?=base_url('assets/inc/js/admin_ajax.js')?>"></script>
<script src="<?=base_url('assets/inc/js/custom.js')?>"></script>
<script>
document.all.sch_room.value="<?php echo $sch_room; ?>";
document.all.start_date.value="<?php echo $start_date; ?>";
document.all.end_date.value="<?php echo $end_date; ?>";
</script>