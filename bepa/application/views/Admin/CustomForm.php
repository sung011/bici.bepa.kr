<?php 

include $_SERVER['DOCUMENT_ROOT'] . '/application/views/Admin/head/admin_header.php'; 
$start_date = date("Y-m-d");

//if(empty($nw_disable_hours)){$nw_disable_hours="24";}
?>
<link rel="stylesheet" href="<?=base_url('assets/css/jquery-ui.css')?>">

<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<script>
   function Ct_rapid_execDaumPostcode() {
	
        new daum.Postcode({
            oncomplete: function(data) {
                // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.

                // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var fullAddr = ''; // 최종 주소 변수
                var extraAddr = ''; // 조합형 주소 변수

                // 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    fullAddr = data.roadAddress;

                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    fullAddr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 조합한다.
                if(data.userSelectedType === 'R'){
                    //법정동명이 있을 경우 추가한다.
                    if(data.bname !== ''){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있을 경우 추가한다.
                    if(data.buildingName !== ''){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
                    fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('mb_zip1').value = data.zonecode; //5자리 새우편번호 사용
                document.getElementById('mb_addr1').value = fullAddr;

                // 커서를 상세주소 필드로 이동한다.
               // document.getElementById('Ct_van_addr2').focus();
            }
        }).open();
    }
</script>
    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">	
		<div class="col-lg-12 col-xs-12" style="padding:0px;">
	
			<div class="col-lg-12 group_box_wrap" style="margin:0px;padding:0px;">
				<div class="col-lg-12 group_box" style="display:flex; justify-content:space-between;">
					
					<div class="box box-success">
						<div class="box-header with-border">
						  <h3 class="box-title box-stitle"><?php echo $Title2; ?> </h3>

						  <div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>						
						  </div>
						</div>
						<div class="box-body" style="min-height:70vh;padding:2em;">
							<div class="notice_table write-div">
								<form method="post" name="wfrm"  enctype="multipart/form-data">
								
								<input type="hidden" name="mb_no" id="mb_no" value="<?php echo $mb_no;?>">
								<div class="form-group has-success" style="clear:both;float:left;width:48%;margin-right:2%;">
									<label class="control-label" for="mb_id"><i class="fa fa-check"></i>아이디 &nbsp;<span style="color:blue;">6자 이상 입력해주세요.</span></label>
									<input type="text" class="form-control" id="mb_id" name="mb_id" style="ime-mode:inactive;" value="<?php echo $mb_id;?>">					
								</div>	
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label" for="mb_password"><i class="fa fa-check"></i>비밀번호&nbsp;<span style="color:blue;">6자 이상 입력해주세요.</span></label>
									<input type="password" class="form-control" id="mb_password" name="mb_password" >	
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" for="mb_name"><i class="fa fa-check"></i>이름</label>
									<input type="text" class="form-control" style="ime-mode:active;" id="mb_name" name="mb_name" value="<?php echo $mb_name;?>">	
								</div>
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label" for="mb_nick"><i class="fa fa-check"></i>닉네임</label>
									<input type="text" class="form-control" style="ime-mode:active;" id="mb_nick" name="mb_nick" value="<?php echo $mb_nick;?>" >	
								</div>
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check"></i>회원권한</label>
									<select class="form-control" name="mb_level" id="mb_level" style="width:30%;" >
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										<option value="6">6</option>
										<option value="7">7</option>
										<option value="8">8</option>
										<option value="9">9</option>
										<option value="10">10</option>
									</select>	
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" for="mb_email"><i class="fa fa-check"></i>E-mail</label>
									<input type="text" class="form-control" style="ime-mode:inactive;" id="mb_email" name="mb_email" value="<?php echo $mb_email;?>"  >	
								</div>
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label" for="mb_homepage"><i class="fa fa-check"></i>홈페이지</label>
									<input type="text" class="form-control" id="mb_homepage" name="mb_homepage" value="<?php echo $mb_homepage;?>" >	
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" for="mb_hp"><i class="fa fa-check"></i>휴대폰&nbsp;&nbsp;<span style="color:blue;">- 제외</span></label>
									<input type="number" class="form-control" id="mb_hp" name="mb_hp" value="<?php echo $mb_hp;?>"  >	
								</div>
								<div class="form-group" style="width:48%;float:left;">
									<label class="control-label" for="mb_tel"><i class="fa fa-check"></i>전화번호&nbsp;&nbsp;<span style="color:blue;">- 제외</span></label>
									<input type="number" class="form-control" id="mb_tel" name="mb_tel" value="<?php echo $mb_tel;?>" >	
								</div>
								 <div class="form-group" >
								   <label class="control-label" for="mb_zip1" style="width:100%;">주소</label>
								   <input type="text" class="form-control zip-input" style="" id="mb_zip1" name="mb_zip1" placeholder="우편번호를 불러옵니다.."  value="<?php echo $mb_zip1;?>" onclick="Ct_rapid_execDaumPostcode()" onkeyup="Ct_rapid_execDaumPostcode()"  >	
								   <button type="button" class="btn btn-primary" style="clear:both;" onclick="Ct_rapid_execDaumPostcode()">주소찾기 </button>
								   <div style="clear:both;height:2px;"></div>
								   <input type="text" class="form-control zip-input" id="mb_addr1" name="mb_addr1" placeholder="주소를 입력하세요." value="<?php echo $mb_addr1;?>" >
								   <input type="text" class="form-control zip-input" id="mb_addr2" name="mb_addr2" placeholder="상세주소를 입력하세요." value="<?php echo $mb_addr2;?>" >
								</div>
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check"></i>메일 수신</label>
									
									  <div class="radio">
										<label>
										  <input type="radio" name="mb_mailling" value="1" selected>
										  예
										</label>
									  </div>
									  <div class="radio">
										<label>
										  <input type="radio" name="mb_mailling" value="0" >
										  아니오
										</label>
									  </div>	
								</div>
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check"></i>정보 공개</label>
									 
									  <div class="radio">
										<label>
										  <input type="radio" name="mb_open" value="1" selected>
										  예
										</label>
									  </div>
									  <div class="radio">
										<label>
										  <input type="radio" name="mb_open" value="0" >
										  아니오
										</label>
									  </div>	
								</div>
								
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check"></i>자기소개</label>
									
									 <textarea name="mb_profile" id="mb_profile" rows="5" style="width:100%;border:1px solid #ddd;" value="<?php echo $mb_profile;?>">
								
									</textarea>
								</div>
								<div class="form-group" style="clear:both;">
									<label class="control-label" ><i class="fa fa-check"></i>메모</label>
									
									 <textarea name="mb_memo" id="mb_memo" rows="5" style="width:100%;border:1px solid #ddd;" value="<?php echo $mb_memo;?>">
								
									</textarea>
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" style="width:100%;"><i class="fa fa-check"></i>탈퇴일자</label>
									<div class="input-group date" style="width:48%;display:inline-flex;">
									  <div class="input-group-addon" style="width:60px;">
										<i class="fa fa-clock-o"></i>
									  </div>
									  <input type="text" class="form-control " id="mb_leave_date" name="mb_leave_date" value="<?php echo $mb_leave_date;?>">
									 
									</div>
									<label for="begin_ck" class="checkbox" style="float:right;display: table-cell;width:45%;"><input type="checkbox" name="begin_ck" id="begin_ck" onclick="beginck();">
									탈퇴일을 오늘로 지정</label>
								</div>
								<div class="form-group" style="width:48%;float:left;margin-right:2%;">
									<label class="control-label" style="width:100%;"><i class="fa fa-check"></i>접근차단일자</label>
									<div class="input-group date" style="width:48%;display:inline-flex;">
									  <div class="input-group-addon" style="width:60px;">
										<i class="fa fa-clock-o"></i>
									  </div>
									  <input type="text" class="form-control " id="mb_intercept_date" name="mb_intercept_date" value="<?php echo $mb_intercept_date;?>">
									 
									</div>
									<label for="end_ck" class="checkbox" style="float:right;display: table-cell;width:45%;"><input type="checkbox" name="end_ck" id="end_ck" onclick="endck();">
									접근차단일을 오늘로 지정</label>
								</div>
																						
								</form>
								<div style="text-align:center;">					
									<button type="button" class="btn btn-primary" style="font-size:13px;" onclick="CustomNew_send();">작성완료</button>											
									<button type="button" class="btn btn-success" style="font-size:13px;"><a href="/index.php/SuAdmin/CustomList" style="color:#fff;">목록가기</a></button>
								</div>				
							</div>										
						</div>

					</div>

				</div>	
			</div>		
		</div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>

<script>
  

var currentDay = new Date();
var theYear = currentDay.getFullYear();
var theMonth = currentDay.getMonth() +1;
var theDate  = currentDay.getDate();
var theDayOfWeek = currentDay.getDay();

function beginck(){
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();
	$("input:checkbox[name=begin_ck]").each(function() {		
		  if(this.checked == true){	
			  
			  if(theMonth < 10) theMonth = "0"+theMonth;
			  if(theDate < 10) theDate = "0"+theDate;
			  var nowDate = theYear + '' + theMonth + '' + theDate ;
			  $("#mb_leave_date").val(nowDate);

		  }else{
			  $("#mb_leave_date").val('');
		  }
	});
}

function endck(){
	var currentDay = new Date();
	var theYear = currentDay.getFullYear();
	var theMonth = currentDay.getMonth() +1;
	var theDate  = currentDay.getDate();
	var theDayOfWeek = currentDay.getDay();
	$("input:checkbox[name=end_ck]").each(function() {		
		  if(this.checked == true){
			   if(theMonth < 10) theMonth = "0"+theMonth;
			   if(theDate < 10) theDate = "0"+theDate;
			   var nowDate = theYear + '' + theMonth + '' + theDate ;
			   $("#mb_intercept_date").val(nowDate);
		  }else{
			   $("#mb_intercept_date").val('');
		  }
	});
}

function CustomNew_send(){
	var frm = document.wfrm;

	var mb_id = $("#mb_id").val();
	var mb_password = $("#mb_password").val();
	var mb_name = $("#mb_name").val();
	var mb_email = $("#mb_email").val();
	var mb_hp = $("#mb_hp").val();
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}	
	var formData = new FormData(frm);

	if(mb_id ==""){
		alert('아이디를 입력해주세요.');
		return false;
	}
	if(mb_id.length < 6 ){
		alert('아이디를 6자 이상 입력해주세요.');
		return false;
	}
	
	if(mb_password=="") {

        alert('패스워드를 입력해주세요.');
        return;
    }
	if(mb_password.length < 6 ){
		alert('패스워드 6자 이상 입력해주세요.');
		return false;
	}
	
	if(mb_name ==""){
		alert('이름을 입력해주세요.');
		return false;
	}
	if(mb_email ==""){
		alert('이메일을 입력해주세요.');
		return false;
	}
	var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
	// 검증에 사용할 정규식 변수 regExp에 저장
	if (mb_email.match(regExp) != null) {
	}
	else {
	alert('이메일 형식에 맞지 않습니다.');
	return false;
	}
	if(mb_hp ==""){
		alert('휴대폰을 입력해주세요.');
		return false;
	}
	$.ajax({
			type: 'POST',
			url: '/index.php/Form/CustomSave',
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
					alert("저장 되었습니다.");
					location.href="/index.php/SuAdmin/CustomList";
				}
			}
			,complete:function(){
		 
			}
		});
}

document.wfrm.mb_level.value="<?php echo $mb_level; ?>";
document.wfrm.mb_mailling.value="<?php echo $mb_mailling; ?>";
document.wfrm.mb_open.value="<?php echo $mb_open; ?>";
</script>