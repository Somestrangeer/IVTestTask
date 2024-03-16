<?php  

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['comment'])){

	$connection = new mysqli("localhost", "root", "", "sys");

	if($connection->connection_error){
		die("Connection failed: ". $connection->connection_error);
	}

	$comment = $_POST['comment'];
	if($comment === ""){
		header("Location: index.php");
	}
	$query = "INSERT INTO comments (comment) VALUES ('$comment')";

	if($connection->query($query) === TRUE){
		header("Location: index.php");
	} else{
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$connection->close();
}

?>