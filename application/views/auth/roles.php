<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>User Roles</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add New Role</a>
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
					<h2>Create New Role</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<?php
					$form = array(
						'class'		=>	'form-horizontal form-label-left validate-form',
						'role'		=>	'form',
						'id' 		=> 	'roleform',
						'data-parsley-validate'	=>	''
					);	
					echo form_open('auth/createrole', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_name">Role <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="role_name" name="role_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
							
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_description">Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="role_description" required="required" class="form-control" name="role_description" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="200" data-parsley-minlength-message="Come on! You need to enter at least a 10 caracters long comment.."
                            data-parsley-validation-threshold="10"></textarea>
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
					<h2>Available Roles</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Role</th>
								<th>Description</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$n	=	1;
							foreach($roles as $role){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $role->role_name;?></td>
									<td><?php echo $role->role_description;?></td>
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
	</div>	<!-- /row -->
		
		
	
</div>			


<?php
$this->load->view("common/footer");
?>