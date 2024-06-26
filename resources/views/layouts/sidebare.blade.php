<!doctype html>
<html lang="en">
@vite(['resources/css/style.css','resources/js/app.js'])

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
        margin: 0;
        padding: 0;
    }

    .wrapper {
        display: flex;
        align-items: stretch;
    }

    #sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px; /* Specify a fixed width */
        background: #333;
        color: #fff;
        transition: all 0.3s;
        z-index: 1000; /* Ensure sidebar stays above other content */
    }

    #sidebar .logo {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 20px 0;
        font-size: 18px; /* Adjust font size */
        font-weight: bold;
    }

    #sidebar ul.components {
        padding: 20px 0;
        border-bottom: 1px solid #47748b;
    }

    #sidebar ul li {
        padding: 10px;
        cursor: pointer;
    }

    #sidebar ul li a {
        color: #fff;
        text-decoration: none;
        padding: 0.5rem;
    }

    #sidebar ul li a:hover {
        background-color: darkgreen;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin: 0.25rem 0;
    }

    #sidebar ul li.active>a,
    #sidebar a[aria-expanded="true"] {
        background: green;
        color: #fff;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin: 0.25rem 0;
    }

    #content {
        margin-left: 250px; /* Adjust based on sidebar width */
        padding: 20px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        #sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }
        #content {
            margin-left: 0;
        }
    }
    </style>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css" crossorigin="anonymous" />
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
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/logoadmin.png') }}" alt="" width="50" height="50"> <!-- Adjust width and height as needed -->
            <h1 style="color: #f2f2f2; font-size: 24px; margin-left: 10px;">SamaEtude</h1> <!-- Adjust font size and margin -->
        </div>
        <div class="dropdown">
            <a href="/profil" class="d-flex align-items-center text-white text-decoration-none"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="https://github.com/mdo.png" alt="" width="42" height="42" class="rounded-circle me-2">Admin
            </a>
        </div>
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
            <div class="logo">
                SamaEtude
            </div>
            <ul class="list-unstyled components mb-5">
                <li class="custom-list-item" id="dashboard">
                    <a href="/admin"><span class="fa fa-home mr-3"></span> Tableau de Bord</a>
                </li>
                <li class="custom-list-item" id="listeprof">
                    <a href="/listeprof"><img src="{{ asset('img/teacher.svg') }}" width="24" height="24" alt=""> Liste
                        des Professeurs</a>
                </li>
                <li class="custom-list-item" id="getetudiants">
                    <a href="/getetudiants"><img src="{{ asset('img/student.svg') }}" width="24" height="24" alt="">
                        Liste des Etudiants</a>
                </li>
                <li class="custom-list-item" id="listecategorie">
                    <a href="/listecategorie"><span class="fa fa-sticky-note mr-3"></span> Gestion des Catégories</a>
                </li>
                <li class="custom-list-item" id="profil">
                    <a href="/profil"><span class="fa fa-paper-plane mr-3"></span> Profile</a>
                </li>
                <li class="custom-list-item">
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <img src="{{ asset('img/box-arrow-right.svg') }}" width="24" height="24" alt=""> Se Déconnecter
                    </a>
                </li>
            </ul>
        </nav>
        <!-- Page Content  -->
        <div id="content">
            @yield('content')
        </div>
    </div>

    <script>
    $(document).ready(function() {
        var url = window.location.href;
        var activePage = url;

        // Remove trailing slash to match with URL in href attribute
        if (activePage.substr(-1) === '/') {
            activePage = activePage.slice(0, -1);
        }

        // Iterate over each <li> and check if its <a> element's href attribute matches the current URL
        $('#sidebar ul li').each(function() {
            var link = $(this).find('a').attr('href');

            // Check if the current page URL contains the link URL
            if (activePage.includes(link)) {
                $(this).addClass('active');
            }
        });
    });
    </script>
</body>

</html>
