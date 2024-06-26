@extends('layouts.sidebare')

@section('content')
<style>
.table-responsive {
    margin: 30px 0;
}

.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
}

.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}

.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}

.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}

.table-title .btn:hover,
.table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}

.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}

.table-title .btn span {
    float: left;
    margin-top: 2px;
}

table.table tr th,
table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}

table.table tr th:first-child {
    width: 60px;
}

table.table tr th:last-child {
    width: 100px;
}

table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}

table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}

table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}

table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}

table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}

table.table td a:hover {
    color: #2196F3;
}

table.table td a.settings {
    color: #2196F3;
}

table.table td a.delete {
    color: #F44336;
}

table.table td i {
    font-size: 19px;
}

table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}

.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}

.text-success {
    color: #10c469;
}

.text-info {
    color: #62c9e8;
}

.text-warning {
    color: #FFC107;
}

.text-danger {
    color: #ff5b5b;
}

.pagination {
    float: right;
    margin: 0 0 5px;
}

.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}

.pagination li a:hover {
    color: #666;
}

.pagination li.active a,
.pagination li.active a.page-link {
    background: #03A9F4;
}

.pagination li.active a:hover {
    background: #0397d6;
}

.pagination li.disabled i {
    color: #ccc;
}

.pagination li i {
    font-size: 16px;
    padding-top: 6px
}

.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}

.custom-green-background {
    background-color: #D3D3D3;
    color: black;
    padding: 10px;
    border-radius: 5px;
}

.custom-list-item {
    font-size: 16px;
    /* Augmentez la taille du texte */
    padding: 20px 15px;
    /* Augmentez l'espacement intérieur */
}
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- Page Content  -->
<div class="p-4 p-md-5 pt-5">
    @if ($message = Session::get('success'))

    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title custom-green-background">
                    <div class="row">
                        <div class="col-sm-5">
                            <h2>Gestion des <b>Professeurs</b></h2>
                        </div>

                        <div class="col-sm-7">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addProfModal"><i class="material-icons">&#xE147;</i>
                                Ajouter un Professeur
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="addProfModal" tabindex="-1" role="dialog"
                    aria-labelledby="addProfModalLabel" aria-hidden="true">
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
                                        <input type="text" class="form-control" id="first_name" name="first_name"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Mot de Passe</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Numéro de Téléphone</label>
                                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                                            required>
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

                <table id="example" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($profs as $prof)
                        <tr>
                            <td>{{$prof->id}}</td>
                            <td>{{$prof->name}}</td>
                            <td>{{$prof->first_name}}</td>
                            <td>{{$prof->email}}</td>
                            <td>
                                <a href="#" class="delete" data-id="{{ $prof->id }}" data-toggle="modal" data-target="#deleteProfModal{{ $prof->id }}"><i class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <div class="modal fade" id="deleteProfModal{{ $prof->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteProfModalLabel{{ $prof->id }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <form id="deleteProfForm{{ $prof->id }}" method="GET" action="{{ route('admin.dropprof', $prof->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteProfModalLabel{{ $prof->id }}">Supprimer Professeur</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Êtes-vous sûr de vouloir supprimer ce professeur ?</p>
                                    <p class="text-warning"><small>Cette action ne peut pas être annulée.</small></p>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
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