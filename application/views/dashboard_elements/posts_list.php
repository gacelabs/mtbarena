<div class="box-item">
	<div class="box-item-body-top">
		<a href="<?php echo base_url('dashboard/post-bike'); ?>" class="btn btn-info btn-sm">New Bike</a>
	</div>
	<div class="box-item-body">
		<div class="table-responsive zero-gap">
			<table class="table table-striped zero-gap render-datatable">
				<thead>
					<tr>
						<th><div class="th-inner"><small>Photo</small></div></th>
						<th><div class="th-inner"><small>Bike Model</small></div></th>
						<th><div class="th-inner"><small>Updated</small></div></th>
						<th><div class="th-inner"><small>Views</small></div></th>
						<th><div class="th-inner"><small>Likes</small></div></th>
						<th><div class="th-inner"><small>Actions</small></div></th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($page_data['specs']) AND $page_data['specs']): ?>
						<?php foreach ($page_data['specs'] as $key => $bike): ?>
							<tr>
								<td scope="row">
									<img class="image-cropped small" style="border:1px solid #ccc;object-fit:scale-down;" src="<?php echo $bike['feat_photo'];?>" alt="<?php echo ucwords($bike['bike_model']);?>" title="<?php echo ucwords($bike['bike_model']);?>">
								</td>
								<td>
									<?php echo $bike['bike_model'];?>
									<br>
									<small class="color-lightgray"><?php echo date('M j, Y', strtotime($bike['added']));?></small>		
								</td>
								<td>
									<?php echo date('M j, Y', strtotime($bike['updated']));?> <small class="color-lightgray"></small>
								</td>
								<td><?php echo $bike['view_count'];?></td>
								<td><?php echo $bike['like_count'];?></td>
								<td>
									<a href="<?php echo $bike['bike_url'];?>">Link</a> 
									<span class="color-lightgray" style="padding:0 5px;">|</span>
									<a href="<?php echo base_url('dashboard/edit-bike/') ?><?php echo $bike['id'];?>">Edit</a> 
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="box-item">
	<div class="box-item-body-top">
		<a href="<?php echo base_url('dashboard/post-blog'); ?>" class="btn btn-info btn-sm">New Blog</a>
	</div>
	<div class="box-item-body">
		<div class="table-responsive zero-gap">
			<table class="table table-striped zero-gap render-datatable">
				<thead>
					<tr>
						<th><div class="th-inner"><small>Photo</small></div></th>
						<th><div class="th-inner"><small>Blog Title</small></div></th>
						<th><div class="th-inner"><small>Updated</small></div></th>
						<th><div class="th-inner"><small>Views</small></div></th>
						<th><div class="th-inner"><small>Likes</small></div></th>
						<th><div class="th-inner"><small>Actions</small></div></th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($page_data['blogs']) AND $page_data['blogs']): ?>
						<?php foreach ($page_data['blogs'] as $key => $blog): ?>
							<tr>
								<td scope="row">
									<img class="image-cropped small" style="border:1px solid #ccc;object-fit:scale-down;" src="<?php echo $blog['blog_feat_photo']; ?>" alt="" title="">
								</td>
								<td>
									<?php echo $blog['blog_title']; ?>
									<br>
									<small class="color-lightgray"><?php echo date('M j, Y', strtotime($blog['added']));?></small>		
								</td>
								<td>
									<?php echo date('F j, Y', strtotime($blog['updated']));?>
								</td>
								<td><?php echo $blog['view_count']; ?></td>
								<td><?php echo $blog['like_count']; ?></td>
								<td>
									<a href="<?php echo base_url($blog['blog_url']); ?>">Link</a> 
									<span class="color-lightgray" style="padding:0 5px;">|</span>
									<a href="<?php echo base_url('dashboard/edit-blog/'.$blog['id']); ?>">Edit</a>
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>