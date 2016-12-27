<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>Available Users</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add New User</a>
				</div>
			</div>
		</div>
	</div>	
	<div class="clearfix"></div>
		
	<?php
	if($this->session->flashdata('failure')){
		?>
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<?php echo $this->session->flashdata('failure');?>
		</div>
		<?php		
	}
	elseif($this->session->flashdata('success')){
		?>
		<div class="alert alert-success alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
			<?php echo $this->session->flashdata('success');?>
		</div>
		<?php		
	}
	?>		
		
	
	<div class="row row-create" style="display: none;">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Create New User</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<?php
					$form = array(
						'class'		=>	'form-horizontal form-label-left validate-form',
						'role'		=>	'form',
						'id' 		=> 	'userform',
						'data-parsley-validate'	=>	''
					);	
					echo form_open('user/createuser', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_role_id">Role <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$roles = array(
								'id'    	=> 	'role_id',
								'class' 	=> 	'form-control col-md-7 col-xs-12',
								'required'	=>	'required' 
							);
							echo form_dropdown('user_role_id', $role_options, null, $roles);
							?>
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">User Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_name" name="user_name" required="required" class="form-control col-md-7 col-xs-12" data-parsley-type="alphanum"  data-parsley-length="[6, 20]">
						</div>
					</div>
                      
                    
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_password">Password <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="password" id="user_password" name="user_password" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
                        
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_firstname">First Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_firstname" name="user_firstname" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>  
                      
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_lastname">Last Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_lastname" name="user_lastname" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>  
                      
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_email">Email <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_email" name="user_email" required="required" class="form-control col-md-7 col-xs-12" data-parsley-type="email">
						</div>
					</div> 
                      
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_mobile">Mobile Number <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="user_mobile" name="user_mobile" required="required" class="form-control col-md-7 col-xs-12" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="10">
						</div>
					</div>   
							
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<button type="submit" class="btn btn-success btn-save">Submit</button>
							<button type="reset" class="btn btn-default btn-cancel">Cancel</button>
						</div>
					</div>
						
					</form>
				</div>
			</div>
		</div>
	</div>
		
	
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Available Users</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Username</th>
								<th>Name</th>
								<th>Email</th>
								<th>Mobile</th>
								<th>Role</th>
								<th>Is Active?</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php
							$n	=	1;
							$json	=	json_decode($users);
							foreach($json as $val){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $val->user_name;?></td>
									<td><?php echo $val->user_fullname;?></td>
									<td><?php echo $val->user_email;?></td>
									<td><?php echo $val->user_mobile;?></td>
									<td><?php echo $val->role_name;?></td>
									<td><?php echo getActiveStatus($val->user_is_active);?></td>
									<td><a href="javascript:void(0);" class="btn btn-primary btn-xs btn-edit">Edit</a>&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="btn btn-danger btn-xs btn-delete">Delete</a></td>
								</tr>
								<?php	
								$n++;		
							}
							?>
								
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	
</div>			


<?php
$this->load->view("common/footer");
?>
