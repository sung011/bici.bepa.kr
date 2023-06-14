<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<link rel="stylesheet" href="/application/views/common/css/support.css">
<link rel="stylesheet" href="/application/views/common/css/table.css">

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
                    <h2 >신규거래처발굴</h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li><a href="index.html">기업지원</a></li>
                                            <li>신규거래처발굴</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
                <div class="kind-category">
                    <div class="nkindlist">
                        <span><p onclick="openPaging('newly');">신설기업 기준</p></span>
                        <span><p onclick="openPaging('integrated');">7백만 기업 기준</p></span>
                        <span><p class="active" onclick="openPaging('around');">KTis 사업장 정보 기준</p></span>
                        <span class="fake-span"></span>
                    </div>				
                </div>
                
					<div class="notice_table notice-block2">
						<?php
						if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
						?>
						<!--<div class="rows pad10">
							<div class="col-xs-6">
							</div>
							<div class="col-xs-6" style="text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>							
						</div>-->
						<?php
						}
						?>
						<div class="snic-search">
							<span>검색</span>
							<div class="snic-select_new">
                                <label for="sido" class="form-control multiple_select">시도</label> 
                                <select name="sido" id="sido">
                                    <option value="">시도</option>
                                </select>

								<label for="gugun" class="form-control multiple_select">구군</label> 
                                <select name="gugun" id="gugun">
                                    <option value="">구군</option>
                                </select>
                                                             
								<label for="main_category" class="form-control multiple_select">업종</label> 
                                <select name="main_category" id="main_category">
                                    <option value="">업종</option>
                                </select>
                                                             
                                
							</div>
							<div class="snic-input">
								<label for="q_searchVal" class="sr-only">검색어 입력</label> <input type="text" placeholder="기업명 검색" name="q_searchVal" id="q_searchVal" value="" >
							</div>
							<button type="button" class="btn sm dark" onclick="notice_list('1')">검색</button>
						</div>
						<input type="hidden" name="nowpage" id="nowpage">
						<input type="hidden" name="nkind" id="nkind">
						<table class="table table-hover" id="notice_table">
							<thead>
								<tr class="tr-th-top" style="text-align:center;">
									<th >번호</th>
									<th >회사명</th>
									<th >전화번호</th>
									<th >지역</th>
									<th >업종</th>
									<th >뉴스</th>
								</tr>
							</thead>
							<tbody id="notice_listtable">
								
							</tbody>
							
						</table>
						<div id="paging"></div>
						<?php
						if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
						?>
						<!--<div class="rows pad10">
							<div class="col-xs-6" style="float:left;width:50%;">
								<button type="button" class='btn-write' onclick="notice_del();">선택삭제</button>
							</div>
							<div class="col-xs-6" style="float:left;width:50%;text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>							
						</div>-->
						<?php
						}
						?>
						

					</div>


            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<form name="bizqfrm" method="post">
    <input type"hidden" name="id" id="id" value="<?php echo $this->session->userdata('mb_email');?>">
    <input type"hidden" name="password" id="password" value="<?php echo $this->session->userdata('mb_oripw');?>">
</form>
<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
?>
<script>
    function openPaging(name) {
        location.href="/Company/"+name;
    }
</script>
</body>
</html>