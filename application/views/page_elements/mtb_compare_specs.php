<div class="box-item">
	<div class="box-item-body-top" id="mtbCompareSpecs">
		<ul class="spaced-list between">
			<li>
				<?php if ($body_id == 'landing' || $body_id == 'compare') { ?>
				<p class="zero-gap color-theme"><b>Head to Head Specs Comparison</b></p>
				<?php } else { ?>
				<p class="zero-gap color-theme"><b>Today's Match Up</b></p>
				<?php } ?>
			</li>
			<li>
				<?php if ($body_id == 'landing') { ?>

				<?php } else { ?>
				<p class="zero-gap" id="date_today"></p>
				<?php } ?>
			</li>
		</ul>
	</div>
	<div class="box-item-body" id="mtbItemMainParent" style="padding-top:0;">

		<div class="mtb-item-specs-main-parent" id="bikeModelBox">
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-label-box" style="margin:0;">
						<p class="mtb-item-label-box-text text-ellipsis zero-gap">Trix X1 Elite 2020</p>
						<p class="text-ellipsis zero-gap"><small class="color-lightgray">From: Dealer Name</small></p>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-label-box" style="margin:0;">
						<p class="mtb-item-label-box-text text-ellipsis zero-gap">Keysto Conquest</p>
						<p class="text-ellipsis zero-gap"><small class="color-lightgray">From: Dealer Name</small></p>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-label-box" style="margin:0;">
						<p class="mtb-item-label-box-text text-ellipsis zero-gap">Phantom 601 Alivio Groupset 2020</p>
						<p class="text-ellipsis zero-gap"><small class="color-lightgray text-ellipsis">From: Official</small></p>
					</div>
				</li>
			</ul>
		</div>

		<ul class="mtb-item-specs-main-parent grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
			<li class="mtb-left">
				<div class="mtb-left-image-box">
					<img src="<?php echo base_url('assets/images/mtb/trinx_x1_elite.png'); ?>">
				</div>
				<ul class="inline-list mtb-list-social-box">
					<li class="hidden-xs">
						<ul class="inline-list">
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
						</ul>
					</li>
					<li>
						<div class="dropdown dpCloseOnScroll">
							<button type="button" class="btn btn-xs btn-sq" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="caret color-gray"></i>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">View Trinx X1 Elite</a></li>
								<li><a href="#">Change model</a></li>
								<li><a href="#">Check Marketplace</a></li>
								<li><a href="#">More photos</a></li>
								<li class="divider"></li>
								<li class="hidden-lg hidden-md hidden-sm" style="padding:3px 20px;">
									<ul class="inline-list">
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</li>

			<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
			<li class="mtb-middle">
				<div class="mtb-middle-image-box">
					<img src="<?php echo base_url('assets/images/mtb/trinx_x1_elite.png'); ?>">
				</div>
				<ul class="inline-list mtb-list-social-box">
					<li class="hidden-xs">
						<ul class="inline-list">
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
						</ul>
					</li>
					<li>
						<div class="dropdown dpCloseOnScroll">
							<button type="button" class="btn btn-xs btn-sq" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="caret color-gray"></i>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">View Trinx X1 Elite</a></li>
								<li><a href="#">Change model</a></li>
								<li><a href="#">Check Marketplace</a></li>
								<li><a href="#">More photos</a></li>
								<li class="divider"></li>
								<li class="hidden-lg hidden-md hidden-sm" style="padding:3px 20px;">
									<ul class="inline-list">
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
			<?php } ?>

			<li class="mtb-right">
				<div class="mtb-right-image-box">
					<img src="<?php echo base_url('assets/images/mtb/trinx_x1_elite.png'); ?>">
				</div>
				<ul class="inline-list mtb-list-social-box">
					<li class="hidden-xs">
						<ul class="inline-list">
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
							<li>
								<button type="button" class="btn btn-xs btn-sq">
									<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
								</button>
							</li>
						</ul>
					</li>
					<li>
						<div class="dropdown dpCloseOnScroll">
							<button type="button" class="btn btn-xs btn-sq" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="caret color-gray"></i>
							</button>
							<ul class="dropdown-menu pull-right">
								<li><a href="#">View Trinx X1 Elite</a></li>
								<li><a href="#">Change model</a></li>
								<li><a href="#">Check Marketplace</a></li>
								<li><a href="#">More photos</a></li>
								<li class="divider"></li>
								<li class="hidden-lg hidden-md hidden-sm" style="padding:3px 20px;">
									<ul class="inline-list">
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
										<li>
											<button type="button" class="btn btn-xs btn-sq">
												<i class="fa fa-heart color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
											</button>
										</li>
									</ul>
								</li>
							</ul>
						</div>
					</li>
				</ul>
			</li>
		</ul>
		
		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Made by</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>

		<div class="mtb-item-specs-main-parent">
			<div class="mtb-item-specs-box-header text-center">
				<small class="mtb-item-specs-box-header-label">Colorway</small>
			</div>
			<ul class="grid-column <?php if ($page_center_column['bikes_to_compare'] == 2) {echo 'column-50-50';}else{echo 'column-33-33-33';} ?>">
				<li class="mtb-left">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White</p>
						</div>
					</div>
				</li>
				<?php if ($page_center_column['bikes_to_compare'] == 3) { ?>
				<li class="mtb-middle">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Trinx: USA, Thailand, Malaysia</p>
						</div>
					</div>
				</li>
				<?php } ?>
				<li class="mtb-right">
					<div class="mtb-item-specs-box">
						<div class="mtb-item-specs-box-body">
							<p class="zero-gap">Matte Black/Orange Black Red，Matte Grey/Black Red White，Matte Black/Cyan Blue Black，Matte Black/White Red Black.</p>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
</div>