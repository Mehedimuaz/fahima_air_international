<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-green.css">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3-theme-blue.css">

<style>
	* {
		margin:0px;
		padding:0px;
		box-sizing:border-box;	
	}
	
	div,span,p,h2,h1,table,tr,td {
		padding:0px;
		margin:0px;	
	}
	
	.container {
		position:relative;
		top:55px;
		/*border:1px solid black;	*/
		padding:0px 16px;
		width:100%;
	}
	
	.tableContainer {
		width:100%;	
		border-radius:8px;
	}
	
	table {
		width:100%;	
	}
	
	td {
		/*border:1px solid black;*/
		height:50px;
	}
	
	.col1 {
		width:23.07692307692308%;
		text-align:center;	
	}
	
	.col3 {
		width:20.74074074074074%;
		padding-right:30px;
	}
	
	.tableContainer {
		/*border:1px solid black;	*/
	}
	
	.details img {
		width:68px;
		height:80px;
		float:left;
		border-radius:4px;	
	}
	
	.details {
		padding-top:8px;
	}
	
	.detailsContainer {
		width:33.33%;
		float:left;	
	}
	
	.detailsBtnContainer {
		 margin-top:8px;	
	}
	
	.detailsPara {
		 width:230px;
		 float:left;
		 position:relative;
		 left:10px;	
	}
	
	.detailsContainerOutside {
		padding-bottom:16px;	
	}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

	<?php include_once("header.php"); ?>
    
    <div class="container">
    	
        <h2 class="w3-container">Groups</h2><!----------- style="border:1px solid black;"------------->
        
		<!---------Selecting Group Member Infos from table using grp_id--------------------->
		<?php
			$selectManagemetDetails = "SELECT management,details,grp_name,leader FROM groups WHERE grp_id='{$_GET['grp_id']}'";
			$resultManagemetDetails = mysqli_query($connection,$selectManagemetDetails);
			
			$rowManagemetDetails = mysqli_fetch_assoc($resultManagemetDetails);
		?>
        
        <div class="tableContainer w3-margin-top w3-card-4">
        	<h2 class="w3-container w3-blue" style="border-radius:8px 8px 0px 0px;">Group: <?php echo $rowManagemetDetails["grp_name"]; ?></h2>
            <table>
            	<tr>
                	<td class="col1"><strong>Management</strong></td>
                    <td class="col2"><?php echo $rowManagemetDetails["management"]; ?></td>
                    
                    <!--------Edit Button--------------->
                    
                    <td class="col3">
                    <a class="editBtn w3-btn w3-blue w3-round" href="updateGrpInfo.php?grp_id=<?php echo $_GET["grp_id"]; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                    <a class="editBtn w3-btn w3-red w3-round" style="margin-left:5px;" id="deleteGrpBtnId"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
                    </td>
                </tr>
                <tr>
                	<td class="col1"><strong>Details</strong></td>
                    <td class="col2"><?php echo $rowManagemetDetails["details"]; ?></td>
                </tr>
            </table>
            <div style="clear:both;"></div>
        </div>
        
        <p class="w3-container w3-round w3-padding-16 w3-margin-top w3-theme-l4" style="color:#2196F3 !important;">Group member list</p><!--------------border:1px solid black;------------->
        
		<!---------Selecting Group Member Infos from table using grp_id--------------------->
		<?php
			$selectGrpMember = "SELECT id,full_name_eng,dob,nid,bc,image_name FROM priligrim_info WHERE grp_id='{$_GET['grp_id']}' ORDER BY full_name_eng";
			$resultGrpMember = mysqli_query($connection,$selectGrpMember);
		?>


        <div class="w3-row w3-border w3-container detailsContainerOutside">
        
        <?php while($rowGrpMember = mysqli_fetch_assoc($resultGrpMember)) { ?>
        
        
        	<div class="w3-container w3-margin-top detailsContainer">
            
            	<div class="details <?php if($rowManagemetDetails["leader"] != $rowGrpMember["id"]) { ?> w3-light-grey <?php } ?> w3-border w3-round" <?php if($rowGrpMember["id"] == $rowManagemetDetails["leader"]) { ?> style="color:#fff; background-color:#be3dd4" <?php } ?>>
                
                	<div class="w3-container"> <!----- style="border:1px solid black;"------->
                        <img style="font-size:12px;" alt="profile picture" src="uploads/<?php echo $rowGrpMember["image_name"]; ?>">
                        <p class="detailsPara">
                        	<strong><?php echo $rowGrpMember["full_name_eng"]; ?></strong><br/>
                            <strong>Date of Birth: </strong><?php echo $rowGrpMember["dob"]; ?><br/>
                            <?php if(!empty($rowGrpMember["nid"])) { ?>
                            <strong>NID No: </strong><?php echo $rowGrpMember["nid"]; ?><br/>
                            <?php } ?>
                            <?php if(!empty($rowGrpMember["bc"])) { ?>
                            <strong>BC No: </strong><?php echo $rowGrpMember["bc"]; ?><br/>
                            <?php } ?>
                        </p>
                        <div style="clear:both;">
                        </div>
                    </div>
                    
                    <div class="w3-border detailsBtnContainer">
                    	<a class="w3-btn-block w3-theme-l4" href="hajjiProfile.php?id=<?php echo $rowGrpMember["id"]; ?>"><span class="w3-left" style="color:#2196F3 !important;">Details</span><i class="fa fa-arrow-right w3-right" style="height:20px;width:20px;color:white;padding:2px 2px;background-color:#2196F3 !important;border-radius:50%;" aria-hidden="true"></i></a>
                    </div>
                    
                </div>
                
            </div>
            
        <?php } ?>
            
            <div style="clear:both;"></div>
        </div>
        
        <div class="w3-container w3-light-grey w3-border w3-margin-top w3-padding-8">
        	<a href="#" class="w3-btn w3-white w3-border w3-round"><i class="fa fa-times" aria-hidden="true"></i> Close</a>
        </div>
        
    </div><!-------div.container-------->
    
    <script>
		
		$(document).ready(function() {
            
			$("#deleteGrpBtnId").click(function() {
				var r = confirm("Are you sure, you want to delete this group?");
				
				if(r == true) {
					
					$.post(
					
						"deleteGroupProcess.php",
						{
							grpId: <?php echo $_GET["grp_id"]; ?>
						},
						function(output) {
							
							if(output.indexOf("success") != -1) {
								alert("This group has been deleted.");
								window.location = "groupList.php";
							}
							if(output.indexOf("failed") != -1) {
								alert("Something went wrong!");	
							}
							
						}
						
					); //post()------
					
				}
				
			}); //click()----
			
        }); //ready()------
		
	</script>

</body>
</html>