<div class="tab-content" id="nav-tabContent">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @foreach ($cours as $cour)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ asset('img/java.webp') }}" class="rounded" width="100%" height="225" alt="">
                <div class="card-body">
                    <h5 class="card-title">
                        {{ $cour->nom }} - 
                        @foreach ($categories as $categorie)
                            @if ($categorie->id == $cour->idCategorie)
                                {{ $categorie->nom }}
                            @endif
                        @endforeach
                    </h5>
                    <p class="card-text">{{ $cour->description }}</p>
                    <p class="card-text"><strong>Professeur:</strong>
                                @foreach ($profs as $professeurs)
                                @if ($professeurs->id == $cour->idProfesseur)
                                @foreach ($users as $user)
                                @if ($user->id == $professeurs->idUser)
                                {{ $user->name }} {{ $user->first_name }}
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                            </p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}" class="btn btn-light">
                                <img src="{{ asset('img/eye.svg') }}" width="16" height="16" alt="">
                            </a>
                        </div>
                        <small class="text-body-secondary">Le
                            {{ $cour->created_at }}</small>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
