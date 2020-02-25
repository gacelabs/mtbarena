<div class="modal fade" tabindex="-1" role="dialog" id="modal_login">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">It never gets easier, you just get faster.</h4>
			</div>
			<div class="modal-body">
				<ul class="grid-column column-50-50">
					<li>left</li>
					<li>
						<form action="<?php echo base_url('login'); ?>" method="post">
							<div class="form-group">
								<label for="email_address">Email address</label>
								<input type="email" class="form-control" name="email_address" id="email_address">
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password">
							</div>
							<ul class="spaced-list between">
								<li>
									<button type="submit" class="btn btn-primary">Log in</button>
								</li>
								<li>
									<a href="" class="btn">Can't login?</a>
								</li>
							</ul>
						</form>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>