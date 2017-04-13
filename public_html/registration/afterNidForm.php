<?php session_start(); ?>
<?php
	if($_SESSION["hajj_web_app"] != "Yes") {
		header("location: index.php");
	}
?>
<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Hajj Website</title>

<style>
	#priligrimSuccessAlertId {
		animation:successOpacity 6s;
	}
	
	@font-face {
		font-family:comforta;
		src:url(fonts/Comfortaa-Regular.ttf);	
	}
	
	@font-face {
		font-family:comforta;
		src:url(fonts/Comfortaa-Bold.ttf);
		font-weight:bold;	
	}
	
	body {
		font-family:comforta;	
	}

	* {
		padding:0px;
		margin:0px;
		box-sizing:border-box;	
	}
	
	.header {
		height:50px;
		width:100%;
		position:fixed;	
		top:0px;
		left:0px;
	}
	
	.navbar {
		width:450px;
	}
	
	.container {
		width:1175px;
		margin:auto;
		position:relative;
		top:70px;	
		border-radius:8px;
	}
	
	.container-header {
		height:50px; 
		padding:13px 16px;	
		border-radius:8px 8px 0px 0px;
	}
	
	.personalInfo-container {
		/*border:1px solid black;*/
		padding:25px 0px;
	}
	
	.picture-container {
		/*border:1px solid black;*/
		padding:25px 0px;					
	}
	
	.personalInfo {
		width:500px;
		margin:auto;
		border-radius:8px;
		padding-bottom:20px;	
	}
	
	.picture {
		width:500px;
		margin:auto;
		border-radius:8px;
		padding-bottom:20px;
	}
	
	.picture-content {
		width:180px;
		height:210px;
		border-radius:50%;
		padding:5px;
		margin:auto;
	}
	
	.imageFileContainer {
		width:100%;
		padding:20px 0px;	
	}
	
	.col1 {
		height:30px;
		width:220px;
		text-align:right;	
	}
	
	.col2 {
		height:30px;
		width:280px;
		padding-left:30px;	
	}
	
	.col3 {
		text-align:right;
		padding-right:30px;	
		width:200px;	
		hieght:50px;
	}
	
	.col4 {
		padding-right:20px;
		width:300px;
		height:50px;	
	}
	
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

    <!------------------Select Values From Database for input fields values------------->
                
    <?php
        if(!empty($_GET["extraValMaleAdultName"])) {
            $selectValueInput = "SELECT * FROM priligrim_info WHERE nid='{$_GET['extraValMaleAdultName']}'";
        }
        if(!empty($_GET["extraValMaleAdultBcName"])) {
            $selectValueInput = "SELECT * FROM priligrim_info WHERE bc='{$_GET['extraValMaleAdultBcName']}'";
        }
		
        $resultValueInput = mysqli_query($connection,$selectValueInput);
        
        $rowValueInput = mysqli_fetch_assoc($resultValueInput);
    ?> 
    
    <!-------------Menu Bar------------------------>
    <div class="w3-top header w3-light-grey">
        <ul class="w3-navbar w3-light-grey w3-large navbar w3-right">
        	<li><a href="hajjiProfile.php?id=<?php echo $rowValueInput["id"]; ?>">Profile</a></li>
            <li><a href="home.php">Applications</a></li>
            <li><a href="groupList.php">Groups</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>  
    
    
    <div class="container w3-card-8">
    	<div class="w3-container w3-blue container-header">
        	<p>Edit information of <?php echo $rowValueInput["full_name_eng"]; ?></p>
        </div>
        
        <div class="w3-container">
        
            <!--<div id="priligrimSuccessAlertId" class="w3-panel w3-green w3-round-large"> 
                <span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
                <h3>Success!</h3>
                <p>Priligrim Informations have been saved successfully!</p>
            </div>-->
            
            
            <!----------Select Selected Group Name which will be shown in inout field--------->
            <?php
				if(!empty($_GET["extraValMaleAdultName"])) {
					$selectGrpNameInput = "SELECT g.grp_name,p.nid,g.grp_id FROM priligrim_info AS p, groups AS g WHERE p.grp_id=g.grp_id AND p.nid='{$_GET['extraValMaleAdultName']}'";
				}
				if(!empty($_GET["extraValMaleAdultBcName"])) {
					$selectGrpNameInput = "SELECT g.grp_name,p.nid,g.grp_id FROM priligrim_info AS p, groups AS g WHERE p.grp_id=g.grp_id AND p.bc='{$_GET['extraValMaleAdultBcName']}'";
				}
				
				$resultGrpNameInput = mysqli_query($connection,$selectGrpNameInput);
				$rowGrpNameInput = mysqli_fetch_assoc($resultGrpNameInput);
            ?>
            
            <!-----------Select all group names from group table------------------>
            <?php
				$selectAllGrpName = "SELECT grp_name,grp_id FROM groups";
				$resultGrpName = mysqli_query($connection,$selectAllGrpName);
			?>
            
            <!--------------Select all names for Depends On Field------------->
            <?php  
				$selectDependsOn = "SELECT full_name_eng,id FROM priligrim_info ORDER BY full_name_eng ASC";
				$resultDependsOn = mysqli_query($connection,$selectDependsOn);
				
			?>
            

            
            <div class="w3-row">
            
            	<!---------------------personalInfo-container------------------->
                <div class="w3-half personalInfo-container">
                
                    <div class="personalInfo w3-card-4">
                    	<h3 class="w3-container w3-green w3-center" style="margin-top:0px;border-radius:8px 8px 0px 0px;">Personal Information</h3>
                        <table>
                        
                        	<?php if(!empty($_GET["extraValMaleAdultName"])) { ?>
                        	<tr>
                            	<td class="col1"><strong>NID No :</strong></td>
                                <td class="col2"><?php echo " ".$_GET["extraValMaleAdultName"]; ?></td>
                            </tr>
                            <?php } ?>
                            
                            <?php if(!empty($_GET["extraValMaleAdultBcName"])) { ?>
                            <tr>
                            	<td class="col1"><strong>Birth Certificate No :</strong></td>
                                <td class="col2"><?php echo $_GET["extraValMaleAdultBcName"]; ?></td>
                            </tr>
                            <?php } ?>
                       
                            <tr>
                            	<td class="col1"><strong>Date of Birth :</strong></td>
                                <td class="col2"><?php echo $rowValueInput["dob"]; ?></td>
                            </tr>
                            <tr>
                            	<td class="col1"><strong>Gender :</strong></td>
                                <td class="col2"><?php echo $rowValueInput["gender"]; ?></td>
                            </tr>
                            
                            <?php if($rowValueInput["type"] == "individual") { ?>
                            <tr>
                            	<td class="col1"><strong>Management :</strong></td>
                                <td class="col2"><?php echo $rowValueInput["management"]; ?></td>
                            </tr>
                            <?php } ?>
                        </table>
                        
                        
                        <form name="updateFormName" id="updateFormId" onSubmit="return false">
                        	<table>
                            
                            	<!-----------------Full Name (Bangla)--------------->
                                <tr>
                                    <td class="col3"><strong>Full Name (Bangla) :</strong></td>
                                    <td class="col4"><input class="w3-input w3-border w3-round" name="fnBn" value="<?php echo $rowValueInput["full_name_ban"]; ?>" type="text"></p></td>
                                </tr>
                                
                                <!-----------------Full Name (English)-------------->
                                <tr>
                                    <td class="col3"><strong>Full Name (English) :</strong></td>
                                    <td class="col4"><input class="w3-input w3-border w3-round" name="fnEng" value="<?php echo $rowValueInput["full_name_eng"]; ?>" type="text"></p></td>
                                </tr>
                                
                                <!-----------------Father's Name-------------->
                                <tr>
                                    <td class="col3"><strong>Father's Name :</strong></td>
                                    <td class="col4"><input class="w3-input w3-border w3-round" name="fatN" value="<?php echo $rowValueInput["father_name"]; ?>" type="text"></p></td>
                                </tr>
                                
                                <?php if($rowValueInput["type"] != "individual") { ?>
                                
                                <!-----------------Group-------------->
                            	<tr>
                                	<td class="col3"><strong>Group :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="grp" id="grpId">
                                            <option style="display:none;" value="<?php echo $rowValueInput["grp_id"]; ?>" disabled selected><?php echo $rowGrpNameInput["grp_name"] ?></option>
                                            <?php while($rowGrpName = mysqli_fetch_assoc($resultGrpName)) { ?>
                                            <option value="<?php echo $rowGrpName["grp_id"]; ?>"><?php echo $rowGrpName["grp_name"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                
                                
								<?php
                                	$selectSelectedDependOn = "SELECT id,full_name_eng FROM priligrim_info WHERE id='{$rowValueInput['depends_on']}'";
									$resultSelectedDependOn = mysqli_query($connection,$selectSelectedDependOn);
									$rowSelectedDependOn = mysqli_fetch_assoc($resultSelectedDependOn);
                                ?>
                                
                                <!-------------------Depends on----------------------->
                            	<tr>
                                	<td class="col3"><strong>Depends on :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="depend" id="dependId">
                                            <option style="display:none;" value="<?php echo $rowSelectedDependOn["id"]; ?>" disabled selected><?php echo $rowSelectedDependOn["full_name_eng"]; ?></option>
                                            <?php while($rowDependsOnOption = mysqli_fetch_assoc($resultDependsOn)) { ?>
                                            <option value="<?php echo $rowDependsOnOption["id"]; ?>"><?php echo $rowDependsOnOption["full_name_eng"]; ?></option>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>  
                                
                                <?php } ?>
                                
                                <?php if($rowValueInput["type"] == "individual") { ?>
                                
                                       <input id="grpId" type="hidden" name="grp" value="">
                                       <input type="hidden" name="depend" id="dependId" value="">
                                
                                <?php } ?>
                                 
                                <!------------------Mobile---------------->                             
                            	<tr>
                                	<td class="col3"><strong>Mobile :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="mbl" value="<?php echo $rowValueInput["mobile"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!------------------Occupation------------------->
                            	<!--<tr>
                                	<td class="col3"><strong>Occupation :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="occ" id="occupationId">
                                            <option style="display:none;" disabled selected><?php //echo $rowValueInput["occupation"]; ?></option>
                                            <option value="Teacher">Teacher</option>
                                            <option value="Business">Business</option>
                                            <option value="Doctor">Doctor</option>
                                        </select>
                                    </td>
                                </tr>-->
                                <tr>
                                	<td class="col3"><strong>Occupation :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="occ" value="<?php echo $rowValueInput["occupation"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!-------------------Marital Status----------------------->
                            	<tr>
                                	<td class="col3"><strong>Marital Status :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="ms" id="msId">
                                            <option style="display:none;" disabled selected><?php echo $rowValueInput["marital_status"]; ?></option>
                                            <option value="Married">Married</option>
                                            <option value="Unmarried">Unmarried</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                       <!-- </form>-->
                        <div style="clear:both;"></div>
                    </div>
                    
                    <div style="clear:both;"></div>
                </div>
                
                <!-----------------Picture-container----------->
                <div class="w3-half picture-container">
                    <div class="picture w3-card-4">
                    	<h3 class="w3-container w3-deep-orange w3-center" style="margin-top:0px;border-radius:8px 8px 0px 0px;">Picture</h3>
                        <div>
                        	<div class="w3-card-4 picture-content">
                            
                            	<img alt="Picture can't be found. Choose one" id="imageUploadId" style="width:100%;height:100%;border-radius:50%;" 
								<?php if($rowValueInput["image_name"] != NULL) { ?> 
                                	src="uploads/<?php echo $rowValueInput["image_name"]; ?>" 
								<?php } ?>
                                <?php if($rowValueInput["image_name"] == NULL) { ?> 
                                	src="images/blankImage.gif" 
								<?php } ?>
                                >
                                
                            </div>
                            <div class="imageFileContainer">
                            	<input id="myFileId" style="width:215px;display:block;margin:auto;" type="file" name="myFile">
                            </div>
                			<p style="padding:0px 20px;">[File format *jpg / *png Dimension width (90-110)px and height (90-120)px. File size(4-56)kb]</p>
                        </div>
                    </div>
                </div>
            </div>
            

            
            <div class="w3-row">
            
            	<!---------------------Current Address------------------->
                <div class="w3-half personalInfo-container">
                
                    <div class="personalInfo w3-card-4">
                    	<h3 class="w3-container w3-green w3-center" style="margin-top:0px;border-radius:8px 8px 0px 0px;">Current Address</h3>
                        
                        
                       <!-- <form>-->
                        	<table>
                            
                            	<!---------------------Current District------------------->
                            	<tr>
                                	<td class="col3"><strong>District :</stro ng></td>
                                    <td class="col4">
                                        <select class="w3-select" name="currDist" id="currDistId">
                                            <option style="display:none;" disabled selected><?php echo $rowValueInput["curr_district"]; ?></option>
                                            <option style="font-weight:bold;color:red;" disabled>Barisal Division</option>
                                            <option value="Barguna">Barguna</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Bhola">Bhola</option>
                                            <option value="Jhalokati">Jhalokati</option>
                                            <option value="Patuakhali">Patuakhali</option>
                                            <option value="Pirojpur">Pirojpur</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Chittagong Division</strong></option>
                                            <option value="Bandarban">Bandarban</option>
                                            <option value="Brahmanbaria">Brahmanbaria</option>
                                            <option value="Chandpur">Chandpur</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Coxs-bazar">Coxs-bazar</option>
                                            <option value="Feni">Feni</option>
                                            <option value="Khagrachhari">Khagrachhari</option>
                                            <option value="Lakshmipur">Lakshmipur</option>
                                            <option value="Noakhali">Noakhali</option>
                                            <option value="Rangamati">Rangamati</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled>Dhaka Division</option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Faridpur">Faridpur</option>
                                            <option value="Gazipur">Gazipur</option>
                                            <option value="Gopalganj">Gopalganj</option>
                                            <option value="Jamalpur">Jamalpur</option>
                                            <option value="Kishoregonj">Kishoregonj</option>
                                            <option value="Madaripur">Madaripur</option>
                                            <option value="Manikganj">Manikganj</option>
                                            <option value="Munshiganj">Munshiganj</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Narayanganj">Narayanganj</option>
                                            <option value="Narsingdi">Narsingdi</option>
                                            <option value="Netrokona">Netrokona</option>
                                            <option value="Rajbari">Rajbari</option>
                                            <option value="Shariatpur">Shariatpur</option>
                                            <option value="Sherpur">Sherpur</option>
                                            <option value="Tangail">Tangail</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled>Khulna Division</option>
                                            <option value="Bagerhat">Bagerhat</option>
                                            <option value="Chuadanga">Chuadanga</option>
                                            <option value="Jessore">Jessore</option>
                                            <option value="Jhenaidah">Jhenaidah</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Kushtia">Kushtia</option>
                                            <option value="Magura">Magura</option>
                                            <option value="Meherpur">Meherpur</option>
                                            <option value="Narail">Narail</option>
                                            <option value="Satkhira">Satkhira</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled>Rajshahi Division</option>
                                            <option value="Bogra">Bogra</option>
                                            <option value="Chapainababganj">Chapainababganj</option>
                                            <option value="Joypurhat">Joypurhat</option>
                                            <option value="Pabna">Pabna</option>
                                            <option value="Naogaon">Naogaon</option>
                                            <option value="Natore">Natore</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sirajganj">Sirajganj</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled>Rangpur Division</option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Gaibandha">Gaibandha</option>
                                            <option value="Kurigram">Kurigram</option>
                                            <option value="Lalmonirhat">Lalmonirhat</option>
                                            <option value="Nilphamari">Nilphamari</option>
                                            <option value="Panchagarh">Panchagarh</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Thakurgaon">Thakurgaon</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled>Sylhet Division</option>
                                            <option value="Habiganj">Habiganj</option>
                                            <option value="Maulvibazar">Maulvibazar</option>
                                            <option value="Sunamganj">Sunamganj</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <!---------------------Current Police Station------------------->
                                <tr>
                                	<td class="col3"><strong>Police Station :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="currPolice" value="<?php echo $rowValueInput["curr_police_station"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                 <!---------------------Current Address------------------->                             
                            	<tr>
                                	<td class="col3"><strong>Address :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="currAdd" value="<?php echo $rowValueInput["curr_address"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Current Post Code------------------->
                            	<tr>
                                	<td class="col3"><strong>Post Code :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="currPost" value="<?php echo $rowValueInput["curr_post_code"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                            </table>
                        <!--</form>-->
                        <div style="clear:both;"></div>
                    </div>
                    
                    <div style="clear:both;"></div>
                </div>
                
                
                <!---------------------Permanent Address------------------->
                <div class="w3-half personalInfo-container">
                
                    <div class="personalInfo w3-card-4">
                    	<h3 class="w3-container w3-green w3-center" style="margin-top:0px;border-radius:8px 8px 0px 0px;">Permanent Address</h3>
                        
                        
                        <!--<form>-->
                        	<table>
                            
                            	<!---------------------Permanent District------------------->
                            	<tr>
                                	<td class="col3"><strong>District :</stro ng></td>
                                    <td class="col4">
                                        <select class="w3-select" name="perDist" id="perDistId">
                                            <option style="display:none;" disabled selected><?php echo $rowValueInput["per_district"]; ?></option>
                                            <option style="font-weight:bold;color:red;" disabled><strong>Barisal Division</strong></option>
                                            <option value="Barguna">Barguna</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Bhola">Bhola</option>
                                            <option value="Jhalokati">Jhalokati</option>
                                            <option value="Patuakhali">Patuakhali</option>
                                            <option value="Pirojpur">Pirojpur</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Chittagong Division</strong></option>
                                            <option value="Bandarban">Bandarban</option>
                                            <option value="Brahmanbaria">Brahmanbaria</option>
                                            <option value="Chandpur">Chandpur</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Coxs-bazar">Coxs-bazar</option>
                                            <option value="Feni">Feni</option>
                                            <option value="Khagrachhari">Khagrachhari</option>
                                            <option value="Lakshmipur">Lakshmipur</option>
                                            <option value="Noakhali">Noakhali</option>
                                            <option value="Rangamati">Rangamati</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Dhaka Division</strong></option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Faridpur">Faridpur</option>
                                            <option value="Gazipur">Gazipur</option>
                                            <option value="Gopalganj">Gopalganj</option>
                                            <option value="Jamalpur">Jamalpur</option>
                                            <option value="Kishoregonj">Kishoregonj</option>
                                            <option value="Madaripur">Madaripur</option>
                                            <option value="Manikganj">Manikganj</option>
                                            <option value="Munshiganj">Munshiganj</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Narayanganj">Narayanganj</option>
                                            <option value="Narsingdi">Narsingdi</option>
                                            <option value="Netrokona">Netrokona</option>
                                            <option value="Rajbari">Rajbari</option>
                                            <option value="Shariatpur">Shariatpur</option>
                                            <option value="Sherpur">Sherpur</option>
                                            <option value="Tangail">Tangail</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Khulna Division</strong></option>
                                            <option value="Bagerhat">Bagerhat</option>
                                            <option value="Chuadanga">Chuadanga</option>
                                            <option value="Jessore">Jessore</option>
                                            <option value="Jhenaidah">Jhenaidah</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Kushtia">Kushtia</option>
                                            <option value="Magura">Magura</option>
                                            <option value="Meherpur">Meherpur</option>
                                            <option value="Narail">Narail</option>
                                            <option value="Satkhira">Satkhira</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Rajshahi Division</strong></option>
                                            <option value="Bogra">Bogra</option>
                                            <option value="Chapainababganj">Chapainababganj</option>
                                            <option value="Joypurhat">Joypurhat</option>
                                            <option value="Pabna">Pabna</option>
                                            <option value="Naogaon">Naogaon</option>
                                            <option value="Natore">Natore</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sirajganj">Sirajganj</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Rangpur Division</strong></option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Gaibandha">Gaibandha</option>
                                            <option value="Kurigram">Kurigram</option>
                                            <option value="Lalmonirhat">Lalmonirhat</option>
                                            <option value="Nilphamari">Nilphamari</option>
                                            <option value="Panchagarh">Panchagarh</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Thakurgaon">Thakurgaon</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Sylhet Division</strong></option>
                                            <option value="Habiganj">Habiganj</option>
                                            <option value="Maulvibazar">Maulvibazar</option>
                                            <option value="Sunamganj">Sunamganj</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <!---------------------Permanent Police Station------------------->
                            	<tr>
                                	<td class="col3"><strong>Police Station :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="perPolice" value="<?php echo $rowValueInput["per_police_station"]; ?>" type="text"></p>
                                    </td>
                                </tr>               
                                
                                <!---------------------Permanent Address------------------->              
                            	<tr>
                                	<td class="col3"><strong>Address :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="perAdd" value="<?php echo $rowValueInput["per_address"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Permanent Post Code------------------->   
                            	<tr>
                                	<td class="col3"><strong>Post Code :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="perPost" value="<?php echo $rowValueInput["per_post_code"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                            </table>
                        <!--</form>-->
                        <div style="clear:both;"></div>
                    </div>
                    
                    <div style="clear:both;"></div>
                </div>
                
            </div>
            
            <div class="w3-row">
            
            	<!---------------------Passport Info------------------->
                <div class="w3-half personalInfo-container">
                
                    <div class="personalInfo w3-card-4">
                    	<h3 class="w3-container w3-teal w3-center" style="margin-top:0px;border-radius:8px 8px 0px 0px;">Passport Information (in English) - optional</h3>
                        
                        
                        <!--<form>-->
                        	<table>
                            
                            	<!---------------------Passpot No------------------->
                            	<tr>
                                	<td class="col3"><strong>Passpot No :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passNo" value="<?php echo $rowValueInput["passport_no"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Passport Type------------------->
                            	<tr>
                                	<td class="col3"><strong>Passport Type :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="passType" id="passTypeId">
                                            <option style="display:none;" disabled selected><?php echo $rowValueInput["passport_type"]; ?></option>
                                            <option value="Passport1">Passport1</option>
                                            <option value="Passport2">Passport2</option>
                                            <option value="Passport3">Passport3</option>
                                        </select>
                                    </td>
                                </tr>  
                                
                                <!---------------------Date of Issues------------------->                              
                            	<tr>
                                	<td class="col3"><strong>Date of Issues :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passDoi" value="<?php echo $rowValueInput["date_of_issues"]; ?>" type="date"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Date of Expiry------------------->  
                            	<tr>
                                	<td class="col3"><strong>Date of Expiry :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passExp" 
                                        value="<?php echo $rowValueInput["date_of_expiry"]; ?>" type="date"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Place of Issuing Authority-------------------> 
                            	<tr>
                                	<td class="col3"><strong>Place of Issuing Authority :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passPia" value="<?php echo $rowValueInput["place_of_issuing_authority"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------District------------------->
                            	<tr>
                                	<td class="col3"><strong>District :</strong></td>
                                    <td class="col4">
                                        <select class="w3-select" name="passDist" id="passDistId">
                                            <option style="display:none;" disabled selected><?php echo $rowValueInput["pass_district"]; ?></option>
                                            <option style="font-weight:bold;color:red;" disabled><strong>Barisal Division</strong></option>
                                            <option value="Barguna">Barguna</option>
                                            <option value="Barisal">Barisal</option>
                                            <option value="Bhola">Bhola</option>
                                            <option value="Jhalokati">Jhalokati</option>
                                            <option value="Patuakhali">Patuakhali</option>
                                            <option value="Pirojpur">Pirojpur</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Chittagong Division</strong></option>
                                            <option value="Bandarban">Bandarban</option>
                                            <option value="Brahmanbaria">Brahmanbaria</option>
                                            <option value="Chandpur">Chandpur</option>
                                            <option value="Chittagong">Chittagong</option>
                                            <option value="Comilla">Comilla</option>
                                            <option value="Coxs-bazar">Coxs-bazar</option>
                                            <option value="Feni">Feni</option>
                                            <option value="Khagrachhari">Khagrachhari</option>
                                            <option value="Lakshmipur">Lakshmipur</option>
                                            <option value="Noakhali">Noakhali</option>
                                            <option value="Rangamati">Rangamati</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Dhaka Division</strong></option>
                                            <option value="Dhaka">Dhaka</option>
                                            <option value="Faridpur">Faridpur</option>
                                            <option value="Gazipur">Gazipur</option>
                                            <option value="Gopalganj">Gopalganj</option>
                                            <option value="Jamalpur">Jamalpur</option>
                                            <option value="Kishoregonj">Kishoregonj</option>
                                            <option value="Madaripur">Madaripur</option>
                                            <option value="Manikganj">Manikganj</option>
                                            <option value="Munshiganj">Munshiganj</option>
                                            <option value="Mymensingh">Mymensingh</option>
                                            <option value="Narayanganj">Narayanganj</option>
                                            <option value="Narsingdi">Narsingdi</option>
                                            <option value="Netrokona">Netrokona</option>
                                            <option value="Rajbari">Rajbari</option>
                                            <option value="Shariatpur">Shariatpur</option>
                                            <option value="Sherpur">Sherpur</option>
                                            <option value="Tangail">Tangail</option> 
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Khulna Division</strong></option>
                                            <option value="Bagerhat">Bagerhat</option>
                                            <option value="Chuadanga">Chuadanga</option>
                                            <option value="Jessore">Jessore</option>
                                            <option value="Jhenaidah">Jhenaidah</option>
                                            <option value="Khulna">Khulna</option>
                                            <option value="Kushtia">Kushtia</option>
                                            <option value="Magura">Magura</option>
                                            <option value="Meherpur">Meherpur</option>
                                            <option value="Narail">Narail</option>
                                            <option value="Satkhira">Satkhira</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Rajshahi Division</strong></option>
                                            <option value="Bogra">Bogra</option>
                                            <option value="Chapainababganj">Chapainababganj</option>
                                            <option value="Joypurhat">Joypurhat</option>
                                            <option value="Pabna">Pabna</option>
                                            <option value="Naogaon">Naogaon</option>
                                            <option value="Natore">Natore</option>
                                            <option value="Rajshahi">Rajshahi</option>
                                            <option value="Sirajganj">Sirajganj</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Rangpur Division</strong></option>
                                            <option value="Dinajpur">Dinajpur</option>
                                            <option value="Gaibandha">Gaibandha</option>
                                            <option value="Kurigram">Kurigram</option>
                                            <option value="Lalmonirhat">Lalmonirhat</option>
                                            <option value="Nilphamari">Nilphamari</option>
                                            <option value="Panchagarh">Panchagarh</option>
                                            <option value="Rangpur">Rangpur</option>
                                            <option value="Thakurgaon">Thakurgaon</option>
                                            
                                            <option style="font-weight:bold;color:red;" disabled><strong>Sylhet Division</strong></option>
                                            <option value="Habiganj">Habiganj</option>
                                            <option value="Maulvibazar">Maulvibazar</option>
                                            <option value="Sunamganj">Sunamganj</option>
                                            <option value="Sylhet">Sylhet</option>
                                        </select>
                                    </td>
                                </tr>
                                
                                <!---------------------Passport Police Station------------------->
                            	<tr>
                                	<td class="col3"><strong>Police Station :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passPolice" value="<?php echo $rowValueInput["pass_police_station"]; ?>" type="text"></p>
                                    </td>
                                </tr>  
                                
                                <!---------------------Passport Address------------------->                              
                            	<tr>
                                	<td class="col3"><strong>Address :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passAdd" value="<?php echo $rowValueInput["pass_address"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                                <!---------------------Passport Post Code-------------------> 
                            	<tr>
                                	<td class="col3"><strong>Post Code :</strong></td>
                                    <td class="col4">
                                        <input class="w3-input w3-border w3-round" name="passPost" value="<?php echo $rowValueInput["pass_post_code"]; ?>" type="text"></p>
                                    </td>
                                </tr>
                                
                            </table>
                        </form>
                        <div style="clear:both;"></div>
                    </div>
                                    
                    <div style="clear:both;"></div>
                </div>

            </div>
            
        </div>
        <div style="clear:both;"></div>
        
    </div>
    
    <div style="position:relative;top:90px;padding:10px 20px;" class="w3-light-grey w3-border w3-grey">
        <a id="saveBtnId" class="w3-btn w3-blue w3-right w3-large" href="#">Save</a>
        <div style="clear:both;"></div>
    </div>
    

    <!-----------------------------Sending Infos to afterNidFormProcess.php------------------------>
    <script>
		$(document).ready(function() {
			
            $("#saveBtnId").click(function() {
				
				var fd = new FormData(document.querySelector("#updateFormId"));
				
				fd.append("id", <?php echo $rowValueInput["id"]; ?>);
				fd.append("grp",document.getElementById("grpId").value);
				fd.append("depend",document.getElementById("dependId").value);
				fd.append("currDist",document.getElementById("currDistId").value);
				//fd.append("occ",document.getElementById("occupationId").value);
				fd.append("ms",document.getElementById("msId").value);
				//fd.append("currPolice",document.getElementById("currPoliceId").value);
				fd.append("perDist",document.getElementById("perDistId").value);
				//fd.append("perPolice",document.getElementById("perPoliceId").value);
				fd.append("passType",document.getElementById("passTypeId").value);
				fd.append("passDist",document.getElementById("passDistId").value);
				//fd.append("passPolice",document.getElementById("passPoliceId").value);
				
				$.ajax({
					
					url: "afterNidFormProcess.php",
					type: "POST",
					data: fd,
					contentType: false,
					processData: false,
					success: function(e) {
						if(e.indexOf("success") != -1) {
							alert("Updated Successfully!");	
						}
						if(e.indexOf("failed") != -1) {
							alert("Nothing Updated!");	
						}
						//alert(e);
					}
						
				});
					
			}); //-----click()----
			
			//------when image is changed
			$("#myFileId").change(function(){
				readURL(this);
			});
			
        }); //---ready()----
		
		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();
				
				reader.onload = function (e) {
					$('#imageUploadId').attr('src', e.target.result);
				}
				
				reader.readAsDataURL(input.files[0]);
			}
		}
		
	</script>
    
	<!---------------Drop-Down JavaScript------------>
	<script>
		function myFunction() {
			var x = document.getElementById("demo");
			if (x.className.indexOf("w3-show") == -1) {
				x.className += " w3-show";
			} else { 
				x.className = x.className.replace(" w3-show", "");
			}
		}
    </script>
    
    <!---------------language() Function------------>
    <script>
    
		language("English");
		
		function language(val) {
			var x = document.getElementById("Demo");
			document.getElementById("demoBtn").innerHTML = val;	
			x.className = x.className.replace(" w3-show", "");
		}
    </script>

</body>
</html>