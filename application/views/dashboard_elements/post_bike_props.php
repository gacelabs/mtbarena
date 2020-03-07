<?php if (count($page_data['specs'])) { ?>
<div class="stick-me" style="margin-bottom:15px;">
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Properties</b></p>
		</div>
		<div class="box-item-body">
			<div style="margin-bottom:10px;">
				<p class="zero-gap"><b><a href="<?php echo base_url().json_decode($page_data["json"])[0]->bike_url; ?>">View <i class="fa fa-external-link"></i></a></b></p>
				<small class="color-lightgray"><?php echo json_decode($page_data["json"])[0]->bike_url; ?></small>
			</div>
			<hr>
				<small class="color-lightgray">Featured Photo</small>
				<img src="<?php echo base_url("/").json_decode($page_data["json"])[0]->feat_photo ?>" class="image-cropped cover elem-block">
			<hr>
			<div class="grid-column column-50-50" style="margin-bottom:10px;display:grid;">
				<div>
					<small class="color-lightgray">Posted</small><br>
					<small><?php echo date('M j, Y', strtotime(json_decode($page_data["json"])[0]->added)); ?></small>
				</div>
				<div>
					<small class="color-lightgray">Updated</small><br>
					<small><?php echo date('M j, Y', strtotime(json_decode($page_data["json"])[0]->updated)); ?></small>
				</div>
			</div>
			<div class="grid-column column-50-50" style="margin-bottom:10px;display:grid;">
				<?php if ($page_data['paginate']['prev']): ?>
					<a href="<?php echo $page_data['paginate']['prev'];?>" class="btn btn-xs btn-default">Prev</a>				
				<?php else: ?>
					<div>&nbsp;</div>
				<?php endif ?>
				<?php if ($page_data['paginate']['next']): ?>
					<a href="<?php echo $page_data['paginate']['next'];?>" class="btn btn-xs btn-default">Next</a>				
				<?php else: ?>
					<div>&nbsp;</div>
				<?php endif ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>