
<?php if (isset($page_data['mostviews']) AND $page_data['mostviews']): ?>
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Most Viewed Bikes</b></p>
		</div>
		<div class="box-item-body">
			<div class="table-responsive">
				<table class="table table-striped zero-gap" id="most-viewed-bikes">
					<tr>
						<th><small>Bike Model</small></th>
						<th><small>Views</small></th>
					</tr>
					<?php foreach ($page_data['mostviews'] as $key => $bike): ?>
						<tr>
							<td><a href="<?php echo $bike['bike_url'];?>"><?php echo $bike['bike_model'];?></a></td>
							<td align="center" id="bike-vcnt-<?php echo $bike['id'];?>"><?php echo $bike['view_count'];?></td>
						</tr>
					<?php endforeach ?>
				</table>
			</div>
		</div>
	</div>
<?php endif ?>