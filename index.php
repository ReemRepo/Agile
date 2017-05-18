<?php 
session_start();
//$_SESSION["userID"] = 1;
$_SESSION["storyID"] = 1;
$storyID = $_SESSION["storyID"];

?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Managing Customer Involvement in Globally Distributed Agile Projects old</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/menu.css">
    
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/function.js"></script>

</head>
    <body>
        
        <div w3-include-html="header.html">

            <?php  include 'header.html';   ?>
         
            <h1>Welcome <?php echo $_SESSION["userName"] ?></h1>
        <!--
        <a href = "listUS.php">listUS</a> <br>
        <a href = "listAT.php">listAT</a> <br>

        <a href = "addUS.php">addUS</a> <br>
        <a href = "editUS.php">editUS</a> <br>

        <a href = "addAT.php">addAT</a> <br>
        <a href = "editAT.php">editAT</a> <br>
        -->
        <br>
        


        
        
            
            </div>
    </body>
</html>
