<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Update Group</title>

<style>
	* {
		padding:0px;
		margin:0px;
		box-sizing:border-box;	
	}
	
	.error {
		color:red;
		font-weight:bold;	
	}
	
	div,h2,input,a,ul,li,p,span {
		padding:0px;
		margin:0px;	
	}
	
	.container {
		width:100%;
		/*border:1px solid black;*/
		/*height:500px;*/
		position:relative;
		top:70px;
		padding:0px 32px;	
	}
	
	.selectOptionContainer {
		height:55px;
		padding-top:8px;
	}
	
	.selectBar {
		width:100px ;
	}
	
	.searchBar {
		width:500px;
	} 
	
	table {
		width:1300px;	
	}
	
	td {
		height:50px;
		/*border:1px solid black;*/	
	}
	
	.col1 {
		width:400px;
		text-align:right;	
	}
	
	.col2 {
		width:900px;
		padding-left:30px;
	}
	
	input {
		width:430px !important;	
	}
	
	select {
		width:430px !important;	
	}
	
	.alert {
		width:620px;
		margin:auto;	
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

    <?php include_once("header.php"); ?>  
    
    <!-------------------------Selecting informations from groups----------------------------->
    
    <?php
		$selectGrpInfo = "SELECT * FROM groups WHERE grp_id={$_GET['grp_id']}";
		$resultGrpInfo = mysqli_query($connection,$selectGrpInfo);
		
		$rowGrpInfo = mysqli_fetch_assoc($resultGrpInfo);
	?>
    
    <div class="container">
    	<h2>Update Group</h2>
        <hr>
        <div class="w3-card-2" style="border-radius:8px;"> <!----- style="border:1px solid black;"------>
        	<div class="w3-container w3-blue w3-padding-8" style="border-radius:8px 8px 0px 0px;height:30px;"></div>
            <div style="clear:both;"></div>
            <div id="successAlertId" style="display:none;" class="alert w3-container w3-green w3-round-large w3-margin-top">
            	<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
                <h3>Success!</h3>
                <p>Group has been created!</p>
            </div>             
            <form class="w3-padding-8" id="groupUpdateFormId" name="groupUpdateFormName" onSubmit="return false"> <!----- style="border:1px solid black;"------>
            	<table>
                
                	<!------------Management-------------------->
                	<tr>
                    	<td class="col1"><strong>Management:</strong></td>
                        <td class="col2">
                            <select class="w3-select" name="managementName" id="managementId">
                                <option style="display:none;" value="<?php echo $rowGrpInfo["management"]; ?>" disabled selected><?php echo $rowGrpInfo["management"]; ?></option>
                                <option value="Government">Government</option>
                                <option value="Private">Private</option>
                            </select>
                        </td>
                    </tr>
                    
                    <!-----------Name of Group-------------->
                    <tr>
                    	<td class="col1"><strong>Name of Group:</strong></td>
                        <td class="col2">
                            <input name="grp_name" class="w3-input w3-border" type="text" value="<?php echo $rowGrpInfo["grp_name"]; ?>">
                        </td>
                    </tr> 
                    
                    <!-------------------Details----------------->
                    <tr>
                    	<td class="col1"><strong>Details:</strong></td>
                        <td class="col2">
                            <input name="details" class="w3-input w3-border" type="text" value="<?php echo $rowGrpInfo["details"]; ?>">
                        </td>
                        
                    </tr>
                    
                    <!------------Leader to show in the dropdown list------------------->
                    
                    <?php
						$selectLeaderNamesDl = "SELECT id,full_name_eng FROM priligrim_info WHERE grp_id={$_GET['grp_id']}";
						$resultLeaderNamesDl = mysqli_query($connection,$selectLeaderNamesDl);
					?>
                    
                    <!-------------------Select the leader Id From groups----------------->
                    <?php
                    	$selectLeaderId = "SELECT leader FROM groups WHERE grp_id={$_GET['grp_id']}";
						$resultLeaderId = mysqli_query($connection,$selectLeaderId);
						
						$rowLeaderId = mysqli_fetch_assoc($resultLeaderId);
                    ?>
                    
                    <!-------------------Select the full_name_eng From priligrim_info----------------->
                    
                    <?php
						if($rowLeaderId['leader'] != NULL) {
						$selectLeaderName = "SELECT id,full_name_eng FROM priligrim_info WHERE id={$rowLeaderId['leader']}";
						$resultLeaderName = mysqli_query($connection,$selectLeaderName);
						
						$rowLeaderName = mysqli_fetch_assoc($resultLeaderName);
						}
					?>
                    
                    <!-------------------Leader---------------------->
                    <tr>
                    	<td class="col1"><strong>Leader:</strong></td>
                        <td class="col2">
                            <select class="w3-select" name="leaderName" id="leaderId">
                            	<?php if($rowLeaderId['leader'] != NULL) { ?>
                            	<option style="display:none;" value="<?php echo $rowLeaderName["id"]; ?>" disabled selected><?php echo $rowLeaderName["full_name_eng"]; ?></option>
                                <?php } ?>
                                <?php while($rowLeaderNamesDl = mysqli_fetch_assoc($resultLeaderNamesDl)) { ?>
                                <option value="<?php echo $rowLeaderNamesDl["id"] ?>"><?php echo $rowLeaderNamesDl["full_name_eng"]; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>               
                </table>
                <div style="clear:both;"></div>
            </form>
            <div class="w3-container w3-padding-8">
            	<a class="w3-light-grey w3-round w3-btn w3-left w3-border" href="#"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                <a class="w3-btn w3-round w3-blue w3-right" id="updateBtnId"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</a>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>

	<!----------------Send Datas to Group Table Using AJAX------------>
	<script>
    	$(document).ready(function() {
            
			$("#updateBtnId").click(function() {
				
				var fd = new FormData(document.querySelector("#groupUpdateFormId"));
				fd.append("grp_id",<?php echo $_GET["grp_id"]; ?>);
				fd.append("management",document.getElementById("managementId").value);
				fd.append("leader",document.getElementById("leaderId").value);
				
				$.ajax({
					url: "updateGrpProcess.php",
					type: "POST",
					data: fd,
					contentType: false,
					processData: false,
					success: function(output) {
						
						if(output.indexOf("success") != -1) {
							alert("Updated successfully!");	
						}
						if(output.indexOf("failed") != -1) {
							alert("Failed to update!");	
						}
						
					} //-------success()-----------
					
				}); //-----ajax()----
				
			}); //---click()---
			
        }); //---ready()------
    </script>
    
</body>
</html>