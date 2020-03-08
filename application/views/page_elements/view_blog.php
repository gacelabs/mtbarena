<?php

	$blog = empty($page_data['blog_data']) ? 'Error loading blog.' : $page_data['blog_data'][0];
	$user = empty($page_data['user_data']) ? '' : $page_data['user_data'];

?>

<div class="box-item">
	<div class="box-item-body">
		<div style="margin:0 -10px;">
			<ul class="spaced-list between" style="padding: 0 10px;">
				<li>
					<ul class="inline-list">
						<li>
							<small><i class="fa fa-calendar"></i> <?php echo date('M j, Y', strtotime($blog['updated'])); ?> | </small>
						</li>
						<li>
							<small><i class="fa fa-user"></i> <?php echo $user['id'] == 1 ? 'MTB Arena' : $user['store_name']; ?></small>
						</li>
					</ul>
				</li>
				<li>
					<ul class="inline-list">
						<li>
							<button type="button" class="btn btn-xs btn-sq" onclick="popupSharer(this, '<?php echo current_full_url();?>', <?php echo $blog['id'];?>, '<?php echo $this->class_name;?>');">
								<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd class="shcount"><?php echo $blog['share_count'];?></kbd></small>
							</button>
							<button type="button" class="btn btn-xs btn-sq" onclick='countHeart(this, "<?php echo $this->class_name;?>", <?php echo json_encode(['data'=>json_encode([$blog['id']])]);?>)'>
								<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd class="hcount"><?php echo $blog['like_count'];?></kbd></small>
							</button>
						</li>
					</ul>
				</li>
			</ul>
			<hr>		
		</div>

		<h2><?php echo ucwords($blog['blog_title']); ?></h2>
		<?php if ($blog['blog_feat_photo']) { ?>
		<img src="<?php echo base_url($blog['blog_feat_photo']); ?>" width="100%" class="img-align center">
		<?php } ?>
		<br/><br/>
		<div id="main-blog-content">
			<?php echo empty($blog['blog_content']) ? '' : $blog['blog_content'];?>
		</div>

	</div>
</div>
