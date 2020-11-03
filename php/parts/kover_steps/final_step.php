<!--DONE-->
<div id="finishing" class="d-none">

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

        <!-- Modal for Unconnected Users who want to register a project -->
        <button id="pleaseConnect" class="d-none" data-toggle="modal" data-target="#pleaseConnectModal"></button>
        <div class="modal fade modal-lg" id="pleaseConnectModal" tabindex="-1" role="dialog"
            aria-labelledby="pleaseConnectModalTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-kover" id="pleaseConnectModalTitle">
                            Cette fonctionnalité requiert un compte actif.
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="pleaseConnectModalBody" name="pleaseConnectModalBody">
                        Merci de <a href="./sign_in.php" target="_blank">vous connecter</a>.<br>
                        Vous n'avez pas encore de compte&nbsp;? Il suffit de <a href="./sign_up.php">vous inscrire</a>.
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
                        Vous pouvez consulter tous vos projets dans <a href="profile.php?vip=" <? echo
                            $_SESSION['vip']['id']?>">?votre espace personnel</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="fixedVersions" class="d-none"></div>

    <div id="versionsGroup" class="container">
        <div id="solidOriginal" class="row my-2 text-center">
            <div class="col-1 rowspan-md-2">
                <input type="checkbox" name="solidOriginalChecker" id="solidOriginalChecker">
            </div>
            <h3 class="col-11 col-md-5 cursor-pointer" data-toggle="modal" data-target="#solidVersion1Modal"></h3>
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

            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="solidVersion1Modal" tabindex="-1" role="dialog"
                aria-labelledby="solidVersion1ModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-kover" id="solidVersion1ModalTitle">
                                Version Originale
                            </h5>
                            <button type="button" aria-label="Copier">
                                <span class="copyButton" aria-hidden="true" data-copy="0">COPIER</span>
                            </button>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="solidVersion1ModalBody" name="solidVersion1ModalBody">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>