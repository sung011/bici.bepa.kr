$('input[name=ban_all_ck]').on('change', function(){	
	$('.ban_ship').trigger('click');
    //$('.rmacheck_ship').prop('checked', this.checked);
});
function ban_write(){
	location.href="/index.php/SuAdmin/Bwrite";
}

function ban_modify(uniq){
	location.href="/index.php/SuAdmin/Bwrite?wr_id="+uniq;
}
function ban_del(){
    var chk = document.getElementsByName("ban_ck[]");
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
			url: "/index.php/api/Adm_api/BannerDel",
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
function banner_list(nowpage) {

	   if(nowpage){
	   }else{ 
		  nowpage = '1';
	   }
	   var set_content='';
	   var Totalcnt ="";

	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/api/Adm_api/BannerList",
			data: {
				'nowpage':nowpage,
			},
			cache: false,
			beforeSend:function(){		
				//$('.nabis-loading').removeClass('display-none');
				//$('.nabis-loading').show();
			},
			success: function(json) {
			  //alert(json);
			  if(json=='E500'){
			      //alert('데이터 검색을 할 수 없습니다.');
					set_content +="<div >";
					set_content +="<p style=\"text-align:center;\"><strong class=\"color-red\">배너이미지를 등록해주세요.</strong></p>                  ";
					set_content +="</div >";
					$('#notice_listtable').html(set_content);	
					return false;
			  }else{ 
				  var list_array =  json;
				  var list_total = list_array.length;
			      
				  for(i=0; i < list_total; i++) {
	
					  var wr_id = list_array[i]['wr_id'];
					  var wr_subject = list_array[i]['wr_subject'];
					  var wr_content = list_array[i]['wr_content'];
					  var banner_img = list_array[i]['banner_img'];
					  var wr_hit = list_array[i]['wr_hit'];
					  var wr_id = list_array[i]['wr_id'];
					  var wr_sno = list_array[i]['wr_sno'];
					  var wr_link1 = list_array[i]['wr_link1'];
						Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<div class='col-lg-4 col-md-6 team_col' style='float:left;'>";
						  set_content +="<div class='banner_item'>";
						  set_content +="<div class='banner_image'  onclick=\"ban_modify('"+wr_id+"')\">";
						  set_content +="<img src=\"/data/file/main_banner/"+banner_img+"\" style='width:170px;height:60px;'>";
						  set_content +="</div>";
						  set_content +="<div class='banner_body'><div class='banner_subtitle ellipsis' ><input type='checkbox'  class='ban_ship' name='ban_ck[]' value='"+wr_id+"'>&nbsp;<span onclick=\"ban_modify('"+wr_id+"')\">"+wr_subject+"</span></div>";
						  set_content +="<div class='banner_button' ><button type='button' class='btn btn-warning'  onclick=\"ban_modify('"+wr_id+"')\" >수정</button></div></div>";
						  set_content +="</div></div>";						 
							  
				  }	              
				  $('#banner_block').html(set_content);		
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
			banner_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	banner_list();
});