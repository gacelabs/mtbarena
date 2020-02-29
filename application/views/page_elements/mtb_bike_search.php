<?php // debug($page_data['bikes'], 1); ?>
<?php if (isset($page_data['bikes']) AND $page_data['bikes']): ?>
	<div class="grid-column column-50-50 mtb-compare-bike-tiles-parent">
		<!-- LOOP here -->
		<?php foreach ($page_data['bikes'] as $key => $bike): ?>
			<a id="compare-<?php echo $bike['id'];?>" href="<?php echo $bike['bike_url'];?>">
				<div class="grid-column-item-gutter">
					<div class="box-item">
						<div class="box-item-body">
							<div class="grid-column column-100">
								<div class="mtb-item-model-inner">
									<img src="<?php echo base_url($bike['feat_photo']); ?>" class="mtb-item-image image-cropped cover" alt="<?php echo ucwords($bike['bike_model']);?>">
									<div class="text-center" style="padding:5px 5px 10px 5px;">
										<p class="color-theme text-ellipsis" style="margin-bottom:5px;"><b><?php echo $bike['bike_model'];?></b></p>
										<button type="button" class="btn btn-xs btn-sq">
											<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
										</button>
										<button type="button" class="btn btn-xs btn-sq">
											<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</a>
		<?php endforeach ?>
		<!-- LOOP here -->
	</div>
<?php endif ?>