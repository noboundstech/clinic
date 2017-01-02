<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>User Category</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add User Category</a>
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
					<h2>Create New User Category</h2>
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
					echo form_open('user/createcategory', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usercategory_name">Category Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="usercategory_name" name="usercategory_name" required="required" class="form-control col-md-7 col-xs-12">
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
		
	<div class="row row-edit" style="display: none;" id="row-edit"><!---->
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Edit User Category</h2>
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
					echo form_open('user/editcategory', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="usercategory_name">Category Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="usercategory_name1" name="usercategory_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<input type="hidden" id="usercategory_id1" name="usercategory_id">
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
					<h2>Available User Category</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>User Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$n	=	1;
							foreach($categories as $category){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $category->usercategory_name;?></td>
									<td>
										<a href="javascript::void()" class="btn btn-primary btn-xs btn-edit" onclick="ajaxEditUserCategory(<?php echo $category->usercategory_id;?>)">Edit</a>&nbsp;&nbsp;&nbsp;
										<a href="removecategory/<?php echo $category->usercategory_id; ?>" class="btn btn-danger btn-xs btn-delete" onclick="return confirm('Are you sure ?')">Delete</a>
									</td>
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

<script>
function ajaxEditUserCategory(id){
	jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "user/getCategoryById/"+id,
					success: function(res) {
												if (res)
												{
													$('#row-edit').show();
													$('#usercategory_name1').val(res.trim());
													$('#usercategory_id1').val(id);
												}
											}
				});
}
</script>
	
<?php
$this->load->view("common/footer");
?>