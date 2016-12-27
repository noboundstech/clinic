<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>User Permissions</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add New URL</a>
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
					<h2>Create New URL</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<br />
					<?php
					$form = array(
						'class'		=>	'form-horizontal form-label-left validate-form',
						'role'		=>	'form',
						'id' 		=> 	'urlform',
						'data-parsley-validate'	=>	''
					);	
					echo form_open('auth/createurl', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="url_name">URL  <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="url_name" name="url_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
							
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="url_description">Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<textarea id="url_description" required="required" class="form-control" name="url_description" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="200" data-parsley-minlength-message="Come on! You need to enter at least a 10 caracters long comment.."
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
					
				<div class="x_content">
					<br />
					<?php
					$form = array(
						'class'		=>	'form-horizontal form-label-left',
						'role'		=>	'form',
						'id' 		=> 	'roleform'
					);	
					echo form_open('auth/permissions', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="role_id">Role <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<?php
							$roles = array(
								'id'    => 	'role_id',
								'class' => 	'form-control col-md-7 col-xs-12 listbox-onchange'
							);
							echo form_dropdown('role_id', $role_options, $selected_role, $roles);
							?>
						</div>
					</div>
					</form>
					
					<?php
					$form = array(
						'class'		=>	'form-horizontal form-label-left',
						'role'		=>	'form',
						'id' 		=> 	'permissionform'
					);	
					echo form_open('auth/assignpermission', $form);
					?>	
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>URL</th>
								<th>Description</th>
								<th>Has Access?</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$n	=	1;
							foreach($acl as $val){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $val['url_name'];?></td>
									<td><?php echo $val['url_description'];?></td>
									<td>
										
										<?php 
										$checked = "";
										if($val['has_access'] == '1'){
											$checked = "checked";
										}
										?>
										<input type="checkbox" name="acl" class="acl" value="<?php echo $val['url_id'];?>" <?php echo $checked;?> >
									</td>
								</tr>
								<?php	
								$n++;		
							}
							?>
						</tbody>
					</table>	
							
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
							<button type="button" class="btn btn-success btn-assign-access">Submit</button>
							<input type="hidden" id="hidden_role_id"  name="hidden_role_id" value="<?php echo $selected_role;?>">
							<input type="hidden" id="hidden_acl" name="hidden_acl" value="">
						</div>
					</div>
					</form>
				</div>
			</div>
				
				
		</div>
	</div>
	
		
</div>			


<?php
$this->load->view("common/footer");
?>