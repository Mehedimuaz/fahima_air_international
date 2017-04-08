<?php session_start(); ?>
<?php include_once("dbConnector.php"); ?>

<!-------------Retrieving About us content----------->
<?php
	$SelectAbout = "SELECT id,about FROM about_us ORDER BY id DESC LIMIT 1";
	$ResultAbout = mysqli_query($connection,$SelectAbout);
	
	$RowAbout = mysqli_fetch_assoc($ResultAbout);
?>

<!-------------Retrieving Package----------->
<?php
	$SelectPackage = "SELECT id,title,summary,details,price FROM packages ORDER BY id DESC";
	$ResultPackage = mysqli_query($connection,$SelectPackage);	
?>

<?php

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			$q_name = mysqli_real_escape_string($connection,$_POST["q_name"]);
			$q_email = mysqli_real_escape_string($connection,$_POST["q_email"]);
			$question = mysqli_real_escape_string($connection,$_POST["question"]);
			
			if(!empty($_POST["question"])) {
			
				$InsertQuestion = "INSERT INTO question_answer (q_name,q_email,question,q_date) VALUES ('{$q_name}','{$q_email}','{$question}',CURRENT_DATE)";
				$ResultQuestion = mysqli_query($connection,$InsertQuestion);
				
				if($ResultQuestion) {
					$_SESSION["questionMessage"] = "Question has been sent!";
					redirect_to("index.php");
				} else {
					$_SESSION["questionMessage"] = "Something went wrong!";	
				}
				
			} else {
				$_SESSION["questionMessage"] = "Question field can't be blank!";	
			}
			
		} 
		
		function redirect_to( $Location ) {
			header("location: " . $Location);
			exit;
		}

	
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link type="text/css" rel="stylesheet" href="css/footer.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<title>Fahima Air International</title>

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
	
	.carousel-indicators li.active {
		background-color:#239B56;
		border:1px solid #239B56;
	}

	.bg-teal {
		background-color:#EAFAF1;
	}

	.cover {
		position:absolute;
		top:0px;
		bottom:0px;
		left:0px;
		right:0px;
		background-color:rgba(0,0,0,0.2);	
	}
	
	.panel {
		border:1px solid #239B56;
		-webkit-transition:box-shadow .5s;
		transition:box-shadow .5s;
		box-shadow:0px 0px 0px black;
	}
	
	.panel:hover {
		box-shadow:0px 0px 10px black;
	}
	
	.panel-heading {
		padding:30px 0px;	
		background-color:#239B56 !important;
		color:#fff !important;
		border-bottom:1px solid #239B56;
	}
	
	.panel-body {
		padding:32px;
		line-height:3.0;	
	}
	
	.panel-footer {
		padding:30px 0px;
		border-top:1px solid #239B56;
	}
	
	.panel-footer a {
		background-color:#239B56;	
		color:white;
		-webkit-transition:background-color .5s, color .5s;
		transition:background-color .5s, color .5s;
	}
	
	.panel-footer a:hover {
		background-color:#fff;	
		color:#239B56;
	}
	
	.panel-footer a i {
		color:white;
		-webkit-transition:color 1s;
		transition:color 1s;
	}
	
	.panel-footer a:hover i {
		color:#239B56;
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

	<!-------------Navbar-------------------->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="index.php">Fahima Air International</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-link"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="nav-link"><a href="index.php"><i class="fa fa-user" aria-hidden="true"></i> About US</a></li>
            <li class="nav-link"><a href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> FAQ</a></li>
            <li class="dropdown nav-link"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Rules <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li class="nav-link"><a href="terms&Conditions.php">Terms & Conditions</a></li>
                <li class="nav-link"><a href="paymentMethods.php">Payment Methods</a></li>
                <li class="nav-link"><a href="hajjRules.php">Hajj Rules</a></li>
            </ul>
        	</li>
            <li class="nav-link"><a href="#newsId"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a></li>
            <li class="nav-link"><a href="#contactId"><i class="fa fa-phone" aria-hidden="true"></i> Contact US</a></li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-------------Carousel Slide-------------------->
    <div class="">

      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
    
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
    
          <div class="item active">
            <img src="images/slider1.jpg" alt="Chania">
            <div class="cover"></div>
            <div class="carousel-caption">
              <h1 style="font-weight:bold; letter-spacing:4px; text-shadow:1px 1px 2px black, 0 0 1em blue, 0 0 0.2em darkblue;">Fahima Air International</h1>
              <strong style="font-size:20px; font-weight:bold; letter-spacing:2px; text-shadow:1px 1px 2px black, 0 0 1em blue, 0 0 0.2em darkblue;">Your trusted partner for Hajj & Umrah.</strong>
            </div>
          </div>
    
          <div class="item">
            <img src="images/slider2.jpg" alt="Chania">
            <div class="cover"></div>
            <div class="carousel-caption">
              <h1 style="font-weight:bold; letter-spacing:4px;  text-shadow:1px 1px 2px black, 0 0 1em blue, 0 0 0.2em darkblue;">Fahima Air International</h1>
              <strong style="font-size:20px; font-weight:bold; letter-spacing:2px; text-shadow:1px 1px 2px black, 0 0 1em blue, 0 0 0.2em darkblue;">Your trusted partner for Hajj & Umrah.</strong>
            </div>
          </div>
      
        </div>
    
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
    
    <!-----------------About US----------------->
    <div id="aboutId1" class="text-center jumbotron about bg-teal" style="padding:80px 0px;">
    	<div class="container">
            <h2>About US</h2><br/>
            <p><?php echo nl2br($RowAbout['about']); ?></p>
        </div>
    </div>
    
    
    <!-------------------Packages----------------------->
    <div class="container" style="padding:50px 0px;">
        <div class="row text-center">
        	<h2>Hajj Packages</h2><br/>
            <?php while($RowPackage = mysqli_fetch_assoc($ResultPackage)) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><h2><?php echo $RowPackage["title"]; ?></h2></div>
                    <div class="panel-body">
                        <!--<p><strong>20</strong> Lorem</p>
                        <p><strong>15</strong> Ipsum</p>
                        <p><strong>5</strong> Dolor</p>
                        <p><strong>2</strong> Sit</p>
                        <p><strong>Endless</strong> Amet</p>
                        <h2><strong>Price: </strong>5000/-</h2>-->
                        <p><strong><?php echo nl2br($RowPackage["summary"]); ?></strong></p>
                        <h2><strong>Price: </strong><?php echo $RowPackage['price']; ?>/-</h2>
                    </div>
                    <div class="panel-footer">
                    	<a href="packageDeatails.php?package_id=<?php echo $RowPackage['id']; ?>" class="btn btn-success"><i class="fa fa-info" aria-hidden="true"></i> Know More</a>
                    </div>
                </div> 
            </div>
            <?php } ?>
        </div>
    </div>
    
    
    
    
    <!--------------Contact----------->
    <?php include_once("contact.php") ?>
    
    
    
    
    <!---------------footer--------------->
    <?php include_once("footer.php"); ?>

        
    <!-----------Smooth Scrolling JS---------->
	<script src="js/smoothScolling.js"></script>
    
    <script>
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	</script>

</body>
</html>