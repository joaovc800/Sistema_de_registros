<?php

$hostname= "CLEARDB_DATABASE_URL";
$user = "b4b78724dfa36d";
$password = "55c1e22b";
$db = "heroku_a166eef70043d0b";

$conexao = mysqli_connect($hostname,$user,$password,$db) or die ("Não foi possivel conectar ao banco".mysqli_error($conexao));

// Organização da acentuação
mysqli_query($conexao,"SET NAMES 'utf8'");  
mysqli_query($conexao,'SET character_set_connection=utf8');
mysqli_query($conexao,'SET character_set_client=utf8');  
mysqli_query($conexao,'SET character_set_results=utf8');
