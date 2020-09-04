<title><?php echo (empty($title) ? 'MTB Arena' : $title); ?></title>
<base href="<?php echo base_url(); ?>">
<meta http-equiv="content-language" content="en">
<meta charset="utf-8">
<meta name="theme-color" content="#5d0274">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php if ($metas) foreach ($metas as $meta) echo $meta; ?>

<?php $this->load->view('page_requires/page_head_fb_og'); ?>

<link rel="icon" type="image/png" href="<?php echo base_url('assets/images/mtbarena_favicon_theme.png'); ?>">
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