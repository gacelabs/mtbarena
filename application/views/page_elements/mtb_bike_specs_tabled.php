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
		$table = $page_data['bikes']['table'];
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
					<button type="button" class="btn btn-xs btn-sq" onclick='countHeart(this, "<?php echo $table;?>", <?php echo json_encode(['data'=>json_encode($bike_ids)]);?>)'>
						<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd class="hcount"><?php echo $like_count;?></kbd></small>
					</button>
				</li>
			</ul>
		</div>

		<div class="box-item-body">
			<div class="mtb-item-specs-parent">
				<div class="mtb-item-specs_header">
					<div class="header-extra">
						&nbsp;
					</div>

					<div class="mtb-header-container <?php echo $gridCountArr[$bikeCount-1]; ?>">
						<!-- LOOP here -->
						<?php foreach ($infos as $key => $bike): ?>
							<div class="mtb-header-inner">
								<div class="header-image-parent">
									<div class="image-overlay-parent">
										<div class="image-overlay-inner" style="background-image: url(<?php echo base_url($bike['feat_photo']);?>)"></div>
									</div>
									<div class="bike-feat-image">
										<img src="<?php echo base_url($bike['feat_photo']);?>" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
									</div>
								</div>

								<div class="bike-model-parent">
									<input type="text" name="change_bike_input" class="input-bike-name changeBikeInput form-control" placeholder="<?php echo ucwords($bike['bike_model']);?>" data-ids='<?php echo json_encode($bike_ids);?>' data-name="<?php echo $bike['bike_model'];?>" data-id='<?php echo $bike['id'];?>'/>
									<p class="bike-specs-source">
										<small class="color-lightgray mtb-item-model-spec-from">From: <?php echo ucwords($bike['store_name']);?></small>
									</p>
								</div>
							</div>
						<?php endforeach ?>
						<!-- LOOP here -->
					</div>
				</div>

				<div class="mtb-item-specs_body">
					<?php foreach ($fields_data as $base => $fields): ?>
						<table class="table">
							<thead>
								<tr>
									<th class="row-col-2" colspan="3"><?php echo strtoupper(clean_string_name($base, ' '));?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($fields as $column => $field): ?>
									<?php if (is_array($field)): ?>
									<tr>
										<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>">
											<div class="td-col-label"><?php echo ucwords($column);?></div>
										</td>
										<?php foreach ($field as $key => $value): ?>
											<td class="col-bike-<?php echo $key+1;?>"><?php echo ucwords($value);?></td>
										<?php endforeach ?>
									</tr>
									<?php elseif ($base == 'external link'): ?>
									<tr>
										<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>"><div class="td-col-label">Website URL</div></td>
										<?php foreach ($fields as $key => $value): ?>
											<td class="col-bike-<?php echo $key+1;?>">
												<a href="<?php echo $value;?>" class="break-word"><?php echo $value;?></a>
											</td>
										<?php endforeach; 
										break;?>
									</tr>
									<?php elseif ($base == 'price tag'): ?>
									<tr>
										<td class="row-col-1 <?php echo $gridCountArr[$bikeCount-1]; ?>"><div class="td-col-label">Estimated Price</div></td>
										<?php foreach ($fields as $key => $value): ?>
											<?php if ($value == 'affordable'): 
												$Range = 'Affordable';
											elseif ($value == 'mid'): 
												$Range = 'Mid Range';
											elseif ($value == 'premium'): 
												$Range = 'Premium';
											endif ?>
											<td class="col-bike-<?php echo $key+1;?>">
												<small class="color-lightgray"><?php echo $Range;?></small>
												<?php if ($value == 'mid'): ?>
													<i class="fa fa-tags"></i>
													<i class="fa fa-tags"></i>
												<?php elseif ($value == 'premium'): ?>
													<i class="fa fa-tags"></i>
													<i class="fa fa-tags"></i>
													<i class="fa fa-tags"></i>
													<i class="fa fa-tags"></i>
												<?php endif ?>
												<i class="fa fa-tags"></i>
											</td>
										<?php endforeach; 
										break;?>
									</tr>
									<?php endif ?>
								<?php endforeach ?>
							</tbody>
						</table>
					<?php endforeach ?>
				</div>
			</div>
		</div>
	</div>
<?php endif ?>
