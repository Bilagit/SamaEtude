@extends('layouts.navbar')

@section('content')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


<head>
    <script src="../assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.112.5">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">


    @vite(['resources/css/sidebars.css','resources/js/app.js','resources/js/sidebars.js'])


    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
    }

    .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
    }

    .bi {
        vertical-align: -.125em;
        fill: currentColor;
    }

    .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
    }

    .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
    }

    .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
    }

    .bd-mode-toggle {
        z-index: 1500;
    }

    .white-icon {
        filter: invert(100%);
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" crossorigin="anonymous" />

    <!-- Custom styles for this template -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>


    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-fluid">
        <div class="row">

            <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
                <div
                    class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Bienvenu(e) Pr. {{ Auth::user()->first_name }} {{ Auth::user()->name }}</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="dropdown">
                            <a href="#"
                                class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://github.com/mdo.png" alt="" width="42" height="42"
                                    class="rounded-circle me-2">
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
                <div class="row">
                    <div class="col-lg-9">
                        <h2>Exercices des étudiants</h2>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <table id="exercices-table" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Date de Dépot</th>
                                    <th>Etudiant</th>
                                    <th>Actions</th>
                                    <!-- Ajoutez d'autres colonnes selon vos besoins -->
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Remplissez le tableau avec les données -->
                                <tr>
                                    <td><img src="https://coderthemes.com/highdmin/layouts/assets/images/file_icons/pdf.svg"
                                            width="10%" alt="icon"> Exercice 1</td>
                                    <td>30 juin 2024 à 23h03min</td>
                                    <td>Ousseynou Seck</td>
                                    <td>
                                        <a class="btn btn-xs fs-10 btn-bold btn-info" href="#" data-toggle="modal"
                                            data-target="#modal-contact"><img src="{{ asset('img/info-circle.svg') }}"
                                                width="100%" alt=""></a>
                                        <a class="btn btn-xs fs-10 btn-bold btn-warning" href="#" data-toggle="modal"
                                            data-target="#exampleModal">
                                            <i class="fa fa-star" style="color: white;"></i>
                                        </a>

                                    </td>
                                    </td>
                                </tr>
                                <!-- Répétez pour chaque ligne -->
                            </tbody>
                        </table>
                    </div>
                </div>


            </main>
        </div>
    </div>
    <!-- Modal pour ajouter un exercice -->
     <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog mx-0 mx-sm-auto">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="exampleModalLabel">Noter un étudiant</h5>
                <button type="button" class="btn-close text-white" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Contenu du formulaire modal -->
                <div class="text-center">
          <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
          <p>
            <strong>Noter un étudiant</strong>
          </p>
          <div data-mdb-ripple-init class="btn-toolbar justify-content-center" role="toolbar" aria-label="Toolbar with button groups">
    <div data-mdb-ripple-init class="btn-group me-2" role="group" aria-label="First group">
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">0</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">1</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">2</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">3</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">4</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">5</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">6</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">7</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">8</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">9</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">10</button>
    </div>
    <div data-mdb-ripple-init class="btn-group me-2" role="group" aria-label="First group">
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">11</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">12</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">13</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">14</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">15</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">16</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">17</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">18</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">19</button>
      <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-body-tertiary">20</button>
    </div>
  </div>
        </div>

        <hr />

        <form class="px-4" action="">
          <p class="text-center"><strong>Vos Appréciations :</strong></p>

          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="exampleForm" id="radio4Example1" />
            <label class="form-check-label" for="radio4Example1">
              Très Bien
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="exampleForm" id="radio4Example2" />
            <label class="form-check-label" for="radio4Example2">
              Bien
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="exampleForm" id="radio4Example3" />
            <label class="form-check-label" for="radio4Example3">
              Médicore
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="exampleForm" id="radio4Example4" />
            <label class="form-check-label" for="radio4Example4">
              Mauvais
            </label>
          </div>
          <div class="form-check mb-2">
            <input class="form-check-input" type="radio" name="exampleForm" id="radio4Example5" />
            <label class="form-check-label" for="radio4Example5">
              Très Faible
            </label>
          </div>

          <p class="text-center"><strong>Vos impressions ?</strong></p>

          <!-- Message input -->
          <div data-mdb-input-init class="form-outline mb-4">
            <textarea class="form-control" id="form4Example4" rows="4"></textarea>
            <label class="form-label" for="form4Example4">Impressions</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary" data-mdb-dismiss="modal">
          Fermer
        </button>
        <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Soumettre</button>
      </div>
            </div>
        </div>
        </div>
    </div>
</div>

    <script>
    $(document).ready(function() {
        $('#exercices-table').DataTable();
    });
    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.1/dist/chart.umd.min.js"
        integrity="sha384-gdQErvCNWvHQZj6XZM0dNsAoY4v+j5P1XDpNkcM3HJG1Yx04ecqIHk7+4VBOCHOG" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
</body>

</html>
@endsection