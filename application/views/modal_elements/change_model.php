<div class="modal fade" tabindex="-1" role="dialog" id="modal_change_model">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Search bike model</h4>
			</div>
			<div class="modal-body">
				<ul class="grid-column column-50-50">
					<li style="padding-right:10px;">
						<?php $this->load->view('widget_elements/most_viewed_bikes'); ?>
					</li>
					<li>
						<form action="" method="post">
							<div class="form-group">
								<input type="text" class="form-control" name="search_bike_input" id="search_bike_input" style="box-shadow:none;">
							</div>
							<ul class="spaced-list between">
								<li>
									<button type="submit" class="btn">Search</button>
								</li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>