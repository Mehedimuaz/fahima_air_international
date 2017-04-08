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
<title>Admin Panel</title>

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
		border:1px solid #fff;
		-webkit-transition:background-color 1s, color 1s, border 1s;
		transition:background-color 1s, color 1s, border 1s;
	}
	
	.panel-footer a i {
		color:white;
		-webkit-transition:color 1s;
		transition:color 1s;
	}
	
	.panel-footer a:hover i {
		color:#239B56;
	}
	
	.panel-footer button i {
		color:#239B56;
		-webkit-transition:color 1s;
		transition:color 1s;
	}
	
	.panel-footer button:hover i {
		color:#fff;
	}
	
	.panel-footer button {
		background-color:#fff;
		color:#239B56;
		border:1px solid #239B56;
		-webkit-transition:background-color 1s, color 1s, border 1s;	
		transition:background-color 1s, color 1s, border 1s;
	}
	
	.panel-footer a:hover {
		border:1px solid #239B56;
		background-color:#fff;	
		color:#239B56;
	}
	
	.panel-footer button:hover {
		color:#fff;
		background-color:#239B56;
		border:1px solid #fff;	
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
          <a class="navbar-brand" href="index.php">WebSiteName</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="nav-link"><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
            <li class="nav-link"><a href="question.php"><i class="fa fa-question" aria-hidden="true"></i> Questions</a></li>
            <li class="nav-link"><a href="faq.php"><i class="fa fa-question" aria-hidden="true"></i> FAQ</a></li>
            <li class="nav-link"><a href="#aboutId"><i class="fa fa-user" aria-hidden="true"></i> About US</a></li>
            <li class="dropdown nav-link"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-tasks" aria-hidden="true"></i> Rules <span class="caret"></span></a>
                <ul class="dropdown-menu">
                    <li><a href="terms&Conditions.php">Terms & Conditions</a></li>
                    <li><a href="paymentMethods.php">Payment Methods</a></li>
                    <li><a href="hajjRules.php">Hajj Rules</a></li>
                </ul>
            </li>
            <li class="nav-link"><a href="#contactId"><i class="fa fa-phone" aria-hidden="true"></i> Contact US</a></li>
            <li class="nav-link"><a href="#newsId"><i class="fa fa-newspaper-o" aria-hidden="true"></i> News</a></li>
            <li class="nav-link"><a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
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
              <h3>Chania</h3>
              <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
            </div>
          </div>
    
          <div class="item">
            <img src="images/slider2.jpg" alt="Chania">
            <div class="cover"></div>
            <div class="carousel-caption">
              <h3>Chania</h3>
              <p>The atmosphere in Chania has a touch of Florence and Venice.</p>
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
    <div id="aboutId" class="text-center jumbotron about bg-teal" style="padding:80px 0px;">
    	<div class="container">
            <h2>About US</h2><br/>
            <p><?php echo nl2br($RowAbout['about']); ?></p>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i style="color:#fff;" class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</button>
        </div>
    </div>
    
    
    <!-------------------START: Packages----------------------->
    <div class="container" style="padding:50px 0px;">
    
        <div class="row text-center">
        	<h2 class="container">Hajj Packages 
            	<!--------START: Add Packages Button------>
            	<button class="btn btn-primary pull-right" data-toggle="modal" data-target="#packageModal"><i style="color:#fff;" class="fa fa-plus" aria-hidden="true"></i> Add Packages</button>
                <!--------END: Add Packages Button------>
            </h2><br/>
            
            <?php while($RowPackage = mysqli_fetch_assoc($ResultPackage)) { ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                
                	<!-----------START: Panel-Heading------->
                    <div class="panel-heading">
                        	<!-----------START: Edit Button for Package------->
							<?php echo $RowPackage['title']; ?> <button class="btn btn-default" data-toggle="modal" data-target="#updatePackageModal<?php echo $RowPackage['id']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button>
                            <!-----------END: Edit Button for Package------->
                        </h2>
                    </div>
                    <!-----------END: Panel-Heading------->
                    
                    
                    <!-- START: Update Packages Modal -->
                    <div id="updatePackageModal<?php echo $RowPackage['id']; ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog modal-lg">
                    
                        <!-- START: Update Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" style="text-align:left;">Update Packages</h4>
                          </div>
                          <div class="modal-body">
                            <form id="updatePackageFormId<?php echo $RowPackage['id']; ?>">
                                <div class="form-group" style="text-align:left;">
                                    <label for="title">Title:</label>
                                    <input id="uTitleId<?php echo $RowPackage['id']; ?>" name="uTitle" value="<?php echo $RowPackage['title']; ?>" type="text" class="form-control" id="email" required>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label for="details">Summary:</label>
                                    <textarea id="uSummary<?php echo $RowPackage['id']; ?>" name="uSummary" class="form-control" rows="3" id="summaryId" required><?php echo $RowPackage['summary']; ?></textarea>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label for="price">Price:</label>
                                    <input id="uPrice<?php echo $RowPackage['id']; ?>" name="uPrice" value="<?php echo $RowPackage['price']; ?>" type="number" class="form-control" id="pwd" required>
                                </div>
                                <div class="form-group" style="text-align:left;">
                                    <label for="details">Details:</label>
                                    <textarea id="uDetails<?php echo $RowPackage['id']; ?>" name="uDetails" class="form-control" rows="20" required><?php echo $RowPackage['details']; ?></textarea>
                                </div>
                                <p  style="text-align:right;"><button type="button" class="btn btn-success" onClick="updatePackage(<?php echo $RowPackage['id']; ?>)">Update</button></p>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- END: Update Modal content-->
                    
                      </div>
                    </div>
                    <!-- END: Update Packages Modal --> 
                    
                    
                    <!-----------START: Panel-Body------->
                    <div class="panel-body">
                        <p><strong><?php echo nl2br($RowPackage["summary"]); ?></strong></p>
                        <h2><strong>Price: </strong><?php echo $RowPackage['price']; ?>/-</h2>
                    </div>
                    <!-----------END: Panel-Body------->
                    
                    
                    <!-----------START: Panel-Footer------->
                    <div class="panel-footer">
                    
                    	<!-----------START: Know More Button------->
                    	<a href="packageDeatails.php?package_id=<?php echo $RowPackage['id']; ?>" class="btn btn-default"><i class="fa fa-info" aria-hidden="true"></i> Know More</a>
                        <!-----------END: Know More Button------->
                        
                        <!-----------START: Delete Button------->
                        <button type="button" class="btn btn-default" onClick="deletePackage(<?php echo $RowPackage['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        <!-----------END: Delete Button------->
                        
                    </div>
                    <!-----------END: Panel-Footer------->
                    
                </div> 
            </div>
            <?php } ?>
        </div>
        
    </div>
    <!-------------------END: Packages----------------------->

    
    
    
    <!--------------Contact----------->
    <?php include_once("contact.php") ?>
    
    
    
    
    <!---------------footer--------------->
    <?php include_once("footer.php"); ?>

    
    
    <!-----------Smooth Scrolling JS---------->
	<script src="js/smoothScolling.js"></script>

  <!-- START: Update News Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Update About US</h4>
        </div>
        <div class="modal-body">
            <form id="aboutUsFormId">
                <div class="form-group">
                    <label for="comment">Description:</label>
                    <textarea class="form-control" rows="5" name="aboutUsBody"></textarea>
                </div>
                <button type="button" class="btn btn-success" onClick="storeAboutUs()">Submit</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- END: Update News Modal -->
  
<!-- START: Add Packages Modal -->
<div id="packageModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Packages</h4>
      </div>
      <div class="modal-body">
        <form id="packageFormId">
            <div class="form-group">
                <label for="title">Title:</label>
                <input name="title" type="text" class="form-control" id="email" required>
            </div>
            <div class="form-group">
                <label for="details">Summary:</label>
                <textarea name="summary" class="form-control" rows="3" id="summaryId" required></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input name="price" type="number" class="form-control" id="pwd" required>
            </div>
            <div class="form-group">
                <label for="details">Details:</label>
                <textarea name="details" class="form-control" rows="20" id="comment" required></textarea>
            </div>
        	<button type="button" class="btn btn-success" onClick="addPackage()">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- END: Add Packages Modal -->  

 
  
  <!----------------Update About US Using AJAX---------->
  <script>
  	
	function storeAboutUs() {
		
		var fd = new FormData(document.querySelector("#aboutUsFormId"));
		
		$.ajax({
			
			url: "aboutUsProcess.php",
			type:"POST",
			data: fd,
			contentType: false,
			processData: false,
			success: function(e) {
				//alert(e);
				if(e.indexOf("success") != -1) {
					alert("Updated Successfully!");
					window.location = "index.php";
				}
				if(e.indexOf("failed") != -1) {
					alert("Failed to update!");
				}
			}
			
		});
		
	}
	
  </script>
  
  <!----------------Add Package Using AJAX---------->
  <script>
  	function addPackage() {
		
		var fd = new FormData(document.querySelector("#packageFormId"));
		
		$.ajax({
			
			url: "addPackageProcess.php",
			type:"POST",
			data: fd,
			contentType: false,
			processData: false,
			success: function(e) {
				
				if(e.indexOf("success") != -1) {
					alert("Successfully Added!");	
					window.location = "index.php";
				}
				if(e.indexOf("failed") != -1) {
					alert("Failed to Add!");	
				}
				
			}
			
		});
			
	}
  </script>
  
  
  
   <!----------------Update Package Using AJAX---------->
  <script>
  	function updatePackage(packageId) {
			
		var uTitle = document.getElementById("uTitleId"+packageId).value;
		var uSummary = document.getElementById("uSummary"+packageId).value;
		var uPrice = document.getElementById("uPrice"+packageId).value;
		var uDetails = document.getElementById("uDetails"+packageId).value;
			
		$.post(
			
			"updatePackageProcess.php",
			{
				packageId: packageId,
				uTitle: uTitle,
				uSummary: uSummary,
				uPrice: uPrice,
				uDetails: uDetails
			},
			function(e) {
				if(e.indexOf("success") != -1) {
					alert("Updated Successfully!");	
					window.location = "index.php";
				}
				if(e.indexOf("failed") != -1) {
					alert("Failed to Update!");	
				}
			}
			
		);	
		//alert(packageId);
	}
  </script>  
    
    <!----------------Delete Package Using AJAX---------->
    <script>
		
		function deletePackage(packageIdJs) {
			
			var r = confirm("Are you sure, you want to delete this package?");
			
			if(r == true) {
				$.get(
					
					"deletePackageProcess.php",
					{
						packageId: packageIdJs
					},
					function(e) {
						if(e.indexOf("success") != -1) {
							alert("Successfully Deleted!");
							window.location = 'index.php';	
						} 
						if(e.indexOf("failed") != -1) {
							alert("Failed to Delete!");
						}
					}
					
				);
			}
			
		}
		
	</script>
    
    <script>
		document.getElementsByClassName("nav-link")[0].classList.add("active");
	</script>
</body>
</html>