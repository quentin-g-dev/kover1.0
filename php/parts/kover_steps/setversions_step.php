<div id="setVersions" class="d-none">
    <div class="col-12">
        <button id="backToSelect" class="text-kover bg-light">&larr; Retour à l'étape de sélection</button>
        <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
            <input type="text" name="" id="projNameEditor" class="d-none">
            <h2 class="display-5 ml-3" id="projName"></h2>
            <button class="badge badge-secondary mx-2 my-4" id="projNameBadge">Modifier</button>
        </div>
        <div id="letterVersions" class="d-flex flex-column flex-wrap mx-auto my-3">
            <div id="accordion" class=" accordion justify-content-around align-items-center">
                <div id="version1" class=" my-3 card ">
                    <div class="d-flex flex-row justify-content-start bg-kover text-white">
                        <input class="d-none" type="checkbox" name="solidVersion1Checker" id="solidVersion1Checker">
                        <div class="card-header d-flex align-items-baseline justify-content-start letterNameBlock"
                            data-version="1">
                            <input type="text" data-version="1" class="d-none letterNameEditor">
                            <h3 class="modal-title text-white letterName d-inline" id="heading0" data-version="1">
                                Original</h3>
                            <button class="badge badge-secondary mx-2 my-4 letterNameBadge"
                                data-version="1">Modifier</button>
                        </div>
                        <button class="btn text-kover bg-white border-light" data-toggle="collapse"
                            data-target="#collapse0">&darr;</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="elementH"></div>
    </div>

    <button class="w-25 btn bg-kover text-white rounded mx-auto mt-4 h1 mx-2" id="finishButton">OK</button>
</div>