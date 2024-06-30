@extends('layouts.sidebare')

@section('content')
<style>
body {
    background-color: #f8f9fa !important
}

.p-4 {
    padding: 1.5rem !important;
}

.mb-0,
.my-0 {
    margin-bottom: 0 !important;
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
}

/* user-dashboard-info-box */
.user-dashboard-info-box .candidates-list .thumb {
    margin-right: 20px;
}

.user-dashboard-info-box .candidates-list .thumb .avatar-circle {
    width: 80px;
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
}

.user-dashboard-info-box .candidates-list .thumb .avatar-circle .avatar-initials {
    font-size: 24px;
    color: white;
}

.user-dashboard-info-box .title {
    display: flex;
    align-items: center;
    padding: 30px 0;
}

.user-dashboard-info-box .candidates-list td {
    vertical-align: middle;
}

.user-dashboard-info-box td li {
    margin: 0 4px;
}

.user-dashboard-info-box .table thead th {
    border-bottom: none;
}

.table.manage-candidates-top th {
    border: 0;
}

.user-dashboard-info-box .candidate-list-favourite-time .candidate-list-favourite {
    margin-bottom: 10px;
}

.table.manage-candidates-top {
    min-width: 650px;
}

.user-dashboard-info-box .candidate-list-details ul {
    color: #969696;
}

/* Candidate List */
.candidate-list {
    background: #ffffff;
    display: flex;
    border-bottom: 1px solid #eeeeee;
    align-items: center;
    padding: 20px;
    transition: all 0.3s ease-in-out;
}

.candidate-list:hover {
    box-shadow: 0px 0px 34px 4px rgba(33, 37, 41, 0.06);
    position: relative;
    z-index: 99;
}

.candidate-list:hover .candidate-list-favourite {
    color: #e74c3c;
    box-shadow: -1px 4px 10px 1px rgba(24, 111, 201, 0.1);
}

.candidate-list .candidate-list-image {
    margin-right: 25px;
    flex: 0 0 80px;
    border: none;
}

.candidate-list .candidate-list-image img {
    width: 80px;
    height: 80px;
    object-fit: cover;
}

.candidate-list-title {
    margin-bottom: 5px;
}

.candidate-list-details ul {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 0px;
}

.candidate-list-details ul li {
    margin: 5px 10px 5px 0px;
    font-size: 13px;
}

.candidate-list .candidate-list-favourite-time {
    margin-left: auto;
    text-align: center;
    font-size: 13px;
    flex: 0 0 90px;
}

.candidate-list .candidate-list-favourite-time span {
    display: block;
    margin: 0 auto;
}

.candidate-list .candidate-list-favourite-time .candidate-list-favourite {
    display: inline-block;
    position: relative;
    height: 40px;
    width: 40px;
    line-height: 40px;
    border: 1px solid #eeeeee;
    border-radius: 100%;
    text-align: center;
    transition: all 0.3s ease-in-out;
    margin-bottom: 20px;
    font-size: 16px;
    color: #646f79;
}

.candidate-list .candidate-list-favourite-time .candidate-list-favourite:hover {
    background: #ffffff;
    color: #e74c3c;
}

.candidate-banner .candidate-list:hover {
    position: inherit;
    box-shadow: inherit;
    z-index: inherit;
}

.bg-white {
    background-color: #ffffff !important;
}

.p-4 {
    padding: 1.5rem !important;
}

.mb-0,
.my-0 {
    margin-bottom: 0 !important;
}

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
    integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
<div class="container mt-3 mb-4">
    <div class="col-lg-9 mt-4 mt-lg-0">
        <div class="row">
        <div class="col-sm-6">
                <h2>Gestion des <b>Etudiants</b></h2>
            </div>
            <div class="col-md-12">
                <div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
                    <table class="table manage-candidates-top mb-0">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($etudiants as $etudiant)
                            <tr class="candidates-list">
                                <td class="title">
                                    <div class="thumb">
                                        @php
                                        // Générer une couleur aléatoire basée sur l'ID de l'étudiant
                                        $randomColor = '#' . substr(md5($etudiant->id), 0, 6);
                                        @endphp
                                        <div class="avatar-circle" style="background-color: {{$randomColor}};">
                                            <span class="avatar-initials">
                                                {{ strtoupper(substr($etudiant->first_name, 0, 1)) }}{{ strtoupper(substr($etudiant->name, 0, 1)) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="candidate-list-details">
                                        <div class="candidate-list-info">
                                            <div class="candidate-list-title">
                                                <h5 class="mb-0">{{$etudiant->first_name}} {{$etudiant->name}}</h5>
                                            </div>
                                            <div class="candidate-list-option">
                                                <ul class="list-unstyled">
                                                    <li><i class="fa fa-envelope pr-1"></i> {{$etudiant->email}}</li>
                                                    <li><i class="fa fa-phone pr-1"></i>
                                                        @foreach ($users as $user)
                                                        @if ($etudiant->id === $user->idUser)
                                                        {{ $user->phone_number }}
                                                        @endif
                                                        @endforeach
                                                    </li>
                                                    <li><i class="fa fa-graduation-cap"></i>
                                                        @foreach ($users as $user)
                                                        @if ($etudiant->id === $user->idUser)
                                                        {{ $user->level }}
                                                        @endif
                                                        @endforeach
                                                    </li>
                                                </ul>
                                                <small>
                                                    <strong>Ajouté le :</strong>
                                                    <span>{{ $etudiant->created_at->formatLocalized('%d %B %Y') }}</span>
                                                </small>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="candidate-list-favourite-time text-center">
                                    <button class="btn btn-danger delete-btn" data-toggle="modal"
                                        data-target="#confirmDeleteModal{{$etudiant->id}}">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                </td>
                            </tr>
                            <!-- Delete Modal -->
                            <div class="modal fade" id="confirmDeleteModal{{$etudiant->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="confirmDeleteModalLabel{{$etudiant->id}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="confirmDeleteModalLabel{{$etudiant->id}}">
                                                Confirmation de suppression</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Êtes-vous sûr de vouloir supprimer l'étudiant {{$etudiant->name}}
                                            {{$etudiant->first_name}} ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Annuler</button>
                                            <form action="{{ route('admin.suppetudiant', $etudiant->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('GET')
                                                <button type="submit" class="btn btn-danger">Supprimer</button>
                                            </form>
                                        </div>
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
</div>
@endsection