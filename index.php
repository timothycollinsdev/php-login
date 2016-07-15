<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
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
        <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="index.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container">
          
           <div class="row" style="padding-top :-20px;">
             
               <div class="col-xl-8" style="padding-top :8% ; padding-left:20%; padding-right:20%;">
               <?php 
                   if(isset($_POST["btn"]) =="Login" ){
                $username = $_POST["user"];
                $password = $_POST["pass"];
                   }
                   ?>
                   <form method="post">
                   <h1 >Enter Your Credentials</h1><br>
                   <input class="form-control" type="text" name="user" placeholder="Username" value="<?php  if(isset($_POST["user"])) echo $username; ?>" /> 
                   <br>
                    <input class="form-control" type="password" name="pass" placeholder="password"  />  
                      <br>
        <?php
            if(isset($_POST["btn"]) =="Login" ){
               
                    $_SESSION["users"] = $username;
                 if(isset($_SESSION["users"])){
                       $gg =  $_SESSION["users"];
                   }
                if($username == "" || $password =="" ){
                    echo'<div class="alert alert-warning fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning!</strong> Empty Fields!.
</div>';
                }else{
            $con =     mysql_connect("localhost" , "root" , "")or die("Unable to connect to database ");
               
              $db =  mysql_select_db("website" , $con) or die("Unable to select database");
                
                
                $query = " select id from users where uname = '".$username."' and upass = '".$password."' ;";
               
                $qcheck = mysql_query($query);
                     $r =  mysql_num_rows($qcheck);
                if($r == 1){
                    header("Location: home.php");
                }else{
                             echo'<div class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Error!</strong> Your Credentials are wrong.
</div>';
         
                }
            }
            }
            if(isset($_POST["btn_su"]) == "sign Up"){
              header("Location: signup.php");
            }          
        ?>
                   
                 <button type="submit" class="btn btn-default" name="btn" >Login</button>
                     <button type="submit" class="btn btn-success" name="btn_su" >sign Up</button> 
             </form>
                </div>
           </div>
            
        </div>
        
</body>
</html>

