<?php include_once("dbConnector.php"); ?>

<?php
	if(empty($_POST["resident"])) {
		$_POST["resident"] = "";
	}
	if(empty($_POST["gender"])) {
		$_POST["gender"] = "";
	}
	if(empty($_POST["type"])) {
		$_POST["type"] = "";
	}
	if(empty($_POST["management"])) {
		$_POST["management"] = "";
	}
	if(empty($_POST["idn"])) {
		$_POST["idn"] = "";
	}
?>

<?php
	$resident = $_POST["resident"];
	//$residence = $_POST["residence"];
	$dob = $_POST["dob"];
	$gender = $_POST["gender"];
	$type = $_POST["type"];
	//$grp = $_POST["grp"];
	$management = $_POST["management"];
	$nid = $_POST["nid"];
	$idn = $_POST["idn"];
	$priligrimErrArr = array();
	$flag = 1;
	
	//echo $resident." ".$residence." ".$dob." ".$gender." ".$type." ".$grp." ".$management." ".$nid." ".$idn;
?>

<?php

	//---------Resident Validation Check--------------
	if (empty($resident)) {
		$priligrimErrArr[0] = "* You have to choose a Resident<br/>";
	} else {
		$resident = test_input($resident);
		$priligrimErrArr[0] = "";
	}
	
	//---------Date Of Birth Validation Check--------------
	if (empty($dob)) {
		$priligrimErrArr[1] = "* You have to choose a Birth Date<br/>";
	} else {
		$dob = test_input($dob);
		$priligrimErrArr[1] = "";
	}
	
	//---------Gender Validation Check--------------
	if (empty($gender)) {
		$priligrimErrArr[2] = "* You have to choose a Gender<br/>";
	} else {
		$gender = test_input($gender);
		$priligrimErrArr[2] = "";
	}
	
	//---------Type Validation Check--------------
	if (empty($type)) {
		$priligrimErrArr[3] = "* You have to choose a Type<br/>";
	} else {
		$type = test_input($type);
		$priligrimErrArr[3] = "";
	}
	
	//---------Management Validation Check--------------
	if (empty($management)) {
		$priligrimErrArr[4] = "* You have to choose a Management<br/>";
	} else {
		$management = test_input($management);
		$priligrimErrArr[4] = "";
	}
	
	//---------Identity Validation Check--------------
	if (empty($idn)) {
		$priligrimErrArr[5] = "* You have to choose a Identity<br/>";
	} else {
		$idn = test_input($idn);
		$priligrimErrArr[5] = "";
	}

	//---------NID Validation Check--------------
	if (empty($_POST["nid"])) {
		$priligrimErrArr[6] = "* NID No is required";
	} else {
		$nid = test_input($_POST["nid"]);
		if (!preg_match("/^[0-9]*$/",$nid)) {
			$priligrimErrArr[6] = "* Only digits are allowed";	
		} else {
			$priligrimErrArr[6] = "";	
		}
	}

?>

<?php
	foreach($priligrimErrArr as $each) {
		if($each == "") {
			$flag = 0;	
			continue;
		} else {
			$flag = 1;
			break;	
		}
	}
?>

<?php
	if($flag == 0) {
		$insertPriligrim = "INSERT INTO priligrim_info (nid,resident,dob,gender,type,management,identity) VALUES ('{$nid}','{$resident}','{$dob}','{$gender}','{$type}','{$management}','{$idn}')";
		
		$resultPriligrim = mysqli_query($connection,$insertPriligrim);
		
		if($resultPriligrim) {
			echo "success";	
		} else {
			echo "failed";	
		}
	}
	
	if($flag == 1) {
		echo json_encode($priligrimErrArr);	
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