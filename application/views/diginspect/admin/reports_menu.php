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
	table, thead, tbody, th, td, tr { 
		font-size:20px;
	}
		
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
	.span6
	{
		
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
		.jumbotron
		{
			margin-top:60%;
		}
		
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
		td:nth-of-type(1):before { content: "Inspection ID"; }
		td:nth-of-type(2):before { content: "Date of Inspection"; }
		td:nth-of-type(3):before { content: "Establishment Name"; }
		td:nth-of-type(4):before { content: "Plant Office Address"; }
		td:nth-of-type(5):before { content: "Plant Office GPS"; }
		td:nth-of-type(6):before { content: "Warehouse Address"; }
		td:nth-of-type(7):before { content: "Warehouse GPS"; }
		td:nth-of-type(8):before { content: "Owner Name"; }
		td:nth-of-type(9):before { content: "Telephone number"; }
		td:nth-of-type(10):before { content: "Fax Number"; }
		td:nth-of-type(11):before { content: "Classification"; }
		td:nth-of-type(12):before { content: "Products"; }
		td:nth-of-type(13):before { content: "Manner of Notification"; }
		td:nth-of-type(14):before { content: "Purpose of Inspection"; }
		td:nth-of-type(15):before { content: "License to Operate Number"; }
		td:nth-of-type(16):before { content: "Renewal"; }
		td:nth-of-type(17):before { content: "Validity"; }
		td:nth-of-type(18):before { content: "Representative Name"; }
		td:nth-of-type(19):before { content: "Representative Position"; }
		td:nth-of-type(20):before { content: "Registration Number"; }
		td:nth-of-type(21):before { content: "Date Issued"; }
		td:nth-of-type(22):before { content: "Validity"; }
		td:nth-of-type(23):before { content: "Person's Interviewed"; }
		td:nth-of-type(24):before { content: "Position"; }
		td:nth-of-type(25):before { content: "OR Number"; }
		td:nth-of-type(26):before { content: "Amount of Payment"; }
		td:nth-of-type(27):before { content: "Date of Payment"; }
		td:nth-of-type(28):before { content: "RSN"; }
	
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
		.jumbotron
		{
			margin-top:50%;
		}
		}
	
	/* iPads (portrait and landscape) ----------- */
	@media only screen and (min-device-width: 768px) and (max-device-width: 1024px) {
		body { 
			width: 495px; 
		}
		.jumbotron
		{
			margin-top:50%;
		}
	}
	
	</style>
	<!--<![endif]-->
</head>

	<body>
	<?php include 'menu.php'?>
        <!-- /.container -->
	<div style="width:100%;height:100px;margin-top:1%; text-align:center; background-color:#000;color:#fff; border-top:1px solid #eee;">
		<h1 style="float:left; margin-top:2%; margin-left:3%;">Inspection Details</h1>
	</div>
    </nav>
	
	<div style="margin-top:15%;">
	<div class="jumbotron">
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				  <img src="<?php echo base_url().'assets/img/thirty.png';?>" alt="...">
				  <div class="caption" style="text-align:center">
					<h3>30 days</h3>
					<p>These are list of establishments that failed the inspection and given 30 days to comply with their deficiencies</p>
					<p><?php echo anchor("Maine/load_reports/30","View",array("class"=>"btn btn-primary"));?>
				  </div>
				</div>
		  </div>
		  <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				  <img src="<?php echo base_url().'assets/img/retina-ready.png';?>" alt="...">
				  <div class="caption" style="text-align:center">
					<h3>Approved Inspections</h3>
					<p>These are list of establishments that passed the inspection without any deficiency.<br></p>
					<p><?php echo anchor("Maine/load_reports/Not","View",array("class"=>"btn btn-primary"));?>
				  </div>
				</div>
		  </div>
		   <div class="col-sm-6 col-md-4">
				<div class="thumbnail">
				  <img src="<?php echo base_url().'assets/img/45.png';?>" alt="...">
				  <div class="caption" style="text-align:center">
					<h3>45 days</h3>
					<p>These are list of establishments that failed the inspection and given 45 days to comply with their deficiencies</p>
					<p><?php echo anchor("Maine/load_reports/45","View",array("class"=>"btn btn-primary"));?>
				  </div>
				</div>
		  </div>
		</div>
	</div>
	</div>
</body>
</html>