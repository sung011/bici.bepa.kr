<?php
include $_SERVER['DOCUMENT_ROOT']."/application/views/common/header.php";
$admin_gu = '1';
?>

<link rel="stylesheet" href="/application/views/common/css/complex.css"> 

	<!-- Features -->
	<div class="features">
		<div class="container">

			<div class="row features_row sub_feat_row">	
				<!-- Features Item-->
				<div class="col-lg-3 feature_col block_pad m-hidden" style="min-height:50vh;background:#fff;">
					<?php
						include $_SERVER['DOCUMENT_ROOT']."/application/views/common/left_menu.php";
					?>
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
												<li>단지안내</li>
												<li><?php echo $co_subject; ?></li>
											</ul>
										</div>
									</div>
								</div>
							</div>			
						</div>	
					</div>
					
					<div class="notice_table complex-block" >
						<?php echo $co_content; ?>
						
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
</script>
</body>
</html>