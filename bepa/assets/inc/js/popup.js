
function Popup_new(){
	location.href="/index.php/SuAdmin/PopupForm";
}
function Popup_del(nid){
	var con_test = confirm("해당 팝업을 삭제하시겠습니까?");
	if(con_test == true){
		 $.ajax({
				type: 'POST',
				dataType: "json",
				url: "/index.php/api/Adm_api/PopupDel",
				data: {
					'wrid':nid,		
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
	}
	else if(con_test == false){
	}	
}


function layer_list(nowpage) {
	   if(!nowpage){ nowpage = '1';}
	   var set_content='';
	   var Totalcnt ="";
	   var p_subject =$("#p_subject").val();
	   var p_device =$("#p_device").val();
	   var begin_date =$("#begin_date").val();
	   var end_date =$("#end_date").val();
	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/SuAdmin/LayerList",
			data: {
				'nowpage':nowpage,
				'p_subject':p_subject,
				'p_device':p_device,
				'begin_date':begin_date,
				'end_date':end_date
			},
			cache: false,
			beforeSend:function(){		
				//$('.nabis-loading').removeClass('display-none');
				//$('.nabis-loading').show();
			},
			success: function(json) {
			  if(json=='E500'){
					set_content +="<tr >";			
					set_content +="<td colspan=\"11\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";				 
					set_content +="</tr >";
					$('#layer_listtable').html(set_content);	
					return false;
			  }else{ 

				  var list_array =  json;
				  var list_total = list_array.length;
			      
				  for(i=0; i < list_total; i++) {
	
					  var nw_id = list_array[i]['nw_id'];
					  var nw_division = list_array[i]['nw_division'];
					  var nw_device = list_array[i]['nw_device'];
					  var nw_begin_time = list_array[i]['nw_begin_time'];
					  var nw_end_time = list_array[i]['nw_end_time'];
					  var nw_disable_hours = list_array[i]['nw_disable_hours'];
					  var nw_left = list_array[i]['nw_left'];
					  var nw_top = list_array[i]['nw_top'];
					  var nw_width = list_array[i]['nw_width'];
					  var nw_height = list_array[i]['nw_height'];
					  var nw_subject = list_array[i]['nw_subject'];
						  Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<tr>";						  
						  set_content +="<td class='td-num'>"+nw_id+"</td>";
						  set_content +="<td class='td-name'><a href='/SuAdmin/PopupForm?nw_id="+nw_id+"' class='mlaya' >수정</a> <span class='mlaya2' onclick=\"Popup_del('"+nw_id+"');\">삭제</span></td>";
						  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'>"+nw_subject+"</div></td>";
						  set_content +="<td class='td-name talign_c'>"+nw_device+"</td>";
						  set_content +="<td class='td-date'>"+nw_begin_time+"</td>";
						  set_content +="<td class='td-date'>"+nw_end_time+"</td>";
						  set_content +="<td class='td-date'>"+nw_disable_hours+"</td>";
						  set_content +="<td class='td-num'>"+nw_left+"</td>";
						  set_content +="<td class='td-num'>"+nw_top+"</td>";	
						  set_content +="<td class='td-num'>"+nw_width+"</td>";	
						  set_content +="<td class='td-num'>"+nw_height+"</td>";	

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
			layer_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	layer_list();
});		