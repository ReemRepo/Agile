<?php
session_start();

$owner = $_SESSION["userID"];
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


        <?php include 'header.html'; ?>

        <?php
        // put your code here
        include 'connectionDB.php';
        include 'validation.php';

        if (checkTimeRelease(1, $msg)) {

            $name = $_POST["name"];
            $description = $_POST["description"];
            $type = $_POST["type"];
            $status = "waiting";

            $query = "INSERT INTO `at`(`Name`, `Description`, `Status`, `Type`, `StoryID`, `customerID`) "
                    . "VALUES ('$name','$description','$status','$type','$storyID', $owner ) ";

            if (!$AT = mysqli_query($con, $query))
                exit("Error not added " . mysqli_error($con));
            else
                echo "AT Added";

            $ATID = mysqli_insert_id($con);

            echo '<a href="addAT.php?storyID=<?php echo $storyID; ?>"> <br> Add Another Acceptance Test</a>';
        }
        else {
            echo "$msg <br>";
        }
        ?>







        <?php
        mysqli_close($con);
        ?>
    </body>
</html>
