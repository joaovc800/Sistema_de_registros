<?php
//session_start();
include("php/verifica_login.php");
include('php/conexao.php');

$_SESSION['pendente'] = true;
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <title>Pendentes | Wit Solutions</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/style2.css">
  <style>
    @media screen and (max-width: 600px) {

      #sidebar,
      #sidebarCollapse {
        visibility: hidden;
      }

      .name {
        position: relative;
        right: 33%;
      }
    }

    #sidebar .dropdown-item:hover {
      background-color: rgba(0, 59, 250, .50) !important;
    }

    .down {
      position: relative;
      top: 15px;
      left: 5px;
      padding: 0;
    }
  </style>
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
    <!-- menu sidebar -->
    <?php include "php/menu.php" ?>

    <!-- Page Content  -->
    <div id="content" class="container w-75 col-md-8 p-2 p-md-5">

      <!-- Menu superior -->
    <?php include "php/menu_superior.php"?>
    
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php

        $query = "SELECT *,TIME_FORMAT(hora, '%H:%i')as hora_formatada,DATE_FORMAT(data, '%d/%m/%Y') as data_formatada FROM registros WHERE status = 'Pendente'";
        $resultado = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($resultado);
        if ($row > 0) {
          while ($coluna = mysqli_fetch_array($resultado)) { // Enquanto houver dados ficará em loop
            $id = $coluna['id'];
            $resp = $coluna['responsavel'];
            $req = $coluna['requisitante'];
            $mat = $coluna['matricula'];
            $email = $coluna['email'];
            $tel = $coluna['telefone'];
            $assunt = $coluna['assunto'];
            $status = $coluna['status'];
            $res = $coluna['resolucao'];
            $data = $coluna['data_formatada'];
            $hora = $coluna['hora_formatada'];
        ?>
            <div class="col-md-12 blr3">
              <div class="card mb-4 shadow-sm">
                <div class="card-header bg-danger">
                  <p class="my-0 fw-normal text-light">Registro Pendente</p>
                </div>
                <div class="card-body">
                  <h5 class="card-title pricing-card-title">
                    <small>Criado por: <?php echo "<b>" . $resp . "</b>" ?></small>
                  </h5>
                  <div class="row">
                    <form action="php/update.php" method="POST">
                      <div class="col-md-12">
                        <p class="text-left down">Número do registro ↓</p>
                        <input name="registro" type="text" class="form-control form-control-sm" value="<?php echo $id ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">Requisitante ↓</p>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $req ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">Matricula / RA ↓</p>
                        <input type="number" class="form-control form-control-sm" value="<?php echo $mat ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">E-mail ↓</p>
                        <input type="email" class="form-control form-control-sm" value="<?php echo $email ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">Telefone ↓</p>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $tel ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">Assunto ↓</p>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $assunt ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <p class="text-left down">Data e hora do registro aberto ↓</p>
                        <input type="text" class="form-control form-control-sm" value="<?php echo $data . ' as ' . $hora ?>" readonly>
                      </div>
                      <!-- divisão -->
                      <div class="col-md-12">
                        <div class="card mt-2">
                          <p class="text-dark p-2">Registrado por: <?php echo "<b>" . $resp . "</b> em $data as $hora" . "<br><br>" . $res ?></p>
                        </div>
                        <?php
                        $query2 = "SELECT *,TIME_FORMAT(hora, '%H:%i')as hora_formatada,DATE_FORMAT(data, '%d/%m/%Y') as data_formatada FROM updates WHERE n_registro = '$id'";
                        $resultado2 = mysqli_query($conexao, $query2);
                        while ($coluna2 = mysqli_fetch_array($resultado2)) { // Enquanto houver dados ficará em loop
                          $respAlt = $coluna2['responsavel'];
                          $atualizacao = $coluna2['atualizacao'];
                          $data = $coluna2['data_formatada'];
                          $hora = $coluna2['hora_formatada'];
                        ?>
                          <div class="card mt-2">
                            <p class="text-dark">Atualizado por: <?php echo "<b>" . $respAlt . "</b> em $data as $hora" . "<br><br>" . $atualizacao ?></p>
                          </div>
                        <?php
                        }
                        ?>
                      </div>
                  </div>
                  <div class="container-sm">
                    <hr>
                  </div>
                  <div class="container col-md-12">
                    <p>Incluir Observações</p>
                    <div class="form-floating" id="textArea">
                      <textarea name="res" id="texto" class="form-control form-control-sm mt-2" id="floatingTextarea2" style="height: 100px" maxlength="400"></textarea><label for="floatingTextarea2">Resolução</label>
                    </div>
                    <select id="select" name="status" class="form-select form-control-sm mt-2">
                      <option name="status" value="Pendente"><?php echo $status ?></option>
                      <option name="status" value="Concluído">Concluído</option>
                    </select>
                  </div>
                  <div class="container">
                    <button id="btn" type="submit" class="p-1 w-100 mt-2 btn btn-success btn-lg">Concluir <span class="fas fa-check-circle"></button>
                  </div>
                  </form>
                </div>
              </div>
            </div>

            <hr class="w-100">
          <?php
          }
        } else {
          ?>
          <div class="w-100 card bg-success">
            <p class="text-center text-light">Não há registros pendentes</p>
          </div>
        <?php
        }
        ?>
      </div>
    </div>
    <script src="https://kit.fontawesome.com/5a9643203d.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/pendencias.js"></script>
</body>

</html>
