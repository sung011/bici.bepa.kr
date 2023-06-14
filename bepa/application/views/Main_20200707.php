<?php
//print_r($NoticeData);
//exit;
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>

.main-link2{
color:#333;
font-weight:700;
text-transform: uppercase;
text-decoration: none;
}
/*
.main-link2:hover{
	text-decoration: underline;
}
*/


[class^="link-"] {
  display: inline-block;
}

/* linkone */
.link-1 a:before, .link-1 a:after {
  content: '';
  border-bottom: solid 2px #1d72c8;
  position: absolute;
  bottom: 0;
  width: 0;
}
.link-1 a:before { left: 0; }
.link-1 a:after { right: 0; }

.link-1 a:hover:before, .link-1 a:hover:after {
  width: 50%;
}

.link-1 a:before, .link-1 a:after {
  -webkit-transition: all 0.2s ease;
          transition: all 0.2s ease;
}
.box-height{
	padding:17px;
}
.box.box-first {
    border-top-color: #2b5bbb;
}
.team_image:hover, .team_image:focus, .team_image:active {
    -webkit-transform: scale(1.1);
    transform: scale(1.1);
    border-radius: 4px;
	transition: all .3s linear;
}
</style>
	<!-- Home -->

	<div class="home" style="margin:0px;">
		<div class="home_slider_container">
			
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" >
						<img src="/application/views/common/images/main_img01.jpg" class="slide-img">
					</div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<!--
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
								-->
							</div>
						</div>
					</div>
				</div>
				<!-- Home Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(/application/views/common/images/main_img02.jpg)"></div>
					<div class="home_slider_content">
						<div class="container">
							<div class="row">
								<!--
								<div class="col text-center">
									<div class="home_slider_title"><br><br><br></div>
									<div class="home_slider_subtitle" style="color:#fff;font-size:40px;">
										<strong>
										<span class="line_l1"><span class="line_l2">일자리 창출과</span> <span class="line_l2">기업성장 지원으로</span></span>
										<br>
										<span class="line_l1"><span class="line_l2">사람과 기업이 행복한</span> <span class="line_l2">성남하이테크밸리</span></span></strong>
									</div>
									<div class="home_slider_form_container">
										
									</div>
								</div>
								-->
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
									<div class="home_slider_subtitle" style="color:#fff;font-size:40px;">
										<strong>
										<span class="line_l1"><span class="line_l2">제조&amp;첨단산업 융합과</span> <span class="line_l2">경쟁력 강화 생태계</span></span>
										<br>
										<span class="line_l1"><span class="line_l2">구축으로 기업하기 좋은</span> <span class="line_l2">성남하이테크밸리</span></span></strong>
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

			<div class="row features_row" style="padding:0px;padding-top:15px;">
				
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box" style="background:#0eb2b0">				
						<div class="inner">
						  <h3><a href="/Complex/Map" class='main-link'>공단구역<br>상세도</a></h3>
						  <p style="color:#fff;">공단구역을 한눈에 볼 수 있습니다.<p/>
						</div>
						<div class="icon">
						  <img src="/application/views/common/images/main_icon01.png">
						</div>
						<!--<a href="/Complex/Map" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>				
				</div>

				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad" >
					<div class="small-box" style="background:#0f92bd">				
						<div class="inner">
						  <h3><a href="/Support/prefer" class='main-link'>스마트 공단<br>공유 플랫폼</a></h3>
						  <p style="color:#fff;">명함관리, 거래처관리를 지원합니다.<p/>
						</div>
						<div class="icon">
							<img src="/application/views/common/images/main_icon02.png">
						 <!-- <i class="fa fa-building-o" aria-hidden="true"></i> -->
						</div>
						 <!-- <a href="/Support/prefer" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>	
				</div>
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box"  style="background:#1d72c8">				
						<div class="inner">
						  <h3><a href="/Movein/book" class='main-link'>민원서식<br>&nbsp;</a></h3>
						  <p style="color:#fff;">필요한 민원서식을 다운받으세요.<p/>
						</div>
						<div class="icon">
						  <img src="/application/views/common/images/main_icon03.png">
						</div>
						 <!-- <a href="/Movein/book" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>	
				</div>
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad">
					<div class="small-box" style="background:#2b5bbb">				
						<div class="inner">
						  <h3><a href="/Support/space" class='main-link'>공간 공유<br>서비스</a></h3>
						  <p style="color:#fff;">회의실예약을 하실 수 있습니다.<p/>
						</div>
						<div class="icon">
						  <img src="/application/views/common/images/main_icon04.png">
						</div>
						<!--<a href="/Support/space" class="small-box-footer">View <i class="fa fa-arrow-circle-right"></i></a>-->
					</div>	
				</div>
				<div class="col-lg-6 block_pad" style="">
					<div class="counter_content" style="padding-top:4px;">
						<div class="box box-first">
							<div class="box-header with-border box-height">
							  <h3 class="box-title">공지/행사/교육</h3>
							  <div class="box-tools pull-right">
								<button type="button" class="btn btn-box-tool" ><a href="/info/notice"><i class="fa fa-plus"></i></a>
								</button>					
							  </div>
							</div>
							<!-- /.box-header -->
							<div class="box-body" style="height:300px;">
								  <ul class="todo-list2">
								  <?php
								  if(is_array($NoticeData)){
									  foreach($NoticeData as $key => $val){
								  ?>
									<li >
										  <div class="link-1" >
											<a href='/info/read?bo_table=ym_notice&wr_id=<?php echo $val['wr_id']; ?>' class='main-link2'><?php echo $val['wr_subject']; ?></a>										 
										  </div>										 										  
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
					<div class="counter_content" style="padding-top:4px;">
						<div class="box box-info">
							<div class="box-header with-border box-height">
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
										  <div class="link-1" >
												<a href='/info/read?bo_table=ym_notice&wr_id=<?php echo $val['wr_id'];?>'  class='main-link2'><?php echo $val['wr_subject']; ?></a>								 
										  </div>													
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
				 <?php
				  if(is_array($PhotoData)){
					  foreach($PhotoData as $key => $val){

						    //$img_tex = explode('{',$val['eb_3']);
							//$img_tex2 =  explode(';',$img_tex[2]);
							//$img_tex3 =  explode(':',$img_tex2[1]);
							//$photo_img = str_replace('"','',$img_tex3[2]);

							$contents = $val['wr_content'];
							preg_match_all("/<img[^>]*src=[\'\"]?([^>\'\"]+)[\'\"]?[^>]*>/", $contents, $matches);
							$photo_img = $matches[1][0];
				  ?>
					<div class="col-lg-3 col-md-6 team_col">
						<div class="team_item">
							<div class="team_image"><img src="<?php echo $photo_img; ?>" alt=""></div>
							<div class="team_body">
								<div class="team_subtitle ellipsis"><?php echo $val['wr_subject']; ?></div>						
							</div>
						</div>
					</div>
				  <?php
					  }
					}
				  ?>
				
				

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
							<?php
							  if(is_array($BannerData)){
								  foreach($BannerData as $key => $val){
							  ?>
								<div class="owl-item partner_item"><img src="/data/file/main_banner/<?php echo $val['bf_file'];?>" alt=""></div>
							  <?php
								  }
								}
							  ?>													
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 

?>	
<?php
if(is_array($PopupData)){
  foreach($PopupData as $key => $val){
?>
<style>
.modal-con img{width:100%;}
</style>
<!-- Modal -->
<div class="modal fade" id="PopupModal"  tabindex="-1"  role="dialog">
  <div class="modal-dialog popup-dialog" >
    <div class="modal-content">
      <div class="modal-header popup-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center;">
			<h2><?php echo $val['nw_subject'];?></h2>
			<div class="modal-con" style="padding:0px;width:750px;">
				<?php echo $val['nw_content'];?>
			</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="Popup_cookie();">24시간 동안 열지 않기</button>
      </div>
    </div>
  </div>
</div>
<script>

function Popup_cookie(){
        setCookieMobile( "todayCookie", "done" , 1);
		//setCookieMobile( "todayCookie", "" , -1);		
        $("#PopupModal").modal('hide');
}

function setCookieMobile ( name, value, expiredays ) {
    var todayDate = new Date();
    todayDate.setDate( todayDate.getDate() + expiredays );
    document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";"   
}
function getCookieMobile () {
    var cookiedata = document.cookie;
    if(cookiedata){
		$("#PopupModal").modal('hide');	
    }
    else {
        $("#PopupModal").modal('show');
    }
}

getCookieMobile();

</script>
<?php
  }
}
?>

