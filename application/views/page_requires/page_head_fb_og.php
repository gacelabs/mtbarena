<?php
	$ogTitle = '';
	$ogImageArr = [];
	$ogDescription = '';

	// for pages that has bikes
	$metaForBikepages = ['landing', 'compare', 'singleBike'];
	if (in_array($body_id, $metaForBikepages)) {
		$bikeOne = empty($page_data['bikes']['info'][0]) ? '' : $page_data['bikes']['info'][0];
		$bikeTwo = empty($page_data['bikes']['info'][1]) ? '' : $page_data['bikes']['info'][1];
		$bikeCompareUrl = empty($page_data['populars'][0]) ? '' : $page_data['populars'][0]['compare_url']; 

		if (empty($bikeOne)) {
			$ogDescription = "MTB Arena - View Full Specifications of your favorite bikes.";
			$ogTitle = 'MTB Area';
		} else {
			$ogTitle = empty($bikeTwo['bike_model']) ? 'MTB '.$bikeOne['bike_model'].' - Full Specifications' : 'MTB Match Up: '.$bikeOne['bike_model'].' VS. '.$bikeTwo['bike_model'];
			array_push($ogImageArr, base_url('/').$bikeOne['feat_photo'], empty($bikeTwo['feat_photo']) ? '' : base_url('/').$bikeTwo['feat_photo']);
			$ogDescription = 'What do you ride?';
		}
	}

	// for blog pages
	$metaForBlogpages = ['postBlog'];
	$blog = empty($page_data['blog_data']) ? '' : $page_data['blog_data'][0];
	if (in_array($body_id, $metaForBlogpages)) {
		$ogTitle = ucwords($blog['blog_title']);
		$ogImageArr = [base_url('/').$blog['blog_feat_photo']];
		$ogDescription = trim(strip_tags($blog['blog_content']));
	}

	// prevents Search Engines to crawl
	$noIndexPagesArr = ['dashboard'];
?>
<?php if (in_array($body_id, $noIndexPagesArr)) { ?>
	<meta name="robots" content="noindex,nofollow">
<?php } else { ?>
	<meta name="description" content="<?php echo $ogDescription;?>" />
	<!-- facebook opengraph -->
	<meta property="fb:app_id" content="'<?php echo APPID;?>'" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="<?php echo current_full_url();?>" />
	<meta property="og:title" content="<?php echo $ogTitle;?>" />
	<meta property="og:description" content="<?php echo $ogDescription;?>" />
	<meta name="og:site_name" content="MTB Arena" />
	<link rel="canonical" href="<?php echo current_full_url();?>" />
	<?php foreach ($ogImageArr as $image) { ?>
		<?php if (empty($image)) { ?>
			<?php continue; ?>
		<?php } ?>
		<meta property="og:image" content="<?php echo $image; ?>" />
	<?php } ?>
	<meta name="robots" content="index,follow">
	<!-- facebook opengraph -->
<?php } ?>