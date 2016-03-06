
<html>
<body style="padding:150px;">
<div style></div>

<!DOCTYPE html>
<html>

<head>
	<meta charset='UTF-8'>
	<title>Inspection Reports</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'lib.php';?>
	<script src="<?php echo base_url().'assets/jquery-1.2.6.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/style-table.js'?>"></script>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css-table.css'?>">
	<!--[if !IE]><!-->
	<style>
	.dataTables_filter
	{
		float:right;
		width:500px;
	}
	
	.row-fluid
	{
		width:33.3%;
		right:0%;
		margin-right:0%;
		
	}
	.dataTables_length
	{float:left;}
	input
		{
			float:right;
			width:500px;
		}
		
	table, thead, tbody, th, td, tr { 
		font-size:20px;
		padding:5px;
		}
		
	td{
		padding:5px;
		height:40px;
	}
	
	.modal-backdrop
	{
		background:transparent;
	}
	
	th
	{
		font-weight:bold;
		text-align:center;
	}
		/* 
	Max width before this PARTICULAR table gets nasty
	This query will take effect for any screen smaller than 760px
	and also iPads specifically.
	*/
	@media 
	only screen and (max-width: 760px),
	(min-device-width: 768px) and (max-device-width: 1024px)  {
			
		body:before
		{
			overflow-x:hidden;
		}
		
		/* Force table to not be like tables anymore */
		table, thead, tbody, th, td, tr { 
			display: block; 
		}
		
		table
		{margin-top:20%;
		width:35%;
		}
		
		
		tbody td,tfoot td:before {
		text-align:right;
		background:#d5eaf0;
		}
		
		td
		{
		height:30px;
		}
		
		/* Hide table headers (but not display: none;, for accessibility) */
		thead tr { 
			position: absolute;
			top: -9999px;
			left: -9999px;
		}
		
		tr { border: 1px solid #ccc; 
		
		}
		
		td { 
			/* Behave  like a "row" */
			border: none;
			border-bottom: 1px solid #000; 
			position: relative;
			padding-left: 0%;
		}
		
		td:before { 
			/* Now like a table header */
			position: absolute;
			/* Top/left values mimic padding */
			text-align:left;
			top: 6px;
			left: 5px;
			width:30%; 
			padding-right: 10px; 
			white-space: nowrap;
			font-weight:bold;
		}
		
		/*
		Label the data
		*/
		
	
	}
	
	/* Smartphones (portrait and landscape) ----------- */
	@media only screen
	and (min-device-width : 320px)
	and (max-device-width : 480px) {
		body { 
			padding: 0; 
			margin: 0; 
			width: 320px; 
			overflow-x:hidden;
			}
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
	}
	
	</style>
	<!--<![endif]-->
</head>

	<body>

	<?php include'menu.php';?>
	<div style="width:100%;height:100px;margin-top:1%; text-align:center; background-color:#000;color:#fff; border-top:1px solid #eee;">
		<h1 style="float:left; margin-top:2%; margin-left:3%;">Register New Inspector</h1>
	</div>
    </nav>
	
	<div id="page-wrap" style="margin-top:5%; width:100%">
	<center>
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	  <div class="panel-heading">
		New Inspector
	  </div>
	  <div class="panel-body">
		
	

	  <!-- Table -->
	 <?php echo form_open("Maine/save_user");?>
	<table class="bootstrap-datatable datatable" style="width:90%;">
		<tr>
			<td><?php echo form_label("First Name","txtFirstName");?></td>
			<td><?php echo form_input(array("id"=>"txtFirstName","name"=>"txtFirstName","class"=>"form-control"),set_value("txtFirstName"));?></td>
			<td><?php echo form_error("txtFirstName","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Last Name","txtLastName");?></td>
			<td><?php echo form_input(array("id"=>"txtLastName","name"=>"txtLastName","class"=>"form-control"),set_value("txtLastName"));?></td>
			<td><?php echo form_error("txtLastName","<div>","</div>"); ?></td>
		</tr>
		  <tr>
			<td><?php echo form_label("Email Address","txtEmail");?></td>
			<td><?php echo form_input(array("id"=>"txtEmail","name"=>"txtEmail","class"=>"form-control"),set_value("txtEmail"));?></td>
			<td><?php echo form_error("txtEmail","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Username","txtUserName");?></td>
			<td><?php echo form_input(array("id"=>"txtUserName","name"=>"txtUserName","class"=>"form-control"),set_value("txtUserName"));?></td>
			<td><?php echo form_error("txtUserName","<div>","</div>"); ?></td>
		</tr>
		<tr>
			<td><?php echo form_label("Password","txtPassword");?></td>
			<td><?php echo form_password(array("id"=>"txtPassword","name"=>"txtPassword","class"=>"form-control"),set_value("txtPassword"));?></td>
			<td><?php echo form_error("txtPassword","<div>","</div>"); ?></td>
		</tr>
	  
	</table>

	  </div>
	<div>
	<?php echo validation_errors('<span class="error alert alert-danger" role="alert">', '</span>');?>
	</div>
	<br/>
	<div style="float:right;" class="panel-footer"><?php echo form_submit("btnAdd","Save",array("class"=>"btn btn-primary"));?><br>
	<?php echo form_close(); ?>
	</div>
	

	</center>
</div>


   
	
</body>

</html>
	
