<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
	<div class="menu_section">
		<h2>&nbsp;</h2>
		<ul class="nav side-menu">
			<li>
				<?php echo anchor('user/dashboard', '<i class="fa fa-home"></i>Dashboard', array('title' => 'Dashboard'));?>
			</li>
			<li><a><i class="fa fa-home"></i> Patient <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li>
						<?php echo anchor('patient/registration', 'Registration', array('title' => 'Registration'));?>
					</li>
				</ul>
			</li>
			<li><a><i class="fa fa-home"></i> Diagnostics <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li>
						<?php echo anchor('patient/registration', 'Investigation', array('title' => 'Investigation'));?>
					</li>
				</ul>
			</li>
			<li><a><i class="fa fa-home"></i> Billing <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li>
						<?php echo anchor('patient/registration', 'Print', array('title' => 'Print'));?>
					</li>
				</ul>
			</li>
			<li>
				<?php echo anchor('doctors/schedule', '<i class="fa fa-home"></i>Doctor\'s Schedule', array('title' => 'Doctor\'s Schedule'));?>
			</li>
			<li><a><i class="fa fa-home"></i> Users / Permissions <span class="fa fa-chevron-down"></span></a>
				<ul class="nav child_menu">
					<li>
						<?php echo anchor('user/index', 'Users', array('title' => 'Users'));?>
					</li>
					<li>
						<?php echo anchor('auth/roles', 'Roles', array('title' => 'Roles'));?>
					</li>
					<li>
						<?php echo anchor('auth/permissions', 'Permissions', array('title' => 'Permissions'));?>
					</li>
				</ul>
			</li>
			
		</ul>
	</div>

</div>