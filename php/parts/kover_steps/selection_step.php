<!--SECTIONS-->
<div id="selectionStep" class="d-none">
    <button id="backToTextEdit" class="btn bg-snow text-blue bg-hover-blue rounded ml-sm-3 ml-lg-5">
        <span>
            <img src="./assets/icons/backarrow.svg" alt="edit">
        </span>
        <span>Retour à la composition</span>
    </button>
    <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
        <input type="text" name="" id="projNameEditor" class="d-none">
        <h5 class="display-5 ml-3" id="projName"></h5>
        <button class="badge bg-snow mx-2 my-4" id="projNameBadge">
            <img src="./assets/icons/editor.svg" alt="edit">
        </button>
    </div>
    <div id="lastSteps" class="container my-0">
        <div class="row my-3 d-flex">
            <div class="col-12 col-md-7  px-2 bg-light  border text-left order-2 order-sm-1 p-2" id="originalUserText">
            </div>
            <div class="col-12 col-md-3 text-dark">
                <p class="mx-auto text-lg-center">
                    Sélectionnez toutes les portions du texte que vous souhaitez adapter puis cliquez ci-dessous.
                </p>
                <ul class="mx-3 p-2 list-unstyled w-100" id="toModify"></ul>
                <button
                    class="btn bg-blue text-snow bg-hover-snow align-self-end font-weight-bold border rounded mb-3 mt-1 mt-sm-4 h1 w-100"
                    data-toggle="modal" data-target="#howManyVersions" id="goToEditionButton">
                    EDITER LES SELECTIONS
                </button>
            </div>
            <div class="col-0 col-md-1"></div>
        </div>
        <!-- Modal -->
        <div class="modal fade details" id="howManyVersions" tabindex="-1" role="dialog" aria-labelledby="howManyTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content ">
                    <div
                        class="modal-body d-flex justify-content-start flex-column align-items-center srcChoice  font-weight-bold rounded mx-auto mx-md-5 mt-4 p-2 p-md-5 mb-2 bg-blue text-snow">
                        <p>Combien de nouvelles versions voulez-vous générer ?</p>
                        <input type="number" name="howManyLetters" id="howManyLetters" placeholder="1" min="1" max="5"
                            value="1" step="1" class="form-control my-3">
                    </div>
                    <button type="button" class="btn mx-auto bg-blue text-snow bg-hover-snow my-3 font-weight-bold"
                        id="textEditSubmit" data-dismiss="modal">
                        Continuer
                    </button>

                </div>
            </div>
        </div>
    </div>
</div>