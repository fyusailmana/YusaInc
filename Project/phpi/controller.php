<?php
class controller{
public $servername = "localhost";
public $username = "root";
public $password = "";
public $dbname="mydb";
public $conn;


function __construct() {
  
  $this->conn = $this->connectDB();
  if(!empty($conn)) {
    $this->selectDB($this->conn);
  }
}

function connectDB() {
  $conn = new mysqli($this->servername,$this->username,$this->password,$this->dbname);
  return $conn;

}

function selectDB($conn) {
  mysqli_select_db($conn,$this->dbname);
}

function runQuery($query) {

  $result = mysqli_query($this->conn,$query);
  while($row=$result->fetch_assoc()) {
    $resultset[] = $row;
  }
  if(!empty($resultset))
    return $resultset;
}
}
?>
