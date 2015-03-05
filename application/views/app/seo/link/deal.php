
	<div class="pull-left">
		<?php
		if (isset($searchterm) && !empty($searchterm)) {
			echo "There are <span class='badge'>". $record_total ."</span> results returned for the searching term:";
			echo "<span class='label label-primary search-term'>". $searchterm ."";
			echo "<a href='?'><i class='fa fa-times fa-inverse fa-1x'></i></a></span>";
		} else {
			echo $record_showing;
		}
		?>
	</div>

	<div class="pull-right">
		<form action ="/seo/link/deal" method="get" id="searchform">
			<input type="text" name="searchterm" id="searchterm" value="<?php echo $searchterm; ?>" />&nbsp;
			<button type="submit" class="btn btn-primary btn-line"><i class="fa fa-search"></i>Search</button>
		</form>
	</div>

	<table id="data" class="table table-bordered table-striped table-hover tc-table table-primary footable">
		<thead>
			<tr>
				<th data-toggle="true">Advertiser</th>
				<th>Rate</th>
				<th>Details</th>
				<th>Status</th>
				<th data-sort-ignore="true"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach ($data as $item) {
			?>
			<tr>
				<td><a href="/seo/link/<?php echo $item->id; ?>/view"><strong><?php echo $item->title; ?></strong></a></td>
				<td>
					<?php
					setlocale(LC_MONETARY, 'en_US');
					echo money_format('%.0n', floor($item->cost_agreed)) . "\n";
					// Get Number of Links in Deal
					$linkcount = $this->Links->fetch_link_deal_link_count($item->id);
					$linktext = ($linkcount > 1) ? " links": " link";
					echo "<span class='label label-success'>". $linkcount . $linktext ."</span>";
					?>
				</td>
				<td>
					<?php
					echo date('M y', strtotime($item->date_contract_start)) ." - ". date('M y', strtotime($item->date_contract_end)); 
					?>
				</td>
				<td>
					<?php
					if ( (strtotime($item->date_contract_end) > strtotime('-1 days')) && (strtotime($item->date_contract_start) < strtotime('-1 hours')) ) {

							if (strtotime($item->date_contract_end) < strtotime('+7 days') ) {
								echo "<span class='label label-danger'>Expiring</span>";
							} elseif( strtotime($item->date_contract_end) < strtotime('+30 days') ) {
								echo "<span class='label label-warning'>Expires Soon</span>";
							} else {
								echo "<span class='label label-success'>Active</span>";
							}

							$defunctcount = $this->Links->fetch_link_deal_defunct_account($item->id);
							if ($defunctcount[0]->count > 0 ) {
								echo "<span class='label label-danger'>Breach of Contract</span>";
							}

					//echo "<span class='label label-danger'>Removed</span>";
					//echo "<span class='label label-warning'>Investigate</span>";
					} else {
						echo "<span class='label label-default'>Expired</span>";
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
