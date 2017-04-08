<?php include_once("dbConnector.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Hajji List</title>

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
		width:100px;
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
    	<h2>List of Hajji</h2>
        <hr>
        <div class="w3-card-2" style="border-radius:8px;"> <!----- style="border:1px solid black;"------>
        	<div class="w3-container w3-blue w3-padding-8" style="border-radius:8px 8px 0px 0px;height:55px;">  
            	<a class="w3-btn w3-light-grey w3-round" href="newHajjiForm.php"><i class="fa fa-plus" aria-hidden="true"></i> New Hajji</a>
                
                <input id="textSarchField" style="float:right;" class="w3-input w3-right w3-round searchBar" type="text" onKeyUp="sendSearchName(this.value)">
                
                <p style="width:220px;float:right;">
                    <input id="nameSearchId" class="w3-radio" type="radio" name="searchItem" value="nameSearch" checked onChange="placeholderValChange();">
                    <label>Name</label>&nbsp;
                    <input id="nidSearchId" class="w3-radio" type="radio" name="searchItem" value="nidSearch" onChange="placeholderValChange();">
                    <label>NID</label>&nbsp;
                    <input id="bcSearchId" class="w3-radio" type="radio" name="searchItem" value="bcSearch" onChange="placeholderValChange();">
                    <label>BC</label>
                </p>
                
                <script>
					placeholderValChange();
					
					function placeholderValChange() {
						if(document.getElementById("nameSearchId").checked == true) {
							document.getElementById("textSarchField").placeholder = 'search by Name';
						}	
						if(document.getElementById("nidSearchId").checked == true) {
							document.getElementById("textSarchField").placeholder = 'search by NID No.';
						}	
						if(document.getElementById("bcSearchId").checked == true) {
							document.getElementById("textSarchField").placeholder = 'search by Birth Certificate No.';
						}	
					}
				</script>
                
            </div>
            
            <!---------------Sending Search Name to searchProcess.php using AJAX---------------->
            <script>
				$(document).ready(function() {
                  	$("#mainTableId").load("loadSearch.php");  
                });
				
				
				function sendSearchName(searchNameVal) {
					
					
					if(searchNameVal.length != 0 && searchNameVal != " ") {
						
						//---------if Name is checked for searching--------------------
						
						if(document.getElementById("nameSearchId").checked == true) {
						
							$.get(
								
								"searchProcess.php",
								{
									searchTermName: searchNameVal
								},
								function(output) {
									document.getElementById("mainTableId").innerHTML = "";
									var searchNameFoo = JSON.parse(output);
									var mainTable = document.getElementById("mainTableId");
									var tableHeadRow = document.createElement("tr");
									
									var textHeadSerial = document.createTextNode("Serial No");
									var textHeadTrack = document.createTextNode("Tracking ID");
									var textHeadName = document.createTextNode("Name");
									var textHeadVoucher = document.createTextNode("Voucher");
									var textHeadGroup = document.createTextNode("Group");
									var textHeadLocation = document.createTextNode("Location");
									var textHeadStatus = document.createTextNode("Status");
									var textHeadAction = document.createTextNode("Action");
									
									var colHeadSerial = document.createElement("th");
									var colHeadTrack = document.createElement("th");
									var colHeadName = document.createElement("th");
									var colHeadVoucher = document.createElement("th");
									var colHeadGroup = document.createElement("th");
									var colHeadLocation = document.createElement("th");
									var colHeadStatus = document.createElement("th");
									var colHeadAction = document.createElement("th");
									
									colHeadSerial.appendChild(textHeadSerial);
									colHeadTrack.appendChild(textHeadTrack);
									colHeadName.appendChild(textHeadName);
									colHeadVoucher.appendChild(textHeadVoucher);
									colHeadGroup.appendChild(textHeadGroup);
									colHeadLocation.appendChild(textHeadLocation);
									colHeadStatus.appendChild(textHeadStatus);
									colHeadAction.appendChild(textHeadAction);
									
									tableHeadRow.appendChild(colHeadSerial);
									tableHeadRow.appendChild(colHeadTrack);
									tableHeadRow.appendChild(colHeadName);
									tableHeadRow.appendChild(colHeadVoucher);
									tableHeadRow.appendChild(colHeadGroup);
									tableHeadRow.appendChild(colHeadLocation);
									tableHeadRow.appendChild(colHeadStatus);
									tableHeadRow.appendChild(colHeadAction);
									
									mainTable.appendChild(tableHeadRow);
									
									for(i=0; i<searchNameFoo.length; i++) {
										//document.getElementById("mainTableId").innerHTML += searchNameFoo[i].name + "<br/>";	
										var tableRow = document.createElement("tr");
										
										//---------creating td--------------
										var colId = document.createElement("td");
										var colNid = document.createElement("td");
										var colName = document.createElement("td");
										var colVoucher = document.createElement("td");
										var colGrp = document.createElement("td");
										var colCurrDist = document.createElement("td");
										var colStatus = document.createElement("td");
										var colOpen = document.createElement("td");
										
										//-------creating text for td--------------
										var colTextId = document.createTextNode(searchNameFoo[i].id);
										if(searchNameFoo[i].nid != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].nid+"(NID)");
										}
										if(searchNameFoo[i].bc != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].bc+"(BC)");
										}
										var colTextName = document.createTextNode(searchNameFoo[i].name);
										var colTextVoucher = document.createTextNode("");
										var colTextGrp = document.createTextNode(searchNameFoo[i].grp);
										var colTextCurrDist = document.createTextNode(searchNameFoo[i].currDist);
										//--------creating Cross Icon for Unpaid Text----------
										var crossIcon = document.createElement("i");
										crossIcon.className = "fa fa-times";
										//--------adding close icon infront of unpaid text----------
										colStatus.appendChild(crossIcon);
										var colTextStatus = document.createTextNode(" Unpaid");
										
										
										//--------adding Class Name to Unpaid Text---------------
										colStatus.className = "w3-text-red";
										
										
										//-------creating icon for Open Button-----------
										var btnIcon = document.createElement("i");
										btnIcon.className = "fa fa-folder-open";
										
										
										//creating text for Open Button-----------------
										var textOpen = document.createTextNode(" Open");
										
										
										//------------crating Action Button---------------
										var openBtn = document.createElement("a");
										openBtn.appendChild(btnIcon);
										openBtn.appendChild(textOpen);
										openBtn.className = "w3-btn w3-blue w3-round";
										openBtn.href = "hajjiProfile.php?nid="+searchNameFoo[i].nid+"&bc="+searchNameFoo[i].bc+"&id="+searchNameFoo[i].id;
										
										
										//------creating Style Object----------------------
										var styleElement = document.createElement("STYLE");
										
										
										//----------inserting text in td------------------
										colId.appendChild(colTextId);
										colNid.appendChild(colTextNid);
										colName.appendChild(colTextName);
										colVoucher.appendChild(colTextVoucher);
										colGrp.appendChild(colTextGrp);
										colCurrDist.appendChild(colTextCurrDist);
										colStatus.appendChild(colTextStatus);
										colOpen.appendChild(openBtn);
										
										
										//----------inserting td(with text) in tr-------------
										tableRow.appendChild(colId);
										tableRow.appendChild(colNid);
										tableRow.appendChild(colName);
										tableRow.appendChild(colVoucher);
										tableRow.appendChild(colGrp);
										tableRow.appendChild(colCurrDist);
										tableRow.appendChild(colStatus);
										tableRow.appendChild(colOpen);
										
										//-----------inserting tr in table-----------------
										mainTable.appendChild(tableRow);
										//alert(output);
									}
									
								}
								
							); //get()-----
							
						} //------if name is checked----------

						if(document.getElementById("nidSearchId").checked == true) {
							
							$.get(
								
								"nidSearchProcess.php",
								{
									searchTermName: searchNameVal
								},
								function(output) {
									document.getElementById("mainTableId").innerHTML = "";
									var searchNameFoo = JSON.parse(output);
									var mainTable = document.getElementById("mainTableId");
									var tableHeadRow = document.createElement("tr");
									
									var textHeadSerial = document.createTextNode("Serial No");
									var textHeadTrack = document.createTextNode("Tracking ID");
									var textHeadName = document.createTextNode("Name");
									var textHeadVoucher = document.createTextNode("Voucher");
									var textHeadGroup = document.createTextNode("Group");
									var textHeadLocation = document.createTextNode("Location");
									var textHeadStatus = document.createTextNode("Status");
									var textHeadAction = document.createTextNode("Action");
									
									var colHeadSerial = document.createElement("th");
									var colHeadTrack = document.createElement("th");
									var colHeadName = document.createElement("th");
									var colHeadVoucher = document.createElement("th");
									var colHeadGroup = document.createElement("th");
									var colHeadLocation = document.createElement("th");
									var colHeadStatus = document.createElement("th");
									var colHeadAction = document.createElement("th");
									
									colHeadSerial.appendChild(textHeadSerial);
									colHeadTrack.appendChild(textHeadTrack);
									colHeadName.appendChild(textHeadName);
									colHeadVoucher.appendChild(textHeadVoucher);
									colHeadGroup.appendChild(textHeadGroup);
									colHeadLocation.appendChild(textHeadLocation);
									colHeadStatus.appendChild(textHeadStatus);
									colHeadAction.appendChild(textHeadAction);
									
									tableHeadRow.appendChild(colHeadSerial);
									tableHeadRow.appendChild(colHeadTrack);
									tableHeadRow.appendChild(colHeadName);
									tableHeadRow.appendChild(colHeadVoucher);
									tableHeadRow.appendChild(colHeadGroup);
									tableHeadRow.appendChild(colHeadLocation);
									tableHeadRow.appendChild(colHeadStatus);
									tableHeadRow.appendChild(colHeadAction);
									
									mainTable.appendChild(tableHeadRow);
									
									for(i=0; i<searchNameFoo.length; i++) {
										//document.getElementById("mainTableId").innerHTML += searchNameFoo[i].name + "<br/>";	
										var tableRow = document.createElement("tr");
										
										//---------creating td--------------
										var colId = document.createElement("td");
										var colNid = document.createElement("td");
										var colName = document.createElement("td");
										var colVoucher = document.createElement("td");
										var colGrp = document.createElement("td");
										var colCurrDist = document.createElement("td");
										var colStatus = document.createElement("td");
										var colOpen = document.createElement("td");
										
										//-------creating text for td--------------
										var colTextId = document.createTextNode(searchNameFoo[i].id);
										if(searchNameFoo[i].nid != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].nid+"(NID)");
										}
										if(searchNameFoo[i].bc != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].bc+"(BC)");
										}
										var colTextName = document.createTextNode(searchNameFoo[i].name);
										var colTextVoucher = document.createTextNode("");
										var colTextGrp = document.createTextNode(searchNameFoo[i].grp);
										var colTextCurrDist = document.createTextNode(searchNameFoo[i].currDist);
										//--------creating Cross Icon for Unpaid Text----------
										var crossIcon = document.createElement("i");
										crossIcon.className = "fa fa-times";
										//--------adding close icon infront of unpaid text----------
										colStatus.appendChild(crossIcon);
										var colTextStatus = document.createTextNode(" Unpaid");
										
										
										//--------adding Class Name to Unpaid Text---------------
										colStatus.className = "w3-text-red";
										
										
										//-------creating icon for Open Button-----------
										var btnIcon = document.createElement("i");
										btnIcon.className = "fa fa-folder-open";
										
										
										//creating text for Open Button-----------------
										var textOpen = document.createTextNode(" Open");
										
										
										//------------crating Action Button---------------
										var openBtn = document.createElement("a");
										openBtn.appendChild(btnIcon);
										openBtn.appendChild(textOpen);
										openBtn.className = "w3-btn w3-blue w3-round";
										openBtn.href = "hajjiProfile.php?nid="+searchNameFoo[i].nid+"&bc="+searchNameFoo[i].bc+"&id="+searchNameFoo[i].id;
										
										
										//------creating Style Object----------------------
										var styleElement = document.createElement("STYLE");
										
										
										//----------inserting text in td------------------
										colId.appendChild(colTextId);
										colNid.appendChild(colTextNid);
										colName.appendChild(colTextName);
										colVoucher.appendChild(colTextVoucher);
										colGrp.appendChild(colTextGrp);
										colCurrDist.appendChild(colTextCurrDist);
										colStatus.appendChild(colTextStatus);
										colOpen.appendChild(openBtn);
										
										
										//----------inserting td(with text) in tr-------------
										tableRow.appendChild(colId);
										tableRow.appendChild(colNid);
										tableRow.appendChild(colName);
										tableRow.appendChild(colVoucher);
										tableRow.appendChild(colGrp);
										tableRow.appendChild(colCurrDist);
										tableRow.appendChild(colStatus);
										tableRow.appendChild(colOpen);
										
										//-----------inserting tr in table-----------------
										mainTable.appendChild(tableRow);
										//alert(output);
									}
									
								}
								
							); //get()-----
							
						} //---------if NID is checked------------
						
						if(document.getElementById("bcSearchId").checked == true) {
							
							$.get(
								
								"bcSearchProcess.php",
								{
									searchTermName: searchNameVal
								},
								function(output) {
									document.getElementById("mainTableId").innerHTML = "";
									var searchNameFoo = JSON.parse(output);
									var mainTable = document.getElementById("mainTableId");
									var tableHeadRow = document.createElement("tr");
									
									var textHeadSerial = document.createTextNode("Serial No");
									var textHeadTrack = document.createTextNode("Tracking ID");
									var textHeadName = document.createTextNode("Name");
									var textHeadVoucher = document.createTextNode("Voucher");
									var textHeadGroup = document.createTextNode("Group");
									var textHeadLocation = document.createTextNode("Location");
									var textHeadStatus = document.createTextNode("Status");
									var textHeadAction = document.createTextNode("Action");
									
									var colHeadSerial = document.createElement("th");
									var colHeadTrack = document.createElement("th");
									var colHeadName = document.createElement("th");
									var colHeadVoucher = document.createElement("th");
									var colHeadGroup = document.createElement("th");
									var colHeadLocation = document.createElement("th");
									var colHeadStatus = document.createElement("th");
									var colHeadAction = document.createElement("th");
									
									colHeadSerial.appendChild(textHeadSerial);
									colHeadTrack.appendChild(textHeadTrack);
									colHeadName.appendChild(textHeadName);
									colHeadVoucher.appendChild(textHeadVoucher);
									colHeadGroup.appendChild(textHeadGroup);
									colHeadLocation.appendChild(textHeadLocation);
									colHeadStatus.appendChild(textHeadStatus);
									colHeadAction.appendChild(textHeadAction);
									
									tableHeadRow.appendChild(colHeadSerial);
									tableHeadRow.appendChild(colHeadTrack);
									tableHeadRow.appendChild(colHeadName);
									tableHeadRow.appendChild(colHeadVoucher);
									tableHeadRow.appendChild(colHeadGroup);
									tableHeadRow.appendChild(colHeadLocation);
									tableHeadRow.appendChild(colHeadStatus);
									tableHeadRow.appendChild(colHeadAction);
									
									mainTable.appendChild(tableHeadRow);
									
									for(i=0; i<searchNameFoo.length; i++) {
										//document.getElementById("mainTableId").innerHTML += searchNameFoo[i].name + "<br/>";	
										var tableRow = document.createElement("tr");
										
										//---------creating td--------------
										var colId = document.createElement("td");
										var colNid = document.createElement("td");
										var colName = document.createElement("td");
										var colVoucher = document.createElement("td");
										var colGrp = document.createElement("td");
										var colCurrDist = document.createElement("td");
										var colStatus = document.createElement("td");
										var colOpen = document.createElement("td");
										
										//-------creating text for td--------------
										var colTextId = document.createTextNode(searchNameFoo[i].id);
										if(searchNameFoo[i].nid != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].nid+"(NID)");
										}
										if(searchNameFoo[i].bc != "") {
											var colTextNid = document.createTextNode(searchNameFoo[i].bc+"(BC)");
										}
										var colTextName = document.createTextNode(searchNameFoo[i].name);
										var colTextVoucher = document.createTextNode("");
										var colTextGrp = document.createTextNode(searchNameFoo[i].grp);
										var colTextCurrDist = document.createTextNode(searchNameFoo[i].currDist);
										//--------creating Cross Icon for Unpaid Text----------
										var crossIcon = document.createElement("i");
										crossIcon.className = "fa fa-times";
										//--------adding close icon infront of unpaid text----------
										colStatus.appendChild(crossIcon);
										var colTextStatus = document.createTextNode(" Unpaid");
										
										
										//--------adding Class Name to Unpaid Text---------------
										colStatus.className = "w3-text-red";
										
										
										//-------creating icon for Open Button-----------
										var btnIcon = document.createElement("i");
										btnIcon.className = "fa fa-folder-open";
										
										
										//creating text for Open Button-----------------
										var textOpen = document.createTextNode(" Open");
										
										
										//------------crating Action Button---------------
										var openBtn = document.createElement("a");
										openBtn.appendChild(btnIcon);
										openBtn.appendChild(textOpen);
										openBtn.className = "w3-btn w3-blue w3-round";
										openBtn.href = "hajjiProfile.php?nid="+searchNameFoo[i].nid+"&bc="+searchNameFoo[i].bc+"&id="+searchNameFoo[i].id
										
										
										//------creating Style Object----------------------
										var styleElement = document.createElement("STYLE");
										
										
										//----------inserting text in td------------------
										colId.appendChild(colTextId);
										colNid.appendChild(colTextNid);
										colName.appendChild(colTextName);
										colVoucher.appendChild(colTextVoucher);
										colGrp.appendChild(colTextGrp);
										colCurrDist.appendChild(colTextCurrDist);
										colStatus.appendChild(colTextStatus);
										colOpen.appendChild(openBtn);
										
										
										//----------inserting td(with text) in tr-------------
										tableRow.appendChild(colId);
										tableRow.appendChild(colNid);
										tableRow.appendChild(colName);
										tableRow.appendChild(colVoucher);
										tableRow.appendChild(colGrp);
										tableRow.appendChild(colCurrDist);
										tableRow.appendChild(colStatus);
										tableRow.appendChild(colOpen);
										
										//-----------inserting tr in table-----------------
										mainTable.appendChild(tableRow);
										//alert(output);
									}
									
								}
								
							); //get()-----
							
						} //---------if BC is checked------------

					} else {
						$("#mainTableId").load("loadSearch.php");	
					}
						
				} //----function searchNameVal()-----
			</script>
            
            
            <div class="w3-container selectOptionContainer"> <!----- style="border:1px solid black;"------>

                	Show&nbsp;
                    <select class="w3-select w3-border w3-border-grey w3-round selectBar" name="option">
                    <option value="" disabled selected>25</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                    </select>
                    &nbsp;entitries

            </div>
            
            
            <div style="clear:both;"></div>
            <div class="w3-container w3-padding-8"> <!----- style="border:1px solid black;"------>
            	<table id="mainTableId" class="w3-table-all">
                	
                    	
                                   
                </table>
                
                <div style="clear:both;"></div>
                <div class="w3-padding-8">
                	<span>Showing 1 to 5 of 6 entries</span>
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