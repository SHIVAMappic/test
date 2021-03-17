<?php
// Create variables for database connection or we can say connection variables
$dsn = "mysql:host=localhost;dbname=testdb"; // you can also write $servername
$username = "root";
$password = "";


// Create connection with exception handling
try{
	$conn = new PDO($dsn,$username,$password); // create PDO object 
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // set error reporting as exception handling
	
	$sql_query = "select * from users";

	$results = $conn->query($sql_query);

	if($results->rowCount()>0){
		/*while($row = $results->fetch(PDO::FETCH_OBJ)){ // PDO::FETCH_ASSOC 
			echo '<pre>';
			print_r($row);
			echo '</pre>';
		}*/

		foreach($results->fetchALL(PDO::FETCH_OBJ) as $row){
			echo '<pre>';
			print_r($row);
			echo '</pre>';
		}
	}


}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>