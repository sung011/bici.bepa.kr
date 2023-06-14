$('input[name=selected_all]').on('change', function(){	
	$('.rmacheck_ship').trigger('click');
});
function notice_del(){
    var chk = document.getElementsByName("rma_ship[]");
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
	//alert('<?php echo $botable;?>');
	if(checkCnt){		
	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/Info/tkrwp",
			data: {
				'wrid':wrid,
				'bo_table':"<?php echo $bo_table;?>",
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
function notice_write(){
	location.href = '/index.php/info/nwrite?bo_table=<?php echo $bo_table; ?>';
}

function notice_list(nowpage,sort,ith) {
	if(sort !='ALL2'){
		$('.nkindlist span p').removeClass('active');
		$(ith).addClass('active');
	}
	if(!nowpage){ nowpage = '1';}
	if(sort){
		$("#nkind").val(sort);
	}else{
		sort = $("#nkind").val();
	}
	var Totalcnt ="";
	var searkey =$("#q_searchKeyTy").val();
	var searkeyword =$("#q_searchVal").val();
	var admin_cert = "<?php echo $admin_cert; ?>";

	   $.ajax({
			type: 'POST',
			dataType: "json",
			//url: './api/employ_list_ajax.php',
			url: "/index.php/api/Notice/List",
			data: {
				'ca_name':sort,
				'nowpage':nowpage,
				'searkey':searkey,
				'searkeyword':searkeyword

			},
			cache: false,
			beforeSend:function(){
				//$('.nabis-loading').show();
			},
			success: function(json) {
			  //alert(json);
			  if(json=='E500'){
					set_content +="<tr >";
					if(admin_cert == 10){
						set_content +="<td colspan=\"6\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";
					}else{
						set_content +="<td colspan=\"5\" style=\"text-align:center;\"><strong class=\"color-red\">게시물이 없습니다.</strong></td> ";
					}
					set_content +="</tr >";
					$('#notice_listtable').html(set_content);	
					return false;
			  }else{ 
				  //var list_array =  JSON.parse(json);
				  var list_array =  json;
				  var list_total = list_array.length;
			      var set_content='';

				  for(i=0; i < list_total; i++) {
	
					  var wr_subject = list_array[i]['wr_subject'];
					  var wr_1 = list_array[i]['wr_1'];
					  var wr_2 = list_array[i]['wr_2'];
					  var wr_3 = list_array[i]['wr_3'];
					  var wr_hit = list_array[i]['wr_hit'];
					  var ca_name = list_array[i]['ca_name'];
					  var wr_id = list_array[i]['wr_id'];
					  var wr_sno = list_array[i]['wr_sno'];
					  var eb_2 = list_array[i]['eb_2'];
					  var wr_reply = list_array[i]['wr_reply'];
						Totalcnt = list_array[i]['Totalcnt'];
	
					  if(wr_2){
						var c_date = wr_1+" ~ <br>"+wr_2;
					  }else{
						var c_date = wr_1;
					  }

					  if(wr_3=="공지"){
							var btype = "<span class='ntype ntype_1'>"+wr_3+"</span>";
					  }else if(wr_3=="진행"){
							var btype = "<span class='ntype ntype_2'>"+wr_3+"</span>";
					  }else if(wr_3=="마감"){
							var btype = "<span class='ntype ntype_3'>"+wr_3+"</span>";
					  }else{
							var btype = wr_3;
					  }
						  set_content +="<tr >";
						  if(admin_cert == 10){
							set_content +="<td style='text-align:center;'><input type='checkbox' class='rmacheck_ship' id='rma_ship_"+i+"' name='rma_ship[]' value='"+wr_id+"' ></td>";
						  }
						  if(eb_2){
						  set_content +="<td class='td-num' style='color:red;'>공지</td>";
						  }else{
						  set_content +="<td class='td-num'>"+wr_sno+"</td>";
						  }
						  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'>";
						  set_content +="<a href='/info/read?bo_table=ym_notice&wr_id="+wr_id+"'>";
						  if(wr_reply){
							 set_content +="<span class='reply-indication' style='margin-left:20px;'></span><i class='fa fa-circle margin-right-5'></i>["+ca_name+"] "+wr_subject+"</a></div></td>";
						  }else{
							 set_content +="["+ca_name+"] "+wr_subject+"</a></div></td>";
						  }
						 
						  set_content +="<td>"+c_date+"</td>";
						  set_content +="<td>"+btype+"</td>";

						  set_content +="<td class='td-num'>"+wr_hit+"</td>";						 
						  set_content +="</tr>";		  
				  }	              
				  $('#notice_listtable').html(set_content);	
				  $('#Total_num').html(Totalcnt);		
			  }
			}
			,complete:function(){				
				//$('.nabis-loading').fadeOut();
					$('#nowpage').val(nowpage);
					var totalData = Totalcnt;    // 총 데이터 수
					var dataPerPage = 15;    // 한 페이지에 나타낼 데이터 수
					var pageCount = totalData / dataPerPage;
						pageCount = Math.ceil(pageCount);   // 한 화면에 나타낼 페이지 수		
						if(pageCount > 10) pageCount= 10;
					var selectedPage = nowpage;
					
						paging(totalData, dataPerPage, pageCount, selectedPage);
						
				
				 
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
			notice_list(selectedPage);   
			var offset = $("#paging").offset();
			$('html, body').animate({scrollTop : offset.top}, 1000);
        });                                        
}

$("document").ready(function(){        
	notice_list('1','ALL2');
});
