<!--TEXTAREA-->
<main
    class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2  w-100  justify-content-around align-items-center h-100 rounded"
    id="textarea">
    <h2 class="text-info mx-auto  my-3 font-weight-bold">
        <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
        Saisir/coller un texte
    </h2>
    <!--Outils d'édition de texte-->
    <div
        class="w-100 rounded-top textControls bg-info d-flex justify-content-center align-items-baseline flex-wrap center text-dark mx-auto my-3">
        <button class="btn btn-light rounded  m-2 h3" id="pasteText">
            COLLER
        </button>
        <span class="p-2  text-dark m-2">
            <select name="fontName" id="fontName">
                <option value="Liberation Sans" selected>Liberation Sans</option>
                <option value="Ubuntu">Ubuntu</option>
            </select>
        </span>
        <span class="p-2 text-dark m-2">
            <select name="fontSize" id="fontSize">
                <option value="12" selected>12</option>
                <option value="10">10</option>
            </select>
        </span>
        <fieldset class="m-2">
            <span class="p-2  text-dark ">
                <button id="bold" class="controlButton"><span class="font-weight-bold">G</span></button>
            </span>
            <span class="p-2  text-dark ">
                <button id="italic" class="controlButton"><span class="font-italic">I</span></button>
            </span>
            <span class="p-2 text-dark ">
                <button id="underline" class="controlButton"><span class="font-weight-bold"><u>S</u></span></button>
            </span> </fieldset>

        <fieldset class="m-2">
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
    <div aria-placeholder="Trouvez vos meilleurs mots !"
        class="text-dark bg-light w-100 m-auto rounded-bottom border" contenteditable="true" id="userText">
    </div>
    <div>
        <p id="userText"></p>
    </div>
    <button class="btn btn-info mw-100 rounded mx-auto mt-4 h3" id="submitText">OK</button>
</main>