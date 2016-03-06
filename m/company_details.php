<?php
/*
Our "config.inc.php" file connects to database every time we include or require
it within a php script.  Since we want this script to add a new user to our db,
we will be talking with our database, and therefore,
let's require the connection to happen:
*/
require("config.inc.php");

//if posted data is not empty
if (!empty($_POST)) {

	if (empty($_POST['syncDate']) || empty($_POST['establishmentName']) || empty($_POST['plantofficeAdd']) || empty($_POST['plantofficeGPS']) || empty($_POST['warehouseAdd']) || empty($_POST['warehouseGPS']) || empty($_POST['ownerName']) || empty($_POST['telNum']) || empty($_POST['faxNum']) || empty($_POST['classification']) || empty($_POST['products']) || empty($_POST['notif']) || empty($_POST['inspect']) || empty($_POST['ltoNum']) || empty($_POST['ltoRenewal']) || empty($_POST['ltoValidity']) || empty($_POST['pharmacistName']) || empty($_POST['position']) || empty($_POST['prcID']) || empty($_POST['dateIssued']) || empty($_POST['validity']) || empty($_POST['personName']) || empty($_POST['personPos']) || empty($_POST['orNum']) || empty($_POST['orAmount']) || empty($_POST['orDate']) || empty($_POST['rsn']) ) {

		$response["success"] = 0;
		$response["message"] = "Required field(s) is missing";

		echo(json_encode($response));
		
	} else {

		$query = "INSERT INTO companydetails ( syncDate, establishmentName, plantofficeAdd, plantofficeGPS, warehouseAdd, warehouseGPS, ownerName, telNum, faxNum, classification, products, notification, inspectionPurpose, ltoNum, ltoRenewal, ltoValidity, repName, repPosition, repRegNum, repDateIssued, repValidity, interviewedName, interviewedPos, orNum, orAmount, orDate, rsn ) VALUES ( :syncDate, :establishmentName, :plantofficeAdd, :plantofficeGPS, :warehouseAdd, :warehouseGPS, :ownerName, :telNum, :faxNum, :classification, :products, :notif, :inspect, :ltoNum, :ltoRenewal, :ltoValidity, :repName, :repPosition, :repRegNum, :repDateIssued, :repValidity, :interviewedName, :interviewedPos, :orNum, :orAmount, :orDate, :rsn ) ";

		$query_params = array(
			':syncDate' => $_POST['syncDate'],
			':establishmentName' => $_POST['establishmentName'],
			':plantofficeAdd' => $_POST['plantofficeAdd'],
			':plantofficeGPS' => $_POST['plantofficeGPS'],
			':warehouseAdd' => $_POST['warehouseAdd'],
			':warehouseGPS' => $_POST['warehouseGPS'],
			':ownerName' => $_POST['ownerName'],
			':telNum' => $_POST['telNum'],
			':faxNum' => $_POST['faxNum'],
			':classification' => $_POST['classification'],
			':products' => $_POST['products'],
			':notif' => $_POST['notif'],
			':inspect' => $_POST['inspect'],
			':ltoNum' => $_POST['ltoNum'],
			':ltoRenewal' => $_POST['ltoRenewal'],
			':ltoValidity' => $_POST['ltoValidity'],
			':repName' => $_POST['pharmacistName'],
			':repPosition' => $_POST['position'],
			':repRegNum' => $_POST['prcID'],
			':repDateIssued' => $_POST['dateIssued'],
			':repValidity' => $_POST['validity'],
			':interviewedName' => $_POST['personName'],
			':interviewedPos' => $_POST['personPos'],
			':orNum' => $_POST['orNum'],
			':orAmount' => $_POST['orAmount'],
			':orDate' => $_POST['orDate'],
			':rsn' => $_POST['rsn']
			);

try {
	$stmt   = $db->prepare($query);
	$result = $stmt->execute($query_params);
}
catch (PDOException $ex) {

	$response["success"] = 0;
	$response["message"] = "Database Error. Please Try Again!";
	echo(json_encode($response));
}

$response["success"] = 1;
$response["message"] = "Success";
echo json_encode($response);
}

} else {

	$response["success"] = 0;
	$response["message"] = "Required field(s) is missing";
	
	echo json_encode($response);
	
}
?>
