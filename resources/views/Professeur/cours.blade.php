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
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Mes Cours</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Tous les cours</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">@include('Professeur.modals.album1')</div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">@include('Professeur.modals.album2')</div>
</div>
            </div>
        </div>


        <!-- Bootstrap bundle and Chart.js -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
            integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
        </script>
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
        <script>
        import {
            Ripple,
            initMDB
        } from "mdb-ui-kit";

        initMDB({
            Ripple
        });
        </script>
        @endsection
    </main>
</body>

</html>
@endsection