<?php
include('conexao.php');

$query = "SELECT * FROM usuario WHERE nome = '{$_SESSION['nome']}'";
$resultado = mysqli_query($conexao, $query);
$row = mysqli_num_rows($resultado);
    while($coluna = mysqli_fetch_array($resultado)){ // Enquanto houver dados ficará em loop
        $email = $coluna["email"];
        $mat = $coluna["matricula"];
        $cargo = $coluna['sessao'];
        
    }

$query2 = "SELECT count(*) as total from registros where responsavel = '{$_SESSION['nome']}'";
$resultado2 = mysqli_query($conexao, $query2);
$row2 = mysqli_num_rows($resultado2);

while($coluna2 = mysqli_fetch_array($resultado2)){ // Enquanto houver dados ficará em loop
    $total = $coluna2["total"];
    
}
