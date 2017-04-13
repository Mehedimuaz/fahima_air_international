<?php include_once("dbConnector.php"); ?>

<?php

	if(empty($_POST["typeMaleAdult"])) {
		$_POST["typeMaleAdult"] = NULL;
	}
	
	if(empty($_POST["idnMaleAdult"])) {
		$_POST["idnMaleAdult"] = NULL;
	}
	
	if(empty($_POST["grpMaleAdult"])) {
		$_POST["grpMaleAdult"] = NULL;
	}
	
	if(empty($_POST["managementMaleAdult"])) {
		$_POST["managementMaleAdult"] = NULL;
	}
	
	/*if(empty($_POST["bcMaleAdult"])) {
		$_POST["bcMaleAdult"] = NULL;
	}*/
	
	$dobMaleAdult = $_POST["dobMaleAdult"];
	$typeMaleAdult = $_POST["typeMaleAdult"];
	$grpMaleAdult = $_POST["grpMaleAdult"];
	$managementMaleAdult = $_POST["managementMaleAdult"];
	$idnMaleAdult = $_POST["idnMaleAdult"];
	$nidMaleAdult = $_POST["nidMaleAdult"];
	$bcMaleAdult = $_POST["bcMaleAdult"];
	
	$maleAdultErrArr = array();
	$flag = 1;
	
	//echo $dobMaleAdult." ".$typeMaleAdult." ".$grpMaleAdult." ".$managementMaleAdult." ".$idnMaleAdult." ".$nidMaleAdult." ".$bcMaleAdult;

?>

<?php
	  //---------DOB Validation Check--------------
	  if (empty($_POST["dobMaleAdult"])) {
		$maleAdultErrArr[0] = "* Date of Birth is required";
	  } else {
		//$dobMaleAdult = test_input($_POST["dobMaleAdult"]);
		$maleAdultErrArr[0] = "";
	  }
	  
	  //---------Type Validation Check--------------
	  if (empty($typeMaleAdult)) {
		$maleAdultErrArr[1] = "* You have to choose a Type<br/>";
	  } else {
		$typeMaleAdult = test_input($typeMaleAdult);
		$maleAdultErrArr[1] = "";
	  }	
	  
	  //---------Management Validation Check--------------
	  /*if (empty($managementMaleAdult)) {
		$maleAdultErrArr[2] = "* You have to choose a Management<br/>";
	  } else {
		$managementMaleAdult = test_input($managementMaleAdult);
		$maleAdultErrArr[2] = "";
	  }	*/
	  
	  //---------Identity Validation Check--------------
	  if (empty($idnMaleAdult)) {
		$maleAdultErrArr[3] = "* You have to choose a Identity<br/>";
	  } else {
		$idnMaleAdult = test_input($idnMaleAdult);
		$maleAdultErrArr[3] = "";
	  }	
	  
	  
	  //-----if identity is checked then check validation for NID/BC----------
	  if(isset($_POST["idnMaleAdult"])) {
		   if($_POST["idnMaleAdult"] == "nid") {
			   
				//---------NID Validation Check--------------
				if (empty($_POST["nidMaleAdult"])) {
					$maleAdultErrArr[4] = "* NID is required";
				} else {
					$nidMaleAdult = test_input($_POST["nidMaleAdult"]);
					$maleAdultErrArr[4] = "";
				}  
				
		   }
		   if($_POST["idnMaleAdult"] == "bc") {
			   
				//---------BC Validation Check--------------
				if (empty($_POST["bcMaleAdult"])) {
					$maleAdultErrArr[4] = "* Birth Certificate is required";
				} else {
					$bcMaleAdult = test_input($_POST["bcMaleAdult"]);
					$maleAdultErrArr[4] = "";
				}  
				 
		   }
	  } else {
			//---------NID Validation Check--------------
			if (empty($_POST["nidMaleAdult"])) {
				$maleAdultErrArr[4] = "* NID is required";
			} else {
				$nidMaleAdult = test_input($_POST["nidMaleAdult"]);
				$maleAdultErrArr[4] = "";
			}  	  
	  }
	  
	  
	 /* if($_POST["typeMaleAdult"] == "group") {
			//---------Group Text-box Validation Check--------------
			if (empty($_POST["grpMaleAdult"])) {
				$maleAdultErrArr[5] = "* Group Name is required";
			} else {
				$grpMaleAdult = test_input($_POST["grpMaleAdult"]);
				$maleAdultErrArr[5] = "";
			}  
	  }*/
	  
	  if($_POST["grpMaleAdult"] == NULL) {
		  //---------Management Validation Check--------------
		  if (empty($managementMaleAdult)) {
			$maleAdultErrArr[6] = "* You have to choose a Management<br/>";
			//$maleAdultErrArr[6] = "";
		  } else {
			$managementMaleAdult = test_input($managementMaleAdult);
			$maleAdultErrArr[6] = "";
		  }	  
	  } 
	  
	  if(!empty($_POST["grpMaleAdult"])) {
		  $_POST["managementMaleAdult"] = NULL;
		  $managementMaleAdult = $_POST["managementMaleAdult"];
	  	  //$maleAdultErrArr[6] = "";
	  }
?>

<?php
	foreach($maleAdultErrArr as $each) {
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
	if($flag == 1) {
		echo json_encode($maleAdultErrArr);	
	}
?>

<?php
	if($flag == 0) {
		$insertMaleAdult = "INSERT INTO priligrim_info (nid,bc,dob,gender,type,grp_id,management,identity) VALUES ('{$nidMaleAdult}','{$bcMaleAdult}','{$dobMaleAdult}','Male','{$typeMaleAdult}','{$grpMaleAdult}','{$managementMaleAdult}','{$idnMaleAdult}')";
		
		$resultMaleAdult = mysqli_query($connection,$insertMaleAdult);
		
		if($resultMaleAdult) {
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