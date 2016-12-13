<?php
class DBController {
	 $host = "localhost";
	 $user = "root";
	 $password = "";
	 $database = "phppot_examples";

	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}

	function connectDB() {
		$conn = new mysqli($host,$user,$password,$database);
		return $conn;
	}

	function selectDB($conn) {
		mysqli_select_db($this->database,$conn);
	}

	function runQuery($query) {
		$result = mysql_query($query);
		while($row=$result->fetch_assoc($result)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

	function numRows($query) {
		$result  = mysql_query($query);
		$rowcount = mysql_num_rows($result);
		return $rowcount;
	}
}
?>
