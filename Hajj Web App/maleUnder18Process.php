<?php include_once("dbConnector.php"); ?>

<?php
	
	if(empty($_POST["grpMaleUnderNt"])) {
		$_POST["grpMaleUnderNt"] = NULL;
	}
	if(empty($_POST["idnMaleUnderNt"])) {
		$_POST["idnMaleUnderNt"] = NULL;
	}
	
	$dobMaleUnderNt = $_POST["dobMaleUnderNt"];
	$grpMaleUnderNt = $_POST["grpMaleUnderNt"];
	$idnMaleUnderNt = $_POST["idnMaleUnderNt"];
	
	$flag = 1;
	$maleUnderNtErrArr = array();
	
	//echo $dobMaleUnderNt." ".$grpMaleUnderNt." ".$idnMaleUnderNt;
?>

<?php
	//---------DOB Validation Check--------------
	if (empty($_POST["dobMaleUnderNt"])) {
		$maleUnderNtErrArr[0] = "* Date of Birth is required";
	} else {
		//$dobMaleAdult = test_input($_POST["dobMaleAdult"]);
		$maleUnderNtErrArr[0] = "";
	}
	  
	//---------Group Text-box Validation Check--------------
	if (empty($_POST["grpMaleUnderNt"])) {
		$maleUnderNtErrArr[1] = "* Group Name is required";
	} else {
		$grpMaleUnderNt = test_input($_POST["grpMaleUnderNt"]);
		$maleUnderNtErrArr[1] = "";
	} 
	
	//---------Identity Validation Check--------------
	if (empty($idnMaleUnderNt)) {
		$maleUnderNtErrArr[2] = "* You have to choose a Identity<br/>";
	} else {
		$idnMaleUnderNt = test_input($idnMaleUnderNt);
		$maleUnderNtErrArr[2] = "";
	}	
	
	  //-----if identity is checked then check validation for NID/BC----------
	  if(isset($_POST["idnMaleUnderNt"])) {
		   if($_POST["idnMaleUnderNt"] == "nid") {
			   
				//---------NID Validation Check--------------
				if (empty($_POST["nidMaleUnderNt"])) {
					$maleUnderNtErrArr[3] = "* NID is required";
				} else {
					$nidMaleUnderNt = test_input($_POST["nidMaleUnderNt"]);
					$maleUnderNtErrArr[3] = "";
				}  
				
		   }
		   if($_POST["idnMaleUnderNt"] == "bc") {
			   
				//---------BC Validation Check--------------
				if (empty($_POST["bcMaleUnderNt"])) {
					$maleUnderNtErrArr[3] = "* Birth Certificate is required";
				} else {
					$bcMaleUnderNt = test_input($_POST["bcMaleUnderNt"]);
					$maleUnderNtErrArr[3] = "";
				}  
				 
		   }
	  } else {
			//---------NID Validation Check--------------
			if (empty($_POST["nidMaleUnderNt"])) {
				$maleUnderNtErrArr[3] = "* NID is required";
			} else {
				$nidMaleUnderNt = test_input($_POST["nidMaleUnderNt"]);
				$maleUnderNtErrArr[3] = "";
			}  	  
	  }
?>

<?php
	foreach($maleUnderNtErrArr as $each) {
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
		$insertMaleUnderNt = "INSERT INTO priligrim_info (dob,grp_id,gender,identity,type,nid,bc) VALUES ('{$dobMaleUnderNt}','{$grpMaleUnderNt}','Male','{$idnMaleUnderNt}','group','{$nidMaleUnderNt}','{$bcMaleUnderNt}')";
		$resultMaleUnderNt = mysqli_query($connection,$insertMaleUnderNt);
		
		if($resultMaleUnderNt) {
			echo "success";	
		}
	}
	if($flag == 1) {
		echo json_encode($maleUnderNtErrArr);	
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