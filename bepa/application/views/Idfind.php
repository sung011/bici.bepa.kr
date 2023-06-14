<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li>아이디/비밀번호찾기</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->

	<div class="features"  style="background:#e9ebee;padding-bottom:0px;">
		<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;width:700px;">

			<div class="row features_row" style="padding:0px;margin:0px;">	
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="padding-top:10em;padding-bottom:10em;" >
						
	
						<div class="box box-info box-border">
							<div class="box-header" style="border-bottom:1px solid #eee;">
							<?php
							//print_r($data);
							?>
								회원가입 시 등록하신 이메일 주소를 입력해 주세요. 해당 이메일로 아이디와 비밀번호 정보를 보내드립니다.
							</div>
							<form method="post" name="loginfrm">
							<div class="box-body">
								<div class="col-xs-12">
								<div class="form-group">
									<label style="display:block;">E-mail 주소</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="text" name="Snic_email" id="Snic_email" class="form-control form-login" placeholder="이메일을 입력해주세요.">
									</div>
								</div>
								<div class="form-group">
								</div>
								</div>								
								<div style="text-align:center;margin-bottom:50px;">
									<button	id="login_button" type="button" class="btn btn-info btn-block"  style="min-height:41px;" onclick="email_check();">확인</button>
								</div>
							</div>	
							</form>
						</div>						
	
				</div>
			</div>
		</div>
	</div>
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>
<script>
function email_check(){
	var frm = document.loginfrm;
	var formData = new FormData(frm);
	if($("#Snic_email").val()==''){
		alert("이메일을 입력해주세요.");
		return false;
	}
	$.ajax({
		type: 'POST',
		url: '/Form/Email_confirm',
		data: formData,
		cache: false,
		processData: false,
		contentType: false,
		beforeSend:function(){
		},
		success: function(json){
			
		}
		,complete:function(){
				
		}
	});
}
</script>
</body>
</html>