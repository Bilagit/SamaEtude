@extends('layouts.navbar')

@section('content')
<br>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />

<style>
body {
    background: #f5f5f5;
    margin-top: 20px;
}
.content {
    margin-top: 40px;
}

.plan-one {
    margin: 0 0 20px 0;
    width: 100%;
    position: relative;
}

.plan-card {
    background: #fff;
    margin-bottom: 30px;
    transition: .5s;
    border: 0;
    border-radius: .55rem;
    position: relative;
    width: 100%;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.5);
}

.plan-one .pricing-header {
    padding: 0;
    margin-bottom: 0;
    text-align: center;
}

.plan-one .pricing-header .plan-title {
    -webkit-border-radius: 10px 10px 0px 0px;
    -moz-border-radius: 10px 10px 0px 0px;
    border-radius: 10px 10px 0px 0px;
    font-size: 1.2rem;
    color: #ffffff;
    padding: 10px 0;
    font-weight: 600;
    background: #5a99ee;
    margin: 0;
}

.plan-one .pricing-header .plan-cost {
    color: #ffffff;
    background: #71a7f0;
    padding: 15px 0;
    font-size: 2.5rem;
    font-weight: 700;
}

.plan-one .pricing-header .plan-save {
    color: #ffffff;
    background: #84b3f2;
    padding: 10px 0;
    font-size: 1rem;
    font-weight: 700;
}

.plan-one .pricing-header.green .plan-title {
    background: #47BCC7;
}

.plan-one .pricing-header.green .plan-cost {
    background: #5bc3cd;
}

.plan-one .pricing-header.green .plan-save {
    background: #6ac9d2;
}

.plan-one .pricing-header.orange .plan-title {
    background: #fc8165;
}

.plan-one .pricing-header.orange .plan-cost {
    background: #fd967e;
}

.plan-one .pricing-header.orange .plan-save {
    background: #fdaa97;
}

.plan-one .plan-features {
    border: 1px solid #e6ecf3;
    border-top: 0;
    border-bottom: 0;
    padding: 0;
    margin: 0;
    text-align: left;
}

.plan-one .plan-features li {
    padding: 10px 15px 10px 40px;
    margin: 5px 0;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    position: relative;
    border-bottom: 1px solid #e6ecf3;
    line-height: 100%;
}

.plan-one .plan-footer {
    border: 1px solid #e6ecf3;
    border-top: 0;
    background: #ffffff;
    -webkit-border-radius: 0 0 10px 10px;
    -moz-border-radius: 0 0 10px 10px;
    border-radius: 0 0 10px 10px;
    text-align: center;
    padding: 10px 0 30px 0;
}

@media (max-width: 767px) {
    .plan-one .pricing-header {
        text-align: center;
    }

    .plan-one .pricing-header i {
        display: block;
        float: none;
        margin-bottom: 20px;
    }
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

.modal-header-info {
    color: #fff;
    padding: 9px 15px;
    border-bottom: 1px solid #eee;
    background-color: #5bc0de;
    -webkit-border-top-left-radius: 5px;
    -webkit-border-top-right-radius: 5px;
    -moz-border-radius-topleft: 5px;
    -moz-border-radius-topright: 5px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
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

.project-info-box p {
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #d5dadb;
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
</style>
<div class="container">
@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h5>Description de l'Exercice</h5>
                <p class="mb-0">{{ $exo->description }}</p>
            </div>

            <div class="project-info-box">
                <p><b>Nom de l'Exercice:</b> {{ $exo->titre }}</p>
                <p><b>Professeur:</b> {{ Auth::user()->first_name }} {{ Auth::user()->name }}</p>
                <p><b>Date:</b> {{ $exo->created_at }}</p>
                <p><b>Dernière modification:</b> {{ $exo->updated_at }}</p>
                <p class="mb-0"><b>Cours:</b>
                    @foreach ($cours as $cour)
                    @if ($cour->id === $exo->idCours)
                    {{ $cour->nom }}
                    @endif
                    @endforeach
                </p>
                <div class="mt-4">
                    <b>Lire le cours associé à cette exercice :</b>
                    @foreach ($cours as $cour)
                    @if ($cour->id === $exo->idCours)
                    <a href="{{ url('contenu/' .$exo->idCours) }}">
                        <div class="card">
                        @foreach ($categories as $categorie)
                        @if ($categorie->id == $cour->idCategorie)
                            <img src="{{ asset('storage/' . $categorie->image) }}" width="100%" height="225" alt="Image de {{ $categorie->nom }}">
                        @endif
                    @endforeach                            <div class="card-body">
                                <h5 class="card-title">{{ $cour->nom }}</h5>
                                <p class="card-text">{{ $cour->description }}</p>
                            </div>
                        </div>
                    </a>
                    @endif
                    @endforeach
                </div>
            </div>
            @php
            if($exercices != null)
            $exerciceSoumis = $exercices->where('idExo', $exo->id)->first();
            else{
                $exerciceSoumis = null;
            }
            @endphp
            @if($exerciceSoumis)
            <div class="project-info-box">
                <p><b>Exercice déjà soumis:</b></p>
                @include('Professeur.modals.Soumis')
            </div>
            @endif
        </div>

        <div class="col-md-7">
            @if (Str::endsWith($exo->contenu, '.pdf'))
            <embed src="{{ asset('storage/' . $exo->contenu) }}" type="application/pdf" width="100%" height="600px" />
            @elseif (Str::endsWith($exo->contenu, '.mp4') || Str::endsWith($exo->contenu, '.avi') || Str::endsWith($exo->contenu, '.mkv'))
            <video width="100%" height="auto" controls>
                <source src="{{ asset('storage/' . $exo->contenu) }}" type="video/mp4">
                Le navigateur ne peut pas prendre en charge la vidéo.
            </video>
            @else
            <p>Format de fichier non pris en charge</p>
            @endif

            <div class="project-info-box">
                <div class="col-md-14">
                    <p><b>Exercices Similaires:</b></p>
                    <ul>
                        @foreach ($exos as $item)
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
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td><img src="{{ asset('img/téléchargement.png') }}" class="rounded" width="70%" height="40"
                                            alt=""></td>
                                    <td>{{ $item->titre }}</td>
                                    <td>@mdo</td>
                                    <td><a class="btn btn-success"
                                            href="{{ route('professeur.contenuExo', ['id' => $item->id]) }}">Consulter</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        @endforeach
                    </ul>
                </div>
            </div>

            @if (Auth::user()->role === 'etudiant')
            <div class="project-info-box">
                <div class="modal-header modal-header-info">
                    <h4 class="modal-title"><i class="fa fa-file-alt" style="color: white;"></i> Soummettre Exercice
                    </h4>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="h6">Exercice</h3>
                        @php
                        if($exercices != null)
                        $exerciceSoumis = $exercices->where('idExo', $exo->id)->first();
                        else{
                            $exerciceSoumis = null;
                        }
                        @endphp
                        @if($exerciceSoumis)
                        <div class="alert alert-warning">
                            <p>Vous avez déjà soumis cet exercice.</p>
                        </div>
                        @else
                        <form method="POST" action="{{ route('etudiant.soumettre') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="idExo" value="{{ $exo->id }}">
                            <input class="form-control mb-3" type="file" name="file" required>
                            <button type="submit" class="btn btn-info">Soumettre</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
