<?php include_once("dbConnector.php"); ?>

<?php
	
	$title = mysqli_real_escape_string($connection,$_POST["title"]);
	$summary = mysqli_real_escape_string($connection,$_POST["summary"]);
	$price = $_POST["price"];
	$details = mysqli_real_escape_string($connection,$_POST["details"]);
	
	$InsertPackage = "INSERT INTO packages (title,summary,price,details) VALUES ('{$title}','{$summary}',{$price},'{$details}')";
	$ResultPackage = mysqli_query($connection,$InsertPackage);
	
	if($ResultPackage) {
		echo "success";	
	} else {
		echo "failed";	
	}
	
?>