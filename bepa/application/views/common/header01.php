<head>
<title>성남산업단지관리공단</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="성남산업단지">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/application/views/common/css/nanumbarungothic.css" />
<link rel="stylesheet" type="text/css" href="/application/views/common/styles/bootstrap4/bootstrap.min.css">
<link href="/application/views/common/plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="/application/views/common/plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="/application/views/common/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="/application/views/common/plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" type="text/css" href="/application/views/common/styles/main_styles.css?ver=4">
<link rel="stylesheet" type="text/css" href="/application/views/common/css/nabis.css">
<link rel="stylesheet" type="text/css" href="/application/views/common/css/tjdska.css?ver=2">
</head>
<style>
#paging {
    position: relative;
    text-align: center;
    padding: 7px;
    margin-top: 30px;
}
.pagination {
    position: relative;
    list-style: none;
    display: inline-block;
    padding: 0;
    margin: 0;
}
.pagination li {
    display: inline;
}
.pagination a {
    display: inline-block;
    font-size: 14px;
    text-decoration: none;
    min-width: 28px;
    height: 28px;
    padding: 0 5px;
    color: #fff;
    border: 1px solid transparent;
    line-height: 26px;
    text-align: center;
    color: #757575;
    position: relative;
    z-index: 1;
}
.search_button i, .shopping_cart i {
    font-size: 16px;
	color: #fff !important;
	padding-top:1px;
}
.main-link{color:#fff;font-weight:bold;}
.main-link:hover{color:#ddd;font-weight:bold;}
</style>
<body>
<div class="super_container">
	<!-- Header -->
	<header class="header">			
		<!-- Top Bar -->
		<div class="top_bar" style="height:35px;">
			<div class="top_bar_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="top_bar_content flex-row align-items-center justify-content-start" style="padding:7px;">
								<div class="flo-right">
									<a href="/Register/Agree" class="top-heada" >회원가입</a>									
								</div>
								<?php
								if($this->session->userdata('mb_id') && $this->session->userdata('mb_name')){
								?>
								<div class="flo-right" >				
									<a href="/Login/LogOut" class="top-heada" >로그아웃</a>
								</div>
								<div class="flo-right" >				
									<a href="/Login/Myinfo" class="top-heada" >정보수정</a>
								</div>
								<?php
								}else{
								?>
								<div class="flo-right" >				
									<a href="/Register/Login" class="top-heada" >로그인</a>
								</div>
								<?php
								}
								?>
								<?php
								if($this->session->userdata('mb_level') =='10'){
								?>
								<div class="flo-right" >				
									<a href="/SuAdmin/" class="top-heada" >관리자</a>
								</div>
								<?php
								}
								?>
								<div class="flo-right search_button" ><i class="fa fa-search" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>				
		</div>

		<!-- Header Content -->
		<div class="header_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_content d-flex flex-row align-items-center justify-content-start" >
							<div class="logo_container">
								<a href="/main">
									<div class="logo_text"><img src="/application/views/common/images/6e78fb0e6e9555e029ba.png"><span></span></div>
								</a>
							</div>
							<nav class="main_nav_contaner ml-auto">
								<ul class="main_nav">
									<li id="header_info" class="active"><a href="#" >알림마당</a></li>
									<li><a href="#">입주안내</a></li>
									<li><a href="#">기업지원</a></li>
									<li><a href="#">단지안내</a></li>
									<li id="header_introduce"><a href="#" >공단소개</a></li>
								</ul>	
								
								<div class="hamburger menu_mm">
									<i class="fa fa-bars menu_mm" aria-hidden="true"></i>
								</div>
							</nav>							
						</div>						
					</div>					
				</div>				
			</div>		
		</div>

		<div class="header_search_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="header_search_content d-flex flex-row align-items-center justify-content-end">
							<form action="/Main/Search" class="header_search_form">
								<input type="search" class="search_input" name="Searval" id="Searval" placeholder="Search" required="required">
								<button class="header_search_button d-flex flex-column align-items-center justify-content-center" onclick="InSearch();">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</div>		
		<div class="gnb_2dep" >
				<div class="container" style="padding:0px;">
				<div class="row">
					<div class="col sub-col" >
						<div class="sub-menu" style="">&nbsp;</div>
						<div class="" style="float:right;">
							<div class="sub-first">							
								<ul class="sub-menu-ul">
									<li><a href="/Info/notice" class="hvr-shutter-in-vertical">공단공지 /교육/ 행사/ 지원안내</a></li>
									<li><a href="/Info/tender" class="hvr-shutter-in-vertical">입찰공고</a></li>
									<li><a href="/Info/hitech" class="hvr-shutter-in-vertical">하이테크보도</a></li>
									<li><a href="/Info/photo" class="hvr-shutter-in-vertical">공단포토뉴스</a></li>
									<li><a href="/Info/media" class="hvr-shutter-in-vertical">기업홍보영상</a></li>
									<li><a href="/Info/story" class="hvr-shutter-in-vertical">기업협업스토리</a></li>
									<li><a href="/Info/job" class="hvr-shutter-in-vertical">채용안내</a></li>
								</ul>	
							</div>
							<div class="sub-two-block">						
								<ul class="sub-menu-ul">
									<li><a href="/Movein/info" class="hvr-shutter-in-vertical">산업단지 입주안내</a></li>
									<li><a href="/Movein/contract" class="hvr-shutter-in-vertical">입주(변경) 계약등</a></li>
									<li><a href="/Movein/status" class="hvr-shutter-in-vertical">입주업체현황</a></li>
									<li><a href="/Movein/book" class="hvr-shutter-in-vertical">민원서식다운로드</a></li>
									<li><a href="/Movein/inquire" class="hvr-shutter-in-vertical">자주하는 질문</a></li>
								</ul>	
							</div>

							<div class="sub-menu1" >						
								<ul class="sub-menu-ul">
									<li><a href="/Support/prefer" class="hvr-shutter-in-vertical">기업사이트 특전</a></li>
									<li><a href="/Support/space" class="hvr-shutter-in-vertical">공간공유서비스</a></li>
									<li><a href="/Support/health" class="hvr-shutter-in-vertical">건강관리서비스</a></li>
									<li><a target="_blank" href="https://aff.g2brating.co.kr/index.html#MENUCM0300?param=snic" class="hvr-shutter-in-vertical">신용평가 서비스</a></li>
								</ul>	
							</div>
							<div class="sub-menu1" >						
								<ul class="sub-menu-ul">
									<li><a href="/Complex/Location" class="hvr-shutter-in-vertical">개요/입지 여건</a></li>
									<li><a href="/Complex/Status" class="hvr-shutter-in-vertical">일반현황</a></li>
									<li><a href="/Complex/Area" class="hvr-shutter-in-vertical">조성면적</a></li>
									<li><a href="/Complex/Map" class="hvr-shutter-in-vertical">공단위치도</a></li>
								</ul>	
							</div>
							<div class="sub-menu2" >						
								<ul class="sub-menu-ul">
									<li><a href="/Introduce/greeting" class="hvr-shutter-in-vertical">CEO 인사말</a></li>
									<li><a href="/Introduce/history" class="hvr-shutter-in-vertical">설립 및 연혁</a></li>
									<li><a href="/Introduce/vision" class="hvr-shutter-in-vertical">비전 및 목표</a></li>
									<li><a href="/Introduce/organize" class="hvr-shutter-in-vertical">조직/기능</a></li>
									<li><a href="/Introduce/load" class="hvr-shutter-in-vertical">찾아오는길</a></li>
								</ul>	
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
	</header>

	<!-- Menu -->

	<div class="menu d-flex flex-column align-items-end justify-content-start text-left menu_mm trans_400">
		<div class="menu_close_container"><div class="menu_close" onclick="closeMenu();"><div></div><div></div></div></div>
		<nav class="menu_nav" style="width:100%">
			<ul class="menu_mm">
				<li class="menu_mm1">
					<a href="#" class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>알림마당</a>
					<ul>
						<li><a href="/Info/notice" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>공단공지 /교육/ 행사/ 지원안내</a></li>
						<li><a href="/Info/tender" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>입찰공고</a></li>
						<li><a href="/Info/hitech" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>하이테크보도</a></li>
						<li><a href="/Info/photo" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>공단포토뉴스</a></li>
						<li><a href="/Info/media" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>기업홍보영상</a></li>
						<li><a href="/Info/story" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>기업협업스토리</a></li>
						<li><a href="/Info/job" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>채용안내</a></li>
					</ul>
				</li>
				<li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>입주안내</a>
					<ul>
						<li><a href="/Movein/info" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>산업단지 입주안내</a></li>
						<li><a href="/Movein/contract" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>입주(변경) 계약등</a></li>
						<li><a href="/Movein/status" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>입주업체현황</a></li>
						<li><a href="/Movein/book" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>민원서식다운로드</a></li>
						<li><a href="/Movein/inquire" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>자주하는 질문</a></li>
					</ul>	
				</li>
				<li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>기업지원</a>
					<ul >
						<li><a href="/Support/prefer" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>기업사이트 특전</a></li>
						<li><a href="/Support/space" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>공간공유서비스</a></li>
						<li><a href="/Support/health" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>건강관리서비스</a></li>
					</ul>
				</li>
				<li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>단지안내</a>
					<ul>
						<li><a href="/Complex/Location" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>개요/입지 여건</a></li>
						<li><a href="/Complex/Status" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>일반현황</a></li>
						<li><a href="/Complex/Area" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>조성면적</a></li>
						<li><a href="/Complex/Map" class="hvr-grow"><i class="fa fa-chevron-right" aria-hidden="true"></i>공단위치도</a></li>
					</ul>				
				</li>
				<li class="menu_mm1"><a href="#"  class="bkind_block"><i class="fa fa-plus-circle first" aria-hidden="true"></i>공단소개</a>
					<ul>
						<li><a href="/Introduce/greeting" class="hvr-grow">CEO 인사말</a></li>
						<li><a href="/Introduce/history" class="hvr-grow">설립 및 연혁</a></li>
						<li><a href="/Introduce/vision" class="hvr-grow">비전 및 목표</a></li>
						<li><a href="/Introduce/organize" class="hvr-grow">조직/기능</a></li>
						<li><a href="/Introduce/load" class="hvr-grow">찾아오는길</a></li>
					</ul>
				</li>			
			</ul>
		</nav>
	</div>
