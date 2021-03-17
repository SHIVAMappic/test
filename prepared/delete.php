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
	$sql_query = "delete from users where id = :id";

	

	// prepare statement
	$results = $conn->prepare($sql_query);


	// Bind parameter to prepared statement
	$results->bindParam(":id",$id);



	// variables and values
	$id = 6;
	

	// execute prepared statement
	$results->execute();

	
	echo $results->rowCount() . "Row Deleted";  // affected rows
	unset($results);  // close preapred statement 

}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>