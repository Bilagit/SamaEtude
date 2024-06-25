@extends('layouts.sidebare')

@section('content')
<!-- Page Content  -->
<div id="content" class="p-4 p-md-5 pt-5">
    @if ($message = Session::get('success'))s

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

                            <a href="#" class="btn btn-secondary"><i class="material-icons">&#xE24D;</i>
                                <span>Exporter un excel</span></a>
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
                            <form id="addProfForm" action="{{ route('admin.addprof') }}" method="POST">
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
                                        <input type="text" class="form-control" id="specialite" name="specialite"
                                            required>
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
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Téléphone</th>
                            <th>Spécialité</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="#"><img src="/examples/images/avatar/1.jpg" class="avatar" alt="Avatar">
                                    Michael Holz</a></td>
                            <td>04/10/2013</td>
                            <td>Admin</td>
                            <td>Admin</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                        class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a href="#"><img src="/examples/images/avatar/2.jpg" class="avatar" alt="Avatar"> Paula
                                    Wilson</a></td>
                            <td>05/08/2014</td>
                            <td>Publisher</td>
                            <td>Admin</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                        class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a href="#"><img src="/examples/images/avatar/3.jpg" class="avatar" alt="Avatar">
                                    Antonio Moreno</a></td>
                            <td>11/05/2015</td>
                            <td>Publisher</td>
                            <td>Admin</td>
                            <td><span class="status text-danger">&bull;</span> Suspended</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                        class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a href="#"><img src="/examples/images/avatar/4.jpg" class="avatar" alt="Avatar"> Mary
                                    Saveley</a></td>
                            <td>06/09/2016</td>
                            <td>Reviewer</td>
                            <td>Admin</td>
                            <td><span class="status text-success">&bull;</span> Active</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                        class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a href="#"><img src="/examples/images/avatar/5.jpg" class="avatar" alt="Avatar"> Martin
                                    Sommer</a></td>
                            <td>12/08/2017</td>
                            <td>Moderator</td>
                            <td>Admin</td>
                            <td><span class="status text-warning">&bull;</span> Inactive</td>
                            <td>
                                <a href="#" class="settings" title="Settings" data-toggle="tooltip"><i
                                        class="material-icons">&#xE8B8;</i></a>
                                <a href="#" class="delete" title="Delete" data-toggle="tooltip"><i
                                        class="material-icons">&#xE5C9;</i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="clearfix">
                    <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                    <ul class="pagination">
                        <li class="page-item disabled"><a href="#">Previous</a></li>
                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                        <li class="page-item active"><a href="#" class="page-link">3</a></li>
                        <li class="page-item"><a href="#" class="page-link">4</a></li>
                        <li class="page-item"><a href="#" class="page-link">5</a></li>
                        <li class="page-item"><a href="#" class="page-link">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection