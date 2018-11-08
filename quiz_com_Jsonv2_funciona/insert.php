<?php
$message = ""; // initial message 
if( isset($_POST['submit_data']) ){

	// Includs database connection
	include "db_connect.php";

	// Gets the data from post
	$prompt = $_POST['prompt'];
	$image = $_POST['image'];
	$numberC = $_POST['numberC'];
	$answer1 = $_POST['answer1'];
	$answer2 = $_POST['answer2'];
	$answer3 = $_POST['answer3'];
	$answer4 = $_POST['answer4'];
	$answer5 = $_POST['answer5'];
	$corret_index = $_POST['corret_index'];
	$msg = $_POST['msg'];


	// Makes query with post data
	$query = "INSERT INTO questions (prompt, image , numberC ,answer1,answer2,answer3,answer4,answer5, corret_index, msg) VALUES ('$prompt', '$image', '$numberC','$answer1','$answer2', '$answer3','$answer4', '$answer5',	'$corret_index','$msg')";
	
	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connection.php"
	if( $db->exec($query) ){
		$message = "Data is inserted successfully.";

	}else{
		$message = "Sorry, Data is not inserted.";
		echo "Error in fetch ".$db->lastErrorMsg();
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="insert.php" method="post">

				<!-- prompt, image , numberC ,answer1,answer2,answer3,answer4,answer5, corret_index, msg) -->
			<tr>
				<td>Pergunta:</td>
				<td><input name="prompt" type="text" required ></td>
			</tr>
			<tr>
				<td>Imagem:</td>
				<td><input name="image" type="file" value= "arquivo.png"   ></td>
			</tr>
			<tr>
				<td>numberC:</td>
				<td><input name="numberC" type="text" required ></td>
			</tr>
			<tr>
				<td>Resposta 1:</td>
				<td><input name="answer1" type="text" required ></td>
			</tr>
			<tr>
				<td>Resposta 2:</td>
				<td><input name="answer2" type="text" required ></td>
			</tr>
			<tr>
				<td>Resposta 3:</td>
				<td><input name="answer3" type="text"  ></td>
			</tr>
			<tr>
				<td>Resposta 4:</td>
				<td><input name="answer4" type="text"  ></td>
			</tr>
			<tr>
				<td>Resposta 5:</td>
				<td><input name="answer5" type="text"  ></td>
			</tr>
			<tr>
				<td>Resposta correta</td>
				<td>
					<select name="corret_index">
					  <option value="0">A</option>	
					  <option value="1">B</option>
					  <option value="2">C</option>
					  <option value="3">D</option>
					  <option value="4">E</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Mensagem de erro:</td>
				<td><input name="msg" type="text"  ></td>
			</tr>

			<tr>
				<td><a href="list.php">Ver dados</a></td>
				<td><input name="submit_data" type="submit" value="Inserir Dados."></td>
			</tr>
			</form>
		</table>
	</div>
</body>
</html>