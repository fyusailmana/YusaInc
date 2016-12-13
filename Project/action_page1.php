<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="mydb";

$conn = new mysqli($servername, $username, $password,$dbname);
$email=$_POST['email'];
$password11=$_POST['password'];
 echo $password11;


include 'functionfiles.php';

    $haspass= hashing($password11); // hash the password entered to match it with the password in the database
  echo $haspass;
	if ($conn->connect_error) {

    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$sql= "select cust_password from customer
where
Email ='$email'";
$sqla="select First_Name from customer
where
Email ='$email'";


//this functions sets the name of the customer to the session variable to be diplayed on the shopping cart.
if(mysqli_query($conn,$sqla))
{	
$result_search1 = $conn->query($sqla);
 
 if($result_search1->num_rows>0)
 {
	 
 while($row = $result_search1->fetch_assoc())
 {
 $_SESSION['currentuser']= $row['First_Name'];
  
 }
}
}

if(search($sql,$conn,$haspass)!=null)
{

	header("Location: ./phpi/index.php");
	exit;

}

//echo $_SESSION['currentuser'];

?>
