@extends('layouts.navbar')

@section('content')
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Template · Bootstrap v5.3</title>
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="{{ asset('css/Connection.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="dashboard.css" rel="stylesheet">
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    @vite(['resources/css/main.css','resources/js/cours.js','resources/js/util.css'])
    @vite(['resources/css/sidebars.css','resources/js/app.js','resources/js/sidebars.js'])
</head>

<body>
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <!-- Your SVG symbols here -->
    </svg>

    <!-- Dropdown for theme -->
    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <!-- Dropdown content here -->
    </div>

    <!-- Main content -->
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
       @include('Professeur.modals.header')


        <!-- Success message -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif

        <!-- Course section -->
        <div class="row">
            <div class="col-lg-9">
                <h2>Cours</h2>
            </div>
            <div class="col-lg-3">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addCourseModal">
                    <img src="{{ asset('img/plus.svg') }}" class="white-icon" width="16" height="16" alt="">
                    Ajouter un cours
                </button>
            </div>
        </div>

        <!-- Modal for adding course -->
        @include('Professeur.modals.ajouterCours')

        <!-- Album section for courses -->
        <div class="album py-5 bg-body-tertiary">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark mb-4">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0"></ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Rechercher un Cours"
                            aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
        </nav>
        <br>
        <nav>
            <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                @foreach ($categories as $index => $categorie)
                <button class="nav-link {{ $index === 0 ? 'active' : '' }}"
                    id="nav-{{ $categorie->id }}-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-{{ $categorie->id }}" type="button" role="tab"
                    aria-controls="nav-{{ $categorie->id }}"
                    aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                    {{ $categorie->nom }}
                </button>
                @endforeach
            </div>

            <div class="tab-content" id="nav-tabContent">
                @foreach ($categories as $index => $categorie)
                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                    id="nav-{{ $categorie->id }}" role="tabpanel"
                    aria-labelledby="nav-{{ $categorie->id }}-tab">
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        @foreach ($cours->where('idCategorie', $categorie->id) as $cour)
                        <div class="col">
                            <div class="card shadow-sm">
                                <img src="{{ asset('img/java.webp') }}" class="rounded" width="100%"
                                    height="225" alt="">
                                <div class="card-body">
                                    <p class="card-text"><strong>{{ $cour->nom }}</strong></p>
                                    <p class="card-text">{{ $cour->description }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}"
                                                class="btn btn-light">
                                                <img src="{{ asset('img/eye.svg') }}" width="16" height="16"
                                                    alt="">
                                            </a>
                                            <button type="button" class="btn btn-info"
                                                data-bs-toggle="modal"
                                                data-bs-target="#editCourseModal{{ $cour->id }}">
                                                <img src="{{ asset('img/pencil.svg') }}" width="16"
                                                    height="16" alt="">
                                            </button>
                                            <button type="button" class="btn btn-danger"
                                                data-cour-id="{{ $cour->id }}" data-bs-toggle="modal"
                                                data-bs-target="#confirmDeleteModal{{$cour->id}}"><img
                                                    src="{{ asset('img/trash.svg') }}" width="16"
                                                    height="16" alt=""></button>
                                        </div>
                                        <small class="text-body-secondary">Le
                                            {{ $cour->created_at }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modale de modification -->
                        @include('Professeur.modals.modifierCours')
                        @include('Professeur.modals.supprimerCours')
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
        </nav>
    </div>
</div>


        <!-- Bootstrap bundle and Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
            integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous"></script>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

        <!-- Additional scripts -->
        @section('scripts')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());
            gtag('config', 'UA-23581568-13');
        </script>
        <script src="js/main.js"></script>
        @endsection
    </main>
</body>

</html>
@endsection
