<?php // debug($page_data['compares']); ?>
<?php if (isset($page_data['compares']) AND $page_data['compares']): ?>
	<div class="stick-me">
		<div class="box-item">
			<div class="box-item-body-top">
				<p class="zero-gap color-theme"><b>Popular Comparison</b></p>
			</div>
			<div class="box-item-body">
				<div class="table-responsive">
					<table class="table table-striped zero-gap">
						<tbody>
							<?php foreach ($page_data['compares'] as $key => $compare): ?>
								<tr id="compare-<?php echo $compare['id'];?>">
									<td>
										<a href="/compare/?bike_1=<?php echo $compare['bike_data'][0]['bike_model'];?>&bike_2=<?php echo $compare['bike_data'][1]['bike_model'];?>">
											<?php echo $compare['bike_data'][0]['bike_model'];?> vs. <?php echo $compare['bike_data'][1]['bike_model'];?>
										</a>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="text-center" style="padding:10px 0;border-top:1px solid #eee;">
				<a href="<?php echo base_url('compare'); ?>" style="text-decoration:none;"><p class="color-link zero-gap">View All</p></a>
			</div>
		</div>

		<?php $this->load->view('widget_elements/mtb_arena_mini_footer'); ?>
	</div>
<?php endif ?>
