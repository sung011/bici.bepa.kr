<!-- Footer -->
<style>
.footer_title a{color:#b5b8be;line-height:1.8;}
</style>
	<footer class="footer">
		<div class="footer_background" style="background-image:url(/application/views/common/images/footer_background.png)"></div>
		<div class="container">
			<div class="row footer_row">
				<div class="col">
					<div class="footer_content">
						<div class="row">
							<div class="col-lg-3 footer_col">			
								<!-- Footer About -->
								<div class="footer_section footer_about">
									<div class="footer_logo_container">
										<a href="#">
											<div class="footer_logo_text"><a href="/main"><img src="/application/views/common/images/6e78fb0e6e9555e02fb2.png"></a></div>
										</a>
									</div>									
								</div>								
							</div>
							<div class="col-lg-9 footer_col">					
								<!-- Footer Contact -->
								<div class="footer_section footer_contact">
									<div class="footer_title">
									<a href="/Terms/provision">이용약관</a>&nbsp;&nbsp;|&nbsp;&nbsp;
									<a href="/Terms/privacy">개인정보처리방침</a>&nbsp;&nbsp;|&nbsp;&nbsp;
									<a href="/Terms/emailembargo">이메일무단수집거부</a></div>
									<div class="footer_contact_info">
										<ul>
											<li>(13218) 경기 성남시 중원구 둔촌대로457번길 8 11층 (상대원동)   TEL. 031-750-2800   FAX. 031-750-2819</li>
											<li>© 성남산업단지관리공단 2019 All RIGHT RESERVED.</li>
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

<script src="/application/views/common/js/jquery-3.2.1.min.js"></script>
<script src="/application/views/common/styles/bootstrap4/popper.js"></script>
<script src="/application/views/common/styles/bootstrap4/bootstrap.min.js"></script>
<script src="/application/views/common/js/jquery-ui.min.js"></script>
<script src="/application/views/common/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/application/views/common/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/application/views/common/js/custom.js"></script>
<script src="/application/views/common/js/menu.js"></script>


<script>
function InSearch(){
	var Searval = $("#Searval").val();
	if(Searval){
		location.href="/Main/Search?Searval="+Searval;
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
</body>
</html>
