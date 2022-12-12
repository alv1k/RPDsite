<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="pb-5">
	<?php 
  		$con = new mysqli('localhost', 'root', '', 'RPD_osnovi_Java');
			  if (mysqli_connect_errno()) {
			    echo "Подключение невозможно: ".mysqli_connect_error();
			  }
			  
				 $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
				//echo $url;
				//$url = 'https://www.alexgur.ru/a/?email=mail&login=alex&action=y';
				$parts = parse_url( $url );
				parse_str( $parts['query'] , $query );
				// echo '<pre>';
				// print_r($query);
				// echo '</pre>';
				// if(isset($query['number']))
				//     echo $query['number'];
				// else
				//     echo "переменная query['number'] не определена";

			  $select = "SELECT * FROM allLessons WHERE id=".$query["lessonID"]." ";

			  $result = mysqli_query($con, $select);

	?>
	<div class="d-flex p-3 bg-dark">
			<div class="p-2">
	        <a class="" href="listOfModules.php" style="text-decoration: none;">Список модулей</a>
			</div>
			<div class="p-2">
	        <a class="" href="addLessonPlan.html" style="text-decoration: none;">Добавить план урока</a>
			</div>
	</div>
	


	<div class="imgBox">
      <h1 class="text-center " style="">Урок <?php echo $query["lessonID"] ?></h1>
  </div>
	<?php
				if (mysqli_num_rows($result) > 0) {
				    // output data of each row
				    while($row = mysqli_fetch_assoc($result)) {
  ?>
	<div class="col-8 mx-auto">
		<h1 class="theme fw-bold">Тема: <?php echo $row["name"] ?></h1>
	</div>
	<?php 
							for($i=4;$i<count($row);$i++){
	 ?>
	<div class="col-8 mx-auto content border mt-4">
		<p><?php echo $row["Column_".$i] ?></p>
	</div>

	 <?php				
							}
				    }
				} else {
				    echo "0 results";
				}
 ?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript">
    		
    </script>
  </body>
</html>