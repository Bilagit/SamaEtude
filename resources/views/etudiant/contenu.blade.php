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
</div><!-- / container -->
@endsection