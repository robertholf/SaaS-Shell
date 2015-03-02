<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="/assets/css/fonts.css">
	<link rel="stylesheet" href="/assets/font-awesome/css/font-awesome.min.css">

	<!-- PAGE LEVEL PLUGINS STYLES -->

	<!-- Tc core CSS -->
	<link id="qstyle" rel="stylesheet" href="/assets/css/themes/style.css">

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
					<h1 class="error-code"><i class="fa fa-warning smaller-50"></i> <?php echo $heading; ?> <small>Page Not Found</small></h1>
					<h3><?php echo $message; ?></h3>

					<div class="space-12"></div>

					<a href="/" class="btn btn-primary">Go to Home!</a>
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