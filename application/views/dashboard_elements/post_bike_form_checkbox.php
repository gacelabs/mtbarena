<div class="box-item" style="margin-bottom: 15px;">
	<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
	<input type="hidden" id="edit-json-data" data-json='<?php echo $page_data["json"];?>'>
	<?php endif ?>

	<div class="box-item-body-top">
		<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
		<p class="zero-gap color-theme"><b>Edit bike</b></p>
		<?php else: ?>
		<p class="zero-gap color-theme"><b>Post new bike</b></p>
		<?php endif ?>
	</div>
	
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-bike-parent-box">
			<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
			<form action="<?php echo base_url('dashboard/edit_item/'.$page_data['id']);?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php else: ?>
			<form action="<?php echo base_url('dashboard/add_item');?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php endif ?>
				<div class="col-lg-4">
					<div class="form-group zero-gap">
						<label for="bike_model">Bike Model Name</label>
						<input type="text" class="form-control" name="bike_model" id="bike_model" required>
					</div>
				</div>
					
				<div class="col-lg-4">
					<div class="form-group zero-gap">
						<label for="feat_photo">Featured Photo</label>
						<input type="file" class="form-control no-border" name="feat_photo" id="feat_photo">
					</div>
				</div>

				<div class="col-lg-4">
					<div class="form-group bs-select-parent zero-gap">
						<label>Preset Specs <a class="color-lightgray" tabindex="0" role="button" data-container="body" data-trigger="focus" data-toggle="popover" data-placement="left" data-content="Automatically fills in all the specs according to the bike selected."><i class="fa fa-info-circle"></i></a></label>
						<select class="selectpicker show-tick form-control" data-live-search="true" title="Select Preset Specs" data-width="100%" data-size="4" name="spec_from">
							<?php if (isset($page_data['specs']) AND $page_data['specs']): ?>
								<?php foreach ($page_data['specs'] as $key => $bike): ?>
									<option data-tokens="<?php echo strtolower($bike['bike_model']);?>" data-subtext="<?php echo $bike['store_name'];?> (Updated: <?php echo date('M Y', strtotime($bike['updated']));?>)" data-id="<?php echo $bike['id'];?>" data-json='<?php echo preg_replace("/'/", '', json_encode($bike));?>'><?php echo $bike['bike_model'];?></option>
								<?php endforeach ?>
							<?php endif ?>
						</select>
					</div>
				</div>

				<div class="col-lg-12"><hr></div>

				<div class="col-lg-12">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="heading1" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
								<h4 class="panel-title">Manufacturer &amp; Released Date</h4>
							</div>
							<div id="collapse1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="heading1">
								<div class="panel-body">
									<div class="post-bike-form-checkbox-item">
										<ul class="grid-column column-20-80">
											<li class="text-right list-label">
												<p class="main-label-text zero-gap">Manufacturer's name</p>
												<p class="sub-label-text color-lightgray">Who manufactured the bike?</p>
											</li>
											<li class="list-input">
												<div class="form-group">
													<input type="text" class="form-control" name="bike_made_by" id="bike_made_by" required />
												</div>
											</li>
										</ul>
										<ul class="grid-column column-20-80">
											<li class="text-right list-label">
												<p class="main-label-text zero-gap">1st edition date</p>
												<p class="sub-label-text color-lightgray">Year of first released.</p>
											</li>
											<li class="list-input">
												<div class="form-group">
													<input type="text" class="form-control" name="first_edition" id="first_edition" required />
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading2" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
							<h4 class="panel-title"><b>Frame:</b> Built, Sizes, Types &amp; Colorway</h4>
						</div>
						<div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
							<div class="panel-body">
								<div class="post-bike-form-checkbox-item">
									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Frame</p>
											<p class="sub-label-text color-lightgray">Brand name or model.</p>
										</li>
										<li class="list-input">
											<div class="form-group">
												<input type="text" class="form-control" name="frame_made_by" id="frame_made_by" required />
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Sizes</p>
											<p class="sub-label-text color-lightgray">Dimension of frame.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Extra Small" name="frame_size" id="xsmall" /><label for="xsmall">XS <i class="fa fa-angle-left"></i> 14"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Small" name="frame_size" id="small" /><label for="small">S 15" - 16"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Medium" name="frame_size" id="medium" /><label for="medium">M 17" - 18"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Large" name="frame_size" id="large" /><label for="large">M 19" - 20"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Extra Large" name="frame_size" id="xlarge" /><label for="xlarge">XL <i class="fa fa-angle-right"></i> 21"</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Built</p>
											<p class="sub-label-text color-lightgray">Materials used.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Titanium" name="frame_built" id="titanium" /><label for="titanium">Titanium</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Carbon Fiber" name="frame_built" id="carbon_fiber" /><label for="carbon_fiber">Carbon Fiber</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Aluxx-Grade Aluminum" name="frame_built" id="aluxx_aluminum" /><label for="aluxx_aluminum">Aluxx Grade Aluminum</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Aluminum/ Alloy" name="frame_built" id="aluminum_alloy" /><label for="aluminum_alloy">Aluminum/ Alloy</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Steel" name="frame_built" id="steel" /><label for="steel">Steel/ Mixed</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Type</p>
											<p class="sub-label-text color-lightgray">Frame built type.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Cross Country" name="frame_type" id="cross_country" /><label for="cross_country">Cross Country</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="All Mountain" name="frame_type" id="all_mountain" /><label for="all_mountain">All Mountain</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Road" name="frame_type" id="road" /><label for="road">Road</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Fat" name="frame_type" id="fat" /><label for="fat">Fat</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="BMX" name="frame_type" id="bmx" /><label for="bmx">BMX</label>
											</div>
										</li>
									</ul>
									
									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Features</p>
											<p class="sub-label-text color-lightgray">Additional specs.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Smooth Weld" name="frame_add_feat" id="smooth_weld" /><label for="smooth_weld">Smooth Weld</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Internal Cabling" name="frame_add_feat" id="internal_cabling" /><label for="internal_cabling">Internal Cabling</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Middle Suspension" name="frame_add_feat" id="middel_suspension" /><label for="middel_suspension">Middle Suspension</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Tapered Headtube" name="frame_add_feat" id="tapered" /><label for="tapered">Tapered Headtube</label>
											</div>
										</li>
									</ul>
									
									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Colorway</p>
											<p class="sub-label-text color-lightgray">Frame colours.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Red" name="frame_color" id="red" /><label for="red">Red</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Orange" name="frame_color" id="Orange" /><label for="Orange">Orange</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Blue" name="frame_color" id="Blue" /><label for="Blue">Blue</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Yellow" name="frame_color" id="Yellow" /><label for="Yellow">Yellow</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Green" name="frame_color" id="Green" /><label for="Green">Green</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="White" name="frame_color" id="White" /><label for="White">White</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Black" name="frame_color" id="Black" /><label for="Black">Black</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Gray" name="frame_color" id="Gray" /><label for="Gray">Gray</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Purple" name="frame_color" id="Purple" /><label for="Purple">Purple</label>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading3" data-toggle="collapse" href="#collapse3" aria-expanded="true" aria-controls="collapse3">
							<h4 class="panel-title"><b>Fork:</b> Built, Types, Sizes &amp; Features</h4>
						</div>
						<div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
							<div class="panel-body">
								<div class="post-bike-form-checkbox-item">
									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Frame</p>
											<p class="sub-label-text color-lightgray">Brand name or model.</p>
										</li>
										<li class="list-input">
											<div class="form-group">
												<input type="text" class="form-control" name="frame_made_by" id="frame_made_by" required />
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Sizes</p>
											<p class="sub-label-text color-lightgray">Dimension of fork.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Below 26" name="fork_size" id="below_26" /><label for="below_26"><i class="fa fa-angle-left"></i> 25"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="26" name="fork_size" id="26" /><label for="26">26"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="27.5" name="fork_size.5" id="27.5" /><label for="27.5">27.5"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="29" name="fork_size" id="29" /><label for="29">29"</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Above 29" name="fork_size" id="above_29" /><label for="above_29"><i class="fa fa-angle-right"></i> 29"</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Built</p>
											<p class="sub-label-text color-lightgray">Materials used.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Composite" name="fork_built" id="composite" /><label for="composite">Composite</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Magnesium" name="fork_built" id="magnesium" /><label for="magnesium">Magnesium</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Carbon Fiber" name="fork_built" id="carbon_fiber" /><label for="carbon_fiber">Carbon Fiber</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Aluminum/ Alloy" name="fork_built" id="aluminum_alloy" /><label for="aluminum_alloy">Aluminum/ Alloy</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Steel" name="fork_built" id="steel" /><label for="steel">Steel/ Mixed</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Type</p>
											<p class="sub-label-text color-lightgray">Fork built type.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Air Cartridge" name="fork_type" id="air_cartridge" /><label for="air_cartridge">Air Cartridge</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Coil Suspension" name="fork_type" id="coil_suspension" /><label for="coil_suspension">Coil Suspension</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Rigid" name="fork_type" id="rigid" /><label for="rigid">Rigid</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Travel</p>
											<p class="sub-label-text color-lightgray">Max vertical movement.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Below 79mm" name="fork_travel" id="below_79" /><label for="below_79"><i class="fa fa-angle-left"></i> 79mm</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="80mm - 100mm" name="fork_travel" id="80mm_100mm" /><label for="80mm_100mm">80mm - 100mm</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="120mm - 160mm" name="fork_travel" id="120mm_160mm" /><label for="120mm_160mm">120mm - 160mm</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Above 180mm" name="fork_travel" id="above_180mm" /><label for="above_180mm"><i class="fa fa-angle-right"></i> 180mm</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Features</p>
											<p class="sub-label-text color-lightgray">Additional specs.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Tapered Tube" name="for_add_feat" id="tapered_tube" /><label for="tapered_tube">Tapered Tube</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Lockout" name="for_add_feat" id="lockout" /><label for="lockout">Lockout</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Crown Forged" name="for_add_feat" id="crown_forged" /><label for="crown_forged">Crown Forged</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Travel Height Adjustable" name="for_add_feat" id="travel_height_adjustable" /><label for="travel_height_adjustable">Travel Height Adjustable</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Lightweight" name="for_add_feat" id="lightweight" /><label for="lightweight">Lightweight</label>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading4" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
							<h4 class="panel-title"><b>Shifter:</b> Built, Type & Features</h4>
						</div>
						<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
							<div class="panel-body">
								<div class="post-bike-form-checkbox-item">
									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Shifter</p>
											<p class="sub-label-text color-lightgray">Brand name or model.</p>
										</li>
										<li class="list-input">
											<div class="form-group">
												<input type="text" class="form-control" name="shifter_made_by" id="shifter_made_by" required />
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Front Derailleur</p>
											<p class="sub-label-text color-lightgray">Brand name or model.</p>
										</li>
										<li class="list-input">
											<ul class="inline-list">
												<li>
													<div class="form-group">
														<input type="text" class="form-control" name="shifter_fd_made_by" id="shifter_fd_made_by" required />
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="Single/ Fixie" name="shifter_front_speed" id="single_speed" /><label for="single_speed">Single/ Fixie</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="2 Speed" name="shifter_front_speed" id="2_speed" /><label for="2_speed">2 Speed</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="3 Speed" name="shifter_front_speed" id="3_speed" /><label for="3_speed">3 Speed</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="Above 4 Speed" name="shifter_front_speed" id="above_4_speed" /><label for="above_4_speed"><i class="fa fa-angle-right"></i> 4 Speed</label>
													</div>
												</li>
											</ul>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Rear Derailleur</p>
											<p class="sub-label-text color-lightgray">Brand name or model.</p>
										</li>
										<li class="list-input">
											<ul class="inline-list">
												<li>
													<div class="form-group">
														<input type="text" class="form-control" name="shifter_rd_made_by" id="shifter_rd_made_by" required />
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="Single/ Fixie" name="shifter_rear_speed" id="single_speed" /><label for="single_speed">Single/ Fixie</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="Below 8 Speed" name="shifter_rear_speed" id="below_8_speed" /><label for="below_8_speed"><i class="fa fa-angle-left"></i> 8 Speed</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="9 Speed" name="shifter_rear_speed" id="9_speed" /><label for="9_speed">9 Speed</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="10 Speed" name="shifter_rear_speed" id="10_speed" /><label for="10_speed">10 Speed</label>
													</div>
												</li>
												<li>
													<div class="capsule-checkbox">
														<input type="checkbox" class="check-one" value="Above 11 Speed" name="shifter_rear_speed" id="above_11_speed" /><label for="above_11_speed"><i class="fa fa-angle-right"></i> 11 Speed</label>
													</div>
												</li>
											</ul>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Built</p>
											<p class="sub-label-text color-lightgray">Materials used.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Carbon Fiber" name="shifter_built" id="shifter_carbon_fiber" /><label for="shifter_carbon_fiber">Carbon Fiber</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Fiber + Metal" name="shifter_built" id="fiber_metal" /><label for="fiber_metal">Carbon + Metal</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" class="check-one" value="Plastic + Metal" name="shifter_built" id="plastic_metal" /><label for="plastic_metal">Plastic + Metal</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Release trigger.</p>
											<p class="sub-label-text color-lightgray">Shifter mechanism.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="Rapidfire" name="shifter_release" id="rapidfire" /><label for="rapidfire">Rapidfire</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Grip Shifter" name="shifter_release" id="grip_shifter" /><label for="grip_shifter">Grip Shifter</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Thumb Shifter" name="shifter_release" id="thumb_shifter" /><label for="thumb_shifter">Thumb Shifter</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Downtube" name="shifter_release" id="downtube" /><label for="downtube">Downtube</label>
											</div>
										</li>
									</ul>

									<ul class="grid-column column-20-80">
										<li class="text-right list-label">
											<p class="main-label-text zero-gap">Features</p>
											<p class="sub-label-text color-lightgray">Additional specs.</p>
										</li>
										<li class="list-input">
											<div class="capsule-checkbox">
												<input type="checkbox" value="2-Way Release" name="2_way_release" id="2_way_release" /><label for="2_way_release">2-Way Release</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Instant Release" name="instant_release" id="instant_release" /><label for="instant_release">Instant Release</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Low Friction" name="low_friction" id="low_friction" /><label for="low_friction">Low Friction</label>
											</div>
											<div class="capsule-checkbox">
												<input type="checkbox" value="Gear Display" name="gear_display" id="gear_display" /><label for="gear_display">Gear Display</label>
											</div>
										</li>
									</ul>

								</div>
							</div>
						</div>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="heading4" data-toggle="collapse" href="#collapse4" aria-expanded="true" aria-controls="collapse4">
							<h4 class="panel-title"><b>Shifter:</b> Built, Type & Features</h4>
						</div>
						<div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
							<div class="panel-body">
								<div class="post-bike-form-checkbox-item">
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</form>
		</div>
	</div>
</div>