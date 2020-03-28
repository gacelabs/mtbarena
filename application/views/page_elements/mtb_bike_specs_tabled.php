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
	$gridCountArr = ['grid-100', 'grid-50-50', 'grid-33-33-33'];

	$id = $page_data['bikes']['other']['id'];
	$bike_ids = $page_data['bikes']['other']['bike_ids'];
	$like_count = $page_data['bikes']['other']['like_count'];
	$share_count = $page_data['bikes']['other']['share_count'];
?>

	<div class="box-item mtb-specs-container" id="specs-tabled">
		<div class="box-item-body-top">
			<ul class="spaced-list between">
				<li class="text-left">
				<?php if ($bikeCount == 1) { ?>
					<p class="zero-gap color-theme"><b>Bike Model Full Specifications</b></p>
				<?php } elseif ($bikeCount == 2) { ?>
					<p class="zero-gap color-theme"><b><?php echo $body_id == "landing"? "Today's Match Up!" : "Head To Head Full Specifications"; ?></b></p>
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

		<div class="box-item-body">
			<div class="mtb-item-specs-parent">
				<div class="mtb-item-specs_header">
					<div class="header-extra">
						header-extra
					</div>

					<div class="mtb-header-container <?php echo $gridCountArr[$bikeCount-1]; ?>">
						<!-- LOOP here -->
						<div class="mtb-header-inner">
							<div class="header-image-parent">
								<div class="image-overlay-parent">
									<div class="image-overlay-inner" style="background-image: url(<?php echo base_url('assets/data/files/bikes/foxter-powell-1.0.jpg'); ?>)"></div>
								</div>
								<img src="<?php echo base_url('assets/data/files/bikes/foxter-powell-1.0.jpg'); ?>" class="bike-feat-image">
							</div>

							<div class="bike-model-parent">
								<input type="text" name="change_bike_input" class="input-bike-name changeBikeInput form-control" placeholder="Foxter Powell 1.0" />
								<span class="compare-search-icon">
									<i class="fa fa-search"></i>
								</span>
								<p class="bike-specs-source">
									<small class="color-lightgray mtb-item-model-spec-from">From: Official Manufacturer</small>
								</p>
							</div>
						</div>
						<!-- LOOP here -->
					</div>
				</div>

				<div class="mtb-item-specs_body">
					<table class="table">
						<thead>
							<tr>
								<th class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">SPECS</th>
								<th class="row-col-2" colspan="2">FRAME</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">Brand</td>
								<td class="col-bike-1">Stock (Manufacturer)</td>
								<td class="col-bike-2">Generic (No brand)</td>
							</tr>
							<tr>
								<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">Sizes</td>
								<td class="col-bike-1">XS < 14", S 15" - 16", M 17" - 18"</td>
								<td class="col-bike-2">XS < 14", S 15" - 16", M 17" - 18"</td>
							</tr>
							<tr>
								<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">Built</td>
								<td class="col-bike-1">Titanium</td>
								<td class="col-bike-2">Titanium</td>
							</tr>
							<tr>
								<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">Features</td>
								<td class="col-bike-1">Internal Cabling, Smooth Weld, Lightweight, Tapered Head Tube, Alloy Shaped Tubes</td>
								<td class="col-bike-2">Internal Cabling, Smooth Weld, Lightweight, Tapered Head Tube, Alloy Shaped Tubes</td>
							</tr>
							<tr>
								<td class="row-col-1 ">Colors</td>
								<td class="col-bike-1">Multi-Tone, Red, Blue, Orange</td>
								<td class="col-bike-2">Multi-Tone, Red, Blue, Orange</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>