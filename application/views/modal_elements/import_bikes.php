<?php if ($current_profile) { ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modal_import_file">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Import Bikes</h4>
			</div>
			<div class="modal-body">
				<ul class="grid-column">
					<li class="form-box">
						<form action="<?php echo base_url('dashboard/import_posts'); ?>" enctype="multipart/form-data" method="post">
							<div class="form-group">
								<label for="email_address">Choose CSV file only</label>
								<input type="file" class="form-control" name="csv_file" id="csv_file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required="required">
							</div>
							<ul class="spaced-list between">
								<li>
									<button type="submit" class="btn btn-info">Import</button>
								</li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php } ?>