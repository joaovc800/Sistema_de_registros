<?php


$hostname= $_ENV["URL"]; // varialvel de ambiente heroku
$user = $_ENV["USERDB"]; // varialvel de ambiente heroku
$password = $_ENV["PASS"]; // varialvel de ambiente heroku
$db = $_ENV["DB"]; // varialvel de ambiente heroku

$conexao = mysqli_connect($hostname,$user,$password,$db) or die ("Não foi possivel conectar ao banco".mysqli_error($conexao));

// Organização da acentuação
mysqli_query($conexao,"SET NAMES 'utf8'");  
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');  
mysqli_query($conexao,'SET character_set_results=utf8');
