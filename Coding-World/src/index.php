<?php
session_start();
//require("src/auth.php");


?>
<!DOCTYPE html> 
<html>
<head>
  <!-- <link href="" rel="stylesheet"> -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
   <link rel="stylesheet" href="../css/home.css">
   

  <!-- <link href="sticky-footer.css" rel="stylesheet">-->
  <title>Technology</title>
</head>

<body>
<section class = "grid">
  <!-- Banner for Image -->
  <header class ="title"><p>This is the title</p></header>
  <!-- Nav Bar -->
  <header class ="header"><?php
require("menu.php");
  ?></header>
  <!-- Side bar still deciding if I actually want this -->
  <aside class ="aside"><p>This is the side content</p></aside>
  <!-- Main content where the two main descriptions will go -->
  <main class ="main">
  <img class = "computer" src ="../images/computer.jpeg" alt="Computer" height ="300" width="500">
  <div class = "content">
  <p>This is the main content</p>
  </div>
  
  
  
  </main>
  <!-- Footer Stuff -->
  <footer class ="footer"><?php
require("footer.php"); 
  ?></footer>
</section>

<script>
var coll = document.getElementByClassName("computer");
var i;

for (1 = 0; i < coll.length; i++) {
  coll[i].addEventListener("click" function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    }
  })
}
</script>
</body>
</html>
