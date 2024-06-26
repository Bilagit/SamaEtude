<style>
    .dot {
        height: 10px;
        width: 10px;
        background-color: #00FF00;
        border-radius: 50%;
        display: inline-block;
        margin-right: 5px; /* Ajoute une marge à droite pour l'espace entre le point et le nom de la catégorie */
    }
</style>

<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Cours</th>
                <th scope="col">Catégorie</th>
                <th scope="col">Instructeur</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cours as $cour)
            <tr>
                <td>
                    <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}">
                        <!-- Affichage de l'image du cours, ajusté pour l'exemple -->
                        @foreach ($categories as $categorie)
                        @if ($categorie->id == $cour->idCategorie)
                            <img src="{{ asset('storage/' . $categorie->image) }}" width="50" height="50" alt="Image de {{ $categorie->nom }}">
                        @endif
                    @endforeach
                        <strong>{{ $cour->nom }}</strong>
                        <br>
                        <small>Ajouté le : {{ $cour->created_at }}</small>
                    </a>
                </td>
                <td>
                    <!-- Affichage du nom de la catégorie avec un point -->
                    <span class="dot"></span>
                    @foreach ($categories as $categorie)
                        @if ($categorie->id == $cour->idCategorie)
                            {{ $categorie->nom }}
                        @endif
                    @endforeach
                </td>
                <td>
                    <!-- Affichage de l'instructeur -->
                    <span class="badge d-flex align-items-center p-1 pe-2 text-success-emphasis bg-success-subtle border border-success-subtle rounded-pill">
                        <img class="rounded-circle me-1" width="32" height="32" src="https://github.com/mdo.png" alt="">
                        Pr.
                        @foreach ($profs as $professeurs)
                            @if ($professeurs->id == $cour->idProfesseur)
                                @foreach ($users as $user)
                                    @if ($user->id == $professeurs->idUser)
                                        {{ $user->first_name }} {{ $user->name }}
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </span>
                </td>
                <td>
                    <!-- Actions (exemple de bouton pour voir le contenu) -->
                    <div class="btn-group">
                        <a href="{{ route('professeur.contenu', ['id' => $cour->id]) }}" class="btn btn-light">
                            <img src="{{ asset('img/eyes.svg') }}" width="16" height="16" alt="">
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
