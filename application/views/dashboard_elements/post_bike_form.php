<div class="box-item">
	<div class="box-item-body-top">
		<p class="zero-gap color-theme"><b>Post new bike</b></p>
	</div>
	<div class="box-item-body" style="padding:10px 0;">
		<div class="table-responsive post-bike-parent-box">
			<form action="/dashboard/add_item" method="post" enctype="multipart/form-data" id="postBikeForm">
				<div class="col-lg-6">
					<div class="form-group">
						<label for="bike_model">Bike Model Name</label>
						<input type="text" class="form-control" name="bike_model" id="bike_model">
					</div>
				</div>
				
				<div class="col-lg-6">
					<div class="form-group">
						<label for="feat_photo">Featured Photo</label>
						<input type="file" class="form-control" name="feat_photo" id="feat_photo">
					</div>
				</div>

				<div class="col-lg-12">
					<div>
						<ul class="grid-column column-30-70">
							<li>
								<p class="zero-gap"><b>Specs from:</b></p>
								<p class="zero-gap" style="font-size:10px;">Automatically fills in all the specs according to the bike model selected.</p>
							</li>
							<li style="padding-left:10px;">
								<div class="form-group bs-select-parent">
									<select class="selectpicker show-tick form-control" data-live-search="true" title="Select Preset Specs" data-width="100%" data-size="4">
										<option data-tokens="trinx x1 elite 2020" data-subtext="Trinx Official (Updated: Feb 2020)">Trinx X1 Elite 2020</option>
										<option data-tokens="phantom 601" data-subtext="Ava Bike Shop (Posted: Dec 2019)">Phantom 601</option>
										<option data-tokens="keysto conquest" data-subtext="Ema Margaret Cycling (Posted: May 2019)">Keysto Conquest</option>
										<option data-tokens="cannondale carbon fiber" data-subtext="Decimal Bike Supplier (Updated: Nov 2019)">Cannondale Carbon Fiber</option>
									</select>
								</div>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-12" style="margin-top:15px;">
					<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								<h4 class="panel-title">Manufacturer, Colorway and Frame</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
								<div class="panel-body">
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Made by:</b></p>
												<p class="zero-gap" style="font-size:10px;">Manufacturer's name and released date.<br>Example: Trinx / Released 2020</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="made_by" id="made_by"></textarea>
												</div>
											</li>
										</ul>
									</div>

									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Colorway:</b></p>
												<p class="zero-gap" style="font-size:10px;">Color combination of the frame.<br>Example: Matte Black/Orange Black Red</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="colorway" id="colorway"></textarea>
												</div>
											</li>
										</ul>
									</div>
									
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Frame:</b></p>
												<p class="zero-gap" style="font-size:10px;">Materials used, size and features.<br>Example: Alloy Tri-Butted Smooth Welding 16/18 27.5</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group" style="margin-bottom: 0;">
													<textarea rows="2" class="form-control" name="frame" id="frame"></textarea>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								<h4 class="panel-title">Shifter, Front Derailleur and Rear Derailleur</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
								<div class="panel-body">
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Shifter:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number and features.<br>Example: SHIMANO Altus SL-M2010</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="shifter" id="shifter"></textarea>
												</div>
											</li>
										</ul>
									</div>
								
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Front Derailleur:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number and features.<br>Example: SHIMANO Altus FD-M370</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="front_derailleur" id="front_derailleur"></textarea>
												</div>
											</li>
										</ul>
									</div>
								
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Rear Derailleur:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number and features.<br>Example: SHIMANO Altus RD-M370</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group" style="margin-bottom: 0;">
													<textarea rows="2" class="form-control" name="rear_derailleur" id="rear_derailleur"></textarea>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingThree" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								<h4 class="panel-title">Cassette, Chain and Brake</h4>
							</div>
							<div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
								<div class="panel-body">
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Cassette:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number and features.<br>Example: CS-M2009 9S 11-32T</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="cassette" id="cassette"></textarea>
												</div>
											</li>
										</ul>
									</div>
									
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Chain:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, color, materials used and features.<br>Example: KMC Z9</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="chain" id="chain"></textarea>
												</div>
											</li>
										</ul>
									</div>
									
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Brake:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, materials used and features.<br>Example: SHIMANO MT200，Hydraulic Disc</p>
											</li>
											<li style="padding-left:10px;" style="margin-bottom: 0;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="brake" id="brake"></textarea>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingFour" role="button" data-toggle="collapse" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								<h4 class="panel-title">Rim, Tires, Chainwheel and Hub</h4>
							</div>
							<div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
								<div class="panel-body">
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Rim:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number and features.<br>Example: Alloy Double Wall</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="rim" id="rim"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Tires:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: CST 27.5"*2.1" 27TPI</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="tires" id="tires"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Chainwheel:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: SHIMANO FC-MT101 22/32/44T*170L</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="chainwheel" id="chainwheel"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Hub:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: FORMULA Alloy Double Sealed Bearing</p>
											</li>
											<li style="padding-left:10px;" style="margin-bottom: 0;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="hub" id="hub"></textarea>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>

						<div class="panel panel-default">
							<div class="panel-heading" role="tab" id="headingFive" data-toggle="collapse" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								<h4 class="panel-title">Saddle, Seatpost, Stem and Handlebar </h4>
							</div>
							<div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
								<div class="panel-body">
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Saddle:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: SR Sport</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="saddle" id="saddle"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Seatpost:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: Alloy 20" Quick Release</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="seatpost" id="seatpost"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Stem:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: Light Alloy 5" Black/ Silver</p>
											</li>
											<li style="padding-left:10px;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="stem" id="stem"></textarea>
												</div>
											</li>
										</ul>
									</div>
									<div>
										<ul class="grid-column column-30-70">
											<li>
												<p class="zero-gap"><b>Handlebar:</b></p>
												<p class="zero-gap" style="font-size:10px;">Brand, model number, size, materials used and features.<br>Example: Alloy Curved Extended Light Weight</p>
											</li>
											<li style="padding-left:10px;" style="margin-bottom: 0;">
												<div class="form-group">
													<textarea rows="2" class="form-control" name="handlebar" id="handlebar"></textarea>
												</div>
											</li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div style="margin-bottom:15px;">
						<ul class="grid-column column-30-70">
							<li>
								<p class="zero-gap"><b>Price tag:</b></p>
								<p class="zero-gap" style="font-size:10px;">The estimated price of the bike on the market.<br>Legend: Affordable, Mid, Premium </p>
							</li>
							<li style="padding-left:10px;">
								<ul class="inline-list">
									<li style="margin-right: 15px;">
										<div class="radio">
											<label>
												<input type="radio" name="price_tag" value="affordable"><i class="fa fa-tags"></i>
											</label>
										</div>
									</li>
									<li style="margin-right: 15px;">
										<div class="radio">
											<label>
												<input type="radio" name="price_tag" value="mid"><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i>
											</label>
										</div>
									</li>
									<li>
										<div class="radio">
											<label>
												<input type="radio" name="price_tag" value="premium"><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i><i class="fa fa-tags"></i>
											</label>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>

					<div style="margin-bottom:15px;">
						<ul class="grid-column column-30-70">
							<li>
								<p class="zero-gap"><b>Exteral link:</b></p>
								<p class="zero-gap" style="font-size:10px;">A link that goes to your own website or social media page. One link only.<br>Example: facebook.com/your-bike-shop</p>
							</li>
							<li style="padding-left:10px;" style="margin-bottom: 0;">
								<div class="form-group">
									<input rows="2" class="form-control" name="external_link" id="external_link">
								</div>
							</li>
						</ul>
					</div>

					<button type="submit" class="btn btn-info">Save</button>
				<div>
			</form>
		</div>
	</div>
</div>