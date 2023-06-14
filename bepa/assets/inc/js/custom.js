$('input[name=selected_all]').on('change', function(){	
	$('.cuscheck_ship').trigger('click');
    //$('.rmacheck_ship').prop('checked', this.checked);
});

function Custom_new(){
	location.href="/index.php/SuAdmin/CustomForm";
}

function custom_del(){
    var chk = document.getElementsByName("cus_ship[]");
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
	   var con_test = confirm("해당 회원을 삭제하시겠습니까?");
		if(con_test == true){
		   $.ajax({
				type: 'POST',
				dataType: "json",
				url: "/index.php/api/Adm_api/CustomDel",
				data: {
					'mb_no':wrid,
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

function custom_list(nowpage) {
	   if(!nowpage){ nowpage = '1';}
	   var set_content='';
	   var Totalcnt ="";
	   var searkey = $("#searkey").val();
	   var searkeyword = $("#searkeyword").val();
	   var mb_level = $("#mb_level").val();
	   var mb_open = $("#mb_open").val();
	   var mb_mailling = $("#mb_mailling").val();
	   var begin_date = $("#begin_date").val();
	   var end_date = $("#end_date").val();

	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/SuAdmin/CustomSearch",
			data: {
				'nowpage':nowpage,
				'searkey':searkey,
				'searkeyword':searkeyword,
				'mb_level':mb_level,
				'mb_open':mb_open,
				'mb_mailling':mb_mailling,
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
					set_content +="<td colspan=\"13\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";				 
					set_content +="</tr >";
					$('#layer_listtable').html(set_content);	
					return false;
			  }else{ 

				  var list_array =  json;
				  var list_total = list_array.length;
			      
				  for(i=0; i < list_total; i++) {
	
					  var mb_no = list_array[i]['mb_no'];
					  var mb_id = list_array[i]['mb_id'];
					  var mb_name = list_array[i]['mb_name'];
					  var mb_nick = list_array[i]['mb_nick'];
					  var mb_level = list_array[i]['mb_level'];
					  var mb_email = list_array[i]['mb_email'];
					  var mb_email_certify = list_array[i]['mb_email_certify'];
					  var mb_mailling = list_array[i]['mb_mailling'];
					  var mb_sms = list_array[i]['mb_sms'];
					  var mb_open = list_array[i]['mb_open'];
					  var mb_today_login = list_array[i]['mb_today_login'];
					  var mb_datetime = list_array[i]['mb_datetime'];
					  var mb_leave_date = list_array[i]['mb_leave_date'];
						  Totalcnt = list_array[i]['Totalcnt'];

						  set_content +="<tr>";	
						  set_content +="<td style='text-align:center;'><input type='checkbox' class='cuscheck_ship' id='cus_ship_"+i+"' name='cus_ship[]' value='"+mb_no+"' ></td>";
						  set_content +="<td class='td-name'><a href='/index.php/SuAdmin/CustomForm?mb_no="+mb_no+"' class='mlaya' >수정</a> </td>";
						  set_content +="<td class='td-num'>"+mb_id+"</td>";			  
						  set_content +="<td class='td-subj-wrap'><div class='ellipsis'>"+mb_name+"</div></td>";
						  set_content +="<td class='td-name talign_c'>"+mb_nick+"</td>";
						  set_content +="<td class='td-date'>"+mb_level+"</td>";
						  set_content +="<td class='td-date'>"+mb_email_certify+"</td>";
						  set_content +="<td class='td-date'>"+mb_mailling+"</td>";
						  set_content +="<td class='td-date'>"+mb_sms+"</td>";
						  set_content +="<td class='td-num'>"+mb_open+"</td>";
						  set_content +="<td class='td-num'>"+mb_leave_date+"</td>";	
						  set_content +="<td class='td-num'>"+mb_datetime+"</td>";	
						  set_content +="<td class='td-num'>"+mb_today_login+"</td>";	

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
			//alert(selectedPage);
			custom_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	custom_list();
});	