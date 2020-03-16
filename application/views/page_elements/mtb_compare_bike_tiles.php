<?php
	// debug($page_data['compares'], 1); 
?>
<?php if (isset($page_data['compares']) AND $page_data['compares']): ?>
	<div class="grid-column column-50-50 mtb-compare-bike-tiles-parent">

		<!-- LOOP here -->
		<?php foreach ($page_data['compares'] as $key => $compare): ?>
			<a id="compare-<?php echo $compare['id'];?>" href="<?php echo $compare['compare_url'];?>">
				<div class="grid-column-item-gutter">
					<div class="box-item">
						<div class="box-item-body">
							<div class="grid-column column-50-50">
								<?php foreach ($compare['bike_data'] as $index => $bike): ?>
									<div class="mtb-item-model-inner">
										<img src="<?php echo base_url($bike['feat_photo']); ?>" class="mtb-item-image image-cropped cover" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
										<div class="text-center" style="padding:5px;">
											<p class="color-theme text-ellipsis" style="margin-bottom:5px;"><b><?php echo $bike['bike_model'];?></b></p>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd><?php echo $bike['share_count'];?></kbd></small>
											</button>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd><?php echo $bike['like_count'];?></kbd></small>
											</button>
										</div>
									</div>
									<?php if ($index == 0): ?>
										<span class="span-versus">vs</span>
									<?php endif ?>
								<?php endforeach ?>
							</div>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach ?>
		<!-- LOOP here -->

	</div>
<?php endif ?>