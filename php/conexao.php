<?php

$hostname= $_ENV["URL"];
$user = $_ENV["USERDB"];
$password = $_ENV["PASS"];
$db = $_ENV["DB"];

$conexao = mysqli_connect($hostname,$user,$password,$db) or die ("Não foi possivel conectar ao banco".mysqli_error($conexao));

// Organização da acentuação
mysqli_query($conexao,"SET NAMES 'utf8'");  
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');  
mysqli_query($conexao,'SET character_set_results=utf8');
