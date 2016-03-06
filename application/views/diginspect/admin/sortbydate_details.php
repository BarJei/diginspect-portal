<?php

echo "<table class='bootstrap-datatable datatable' style='width:100%;'>";
echo "		<thead>";
echo "		<tr>";
echo "<th>Inspection ID</th>";
echo "<th>Date of Inspection</th>";
echo "<th>Establishment Name</th>";
echo "<th>Plant Office Address</th>";
echo "			<th>Plant Office GPS</th>";
echo "			<th>WareHouse Address</th>";
echo "			<th>Warehouse GPS</th>";
echo "	<th>Owner Name</th>";
echo "<th>Telephone Number</th>";
echo "		<th>Fax Number</th>";
echo "		<th>Classification</th>";
echo "			<th>Products</th>";
echo "			<th>Notification</th>";
echo "		<th>Purpose of Inspection</th>";
echo "		<th>License to Operate Number</th>";
echo "			<th>Renewal</th>";
echo "			<th>Validity</th>";
echo "			<th>Representative Name</th>";
echo "			<th>Representative Position</th>";
echo "			<th>Registration Number</th>";
echo "			<th>Date Issued</th>";
echo "			<th>Validity</th>";
echo "			<th>Person's Interviewed</th>";
echo "			<th>Position</th>";
echo "			<th>OR Number</th>";
echo "			<th>Amount of Payment</th>";
echo "			<th>Date of Payment</th>";
echo "			<th>RSN</th>";
echo "		</tr>";
echo "		</thead>";
echo "		<tbody>";
		
        foreach($datelist as $key=>$value)
        {
			
            echo"<tr id='btninspectID$value->inspectID'>";
            echo"<td>".anchor('../mobile/'.$value->inspectID.'-'.$value->establishmentName.'.pdf',"$value->inspectID",array('target'=>'_blank'))."</td>";
            //echo"<td>".$value->inspectID."</td>";
            echo"<td >".$value->syncDate."</td></a>";
            echo"<td >".$value->establishmentName."</td>";
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
			$scrpt.="	$('#txtGetID').val(".$value->inspectID.");";
			//$scrpt.='	alert('.$value->inspectID.');';
			$scrpt.=' });});';
			$scrpt.='</script>';
			//echo $scrpt;
        }
		
		
        
echo "		</tbody>";
echo "	</table>";
	
	?>