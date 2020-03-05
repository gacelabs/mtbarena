<div class="stick-me dashboard-menu-parent" style="margin-bottom:15px;">
	<div class="box-item">
		<div class="box-item-body-top">
			<p class="zero-gap color-theme"><b>Store Name</b></p>
			<p class="zero-gap color-theme"><small><?php echo $current_profile['store_name'];?></small></p>
		</div>
		<div class="box-item-body">
			<div class="dashboard-menu-box">
				<a href="dashboard">
					<p class="<?php echo ($body_class == "posts-list" ? 'active' : ''); ?>">Dashboard</p>
				</a>
				<a href="dashboard/store">
					<p class="<?php echo ($body_class == "store" ? 'active' : ''); ?>">Online store</p>
				</a>
				<a href="dashboard/profile">
					<p class="<?php echo ($body_class == "profile" ? 'active' : ''); ?>">Profile</p>
				</a>
			</div>
		</div>
	</div>
</div>