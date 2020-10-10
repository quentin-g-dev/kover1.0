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
        <button class="btn btn-light rounded  m-2 h3" id="printSelected">
            Imprimer
        </button>
        <span class="text-white font-weight-bold" for="">Exporter en :</span>
        <button class="btn btn-light rounded  m-2 h3" id="docExportSelected">
            DOC
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="pdfExportSelected">
            PDF
        </button>
        <button class="btn btn-light rounded  m-2 h3" id="zipExportSelected">
            ZIP
        </button>

    </div>

    <div id="fixedVersions" class="d-none"></div>

    <div id="versionsGroup" class="container">
        <div id="solidOriginal" class="row my-2 text-center">
            <div class="col-1 rowspan-md-2">
                <input type="checkbox" name="solidOriginalChecker" id="solidOriginalChecker">
            </div>
            <h3 class="col-11 col-md-5 cursor-pointer" data-toggle="modal" data-target="#solidOriginalModal"></h3>
            <div class="col-11 col-md-6">
                <button class="bg-kover text-white"><a href="">Sauvegarder</a></button>
                <button class="bg-kover text-white"><a href="">DOC</a></button>
                <button class="bg-kover text-white"><a href="">PDF</a></button>
                <button class="bg-kover text-white"><a href="">ZIP</a></button>
            </div>
            <!-- Modal -->
            <div class="modal fade bd-example-modal-lg" id="solidOriginalModal" tabindex="-1" role="dialog"
                aria-labelledby="solidOriginalModalTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-kover" id="solidOriginalModalTitle">
                                Version Originale
                            </h5>
                            <button type="button" aria-label="Copier">
                                <span aria-hidden="true" onclick="copyTool(event);" data-copy="0">COPIER</span>
                            </button>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="solidOriginalModalContent" name="solidOriginalModalContent">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>