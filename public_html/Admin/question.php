<?php session_start(); ?>
<?php
	if($_SESSION["hajj_website"] != "Yes") {
		header("location: index.php");
	}
?>
<?php include_once("dbConnector.php"); ?>
<?php include_once("postAnswerProcess.php"); ?>


<!-----------Retrieving Post from database using PHP---------->
<?php

	$SelectAnswer = "SELECT id,q_name,q_email,question,q_date,a_name,answer,a_date,faq FROM question_answer ORDER BY id DESC";
	$ResultAnswer = mysqli_query($connection,$SelectAnswer);

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
	
	.form-class {
		display:none;	
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


<!----------START: conrtent------->
<div class="content">

	
    <!----------START: all-post------->
    <div class="container all-posts">
      <h2>All the questions asked by users</h2><br/>
      
      	<?php if(isset($_SESSION["postMessage"])) { ?>
			<?php if($_SESSION["postMessage"] == "Posted Successfully!") { ?>
            <!------------START: Alert------------->
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["postMessage"];session_unset($_SESSION["postMessage"]); ?>
            </div>
            <!------------END: Alert------------->
            <?php } ?>
            
            
            <?php if($_SESSION["postMessage"] == "Something went wrong! Please try again" || $_SESSION["postMessage"] == "Field can't be blank!") { ?>
            <!------------START: Alert------------->
            <div class="alert alert-danger alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php echo $_SESSION["postMessage"];session_unset($_SESSION["postMessage"]); ?>
            </div>
            <!------------END: Alert------------->
            <?php } ?>
        <?php } ?>
      
      
      <?php while($rowPost = mysqli_fetch_assoc($ResultAnswer)) { ?>
      <!------------START: Media------------->
      <div class="media post">
      	
        <div class="media-left">
          <img src="images/blankImage.gif" class="media-object" style="width:45px">
        </div>
        <div class="media-body">
            <h4 class="media-heading"><?php echo $rowPost["q_name"]; ?> <small><i>Posted on <?php echo $rowPost["q_date"]; ?></i></small></h4>
            <p><?php echo nl2br($rowPost["question"]); ?></p>
            
            <?php if($rowPost["answer"] != NULL) { ?>
            <!-- START: Nested media object -->
            <div class="media">
                <div class="media-left">
                <img src="images/blankImage.gif" class="media-object" style="width:45px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo $rowPost["a_name"] ?> <small><i>Posted on <?php echo $rowPost["a_date"]; ?></i></small></h4>
                    <p><?php echo nl2br($rowPost["answer"]); ?></p>
                
                </div>
            </div>
            <!-- END: Nested media object -->
            <?php } ?>
            
            
            <!------------START: Answer form------------->
            <form class="form-class" id="formId<?php echo $rowPost['id']; ?>" action="question.php" method="post">
                <div class="form-group">
                    <label for="comment">Answer:</label>
                    <textarea name="post" class="form-control" rows="5" id="comment"></textarea>
                    <input type="hidden" name="id" value="<?php echo $rowPost['id']; ?>">
                </div>
                <button type="submit" class="btn btn-default">Post</button>
            </form>
            <!------------END: Answer form------------->

         </div>
             
             
         <?php if($rowPost["answer"] == NULL) { ?>
         <!------------START: answer & delete button------------->
         <span class="pull-right"><button id="answerBtnId" class="btn btn-success" onClick="DisplayForm(<?php echo $rowPost['id']; ?>)">Answer</button> &nbsp;&nbsp;<button class="btn btn-danger" onClick="deletePost(<?php echo $rowPost['id'] ?>)">Delete</button></span>
         <!------------END: answer & delete button------------->
         <?php } ?>        


         <?php if($rowPost["answer"] != NULL) { ?>
        <!------------START: publish & delete button------------->
        <span class="pull-right">
        	<?php if($rowPost["faq"] == NULL) { ?>
            	<button class="btn btn-primary" type="button" onClick="publishPostToFaq(<?php echo $rowPost['id']; ?>,'<?php echo $rowPost['q_name']; ?>','<?php echo $rowPost['q_email']; ?>','<?php echo mysqli_real_escape_string($connection,$rowPost['question']); ?>','<?php echo $rowPost['q_date']; ?>','<?php echo $rowPost['a_name']; ?>','<?php echo mysqli_real_escape_string($connection,$rowPost['answer']); ?>','<?php echo $rowPost['a_date']; ?>')">Publish</button> 
            <?php } ?>
            <?php if($rowPost["faq"] == "published") { ?>
            	<mark><strong class="text-success">Published</strong></mark>	
            <?php } ?>
            &nbsp;&nbsp;
            <button class="btn btn-danger" onClick="deletePost(<?php echo $rowPost['id'] ?>)">Delete</button>
        </span>
        <!------------END: publish & delete button------------->
        <?php } ?>
         
      </div>
      <!------------END: Media------------->
      <?php } ?>
      
      
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
	function DisplayForm(id) {
		$("#formId" + id).slideToggle();  
	}
</script>

<!-----------Delete Post------->
<script>
	function deletePost(id) {
		
		var r = confirm("Are you sure you want to delete this post?");
		
		if(r == true) {
			$.get(
				"deleteQuestionProcess.php",
				{
					postId: id
				},
				function(e) {
					if(e.indexOf("success") != -1) {
						alert("Successfully deleted!");	
						window.location = "question.php";
					} 
					if(e.indexOf("failed") != -1) {
						alert("Something went wrong!");	
					}
				}
			);
		} 
		
	}
</script>

<!-------Publishing Post To FAQ--------->
<script>
	function publishPostToFaq(idJS,qName,qEmail,questionJS,qDate,aName,answerJS,aDate) {
		
		$.post(
			"addToFaqProcess.php",
			{
				id: idJS,
				q_name: qName,
				q_email: qEmail,
				question: questionJS,
				q_date: qDate,
				a_name: aName,
				answer: answerJS,
				a_date: aDate
			}, 
			function(e) {
				if(e.indexOf("success") != -1) {
					alert("Successfully published to FAQ!");
					window.location = "question.php";
				} 
				
				if(e.indexOf("failed") != -1) {
					alert("Failed to publish! Please try again.");
				}
			}
		);
		
	}
</script>

<script>
	document.getElementsByClassName("nav-link")[1].classList.add("active");
</script>

</body>
</html>