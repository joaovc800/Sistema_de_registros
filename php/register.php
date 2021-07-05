<?php
session_start();
include("conexao.php");

if(empty($_POST["nome_req"]) || empty($_POST["matricula"]) || empty($_POST["email"]) || empty($_POST["telefone"]) || empty($_POST["assunto"]) || empty($_POST["resolucao"]) || $_POST['status'] == 'Status')){
    $_SESSION["campos_vazios"] = true;
    header("Location: ../registrar.php");
    exit();
}

$responsavel = mysqli_escape_string($conexao,$_SESSION["nome"]);
$requisitante = mysqli_escape_string($conexao,$_POST["nome_req"]);
$matricula = mysqli_escape_string($conexao,$_POST["matricula"]);
$email = mysqli_escape_string($conexao,$_POST["email"]);
$telefone = mysqli_escape_string($conexao,$_POST["telefone"]);
$assunto = mysqli_escape_string($conexao,$_POST["assunto"]);
$status = mysqli_escape_string($conexao,$_POST["status"]);
$resolucao = mysqli_escape_string($conexao,$_POST["resolucao"]);

date_default_timezone_set('America/Sao_Paulo');
$hora = date("H:i");
$hoje = date('Y-m-d');

$query = "INSERT INTO registros (responsavel, requisitante, matricula, email, telefone, assunto,status,resolucao,data,hora) VALUES ('{$responsavel}', '{$requisitante}', '{$matricula}', '{$email}', '{$telefone}', '{$assunto}','{$status}','{$resolucao}','{$hoje}','{$hora}')";

if($conexao->query($query) === TRUE){
    $_SESSION["registrado"] = true;
}
header("Location: ../registrar.php");
exit();


