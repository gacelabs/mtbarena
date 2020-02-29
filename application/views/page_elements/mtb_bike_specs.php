
<?php if (isset($page_data['bikes']) AND $page_data['bikes']): ?>
	<?php
		// total number of bikes in comparison
		// value comes from bikes_to_compare in controller
		$bikeCount = $bikes_to_compare;
		// parse the class along .grid-column according to $bikeCount value
		$gridCountArr = ['column-100', 'column-50-50', 'column-33-33-33'];
	?>
	<div class="box-item">
		<div class="box-item-body-top" id="mtbCompareSpecs">
			<ul class="spaced-list between">
				<li class="text-left">
				<?php if ($bikeCount == 1) { ?>
					<p class="zero-gap color-theme"><b>Bike Model Full Specifications</b></p>
				<?php } elseif ($bikeCount == 2) { ?>
					<p class="zero-gap color-theme"><b>Head-To-Head Bike Full Specifications</b></p>
				<?php } elseif ($bikeCount == 3) { ?>
					<p class="zero-gap color-theme"><b>Triple Match Up Bike Full Specifications</b></p>
				<?php } ?>
				</li>

				<li class="text-right">
					<button type="button" class="btn btn-xs btn-sq">
						<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
					</button>
					<button type="button" class="btn btn-xs btn-sq">
						<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
					</button>
				</li>
			</ul>
		</div>

		<div class="box-item-body" id="mtbItemMainParent" style="padding-top:0;">
			<div class="mtb-item-specs-main-parent bikeStickyName">
				<div class="grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">

				<!-- LOOP here -->
				<?php foreach ($page_data['bikes'] as $key => $bike): ?>
					<div class="mtb-item-model-parent">
						<div class="mtb-item-model-inner">
							<img src="<?php echo base_url($bike['feat_photo']);?>" class="mtb-item-image image-cropped cover" alt="<?php echo ucwords($bike['bike_model']);?>">
							<div class="modelItemLabelBox">
								<input type="text" name="change_bike_input" class="mtb-item-model-name text-ellipsis form-control zero-gap changeBikeInput" placeholder="<?php echo ucwords($bike['bike_model']);?>">
								<span class="compare-search-icon"><i class="fa fa-search"></i></span>
								<p class="text-ellipsis zero-gap"><small class="color-lightgray mtb-item-model-spec-from">From: <?php echo $bike['store_name'];?> (Posted: <?php echo date('M Y', strtotime($bike['added']));?>)</small></p>
							</div>
						</div>
					</div>
				<?php endforeach ?>
				<!-- LOOP here -->

				</div>
			</div>

			<div class="mtb-main-parent" id="mtbMainParent">

				<!-- LOOP here -->
				<?php foreach ($page_data['bikes'] as $key => $bike): ?>
					<?php foreach ($bike as $field => $value): ?>
						<?php if (!in_array($field, ['id','user_id','bike_model','bike_url','store_name','feat_photo','spec_from','price','view_count','compare_count','added','updated'])): ?>
							<div class="mtb-item-specs-parent">
								<div class="mtb-item-spec-label <?php if ($bikeCount > 1) {echo "text-center";} ?>">
									<small class="color-theme mtb-item-spec-label-text"><?php echo str_replace('_', ' ', $field);?></small>
								</div>
								<div class="mtb-item-spec-desc grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">
									<?php for ($i=0; $i < $bikeCount; $i++): ?>
										<div class="mtb-item-spec-desc-inner">
											<p class="mtb-item-spec-desc-text zero-gap">
												<?php if ($field == 'external_link'): ?><a target="_blank" href="<?php echo $page_data['bikes'][$i][$field];?>"><?php endif ?>
												<?php echo $page_data['bikes'][$i][$field];?>
												<?php if ($field == 'external_link'): ?></a><?php endif ?>
											</p>
										</div>
									<?php endfor ?>
								</div>
							</div>
						<?php endif ?>
					<?php endforeach ?>
					<?php break; ?>
				<?php endforeach ?>
				<!-- LOOP here -->

			</div>
		</div>
	</div>
<?php endif ?>