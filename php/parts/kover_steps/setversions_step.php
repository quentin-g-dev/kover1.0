<!--SETTING VERSIONS-->
<main
    class="container full-container d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-start align-items-center h-100  rounded"
    id="edition">
    <h2 class="text-info mx-auto  my-3 font-weight-bold" id="lastTitle">
        <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
        <span>Adaptez</span> <span id="numberOfVersions"></span>
        <span>nouvelle(s) version(s)</span>
    </h2>
    <div class="w-100 d-flex flex-column  justify-content-center align-items-center">
        <div id="letterVersions" class="d-flex flex-column flex-wrap w-100 w-lg-75 mx-auto my-3">
            <div id="accordion" class=" accordion justify-content-around align-items-center">
                <div
                    class=" my-3 card d-flex flex-row justify-content-around align-items-center bg-info text-white">
                    <div>
                        <h3 class="d-inline card-header" id="headingOne">
                            Version Originale
                        </h3>
                        <button class="btn btn-link text-white btn-info border-light" data-toggle="collapse"
                            data-target="#collapseOne">&darr;</button>
                    </div>

                </div>
            </div>
        </div>
        <div id="elementH"></div>
    </div>

    <button class="btn btn-info rounded mx-auto mt-4 h1" id="finishButton">OK</button>
</main>