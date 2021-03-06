<?php if (isset($page_data['all_blogs']) AND $page_data['all_blogs']): 
	$feed = $page_data['all_blogs']; ?>
	<?php foreach ($page_data['all_blogs'] as $feed) { ?>
	<div class="news-feed-title-divider" id="blog_archives">
		<div class="news-feed-list-parent">
			<div class="news-feed-item">
				<a href="<?php echo base_url('/').$feed['blog_url']; ?>">
					<ul style="display: flex;">
						<li class="news-feed-item-image-column">
							<div>
								<img class="image-cropped" src="<?php echo $feed['blog_feat_photo'];?>" alt="<?php echo $feed['blog_segment'];?>" title="<?php echo $feed['blog_title'];?>">
							</div>
						</li>
						<li class="news-feed-item-story-column">
							<div>
								<div class="text-left zero-gap" style="padding-bottom: 15px;">
									<p class="blog-title text-ellipsis zero-gap"><?php echo ucwords($feed['blog_title']);?></p>
									<p class="text-ellipsis zero-gap"><small><?php echo trim(strip_tags($feed['blog_content']));?></small></p>
								</div>
								<div class="text-ellipsis">
									<small><i class="fa fa-calendar color-lightgray"></i> <?php echo date('M j, Y', strtotime($feed['updated'])); ?> | </small>
									<small><i class="fa fa-user color-lightgray"></i> <?php echo $feed['store_name']; ?></small>
								</div>
							</div>
						</li>
					</ul>
				</a>
			</div>
		</div>
	<?php } ?>
	</div>
<?php endif ?>