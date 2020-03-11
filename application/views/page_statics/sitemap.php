<?php header("Content-type: text/xml");?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
	<!-- Sitemap -->
	<?php foreach($items as $loc) { ?>
	<url>
		<loc><?php echo trim($loc); ?></loc>
	</url>
	<?php } ?>
</urlset>
