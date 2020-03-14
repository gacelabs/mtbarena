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
	
	<div class="box-item-body" style="padding:0;">
		<div class="table-responsive post-bike-parent-box">
			<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
			<form action="<?php echo base_url('dashboard/edit_item/'.$page_data['id']);?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php else: ?>
			<form action="<?php echo base_url('dashboard/add_item');?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php endif ?>
				<div class="clearfix form-step-block">
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
				</div>

				<div class="clearfix form-step-block" id="">
					<div class="col-lg-12">
						<h4 style="margin-top: 0"><b class="color-theme">Frame</b></h4>
					</div>
					
					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Brand</label>
							<p class="sub-label-text">Manufacturer's name.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" data-role="tagsinput" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Brands</span>
						</div>
					</div>

					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Sizes</label>
							<p class="sub-label-text">Frame's dimension.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Sizes</span>
						</div>
					</div>


					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Built</label>
							<p class="sub-label-text">Materials used.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Materials</span>
						</div>
					</div>

					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Type</label>
							<p class="sub-label-text">Frame built type.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Types</span>
						</div>
					</div>

					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Features</label>
							<p class="sub-label-text">Additional specs.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Features</span>
						</div>
					</div>

					<div class="form-step-body clearfix">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for="">Colorway</label>
							<p class="sub-label-text">Frame color combinations.</p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<input type="text" name="brand" class="typeAheadInput form-control" />
							</div>
						</div>
						<div class="col-lg-3 form-step-block-values">
							<span class="btn btn-xs text-info">Colours</span>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>