<?php include_once("dbConnector.php"); ?>
<?php 
	
	$id = $_POST["id"];
	$q_name = $_POST["q_name"];
	$q_email = $_POST["q_email"];
	$question = mysqli_real_escape_string($connection,$_POST["question"]);
	$q_date = $_POST["q_date"];
	$a_name = $_POST["a_name"];
	$answer = mysqli_real_escape_string($connection,$_POST["answer"]);
	$a_date = $_POST["a_date"];
	
	$InsertFaq = "INSERT INTO faq (q_name,q_email,question,q_date,a_name,answer,a_date) VALUES ('{$q_name}','{$q_email}','{$question}','{$q_date}','{$a_name}','{$answer}','{$a_date}')";
	$ResultFaq = mysqli_query($connection,$InsertFaq);
	
	$UpdateQuestionAnswer = "UPDATE question_answer SET faq='published' WHERE id={$id}";
	$ResultUpdate = mysqli_query($connection,$UpdateQuestionAnswer);
	
	if($ResultFaq && $ResultUpdate) {
		echo "success";
	} else {
		echo "failed";
	}

?>