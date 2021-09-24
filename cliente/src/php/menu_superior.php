<nav class="sli navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

          <button type="button" id="sidebarCollapse" class="btn btn-primary">
            <i class="fa fa-bars"></i>
            <span class="sr-only">Toggle Menu</span>
          </button>
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
                <a class="nav-link" href="pendencias.php">Pendentes</a>
              </li>
              <ul class="navbar-nav">
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Buscar
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                    <li><a class="dropdown-item text-center text-dark" href="buscar2.php">Por Data</a></li>
                    <li><a class="dropdown-item text-center text-dark" href="buscar.php">Por Matricula ou RA</a></li>
                    <li><a class="dropdown-item text-center text-dark" href="buscar3.php">Por Assunto</a></li>
                  </ul>
                </li>
              </ul>
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