<?php
//session_start();
include("php/verifica_login.php");
include('php/conexao.php');
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <title>Buscar | Wit Solutions</title>
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
    }

    #sidebar .dropdown-item:hover {
      background-color: rgba(0, 59, 250, .50) !important;
    }
  </style>
</head>

<body>
  <div class="wrapper d-flex align-items-stretch">
      <!-- menu sidebar -->
    <?php include "php/menu.php"?>

    <!-- Page Content  -->
    <div id="content" class="container w-75 col-md-8 p-2 p-md-5">

       <!-- Menu superior -->
    <?php include "php/menu_superior.php"?>
    
      <form action="buscar2.php" method="POST">
        <div class="row">
          <div class="input-group mb-3 col-sm-12">
            <input name="data" type="text" class="form-control" placeholder="Exemplo 00/00/00" maxlength="10" onkeypress="mascaraData( this, event )">
            <button class="btn btn-outline-dark" type="submit">Buscar <span class="fas fa-search"></span></button>
          </div>
        </div>
      </form>
      <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php
        $data = $_POST['data'];
        $data = explode(" ", $data);
        list($date) = $data;
        $data_sem_barra = array_reverse(explode('/', $date));
        $data_sem_barra = implode("-", $data_sem_barra);
        $query = "SELECT *,TIME_FORMAT(hora, '%H:%i')as hora_formatada,DATE_FORMAT(data, '%d/%m/%Y') as data_formatada FROM registros WHERE data = '$data_sem_barra'";
        $resultado = mysqli_query($conexao, $query);
        $row = mysqli_num_rows($resultado);
        while ($coluna = mysqli_fetch_array($resultado)) { // Enquanto houver dados ficará em loop
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

        ?>
          <div class="col-md-12 blr3">
            <div class="card mb-4 shadow-sm">
              <?php
              if ($status == "Concluído") {
                echo "<div class='card-header bg-success'>";
              } else {
                echo "<div class='card-header bg-danger'>";
              }
              ?>
              <p class="my-0 fw-normal text-light">Registro <?php echo $id ?> encontrado</p>
            </div>
            <div class="card-body">
              <h5 class="card-title pricing-card-title">
                <small>Criado por: <?php echo "<b>" . $resp . "</b>" ?></small>
              </h5>
              <ul class="list-unstyled mt-3 mb-4">
                <li class="text-dark">Requisitante: <?php echo "<b>" . $req . "</b>" ?></li>
                <li class="text-dark">Matrícula/RA: <?php echo "<b>" . $mat . "</b>" ?></li>
                <li class="text-dark">E-mail: <?php echo "<b>" . $email . "</b>" ?></li>
                <li class="text-dark">Telefone: <?php echo "<b>" . $tel . "</b>" ?></li>
                <li class="text-dark">Assunto: <?php echo "<b>" . $assunto . "</b>" ?></li>
                <li class="text-dark">Data: <?php echo "<b>" . $data . ' as ' . $hora . "</b>" ?></li>
                <li class="text-dark h6 mt-2">Resolução</li>
                <div class="card mt-2">
                  <li class="text-dark p-2">Registrado por: <?php echo "<b>" . $resp . "</b> em $data as $hora" . "<br><br>" . $res ?></li>
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
                    <li class="text-dark">Atualizado por: <?php echo "<b>" . $respAlt . "</b> em $data as $hora" . "<br><br>" . $atualizacao ?></li>
                  </div>
                <?php
                }
                ?>
                <li class="text-dark">Status: <?php
		      if ($status == "Concluído") {
			echo "<b class='text-success'>" . $status . "</b></p>";
		      } else {
			echo "<b class='text-danger'>" . $status . "</b></p>";
		      }
		      ?>
                </li>
              </ul>
            </div>
          </div>
      </div>
    <?php
        }
    ?>
    </div>
  </div>
  </div>
  <script src="https://kit.fontawesome.com/5a9643203d.js" crossorigin="anonymous"></script>
  <script src="js/mascara.js"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
