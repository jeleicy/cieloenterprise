<html>
	<head>
		<title>Cielo Enterprise - Test</title>
		<!--link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<script src="<?php echo base_url(); ?>js/jquery.validate.js"></script>	
		<script src="<?php echo base_url(); ?>js/jquery.inputmask.bundle.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
			  $(":input[data-inputmask-mask]").inputmask();
			  $(":input[data-inputmask-alias]").inputmask();
			  $(":input[data-inputmask-regex]").inputmask("Regex");
			});


			/*******************Functions*********************/
			$(function() {

				$( "#saveAjax" ).click(function() {
					$("div#textSaveNormal").html('');

				  	var name = $("#name").val();
				  	var dob = $("#dob").val();
				  	var email = $("#email").val();
				  	var favoritecolor = $("#favoritecolor").val();

				  	if (name=="" || dob=="" || email=="" || favoritecolor=="")
				  		alert("All fields ar required");
				  	else {
				  		$("div#textSave").html('<div class="alert alert-danger" style="width:40%; margin-top: 2%"><h3>Saving...</h3></div>');
					  	var url = '<?php echo base_url(); ?>'+'index.php/';

						$.ajax({
						    url: url+'inicio/saveAjax',
						    method: 'POST',
						    data: { name: name, dob: dob, email: email, favoritecolor: favoritecolor },
						    success: function (data) {
						        $("div#textSave").html('<div class="alert alert-info" style="width:40%; margin-top: 2%"><h3>Member Saved Successfull</h3></div>');

							  	$("#name").val('');
							  	$("#dob").val('');
							  	$("#email").val('');
							  	$("#favoritecolor").val('');						        
						    }
						});
					}
				});

			});			
		</script>	

		<style type="text/css">
			input {
			  font-size: 16px;
			}
			.col-md-2 { width: 100px; }
			.col-md-3 { width: 150px; }
			.col-md-4 { width: 200px; }
			.col-md-6 { width: 300px; }
			.col-md-12 { width: 800px; }
			
		</style>
	</head>
	<body>
	<div class="container">
		<div id="textSave"></div>
		<?php if ($this->session->userdata('message')!="") { ?>
			<div id="textSaveNormal">
			  	<div class="alert alert-info" style="width:40%; padding-top: 1%; padding-bottom: 1%; margin-top: 1%"><h3><?php echo $this->session->userdata('message'); ?></h3></div>
			</div>
		<?php } ?>	

		<h3 id='form_head'>Cielo Enterprise Members </h3><br/>
		<div id="form_input">
			<?php
				$this->load->helper('form');

				// Open form and set URL for submit form
				echo form_open('inicio/savemember');
				echo '<div class="form-group">';
				// Show Name Field in View Page
				echo form_label('Name :', 'name');
				$data= array(
					'name' => 'name',
					'id' => 'name',
					'placeholder' => 'Please Enter User Name',
					'class' => 'form-control',
					'required' => 'required'
				);
				echo form_input($data);
				echo '</div>';

				//id="DATE19002015" name="DATE19002015" placeholder="mm/dd/yyyy" type="text" value="" />

				// Show DOB Field in View Page
				echo '<div class="form-group">';
				echo form_label('Date of Birth :', 'dob');
				$data= array(
					'name' => 'dob',
					'id' => 'dob',
					'placeholder' => 'Please Enter DOB',
					'class' => 'form-control',
					'aria-required="true',
					'required' => 'required',
					'data-inputmask-alias' => "mm/dd/yyyy",
					'data-inputmask' => "'yearrange': { 'minyear': '1900', 'maxyear': '2015' }",
					'data-val' => 'true' 
				);
				echo form_input($data);
				echo '</div>';

				// Show Email Field in View Page
				echo '<div class="form-group">';
				echo form_label('User email:', 'u_email');
				$data= array(
					'type' => 'email',
					'name' => 'email',
					'id' => 'email',
					'placeholder' => 'Please Enter Email Address',
					'class' => 'form-control',
					'required' => 'required'
				);
				echo form_input($data);
				echo '</div>';

				// Show Favorite Color Field in View Page
				echo '<div class="form-group">';
				echo form_label('Favorite Color :', 'favoritecolor');
				$data= array(
					'name' => 'favoritecolor',
					'id' => 'favoritecolor',
					'placeholder' => 'Please Enter Favorite Color',
					'class' => 'form-control',
					'required' => 'required'
				);
				echo form_input($data);
				echo '</div>';
			?>
		</div>

		<div id="form_button">
			<?php
				$data = array(
					'type' => 'submit',
					'value'=> 'Save Member',
					'class'=> 'btn btn-primary'
				);
				echo form_submit($data); 
			?>

			<?php
				$data = array(
					'type' => 'button',
					'id' => 'saveAjax',
					'value'=> 'Save (ajax)',
					'class'=> 'btn btn-success'
				);
				echo form_submit($data); 
			?>				

			<?php
				$data = array(
					'type' => 'button',
					'value'=> 'New Member',
					'class'=> 'btn btn-success',
					'onclick' => 'location.href=\'/cieloenterprise/cieloenterprise\';'
				);
				echo form_submit($data); 
			?>			
		</div>

		<?php echo form_close();?>

<div class="alert alert-warning" role="alert" style="margin-top: 5%">
  <strong>Jeleicy Figueroa</strong>
</div>		

	</div>
	</body>
</html>