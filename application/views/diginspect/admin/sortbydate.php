<?php

echo "<table class='bootstrap-datatable datatable' style='width:100%;'>";
echo "		<thead>";
echo "		<tr>";
echo "			<th>Inspection ID</th>";
echo "			<th>Date of Inspection</th>";
echo "			<th>Establishment Name</th>";
echo "			<th>Directives</th>";
echo "			<th>Deficiency Compliance</th>";
echo "		</tr>";
echo "		</thead>";
echo "		<tbody>";
		
        foreach($datelist as $key=>$value)
        {
        	$dt = explode(" ",$value->syncDate);
			$le_date= str_replace("-","",$dt[0]);
			//$le_time =str_replace(":","",$dt[1]);
			$le_estname  =str_replace(",","",$value->establishmentName);
			$le_strname =preg_replace("/[^\w]/",'-',$le_estname);
			$filename = base_url().'m/uploads/'.$le_date."-".$le_strname.".pdf";
			
            echo"<tr id='btninspectID$value->inspectID'>";
            echo"<td>".anchor($filename, $value->inspectID, array('target'=>'_blank'))."</td>";
            echo"<td>".anchor('Maine/viewpage/'.$value->inspectID,"$value->syncDate",array('data-toggle'=>'modal','data-target'=>'#myModal'))."</td>";
            echo"<td >"$value->establishmentName"</td>";
			echo"<td >"$value->directive"</td>";
			echo"<td >"$value->deficiencyCompliance"</td>";
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