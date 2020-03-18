<?php 
	// debug($page_data['fields']);
?>
<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<p class="zero-gap color-theme"><b>Specifications Template</b></p>
	</div>
	
	<div class="box-item-body" style="padding:0;">
		<div class="table-responsive post-bike-parent-box">
			<form action="<?php echo base_url('dashboard/save_fields');?>" method="post" enctype="multipart/form-data" id="postBikeForm">
				<?php 
					$key = 0;
					if (isset($page_data['fields']) AND $page_data['fields']): ?>
					<?php foreach ($page_data['fields'] as $key => $field): ?>
						<input type="hidden" name="fields_data[<?php echo $key;?>][id]" value="<?php echo $field['id'];?>">
						<div class="clearfix form-step-block mainset" id="<?php echo $field['base'];?>">
							<div class="col-lg-12">
								<div class="form-group">
 									<h4 style="margin-top: 0"><b class="color-theme"><input type="text" class="form-control" name="fields_data[<?php echo $key;?>][base]" value="<?php echo ucfirst($field['base']);?>" placeholder="Bike part: Frame, Fork, Saddle, etc..." /></b></h4>
								</div>
							</div>
							<?php 
								$cnt = 0;
								foreach ($field['values'] as $column => $row): ?>
								<div class="form-step-body clearfix fieldset">
									<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 form-step-block-label">
										<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][sort]" value="<?php echo ucfirst($row['sort']);?>" placeholder="#" />
									</div>
									<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8 form-step-block-label spec-desc-box">
										<div class="form-group" style="margin-bottom:5px;">
											<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][column]" value="<?php echo ucfirst($row['column']);?>" placeholder="Spec label: Brand, Sizes, Types, etc..." />
										</div>
										<div class="form-group">
											<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][description]" value="<?php echo $row['description'];?>" placeholder="Label description." />
										</div>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 form-step-block-input">
										<div class="form-group">
											<textarea placeholder="Values: Comma separated value. Value1,Value2,Value3..." name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][data]" class="form-control"><?php echo $row['data'];?></textarea>
										</div>
									</div>
									<div class="col-lg-2 col-md-2 col-sm-2 form-step-block-input">
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
							<div class="add_fieldset" data-key="<?php echo $key;?>" style="padding:0 10px;">
								<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> Add a Spec</span>
							</div>
							<input type="hidden" name="fields_data[<?php echo $key;?>][path]" value="assets/data/jsons/<?php echo $field['base'];?>.json">
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<div class="clearfix">
					<div class="col-lg-12">
						<div class="form-step-footer add_mainset" data-key="<?php echo $key;?>" style="padding:10px 0;">
							<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> New Bike part</span>
						</div>
						<hr>
						<button type="submit" class="btn btn-info">Save</button>
						<div class="hidden-xs"><br></div>
					</div>
				</div>
			</form>

			<div class="hide" id="main_template">
				<div class="clearfix form-step-block mainset">
					<div class="col-lg-12">
						<div class="form-group">
							<h4 style="margin-top: 0"><b class="color-theme"><input type="text" class="form-control" name="fields_data[CHANGEKEY][base]" value="" placeholder="Bike part: Frame, fork, saddle, etc..." /></b></h4>
						</div>
					</div>
					<div class="form-step-body clearfix fieldset" id="field_template">
						<div class="col-lg-1 col-md-1 col-sm-1 col-xs-3 form-step-block-label">
							<input type="text" class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][sort]" value="" placeholder="#">
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-8 form-step-block-label spec-desc-box">
							<div class="form-group" style="margin-bottom:5px;">
								<input type="text" class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][column]" value="" placeholder="Spec label: Brand, Sizes, Types, etc...">
							</div>
							<div class="form-group">
								<p class="sub-label-text text-left">
									<input type="text" class="form-control" id="" name="fields_data[CHANGEKEY][values][CHANGECOL][description]" value="" placeholder="Label description.">
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 form-step-block-input">
							<div class="form-group">
								<textarea placeholder="Values: Comma separated value. Value1,Value2,Value3..." name="fields_data[CHANGEKEY][values][CHANGECOL][data]" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-lg-2 col-md-2 col-sm-2 form-step-block-input">
							<select class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][max]">
								<option disabled>Multi select?</option>
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="add_fieldset" data-key="MAINCHANGEKEY" style="margin-top:15px;">
						<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> Add a Spec</span>
					</div>
					<input type="hidden" name="fields_data[CHANGEKEY][path]" value="assets/data/jsons/">
				</div>
			</div>

		</div>
	</div>
</div>