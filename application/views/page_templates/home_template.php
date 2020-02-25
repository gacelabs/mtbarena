<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('page_requires/page_head'); ?>
</head>

<body id="<?php echo (empty($body_id) ? '' : $body_id); ?>">

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
		<?php

			$show_left_column = '';
			$show_right_column = '';

			if (!empty($page_left_column['ui_elements'])) {
				$show_left_column = true;
			}

			if (!empty($page_right_column['ui_elements'])) {
				$show_right_column = true;
			}

		?>
			
		<div class="container">
			<div class="row">
				<?php if ($show_left_column) { ?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-padding <?php echo(!empty($page_left_column['column_visibility_class']) ? $page_left_column['column_visibility_class'] : ''); ?>">
					<?php
						foreach ($page_left_column['ui_elements'] as $ui_element) {
							$this->load->view($ui_element);
						}
					?>
				</div>
				<?php } ?>

				<?php if ($show_left_column == false && $show_right_column == false) { ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-padding <?php echo(!empty($page_center_column['column_visibility_class']) ? $page_center_column['column_visibility_class'] : ''); ?>" col-position="center">
					<?php 
						foreach ($page_center_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>
				<?php } elseif (($show_left_column == false && $show_right_column) || ($show_left_column && $show_right_column == false)) { ?>
				<div class="col-lg-9 col-md-9 col-sm-9 col-xs-padding <?php echo(!empty($page_center_column['column_visibility_class']) ? $page_center_column['column_visibility_class'] : ''); ?>" col-position="center">
					<?php 
						foreach ($page_center_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>
				<?php } else { ?>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-padding <?php echo(!empty($page_center_column['column_visibility_class']) ? $page_center_column['column_visibility_class'] : ''); ?>" col-position="center">
					<?php 
						foreach ($page_center_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>	
				<?php } ?>

				<?php if ($show_right_column) { ?>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-padding <?php echo(!empty($page_right_column['column_visibility_class']) ? $page_right_column['column_visibility_class'] : ''); ?>">
					<?php
						foreach ($page_right_column['ui_elements'] as $ui_elements) {
							$this->load->view($ui_elements);
						}
					?>
				</div>
				<?php } ?>
			</div>
		</div>

		<!-- page footer -->
		<?php

			if ($page_footer)
			{

				foreach ($page_footer['ui_elements'] as $ui_element) {
					$this->load->view($ui_element);
				}
			}
		?>

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

		<script type="text/javascript" src="<?php echo base_url('assets/js/defaults.js'); ?>"></script>
</body>
</html>