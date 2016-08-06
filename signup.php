<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="Content/bootstrap.min.css">
  <script src="scripts/jquery-1.9.1.min.js"></script>
  <script src="scripts/bootstrap.min.js"></script>
 <link rel="stylesheet" href="Content/bootstrap-theme.min.css">
  
</head>
<body>
            <!-- Top nav bar    -->
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
        <li><a href="#">About Us</a></li>
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
              
               <div class="col-xl-8" style="padding-top :4% ; padding-left:20%; padding-right:20%;">
                   <h1 style ="padding-top = -150px;">Registration Form</h1>
                   <form method="post">
                    <?php 
                   //database connection
                    $con = mysql_connect("localhost" , "root" , "") or die("Unable to connect to database");
                      $db = mysql_select_db("website" , $con)or die("Unable to select database");
                      $u = false;  // username
                      $p = false;   // pssword
                      $em =  false; // empty
                      $m =  false;     // e-mail
                      if(isset($_POST["btn_su"]) == "sign Up" ){
                        $uname =  $_POST["username"];
                        $pass1 = $_POST["password1"];
                        $pass2= $_POST["password2"];
                        $mail =  $_POST["mail"];
                          mysql_real_escape_string($uname);
                          mysql_real_escape_string($pass1);
                          mysql_real_escape_string($pass2);
                          // username check
                         $eu =  mysql_query("select id from users where uname = '".mysql_real_escape_string($uname)."'; ");
                        $check = mysql_num_rows($eu);
                        if($check == 1){
                            $u= true;
                        }
                          
                          // email check 
                          
                           $emm =  mysql_query("select id from users where email = '".mysql_real_escape_string($mail)."'; ");
                        $check_email = mysql_num_rows($emm);
                        if($check_email == 1){
                            $m= true;
                        }
                           $cc = strcmp($pass1 , $pass2);
                          if($cc != 0){
                              $p = true;
                          }
                           if(@$uname == "" || @$pass1 == "" || @$pass2 == "" || @$mail == ""){
                               $em =  true;
                           }
                          
                      }
                     ?> 
                          <!-- Username box   --> 
                       <input type="text" class="form-control" value ="<?php  if(isset($_POST["username"])){ echo @$uname;}?>" name="username" placeholder="Username" style ="padding-bottom: 12px;">
                      </br>
                      <?php 
                         if($u ==  true){
                            echo '<div style="padding-top :10px;" class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning!</strong> User already  exist!.</br>
</div> ';
                         }
                      ?>
                      
                   <!-- email box -->
                   
                    <input type="text" class="form-control" value ="<?php  if(isset($_POST["mail"])){ echo @$mail;}?>" name="mail" placeholder="Email" style ="padding-bottom: 12px;">
                      </br>
                      <?php 
                         if($m ==  true){
                            echo '<div style="padding-top :10px;" class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning!</strong>Email already  exist!.</br>
</div> ';
                         }
                      ?>
                     
                   
                     <!-- Password  boxes --> 
                      <input type="password" class="form-control" name="password1" placeholder="Password">
                      <br>
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password">
                      <br>
                      <?php
                      
                       
                      if($p == true){
                                    echo '<div style="padding-top :10px;" class="alert alert-danger fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning!</strong> Password did not match!.</br>
</div> ';
                      }
                  if($em == true){
                            echo ' <div style="padding-top :10px; " class="alert alert-warning fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Warning!</strong> Fill in All fields!.
</div>';  
                          }
                     if(isset($_POST["btn_su"]) == "sign Up" ){
                  if($p == false && $u == false && $em == false && $m == false){
                     $cq =   @mysql_query("insert into users(id , uname , upass, email) values ('' ,'".mysql_real_escape_string($uname)."' ,'".mysql_real_escape_string($pass1)."' , '".mysql_real_escape_string($mail)."'  )");
                      if($cq){
                           echo '<div style="padding-top :10px;" class="alert alert-success fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
    <strong>Congratulations!</strong> You have successfuly registered yourself!.
</div>';  
                      }
                      
                   }}
                      ?>
                  <button type="submit" class="btn btn-success" name="btn_su" >sign Up</button>
             </form>
                </div>
           </div>
        </div>
        
</body>
</html>

