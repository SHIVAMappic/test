<?php
// Create variable for connection
$dsn 	  = "mysql:host=localhost;dbname=testdb";
$username = "root";
$password = "";
try{
	$conn = new PDO($dsn,$username,$password);  // create pdo class object and connection object 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set all error reporting as exception handling	

	$query = "update users set name = :name,email = :email ,phone = :phone where id = :id";
	$result = $conn->prepare($query);

	$result->bindParam(':name',$name);
	$result->bindParam(':email',$email);
	$result->bindParam(':phone',$phone);
	$result->bindParam(':id',$id);

	$name = "sh";
	$email = "sh@gmail.com";
	$phone = 9191919191;
	$id = 44;

	$result->execute();

	// without bind param
	//$result->execute(array(':name'=>$name,':email'=>$email,':phone'=>$phone,":id"=>$id));


	if($result->rowCount()){
		echo $result->rowCount() ."Row Updated";
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