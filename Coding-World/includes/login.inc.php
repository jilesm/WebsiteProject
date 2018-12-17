<?php
// Here we check whether the user got to this page by clicking the proper login button.
if (isset($_POST['login-submit'])) {

  // We include the connection script so we can use it later.
  // We don't have to close the MySQLi connection since it is done automatically, but it is a good habit to do so anyways since this will immediately return resources to PHP and MySQL, which can improve performance.
  require 'dbh.inc.php';

  //Retrieve the input and place it in a variable
  $mailuid = $_POST['mailuid'];
  $password = $_POST['pwd'];

  //Error Handling
  if (empty($mailuid) || empty($password)) {
    header("Location: ../login.php?error=emptyfields&mailuid=".$mailuid);
    exit();
  }
  else {
    //Connect to the database with prepared statements
    $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
    // Initialize a new statement
    $stmt = mysqli_stmt_init($conn);
    //Prepare statement and check for errors
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        // If there is an error we send the user back to the signup page.
        header("Location: ../login.php?error=sqlerror");
        exit();
  }
  else{
      //Bind Paramenters 
      mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
      // Execute the prepared statement 
      mysqli_stmt_execute($stmt);
      // Result
      $result = mysqli_stmt_get_result($stmt);
      //Then store the result
      if ($row = mysqli_fetch_assoc($result)) {
        // Then we match the password from the database with the password the user submitted. The result is returned as a boolean.
        $pwdCheck = password_verify($password, $row['pwdUsers']);
        // Passwords don't match error message
        if ($pwdCheck == false) {
            // If there is an error we send the user back to the signup page.
            header("Location: ../login.php?error=wrongpwd");
            exit();
          }
          //Passwords match
          else if ($pwdCheck == true) {
              //Store the session variable
              session_start();
              $_SESSION['id'] = $row['idUsers'];
              $_SESSION['uid'] = $row['uidUsers'];
              $_SESSION['email'] = $row['emailUsers'];
            //   Take the user to the home page
            header("Location: ../index.php");
            exit();
          }
        }
        else{
            header("Location: ../index.php?login=wronguidpwd");
            exit();
        }
    }
}
// Close statements
mysqli_stmt_close($stmt);
mysqli_close($conn);
}
else {
     // If the user tries to access this page an inproper way, we send them back to the signup page.
  header("Location: ../signup.php");
  exit();
}



