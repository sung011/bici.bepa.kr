<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Lockscreen</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets/inc/bootstrap/dist/css/bootstrap.min.css')?>">
  <!-- Font Awesome -->
  <link href="<?=base_url('assets/plugins/font-awesome-4.7.0/css/font-awesome.min.css')?>" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="<?=base_url('assets/inc/css/AdminLTE.css')?>">

</head>
<style>
.lockscreen-image > i {
    border-radius: 50%;
    width: 70px;
    height: 70px;
	font-size:70px;
}
</style>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <a href="/main"><img src="<?=base_url('assets/images/6e78fb0e6e9555e029ba.png')?>"></a>
  </div>
  <!-- User name -->
  <div class="lockscreen-name"><?php echo $this->session->userdata('mb_name');?> 회원님 안녕하세요</div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <i class="fa fa-user-circle-o" aria-hidden="true"></i>
    </div>
    <!-- /.lockscreen-image -->

    <!-- lockscreen credentials (contains the form) -->
    <div class="lockscreen-credentials">
      <div class="input-group">
        <input type="password" class="form-control" name="snic_pass" id="snic_pass" placeholder="패스워드를 입력해주세요." onkeyup="Enter_ck();">

        <div class="input-group-btn">
          <button type="button" class="btn" onclick="pass_ck();"><i class="fa fa-arrow-right text-muted"></i></button>
        </div>
      </div>
    </div>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
  <div class="help-block text-center">
   비밀번호를 한번 더 입력해주세요.<br>
	
  </div>

  <div class="lockscreen-footer text-center">
    회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다
  </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
<script src="<?=base_url('assets/inc/bootstrap/dist/js/bootstrap.min.js')?>"></script>
<script>
function Enter_ck(){
	 if (window.event.keyCode == 13) {
             // 엔터키가 눌렸을 때 실행할 내용
            pass_ck();
     }
}
function pass_ck(){

	var passck = $("#snic_pass").val();
	if(passck){
	$.ajax({
		type: 'POST',
		dataType: "json",
		url: "/index.php/Login/Passck",
		data: {
			'passck':passck,
		},
		cache: false,
		beforeSend:function(){	
		},
		success: function(json){	

			if(json=="E200"){
				location.href="/index.php/Register/Mod";
			}else{
			  	alert("비밀번호가 틀립니다.");
				return false;
			}
		}
		,complete:function(){	
		
		}
	});
	}else{
		alert("패스워드를 입력해주세요.");
		return false;
	}
}
</script>
</body>
</html>
