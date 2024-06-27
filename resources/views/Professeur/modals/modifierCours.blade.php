<div class="modal fade" id="editCourseModal{{ $cour->id }}" tabindex="-1"
                            aria-labelledby="editCourseModalLabel{{ $cour->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-custom">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editCourseModalLabel{{ $cour->id }}">
                                            Modifier le
                                            cours</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="contact1-form validate-form"
                                            action="{{ route('professeur.updatecours', $cour->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <span class="contact1-form-title">Modifier le cours</span>

                                            <div class="wrap-input1 validate-input"
                                                data-validate="Le nom du cours est requis">
                                                <input class="input1" type="text" name="nom"
                                                    placeholder="Nom du cours" value="{{ $cour->nom }}">
                                                <span class="shadow-input1"></span>
                                            </div>

                                            <div class="wrap-input1 validate-input"
                                                data-validate="La description du cours est requise">
                                                <textarea class="input1" name="description"
                                                    placeholder="Description du cours">{{ $cour->description }}</textarea>
                                                <span class="shadow-input1"></span>
                                            </div>

                                            <div class="wrap-input1 validate-input"
                                                data-validate="Sélectionnez un fichier (PDF, vidéo)">
                                                <label class="input1-file">
                                                    <input type="file" name="file" class="input1-file-input"
                                                        accept=".pdf,.mp4,.avi,.mov"
                                                        onchange="updateFileName(this)">
                                                    <span class="input1-file-choose">Choisir un
                                                        fichier</span>
                                                    <span class="input1-file-selected">Aucun fichier
                                                        sélectionné</span>
                                                </label>
                                                <span class="shadow-input1"></span>
                                            </div>

                                            <script>
                                            // Fonction pour pré-remplir le nom du fichier sélectionné s'il existe déjà
                                            document.addEventListener('DOMContentLoaded', function() {
                                                var fileInput = document.querySelector(
                                                    'input[name="file"]');
                                                var fileSelectedText = fileInput.parentNode
                                                    .querySelector(
                                                        '.input1-file-selected');

                                                fileInput.addEventListener('change', function() {
                                                    updateFileName(this);
                                                });

                                                // Vérifie si un fichier est déjà sélectionné et pré-remplit le champ
                                                if (fileInput.files.length > 0) {
                                                    var fileName = fileInput.files[0].name;
                                                    fileSelectedText.textContent = fileName;
                                                }
                                            });

                                            function updateFileName(input) {
                                                var fileSelectedText = input.parentNode.querySelector(
                                                    '.input1-file-selected');
                                                var fileName = input.files[0].name;

                                                if (fileName) {
                                                    fileSelectedText.textContent = fileName;
                                                } else {
                                                    fileSelectedText.textContent =
                                                        'Aucun fichier sélectionné';
                                                }
                                            }
                                            </script>

                                            <div class="wrap-input1 validate-input"
                                                data-validate="Sélectionnez une catégorie">
                                                <select class="input1" name="idCategorie" required>
                                                    <option value="" disabled>Choisissez une catégorie
                                                    </option>
                                                    @foreach ($categories as $categorie)
                                                    <option value="{{ $categorie->id }}"
                                                        {{ $categorie->id === $cour->idCategorie ? 'selected' : '' }}>
                                                        {{ $categorie->nom }}</option>
                                                    @endforeach
                                                </select>
                                                <span class="shadow-input1"></span>
                                            </div>

                                            <div class="container-contact1-form-btn">
                                                <button type="submit" class="contact1-form-btn">
                                                    <span>Enregistrer les modifications <i
                                                            class="fa fa-long-arrow-right"
                                                            aria-hidden="true"></i></span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>