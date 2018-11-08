<?php
$message = ""; // initial message 

// Includs database connection
include "db_connect.php";

// Updating the table row with submited data according to rowid once form is submited 
if( isset($_POST['submit_data']) ){

	// Gets the data from post
	$id = $_POST['id'];
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
	$query = "UPDATE questions set prompt='$prompt', image='$image',numberC='$numberC',
	answer1='$answer1',answer2='$answer2',answer3='$answer3',answer4='$answer4',answer5='$answer5',
	corret_index='$corret_index', msg='$msg'  WHERE rowid=$id";
	

	// Executes the query
	// If data inserted then set success message otherwise set error message
	// Here $db comes from "db_connection.php"
	if( $db->exec($query) ){
		$message = "Data is updated successfully.";
	}else{
		$message = "Sorry, Data is not updated.";
		echo "Error in fetch ".$db->lastErrorMsg();
	}
}

$id = $_GET['id']; // rowid from url
// Prepar the query to get the row data with rowid
$query = "SELECT rowid, * FROM questions WHERE rowid=$id";
$result = $db->query($query);
$data = $result->fetchArray(); // set the row in $data
?>

<!DOCTYPE html>
<html>
<head>
	<title>Update Data</title>
</head>
<body>
	<div style="width: 500px; margin: 20px auto;">

		<!-- showing the message here-->
		<div><?php echo $message;?></div>

		

		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<form action="" method="post">

				<!-- prompt, image , numberC ,answer1,answer2,answer3,answer4,answer5, corret_index, msg) -->
				<input type="hidden" name="id" value="<?php echo $id;?>">
			<tr>
				<td>Pergunta:</td>
				<td><input name="prompt" type="text" value="<?php echo $data['prompt'];?>" required ></td>
			</tr>
			<tr>
				<td>Imagem:</td>
				<td><input name="image" type="file"  value="<?php echo $data['image'];?>"  ></td>
			</tr>
			<tr>
				<td>numberC:</td>
				<td><input name="numberC" type="text" value="<?php echo $data['numberC'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta 1:</td>
				<td><input name="answer1" type="text" required value="<?php echo $data['answer1'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta 2:</td>
				<td><input name="answer2" type="text" required value="<?php echo $data['answer2'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta 3:</td>
				<td><input name="answer3" type="text" value="<?php echo $data['answer3'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta 4:</td>
				<td><input name="answer4" type="text" value="<?php echo $data['answer4'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta 5:</td>
				<td><input name="answer5" type="text" value="<?php echo $data['answer5'];?>" ></td>
			</tr>
			<tr>
				<td>Resposta correta (INFO PERDIDA)</td>
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
				<td><input name="msg" type="text"  value="<?php echo $data['msg'];?>" ></td>
			</tr>

			<tr>
				<td><a href="list.php">Ver dados</a></td>
				<td><input name="submit_data" type="submit" value="Atualizar Dados."></td>
			</tr>
			</form>
		</table>


	</div>
</body>
</html>