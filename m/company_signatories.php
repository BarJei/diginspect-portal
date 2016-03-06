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

    if (empty($_POST['syncDate']) || empty($_POST['establishmentName']) || empty($_POST['officer1']) || empty($_POST['officer2']) || empty($_POST['repName1']) || empty($_POST['repName2']) || empty($_POST['dateStarted']) || empty($_POST['dateFinished']) ) {

        $response["success"] = 0;
        $response["message"] = "Required field(s) is missing";

        echo(json_encode($response));

    } else {

        $query = "INSERT INTO companysignatories ( syncDate, establishmentName, officer1, officer2, repName1, repName2, dateStarted, dateFinished) VALUES ( :syncDate, :establishmentName, :officer1, :officer2, :repName1, :repName2, :dateS, :dateF) ";

        $query_params = array(
            ':syncDate' => $_POST['syncDate'],
            ':establishmentName' => $_POST['establishmentName'],
            ':officer1' => $_POST['officer1'],
            ':officer2' => $_POST['officer2'],
            ':repName1' => $_POST['repName1'],
            ':repName2' => $_POST['repName2'],
            ':dateS' => $_POST['dateStarted'],
            ':dateF' => $_POST['dateFinished']
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
