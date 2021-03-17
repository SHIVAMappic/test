<?php
// Create variable for connection
$dsn 	  = "mysql:host=localhost;dbname=testdb";
$username = "root";
$password = "";
try{
	$conn = new PDO($dsn,$username,$password);  // create pdo class object and connection object 
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  // set all error reporting as exception handling	

	$query = "select * from users order by id desc";
	$result = $conn->prepare($query);
	$result->execute();

	$result->bindColumn('id',$id);
	$result->bindColumn('name',$name);
	$result->bindColumn('email',$email);
	$result->bindColumn('phone',$phone);

	if($result->rowCount()){
		//$data = $result->fetch();  // index and associatve both array
		//$data = $result->fetch(PDO::FETCH_ASSOC);  //  associatve  array
		//$data = $result->fetch(PDO::FETCH_OBJ);  //  Object
		/*echo '<pre>';
		print_r($data);
		echo '</pre>';*/

		while($result->fetch(PDO::FETCH_OBJ)){
			echo $id .'--'. $name .'--' .$email .'--'.$phone ;
			echo '</br>';
		}

		

		
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