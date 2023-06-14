
function access_list(nowpage) {
	   if(!nowpage){ nowpage = '1';}
	   var set_content='';
	   var Totalcnt ="";
	   var begin_date =$("#begin_date").val();
	   var end_date =$("#end_date").val();

	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/SuAccess/AccessList",
			data: {
				'nowpage':nowpage,
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
	
					  var vi_id = list_array[i]['vi_id'];
					  var vi_ip = list_array[i]['vi_ip'];
					  var vi_date = list_array[i]['vi_date'];
					  var vi_time = list_array[i]['vi_time'];
					  var vi_referer = list_array[i]['vi_referer'];
					  var os = list_array[i]['os'];
					  var browser = list_array[i]['browser'];	
						  Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<tr>";						  
						  set_content +="<td class='td-name'>"+vi_ip+"</td>";
						  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'>"+vi_referer+"</div></td>";
						  set_content +="<td class='td-name talign_c'>"+browser+"</td>";
						  set_content +="<td class='td-date'>"+os+"</td>";
						  set_content +="<td class='td-date'>"+vi_date+" "+vi_time+"</td>";
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
			access_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	access_list();
});	