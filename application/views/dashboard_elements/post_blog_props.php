<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<p class="zero-gap color-theme"><b>Properties</b></p>
	</div>
	
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-blog-props-parent-box">
			<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
				<!-- show only on edit blog page -->
				<div class="padding-x">
					<div style="margin-bottom:10px;">
						<p class="zero-gap"><b><a target="_blank" id="blog_url-href" href="">View <i class="fa fa-external-link"></i></a></b></p>
						<small class="color-lightgray" id="blog_url-link" style="word-break:break-all;"><?php echo base_url($current_profile['id'].'/blogs/blog-title-goes-here'); ?></small>
					</div>
					<div class="grid-column column-50-50">
						<div>
							<small class="color-lightgray">Posted</small><br>
							<small id="blog-added"></small>
						</div>
						<div>
							<small class="color-lightgray">Updated</small><br>
							<small id="blog-updated"></small>
						</div>
					</div>
				</div>
				<!-- show only on edit blog page -->
			<hr>
			<?php endif ?>

			<div class="padding-x">
				<small class="color-lightgray">Featured Photo</small>
				<img src="<?php echo base_url('assets/images/image-placeholder.jpg'); ?>" class="image-cropped cover elem-block" id="imagePreview" style="margin:10px 0;border:1px solid #eee;max-height:300px;">
				<input type="file" class="form-control" id="imageInput">
			</div>
		</div>
	</div>
</div>
