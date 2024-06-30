@extends('layouts.navbar')

@section('content')
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<style>
body {
    background: #f5f5f5;
    margin-top: 20px;
}

.project {
    margin: 15px 0;
}

.no-gutter .project {
    margin: 0 !important;
    padding: 0 !important;
}

.has-spacer {
    margin-left: 30px;
    margin-right: 30px;
    margin-bottom: 30px;
}

.has-spacer-extra-space {
    margin-left: 30px;
    margin-right: 30px;
    margin-bottom: 30px;
}

.has-side-spacer {
    margin-left: 30px;
    margin-right: 30px;
}

.project-title {
    font-size: 1.25rem;
}

.project-skill {
    font-size: 0.9rem;
    font-weight: 400;
    letter-spacing: 0.06rem;
}

.project-info-box {
    margin: 15px 0;
    background-color: #fff;
    padding: 30px 40px;
    border-radius: 5px;
}

.project-info-box p {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #d5dadb;
}

.project-info-box p:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.rounded {
    border-radius: 5px !important;
}

p {
    font-family: "Barlow", sans-serif !important;
    font-weight: 300;
    font-size: 1rem;
    color: #686c6d;
    letter-spacing: 0.03rem;
    margin-bottom: 10px;
}

b,
strong {
    font-weight: 700 !important;
}

.card-body div {
    display: flex;
    align-items: center;
    margin-bottom: 1rem;
    background-color: #f8f9fa;
    padding: 10px;
    border-radius: 5px;
}

.card-body div img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}

.card-body div p {
    margin: 0;
}

.card-body div a {
    margin-left: auto;
    text-decoration: none;
    color: #007bff;
}
.total-like-user-main a {
    display: inline-block;
    margin: 0 -17px 0 0;
}
.total-like {
    border: 1px solid;
    border-radius: 50px;
    display: inline-block;
    font-weight: 500;
    height: 34px;
    line-height: 33px;
    padding: 0 13px;
    vertical-align: top;
}
.restaurant-detailed-ratings-and-reviews hr {
    margin: 0 -24px;
}
.graph-star-rating-header .star-rating {
    font-size: 17px;
}
.progress {
    background: #f2f4f8 none repeat scroll 0 0;
    border-radius: 0;
    height: 30px;
}
.rating-list {
    display: inline-flex;
    margin-bottom: 15px;
    width: 100%;
}
.rating-list-left {
    height: 16px;
    line-height: 29px;
    width: 10%;
}
.rating-list-center {
    width: 80%;
}
.rating-list-right {
    line-height: 29px;
    text-align: right;
    width: 10%;
}
.restaurant-slider-pics {
    bottom: 0;
    font-size: 12px;
    left: 0;
    z-index: 999;
    padding: 0 10px;
}
.restaurant-slider-view-all {
    bottom: 15px;
    right: 15px;
    z-index: 999;
}
.offer-dedicated-nav .nav-link.active,
.offer-dedicated-nav .nav-link:hover,
.offer-dedicated-nav .nav-link:focus {
    border-color: #3868fb;
    color: #3868fb;
}
.offer-dedicated-nav .nav-link {
    border-bottom: 2px solid #fff;
    color: #000000;
    padding: 16px 0;
    font-weight: 600;
}
.offer-dedicated-nav .nav-item {
    margin: 0 37px 0 0;
}
.restaurant-detailed-action-btn {
    margin-top: 12px;
}
.restaurant-detailed-header-right .btn-success {
    border-radius: 3px;
    height: 45px;
    margin: -18px 0 18px;
    min-width: 130px;
    padding: 7px;
}
.text-black {
    color: #000000;
}
.icon-overlap {
    bottom: -23px;
    font-size: 74px;
    opacity: 0.23;
    position: absolute;
    right: -32px;
}
.menu-list img {
    width: 41px;
    height: 41px;
    object-fit: cover;
}
.restaurant-detailed-header-left img {
    width: 88px;
    height: 88px;
    border-radius: 3px;
    object-fit: cover;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
}
.reviews-members .media .mr-3 {
    width: 56px;
    height: 56px;
    object-fit: cover;
}
.rounded-pill {
    border-radius: 50rem!important;
}
.total-like-user {
    border: 2px solid #fff;
    height: 34px;
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075)!important;
    width: 34px;
}
.total-like-user-main a {
    display: inline-block;
    margin: 0 -17px 0 0;
}
.total-like {
    border: 1px solid;
    border-radius: 50px;
    display: inline-block;
    font-weight: 500;
    height: 34px;
    line-height: 33px;
    padding: 0 13px;
    vertical-align: top;
}
.restaurant-detailed-ratings-and-reviews hr {
    margin: 0 -24px;
}
.graph-star-rating-header .star-rating {
    font-size: 17px;
}
.progress {
    background: #f2f4f8 none repeat scroll 0 0;
    border-radius: 0;
    height: 30px;
}
.rating-list {
    display: inline-flex;
    margin-bottom: 15px;
    width: 100%;
}
.rating-list-left {
    height: 16px;
    line-height: 29px;
    width: 10%;
}
.rating-list-center {
    width: 80%;
}
.rating-list-right {
    line-height: 29px;
    text-align: right;
    width: 10%;
}
.restaurant-slider-pics {
    bottom: 0;
    font-size: 12px;
    left: 0;
    z-index: 999;
    padding: 0 10px;
}
.restaurant-slider-view-all {
    bottom: 15px;
    right: 15px;
    z-index: 999;
}

.progress {
    background: #f2f4f8 none repeat scroll 0 0;
    border-radius: 0;
    height: 30px;
}


</style>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h5>Description du Cours</h5>
                <p class="mb-0">{{ $cour->description }}</p>
            </div><!-- / project-info-box -->

            <div class="project-info-box">
                <p><b>Nom du Cours:</b> {{ $cour->nom }}</p>
                <p><b>Professeur:</b> {{ Auth::user()->first_name }} {{ Auth::user()->name }}</p>
                <p><b>Date:</b> {{ $cour->created_at }}</p>
                <p><b>Dernière modification:</b> {{ $cour->updated_at }}</p>
                <p class="mb-0"><b>Catégorie:</b>
                    @foreach ($categories as $categorie)
                    @if ($categorie->id === $cour->idCategorie)
                    {{ $categorie->nom }}
                    @endif
                    @endforeach
                </p>
            </div>

            <div class="card ccard radius-t-0 h-50">
                <div class="position-tl w-102 border-t-3 brc-primary-tp3 ml-n1px mt-n1px"></div>
                <div class="card-header pb-3 brc-secondary-l3">
                    <h5 class="card-title mb-2 mb-md-0 text-dark-m3">Cours Similaires</h5>
                </div>

                <div class="card-body pt-2 pb-1">
                    @php
                    $foundCourses = false;
                    @endphp
                    @foreach ($cours as $coure)
                    @if ($coure->idCategorie == $cour->idCategorie && $coure->id != $cour->id)
                    <div>
                        <img src="{{ asset('img/java.webp') }}" alt="..." class="rounded">
                        <p>{{ $coure->nom }}</p>
                        <a href="{{ route('professeur.contenu', ['id' => $coure->id]) }}">Voir le cours</a>
                    </div>
                    @php
                    $foundCourses = true;
                    @endphp
                    @endif
                    @endforeach
                    @if (!$foundCourses)
                    <p>Aucun autre cours n'est disponible dans cette catégorie.</p>
                    @endif
                </div>
            </div>
        </div><!-- / column -->

        <div class="col-md-7">
            @if (Str::endsWith($cour->file_path, '.pdf'))
            <embed src="{{ asset('storage/' . $cour->file_path) }}" type="application/pdf" width="100%"
                height="600px" />
            @elseif (Str::endsWith($cour->file_path, '.mp4') || Str::endsWith($cour->file_path, '.avi') ||
            Str::endsWith($cour->file_path, '.mkv'))
            <video width="100%" height="auto" controls>
                <source src="{{ asset('storage/' . $cour->file_path) }}" type="video/mp4">
                Le navigateur ne peut pas encore en charge la vidéo.
            </video>
            @else
            <p>Format de fichier non pris en charge</p>
            @endif
            <div class="project-info-box">
                <p><b>Exercices sur le cours :</b></p>
                <ul>
                    @php
                    $foundExercises = false;
                    @endphp
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"></th>
                                <th scope="col">Titre</th>
                                <th scope="col">Instituteur</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($exos as $exo)
                            @if ($exo->idCours == $cour->id)
                            <tr>
                                <th scope="row">{{ $exo->id }}</th>
                                <td><img src="{{ asset('img/téléchargement.png') }}" class="rounded" width="100%"
                                        height="40" alt=""></td>
                                <td>{{ $exo->titre }}</td>
                                <td>
                                    Pr. @foreach ($profs as $professeurs)
                                    @if ($professeurs->id == $cour->idProfesseur)
                                    @foreach ($users as $user)
                                    @if ($user->id == $professeurs->idUser)
                                    {{ $user->first_name }} {{ $user->name }}
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                                </td>
                                <td><a class="btn btn-success"
                                        href="{{ route('professeur.contenuExo', ['id' => $exo->id]) }}">Consulter</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                    @foreach ($exos as $exo)
                    @if ($exo->idCours == $cour->id)
                    @php
                    $foundExercises = true;
                    @endphp
                    @endif
                    @endforeach
                    @if (!$foundExercises)
                    <p>Aucun exercice n'est disponible pour ce cours.</p>
                    @endif
                </ul>
            </div>
        </div><!-- / column -->
    </div><!-- / row -->
    <br>
    <div class="bg-white rounded shadow-sm p-4 mb-4 clearfix graph-star-rating">
                    <h5 class="mb-0 mb-4">Avis</h5>
                    <div class="graph-star-rating-header">
                        <div class="star-rating">
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating active"></i></a>
                            <a href="#"><i class="icofont-ui-rating"></i></a> <b class="text-black ml-2">334 Avis</b>
                        </div>
                        <p class="text-black mb-4 mt-2">Moyenne 3.5 sur 5</p>
                    </div>
                    <div class="graph-star-rating-body">
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                5 Etoiles
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: 56%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">56%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                4 Etoiles
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: 23%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">23%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                3 Etoiles
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: 11%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">11%</div>
                        </div>
                        <div class="rating-list">
                            <div class="rating-list-left text-black">
                                2 Etoiles
                            </div>
                            <div class="rating-list-center">
                                <div class="progress">
                                    <div style="width: 2%" aria-valuemax="5" aria-valuemin="0" aria-valuenow="5" role="progressbar" class="progress-bar bg-primary">
                                        <span class="sr-only">80% Complete (danger)</span>
                                    </div>
                                </div>
                            </div>
                            <div class="rating-list-right text-black">02%</div>
                        </div>
                    </div>
                    <div class="graph-star-rating-footer text-center mt-3 mb-3">
                        <button type="button" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#feedbackModal">Evaluer le cours</button>
                    </div>
                </div>
            <!-- Feedback Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" role="dialog" aria-labelledby="feedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="feedbackModalLabel">Rate and Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <div class="star-rating">
                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="review">Review</label>
                        <textarea name="review" id="review" rows="3" class="form-control"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.star-rating {
    display: flex;
    flex-direction: row-reverse;
    font-size: 3em; /* Increase the size of the stars */
    justify-content: center;
    padding: 0.2em;
}

.star-rating input {
    display: none;
}

.star-rating label {
    color: #bbb;
    cursor: pointer;
    padding: 0.1em;
}

.star-rating input:checked~label,
.star-rating label:hover,
.star-rating label:hover~label {
    color: #f2b600;
}
</style>

</div><!-- / container -->
@endsection