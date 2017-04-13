<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Registration</title>

<style>
	* {
		margin:0px;
		padding:0px;
		box-sizing:border-box;	
	}
	
	div,h3,p,ul,li,a,span,form,table,td,tr,th {
		margin:0px;
		padding:0px;	
	}
</style>

</head>

<body>

    <?php include_once("header.php"); ?> 
    
    <style>
		.container {
			width:1300px;
			position:relative;
			top:70px;
			/*height:500px;*/
			/*border:1px solid black;*/	
			margin:auto;
		}
		
		td {
			height:50px;	
			/*border:1px solid black;*/
		}
		
		table {
			width:575px;
			/*border:1px solid black;*/
			margin:auto;	
		}
		
		.col1 {
			width:220px;
			text-align:right;	
		}
		
		.col2 {
			padding-left:20px;
		}
		
	</style>
    
    <div class="container w3-round-large w3-card-8">
    	<h3 class="w3-blue w3-padding-8 w3-container" style="margin:0px;border-radius:8px 8px 0px 0px;">New Pilgrim Registration (Under 18 years)</h3>
        <div class="w3-row"><!------- style="border:1px solid black;"--------->
        	<div class="w3-half w3-padding-16">
            	<table class="w3-round-large">
                	<tr>
                    	<td class="col1 w3-slim"><strong>Birth Registration Number:</strong></td>
                        <td class="col2">2012125425145265</td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Date of Birth:</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="date"></td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Group:</strong></td>
                        <td class="col2">
                            <select class="w3-select" name="option">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>                       	
                        </td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Full Name(Bangla): *</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Full Name(English): *</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Father's Name(Bangla): *</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Mother's Name(Bangla): *</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Occupation: *</strong></td>
                        <td class="col2">
                        	<select class="w3-select" name="option">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                            </select>  
                        </td>
                    </tr>
                    <tr>
                    	<td class="col1 w3-slim"><strong>Mobile Number: *</strong></td>
                        <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                    </tr>
                </table>
                <div style="clear:both;"></div>
            </div>
            <div class="w3-half"><!------- style="border:1px solid black;"--------->
            	<div>
                	<h4 class="w3-container">Current Address(in Bangladesh)</h4>
                	<table class="w3-round-large">
                        <tr>
                            <td class="col1 w3-slim"><strong>District: *</strong></td>
                            <td class="col2">
                                <select class="w3-select" name="option">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>                       	
                            </td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Police Station: *</strong></td>
                            <td class="col2">
                                <select class="w3-select" name="option">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>                       	
                            </td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Address: *</strong></td>
                            <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Post Code: *</strong></td>
                            <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                        </tr>
                    </table>
                    
                    <form style="padding-left:32px;" class="w3-margin-top">
                    	<input class="w3-check" type="checkbox">
						<label class="w3-validate">Same as current address</label>
                    </form>
                </div>
                <div>
                	<h4 class="w3-container">Permanent Address(in Bangladesh)</h4>
                	<table class="w3-round-large">
                        <tr>
                            <td class="col1 w3-slim"><strong>District: *</strong></td>
                            <td class="col2">
                                <select class="w3-select" name="option">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>                       	
                            </td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Police Station: *</strong></td>
                            <td class="col2">
                                <select class="w3-select" name="option">
                                    <option value="" disabled selected>Choose your option</option>
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                </select>                       	
                            </td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Address: *</strong></td>
                            <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                        </tr>
                        <tr>
                            <td class="col1 w3-slim"><strong>Post Code: *</strong></td>
                            <td class="col2"><input class="w3-input w3-border w3-round" type="text"></td>
                        </tr>
                    </table>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        <div class="w3-row"><!------------- style="border:1px solid black;"------------>
            <div class="w3-third">
            	<div class="w3-card-2" style="width:350px;margin:auto;">
                    <h4 class="w3-center w3-padding-8 w3-light-grey w3-border-bottom">Birth Reg Certificate *</h4>
                    <div class="w3-card-4" style="height:210px;width:150px;margin:auto;padding:4px;">
                    	<img style="width:100%;height:100%;" src="images/250X250.jpg">
                    </div>
                    <form class="w3-container w3-padding-16">
                        <input type="file" name="myFile">
                    </form>
                    <p class="w3-container w3-text-grey">[File format *jpg / *png Dimension width (90-110)px and height (90-120)px. File size(4-56)kb]</p>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div class="w3-third">
            	<div class="w3-card-2" style="width:350px;margin:auto;">
                    <h4 class="w3-center w3-padding-8 w3-light-grey w3-border-bottom">Passport/Document of AMerican Residence *</h4>
                    <div class="w3-card-4" style="height:210px;width:150px;margin:auto;padding:4px;">
                    	<img style="width:100%;height:100%;" src="images/250X250.jpg">
                    </div>
                    <form class="w3-container w3-padding-16">
                        <input type="file" name="myFile">
                    </form>
                    <p class="w3-container w3-text-grey">[File format *jpg / *png Dimension width (90-110)px and height (90-120)px. File size(4-56)kb]</p>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        	<div class="w3-third">
            	<div class="w3-card-2" style="width:350px;margin:auto;">
                    <h4 class="w3-center w3-padding-8 w3-light-grey w3-border-bottom">Profile Picture *</h4>
                    <div class="w3-card-4" style="height:210px;width:150px;margin:auto;padding:4px;">
                    	<img style="width:100%;height:100%;" src="images/250X250.jpg">
                    </div>
                    <form class="w3-container w3-padding-16">
                        <input type="file" name="myFile">
                    </form>
                    <p class="w3-container w3-text-grey">[File format *jpg / *png Dimension width (90-110)px and height (90-120)px. File size(4-56)kb]</p>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
            <div style="clear:both;"></div>
        </div>
        
        <div style="padding:50px 16px;"><a class="w3-btn w3-blue w3-round w3-right" href="#">Submit</a></div>
        
    </div>

</body>
</html>