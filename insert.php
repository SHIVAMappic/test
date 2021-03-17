<?php
// Create variables for database connection or we can say connection variables
$dsn = "mysql:host=localhost;dbname=testdb"; // you can also write $servername
$username = "root";
$password = "";


// Create connection with exception handling
try{
	$conn = new PDO($dsn,$username,$password); // create PDO object 
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // set error reporting as exception handling


	//insert , update , delete , create use same query normal pdo 
	$sql_query = "insert into users (name,email,phone) values('krun dev','krun@gmail.com',8989767654)";

	if($affected_row = $conn->exec($sql_query)){
		echo $conn->lastInsertId();
		echo $affected_row;
	}






}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>