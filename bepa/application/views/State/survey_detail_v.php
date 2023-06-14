<?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/header.php'; ?>

<?php
$item1 = $item1_total;
$item2 = $item2_total;
$item3 = $item3_total;
$item4 = $item4_total;
$item5 = $item5_total;

$total = $item1 + $item2 + $item3 + $item4 + $item5; 

$item1_per = ($item1 / $total) * 100;
$item2_per = ($item2 / $total) * 100;
$item3_per = ($item3 / $total) * 100;
$item4_per = ($item4 / $total) * 100;
$item5_per = ($item5 / $total) * 100;
?>

<link rel="stylesheet" href="<?= base_url('assets/css/complex.css') ?>">
<style>
    .font22 {
        font-size: 22px;
    }

    .sus-stitle {
        font-size: 18px;
        text-align: left;
        color: #005bb0;
    }

    .font15 {
        font-size: 15px !important;
    }
</style>

<!-- Features -->
<div class="features">
    <div class="container">

        <div class="row features_row sub_feat_row">
            <!-- Features Item -->
            <div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
                <!-- left menu -->
                <?php include $_SERVER['DOCUMENT_ROOT'].'/application/views/common/left_menu.php'; ?>
            </div>

            <!-- Features Item -->
            <div class="col-lg-9 col-xs-12 feature_col block_pad" style="background:#fff;" >
                <div class="notice_title">
                    <h2><?php echo $co_subject; ?></h2>
                    <!-- Home -->
                    <div class="home-sub">
                        <div class="breadcrumbs_container">
                            <div class="row">
                                <div class="col">
                                    <div class="breadcrumbs">
                                        <ul>
                                            <li>기업 경영 실태 조사</li>
                                            <li><?php echo $co_subject; ?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                	<div class="card mb-3">
					  	<div class="card-body">
					    	<h4 class="header-title">설문지 제목: <?= $item->survey_title ?></h4>
					  	</div>
					</div>

					<div class="card">
					  	<div class="card-body">
					    	<h5 class="mb-3">질문 내용: <?= $production_item->survey_subtitle ?></h5>
					  	
					  		<?php if ($production_item->survey_type == 'text'): ?>
					  		    <?php if (empty($production_item)): ?>
                                    <p>설문조사에 참여해주세요.</p>
                                <?php else: ?>
                                    <p>답변: <?= $result_item->response ?></p>
                                <?php endif ?>   
					  		<?php else: ?>
					  			<ol class="list-group list-group-numbered">
								  	<li class="list-group-item <?= $production_item->item1 !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '1' ? 'text-danger' : '' ?>">
								  		<?= $production_item->item1 ?>							  		
								  		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item1_total ?></span>
								  		<div class="progress">
					  						<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item1_per ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
								  	</li>
								  	<li class="list-group-item <?= $production_item->item2 !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '2' ? 'text-danger' : '' ?>">
								  		<?= $production_item->item2 ?>						  		
								  		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item2_total ?></span>
								  		<div class="progress">
										  	<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item2_per ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
								  	</li>
								  	<li class="list-group-item <?= $production_item->item3 !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '3' ? 'text-danger' : '' ?>">
								  		<?= $production_item->item3 ?>
								  		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item3_total ?></span>	
								  		<div class="progress">
										  	<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item3_per ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
								  	</li>
								  	<li class="list-group-item <?= $production_item->item4 !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '4' ? 'text-danger' : '' ?>">
								  		<?= $production_item->item4 ?>
								  		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item4_total ?></span>
								  		<div class="progress">
										  	<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item4_per ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
										</div>	
								  	</li>
								  	<li class="list-group-item <?= $production_item->item5 !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '5' ? 'text-danger' : '' ?>">
								  		<?= $production_item->item5 ?>
								  		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item5_total ?></span>	
								  		<div class="progress">
										  	<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item5_per ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
								  	</li>
								</ol>
					  		<?php endif ?>
					  	</div>
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
                if(result == '1'){
                    alert('참여해 주셔셔 감사합니다.');
                    location.href="/State/survey";
                }

            }
            ,complete:function(){}
        });
    }
</script>
</body>
</html>