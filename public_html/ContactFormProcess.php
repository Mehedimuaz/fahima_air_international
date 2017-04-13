<?php include_once("dbConnector.php"); ?>

<?php


			
	$q_name = mysqli_real_escape_string($connection,$_POST["q_name"]);
	$q_email = mysqli_real_escape_string($connection,$_POST["q_email"]);
	$question = mysqli_real_escape_string($connection,$_POST["question"]);
	
	if(!empty($_POST["question"])) {
	
		$InsertQuestion = "INSERT INTO question_answer (q_name,q_email,question,q_date) VALUES ('{$q_name}','{$q_email}','{$question}',CURRENT_DATE)";
		$ResultQuestion = mysqli_query($connection,$InsertQuestion);
		
		if($ResultQuestion) {
			echo "Question has been sent!";
		} else {
			echo "Something went wrong!";	
		}
		
	} else {
		echo "Question field can't be blank!";	
	}

	
?>