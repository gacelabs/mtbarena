<div class="box-item" style="margin-bottom: 15px;">
	<div class="box-item-body-top">
		<?php if (isset($page_data['is_edit']) AND $page_data['is_edit']): ?>
		<p class="zero-gap color-theme"><b>Edit blog</b></p>
		<?php else: ?>
		<p class="zero-gap color-theme"><b>Post new blog</b></p>
		<?php endif ?>
	</div>
	
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-blog-parent-box">
			<form class="post-blog-form" method="post" action="">
				<div class="padding-x">
					<div style="margin-bottom: 15px;">
						<label for="basic-url">URL</label>
						<div class="input-group">
							<span class="input-group-addon" id="basic-addon3"><?php echo base_url(); ?>USER-ID-HERE/blogs/</span>
							<input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" required>
							<span class="input-group-btn">
								<button class="btn btn-default" type="button">Save</button>
							</span>
						</div>
						<small class="color-lightgray">Note: Letters, numbers, underscores and dashes only.</small>
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
								<button class="btn btn-sm btn-info">Post</button>
							</li>
						</ul>
						<textarea id="textEditor"></textarea>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
