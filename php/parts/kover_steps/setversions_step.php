<!--
<div class="d-none" id="setVersions">
    <div class="row">
        <h2 class="col text-kover my-3 font-weight-bold" id="lastTitle">
            <span class="text-kover p-1  w-3" data-to-step="choice">&larr;</span>
            <span>Adaptez</span> <span id="numberOfVersions"></span>
            <span>nouvelle(s) version(s)</span>
        </h2>
    </div>
    -->
<!--VERSION A ADAPTER-->
<div id="setVersions" class="d-none">
    <div class="row">
        <div class="col-12 row">
            <div id="stockVersions" class="d-none">
                <h3 id="version1Title" class="mt-3">Version Originale</h3>
                <div id="version1Content" class="mt-2 version"></div>
            </div>
            <div class="row col-lg-8 col-md-7 d-flex justify-content-between align-items-between"></div>
            <div class="col-lg-4 col-md-5 d-none d-md-flex"></div>
        </div>
        <div class="col-md-7 col-lg-8 flex-column justify-content-between align-items-start h-100 align-self-stretch text-left"
            id="currentVersion">
        </div>
        <div class="col-md-5 col-lg-4 order-first order-md-last align-self-start" id="versionsMenu">
            <p class="font-weight-bold">Cliquez sur une version pour l’afficher et l’éditer</p>
            <div class="container-fluid">
                <div id="versionsButtons" class="row no-gutters d-flex justify-content-center align-items-center"></div>
                <div class="row my-1 my-md-3">
                    <button class="bg-kover text-white col font-weight-bold mt-4" id="finishButton">TERMINER</button>
                </div>
            </div>
        </div>
    </div>
</div>