<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
		<input type="hidden" id="edit-json-data" data-json='<?php echo $page_data["json"];?>'>
		<p class="zero-gap color-theme"><b>Edit blog</b></p>
		<?php else: ?>
		<p class="zero-gap color-theme"><b>Post new blog</b></p>
		<?php endif ?>
	</div>
	
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-blog-parent-box">
		<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
			<form class="post-blog-form" id="post-blog-form" method="post" action="<?php echo base_url('postblog/edit_item/'.$page_data['id'])?>">
		<?php else: ?>
			<form class="post-blog-form" id="post-blog-form" method="post" action="<?php echo base_url('postblog/add_item')?>">
		<?php endif ?>
				<div class="padding-x">
					<div style="margin-bottom: 15px;">
						<label for="basic-url">URL</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3"><?php echo base_url($current_profile['id'].'/blogs/');?></span>
							<input type="text" class="form-control" id="basic-url" name="blog_segment" aria-describedby="basic-addon3" required>
						</div>
						<small class="color-lightgray">NOTE: Letters, numbers, underscores and dashes only.</small>
					</div>
					<div class="form-group">
						<label for="blog_title">Title</label>
						<input type="text" class="form-control" name="blog_title" id="blog_title" style="font-weight:bolder;text-transform:capitalize;">
					</div>
				</div>
				<hr>
				<div class="padding-x">
					<div class="form-group">
						<ul class="spaced-list between" style="margin-bottom: 15px;">
							<li>
								<label>Content</label>
							</li>
							<li>
								<a id="reset-blogpost" class="btn btn-sm btn-danger">Reset</a>
								<button class="btn btn-sm btn-info">Post</button>
							</li>
						</ul>
						<textarea id="textEditor" name="blog_content"></textarea>
					</div>
				</div>
				<input type="hidden" id="blog_feat_photo" name="blog_feat_photo" value="">
			</form>
		</div>
	</div>
</div>
