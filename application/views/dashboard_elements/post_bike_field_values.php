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
								<h4 style="margin-top: 0"><b class="color-theme"><input type="text" name="fields_data[<?php echo $key;?>][base]" value="<?php echo ucfirst($field['base']);?>"></b></h4>
							</div>
							<?php 
								$cnt = 0;
								foreach ($field['values'] as $column => $row): ?>
								<div class="form-step-body clearfix fieldset">
									<div class="col-lg-3 form-step-block-label">
										<label class="zero-gap" for=""><input type="text" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][column]" value="<?php echo $row['column'];?>"></label>
										<p class="sub-label-text"><input type="text" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][description]" value="<?php echo $row['description'];?>"></p>
									</div>
									<div class="col-lg-6 form-step-block-input">
										<div class="form-group">
											<textarea name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][data]" class="form-control"><?php echo $row['data'];?></textarea>
										</div>
									</div>
									<input type="text" name="fields_data[<?php echo $key;?>][values][<?php echo $cnt;?>][max]" value="<?php echo $row['max'];?>">
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
				<div class="form-step-footer clearfix add_mainset" data-key="<?php echo $key;?>">
					<span class="btn btn-xs text-info"><i class="fa fa-plus"></i> Add Main</span>
				</div>
				<button type="submit" class="btn btn-info">Save</button>
			</form>

			<div class="hide" id="main_template">
				<div class="clearfix form-step-block mainset">
					<div class="col-lg-12">
						<h4 style="margin-top: 0"><b class="color-theme"><input type="text" name="fields_data[CHANGEKEY][base]" value=""></b></h4>
					</div>
					<div class="form-step-body clearfix fieldset" id="field_template">
						<div class="col-lg-3 form-step-block-label">
							<label class="zero-gap" for=""><input type="text" name="fields_data[CHANGEKEY][values][CHANGECOL][column]" value=""></label>
							<p class="sub-label-text"><input type="text" name="fields_data[CHANGEKEY][values][CHANGECOL][description]" value=""></p>
						</div>
						<div class="col-lg-6 form-step-block-input">
							<div class="form-group">
								<textarea name="fields_data[CHANGEKEY][values][CHANGECOL][data]" class="form-control"></textarea>
							</div>
						</div>
						<input type="text" name="fields_data[CHANGEKEY][values][CHANGECOL][max]" value="">
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