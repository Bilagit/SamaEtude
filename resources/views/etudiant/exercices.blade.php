@extends('layouts.navbar')

@section('content')
<style>
body {
    background-color: #eee;
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
}</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container content">
    <div class="row gutters">
        @foreach ($exos as $exo)
        <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="plan-card plan-one">
                <div class="pricing-header">
                    <h4 class="plan-title">
                        @foreach ($exercices as $exercice)
                        @if ($exo->idExo == $exercice->id)
                        {{$exercice->titre}}
                        @endif
                        @endforeach
                    </h4>
                    <div class="plan-cost">17/20</div>
                    <div class="plan-save">
                        @foreach ($exercices as $exercice)
                        @foreach ($cours as $cour)
                        @foreach ($categories as $categorie)
                        @if ($exo->idExo == $exercice->id && $exercice->idCours == $cour->id && $cour->idCategorie == $categorie->id)
                        {{$categorie->nom}}
                        @endif
                        @endforeach
                        @endforeach
                        @endforeach
                    </div>
                </div>
                <ul class="plan-features">
                    <li>
                        @foreach ($exercices as $exercice)
                        @foreach ($profs as $prof)
                        @foreach ($users as $user)
                        @if ($exo->idExo == $exercice->id && $exercice->idProfesseur == $prof->id && $prof->idUser == $user->id)
                        {{$user->first_name}} {{$user->name}}
                        @endif
                        @endforeach
                        @endforeach
                        @endforeach
                    </li>
                    <li>Cours: 
                        @foreach ($exercices as $exercice)
                        @foreach ($cours as $cour)
                        @if ($exo->idExo == $exercice->id && $exercice->idCours == $cour->id)
                        {{$cour->nom}}
                        @endif
                        @endforeach
                        @endforeach
                    </li>
                </ul>
                <div class="plan-footer">
                    <a href="#" class="btn btn-info btn-lg btn-rounded" data-toggle="modal" data-target="#pdfModal" data-pdf="{{ asset('storage/' . $exo->contenu) }}">
                        <img src="{{asset('img/eye.svg')}}" width="100%" alt="">
                    </a>
                    <a href="#" class="btn btn-warning btn-lg btn-rounded" data-toggle="modal" data-target="#editModal{{ $exo->id }}" data-id="{{ $exo->id }}">
                        <img src="{{asset('img/info-circle.svg')}}" width="100%" alt="">
                    </a>
                    <a href="#" class="btn btn-danger btn-lg btn-rounded" data-toggle="modal" data-target="#deleteModal{{ $exo->id }}">
                        <img src="{{asset('img/trash-can.svg')}}" width="100%" alt="">
                    </a>
                </div>
            </div>
        </div>

        <!-- Modal for Delete Confirmation -->
        <div class="modal fade" id="deleteModal{{ $exo->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $exo->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $exo->id }}">Confirmation de la suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer cet exercice soumis ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <a href="{{ route('etudiant.suppexo', $exo->id) }}" class="btn btn-danger">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Modal for PDF display -->
<div class="modal fade" id="pdfModal" tabindex="-1" role="dialog" aria-labelledby="pdfModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pdfModalLabel">Exercice PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe id="pdfFrame" src="" width="100%" height="500px"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal for Edit Form -->
@foreach ($exos as $exo)
<div class="modal fade" id="editModal{{ $exo->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $exo->id }}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel{{ $exo->id }}">Modifier Exercice</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editForm{{ $exo->id }}" method="POST" action="{{ route('etudiant.modifexos', $exo->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="idExo" value="{{ $exo->id }}">
            <input class="form-control mb-3" type="file" name="file" required>
            <button type="submit" class="btn btn-info">Modifier</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<script>
    $('#pdfModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var pdfUrl = button.data('pdf'); // Extract info from data-* attributes
        var modal = $(this);
        modal.find('.modal-body #pdfFrame').attr('src', pdfUrl);
    });

    $('#pdfModal').on('hidden.bs.modal', function (e) {
        $(this).find('.modal-body #pdfFrame').attr('src', '');
    });

    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var exoId = button.data('id'); // Extract info from data-* attributes
        var modal = $(this);
        var action = "{{ route('etudiant.modifexos', ':id') }}";
        action = action.replace(':id', exoId);
        modal.find('#editForm' + exoId).attr('action', action);
    });
</script>
@endsection
