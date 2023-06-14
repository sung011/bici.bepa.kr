$('input[name=selected_all]').on('change', function(){	
	$('.board_check').trigger('click');
    //$('.rmacheck_ship').prop('checked', this.checked);
});

function Board_back(){
	location.href="/index.php/SuAdmin/BoardList";
}

function board_del(){
    var chk = document.getElementsByName("board_ch[]");
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
	
	   var con_test = confirm("해당 게시판을 삭제하시겠습니까?");
		if(con_test == true){
		   $.ajax({
				type: 'POST',
				dataType: "json",
				url: "/index.php/SuAccess/BoardDel",
				data: {
					'wval':wrid,
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
		}
	
	}else{
		alert("삭제할 리스트를 선택해주세요.");
		return;
	}
}

function board_list(nowpage) {
	   if(!nowpage){ nowpage = '1';}
	   var set_content='';
	   var Totalcnt ="";
	   var reply = $("#reply").val();
	   var gr_id = $("#gr_id").val();
	   var searkeyword = $("#searkeyword").val();

	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/SuAccess/BoardSearch",
			data: {
				'nowpage':nowpage,
				'gr_id':gr_id,
				'reply':reply,
				'searkeyword':searkeyword
			},
			cache: false,
			beforeSend:function(){		
				//$('.nabis-loading').removeClass('display-none');
				//$('.nabis-loading').show();
			},
			success: function(json) {
			  if(json=='E500'){
					set_content +="<tr >";			
					set_content +="<td colspan=\"13\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";				 
					set_content +="</tr >";
					$('#layer_listtable').html(set_content);	
					return false;
			  }else{ 

				  var list_array =  json;
				  var list_total = list_array.length;
			      
				  for(i=0; i < list_total; i++) {
	
					  var wgu = list_array[i]['wgu'];
					  var bo_table = list_array[i]['bo_table'];
					  var btable = list_array[i]['btable'];
					  var bo_subject = list_array[i]['bo_subject'];
					  var gr_id = list_array[i]['gr_id'];
					  var wr_id = list_array[i]['wr_id'];
					  var wr_subject = list_array[i]['wr_subject'];
					  var wr_name = list_array[i]['wr_name'];
					  var wr_datetime = list_array[i]['wr_datetime'];
						  Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<tr>";	
						  set_content +="<td style='text-align:center;'><input type='checkbox' class='board_check' id='board_s_"+i+"' name='board_ch[]' value='"+wr_id+"|"+bo_table+"' ></td>";
						  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'><a href='/index.php/info/read?bo_table="+bo_table+"&wr_id="+wr_id+"' class='mlaya' >"+wr_subject+"</a></div> </td>";
						  set_content +="<td class='td-num'>"+wgu+"</td>";			  
						  set_content +="<td class='td-subj-wrap'><div class='ellipsis'><a href='/index.php/info/"+btable+"' class='mlaya' >"+bo_subject+"</a></div></td>";
						  set_content +="<td class='td-name talign_c'>"+wr_name+"</td>";
						  set_content +="<td class='td-date'>"+wr_datetime+"</td>";	
						  set_content +="</tr>";		  
				  }	              
				  $('#layer_listtable').html(set_content);		
			  }
			}
			,complete:function(){	
					$('#nowpage').val(nowpage);
					//$('.nabis-loading').addClass('display-none');		
					var totalData = Totalcnt;    // 총 데이터 수
					var dataPerPage = 15;    // 한 페이지에 나타낼 데이터 수
					var pageCount = totalData / dataPerPage;
						pageCount = Math.ceil(pageCount);   // 한 화면에 나타낼 페이지 수	
						if(pageCount > 10) pageCount= 10;
					var selectedPage = nowpage;
						
					//if(totalData > 15){	
						paging(totalData, dataPerPage, pageCount, selectedPage);
					//}
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
			//alert(selectedPage);
			board_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	board_list();
});		