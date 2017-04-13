<?php include_once("dbConnector.php"); ?>

<?php
	
	if(empty($_POST["grpFemale"])) {
		$_POST["grpFemale"] = NULL;
	}
	if(empty($_POST["idnFemale"])) {
		$_POST["idnFemale"] = NULL;
	}
	
	$dobFemale = $_POST["dobFemale"];
	$grpFemale = $_POST["grpFemale"];
	$idnFemale = $_POST["idnFemale"];
	
	$flag = 1;
	$femaleErrArr = array();
	
	//echo $dobMaleUnderNt." ".$grpMaleUnderNt." ".$idnMaleUnderNt;
	
	//echo $grpFemale;
?>

<?php
	//---------DOB Validation Check--------------
	if (empty($_POST["dobFemale"])) {
		$femaleErrArr[0] = "* Date of Birth is required";
	} else {
		//$dobMaleAdult = test_input($_POST["dobMaleAdult"]);
		$femaleErrArr[0] = "";
	}
	  
	//---------Group Text-box Validation Check--------------
	if (empty($_POST["grpFemale"])) {
		$femaleErrArr[1] = "* Group Name is required";
	} else {
		$grpFemale = test_input($_POST["grpFemale"]);
		$femaleErrArr[1] = "";
	} 
	
	//---------Identity Validation Check--------------
	if (empty($idnFemale)) {
		$femaleErrArr[2] = "* You have to choose a Identity<br/>";
	} else {
		$idnFemale = test_input($idnFemale);
		$femaleErrArr[2] = "";
	}	
	
	  //-----if identity is checked then check validation for NID/BC----------
	  if(isset($_POST["idnFemale"])) {
		   if($_POST["idnFemale"] == "nid") {
			   
				//---------NID Validation Check--------------
				if (empty($_POST["nidFemale"])) {
					$femaleErrArr[3] = "* NID is required";
				} else {
					$nidFemale = test_input($_POST["nidFemale"]);
					$femaleErrArr[3] = "";
				}  
				
		   }
		   if($_POST["idnFemale"] == "bc") {
			   
				//---------BC Validation Check--------------
				if (empty($_POST["bcFemale"])) {
					$femaleErrArr[3] = "* Birth Certificate is required";
				} else {
					$bcFemale = test_input($_POST["bcFemale"]);
					$femaleErrArr[3] = "";
				}  
				 
		   }
	  } else {
			//---------NID Validation Check--------------
			if (empty($_POST["nidFemale"])) {
				$femaleErrArr[3] = "* NID is required";
			} else {
				$nidFemale = test_input($_POST["nidFemale"]);
				$femaleErrArr[3] = "";
			}  	  
	  }
?>

<?php
	foreach($femaleErrArr as $each) {
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
		$insertFemale = "INSERT INTO priligrim_info (dob,grp_id,gender,identity,type,nid,bc) VALUES ('{$dobFemale}','{$grpFemale}','Female','{$idnFemale}','group','{$nidFemale}','{$bcFemale}')";
		$resultFemale = mysqli_query($connection,$insertFemale);
		
		if($resultFemale) {
			echo "success";	
		}
	}
	if($flag == 1) {
		echo json_encode($femaleErrArr);	
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