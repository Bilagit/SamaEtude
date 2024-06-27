<style>
body {
    background: #f5f5f5;
    margin-top: 20px;
}

/*------- portfolio -------*/
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
@extends('layouts.navbar')

@section('content')
<br>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css'>

<script src='https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js'></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="project-info-box mt-0">
                <h5>Description de l'Exercice</h5>
                <p class="mb-0">{{ $exo->description }}</p>
            </div><!-- / project-info-box -->

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

            </div><!-- / project-info-box -->

        </div><!-- / column -->

        
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
                <div class="row">
                    <div class="col-md-6">
                        <p><b>Cours:</b></p>
                        @foreach ($cours as $cour)
                            @if ($cour->id === $exo->idCours)
                                <p>{{ $cour->nom }}</p>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-6">
                        <p><b>Exercices Similaires:</b></p>
                        <ul>
                            @foreach ($exos as $item)
                                <p><b>Nom:</b> <a href="{{ route('professeur.contenuExo', ['id' => $item->id]) }}">{{ $item->titre }}</a></p>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div><!-- / project-info-box -->
        </div><!-- / column -->
    </div>
</div>
@endsection
