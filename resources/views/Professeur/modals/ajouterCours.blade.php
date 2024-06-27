<div class="modal fade" id="addCourseModal" tabindex="-1" aria-labelledby="addCourseModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-custom">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCourseModalLabel">Ajouter un cours</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form for adding a course -->
                    <form class="contact1-form validate-form" action="{{ route('professeur.ajoutercours') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <span class="contact1-form-title">Ajouter un cours</span>

                        <div class="wrap-input1 validate-input" data-validate="Le nom du cours est requis">
                            <input class="input1" type="text" name="nom" placeholder="Nom du cours">
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="La description du cours est requise">
                            <textarea class="input1" name="description" placeholder="Description du cours"></textarea>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="wrap-input1 validate-input" data-validate="Sélectionnez un fichier (PDF, vidéo)">
                            <label class="input1-file">
                                <input type="file" name="file" class="input1-file-input" accept=".pdf,.mp4,.avi,.mov" onchange="updateFileName(this)">
                                <span class="input1-file-choose">Choisir un fichier</span>
                                <span class="input1-file-selected">Aucun fichier sélectionné</span>
                            </label>
                            <span class="shadow-input1"></span>
                        </div>

                        <script>
                            function updateFileName(input) {
                                var fileName = input.files[0].name;
                                var fileSelectedText = input.parentNode.querySelector('.input1-file-selected');
                                if (fileName) {
                                    fileSelectedText.textContent = fileName;
                                } else {
                                    fileSelectedText.textContent = 'Aucun fichier sélectionné';
                                }
                            }
                        </script>

                        <div class="wrap-input1 validate-input" data-validate="Sélectionnez une catégorie">
                            <select class="input1" name="idCategorie" required>
                                <option value="" disabled selected>Choisissez une catégorie</option>
                                @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                                @endforeach
                            </select>
                            <span class="shadow-input1"></span>
                        </div>

                        <div class="container-contact1-form-btn">
                            <button type="submit" class="contact1-form-btn">
                                <span>Ajouter le cours <i class="fa fa-long-arrow-right" aria-hidden="true"></i></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    