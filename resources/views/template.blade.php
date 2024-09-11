<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Bootstrap Example</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body class="p-3 m-0 border-0 bd-example">

  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">AssetFlow</a>
      <form class="d-flex mt-3" role="search">
        <input class="form-control me-2" type="search" placeholder="Somente Visual" aria-label="Search">
        <button type="submit" class="btn btn-dark">Search</button>
      </form>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">

            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/">Inicio</a>
            </li>

            <!-- Conteúdo exibido apenas para usuários autenticados -->
            @auth
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/usuario/listar">Usuários</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/produto/listar">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/fabricante/listar">Fabricantes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/maquina/listar">Máquinas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/equipamento/listar">Equipamentos</a>
            </li>
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link nav-link active" aria-current="page">
                  Sair
                </button>
              </form>
            </li>
            @endauth

            <!-- Conteúdo exibido apenas para visitantes (não autenticados) -->
            @guest
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/login">Entrar</a>
            </li>
            @endguest

          </ul>
        </div>
      </div>
    </div>
  </nav>

  <main class="container">
    <div class="bg-body-tertiary p-5 rounded">
      @yield('content')
    </div>
  </main>

  <!-- End Example Code -->
</body>

</html>
