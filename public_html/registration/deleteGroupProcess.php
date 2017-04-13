<?php

	include_once("dbConnector.php");
	$setNull = NULL;

	$deleteGrp = "DELETE FROM groups WHERE grp_id = {$_POST['grpId']}";
	$resultGrp = mysqli_query($connection,$deleteGrp);
	$insertNull = "UPDATE priligrim_info SET grp_id = 0 WHERE grp_id = {$_POST['grpId']}";
	$resultNull = mysqli_query($connection,$insertNull);
	
	if($resultGrp == true && $resultNull == true) {
		echo "success";	
	} else {
		echo "failed";	
	}

?>