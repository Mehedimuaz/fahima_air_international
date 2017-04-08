<?php include_once("dbConnector.php"); ?>

<?php
	
	$searchVal = $_GET["searchVal"];
	$i=0;
	
	//$selectGrpInfo = "SELECT * FROM groups WHERE grp_name LIKE '%{$searchVal}%'";
	
	$selectGrpInfo = "SELECT * FROM groups WHERE grp_name LIKE '%{$searchVal}%'";
	
	
	$resultGrpInfo = mysqli_query($connection,$selectGrpInfo);
	
?>

<?php
	/*-----------------------------------------------------------------------------------------
	
		[
		 {"grpName": "Group of X","management": "Private","leader": "Pratik","piligrimNum": "3","grpId": "4"},
		 {"grpName": "Group of Y","management": "Private","leader": "Oyshee","piligrimNum": "4","grpId": "6"},
		 {"grpName": "Group of Z","management": "Private","leader": "Affan","piligrimNum": "5","grpId": "5"}
		]
	
	-----------------------------------------------------------------------------------------*/
?>

<?php
	
	$out = "[";

	while($rowGrpInfo = mysqli_fetch_assoc($resultGrpInfo)) {

		//-----------select member number in a group-----------
		$selectPiligrimCount = "SELECT COUNT(grp_id) AS piligrimNum FROM priligrim_info WHERE grp_id={$rowGrpInfo['grp_id']}"	;
		$resultPiligrimCount = mysqli_query($connection,$selectPiligrimCount);
		
		$rowPiligrimCount = mysqli_fetch_assoc($resultPiligrimCount);	
		
		//---------select leader name--------------------
		$selectLeaderName = "SELECT full_name_eng FROM priligrim_info WHERE id={$rowGrpInfo['leader']}";
		$resultLeaderName = mysqli_query($connection,$selectLeaderName);
		
		$rowLeaderName = mysqli_fetch_assoc($resultLeaderName);
		
		if($out != "[") {
			$out .= ",";
		}
		
		$out .= '{"grpName": "' . $rowGrpInfo["grp_name"] . '","management": "' . $rowGrpInfo["management"] . '","leader": "' . $rowLeaderName["full_name_eng"] . '","piligrimNum": "' . $rowPiligrimCount["piligrimNum"] .'", "grpId": "' . $rowGrpInfo["grp_id"] . '"}';
			
	}
	
	$out .= "]";
	
	echo $out;

?>