@extends('layouts.sidebareprof')

@section('content')
<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="vendor/animate/animate.css">
<link rel="stylesheet" href="vendor/css-hamburgers/hamburgers.min.css">
<link rel="stylesheet" href="vendor/select2/select2.min.css">
@vite(['resources/css/main.css','resources/js/cours.js','resources/js/util.css'])

<style>
.modal-dialog-custom {
    max-width: 800px;
}

.contact1 {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.contact1-pic {
    flex: 0 0 50%;
    max-width: 50%;
    padding-right: 20px;
    /* Espacement à ajuster selon vos besoins */
}

.contact1-form {
    flex: 0 0 50%;
    max-width: 50%;
}

.modal-body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100%;
}
</style>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Bienvenue Mr. Bassirou Touré</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
            <button type="button"
                class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
                <svg class="bi">
                    <use xlink:href="#calendar3" />
                </svg>
                Cette semaine
            </button>&nbsp;
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="42" height="42" class="rounded-circle me-2">
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Ajouter un Cours...</a></li>
                    <li><a class="dropdown-item" href="#">Configuration</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Se Déconnecter</a></li>
                </ul>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
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

    <div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Ajouter un cours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="contact1">
                        <div class="contact1-pic js-tilt" data-tilt>
                            <img src="{{ asset('img/img-01.png') }}" class="rounded" width="80%" height="200" alt="">
                        </div>
                        <form class="contact1-form validate-form" action="{{ route('professeur.ajoutercours') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <span class="contact1-form-title">Ajouter un cours</span>

    <div class="wrap-input1 validate-input" data-validate="Le nom du cours est requis">
        <input class="input1" type="text" name="nom" placeholder="Nom du cours">
        <span class="shadow-input1"></span>
    </div>

    <div class="wrap-input1 validate-input" data-validate="La description du cours est requise">
        <textarea class="input1" name="description" placeholder="Description du cours"></textarea>
        <span class="shadow-input1"></span>
    </div>

    <div class="wrap-input1 validate-input" data-validate="Sélectionnez un fichier (PDF, vidéo)">
    <label class="input1-file">
        <input type="file" name="file" class="input1-file-input" accept=".pdf,.mp4,.avi,.mov" onchange="updateFileName(this)">
        <span class="input1-file-choose">Choisir un fichier</span>
        <span class="input1-file-selected">Aucun fichier sélectionné</span>
    </label>
    <span class="shadow-input1"></span>
</div>

<script>
    function updateFileName(input) {
        var fileName = input.files[0].name;
        var fileSelectedText = input.parentNode.querySelector('.input1-file-selected');
        if (fileName) {
            fileSelectedText.textContent = fileName;
        } else {
            fileSelectedText.textContent = 'Aucun fichier sélectionné';
        }
    }
</script>



    <div class="wrap-input1 validate-input" data-validate="Sélectionnez une catégorie">
        <select class="input1" name="idCategorie" required>
            <option value="" disabled selected>Choisissez une catégorie</option>
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
            @endforeach
        </select>
        <span class="shadow-input1"></span>
    </div>

    <div class="container-contact1-form-btn">
        <button type="submit" class="contact1-form-btn">
            <span>Ajouter le cours <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
        </button>
    </div>
</form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

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
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </nav>
            <br>
            <nav>
                <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">JAVA</button>
                    <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                        type="button" role="tab" aria-controls="nav-profile" aria-selected="false">IPDL</button>
                    <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact"
                        type="button" role="tab" aria-controls="nav-contact" aria-selected="false">Programmation
                        Web</button>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('img/java.webp') }}" class="rounded" width="100%" height="225" alt="">
                            <div class="card-body">
                                <p class="card-text">Programmation Orientée Objet</p>
                                <p class="card-text"><strong>informatique</strong></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-light"><img
                                                src="{{ asset('img/eye.svg') }}" width="16" height="16" alt=""></button>
                                        <button type="button" class="btn btn-info"><img
                                                src="{{ asset('img/pencil.svg') }}" width="16" height="16"
                                                alt=""></button>
                                        <button type="button" class="btn btn-danger"><img
                                                src="{{ asset('img/trash.svg') }}" width="16" height="16"
                                                alt=""></button>
                                    </div>
                                    <small class="text-body-secondary">le 24 juin 2024</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Other cards -->
                </div>
            </nav>
        </div>
    </div>
</main>
@endsection

@section('scripts')
<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="vendor/bootstrap/js/popper.js"></script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/select2/select2.min.js"></script>
<script src="vendor/tilt/tilt.jquery.min.js"></script>
<script>
$('.js-tilt').tilt({
    scale: 1.1
});
</script>
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