<?php 
session_start();
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


        <?php include 'header.html'; ?>

        <br> <h3>Add US</h3> <br>
            <form name = "addUS" action = "addUSDB.php" method = "POST">
                <label/>Name<br>
                <input type="text" name="name" value="" size="30" /> 
                <br><br>
                <label/>Description<br>
                <textarea name="description" rows="5" cols="30"></textarea>
                <br><br>
               
                <input type="submit" value="Add" name="Add" />
            </form>
           
    </body>
</html>
