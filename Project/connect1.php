<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mydb";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
$f_name=$_GET['firstname'];
$l_name=$_GET['lastname'];
$email=$_GET['email'];
$phnumber=$_GET['number'];
$password1=$_GET['password'];
$password2=$_GET['password1'];
// Check connection
 
global $conn;

include 'functionfiles.php';
if(isset($f_name)&& isset($l_name)&& isset($email) && isset($password1) && isset($password2))
{
{
	if ($conn->connect_error) {
		
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

// program to verify if a given email already exists in the database
// if user exist program will skip user registration and error will appear
$sql2= "select cust_id from customer
where
Email ='$email'";

$result= $conn->query($sql2);
if($result->num_rows>0)
{
	echo 'user exists';
}
else{

// condition to verify if both password entries done by user match each other


if(strcmp($password1,$password2)==0)
{
$hashpass =hashing($password1);

$sql= register($f_name,$l_name,$email,$phnumber,$hashpass);


	}
}
}
	 
if(mysqli_query($conn,$sql))
{	echo "success";
	 
}
}
 else 
	 echo mysqli_error

?>