<meta charset="utf-8">
<meta name="theme-color" content="#ff9818">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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