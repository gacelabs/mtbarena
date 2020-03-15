<?php if (count($page_data['specs'])) { ?>
<div class="stick-me" style="margin-bottom:15px;">
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Properties</b></p>
		</div>
		<div class="box-item-body" style="padding:10px 0;">
			<div class="padding-x">
				<div style="margin-bottom:10px;">
					<p class="zero-gap"><b><a href="<?php echo base_url().json_decode($page_data["json"])->bike_url; ?>">View <i class="fa fa-external-link"></i></a></b></p>
					<small class="color-lightgray"><?php echo json_decode($page_data["json"])->bike_url; ?></small>
				</div>
				<div class="grid-column column-50-50">
					<div>
						<small class="color-lightgray">Posted</small><br>
						<small><?php echo date('M j, Y', strtotime(json_decode($page_data["json"])->added)); ?></small>
					</div>
					<div>
						<small class="color-lightgray">Updated</small><br>
						<small><?php echo date('M j, Y', strtotime(json_decode($page_data["json"])->updated)); ?></small>
					</div>
				</div>
			</div>
			<hr>
				<div class="padding-x">
					<small class="color-lightgray">Featured Photo</small>
					<img src="<?php echo base_url("/").json_decode($page_data["json"])->feat_photo ?>" class="image-cropped cover elem-block" style="margin-top:10px;">
				</div>
			<hr>
			<div class="padding-x">
				<small class="color-lightgray">Bike Posts</small><br>
				<ul class="inline-list" style="margin-top:10px;">
					<?php if ($page_data['paginate']['prev']): ?>
						<li>
							<a href="<?php echo $page_data['paginate']['prev'];?>" class="btn btn-xs btn-default"><i class="fa fa-angle-left"></i> Prev</a>				
						</li>
					<?php else: ?>
					<?php endif ?>
					<?php if ($page_data['paginate']['next']): ?>
						<li>
							<a href="<?php echo $page_data['paginate']['next'];?>" class="btn btn-xs btn-default">Next <i class="fa fa-angle-right"></i></a>
						</li>
					<?php else: ?>
					<?php endif ?>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php } ?>