<?php session_start(); ?>
<?php
	if($_SESSION["hajj_web_app"] != "Yes") {
		header("location: index.php");
	}
?>
<?php include_once("dbConnector.php"); ?>

<?php
	$grpNameSql = "SELECT grp_name,grp_id FROM groups ORDER BY grp_id ASC";
	$resultGrpName = mysqli_query($connection,$grpNameSql);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Hajj Website</title>

<style>
	
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
		width:250px;
	}
	
	.content {
		width:1175px;
		margin:auto;
		/*height:600px;*/
		position:relative;
		top:55px;
		padding:8px 32px;
	}
	
	.col1 {
		width:200px;	
		height:50px;
		/*border:1px solid black;*/
	}
	
	.col2 {
		width:500px;	
		height:50px;
		/*border:1px solid black;*/
	}
	
	#bcId {
		display:none;	
	}
	
	.error-message {
		color:red;
		font-weight:bold;	
	}
	
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>




<body>

	<?php include_once("header.php"); ?> 
    
     
            
    <div class="content w3-card-2">
        <h2>Preparation & form for new registration</h2>
        <hr>
        <div>
            <div class="w3-container w3-blue w3-round-large">
                <h3>Hajji information for pre-registration</h3>
            </div>
            
            <div class="w3-container">
                <h2>Pre Registration Process</h2>
                <div class="w3-row">
                    <a id="londonTabBtnId" href="javascript:void(0)" onclick="openCity(event, 'London');">
                    	<div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Male(Adult)</div>
                    </a>
                    <a href="javascript:void(0)" onclick="openCity(event, 'Paris');">
                    	<div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Male(Under 18)</div>
                    </a>
                    <a href="javascript:void(0)" onclick="openCity(event, 'Tokyo');">
                    	<div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">Female</div>
                    </a>
                    <a href="javascript:void(0)" onclick="openCity(event, 'nrb');">
                    	<div class="w3-quarter tablink w3-bottombar w3-hover-light-grey w3-padding">NRB</div>
                    </a>
                </div>
                
                <!---------Male(Adult)---------->
                <div id="London" class="w3-container city w3-padding-16" style="display:none">
                    <form id="priligrimFormMaleAdultId" name="priligrimMaleAdultFormName" onSubmit="return false">
                        <table>
                            
                            <!----------Date of Birth--------->
                            <tr>
                                <td class="col1"><strong>Date of Birth:</strong></td>
                                <td class="col2"><input id="dobId" class="w3-input w3-border" type="date" name="dobMaleAdult" value="" placeholder="mm/dd/yyyy" oninput="getAge(this.value)">
                                <p id="dobErrMaleAdult" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Type--------->
                            <tr id="typeRowId">
                                <td class="col1"><strong>Type:</strong></td>
                                <td class="col2">
                                    <p id="typeContainerId">
                                    <input id="indTypeId" class="w3-radio" type="radio" name="typeMaleAdult" value="individual" onChange="typ(this.value)">
                                    <label class="w3-validate">Individual</label>
                                    <input id="grpTypeId" style="margin-left:30px" class="w3-radio" type="radio" name="typeMaleAdult" value="group" onChange="typ(this.value)">
                                    <label class="w3-validate">Group</label>
                                    </p>  
                                    <p id="typeErrMaleAdult" class="error-message"></p>
                                    <div style="clear:both;"></div>
                                </td>
                            </tr>
                            
                            <!-------Type Group select korle Group dropdown slide down korbe--------->
                            <script>
                                function typ(x) {
                                    if(x == "group") {
                                        $("#bcMaleAdultId").slideDown("slow");
                                        $("#grpMaleAdultID").slideDown("slow");
                                    }
                                    if(x == "individual") {
										$("#bcMaleAdultId").slideUp("slow");
										$("#grpMaleAdultID").slideUp("slow");
										$("#managementMaleAdultId").slideDown("slow");
										document.getElementById("grpMaleAdultID").value = "";
                                    }
                                }
                            </script>                   

                            
                            <!----------Group--------->
                            <tr style="display:none;" id="bcMaleAdultId">
                                <td class="col1 w3-slim"><strong>Group:</strong></td>
                                <td class="col2">
                                    <select style="display:none;" id="grpMaleAdultID" class="w3-select" name="grpMaleAdult" onChange="selectGrp(this.value)">
                                        <option value="" disabled selected><?php  ?></option>
                                        <?php while($rowGrpName = mysqli_fetch_assoc($resultGrpName)) { ?>
                                        <option value="<?php echo $rowGrpName["grp_id"]; ?>"><?php echo $rowGrpName["grp_name"]; ?></option>
                                        <?php } ?>
                                    </select>     
                                    <!--<p id="grpErrMaleAdult" class="error-message"></p> -->                 	
                                </td>
                            </tr>
                            
                            <!-----Group dropdown theke jekono 1 ta option select korle Management chole jabe---->
                            <script>
                                function selectGrp(x) {
                                    if(x != "") {
                                        $("#managementMaleAdultId").slideUp("slow");
                                    } else {
                                        $("#managementMaleAdultId").slideDown("slow");	
                                    }
                                }
                            </script> 
                            
                            <!----------Management--------->
                            <tr id="managementMaleAdultId">
                                <td class="col1"><strong>Management:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input class="w3-radio" type="radio" name="managementMaleAdult" value="Private">
                                    <label class="w3-validate">Private</label>
                                    <input style="margin-left:30px;" class="w3-radio" type="radio" name="managementMaleAdult" value="Government">
                                    <label class="w3-validate">Government</label>
                                    </p>
                                    <p id="managementErrMaleAdult" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Identity--------->
                            <tr>
                                <td class="col1"><strong>Identity:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input id="nidMaleAdultId" class="w3-radio identity" type="radio" name="idnMaleAdult" value="nid" onchange="identity(this.value)">
                                    <label class="w3-validate">NID</label>
                                    <input id="bcMaleAdultId" style="margin-left:30px" class="w3-radio identity" type="radio" name="idnMaleAdult" value="bc" onchange="identity(this.value)">
                                    <label class="w3-validate">Birth Certificate</label>
                                    </p>
                                    <p id="identityErrMaleAdult" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------National ID No--------->
                            <tr id="nid">
                                <td class="col1"><strong>National ID No:</strong></td>
                                <td class="col2">
                                    <input id="nidTextId" name="nidMaleAdult" class="w3-input w3-border" type="text" placeholder="Your National ID">
                                    <!--<p id="nidErrMaleAdult" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Birth Certificate No--------->
                            <tr id="bcNo" style="display:none;">
                                <td class="col1"><strong>Birth Certificate No:</strong></td>
                                <td class="col2">
                                    <input id="bcTextId" name="bcMaleAdult" class="w3-input w3-border" type="text" placeholder="Your Birth Certificate Number" value="">
                                    <!--<p id="bcErrMaleAdult" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Error Message for BC & NID--------->
                            <tr>
                                <td class="col1" style="height:0px;"></td>
                                <td class="col2" style="height:0px;">
                                	<p class="error-message" id="bcNidErr"></p>
                                </td>
                            </tr>
                            
                            <script>
                                function identity(x) {
                                    if(x == "nid") {
                                        $("#bcNo").slideUp(.1);
                                        $("#nid").slideDown("slow");
                                    }
                                    if(x == "bc") {
                                        $("#nid").slideUp(.1);
                                        $("#bcNo").slideDown("slow");
                                    }
                                }
                            </script>
                        </table>
                    </form>
                    
                    <div>
                        <a id="nextBtnMaleAdultId" class="w3-btn w3-blue w3-right w3-large w3-round w3-margin-top">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                <!------------Send Extra to next page after submitting the form------------>
                <form id="extraMaleAdultInfoFormId" action="afterNidForm.php" method="get">
                	<input id="extraValMaleAdultId" name="extraValMaleAdultName" type="hidden" value="">
                	<input id="extraValBcMaleAdultId" name="extraValMaleAdultBcName" type="hidden" value="">
                </form>
                
                <!-----------Male Adult info send using AJAX---------->
                
                <script>
					
					$(document).ready(function() {
                        
						$("#nextBtnMaleAdultId").click(function() {
							
							var fd = new FormData(document.querySelector("#priligrimFormMaleAdultId"));
							
							$.ajax({
								url: "maleAdultProcess.php",
								type: "POST",
								data: fd,
								contentType: false,
								processData: false,	
								success: function(output) {
									if(output.indexOf("success") != -1) {
										alert("Datas have been stored successfully!");
										document.getElementById("extraValMaleAdultId").value = document.getElementById("nidTextId").value;
										document.getElementById("extraValBcMaleAdultId").value = document.getElementById("bcTextId").value;
										$("#extraMaleAdultInfoFormId").submit();	
									}
									if(output.indexOf("failed") != -1) {
										alert("Failed!");
									}
									else {
										var maleAdultFoo = JSON.parse(output);	
										
										document.getElementById("dobErrMaleAdult").innerHTML = maleAdultFoo[0];
										document.getElementById("typeErrMaleAdult").innerHTML = maleAdultFoo[1];
										//document.getElementById("managementErrMaleAdult").innerHTML = maleAdultFoo[2];
										document.getElementById("identityErrMaleAdult").innerHTML = maleAdultFoo[3];
										document.getElementById("bcNidErr").innerHTML = maleAdultFoo[4];
										/*if(document.getElementById("grpTypeId").checked == true) {
											document.getElementById("grpErrMaleAdult").innerHTML = maleAdultFoo[5];
										}*/
										if(document.getElementById("grpMaleAdultID").value == "") {
											document.getElementById("managementErrMaleAdult").innerHTML = maleAdultFoo[6]; 
										}
									}
								}
							});
								
						});
						
                    });
					
				</script>
                
                
<?php
	$grpNameSqlMaleUNt = "SELECT grp_name,grp_id FROM groups ORDER BY grp_id ASC";
	$resultGrpNameUNt = mysqli_query($connection,$grpNameSqlMaleUNt);
?>
                
                <!----------------------------------Male(Under 18)------------------------------------------->
                
                <div id="Paris" class="w3-container city w3-padding-16" style="display:none">
                    <form id="priligrimFormMaleUnder18Id" name="priligrimFormNameMaleUnder18" onSubmit="return false">
                        <table>
                            
                            <!----------Date of Birth--------->
                            <tr>
                                <td class="col1"><strong>Date of Birth:</strong></td>
                                <td class="col2"><input id="dobMaleUnderNtId" class="w3-input w3-border" type="date" name="dobMaleUnderNt" value="" placeholder="mm/dd/yyyy" oninput="getAge(this.value)">
                                <p id="dobMaleUnder18Err" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Group--------->
                            <tr id="bcU18Id">
                                <td class="col1 w3-slim"><strong>Group:</strong></td>
                                <td class="col2">
                                    <select id="grpU18ID" class="w3-select" name="grpMaleUnderNt" onChange="selectGrp(this.value)">
                                        <option value="" disabled selected>Create New Group</option>
                                        <?php while($rowGrpNameUNt = mysqli_fetch_assoc($resultGrpNameUNt)) { ?>
                                        <option value="<?php echo $rowGrpNameUNt["grp_id"]; ?>"><?php echo $rowGrpNameUNt["grp_name"]; ?></option>
                                        <?php } ?>
                                    </select>     
                                    <p id="grpMaleUnder18Err" class="error-message"></p>                  	
                                </td>
                            </tr>
                            
                            <!----------Identity--------->
                            <tr>
                                <td class="col1"><strong>Identity:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input class="w3-radio identity" type="radio" name="idnMaleUnderNt" value="nid" onchange="identity1(this.value)">
                                    <label class="w3-validate">NID</label>
                                    <input style="margin-left:30px" class="w3-radio identity" type="radio" name="idnMaleUnderNt" value="bc" onchange="identity1(this.value)">
                                    <label class="w3-validate">Birth Certificate</label>
                                    </p>
                                    <p id="identityMaleUnder18Err" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------National ID No--------->
                            <tr id="nid1">
                                <td class="col1"><strong>National ID No:</strong></td>
                                <td class="col2">
                                    <input id="nidMaleUNt" name="nidMaleUnderNt" class="w3-input w3-border" type="text" placeholder="Your National ID">
                                    <!--<p id="nidMaleUnder18Err" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Birth Certificate No--------->
                            <tr id="bcNo1" style="display:none;">
                                <td class="col1"><strong>Birth Certificate No:</strong></td>
                                <td class="col2">
                                    <input id="bcTextU18Id" name="bcMaleUnderNt" class="w3-input w3-border" type="text" placeholder="Your Birth Certificate Number">
                                    <!--<p id="bcMaleUnder18Err" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Error Message for BC & NID--------->
                            <tr>
                                <td class="col1" style="height:0px;"></td>
                                <td class="col2" style="height:0px;">
                                	<p class="error-message" id="bcNidMaleUnderNtErr"></p>
                                </td>
                            </tr>
                            
                            <script>
                                function identity1(x) {
                                    if(x == "nid") {
                                        $("#bcNo1").slideUp(.1);
                                        $("#nid1").slideDown("slow");
                                    }
                                    if(x == "bc") {
                                        $("#nid1").slideUp(.1);
                                        $("#bcNo1").slideDown("slow");
                                    }
                                }
                            </script>
                        </table>
                    </form>
                    
                    <div>
                        <a id="nextBtnMaleUnder18" class="w3-btn w3-blue w3-right w3-large w3-round w3-margin-top">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                <!-------------Sending info to maleUnder18Process.php using AJAX------------>
                <script>
					
					$(document).ready(function() {
						
						$("#nextBtnMaleUnder18").click(function() {
							
							var fd = new FormData(document.querySelector("#priligrimFormMaleUnder18Id"));
						
							$.ajax({
								url: "maleUnder18Process.php",
								type: "POST",
								data: fd,
								contentType: false,
								processData: false,
								success: function(e) {
									if(e.indexOf("success") != -1) {
										alert("Datas have been stored successfully!");
										document.getElementById("extraValMaleAdultId").value = document.getElementById("nidMaleUNt").value;
										document.getElementById("extraValBcMaleAdultId").value = document.getElementById("bcTextU18Id").value;
										$("#extraMaleAdultInfoFormId").submit();
									} else {
										var maleUnderNtFoo = JSON.parse(e);
										
										document.getElementById("dobMaleUnder18Err").innerHTML = maleUnderNtFoo[0];
										document.getElementById("grpMaleUnder18Err").innerHTML = maleUnderNtFoo[1];
										document.getElementById("identityMaleUnder18Err").innerHTML = maleUnderNtFoo[2];
										document.getElementById("bcNidMaleUnderNtErr").innerHTML = maleUnderNtFoo[3]
									}
								}
							}); //---$.ajax()--
							
						}); //---click()----
							
					}); //---ready()----
					
				</script>
                
                
<?php
	$grpNameSqlFemale = "SELECT grp_name,grp_id FROM groups ORDER BY grp_id ASC";
	$resultGrpNameFemale = mysqli_query($connection,$grpNameSqlFemale);
?>
                
                <!----------------------------------Female------------------------------------------->
                
                <div id="Tokyo" class="w3-container city w3-padding-16" style="display:none">
                    <form id="priligrimFormFemaleId" name="priligrimFormFemaleName" onSubmit="return false">
                       <table>     
                            <!----------Date of Birth--------->
                            <tr>
                                <td class="col1"><strong>Date of Birth:</strong></td>
                                <td class="col2"><input id="dobId" class="w3-input w3-border" type="date" name="dobFemale" value="" placeholder="mm/dd/yyyy" oninput="getAge(this.value)">
                                <p id="dobFemaleErr" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Group--------->
                            <tr id="bcFemaleId">
                                <td class="col1 w3-slim"><strong>Group:</strong></td>
                                <td class="col2">
                                    <select id="grpFemaleID" class="w3-select" name="grpFemale" onChange="selectGrp(this.value)">
                                        <option value="" disabled selected>Create New Group</option>
                                        <?php while($rowGrpNameFemale = mysqli_fetch_assoc($resultGrpNameFemale)) { ?>
                                        <option value="<?php echo $rowGrpNameFemale["grp_id"]; ?>"><?php echo $rowGrpNameFemale["grp_name"]; ?></option>
                                        <?php } ?>
                                    </select>     
                                    <p id="grpFemaleErr" class="error-message"></p>                  	
                                </td>
                            </tr>
                            
                            <!----------Identity--------->
                            <tr>
                                <td class="col1"><strong>Identity:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input class="w3-radio identity" type="radio" name="idnFemale" value="nid" onchange="identity2(this.value)">
                                    <label class="w3-validate">NID</label>
                                    <input style="margin-left:30px" class="w3-radio identity" type="radio" name="idnFemale" value="bc" onchange="identity2(this.value)">
                                    <label class="w3-validate">Birth Certificate</label>
                                    </p>
                                    <p id="identityFemaleErr" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------National ID No--------->
                            <tr id="nid2">
                                <td class="col1"><strong>National ID No:</strong></td>
                                <td class="col2">
                                    <input id="nidFemaleId" name="nidFemale" class="w3-input w3-border" type="text" placeholder="Your National ID">
                                    <!--<p id="nidFemaleErr" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Birth Certificate No--------->
                            <tr id="bcNo2" style="display:none;">
                                <td class="col1"><strong>Birth Certificate No:</strong></td>
                                <td class="col2">
                                    <input id="bcTextFemaleId" name="bcFemale" class="w3-input w3-border" type="text" placeholder="Your Birth Certificate Number">
                                    <!--<p id="bcFemaleErr" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Error Message for BC & NID--------->
                            <tr>
                                <td class="col1" style="height:0px;"></td>
                                <td class="col2" style="height:0px;">
                                	<p class="error-message" id="bcNidFemaleErr"></p>
                                </td>
                            </tr>
                            
                            <script>
                                function identity2(x) {
                                    if(x == "nid") {
                                        $("#bcNo2").slideUp(.1);
                                        $("#nid2").slideDown("slow");
                                    }
                                    if(x == "bc") {
                                        $("#nid2").slideUp(.1);
                                        $("#bcNo2").slideDown("slow");
                                    }
                                }
                            </script>
                        </table>
                    </form>
                    
                    <div>
                        <a id="nextBtnFemale" class="w3-btn w3-blue w3-right w3-large w3-round w3-margin-top">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                
                <!-------------Sending info to femaleProcess.php using AJAX------------>
                <script>
					
					$(document).ready(function() {
						
						$("#nextBtnFemale").click(function() {
							
							var fd = new FormData(document.querySelector("#priligrimFormFemaleId"));
						
							$.ajax({
								url: "femaleProcess.php",
								type: "POST",
								data: fd,
								contentType: false,
								processData: false,
								success: function(e) {
									if(e.indexOf("success") != -1) {
										alert("Datas have been stored successfully!");
										document.getElementById("extraValMaleAdultId").value = document.getElementById("nidFemaleId").value;
										document.getElementById("extraValBcMaleAdultId").value = document.getElementById("bcTextFemaleId").value;
										$("#extraMaleAdultInfoFormId").submit();
									} else {
										var femaleFoo = JSON.parse(e);
										
										document.getElementById("dobFemaleErr").innerHTML = femaleFoo[0];
										document.getElementById("grpFemaleErr").innerHTML = femaleFoo[1];
										document.getElementById("identityFemaleErr").innerHTML = femaleFoo[2];
										document.getElementById("bcNidFemaleErr").innerHTML = femaleFoo[3]
									}
									//alert(e);
								}
							}); //---$.ajax()--
							
						}); //---click()----
							
					}); //---ready()----
					
				</script>
                
                
				<?php
                    $grpNameSqlNrb = "SELECT grp_name,grp_id FROM groups ORDER BY grp_id ASC";
                    $resultGrpNameNrb = mysqli_query($connection,$grpNameSqlNrb);
                ?>

                
                <!--------------------------------NRB Info------------------------------------------->
                <div id="nrb" class="w3-container city w3-padding-16" style="display:none">
                    <form id="priligrimFormNrbId" name="priligrimFormNrbName" onSubmit="return false">
                        <table>
                            
                            <!----------Residence--------->
                            <tr id="res">
                                <td class="col1"><strong>Residence:</strong></td>
                                <td class="col2">
                                    <select id="selectRes" class="w3-select" name="residence" onChange="selected(this.value)">
                                        <option value="" disabled selected>Select Your Residence</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>A</option>
                                        <option value="Afghanistan">Afghanistan</option>
                                        <option value="Albania">Albania</option>
                                        <option value="Algeria">Algeria</option>
                                        <option value="Andorra">Andorra</option>
                                        <option value="Angola">Angola</option>
                                        <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Armenia">Armenia</option>
                                        <option value="Australia">Australia</option>
                                        <option value="Austria">Austria</option>
                                        <option value="Azerbaijan">Azerbaijan</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>B</option>s
                                        <option value="Bahamas">Bahamas</option>
                                        <option value="Bahrain">Bahrain</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Barbados">Barbados</option>
                                        <option value="Belarus">Belarus</option>
                                        <option value="Belgium">Belgium</option>
                                        <option value="Belize">Belize</option>
                                        <option value="Benin">Benin</option>
                                        <option value="Bhutan">Bhutan</option>
                                        <option value="Bolivia">Bolivia</option>
                                        <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                        <option value="Botswana">Botswana</option>
                                        <option value="Brazil">Brazil</option>
                                        <option value="Brunei">Brunei</option>
                                        <option value="Bulgaria">Bulgaria</option>
                                        <option value="Burkina Faso">Burkina Faso</option>
                                        <option value="Burundi">Burundi</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>C</option>
                                        <option value="Cabo Verde">Cabo Verde</option>
                                        <option value="Cambodia">Cambodia</option>
                                        <option value="Cameroon">Cameroon</option>
                                        <option value="Canada">Canada</option>
                                        <option value="Central African Republic (CAR)">Central African Republic (CAR)</option>
                                        <option value="Chad">Chad</option>
                                        <option value="Chile">Chile</option>
                                        <option value="China">China</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Comoros">Comoros</option>
                                        <option value="Democratic Republic of the Congo">Democratic Republic of the Congo</option>
                                        <option value="Republic of the Congo">Republic of the Congo</option>
                                        <option value="Costa Rica">Costa Rica</option>
                                        <option value="Cote d'Ivoire">Cote d'Ivoire</option>
                                        <option value="Croatia">Croatia</option>
                                        <option value="Cuba">Cuba</option>
                                        <option value="Cyprus">Cyprus</option>
                                        <option value="Czech Republic">Czech Republic</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>D</option>
                                        <option value="Denmark">Denmark</option>
                                        <option value="Djibouti">Djibouti</option>
                                        <option value="Dominica">Dominica</option>
                                        <option value="Dominican Republic">Dominican Republic</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>E</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="Egypt">Egypt</option>
                                        <option value="El Salvador">El Salvador</option>
                                        <option value="Equatorial Guinea">Equatorial Guinea</option>
                                        <option value="Eritrea">Eritrea</option>
                                        <option value="Estonia">Estonia</option>
                                        <option value="Ethiopia">Ethiopia</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>F</option>
                                        <option value="Fiji">Fiji</option>
                                        <option value="Finland">Finland</option>
                                        <option value="France">France</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>G</option>
                                        <option value="Gabon">Gabon</option>
                                        <option value="Gambia">Gambia</option>
                                        <option value="Georgia">Georgia</option>
                                        <option value="Germany">Germany</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Greece">Greece</option>
                                        <option value="Grenada">Grenada</option>
                                        <option value="Guatemala">Guatemala</option>
                                        <option value="Guinea">Guinea</option>
                                        <option value="Guinea-Bissau">Guinea-Bissau</option>
                                        <option value="Guyana">Guyana</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>H</option>
                                        <option value="Haiti">Haiti</option>
                                        <option value="Honduras">Honduras</option>
                                        <option value="Hungary">Hungary</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>I</option>
                                        <option value="Iceland">Iceland</option>
                                        <option value="India">India</option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Iran">Iran</option>
                                        <option value="Iraq">Iraq</option>
                                        <option value="Ireland">Ireland</option>
                                        <option value="Israel">Israel</option>
                                        <option value="Italy">Italy</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>J</option>
                                        <option value="Jamaica">Jamaica</option>
                                        <option value="Japan">Japan</option>
                                        <option value="Jordan">Jordan</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>K</option>
                                        <option value="Kazakhstan">Kazakhstan</option>
                                        <option value="Kenya">Kenya</option>
                                        <option value="Kiribati">Kiribati</option>
                                        <option value="Kosovo">Kosovo</option>
                                        <option value="Kuwait">Kuwait</option>
                                        <option value="Kyrgyzstan">Kyrgyzstan</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>L</option>
                                        <option value="Laos">Laos</option>
                                        <option value="Latvia">Latvia</option>
                                        <option value="Lebanon">Lebanon</option>
                                        <option value="Lesotho">Lesotho</option>
                                        <option value="Liberia">Liberia</option>
                                        <option value="Libya">Libya</option>
                                        <option value="Liechtenstein">Liechtenstein</option>
                                        <option value="Lithuania">Lithuania</option>
                                        <option value="Luxembourg">Luxembourg</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>M</option>
                                        <option value="Macedonia">Macedonia</option>
                                        <option value="Madagascar">Madagascar</option>
                                        <option value="Malawi">Malawi</option>
                                        <option value="Malaysia">Malaysia</option>
                                        <option value="Maldives">Maldives</option>
                                        <option value="Mali">Mali</option>
                                        <option value="Malta">Malta</option>
                                        <option value="Marshall Islands">Marshall Islands</option>
                                        <option value="Mauritania">Mauritania</option>
                                        <option value="Mauritius">Mauritius</option>
                                        <option value="Mexico">Mexico</option>
                                        <option value="Micronesia">Micronesia</option>
                                        <option value="Moldova">Moldova</option>
                                        <option value="Monaco">Monaco</option>
                                        <option value="Mongolia">Mongolia</option>
                                        <option value="Montenegro">Montenegro</option>
                                        <option value="Morocco">Morocco</option>
                                        <option value="Mozambique">Mozambique</option>
                                        <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>N</option>
                                        <option value="Namibia">Namibia</option>
                                        <option value="Nauru">Nauru</option>
                                        <option value="Nepal">Nepal</option>
                                        <option value="Netherlands">Netherlands</option>
                                        <option value="New Zealand">New Zealand</option>
                                        <option value="Nicaragua">Nicaragua</option>
                                        <option value="Niger">Niger</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="North Korea">North Korea</option>
                                        <option value="Norway">Norway</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>O</option>
                                        <option value="Oman">Oman</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>P</option>
                                        <option value="Pakistan">Pakistan</option>
                                        <option value="Palau">Palau</option>
                                        <option value="Palestine">Palestine</option>
                                        <option value="Panama">Panama</option>
                                        <option value="Papua New Guinea">Papua New Guinea</option>
                                        <option value="Paraguay">Paraguay</option>
                                        <option value="Peru">Peru</option>
                                        <option value="Philippines">Philippines</option>
                                        <option value="Poland">Poland</option>
                                        <option value="Portugal">Portugal</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>Q</option>
                                        <option value="Qatar">Qatar</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>R</option>
                                        <option value="Romania">Romania</option>
                                        <option value="Russia">Russia</option>
                                        <option value="Rwanda">Rwanda</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>S</option>
                                        <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                        <option value="Saint Lucia">Saint Lucia</option>
                                        <option value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                                        <option value="Samoa">Samoa</option>
                                        <option value="San Marino">San Marino</option>
                                        <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                        <option value="Saudi Arabia">Saudi Arabia</option>
                                        <option value="Senegal">Senegal</option>
                                        <option value="Serbia">Serbia</option>
                                        <option value="Seychelles">Seychelles</option>
                                        <option value="Sierra Leone">Sierra Leone</option>
                                        <option value="Singapore">Singapore</option>
                                        <option value="Slovakia">Slovakia</option>
                                        <option value="Slovenia">Slovenia</option>
                                        <option value="Solomon Islands">Solomon Islands</option>
                                        <option value="Somalia">Somalia</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="South Korea">South Korea</option>
                                        <option value="South Sudan">South Sudan</option>
                                        <option value="Spain">Spain</option>
                                        <option value="Sri Lanka">Sri Lanka</option>
                                        <option value="Sudan">Sudan</option>
                                        <option value="Suriname">Suriname</option>
                                        <option value="Swaziland">Swaziland</option>
                                        <option value="Sweden">Sweden</option>
                                        <option value="Switzerland">Switzerland</option>
                                        <option value="Syrias">Syria</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>T</option>
                                        <option value="Taiwan">Taiwan</option>
                                        <option value="Tajikistan">Tajikistan</option>
                                        <option value="Tanzania">Tanzania</option>
                                        <option value="Thailand">Thailand</option>
                                        <option value="Timor-Leste">Timor-Leste</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Tonga">Tonga</option>
                                        <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                        <option value="Tunisia">Tunisia</option>
                                        <option value="Turkey">Turkey</option>
                                        <option value="Turkmenistan">Turkmenistan</option>
                                        <option value="Tuvalu">Tuvalu</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>U</option>
                                        <option value="Uganda">Uganda</option>
                                        <option value="Ukraine">Ukraine</option>
                                        <option value="United Arab Emirates (UAE)">United Arab Emirates (UAE)</option>
                                        <option value="United Kingdom (UK)">United Kingdom (UK)</option>
                                        <option value="United States of America (USA)">United States of America (USA)</option>
                                        <option value="Uruguay">Uruguay</option>
                                        <option value="Uzbekistan">Uzbekistan</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>V</option>
                                        <option value="Vanuatu">Vanuatu</option>
                                        <option value="Vatican City (Holy See)">Vatican City (Holy See)</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Vietnam">Vietnam</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>Y</option>
                                        <option value="Yemen">Yemen</option>
                                        
                                        <option style="color:red;font-weight:bold;" disabled>Z</option>
                                        <option value="Zambia">Zambia</option>
                                        <option value="Zimbabwe">Zimbabwe</option>
                                    </select>  
                                    <p id="residenceErr" class="error-message"></p>                     	
                                </td>
                            </tr>
                            
                            <!----------Date of Birth--------->
                            <tr>
                                <td class="col1"><strong>Date of Birth:</strong></td>
                                <td class="col2"><input id="dobId" class="w3-input w3-border" type="date" name="dobNrb" value="" placeholder="mm/dd/yyyy" oninput="getAge(this.value)">
                                <p id="dobNrbErr" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Gender--------->
                            <tr>
                                <td class="col1"><strong>Gender:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input id="maleId" class="w3-radio" type="radio" name="genderNrb" value="male" onChange="showGrp(this.value)">
                                    <label class="w3-validate">Male</label>
                                    <input id="femaleId" style="margin-left:30px" class="w3-radio" type="radio" name="genderNrb" value="female" onChange="showGrp(this.value)">
                                    <label class="w3-validate">Female</label>
                                    </p> 
                                    <p id="genderNrbErr" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------Group--------->
                            <tr id="bcNrbId">
                                <td class="col1 w3-slim"><strong>Group:</strong></td>
                                <td class="col2">
                                    <select id="grpNrbID" class="w3-select" name="grpNrb" onChange="selectGrp(this.value)">
                                        <option value="" disabled selected>Choose a Group</option>
                                        <?php while($rowGrpNameNrb = mysqli_fetch_assoc($resultGrpNameNrb)) { ?>
                                        <option value="<?php echo $rowGrpNameNrb["grp_id"]; ?>"><?php echo $rowGrpNameNrb["grp_name"]; ?></option>
                                        <?php } ?>
                                    </select>     
                                    <p id="grpNrbErr" class="error-message"></p>                  	
                                </td>
                            </tr>
                            
                            <!----------Identity--------->
                            <tr>
                                <td class="col1"><strong>Identity:</strong></td>
                                <td class="col2">
                                    <p>
                                    <input class="w3-radio identity" type="radio" name="idnNrb" value="nid" onchange="identity3(this.value)">
                                    <label class="w3-validate">NID</label>
                                    <input style="margin-left:30px" class="w3-radio identity" type="radio" name="idnNrb" value="bc" onchange="identity3(this.value)">
                                    <label class="w3-validate">Birth Certificate</label>
                                    </p>
                                    <p id="identityNrbErr" class="error-message"></p>
                                </td>
                            </tr>
                            
                            <!----------National ID No--------->
                            <tr id="nid3">
                                <td class="col1"><strong>National ID No:</strong></td>
                                <td class="col2">
                                    <input id="nidNrbId" name="nidNrb" class="w3-input w3-border" type="text" placeholder="Your National ID">
                                    <!--<p id="nidErr" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Birth Certificate No--------->
                            <tr id="bcNo3" style="display:none;">
                                <td class="col1"><strong>Birth Certificate No:</strong></td>
                                <td class="col2">
                                    <input id="bcTextNrbId" name="bcNrb" class="w3-input w3-border" type="text" placeholder="Your Birth Certificate Number">
                                    <!--<p id="bcErr" class="error-message"></p>-->
                                </td>
                            </tr>
                            
                            <!----------Error Message for BC & NID--------->
                            <tr>
                                <td class="col1" style="height:0px;"></td>
                                <td class="col2" style="height:0px;">
                                	<p class="error-message" id="bcNidNrbErr"></p>
                                </td>
                            </tr>
                            
                            <script>
                                function identity3(x) {
                                    if(x == "nid") {
                                        $("#bcNo3").slideUp(.1);
                                        $("#nid3").slideDown("slow");
                                    }
                                    if(x == "bc") {
                                        $("#nid3").slideUp(.1);
                                        $("#bcNo3").slideDown("slow");
                                    }
                                }
                            </script>
                        </table>
                    </form>
                    
                    <div>
                        <a id="nextBtnNrb" class="w3-btn w3-blue w3-right w3-large w3-round w3-margin-top">Next <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                
                
                <!-------------Sending info to nrbProcess.php using AJAX------------>
                <script>
					
					$(document).ready(function() {
						
						$("#nextBtnNrb").click(function() {
							
							var fd = new FormData(document.querySelector("#priligrimFormNrbId"));
						
							$.ajax({
								url: "nrbProcess.php",
								type: "POST",
								data: fd,
								contentType: false,
								processData: false,
								success: function(e) {
									if(e.indexOf("success") != -1) {
										alert("Datas have been stored successfully!");
										document.getElementById("extraValMaleAdultId").value = document.getElementById("nidNrbId").value;
										document.getElementById("extraValBcMaleAdultId").value = document.getElementById("bcTextNrbId").value;
										$("#extraMaleAdultInfoFormId").submit();
									}
									if(e.indexOf("failed") != -1) {
										alert("Something went wrong!");	
									}
									else {
										var nrbFoo = JSON.parse(e);
										
										document.getElementById("dobNrbErr").innerHTML = nrbFoo[0];
										document.getElementById("grpNrbErr").innerHTML = nrbFoo[1];
										document.getElementById("identityNrbErr").innerHTML = nrbFoo[2];
										document.getElementById("bcNidNrbErr").innerHTML = nrbFoo[3];
										document.getElementById("residenceErr").innerHTML = nrbFoo[4];
										document.getElementById("genderNrbErr").innerHTML = nrbFoo[5];
									}
								}
							}); //---$.ajax()--
							
						}); //---click()----
							
					}); //---ready()----
					
				</script>
                
                <div style="clear:both;"></div>
            </div>
        </div>
    </div>
    
    
	<script>
		document.getElementById("londonTabBtnId").click();
	
		function openCity(evt, cityName) {
			var i, x, tablinks;
			x = document.getElementsByClassName("city");
			for (i = 0; i < x.length; i++) {
				x[i].style.display = "none";
			}
			tablinks = document.getElementsByClassName("tablink");
			for (i = 0; i < x.length; i++) {
				tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
			}
			document.getElementById(cityName).style.display = "block";
			evt.currentTarget.firstElementChild.className += " w3-border-red";
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