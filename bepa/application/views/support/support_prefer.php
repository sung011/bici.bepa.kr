<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>


	
	<!-- Features -->
	<div class="features" >
		<div class="container" >

			<div class="row features_row sub_feat_row" >	
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>			
				</div>

				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;">
			


					<div class="notice_title">
						<h2 >스마트공단 공유플랫폼</h2>
						<!-- Home -->
						<div class="home-sub">
							<div class="breadcrumbs_container">
								<div class="row">
									<div class="col">
										<div class="breadcrumbs">
											<ul>
												<li><a href="index.html">기업지원</a></li>
												<li>스마트공단 공유플랫폼</li>
											</ul>
										</div>
									</div>
								</div>
							</div>			
						</div>
					</div>
					<!--
					
					-->
					<?php
					if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
					?>
					<div class="col-12">
						<div class="section-heading">
							<h3>기업경영에 필요한 모든 기능을 내 손 안에서 해결하세요.</h3>
						</div>
						<div class="features-item">
							<div class="features-icon">
								<img class="nabs-img" src="<?=base_url('assets/images/main_img04.jpg')?>" alt="" style="width:100%;">
							</div>
						</div>
						<div class="col-12" style="text-align:center;padding:10px;">
						<button type="button" class="btn btn-primary" style="height:50px;cursor:pointer" onclick="bziq_moving();">시작하기 <i class="fa fa-arrow-right" aria-hidden="true"></i></button>
						</div>
					</div>
					<div class="col-12" >
						<div style="text-align:center;font-szie:15px;font-weight:bold;padding:20px 0;font-size:17px;color:#106ece;">
							기존 회원 중 이용이 안되실 경우 개인정보 수정에서 입주사,이메일,휴대폰 번호를 등록해주세요.
						</div>
					</div>
					<?php
					}else{
					?>
					<div class="notice_table notice-block2" >
						<div style="text-align:center;min-height:300px;line-height:300px;font-szie:15px;font-weight:bold;font-size:17px;">
							로그인 후 이용하실 수 있습니다.
						</div>
					</div>
					<?php
					}
					?>
				</div>	
			</div>
		</div>
	</div>

<!-- Footer -->
<form name="bizqfrm" method="post">
<input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata('mb_email');?>">
<input type="hidden" name="password" id="password" value="<?php echo $this->session->userdata('mb_oripw');?>">
</form>
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>

<script>
function bziq_moving(){
	<?php
	if($this->session->userdata('mb_email') && $this->session->userdata('mb_oripw')){
	?>
		var frm = document.bizqfrm;
        console.log(frm);
		frm.action="http://nabis.bizq.kr/membership/login_action_snic";
		frm.target = "_blank";
        frm.submit();
		//location.href="http://test.bizq.kr/membership/login_action?id="+mb_id+"&password="+mb_password;		
	<?php
	}else{
	?>
		alert("기업전용사이트를 이용 하실 수 없습니다.");
		return false;
	<?php
	}
	?>
}
</script>
</body>
</html>