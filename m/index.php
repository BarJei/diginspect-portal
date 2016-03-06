<?php
/**
 PHP API for Login, Register, Changepassword, Resetpassword Requests and for Email Notifications.
 **/
 
 if (isset($_POST['tag']) && $_POST['tag'] != '') {
    // Get tag
  $tag = $_POST['tag'];
    // Include Database handler
  require_once 'db_functions.php';
  $db = new DB_Functions();  
    // response Array
  $response = array("tag" => $tag, "success" => 0, "error" => 0);
    // check for tag type
  if ($tag == 'login') {
        // Request type is check Login
    $uname = $_POST['uname'];
    $password = $_POST['password'];

        // check for user
    $user = $db->getUserByUnameAndPassword($uname, $password);
    if ($user != false) {
            // user found
            // echo json with success = 1
      $response["success"] = 1;
      $response["user"]["fname"] = $user["firstname"];
      $response["user"]["lname"] = $user["lastname"];
      $response["user"]["email"] = $user["email"];
      $response["user"]["uname"] = $user["username"];
      $response["user"]["uid"] = $user["unique_id"];
      $response["user"]["created_at"] = $user["created_at"];

      echo json_encode($response);
    } else {
            // user not found
            // echo json with error = 1
      $response["error"] = 1;
      $response["error_msg"] = "Incorrect username or password!";
      echo json_encode($response);
    }
  } 
  else if ($tag == 'chgpass'){
    $email = $_POST['email'];

    $newpassword = $_POST['newpas'];


    $hash = $db->hashSSHA($newpassword);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "DigInspect - RFO Inspection: Change Password Notification";
        $message = "Greetings Inspector!\n\nYour password was successfully changed. Ignore this message if this was done by you, if you did not change your password consider requesting a new one by clicking Forgot Password? from the mobile application login page.\n\nThanks,\nTeam RJ45.";
        $from = "rj45chemistry@gmail.com";
        $headers = "From:" . $from;
        if ($db->isUserExisted($email)) {

         $user = $db->forgotPassword($email, $encrypted_password, $salt);
         if ($user) {
           $response["success"] = 1;
           mail($email,$subject,$message,$headers);
           echo json_encode($response);
         }
         else {
          $response["error"] = 1;
          echo json_encode($response);
        }


            // user is already existed - error response


      } 
      else {

        $response["error"] = 2;
        $response["error_msg"] = "User not exist";
        echo json_encode($response);

      }
    }
    else if ($tag == 'forpass'){
      $forgotpassword = $_POST['forgotpassword'];

      $randomcode = $db->random_string();


      $hash = $db->hashSSHA($randomcode);
        $encrypted_password = $hash["encrypted"]; // encrypted password
        $salt = $hash["salt"];
        $subject = "DigInspect - RFO Inspection: Password Recovery";
        $message = "Greetings Inspector!\n\nYour request for a new password is successfully processed. Your new password is $randomcode . Login with your new password and change it in the user panel.\n\nThanks,\nTeam RJ45.";
        $from = "rj45chemistry@gmail.com";
        $headers = "From:" . $from;
        if ($db->isUserExisted($forgotpassword)) {

         $user = $db->forgotPassword($forgotpassword, $encrypted_password, $salt);
         if ($user) {
           $response["success"] = 1;
           mail($forgotpassword,$subject,$message,$headers);
           echo json_encode($response);
         }
         else {
          $response["error"] = 1;
          echo json_encode($response);
        }


            // user is already existed - error response


      } 
      else {

        $response["error"] = 2;
        $response["error_msg"] = "User not exist";
        echo json_encode($response);

      }

    }
    else if ($tag == 'register') {
        // Request type is Register new user
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $uname = $_POST['uname'];
      $password = $_POST['password'];



        // check if user is already existed
                    // store user
      $user = $db->storeUser($fname, $lname, $email, $uname, $password);
      if ($user) {
                // user stored successfully
        $response["success"] = 1;
        $response["user"]["fname"] = $user["firstname"];
        $response["user"]["lname"] = $user["lastname"];
        $response["user"]["email"] = $user["email"];
        $response["user"]["uname"] = $user["username"];
        $response["user"]["uid"] = $user["unique_id"];
        $response["user"]["created_at"] = $user["created_at"];

        echo json_encode($response);
      } 
      else {
                // user failed to store
        $response["error"] = 1;
        $response["error_msg"] = "JSON error occured in registration";
        echo json_encode($response);

      }
    } 
    else {
     $response["error"] = 3;
     $response["error_msg"] = "JSON ERROR";
     echo json_encode($response);
   }
 } 
 else {
  echo "Hello World!";
}
?>
