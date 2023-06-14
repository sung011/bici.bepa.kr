<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
$start_date = date("Y-m-d");
?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">
<style>
.banner_item{
	text-align:center;
	padding:10px;
}
.banner_image{
	border:1px solid #ddd;
	border-radius:5px;
	text-align:center;
}
.banner_body{
	padding:5px;
	font-weight:bold;
}
.btn-write {
    font-size: 13px;
    letter-spacing: 1px;
    border: 1px solid #333;
    background: #fff;
    padding: 5px 5px 5px 5px;
    width: 80px;
}
.banner_subtitle{
	padding-bottom:10px;
}
.banner_button{

}
.pad10{
	position:relative;
	clear:both;
}
.mlaya{
	font-size:14px;
	color:blue;
}
.mlaya2{
	font-size:14px;
	color:red;
}
.table>tbody>tr>td{line-height:2em;}
.sear-box{
	margin:5px;
}
.snic-search span{
	vertical-align: middle;width:120px;float:left;
	background:#585864;
	color:#fff;
	padding:8px;
}

.popup-input {
    font-size: 12px;
    line-height: 1.5;
    font-weight: normal;
    display: block;
    box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 60%;
    height: 35px;
    padding: 6px 10px;
    outline: none;
    border-width: 1px;
    border-style: solid;
    border-radius: 0;
    background: #FFF;
    color: #4B4B4D;
    appearance: normal;
    -moz-appearance: none;
    -webkit-appearance: none;
	
}
.popup-input {
    border-color: #D5D5D5;
    -ms-transition: border-color 0.2s;
    -moz-transition: border-color 0.2s;
    -webkit-transition: border-color 0.2s;
}
.inline-group > p {
    position: relative;
    overflow: hidden;
    display: inline-block;
}


.btn-e-default {
	width:50px;
	height:29px;
    color: #FFF !important;
    background-color: #B5B5B5;
    /*border-color: rgba(0, 0, 0, 0.1);*/
	border:none;
	margin-left: 5px;
	font-size:11px;
}
.btn-pup{
	margin-right:50px;
}
.card, .card-group {
    margin-bottom: 30px;
	background:#ddd;
	border-radius:5px;
}
.card-body {
    flex: 1 1 auto;
    padding: 15px;
}
.meeting-txt{
	background:#fff;
	height:34px;
	padding:6px;
	font-weight:bold;
}
.meetdiv table td{
	text-align:center;
	font-size:12px;
	font-weight:400;
}
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
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">					
						<div class="card">
                            <div class="card-body">
                       
                                <form name="searfrm" method="post" action="<?php  $_SERVER['PHP_SELF']?>">
                                    <div class="form-body">
                                                                      
										<div class="row">
                                            <div class="col-md-2">
                                                <div class="form-group meeting-txt">
                                                    결제일
                                                </div>
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="text" id="start_date" name="start_date" value="<?php echo $start_date;?>" class="form-control"  style="width:15%;display:inline;">
													<input type="text" id="end_date" name="end_date" value="<?php echo $end_date;?>" class="form-control"  style="width:15%;display:inline;">
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
												<button type="button" class="btn sm dark" onclick="msend();" style="width:200px;">검색</button>                                     
											</div>
                                        </div>
                                        
                                    </div>
                              
									<input type="hidden" name="nowpage" id="nowpage">
                                </form>
                            </div>
                        </div>
								
						<div style="clear:both;overflow:auto;width:100%;" class="meetdiv">
								<table class="table table-hover" id="notice_table" style="width:100%;">
									<thead>
										<tr class="tr-th-top">											
											
											<th>결제완료건수</th>											
											<th>결제합계</th>
											<th>무통장</th>
											<th>가상계좌</th>
											<th>계좌이체</th>
											<th>신용카드</th>
											<th>휴대폰</th>
			
										</tr>
									</thead>
									<tbody id="layer_listtable">								
									<?php
									 $tcnt = count($reponseData);
									 if($tcnt > 0){
										foreach($reponseData as $key => $val){	
											$T_price =  number_format($val['T_receipt_price'],0);
									?>
							
										 <tr>	
											<td><?php echo $val['cnt'];?></td>											
											<td><?php echo $T_price;?></td>
											<td><?php echo ($val['bk_payment']=='무통장') ? $T_price : 0;?></td>
											<td><?php echo ($val['bk_payment']=='가상계좌') ? $T_price : 0;?></td>
											<td><?php echo ($val['bk_payment']=='계좌이체') ? $T_price : 0;?></td>
											<td><?php echo ($val['bk_payment']=='신용카드') ? $T_price : 0;?></td>
											<td><?php echo ($val['bk_payment']=='휴대폰') ? $T_price : 0;?></td>		
										 </tr>
									<?php
										}
									 }else{
									 }
									?>
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
<script>

function date_modify(seq){
	var begindate="";
	var enddate="";
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;	
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();

	if(seq == '1'){		
		if(theMonth < 10) theMonth = "0"+theMonth;
		if(theDate < 10) theDate = "0"+theDate;
		var nowDate = theYear + '-' + theMonth + '-' + theDate ;
		begindate = nowDate;
		enddate = nowDate;
	}

	if(seq == '2'){		
		if(theMonth < 10) theMonth = "0"+theMonth;
		
		let theDate = currentDay.getDate() - 1;
		if(theDate < 10) theDate = "0"+theDate;
		var nowDate = theYear + '-' + theMonth + '-' + theDate ;
		begindate = nowDate;
		enddate = nowDate;
	}

	if(seq == '3'){		
		var sDay = new Date(theYear, theMonth, theDate + (0 - theDayOfWeek));
		var syyyy = sDay.getFullYear();
		var smm = Number(sDay.getMonth()) ;
		var sdd = sDay.getDate();
 
		smm = String(smm).length === 1 ? '0' + smm : smm;
		sdd = String(sdd).length === 1 ? '0' + sdd : sdd;
		begindate = syyyy + '-' + smm + '-' + sdd;

		var lDay = new Date(theYear, theMonth, theDate + (6 - theDayOfWeek));
		var lyyyy = lDay.getFullYear();
		var lmm = Number(lDay.getMonth());
		var ldd = lDay.getDate();
 
		lmm = String(lmm).length === 1 ? '0' + lmm : lmm;
		ldd = String(ldd).length === 1 ? '0' + ldd : ldd;
		enddate = lyyyy + '-' + lmm + '-' + ldd;
	}
	if(seq == '4'){		
		var lastDate = new Date(theYear,theMonth,0);
		var lastDay  = lastDate.getDate();
		if(theMonth < 10) theMonth = "0"+theMonth;
		begindate = theYear + '-' + theMonth + '-' + "01";
		enddate = theYear + '-' + theMonth + '-' + lastDay;
	}

	$("#start_date").val(begindate);
	$("#end_date").val(enddate);
}
	
function msend(){
	var frm = document.searfrm;
	frm.submit();
}
</script>