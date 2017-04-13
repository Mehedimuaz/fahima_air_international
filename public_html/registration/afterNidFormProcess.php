<?php include_once("dbConnector.php"); ?>

<?php
	
	//--------district arrays-----------------
	
	$barisalArr = array("Barguna","Barisal","Bhola","Jhalokati","Patuakhali","Pirojpur");
	$chittagongArr = array("Bandarban","Brahmanbaria","Chandpur","Chittagong","Comilla","Coxs-bazar","Feni","Khagrachhari","Lakshmipur","Noakhali","Rangamati");
	$dhakaArr = array("Dhaka","Faridpur","Gazipur","Gopalganj","Jamalpur","Kishoregonj","Madaripur","Manikganj","Munshiganj","Mymensingh","Narayanganj","Narsingdi","Netrokona","Rajbari","Shariatpur","Sherpur","Tangail");
	$khulnaArr = array("Bagerhat","Chuadanga","Jessore","Jhenaidah","Khulna","Kushtia","Magura","Meherpur","Narail","Satkhira");
	$rajshahiArr = array("Bogra","Chapainababganj","Joypurhat","Pabna","Naogaon","Natore","Rajshahi","Sirajganj");
	$rangpurArr = array("Dinajpur","Gaibandha","Kurigram","Lalmonirhat","Nilphamari","Panchagarh","Rangpur","Thakurgaon");
	$sylhetArr = array("Habiganj","Maulvibazar","Sunamganj","Sylhet");
	
	
?>

<?php
	
	
	if(empty($_POST["grp"])) {
		$_POST["grp"] = NULL;
	}
	
	if(empty($_POST["depend"])) {
		$_POST["depend"] = NULL;
	}
	/*if(empty($_POST["occ"])) {
		$_POST["occ"] = NULL;
	}*/
	
	if(empty($_POST["ms"])) {
		$_POST["ms"] = NULL;
	}
	if(empty($_POST["currDist"])) {
		$_POST["currDist"] = NULL;
	}
	
	if(empty($_POST["perDist"])) {
		$_POST["perDist"] = NULL;
	}
	
	if(empty($_POST["passType"])) {
		$_POST["passType"] = NULL;
	}
	
	if(empty($_POST["passDist"])) {
		$_POST["passDist"] = NULL;
	}
	
	/*if(empty($_POST["passPolice"])) {
		$_POST["passPolice"] = NULL;
	}*/
	
?>

<?php
	
	/*if($_FILES['myFile']['size'] == 0) {
		echo $_POST["id"];	
	}
	if($_FILES['myFile']['size'] != 0) {
		echo "File is not empty";
	}*/
?>

<?php
	/*--------------------------------------------------------------------------------------

	--------------------------Variables Related to Files Info-------------------------------
	
	--------------------------------------------------------------------------------------*/
	
	if($_FILES['myFile']['size'] != 0) {
	
	 //----- file er name ta pacchi-------
	 $file = $_FILES['myFile']['name'];
	 
	 //---- file er path ta pacchi--------
	 $file_loc = $_FILES['myFile']['tmp_name'];
	 
	 //----file er size ta pacchi-------
	 $file_size = $_FILES['myFile']['size'];
	 
	 //----ki dhoroner file sheta pabo-----
	 $file_type = $_FILES['myFile']['type'];
	 
	 //----jei directory te file gula save thakbe upload er pore----
	 $folder="uploads/";
	 
	 //-------PC er main location theke upload folder e move hocche file upload er pore------
	 move_uploaded_file($file_loc,$folder.$file);
	 
	}
 
?>

<?php

	if($_FILES['myFile']['size'] == 0) {
		
		$selectImage = "SELECT image_name,image_type,image_size FROM priligrim_info WHERE id={$_POST['id']}";
		
		$resultImage = mysqli_query($connection,$selectImage);
		$rowImage = mysqli_fetch_assoc($resultImage);
	
		$file = $rowImage["image_name"];
		$file_size = $rowImage["image_size"];
		$file_type = $rowImage["image_type"];	
		
		echo $file." ".$file_type." ".$file_size;
	}
	
?>

<?php
	$fnBn = $_POST["fnBn"];
	$fnEng = $_POST["fnEng"];
	$fatN = $_POST["fatN"];
	$grp = $_POST["grp"];
	$depend = $_POST["depend"];
	$mbl = $_POST["mbl"];
	$occ = $_POST["occ"];
	$ms = $_POST["ms"];
	$currDist = $_POST["currDist"];
	$currPolice = $_POST["currPolice"];
	$currAdd = $_POST["currAdd"];
	$currPost = $_POST["currPost"];
	$perDist = $_POST["perDist"];
	$perPolice = $_POST["perPolice"];
	$perAdd = $_POST["perAdd"];
	$perPost = $_POST["perPost"];
	$passNo = $_POST["passNo"];
	$passType = $_POST["passType"];
	$passDoi = $_POST["passDoi"];
	$passExp = $_POST["passExp"];
	$passPia = $_POST["passPia"];
	$passDist = $_POST["passDist"];
	$passPolice = $_POST["passPolice"];
	$passAdd = $_POST["passAdd"];
	$passPost = $_POST["passPost"];
	$nid = $_POST["nid"];
	$bc = $_POST["bc"];
	
?>

<?php
	
	if(in_array($currDist, $barisalArr)){
		$currDiv = "Barisal";
	}
	if(in_array($currDist, $chittagongArr)){
		$currDiv = "Chittagong";
	}
	if(in_array($currDist, $dhakaArr)){
		$currDiv = "Dhaka";
	}
	if(in_array($currDist, $khulnaArr)){
		$currDiv = "Khulna";
	}
	if(in_array($currDist, $rajshahiArr)){
		$currDiv = "Rajshahi";
	}
	if(in_array($currDist, $rangpurArr)){
		$currDiv = "Rangpur";
	}
	if(in_array($currDist, $sylhetArr)){
		$currDiv = "Sylhet";
	}
	
?>

<?php
	
	if(in_array($perDist, $barisalArr)){
		$perDiv = "Barisal";
	}
	if(in_array($perDist, $chittagongArr)){
		$perDiv = "Chittagong";
	}
	if(in_array($perDist, $dhakaArr)){
		$perDiv = "Dhaka";
	}
	if(in_array($perDist, $khulnaArr)){
		$perDiv = "Khulna";
	}
	if(in_array($perDist, $rajshahiArr)){
		$perDiv = "Rajshahi";
	}
	if(in_array($perDist, $rangpurArr)){
		$perDiv = "Rangpur";
	}
	if(in_array($perDist, $sylhetArr)){
		$perDiv = "Sylhet";
	}
	
?>

<?php
	$updateWithNid = "UPDATE priligrim_info SET full_name_ban='{$fnBn}',full_name_eng='{$fnEng}',father_name='{$fatN}',grp_id='{$grp}',depends_on='{$depend}',
	mobile='{$mbl}',occupation='{$occ}',marital_status='{$ms}',curr_district='{$currDist}',curr_division='{$currDiv}',curr_police_station='{$currPolice}',curr_address='{$currAdd}',curr_post_code='{$currPost}',per_district='{$perDist}',per_division='{$perDiv}',per_police_station='{$perPolice}',per_address='{$perAdd}',per_post_code='{$perPost}',passport_no='{$passNo}',passport_type='{$passType}',date_of_issues='{$passDoi}',date_of_expiry='{$passExp}',place_of_issuing_authority='{$passPia}',pass_district='{$passDist}',pass_police_station='{$passPolice}',pass_address='{$passAdd}',pass_post_code='{$passPost}',image_name='{$file}',image_type='{$file_type}',image_size='{$file_size}' WHERE id='{$_POST['id']}'";
	
	$resultUpdateWithNid = mysqli_query($connection,$updateWithNid);
		
	if($resultUpdateWithNid) {
		echo "success";	
	} else {
		echo "failed";	
	}
	
?>