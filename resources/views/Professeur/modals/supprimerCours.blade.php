<div class="modal fade" id="confirmDeleteModal{{$cour->id}}" tabindex="-1"
                            aria-labelledby="confirmDeleteModalLabel{{$cour->id}}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmation de
                                            suppression</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Êtes-vous sûr de vouloir supprimer ce cours ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <form action="{{ route('professeur.suppcours' , $cour->id) }}"
                                            method="GET">
                                            @csrf
                                            @method('GET')
                                            <input type="hidden" id="courId" name="cour_id" value="">
                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>