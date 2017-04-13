<?php include_once("dbConnector.php"); ?>

<?php

	if(empty($_POST["management"])) {
		$_POST["management"] = "";
	}
	if(empty($_POST["leader"])) {
		$_POST["leader"] = "";
	}
	$management = $_POST["management"];
	$grp_name = $_POST["grp_name"];
	$details = $_POST["details"];
	$leader = $_POST["leader"];
	
	$grpErrArr = array();
	$flag = 1;
?>

<?php
	  
	  //---------Management Validation Check--------------
	  if (empty($management)) {
		$grpErrArr[0] = "* You have to select a management process<br/>";
	  } else {
		$management = test_input($management);
		$grpErrArr[0] = "";
	  }	
	  
	  
	  //---------Group Name Validation Check--------------
	  if (empty($_POST["grp_name"])) {
		$grpErrArr[1] = "* Group Name is required";
	  } else {
		$grp_name = test_input($_POST["grp_name"]);
		$grpErrArr[1] = "";
	  }
	  
	 
	  //---------Details Validation Check--------------
	  if (empty($_POST["details"])) {
		$grpErrArr[2] = "* Details is required";
	  } else {
		$details = test_input($_POST["details"]);
		$grpErrArr[2] = "";
	  }
	  
	  
	  //---------Leader Validation Check--------------
	  if (empty($leader)) {
		$grpErrArr[3] = "* You have to select a leader<br/>";
	  } else {
		$leader = test_input($leader);
		$grpErrArr[3] = "";
	  }	
	  
	  foreach($grpErrArr  as $each) {
		  if($each == "") {
			 $flag = 0;
			 continue;
		  } else {
			  $flag = 1;
			  break;
		  }
	  }	
	  
	  if($flag == 1) {
		  echo json_encode($grpErrArr);  
	  }
	  
?>

<?php
	if($flag == 0) {
		$insertGroupInfo = "INSERT INTO `hajj_web_app`.`groups` (`grp_id`, `management`, `grp_name`, `details`, `leader`) VALUES (NULL, '{$management}', '{$grp_name}', '{$details}', '{$leader}')";
		
		$resultGroupInfo = mysqli_query($connection, $insertGroupInfo);
		
		if($resultGroupInfo) {
			echo "success";	
		} else {
			echo "failed";	
		}
	}
?>

<?php
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>