<?php include_once("dbConnector.php"); ?>

<!----------Retrieving News------------>
<?php
	$SelectNews = "SELECT id,heading,body FROM recent_news ORDER BY id DESC";
	$ResultNews = mysqli_query($connection,$SelectNews);
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
<title>All News</title>

<style>

	.content {
		position:relative;
		top:50px;
	}
	
	i {
		color:#fff;	
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


<!-------------------Header------------------->
<?php include_once("header.php"); ?>


<!----------------News List------------------->
<div class="content">
    
    <div class="container">
      <h2>All News <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Add News</button></h2><br/>
      <div class="list-group">
        
        <?php while($RowNews = mysqli_fetch_assoc($ResultNews)) { ?>
        <li class="list-group-item">
          <h3 class="list-group-item-heading"><?php echo $RowNews["heading"]; ?></h3>
          <p class="list-group-item-text"><?php echo substr($RowNews["body"],0,400) . "..."; ?> </p>
          <a  href="fullNews.php?newsId=<?php echo $RowNews['id']; ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-folder-open" aria-hidden="true"></i> Open</a>
          <button style="margin-right:5px;" class="btn btn-danger btn-sm pull-right" onClick="deleteNews(<?php echo $RowNews['id']; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
          <br/>
        </li>
        <?php } ?>
        
      </div>
    </div>

    <!---------------Conatct--------------->
    <?php include_once("contact.php"); ?>
    
    
    <!--------------Footer---------------->
    <?php include_once("footer.php"); ?>

</div>

    <!-- START: Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add Recent News</h4>
                </div>
                <div class="modal-body">
                    <form id="newsFormId">
                        <div class="form-group">
                            <label for="usr">Add Title:</label>
                            <input type="text" class="form-control" name="newsTitle">
                        </div>
                        <div class="form-group">
                        	<label for="comment">News:</label>
                        	<textarea class="form-control" rows="10" name="newsBody"></textarea>
                        </div>
                        <button type="button" class="btn btn-success" onClick="storeNews()">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Modal -->
  
  
<!-----------Smooth Scrolling JS---------->
<script src="js/smoothScolling.js"></script>

<!----------Sending Data to Database Using AJAX------->
<script>
	
	function storeNews() {
		
		var fd = new FormData(document.querySelector("#newsFormId"));
		
		$.ajax({
			url: "newsProcess.php",
			data: fd,
			type: "POST",
			cache: false,
			contentType: false,
			processData: false,
			success: function(e) {
				//alert(e);
				if(e.indexOf("success") != -1) {
					alert("News Added successfully!");
					window.location = "newsList.php";
				}
				if(e.indexOf("failed") != -1) {
					alert("Failed to add news!");
				}
			}
		});
		
	}
	
</script>

<!-----------Delete News From Database Using AJAX---------->
<script>
	
	function deleteNews(newsIdJs) {
		
		var r = confirm("Are you sure you want to delete this news?");
		
		if(r == true) {
			$.post(
				"deleteNewsProcess.php",
				{
					newsId: newsIdJs	
				},
				function(e) {
					
					if(e.indexOf("success") != -1) {
						alert("Successfully deleted!");
						window.location = "newsList.php";	
					} 
					if(e.indexOf("failed") != -1) {
						alert("Failed to delete!");	
					} 
					
				}
			);
		} else {
			
		}
		
	}
	
</script>

</body>
</html>