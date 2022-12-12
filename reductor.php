<?php 
	 $con = new mysqli('localhost', 'root', '', 'RPD_osnovi_Java');
	  if (mysqli_connect_errno()) {
	    echo "Подключение невозможно: ".mysqli_connect_error();
	  }

	  	//$login = !empty($_GET['login']) ? $_GET['login'] : 'логин не передан!';
		//$password = !empty($_GET['password']) ? $_GET['password'] : 'пароль не передан!';



	  	$insert = "
	  	INSERT INTO lesson_plan (theme, goal, result, q1, a1, q2, a2, q3, a3, q4, a4, q5, a5, q6, a6) 
	  	VALUES ('{$_POST["theme"]}', '{$_POST["goal"]}', '{$_POST["result"]}', 
	  		'{$_POST["input_question1"]}', '{$_POST["textarea_answer1"]}', 
	  		'{$_POST["input_question2"]}', '{$_POST["textarea_answer2"]}', 
	  		'{$_POST["input_question3"]}', '{$_POST["textarea_answer3"]}', 
	  		'{$_POST["input_question4"]}', '{$_POST["textarea_answer4"]}', 
	  		'{$_POST["input_question5"]}', '{$_POST["textarea_answer5"]}', 
	  		'{$_POST["input_question6"]}', '{$_POST["textarea_answer6"]}'
	  	)";
	  

	  	if (mysqli_query($con, $insert)){
	  		echo "New record created";
	  	}else{
	  		echo "error: " . $insert . "<br>" . mysqli_error($con);
	  	}

	    $con->close();

	    header("Location: http://rpdsite/index.php");
 ?>