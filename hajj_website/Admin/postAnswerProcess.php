<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if(!empty($_POST["post"])) {
		
			$answer = mysqli_real_escape_string($connection,$_POST["post"]);
			
			$UpdatePost = "UPDATE question_answer SET a_name='{$_SESSION['username']}', answer='{$answer}', a_date=CURRENT_DATE WHERE id={$_POST['id']}";
			$ResultPost = mysqli_query($connection,$UpdatePost);
			
			if($ResultPost) {
				$_SESSION["postMessage"] = "Posted Successfully!"; 	
				header("location: question.php");
			} else {
				$_SESSION["postMessage"] = "Something went wrong! Please try again."; 		
			}
		
		} else {
			$_SESSION["postMessage"] = "Field can't be blank!"; 	
		}
		
	}
	
?>