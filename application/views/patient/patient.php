<div class="">
	<div class="page-title">
		<div class="title_left">
			<h1>Patient Registation</h1>
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
		
		
	<div class="row row-create" >
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Create New Patient</h2>
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
					echo form_open('patient/createpatient', $form);
					?>
					<div class="row">
						<div class="col col-md-6 col-sm-6 col-xs-12">
								<label  for="test_name">Select Patient Type <span class="required">*</span>
								</label>
								<div class="form-group">
									<select id="testcategory_id" name="testcategory" class="form-control col-md-7 col-xs-12" onchange="showHidePatientList();" required="required">
										<option value="">Select Type</option>
										<option value="1">New Patient</option>
										<option value="2">Existing Patient</option>
									</select>
								</div>
						</div>
						<div class="col col-md-6 col-sm-6 col-xs-12">
							<div class="form-group" id="customer_name_dropdown">
								<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">All Patient Name <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 col-xs-12">
									<select id="testcategory_id" name="patient_id" class="form-control col-md-7 col-xs-12" >
										<option value="">Select</option>
									<?php
									foreach($patients as $patient) {
										?>
										<option value="<?php echo $patient->patient_id; ?>"><?php echo $patient->patient_name; ?> (<?php echo $patient->patient_phone; ?>)</option>
										<?php
									}
									?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div id="new_patient_form">
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="patient_name" name="patient_name" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Phone No<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="patient_phoneno" name="patient_phoneno" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Address <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="patient_address" name="patient_address" required="required" class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Email
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="patient_email" name="patient_email"  class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Age <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="patient_age" name="patient_age"  class="form-control col-md-7 col-xs-12">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name">Patient Gender <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="patient_gender" name="patient_gender" class="form-control col-md-7 col-xs-12" required="required">
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="Female">Female</option>
								<option value="Outher">Outher</option>
							</select>
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name"> Test <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<select id="department_id1" name="test_id[]" class="form-control col-md-7 col-xs-12 chzn-select" required="required">
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
					<div class="form-group input_fields_wrap">
						
						<button class="add_field_button " style="margin-left: 30%; " type="button" >Add More Test</button>
						
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
//////////////////// function for hide show customer list ////////////////////
function showHidePatientList()
{
	console.log($("#testcategory_id").val());
	if($("#testcategory_id").val()==2)
	{
		$("#customer_name_dropdown").css("display", "block");
		$("#new_patient_form").css("display", "none");
	}
	if($("#testcategory_id").val()==1)
	{
		$("#customer_name_dropdown").css("display", "none");
		$("#new_patient_form").css("display", "block");
		
	}
}
/////////////////////////// chosen function /////////////////////////////
$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    var src 			= "https://cdnjs.cloudflare.com/ajax/libs/chosen/1.4.2/chosen.jquery.js";
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
    	
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group input_fields_wrap"><label class="control-label col-md-3 col-sm-3 col-xs-12" for="test_name"> Test <span class="required">*</span></label><div class="col-md-6 col-sm-6 col-xs-12"><select  name="test_id[]" class="form-control col-md-7 col-xs-12 chzn-select" required="required"><option value="">Select</option><?php foreach($tests as $test) {
								?><option value="<?php echo $test->test_id; ?>"><?php echo $test->test_name; ?></option><?php
							}
							?></select></div><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
       // $("<link rel='stylesheet' type='text/css' href='"+href+"'>");
        $("<script type='text/javascript' src='"+src+"'>");
        $(function() {
		    $(".chzn-select").chosen();
		});
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

<script type="text/javascript">
$(function() {
    $(".chzn-select").chosen();
});
$(function() {
    $(".chzn-select2").chosen();
});
</script>
<?php
$this->load->view("common/footer");
?>