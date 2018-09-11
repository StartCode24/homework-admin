
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href=<?php echo base_url("assets/img/apple-icon.png");?> />
	<link rel="icon" type="image/png" href=<?php echo base_url("assets/img/favicon.png");?> />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Material Dashboard by Creative Tim</title>

	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href=<?php echo base_url("assets/css/bootstrap.min.css");?> rel="stylesheet" />

    <!--  Material Dashboard CSS    -->
    <link href=<?php echo base_url("assets/css/material-dashboard.css");?> rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href=<?php echo base_url("assets/css/demo.css");?> rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons" rel="stylesheet" type="text/css">

    <!--     Sweetalert2     -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert.css'); ?>" >
	<!-- <link rel="stylesheet" href=<?php echo base_url("assets/css/sweetalert2.min.css");?>> -->

</head>

<body>

	<div class="wrapper">

	    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-1.jpg">
			<!--
		        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

		        Tip 2: you can also add an image using data-image tag
		    -->

			<div class="logo">
				<a href="#" class="simple-text">
					Welcome, Admin!
				</a>
			</div>

	    	<div class="sidebar-wrapper">
	            <ul class="nav">
	                <li class="<?php echo $this->session->userdata('class0'); ?>">
	                    <a href="<?php echo base_url()."Dashboard/index/"?>">
	                        <i class="material-icons">dashboard</i>
	                        <p>Dashboard</p>
	                    </a>
	                </li>
	                <li class="<?php echo $this->session->userdata('class1'); ?>">
	                    <a href="">
	                        <i class="material-icons">notifications</i>
	                        <p>Skejul</p>
	                    </a>
	                </li>
	                <li class="<?php echo $this->session->userdata('class2'); ?>">
	                    <a href="<?php echo base_url()."Dashboard/guru/"?>">
	                        <i class="material-icons">people</i>
	                        <p>Guru</p>
	                    </a>
	                </li>
	                <li class="<?php echo $this->session->userdata('class3'); ?>">
	                    <a href="<?php echo base_url()."Dashboard/mapel/"?>">
	                        <i class="material-icons">content_paste</i>
	                        <p>Mata Pelajaran</p>
	                    </a>
	                </li>
	                <li class="<?php echo $this->session->userdata('class4'); ?>">
	                    <a href="<?php echo base_url()."Dashboard/room/all_room_data/"?>">
	                        <i class="material-icons">room</i>
	                        <p>Ruangan</p>
	                    </a>
	                </li>
	            </ul>
	    	</div>
	    </div>
			<!-- for base url js -->
			<input type="hidden" id="base" value="<?php echo base_url(); ?>">

	    <div class="main-panel">
			<nav class="navbar navbar-transparent navbar-absolute">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">Material Dashboard</a>
					</div>
					<div class="collapse navbar-collapse">
						<ul class="nav navbar-nav navbar-right">
							<li>
								<a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
	 							   <i class="material-icons">person</i>
	 							   <p class="hidden-lg hidden-md">Profile</p>
		 						</a>
								<ul class="dropdown-menu">
									<li><a href="<?php echo base_url()."Auth/logout"; ?>">Log Out</a></li>
								</ul>
							</li>
						</ul>

						<form class="navbar-form navbar-right" role="search">
							<div class="form-group  is-empty">
								<input type="text" class="form-control" placeholder="Search">
								<span class="material-input"></span>
							</div>
							<button type="submit" class="btn btn-white btn-round btn-just-icon">
								<i class="material-icons">search</i><div class="ripple-container"></div>
							</button>
						</form>
					</div>
				</div>
			</nav>

		
