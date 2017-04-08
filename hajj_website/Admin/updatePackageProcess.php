<?php include_once("dbConnector.php"); ?>

<?php
	//echo $_POST["uTitle"] . "\n" . $_POST["uSummary"] . "\n" . $_POST["uPrice"] . "\n" . $_POST["uDetails"] . "\n" . $_POST["packageId"];
?>

<?php 
	$uTitle = $_POST["uTitle"];
	$uSummary = $_POST["uSummary"];
	$uPrice = $_POST["uPrice"];
	$uDetails = $_POST["uDetails"];
	$packageId = $_POST["packageId"];
	
	$UpdatePackage = "UPDATE packages SET title='{$uTitle}', summary='{$uSummary}', price={$uPrice}, details='{$uDetails}' WHERE id={$packageId}";
	$ResultPackage = mysqli_query($connection,$UpdatePackage);
	
	if($ResultPackage) {
		echo "success";	
	}
	if(!$ResultPackage) {
		echo "failed";	
	}
?>