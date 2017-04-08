<?php include_once("dbConnector.php"); ?>
<?php
	$rulesId = $_GET["rulesId"];
	
	$SqlDeleteRules = "DELETE FROM hajj_rules WHERE id={$rulesId}";
	$ResultDeleteRules = mysqli_query($connection,$SqlDeleteRules);
	
	if($ResultDeleteRules) {
		echo "success";	
	} else {
		echo "failed";	
	}
?>