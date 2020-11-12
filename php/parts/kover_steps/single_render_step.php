<div id="singleRender" class="d-none">

    <div id="versionsGroup"><input type="checkbox" checked class="d-none">
        <div class="version">
            <div class="solidVersion d-flex justify-content-between align-items-baseline" id="solidVersion1">
                <h5 class="modal-title text-kover" id="solidVersion1ModalTitle"></h5>
                <span class="d-flex flex-row align-items-baseline">
                    <button class="bg-kover text-white" id="saveSelected">SAUVEGARDER</button>
                    <button type="button" aria-label="Copier">
                        <span class="copyButton" aria-hidden="true" data-copy="0">COPIER</span>
                    </button>
                    <button class="bg-kover text-white">
                        <a href="" class="text-white" id="solidOriginalDocLink">DOC</a>
                    </button>
                    <button class="pdf bg-kover text-white">PDF</button>
                    <button type="button" aria-label="Imprimer">
                        <span class="print" aria-hidden="true" data-print="0">IMPRIMER</span>
                    </button>
                </span>
            </div>
            <div class="version-body" id="solidVersion1ModalBody"></div>
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