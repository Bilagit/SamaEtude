<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Se Connecter | SamaEtude</title>
    <link rel="shortcut icon" href="assets/images/fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/images/fav.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <style>
        #home-button {
            width: 60px; /* Augmenter la taille du bouton */
            height: 60px;
            font-size: 30px; /* Augmenter la taille de l'icône */
            background-color: #1ABC9C; /* Changer la couleur de fond du bouton */
            transition: transform 0.3s; /* Ajouter une transition pour l'effet de survol */
            border-radius: 50%;
        }

        #home-button:hover {
            transform: scale(1.1); /* Agrandir le bouton lors du survol */
        }
    </style>
</head>
<body class="bg-white">
<a href="/" id="home-button" class="btn btn-success position-absolute top-0 start-0 m-3">
    <i class="bi bi-house-fill text-white"></i>
</a>
    <div class="container-fluid vh-100 overflow-auto">
        <div class="row vh-100">
            <div class="col-lg-6 bg-gray p-5 text-center">
                <h4 class="text-center fw-bolder fs-2">S'inscrire</h4>
                <p class="mb-3 fs-7">Vous n'avez pas encore de Compte ? Inscrivez-Vous</p>
                <a href="{{ route('auth.register') }}">
                    <button class="btn fw-bold mb-5 btn-outline-success px-4 rounded-pill">Créer un Compte</button>
                </a>
                <div class="img-cover p-4">
                    <img src="assets/images/loginbg.svg" alt="">
                </div>
            </div>
            <div class="col-lg-6 p vh-100">
                <div class="row d-flex vh-100">
                    <div class="col-md-8 p-4 ikigui m-auto text-center align-items-center">
                        <h4 class="text-center fw-bolder mb-4 fs-2">Se Connecter</h4>
                        <form method="POST" action="{{ route('auth.dologin') }}">
                            @csrf
                            <div class="input-group mb-4">
                                <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-person"></i></span>
                                <input type="text" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="E-mail" name="email" aria-label="Username" aria-describedby="basic-addon1" required>
                            </div>
                            <div class="input-group mb-4">
                                <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-lock"></i></span>
                                <input type="password" class="form-control ps-2 fs-7 border-start-0 form-control-lg inbg mb-0" placeholder="Mot de Passe" name="password" aria-label="Password" aria-describedby="basic-addon1" required>
                            </div>
                            <button type="submit" class="btn btn-lg fw-bold fs-7 btn-success w-100">Se Connecter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>
    <script src="assets/plugins/testimonial/js/owl.carousel.min.js"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>
