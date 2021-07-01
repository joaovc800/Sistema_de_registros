<?php
session_start();
include("conexao.php");

if(empty($_POST["res"])){
    $_SESSION["res_vazio"] = true;
    header("Location: ../pendencias.php");
    exit();
}

$n_registro = (int)$_POST["registro"];
$atualizacao = mysqli_escape_string($conexao,$_POST["res"]);
$responsavel = mysqli_escape_string($conexao,$_SESSION["nome"]);
$status = mysqli_escape_string($conexao,$_POST['status']);
date_default_timezone_set('America/Sao_Paulo');
$hora = date("H:i");
$hoje = date('Y-m-d');

$query2 = "UPDATE registros SET `status` = '$status' WHERE id = '$n_registro'";
$mudar = mysqli_query($conexao,$query2);

$query = "INSERT INTO updates (n_registro,responsavel,atualizacao,data,hora) VALUES ('{$n_registro}', '{$responsavel}', '{$atualizacao}',{$hoje},{$hora})";

if($conexao->query($query) === TRUE){
    $_SESSION["atualizado"] = true;
}
header("Location: ../pendencias.php");
exit();


