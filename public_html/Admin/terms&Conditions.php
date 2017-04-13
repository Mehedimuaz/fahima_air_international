<?php session_start(); ?>
<?php
	if($_SESSION["hajj_website"] != "Yes") {
		header("location: index.php");
	}
?>
<?php include_once("dbConnector.php"); ?>
<?php 
	if ($_SERVER["REQUEST_METHOD"] == "POST") { 
	
		if(!empty($_POST["terms"])) {
				
			$tc = mysqli_real_escape_string($connection,$_POST["terms"]);
			
			$insertTC = "INSERT INTO terms_conditions (t_c) VALUES ('{$tc}')";
			$resultTC = mysqli_query($connection,$insertTC);
			
			if($resultTC) {
				$_SESSION["message"] = "Successfully Added!";
				header("location: terms&Conditions.php");
				exit;
			} else {
				$_SESSION["message"] = "Something went wrong! Try Again.";
			}
		
		} else {
			$_SESSION["message"] = "Field can't be blank!";
		}
		
	}
	
?>

<!-----------Retrieving Terms & Coditions from Database--------->
<?php
	$selectTC = "SELECT id,t_c FROM terms_conditions";
	$result = mysqli_query($connection,$selectTC);
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<!--<link rel="stylesheet" type="text/css" href="css/header.css">-->
<link rel="stylesheet" type="text/css" href="css/footer.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Admin Panel - Terms & Conditions</title>

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
	
	span, i {
		color:#239B56;
	}
	
	.navbar {
		background-color:rgba(35, 155, 86, 0.9);	
		border:0;
	}
	
	.navbar a {
		color:#fff !important;
		/*text-transform:uppercase;*/
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

	.bg-teal {
		background-color:#EAFAF1;
	}
	
	.content {
		position:relative;
		top:50px;
	}
	
	.terms {
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

    <!------------Terms & Conditions----------->
    <div class="container terms">
        
        <?php if(isset($_SESSION["message"])) { ?>
            <!---------START: Alert---------->
            <?php if($_SESSION["message"] == "Successfully Added!") { ?>
            <div class="alert alert-success alert-dismissable fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["message"];  ?>
            </div>
            <?php } ?>
            
            <?php 
				if($_SESSION["message"] == "Something went wrong! Try Again." || $_SESSION["message"] == "Field can't be blank!") { ?>
				<div class="alert alert-danger alert-dismissable fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<?php echo $_SESSION["message"]; ?>
				</div>
            <?php } ?>
            <!---------END: Alert---------->
            
            <?php session_unset($_SESSION["message"]); ?>
            
        <?php } ?>   
    
        <h2>Terms & Conditions</h2>
        
        <!------------list group of terms & conditions------------->
        <ul class="list-group">
        
            <!---------------Showing Terms & Conditions from database-------------->
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
            <li class="list-group-item">
				<?php echo nl2br($row["t_c"]); ?>
                <button class="btn btn-danger btn-xs pull-right" onClick="deleteTerms(<?php echo $row['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true" style="color:white;"></i> Delete</button>
            </li>
            <?php } ?>
            	
        </ul>
        
        <!---------Form for adding new terms & conditions-------------->
        <form action="terms&Conditions.php" method="post">
            <div class="form-group">
              <label for="comment">New Terms & Conditions:</label>
              <textarea name="terms" class="form-control" rows="5" id="comment"></textarea>
            </div>
            <button type="submit" class="btn btn-success pull-right">Add Terms & Conditions</button>
        </form>
    </div>
    
    
    <!--------------Contact---------------->
    <?php include_once("contact.php"); ?>
    
    
    
    <!--------------Footer---------------->
    <?php include_once("footer.php"); ?>


</div>

<!-----------Smooth Scrolling JS---------->
<script src="js/smoothScolling.js"></script>

<!------------------Delete Terms------------->
<script>

	function deleteTerms(id) {	
		var termsIdJs = id;
		var r = confirm("Are you sure you want to delete this Terms & Conditions?");
		
		if(r == true) {
			$.get(
				"deleteTermsProcess.php",
				{
					termsId: termsIdJs
				},
				function(e) {
					
					if(e.indexOf("success") != -1) {
						alert("Successfully Deleted!");
						window.location = "terms&Conditions.php";
					}
					if(e.indexOf("failed") != -1) {
						alert("Something went wrong! Please Try Again.");
					}
					
				}
			);
		} else {
			window.location = "terms&Conditions.php";
		}
	}
</script>

<script>
	document.getElementsByClassName("nav-link")[4].classList.add("active");
</script>
</body>
</html>