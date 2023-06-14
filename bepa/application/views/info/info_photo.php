<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
$admin_cert =$this->session->userdata('mb_level');
?>
<style>
.team_body{
padding-left:10px;padding-right:10px;padding-top: 103px;box-shadow: 0px 1px 10px rgba(29,34,47,0.3);
}
.team_subtitle{
	font-weight:600;
}
.team_foot {
    padding: 7px 10px;
    border-left: none;
    color: #959595;
	font-size:11px;
}
.team_item{cursor:pointer;}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li>알림마당</li>
								<li>공단포토뉴스</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<!-- Features -->
	<div class="features" >
		<div class="container">
			<div class="row features_row">	
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>
					
				</div>

				<!-- Features Item -->
				<div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
					<!--
					<div class="board-title-image">
						<div class="board-title-caption">
							<h2 >알림마당</h2>
							<span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
						</div>
					</div>
					-->
					<div class="notice_title">
						<h2>공단포토뉴스</h2>
					</div>
					<div class="notice_table notice-block2">
						<?php
						if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
						?>
						<div class="rows pad10">
							<div class="col-xs-6" style="float:left;width:50%;">
								<button type="button" class='btn-write' onclick="photo_del();">선택삭제</button>
							</div>
							<div class="col-xs-6" style="float:left;width:50%;text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>								
						</div>
						<div class="photo_all" style="clear:both;padding:16px;">
							<input type="checkbox" name="photo_all_ck" id="photo_all_ck"> 현재 페이지 전체선택
						</div>
						<?php
						}
						?>
						<div id="photo_block">
						
						</div>
						<div id="paging" style="clear:both;padding:16px;"></div>
						<?php
						if($this->session->userdata('mb_level')=='10' && $this->session->userdata('mb_id')){
						?>
						<div class="rows pad10">
							<div class="col-xs-6" style="float:left;width:50%;">
								<button type="button" class='btn-write' onclick="photo_del();">선택삭제</button>
							</div>
							<div class="col-xs-6" style="float:left;width:50%;text-align:right;">
								<button type="button" class='btn-write' onclick="notice_write();">글쓰기</button>
							</div>								
						</div>
						<?php
						}
						?>
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
$('input[name=photo_all_ck]').on('change', function(){	
	$('.photo_ship').trigger('click');
    //$('.rmacheck_ship').prop('checked', this.checked);
});
function photo_del(){
    var chk = document.getElementsByName("photo_ck[]");
	var checkCnt = 0;
	var wrid="";
	if(chk.length){
		for(var i = 0; i < chk.length; i++){		
			if(chk[i].checked ==true){//체크박스가 활성화인것중에 전체체크 실행
				checkCnt++;	
				if(wrid){
					wrid += ","+chk[i].value;
				}else{
					wrid += chk[i].value;
				}			
			}
		}
	}
	if(checkCnt){		
	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/api/Photo/PhotoDel",
			data: {
				'wrid':wrid,
			},
			cache: false,
			beforeSend:function(){	
			},
			success: function(json){				
				if(json=="E200"){
					location.reload();
				}else{
					alert("전산장애로 삭제 실패하였습니다.");
				}
			}
			,complete:function(){			 
			}
		});
	
	}else{
		alert("삭제할 리스트를 선택해주세요.");
		return;
	}
	
}
function photo_read(wid){
	location.href = '/info/read?bo_table=<?php echo $bo_table; ?>&wr_id='+wid;
}
function notice_write(){
	location.href = '/info/cwrite?bo_table=<?php echo $bo_table; ?>';
}
function photo_list(nowpage) {
	   if(nowpage){
	   }else{ 
		  nowpage = '1';
	   }
	   var set_content='';
	   var log_content='';
	   var Totalcnt ="";
	   var admin_cert = "<?php echo $admin_cert; ?>";

	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/api/Photo/PhotoList",
			data: {
				'nowpage':nowpage,
			},
			cache: false,
			beforeSend:function(){		
				//$('.nabis-loading').removeClass('display-none');
				$('.nabis-loading').show();
			},
			success: function(json) {
			  //alert(json);
			  if(json=='E500'){
			      //alert('데이터 검색을 할 수 없습니다.');
					set_content +="<tr >";
					set_content +="<td colspan=\"5\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td>                  ";
					set_content +="</tr >";
					$('#notice_listtable').html(set_content);	
					return false;
			  }else{ 
				  var list_array =  json;
				  var list_total = list_array.length;
				  
				  for(i=0; i < list_total; i++) {	
					  var wr_subject = list_array[i]['wr_subject'];
					  var wr_content = list_array[i]['wr_content'];
					  var wr_name = list_array[i]['wr_name'];
					  var wr_datetime = list_array[i]['wr_datetime'];
					  var wr_hit = list_array[i]['wr_hit'];
					  var wr_id = list_array[i]['wr_id'];
					  var wr_sno = list_array[i]['wr_sno'];
					  var photo_img = list_array[i]['photo_img'];
						Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<div class='col-lg-4 col-md-6 team_col' style='float:left;'>";
						  set_content +="<div class='team_item'>";
						  set_content +="<div class='team_image' onclick=\"photo_read('"+wr_id+"')\">";
						  set_content +="<img src=\""+photo_img+"\" >";
						  set_content +="</div>";

						  set_content +="<div class='team_body'><div class='team_subtitle ellipsis' >";
						  if(admin_cert == 10){
						  set_content +="<input type='checkbox'  class='photo_ship' name='photo_ck[]' value='"+wr_id+"'>";
						  }
						  set_content +="&nbsp;<span  onclick=\"photo_read('"+wr_id+"')\">"+wr_subject+"</span></div>";
						  set_content +="<div class='team_foot'><div class='pull-left'><i class='fa fa-clock-o'></i>"+wr_datetime+"</div>";
						  set_content +="<div class='pull-right color-grey'>조회 "+wr_hit+"</div><div class='clearfix'></div>";
						  set_content +="</div></div></div></div>";
						  
						  if(wr_hit=="2749") {
						  log_content +="<div class='col-lg-4 col-md-6 team_col' style='float:left;'>";
						  log_content +="<div class='team_item'>";
						  log_content +="<div class='team_image' onclick=\"photo_read('"+wr_id+"')\">";
						  log_content +="<img src=\""+photo_img+"\" >";
						  log_content +="</div>";

						  log_content +="<div class='team_body'><div class='team_subtitle ellipsis' >";
						  if(admin_cert == 10){
						  log_content +="<input type='checkbox'  class='photo_ship' name='photo_ck[]' value='"+wr_id+"'>";
						  }
						  log_content +="&nbsp;<span  onclick=\"photo_read('"+wr_id+"')\">"+wr_subject+"</span></div>";
						  log_content +="<div class='team_foot'><div class='pull-left'><i class='fa fa-clock-o'></i>"+wr_datetime+"</div>";
						  log_content +="<div class='pull-right color-grey'>조회 "+wr_hit+"</div><div class='clearfix'></div>";
						  log_content +="</div></div></div></div>";						  
						  }
							  
				  }
				  //alert(log_content);
				  $('#photo_block').html(set_content);		
			  }
			}
			,complete:function(){	
					$('#nowpage').val(nowpage);
					//$('.nabis-loading').addClass('display-none');		
					var totalData = Totalcnt;    // 총 데이터 수
					var dataPerPage = 15;    // 한 페이지에 나타낼 데이터 수
					var pageCount = totalData / dataPerPage;
						pageCount = Math.ceil(pageCount);   // 한 화면에 나타낼 페이지 수		     
					var selectedPage = nowpage;
						
					if(totalData > 15){	
						paging(totalData, dataPerPage, pageCount, selectedPage);
					}
			}
	   });
}

function paging(totalData, dataPerPage, pageCount, currentPage){     
        var totalPage = Math.ceil(totalData/dataPerPage);    // 총 페이지 수
        var pageGroup = Math.ceil(currentPage/pageCount);    // 페이지 그룹        

        
        var last = pageGroup * pageCount;    // 화면에 보여질 마지막 페이지 번호
        if(last > totalPage)
            last = totalPage;
        var first = last - (pageCount-1);    // 화면에 보여질 첫번째 페이지 번호
        var next = last+1;
        var prev = first-1;
        
        var $pingingView = $("#paging");        
        var html = "<ul class='pagination'>";        
        //if(prev > 0)
            html += "<li><a href=# id='prev'><</a></li> ";        
        for(var i=first; i <= last; i++){
            html += "<li><a href='#' id=" + i + ">" + i + "</a></li> ";
        }
        //if(last < totalPage){
            html += "<li><a href=# id='next'>></a></li>";
		//}
		html += "</ul>";      
        $("#paging").html(html);    // 페이지 목록 생성
        $("#paging a").css("color", "black");
        $("#paging a#" + currentPage).css({"text-decoration":"none", 
                                           "color":"#fff",
											"background":"#4B4B4D",
                                           "font-weight":"bold"});    // 현재 페이지 표시                                         
        $("#paging a").click(function(){            
            var $item = $(this);
            var $id = $item.attr("id");
            var selectedPage = $item.text(); 
			var prepage = $('#nowpage').val();
			if($id == "next")    selectedPage = parseInt(prepage) + 1;
            if($id == "prev")    selectedPage = parseInt(prepage) - 1;
			photo_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	photo_list();
});	
	

</script>
</body>
</html>