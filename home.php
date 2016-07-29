<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Content/bootstrap.min.css">
  <script src="scripts/jquery.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
</head>
<body>

    <div class="navbar-header">

<nav class="navbar navbar-inverse">
  <div class="container-fluid">    
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="index.php">Logo Here</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">About US</a></li> 
        <li><a href="#">Contact Us</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li> <?php   echo  '<a style ="color :lightgrey" href="#">'.$_SESSION["users"].'</a> '; ?></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">


</div>

</body>
</html>

