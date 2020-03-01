<?php echo'<?xml version="1.0" encoding="UTF-8" ?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
	<!-- Sitemap -->
	<?php foreach($items as $loc) { ?>
	<url>
		<loc><?php echo $loc ?></loc>
		<priority>0.5</priority>
		<changefreq>daily</changefreq>
	</url>
	<?php } ?>

</urlset>