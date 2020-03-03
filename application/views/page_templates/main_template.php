<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('page_requires/page_head'); ?>
</head>

<body id="<?php echo (empty($body_id) ? '' : $body_id); ?>" class="<?php echo (empty($body_class) ? '' : $body_class); ?>">

	<!-- <div id="fb-root"></div>
	<script>
		window.fbAsyncInit = function() {
			FB.init({
				xfbml: true,
				version: 'v4.0'
			});
		};
	</script>
	<script async defer src="https://connect.facebook.net/en_US/sdk.js"></script> -->
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
		<div class="<?php echo(!empty($page_footer['column_visibility_class']) ? $page_footer['column_visibility_class'] : ''); ?>">
		<?php
			foreach ($page_footer['ui_elements'] as $ui_element) {
				$this->load->view($ui_element);
			}
		?>
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