
<?php 
	// debug($page_data, 1);
	if (isset($page_data['bikes']) AND $page_data['bikes']): 
	// total number of bikes in comparison
	// value comes from $page_data['bikes'] array, counting keys within the said array
	// this prevents error on $page_data['bikes'] index if there is only 1 data in the bike_item table
	$infos = $page_data['bikes']['info'];
	$fields_data = $page_data['bikes']['fields'];

	$bikeCount = count($infos);
	// parse the class along .grid-column according to $bikeCount value
	$gridCountArr = ['column-100', 'column-50-50', 'column-33-33-33'];

	$id = $page_data['bikes']['other']['id'];
	$bike_ids = $page_data['bikes']['other']['bike_ids'];
	$like_count = $page_data['bikes']['other']['like_count'];
	$share_count = $page_data['bikes']['other']['share_count'];
?>
	<div class="box-item mtb-bike-specs-main-parent">
		<div class="box-item-body-top" id="mtbCompareSpecs">
			<ul class="spaced-list between">
				<li class="text-left">
				<?php if ($bikeCount == 1) { ?>
					<p class="zero-gap color-theme"><b>Bike Model Full Specifications</b></p>
				<?php } elseif ($bikeCount == 2) { ?>
					<p class="zero-gap color-theme"><b><?php echo $body_id == "landing"? "Today's Match Up!" : "Head-To-Head Bike Full Specifications"; ?></b></p>
				<?php } elseif ($bikeCount == 3) { ?>
					<p class="zero-gap color-theme"><b>Triple Match Up Bike Full Specifications</b></p>
				<?php } ?>
				</li>
				<li class="text-right">
					<button type="button" class="btn btn-xs btn-sq" onclick="popupSharer(this, '<?php echo current_full_url();?>', <?php echo $id;?>, '<?php echo $this->class_name;?>');">
						<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd class="shcount"><?php echo $share_count;?></kbd></small>
					</button>
					<button type="button" class="btn btn-xs btn-sq" onclick='countHeart(this, "<?php echo $this->class_name;?>", <?php echo json_encode(['data'=>json_encode($bike_ids)]);?>)'>
						<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd class="hcount"><?php echo $like_count;?></kbd></small>
					</button>
				</li>
			</ul>
		</div>

		<div class="box-item-body" id="mtbItemMainParent" style="padding-top:0;">
			<div class="mtb-item-specs-main-parent bikeStickyName">
				<div class="grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">
					<!-- LOOP here -->
					<?php foreach ($infos as $key => $bike): ?>
						<div class="mtb-item-model-parent">
							<div class="mtb-item-model-inner">
								<img src="<?php echo base_url($bike['feat_photo']);?>" class="mtb-item-image shrinkMe image-cropped cover" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
								<div class="modelItemLabelBox">
									<input type="text" name="change_bike_input" class="mtb-item-model-name text-ellipsis form-control zero-gap changeBikeInput" placeholder="<?php echo ucwords($bike['bike_model']);?>" data-ids='<?php echo json_encode($bike_ids);?>' data-name="<?php echo $bike['bike_model'];?>" data-id='<?php echo $bike['id'];?>'>
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
				<div class="mtb-item-specs-parent">
					<div class="mtb-item-spec-label<?php echo $bikeCount > 1 ? ' text-center' : '' ?>">
						<small class="color-theme mtb-item-spec-label-text">FRAME</small>
					</div>
					<div class="mtb-item-spec-desc grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">
						<div class="mtb-item-spec-desc-inner">
							<div class="grid-column column-20-80">
								<div class="mtb-spec-column">
									<p class="zero-gap">Brand</p>
								</div>
								<div class="mtb-desc-column">
									<p class="zero-gap">Trinx</p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- LOOP here -->
			</div>
		</div>
	</div>
<?php endif ?>