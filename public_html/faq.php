<?php include_once("dbConnector.php"); ?>

<?php
	$SelectFaq = "SELECT q_name,q_date,question,answer,a_name,a_date FROM faq";
	$ResultFaq = mysqli_query($connection,$SelectFaq);
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
	
	.all-posts {
		padding-bottom:32px;
	}
	
	.post {
		border-radius:8px;
		padding:16px;
		box-shadow:0px 0px 5px;
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

    <div class="container all-posts">
      <h2>FAQ(Frequently Asked Question)</h2>
      <p>Most asked question & their corrensponding answers:</p><br>
      
      <?php while($rowFaq = mysqli_fetch_assoc($ResultFaq)) { ?>
      <div class="media post">
        <div class="media-left">
          <img src="images/blankImage.gif" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading"><?php echo $rowFaq['q_name']; ?> <small><i>Posted on <?php echo $rowFaq['q_date']; ?></i></small></h4>
          <p><?php echo nl2br($rowFaq['question']); ?></p>
          
          <!-- Nested media object -->
          <div class="media">
            <div class="media-left">
              <img src="images/blankImage.gif" class="media-object" style="width:45px">
            </div>
            <div class="media-body">
              <h4 class="media-heading"><?php echo $rowFaq['a_name']; ?> <small><i>Posted on <?php echo $rowFaq['a_date']; ?></i></small></h4>
              <p><?php echo nl2br($rowFaq['answer']); ?></p>
              
            </div>
          </div>
          
        </div>
      </div>
      <?php } ?>
      
    </div>
    
    
    <!--------------Contact---------------->
    <?php include_once("contact.php"); ?>
    
    
    
    <!--------------Footer---------------->
    <?php include_once("footer.php"); ?>


</div>


<!-----------Smooth Scrolling JS---------->
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
	document.getElementsByClassName("nav-link")[2].classList.add("active");
</script>

</body>
</html>