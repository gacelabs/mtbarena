<?php 
	// debug($page_data['fields']);
?>
<div class="col-lg-12 zero-gap box-item" style="margin-bottom: 15px;">
	<div class="col-lg-12 box-item-body-top">
		<p class="zero-gap color-theme"><b>Specifications Template</b></p>
	</div>
	
	<div class="col-lg-12 zero-gap box-item-body" style="padding:0;">
		<div class="col-lg-12 zero-gap table-responsive">
			<form action="<?php echo base_url('dashboard/save_fields');?>" method="post" enctype="multipart/form-data" id="postBikeForm">
				<?php 
					$key = 0;
					if (isset($page_data['fields']) AND $page_data['fields']): ?>
					<?php foreach ($page_data['fields'] as $key => $field): ?>
						<input type="hidden" name="fields_data[<?php echo $key;?>][id]" value="<?php echo $field['id'];?>">
						<div class="col-lg-12 zero-gap clearfix form-step-block mainset" id="<?php echo str_replace(' ', '_', $field['base']);?>">
							<div class="col-lg-12 zero-gap clearfix fieldset">
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-9">
									<div class="form-group">
	 									<b><input type="text" class="form-control color-theme" name="fields_data[<?php echo $key;?>][base]" value="<?php echo ucfirst($field['base']);?>" placeholder="Bike part: Frame, Fork, Saddle, etc..." /></b>
									</div>
								</div>
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
									<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][sort]" value="<?php echo $field['sort'];?>" placeholder="#">
								</div>
							</div>
							<?php 
								$cnt = 0;
								foreach ($field['values'] as $column => $row): ?>
								<div class="col-lg-12 zero-gap form-step-body clearfix fieldset">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 form-step-block-label">
										<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][sort]" value="<?php echo ucfirst($row['sort']);?>" placeholder="#" />
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8 form-step-block-label spec-desc-box">
										<div class="form-group" style="margin-bottom:5px;">
											<b><input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][column]" value="<?php echo ucfirst($row['column']);?>" placeholder="Spec label: Brand, Sizes, Types, etc..." /></b>
										</div>
										<div class="form-group zero-gap">
											<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][description]" value="<?php echo $row['description'];?>" placeholder="Label description." />
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-step-block-input">
										<div class="form-group zero-gap">
											<textarea placeholder="Values: Comma separated value. Value1,Value2,Value3..." name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][data]" rows="3" class="form-control"><?php echo $row['data'];?></textarea>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4 form-step-block-input">
										<select class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][max]">
											<option disabled>Multi select?</option>
											<option value="1"<?php echo $row['max'] == 1 ? ' selected' : '';?>>Yes</option>
											<option value="0"<?php echo $row['max'] == 0 ? ' selected' : '';?>>No</option>
										</select>
									</div>
								</div>
							<?php 
								$cnt++;
								endforeach ?>
							<div class="col-lg-12 clearfix add_fieldset" data-key="<?php echo $key;?>" style="margin-top:15px;">
								<span class="btn btn-xs btn-default text-info"><i class="fa fa-plus"></i> Specs field</span>
							</div>
							<input type="hidden" name="fields_data[<?php echo $key;?>][path]" value="assets/data/jsons/spec_template/<?php echo $field['base'];?>.json">
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<div class="col-lg-12 zero-gap clearfix">
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 form-step-footer add_mainset" data-key="<?php echo $key;?>">
						<span class="btn btn-default text-info"><i class="fa fa-plus"></i> New Bike part</span>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
						<button type="submit" class="btn btn-info"><i class="fa fa-floppy-o"></i> Save Template</button>
						<div class="hidden-xs"><br></div>
					</div>
				</div>
			</form>

			<div class="hide" id="main_template">
				<div class="col-lg-12 zero-gap clearfix form-step-block mainset">
					<div class="col-lg-12 zero-gap clearfix">
						<div class="col-lg-11 col-md-11 col-sm-11 col-xs-9">
							<div class="form-group">
								<b><input type="text" class="form-control color-theme" name="fields_data[CHANGEKEY][base]" value="" placeholder="Bike part: Frame, fork, saddle, etc..." /></b></h4>
							</div>
						</div>
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3">
							<input type="text" class="form-control" name="fields_data[CHANGEKEY][sort]" value="" placeholder="#">
						</div>
					</div>

					<div class="col-lg-12 zero-gap form-step-body clearfix fieldset" id="field_template">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 form-step-block-label">
							<input type="text" class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][sort]" value="" placeholder="#">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8 form-step-block-label spec-desc-box">
							<div class="form-group" style="margin-bottom:5px;">
								<b><input type="text" class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][column]" value="" placeholder="Spec label: Brand, Sizes, Types, etc..."></b>
							</div>
							<div class="form-group zero-gap">
								<p class="sub-label-text text-left">
									<input type="text" class="form-control" id="" name="fields_data[CHANGEKEY][values][CHANGECOL][description]" value="" placeholder="Label description.">
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 form-step-block-input">
							<div class="form-group zero-gap">
								<textarea placeholder="Values: Comma separated value. Value1,Value2,Value3..." name="fields_data[CHANGEKEY][values][CHANGECOL][data]" rows="3" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 col-xs-5 form-step-block-input">
							<select class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][max]">
								<option disabled>Multi select?</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="col-lg-12 zero-gap clearfix">
						<div class="col-lg-12 add_fieldset" data-key="MAINCHANGEKEY" style="margin-top:15px;">
							<span class="btn btn-xs btn-default text-info"><i class="fa fa-plus"></i> Specs field</span>
						</div>
						<input type="hidden" name="fields_data[CHANGEKEY][path]" value="assets/data/jsons/spec_template/">
					</div>
				</div>
			</div>

		</div>
	</div>
</div>