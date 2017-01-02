<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>Tests</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add New Test</a>
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
					<h2>Create New Test</h2>
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
					echo form_open('test/createtest', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="test_name" name="test_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Short Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="test_short_name" name="test_short_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Category <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="testcategory_id" name="testcategory_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($testcategory as $testcat) {
								?>
								<option value="<?php echo $testcat->testcategory_id; ?>"><?php echo $testcat->testcategory_name; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Department <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="department_id" name="department_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($departments as $department) {
								?>
								<option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
								<?php
							}
							?>
							</select>
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
					<h2>Edit Test</h2>
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
					echo form_open('test/edittest', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="test_name1" name="test_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Short Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="test_short_name1" name="test_short_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Category <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="testcategory_id1" name="testcategory_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($testcategory as $testcat) {
								?>
								<option value="<?php echo $testcat->testcategory_id; ?>"><?php echo $testcat->testcategory_name; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Department <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="department_id1" name="department_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($departments as $department) {
								?>
								<option value="<?php echo $department->department_id; ?>"><?php echo $department->department_name; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<input type="hidden" id="test_id1" name="test_id">
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
					<h2>Available Tests</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Test</th>
								<th>Short Name</th>
								<th>Category</th>
								<th>Department</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$n	=	1;
							foreach($tests as $test){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $test->test_name;?></td>
									<td><?php echo $test->test_short_name;?></td>
									<td><?php echo $test->testcategory_name;?></td>
									<td><?php echo $test->department_name;?></td>
									<td>
										<a href="javascript::void()" class="btn btn-primary btn-xs btn-edit" onclick="ajaxEditTest(<?php echo $test->test_id;?>)">Edit</a>&nbsp;&nbsp;&nbsp;
										<a href="removetest/<?php echo $test->test_id; ?>" class="btn btn-danger btn-xs btn-delete" onclick="return confirm('Are you sure ?')">Delete</a>
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
function ajaxEditTest(id){
	jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "test/getTestById/"+id,
					success: function(res) {
												if (res)
												{
													var arr = res.split(',');
													$('#row-edit').show();
													$('#test_name1').val(arr[0].trim());
													$('#test_short_name1').val(arr[1].trim());
													$('#testcategory_id1').val(arr[2].trim());
													$('#department_id1').val(arr[3].trim());
													$('#test_id1').val(id);
												}
											}
				});
}
</script>
	
<?php
$this->load->view("common/footer");
?>