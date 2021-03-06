<?php include_once("dbConnector.php"); ?>

<!------------Retrieving News------------>
<?php
	$SelectNews = "SELECT id,heading,body FROM recent_news WHERE id={$_GET['newsId']}";
	$ResultNews = mysqli_query($connection,$SelectNews);
	
	$RowNews = mysqli_fetch_assoc($ResultNews);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/header.css">
<link type="text/css" rel="stylesheet" href="css/footer.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>News</title>

<style>
	.content {
		padding:32px 0px;	
	}
	
	.news-body {
		line-height:1.5;
		font-size:18px;	
		word-spacing:1.5px;
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
	
<!-------------------START: Header------------------->
<?php include_once("header.php"); ?>
<!-------------------END: Header------------------->


<div class="content">
	<div class="container text-justify">
    
    	<h2><?php echo $RowNews['heading']; ?></h2><br/>
        
        <p class="news-body text-justify"><?php echo nl2br($RowNews['body']); ?></p>
    </div>
</div>

<!-------------------START: Contact------------------->    
<?php include_once("contact.php"); ?>
<!-------------------END: Contact------------------->   

<!-------------------START: Footer------------------->    
<?php include_once("footer.php"); ?>
<!-------------------END: Footer------------------->   

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

</body>
</html>