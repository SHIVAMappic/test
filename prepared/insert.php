<?php
// Create variables for database connection or we can say connection variables
$dsn = "mysql:host=localhost;dbname=testdb"; // you can also write $servername
$username = "root";
$password = "";


// Create connection with exception handling
try{
	$conn = new PDO($dsn,$username,$password); // create PDO object 
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // set error reporting as exception handling

	// query with name placeholder
	$sql_query = "insert into users (name,email,phone) values(:name,:email,:phone)";

	/*// query with ? placeholder
	$sql_query = "insert into users (name,email,phone) values(?,?,?)";*/

	// prepare statement
	$results = $conn->prepare($sql_query);


	// Bind parameter to prepared statement
	$results->bindParam(":name",$name);
	$results->bindParam(":email",$email);
	$results->bindParam(":phone",$phone);

	/*
	// if we use ? placeholder
	$results->bindParam($name);
	$results->bindParam($email);
	$results->bindParam($phone);
	
	*/

	// variables and values
	$name = "Krisna Srivastav";
	$email = "krishansri@gmail.com";
	$phone = 90876765432;

	// execute prepared statement
	$results->execute();

	echo $conn->lastInsertID();  // get last insert id 	
	echo '</br>';
	echo $results->rowCount() . "Row Inserted";  // affected rows
	unset($results);  // close preapred statement 

}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>