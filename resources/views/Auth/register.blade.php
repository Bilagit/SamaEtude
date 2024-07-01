<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Registration | Smarteyeapps.com</title>
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('assets/images/fav.jpg') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
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
    <div class="row vh-100 ">

        <div class="col-lg-6 bg-gray p-5 text-center">
            <h4 class="text-center fw-bolder fs-2">Connexion</h4>
            <p class="mb-3 fs-7">Vous avez déja un compte ?</p>
            <a href="{{ url('/login') }}"><button class="btn fw-bold mb-5 btn-outline-success px-4 rounded-pill">Connectez vous</button></a>
            <div class="img-cover p-4">
                <img src="{{ asset('assets/images/loginbg.svg') }}" alt="">
            </div>
        </div>
        <div class="col-lg-6 p vh-100">
            <div class="row d-flex vh-100">
                <div class="col-md-8 p-4 ikigui m-auto text-center align-items-center">
                    <h4 class="text-center fw-bolder mb-4 fs-2">Register</h4>

                    <!-- Affichage des messages d'erreur -->
                    <div id="errorMessages" class="alert alert-danger" style="display: none;">
                        <ul id="errorList"></ul>
                    </div>
                    @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <form id="registerForm">
                        @csrf
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="first_name" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="Prenom" aria-label="First Name" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-person"></i></span>
                            <input type="text" name="name" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="Nom" aria-label="Last Name" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-telephone"></i></span>
                            <input type="text" name="phone_number" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="Numéro Téléphone" aria-label="Phone Number" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-mortarboard"></i></span>
                            <select name="level" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" aria-label="Level" aria-describedby="basic-addon1" required>
                                <option value="" disabled selected>Niveau</option>
                                <option value="Bac+1">Bac+1</option>
                                <option value="Bac+2">Bac+2</option>
                                <option value="Bac+3">Bac+3</option>
                                <option value="Bac+4">Bac+4</option>
                                <option value="Bac+5">Bac+5</option>
                            </select>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                            <input type="email" name="email" class="form-control ps-2 border-start-0 fs-7 inbg form-control-lg mb-0" placeholder="Email" aria-label="Email" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" class="form-control ps-2 fs-7 border-start-0 form-control-lg inbg mb-0" placeholder="Mot de passe" aria-label="Password" aria-describedby="basic-addon1" required>
                        </div>
                        <div class="input-group mb-4">
                            <span class="input-group-text border-end-0 inbg" id="basic-addon1"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password_confirmation" class="form-control ps-2 fs-7 border-start-0 form-control-lg inbg mb-0" placeholder="Confirmez mot de passe " aria-label="Password Confirmation" aria-describedby="basic-addon1" required>
                        </div>
                        <button type="submit" class="btn btn-lg fw-bold fs-7 btn-success w-100">Register</button>
                    </form>
                    <p class="text-center py-4 fw-bold fs-8">Suivez nous sur les réseaux sociaux</p>
                    <ul class="d-inline-block mx-auto">
                        <li class="float-start px-3"><a href="#"><i class="bi bi-facebook"></i></a></li>
                        <li class="float-start px-3"><a href="#"><i class="bi bi-twitter"></i></a></li>
                        <li class="float-start px-3"><a href="#"><i class="bi bi-linkedin"></i></a></li>
                        <li class="float-start px-3"><a href="#"><i class="bi bi-google"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/plugins/scroll-fixed/jquery-scrolltofixed-min.js') }}"></script>
<script src="{{ asset('assets/plugins/testimonial/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/script.js') }}"></script>

<script>
    document.getElementById('registerForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Empêche l'envoi du formulaire

        var errors = [];
        var firstName = document.querySelector('input[name="first_name"]').value.trim();
        var lastName = document.querySelector('input[name="name"]').value.trim();
        var phoneNumber = document.querySelector('input[name="phone_number"]').value.trim();
        var level = document.querySelector('select[name="level"]').value;
        var email = document.querySelector('input[name="email"]').value.trim();
        var password = document.querySelector('input[name="password"]').value;
        var passwordConfirmation = document.querySelector('input[name="password_confirmation"]').value;

        // Validation des champs
        if (firstName === '') errors.push('Le prénom est obligatoire.');
        if (lastName === '') errors.push('Le nom est obligatoire.');
        if (phoneNumber === '') errors.push('Le numéro de téléphone est obligatoire.');
        if (level === '') errors.push('Le niveau est obligatoire.');
        if (email === '') errors.push('L\'email est obligatoire.');
        else if (!validateEmail(email)) errors.push('L\'adresse email n\'est pas valide.');
        if (password === '') errors.push('Le mot de passe est obligatoire.');
        if (password !== passwordConfirmation) errors.push('Les mots de passe ne correspondent pas.');

        // Vérification si l'email existe déjà (cette partie doit être remplacée par une requête AJAX au serveur)
        // if (emailExistsInDatabase(email)) errors.push('L\'adresse email existe déjà.');

        if (errors.length > 0) {
            displayErrors(errors);
        } else {
            this.submit(); // Soumet le formulaire si tout est valide
        }
    });

    function displayErrors(errors) {
        var errorList = document.getElementById('errorList');
        var errorMessages = document.getElementById('errorMessages');
        errorList.innerHTML = '';
        errors.forEach(function(error) {
            var li = document.createElement('li');
            li.textContent = error;
            errorList.appendChild(li);
        });
        errorMessages.style.display = 'block';
    }

    function validateEmail(email) {
        var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    // Simulation de la vérification de l'existence de l'email dans la base de données
    // Remplacez cette fonction par une requête AJAX au serveur pour vérifier l'existence de l'email
    function emailExistsInDatabase(email) {
        var existingEmails = ['example@example.com', 'test@test.com'];
        return existingEmails.includes(email);
    }
</script>
</body>
</html>
