<?php
session_start();
$owner = $_SESSION["userID"];

$atID = $_SESSION["atID"];


$name = $_POST["name"];
$description = $_POST["description"];
$type = $_POST["type"];
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

        <?php
        include 'connectionDB.php';



        $query = "UPDATE `AT` SET `Name` = '$name', `Description` = '$description', `Type` = '$type' "
                . "WHERE `ID` = '$atID' ;";
        if ($AT = mysqli_query($con, $query))
            echo "AT updated";
        else
            exit("Error not updated " . mysqli_error($con));


        mysqli_close($con);
        ?>
    </body>
</html>
