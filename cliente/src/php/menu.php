    <nav id="sidebar" class="active h-100 fixed-top mr-2">
      <ul class="list-unstyled components mb-5">
        <li>
           <img class="w-100" src="images/logo.jpeg">
        </li>
        <li class="active">
          <a href="principal.php"><span class="fa fa-home"></span> Home</a>
        </li>
        <li class="">
          <a href="registrar.php"><span class="fa fa-pen"></span> Novoss</a>
        </li>
        <li>
          <a href="registros.php"><span class="fa fa-folder-open"></span>Registros</a>
        </li>
        <li>
          <a href="pendencias.php"><span class="fas fa-clock"></span>Pendentes</a>
        </li>
        <li class="nav-item dropend">
          <a class="nav-link" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><span class="fas fa-search"></span>Buscar</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-light text-center" href="buscar2.php">Por Data</a></li>
            <li><a class="dropdown-item text-light text-center" href="buscar.php">Por Matricula ou RA</a></li>
            <li><a class="dropdown-item text-light text-center" href="buscar3.php">Por Assunto</a></li>
          </ul>
        </li>
        <li>
          <a href="perfil.php"><span class="fas fa-user"></span> Perfil</a>
        </li>
        <li>
          <a href="php/logout.php"><span class="fas fa-sign-out-alt"></span>Sair</a>
        </li>
      </ul>

      <div class="footer fixed-bottom">
        <p class="copy mx-2">
          WIT solutions | Dev © <i class="icon-heart" aria-hidden="true"></i>
          <script>
            document.write(new Date().getFullYear());
          </script>
        </p>
      </div>
    </nav>
