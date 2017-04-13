<?php include_once("dbConnector.php"); ?>

<?php
	
	$match = 0;
	$id = $_GET["id"];

	$deleteProfile = "DELETE FROM priligrim_info WHERE id={$id}";
	
	$selectIdLeader = "SELECT leader FROM groups";
	$resultIdLeader = mysqli_query($connection,$selectIdLeader);
	
	while($rowIdLeader = mysqli_fetch_assoc($resultIdLeader)) {
		
		if($rowIdLeader["leader"] == $id) {
			$selectGrpName = "SELECT grp_name FROM groups WHERE leader={$rowIdLeader['leader']}";
			$resultGrpName = mysqli_query($connection,$selectGrpName);
			
			$rowGrpName = mysqli_fetch_assoc($resultGrpName);
			
			$match = 1;
			break;
		}
			
	}
	
	if($match == 0) {
		$resultDeleteProfile = mysqli_query($connection,$deleteProfile);
	}
	
	if($match == 0) {
		echo "success";
	} 
	
	if($match == 1) {
		echo $rowGrpName["grp_name"];	
	}
?>