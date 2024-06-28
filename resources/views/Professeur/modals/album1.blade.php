<nav>
    <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
        @foreach ($categories as $index => $categorie)
        <button class="nav-link {{ $index === 0 ? 'active' : '' }}" id="nav-{{ $categorie->id }}-tab"
            data-bs-toggle="tab" data-bs-target="#nav-{{ $categorie->id }}" type="button" role="tab"
            aria-controls="nav-{{ $categorie->id }}" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
            {{ $categorie->nom }}
        </button>
        @endforeach
    </div>

    <div class="tab-content" id="nav-tabContent">
        @foreach ($categories as $index => $categorie)
        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="nav-{{ $categorie->id }}" role="tabpanel"
            aria-labelledby="nav-{{ $categorie->id }}-tab">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($mescours as $cour)
                @if ($cour->idCategorie == $categorie->id)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/java.webp') }}" class="rounded" width="100%" height="225" alt="">
                        <div class="card-body">
                            <p class="card-text"><strong>{{ $cour->nom }}</strong></p>
                            <p class="card-text">{{ $cour->description }}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}"
                                        class="btn btn-light">
                                        <img src="{{ asset('img/eye.svg') }}" width="16" height="16" alt="">
                                    </a>
                                    <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#editCourseModal{{ $cour->id }}">
                                        <img src="{{ asset('img/pencil.svg') }}" width="16" height="16" alt="">
                                    </button>
                                    <button type="button" class="btn btn-danger" data-cour-id="{{ $cour->id }}"
                                        data-bs-toggle="modal" data-bs-target="#confirmDeleteModal{{$cour->id}}"><img
                                            src="{{ asset('img/trash.svg') }}" width="16" height="16" alt=""></button>
                                </div>
                                <small class="text-body-secondary">Le {{ $cour->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modale de modification -->
                @include('Professeur.modals.modifierCours')
                @include('Professeur.modals.supprimerCours')
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</nav>