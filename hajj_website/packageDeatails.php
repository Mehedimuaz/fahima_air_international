<?php include_once("dbConnector.php"); ?>

<?php  
	
	$SelectPackageDetails = "SELECT id,title,summary,details,price FROM packages WHERE id={$_GET['package_id']}";
	$ResultPackageDetails = mysqli_query($connection,$SelectPackageDetails);
	
	$RowPackageDetails = mysqli_fetch_assoc($ResultPackageDetails);
	
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Fahima Air International</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="">
<link type="text/css" rel="stylesheet" href="css/footer.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
<style>
	body {
		font: 400 15px Lato, sans-serif;
		line-height: 1.8;
		color: #818181;
	}
	
	span, i {
		color:#239B56;
	}
	
	.navbar {
		background-color:rgba(35, 155, 86, 0.9);	
		border:0;
	}
	
	.navbar a {
		color:#fff !important;
		text-transform:uppercase;
		letter-spacing:4px;
	}
	
	.navbar span, .navbar i {
		color:#fff;	
	}
	
	.navbar li.active, .navbar li.active a {
		background-color:#fff !important;
	}
	
	.navbar li.active a {
		color:#239B56 !important;
	}
	
	.navbar li.active span, .navbar li.active i {
		color:#239B56;
	}
	
	.package-deatils {
		min-height:400px;
		padding:32px 0px; 
		font-size:18px; 
		line-height:1.8;	
	}
	
	.summary {
		width:500px;
		margin:auto;
		text-align:center;	
		line-height:1.8;
	}
	
@media screen and (max-width: 500px) {
	.summary {
		width:360px;
	}
}

@media screen and (max-width: 400px) {
	.summary {
		width:320px;
	}
}
</style>
</head>

<body>

	<?php include_once("header.php"); ?>
	
    <h2 class="text-center"><?php echo $RowPackageDetails["title"]; ?></h2><br/>
    <h3 class="container summary"><?php echo $RowPackageDetails["summary"]; ?></h3>
        
    <div class="package-deatils container text-justify">
    	<p><?php echo nl2br($RowPackageDetails["details"]); ?></p>
    </div>
    
    <?php include_once("footer.php"); ?>

</body>
</html>