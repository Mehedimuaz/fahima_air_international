<?php include_once("dbConnector.php"); ?>

<?php
	
	$management = $_POST["management"];
	$grp_name = $_POST["grp_name"];
	$details = $_POST["details"];
	$leader = $_POST["leader"];
	$grp_id = $_POST["grp_id"];
	
	//echo "Management: " . $management." " . "Group Name: " . $grp_name." Details: ".$details." Leader: ".$leader." Group Id: ".$grp_id;
	
?>

<?php
	
	$updateGrp = "UPDATE groups SET management='{$management}',grp_name='{$grp_name}',details='{$details}',leader={$leader} WHERE grp_id={$grp_id}";
	$resultUpdateGrp = mysqli_query($connection,$updateGrp);
	
?>

<?php
	
	if($resultUpdateGrp) {
		echo "success";
	} else {
		echo "failed";	
	}
	
?>