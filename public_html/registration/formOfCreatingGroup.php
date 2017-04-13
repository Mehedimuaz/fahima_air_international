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
<title>Group Creation</title>

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
    
    <div class="container">
    	<h2>New Group</h2>
        <hr>
        <div class="w3-card-2" style="border-radius:8px;"> <!----- style="border:1px solid black;"------>
        	<div class="w3-container w3-blue w3-padding-8" style="border-radius:8px 8px 0px 0px;height:30px;"></div>
            <div style="clear:both;"></div>
            <div id="successAlertId" style="display:none;" class="alert w3-container w3-green w3-round-large w3-margin-top">
            	<span onclick="this.parentElement.style.display='none'" class="w3-closebtn">&times;</span>
                <h3>Success!</h3>
                <p>Group has been created!</p>
            </div>             
            <form class="w3-padding-8" id="groupFormId" name="groupFormName" onSubmit="return false"> <!----- style="border:1px solid black;"------>
            	<table>
                	<tr>
                    	<td class="col1"><strong>Management:</strong></td>
                        <td class="col2">
                            <select class="w3-select" name="management">
                                <option value="" disabled selected>Choose Management Type</option>
                                <option value="Government">Government</option>
                                <option value="Private">Private</option>
                            </select>
                            <p class="error" id="managementErr"></p>
                        </td>
                    </tr>
                    <tr>
                    	<td class="col1"><strong>Name of Group:</strong></td>
                        <td class="col2">
                            <input name="grp_name" class="w3-input w3-border" type="text">
                            <p class="error" id="grpNameErr"></p>
                        </td>
                    </tr> 
                    <tr>
                    	<td class="col1"><strong>Details:</strong></td>
                        <td class="col2">
                            <input name="details" class="w3-input w3-border" type="text">
                            <p class="error" id="detailsErr"></p>
                        </td>
                        
                    </tr>
                    
                    <?php
                    	$selectLeaderName = "SELECT id,full_name_eng,type FROM priligrim_info WHERE type='group' ORDER BY full_name_eng ASC";
						$resultLeaderName = mysqli_query($connection,$selectLeaderName);
                    ?>
                    
                    <tr>
                    	<td class="col1"><strong>Leader:</strong></td>
                        <td class="col2">
                            <select class="w3-select" name="leader">
                            	<option value="" disabled selected>Choose a Leader Name</option>
                                <?php while($rowLeaderName = mysqli_fetch_assoc($resultLeaderName)) { ?>
                                <option value="<?php echo $rowLeaderName["id"] ?>"><?php echo $rowLeaderName["full_name_eng"]; ?></option>
                                <?php } ?>
                            </select>
                        	<p class="error" id="leaderErr"></p>
                        </td>
                    </tr>               
                </table>
                <div style="clear:both;"></div>
            </form>
            <div class="w3-container w3-padding-8">
            	<a class="w3-light-grey w3-round w3-btn w3-left w3-border" href="#"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
                <a class="w3-btn w3-round w3-blue w3-right" id="saveBtnId"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</a>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>

	<!----------------Send Datas to Group Table Using AJAX------------>
	<script>
    	$(document).ready(function() {
            
			$("#saveBtnId").click(function() {
				
				var fd = new FormData(document.querySelector("#groupFormId"));
				
				$.ajax({
					url: "creatingGroupProcess.php",
					type: "POST",
					data: fd,
					contentType: false,
					processData: false,
					success: function(output) {
						if(output.indexOf("success") != -1) {
							$("#successAlertId").fadeIn(1000);
							document.getElementById("groupFormId").reset();
							document.getElementById("managementErr").innerHTML = "";
							document.getElementById("grpNameErr").innerHTML = "";
							document.getElementById("detailsErr").innerHTML = "";
							document.getElementById("leaderErr").innerHTML = "";
						}
						if(output.indexOf("failed") != -1) {
							alert("Something went wrong!");
						} else {
							var grpFoo = JSON.parse(output);
							
							document.getElementById("managementErr").innerHTML = grpFoo[0];
							document.getElementById("grpNameErr").innerHTML = grpFoo[1];
							document.getElementById("detailsErr").innerHTML = grpFoo[2];
							document.getElementById("leaderErr").innerHTML = grpFoo[3];
						}
					}
				});
				
			}); //---click()---
			
        }); //---ready()------
    </script>
    
</body>
</html>