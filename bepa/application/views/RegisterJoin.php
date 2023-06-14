<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
?>
<link rel="stylesheet" href="<?=base_url('assets/css/support.css')?>">
<style>
.form-group{width:48%;}
.form-float{
	float:left;
	display:inline-block;
	clear:none;
}
.control-label{width:30% !important;}
@media (min-width: 576px){
.control-label {
    -ms-flex: 0 0 30%;
    flex: 0 0 30%;
    max-width: 30%;
}
}
.form-inline .button {
    position: absolute;
    top: 1px;
    right: 1px;
    float: none;
    height: 28px;
    margin: 0;
    padding: 0 20px;
    font-weight: 600;
    font-size: 12px;
    line-height: 28px;
    background: #F8F8F8;
    color: #4B4B4D;
    border-left: 1px solid #D5D5D5;
}
.ckbutton{
	border:1px solid #ddd;
	background: #F8F8F8;
    color: #4B4B4D;
	width:100px;
	vertical-align: middle;
	padding:5px 10px !important;
}
.color-red {
    color: #FF4848;
}
.border-danger{border:1px solid #f39c12}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">회원가입</a></li>
								<li>정보 입력</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>	
	<!-- Features -->

	<div class="features" >
		<div class="container" >

			<div class="row features_row" >	
				<!-- Features Item -->
				<div class="col-lg-12 col-xs-12 feature_col block_pad" style="background:#fff;" >
					

					
					<div class="regi-block" style="color:#333;padding-top:50px;">
						
						<form method="post" name="wfrm"  enctype="multipart/form-data">
						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-user fa-lg"></i> 정보입력</strong></div>
							<div class="panel-body" >
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_id">이메일</label>
									<div class="col-sm-12">
										<div class="form-inline">
											<div class="input-group">
                                                <input type="text" name="mb_email" id="mb_email" value="" required="" class="form-control email border-danger" size="35" maxlength="100">
												<span class="fa fa-check form-control-feedback"></span>
											</div>
											<button type="button" class="ckbutton" onclick="check_duplication('mb_email');"><i class="fa fa-check color-red"></i> 중복체크</button>
											<input type="hidden" name="id_ck" id="id_ck" value="">
										</div>
									</div>
								</div>
								<div class="form-group form-group-sm form-float">
									<label class="col-sm-2 control-label" for="mb_password">비밀번호</label>
									<div class="col-sm-12">
										<div class="form-inline">
											<div class="input-group">
												<input type="password" name="mb_password" value="" id="mb_password" required="" class="form-control" maxlength="20" >
												<span class="fa fa-check form-control-feedback"></span>
											</div>

										</div>
									</div>
								</div>
								<div class="form-group form-group-sm form-float">
									<label class="col-sm-2 control-label" for="mb_password2">비밀번호 확인</label>
									<div class="col-sm-12">
										<div class="form-inline">
											<div class="input-group">
												<input type="password" name="mb_password2" value="" id="mb_password2" required="" class="form-control" maxlength="20" >
												<span class="fa fa-check form-control-feedback"></span>
											</div>

										</div>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_name">이름</label>
									<div class="col-sm-12" >
										<div class="form-inline">
											<!--<div id="helpblock_bk_name" class="help-block"><small class="text-dotum">회사명을 입력해주세요</small></div>-->
											<div class="input-group" >
												<input type="text" name="mb_name" value="" id="mb_name" required="" class="form-control" maxlength="20" >
												<span class="fa fa-check form-control-feedback"></span>
											</div>

										</div>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_nick">닉네임</label>
									<div class="col-sm-12" >
										<div class="form-inline">											
											<div class="input-group" >
												<input type="text" name="mb_nick" value="" id="mb_nick" required="" class="form-control" maxlength="20" >					
											</div><button type="button" class="ckbutton" onclick="check_duplication('mb_nick');"><i class="fa fa-check color-red"></i> 중복체크</button>
										</div>
										<input type="hidden" name="nick_ck" id="nick_ck" value="">
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_tel">전화번호</label>
									<div class="col-sm-12" >
										<div class="form-inline">											
											<div class="input-group" >
												<input type="text" name="mb_tel" value="" id="mb_tel" required="" class="form-control" maxlength="20" >					
											</div>
										</div>
									</div>
								</div>
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_hp">입주사 선택</label>
									<div class="col-sm-12" >
										<div class="form-inline">
											<div class="input-group">
												<input type="hidden" name="uid" id="uid" value="">
												<input type="hidden" name="address" id="add" value=""> <!-- 주소 -->
												<input type="hidden" name="company_tel" id="tel_n" value=""> <!-- 회사전화번호 -->
												<input type="hidden" name="fax" id="fax_n" value=""> <!-- 펙스 -->
												<input type="hidden" name="main_business" id="rep_s" value=""> <!-- 업종 -->
												<input type="hidden" name="ceo_name" id="ceo_name" value="" > <!-- 대표자명 -->
												<input type="hidden" name="company_name" id="company_name" value="" > <!-- 회사명 -->
												<input type="hidden" name="cert_num" id="bsn_l" value="" > <!-- 사업자번호 -->
												<input type="hidden" name="association_type" id="association_type" value="5" > <!-- 사업자번호 -->
												<input type="text" name="mb_company" id="mb_company" value="" required="" class="form-control border-danger" size="35" maxlength="100">
												<span class="fa fa-check form-control-feedback"></span>
											</div>
											<button type="button" class="ckbutton" onclick="comodal();"><i class="fa fa-check color-red"></i>입주사검색</button>
											

										</div><span style="color:#3c8dbc;font-size:12px;">※ (스마트 기업플랫폼을 사용하기 위해서는 반드시 입주사를 선택해 주셔야합니다.)</span>
									</div>
								</div>

                                <!--<div class="form-group form-group-sm">
                                    <label class="col-sm-2 control-label" for="mb_hp">등급 선택</label>
                                    <div class="col-sm-12" >
                                        <div class="form-inline">

                                            <div class="input-group" >
                                                <select class="form-control border-danger" name="mb_level" id="mb_level">
                                                    <option value='' selected>-- 선택 --</option>
                                                    <option value='2'>일반 등급</option>
                                                    <option value='10'>관리자 등급</option>
                                                </select>
                                            </div>

                                        </div><span style="color:#3c8dbc;font-size:12px;">※ ()</span>
                                    </div>
                                </div>-->

								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_hp">휴대폰번호</label>
									<div class="col-sm-12" >
										<div class="form-inline">
											
											<div class="input-group" >
												<input type="text" name="mb_hp" value="" id="mb_hp" required="" class="form-control border-danger" maxlength="20" aria-describedby="helpblock_bk_name">
												<span class="fa fa-phone form-control-feedback"></span>
											</div>

										</div><span style="color:#3c8dbc;font-size:12px;">※ (스마트 기업플랫폼을 사용하기 위해서는 반드시 입력해주셔야합니다.)</span>
									</div>
								</div>
												
								<!--<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="mb_email">이메일</label>
									<div class="col-sm-12">
										<div class="form-inline">
											<div class="input-group">
												<input type="text" name="mb_email" id="mb_email" value="" required="" class="form-control email border-danger" size="35" maxlength="100">
												<span class="fa fa-envelope form-control-feedback"></span>
											</div>
											<button type="button" class="ckbutton" onclick="check_duplication('mb_email');"><i class="fa fa-check color-red"></i> 중복체크</button>
										</div><span style="color:#3c8dbc;font-size:12px;">※ (스마트 기업플랫폼을 사용하기 위해서는 반드시 입력해주셔야합니다.)</span>
									</div>
									<input type="hidden" name="email_ck" id="email_ck" value="">
								</div>-->
								<!--
								<div class="form-group form-group-sm">
									<label class="col-sm-2 control-label" for="bk_carkind_c">시설신청</label>
									<div class="col-sm-10">
										<div class="form-inline">
											<div class="input-group">
												<input type="checkbox" name="bk_carkind_c[]" value="빔프로젝트"> 빔프로젝트&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="bk_carkind_c[]" value="냉난방"> 냉난방&nbsp;&nbsp;&nbsp;
												<input type="checkbox" name="bk_carkind_c[]" value="마이크"> 마이크
												<input type="hidden" name="bk_carkind">
											</div>
										</div>
									</div>
								</div>				
								-->
							</div>
						</div>		
						<div class="panel panel-default">
							<div class="panel-heading"><strong><i class="fa fa-file-text-o fa-lg"></i> 기타 개인설정</strong></div>
							<div class="panel-body">													
								<div class="bs-callout bs-callout-warning">
									<h5>메일링 서비스</h5>
									<p style="height:2px;"></p>
									<label><input type="checkbox" name="mb_mailling" value="1" id="mb_mailling"> 정보 메일을 받겠습니다.</label>      
								</div>
								<br>
								<div class="bs-callout bs-callout-warning">
									<h5>정보공개</h5>
									<p style="height:2px;"></p>
									<label><input type="checkbox" name="mb_open" value="1" id="mb_open"> 다른분들이 나의 정보를 볼 수 있도록 합니다.</label>       
									<p>Note: 정보공개를 바꾸시면 앞으로 0일 이내에는 변경이 안됩니다.</p>
								</div>								
							</div>							
						</div>
						</form>					
						<div style="text-align:center;margin-bottom:50px;">
							<button	id="step_button" type="button" class="btn" style="background:#4b4b4d;color:#fff;font-weight:bold;font-size:15px" onclick="step_join();" >회원가입</button>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
<div class="modal fade" id="CommonModal" role="dialog">
  <div class="modal-dialog popup-dialog" style="width:700px;">
    <div class="modal-content">
      <div class="modal-header popup-header">
		 입주사 찾기
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align:center;">
			<input type="hidden" name="uid" id="uid" >
			<div class="form-inline">
				<div class="input-group">
					<input type="text" name="search_com" id="search_com" value="" required="" class="form-control " style="width:100%;" onkeyup="Enter_cK();">
					
				</div>
				<button type="button" class="ckbutton" onclick="search_company();"><i class="fa fa-search color-red"></i>입주사검색</button>
			</div>
			<div style="height:300px;overflow:auto;margin-top:5px;">
				<table  class="table table-hover" id="com_table">
					<thead>
						<tr class="tr-th-top">	
							<th class="hidden-md hidden-sm">번호</th>
							<th>입주사</th>
							<!--<th>대표자</th>-->
						</tr>
					</thead>
					<tbody id="com_tbody">								
													
					</tbody>
				</table>
			</div>
      </div>
      <div class="modal-footer">
 
      
      </div>
    </div>
  </div>
</div>
<?php
  include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php'; 

?>

<script>
function comodal(){
	$("#CommonModal").modal('show');
}
function Enter_cK(){
	 if (window.event.keyCode == 13) {
		 search_company();
	 }
}
function search_company(){
	var searkey = $("#search_com").val();
	var set_content="";

	$.ajax({
		type: 'POST',
		dataType: "json",
		url: "/index.php/Login/Company",
		data: {
			'searkey':searkey
		},
		cache: false,
		beforeSend:function(){	
		},
		success: function(json){
			//console.log(json)
		  if(json=='E500'){
				set_content +="<tr >";
		
				set_content +="<td colspan=\"3\" style=\"text-align:center;\"><strong class=\"color-red\">검색된 입주사가 없습니다.</strong></td> ";
			 
				set_content +="</tr >";
				$('#com_tbody').html(set_content);	
				return false;
		  }else{ 
			  var list_array =  json;
			  var list_total = list_array.length;
			  
			  for(i=0; i < list_total; i++) {

				  var name = list_array[i]['name'];
				  var ceo_name = list_array[i]['ceo_name'];
				  var uid = list_array[i]['uid'];
				  var cert_num = list_array[i]['cert_num'];

				  var add = list_array[i]['add'];
				  var tel_n = list_array[i]['tel_n'];
				  var fax_n = list_array[i]['fax_n'];
				  var rep_s = list_array[i]['rep_s'];
				  var bsn_l = list_array[i]['bsn_l'];
					  cno = i + 1;
					  /*set_content +="<tr onclick=\"com_insert('"+name+"','"+uid+"');\">";*/
					  set_content +="<tr onclick=\"a_com_insert('"+name+"','"+uid+"','"+add+"','"+tel_n+"','"+fax_n+"','"+rep_s+"','"+ceo_name+"','"+bsn_l+"');\">";
					  set_content +="<td class='td-num'>"+cno+"</td>";
					  set_content +="<td class='td-subj-wrap'><div class='td-subject ellipsis'>";	
					  set_content +=""+name+"</div></td>";				  
					  //set_content +="<td class='td-name talign_c'>"+ceo_name+"</td>";				 
					  set_content +="</tr>";		  
			  }	              
			  $('#com_tbody').html(set_content);	
		  }
		}
		,complete:function(){	
		
		}
	});

}
function com_insert(cname,cid){
	$("#mb_company").val(cname);
	$("#uid").val(cid);
	$("#CommonModal").modal('hide');
}

function a_com_insert(cname,cid,add,tel_n,fax_n,rep_s,ceo_name,bsn_l){
	$("#mb_company").val(cname);
	$("#company_name").val(cname);
	$("#uid").val(cid);
	$("#add").val(add);
	$("#tel_n").val(tel_n);
	$("#fax_n").val(fax_n);
	$("#rep_s").val(rep_s);
	$("#bsn_l").val(bsn_l);
	$("#ceo_name").val(ceo_name);
	$("#CommonModal").modal('hide');
}
function check_duplication(seq){
	var searkey="";
	if(seq=='mb_id'){
		searkey = $("#mb_id").val();
	}
	if(seq=='mb_nick'){
		searkey = $("#mb_nick").val();
	}
	if(seq=='mb_email'){
		searkey = $("#mb_email").val();
		var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
			// 검증에 사용할 정규식 변수 regExp에 저장
		  if (searkey.match(regExp) != null) {
		  }
		  else {
			alert('이메일 형식에 맞지 않습니다.');
            $("#mb_email").focus();
			return false;
		  }
	}
	if(searkey){
		$.ajax({
			type: 'POST',
			dataType: "json",
			url: "/index.php/Login/Duplication",
			data: {
				'Duplval':seq,
				'searkey':searkey
			},
			cache: false,
			beforeSend:function(){	
			},
			success: function(json){	

				if(json=="E200"){
				
					if(seq=='mb_id'){
						alert("사용 가능한 아이디입니다.");
						$("#id_ck").val('1');
						$("#mb_id").css('background',"#dddddd");

					}
					if(seq=='mb_nick'){
						alert("사용 가능한 닉네임입니다.");
						$("#nick_ck").val('1');
						$("#mb_nick").css('background',"#dddddd");
					}
					if(seq=='mb_email'){
						alert("사용 가능한 이메일입니다.");
						$("#email_ck").val('1');
						$("#mb_email").css('background',"#dddddd");
					}
					
				}else{
					alert("중복 된 값입니다.");
					if(seq=='mb_id'){
						$("#mb_id").val('');
						$("#id_ck").val('');
					}
					if(seq=='mb_nick'){
						$("#mb_nick").val('');
						$("#nick_ck").val('');
					}
					if(seq=='mb_email'){
						$("#mb_email").val('');
						$("#email_ck").val('');
					}
					return false;
				}
			}
			,complete:function(){	
			
			}
		});
	}else{
        alert("입력란에 입력해주세요.");
	    if(seq=='mb_id'){
	        if(!$("#mb_id").val()){
                $("#mb_id").focus();
	        }
        }

	    if(seq=='mb_nick'){
            if(!$("#mb_nick").val()){
                $("#mb_nick").focus();
            }
        }

	}
}
function step_join(){
	var frm = document.wfrm;

	var mb_id = $("#mb_id").val();
	var mb_password = $("#mb_password").val();
	var mb_password2 = $("#mb_password2").val();
	var mb_name = $("#mb_name").val();
	var mb_email = $("#mb_email").val();
	var mb_hp = $("#mb_hp").val();
	var uid = $("#uid").val();
	//if($("input:checkbox[name=notice]").is(":checked") == true) {
	//}
    var mb_level = $("#mb_level").val();
    var mb_nick = $("#mb_nick").val();
	var formData = new FormData(frm);



	/*if(mb_id ==""){
		alert('아이디를 입력해주세요.');
        $("#mb_id").focus();
		return false;
	}*/
	/*if(mb_id.length < 6 ){
		alert('아이디를 6자 이상 입력해주세요.');
        $("#mb_id").focus();
		return false;
	}*/
	
	if(mb_password=="") {
        alert('패스워드를 입력해주세요.');
        $("#mb_password").focus();
        return;
    }
	if(mb_password.length < 6 ){
		alert('패스워드 6자 이상 입력해주세요.');
        $("#mb_password").focus();
		return false;
	}
	if(mb_password2=="") {
        alert('패스워드 확인을 해주세요.');
        $("#mb_password2").focus();
        return;
    }

	if(mb_name ==""){
		alert('이름을 입력해주세요.');
        $("#mb_name").focus();
		return false;
	}

	if (mb_nick == ""){
	    alert("닉네임을 입력해 주세요")
        $("#mb_nick").focus();
        return false;
    }

	if(mb_email ==""){
		alert('이메일을 입력해주세요.');
        $("#mb_email").focus();
		return false;
	}
	if(mb_hp ==""){
		alert('휴대폰을 입력해주세요.');
        $("#mb_hp").focus();
		return false;
	}

	/*if (mb_level == ""){
	    alert('등급을 선택해 주세요');
        $("#mb_level").focus();
	    return false;
    }*/

    //console.log(formData);

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
			// FormData의 key 확인

			formData.append('hp',mb_hp);
			formData.append('id',mb_email);
			formData.append('passwd',mb_password);
			formData.append('use_name',mb_name);

			/*
			for (let value of formData) {
				console.log(value);
			}
            */
            
			if(json=="E200"){
				alert("회원가입이 되셨습니다.");
				if(uid){
					$.ajax({
						type: 'POST',
						//url: 'http://nabis.bizq.kr/membership/register',
						//url: 'http://192.168.1.168:8080/api/v1/association/industrial/complex',
						url: 'http://api.nabs.kr/api/v1/association/industrial/complex?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
						data: formData,
						cache: false,
						processData: false,
						contentType: false,
						headers: {'auth_token':'ehdskavkdnjxpr20186315650033dbfldzmssil'},
						beforeSend:function(request){
							request.setRequestHeader("auth_token", 'ehdskavkdnjxpr20186315650033dbfldzmssil');
						},
						success: function(json){
							console.log(json)
						}
						,complete:function(){
							location.href="/index.php/Main";
						}
					});
				}
			}else{
				alert("등록 실패 되었습니다.");
			}
		}
		,complete:function(){

				
		}
	});
}

</script>
</body>
</html>
