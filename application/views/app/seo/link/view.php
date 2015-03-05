<div class="row">
	<div class="col-lg-3 col-md-3">

		<!-- Screen Capture -->
		<div class="well well-sm white">
			<div class="website-screenshot">
				<img src="/assets/images/user-1.jpg" class="img-responsive" alt="">
			</div>
			<!-- p class="text-center">
				<button type="button" class="btn btn-facebook btn-xs" data-placement="top" data-rel="tooltip" title="" role="button" data-original-title="Visit My Facebook"><i class="fa fa-facebook icon-only"></i></button>
				<button type="button" class="btn btn-twitter btn-xs" data-placement="top" data-rel="tooltip" title="" role="button" data-original-title="Visit My Twitter"><i class="fa fa-twitter icon-only"></i></button>
				<button type="button" class="btn btn-googleplus btn-xs" role="button" data-placement="top" data-rel="tooltip" title="" data-original-title="Google +"><i class="fa fa-google-plus icon-only"></i></button>
			</p -->
		</div>
		<div class="alert bg-primary">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			<p>Screenshot coming soon.</p>
		</div>

		<!-- Point of Contact -->
		<?php
		foreach ($data_poc as $poc) { ?>
			<div class="widget bg-gray">
				<div class="body">
					<div class="background-icon-right">
						<span class="fa fa-users"></span>
					</div>
					<h3><?php echo $poc->name_first ." ". $poc->name_last; ?></h3>
					<div class="space-8"></div>
					<?php
					if (isset($poc->email) && !empty($poc->email)) {
					echo "<address><i class='fa fa-envelope-o'></i> <a href='mailto:". $poc->email ."'>". $poc->email ."</a><br />";
					}
					if (isset($poc->phone_office) && !empty($poc->phone_office)) {
					echo "<i class='fa fa-phone'></i> ". $poc->phone_office ."<br />";
					}
					if (isset($poc->phone_cell) && !empty($poc->phone_cell)) {
					echo "<i class='fa fa-mobile'></i> ". $poc->phone_cell ."<br />";
					}
					if (isset($poc->phone_fax) && !empty($poc->phone_fax)) {
					echo "<i class='fa fa-fax'></i> ". $poc->phone_fax ."<br />";
					}
					?>
					<div class="space-8"></div>
					<em><small>Last updated <?php echo $poc->date_updated; ?></small></em>
				</div>
			</div>
		<?php } ?>

		<!-- Website Link -->
		<div class="well well-sm white">
			<i class="fa fa-external-link bigger-110"></i> <a href="<?php echo $data["url_root"]; ?>">Visit Website</a>
		</div>

	</div>
	<div class="col-lg-9 col-md-9">
		<div class="tc-tabs">
			<!-- Nav Tabs -->
			<ul class="nav nav-tabs tab-lg-button tab-color-dark background-dark white">
				<li class="active"><a href="#p1" data-toggle="tab"><i class="fa fa-desktop bigger-130"></i>Overview</a></li>
				<li><a href="#p2" data-toggle="tab"><i class="fa fa-info bigger-130"></i>History</a></li>
				<li><a href="/seo/link/<?php echo $data['id']; ?>/edit"><i class="fa fa-edit bigger-130"></i>Edit Account</a></li>
			</ul>
			<!-- Tab Panes -->
			<div class="tab-content">
				<!-- End Tab 1 -->
				<div class="tab-pane fade in active" id="p1">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="portlet no-border">
								<div class="portlet-heading">
									<div class="portlet-title">
									<?php
									if ( isset($data["url_title"]) && !empty($data["url_title"]) ) {
										echo "<h2><strong>". $data["url_title"] ."</strong></h2>";
										echo "<em><small>". $data["url_root"] ."</small></em>"; 
									} else {
										echo "<h2>". $data["url_root"] ."</h2>"; 
									}
									?>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row link-metric">
						<div class="col-md-12">
							<div class="portlet no-border-bottom">
								<div class="portlet-heading dark">
									<div class="portlet-title">
										<h4><i class="fa fa-heartbeat"></i> Diagnostics</h4>
									</div>
									<div class="portlet-widgets">
										<a href="#" class="tooltip-default" data-placement="left" data-rel="tooltip" data-original-title="Refresh Data"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row link-metric">
						<div class="col-md-12">
							<div class="portlet no-border-bottom">
								<div class="portlet-heading dark">
									<div class="portlet-title">
										<h4><i class="fa fa-bar-chart"></i> Metrics</h4>
									</div>
									<div class="portlet-widgets">
										<a href="#" class="tooltip-default" data-placement="left" data-rel="tooltip" data-original-title="Refresh Data"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
						</div>
					</div>
					<!-- Metrics -->
					<div class="row">
						<div class="col-lg-4 col-sm-4">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-google"></i>
									<div class="tile-content">
										5
									</div>
									<small>
										PageRank
									</small>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-sm-4">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-signal"></i>
									<div class="tile-content">
										60
									</div>
									<small>
										MozRank
									</small>
								</div>
							</a>
						</div>
						<div class="col-lg-4 col-sm-4">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-gavel"></i>
									<div class="tile-content">
										0
									</div>
									<small>
										MozTrust
									</small>
								</div>
							</a>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-3 col-sm-3">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-link"></i>
									<div class="tile-content">
										0
									</div>
									<small>
										External
									</small>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-sm-3">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-google-plus-square"></i>
									<div class="tile-content">
										0
									</div>
									<small>
										+1's
									</small>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-sm-3">
							<a href="#/" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-facebook-square"></i>
									<div class="tile-content">
										0
									</div>
									<small>
										Activity
									</small>
								</div>
							</a>
						</div>
						<div class="col-lg-3 col-sm-3">
							<a href="#" class="tile-metrics btn btn-white">
								<div class="tile-content-wrapper">
									<i class="fa fa-twitter-square"></i>
									<div class="tile-content">
										0
									</div>
									<small>
										Tweets
									</small>
								</div>
							</a>
						</div>
					</div>

					<?php
					// Get Link Deal
					$deal = $this->Links->fetch_link_deal_lookup($data["id"]);
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="portlet no-border-bottom">
								<div class="portlet-heading dark">
									<div class="portlet-title">
										<h4><i class="fa fa-dollar"></i> Link Contract</h4>
									</div>
									<div class="portlet-widgets">
										<?php if ($deal) { ?>
										<a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view" class="tooltip-default" data-placement="left" data-rel="tooltip" data-original-title="View Deal"><i class="fa fa-search"></i></a>
										<?php } else { ?>
										<a href="/seo/link/deal/create" class="tooltip-success" data-placement="left" data-rel="tooltip" data-original-title="Create New Deal"><i class="fa fa-plus"></i></a>
										<?php } ?>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="portlet-body no-padding">
									<div id="alerts" class="panel-collapse collapse in" aria-expanded="true">
									<!-- Contract -->
									<?php
									if ($deal) {
										if ( (strtotime($deal[0]->date_contract_end) < strtotime('-1 days') ) ) { ?>
											<div class="alert note note-danger">
												<h4><i class="fa fa-exclamation-circle"></i> Contract Expired</h4>
												<hr class="separator">
												<p>This contract with <a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view"><strong><?php echo $deal[0]->title; ?></strong></a>
													for this URL expired on <strong><?php echo $deal[0]->date_contract_end; ?></strong>.
												</p>
											</div>
										<?php
										} elseif( strtotime($deal[0]->date_contract_end) < strtotime('+7 days') ) { ?>
											<div class="alert note note-warning">
												<h4><i class="fa fa-exclamation-triangle"></i> Contract Expiring!</h4>
												<hr class="separator">
												<p>This contract with <a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view"><strong><?php echo $deal[0]->title; ?></strong></a>
													for this URL is set to expire on <strong><?php echo $deal[0]->date_contract_end; ?></strong>.
												</p>
											</div>
										<?php
										} elseif( strtotime($deal[0]->date_contract_end) < strtotime('+30 days') ) { ?>
											<div class="alert note note-warning">
												<h4><i class="fa fa-exclamation-triangle"></i> Contract Expires Soon!</h4>
												<hr class="separator">
												<p>This contract with <a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view"><strong><?php echo $deal[0]->title; ?></strong></a>
													for this URL is set to expire on <strong><?php echo $deal[0]->date_contract_end; ?></strong>.
												</p>
											</div>
										<?php
										} else { ?>
											<div class="alert note note-success">
												<h4><i class="fa fa-check"></i> Active Contract</h4>
												<hr class="separator">
												<p>Good to go!  The contract with <a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view"><strong><?php echo $deal[0]->title; ?></strong></a>
													is valid through <strong><?php echo $deal[0]->date_contract_end; ?></strong>.
												</p>
											</div>
										<?php
										}

										$defunctcount = $this->Links->fetch_link_deal_defunct_account($deal[0]->id);
										if ($data["mention_url"] == 0 && $defunctcount[0]->count > 0 ) { ?>
											<div class="alert note note-danger">
												<h4><i class="fa fa-exclamation-circle"></i> Breach of Contract</h4>
												<hr class="separator">
												<p>Notice: This site and <a href="/seo/link/deal/<?php echo $deal[0]->id; ?>/view"><strong><?php echo $deal[0]->title; ?></strong></a>
													are in breach of contract!
													<?php if ($defunctcount[0]->count > 1) { ?>
													This contract has <strong><?php echo $defunctcount[0]->count -1; ?></strong> other URLs which are also in breach. 
													<?php } ?>
												</p>
											</div>
											<?php
										}

									//echo "<span class='label label-danger'>Removed</span>";
									//echo "<span class='label label-warning'>Investigate</span>";
									} else { ?>
										<div class="alert note note-default">
											<h4><i class="fa fa-times"></i> No Contract Found</h4>
											<hr class="separator">
											<p>No contract for this URL identified.  Create a <a href="/seo/link/deal/create"><strong>New Deal</strong></a></p>
										</div>
									<?php }

									// Are they linking to us?
									if ( $data["mention_url"] == 1 ) {?>
										<div class="alert note note-success">
											<h4><i class="fa fa-check"></i> Link Identified</h4>
											<hr class="separator">
											<p>They are linking to us!</p>
										</div>
									<?php
									}




									?>
									</div>

									<div class="space-4"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="portlet no-border-bottom">
								<div class="portlet-heading dark">
									<div class="portlet-title">
										<h4><i class="fa fa-rss"></i> Recent Activity</h4>
									</div>
									<div class="portlet-widgets">
										<a href="#" class="tooltip-success" data-placement="left" data-rel="tooltip" data-original-title="Add Note"><i class="fa fa-pencil-square-o"></i></a>
										<span class="divider"></span>
										<a href="/seo/link/<?php echo $data['id']; ?>/view" class="tooltip-default" data-placement="left" data-rel="tooltip" data-original-title="Refresh"><i class="fa fa-refresh"></i></a>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="portlet-body no-padding">
									<ul class="lists">
										<li>
											<span class="icons"><i class="fa fa-warning"></i></span>
											<span>Example Warning</span>
											<span class="date">A minute ago</span>
										</li>
										<li>
											<span class="icons"><i class="fa fa-info-circle"></i></span>
											<span>Example Info</span>
											<span class="date">A month ago</span>
										</li>
									</ul>
								</div>
							</div>
							
							<div class="hr hr-12"></div>
							<div class="action-buttons">
								<a href="#p3" data-toggle="tab"><i class="fa fa-search-plus"></i> View all</a>
							</div>
							
						</div>
					</div>
				</div>
				<!-- End Tab 1 -->

				<!-- Tab 2 -->
				<div class="tab-pane fade" id="p2">
					<h2>History</h2>
					<div class="hr hr-12"></div>
					<h3>Past Contracts</h3>
					TODO: Add...

					<h3>Recent Activity</h3>
					<div class="portlet-body no-padding">
						<ul class="lists">
							<li>
								<span class="icons"><i class="fa fa-warning"></i></span>
								<span>Example Warning</span>
								<span class="date">A minute ago</span>
							</li>
							<li>
								<span class="icons"><i class="fa fa-info-circle"></i></span>
								<span>Example Info</span>
								<span class="date">A month ago</span>
							</li>

						</ul>
					</div>
				</div>
				<!-- End Tab 2 -->

			</div>
			<!-- End Tab Panes -->
		</div>
	</div>
</div>