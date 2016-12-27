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

	<link rel="stylesheet" href="<?php echo $this->config->base_url();?>assets/css/login.css"/>
		
</head>


<body class="homepage-bg">
		<!-- Top content -->
		<div class="top-content">
        	
			<div class="inner-bg">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-md-offset-3 form-box">
						<?php
							if(!empty($auth_error_message) ) {
								echo "<div class='alert alert-danger'>" . $auth_error_message . "</div>";
							}
						?>
							<div class="form-top">
								<div class="form-top-left">
									<h3>Sign In</h3>
									<p>Fill in the form below to get instant access:</p>
								</div>
								<div class="form-top-right">
									<i class="fa fa-user"></i>
								</div>
							</div>
							<div class="form-bottom">
			                    
								<?php
									$form = array(
													'class'		=>	'',
													'role'		=>	'form',
													'id' 		=> 	'loginform'
												);	
									echo form_open('auth/login', $form);
								?>
								
									<div class="form-group">
										<input type="text" name="username" placeholder="User Name" class="form-first-name form-control">
									</div>
									<div class="form-group">
										<input type="password" name="password" placeholder="Password" class="pass form-control">
									</div>

									<button type="submit" class="btn">Submit</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
            
		</div>

	