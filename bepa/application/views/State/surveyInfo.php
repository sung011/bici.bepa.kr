<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";

?>

<link rel="stylesheet" href="<?= base_url('assets/css/complex.css') ?>">
<style>
    .font22{
        font-size:22px;
    }
    .sus-stitle{
        font-size:18px;
        text-align:left;
        color:#005bb0;
    }
    .font15{
        font-size:15px !important;
    }
</style>
<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <?php
                include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
                ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
                <!--
                <div class="board-title-image">
                    <div class="board-title-caption">
                        <h2 >단지안내</h2>
                        <span class="board_tit_info">성남산업단지관리공단에 대하여 안내 드립니다.</span>
                    </div>
                </div>
                -->

                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>기업 실태 조사</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="notice_table complex-block" >
                    <div class="page-content">

                        <div class="container-fluid">
                            <!-- Page-Title -->
                            <!--<div class="row">
                                <div class="col-sm-12">
                                    <div class="page-title-box">

                                        <h4 class="page-title">설문지 조사</h4>
                                    </div>
                                </div>
                            </div>-->
                            <!-- end page title end breadcrumb -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="mt-0 header-title font22"><?=$suheaders['survey_title']?></h4>
                                            <p class="text-muted mb-3">설문지 조사에 참여해 주셔셔 감사합니다.</p>

                                            <form name="survey_form" id="form-horizontal" class="form-horizontal form-wizard-wrapper">
                                                <input type="hidden" name="survey_idx" value="<?=$suheaders['survey_idx']?>">
                                                <?php

                                                $total_cnt = count($sudetails);
                                                //var_dump($total_cnt);
                                                $paging_cnt = ceil($total_cnt/$suheaders['inquery_cnt']);
                                                //$paging_cnt = $total_cnt;
                                                //var_dump($suheaders['inquery_cnt']);
                                                $last_cnt = $total_cnt % $suheaders['inquery_cnt'];

                                                for($i=0;$i<$paging_cnt;$i++){
                                                    $sno = $i + 1;
                                                    ?>
                                                    <!--<h3>Step <?/*=$sno*/?></h3>-->
                                                    <fieldset>
                                                        <?php
                                                        if(($sno == $paging_cnt) && ($last_cnt != 0)){
                                                            $inquery_total = $last_cnt;
                                                        }else{
                                                            $inquery_total = $suheaders['inquery_cnt'];
                                                        }
                                                        for($j=0;$j<$inquery_total;$j++){
                                                            if($i > 0){
                                                                $t = ($i * $suheaders['inquery_cnt']) + $j;
                                                            }else{
                                                                $t = $j;
                                                            }
                                                            $sur_sno = $t + 1;
                                                            $sudetails[$t]['survey_subtitle'] = (isset($sudetails[$t]['survey_subtitle'])) ? $sudetails[$t]['survey_subtitle'] : '';
                                                            ?>
                                                            <input type="hidden" name="company_idx[]" value="<?=$sudetails[$t]['company_idx']?>">
                                                            <input type="hidden" name="survey_type[]" value="<?=$sudetails[$t]['survey_type']?>">
                                                            <input type="hidden" name="survey_subtitle[]" value="<?=$sudetails[$t]['survey_subtitle']?>">
                                                            <input type="hidden" name="buid" value="<?=$this->session->userdata('buid')?>">
                                                            <input type="hidden" name="muid" value="<?=$this->session->userdata('muid')?>">

                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group row">
                                                                        <p class="col-lg-12 sus-stitle"><?=$sur_sno?>.&nbsp;<?=$sudetails[$t]['survey_subtitle']?></p>
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-12">
                                                                    <?php if($sudetails[$t]['survey_type']=="radio"){?>
                                                                        <?php if(isset($sudetails[$t]['item1']) && $sudetails[$t]['item1'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item1_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item1']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item1_<?=$t?>" name="s_answer_<?=$t?>" type="radio" class="form-control" value="<?=$sudetails[$t]['item1']?>|1">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item2']) && $sudetails[$t]['item2'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item2_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item2']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item2_<?=$t?>" name="s_answer_<?=$t?>" type="radio" class="form-control" value="<?=$sudetails[$t]['item2']?>|2">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item3']) && $sudetails[$t]['item3'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item3_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item3']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item3_<?=$t?>" name="s_answer_<?=$t?>" type="radio" class="form-control" value="<?=$sudetails[$t]['item3']?>|3">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item4']) && $sudetails[$t]['item4'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item4_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item4']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item4_<?=$t?>" name="s_answer_<?=$t?>" type="radio" class="form-control" value="<?=$sudetails[$t]['item4']?>|4">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item5']) && $sudetails[$t]['item5'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item5_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item5']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item5_<?=$t?>" name="s_answer_<?=$t?>" type="radio" class="form-control" value="<?=$sudetails[$t]['item5']?>|5">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    <?php } ?>
                                                                    <?php if($sudetails[$t]['survey_type']=="checkbox"){?>
                                                                        <?php if(isset($sudetails[$t]['item1']) && $sudetails[$t]['item1'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item1_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item1']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item1_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" class="form-control" value="<?=$sudetails[$t]['item1']?>|1">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item2']) && $sudetails[$t]['item2'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item2_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item2']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item2_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" class="form-control" value="<?=$sudetails[$t]['item2']?>|2">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item3']) && $sudetails[$t]['item3'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item3_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item3']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item3_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" class="form-control" value="<?=$sudetails[$t]['item3']?>|3">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item4']) && $sudetails[$t]['item4'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item4_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item4']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item4_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" class="form-control" value="<?=$sudetails[$t]['item4']?>|4">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item5']) && $sudetails[$t]['item5'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item5_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item5']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item5_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" class="form-control" value="<?=$sudetails[$t]['item5']?>|5">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    <?php } ?>
                                                                    <?php if($sudetails[$t]['survey_type']=="text"){?>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12">
                                                                                <input id="item1_<?=$t?>" name="s_answer_<?=$t?>" type="text" class="form-control" >
                                                                            </div>
                                                                        </div>


                                                                    <?php } ?>
                                                                </div>
                                                            </div>

                                                            <?php
                                                        }
                                                        if($sno == $paging_cnt){
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <button type='button' class='btn btn-info' style="width:50%;" onclick="survey_submit();">제출</button>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>
                                                    </fieldset>

                                                    <?php
                                                }
                                                ?>


                                            </form><!--end form-->
                                        </div><!--end card-body-->
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->



                        </div><!-- container -->


                    </div>

                </div>


            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<?php
include $_SERVER['DOCUMENT_ROOT'] . '/application/views/common/footer.php';
?>
<script>
    function survey_submit(){
        var frm = document.survey_form;
        var formData = new FormData(frm);
		var arr = new Array();
		for (let value of formData){
			console.log(value);
		}

        $.ajax({
            method: 'POST',
            url: '/index.php/State/survey_submit_ajax',
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            beforeSend:function(){},
            success: function(result){
                console.log(result)
				var list_array = JSON.parse(result);
				var list_total = list_array.length;
				if (list_array[0]['success'] == '200') {
					var complex_survey_index = list_array[0]['complex_survey_index'];
					formData.append("complex_survey_index",complex_survey_index);					formData.append("association_type","5");
					formData.append("id","<?= $this->session->userdata('mb_email') ?>");

					console.log(list_array[0]['params'])
					console.log(list_array[0]['params']['muid'])

					arr = {
						'association_type':'5',
						'complex_survey_index':complex_survey_index,
						'id':'<?= $this->session->userdata('mb_email') ?>',
						'survey_type': list_array[0]['params']['survey_type'],
						'survey_subtitle': list_array[0]['params']['survey_subtitle'],
						's_answer_0': list_array[0]['params']['s_answer_0'],
						's_answer_1': list_array[0]['params']['s_answer_1'],
						's_answer_2': list_array[0]['params']['s_answer_2'],
					}

					console.log(arr);

					$.ajax({
						type: 'POST',
						//url: 'http://api.nabs.kr/api/v1/association/survey/take',
						url: 'http://api.nabs.kr/pi/v1/association/survey/take?auth_token=ehdskavkdnjxpr20186315650033dbfldzmssil',
						contentType: 'application/json; charset=utf-8',
						dataType   : 'json',
						data: JSON.stringify(arr),
						cache: false,
						processData: false,
						contentType: false,
						headers: {'auth_token':'ehdskavkdnjxpr20186315650033dbfldzmssil'},
						beforeSend:function(request){
							request.setRequestHeader("auth_token", 'ehdskavkdnjxpr20186315650033dbfldzmssil');
						},
						success: function(json){
							console.log(json);
						},
						complete:function(){
							alert('참여해 주셔셔 감사합니다.');
							location.href="/index.php/State/survey";
						}
					});
				}
            }
            ,complete:function(){}
        });
    }
</script>
</body>
</html>