<?php
include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php';

if ($wr_3 == '공지') {
	$btype = '<span class="ntype ntype_1">'.$wr_3.'</span>';
} else if ($wr_3 == '진행') {
	$btype = '<span class="ntype ntype_2">'.$wr_3.'</span>';
} else if ($wr_3 == '마감') {
	$btype = '<span class="ntype ntype_3">'.$wr_3.'</span>';
} else {
	$btype = $wr_3;
}
?>

<link rel="stylesheet" href="<?= base_url('assets/css/table.css'); ?>"> 
<link rel="stylesheet" href="<?= base_url('assets/css/inforead.css'); ?>"> 

<style>
.view-content p {
	color: #252525;
}

.btn-e-white {
	cursor: pointer;
}
</style>
	<!-- Home -->
	<div class="home-sub">
		<div class="breadcrumbs_container">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="breadcrumbs">
							<ul>
								<li>알림마당</li>
								<li><?= $wr_title ?></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</div>
	<!-- Features -->
	<div class="features">
		<div class="container">
			<div class="row features_row">	
				<!-- Features Item -->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="background: #fff;min-height: 50vh">
					<!-- left menu -->
					<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>				
				</div>
				<!-- Features Item -->
				<div class="col-xs-12 col-lg-9 feature_col block_pad" style="background: #fff">
					<div class="notice_title" style="margin: 10px 0px">
						<h2 style="border: none"><?= $wr_title ?></h2>
					</div>		
					<div class="notice-block2 board-view" style="padding: 10px">				
						<h4 class="h4-stitle">
							<?php if ($ca_name) {
								echo '['.$ca_name.']';
							} ?>
							<?= $wr_subject ?>
						</h4>
						<div class="view-top-btn" style="padding: 10px">
							<ul class="top-btn-right pull-right list-unstyled">
								<?php if ($prevbtn): ?>
									<li><a href="/index.php/info/read?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $prevbtn; ?>" class="btn-e btn-e-white" type="button">이전글</a></li>
								<?php endif ?>
								<?php if ($nextbtn): ?>
									<li><a href="/index.php/info/read?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $nextbtn; ?>" class="btn-e btn-e-white" type="button">다음글</a></li>
								<?php endif ?>
								<!-- <?php if ($this->session->userdata('mb_level') == '10' && $this->session->userdata('mb_id')): ?>
									<li><a href="javascript:notice_uwrite();" class="btn-e btn-e-white" type="button">수정</a></li>
									<li><a href="javascript:read_del();" class="btn-e btn-e-white" type="button">삭제</a></li>
								<?php endif ?> -->
								<li><a href="<?php echo $return_url; ?>" class="btn-e btn-e-white" type="button">목록</a></li>
								<!-- <?php if ($this->session->userdata('mb_level') == '10' && $this->session->userdata('mb_id')): ?>
									<li><a href="javascript:notice_rewrite();" class="btn-e btn-e-white" type="button">답변</a></li>
									<li><a href="javascript:notice_write();" class="btn-e btn-e-white" type="button">글쓰기</a></li>
								<?php endif ?> -->
							</ul>
							<div class="clearfix"></div>
						</div>



						<?php if ($read_table != 'ym_notice'): ?>
							<div class="board-view-info">
								<div class="view-info-box">
									<div class="info-box-top">
										<span class="view-nick"><?= $wr_name ?></span>
									</div>
									<div class="info-box-bottom">
										<span><i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?= $wr_datetime ?></span>
										<span><i class="fa fa-eye"></i>&nbsp;&nbsp;<?= $wr_hit?></span>
									</div>
								</div>
						    </div>
							<div class="board-view-link">
								<ul class="list-unstyled">
									<li>
										<span style="float: left">- 관련링크 : <a href="/index.php/Info/UrlLink?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>" target="_blank"><?php echo $wr_link1; ?></a></span>
										<span style="float: right"><?php echo $wr_link1_hit; ?>회 연결</span>
										<div class="clearfix"></div>
									</li>
								</ul>
							</div>
						<?php endif ?>
						<?php if ($read_table == 'ym_notice'): ?>
							<div class="board-view-info">
								<div class="view-info-box">
									<div class="info-box-top"><span class="view-nick"><?= $btype ?></span>
                                    &nbsp;&nbsp; 기간: <?php if ($wr_1) { echo $wr_1; } else { echo $wr_last; } ?><?php if ($wr_2) echo ' ~ '.$wr_2; ?>
                                </div>
								<div class="info-box-bottom">
									<span><i class="fa fa-eye"></i>&nbsp;&nbsp;<?php echo $wr_hit; ?></span>
								</div>
							</div>
					    </div>



                        <div class="pull-left" style="width: 100%;font-size: 11px">
                            - 관련링크 : <a href="<?php echo $wr_link1; ?>" target="_blank" class="view_file_download" style="font-size: 11px"><?php echo $wr_link1; ?></a>
                            </div>
						<?php endif ?>
						<?php if ($wr_file > 0) {
							for ($i = 0; $i < 4; $i++) {
								if (isset($bf_source[$i])) {
									$bf_filesize[$i] = $bf_filesize[$i] / 1024;
						?>
							<div class="board-view-file">
								<ul class="list-unstyled">
									<li>
										<span style="float: left">- 첨부파일: <strong><?php echo $bf_source[$i]; ?></strong> (<?php echo round($bf_filesize[$i],2).'K'; ?>) - 
										<a href="/index.php/api/Download?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>&no=<?php echo $bf_no[$i]; ?>" class="view_file_download"><u>다운로드</u></a>
										</span>
										<span style="float: right">&nbsp;<i class="fa fa-download"></i>&nbsp;<?php echo $bf_download[$i]; ?></span>
										<span style="float: right">&nbsp;<i class="fa fa-clock-O"></i>&nbsp;<?php echo $bf_datetime[$i]; ?></span>
										<div class="clearfix"></div>
									</li>															
								</ul>
							</div>
						<?php }}} ?>
						<div class="board-view-atc">
							<div class="board-view-con view-content">
								<?php echo $wr_content; ?>
							</div>
						</div>
						<?php if ($read_table != 'ga_form'): ?>
							<ul class="board-view-sns social-icons social-icons-color">
								<li><a href="https://www.facebook.com/sharer?u=http%3A%2F%2Fsnic.bizq.kr%2Finfo%2Fread%3Fbo_table%3D<?php echo $read_table;?>%26wr_id%3D<?php echo $wr_id; ?>" target="_blank" title="Facebook" class="social_facebook"></a></li>
								<li><a href="https://twitter.com/intent/tweet?text=http%3A%2F%2Fsnic.bizq.kr%2Finfo%2Fread%3Fbo_table%3D<?php echo $read_table;?>%26wr_id%3D<?php echo $wr_id; ?>" target="_blank" title="Twitter" class="social_twitter"></a></li>
								<li><a href="https://story.kakao.com/share?url=http%3A%2F%2Fsnic.bizq.kr%2Finfo%2Fread%3Fbo_table%3D<?php echo $read_table;?>%26wr_id%3D<?php echo $wr_id; ?>" target="_blank" title="Kakao Story" class="social_kakaostory"></a></li>
								<li><a href="https://band.us/plugin/share?body=http%3A%2F%2Fsnic.bizq.kr%2Finfo%2Fread%3Fbo_table%3D<?php echo $read_table;?>%26wr_id%3D<?php echo $wr_id; ?>" target="_blank" title="Band" class="social_band"></a></li>
							</ul>
						<?php endif ?>
						<div class="view-area-divider"><span class="divider-circle"></span></div>
					</div>
					<!-- <?php if ($this->session->userdata('mb_level') > '2'): ?>
						<div class="eotrmf">
							<h4 class="h4-stitle">댓글 목록</h4>
							<div id="eotrmf_comment"></div>
							<h4 class="h4-stitle">댓글 쓰기</h4>
							<div class="row">
	                            <section class="col col-4">
									<div class="inline-group">
										<label class="checkbox"><input type="checkbox" id="wr_secret" name="wr_secret" value="secret"><i></i>비밀글 사용</label>
								    </div>
								</section>
							</div>
							<div class="box box-success box-solid">
								<div class="box-header with-border">
								  	<h3 class="box-title">Note: 댓글은 자신을 나타내는 얼굴입니다. 무분별한 댓글, 욕설, 비방 등을 삼가하여 주세요.</h3>
								  	<div class="box-tools pull-right"></div>
								</div>
								<div class="box-body">
									<textarea rows="7" id="read_comment" name="read_comment" style="border: 1px solid #ddd;width: 100%;padding: 5px"></textarea>
								</div>
								<div class="box-footer" style="text-align: center">
									<button type="button" class="btn btn-success" onclick="comment_write();">댓글 달기</button>
								</div>
							</div>
						</div>
					<?php endif ?> -->
				</div>
			</div>
		</div>
	</div>
	<!-- footer -->
	<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/footer.php'; ?>

<div id="CommonModal" class="modal fade" role="dialog">
  	<div class="modal-dialog popup-dialog" style="width: 700px">
    	<div class="modal-content">
      		<div class="modal-header popup-header">
				댓글 수정
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          			<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body" style="text-align: center">
				<input type="hidden" id="co_id" name="co_id">
				<textarea id="modify_comment" name="modify_comment" style="border: 1px solid #ddd;width: 100%;padding: 5px" rows="7"></textarea>
      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-primary" onclick="comment_write();">수정하기</button>
      		</div>
    	</div>
  	</div>
</div>

<script>
function notice_rewrite() {
	var bo_table = '<?php echo $read_table;?>';
	
	if (bo_table == 'ym_notice') {
		location.href = '/index.php/info/nwrite?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>&ans=re';
	} else {
		location.href = '/index.php/info/cwrite?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>&ans=re';
	}
}

function notice_uwrite() {
	var bo_table = '<?php echo $read_table; ?>';

	if (bo_table == 'ym_notice') {
		location.href = '/index.php/info/nwrite?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>';
	} else {
		location.href = '/index.php/info/cwrite?bo_table=<?php echo $read_table; ?>&wr_id=<?php echo $wr_id; ?>';
	}
}

function notice_write() {
	var bo_table = '<?php echo $read_table; ?>';
	
	if (bo_table == 'ym_notice') {
		location.href = '/index.php/info/nwrite?bo_table=<?php echo $read_table; ?>';
	} else {
		location.href = '/index.php/info/cwrite?bo_table=<?php echo $read_table; ?>';
	}
}

function comment_write() {
	var wr_id = '<?php echo $wr_id; ?>';
	var bo_table = '<?php echo $read_table; ?>'; 
	var co_id = $('#co_id').val();
	var read_comment = '';

	if (co_id) {
		read_comment = $('#modify_comment').val();
	} else {
		read_comment = $('#read_comment').val();
	}

	if (read_comment) {
		$.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/index.php/Info/eotrmfWrite',
			data: {
				'wr_id': wr_id,
				'bo_table': bo_table,
				'co_id': co_id,
				'wr_comment': read_comment
			},
			cache: false,
			beforeSend: function () { 	
			},
			success: function (json) {				
				if (json == 'E200') {
					if (co_id) {
						$('#CommonModal').modal('hide');
					}

					$('#read_comment').val('');	
					$('#co_id').val('');
					$('#modify_comment').val('');
					 
					comment_read();
				} else {
					alert('댓글 등록 실패.');

					if (co_id) {
						$('#CommonModal').modal('hide');
					}

					$('#read_comment').val('');	
					$('#co_id').val('');
					$('#modify_comment').val('');
				}
			}
			,complete:function(){			 
			}
		});
	} else {
		alert('댓글을 입력해주세요.');
		return false;
	}
}

function comment_read() {
	var wr_id = '<?php echo $wr_id; ?>';
	var bo_table = '<?php echo $read_table; ?>';
	var set_content = '';
	
	$.ajax({
		type: 'POST',
		dataType: 'json',
		url: '/index.php/Info/eotrmfRead',
		data: {
			'wr_id': wr_id,
			'bo_table': bo_table,
		},
		cache: false,
		beforeSend: function () {	
		},
		success: function (json) {				
			if (json == 'E500') {
				set_content += '<div class="difda-block">';		
				set_content += '<i class="fa fa-exclamation-circle"></i>&nbsp;등록된 댓글이 없습니다.';		
				set_content += '</div>';
				$('#eotrmf_comment').html(set_content);	
				return false;
		    } else { 
			    var list_array = json;
			    var list_total = list_array.length;			      
			  
			    for (i = 0; i < list_total; i++) {
				  	var co_id = list_array[i]['co_id'];
				  	var bo_table = list_array[i]['bo_table'];
				  	var wr_id = list_array[i]['wr_id'];
				  	var co_datetime = list_array[i]['co_datetime'];
				  	var wr_comment = list_array[i]['wr_comment'];
				  	var mb_id = list_array[i]['mb_id'];
				  	var mb_name = list_array[i]['mb_name'];
					
					set_content += '<div class="difda-block2">';
					set_content += '<p><span class="comment-name">' + mb_name + '</span>&nbsp;&nbsp;<i class="fa fa-clock-o"></i>&nbsp;' + co_datetime + '</p>';	
					set_content += '<p>' + wr_comment + '</p>';
					set_content += '<p style="text-align: right">';
					set_content += '<button type="button" class="btn btn-warning btn-difda" onclick="modify_display(\'' + co_id + '\');">수정</button>&nbsp;&nbsp;';
					set_content += '<button type="button" class="btn btn-danger btn-difda" onclick="comment_del(\'' + co_id + '\');">삭제</button></p>';
					set_content += '</div>';		  
			  	}	              
			  
			  	$('#eotrmf_comment').html(set_content);		
		    }
		}
		,complete:function(){			 
		}
	});
}

function modify_display(coid) {
	$('#co_id').val(coid);
	$('#CommonModal').modal('show');
}

function comment_del(coid) {
    var wr_id = '<?php echo $wr_id; ?>';
    var bo_table = '<?php echo $read_table; ?>';
   
    $.ajax({
		type: 'POST',
		dataType: 'json',
		url: '/index.php/Info/eotrmfDel',
		data: {
			'wr_id': wr_id,
			'bo_table': bo_table,
			'co_id': coid
		},
		cache: false,
		beforeSend: function () {	
		},
		success: function(json) {
			if (json == 'E200') {
				comment_read();
			} else {			
			}
		}
		,complete: function () {			 
		}
	});
}

function read_del() {
    var con_test = confirm('해당 게시판을 삭제하시겠습니까?');
   
    if (con_test == true) {
	    var wr_id = '<?php echo $wr_id; ?>';
	    var bo_table = '<?php echo $read_table; ?>';

	    $.ajax({
			type: 'POST',
			dataType: 'json',
			url: '/index.php/Info/tkrwp',
			data: {
				'wrid': wr_id,
				'bo_table': bo_table
			},
			cache: false,
			beforeSend: function () {	
			},
			success: function (json) {
				if (json == 'E200') {
					alert('삭제 되었습니다.');
					location.replace('<?php echo $return_url; ?>');
				} else {
					alert('전산장애로 삭제 실패하였습니다.');
				}
			}
			,complete: function () {			 
			}
		});
    } else {
    }
}
	
$('document').ready(function () {        
	comment_read();
});
</script>
</body>
</html>