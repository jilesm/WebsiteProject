<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- <link rel="icon" href="";-->
   <!-- <link rel="stylesheet" href="login.css";-->
    <title>Login</title>
</head>
<body>
    <div class = "container">
            <div class = image-wrap>
            <!-- In the css file make sure to make it responsive with max-width:100% height auto -->
                <!-- <img src = "" id= "login-img" > -->
            </div>
            <div class = "login-form">

            <?php
                echo '<form action="includes/login.inc.php" method = "POST" >
                <input class = "input-login" type ="text" name = "mailuid" value = "" placeholder="Username/Email" required>
                <input class = "input-login" type ="password" name = "pwd" value = "" placeholder="Password" required>
                 <button type = "submit" name ="login-submit" class="login-btn">Login</button>
                 </form>';
            ?>
            </div>
    </div>
</body>
</html>