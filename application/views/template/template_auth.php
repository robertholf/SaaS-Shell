<?php
	// Load the Auth header
	$this->load->view('template/partial/auth_header');
?>
	<div id="main-content">
		<?php $this->load->view($content); ?>
	</div>
<?php
	// Load the Auth footer
	$this->load->view('template/partial/auth_footer');
?>