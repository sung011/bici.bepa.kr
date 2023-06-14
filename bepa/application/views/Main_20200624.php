<?php
//print_r($NoticeData);
//exit;
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>

</style>
	<!-- Home -->

	<div class="home" style="margin:0px;">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(/application/views/common/images/snic_slide1.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title"><br><br><br></div>
									<div class="home_slider_subtitle" style="color:#fff;text-shadow: 0px 0px 7px #000;font-size:40px;">
										<strong>
										<span class="line_l1"><span class="line_l2">스타트업 활성화와</span> <span class="line_l2">비즈니스 지원플랫폼으로</span></span>
										<br>
										<span class="line_l1"><span class="line_l2">창업하기 좋은</span> <span class="line_l2">성남하이테크밸리</span></span></strong>
									</div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(/application/views/common/images/snic_slide2.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title"></div>
									<div class="home_slider_subtitle"></div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(/application/views/common/images/snic_slide3.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<div class="col text-center">
									<div class="home_slider_title"><br><br><br></div>
									<div class="home_slider_subtitle"  style="color:#fff;font-size:40px;">
											<strong>
										<span class="line_l1"><span class="line_l2">스타트업 활성화와</span> <span class="line_l2">비즈니스 지원플랫폼으로</span></span>
										<br>
										<span class="line_l1"><span class="line_l2">창업하기 좋은</span> <span class="line_l2">성남하이테크밸리</span></span></strong>
									</div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Home Slider Nav -->

		<div class="home_slider_nav home_slider_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
		<div class="home_slider_nav home_slider_next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
	</div>

	<!-- Features -->

	<div class="features"  style="background:#e9ebee;padding-bottom:0px;">
		<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;">

			<div class="row features_row" style="padding:0px;">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box">				
						<div class="inner">
						  <h3><a href="/Complex/Map" class='main-link'>공단구역<br>상세도</a></h3>					  
						</div>
						<div class="icon">
						  <i class="fa fa-map-o" aria-hidden="true"></i>
						</div>
						<a href="/Complex/Map" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
					</div>				
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box">				
						<div class="inner">
						  <h3><a href="/Complex/Map" class='main-link'>입주업체<br>현황</a></h3>					  
						</div>
						<div class="icon">
						  <i class="fa fa-building-o" aria-hidden="true"></i>
						</div>
						<a href="#" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
					</div>	
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box">				
						<div class="inner">
						  <h3><a href="/Movein/book" class='main-link'>민원서식<br></a></h3>					  
						</div>
						<div class="icon">
						  <i class="fa fa-file-text-o" aria-hidden="true"></i>
						</div>
						<a href="/Movein/book" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
					</div>	
				</div>
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box">				
						<div class="inner">
						  <h3><a href="/Support/space" class='main-link'>공간 공유<br>서비스</a></h3>					  
						</div>
						<div class="icon">
						  <i class="fa fa-object-group" aria-hidden="true"></i>
						</div>
						<a href="/Support/space" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>
					</div>	
				</div>
				<div class="col-lg-6 block_pad" >
					<div class="counter_content" style="padding-top:25px;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">공지/행사/교육</h3>
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" ><a href="/info/notice"><i class="fa fa-plus"></i></a>
								</button>					
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="height:300px;">
								  <ul class="todo-list">
								  <?php
								  if(is_array($NoticeData)){
									  foreach($NoticeData as $key => $val){
								  ?>
									<li>						
										  <span class="text"><a href='/info/read?bo_table=ym_notice&wr_id=<?php echo $wr_id; ?>' class='main-link'><?php echo $val['wr_subject']; ?></a></span>							
										  <small class="label label-danger"></small>
										  <div class="tools" style="text-align:right;">
												<?php echo $val['wr_last']; ?>
										  </div>
									</li>
								  <?php
									  }
									}
								  ?>
									
								  </ul>
							</div>
							<!-- /.box-body -->		
						 </div>	
					</div>
				</div>
				<div class="col-lg-6 block_pad">
					<div class="counter_content"  style="padding-top:25px;">
						<div class="box box-info">
							<div class="box-header with-border">
							  <h3 class="box-title">지원사업안내</h3>
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool"><a href="/info/notice"><i class="fa fa-plus"></i></a>
								</button>								
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="height:300px;">
								<ul class="todo-list2">
								  <?php
								  if(is_array($SupportData)){
									  foreach($SupportData as $key => $val){
								  ?>
									<li>						
										  <span class="text"><a href='/info/read?bo_table=ym_notice&wr_id=<?php echo $wr_id; ?>' ><?php echo $val['wr_subject']; ?></a></span>							
										  <small class="label label-danger"></small>
										  <div class="tools" style="text-align:right;">
												<?php echo $val['wr_last']; ?>
										  </div>
									</li>
								  <?php
									  }
									}
								  ?>
									
								  </ul>
								
							</div>
							<!-- /.box-body -->			
						 </div>	
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Team -->

	<div class="team">
		<!-- <div class="team_background parallax-window" data-parallax="scroll" data-image-src="/application/views/common/images/team_background.jpg" data-speed="0.8"></div>-->
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<h2 class="section_title">포토뉴스</h2>
					
					</div>
				</div>
			</div>
			<div class="row team_row">				
				<!-- Team Item -->
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="/application/views/common/images/sphoto1.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle">Marketing & Management</div>						
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="/application/views/common/images/sphoto2.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle">Marketing & Management</div>						
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="/application/views/common/images/sphoto3.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle">Marketing & Management</div>						
						</div>
					</div>
				</div>
				<div class="col-lg-3 col-md-6 team_col">
					<div class="team_item">
						<div class="team_image"><img src="/application/views/common/images/sphoto4.jpg" alt=""></div>
						<div class="team_body">
							<div class="team_subtitle">Marketing & Management</div>						
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!-- 배너 -->
	<div class="partners" style="border-top:1px solid #eee;">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="partners_slider_container">
						<div class="owl-carousel owl-theme partners_slider">

							<!-- Partner Item -->
							<div class="owl-item partner_item"><img src="/application/views/common/images/banner1.png" alt=""></div>

							<!-- Partner Item -->
							<div class="owl-item partner_item"><img src="/application/views/common/images/banner2.png" alt=""></div>

							<!-- Partner Item -->
							<div class="owl-item partner_item"><img src="/application/views/common/images/banner3.png" alt=""></div>

							<!-- Partner Item -->
							<div class="owl-item partner_item"><img src="/application/views/common/images/banner4.png" alt=""></div>
							<!-- Partner Item -->
							<div class="owl-item partner_item"><img src="/application/views/common/images/banner5.png" alt=""></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 

?>	