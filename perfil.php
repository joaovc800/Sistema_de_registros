<?php
//session_start();
include("php/verifica_login.php");
include("php/select.php");
?>
<!doctype html>
<html lang="pt-BR">

<head>
  <title>Perfil | Wit Solutions </title>
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
    <?php include "php/menu.php" ?>
    <!-- Page Content  -->
    <div id="content" class="container w-75 col-md-8 p-2 p-md-5">

       <!-- Menu superior -->
    <?php include "php/menu_superior.php"?>
    
      <h2 class="mb-3">Seu perfil</h2>
      <div class="container">
        <div class="row g-3">
          <div class="col-sm-6">
            <label>Registros criados por você</label>
            <input type="text" class="form-control" readonly value="<?php echo $total ?>">
          </div>
          <div class="col-sm-6">
            <label>Nome</label>
            <input type="text" class="form-control" readonly value="<?php echo $_SESSION['nome'] ?>">
          </div>
          <div class="col-12 mt-2">
            <label>E-mail</label>
            <input type="text" class="form-control" readonly value="<?php echo $email ?>">
          </div>
          <div class="col-12 mt-2">
            <label>Cargo</label>
            <input type="text" class="form-control" readonly value="<?php echo $cargo ?>">
          </div>
          <div class="col-12 mt-2">
            <label>Matrícula</label>
            <input type="text" class="form-control" readonly value="<?php echo $mat ?>">
          </div>
          <form class="container" action="php/muda_senha.php" method="POST">
            <h5 class="h5 mt-2">Alterar senha</h5>
            <?php
            if ($_SESSION["senha_vazia"]) {
            ?>
              <div class="blr3 row">
                <div class="card bg-danger">
                  <p class="text-light text-center">Os campos abaixo não podem ficar vazios, por favor preencha todos corretamente!</p>
                </div>
              </div>
            <?php
            }
            unset($_SESSION["senha_vazia"]);
            ?>
            <?php
            if ($_SESSION["senha_nao_corresponde"]) {
            ?>
              <div class="blr3 row">
                <div class="card bg-danger">
                  <p class="text-light text-center">As senhas não correspondem, por favor tentar novamente</p>
                </div>
              </div>
            <?php
            }
            unset($_SESSION["senha_nao_corresponde"]);
            ?>
            <?php
            if ($_SESSION["senha_alterada"]) {
            ?>
              <div class="blr3 row">
                <div class="card bg-success">
                  <p class="text-light text-center">Senha alterada com sucesso!</p>
                </div>
              </div>
            <?php
            }
            unset($_SESSION["senha_alterada"]);
            ?>
            <div class="row">
              <div class="col-sm-6">
                <label>Senha</label>
                <div id="input1" class="input-group">
                  <input name="senha1" type="password" class="form-control" value="">
                  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="button"><i class="fas fa-eye"></i></button>
                </div>
              </div>
              <div class="col-sm-6">
                <label>Confirmar senha</label>
                <div id="input2" class="input-group">
                  <input name="senha2" type="password" class="form-control" value="">
                  <button class="btn btn-outline-secondary" type="button" data-bs-toggle="button"><i class="fas fa-eye"></i></button>
                </div>
              </div>
              <div class="col-sm-12">
                <button class="mt-2 w-100 btn btn-primary">Alterar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="js/mostrar_senha.js"></script>
  <script src="https://kit.fontawesome.com/5a9643203d.js" crossorigin="anonymous"></script>
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>
