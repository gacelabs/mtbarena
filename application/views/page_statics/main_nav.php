<nav class="navbar navbar-default navbar-fixed-top" id="navbar">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<i class="fa fa-bars"></i>
			</button>
			<button type="button" class="navbar-toggle collapsed" id="searchButton" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<i class="fa fa-search"></i>
			</button>
			<a class="navbar-brand" href="<?php echo base_url(); ?>"><img style="width:20px;float:left;margin-right:10px;" src="<?php echo base_url('assets/images/mtbarena_favicon.png'); ?>"> MTB Arena</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<?php 
			$search_val = '';
			if ($this->uri->segment(1) == 'search') {
				$search_val = $this->input->get('keyword') ? $this->input->get('keyword') : ($this->uri->segment(2) ? $this->uri->segment(2) : '');
			}
			?>
			<form action="<?php echo base_url('search'); ?>" class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search..." name="keyword" id="searchInput" style="border-radius:0;box-shadow:none;" value="<?php echo $search_val;?>">
					<span class="input-group-btn">
						<button class="btn btn-default" type="submit" style="border-radius:0;box-shadow:none;outline:none;"><i class="fa fa-search"></i></button>
					</span>
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li class="<?php if (!empty($body_id) && $body_id == 'landing') {echo 'active';} ?>">
					<a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i> <span class="hidden-sm">Home</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'compare') {echo 'active';} ?> nav-border">
					<a href="<?php echo base_url('compare'); ?>"><i class="fa fa-clone"></i> <span class="hidden-sm">Compares</span></a>
				</li>
			<!-- 	<li class="<?php if (!empty($body_id) && $body_id == 'marketplace') {echo 'active';} ?>">
					<a href="<?php echo base_url('marketplace'); ?>"><i class="fa fa-shopping-bag"></i> <span class="hidden-sm">Marketplace</span></a>
				</li>
				<li class="<?php if (!empty($body_id) && $body_id == 'rides') {echo 'active';} ?>">
					<a href="javascript:;"><i class="fa fa-bicycle"></i> <span class="hidden-sm">Rides</span></a>
				</li> -->
				<?php if ($current_profile): ?>
					<li class="<?php if (!empty($body_id) && $body_id == 'log_in') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Log out">
						<a href="<?php echo base_url('logout'); ?>"><i class="fa fa-sign-out"></i> <span class="hidden-lg hidden-md hidden-sm">Log out</span></a>
					</li>
					<li class="<?php if (!empty($body_id) && $body_id == 'dashboard') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Dashboard">
						<a href="<?php echo base_url('dashboard'); ?>"><i class="fa fa-tachometer"></i> <span class="hidden-lg hidden-md hidden-sm">Dashboard</span></a>
					</li>
				<?php else: ?>
					<li class="<?php if (!empty($body_id) && $body_id == 'log_in') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Log in" trigger-modal="#modal_login">
						<a href="javascript:;"><i class="fa fa-sign-in"></i> <span class="hidden-lg hidden-md hidden-sm">Log in</span></a>
					</li>
					<!-- <li class="<?php if (!empty($body_id) && $body_id == 'sign_up') {echo 'active';} ?>" data-toggle="tooltip" data-placement="bottom" title="Sign up">
						<a href="<?php echo base_url('sign_up'); ?>"><i class="fa fa-user-plus"></i> <span class="hidden-lg hidden-md hidden-sm">Sign up</span></a>
					</li> -->
				<?php endif ?>
			</ul>
		</div>
	</div>
</nav>