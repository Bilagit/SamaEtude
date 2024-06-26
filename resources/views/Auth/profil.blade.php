<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Profile with Data and Skills</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/profil.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<body>
<div class="container-fluid">
    <div class="main-body">

        <nav class="navbar  navbar-expand-lg custom-navbar">
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
                        @if($user->role === 'etudiant')
                        <!-- Authenticated -->
                        <li class="nav-item">
                            <a class="nav-link" href="/etudiant">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/etudiant">Cours</a>
                        </li>
                        @elseif($user->role === 'professeur')
                            <li class="nav-item">
                                <a class="nav-link" href="/cours">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/cours">Cours</a>
                        @elseif($user->role === 'administrateur')
                            <li class="nav-item">
                                <a class="nav-link" href="/admin">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/getetudiants">Etudiants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/listecategorie">Catégories</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/listeprof">Professeurs</a>
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
                                <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- Role specific -->
                        @if (Auth::user()->role === 'professeur')
                            <li class="nav-item">
                                <a class="nav-link" href="">Lien Professeur</a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- /Navbar -->

        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                 class="rounded-circle" width="150">
                            <div class="mt-3">
                                <h4>{{ $user->first_name . ' ' . $user->name }}</h4>
                                <p class="text-secondary mb-1">{{ $user->role }}</p>
                                <button class="btn btn-primary" data-toggle="modal"
                                        data-target="#editProfileModal">
                                    Modifier
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-mail mr-2 icon-inline">
                                    <path d="M4 4h16v16H4z"></path>
                                    <polyline points="22,6 12,13 2,6"></polyline>
                                </svg>Email
                            </h6>
                            <span class="text-secondary">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                                    <path
                                        d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                                    </path>
                                </svg>Github
                            </h6>
                            <span class="text-secondary">Abdou-Aziz-Sy</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            <h6 class="mb-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-linkedin mr-2 icon-inline text-success">
                                    <path d="M16 8a6 6 0 0 1 12 12 6 6 0 0 1-12-12z"></path>
                                    <line x1="4" y1="4" x2="10" y2="10"></line>
                                </svg>LinkedIn
                            </h6>
                            <span class="text-secondary">abdouazizsy@esp.sn</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Nom Complet</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->first_name . ' ' . $user->name }}
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                                {{ $user->email }}
                            </div>
                        </div>
                        <hr>
                        @if ($user->role === 'etudiant')
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Téléphone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $info->phone_number }}
                                </div>
                            </div>
                        @elseif ($user->role === 'professeur')
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Téléphone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $info->telephone }}
                                </div>
                            </div>
                        @endif
                        <hr>
                        @if ($user->role === 'etudiant')
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Niveau</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $info->level }}
                                </div>
                            </div>
                        @elseif ($user->role === 'professeur')
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Spécialité</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    {{ $info->specialite }}
                                </div>
                            </div>
                        @endif
                        <hr>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#editProfileModal">
                            <i class="fas fa-edit"></i> Éditer
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="editProfileModal" tabindex="-1" role="dialog"
                             aria-labelledby="editProfileModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProfileModalLabel">Modifier le profil</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Form for updating profile -->
                                        <form action="{{ route('auth.updateprofil', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group">
                                                <label for="name">Nom</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                       value="{{ $user->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">Prénom</label>
                                                <input type="text" class="form-control" id="first_name"
                                                       name="first_name"  value="{{ $user->first_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="{{ $user->email }}">
                                            </div>

                                            @if ($user->role === 'etudiant')
                                                <div class="form-group">
                                                    <label for="phone_number">Téléphone</label>
                                                    <input type="text" class="form-control" id="phone_number"
                                                           name="phone_number"
                                                           value="{{ $info->phone_number ?? '' }}">
                                                </div>
                                            @elseif ($user->role === 'professeur')
                                                <div class="form-group">
                                                    <label for="phone_number">Téléphone</label>
                                                    <input type="text" class="form-control" id="phone_number"
                                                           name="phone_number"
                                                           value="{{ $info->telephone?? '' }}">
                                                </div>
                                            @endif

                                            @if ($user->role === 'etudiant')
                                                <div class="form-group">
                                                    <label for="level">Niveau</label>
                                                    <input type="text" class="form-control" id="level" name="level"
                                                           value="{{ $info->level ?? '' }}">
                                                </div>
                                            @elseif ($user->role === 'professeur')
                                                <div class="form-group">
                                                    <label for="specialite">Spécialité</label>
                                                    <input type="text" class="form-control" id="specialite"
                                                           name="specialite"
                                                           value="{{ $info->specialite ?? '' }}">
                                                </div>
                                            @endif

                                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /Modal -->
                    </div>
                </div>

                <!-- Recent Activity -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Activité Récente</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <p class="mb-0">Consulté <strong>Introduction à l'Intelligence
                                                        Artificielle</strong></p>
                                                <small class="text-muted">Il y a 10 minutes</small>
                                            </div>
                                            <div class="col-sm-2 text-right">
                                                <button class="btn btn-outline-primary btn-sm">Voir</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <p class="mb-0">Consulté <strong>Algorithmes et Structures de
                                                        Données</strong></p>
                                                <small class="text-muted">Hier</small>
                                            </div>
                                            <div class="col-sm-2 text-right">
                                                <button class="btn btn-outline-primary btn-sm">Voir</button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Recent Activity -->

                <!-- Accomplissements -->
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Accomplissements</h5>
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <p class="mb-0"><strong>Introduction à l'Intelligence Artificielle</strong>
                                            - Achevé</p>
                                        <small class="text-muted">Décembre 2023</small>
                                    </li>
                                    <li class="list-group-item">
                                        <p class="mb-0"><strong>Algorithmes et Structures de Données</strong> -
                                            Évalué</p>
                                        <small class="text-muted">En cours</small>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Accomplissements -->

            </div>
        </div>

    </div>
</div>
</body>

</html>

