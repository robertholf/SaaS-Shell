<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Database Error</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/fonts.css">
	<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">

	<!-- PAGE LEVEL PLUGINS STYLES -->

	<!-- Tc core CSS -->
	<link rel="stylesheet" href="/assets/css/app/style.css">

	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

</head>

<body class="error">
	<div id="wrapper">
		<!-- BEGIN MAIN PAGE CONTENT -->
		<div class="error-container">
			<div class="container">
				<div class="error-box">
					<h1 class="error-code"><i class="fa fa-warning smaller-50"></i> Ruh Roh! <small>Database Issue!</small></h1>
					<p><?php echo $message; ?></p>

					<div class="space-12"></div>

					<a href="tel:4158710504" class="btn btn-primary">Call @Rob</a>
				</div>
			</div>
		</div>
		<!-- END MAIN PAGE CONTENT -->
	</div>

	<!-- core JavaScript -->
	<script src="/assets/js/jquery.min.js"></script>
	<script src="/assets/js/bootstrap.min.js"></script>
</body>
</html>