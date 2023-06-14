<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>
.intro_h3{
	font-size: 1.700em;
    line-height: 1.400em;
    color: #5184c3;
    font-weight: 400;
    letter-spacing: -2px;
    margin: 0px 0 0px 0;
}
.right_intro{
	padding:0px 10px 50px 25px;color:#353535;line-height:1.6;font-size: 1.250em;font-weight:400;
}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">공단소개</a></li>
								<li>CEO 인사말</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	
	<!-- Features -->
	<div class="features" >
		<div class="container" >

			<div class="row features_row">	
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>					
				</div>

				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
					<div class="intro-title-image">
						<div class="board-title-caption">
							<h2 >공단소개</h2>
							<span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
						</div>
					</div>
					<div class="notice_title">
						<h2>CEO 인사말</h2>
					</div>
					<div class="notice_table notice-block" >
						<div class="left_intro" >
							<img src="/application/views/common/images/intro.png" style="width:100%;">
						</div>
						<div class="right_intro" >
								<h3 class="intro_h3">
								상식과 원칙을 실천하고 미래를 향하며,<br>
								입주기업에 실질적인 도움을 주는<br> 관리공단으로 변화하는데<br>
								힘을 더하고자 제17대 이사장의 중책을 맡았습니다.</h3>
								<br>
								지난 40여년동안 국가 발전에 이바지해온 성남 하이테크 밸리는 미래로 도약하는 변화와 혁신의 시기에 와있습니다.<br>
								화합하는 혁신산업단지로 산업과 기술 문화가 융합하는 공단을 통하여 입주사와 회원사들에게 실제적 도움이 되도록 하겠습니다.<br>

								창의적인 도전을 하는 하이테크 밸리 기업에 도움이 되는 재생·혁신개발 모델을 만들고, 4차 산업 혁명을 이끌 기반을 다지면서 저성장시대를 극복할 성장 동력을 우리 모두의 힘으로 완수하는 일에 앞장서겠습니다.<br>
								먼저 상생협력을 위하여 입주 기업 간의 교류에서부터 민관 협력교류까지, 보다 많은 기업이 다양한 의견을 주고받는 네트워크를 정착 · 확대하겠습니다.<br>
								이를 위해 입주 기업인들과 관리공단 임직원들의 따뜻한 관심과 도움이 꼭 필요합니다.<br>
								4차 산업 혁명시대에 서로 함께해서 역동적인 변화를 이끌고, 지속적인 성장의 틀을 만들어가는 3년이 되도록 격려하고 꾸짖어주십시오.<br>
								열심히 하겠습니다.<br>
								감사합니다.<br>

						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>
		
	<!-- Footer -->
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>	


</body>
</html>