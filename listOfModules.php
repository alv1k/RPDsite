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
  <div class="d-flex p-3 bg-dark">
			<div class="p-2 text-light">
					<a class="" href="#" style="text-decoration: none;">Список модулей</a>
			</div>
			<div class="p-2">
	        <a class="" href="addLessonPlan.html" style="text-decoration: none;">Добавить план урока</a>
			</div>
	</div>
	<div class="imgBox">
      <h1 class="text-center " style="">Список модулей</h1>
  </div>
  <div class="row p-3 border clickable">
		<div class="col-1 ms-auto mt-2">
			<h3 class="id fw-bold"># </h3>
		</div>
		<div class="col-8 mt-2 me-auto">
			<h3 class="theme">Название модуля</h3>
		</div>
	</div>
		<?php 
	  			$con = new mysqli('localhost', 'root', '', 'RPD_osnovi_Java');
				  if (mysqli_connect_errno()) {
				    echo "Подключение невозможно: ".mysqli_connect_error();
				  }
				  $select = "SELECT * FROM modules";	 
				  $result = mysqli_query($con, $select);

					if (mysqli_num_rows($result) > 0) {
					    // output data of each row
					    while($row = mysqli_fetch_assoc($result)) {
					    		//printf ("%s (%s)\n", $row["id"], $row["theme"]);
					    		$rowID = array($row["moduleID"]);
   				

	  ?>
	<div class="row p-3 clickable">
		<div class="col-1 ms-auto mt-2 bg-secondary bg-gradient bg-opacity-25">
			<h3 class="id fw-bold"><?php echo $row["moduleID"] ?></h3>
		</div>
		<div class="col-8 mt-2 bg-secondary bg-gradient bg-opacity-25 me-auto">
			<h3 class="theme"><?php echo $row["name"] ?></h3>
		</div>
	</div>
		<?php 
		}
					} else {
					    echo "0 results";
					}
							 
		?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script type="text/javascript">
    	<?php 

    	 ?>
    		let id = document.querySelectorAll(".id");
    		let clickable = document.querySelectorAll(".clickable");
    		for(let i = 0; i<clickable.length; i++){
	    			clickable[i].onclick = function(){

	    				//window.location.href = 'http://rpdsite/index.php';
	    				window.open('http://rpdsite/listOfLessons.php?&moduleID='+id[i].innerHTML);
	    			}
    		}
    	<?php 

    	 ?>	

    </script>
  </body>
</html>