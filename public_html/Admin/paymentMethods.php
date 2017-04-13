<?php session_start(); ?>
<?php
	if($_SESSION["hajj_website"] != "Yes") {
		header("location: index.php");
	}
?>
<?php include_once("dbConnector.php"); ?>
<?php 
	//-------------Inserting Payment Methods into database using PHP-----------
	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	
		if(!empty($_POST["pm"])) {
				
			$pm = mysqli_real_escape_string($connection,$_POST["pm"]);
			
			$insertPM = "INSERT INTO payment_method (p_m) VALUES ('{$pm}')";
			$resultPM = mysqli_query($connection,$insertPM);
			
			if($resultPM) {
				$_SESSION["pmMessage"] = "Successfully Added!";
				header("location: paymentMethods.php");
				exit;
			} else {
				$_SESSION["pmMessage"] = "Something went wrong! Try Again.";
			}
		
		} else {
			$_SESSION["pmMessage"] = "Field can't be blank!";
		}
		
	}
	
?>


<!-----------Retrieving Payment Method from Database--------->
<?php
	$selectPM = "SELECT id,p_m FROM payment_method";
	$result = mysqli_query($connection,$selectPM);
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
<title>Admin Panel - Payment Methods</title>

<style>

	body {
		font: 400 15px Lato, sans-serif;
		line-height: 1.8;
		color: #818181;
		counter-reset:section;
	}
	
	li.list-group-item::before {
		counter-increment:section;
		content:counter(section) ". ";
	}

	.content {
		position:relative;
		top:50px;
	}
	
	.payment-method {
		padding-bottom:32px;
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


<!--------------Header---------------->
<?php include_once("header.php"); ?>


<div class="content">

    <!------------Payment Methods----------->
    <div class="container payment-method">
    
    	<?php if(isset($_SESSION["pmMessage"])) { ?>
            <!---------START: Alert---------->
            <?php if($_SESSION["pmMessage"] == "Successfully Added!") { ?>
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["pmMessage"]; ?>
            </div>
            <?php } ?>
            
            <?php if($_SESSION["pmMessage"] == "Something went wrong! Try Again." || $_SESSION["pmMessage"] == "Field can't be blank!") { ?>
            <div class="alert alert-danger alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["pmMessage"]; ?>
            </div>
            <?php } ?>
            <!---------END: Alert---------->
            
            <?php session_unset($_SESSION["pmMessage"]); ?>
            
        <?php } ?>
    
      <h2>Payment Methods</h2>
      
      <!-----------Showing List group of payment method--------->
      <ul class="list-group">
      	<?php while($row = mysqli_fetch_assoc($result)) { ?>
        <li class="list-group-item">
        	<?php echo nl2br($row["p_m"]); ?>
            <button class="btn btn-danger btn-xs pull-right" onClick="deletePm(<?php echo $row['id']; ?>)">
                <i class="fa fa-trash-o" aria-hidden="true" style="color:white;"></i> Delete
            </button>
        </li>
        <?php } ?>
      </ul>
      
        <!---------Form for adding new Payment Method-------------->
        <form action="paymentMethods.php" method="post">
            <div class="form-group">
              <label for="comment">New Payment Method:</label>
              <textarea name="pm" class="form-control" rows="5" id="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Add Payment Method</button>
        </form>
        
    </div>
    
    
    <!--------------Contact---------------->
    <?php include_once("contact.php"); ?>
    
    
    
    <!--------------Footer---------------->
    <?php include_once("footer.php"); ?>


</div>

<!-----------Smooth Scrolling JS---------->
<script src="js/smoothScolling.js"></script>

<!------------------Delete Payment Method------------->
<script>

	function deletePm(id) {	
		var pmIdJs = id;
		var r = confirm("Are you sure you want to delete this method?");
		
		if(r == true) {
			$.get(
				"deletePmProcess.php",
				{
					pmId: pmIdJs
				},
				function(e) {
					
					if(e.indexOf("success") != -1) {
						alert("Successfully Deleted!");
						window.location = "paymentMethods.php";
					}
					if(e.indexOf("failed") != -1) {
						alert("Something went wrong! Please Try Again.");
					}
					
				}
			);
		} else {
			window.location = "paymentMethods.php";
		}
	}
</script>

<script>
	document.getElementsByClassName("nav-link")[4].classList.add("active");
</script>

</body>
</html>