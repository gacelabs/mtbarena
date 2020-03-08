<?php if (isset($page_data['feed']) AND $page_data['feed']): 
	$feed = $page_data['feed']; ?>
	<?php foreach ($page_data['feed'] as $feed) { ?>
	<div class="news-feed-title-divider">
		<div class="box-item-body news-feed-list-parent">
			<div class="news-feed-item">
				<a href="<?php echo base_url('/').$feed['blog_url']; ?>" class="news-feed-item-body">
					<ul class="spaced-list between">
						<li class="news-feed-item-image-column">
							<div>
								<img class="image-cropped" src="<?php echo $feed['blog_feat_photo'];?>" alt="<?php echo $feed['blog_segment'];?>" title="<?php echo $feed['blog_title'];?>">
							</div>
						</li>
						<li class="news-feed-item-story-column">
							<div class="text-left zero-gap">
								<h3><?php echo ucwords($feed['blog_title']);?></h3>
								<p class="color-black"><?php echo $feed['blog_subtitle'];?></p>
							</div>
							<div class="news-feed-item-story-body">
								<span class="text-limiter"><?php echo trim(strip_tags($feed['blog_content']));?></span>
							</div>
							<div class="news-feed-item-footer-body">
								<ul class="inline-list text-right">
									<li><small class="color-lightgray"><i class="fa fa-clock-o"></i> <?php echo date('M j', strtotime($feed['updated']));?></small></li>
								</ul>
							</div>
						</li>
					</ul>
				</a>
			</div>
		</div>
	<?php } ?>
	</div>
<?php endif ?>