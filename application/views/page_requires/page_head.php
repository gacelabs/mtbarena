<base href="<?php echo base_url(); ?>">
<meta charset="utf-8">
<meta name="theme-color" content="#5d0274">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
	$metaOgEnabledPagesArr = ['landing', 'compare', 'singleBike'];

	$bikeOne = empty($page_data['bikes'][0]) ? '' : $page_data['bikes'][0];
	$bikeTwo = empty($page_data['bikes'][1]) ? '' : $page_data['bikes'][1];
	$bikeCompareUrl = empty($page_data['populars'][0]) ? '' : $page_data['populars'][0]['compare_url']; 

	// prevents Search Engines to crawl
	$noIndexPagesArr = ['dashboard'];
?>
<?php if (in_array($body_id, $metaOgEnabledPagesArr) && !empty($bikeOne)) { ?>
<!-- facebook opengraph -->
<meta property="og:url" content="<?php echo empty($bikeTwo['bike_model']) ? base_url('/').$bikeOne['bike_url'] : base_url('/').$bikeCompareUrl; ?>" />
<meta property="og:type" content="article" />
<meta property="og:title" content="<?php echo empty($bikeTwo['bike_model']) ? 'MTB '.$bikeOne['bike_model'].' - Full Specifications' : 'MTB Match Up: '.$bikeOne['bike_model'].' VS. '.$bikeTwo['bike_model'];?>" />
<meta property="og:description" content="What do you ride?" />
<?php if (empty($bikeTwo)) { ?>
<meta property="og:image" content="<?php echo base_url('/').$bikeOne['feat_photo'] ?>" />
<?php } else { ?>
<meta property="og:image" content="<?php echo base_url('/').$bikeOne['feat_photo'] ?>" />
<meta property="og:image" content="<?php echo base_url('/').$bikeTwo['feat_photo'] ?>" />
<?php } ?>
<meta name="og:site_name" content="MTB Arena" />
<!-- facebook opengraph -->
<?php } else { ?>
<meta name="description" content="MTB Arena | Bike Specifications Comparison Site"  />
<?php } ?>

<?php if (in_array($body_id, $noIndexPagesArr)) { ?>
<meta name="robots" content="noindex">
<?php } ?>

<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/mtbarena_favicon_theme.png'); ?>">
<?php if ($metas) {foreach ($metas as $meta) {echo $meta;}} ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/defaults.css">
<?php
	if (isset($css_links) && $css_links)
	{
		foreach ($css_links as $link) {
			echo '<link rel="stylesheet" type="text/css" href="'.$link.'.css">';
		}
	}
?>
<title><?php echo (empty($title) ? 'MTB Arena' : $title); ?></title>