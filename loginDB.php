<?php

session_start();
$username=$_POST['username'];
$password=$_POST['password'];


if($username&&$password)
{

    include 'ConnectionDB.php';

$query=mysqli_query($con,"SELECT * FROM customer WHERE ID=$username");
 $row = mysqli_fetch_assoc( $query );
$numrows=mysqli_num_rows($query);
//echo $numrows;

// check if user exsists in the database 
if($numrows!=0)
{
    	$_SESSION['userID']=$row['ID'];
        $_SESSION['userName'] = $row['Name'];
        
        

	echo "you are in !! click <a href='logout.php'>here<a> logout";
	header("location: index.php");

		   
}

else
die("Incorrect username or password!");
}
else 
die ("please enter a username and a password!");

?>