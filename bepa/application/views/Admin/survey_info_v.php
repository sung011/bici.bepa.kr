<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php'; ?>



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


<style>
.bg-primary {
	background-color: #007bff !important;
}

.d-none {
	display: none !important;
}

.card, .card-group {
	border: 1px solid #dfdfdf;
	/*border-radius: 5px;*/
	background: #ffffff;
	/*margin-bottom: 30px;*/
}
</style>

	<section class="content">
        <div class="row"> 
            <div class="col-xs-12 col-lg-12" style="padding: 0px">   
                <div class="group_box_wrap col-lg-12" style="padding: 0px;margin: 0px">
                    <div class="group_box col-lg-12" style="display: flex;justify-content: space-between">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title box-stitle" style="color: #004195"><?= $Title2 ?></h3>                           
                            </div>
                            <div class="box-body" style="min-height: 70vh;padding: 1em">      
								<div class="notice-block2 board-view" style="margin: 0px">
									<div class="card">
										<div class="card-body" style="width: 50%">
											


											<!-- <h4 class="header-title">설문지 제목: <?= $item->survey_title ?></h4> -->

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
                                                                                    <input id="item1_<?=$t?>" name="s_answer_<?=$t?>" type="radio" value="<?=$sudetails[$t]['item1']?>|1">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item2']) && $sudetails[$t]['item2'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item2_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item2']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item2_<?=$t?>" name="s_answer_<?=$t?>" type="radio" value="<?=$sudetails[$t]['item2']?>|2">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item3']) && $sudetails[$t]['item3'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item3_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item3']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item3_<?=$t?>" name="s_answer_<?=$t?>" type="radio" value="<?=$sudetails[$t]['item3']?>|3">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item4']) && $sudetails[$t]['item4'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item4_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item4']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item4_<?=$t?>" name="s_answer_<?=$t?>" type="radio" value="<?=$sudetails[$t]['item4']?>|4">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item5']) && $sudetails[$t]['item5'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item5_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item5']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item5_<?=$t?>" name="s_answer_<?=$t?>" type="radio" value="<?=$sudetails[$t]['item5']?>|5">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    <?php } ?>
                                                                    <?php if($sudetails[$t]['survey_type']=="checkbox"){?>
                                                                        <?php if(isset($sudetails[$t]['item1']) && $sudetails[$t]['item1'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item1_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item1']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item1_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" value="<?=$sudetails[$t]['item1']?>|1">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item2']) && $sudetails[$t]['item2'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item2_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item2']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item2_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" value="<?=$sudetails[$t]['item2']?>|2">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item3']) && $sudetails[$t]['item3'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item3_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item3']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item3_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" value="<?=$sudetails[$t]['item3']?>|3">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item4']) && $sudetails[$t]['item4'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item4_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item4']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item4_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" value="<?=$sudetails[$t]['item4']?>|4">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                        <?php if(isset($sudetails[$t]['item5']) && $sudetails[$t]['item5'] != ''){?>
                                                                            <div class="form-group row">
                                                                                <label for="item5_<?=$t?>" class="col-lg-3 col-form-label font15"><?=$sudetails[$t]['item5']?></label>
                                                                                <div class="col-lg-9">
                                                                                    <input id="item5_<?=$t?>" name="s_answer_<?=$t?>[]" type="checkbox" value="<?=$sudetails[$t]['item5']?>|5">
                                                                                </div>
                                                                            </div>
                                                                        <?php }?>
                                                                    <?php } ?>
                                                                    <?php if($sudetails[$t]['survey_type']=="text"){?>

                                                                        <div class="form-group row">
                                                                            <div class="col-lg-12">
                                                                                <input id="item1_<?=$t?>" name="s_answer_<?=$t?>" type="text">
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
                                                                <div class="col-lg-12">
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


                                            </form>
										


										</div>
									</div>
									
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




<script>
function survey_submit() {
    var frm = document.survey_form;
    var formData = new FormData(frm);
    
    $.ajax({
        method: 'POST',
        url: '/index.php/State/survey_submit_ajax',
        // url: '/index.php/SuAdmin/survey_submit_ajax',
        data: formData,
        cache: false,
        processData: false,
        contentType: false,
        beforeSend: function () {},
        success: function (result) {
            if (result == '1') {
                alert('참여해 주셔셔 감사합니다.');
                // location.href="/index.php/State/survey";
                location.href = '/index.php/SuAdmin/Survey';
            }

        }
        , complete: function () {}
    });
}
</script>