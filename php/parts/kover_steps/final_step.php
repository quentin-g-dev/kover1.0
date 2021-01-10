<!--DONE-->
<div id="finishing" class="d-none">
    <!-- Alert Message for successfull registration-->

    <div class="finalStepAlerts mx-auto">
        <div class="alert bg-greensheen border-light text-blue mx-auto alert-dismissible fade w_100" role="alert"
            id="savedAlert">
            <strong>Enregistrement terminé ! </strong>
            <span>
                Vous pouvez consulter tous vos projets dans <a
                    href="./profile.php?vip=<?= $_SESSION['vip']['userId'];?>"><u>votre
                        espace personnel</u></a>.
            </span>
            <button type="button" class="close" aria-label="Close">
                <span aria-hidden="true" class="text-blue">&times;</span>
            </button>
        </div>

        <!-- Alert Message for canceled registration-->
        <div class="alert bg-darkred text-snow mx-auto alert-dismissible fade d-none w-100" role="alert"
            id="saveCanceledAlert">
            <strong>L'enregistrement a été abandonné</strong>
            <button type="button" class="close text-snow" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <!-- Alert Message if no letter selected-->
        <div class="alert bg-darkred text-snow mx-auto alert-dismissible fade d-none w-100" role="alert"
            id="emptySelectionAlert">
            <strong>Aucune lettre sélectionnée !</strong>
            <button type="button" class="close text-snow" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>


    <button id="backToVersionsEdit" class="btn bg-snow text-blue bg-hover-blue rounded ml-sm-3 ml-lg-5">
        <span>
            <img src="./assets/icons/backarrow.svg" alt="previous">
        </span>
        <span>Retour à l'édition</span>
    </button>
    <div class="d-flex align-items-center justify-content-center mx-auto" id="ProjNameBlock">
        <input type="text" name="" id="projNameEditor" class="d-none">
        <h5 class="display-5 ml-3" id="projName"></h5>
        <button class="badge bg-snow mx-2 my-4" id="projNameBadge">
            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-pencil-fill" fill="currentColor"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z" />
            </svg>
        </button>
    </div>
    <div id="groupOptions container"
        class="w-100 my-1 rounded-top textControls bg-blue d-flex justify-content-md-center align-items-baseline flex-wrap flex-md-nowrap center mx-auto">
        <button class="btn btn-light rounded  m-1 m-md-2 h3 d-flex" id="selectAll" data-status="selectAll">
            <span id="selectIcon">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-check mr-2" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
            <span class="d-none d-sm-flex" id="selectButtonText">Tout Sélectionner</span>
            <span class="d-none" id="unselectIcon">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-list-task" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                    <path
                        d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                    <path fill-rule="evenodd"
                        d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
                </svg>
            </span>
            <span class="d-none d-sm-none" id="unselectButtonText">Tout Désélectionner</span>
        </button>
        <button class="btn btn-light rounded m-1 m-md-2 h3 d-flex justify-content-center align-items-center"
            id="saveSelected">
            <span class="mr-0 mr-sm-2">
                <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-cloud-plus-fill" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5V6z" />
                </svg>
            </span>
            <span class="d-none d-sm-flex">Sauvegarder</span>
        </button>
        <div class="d-flex align-items-center">
            <span class="text-white font-weight-bold m-1 m-md-2 d-none d-md-flex" for="">Exporter en :</span>
            <button class="btn btn-light rounded d-flex justify-content-center align-items-center m-1 m-md-2 h3"
                id="docExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/docfile.svg" alt="doc file">
                </span>
                <span class="d-none d-sm-flex">DOC</span>
            </button>
            <button class="btn btn-light rounded d-flex justify-content-center align-items-center m-1 m-md-2 h3"
                id="pdfExportSelected">
                <span class="mr-0 mr-sm-2">
                    <img src="./assets/icons/pdffile.svg" alt="pdf file">
                </span>
                <span class="d-none d-sm-flex">PDF</span>
            </button>
        </div>
    </div>

    <div id="fixedVersions" class="d-none"></div>

    <div id="versionsGroup" class="container mw-100 p-0">

    </div>

</div>