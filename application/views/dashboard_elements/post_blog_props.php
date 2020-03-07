<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<p class="zero-gap color-theme"><b>Properties</b></p>
	</div>
	
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-blog-props-parent-box">
			<!-- show only on edit blog page -->
			<div class="padding-x" style="margin-bottom:10px;">
				<p class="zero-gap"><b><a href="">View <i class="fa fa-external-link"></i></a></b></p>
				<small class="color-lightgray" style="word-break:break-all;"><?php echo base_url(); ?>USER-ID-HERE/blogs/blog-title-goes-here</small>
			</div>
			<!-- show only on edit blog page -->

			<form class="blog-props-form" method="post" action="">
				<hr>
					<div class="padding-x">
						<small class="color-lightgray">Featured Photo</small>
						<img src="<?php echo base_url('assets/images/image-placeholder.jpg'); ?>" class="image-cropped cover elem-block" id="imagePreview" style="margin:10px 0;border:1px solid #eee;max-height:300px;">
						<input type="file" name="feat_photo" class="form-control" id="imageInput">
					</div>
				<hr>
			</form>
			
			<!-- show only on edit blog page -->
			<div class="padding-x grid-column column-50-50" style="margin-bottom:10px;display:grid;">
				<div>
					<small class="color-lightgray">Posted</small><br>
					<small></small>
				</div>
				<div>
					<small class="color-lightgray">Updated</small><br>
					<small></small>
				</div>
			</div>
			<!-- show only on edit blog page -->
		</div>
	</div>
</div>
