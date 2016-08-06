<html>
    
    <head></head>
    <body>
        
        <form method = "post">
    
    <input type="text"  name="val"> 
    <input type="submit" name ="btn">
    
</form>

<?php

if(isset($_POST["btn"])){
   
   echo mysql_real_escape_string($_POST["val"]);
}
  ?>
        
        
    </body>
</html>

