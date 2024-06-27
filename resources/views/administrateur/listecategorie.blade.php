@extends('layouts.sidebare')

@section('content')
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
                                <h2>Gestion des <b>Catégories</b></h2>
                            </div>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategorieModal" style="margin-left: 520px; background:#00e68a;">
                                    <i class="fas fa-plus"></i> Ajouter une Catégorie
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="addCategorieModal" tabindex="-1" role="dialog" aria-labelledby="addCategorieModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addCategorieModalLabel">Ajouter une Catégorie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('admin.addcategorie') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="nom">Nom de la Catégorie</label>
                                            <input type="text" class="form-control" id="nom" name="nom" required>
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

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Nombre de Cours</th>
                            <th>Date de création</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->id }}</td>
                                <td>{{ $categorie->nom }}</td>
                                <td>{{$categorie->cours_count}}</td>
                                <td>{{ $categorie->created_at }}</td>
                                <td>
                                    <!-- Modifier Button with Font Awesome -->
                                    <button class="btn btn-warning" data-toggle="modal" data-target="#editCategorieModal{{ $categorie->id }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>

                                    <!-- Supprimer Button with Font Awesome -->
                                    <form action="{{ route('admin.deletecategorie', $categorie->id) }}" method="GET" class="d-inline">
                                        @csrf
                                        @method('GET')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Modal de modification de catégorie -->
                            <div class="modal fade" id="editCategorieModal{{ $categorie->id }}" tabindex="-1" role="dialog" aria-labelledby="editCategorieModalLabel{{ $categorie->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editCategorieModalLabel{{ $categorie->id }}">Modifier la Catégorie</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('admin.updatecategorie', $categorie->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="nom">Nom de la Catégorie</label>
                                                    <input type="text" class="form-control" id="nom" name="nom" value="{{ $categorie->nom }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                                <button type="submit" class="btn btn-primary">Enregistrer</button>
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
@endsection
