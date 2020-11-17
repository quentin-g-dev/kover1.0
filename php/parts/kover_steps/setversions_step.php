<div id="setVersions" class="d-none">
    <button id="backToSelect" class="btn bg-snow text-blue bg-hover-blue rounded ml-sm-3 ml-lg-5">
        <span>
            <img src="./assets/icons/backarrow.svg" alt="edit">
        </span>
        <span>Retour aux sélections</span>
    </button>
    <div class="col-12">
        <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
            <input type="text" name="" id="projNameEditor" class="d-none">
            <h5 class="display-5 ml-3" id="projName"></h5>
            <button class="badge bg-snow mx-2 my-4" id="projNameBadge">
                <img src="./assets/icons/editor.svg" alt="edit">
            </button>
        </div>
        <div id="letterVersions" class="d-flex flex-column flex-wrap mx-auto my-3">
            <div id="accordion" class=" accordion justify-content-around align-items-center">
                <div id="version1" class=" my-3 card ">
                    <div class="d-flex flex-row justify-content-start bg-blue text-snow align-items-center">
                        <input class="d-none" type="checkbox" name="solidVersion1Checker" id="solidVersion1Checker">
                        <div class="card-header d-flex align-items-baseline justify-content-start letterNameBlock"
                            data-version="1">
                            <input type="text" data-version="1" class="d-none letterNameEditor">
                            <h3 class="modal-title text-white letterName d-inline" id="heading0" data-version="1">
                                Original</h3>
                            <button class="badge  bg-snow mx-2 my-4 letterNameBadge" data-version="1">
                                <span>
                                    <img src="./assets/icons/editor.svg" alt="edit">
                                </span>
                            </button>
                        </div>
                        <button class="btn text-kover bg-white border-light" data-toggle="collapse"
                            data-target="#collapse0">&darr;</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="elementH"></div>
    </div>

    <button
        class="btn bg-blue w-100 rounded mx-auto mt-4 d-flex justify-content-center align-items-center text-snow font-weight-bold bg-hover-snow"
        id="finishButton">
        OK
    </button>
</div>