<?php include_once("dbConnector.php"); ?>
<?php
	$pmId = $_GET["pmId"];
	
	$SqlDeletePm = "DELETE FROM payment_method WHERE id={$pmId}";
	$ResultDeletePm = mysqli_query($connection,$SqlDeletePm);
	
	if($ResultDeletePm) {
		echo "success";	
	} else {
		echo "failed";	
	}
?>