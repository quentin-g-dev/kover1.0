<!--SECTIONS-->
<main
    class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-center h-100 rounded"
    id="sections">
    <div class="container full-container  d-flex my-3  align-items-start">
        <div class="px-2 bg-light w-50 mr-3 border text-left" id="getUserText"></div>
        <div
            class="d-flex flex-column flex-wrap justify-content-center align-items-start w-50 mx-3 h-100">
            <p class="font-weight-bold mx-auto">
                Sélectionnez une portion de texte à modifier puis cliquez ci-dessous
            </p>
            <button class="btn bg-kover rounded mx-3 w-100 mt-4 h1 text-white font-weight-bold" disabled id="addSectionButton">
                AJOUTER
            </button>
            <ul class="m-3 p-2 list-unstyled w-100 h-25" id="toModify"></ul>
            <p class="font-weight-bold mx-auto">
                Lorsque chaque élément à adapter figure dans la liste, cliquez ci-dessous
            </p>
            <button class="btn text-kover align-self-end font-weight-bold border rounded mx-3 mt-4 h1 w-100" disabled id="goToEditionButton">
                EDITER LES SELECTIONS
            </button>
        </div>
    </div>
</main>
