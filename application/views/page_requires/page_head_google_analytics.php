<?php $googleAnalyticsPages = ['landing', 'compare', 'singleBike']; ?>

<?php if (in_array($body_id, $googleAnalyticsPages)) { ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160276033-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-160276033-1');
	</script>
<?php } ?>