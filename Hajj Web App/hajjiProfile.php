<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Hajji Profile</title>

<style>
	
	* {
		margin:0px;
		padding:0px;
		box-sizing:border-box;	
	}
	
	.picture-content {
		width:150px;
		height:190px;
		border-radius:50%;
		padding:5px;
		margin:auto;
	}
	
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

    <?php include_once("header.php"); ?> 
    
    <style>
		.container {
			position:relative;
			top:70px;
			/*border:1px solid black;	*/
		}
		
		td {
			/*border:1px solid black;*/	
		}
		
		.col1 {
			height:25px;
			width:150px;
			text-align:left;
			padding-left:30px;	
		}
		
		.col2 {
			height:25px;
			width:265px;
			text-align:left;
			padding-left:20px;	
		}
		
		.col3 {
			height:30px;
			width:150px;
			text-align:left;
		}
		
		.col4 {
			height:30px;
			text-align:left;
			padding-left:20px;
		}
		
		table {
			width:415px;
			margin:auto;
			/*border:1px solid black;*/
		}
	</style>
    
    <?php
	
		$selectProfile = "SELECT * FROM priligrim_info WHERE id={$_GET['id']}";
		$resultProfile = mysqli_query($connection,$selectProfile);
		
		$rowProfile = mysqli_fetch_assoc($resultProfile);
		
	?>
    
    <div class="container">
    	<div class="infoContainer w3-round-large w3-card-2" style="width:1300px;margin:auto;"><!---------border:1px solid black;-------->
        	<h3 class="w3-center w3-padding-8 w3-blue" style="margin:0px;border-radius:8px 8px 0px 0px;">Profile of <?php echo $rowProfile["full_name_eng"]; ?></h3>
            <div class="w3-row" style="width:1300px;"><!---------border:1px solid black;-------->
            	<div class="w3-padding-16" style="width:250px;float:left;"><!---------border:1px solid black;-------->
                	<div class="w3-card-4 picture-content">
                        <img alt="Picture can't be found. Choose one" id="imageUploadId" style="width:100%;height:100%;border-radius:50%;" 
                        <?php if($rowProfile["image_name"] != NULL) { ?> 
                            src="uploads/<?php echo $rowProfile["image_name"]; ?>" 
                        <?php } ?>
                        <?php if($rowProfile["image_name"] == NULL) { ?> 
                            src="images/blankImage.gif" 
                        <?php } ?>
                        >
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="" style="width:400px;float:left;"><!---------border:1px solid black;-------->
                	<table class="w3-padding-8 w3-round-large">
                    
                    	<tr>
                        	<td colspan="2"><h3 style="margin:0px;padding-left:30px;">Personal Information</h3></td>
                        </tr>
                    	<tr>
                        	<td class="col1 w3-slim"><strong>NID:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["nid"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Name(English):</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["full_name_eng"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Name(Bangla):</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["full_name_ban"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Father Name:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["father_name"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Occupation:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["occupation"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Date of Birth:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["dob"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Mobile:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["mobile"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>National ID:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["nid"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Gender:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["gender"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Marital Status:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["marital_status"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Type:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["type"]; ?></td>
                        </tr>
                        
                        <!------------Select Group Name---------------->
                        
                        <?php
							$selectGrpName = "SELECT grp_name FROM groups WHERE grp_id={$rowProfile['grp_id']}";
							$resultGrpName = mysqli_query($connection,$selectGrpName);
							
							$rowGrpName = mysqli_fetch_assoc($resultGrpName);
						?>	
                        
                        <tr>
                        	<td class="col1 w3-slim"><strong>Gorup Name:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowGrpName["grp_name"]; ?></td>
                        </tr>
                        
                    	<tr>
                        	<td colspan="2"><h3 style="margin:0px;padding-left:30px;"><br/>Passport Information</h3></td>
                        </tr>
                    	<tr>
                        	<td class="col1 w3-slim"><strong>Passport No:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["passport_no"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Passport Type:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["passport_type"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Date of Issues:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["date_of_issues"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Date of Expiry:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["date_of_expiry"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Place of Issuing Authority :</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["place_of_issuing_authority"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>District:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["pass_district"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Police Station:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["pass_police_station"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Address :</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["pass_address"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col1 w3-slim"><strong>Post Code:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowProfile["pass_post_code"]; ?></td>
                        </tr>
                        
                        <!------------Select Group Name---------------->
                        
                        <?php
							$selectGrpName = "SELECT grp_name FROM groups WHERE grp_id={$rowProfile['grp_id']}";
							$resultGrpName = mysqli_query($connection,$selectGrpName);
							
							$rowGrpName = mysqli_fetch_assoc($resultGrpName);
						?>	
                        
                        <tr>
                        	<td class="col1 w3-slim"><strong>Gorup Name:</strong></td>
                            <td class="col2 w3-slim"><?php echo $rowGrpName["grp_name"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div style="width:500px;float:left;"><!---------border:1px solid black;-------->
                	
                	<table class="w3-padding-8 w3-round-large">
                    	<tr>
                        	<td colspan="2"><h3 style="margin:0px;">Current Address</h3></td>
                        </tr>
                    	<tr>
                        	<td class="col3 w3-slim"><strong>Address:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["curr_address"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>Police Station:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["curr_police_station"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>District:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["curr_district"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>Division:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["curr_division"]; ?></td>
                        </tr>
                        
                        <tr>
                        	<td colspan="2"><h3 style="margin:0px;"><br/>Permanent Address</h3></td>
                        </tr>
                    	<tr>
                        	<td class="col3 w3-slim"><strong>Address:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["per_address"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>Police Station:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["per_police_station"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>District:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["per_district"]; ?></td>
                        </tr>
                        <tr>
                        	<td class="col3 w3-slim"><strong>Division:</strong></td>
                            <td class="col4 w3-slim"><?php echo $rowProfile["per_division"]; ?></td>
                        </tr>
                    </table>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        
        <div class="w3-container w3-padding-8 w3-margin-top w3-round-large w3-card-2" style="width:1300px;margin:auto;">
        	<a class="w3-btn w3-border w3-light-grey w3-round w3-left" href="#">Close</a>
            <a class="w3-btn w3-red w3-round w3-right w3-margin-left" id="deleteProfileBtnId" onClick="deleteProfile()"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
            <a class="w3-btn w3-blue w3-round w3-right" href="afterNidForm.php?extraValMaleAdultName=<?php echo $rowProfile["nid"]; ?>&extraValMaleAdultBcName=<?php echo $rowProfile["bc"]; ?>&id=<?php echo $rowProfile["id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
        </div>
        
        <div style="clear:both;"></div>
    </div>
    
    <!---------------Deleting Profile------------------->
    
    <script>
	
		function deleteProfile() {
			var r = confirm("Are you sure you want to delete this Profile");
			if(r == true) {
				var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange=function() {
					if (this.readyState == 4 && this.status == 200) {
						if((this.responseText).indexOf("success") != -1) {
							alert("Deleted succesfully");
							window.location = "home.php"
						} 
						else {
							alert("To delete this profile you have to update the leader of " + this.responseText.trim());	
						}
					}
				};
				xhttp.open("GET", "deleteProfileProcess.php?id=" + <?php echo $rowProfile["id"]; ?>, true);
				xhttp.send();
			} 
		}
	
	</script>
    
</body>
</html>