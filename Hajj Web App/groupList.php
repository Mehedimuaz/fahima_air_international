<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Group List</title>

<style>
	* {
		padding:0px;
		margin:0px;
		box-sizing:border-box;	
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
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>

    <?php include_once("header.php"); ?> 
    
    <div class="container">
    	<h2>List of Groups</h2>
        <hr>
        <div class="w3-card-2" style="border-radius:8px;"> <!----- style="border:1px solid black;"------>
        	<div class="w3-container w3-blue w3-padding-8" style="border-radius:8px 8px 0px 0px;height:55px;">  
            	<a class="w3-btn w3-light-grey w3-round" href="formOfCreatingGroup.php"><i class="fa fa-plus" aria-hidden="true"></i> New Group</a>
                <input class="w3-input w3-right w3-round searchBar" type="text" placeholder="search by Group Name" onKeyUp="showSearchResult(this.value)">
                
            </div>
            
            
            <!----------------------Searching process for grouplist------------------------------->
            <script>
			
				$(document).ready(function() {
                    $("#mainTableId").load("groupListLoad.php");
                });
			
				function showSearchResult(searchTerm) {
					
					
					if(searchTerm.length != 0 && searchTerm != " ") {
						
							$.get(
								
								"groupListSearchProcess.php",
								
								{
									searchVal: searchTerm
								},
								function(output) {
									document.getElementById("mainTableId").innerHTML = "";
									var grpListFoo = JSON.parse(output);
									var mainTable = document.getElementById("mainTableId");
									var tableRowElement = document.createElement("tr");
									
									//----------create table head(th) elements-------------
									
									var tableHeadGrpName = document.createElement("th");
									var tableHeadManagement = document.createElement("th");
									var tableHeadLeader = document.createElement("th");
									var tableHeadTotalPilgrims = document.createElement("th");
									var tableHeadPaidPilgrim = document.createElement("th");
									var tableHeadAction = document.createElement("th");
									
									
									//----------creating text nodes for th-------------------
									
									var thGrpNameText = document.createTextNode("Group Name");
									var thManagementText = document.createTextNode("Management");
									var thLeaderText = document.createTextNode("Leader Name");
									var thTotalPilgrimsText = document.createTextNode("Total Pilgrims");
									var thPaidPilgrimText = document.createTextNode("Paid Pilgrim");
									var thActionText = document.createTextNode("Action");
									
									//----------appending text with table heads--------------
									
									tableHeadGrpName.appendChild(thGrpNameText);
									tableHeadManagement.appendChild(thManagementText);
									tableHeadLeader.appendChild(thLeaderText);
									tableHeadTotalPilgrims.appendChild(thTotalPilgrimsText);
									tableHeadPaidPilgrim.appendChild(thPaidPilgrimText);
									tableHeadAction.appendChild(thActionText);
									
									
									//----------appending th with with tr-----------------------
									
									tableRowElement.appendChild(tableHeadGrpName);
									tableRowElement.appendChild(tableHeadManagement);
									tableRowElement.appendChild(tableHeadLeader);
									tableRowElement.appendChild(tableHeadTotalPilgrims);
									tableRowElement.appendChild(tableHeadPaidPilgrim);
									tableRowElement.appendChild(tableHeadAction);
									
									
									//---------appending tr with table------------------------
									
									mainTable.appendChild(tableRowElement);
									
									//alert(grpListFoo[1].grpName);
									
									for(i=0; i<grpListFoo.length; i++) {
										//alert(grpListFoo[i].grpName);	
										
										var tableRowElement = document.createElement("tr");
										
										//-------Create td elements-------------
										
										var colGrpName = document.createElement("td");
										var colManagement = document.createElement("td");
										var colLeader = document.createElement("td");
										var colTotalPilgrims = document.createElement("td");
										var colPaidPilgrim = document.createElement("td");
										var colAction = document.createElement("td");
										
										//--------Create text node for td-----------
										
										var textGrpName = document.createTextNode(grpListFoo[i].grpName);
										var textManagement = document.createTextNode(grpListFoo[i].management);
										var textLeader = document.createTextNode(grpListFoo[i].leader);
										var textTotalPiligrim = document.createTextNode(grpListFoo[i].piligrimNum);
										var textPaidPilgrim = document.createTextNode("2");
										
																			
										//------------create Button-----------------
										
										var actionBtn = document.createElement("a");
										actionBtn.className = "w3-btn w3-blue w3-round";
										
										
										//----------add href link to Open Button------------
										
										actionBtn.href = "grpMembers.php?grp_id="+grpListFoo[i].grpId;
										
										
										//----------create open icon------------------
										
										var openIcon = document.createElement("i");
										openIcon.className = "fa fa-folder-open";
										
										//------append icon to BUtton----------------
										actionBtn.appendChild(openIcon);
										
										
									   //-----------add text to Button-----------
									   
									   var textBtn = document.createTextNode(" Open");
										
										
										//---------append text in Button---------------
										
										actionBtn.appendChild(textBtn);
										
										
										//---------append Button in td column-----------
										
										colAction.appendChild(actionBtn);
										
										
										//--------append text with td elements------------
										
										colGrpName.appendChild(textGrpName);
										colManagement.appendChild(textManagement);
										colLeader.appendChild(textLeader);
										colTotalPilgrims.appendChild(textTotalPiligrim);
										colPaidPilgrim.appendChild(textPaidPilgrim);
										
										//-------appending td with tr-------------------
										
										tableRowElement.appendChild(colGrpName);
										tableRowElement.appendChild(colManagement);
										tableRowElement.appendChild(colLeader);
										tableRowElement.appendChild(colTotalPilgrims);
										tableRowElement.appendChild(colPaidPilgrim);
										tableRowElement.appendChild(colAction);
										
										//------------appending with table--------------
										
										mainTable.appendChild(tableRowElement);
									}
									
									//alert(output);
								}
								
							); //----get()-----
							
					} else {
						$("#mainTableId").load("groupListLoad.php");	
					}
					
				} //-------function()------
			</script>
            
            
            <div class="w3-container selectOptionContainer"> <!----- style="border:1px solid black;"------>
                <!--<form class="w3-container w3-card-4" action="form.asp" style="width:200px;">-->
                	Show&nbsp;
                    <select class="w3-select w3-border w3-border-grey w3-round selectBar" name="option">
                    <option value="" disabled selected>25</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    &nbsp;entitries
                
               <!-- </form>-->
            </div>
            <div style="clear:both;"></div>
            <div class="w3-container w3-padding-8"> <!----- style="border:1px solid black;"------>
            	
                <table class="w3-table-all" id="mainTableId">
             		
                    
                    
                </table>
                
                <div style="clear:both;"></div>
                <div class="w3-padding-8">
                	<span>Showing 1 to 1 of 1 entries</span>
                    <div class="w3-btn-group w3-show-inline-block w3-right">
                        <button class="w3-btn w3-light-grey">Previous</button>
                        <button class="w3-btn w3-blue">1</button>
                        <button class="w3-btn w3-light-grey">Next</button>
                    </div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div style="clear:both;"></div>
    </div>

</body>
</html>