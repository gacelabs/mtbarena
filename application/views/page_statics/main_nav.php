<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<i class="fa fa-bars"></i>
			</button>
			<button type="button" class="navbar-toggle collapsed" id="searchButton" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<i class="fa fa-search"></i>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>">MTB Arena</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." id="searchInput" style="border-radius:0;box-shadow:none;">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button" style="border-radius:0;box-shadow:none;outline:none;"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php if (!empty($body_id) && $body_id == 'landing') {echo 'active';} ?>">
					<a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span class="hidden-sm">Home</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'compare') {echo 'active';} ?>">
					<a href="#"><i class="fa fa-clone"></i> <span class="hidden-sm">Compare</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'marketplace') {echo 'active';} ?>">
					<a href="#"><i class="fa fa-shopping-bag"></i> <span class="hidden-sm">Marketplace</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'rides') {echo 'active';} ?> nav-border">
					<a href="#"><i class="fa fa-bicycle"></i> <span class="hidden-sm">Rides</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'log_in') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Log in" trigger-modal="#modal_login">
					<a href="#"><i class="fa fa-sign-in"></i> <span class="hidden-lg hidden-md hidden-sm">Log in</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'sign_up') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Sign up">
					<a href="#"><i class="fa fa-user-plus"></i> <span class="hidden-lg hidden-md hidden-sm">Sign up</span></a>
				</li>
			</ul>
		</div>
	</div>
</nav>