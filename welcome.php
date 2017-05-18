<?php
session_start();
?>

<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>Welcome <?php echo $_SESSION['username']; ?></h1> 
      <br>
	  <h3><a href = "logout.php">Sign Out</a></h3>
   </body>
   
</html>



