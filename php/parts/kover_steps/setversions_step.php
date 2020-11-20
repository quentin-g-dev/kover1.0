<div id="setVersions" class="d-none">
    <button id="backToSelect" class="btn bg-snow text-blue bg-hover-blue rounded ml-sm-3 ml-lg-5">
        <span>
            <img src="./assets/icons/backarrow.svg" alt="edit">
        </span>
        <span>Retour aux sélections</span>
    </button>
    <div class="col-12">
        <div class="d-flex align-items-baseline justify-content-center mx-auto" id="ProjNameBlock">
            <input type="text" name="" id="projNameEditor" class="d-none">
            <h5 class="display-5 ml-3" id="projName"></h5>
            <button class="badge bg-snow mx-2 my-4" id="projNameBadge">
                <img src="./assets/icons/editor.svg" alt="edit">
            </button>
        </div>
        <div id="letterVersions" class="d-flex flex-column flex-wrap mx-auto my-3">
            <div id="accordion" class=" accordion justify-content-around align-items-center">
                <div id="version1" class=" my-3 card ">
                    <div class="d-flex flex-row justify-content-center bg-blue text-snow align-items-baseline">
                        <input class="d-none mr-2" type="checkbox" name="solidVersion1Checker"
                            id="solidVersion1Checker">
                        <div class="d-flex align-items-center justify-content-center  letterNameBlock" data-version="1">
                            <input type="text" data-version="1" class="d-none letterNameEditor">
                            <h3 class="modal-title text-white letterName d-inline" id="heading0" data-version="1"
                                data-toggle="collapse" data-target="#collapse0">
                                Original</h3>
                            <button class="badge  bg-snow mx-2 my-4 letterNameBadge" data-version="1">
                                <span>
                                    <img src="./assets/icons/editor.svg" alt="edit">
                                </span>
                            </button>
                        </div>
                        <span class="p-1 text-snow bg-blue ml-5" data-toggle="collapse" data-target="#collapse0">
                            <span class="bg-hover-snow">
                                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-caret-down-square"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3.544 6.295A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5a.5.5 0 0 1-.082-.537z" />
                                    <path fill-rule="evenodd"
                                        d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                </svg>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div id="elementH"></div>
        <button
            class="btn bg-blue w-100 rounded mx-auto mt-2 d-flex justify-content-center align-items-center text-snow font-weight-bold bg-hover-snow"
            id="finishButton">
            OK
        </button>
    </div>


</div>