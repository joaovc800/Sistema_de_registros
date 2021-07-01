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

$query2 = "UPDATE registros SET `status` = '$status' WHERE id = '$n_registro'";
$mudar = mysqli_query($conexao,$query2);

$query = "INSERT INTO updates (n_registro,responsavel,atualizacao) VALUES ('{$n_registro}', '{$responsavel}', '{$atualizacao}')";

if($conexao->query($query) === TRUE){
    $_SESSION["atualizado"] = true;
}
header("Location: ../pendencias.php");
exit();


