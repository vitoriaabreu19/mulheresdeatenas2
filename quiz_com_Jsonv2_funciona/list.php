<?php

// Includs database connection
include "db_connect.php";

// Makes query with rowid
$query = "SELECT rowid, * FROM questions";

// Run the query and set query result in $result
// Here $db comes from "db_connection.php"
$result = $db->query($query);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Data List</title>
</head>
<body>
	<div style="width: 500px; margin: 0px auto;">
		<a href="insert.php">Add New</a>
		<table width="100%" cellpadding="5" cellspacing="1" border="1">
			<tr>
				<td>Pergunta</td>
				<td>Imagem</td>
				<td>Número(eliminar)</td>
				<td>Resp1</td>
				<td>Resp2</td>
				<td>Resp3</td>
				<td>Resp4</td>
				<td>Resp5</td>
				<td>Correta</td>
				<td>Mensagem</td>
				<td>Opções </td>

			</tr>
			<?php while($row = $result->fetchArray()) {?>
			<tr>
				<td><?php echo $row['prompt'];?></td>
				<td><?php echo $row['image'];?></td>
				<td><?php echo $row['numberC'];?></td>
				<td><?php echo $row['answer1'];?></td>
				<td><?php echo $row['answer2'];?></td>
				<td><?php echo $row['answer3'];?></td>
				<td><?php echo $row['answer4'];?></td>
				<td><?php echo $row['answer5'];?></td>
				<td><?php echo $row['corret_index'];?></td>
				<td><?php echo $row['msg'];?></td>

				<td>
					<a href="update.php?id=<?php echo $row['rowid'];?>">Edit</a> | 
					<a href="delete.php?id=<?php echo $row['rowid'];?>" onclick="return confirm('Are you sure?');">Delete</a>
				</td>
				<?php
				//while($row=mysql_fetch_array($result)) { 
                  $prompt=$row['prompt']; 
                  $image=$row['image']; 
                  
      			  $answers = array('answers' => [ $row['answer1'],$row['answer2'],$row['answer3'],$row['answer4'],$row['answer4'] ]  );

                  $questions[] = array(
                  					   'answers' => [ $row['answer1'],$row['answer2'],$row['answer3'],$row['answer4'],$row['answer5'] ],
                  					   'correct' => [ 'index' => $row['corret_index'], 
                  					   				  'text' => $row['msg'],   ],
                  					   'image'=> $image,
                  					   'number' => $row['numberC'],
                  					   'prompt'=> $prompt,
                  					   



              				);
                //} 
                
                
                ?>
			</tr>
			<?php }
			
			    $response['questions'] = $questions;
                $fp = fopen('./quiz/tpc.json', 'w');
                fwrite($fp, json_encode($response, JSON_PRETTY_PRINT));
                fclose($fp);
			
			?>
		</table>
	</div>
</body>
</html>