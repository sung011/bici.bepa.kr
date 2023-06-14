

$('input[name=selected_all]').on('change', function(){	
	$('.roomcheck_ship').trigger('click');
    //$('.rmacheck_ship').prop('checked', this.checked);
});

function Meeting_status(stat){
	var chk = document.getElementsByName("room_ship[]");
	var checkCnt = 0;
	var bk_ix="";
	if(chk.length){
		for(var i = 0; i < chk.length; i++){		
			if(chk[i].checked ==true){//체크박스가 활성화인것중에 전체체크 실행
				checkCnt++;	
				if(bk_ix){
					bk_ix += ","+chk[i].value;
				}else{
					bk_ix += chk[i].value;
				}			
			}
		}
	}
	if(checkCnt){	
	   var con_test = confirm("해당 예약을 변경하시겠습니까?");
		if(con_test == true){
		   $.ajax({
				type: 'POST',
				dataType: "json",
				url: "/index.php/SuAccess/MeetingStatus",
				data: {
					'bk_ix':bk_ix,
					'bk_status':stat
				},
				cache: false,
				beforeSend:function(){	
				},
				success: function(json){				
					if(json=="E200"){
						location.reload();
					}else{
						alert("전산장애로 상태변경 실패하였습니다.");
					}
				}
				,complete:function(){			 
				}
			});
		}else{
		}
	
	}else{
		alert("변경할 예악번호를 선택해주세요.");
		return;
	}
}
function Meeting_del(){
    var chk = document.getElementsByName("room_ship[]");
	var checkCnt = 0;
	var bk_ix="";
	if(chk.length){
		for(var i = 0; i < chk.length; i++){		
			if(chk[i].checked ==true){//체크박스가 활성화인것중에 전체체크 실행
				checkCnt++;	
				if(bk_ix){
					bk_ix += ","+chk[i].value;
				}else{
					bk_ix += chk[i].value;
				}			
			}
		}
	}
	if(checkCnt){	
	   var con_test = confirm("해당 예약을 삭제하시겠습니까?");
		if(con_test == true){
		   $.ajax({
				type: 'POST',
				dataType: "json",
				url: "/index.php/SuAccess/MeetingDel",
				data: {
					'bk_ix':bk_ix				
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

function room_list(nowpage) {
		
	   if(!nowpage){ nowpage = '1';}
	   var set_content='';
	   var Totalcnt ="";
	   var sch_room = $("#sch_room").val();
	   var searkeyword = $("#searkeyword").val();
	   var searkey = $("#searkey").val();
	   var sch_status =  $("input:radio[name='sch_status']:checked"). val( ) ;;
	   var begin_date = $("#begin_date").val();
	   var end_date = $("#end_date").val();
		//alert(sch_status);
	   $.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/SuAccess/MeetingSearch",
			data: {
				'nowpage':nowpage,
				'searkey':searkey,
				'searkeyword':searkeyword,
				'sch_room':sch_room,
				'sch_status':sch_status,
				'start_date':begin_date,
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
			      var preod_id ="";
				  for(i=0; i < list_total; i++) {
	
					  var bk_ix = list_array[i]['bk_ix'];
					  var od_id = list_array[i]['od_id'];
					  var encrypt_od_id = list_array[i]['encrypt_od_id'];
					  var bk_name = list_array[i]['bk_name'];
					  var bk_subject = list_array[i]['bk_subject'];
					  var bk_hp = list_array[i]['bk_hp'];
					  var bk_email = list_array[i]['bk_email'];
					  var bk_payment = list_array[i]['bk_payment'];
					  var bk_price = list_array[i]['bk_price'];	
					  var bk_misu = list_array[i]['bk_misu'];
					  var rm_ix = list_array[i]['rm_ix'];
					  var rms_status = list_array[i]['rms_status'];
					  var rms_date = list_array[i]['rms_date'];
					  var rms_year = list_array[i]['rms_year'];
					  var rms_month = list_array[i]['rms_month'];
					  var rms_day = list_array[i]['rms_day'];
					  var rms_day = list_array[i]['rms_day'];
					  var rms_time = list_array[i]['rms_time'];
					  var weekday = list_array[i]['weekday'];
					  var diff_day = list_array[i]['diff_day'];
						  Totalcnt = list_array[i]['Totalcnt'];
						  var rms_btn="";

						  if(rms_status=="대기"){
							  rms_btn ="<button type='button' class='btn btn-default'>대</button>";
							  
						  }else if(rms_status=="완료"){
							  rms_btn ="<button type='button' class='btn btn-primary'>완</button>";
						  }else if(rms_status=="취소"){
							  rms_btn ="<button type='button' class='btn btn-danger'>취</button>";
						  }
						  var bk_deposit="";
						  if(bk_misu > 0){
								bk_deposit="<span style='color:red;'>미결제</span>";
						  }else{
							  bk_deposit="<span style='color:#353535;'>결제완료</span>";
						  }
						  if(diff_day<1){diff_day=0;}
						  if(od_id == preod_id){
							  set_content +="<tr>";	
							  set_content +="<td style='text-align:center;'></td>";
							  set_content +="<td class='td-name'> </td>";
							  set_content +="<td class='td-num'>"+rms_btn+" "+rm_ix+" "+rms_month+"/"+rms_day+"("+weekday+") "+rms_time+"</td>";			  
							  set_content +="<td class='td-subj-wrap'></td>";
							  set_content +="<td class='td-name talign_c'></td>";
							  set_content +="<td class='td-date'></td>";
							  set_content +="<td class='td-date'></td>";
							  set_content +="<td class='td-date'></td>";
							  set_content +="</tr>";
						  }else{
							  set_content +="<tr>";	
							  set_content +="<td style='text-align:center;'><input type='checkbox' class='roomcheck_ship' id='cus_ship_"+i+"' name='room_ship[]' value='"+bk_ix+"' ></td>";
							  set_content +="<td class='td-name'><a href='/SuAccess/MeetingDetail?od_id="+encrypt_od_id+"' class='mlaya' >"+od_id+"</a> </td>";
							  set_content +="<td class='td-num'>"+rms_btn+" "+rm_ix+" "+rms_month+"/"+rms_day+"("+weekday+") "+rms_time+"</td>";			  
							  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'>"+bk_name+"</div></td>";
							  set_content +="<td class='td-name talign_c'>"+bk_price+"원</td>";
							  set_content +="<td class='td-date'>예약금("+bk_deposit+")/ 총금액("+bk_deposit+")</td>";
							  set_content +="<td class='td-date'>"+bk_payment+"</td>";
							  set_content +="<td class='td-date'>"+diff_day+"일 경과</td>";
							  set_content +="</tr>";
						  }
						  preod_id = od_id;
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
			room_list(selectedPage);         
        });                                        
}
		
$("document").ready(function(){        
	room_list();
});		