<?php
	$ad = ['id' => '', 'name' => '', 'link' => '', 'image' => FALSE];
	$has_ad = 6;
	if (isset($page_data['ad']) AND $page_data['ad']) {
		$ad = $page_data['ad'][0];
		$has_ad = 4;
	}
	// debug($ad);
?>

<div class="box-item">
	<div class="box-item-body">
		<div class="table-responsive zero-gap">
			<div class="col-lg-12 box-item-body-top">
				<p class="zero-gap color-theme"><b><?php if ($has_ad == 4): ?>Edit Ad<?php else: ?>Ads<?php endif ?> Panel</b></p>
			</div>
			<form action="<?php echo base_url('dashboard/ads_panel/save/');?><?php echo $ad['id'];?>" method="post" enctype="multipart/form-data" id="adsPanelForm">
				<div class="col-lg-12">
					<br>
					<div class="form-group">
						<label>Name</label>
						<input type="text" class="form-control color-theme" name="name" required="required" value="<?php echo $ad['name'];?>" />
					</div>
					<div class="form-group">
						<label>Link</label>
						<input type="url" class="form-control color-theme" name="link" required="required" value="<?php echo $ad['link'];?>" />
					</div>
				</div>
				<div class="col-lg-<?php echo $has_ad;?> col-md-<?php echo $has_ad;?> col-sm-<?php echo $has_ad;?> col-xs-12">
					<div class="form-group zero-gap">
						<label for="ad_photo">Ad Photo</label>
						<input type="file" class="form-control no-border" name="ad_photo" id="ad_photo"<?php if ($has_ad == 6): ?> required="required"<?php endif ?>>
					</div>
				</div>
				<?php if ($has_ad == 4): ?>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="form-group zero-gap text-center">
							<img class="image-cropped medium" style="border:1px solid #ccc;object-fit:scale-down;" src="<?php echo $ad['image'];?>" alt="<?php echo ucwords($ad['name']);?>" title="<?php echo ucwords($ad['name']);?>">
						</div>
					</div>
				<?php endif ?>
				<div class="col-lg-<?php echo $has_ad;?> col-md-<?php echo $has_ad;?> col-sm-<?php echo $has_ad;?> col-xs-12">
					<br>
					<div class="form-group zero-gap pull-right">
						<input type="submit" class="btn btn-success btn-lg" id="save-btn" value="Save Ad">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="box-item">
	<div class="box-item-body">
		<div class="table-responsive zero-gap">
			<table class="table table-striped zero-gap render-datatable">
				<thead>
					<tr>
						<th><div class="th-inner"><small>Ad Image</small></div></th>
						<th><div class="th-inner"><small>Ad Name</small></div></th>
						<th><div class="th-inner"><small>Updated</small></div></th>
						<th><div class="th-inner"><small>Actions</small></div></th>
					</tr>
				</thead>
				<tbody>
					<?php if (isset($page_data['ads']) AND $page_data['ads']): ?>
						<?php foreach ($page_data['ads'] as $key => $ad): ?>
							<tr>
								<td scope="row">
									<img class="image-cropped small" style="border:1px solid #ccc;object-fit:scale-down;" src="<?php echo $ad['image'];?>" alt="<?php echo ucwords($ad['name']);?>" title="<?php echo ucwords($ad['name']);?>">
								</td>
								<td data-sort="<?php echo ucwords($ad['name']);?>">
									<?php echo ucwords($ad['name']);?>
									<br>
									<small class="color-lightgray"><?php echo date('M j, Y', strtotime($ad['added']));?></small>		
								</td>
								<td data-sort="<?php echo strtotime($ad['last_updated']);?>">
									<?php echo date('M j, Y', strtotime($ad['last_updated']));?> <small class="color-lightgray"></small>
								</td>
								<td>
									<a href="<?php echo $ad['link'];?>">Link</a> 
									<span class="color-lightgray" style="padding:0 5px;">|</span>
									<a href="<?php echo base_url('dashboard/ads_panel/edit/'.$ad['id']);?>">Edit</a> 
								</td>
							</tr>
						<?php endforeach ?>
					<?php endif ?>
				</tbody>
			</table>
		</div>
	</div>
</div>