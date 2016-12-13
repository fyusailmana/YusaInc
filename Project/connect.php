<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mydb";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$inquiry=$_GET['inquiry'];


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$sql= "Insert Into inquiry values('$inquiry')";
echo $sql;

if(mysqli_query($conn,$sql))
{	echo "success";
	 
}
 else 
	echo mysqli_error($conn);
$conn-> close();



?>