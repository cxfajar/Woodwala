<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>{{ $title }}</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div class="loader-logo"> <h3> ADMIN PORTAL </h3> </div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>

	<div class="header">
		<div class="header-left">
		</div>
		<div class="header-right">
			<div class="user-info-dropdown">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
						<span class="user-icon">
							<img src="uploads/boy_night_headphones_145031_1280x720.jpg" alt="">
						</span>
						<span class="user-name">{{ session()->get('user_fname') }} {{ session()->get('user_lname') }}</span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="{{ URL::to('profile') }}"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="{{ URL::to('logout') }}"><i class="dw dw-logout"></i> Log Out</a>
					</div>
				</div>
			</div>
			<div></div>
		</div>
	</div>
	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="{{ URL::to('admin') }}">
				<h4 class='text-white'> Hire a Carpenter </h4>
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">
                    <li>
						<a href="{{ URL::to('admin') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-house-1"></span><span class="mtext">Dashboard</span>
						</a>
                    </li>
					<li class="dropdown">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon dw dw-menu"></span><span class="mtext">Users</span>
						</a>
						<ul class="submenu">
							<li><a href="{{ URL::to('customers') }}">Manage Customers</a></li>
							<li><a href="{{ URL::to('wholesallers') }}">Manage Wholesallers</a></li>
							<li><a href="{{ URL::to('carpenters') }}">Manage Carpenters</a></li>
						</ul>
					</li>
                    <li>
                        <a href="{{ URL::to('manage_ads') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-menu"></span><span class="mtext">Manage Ads</span>
						</a>
                    </li>
                    <li>
                        <a href="{{ URL::to('profile') }}" class="dropdown-toggle no-arrow">
							<span class="micon dw dw-user"></span><span class="mtext">Profile</span>
						</a>
                    </li>

				</ul>
			</div>
		</div>
	</div>
