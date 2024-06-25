<!doctype html>
<html lang="en">

<head>
    <title>Gestion des Utilisateurs</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <style>
    body {
        color: #566787;
        background: #f5f5f5;
        font-family: 'Poppins', sans-serif;
        font-size: 13px;
    }

    .wrapper {
        display: flex;
        align-items: stretch;
    }

    #sidebar {
        min-width: 250px;
        max-width: 250px;
        background: #333;
        color: #fff;
        transition: all 0.3s;
    }

    #sidebar .logo {
        display: block;
        text-align: center;
        padding: 20px 0;
        color: #fff;
        font-size: 24px;
        font-weight: bold;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul p {
        color: #fff;
        padding: 10px;
    }

    #sidebar ul li {
        padding: 10px;
        cursor: pointer;
    }

    #sidebar ul li a {
        color: #fff;
        text-decoration: none;
    }

    #sidebar ul li a:hover {
        background: #7386D5;
    }

    #sidebar ul li.active>a,
    #sidebar a[aria-expanded="true"] {
        background: green;
        color: #fff;
    }

    .table-responsive {
        margin: 30px 0;
    }

    .table-wrapper {
        min-width: 1000px;
        background: #fff;
        padding: 20px 25px;
        border-radius: 3px;
        box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
    }

    .table-title {
        padding-bottom: 15px;
        background: #299be4;
        color: #fff;
        padding: 16px 30px;
        margin: -20px -25px 10px;
        border-radius: 3px 3px 0 0;
    }

    .table-title h2 {
        margin: 5px 0 0;
        font-size: 24px;
    }

    .table-title .btn {
        color: #566787;
        float: right;
        font-size: 13px;
        background: #fff;
        border: none;
        min-width: 50px;
        border-radius: 2px;
        border: none;
        outline: none !important;
        margin-left: 10px;
    }

    .table-title .btn:hover,
    .table-title .btn:focus {
        color: #566787;
        background: #f2f2f2;
    }

    .table-title .btn i {
        float: left;
        font-size: 21px;
        margin-right: 5px;
    }

    .table-title .btn span {
        float: left;
        margin-top: 2px;
    }

    table.table tr th,
    table.table tr td {
        border-color: #e9e9e9;
        padding: 12px 15px;
        vertical-align: middle;
    }

    table.table tr th:first-child {
        width: 60px;
    }

    table.table tr th:last-child {
        width: 100px;
    }

    table.table-striped tbody tr:nth-of-type(odd) {
        background-color: #fcfcfc;
    }

    table.table-striped.table-hover tbody tr:hover {
        background: #f5f5f5;
    }

    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }

    table.table td:last-child i {
        opacity: 0.9;
        font-size: 22px;
        margin: 0 5px;
    }

    table.table td a {
        font-weight: bold;
        color: #566787;
        display: inline-block;
        text-decoration: none;
    }

    table.table td a:hover {
        color: #2196F3;
    }

    table.table td a.settings {
        color: #2196F3;
    }

    table.table td a.delete {
        color: #F44336;
    }

    table.table td i {
        font-size: 19px;
    }

    table.table .avatar {
        border-radius: 50%;
        vertical-align: middle;
        margin-right: 10px;
    }

    .status {
        font-size: 30px;
        margin: 2px 2px 0 0;
        display: inline-block;
        vertical-align: middle;
        line-height: 10px;
    }

    .text-success {
        color: #10c469;
    }

    .text-info {
        color: #62c9e8;
    }

    .text-warning {
        color: #FFC107;
    }

    .text-danger {
        color: #ff5b5b;
    }

    .pagination {
        float: right;
        margin: 0 0 5px;
    }

    .pagination li a {
        border: none;
        font-size: 13px;
        min-width: 30px;
        min-height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 2px !important;
        text-align: center;
        padding: 0 6px;
    }

    .pagination li a:hover {
        color: #666;
    }

    .pagination li.active a,
    .pagination li.active a.page-link {
        background: #03A9F4;
    }

    .pagination li.active a:hover {
        background: #0397d6;
    }

    .pagination li.disabled i {
        color: #ccc;
    }

    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }

    .hint-text {
        float: left;
        margin-top: 10px;
        font-size: 13px;
    }

    .custom-green-background {
        background-color: green;
        color: white;
        padding: 10px;
        border-radius: 5px;
    }

    .custom-list-item {
        font-size: 16px;
        /* Augmentez la taille du texte */
        padding: 20px 15px;
        /* Augmentez l'espacement intérieur */
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
    </script>
</head>

<body>
    <header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="dark">
        <div>
            <img src="{{ asset('img/drapeau_senegal.png') }}" width="32" height="32" alt="">
        </div>
        <ul class="navbar-nav flex-row d-md-none">
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSearch" aria-controls="navbarSearch" aria-expanded="false"
                    aria-label="Toggle search">
                    <svg class="bi">
                        <use xlink:href="#search" />
                    </svg>
                </button>
            </li>
            <li class="nav-item text-nowrap">
                <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <svg class="bi">
                        <use xlink:href="#list" />
                    </svg>
                </button>
            </li>
        </ul>

        <div id="navbarSearch" class="navbar-search w-100 collapse">
            <input class="form-control w-100 rounded-0 border-0" type="text" placeholder="Search" aria-label="Search">
        </div>
    </header>
    <div class="wrapper">
        <nav id="sidebar">
            <h1><a href="index.html" class="logo">Project Name</a></h1>
            <ul class="list-unstyled components mb-5">
                <li class="active custom-list-item">
                    <a href="#"><span class="fa fa-home mr-3"></span> Tableau de Bord</a>
                </li>
                <li class="custom-list-item">
                    <a href="#"><span class="fa fa-user mr-3"></span> Liste des Professeurs</a>
                </li>
                <li class="custom-list-item">
                    <a href="#"><span class="fa fa-user mr-3"></span> Liste des Etudiants</a>
                </li>
                <li class="custom-list-item">
                    <a href="#"><span class="fa fa-sticky-note mr-3"></span> Se Déconnecter</a>
                </li>
                <li class="custom-list-item">
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Profile</a>
                </li>
            </ul>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="42" height="42"
                        class="rounded-circle me-2">Admin
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">Ajouter un Professeur...</a></li>
                    <li><a class="dropdown-item" href="#">Configuration</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Se Déconnecter</a></li>
                </ul>
            </div>
        </nav>
        @if ($message = Session::get('success'))

        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5">
            <div class="container-xl">
                <div class="table-responsive">
                    <div class="table-wrapper">
                        <div class="table-title custom-green-background">
                            <div class="row">
                                <div class="col-sm-5">
                                    <h2>Gestion des <b>Professeurs</b></h2>
                                </div>

                                <div class="col-sm-7">
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#addProfModal"><i class="material-icons">&#xE147;</i>
                                        Ajouter un Professeur
                                    </button>

                                    <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                        <span>Exporter un excel</span></a>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="addProfModal" tabindex="-1" role="dialog"
                            aria-labelledby="addProfModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="addProfModalLabel">Ajouter un Professeur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form id="addProfForm" action="{{ route('admin.addprof') }}" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="name">Nom</label>
                                                <input type="text" class="form-control" id="name" name="name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="first_name">Prénom</label>
                                                <input type="text" class="form-control" id="first_name"
                                                    name="first_name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Mot de Passe</label>
                                                <input type="password" class="form-control" id="password"
                                                    name="password" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="phone_number">Numéro de Téléphone</label>
                                                <input type="text" class="form-control" id="phone_number"
                                                    name="phone_number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="specialite">Spécialité</label>
                                                <input type="text" class="form-control" id="specialite"
                                                    name="specialite" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-primary">Ajouter</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Email</th>
                                    <th>Téléphone</th>
                                    <th>Spécialité</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar"
                                                alt="Avatar"> Michael Holz</a></td>
                                    <td>04/10/2013</td>
                                    <td>Admin</td>
                                    <td>Admin</td>
                                    <td><span class="status text-success">&bull;</span> Active</td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar"
                                                alt="Avatar"> Paula Wilson</a></td>
                                    <td>05/08/2014</td>
                                    <td>Publisher</td>
                                    <td>Admin</td>
                                    <td><span class="status text-success">&bull;</span> Active</td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar"
                                                alt="Avatar"> Antonio Moreno</a></td>
                                    <td>11/05/2015</td>
                                    <td>Publisher</td>
                                    <td>Admin</td>
                                    <td><span class="status text-danger">&bull;</span> Suspended</td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar"
                                                alt="Avatar"> Mary Saveley</a></td>
                                    <td>06/09/2016</td>
                                    <td>Reviewer</td>
                                    <td>Admin</td>
                                    <td><span class="status text-success">&bull;</span> Active</td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar"
                                                alt="Avatar"> Martin Sommer</a></td>
                                    <td>12/08/2017</td>
                                    <td>Moderator</td>
                                    <td>Admin</td>
                                    <td><span class="status text-warning">&bull;</span> Inactive</td>
                                    <td>
                                        <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                                class="material-icons">&#xE8B8;</i></a>
                                        <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                                class="material-icons">&#xE5C9;</i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                            <ul class="pagination">
                                <li class="page-item disabled"><a href="#">Previous</a></li>
                                <li class="page-item"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>