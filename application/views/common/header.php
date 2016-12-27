<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Diagnostic Clinic." />
	<meta name="keywords" content="Diagnostic Clinic">
	<meta name="author" content="Aranax Technologies Pvt Ltd">
	<link rel="shortcut icon" href="<?php echo $this->config->base_url();?>assets/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo $this->config->base_url();?>assets/img/favicon.ico" type="image/x-icon">

	<title><?php echo $page_title . " | " . $this->config->item('website_name');?></title>

	<!-- Bootstrap -->
    <link href="<?php echo $this->config->base_url();?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo $this->config->base_url();?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo $this->config->base_url();?>assets/css/theme.min.css" rel="stylesheet">
		
</head>


  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?php echo $this->config->base_url();?>" class="site_title">
              <!--<i class="fa fa-paw"></i> <span>Gentellela Alela!</span>-->
              <img src="<?php echo $this->config->base_url();?>assets/img/logo.png" alt="logo">
              </a>
            </div>

            <div class="clearfix"></div>
            
            <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">
                <img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt="<?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?>" class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

		
			<!-- left menu -->
			<?php
				$this->load->view("common/sidebar");
			?>
			<!-- / left menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt=""><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li>
                    	<?php echo anchor('auth/logout', '<i class="fa fa-sign-out pull-right"></i> Log Out', array('title' => 'Log Out'));?>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?php echo $this->config->base_url();?>assets/img/profile.jpg" alt="Profile Image" /></span>
                        <span>
                          <span><?php echo $_SESSION['AX_user_firstname'];?> <?php echo $_SESSION['AX_user_lastname'];?></span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">		