<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<style>

</style>
<!-- Home -->
<section id="home">
    <div class="container_img">
        <h1 class="welcome_p">Welcome </h1>
        <div class="text_bar">
            <!-- Introduction -->

            <div class="col-md-6 caption">

                <br>
                <h2>
                    부산산업단지 지원시스템<br>방문을 환영합니다.

                </h2>
                <p>회원가입 / 로그인 후 다양한 정보를 이용하실 수 있습니다. 좋은 시간 되세요.</p>

            </div>
        </div>
    </div>
    <div class="container">
        <div class="login-row">

            <!-- Sign Up -->
            <div class="col-md-5 col-md-offset-1">
                <form class="signup-form" name="loginfrm" method="post">
                    <h2 class="text-center">Login</h2>
                    <hr>
                    <div class="form-group">
                        <input type="text" name="Snic_id" id="Snic_id" class="form-control form-login" placeholder="아이디를 입력해주세요." required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" name="Snic_pw" id="Snic_pw" class="form-control form-login" placeholder="비밀번호를 입력해주세요." required="required" onkeyup="Login_ck();">
                    </div>
                    <p style="margin-bottom:10px;">
                        <input type="checkbox" name="auto_login" id="login_auto_login"> 아이디저장</p>
                    <div class="form-group text-center">
                        <button type="button" class="btn btn-blue btn-block" id="login_button" onclick="Login_user();">로그인하기</button>
                    </div>
                    <div class="login-link margin-bottom-10">
                        <a href="/index.php/Register/Agree" style="margin-right:5em;">회원가입</a>
                        <a href="/index.php/Register/IdFind">아이디/비밀번호찾기</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
//include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
?>
<script src="<?=base_url('assets/js/jquery-3.2.1.min.js')?>"></script>
<script src="<?=base_url('assets/styles/bootstrap4/popper.js')?>"></script>
<script src="<?=base_url('assets/styles/bootstrap4/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/js/jquery-ui.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/scrollmagic/ScrollMagic.min.js')?>"></script>
<script src="<?=base_url('assets/plugins/OwlCarousel2-2.2.1/owl.carousel.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
<script src="<?=base_url('assets/js/menu.js')?>"></script>

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

    function Login_ck(){
        if (window.event.keyCode == 13) {
            // 엔터키가 눌렸을 때 실행할 내용
            Login_user();
        }
    }
    function Login_user(){
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
        frm.action="/index.php/Login/Userck";
        frm.submit();
    }

</script>
</body>
</html>