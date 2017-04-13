<?php include_once("dbConnector.php"); ?>

<?php
	
	if(empty($_POST["grpNrb"])) {
		$_POST["grpNrb"] = NULL;
	}
	if(empty($_POST["residence"])) {
		$_POST["residence"] = NULL;
	}
	if(empty($_POST["idnNrb"])) {
		$_POST["idnNrb"] = NULL;
	}
	if(empty($_POST["genderNrb"])) {
		$_POST["genderNrb"] = NULL;
	}
	/*if(empty($_POST["bcNrb"])) {
		$_POST["bcNrb"] = NULL;
		$bcNrb = $_POST["bcNrb"];
	}*/
	
	$dobNrb = $_POST["dobNrb"];
	$grpNrb = $_POST["grpNrb"];
	$idnNrb = $_POST["idnNrb"];
	$residence = $_POST["residence"];
	$genderNrb = $_POST["genderNrb"];
	
	$flag = 1;
	$nrbErrArr = array();
?>

<?php
	//---------DOB Validation Check--------------
	if (empty($_POST["dobNrb"])) {
		$nrbErrArr[0] = "* Date of Birth is required";
	} else {
		//$dobMaleAdult = test_input($_POST["dobMaleAdult"]);
		$nrbErrArr[0] = "";
	}
	  
	//---------Group Validation Check--------------
	if (empty($_POST["grpNrb"])) {
		$nrbErrArr[1] = "* Group Name is required";
	} else {
		$grpNrb = test_input($_POST["grpNrb"]);
		$nrbErrArr[1] = "";
	} 
	
	//---------Residence Validation Check--------------
	if (empty($_POST["residence"])) {
		$nrbErrArr[4] = "* You have to select a residence";
	} else {
		$residence = test_input($_POST["residence"]);
		$nrbErrArr[4] = "";
	} 
	
	//---------Identity Validation Check--------------
	if (empty($idnNrb)) {
		$nrbErrArr[2] = "* You have to choose a Identity<br/>";
	} else {
		$idnNrb = test_input($idnNrb);
		$nrbErrArr[2] = "";
	}
	
	//---------Gender Validation Check--------------
	if (empty($genderNrb)) {
		$nrbErrArr[5] = "* You have to select a gender<br/>";
	} else {
		$genderNrb = test_input($genderNrb);
		$nrbErrArr[5] = "";
	}	
	
	  //-----if identity is checked then check validation for NID/BC----------
	  if(isset($_POST["idnNrb"])) {
		   if($_POST["idnNrb"] == "nid") {
			   
				//---------NID Validation Check--------------
				if (empty($_POST["nidNrb"])) {
					$nrbErrArr[3] = "* NID is required";
					//$_POST["bcNrb"]	=	NULL;
					//$bcNrb = NULL;
				} else {
					$nidNrb = test_input($_POST["nidNrb"]);
					$nrbErrArr[3] = "";
				}  
				
		   }
		   if($_POST["idnNrb"] == "bc") {
			   
				//---------BC Validation Check--------------
				if (empty($_POST["bcNrb"])) {
					$nrbErrArr[3] = "* Birth Certificate is required";
				} else {
					$bcNrb = test_input($_POST["bcNrb"]);
					$nrbErrArr[3] = "";
				}  
				 
		   }
	  } else {
			//---------NID Validation Check--------------
			if (empty($_POST["nidNrb"])) {
				$nrbErrArr[3] = "* NID is required";
			} else {
				$nidNrb = test_input($_POST["nidNrb"]);
				$nrbErrArr[3] = "";
			}  	  
	  }
?>

<?php
	foreach($nrbErrArr as $each) {
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
		$insertNrb = "INSERT INTO priligrim_info (nid,bc,residence,dob,gender,grp_id,identity,type) VALUES ('{$nidNrb}','{$bcNrb}','{$residence}','{$dobNrb}','{$genderNrb}',{$grpNrb},'{$idnNrb}','group')";
		$resultNrb = mysqli_query($connection,$insertNrb);
		
		if($resultNrb) {
			echo "success";	
		} else {
			echo "failed";	
		}
	}
	if($flag == 1) {
		echo json_encode($nrbErrArr);	
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