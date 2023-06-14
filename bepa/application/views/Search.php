<?php

$Total_cnt = count($boardlist);

include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
$admin_cert =$this->session->userdata('mb_level');
?>

<link rel="stylesheet" href="/application/views/common/css/table.css"> 
<style>
.margin-bottom-30 {
    margin-bottom: 30px;
	clear:both;
}
.cont-text-bg p {
    padding: 10px;
}
.bg-primary {
    background-color: #034691;
    color: #FFF;
}

.reply-indication {
    display: inline-block;
    width: 7px;
    height: 10px;
    border-left: 1px dotted #b5b5b5;
    border-bottom: 1px dotted #b5b5b5;
}
.margin-right-5 {
    margin-right: 5px;
	color:#fa8d00;
}
.list-unstyled {
    padding-left: 0;
    list-style: none;
}
.search-result-list .result-list > li:first-child {
    border-top: 1px dotted #e5e5e5;
}
.search-result-list .result-list > li {
    padding: 10px 0;
    border-bottom: 1px dotted #e5e5e5;
}
p, li {
    word-break: keep-all;
}
.search-result-list .result-list .result-list-box {
    position: relative;

}
.search-result-list .result-list .result-list-info {
    font-size: 12px;
    color: #959595;
    margin-bottom: 0;
}
.search-result-list .result-list .result-list-info .info-icon {
    width: 17px;
    height: 17px;
    line-height: 17px;
    font-size: 11px;
    text-align: center;
    background: #858585;
    color: #fff;
    margin-right: 2px;
    display: none;
}
.search-result-list .result-list .result-list-info .info-name {
    font-size: 12px;
    color: #353535;
}
.search-result-list .result-list .result-list-image {
    position: absolute;
    overflow: hidden;
    top: 0;
    left: 0;
    width: 100px;
    height: 68px;
}
.search-result-list .result-list .result-list-text.result-list-text-margin {
    margin-left: 115px;
}
.search-result-list .result-list .result-list-text {
    position: relative;
    overflow: hidden;
    height: 68px;
    margin-bottom: 10px;
}
.font-size-12 {
    font-size: 12px;
}
.font-size-18{
	font-size: 18px;
	font-weight:700;
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
								<li>전체검색</li>
								<li> </li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->
	<div class="features">
		<div class="container">

			<div class="row features_row">	

				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >

					<div class="notice_title">
						<h2>전체검색</h2>
					</div>
					

					<div style="padding-left:30px;">
						<input type="hidden" name="nowpage" id="nowpage">
						<div class="cont-text-bg margin-bottom-30">
							<h6 style="padding-bottom:10px;"><strong>입주</strong> 전체검색 결과</h6>
							<p class="bg-primary font-size-12">
								게시판 -<strong> </strong> 개
								<span class="margin-left-5 margin-right-5">/</span>
								
								<span class="pull-right">총 검색수 <?php echo $Total_cnt; ?> </span>
							</p>
						</div>
					
						<section class="search-result-list">   
							<!--
							<h5 style="padding-bottom:10px;">
								<a href="./board.php?bo_table=ym_photo&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=%EC%9E%85%EC%A3%BC&amp;sop=and">
									<strong><i class="fa fa-search"></i> '<u>공단포토뉴스</u>' 게시판 내 결과</strong>
								</a>
							</h5>
							-->
							<ul class="list-unstyled result-list">
								<?php
								if($Total_cnt > 0){
									foreach($boardlist as $key => $val){

										$contents = $val['wr_content'];
										preg_match_all("/<img[^>]*src=[\'\"]?([^>\'\"]+)[\'\"]?[^>]*>/", $contents, $matches);
										$contents2 = strip_tags($val['wr_content']);
								?>
								<li>
									<h6 style="padding-bottom:10px;">
										<a href="/info/read?bo_table=<?php echo $val['bo_table'];?>&wr_id=<?php echo $val['wr_id'];?>" class="font-size-18"><?php echo $val['wr_subject'];?></a>	
									</h6>
									<div class="result-list-box">
										<?php if(isset($matches[1][0])){ ?>
										<div class="result-list-image">
											<a class="search-result-image" href="<?php echo $matches[1][0];?>">
											<img src="<?php echo $matches[1][0];?>" alt="" width="100%;" >                        
											</a>
										</div>
										<?php } ?>
										<div class="result-list-text result-list-text-margin">
											<p class="color-grey font-size-12 margin-bottom-0"><?php echo $contents2;?></p>
										</div>
									</div>
									<div class="result-list-info">
										<span class="info-icon"><i class="fa fa-user-o"></i></span>
										<span class="info-name"><?php echo $val['wr_name'];?></span>
										<span class="info-date">&nbsp;&nbsp;<i class="fa fa-clock-o margin-left-10 margin-right-5"></i><?php echo $val['wr_datetime'];?></span>
									</div>
								</li>
								<?php
									}
								}else{
								?>
								<li style="height:300px;line-height:300px;text-align:center;">
									 검색된 데이터가 없습니다.
								</li>
								<?php
								}
								?>
							</ul>
							<!--
							<div class="text-right margin-top-5 margin-bottom-30">
								<a href="./board.php?bo_table=ym_photo&amp;sfl=wr_subject%7C%7Cwr_content&amp;stx=%EC%9E%85%EC%A3%BC&amp;sop=and" class="btn-e btn-e-dark btn-e-xs">
								'공단포토뉴스' 결과 더보기</a>
							</div>
							-->
						</section>
						<div id="paging"></div>
						
					</div>

				</div>

			</div>
		</div>
	</div>
	
	<!-- Footer -->

<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 

?>
<script>

</script>
</body>
</html>