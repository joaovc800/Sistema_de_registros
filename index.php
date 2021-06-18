<?php
    session_start()
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/menu.css">
    <title>Log in</title>
</head>
<body style="background-color: #ffffff;"class="text-center">
    <div class="container">
        <img class="" src="images/uni9.jpg" width="420" height="350">
        <form action="php/login.php" method="POST">
            <div class="container col-md-4">      
                <div class="mb-3">
                    <input name="usuario" type="email" class="form-control form-control-lg" placeholder="Usuário">
                </div>
            </div>
            <div class="container col-md-4">
                <div class="mb-3">
                    <div id="input3" class="input-group">
                        <input name="senha" type="password" class="form-control form-control-lg" placeholder="Senha">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon3"><i class="fas fa-eye"></i></button>
                    </div>    
                </div>
                <button type="submit" class="form-control-lg btn btn-primary w-100">Acessar</button>
            </div>
        </form>
        <div class="container col-md-4">
        <div class="row">
        <?php
            if($_SESSION['login_vazio']){
        ?>
        <div class="card bg-danger mt-3">
            <p class="text-center text-light">Os campos não podem ficar vazios</p>
        </div>
        <?php
            }
        unset($_SESSION['login_vazio']);
        ?>
        <?php
            if($_SESSION['login_invalido']){
        ?>
        <div class="card bg-danger mt-3">
            <p class="text-center text-light">Usuário ou senha inválida, por favor tente novamente</p>
        </div>
        <?php
            }
        unset($_SESSION['login_invalido']);
        ?>
        </div>
        </div>
        <div class="mt-3 container-md w-50">
            <hr>
        </div>
        <p class="fw-light">Universidade Nove de Julho</p>
        <p class="fw-light">All rights reserved</p>
    </div>
    <script>
        var input3 = document.querySelector('#input3 input');
        var button3 = document.querySelector('#input3 button');
        button3.addEventListener('click', function () {
        input3.type = input3.type == 'text' ? 'password' : 'text';
        });
    </script>
    <script src="https://kit.fontawesome.com/5a9643203d.js" crossorigin="anonymous"></script>
</body>
</html>
