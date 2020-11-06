<!--SECTIONS-->
<div id="selectionStep" class="d-none">
    <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
        <input type="text" name="" id="projNameEditor" class="d-none">
        <h2 class="display-5 ml-3" id="projName"></h2>
        <button class="badge badge-secondary mx-2 my-4" id="projNameBadge">Modifier</button>
    </div>
    <div id="lastSteps" class="container my-0">
        <div class="row my-3">
            <div class="col-12 col-md-8  px-2 bg-light  border text-left" id="originalUserText"></div>
            <div class="col-12 col-md-3">
                <p class="font-weight-bold mx-auto">
                    Sélectionnez chaque portion de texte que vous souhaitez adapter.
                </p>
                <ul class="mx-3 p-2 list-unstyled w-100" id="toModify"></ul>
                <p class="font-weight-bold mx-auto">
                    Lorsque chaque élément à adapter figure dans la liste, cliquez ci-dessous
                </p>
                <button class="btn text-kover align-self-end font-weight-bold border rounded mt-4 h1 w-100"
                    data-toggle="modal" data-target="#howManyVersions" id="goToEditionButton">
                    EDITER LES SELECTIONS
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg details" id="howManyVersions" tabindex="-1" role="dialog"
            aria-labelledby="howManyTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-kover" id="howManyTitle">
                            Nombre de versions
                        </h5>
                    </div>
                    <div class="modal-body">
                        <p>Combien de versions différentes souhaitez-vous générer ?</p>
                        <input type="number" name="howManyLetters" id="howManyLetters" placeholder="1" min="1" max="5"
                            value="1" step="1" class="my-3">
                    </div>
                    <div class="modal-footer">
                        <button type="button bg-kover" class="btn btn-primary" id="textEditSubmit"
                            data-dismiss="modal">Continuer</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>