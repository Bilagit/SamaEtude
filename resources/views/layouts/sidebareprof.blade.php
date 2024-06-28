<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
</head>
<body>
<nav class="navbar navbar-expand-lg custom-navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('img/logo.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
            SamaEtude
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Accueil</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/cours">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/exercices">Exercice</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=""><i class="fas fa-bell"></i> Notifications</a>
                            <a class="dropdown-item" href=""><i class="fas fa-user"></i> Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                            <form id="logout-form" action="" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @if (Auth::user()->role === 'professeur')
                        <li class="nav-item">
                            <a class="nav-link" href="">Correction des Exercices</a>
                        </li>
                    @endif
                @endguest
            </ul>
        </div>
    </div>
</nav>

    <div class="container-fluid">
        <div class="row">
            @yield('content')
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
    integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
</script>
<script src="dashboard.js"></script>
</body>

</html>