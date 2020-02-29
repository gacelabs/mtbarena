
<?php if (isset($page_data['mostviews']) AND $page_data['mostviews']): ?>
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Most Viewed Bikes</b></p>
		</div>
		<div class="box-item-body">
			<div class="table-responsive">
				<table class="table table-striped zero-gap">
					<thead>
						<tr>
							<th><small>#</small></th>
							<th><small>Bike Model</small></th>
							<th><small>Views</small></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($page_data['mostviews'] as $key => $bike): ?>
							<tr>
								<th scope="row"><?php echo $key+1;?></th>
								<td><a href="<?php echo $bike['bike_url'];?>"><?php echo $bike['bike_model'];?></a></td>
								<td><?php echo $bike['view_count'];?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
<?php endif ?>