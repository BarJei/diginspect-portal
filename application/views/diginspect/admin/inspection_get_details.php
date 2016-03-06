<style>
tr
{height:20px;}

.firsttd
{
width:15%;
background:lightblue;
}
.secondtd
{width:40%;}
</style>
 <?php		
foreach($inspectionlist as $key=>$value)
{
	


echo '<div class="modal-header">';
echo anchor("Maine/get_collected_data","<span aria-hidden='true'>&times;</span>",array('class'=>'close'));
echo '<h4 class="modal-title" id="myModalLabel">';
echo 'Inspection Details:'.$value->inspectID.'</h4>';
echo '</div>';
echo '<div class="modal-body">';
echo '<table style="width:100%;">';
echo '<tr>';
echo '<td class="firsttd">Name of Establishment</td>';
echo '<td class="secondtd">'.$value->establishmentName.'</td>';
echo '<td class="firsttd">Plant Office Address</td>';
echo '<td class="secondtd">'.$value->plantofficeAdd.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Warehouse Address</td>';
echo '<td>'.$value->warehouseAdd.'</td>';
echo '<td class="firsttd">Owner</td>';
echo '<td>'.$value->ownerName.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Telephone Number</td>';
echo '<td>'.$value->telNum.'</td>';
echo '<td class="firsttd">Fax Number</td>';
echo '<td>'.$value->faxNum.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Classification</td>';
echo '<td>'.$value->classification.'</td>';
echo '<td class="firsttd">Products</td>';
echo '<td >'.$value->products.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Manner of Notification</td>';
echo '<td>'.$value->notification.'</td>';
echo '<td class="firsttd">Purpose Of Inspection</td>';
echo '<td>'.$value->inspectionPurpose.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Authorized Representative</td>';
echo '<td>'.$value->repName.'</td>';
echo '<td class="firsttd">Positon</td>';
echo '<td>'.$value->repPosition.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Reg. No(PRC-ID)</td>';
echo '<td>'.$value->repRegNum.'</td>';
echo '<td class="firsttd">Date Issued</td>';
echo '<td>'.$value->repDateIssued.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Validity</td>';
echo '<td>'.$value->repValidity.'</td>';
echo '<td class="firsttd">Persons Interviewed</td>';
echo '<td>'.$value->interviewedName.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Position</td>';
echo '<td>'.$value->interviewedPos.'</td>';
echo '<td class="firsttd">License to Operate Number</td>';
echo '<td>'.$value->ltoNum.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Renewal</td>';
echo '<td>'.$value->ltoRenewal.'</td>';
echo '<td class="firsttd">Validity</td>';
echo '<td>'.$value->ltoValidity.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Payment of Appropriate Fee(OR Number)</td>';
echo '<td>'.$value->orNum.'</td>';
echo '<td class="firsttd">Amount of Payment</td>';
echo '<td>'.$value->orAmount.'</td>';
echo '</tr>';
echo '<tr>';
echo '<td class="firsttd">Date of Payment</td>';
echo '<td>'.$value->orDate.'</td>';
echo '<td class="firsttd">RSN</td>';
echo '<td>'.$value->rsn.'</td>';
echo '</tr>';
	
echo '</table>';
}

//echo '<div style="float:right;">'.anchor("","View PDF",array("class"=>"btn btn-success")).'</div>';
?>