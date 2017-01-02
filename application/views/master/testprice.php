<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>Test Price</h1>
		</div>
		<div class="title_right">
			<div class="pull-right">
				<div class="input-group">
					<a class="btn btn-primary btn-xs btn-create">Add New Price</a>
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
					<h2>Add New Test Price</h2>
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
					echo form_open('test/addprice', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="test_id" name="test_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($tests as $test) {
								?>
								<option value="<?php echo $test->test_id; ?>"><?php echo $test->test_name; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="net_price">Net Price <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="net_price" name="net_price" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gross_price">MRP <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="gross_price" name="gross_price" required="required" class="form-control col-md-7 col-xs-12">
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
					<h2>Edit Test Price</h2>
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
					echo form_open('test/editprice', $form);
					?>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Test Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="test_id1" name="test_id" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
							<?php
							foreach($tests as $test) {
								?>
								<option value="<?php echo $test->test_id; ?>"><?php echo $test->test_name; ?></option>
								<?php
							}
							?>
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="net_price">Net Price <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="net_price1" name="net_price" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gross_price">MRP <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="gross_price1" name="gross_price" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<input type="hidden" id="test_price_id1" name="test_price_id">
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
					<h2>Tests Prices</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Test</th>
								<th>Net Price</th>
								<th>MRP</th>
								<th>Commission Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$n	=	1;
							foreach($prices as $price){
								?>
								<tr>
									<th><?php echo $n;?></th>
									<td><?php echo $price->test_name;?></td>
									<td><?php echo $price->net_price;?></td>
									<td><?php echo $price->gross_price;?></td>
									<td><?php echo $price->commission_price;?></td>
									<td>
										<a href="javascript::void()" class="btn btn-primary btn-xs btn-edit" onclick="ajaxEditTestPrice(<?php echo $price->test_price_id;?>)">Edit</a>&nbsp;&nbsp;&nbsp;
										<a href="removeprice/<?php echo $price->test_price_id; ?>" class="btn btn-danger btn-xs btn-delete" onclick="return confirm('Are you sure ?')">Delete</a>
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
function ajaxEditTestPrice(id){
	jQuery.ajax({
					type: "POST",
					url: "<?php echo base_url(); ?>" + "test/getPriceById/"+id,
					success: function(res) {
												if (res)
												{
													var arr = res.split(',');
													$('#row-edit').show();
													$('#test_id1').val(arr[0].trim());
													$('#net_price1').val(arr[1].trim());
													$('#gross_price1').val(arr[2].trim());
													$('#test_price_id1').val(id);
												}
											}
				});
}
</script>
	
<?php
$this->load->view("common/footer");
?>