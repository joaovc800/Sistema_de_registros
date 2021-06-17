<?php
    //session_start();
    include("php/verifica_login.php");
    include('php/conexao.php');
?>
<!doctype html>
<html lang="pt-BR">
  <head>
  	<title>Sistema de resgistros</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar" class="active">
        <ul class="list-unstyled components">
          <li>
            <h5 class="text-center"><a href="principal.php" class="logo">Uni9</a></h5>
          </li>
        </ul>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="principal.php"><span class="fa fa-home"></span> Home</a>
          </li>
          <li>
              <a href="registrar.php"><span class="fa fa-pen"></span> Novo</a>
          </li>
          <li>
            <a href="registros.php"><span class="fa fa-folder-open"></span>Registros</a>
          </li>
          <li>
            <a href="buscar.php"><span class="fas fa-search"></span> Buscar</a>
          </li>
          <li>
            <a href="perfil.php"><span class="fas fa-user"></span> Perfil</a>
          </li>
          <li>
            <a href="php/logout.php"><span class="fas fa-sign-out-alt"></span>Sair</a>
          </li>
        </ul>

        <div class="footer">
        	<p>
				 Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Uninove <i class="icon-heart" aria-hidden="true"></i>
			</p>
        </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <ul class="nav navbar-nav ml-auto">
              <li class="ml-5 text-dark">Bem vindo <br><?php echo $_SESSION["nome"]?></li>
            </ul>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="principal.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registrar.php">Novo registro</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="registros.php">Registros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="buscar.php">Buscar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="perfil.php">Perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="php/logout.php">Sair</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <form action="buscar.php" method="POST">
        <div class="row">
          <div class="input-group mb-3 col-sm-6">
              <input name="data" type="text" class="form-control" placeholder="Exemplo 00/00/00" maxlength="10">
              <button class="btn btn-outline-dark" type="submit">Buscar</button>
          </div>
          <div class="input-group mb-3 col-sm-6">
            <input name="mat_ra" type="text" class="form-control" placeholder="Matrícula ou RA" maxlength="20">
            <button class="btn btn-outline-dark" type="submit">Buscar</button>
        </div>
        </div>
        
        </form>
        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
        <?php
          $mat_ra = $_POST['mat_ra'];
          $data = $_POST['data'];
          $data = explode(" ",$data);
          list($date) = $data;
          $data_sem_barra = array_reverse(explode('/', $date));
          $data_sem_barra = implode("-",$data_sem_barra);
          $query = "SELECT *,TIME_FORMAT(hora, '%H:%i')as hora_formatada,DATE_FORMAT(data, '%d/%m/%Y') as data_formatada FROM registros WHERE data = '$data_sem_barra' OR matricula = '$mat_ra'";
          $resultado = mysqli_query($conexao, $query);
          $row = mysqli_num_rows($resultado);
              while($coluna = mysqli_fetch_array($resultado)){ // Enquanto houver dados ficará em loop
                  $id = $coluna['id'];
                  $resp = $coluna['responsavel'];
                  $req = $coluna['requisitante'];
                  $mat = $coluna['matricula'];
                  $email = $coluna['email'];
                  $tel = $coluna['telefone'];
                  $assunto = $coluna['assunto'];
                  $res = $coluna['resolucao'];
                  $data = $coluna['data_formatada'];
                  $hora = $coluna['hora_formatada'];
              
        ?>
         <div class="col-md-12">
                <div class="card mb-4 shadow-sm">
                    <div class="card-header bg-success">
                     <p class="my-0 fw-normal text-light">Registro <?php echo $id?> encontrado</p>
                     </div>
                <div class="card-body">
                  <h5 class="card-title pricing-card-title"><small><?php echo"<b>".$resp."</b>"?></small></h5>
                  <ul class="list-unstyled mt-3 mb-4">
                    <li class="text-dark">Requisitante: <?php echo"<b>".$req."</b>"?></li>
                    <li class="text-dark">Matrícula/RA: <?php echo"<b>".$mat."</b>"?></li>
                    <li class="text-dark">E-mail: <?php echo"<b>".$email."</b>"?></li>
                    <li class="text-dark">Telefone: <?php echo"<b>".$tel."</b>"?></li>
                    <li class="text-dark">Assunto: <?php echo"<b>".$assunto."</b>"?></li>
                    <li class="text-dark">Data: <?php echo"<b>".$data.' as '.$hora."</b>"?></li>
                    <li class="text-dark h6 mt-2">Resolução</li>
                    <li class="text-dark"><?php echo"<b>".$res."</b>"?></li>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
