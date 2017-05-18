<?php
session_start();

$_SESSION["userID"] = 2;
$_SESSION["storyID"]=$_GET['storyID'];


$storyID = $_GET['storyID']; //$storyID=$_GET["storyID"];

include 'ConnectionDB.php';

$query = "SELECT * from story where ID = $storyID; ";

if (!$result = mysqli_query($con, $query)){
    exit("Error in select " . mysqli_error($con)); 
    
}

if (!$story = mysqli_fetch_assoc($result)){
exit("Error not retrived " . mysqli_error($con)); }

  
    
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
        

                <br> <h3>Edit US</h3> <br>

            <form name = "editUS" action = "editUSDB.php" method = "POST">
                <label/>Name<br>
                <input type="text" name="name" value="<?php echo $story["Name"];?>" size="30" /> 
                <br><br>
                <label/>Description<br>
                <textarea name="description" rows="5" cols="30"> <?php echo $story["Description"];?>
                </textarea>
                <br><br>
                <input type="submit" value="Edit" name="Edit" />
            </form>
            
    </body>
</html>
