<!--DONE-->
<div id="finishing" class="d-none">

    <div id="groupOptions"
        class="w-100 rounded-top textControls bg-kover d-flex justify-content-center align-items-baseline flex-wrap center mx-auto mt-3">
        <button class="btn btn-light rounded  m-2 h3" id="selectAll">
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
        <div id="solidOriginal" class="row">
            <div class="col-1 rowspan-md-2">
                <input type="checkbox" name="solidOriginalChecker" id="solidOriginalChecker">
            </div>
            <h3 class="col-11 col-md-5 cursor-pointer"></h3>
            <div class="col-11 col-md-5">
                <button class="bg-kover text-white">Sauvegarder</button>
                <button class="bg-kover text-white">DOC</button>
                <button class="bg-kover text-white">PDF</button>
                <button class="bg-kover text-white">ZIP</button>
            </div>
        </div>
    </div>

</div>