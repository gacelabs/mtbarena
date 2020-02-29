<div class="stick-me">
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Store Name</b></p>
			<p class="zero-gap color-theme"><small><?php echo $current_profile['store_name'];?></small></p>
		</div>
		<div class="box-item-body">
			<div class="dashboard-menu-box">
				<a href="<?php echo base_url('dashboard/store'); ?>">
					<p class="<?php echo ($body_class == "store" ? 'active' : ''); ?>">Online store</p>
				</a>
				<a href="<?php echo base_url('dashboard/post-bike'); ?>">
					<p class="<?php echo ($body_class == "post-bike" ? 'active' : ''); ?>">Post bike</p>
				</a>
				<a href="<?php echo base_url('dashboard/profile'); ?>">
					<p class="<?php echo ($body_class == "profile" ? 'active' : ''); ?>">Profile</p>
				</a>
			</div>
		</div>
	</div>
</div>