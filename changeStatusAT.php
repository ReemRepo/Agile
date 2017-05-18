<?php
session_start();
$_SESSION["atID"] = $_GET['atID'];
$atID = $_SESSION["atID"];

$storyID = $_SESSION['storyID'];


include 'ConnectionDB.php';

$query = "SELECT * from AT where ID = $atID; ";

//$query = "SELECT * from story,AT where story.ID = $storyID AND AT.ID = $atID; ";

if (!$result = mysqli_query($con, $query)) {
    exit("Error in select " . mysqli_error($con));
}

if (!$row = mysqli_fetch_assoc($result)) {
    exit("Error not retrived " . mysqli_error($con));
}


$manual = "";
$automatic = "";
$type = "";

if ($row["Type"] == "manual") {
    $manual = "checked";
    $type = "Manual";
} else {
    $automatic = "checked";
    $type = "Automatic";
}
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
        $query = "SELECT * from story where ID = $storyID ; ";
        if (!$result = mysqli_query($con, $query)) {
            exit("Error in select " . mysqli_error($con));
        }

        if (!$us = mysqli_fetch_assoc($result)) {
            exit("Error not retrived " . mysqli_error($con));
        }

        //Validate US state
        
       if ($us["State"]=="Complete") {
            $msg = "US has been Completed! You can not change its AT status now.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            echo $msg;
            //header("location: listAT.php?storyID=$storyID");
        } else if ($us["State"] != "Waiting for AT" ) {
            $msg = "US is not ready for AT yet, check later and you will be notified when it is ready.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            echo $msg;
            //header("location: listAT.php?storyID=$storyID");
        }

        //Validate AT status
        if ($row["Status"] == "Complete") {
            $msg = "At is complete, You can not change its status now.";
            echo "<script type='text/javascript'>alert('$msg');</script>";
            echo $msg;

            //header("location: listAT.php?storyID=$storyID");
        }
        ?>
                <br> <h3>Change Status of AT</h3> <br>

        <form name = "editAT" action = "changeStatusATDB.php" method = "POST">

            <h3> Change the Status of the AT to Pass/Fail</h3>
            <input type="radio" name="status" value="Pass" checked="checked" /> Pass
            <input type="radio" name="status" value="Fail"  /> Fail
            <br><br>
            <br>
            <input type="submit" value="Change Satus" name="changeStatus" />
            <br><br>
            <hr>

            <h3> AT Details </h3>

            <label/>Name: <?php echo $row["Name"]; ?> 
            <br><br>
            <label/>Description: <?php echo $row["Description"]; ?>
            <br><br>
            <label/>Type:  <?php echo $type; ?>          
            <br><br>

            <hr>

        </form>

    </body>
</html>
