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
	$sql_query = "update users set name = :name,email=:email,phone=:phone where id =:id";

	// prepare statement
	$results = $conn->prepare($sql_query);


	// Bind parameter to prepared statement
	$results->bindParam(":name",$name);
	$results->bindParam(":email",$email);
	$results->bindParam(":phone",$phone);
	$results->bindParam(":id",$id);

	/*
	// if we use ? placeholder
	$results->bindParam($name);
	$results->bindParam($email);
	$results->bindParam($phone);
	
	*/

	// variables and values
	$name = "Reena Singh ";
	$email = "krishansri@gmail.com";
	$phone = 90876765432;
	$id = 3;

	// execute prepared statement
	$results->execute();
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