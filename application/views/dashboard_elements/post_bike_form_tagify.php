<?php 
	// debug($page_data['fields_data'], 1);
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
	
	<div class="box-item-body" style="padding:0 !important;">
		<div class="table-responsive post-bike-parent-box">
			<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
			<form action="<?php echo base_url('dashboard/edit_item/'.$page_data['id']);?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php else: ?>
			<form action="<?php echo base_url('dashboard/add_item');?>" method="post" enctype="multipart/form-data" id="postBikeForm">
			<?php endif ?>
				<div class="clearfix form-step-block" style="padding:20px 0 30px 0;">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group zero-gap">
							<label for="bike_model">Bike Model Name</label>
							<input type="text" class="form-control" name="bike_model" id="bike_model" required>
						</div>
					</div>
						
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group zero-gap">
							<label for="feat_photo">Featured Photo</label>
							<input type="file" class="form-control no-border" name="feat_photo" id="feat_photo">
						</div>
					</div>

					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group bs-select-parent zero-gap">
							<label>Preset Specs <a class="color-lightgray" tabindex="0" role="button" data-container="body" data-trigger="focus" data-toggle="popover" data-placement="left" data-content="Automatically fills in all the specs according to the bike selected."><i class="fa fa-info-circle"></i></a></label>
							<select class="selectpicker show-tick form-control" data-live-search="true" title="Select bike model" data-width="100%" data-size="4">
								<?php if (isset($page_data['specs']) AND $page_data['specs']): ?>
									<?php foreach ($page_data['specs'] as $key => $bike): ?>
										<option data-tokens="<?php echo strtolower($bike['bike_model']);?>" data-subtext="<?php echo $bike['store_name'];?> (Updated: <?php echo date('M Y', strtotime($bike['updated']));?>)" data-id="<?php echo $bike['id'];?>" data-json='<?php echo preg_replace("/'/", '', json_encode($bike));?>'data-selector="input.typeAheadInput"><?php echo $bike['bike_model'];?></option>
									<?php endforeach ?>
								<?php endif ?>
							</select>
						</div>
					</div>
				</div>

				<div class="form-tagify-parent">
					<?php if (isset($page_data['fields']) AND $page_data['fields']): ?>
						<?php foreach ($page_data['fields'] as $key => $fields): ?>
							<div class="clearfix form-tagify-entry form-step-block field-data" id="<?php echo $fields['id'];?>" data-url="<?php echo $fields['path'];?>" data-selector="input.typeAheadInput">
								<input type="hidden" name="fields_data[<?php echo ucfirst($fields['base']);?>]" value="<?php echo ucfirst($fields['base']);?>">
								<div class="col-lg-12">
									<h4 style="margin-top: 0"><b class="color-theme bike-part-title"><?php echo ucfirst($fields['base']);?></b></h4>
								</div>
								<div class="form-field-section">
									<?php foreach ($fields['values'] as $index => $field): ?>
										<div class="form-step-body clearfix">
											<div class="col-lg-3 col-md-3 form-step-block-label">
												<label class="zero-gap" for=""><?php echo ucfirst($field['column']);?></label>
												<p class="sub-label-text"><?php echo ucfirst($field['description']);?></p>
											</div>
											<div class="col-lg-7 col-md-7 form-step-block-input">
												<div class="form-group">
													<?php if ((isset($page_data['is_edit']) AND $page_data['is_edit']) AND 
													((isset($page_data["fields_data"]) AND $page_data["fields_data"]) AND 
													isset($page_data["fields_data"][ucfirst($fields['base'])]))): ?>
														<input type="text" data-name="<?php echo $field['column'];?>" name="fields_data[<?php echo ucfirst($fields['base']);?>][<?php echo $field['column'];?>]" class="typeAheadInput form-control" data-values='<?php echo $page_data["fields_data"][ucfirst($fields["base"])][$field["column"]];?>' />
													<?php else: ?>
														<input type="text" data-name="<?php echo $field['column'];?>" name="fields_data[<?php echo ucfirst($fields['base']);?>][<?php echo $field['column'];?>]" class="typeAheadInput form-control" />
													<?php endif ?>
												</div>
											</div>
										</div>
									<?php endforeach ?>
								</div>
							</div>
						<?php endforeach ?>
					<?php endif ?>
				</div>

				<div class="col-lg-12 post-bike-form-footer">
					<div class="col-lg-3 col-md-3 form-step-block-label">
						<p class="zero-gap"><b>Price tag:</b></p>
						<p class="zero-gap" style="font-size:10px;">The estimated price of the bike on the market.<br>Legend: Affordable, Mid, Premium </p>
					</div>
					<div class="col-lg-7 col-md-7 form-step-block-input">
						<ul class="inline-list">
							<li style="margin-right: 15px;">
								<div class="radio">
									<label>
										<input type="radio" name="price_tag" value="affordable"><i class="fa fa-tags"></i>
									</label>
								</div>
							</li>
							<li style="margin-right: 15px;">
								<div class="radio">
									<label>
										<input type="radio" name="price_tag" value="mid"><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i>
									</label>
								</div>
							</li>
							<li>
								<div class="radio">
									<label>
										<input type="radio" name="price_tag" value="premium"><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i>
									</label>
								</div>
							</li>
						</ul>
					</div>
					
					<div class="col-lg-12">&nbsp;</div>
					
					<div style="margin-bottom:15px;clear: both;">
						<div class="col-lg-3 col-md-3 form-step-block-label">
							<p class="zero-gap"><b>Exteral link:</b></p>
							<p class="zero-gap" style="font-size:10px;">A link that goes to your own website or social media page. One link only.<br>Example: facebook.com/your-bike-shop</p>
						</div>
						<div class="col-lg-7 col-md-7 form-step-block-input">
							<div class="form-group">
								<input rows="2" class="form-control" name="external_link" id="external_link">
							</div>
						</div>
					</div>
				</div>
				
				<div style="padding: 0 10px 10px 10px;clear: both;">
					<hr>
					<button class="btn btn-info"><?php echo(isset($page_data['is_edit']) AND $page_data['is_edit']) ? "Update Bike" : "Post Bike"; ?></button>
				</div>
			</form>
		</div>
	</div>
</div>