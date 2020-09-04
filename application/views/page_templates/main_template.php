<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('page_requires/page_head'); ?>
	<script id="static-instance">
		const viewCountThreshold = <?php echo VIEW_COUNT_THRESHOLD;?>;
		const user = <?php echo $this->session->userdata('profile') ? json_encode($this->session->userdata('profile')) : '{}';?>;
		const className = '<?php echo $this->class_name;?>';
	</script>
	<?php if (!in_array($body_id, ['dashboard'])): ?>
		<script type="text/javascript">
			window.fbAsyncInit = function() {
				FB.init({
					appId      : '<?php echo APPID;?>',
					cookie     : true,
					xfbml      : true,
					version    : 'v6.0'
				});
				FB.AppEvents.logPageView();   
			};
			(function(d, s, id){
				var js, fjs = d.getElementsByTagName(s)[0];
				if (d.getElementById(id)) {return;}
				js = d.createElement(s); js.id = id;
				js.src = "https://connect.facebook.net/en_US/sdk.js";
				fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
	<?php endif ?>
</head>

<body id="<?php echo (empty($body_id) ? '' : $body_id); ?>" class="<?php echo (empty($body_class) ? '' : $body_class); ?>">
	<?php
		$whitelist = array(
			'127.0.0.1',
			'::1'
		);
		if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){
			$googleAnalyticsPages = ['landing', 'compare', 'singleBike'];
			if (in_array($body_id, $googleAnalyticsPages)) {
				echo '<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KSTM2RN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>';
			}
		}
	?>
	</div>
		<!-- page nav -->
		<?php
			if (isset($page_nav) && $page_nav)
			{
				$this->load->view($page_nav);
			}
			else
			{
				echo "page_nav module unable to load.<br>";
			}
		?>

		<!-- page body -->
		<div class="container">
			<div class="row">
				<div class="<?php echo(!empty($page_left_column['column_visibility_class']) ? $page_left_column['column_visibility_class'] : ''); ?>">
					<?php
						foreach ($page_left_column['ui_elements'] as $ui_element) {
							$this->load->view($ui_element);
						}
					?>
				</div>

				<div class="<?php echo(!empty($page_center_column['column_visibility_class']) ? $page_center_column['column_visibility_class'] : ''); ?>" col-position="center">
					<?php 
						foreach ($page_center_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>
				

				<div class="<?php echo(!empty($page_right_column['column_visibility_class']) ? $page_right_column['column_visibility_class'] : ''); ?>">
					<?php
						foreach ($page_right_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>
			</div>
		</div>

		<!-- page footer -->
		<div class="container">
			<div class="row">
				<div class="<?php echo(!empty($page_footer['column_visibility_class']) ? $page_footer['column_visibility_class'] : ''); ?>">
					<?php
						foreach ($page_footer['ui_elements'] as $ui_element) {
							$this->load->view($ui_element);
						}
					?>
				</div>
			</div>
		</div>

		<!-- modals -->
		<?php
			if (isset($modals) && $modals)
			{
				foreach ($modals as $modal) {
					$this->load->view($modal);
				}
			}
		?>
		<!-- footer scripts -->
		<?php if ($footer_scripts) {foreach ($footer_scripts as $script) {echo $script;}} ?>
</body>
</html>