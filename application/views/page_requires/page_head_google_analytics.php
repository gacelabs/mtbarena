<?php $googleAnalyticsPages = ['landing', 'compare', 'singleBike']; ?>

<?php if (in_array($body_id, $googleAnalyticsPages)) { ?>
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160276033-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-160276033-1');
	</script>


<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-KSTM2RN');</script>
<?php } ?>