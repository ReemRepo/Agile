<?php
session_start();
$_SESSION["atID"]=$_GET['atID'];

$atID=$_GET["atID"];


include 'ConnectionDB.php';

$query = "SELECT * from AT where ID = $atID; ";

if (!$result = mysqli_query($con, $query)) {
    exit("Error in select " . mysqli_error($con));
}

if (!$AT = mysqli_fetch_assoc($result)) {
    exit("Error not retrived " . mysqli_error($con));
}
$manual = "";
$automatic = "";

if ($AT["Type"] == "manual")
    $manual = "checked";
else
    $automatic = "checked";
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


                <br> <h3>Edit AT</h3> <br>

        <form name = "editAT" action = "editATDB.php" method = "POST">
            <label/>Name<br>
            <input type="text" name="name" value="<?php echo $AT["Name"]; ?>" size="30" /> 
            <br><br>
            <label/>Description<br>
            <textarea name="description" rows="5" cols="30"> <?php echo $AT["Description"]; ?>  </textarea>
            <br><br>
            <label/>Type<br>
            <input type="radio" name="type" value="manual" <?php echo $manual; ?> />Manual
             <input type="radio" name="type" value="automatic" <?php echo $automatic; ?>/>Automatic
            <br><br>
            <input type="submit" value="Edit" name="Edit" />
        </form>

    </body>
</html>
