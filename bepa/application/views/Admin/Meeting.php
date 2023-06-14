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
							<button type="button" class="btn btn-primary " onclick="Meeting_status('1');">선택예약완료</button>
							<button type="button" class="btn btn-danger " onclick="Meeting_status('3');">선택예약취소</button>
							<button type="button" class="btn btn-warning " onclick="Meeting_status('2');">선택예약대기</button>
							<button type="button" class="btn btn-info btn-pup" onclick="Meeting_del();">선택삭제</button>
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>			
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
				
						<div class="card">
                            <div class="card-body">
                               
                                <form name="searfrm">
                                    <div class="form-body">                             
                                        <div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group meeting-txt">
                                                    이용서비스명
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">                                              
													 <select class="form-control" name="sch_room" id="sch_room" style="width:15%;display:inline;">
														<option value="">전체</option>
														<option value="1">대회의실</option>
														<option value="2">소회의실</option>
													</select>
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group meeting-txt">
                                                    검색방법
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <select class="form-control" name="searkey" id="searkey" style="width:15%;display:inline;">
														<option value="bk_name">회사명</option>
														<option value="bk_deposit_name">입금자명</option>
														<option value="bk_hp">연락처</option>
														<option value="bk_email">이메일</option>
														<option value="od_id">예약번호</option>
													</select>
													<input type="text" name="searkeyword" id="searkeyword" class="form-control" style="width:25%;display:inline;">
                                                </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group meeting-txt">
                                                    예약상태
                                                </div>
                                            </div>
                                            <div class="col-md-10">
                                                <div class="form-inline">
													<div class="input-group"   style="background:#fff;height:34px;padding-left:20px;padding-right:20px;line-height:40px;">
														<input type="radio" name="sch_status" value=""> 전체&nbsp;&nbsp;&nbsp;
														<input type="radio" name="sch_status" value="대기"> 대기&nbsp;&nbsp;&nbsp;
														<input type="radio" name="sch_status" value="완료"> 완료&nbsp;&nbsp;&nbsp;
														<input type="radio" name="sch_status" value="취소"> 취소
													</div>
												</div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group meeting-txt">
                                                    예약이용일
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
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
											<div class="col-md-2">
												<button type="button" class="btn sm dark" onclick="room_list('1')" style="width:200px;">검색</button>
											</div>
                                        </div>                                        
                                    </div>                          
									<input type="hidden" name="nowpage" id="nowpage">
                                </form>
                            </div>
                        </div>
								
						<div style="clear:both;overflow:auto;width:100%;" class="meetdiv">
								<table class="table table-hover" id="notice_table" style="min-width:1300px;">
									<thead>
										<tr class="tr-th-top">											
											<th><input type="checkbox" name="selected_all"></th>
											<th>예약번호</th>											
											<th>예약정보</th>
											<th>예약 회사명</th>
											<th>이용요금</th>
											<th>결제상태</th>
											<th>결제방식</th>
											<th>날짜</th>
			
										</tr>
									</thead>
									<tbody id="layer_listtable">								
															
									</tbody>
									
								</table>
						</div>
						<div id="paging"></div>
											
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
<script src="<?=base_url('assets/inc/js/meeting.js')?>"></script>
<script>
</script>