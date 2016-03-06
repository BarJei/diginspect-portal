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

	<body is="bod">
	<?php include 'menu.php'?>
        <!-- /.container -->
	<div style="width:100%;height:100px;margin-top:1%; text-align:center; background-color:#000;color:#fff; border-top:1px solid #eee;">
		<h1 style="float:left; margin-top:2%; margin-left:3%;">Inspection Details</h1>
	</div>
    </nav>
	
	<div id="page-wrap" style="margin-top:15%; width:300%">
	<div style="width:10%; margin-bottom:1%;">
		<?php echo form_hidden(array("id"=>"txtGetID","name"=>"txtGetID","class"=>"form-control"),set_value("txtGetID"));?>
		<!--input id="txtGetID" value="" type="text"-->
		<div style="left:15%; padding-bottom:3%; position:relative;">
		<input type="date" id="dtpDate" name="dtpDate" value="<?php date_default_timezone_set("Asia/Manila"); echo date_default_timezone_get(); ?>">
		<script type="text/javascript">
			$('#dtpDate').change(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>Maine/sortbydate_details',
                type: 'POST',
                data:{
                    _date:$('#dtpDate').val()
                },
                success: function(data){
					//window.href="sortbydate.php";
					//alert(data);
					$('#tbldata').html(data);
                },
                error: function(e){
                    alert(e);
                }
            });
        });
		</script>
		</div>
	</div>
	
	<div class="box-content">
	<div id="tbldata" >
 	<table class="bootstrap-datatable datatable">
		<thead>
		<tr>
			<th>Inspection ID</th>
			<th>Date of Inspection</th>
			<th>Establishment Name</th>
			<th>Plant Office Address</th>
			<th>Plant Office GPS</th>
			<th>WareHouse Address</th>
			<th>Warehouse GPS</th>
			<th>Owner Name</th>
			<th>Telephone Number</th>
			<th>Fax Number</th>
			<th>Classification</th>
			<th>Products</th>
			<th>Notification</th>
			<th>Purpose of Inspection</th>
			<th>License to Operate Number</th>
			<th>Renewal</th>
			<th>Validity</th>
			<th>Representative Name</th>
			<th>Representative Position</th>
			<th>Registration Number</th>
			<th>Date Issued</th>
			<th>Validity</th>
			<th>Person's Interviewed</th>
			<th>Position</th>
			<th>OR Number</th>
			<th>Amount of Payment</th>
			<th>Date of Payment</th>
			<th>RSN</th>
		</tr>
		</thead>
		<tbody>
		<?php
        foreach($inspectionlist as $key=>$value)
        {
            echo"<tr id='btninspectID$value->inspectID'>";
			include 'modals.php';	
            echo"<td>".anchor('Maine/viewpage/'.$value->inspectID,"$value->inspectID",array('data-toggle'=>'modal','data-target'=>'#myModal'))."</td>";
            echo"<td>".anchor('Maine/viewpage/'.$value->inspectID,"$value->syncDate",array('data-toggle'=>'modal','data-target'=>'#myModal'))."</td>";
            //echo"<td >".$value->syncDate."</td></a>";
            echo"<td >".$value->establishmentName."</td>";
			echo"<td >".$value->plantofficeAdd."</td>";
			echo"<td >".$value->plantofficeGPS."</td>";
			echo"<td >".$value->warehouseAdd."</td>";
			echo"<td >".$value->warehouseGPS."</td>";
			echo"<td >".$value->ownerName."</td>";
			echo"<td >".$value->telNum."</td>";
			echo"<td >".$value->faxNum."</td>";
			echo"<td >".$value->classification."</td>";
			echo"<td >".$value->products."</td>";
			echo"<td >".$value->notification."</td>";
			echo"<td >".$value->inspectionPurpose."</td>";
			echo"<td >".$value->ltoNum."</td>";
			echo"<td >".$value->ltoRenewal."</td>";
			echo"<td >".$value->ltoValidity."</td>";
			echo"<td >".$value->repName."</td>";
			echo"<td >".$value->repPosition."</td>";
			echo"<td >".$value->repRegNum."</td>";
			echo"<td >".$value->repDateIssued."</td>";
			echo"<td >".$value->repValidity."</td>";
			echo"<td >".$value->interviewedName."</td>";
			echo"<td >".$value->interviewedPos."</td>";
			echo"<td >".$value->orNum."</td>";
			echo"<td >".$value->orAmount."</td>";
			echo"<td >".$value->orDate."</td>";
			echo"<td >".$value->rsn."</td>";
			echo"</tr>";
			$scrpt= '<script type="text/javascript">';
			$scrpt.= '$(document).ready(function () {';
			$scrpt.= "$('#btninspectID".$value->inspectID."').click(function(){";
			$scrpt.='$.ajax({';
            $scrpt.="url: '<?php echo base_url(); ?>Maine/viewpage/'".$value->inspectID;
            $scrpt.="type: 'POST',";
            $scrpt.="data:{";
            $scrpt.="_date:".$value->inspectID;
            $scrpt.=" },";
            $scrpt.="success: function(data){";
			$scrpt.="alert(data)";
            $scrpt.=    '},';
            $scrpt.="error: function(e){";
            $scrpt.="alert(e);";
            $scrpt.=" }";
            $scrpt.="});";
			//$scrpt.='	alert('.$value->inspectID.');';
			$scrpt.=' });});';
			$scrpt.='</script>';
			echo $scrpt;
        }
		
		
        ?>
		</tbody>
	</table>
	</div>
	</div>
</body>
</html>