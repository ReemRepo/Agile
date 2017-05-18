<?php
session_start();
$owner = $_SESSION["userID"];
$_SESSION["storyID"]=1;

            
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        include 'ConnectionDB.php';
        
        $data = array();


        $query = "SELECT * FROM story ;";
        
        $result = mysqli_query($con, $query);
        
        
        while($row = mysqli_fetch_assoc($result))
            {
            foreach($row as $key => $value) {
                echo "$key = $value , ";
                }
            echo "<br>";

            }
            echo "<br><br>";
            
        $query = "SELECT * FROM AT;";
        $result = mysqli_query($con, $query);

        while($row = mysqli_fetch_assoc($result))
            {
            foreach($row as $key => $value) {
                echo "$key = $value , ";
                }
                echo "<br>";
            }
            
        
        ?>
        
        
                <br><br><br>

        <table border="1">
         <caption>LIST OF USER STORIES</caption>
         <!--<tr><th>ID</th><th>First Name</th><th>Second Name</th><th>Address</th><th></th><th></th></tr>-->
         <?php
         
          $query = "SELECT * FROM story where customerID = $owner";
        
        $result = mysqli_query($con, $query);
        
        $cnt=1;
            // fetch each record in result set
            while ( $row = mysqli_fetch_assoc( $result ) )
            {
               // build table to display results
               
               if ($cnt==1) //print header
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
                print( "<td><a href='listAT.php?storyID=$id'>List ATs</a></td>" );



               print( "</tr>" );
               
               $cnt++;
            } 
         ?>      
      </table>
        
        
        <br><br><br>
        
        
        
    </body>
</html>
