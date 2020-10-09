<!--TEXTAREA-->
<main
    class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2  w-100  justify-content-between align-items-center h-100 rounded"
    id="textarea">

    <!--Input Nom du projet-->
    <div class="row mx-auto align-items-baseline">
        <input type="text" class="projectName col-12 col-md-6 mx-auto" name="projectName" id="projectName" size="25"
            placeholder="<?php echo'PROJ'.date("Ymdhmi").'' ?>">
        <label class="mx-auto col-12 col-md-6" for="projectName">Choisissez un nom pour votre projet</label>
    </div>
    <!--Outils d'édition de texte-->
    <div
        class="w-100 rounded-top textControls bg-kover d-flex justify-content-center align-items-baseline flex-wrap center mx-auto my-3">
        <button class="btn btn-light rounded  m-2 h3" id="pasteText">
            COLLER
        </button>

        <span class="p-2 m-2">
            <select name="fontName" id="fontName">
                <option value="Liberation Sans" selected>Liberation Sans</option>
                <option value="Ubuntu">Ubuntu</option>
            </select>
        </span>
        <span class="p-2 m-2">
            <select name="fontSize" id="fontSize">
                <option value="12" selected>12</option>
                <option value="10">10</option>
            </select>
        </span>
        <fieldset class="m-2 d-flex justify-content-center align-items-center flex-wrap">
            <span class="p-2">
                <button id="bold" class="controlButton"><span class="font-weight-bold">G</span></button>
            </span>
            <span class="p-2 ">
                <button id="italic" class="controlButton"><span class="font-italic">I</span></button>
            </span>
            <span class="p-2">
                <button id="underline" class="controlButton"><span class="font-weight-bold"><u>S</u></span></button>
            </span>
        </fieldset>

        <fieldset class="m-2 d-flex justify-content-center align-items-center flex-wrap">
            <button id="left" class="controlButton">
                Gauche
            </button>
            <button id="center" class="controlButton">
                Centre
            </button>
            <button id="right" class="controlButton">
                Droite
            </button>
            <button id="justify" class="controlButton">
                Justifié
            </button>
        </fieldset>
    </div>
    <!--Champ de texte et validation-->
    <div class="bg-light w-100 m-auto rounded-bottom border" contenteditable="true" id="userText">
    </div>

    <button class="btn bg-kover mw-100 rounded mx-auto mt-4 h3 text-white font-weight-bold" id="submitText">OK</button>
</main>