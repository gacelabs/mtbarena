<?php 
	// debug($page_data['fields']);
?>
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

				<?php if (isset($page_data['fields']) AND $page_data['fields']): ?>
					<?php foreach ($page_data['fields'] as $key => $fields): ?>
						<div class="clearfix form-step-block field-data" id="<?php echo $fields['id'];?>" data-url="<?php echo $fields['path'];?>" data-selector="input.typeAheadInput">
							<div class="col-lg-12">
								<h4 style="margin-top: 0"><b class="color-theme"><?php echo ucfirst($fields['base']);?></b></h4>
							</div>
							<?php foreach ($fields['values'] as $index => $field): ?>
								<div class="form-step-body clearfix">
									<div class="col-lg-3 form-step-block-label">
										<label class="zero-gap" for=""><?php echo ucfirst($field['column']);?></label>
										<p class="sub-label-text"><?php echo ucfirst($field['description']);?></p>
									</div>
									<div class="col-lg-6 form-step-block-input">
										<div class="form-group">
											<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
												<input type="text" name="<?php echo $field['column'];?>" class="typeAheadInput form-control" data-values="<?php echo $field['data'];?>" />
											<?php else: ?>
												<input type="text" name="<?php echo $field['column'];?>" class="typeAheadInput form-control" />
											<?php endif ?>
										</div>
									</div>
									<div class="col-lg-3 form-step-block-values">
										<span class="btn btn-xs text-info"><i class="fa fa-angle-down"></i></span>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					<?php endforeach ?>
				<?php endif ?>
			</form>
		</div>
	</div>
</div>