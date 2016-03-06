<?php include 'lib.php'?>
<div class="page-header">
  <h1>Register New Inspector</h1>
</div>
<div id="page-wrap" style="margin-top:5%; width:100%" class="container">
	<center>
	<?php echo form_open("Maine/save_user");?>
	<table class="bootstrap-datatable datatable" style="width:90%;">
		<tr>
			<td><?php echo form_label("First Name","txtfirstName");?></td>
			<td><?php echo form_input(array("id"=>"txtfirstName","name"=>"txtfirstName","class"=>"form-control"),set_value("txtName"));?></td>
			<td><?php echo form_error("txtfirstName","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Last Name","txtlastName");?></td>
			<td><?php echo form_input(array("id"=>"txtlastName","name"=>"txtlastName","class"=>"form-control"),set_value("txtName"));?></td>
			<td><?php echo form_error("txtlastName","<div>","</div>"); ?></td>
		</tr>
		  <tr>
			<td><?php echo form_label("Email Address","txtEmail");?></td>
			<td><?php echo form_input(array("id"=>"txtEmail","name"=>"txtEmail","class"=>"form-control"),set_value("txtEmail"));?></td>
			<td><?php echo form_error("txtEmail","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Username","txtUsername");?></td>
			<td><?php echo form_input(array("id"=>"txtUsername","name"=>"txtUsername","class"=>"form-control"),set_value("txtUsername"));?></td>
			<td><?php echo form_error("txtUsername","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Password","txtPassword");?></td>
			<td><?php echo form_password(array("id"=>"txtPassword","name"=>"txtPassword","class"=>"form-control"),set_value("txtPassword"));?></td>
			<td><?php echo form_error("txtPassword","<div>","</div>"); ?></td>
		</tr>
	  
	</table>

	
	<div>
	<?php echo validation_errors('<span class="error alert alert-danger" role="alert">', '</span>');?>
	</div>
	<br/>
	<div style="float:right;"><?php echo form_submit("btnAdd","Save",array("class"=>"btn btn-lg btn-primary"));?><br>
	<?php echo form_close(); ?>

	</center>
</div>

