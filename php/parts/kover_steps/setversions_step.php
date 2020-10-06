<!--SETTING VERSIONS-->
<main
    class="container full-container d-flex flex-column flex-no-wrap flex-lg-wrap p-3  mt-3 mb-2 w-100 w-lg-75 justify-content-start h-100 rounded"
    id="edition">
    <div class="row">
        <h2 class="col text-kover my-3 font-weight-bold" id="lastTitle">
            <span class="text-kover p-1  w-3" data-to-step="choice">&larr;</span>
            <span>Adaptez</span> <span id="numberOfVersions"></span>
            <span>nouvelle(s) version(s)</span>
        </h2>
    </div>
    <!--VERSION A ADAPTER-->
    <div class="row">
        <div class="col-12 row">
            <div class="row col-md-6 d-md-flex justify-content-between align-items-baseline" id="currentVersion">
                <div class="col-md-6 d-flex align-items-baseline">
                    <h3>Version 2</h3>
                    <span class="badge badge-secondary mx-2 my-4">Modifier</span>
                </div>    
                <button class="col-md-6 bg-kover text-white rounded">VALIDER CETTE VERSION</button>
            </div>
            <div class="col-md-6 d-none d-md-flex"></div>
        </div>
        <div class="col-md-6" id="currentVersion">Current Version</div>
        <div class="col-md-6" id="versionsMenu">
            <p class="font-weight-bold">Cliquez sur une version pour l’afficher et l’éditer</p>
            <div class="container-fluid">
                <div class="row no-gutters">
                    <button class="col-md-6 col-lg-4 py-5 px-auto rounded">Version Originale</button>
                    <button class="bg-kover text-white col-md-6 col-lg-4 py-5 px-auto rounded">Version 2</button>
                    <button class="text-kover col-md-6 col-lg-4 py-5 px-auto rounded">Version 3</button>
                    <button class="text-kover col-md-6 col-lg-4 py-5 px-auto rounded">Version 4</button>
                    <button class="text-kover col-md-6 col-lg-4 py-5 px-auto rounded">Version 5</button>
                    <button class="text-kover col-md-6 col-lg-4 py-5 px-auto rounded">Version 6</button>
                </div>
                <div class="row my-3">
                    <button class="bg-kover text-white col font-weight-bold">TERMINER</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="w-100 d-flex flex-column justify-content-center align-items-center">
            <div id="letterVersions" class="d-flex flex-column flex-wrap w-100 w-lg-75 mx-auto my-3">
                <div id="accordion" class=" accordion justify-content-around align-items-center">
                    <div
                        class=" my-3 card d-flex flex-row justify-content-around align-items-center bg-kover text-white">
                        <div>
                            <h3 class="d-inline card-header" id="headingOne">
                                Version Originale
                            </h3>
                            <button class="btn text-white border-light h-75" data-toggle="collapse"
                                data-target="#collapseOne">&darr;</button>
                        </div>

                    </div>
                </div>
            </div>
            <div id="elementH"></div>
        </div>
    </div>

    <button class="btn bg-kover text-white rounded mx-auto mt-4 h1 font-weight-bold" id="finishButton">OK</button>
</main>