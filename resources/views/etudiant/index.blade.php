<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Étudiant</title>
    <link rel="stylesheet" href="{{ asset('assets/css/etudiant.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
    /* Réinitialiser le style du lien */
    a.course-link {
        color: inherit;
        /* Conserve la couleur du texte */
        text-decoration: none;
        /* Supprime le soulignement */
    }

    /* Forcer les styles des éléments enfants */
    a.course-link .course-card {
        display: block;
        /* S'assure que le div prend tout l'espace du lien */
    }

    a.course-link h5,
    a.course-link p,
    a.course-link {
        color: inherit;
        /* Conserve la couleur du texte */
        font-family: inherit;
        /* Conserve la police du texte */
        font-size: inherit;
        /* Conserve la taille de la police */
    }

    /* Style pour le cercle des initiales */
    .initials-circle {
        display: inline-block;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        color: white;
        text-align: center;
        line-height: 40px;
        font-size: 18px;
        margin-left: 520px;
        position: absolute;
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo.png') }}" width="40" height="40" class="d-inline-block align-top" alt="">
                SamaEtude
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Authenticated -->
                    <li class="nav-item">
                        <a class="nav-link" href="">Cours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/">Accueil</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Menu
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href=""><i class="fas fa-bell"></i> Notifications</a>
                            <a class="dropdown-item" href="/profil"><i class="fas fa-user"></i> Profil</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=""
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i> Déconnexion
                            </a>
                            <form id="logout-form" action="{{ route('auth.logout') }}" method="POST"
                                style="display: none;">
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

    <div class="container mt-5">
        <h1>Page Étudiant</h1>
        <ul class="nav nav-tabs" id="studentTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="cours-tab" data-toggle="tab" href="#cours" role="tab"
                    aria-controls="cours" aria-selected="true">Cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="mes-cours-tab" data-toggle="tab" href="#mes-cours" role="tab"
                    aria-controls="mes-cours" aria-selected="false">Mes Cours</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="evaluations-tab" data-toggle="tab" href="#evaluations" role="tab"
                    aria-controls="evaluations" aria-selected="false">Evaluations</a>
            </li>
        </ul>
        <div class="tab-content" id="studentTabContent">
            <!-- Onglet Cours -->
            <div class="tab-pane fade show active" id="cours" role="tabpanel" aria-labelledby="cours-tab">
                <div class="search-bar">
                    <input type="text" class="form-control" id="searchCourse" placeholder="Rechercher un cours...">
                </div>
                <div class="filter-bar">
                    <select class="form-control" id="categoryFilter">
                        <option value="all">Toutes les catégories</option>
                        <option value="category1">Informatique</option>
                        <option value="category2">Langue</option>
                        <option value="category3">Economie</option>
                    </select>
                </div>
                <div id="courseList">
                    <!-- Exemples de cours -->
                    @foreach ($cours as $cour)
                    <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}" class="course-link">
                        <div class="course-card">
                            <div class="course-details">
                                <div class="course-info">
                                    <h5>
                                        @foreach ($categories as $categorie)
                                        @if ($categorie->id == $cour->idCategorie)
                                        <img src="{{ asset('storage/' . $categorie->image) }}" width="100%" height="225"
                                            alt="Image de {{ $categorie->nom }}">
                                        @endif
                                        @endforeach
                                        {{ $cour->nom }}
                                    </h5>
                                    <p>
                                        @foreach ($profs as $prof)
                                        @foreach ($users as $user)
                                        @if ($cour->idProfesseur == $prof->id && $prof->idUser == $user->id)
                                    <div class="initials-circle">
                                        {{ substr($user->first_name, 0, 1) }}{{ substr($user->name, 0, 1) }}
                                    </div>Pr. {{$user->first_name}} {{$user->name}}
                                    @endif
                                    @endforeach
                                    @endforeach
                                    </p>
                                </div>
                                <div class="course-rating">
                                    <span>4.5</span>
                                    <span>★</span>
                                </div>
                                <i class="fas fa-heart favorite-icon"></i>
                            </div>
                        </div>
                    </a>

                    @endforeach
                </div>
            </div>
            <!-- Onglet Mes Cours -->
            <!-- Onglet Evaluations -->
            <div class="tab-pane fade" id="evaluations" role="tabpanel" aria-labelledby="evaluations-tab">
                <div id="evaluationList">
                    <!-- Exemples d'évaluations -->
                    <div class="course-card">
                        <h5>Évaluation final python</h5>
                        <p>19/20</p>
                    </div>
                    <div class="course-card">
                        <h5>Évaluation java N2</h5>
                        <p>17/20</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    // Fonction pour générer une couleur aléatoire en format hexadécimal
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Appliquer une couleur aléatoire à chaque cercle des initiales
    $(document).ready(function() {
        $('.initials-circle').each(function() {
            $(this).css('background-color', getRandomColor());
        });
    });

    // Filtres et recherche de cours (comme précédemment)
    $(document).ready(function() {
        $('#searchCourse').on('input', function() {
            var searchQuery = $(this).val().toLowerCase();
            $('#courseList .course-card').each(function() {
                var courseName = $(this).find('h5').text().toLowerCase();
                if (courseName.includes(searchQuery)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        $('#categoryFilter').on('change', function() {
            var selectedCategory = $(this).val();
            // Filtrage des cours par catégorie (à adapter selon la logique réelle)
            $('#courseList .course-card').each(function() {
                if (selectedCategory === 'all') {
                    $(this).show();
                } else {
                    // Exemple simplifié : cacher tous les cours sauf ceux de la catégorie sélectionnée
                    if ($(this).hasClass(selectedCategory)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                }
            });
        });
    });
    </script>
</body>

</html>