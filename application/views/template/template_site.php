<?php
	// Load the APP header
	$this->load->view('template/partial/site_header');
	// Load the APP menu
	$this->load->view('template/partial/site_menu');

?>
	<div id="main-content">
		<?php $this->load->view($content); ?>
	</div>
<?php
	// Load the APP footer
	$this->load->view('template/partial/site_footer');
?>