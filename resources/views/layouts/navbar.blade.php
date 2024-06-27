<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Profile with Data and Skills</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
        }

        .custom-navbar {
            background-color:#001a1a; /* Vert foncé */
            color: #fafafa; /* Couleur claire */
            width: 100%;
        }
        li {
            font-size: 20px;
            margin: 10px;
        }
        .custom-navbar .navbar-brand,
        .custom-navbar .nav-link {
            color: #f6f2f2; /* Couleur claire */
            font-weight: 600;
        }

        .custom-navbar .nav-link:hover {
            color: #ffffff; /* Blanc */
        }

        .custom-navbar .navbar-toggler {
            border-color: rgba(0, 0, 0, 0.1); /* Couleur pour l'icône de toggle */
        }

        .custom-navbar .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(0, 0, 0, 0.5)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .custom-navbar .dropdown-menu {
            background-color: #d4edda; /* Vert clair */
            color: #000000; /* Noir */
            margin-top: 18px;
            margin-right: -37px;
        }

        .custom-navbar .dropdown-item {
            color: #000000; /* Noir */
        }

        .custom-navbar .dropdown-item:hover {
            background-color: #b8e6b9; /* Vert gris */
            color: #000000; /* Noir */
        }

        .dropdown-item i {
            margin-right: 10px; /* Espace entre l'icône et le texte */
        }
    </style>
</head>
<body>
<nav class="navbar   navbar-expand-lg custom-navbar">
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
                    @if (Auth::user()->role === 'professeur')
                        <li class="nav-item">
                            <a class="nav-link" href="/exercices">Exercices</a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=""><i class="fas fa-bell"></i> Notifications</a>
                            <a class="dropdown-item" href="/profil"><i class="fas fa-user"></i> Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@yield('content')

</body>
</html>
