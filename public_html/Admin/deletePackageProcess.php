<?php include_once("dbConnector.php"); ?>

<?php
	//echo $_GET['packageId'];
	$DeletePackage = "DELETE FROM packages WHERE id={$_GET['packageId']}";
	$ResultPackage = mysqli_query($connection,$DeletePackage);
	
	if($ResultPackage) {
		echo "success";
	} else {
		echo "failed";	
	}
?>