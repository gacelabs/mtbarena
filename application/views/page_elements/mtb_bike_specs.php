<?php

	// total number of bikes in comparison
	// value comes from bikes_to_compare in controller
	$bikeCount = $bikes_to_compare;

	// parse the class along .grid-column according to $bikeCount value
	$gridCountArr = ['column-100', 'column-50-50', 'column-33-33-33'];

?>

<div class="box-item">

	<div class="box-item-body-top" id="mtbCompareSpecs">
		<ul class="spaced-list between">
			<li class="text-left">
			<?php if ($bikeCount == 1) { ?>
				<p class="zero-gap color-theme"><b>Bike Model Full Specifications</b></p>
			<?php } elseif ($bikeCount == 2) { ?>
				<p class="zero-gap color-theme"><b>Head-To-Head Bike Full Specs</b></p>
			<?php } elseif ($bikeCount == 3) { ?>
				<p class="zero-gap color-theme"><b>Triple Match Up Bike Full Specs</b></p>
			<?php } ?>
			</li>

			<li class="text-right">
				<button type="button" class="btn btn-xs btn-sq">
					<i class="fa fa-facebook color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
				</button>
				<button type="button" class="btn btn-xs btn-sq">
					<i class="fa fa-heart-o color-theme"></i> <small class="theme-kbd" style="margin-left:2px;"><kbd>123</kbd></small>
				</button>
			</li>
		</ul>
	</div>

	<div class="box-item-body" id="mtbItemMainParent" style="padding-top:0;">
		<div class="mtb-item-specs-main-parent bikeStickyName">
			<div class="grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">

			<!-- LOOP here -->
			<?php for ($i=0; $i<$bikeCount; $i++) { ?>
				<div class="mtb-item-model-parent">
					<img src="<?php echo base_url('assets/images/mtb/trinx_x1_elite.png'); ?>" class="mtb-item-image image-cropped contain">
					<div class="modelItemLabelBox">
						<p class="mtb-item-model-name text-ellipsis zero-gap">Trix X1 Elite 2020</p>
						<p class="text-ellipsis zero-gap"><small class="color-lightgray mtb-item-model-spec-from">From: Dealer Name (Posted: Nov 2019)</small></p>
					</div>
				</div>
			<?php } ?>
			<!-- LOOP here -->

			</div>
		</div>

		<div class="mtb-main-parent" id="mtbMainParent">

			<!-- LOOP here -->
			<div class="mtb-item-specs-parent">
				<div class="mtb-item-spec-label <?php if ($bikeCount > 1) {echo "text-center";} ?>">
					<small class="color-gray">Made by</small>
				</div>
				<div class="grid-column <?php echo $gridCountArr[$bikeCount-1]; ?>">
				<?php for ($i=0; $i<$bikeCount; $i++) { ?>
					<p class="mtb-item-spec-desc zero-gap">Trinx: USA, Thailand, Malaysia</p>
				<?php } ?>
				</div>
			</div>
			<!-- LOOP here -->

		</div>
	</div>
</div>