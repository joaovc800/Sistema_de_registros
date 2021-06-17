<?php
    //session_start();
    include("php/verifica_login.php");
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
				<h2><a href="principal.php" class="logo">Uni9</a></h2>
        <ul class="list-unstyled components mb-5">
          <li class="active">
            <a href="principal.php"><span class="fa fa-home"></span>Home</a>
          </li>
          <li>
              <a href="registrar.php"><span class="fa fa-pen"></span>Registrar</a>
          </li>
          <li>
            <a href="registros.php"><span class="fa fa-sticky-note"></span>Registros</a>
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
                    <a class="nav-link" href="registrar.php">Registrar</a>
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
        <div class="container">
          <?php
          if($_SESSION["campos_vazios"]){
          ?>
          <div class="row">
            <div class="card bg-danger">
                <p class="text-light text-center">Os campos abaixo não podem ficar vazios, por favor preencha todos corretamente!</p>
            </div>
          </div>
          <?php
          }
          unset($_SESSION["campos_vazios"]);
          ?>
          <?php
          if($_SESSION["registrado"]){
          ?>
          <div class="row">
            <div class="card bg-success">
                <p class="text-light text-center">Registro incluido com sucesso!</p>
            </div>
          </div>
          <?php
          }
          unset($_SESSION["registrado"]);
          ?>
            <h1 class="text-center text-muted">Registrar</h1>
        <form action="php/register.php" method="POST">
            <div class="col-md-12">
                <input name="nome_req" type="text" class="form-control form-control-lg" placeholder="Nome completo">
            </div>
            <div class="col-md-12">
              <input name="matricula" type="number" class="form-control form-control-lg mt-2" placeholder="Matrícula">
            </div>
            <div class="col-md-12">
                <input name="email" type="email" class="form-control form-control-lg mt-2" placeholder="E-mail">
            </div>
            <div class="col-md-12">
              <input name="telefone" type="text" class="form-control form-control-lg mt-2" placeholder="Telefone (DDD + Número)" onkeypress="mask(this, mphone);">
            </div>
            <div class="col-md-12">
                <input name="assunto" type="text" class="form-control form-control-lg mt-2" placeholder="Assunto">
            </div>
            <div class="col-md-12">
                <div class="form-floating">
                    <textarea name="resolucao" class="form-control mt-5" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" maxlength="400"></textarea>
                    <label for="floatingTextarea2">Resolução</label>
                </div>
                <button type="submit" class="w-100 mt-2 btn btn-primary btn-lg">Enviar</button>
            </div>
        </form>
        </div>
      </div>
	</div>
    <script src="js/mascara.js"></script>
    <script src="https://kit.fontawesome.com/5a9643203d.js" crossorigin="anonymous"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  </body>
</html>