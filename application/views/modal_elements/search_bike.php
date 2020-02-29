<div class="modal fade" tabindex="-1" role="dialog" id="modal_search_bike">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Search bike model</h4>
			</div>
			<div class="modal-body">
				<ul class="grid-column column-50-50">
					<li style="padding-right:10px;">
						<?php $this->load->view('widget_elements/most_viewed_bikes_list'); ?>
					</li>
					<li>
						<form action="" method="post">
							<select class="selectpicker show-tick" data-live-search="true" title="Search bike model" data-width="100%" data-size="4">
								<option data-tokens="trinx x1 elite 2020" data-subtext="- From: Trinx Official (Updated: Feb 2020)">Trinx X1 Elite 2020</option>
								<option data-tokens="phantom 601" data-subtext="- From: Ava Bike Shop (Posted: Dec 2019)">Phantom 601</option>
								<option data-tokens="keysto conquest" data-subtext="- From: Ema Margaret Cycling (Posted: May 2019)">Keysto Conquest</option>
								<option data-tokens="cannondale carbon fiber" data-subtext="- From: Decimal Bike Supplier (Updated: Nov 2019)">Cannondale Carbon Fiber</option>
							</select>
							<div style="margin-top:10px;">
								<button type="submit" class="btn">Compare</button>
							</div>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>