	<div id="wrapper">
		<div id="main-container">
			<!-- BEGIN TOP NAVIGATION -->
				<nav class="navbar-top" role="navigation">
					<!-- BEGIN BRAND HEADING -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle pull-right" data-toggle="collapse" data-target=".top-collapse">
							<i class="fa fa-bars"></i>
						</button>
						<div class="navbar-brand">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="brand-info">AutoAnything</span> <b class="caret"></b>
							</a>
							<ul class="dropdown-menu dropdown-brand">
								<li class="brand-switch">
									Switch Active Brand
								</li>
								<li class="brand-brands">
									<a href="#">
										<i class="fa fa-random"></i> AutoZone
									</a>
								</li>
								<li class="brand-create">
									<a href="#">
										<i class="fa fa-plus"></i> Create New Brand
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- END BRAND HEADING -->
					<div class="nav-top">
						<!-- BEGIN RIGHT SIDE DROPDOWN BUTTONS -->
							<ul class="nav navbar-right">
								<li class="dropdown">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
										<i class="fa fa-bars"></i>
									</button>
								</li>
								<!--
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-envelope"></i> <span class="badge up badge-primary">2</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-bell"></i> <span class="badge up badge-success">3</span>
									</a>
								</li>
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="fa fa-tasks"></i> <span class="badge up badge-info">7</span>
									</a>
								</li>
								-->


								<!--User Icon-->
								<li class="dropdown user-box">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<img class="img-circle" src="/assets/images/user.jpg" alt=""> <span class="user-info">Your Name</span> <b class="caret"></b>
									</a>
									<ul class="dropdown-menu dropdown-user">
										<li>
											<a href="#">
												<i class="fa fa-user"></i> My Profile
											</a>
										</li>
									</ul>
								</li>

								<!--Search Box-->
								<!--
								<li class="dropdown nav-search-icon">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<span class="glyphicon glyphicon-search"></span>
									</a>
									<ul class="dropdown-menu dropdown-search">
										<li>
											<div class="search-box">
												<form class="" role="search">
													<input type="text" class="form-control" placeholder="Search" />
												</form>
											</div>
										</li>
									</ul>
								</li>
								-->
								<!--Search Box-->
							</ul>
						<!-- END RIGHT SIDE DROPDOWN BUTTONS -->
						<!-- BEGIN TOP MENU -->
							<div class="collapse navbar-collapse top-collapse">
								<!-- .nav -->
								<ul class="nav navbar-left navbar-nav">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											Tech<b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<li> <a href="#">QA</a></li>
											<li> <a href="#">Crawl</a></li>
										</ul>
									</li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											SEO  <span class="badge badge-primary">New</span><b class="caret"></b>
										</a>
										<ul class="dropdown-menu">
											<li> <a href="/seo">Dashboard</a></li>
											<li> <a href="/seo/link">Links</a></li>
											<li> <a href="#">Keyword</a></li>
										</ul>
									</li>
									<li><a href="#">Content</a></li>
									<li><a href="#">eCommerce</a></li>
								</ul><!-- /.nav -->
							</div>
						<!-- END TOP MENU -->
					</div><!-- /.nav-top -->
				</nav><!-- /.navbar-top -->
				<!-- END TOP NAVIGATION -->

				<!-- BEGIN SIDE NAVIGATION -->
				<nav class="navbar-side" role="navigation">
					<div class="navbar-collapse sidebar-collapse collapse">

						<!-- BEGIN SHORTCUT BUTTONS -->
						<!--
						<div class="media">
							<ul class="sidebar-shortcuts">
								<li><a class="btn"><i class="fa fa-user icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-envelope icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-th icon-only"></i></a></li>
								<li><a class="btn"><i class="fa fa-gear icon-only"></i></a></li>
							</ul>
						</div>
						-->
						<!-- END SHORTCUT BUTTONS -->
							
						<!-- BEGIN FIND MENU ITEM INPUT -->
						<!--
						<div class="media-search">
							<input type="text" class="input-menu" id="input-items" placeholder="Find...">
						</div>
						-->
						<!-- END FIND MENU ITEM INPUT -->

						<ul id="side" class="nav navbar-nav side-nav">
							<!-- BEGIN SIDE NAV MENU -->
							<!-- Navigation category -->
							<li>
								<h4>Navigation</h4>
							</li>
							<!-- END Navigation category -->
							<li>
								<a class="active" href="/seo">
									<i class="fa arrow"></i> SEO
								</a>
							</li>
							<!-- BEGIN DROPDOWN -->
							<li class="panel">
								<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms">
									<i class="fa fa-link"></i> Links <span class="fa arrow"></span>
								</a>
									<ul class="collapse nav" id="forms">
										<li>
											<a href="/seo/link">
												<i class="fa fa-angle-double-right"></i> Overview
											</a>
										</li>
										<li>
											<a href="/seo/link/deal">
												<i class="fa fa-angle-double-right"></i> Link Deals
											</a>
										</li>
										<li>
											<a href="/seo/link/opportunity">
												<i class="fa fa-angle-double-right"></i> Opportunities
											</a>
										</li>
									</ul>
							</li>
							<li class="panel">
								<a href="javascript:;" data-parent="#side" data-toggle="collapse" class="accordion-toggle" data-target="#forms">
									<i class="fa fa-search"></i> Keywords <span class="fa arrow"></span>
								</a>
							</li>
							<!-- END DROPDOWN -->
						</ul><!-- /.side-nav -->
						<!-- 
						<div class="sidebar-labels">
							<h4>Labels</h4>							
							<ul>
								<li><a href="#"><i class="fa fa-circle-o text-primary"></i> My Recent <span class="badge badge-primary">3</span></a></li>
								<li><a href="#"><i class="fa fa-circle-o text-success"></i> Background</a></li>
							</ul>
						</div>
						
						<div class="sidebar-alerts">
							<div class="alert fade in">
								<span>Sales Report</span>
								<div class="progress progress-mini progress-striped active no-margin-bottom">
									<div class="progress-bar progress-bar-primary" style="width: 36%"></div>
								</div>
								<small>Calculating daily bias... 36%</small>
							</div>
						</div>
						-->
					</div><!-- /.navbar-collapse -->
				</nav><!-- /.navbar-side -->
				<!-- END SIDE NAVIGATION -->

				<!-- BEGIN MAIN PAGE CONTENT -->
				<div id="page-wrapper">
					<!-- BEGIN PAGE HEADING ROW -->
						<div class="row">
							<div class="col-lg-12">
								<!-- BEGIN BREADCRUMB -->
								<div class="breadcrumbs">
									<?php echo (!empty($breadcrumb)?$breadcrumb:'');?>
									<!--
									<div class="b-right hidden-xs">
										<ul>
											<li><a href="#" title=""><i class="fa fa-signal"></i></a></li>
											<li><a href="#" title=""><i class="fa fa-comments"></i></a></li>
											<li class="dropdown"><a href="#" title="" data-toggle="dropdown"><i class="fa fa-plus"></i><span> Tasks</span></a>
												<ul class="dropdown-menu dropdown-primary dropdown-menu-right">
													<li><a href="#">Add new task</a></li>
													<li><a href="#">Statement</a></li>
													<li><a href="#">Settings</a></li>
												</ul>
											</li>
										</ul>
									</div>
									-->
								</div>
								<!-- END BREADCRUMB -->	
								
								<div class="page-header title">
								<!-- PAGE TITLE ROW -->
									<h1><?php echo $titleh1; ?> <span class="sub-title"><?php echo $titlesub; ?></span></h1>
								</div>

								
							</div><!-- /.col-lg-12 -->
						</div><!-- /.row -->
					<!-- END PAGE HEADING ROW -->
						<div class="row">
							<div class="col-lg-12">