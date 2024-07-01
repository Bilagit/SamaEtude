<div class="container content">
    <div class="row gutters">
        <div class="col-lg-12 col-md-4 col-sm-12">
            <div class="plan-card plan-one">
                <div class="pricing-header">
                    <h4 class="plan-title">
                        @foreach ($exercices as $exercice)
                        @if ($exercice->idExo == $exo->id)
                        {{$exo->titre}}
                        @endif
                        @endforeach
                    </h4>
                    <div class="plan-cost">17/20</div>
                    <div class="plan-save">
                        @foreach ($exercices as $exercice)
                        @foreach ($cours as $cour)
                        @foreach ($categories as $categorie)
                        @if ($exercice->idExo == $exo->id && $exo->idCours == $cour->id && $cour->idCategorie == $categorie->id)
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
                        @if ($exercice->idExo == $exo->id && $exo->idProfesseur == $prof->id && $prof->idUser == $user->id)
                        {{$user->first_name}} {{$user->name}}
                        @endif
                        @endforeach
                        @endforeach
                        @endforeach
                    </li>
                    <li>Cours: 
                        @foreach ($exercices as $exercice)
                        @foreach ($cours as $cour)
                        @if ($exercice->idExo == $exo->id && $exo->idCours == $cour->id)
                        {{$cour->nom}}
                        @endif
                        @endforeach
                        @endforeach
                    </li>
                </ul>
                <div class="plan-footer">
                    @foreach ($exercices as $exercice)     
                    @if ($exercice->idExo == $exo->id)                        
                    <a href="#" class="btn btn-info btn-lg btn-rounded" data-toggle="modal" data-target="#pdfModal" data-pdf="{{ asset('storage/' . $exercice->contenu) }}">
                        <img src="{{asset('img/eye.svg')}}" width="100%" alt="">
                    </a>
                    <a href="#" class="btn btn-warning btn-lg btn-rounded" data-toggle="modal" data-target="#editModal{{ $exercice->id }}" data-id="{{ $exercice->id }}">
                        <img src="{{asset('img/info-circle.svg')}}" width="100%" alt="">
                    </a>
                    <a href="#" class="btn btn-danger btn-lg btn-rounded" data-toggle="modal" data-target="#deleteModal{{ $exercice->id }}">
                        <img src="{{asset('img/trash-can.svg')}}" width="100%" alt="">
                    </a>
                    @endif                   
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Modal for Delete Confirmation -->
        @foreach ($exercices as $exercice)
        <div class="modal fade" id="deleteModal{{ $exercice->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $exercice->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel{{ $exercice->id }}">Confirmation de la suppression</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer cet exercice soumis ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <form method="POST" action="{{ route('etudiant.suppexo', $exercice->id) }}">
                            @csrf
                            @method('POST')
                            <input type="hidden" name="id" value="{{ $exercice->id }}" id="id" >
                            <input type="hidden" name="idExo" value="{{ $exo->id }}" id="idExo" >
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        <!-- Modal for PDF View -->
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
        @foreach ($exercices as $exercice)
        <div class="modal fade" id="editModal{{ $exercice->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $exercice->id }}" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel{{ $exercice->id }}">Modifier Exercice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm{{ $exercice->id }}" method="POST" action="{{ route('etudiant.modifexos', $exercice->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="idExo" value="{{ $exo->id }}" id="idExo" >
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
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    $('#pdfModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var pdfUrl = button.data('pdf');
        var modal = $(this);
        modal.find('#pdfFrame').attr('src', pdfUrl);
    });
});
</script>
