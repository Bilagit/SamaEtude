@extends('layouts.sidebare')

@section('content')
<style>
/* Your existing styles here */

.card {
    margin-bottom: 20px;
    border: 1px solid #e9e9e9;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.card-body {
    display: flex;
    align-items: center;
}

.card-body .media-left {
    margin-right: 12px;
}

.card-body .media-body {
    flex: 1;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-hover-show .btn {
    margin-left: 10px;
}

.avatar {
    border-radius: 50%;
    width: 60px;
    height: 60px;
}

.text-fade {
    color: #999;
}

/* New styles for initials-circle */
.initials-circle {
    border-radius: 50%;
    width: 60px;
    height: 60px;
    text-align: center;
    line-height: 60px;
    font-size: 24px;
    color: white;
    margin-right: 12px;
}

</style>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<div class="p-4 p-md-5 pt-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-xl">
        <div class="row">
            <div class="col-sm-6">
                <h2>Gestion des <b>Professeurs</b></h2>
            </div>

            <div class="col-sm-6">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProfModal"><i
                        class="material-icons">&#xE147;</i>
                    Ajouter un Professeur
                </button>
            </div>
        </div>
        <br>
        <div class="col-md-12">
            @foreach ($profs as $prof)
            <div class="card">
                <div class="media card-body">
                    <div class="media-left pr-12">
                        <!-- Randomly colored initials circle -->
                        <div class="initials-circle" style="background-color: {{ '#' . dechex(rand(0x000000, 0xFFFFFF)) }}">
                            {{ substr($prof->first_name, 0, 1) }}{{ substr($prof->name, 0, 1) }}
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="mb-2">
                            <span class="fs-20 pr-16">{{ $prof->name }} {{ $prof->first_name }}</span>
                        </div>
                        <small class="fs-16 fw-300 ls-1">
                            @foreach ($professeurs as $professeur)
                            @if ($prof->id === $professeur->idUser)
                            {{ $professeur->specialite }}
                            @endif
                            @endforeach
                        </small>
                    </div>
                    <div class="media-right text-right d-none d-md-block">
                        <p class="fs-14 text-fade mb-12"><i class="fa fa-envelope pr-1"></i>
                            {{ $prof->email }}
                        </p>
                        <span class="text-fade"><i class="fa fa-phone pr-1"></i>
                            @foreach ($professeurs as $professeur)
                            @if ($prof->id === $professeur->idUser)
                            {{ $professeur->telephone }}
                            @endif
                            @endforeach
                        </span>
                    </div>
                </div>
                <footer class="card-footer flexbox align-items-center">
                    <div>
                        <strong>Ajouté le :</strong>
                        <span>{{ $prof->created_at->formatLocalized('%d %B %Y') }}</span>
                    </div>
                    <div class="card-hover-show">
                        <a class="btn btn-xs fs-10 btn-bold btn-warning" href="#" data-toggle="modal"
                            data-target="#modal-contact"><img src="{{ asset('img/info-circle.svg') }}" width="100%"
                                alt=""></a>
                        <a class="btn btn-xs fs-10 btn-bold btn-danger" href="#" data-toggle="modal"
                            data-target="#deleteProfModal{{ $prof->id }}"><img src="{{ asset('img/trash-can.svg') }}"
                                alt="" width="20"></a>
                    </div>
                </footer>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteProfModal{{ $prof->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteProfModalLabel{{ $prof->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="deleteProfForm{{ $prof->id }}" method="GET"
                            action="{{ route('admin.suppprof', $prof->id) }}">
                            @csrf
                            @method('GET')
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteProfModalLabel{{ $prof->id }}">Supprimer
                                    Professeur</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Êtes-vous sûr de vouloir supprimer ce professeur ?</p>
                                <p class="text-warning"><small>La suppression est irréversible.</small></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                <button type="submit" class="btn btn-danger">Supprimer</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<div class="modal fade" id="addProfModal" tabindex="-1" role="dialog" aria-labelledby="addProfModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addProfModalLabel">Ajouter un Professeur</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addProfForm" action="{{ route('admin.ajouterprof') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="first_name">Prénom</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Numéro de Téléphone</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>
                    <div class="form-group">
                        <label for="specialite">Spécialité</label>
                        <select class="form-control" id="specialite" name="specialite" required>
                            <option value="" disabled selected>Choisissez une spécialité</option>
                            @foreach ($categories as $categorie)
                            <option value="{{$categorie->nom}}">{{$categorie->nom}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle
.min.js"
integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
new DataTable('#example');
$('#exampleModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
</script>
@endsection