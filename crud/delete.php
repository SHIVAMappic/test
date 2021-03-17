<?php
// Create variable for connection
$dsn 	  = "mysql:host=localhost;dbname=testdb";
$username = "root";
$password = "";
try{
	$conn = new PDO($dsn,$username,$password);  // create pdo class object and connection object 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set all error reporting as exception handling	

	$query = "delete from users where id = :id";
	$result = $conn->prepare($query);

	/*

	// with bind param
	$result->bindParam(':id',$id);
	$id = 41;
	$result->execute();

	// with bind value
	$result->bindValue(':id',45);	
	$result->execute();

	*/
	$id = 42;
	$result->execute(array(':id'=>$id));
	
	


	if($result->rowCount()){
		echo $result->rowCount() ."Row deleted";
	}
}
catch(PDOException $e){
	echo "Server Not Connected    " . $e->getMessage();  // it is just for developer and programmer
	echo "Server Not Connected " ;  // it is just user and visitors
}

$conn =  null;
?>