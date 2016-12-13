<?php

// function encrypts user given password using blowfish alogrithm.
function hashing($par1)
{
return crypt($par1,'$2a$abcdefghijklmnopqurst$');
}

//  function to enter value into  database.
function register($f_name,$l_name,$email,$phnumber,$hashpass)
{
return " Insert Into customer(First_name,Last_name,Email,Phone_Number,cust_password) values('$f_name','$l_name','$email','$phnumber','$hashpass');";
}

//function to verify if the user exists in the table
function verify($email,$conn)
{
$sql1= "select cust_id from customer
where
Email ='$email'";

$result= $conn->query($sql1);
if($result->num_rows>0)
{
	echo 'user exists';
}
}
// Function to see wether given data exists in the database and the passoword match to grant login rights.
function search($sql2,$conn,$password)
{
 $hash=$password;

 $result_search = $conn->query($sql2);


 if($result_search->num_rows>0)
 {

 while($row = $result_search->fetch_assoc())// this statement gets the hashed passoword from database
 {
  $dbpass=$row['cust_password'];

  echo $dbpass;
 }

               if(strcmp($dbpass,$hash)!==0)
                {
					echo '<script language="javascript">';
                    echo 'alert("Wrong User Name or Password")';
                    echo '</script>';
					return null;
					}
				    else 
				    echo "password valid!";
					 unset($_SESSION["cart_item"]);
			        return 1;

					


	  }
	         else echo '<script language="javascript">';
                  echo 'alert("Wrong User name or password")';
                  echo '</script>';
				  return null;

  }






?>
