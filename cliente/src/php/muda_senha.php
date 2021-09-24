<?php
session_start(); //startando a sessão
include('conexao.php'); // incluindo o arquivo de conexão

// condição para troca de senha
if(empty($_POST['senha1']) || empty($_POST['senha2'])){
	$_SESSION['senha_vazia'] = true;
	header('Location: ../perfil.php');
    exit();
}

$senha1 = mysqli_real_escape_string($conexao,md5($_POST['senha1'])); // puxar dados via post com espape para proteger comtra mysql injection
$senha2 = mysqli_real_escape_string($conexao,md5($_POST['senha2'])); // puxar dados via post com espape para proteger comtra mysql injection

// validar se as senhas não correspondem
if($senha1 != $senha2){
	$_SESSION['senha_nao_corresponde'] = true;
	header('Location: ../perfil.php');
	return;
}

// query para alteração de senha
$query = "UPDATE usuario SET senha ='{$senha2}' WHERE email = '{$_SESSION['usuario']}'";

if($conexao->query($query) === TRUE){
    $_SESSION['senha_alterada'] = true;
}

$conexao->close();
header('Location: ../perfil.php');
exit();
