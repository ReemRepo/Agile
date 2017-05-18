<?php
session_start();
$owner = $_SESSION["userID"];
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
        include 'validation.php';
        $msg = '';

        if (!checkAuthority(1, $owner)) {
            echo "You are not autherized to add US on this release  <br>";
        } else {
            if (checkTimeRelease(1, $msg)) {
                //$owner = 1;
                $name = $_POST["name"];
                $description = $_POST["description"];

                $state = "Waiting for Confirmatation";

                $query = "INSERT INTO `story`( `Name`, `Description`, `ActualStart`, `ActualComplete`, `PlannedStart`, `PlannedComplete`, `State`, `CustomerID`, `DeveloperID`, `IterationID`) "
                        . "VALUES ('$name','$description',NULL,NULL,NULL,NULL,'$state','$owner',1,1) ";
                if (!$story = mysqli_query($con, $query))
                    exit("Error not added " . mysqli_error($con));
                

                $storyID = mysqli_insert_id($con);

                $_SESSION["storyID"] = $storyID;


                mysqli_close($con);

                echo "User Story Added Successfully. Awaiting for PO confirmation. <br> ";
                
                notifyPM(1,"US added","$owner has added a new User Story. Awaiting for your confirmation.");


                echo "<a href='addAT.php?storyID=$storyID'>Add Acceptance Test</a>";
            }

            else {
                echo "$msg <br>";
            }
        }
        ?>




    </body>
</html>
