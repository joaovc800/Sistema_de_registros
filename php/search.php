<?php
include('conexao.php');
$data = mysqli_escape_string($conexao,$_POST['data']);
$query = "SELECT *,TIME_FORMAT(hora, '%H:%i')as hora_formatada,DATE_FORMAT(data, '%d/%m/%Y') as data_formatada FROM registros WHERE data = '{$data}'";
$resultado = mysqli_query($conexao, $query);
$row = mysqli_num_rows($resultado);
if($row >= 1){
    $_SESSION['result'] = true;
    while($coluna = mysqli_fetch_array($resultado)){ // Enquanto houver dados ficará em loop
        $id = $coluna['id'];
        $resp = $coluna['responsavel'];
        $req = $coluna['requisitante'];
        $mat = $coluna['matricula'];
        $email = $coluna['email'];
        $tel = $coluna['telefone'];
        $assunto = $coluna['assunto'];
        $status = $coluna['status'];
        $res = $coluna['resolucao'];
        $data = $coluna['data_formatada'];
        $hora = $coluna['hora_formatada'];
    }
}
header('Location: ../buscar.php');
exit();