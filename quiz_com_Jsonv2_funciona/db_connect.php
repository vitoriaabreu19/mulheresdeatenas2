<?php
// Database name
$database_name = "my_sqlite4.db";

// Database Connection
$db = new SQLite3($database_name);

// Create Table "students" into Database if not exists 
//$query = "CREATE TABLE IF NOT EXISTS students (name STRING, email STRING, telefone STRING)";

$query = "CREATE TABLE IF NOT EXISTS questions (prompt STRING, image  STRING, numberC INT , answer1  STRING,
						answer2  STRING, answer3  STRING , answer4  STRING, answer5  STRING, corret_index INT, msg  STRING)";
$db->exec($query);

?>