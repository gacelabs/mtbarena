<base href="<?php echo base_url(); ?>">
<meta charset="utf-8">
<meta name="theme-color" content="#5d0274">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="MTB Arena compares bike full specifications such as mountain bikes, road bikes, rough road bikes, electronic bikes and more."  />

<meta property="og:url" content="" /> <!-- the URL of the page -->
<meta property="og:type" content="article" />
<meta property="og:title" content="" /> <!-- bike1 VS bike2 -->
<meta property="og:description" content="What do you ride?" />
<meta property="og:image" content="" /> <!-- bike1 VS bike2 screenshot -->
<meta property="site_name" content="MTB Arena" />


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