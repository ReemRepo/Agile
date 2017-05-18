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

        <div w3-include-html="header.html">

            <?php include 'header.html'; ?>
        <?php
        
        include 'ConnectionDB.php';
       
        
        ?>
        
        
                <br><br><br>

        <table border="1">
         <caption>LIST OF USER STORIES</caption>
         <?php
         
          $query = "SELECT * FROM story where customerID = $owner";
        
        $result = mysqli_query($con, $query);
        
         $header = true;
            // fetch each record in result set
            while ( $row = mysqli_fetch_assoc( $result ) )
            {
               // build table to display results
               
               if ($header) //print header
               {
                   print( "<tr>" );
                   foreach ( $row as $key => $value )
                       print( "<th>$key</th>" );
                   print( "<tr>" );
                   
               }
               
               print( "<tr>" );
			   
               foreach ( $row as $key => $value )
                   print( "<td>$value</td>" );
                   
                $id=$row['ID'];

                print( "<td><a href='editUS.php?storyID=$id'>Edit</a></td>" );
                print( "<td><a href='deleteUS.php?storyID=$id'>Delete</a></td>" );
                print( "<td><a href='addAT.php?storyID=$id'>Add AT</a></td>" );
                print( "<td><a href='listAT.php?storyID=$id'>List ATs</a></td>" );




               print( "</tr>" );
               
               $header = false;
            } 
         ?>      
      </table>
        
        
        <br><br><br>
        
        
        
    </body>
</html>
