<div class="box-item">
	<div class="box-item-body-top">
		<a href="<?php echo base_url('dashboard/post-bike'); ?>" class="btn btn-info btn-sm">New Bike</a>
	</div>
	<div class="box-item-body">
		<div class="table-responsive zero-gap">
			<table class="table table-striped zero-gap">
				<thead>
					<tr>
						<th><small>Photo</small></th>
						<th><small>Bike Model</small></th>
						<th><small>Date</small></th>
						<th><small>Views</small></th>
						<th><small>Likes</small></th>
						<th><small>Actions</small></th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($page_data['specs']) AND $page_data['specs']): ?>
						<?php foreach ($page_data['specs'] as $key => $bike): ?>
							<tr>
								<th scope="row">
									<img class="image-cropped cover small" style="border:1px solid #ccc;" src="<?php echo $bike['feat_photo'];?>" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
								</th>
								<th><?php echo $bike['bike_model'];?></th>
								<td><?php echo date('M j, Y', strtotime($bike['updated']));?> <small class="color-lightgray">(Updated)</small></td>
								<td><?php echo $bike['view_count'];?></td>
								<td><?php echo $bike['like_count'];?></td>
								<td>
									<a href="<?php echo $bike['bike_url'];?>">View</a> 
									<span class="color-lightgray" style="padding:0 5px;">|</span>
									<a href="/dashboard/edit-bike/<?php echo $bike['id'];?>">Edit</a> 
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>