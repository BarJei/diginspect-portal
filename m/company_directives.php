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

 if (empty($_POST['syncDate']) || empty($_POST['establishmentName']) || empty($_POST['observation']) || empty($_POST['directive']) || empty($_POST['deficiencyCompliance'])) {

  $response["success"] = 0;
  $response["message"] = "Required field(s) is missing";

  echo(json_encode($response));

} else {

  $query = "INSERT INTO companydirectives ( syncDate, establishmentName, observation, directive, deficiencyCompliance) VALUES ( :syncDate, :establishmentName, :observation, :directive, :deficiencyCompliance) ";

  $query_params = array(
    ':syncDate' => $_POST['syncDate'],
    ':establishmentName' => $_POST['establishmentName'],
    ':observation' => $_POST['observation'],
    ':directive' => $_POST['directive'],
    ':deficiencyCompliance' => $_POST['deficiencyCompliance']
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
