<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>
.login-block {
   
	float:left;
	width:60%;
 
	border:1px solid red;
	color:#333;
}
.login-block2{
	
	float:left;
	width:40%;
	height:50vh;
	color:#333;
	background-image: url(/application/views/common/images/login_sidebar_img.jpg);
    position: relative;
    background-repeat: no-repeat;

    background-position: center top;

}
.login-right-img{
    display: block;
    width: 100% ;
    max-width: 100%;
    height: auto;
}
.login-right-img:after {
    content: "";
    position: absolute;
    z-index: 1;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
}
.login-box .login-box-in .login-sidebar-content {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
    padding: 50px 40px 40px;
}
.login-box .login-box-in .login-sidebar-content-title {
    margin-bottom: 20px;
    font-size: 24px;
    font-weight: bold;
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
								<li>로그인</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->

	<div class="features"  style="background:#e9ebee;padding-bottom:0px;">
		<div class="container" style="padding:0px;margin-top:0px;margin-bottom:0px;">

			<div class="row features_row" style="padding:0px;margin:0px;">	
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
					
					<div class="login-block">
	
						<div class="box box-info box-border">
							<form method="post" name="loginfrm">
							<div class="box-body">
								<div class="col-xs-12">
								<div class="form-group" style="width:40%;">
									<label style="display:block;">아이디</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name="Snic_id" id="Snic_id" class="form-control" placeholder="아이디를 입력해주세요.">
									</div>
								</div>
								</div>
								<div class="form-group"  style="width:40%;">
									<label style="display:block;">비밀번호</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" name="Snic_pw" id="Snic_pw" class="form-control" placeholder="비밀번호를 입력해주세요.">
									</div>
								</div>	
								<div style="text-align:center;margin-bottom:50px;">
									<button	id="login_button" type="button" class="btn" style="background:#4b4b4d;color:#fff;font-weight:bold;font-size:15px" >로그인</button>
								</div>
							</div>	
							</form>
						</div>						
					</div>

					<div class="login-block2">
						
						<div class="login-sidebar-content">
                        <div class="login-sidebar-content-title">
                            Welcome
                        </div>
                        <div class="login-sidebar-content-item">
                            성남산업단지관리공단<br>
방문을 환영합니다.<br><br>회원가입 / 로그인 후<br>
다양한 정보를 이용하실 수 있습니다.
                        </div>
                        <div class="login-sidebar-content-item">
                            좋은 시간 되세요.
                        </div>
                    </div>
					</div>


				</div>
			</div>
		</div>
	</div>
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 
?>
<script>

$("#login_button").click(function(){
	var Id = $("#Snic_id").val();
	var Pw = $("#Snic_pw").val();
	var frm = document.loginfrm;

	if(Id ==""){
		alert('아이디를 입력해주세요..');
		return false;
	}
	if(Pw ==""){
		alert('비밀번호를 입력해주세요..');
		return false;
	}
	frm.action="/Login/Userck";
	frm.submit();
});

</script>
</body>
</html>