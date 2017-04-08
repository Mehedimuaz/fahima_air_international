<?php include_once("dbConnector.php"); ?>
<?php
	$postId = $_GET["postId"];

	$DeletePost = "DELETE FROM question_answer WHERE id={$postId}";
	$ResultPost = mysqli_query($connection,$DeletePost);
	
	if($ResultPost) {
		echo "success";	
	} else {
		echo "failed";	
	}
?>