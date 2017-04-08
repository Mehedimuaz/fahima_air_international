<?php include_once("dbConnector.php"); ?>

<?php
	$selectTC = "SELECT t_c FROM terms_conditions";
	$result = mysqli_query($connection,$selectTC);
	$i = 0;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/header.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Fahima Air International</title>

<style>

	.content {
		position:relative;
		top:50px;
	}

	.dropdown-menu li a {
		background-color:#fff !important;
		color:#239B56 !important;
		-webkit-transition:background-color .5s, color .5s;
		transition:background-color .5s, color .5s;
	}
	
	.dropdown-menu li {
		background-color:#fff !important;
		-webkit-transition:background-color 1s;
		transition:background-color .5s;
	}
	
	
	.dropdown-menu li:hover {
		background-color:#239B56 !important;
		color:#fff;
	}
	
	.dropdown-menu li a:hover {
		background-color:#239B56 !important;
		color:#fff !important;
	}

</style>
</head>

<body>



<?php include_once("header.php"); ?>


<div class="content">


    <div class="container">
      <h2>Terms & Conditions</h2>
      <ul class="list-group">
      	

        <?php while($row = mysqli_fetch_assoc($result)) { ?>
        	<li class="list-group-item"><?php echo ++$i . ". " . $row["t_c"]; ?></li>
 		<?php } ?>	
      </ul>
    </div>

	<!----------Contact----------------->
    <?php include_once("contact.php"); ?>


	<!----------Footer----------------->
    <?php include_once("footer.php"); ?>


</div>


<script src="js/smoothScolling.js"></script>

<!--------------Sending Contact Info to database using AJAX--------->

<script>
	
	function sendContactInfo() {
	
		var fd = new FormData(document.querySelector("#contactFormId"));
		
		$.ajax({
			url: "ContactFormProcess.php",
			data: fd,
			type: "POST",
			contentType: false,
			processData: false,
			success: function(e) {
				if(e.indexOf("Question has been sent!") != -1) {
					alert(e.trim());
					document.getElementById("contactFormId").reset();
				}
				if(e.indexOf("Something went wrong!") != -1) {
					alert(e.trim());
				}
				if(e.indexOf("Question field can't be blank!") != -1) {
					alert(e.trim());
				}
			}
		});
		
	}
	
</script>

<script>
	document.getElementsByClassName("nav-link")[3].classList.add("active");
</script>

</body>
</html>