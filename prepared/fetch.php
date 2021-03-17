<?php
// Create variables for database connection or we can say connection variables
$dsn = "mysql:host=localhost;dbname=testdb"; // you can also write $servername
$username = "root";
$password = "";


// Create connection with exception handling
try{
	$conn = new PDO($dsn,$username,$password); // create PDO object 
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  // set error reporting as exception handling

	$sql_query = "select * from users ";


	//$sql_query = "select * from users  where id = :id ";

	$results = $conn->prepare($sql_query);

	/*$results->bindParam(':id',$id);
	$id = 3;*/

	$results->execute();

	$results->bindColumn('id',$id);
	$results->bindColumn('name',$name);
	$results->bindColumn('email',$email);
	$results->bindColumn('phone',$phone);

	if($results->rowCount()>0){
		/*while($row = $results->fetch(PDO::FETCH_OBJ)){
			echo '<pre>';
			print_r($row);
			echo '</br>';
		}*/

		while($results->fetch(PDO::FETCH_OBJ)){
			echo $id ;
			echo $name;
			echo '</br>';

		}

		/*foreach($results->fetchALL(PDO::FETCH_OBJ) as $row){
			echo '<pre>';
			print_r($row);
			echo '</br>';
		}*/
	}
	
	

}
catch(PDOException $e){
	echo "Server Connection Failed". $e->getMessage();  // it is for debugging purpose for programmer	
	//die("Server Connection Failed"); // it is for user 
}

// close connection
$conn = null;
?>


<?php 
Difference between bindParam() and bindValue():

bindParam(): 
The bindParam() function binds a parameter to named or question mark placeholder in SQL statement.
The bindParam () function is used to pass variable not value.
bindValue(): 
The bindValue() function binds a value to named or question mark in SQL statement.
The bindValue() function is used to pass both value and variable.