function beginck(){
	var begindate="";
	var enddate="";
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();
	var theHours = currentDay.getHours();
	var theMinutes = currentDay.getMinutes();
	var theSeconds = currentDay.getSeconds();	
	$("input:checkbox[name=begin_ck]").each(function() {		
		  if(this.checked == true){	
			  if(theMonth < 10) theMonth = "0"+theMonth;
			  if(theDate < 10) theDate = "0"+theDate;
			  var nowDate = theYear + '-' + theMonth + '-' + theDate+ ' ' + theHours + ':' + theMinutes + ':' + theSeconds;
			  $("#bk_receipt_time").val(nowDate);

		  }else{
			  $("#bk_receipt_time").val('');
		  }
	});
}
function payfor(){
	
    var bk_status = $("#bk_status option:selected").val();

	//if(bk_status =='대기'){
	var misu =$("#bk_misu").val();

	if(misu){
		$("#bk_receipt_price").val(misu);
		$("#bk_misu").val(0);
	}
	//}
}

function go_Meeting(){
	location.href="/index.php/Schedule/Meeting";
}

function Rever_modify(){
	var frm = document.usrfrm;
	var formData = new FormData(frm);
	$.ajax({
			type: 'POST',
			url: '/index.php/SuAccess/Meetingupdate',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){
			},
			success: function(json){
				if(json=="E400"){
					alert("등록 실패 되었습니다.");
				}else{
					alert("수정 되었습니다.");
					//location.href="/SuAdmin/CustomList";
				}
			}
			,complete:function(){
		 
			}
	});
}

function Pay_modify(){
	var frm = document.payfrm;
	var formData = new FormData(frm);
	$.ajax({
			type: 'POST',
			url: '/index.php/SuAccess/Meetingupdate',
			data: formData,
			cache: false,
			processData: false,
			contentType: false,
			beforeSend:function(){
			},
			success: function(json){
				if(json=="E400"){
					alert("등록 실패 되었습니다.");
				}else{
					alert("수정 되었습니다.");
					//location.href="/SuAdmin/CustomList";
				}
			}
			,complete:function(){
		 
			}
	});
}
function Meetingdel(){
	var con_test = confirm("해당 예약을 삭제하시겠습니까?");
		if(con_test == true){
		   var bk_ix = $("#bk_ix").val();
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
						location.href="/Schedule/Meeting";
					}else{
						alert("전산장애로 삭제 실패하였습니다.");
					}
				}
				,complete:function(){			 
				}
			});
		}else{
		}
}