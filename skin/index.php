<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>MCOS Admin</title>
	<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
	<!-- bootstrap 3.0.2 -->
	<link href="skin/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
	<!-- font Awesome -->
	<link href="skin/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
	<!-- Ionicons -->
	<link href="skin/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
	<!-- Morris chart -->
	<link href="skin/css/morris/morris.css" rel="stylesheet" type="text/css"/>
	<!-- jvectormap -->
	<link href="skin/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>
	<!-- Date Picker -->
	<link href="skin/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css"/>
	<!-- Daterange picker -->
	<link href="skin/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
	<!-- bootstrap wysihtml5 - text editor -->
	<link href="skin/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
	<!-- Theme style -->
	<link href="skin/css/AdminLTE.css" rel="stylesheet" type="text/css"/>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
	<![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
	<a href="index.php" class="logo">
		<!-- Add the class icon to your logo image or logo icon to add the margining -->
		MCOS Admin
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top" role="navigation">
		<!-- Sidebar toggle button-->
		<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</a>

		<div class="navbar-right">
			<ul class="nav navbar-nav">
				<!-- Notifications: style can be found in dropdown.less -->
				<li class="user user-menu">
					<a href="logout.php" class="btn btn-flat">Sign out</a>
				</li>
			</ul>
		</div>
	</nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="left-side sidebar-offcanvas">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->

			<!-- search form -->
			<form action="#" method="get" class="sidebar-form">
				<div class="input-group">
					<input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i
		                                class="fa fa-search"></i></button>
                            </span>
				</div>
			</form>
			<!-- /.search form -->
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<?php
				foreach ($menus AS $menu) {
					$_mod = $menu['module'];
					$subLinks = $menu['sub_links'];
					?>
					<li class="<?= count($subLinks) ? 'treeview' : '' ?> <?= ($_mod == $curModuleName) ? 'active' : '' ?>">
						<a href="<?= $menu['link'] ?>">
							<span><?= $menu['text'] ?></span>
							<?= count($subLinks) ? '<i class="fa fa-angle-left pull-right"></i>' : '' ?>
						</a>
						<?
						if (count($subLinks)) {
							?>
							<ul class="treeview-menu">
								<li class="<?= $curAction == 'index' ? 'active' : '' ?>">
									<a href="<?= $menu['link'] ?>">
										<i class="fa fa-angle-double-right"></i> <?= $menu['text'] ?>
									</a>
								</li>
								<?
								foreach ($subLinks AS $link) {
									?>
									<li class="<?= $link['action'] == $curAction ? 'active' : '' ?>">
										<a href="<?= $link['link'] ?>">
											<i class="fa fa-angle-double-right"></i> <?= $link['text'] ?>
										</a>
									</li>
								<?
								}
								?>
							</ul>
						<?
						}
						?>
					</li>
				<?php
				}
				?>
			</ul>
		</section>
		<!-- /.sidebar -->
	</aside>

	<!-- Right side column. Contains the navbar and content of the page -->
	<aside class="right-side">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				<?= $curModuleName ?>
				<small><?= ucwords($curAction) ?></small>
			</h1>
			<ol class="breadcrumb">
				<li class="<?= $curAction == 'index' ? 'active' : '' ?>"><a
						href="<?= $curMenu['link'] ?>"><?= $curMenu['text'] ?></a></li>
				<?php
				foreach ($curMenu['sub_links'] AS $link) {
					if ($link['action'] == $curAction) {
						?>
						<li class="active"><?= $link['text'] ?></li>
					<?php
					}

				}
				?>

			</ol>
		</section>

		<!-- Main content -->
		<section class="content">

			<!-- Main row -->
			<div class="row">
				<?php
				include $curModule['controller'][$curAction];
				?>
			</div>
			<!-- /.row (main row) -->

		</section>
		<!-- /.content -->
	</aside>
	<!-- /.right-side -->
</div>
<!-- ./wrapper -->

<!-- add new calendar event modal -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- jQuery UI 1.10.3 -->
<script src="skin/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<!-- Bootstrap -->
<script src="skin/js/bootstrap.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="skin/js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- Sparkline -->
<script src="skin/js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- jvectormap -->
<script src="skin/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
<script src="skin/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="skin/js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="skin/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- datepicker -->
<script src="skin/js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="skin/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<!-- iCheck -->
<script src="skin/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

<!-- AdminLTE App -->
<script src="skin/js/AdminLTE/app.js" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="skin/js/AdminLTE/dashboard.js" type="text/javascript"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="skin/js/AdminLTE/demo.js" type="text/javascript"></script>-->
</body>
</html>