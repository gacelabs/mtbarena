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
						<th><small>Updated</small></th>
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
									<img class="image-cropped small" style="border:1px solid #ccc;object-fit:scale-down;" src="<?php echo $bike['feat_photo'];?>" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
								</th>
								<th>
									<?php echo $bike['bike_model'];?>
									<br>
									<small class="color-lightgray"><?php echo date('M j, Y', strtotime($bike['added']));?></small>		
								</th>
								<td>
									<?php echo date('M j, Y', strtotime($bike['updated']));?> <small class="color-lightgray"></small>
									
								</td>
								<td><?php echo $bike['view_count'];?></td>
								<td><?php echo $bike['like_count'];?></td>
								<td>
									<a href="<?php echo $bike['bike_url'];?>">Link</a> 
									<span class="color-lightgray" style="padding:0 5px;">|</span>
									<a href="<?php echo base_url('/dashboard/edit-bike/') ?><?php echo $bike['id'];?>">Edit</a> 
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>