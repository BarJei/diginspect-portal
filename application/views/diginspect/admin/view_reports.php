<html>

<head>
	<meta charset='UTF-8'>
	<title>Inspection Reports</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'lib.php';?>
	<script src="<?php echo base_url().'assets/js/custom3.js'?>"></script>
	<script src="<?php echo base_url().'assets/jquery-1.2.6.min.js'?>"></script>
	<script src="<?php echo base_url().'assets/style-table.js'?>"></script>
	<link rel="stylesheet" href="<?php echo base_url().'assets/css-table.css'?>">
	<!--[if !IE]><!-->
	<style>
.modal-backdrop
	{
		background:transparent;
	}
	
	th
	
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
		td:nth-of-type(4):before { content: "Observation/ Findings"; }
		td:nth-of-type(5):before { content: "Deficiency Compliance"; 
	
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
		<?php include 'menu.php';?>
	   <div style="width:100%;height:100px;margin-top:1%; text-align:center; background-color:#000;color:#fff; border-top:1px solid #eee;">
		<h1 style="float:left; margin-top:2%; margin-left:3%;">Inspection Reports</h1>
	</div>
    </nav>
	
	<div id="page-wrap" style="margin-top:15%; width:100%">
	<div id="tbldata">
	<div style="width:10%;">
		<?php echo form_hidden(array("id"=>"txtGetID","name"=>"txtGetID","class"=>"form-control"),set_value("txtGetID"));?>
		<!--input id="txtGetID" value="" type="text"-->
		<input type="date" id="dtpDate" name="dtpDate" value="<?php 
		
		date_default_timezone_set("Asia/Manila"); 		
		echo date_default_timezone_get(); 
		
		?>">
		<script type="text/javascript">
			$('#dtpDate').change(function(){
            $.ajax({
                url: '<?php echo base_url(); ?>Maine/sortbydate',
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
		<?php
		echo $this->input->get_post('_date');
		?>
	</div>

	<div class="box-content">
 	<table class="bootstrap-datatable datatable" style="width:100%;">
		<thead>
		<tr>
			<th>Inspection ID</th>
			<th>Date of Inspection</th>
			<th>Establishment Name</th>
			<th>Directives</th>
			<th>Deficiency Compliance</th>
			<th></th>
		</tr>
		</thead>
		<tbody  id="tbldata">
		<?php
        foreach($inspectionlist as $key=>$value)
        {
        	$dt = explode(" ",$value->syncDate);
			$le_date= str_replace("-","",$dt[0]);
			//$le_time =str_replace(":","",$dt[1]);
			// $le_estname  =str_replace(",","",);
			$strEstName =preg_replace("/\W+/",'-', $value->establishmentName);
			$filename = base_url().'m/uploads/'.$le_date."-".$strEstName.".pdf";

            echo"<tr id='btninspectID$value->inspectID'>";
            echo"<td>".$value->inspectID."</td>";
            echo"<td>".$value->syncDate."</td>";
            echo"<td >".$value->establishmentName."</td>";
			echo"<td >".$value->directive."</td>";
			echo"<td >".$value->deficiencyCompliance."</td>";
			echo"<td>".anchor($filename,"DOWNLOAD REPORT",array("class"=>"btn btn-success"))."</td>";
			echo"</tr>";

			
			$scrpt= '<script type="text/javascript">';
			$scrpt.= '$(document).ready(function () {';
			$scrpt.= "$('#btninspectID".$value->inspectID."').click(function(){";
			$scrpt.="	$('#txtGetID').val(".$value->inspectID.");";
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