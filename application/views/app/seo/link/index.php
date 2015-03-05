
	<div class="row">
		<div class="col-lg-4 col-sm-4">
			<a href="/seo/link/deal/" class="tile-button btn btn-primary">
				<div class="tile-content-wrapper">
					<i class="fa fa-chain-broken"></i>
					<div class="tile-content">
						<?php echo $count_defunct[0]->count; ?>
					</div>
					<small>
						Needing Attention
					</small>
				</div>
			</a>
		</div>

		<div class="col-lg-4 col-sm-4">
			<a href="/seo/link/deal" class="tile-button btn btn-white">
				<div class="tile-content-wrapper">
					<i class="fa fa-link text-primary"></i>
					<div class="tile-content text-primary">
						<?php echo $this->Links->fetch_link_deal_count(); ?>
					</div>
					<small>
						Link Deals
					</small>
				</div>
			</a>
		</div>

		<div class="col-lg-4 col-sm-4">
			<a href="/seo/link/explore" class="tile-button btn btn-white">
				<div class="tile-content-wrapper">
					<i class="fa fa-bell text-primary"></i>
					<div class="tile-content text-primary">
						<?php echo $this->Links->fetch_link_opportunity_count(); ?>
					</div>
					<small>
						Link Opportunities
					</small>
				</div>
			</a>
		</div>

	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="portlet">
				<div class="portlet-heading dark">
					<div class="portlet-title">
						<h4>Advanced Link Search</h4>
					</div>
					<div class="portlet-widgets">
						<a data-toggle="collapse" data-parent="#accordion" href="#f-4" class="" aria-expanded="true"><i class="fa fa-chevron-down"></i></a>
					</div>
					<div class="clearfix"></div>
				</div>
				<div id="f-4" class="panel-collapse collapse in" aria-expanded="true" style="">
					<div class="portlet-body">
						<form class="form-horizontal" role="form" action="/seo/link" method="get" id="searchform">
							<div class="col-sm-3">
								<div class="form-group">
									<span class="help-block text-gray"><i class="fa fa-terminal text-orange bigger-110"> Search by Name or URL</i></span>
									<input type="text" class="form-control" placeholder="Enter a search term" name="searchterm" id="searchterm" value="<?php echo $searchterm; ?>" />
								</div>
							</div>

							<div class="col-sm-3 col-md-offset-1">
								<div class="form-group">
									<span class="help-block text-gray"><i class="fa fa-tags text-orange bigger-110"></i> Filter by Type</span>
									<select class="form-control" name="searchtype">
										<option value="">Select...</option>
										<?php
										$options = $this->Links->fetch_link_types();
										foreach ($options as $option) {
										echo "<option value='". $option->id ."'"; if ($searchtype == $option->id) { echo " selected='selected'";} echo ">". $option->title ."</option>\n";
										}
										?>
									</select>
								</div>
							</div>

							<div class="col-sm-3 col-md-offset-1">
								<br />
								<button type="submit" class="btn btn-primary btn-line"><i class="fa fa-search"></i>Search</button>
							</div>

						</form>
						<div class="clearfix"></div>

					</div>
				</div>
			</div>
		</div>
	</div>


	<div>
		<?php
		// Check if Search Triggers
		if ( (isset($searchterm) && !empty($searchterm)) || (isset($searchtype) && !empty($searchtype)) ) {
			echo "There are <span class='badge'>". $record_total ."</span> results returned for the searching term:";
			if (isset($searchterm) && !empty($searchterm)) {
				echo "<span class='label label-primary search-term'>". $searchterm ."";

				// Build new Querystring
				parse_str($_SERVER['QUERY_STRING'], $query_array);
				unset($query_array["searchterm"]);
				$query_as_string = http_build_query( $query_array );

				echo "<a href='?". $query_as_string ."'><i class='fa fa-times fa-inverse fa-1x'></i></a></span>";
			}
			if (isset($searchtype) && !empty($searchtype)) {
				$searchtype_title = $this->Links->fetch_link_type($searchtype);
				echo "<span class='label label-primary search-term'>". $searchtype_title[0]->title ."";

				// Build new Querystring
				parse_str($_SERVER['QUERY_STRING'], $query_array);
				unset($query_array["searchtype"]);
				$query_as_string = http_build_query( $query_array );

				echo "<a href='?". $query_as_string ."'><i class='fa fa-times fa-inverse fa-1x'></i></a></span>";
			}

		} else {
			echo $record_showing;
		}
		?>
		<br /><br />
	</div>

	<table id="data" class="table table-bordered table-striped table-hover tc-table table-primary footable">
		<thead>
			<tr>
				<th data-toggle="true">Site</th>
				<th>Authority</th>
				<th>Type</th>
				<th>Status</th>
				<th data-sort-ignore="true"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($data as $item) {
			?>
			<tr>
				<td>
					<?php
					if ( isset($item->url_title) && !empty($item->url_title) ) {
						echo "<a href='/seo/link/". $item->id ."/view'><strong>". $item->url_title ."</strong></a> <em><small>". $item->url_root ."</small></em>"; 
					} else {
						echo "<a href='/seo/link/". $item->id ."/view'>". $item->url_root ."</a>"; 
					}
					?>
				</td>
				<td><?php //echo $item->authority_domain; ." / ". $item->authority_page; ?></td>
				<td>
					<?php
					if (isset($item->link_deal_expires)) {
						echo "<span class='label label-default'><i class='fa fa-dollar'></i> Paid</span>";
					} else {
						if ($item->mention_url == 1) {
						echo "<span class='label label-info'><i class='fa fa-like'></i> Earned</span>";
						}
					}
					?>
				</td>
				<td>
				<?php
					// Do we have a contract with them?
					if (isset($item->link_deal_expires) && !empty($item->link_deal_expires)) {
						// Do we have an ACTIVE contract?
						if (strtotime($item->link_deal_expires) < strtotime('-1 days') ) {
							echo "<span class='label label-warning'>Expired</span>";
						} elseif ($item->mention_url == 0) {
							echo "<span class='label label-danger'>No Link!</span>";
						}
					}

					// Any love coming our way?
					if ($item->mention_url == 1) {
						echo "<span class='label label-success'>Active Link</span>";
					} elseif ($item->mention_name == 1) {
						echo "<span class='label label-success'>Active Mention</span>";
					}

					// Are they an affiliate?
					if ($item->mention_affiliate == 1) {
					echo "<span class='label label-info'>Affiliate</span>";
					}
				?>
				
				</td>
				<td class="col-small center">
					<div class="action-buttons">
						<a href="/seo/link/<?php echo $item->id; ?>/view" data-placement="left" data-rel="tooltip" title="View"><i class="fa fa-search-plus bigger-130"></i></a>
					</div>
				</td>
			</tr>
			<?php
			}
			?>
		</tbody>
	</table>

	<div class="pull-right page-count"><?php echo $links; ?></div>
	<div class="pull-left"><?php echo $record_showing; ?></div>
