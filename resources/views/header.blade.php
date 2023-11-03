<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
        <img src="/logo.jpg" style="width: 80px; height: 60px;" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/news">News</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/comedy">Comedy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/science">Science</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/music">Music</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/live">Live</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/history">History</a>
        </li>
      </ul>
        @auth
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="/profile">Perfil</a></li>
            </ul>
        </li>
        </ul>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="btn btn-link">Sair</button>
            </form>
        @else
          <a href="/login" style="text-decoration: none; padding-left: 8px;">Entrar</a>
          <a href="/register" style="text-decoration: none; padding-left: 8px;">Registar</a>
        @endauth
    </div>
  </div>
</nav>
</header>
