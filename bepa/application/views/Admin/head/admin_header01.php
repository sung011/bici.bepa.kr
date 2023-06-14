<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>성남산업단지관리공단</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/application/views/Admin/inc/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/application/views/common/plugins/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="/application/views/Admin/inc/css/AdminLTE.css">
  <link rel="stylesheet" href="/application/views/Admin/inc/css/skins/_all-skins.css">	
  
  <link rel="stylesheet" type="text/css" href="/application/views/common/css/nabis.css">
  <link rel="stylesheet" type="text/css" href="/application/views/common/css/tjdska.css">
  <link rel="stylesheet" type="text/css" href="/application/views/common/css/table.css">
  <link rel="stylesheet" href="/application/views/Admin/inc/css/admin_style.css">	
</head>

<!-- Bootstrap 3.3.7 -->
<script src="/application/views/common/js/jquery-3.2.1.min.js"></script>
<script src="/application/views/common/js/jquery-ui.min.js"></script>
<script src="/application/views/Admin/inc/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/application/views/Admin/inc/js/adminlte.min.js"></script>
<script src="/application/views/Admin/inc/js/demo.js"></script>
<style>
@font-face { font-family: 'NanumBarunGothic';
src: url('/application/views/common/css/NanumBarunGothic.eot');
src: url('/application/views/common/css/NanumBarunGothic.eot') format('embedded-opentype'),
url('/application/views/common/css/NanumBarunGothic.woff') format('woff');}
html,body{
font-family: 'Nanum Barun Gothic', sans-serif;

}

.treeview a span{font-size:16px;}
.treeview-menu li a {white-space: nowrap;overflow: hidden;text-overflow: ellipsis;font-size:14px;}
.nabis-loading{ /*화면 전체를 어둡게 합니다.*/
    position: fixed;
    left:0;
    right:0;
    top:0;
    bottom:0;
	display:block;
    background: rgba(0,0,0,0.2); /*not in ie */
    filter: progid:DXImageTransform.Microsoft.Gradient(startColorstr='#20000000',endColorstr='#20000000');    /* ie */
}

.nabis-loading div{ /*로딩 이미지*/
	position: fixed;
	top:50%;
	left:50%;
	margin-left: -21px;
	margin-top: -21px;
}
.display-block{display:block;}
.display-none{display:none;}
.company-info{padding:10px !important;}
.company-info2{
    position: relative;
    border: 1px solid #3c3c4c;
    background: #000;
    padding: 10px;
	color: #b8c7ce;
}
.company-li{
	padding:5px 0px 5px 0px;;
	font-size:12px;
}
.top-block-menu{
	position:relative;
	float:left;
	padding:5px;
}
.btn-top-menu{
	height:40px;
	padding:0px;
}
.btn-top-menu a{
	color:#fff;
	margin:0px;
	height:40px;
	padding:10px;
}
.box-stitle{
	font-weight:600;
	font-size:21px !important;
	padding:10px;
}
.top-menu-header{
	background:#585864 !important;
	position:relative;
	height:80px !important;
}
@media (max-width: 768px) {
	.top-menu-header{
		background:#585864 !important;position:relative;
		height:130px !important;
	}
}
.filebox input[type="file"] {
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip:rect(0,0,0,0);
  border: 0;
}

.filebox label {
  display: inline-block;
  padding: 5px;
  color: #fff;
  font-size: 12pt;
  line-height: normal;
  vertical-align: middle;
  background-color: #d9534f;
  cursor: pointer;
  border: 1px solid #d9534f;
  border-bottom-color: #d9534f;
  border-radius: .25em;
  width:100px;
}

/* named upload */
.filebox .upload-name {
  display: inline-block;
  padding: .5em .75em;  /* label의 패딩값과 일치 */
  font-size: 9pt;
  font-family: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #f5f5f5;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
  -webkit-appearance: none; 
  -moz-appearance: none;
  appearance: none;
}
.navbar-full-right{float:right;padding-right:10px;padding:15px;}
.navbar-full-right a{color:#fff;font-weight:bold;padding:10px 15px;}
</style>
<div class="nabis-loading display-none" style="z-index:10000;">
	<div><!-- <img src="/img/loading.gif" /> --></div>
 </div>	
  <script>
  $(function () {
	 var local_menu = jQuery(location).attr('pathname'); 
	 //alert(local_menu);
	 //var lo_menu_array = local_menu.split('/');

	 $('.treeview-menu li a[href="' + local_menu + '"]').parent().addClass('active');
	 $('.treeview-menu li a[href="' + local_menu + '"]').parent().parent().parent().addClass('active');
	   
  });
  </script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <span class="logo-mini"><img src="/application/views/common/images/6e78fb0e6e9555e02fb2.png"></span>
      <span class="logo-lg" style="color:#fff;"><img src="/application/views/common/images/6e78fb0e6e9555e02fb2.png"></span>
    </a>

    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
	  <div class="navbar-full-right">
		<a href="/Main">Home 메인화면</a>

	  </div>

    </nav>
  </header>
  <aside class="main-sidebar">
    <section class="sidebar">
      <!-- Sidebar user panel 
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>이재욱</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
     
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->

      <ul class="sidebar-menu" data-widget="tree">
		<li >&nbsp;</li>
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>설정 및 통계</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/SuAdmin/"><i class="fa fa-circle-o"></i> Dashboard</a></li>
           
			<li><a href="/SuAdmin/Banner"><i class="fa fa-circle-o"></i> 메인배너 관리</a></li>
			<li><a href="/SuAdmin/Organization"><i class="fa fa-circle-o"></i> 조직/기능</a></li>
			<li><a href="/SuAdmin/Location"><i class="fa fa-circle-o"></i> 개요/입지 여건</a></li>
			<li><a href="/SuAdmin/Area"><i class="fa fa-circle-o"></i> 조성면적</a></li>
			<li><a href="/SuAdmin/Status"><i class="fa fa-circle-o"></i> 일반현황</a></li>
			<li><a href="/SuAdmin/Map"><i class="fa fa-circle-o"></i> 공단지도</a></li>

          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>회의실 예약시스템</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
			<li><a href="/Schedule/Meeting"><i class="fa fa-circle-o"></i>예약관리 </a></li>
			<li><a href="/Schedule/Meeting2"><i class="fa fa-circle-o"></i>예약현황 </a></li>     
			<li><a href="/Schedule/Meeting3"><i class="fa fa-circle-o"></i>예약상태관리 </a></li>     
			<li><a href="/Schedule/Meeting4"><i class="fa fa-circle-o"></i>공휴일관리 </a></li>     
            <li><a href="/Schedule/Meeting5"><i class="fa fa-circle-o"></i>결제통계</a></li>
       
          </ul>
        </li>
	
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>환경설정</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!-- <li><a href="/SuAdmin/BasicSetting"><i class="fa fa-circle-o"></i> 기본환경설정</a></li> -->
            <li><a href="/SuAdmin/PopupLayer"><i class="fa fa-circle-o"></i> 팝업레이어관리</a></li>
       
          </ul>
        </li>
		<li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i>
            <span>회원관리</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/SuAdmin/CustomList"><i class="fa fa-circle-o"></i> 회원관리</a></li>
			<li><a href="/SuAdmin/Accessor"><i class="fa fa-circle-o"></i> 접속자집계</a></li>
			<!--<li><a href="/SuAdmin/CumList"><i class="fa fa-circle-o"></i> 접속자검색</a></li>
			<li><a href="/SuAdmin/CumList"><i class="fa fa-circle-o"></i> 접속자로그삭제</a></li>-->
          </ul>
        </li>
        <li class="header">INFORMATION</li>
		<li >&nbsp;</li>
		<li >&nbsp;</li>
		<li class="treeview company-info" >
			<div class="company-info2" >
			
                <div class="company-title">
                    <h4>사업자 정보</h4>
				</div>

                <div class="company-cont">
                    <div class="company-li">
                        <span class="info-left">• 회사명:</span><span class="info-right">성남산업단지관리공단</span>
                    </div>
                    <div class="company-li">
                        <span class="info-left">• 사업자:</span><span class="info-right">129-82-00122</span>
                    </div>
                    <div class="company-li">
                        <span class="info-left">• 대표자명:</span><span class="info-right">성명기</span>
                    </div>
                    <div class="company-li">
                        <span class="info-left">• 전화번호:</span><span class="info-right">031-750-2800</span>
                    </div>
                    <div class="company-li">
                        <span class="info-left">• 팩스번호:</span><span class="info-right">031-750-2819</span>
                    </div>
					<div class="company-li">
                        <span class="info-left">• 책임자:</span><span class="info-right">성명기</span>
                    </div>
                    <div class="company-li">
                        <span class="info-left">• 이메일:</span><span class="info-right">tax8200122@naver.com</span>
                    </div>
                </div>
       
			</div>
		</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header top-menu-header">   
      <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/Schedule/Meeting">회의실 예약시스템</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Banner">메인배너 관리</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Organization">조직/기능</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Location">개요/입지 여건</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Area">조성면적</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Status">일반현황</a></button>
	  </div>
	  <div class="top-block-menu">
		<button type="button" class="btn btn-info btn-top-menu"><a href="/SuAdmin/Map">공단지도</a></button>
	  </div>
    </section>
	<section class="content-header" style="clear:both;">
      <h1>
        <?php echo $Title1; ?>
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> <?php echo $Title1; ?></a></li>
        <li class="active"><?php echo $Title2; ?></li>
      </ol>
    </section>