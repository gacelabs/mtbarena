<?php 
	// debug($page_data['fields']);
?>
<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<p class="zero-gap color-theme"><b>Post fields</b></p>
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
									<label class="zero-gap">Bike part</label>
 									<h4 style="margin-top: 0"><b class="color-theme"><input type="text" class="form-control" name="fields_data[<?php echo $key;?>][base]" value="<?php echo ucfirst($field['base']);?>" placeholder="Frame, Fork, Saddle, etc..." /></b></h4>
								</div>
							</div>
							<?php 
								$cnt = 0;
								foreach ($field['values'] as $column => $row): ?>
								<div class="form-step-body clearfix fieldset">
									<div class="col-lg-3 form-step-block-label">
										<label class="zero-gap">Spec label<input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][column]" value="<?php echo ucfirst($row['column']);?>"></label>
										<div>&nbsp;</div>
										<label class="zero-gap">Label info</label>
										<p class="sub-label-text text-left"><input type="text" class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][description]" value="<?php echo $row['description'];?>"></p>
									</div>
									<div class="col-lg-6 form-step-block-input">
										<div class="form-group">
										<label class="zero-gap">Values</label>
											<textarea placeholder="Comma separated value. Value1,Value2,Value3..." name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][data]" class="form-control"><?php echo $row['data'];?></textarea>
										</div>
									</div>
									<div class="col-lg-3 form-step-block-input">
										<label class="zero-gap">Multiple select</label>
										<select class="form-control" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][max]">
											<option value="1"<?php echo $row['max'] == 1 ? ' selected' : '';?>>Yes</option>
											<option value="0"<?php echo $row['max'] == 0 ? ' selected' : '';?>>No</option>
										</select>
									</div>
								</div>
							<?php 
								$cnt++;
								endforeach ?>
							<div class="add_fieldset" data-key="<?php echo $key;?>">
								<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> Add Fields</span>
							</div>
							<input type="hidden" name="fields_data[<?php echo $key;?>][path]" value="assets/data/jsons/<?php echo $field['base'];?>.json">
						</div>
					<?php endforeach ?>
				<?php endif ?>
				<div style="padding:10px;">
					<div class="form-step-footer clearfix add_mainset" data-key="<?php echo $key;?>" style="padding:10px 0;">
						<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> New Bike part</span>
					</div>
					<button type="submit" class="btn btn-info">Save</button>
				</div>
			</form>

			<div class="hide" id="main_template">
				<div class="clearfix form-step-block mainset">
					<div class="col-lg-12">
						<div class="form-group">
							<label class="zero-gap">Bike part</label>
							<h4 style="margin-top: 0"><b class="color-theme"><input type="text" class="form-control" name="fields_data[CHANGEKEY][base]" value="" placeholder="Frame, fork, saddle, etc..." /></b></h4>
						</div>
					</div>
					<div class="form-step-body clearfix fieldset" id="field_template">
						<div class="col-lg-3 form-step-block-label">
							<div class="form-group">
								<label class="zero-gap">Spec label<input type="text" class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][column]" value="" placeholder="Brand, Sizes, Types, etc..."></label>
							</div>
							<div class="form-group">
								<label class="zero-gap">Label info</label>
								<p class="sub-label-text text-left"><input type="text" class="form-control" id="" name="fields_data[CHANGEKEY][values][CHANGECOL][description]" value=""></p>
							</div>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<label class="zero-gap">Values</label>
								<textarea placeholder="Comma separated value. Value1,Value2,Value3..." name="fields_data[CHANGEKEY][values][CHANGECOL][data]" class="form-control"></textarea>
							</div>
						</div>
						<div class="col-lg-3 form-step-block-input">
							<label class="zero-gap">Multiple select</label>
							<select class="form-control" name="fields_data[CHANGEKEY][values][CHANGECOL][max]">
								<option value="1">Yes</option>
								<option value="0">No</option>
							</select>
						</div>
					</div>
					<div class="add_fieldset" data-key="MAINCHANGEKEY">
						<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> Add Fields</span>
					</div>
					<input type="hidden" name="fields_data[CHANGEKEY][path]" value="assets/data/jsons/">
				</div>
			</div>

		</div>
	</div>
</div>