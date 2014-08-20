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
			<li class="active">
				<a href="index.html">
					<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>
			<li>
				<a href="pages/widgets.html">
					<i class="fa fa-th"></i> <span>Widgets</span>
					<small class="badge pull-right bg-green">new</small>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-bar-chart-o"></i>
					<span>Charts</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="pages/charts/morris.html"><i class="fa fa-angle-double-right"></i> Morris</a></li>
					<li><a href="pages/charts/flot.html"><i class="fa fa-angle-double-right"></i> Flot</a></li>
					<li><a href="pages/charts/inline.html"><i class="fa fa-angle-double-right"></i> Inline charts</a>
					</li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-laptop"></i>
					<span>UI Elements</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="pages/UI/general.html"><i class="fa fa-angle-double-right"></i> General</a></li>
					<li><a href="pages/UI/icons.html"><i class="fa fa-angle-double-right"></i> Icons</a></li>
					<li><a href="pages/UI/buttons.html"><i class="fa fa-angle-double-right"></i> Buttons</a></li>
					<li><a href="pages/UI/sliders.html"><i class="fa fa-angle-double-right"></i> Sliders</a></li>
					<li><a href="pages/UI/timeline.html"><i class="fa fa-angle-double-right"></i> Timeline</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-edit"></i> <span>Forms</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="pages/forms/general.html"><i class="fa fa-angle-double-right"></i> General Elements</a>
					</li>
					<li><a href="pages/forms/advanced.html"><i class="fa fa-angle-double-right"></i> Advanced
							Elements</a></li>
					<li><a href="pages/forms/editors.html"><i class="fa fa-angle-double-right"></i> Editors</a></li>
				</ul>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-table"></i> <span>Tables</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="pages/tables/simple.html"><i class="fa fa-angle-double-right"></i> Simple tables</a>
					</li>
					<li><a href="pages/tables/data.html"><i class="fa fa-angle-double-right"></i> Data tables</a></li>
				</ul>
			</li>
			<li>
				<a href="pages/calendar.html">
					<i class="fa fa-calendar"></i> <span>Calendar</span>
					<small class="badge pull-right bg-red">3</small>
				</a>
			</li>
			<li>
				<a href="pages/mailbox.html">
					<i class="fa fa-envelope"></i> <span>Mailbox</span>
					<small class="badge pull-right bg-yellow">12</small>
				</a>
			</li>
			<li class="treeview">
				<a href="#">
					<i class="fa fa-folder"></i> <span>Examples</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="pages/examples/invoice.html"><i class="fa fa-angle-double-right"></i> Invoice</a></li>
					<li><a href="pages/examples/login.html"><i class="fa fa-angle-double-right"></i> Login</a></li>
					<li><a href="pages/examples/register.html"><i class="fa fa-angle-double-right"></i> Register</a>
					</li>
					<li><a href="pages/examples/lockscreen.html"><i class="fa fa-angle-double-right"></i> Lockscreen</a>
					</li>
					<li><a href="pages/examples/404.html"><i class="fa fa-angle-double-right"></i> 404 Error</a></li>
					<li><a href="pages/examples/500.html"><i class="fa fa-angle-double-right"></i> 500 Error</a></li>
					<li><a href="pages/examples/blank.html"><i class="fa fa-angle-double-right"></i> Blank Page</a></li>
				</ul>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<aside class="right-side">
<!-- Content Header (Page header) -->
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<!-- Main content -->
<section class="content">

<!-- Small boxes (Stat box) -->
<div class="row">
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-aqua">
			<div class="inner">
				<h3>
					150
				</h3>

				<p>
					New Orders
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-bag"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-green">
			<div class="inner">
				<h3>
					53<sup style="font-size: 20px">%</sup>
				</h3>

				<p>
					Bounce Rate
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-stats-bars"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-yellow">
			<div class="inner">
				<h3>
					44
				</h3>

				<p>
					User Registrations
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-person-add"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
	<div class="col-lg-3 col-xs-6">
		<!-- small box -->
		<div class="small-box bg-red">
			<div class="inner">
				<h3>
					65
				</h3>

				<p>
					Unique Visitors
				</p>
			</div>
			<div class="icon">
				<i class="ion ion-pie-graph"></i>
			</div>
			<a href="#" class="small-box-footer">
				More info <i class="fa fa-arrow-circle-right"></i>
			</a>
		</div>
	</div>
	<!-- ./col -->
</div>
<!-- /.row -->

<!-- Main row -->
<div class="row">
<!-- Left col -->
<section class="col-lg-7 connectedSortable">


<!-- Custom tabs (Charts with tabs)-->
<div class="nav-tabs-custom">
	<!-- Tabs within a box -->
	<ul class="nav nav-tabs pull-right">
		<li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
		<li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
		<li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
	</ul>
	<div class="tab-content no-padding">
		<!-- Morris chart - Sales -->
		<div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 300px;"></div>
		<div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
	</div>
</div>
<!-- /.nav-tabs-custom -->

<!-- Chat box -->
<div class="box box-success">
	<div class="box-header">
		<i class="fa fa-comments-o"></i>

		<h3 class="box-title">Chat</h3>

		<div class="box-tools pull-right" data-toggle="tooltip" title="Status">
			<div class="btn-group" data-toggle="btn-toggle">
				<button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i>
				</button>
				<button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
			</div>
		</div>
	</div>
	<div class="box-body chat" id="chat-box">
		<!-- chat item -->
		<div class="item">
			<img src="img/avatar.png" alt="user image" class="online"/>

			<p class="message">
				<a href="#" class="name">
					<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 2:15</small>
					Mike Doe
				</a>
				I would like to meet you to discuss the latest news about
				the arrival of the new theme. They say it is going to be one the
				best themes on the market
			</p>
			<div class="attachment">
				<h4>Attachments:</h4>

				<p class="filename">
					Theme-thumbnail-image.jpg
				</p>

				<div class="pull-right">
					<button class="btn btn-primary btn-sm btn-flat">Open</button>
				</div>
			</div>
			<!-- /.attachment -->
		</div>
		<!-- /.item -->
		<!-- chat item -->
		<div class="item">
			<img src="img/avatar2.png" alt="user image" class="offline"/>

			<p class="message">
				<a href="#" class="name">
					<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:15</small>
					Jane Doe
				</a>
				I would like to meet you to discuss the latest news about
				the arrival of the new theme. They say it is going to be one the
				best themes on the market
			</p>
		</div>
		<!-- /.item -->
		<!-- chat item -->
		<div class="item">
			<img src="img/avatar3.png" alt="user image" class="offline"/>

			<p class="message">
				<a href="#" class="name">
					<small class="text-muted pull-right"><i class="fa fa-clock-o"></i> 5:30</small>
					Susan Doe
				</a>
				I would like to meet you to discuss the latest news about
				the arrival of the new theme. They say it is going to be one the
				best themes on the market
			</p>
		</div>
		<!-- /.item -->
	</div>
	<!-- /.chat -->
	<div class="box-footer">
		<div class="input-group">
			<input class="form-control" placeholder="Type message..."/>

			<div class="input-group-btn">
				<button class="btn btn-success"><i class="fa fa-plus"></i></button>
			</div>
		</div>
	</div>
</div>
<!-- /.box (chat box) -->

<!-- TO DO List -->
<div class="box box-primary">
	<div class="box-header">
		<i class="ion ion-clipboard"></i>

		<h3 class="box-title">To Do List</h3>

		<div class="box-tools pull-right">
			<ul class="pagination pagination-sm inline">
				<li><a href="#">&laquo;</a></li>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">&raquo;</a></li>
			</ul>
		</div>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
		<ul class="todo-list">
			<li>
				<!-- drag handle -->
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<!-- checkbox -->
				<input type="checkbox" value="" name=""/>
				<!-- todo text -->
				<span class="text">Design a nice theme</span>
				<!-- Emphasis label -->
				<small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
				<!-- General tools such as edit or delete-->
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<input type="checkbox" value="" name=""/>
				<span class="text">Make the theme responsive</span>
				<small class="label label-info"><i class="fa fa-clock-o"></i> 4 hours</small>
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<input type="checkbox" value="" name=""/>
				<span class="text">Let theme shine like a star</span>
				<small class="label label-warning"><i class="fa fa-clock-o"></i> 1 day</small>
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<input type="checkbox" value="" name=""/>
				<span class="text">Let theme shine like a star</span>
				<small class="label label-success"><i class="fa fa-clock-o"></i> 3 days</small>
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<input type="checkbox" value="" name=""/>
				<span class="text">Check your messages and notifications</span>
				<small class="label label-primary"><i class="fa fa-clock-o"></i> 1 week</small>
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
			<li>
                                            <span class="handle">
                                                <i class="fa fa-ellipsis-v"></i>
                                                <i class="fa fa-ellipsis-v"></i>
                                            </span>
				<input type="checkbox" value="" name=""/>
				<span class="text">Let theme shine like a star</span>
				<small class="label label-default"><i class="fa fa-clock-o"></i> 1 month</small>
				<div class="tools">
					<i class="fa fa-edit"></i>
					<i class="fa fa-trash-o"></i>
				</div>
			</li>
		</ul>
	</div>
	<!-- /.box-body -->
	<div class="box-footer clearfix no-border">
		<button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
	</div>
</div>
<!-- /.box -->

<!-- quick email widget -->
<div class="box box-info">
	<div class="box-header">
		<i class="fa fa-envelope"></i>

		<h3 class="box-title">Quick Email</h3>
		<!-- tools box -->
		<div class="pull-right box-tools">
			<button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i
					class="fa fa-times"></i></button>
		</div>
		<!-- /. tools -->
	</div>
	<div class="box-body">
		<form action="#" method="post">
			<div class="form-group">
				<input type="email" class="form-control" name="emailto" placeholder="Email to:"/>
			</div>
			<div class="form-group">
				<input type="text" class="form-control" name="subject" placeholder="Subject"/>
			</div>
			<div>
				<textarea class="textarea" placeholder="Message"
						  style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
			</div>
		</form>
	</div>
	<div class="box-footer clearfix">
		<button class="pull-right btn btn-default" id="sendEmail">Send <i class="fa fa-arrow-circle-right"></i></button>
	</div>
</div>

</section>
<!-- /.Left col -->
<!-- right col (We are only adding the ID to make the widgets sortable)-->
<section class="col-lg-5 connectedSortable">

	<!-- Map box -->
	<div class="box box-solid bg-light-blue-gradient">
		<div class="box-header">
			<!-- tools box -->
			<div class="pull-right box-tools">
				<button class="btn btn-primary btn-sm daterange pull-right" data-toggle="tooltip" title="Date range"><i
						class="fa fa-calendar"></i></button>
				<button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip"
						title="Collapse" style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
			</div>
			<!-- /. tools -->

			<i class="fa fa-map-marker"></i>

			<h3 class="box-title">
				Visitors
			</h3>
		</div>
		<div class="box-body">
			<div id="world-map" style="height: 250px;"></div>
		</div>
		<!-- /.box-body-->
		<div class="box-footer no-border">
			<div class="row">
				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<div id="sparkline-1"></div>
					<div class="knob-label">Visitors</div>
				</div>
				<!-- ./col -->
				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<div id="sparkline-2"></div>
					<div class="knob-label">Online</div>
				</div>
				<!-- ./col -->
				<div class="col-xs-4 text-center">
					<div id="sparkline-3"></div>
					<div class="knob-label">Exists</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.box -->

	<!-- solid sales graph -->
	<div class="box box-solid bg-teal-gradient">
		<div class="box-header">
			<i class="fa fa-th"></i>
			<h3 class="box-title">Sales Graph</h3>
			<div class="box-tools pull-right">
				<button class="btn bg-teal btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn bg-teal btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
		</div>
		<div class="box-body border-radius-none">
			<div class="chart" id="line-chart" style="height: 250px;"></div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer no-border">
			<div class="row">
				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
						   data-fgColor="#39CCCC"/>

					<div class="knob-label">Mail-Orders</div>
				</div>
				<!-- ./col -->
				<div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
					<input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
						   data-fgColor="#39CCCC"/>

					<div class="knob-label">Online</div>
				</div>
				<!-- ./col -->
				<div class="col-xs-4 text-center">
					<input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
						   data-fgColor="#39CCCC"/>

					<div class="knob-label">In-Store</div>
				</div>
				<!-- ./col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.box-footer -->
	</div>
	<!-- /.box -->

	<!-- Calendar -->
	<div class="box box-solid bg-green-gradient">
		<div class="box-header">
			<i class="fa fa-calendar"></i>

			<h3 class="box-title">Calendar</h3>
			<!-- tools box -->
			<div class="pull-right box-tools">
				<!-- button with a dropdown -->
				<div class="btn-group">
					<button class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown"><i
							class="fa fa-bars"></i></button>
					<ul class="dropdown-menu pull-right" role="menu">
						<li><a href="#">Add new event</a></li>
						<li><a href="#">Clear events</a></li>
						<li class="divider"></li>
						<li><a href="#">View calendar</a></li>
					</ul>
				</div>
				<button class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
				<button class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
			</div>
			<!-- /. tools -->
		</div>
		<!-- /.box-header -->
		<div class="box-body no-padding">
			<!--The calendar -->
			<div id="calendar" style="width: 100%"></div>
		</div>
		<!-- /.box-body -->
		<div class="box-footer text-black">
			<div class="row">
				<div class="col-sm-6">
					<!-- Progress bars -->
					<div class="clearfix">
						<span class="pull-left">Task #1</span>
						<small class="pull-right">90%</small>
					</div>
					<div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 90%;"></div>
					</div>

					<div class="clearfix">
						<span class="pull-left">Task #2</span>
						<small class="pull-right">70%</small>
					</div>
					<div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 70%;"></div>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-sm-6">
					<div class="clearfix">
						<span class="pull-left">Task #3</span>
						<small class="pull-right">60%</small>
					</div>
					<div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 60%;"></div>
					</div>

					<div class="clearfix">
						<span class="pull-left">Task #4</span>
						<small class="pull-right">40%</small>
					</div>
					<div class="progress xs">
						<div class="progress-bar progress-bar-green" style="width: 40%;"></div>
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
	</div>
	<!-- /.box -->

</section>
<!-- right col -->
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