<?php include_once("dbConnector.php"); ?>
<?php
	$termsId = $_GET["termsId"];
	
	$SqlDeleteTemrs = "DELETE FROM terms_conditions WHERE id={$termsId}";
	$ResultDeleteTerms = mysqli_query($connection,$SqlDeleteTemrs);
	
	if($ResultDeleteTerms) {
		echo "success";	
	} else {
		echo "failed";	
	}
?>