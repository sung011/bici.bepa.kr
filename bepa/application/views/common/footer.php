<!-- Footer -->
<style>
.footer_title a{color:#b5b8be;line-height:1.8;}
</style>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(<?=base_url('assets/images/footer_background.png')?>)"></div>
		<div class="container">
			<div class="row footer_row f_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">
							<div class="col-lg-3 footer_col tablet_vr_logo">			
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container"> 
										<a href="#">
											<div class="footer_logo_text"><a href="/main"><img src="<?=base_url('assets/images/6e78fb0e6e9555e02fb2.png')?>"></a></div>
										</a>
									</div>									
								</div>								
							</div>
							<div class="col-lg-9 footer_col tablet_vr">					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">
									<a href="/index.php/Terms/provision">이용약관</a>
									<span>|</span>
									<a href="/index.php/Terms/privacy">개인정보처리방침</a>
									<span>|</span>
									<a href="/index.php/Terms/emailembargo">이메일무단수집거부</a></div>
									<div class="footer_contact_info">
										<ul>
											<li> (우편번호)부산광역시 연제구 중앙대로 1090, 프라임시티 B/D 3,4층 &frasl; Tel : 051-600-1731~3 &frasl; Fax : 051-600-1802 &frasl;</li>
											<li>Copyright &copy; 2021 BEPA all rights reserved.</li>
										</ul>
									</div>
								</div>							
							</div>						
						</div>
					</div>
				</div>
			</div>		
		</div>
	</footer>
</div>

<script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?=base_url('assets/styles/bootstrap4/popper.js')?>"></script>
<script src="<?=base_url('assets/styles/bootstrap4/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/scrollmagic/ScrollMagic.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
<script src="<?=base_url('assets/js/menu.js')?>"></script>
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=eeda10ed03288a39a8e9d7d09d77fe85&libraries=services"></script>

<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/bootstrap-datepicker.kr.js')?>"></script>
<script type="text/javascript" src="<?=base_url('assets/js/common.js')?>"></script>

<script>
function InSearch(){
	var Searval = $("#Searval").val();
	if(Searval){
		location.href="/index.php/Main/Search?Searval="+Searval;
	}else{
		alert("검색어를 입력해주세요.");
		return false;
	}
}
$('.main_nav li a').hover(function() {
  $('.gnb_2dep').show();
}, function(){
  $('.gnb_2dep').hide();
});

$('.gnb_2dep').hover(function() {
  $('.gnb_2dep').show();
}, function(){
  $('.gnb_2dep').hide();
});

</script>