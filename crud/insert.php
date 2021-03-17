<?php
// Create variable for connection
$dsn 	  = "mysql:host=localhost;dbname=testdb";
$username = "root";
$password = "";
try{
	$conn = new PDO($dsn,$username,$password);  // create pdo class object and connection object 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set all error reporting as exception handling	

	// named placeholder
	$query = "insert into users (name,email,phone) values(:name,:email,:phone)";

	// Prepared Statement
	$result = $conn->prepare($query);

	/*
	// First method to insert data using  bind param
	// With Bind parameter 
	$result->bindParam(':name',$name); // you can not pass here direct value , always pass with variable
	$result->bindParam(':email',$email);
	$result->bindParam(':phone',$phone);

	// Variables and Values
	$name = "Kartik";
	$email = "kartik@gmail.com";
	$phone = 9876564360;

	// executed prepared statement
	$result->execute();
	*/

	/*
	// Second method to insert data using  bind value
	// With Bind value
	$result->bindValue(':name',"Rohan singh");
	$result->bindValue(':email','rohan@gmail.com');
	$result->bindValue(':phone',9878654321);

	// executed prepared statement
	$result->execute();

	*/

	
	// Third method to insert data without bind value and param
	// executed prepared statement
	$result->execute(array(':name'=>'shivam choyuhan bak','email'=>'shivam1234@gmail.com','phone'=>9087654321));	


	if($result->rowCount()){
		echo "Row Inserted " .$result->rowCount();
		echo '</br>';
		echo "Last insert id :" . $conn->lastInsertId();  // get last insert id
	}

}
catch(PDOException $e){
	echo "Server Not Connected    " . $e->getMessage();  // it is just for developer and programmer
	echo "Server Not Connected " ;  // it is just user and visitors
}

// Close prepare statemnt
unset($result);

// Close connection
$conn = null;
?>