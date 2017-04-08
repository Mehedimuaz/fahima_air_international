<?php include_once("dbConnector.php"); ?>

<?php



	$searchTermName = $_GET["searchTermName"];
	$i = 0;
	$selectSearchName = "SELECT id,bc,nid,full_name_eng,grp_id,curr_district FROM priligrim_info WHERE bc LIKE '%{$searchTermName}%' ORDER BY id DESC";
	
	$resultSearchName = mysqli_query($connection,$selectSearchName);

?>

<?php

	$out = "[";
	
	while($rowSearchName = mysqli_fetch_assoc($resultSearchName)) {

        //----------select Group Name---------            
		$selectGrpName = "SELECT grp_name FROM groups WHERE grp_id='{$rowSearchName['grp_id']}'";
		$resultGrpName = mysqli_query($connection,$selectGrpName);
		$rowGrpName = mysqli_fetch_assoc($resultGrpName);
	
		
		if($out != "[") 
		{ 
			$out .= ","; 
		}
		//$out .= '{"id": "'. $rowSearchName["id"] . '","nid": "' . $rowSearchName["nid"] . '", "name": "' . $rowSearchName["full_name_eng"] . '","grp": "' . $rowGrpName["grp_name"] . '","currDist": "'. $rowSearchName["curr_district"] . '"}';
		
	/*------------------------------------------------------------------------------------------
	[
    	{"id": "2","nid": "201414011","bc": "201313022","name": "Samiul Alim Pratik","grp": "2","currDist": "Dhaka"},
        {"id": "3","nid": "201414014","bc": "201313022","name": "FR Affan","grp": "3","currDist": "Bogra"},
        {"id": "10","nid": "201414016","bc": "201313022","name": "Moumita","grp": "1","currDist": "Dhaka"}
    ]
	------------------------------------------------------------------------------------------*/
		
		$out .= '{"id": "'. $rowSearchName["id"] . '","nid": "' . $rowSearchName["nid"] . '","bc": "' . $rowSearchName["bc"] . '","name": "' . $rowSearchName["full_name_eng"] . '","grp": "' . $rowGrpName["grp_name"] . '","currDist": "'. $rowSearchName["curr_district"] . '"}';
		
	}
	
	$out .= "]";

?>

<?php echo $out; ?>