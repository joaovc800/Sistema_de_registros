<?php
session_start();
include('conexao.php');

if(empty($_POST['senha1']) || empty($_POST['senha2'])){
	$_SESSION['senha_vazia'] = true;
	header('Location: ../perfil.php');
    exit();
}

$senha1 = mysqli_real_escape_string($conexao,$_POST['senha1']);
$senha2 = mysqli_real_escape_string($conexao,$_POST['senha2']);

if($senha1 != $senha2){
	$_SESSION['senha_nao_corresponde'] = true;
	header('Location: ../perfil.php');
	return;
}

$query = "UPDATE usuario SET senha ='{$senha2}' WHERE email = '{$_SESSION['usuario']}'";

if($conexao->query($query) === TRUE){
    $_SESSION['senha_alterada'] = true;
}

$conexao->close();
header('Location: ../perfil.php');
exit();