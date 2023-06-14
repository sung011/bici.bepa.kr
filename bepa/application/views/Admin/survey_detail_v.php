<?php
include $_SERVER['DOCUMENT_ROOT'].'/application/views/Admin/head/admin_header.php';

$name = [];
for ($j = 0; $j < count($result_list); $j ++){
	if($result_list[$j]['survey_type'] != 'text'){
		array_unshift($name,$result_list[$j]['response']);
	}
}

?>

<link rel="stylesheet" href="/assets/css/jquery-ui.css">
<link rel="stylesheet" href="/assets/css/table.css"> 
<link rel="stylesheet" href="/assets/css/inforead.css"> 

<style>
.bg-primary {
	background-color: #007bff !important;
}

.d-none {
	display: none !important;
}

.card, .card-group {
	border: 1px solid #dfdfdf;
	background: #ffffff;
}

.list-group-item > .badge {
	float: none;
}

.progress-bar {
	background-color: #007bff;
	color: #fff;
	display: -ms-flexbox;
	display: flex;
	-ms-flex-align: center;
	align-items: center;
	-ms-flex-pack: center;
	justify-content: center;
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
										<div class="card-body">
											<h4 class="header-title">설문지 제목: <?= $item->survey_title ?></h4>
										</div>
									</div>
									<div class="card">
										<div class="card-body">

											<?php
												$n = 0;
												for ($i = 0;$i<count($production_item) ;$i++){
													?>
													<h5 class="mb-3">질문 내용: <?= $production_item[$i]['survey_subtitle'] ?></h5>
														<?php
															if($production_item[$i]['survey_type'] == 'text' ){
																for ($j = 0; $j < count($result_list); $j ++){
																	if ($result_list[$j]['survey_type'] == 'text'){
																		?>
																		<div class="row">
																			<div class="col-lg-12">
																				<p style="border: 1px solid #dfdfdf;padding: 10px">답변:<?= $result_list[$j]['response']?> </p>
																			</div>
																		</div>
																		<?php
																	}
																}
															}else{
																//echo count($name);
																for ($h = 0; $h < count($name);$h++ ){
																	if($name[$h] == $production_item[$i]['item1']){
																		$item1_total++;
																		$item1_per = (count($production_item[$i]['item1']) / $item1_total) * 100;
																	}else if ($name[$h] == $production_item[$i]['item2']){
																		$item2_total++;
																		$item2_per = (count($production_item[$i]['item2']) / $item2_total) * 100;
																	}else if($name[$h] == $production_item[$i]['item3']){
																		$item3_total++;
																		$item3_per = (count($production_item[$i]['item3']) / $item3_total) * 100;
																	}else if($name[$h] == $production_item[$i]['item4']){
																		$item4_total++;
																		$item4_per = (count($production_item[$i]['item4']) / $item4_total) * 100;
																	}else if ($name[$h] == $production_item[$i]['item5']){
																		$item5_total++;
																		$item5_per = (count($production_item[$i]['item5']) / $item5_total) * 100;
																	}
																}

																//echo $item2_total;
																//echo $name[$i];
																?>
																<ol class="list-group list-group-numbered" style="margin: 0px !important">
																	<li class="list-group-item <?= $production_item[$i]['item1'] !== '' ? 'd-block' : 'd-none' ?> <?= $result_list[$j]['item_sno'] === '1' ? 'text-danger' : '' ?>">
																		<?= $production_item[$i]['item1'] ?>
																		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item1_total ?></span>
																		<div class="progress" style="margin-bottom: 0px">
																			<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item1_per ?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</li>
																	<li class="list-group-item <?= $production_item[$i]['item2'] !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '2' ? 'text-danger' : '' ?>">
																		<?= $production_item[$i]['item2'] ?>
																		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item2_total ?></span>
																		<div class="progress" style="margin-bottom: 0px">
																			<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item2_per ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</li>
																	<li class="list-group-item <?= $production_item[$i]['item3'] !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '3' ? 'text-danger' : '' ?>">
																		<?= $production_item[$i]['item3'] ?>
																		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item3_total ?></span>
																		<div class="progress" style="margin-bottom: 0px">
																			<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item3_per ?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</li>
																	<li class="list-group-item <?= $production_item[$i]['item4'] !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '4' ? 'text-danger' : '' ?>">
																		<?= $production_item[$i]['item4'] ?>
																		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item4_total ?></span>
																		<div class="progress" style="margin-bottom: 0px">
																			<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item4_per ?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</li>
																	<li class="list-group-item <?= $production_item[$i]['item5'] !== '' ? 'd-block' : 'd-none' ?> <?= $result_item->item_sno === '5' ? 'text-danger' : '' ?>">
																		<?= $production_item[$i]['item5'] ?>
																		<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?= $item5_total ?></span>
																		<div class="progress" style="margin-bottom: 0px">
																			<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?= $item5_per ?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
																		</div>
																	</li>
																</ol>

																<?php

															}

														?>
													<?php
													unset($item1_total);
													unset($item2_total);
													unset($item3_total);
													unset($item4_total);
													unset($item5_total);
												}
											?>

											<!--<h5 class="mb-3">질문 내용: <?/*= $production_item->survey_subtitle */?></h5>
											<?php /*if ($production_item->survey_type === 'text'): */?>
												<?php /*foreach ($result_list as $result_item): */?>
													<div class="row">
														<div class="col-lg-12">
															<p style="border: 1px solid #dfdfdf;padding: 10px">답변: <?/*= $result_item->response */?></p>
														</div>
													</div>
												<?php /*endforeach */?>
											<?php /*else: */?>
												<ol class="list-group list-group-numbered" style="margin: 0px !important">
													<li class="list-group-item <?/*= $production_item->item1 !== '' ? 'd-block' : 'd-none' */?> <?/*= $result_item->item_sno === '1' ? 'text-danger' : '' */?>">
														<?/*= $production_item->item1 */?>
														<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?/*= $item1_total */?></span>
														<div class="progress" style="margin-bottom: 0px">
															<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?/*= $item1_per */?>%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</li>
													<li class="list-group-item <?/*= $production_item->item2 !== '' ? 'd-block' : 'd-none' */?> <?/*= $result_item->item_sno === '2' ? 'text-danger' : '' */?>">
														<?/*= $production_item->item2 */?>
														<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?/*= $item2_total */?></span>
														<div class="progress" style="margin-bottom: 0px">
															<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?/*= $item2_per */?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</li>
													<li class="list-group-item <?/*= $production_item->item3 !== '' ? 'd-block' : 'd-none' */?> <?/*= $result_item->item_sno === '3' ? 'text-danger' : '' */?>">
														<?/*= $production_item->item3 */?>
														<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?/*= $item3_total */?></span>
														<div class="progress" style="margin-bottom: 0px">
															<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?/*= $item3_per */?>%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</li>
													<li class="list-group-item <?/*= $production_item->item4 !== '' ? 'd-block' : 'd-none' */?> <?/*= $result_item->item_sno === '4' ? 'text-danger' : '' */?>">
														<?/*= $production_item->item4 */?>
														<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?/*= $item4_total */?></span>
														<div class="progress" style="margin-bottom: 0px">
															<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?/*= $item4_per */?>%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</li>
													<li class="list-group-item <?/*= $production_item->item5 !== '' ? 'd-block' : 'd-none' */?> <?/*= $result_item->item_sno === '5' ? 'text-danger' : '' */?>">
														<?/*= $production_item->item5 */?>
														<span class="badge rounded-pill bg-primary text-white d-inline-block ml-1"><?/*= $item5_total */?></span>
														<div class="progress" style="margin-bottom: 0px">
															<div class="progress-bar progress-bar-striped" role="progressbar" style="width: <?/*= $item5_per */?>%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
														</div>
													</li>
												</ol>
											--><?php /*endif */?>
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
