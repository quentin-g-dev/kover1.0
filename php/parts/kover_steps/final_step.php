<!--DONE-->
<div id="finishing" class="d-none">
    <button id="backToVersionsEdit" class="btn bg-snow text-blue bg-hover-blue rounded ml-sm-3 ml-lg-5">
        <span>
            <img src="./assets/icons/backarrow.svg" alt="edit">
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
    <div id="groupOptions"
        class="w-100 my-2 rounded-top textControls bg-kover d-flex justify-content-center align-items-baseline flex-wrap flex-md-nowrap center mx-auto">
        <button class="btn btn-light rounded  m-2 h3" id="selectAll" data-status="selectAll">
            Tout Sélectionner
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="saveSelected">
            Sauvegarder
        </button>
        <span class="text-white font-weight-bold" for="">Exporter en :</span>
        <button class="btn btn-light rounded  m-2 h3" id="docExportSelected">
            DOC
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="pdfExportSelected">
            PDF
        </button>


    </div>

    <div id="fixedVersions" class="d-none"></div>

    <div id="versionsGroup" class="container">
        <div id="solidOriginal" class="row my-2">
            <div class="col-1 rowspan-md-2">
                <input type="checkbox" name="solidOriginalChecker" id="solidOriginalChecker">
            </div>
            <h3 class="col-11 col-md-5 cursor-pointer" data-toggle="modal" data-target="#solidVersion1Modal"></h3>
            <!--
            <div class="col-11 col-md-6">
                <button type="button" aria-label="Copier">
                    <span class="copyButton" aria-hidden="true" data-copy="0">COPIER</span>
                </button>
                <button class="bg-kover text-white"><a href="" class="text-white">Sauvegarder</a></button>
                <button class="bg-kover text-white"><a href="" class="text-white"
                        id="solidOriginalDocLink">DOC</a></button>
                <button class="pdf bg-kover text-white">PDF</button>
                <button type="button" aria-label="Imprimer">
                    <span class="print" aria-hidden="true" data-print="0">IMPRIMER</span>
                </button>
            </div>
-->
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg version" id="solidVersion1Modal" tabindex="-1" role="dialog"
                aria-labelledby="solidVersion1ModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg h-100" role="document">
                    <div class="modal-content h-100">
                        <div class="modal-header d-flex justify-content-between align-items-baseline">
                            <h5 class="modal-title text-kover" id="solidVersion1ModalTitle">
                                Version Originale
                            </h5>
                            <span class="d-flex flex-row align-items-baseline">
                                <button type="button" aria-label="Copier">
                                    <span class="copyButton" aria-hidden="true" data-copy="0">COPIER</span>
                                </button>
                                <button class="bg-kover text-white"><a href="" class="text-white"
                                        id="solidOriginalDocLink">DOC</a></button>
                                <button class="pdf bg-kover text-white">PDF</button>
                                <button type="button" aria-label="Imprimer">
                                    <span class="print" aria-hidden="true" data-print="0">IMPRIMER</span>
                                </button>
                            </span>
                            <span class="d-flex flex-row align-items-baseline">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </span>
                        </div>
                        <div class="modal-body version-body" id="solidVersion1ModalBody" name="solidVersion1ModalBody"
                            class="solidVersion">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal for Connected Users who successed registering a project -->
    <button id="registerSuccess" class="d-none" data-toggle="modal" data-target="#registerSuccessModal"></button>
    <div class="modal fade modal-lg" id="registerSuccessModal" tabindex="-1" role="dialog"
        aria-labelledby="registerSuccessModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-kover" id="registerSuccessModalTitle">
                        Votre projet a bien été enregistré.
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="registerSuccessModalBody" name="registerSuccessModalBody">
                    Vous pouvez consulter tous vos projets dans <a
                        href="./profile.php?vip=<?= $_SESSION['vip']['userId'];?>">votre
                        espace personnel</a>.
                </div>
            </div>
        </div>
    </div>
</div>