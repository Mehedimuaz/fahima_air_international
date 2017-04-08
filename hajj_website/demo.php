<?php session_start(); ?>
<?php include_once("dbConnector.php"); ?>

<!-----------Inserting Post into database using PHP---------->
<?php include_once("postAnswerProcess.php"); ?>

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
<title>Admin Panel - Question</title>

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
	
	#formId {
		display:none;	
	}

</style>
</head>

<body>


<!--------------Header---------------->
<?php include_once("header.php"); ?>


<!----------START: conrtent------->
<div class="content">

	
    <!----------START: all-post------->
    <div class="container all-posts">
      <h2>All the questions asked by users</h2><br/>
      
      
      	<?php if($_SESSION["postMessage"] == "Posted Successfully!") { ?>
        <!------------START: Alert------------->
        <div class="alert alert-success alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_SESSION["postMessage"]; ?>
        </div>
        <!------------END: Alert------------->
        <?php } ?>
        
        
      	<?php if($_SESSION["postMessage"] == "Something went wrong! Please try again" || $_SESSION["postMessage"] == "Field can't be blank!") { ?>
        <!------------START: Alert------------->
        <div class="alert alert-danger alert-dismissable">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <?php echo $_SESSION["postMessage"]; ?>
        </div>
        <!------------END: Alert------------->
        <?php } ?>
        
      
      <!------------START: Media 1------------->
      <div class="media post">
        <div class="media-left">
          <img src="images/blankImage.gif" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
          
          <!-- Nested media object -->
          <div class="media">
            <div class="media-left">
              <img src="images/blankImage.gif" class="media-object" style="width:45px">
            </div>
            <div class="media-body">
              <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              
            </div>
          </div>
          
        </div>
        
        <!------------START: publish & delete button------------->
        <span class="pull-right"><a class="btn btn-primary" href="#">Publish</a> &nbsp;&nbsp;<a class="btn btn-danger" href="#">Delete</a></span>
        <!------------END: publish & delete button------------->
        
      </div>
      <!------------END: Media 1------------->
      
      
      <!------------START: Media 2------------->
      <div class="media post">
        <div class="media-left">
          <img src="images/blankImage.gif" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
            <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            
            <!------------START: Answer form------------->
            <form id="formId" action="question.php" method="post">
                <div class="form-group">
                    <label for="comment">Answer:</label>
                    <textarea name="post" class="form-control" rows="5" id="comment"></textarea>
                </div>
                <button type="submit" class="btn btn-default">Post</button>
            </form>
            <!------------END: Answer form------------->
         </div>
         
         <!------------START: answer & delete button------------->
         <span class="pull-right"><button id="answerBtnId" class="btn btn-success">Answer</button> &nbsp;&nbsp;<a class="btn btn-danger" href="#">Delete</a></span>
         <!------------END: answer & delete button------------->
         
      </div>
      <!------------END: Media 2------------->
      
      
      <!------------START: Media 3------------->
      <div class="media post">
        <div class="media-left">
          <img src="images/blankImage.gif" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
          <h4 class="media-heading">John Doe <small><i>Posted on February 19, 2016</i></small></h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        </div>
        
        <!------------START: answer & delete button------------->
        <span class="pull-right"><a class="btn btn-success" href="#">Answer</a> &nbsp;&nbsp;<a class="btn btn-danger" href="#">Delete</a></span>
        <!------------END: answer & delete button------------->
        
      </div>
      <!------------END: Media 3------------->
      
      
    </div>
    <!----------END: all-post------->
    
    
    <!--------------Contact---------------->
    <?php include_once("contact.php"); ?>
    
    
    
    <!--------------Footer---------------->
    <?php include_once("footer.php"); ?>


</div>
<!----------END: conrtent------->


<!-----------Smooth Scrolling JS---------->
<script src="js/smoothScolling.js"></script>

<!-----------Slide toggle input field------->
<script>
	$(document).ready(function() {
		$("#answerBtnId").click(function(){
			$("#formId").slideToggle();
		});  
	});
</script>

</body>
</html>