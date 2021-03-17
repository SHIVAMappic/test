<?php
// Create variables for database connection or we can say connection variables
$dsn = "mysql:host=localhost;dbname=testdb"; // you can also write $servername
$username = "root";
$password = "";


// Create connection with exception handling
try{
	$conn = new PDO($dsn,$username,$password); // create PDO object 
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // set error reporting as exception handling

	/*if($conn){
		echo "Connection succesfully.";
		echo '<pre>';
		print_r($conn); // it is PDO object
		echo '</pre>';
	}*/

	

}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>