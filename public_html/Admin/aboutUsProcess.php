<?php include_once("dbConnector.php"); ?>

<?php
	//echo $_POST["newsTitle"] . "\n" . $_POST["newsBody"];
	$aboutUsBody = mysqli_real_escape_string($connection,$_POST["aboutUsBody"]);
	
	$InsertAbout = "UPDATE about_us SET about='{$aboutUsBody}' WHERE id=2";
	$ResultAbout = mysqli_query($connection,$InsertAbout);
	
	if($ResultAbout) {
		echo "success";
	} else {
		echo "failed";
	}
?>