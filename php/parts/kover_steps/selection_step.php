<!--SECTIONS-->
<main
    class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-center h-100 rounded"
    id="sections">
    <h2 class="text-info mx-auto  my-3 font-weight-bold">
        <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
        Choisissez les éléments à adapter
    </h2>
    <div class="container full-container  d-flex my-3  align-items-start">
        <div class="px-2  bg-light w-75 w-lg-50 mr-3 border text-left" id="getUserText"></div>
        <div
            class="w-25 w-lg-50 d-flex flex-column flex-wrap justify-content-center align-items-start align-items-center">
            <p class="text-dark">
                <span class="font-italic">
                    Sélectionnez une partie du texte à modifier puis cliquez ci-dessous
                </span></p>
            <button class="btn btn-info rounded mx-auto mt-4 h1 " disabled id="addSectionButton">
                AJOUTER
            </button>
            <ul class="p-2 list-unstyled" id="toModify"></ul>
            <p class="text-dark">
                <span class="font-italic">
                    Lorsque chaque élément à adapter figure dans la liste, cliquez ci-dessous
                </span>
            </p>
            <button class="btn btn-success rounded mx-auto mt-4 h1" disabled id="goToEditionButton">
                EDITER LES SELECTIONS
            </button>
        </div>
    </div>
</main>
