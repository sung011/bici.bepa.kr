<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
?>
    <section class="content">
      <!-- Small boxes (Stat box) -->
		<div class="row">	
			<div class="col-lg-12 col-xs-12" style="padding:0px;">

				<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
					<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
						
						<div class="box box-success">
							<div class="box-header with-border">
							  <h3 class="box-title"> </h3>

							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
							
							  </div>
							</div>
							<div class="box-body" style="padding:2em;">
								<div class="col-lg-4 col-xs-6">
								  <!-- small box -->
								  <div class="small-box bg-aqua">
									<div class="inner">
									  <h3><?php echo $NowData;?></h3>
									  <p>현재접속자</p>
									</div>
									<div class="icon">
										<i class="fa fa-users" aria-hidden="true"></i>
									</div>
									
								  </div>
								</div>
								<div class="col-lg-4 col-xs-6">
								  <!-- small box -->
								  <div class="small-box bg-green">
									<div class="inner">
									  <h3><?php echo $TodayData;?></h3>

									  <p>오늘방문자</p>
									</div>
									<div class="icon">
									  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
									</div>
									
								  </div>
								</div>
								<div class="col-lg-4 col-xs-6">
								  <!-- small box -->
								  <div class="small-box bg-yellow">
									<div class="inner">
									  <h3><?php echo $BeforeData;?></h3>

									  <p>어제방문자</p>
									</div>
									<div class="icon">
									  <i class="fa fa-user-circle-o" aria-hidden="true"></i>
									</div>
									
								  </div>
								</div>
								<div class="box-footer" style="clear:both;border:1px solid #ddd;">
								  <div class="row">
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block border-right">

										<h5 class="description-header"><?php echo number_format($VisitMax,0);?></h5>
										<p style="height:1px;"></p>
										<span class="description-text">최대방문자</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block border-right">
										<h5 class="description-header"><?php echo number_format($VisitSum,0);?></h5>
										<p style="height:1px;"></p>
										<span class="description-text">전체방문자</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block border-right">
										<h5 class="description-header"><?php echo number_format($NewMember,0);?></h5>
										<p style="height:1px;"></p>
										<span class="description-text">신규회원수</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<!-- /.col -->
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block">
										<h5 class="description-header"><?php echo number_format($SumMember,0);?></h5>
										<p style="height:1px;"></p>
										<span class="description-text">전체회원수</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block">
										<h5 class="description-header"><?php echo $BoardSum;?></h5>
										<p style="height:1px;"></p>
										<span class="description-text">전체게시물</span>
									  </div>
									  <!-- /.description-block -->
									</div>
									<div class="col-sm-2 col-xs-6">
									  <div class="description-block">
										<h5 class="description-header">0</h5>
										<p style="height:1px;"></p>
										<span class="description-text">전체코멘트</span>
									  </div>
									  <!-- /.description-block -->
									</div>
								  </div>
								  <!-- /.row -->
								</div>
		
							</div>
						</div>
					</div>	
				</div>	
				<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
					<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">신규가입회원</h3>

							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
							  <div class="table-responsive">
								<table class="table no-margin">
								  <thead>
								  <tr>
									<th>아이디</th>
									<th>닉네임</th>
									<th>날짜</th>
									
								  </tr>
								  </thead>
								  <tbody>
								   <?php
								  if(is_array($NewMemberList)){
									  foreach($NewMemberList as $key => $val){
								  ?>
									 <tr>
										<td><?php echo $val['mb_id']; ?></td>
										<td><?php echo $val['mb_nick']; ?></td>
										<td><span class="label label-success" style='font-size:13px'><?php echo $val['mb_datetime']; ?></span></td>
										
									  </tr>
								  <?php
									  }
									}
								  ?>								 													 
								  </tbody>
								</table>
							  </div>
							  <!-- /.table-responsive -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer clearfix">
							  <a href="/index.php/SuAdmin/CustomList" class="btn btn-sm btn-info btn-flat pull-left">전체보기</a>
							
							</div>
							<!-- /.box-footer -->
						  </div>
					</div>
				</div>
				<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
					<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">최근게시물</h3>

							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
							  <div class="table-responsive">
								<table class="table no-margin">
								  <thead>
								  <tr>
									<th>제목</th>
									<th>작성자</th>
									<th>날짜</th>
									
								  </tr>
								  </thead>
								  <tbody>
								   <?php
								  if(is_array($BoardList)){
									  foreach($BoardList as $key => $val){
								  ?>
									 <tr>
										<td><?php echo $val['wr_subject']; ?></td>
										<td><?php echo $val['wr_name']; ?></td>
										<td><span class="label label-success" style='font-size:13px'><?php echo $val['wr_datetime']; ?></span></td>
										
									  </tr>
								  <?php
									  }
									}
								  ?>								 													 
								  </tbody>
								</table>
							  </div>
							  <!-- /.table-responsive -->
							</div>
							<!-- /.box-body -->
							<div class="box-footer clearfix">
							  <a href="/index.php/SuAdmin/BoardList" class="btn btn-sm btn-info btn-flat pull-left">전체보기</a>
							
							</div>
							<!-- /.box-footer -->
						  </div>
					</div>
				</div>
				<div class="col-lg-6 group_box_wrap" style="margin:0px;padding:0px;">
					<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">시간별 접속자,회원가입</h3>

							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body" id ="curve_chart">
							  
							</div>
							<!-- /.box-body -->
							<div class="box-footer clearfix">
							  
							
							</div>
							<!-- /.box-footer -->
						</div>
					</div>
				</div>
				<div class="col-lg-6 group_box_wrap" style="margin:0px;padding:0px;">
					<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">브라우저별 접속자 비율</h3>

							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
								</button>
								<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body" id ="piechart_3d">
							  
							</div>
							<!-- /.box-body -->
							<div class="box-footer clearfix">
							  
							
							</div>
							<!-- /.box-footer -->
						</div>
					</div>
				</div>
			</div>
		</div>
      <!-- /.row -->
    </section>
  </div>

 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
google.charts.load("current", {packages:["corechart"]});
$.ajax({
		type: 'POST',
		url: '/index.php/SuAccess/AcUser',
		data: {
			'page':'main',
		},
		cache: false,
		beforeSend:function(){
		},
		success: function(json){
			
			var list_array =  JSON.parse(json);
			google.charts.setOnLoadCallback(drawChart);
			  function drawChart() {
				var data = new google.visualization.DataTable(list_array);		
				var options = {			  
				  curveType: 'function',
				  width:'100%',
				  height:300,
				  legend: { position: 'bottom' },
				  chartArea: {left: 10,right:10}
				};
				var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
				chart.draw(data, options);
			  }
		}
		,complete:function(){
	 
		}
});

$.ajax({
		type: 'POST',
		url: '/index.php/SuAccess/AcBrowser',
		data: {
			'page':'main',
		},
		cache: false,
		beforeSend:function(){
		},
		success: function(json){	
			var list_array =  JSON.parse(json);
			google.charts.setOnLoadCallback(drawChart2);
			  function drawChart2() {
				var data = new google.visualization.DataTable(list_array);			
				 var options = {
				  title: '',
				  pieHole: 0.4,
				  width:'100%',
				  height:300
				};
				var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
				chart.draw(data, options);
			  }
		}
		,complete:function(){
		}
});

      
    </script>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_footer.php'; 
?>