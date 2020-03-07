
<?php if (isset($page_data['feed']) AND $page_data['feed']): 
	$feed = $page_data['feed']; ?>
	<div class="news-feed-title-divider">
		<div class="text-left zero-gap">
			<h3><?php echo $feed['blog_title'];?></h3>
			<p class="color-black"><?php echo $feed['blog_subtitle'];?></p>
		</div>
		<div class="box-item-body news-feed-list-parent">
			<div class="news-feed-item">
				<a href="" class="news-feed-item-body">
					<ul class="spaced-list between">
						<li class="news-feed-item-image-column">
							<div>
								<img class="image-cropped" src="<?php echo $feed['blog_feat_photo'];?>" alt="<?php echo $feed['blog_segment'];?>" title="<?php echo $feed['blog_title'];?>">
							</div>
						</li>
						<li class="news-feed-item-story-column">
							<div class="news-feed-item-story-body">
								<?php echo $feed['blog_content'];?>
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
	</div>
<?php endif ?>
