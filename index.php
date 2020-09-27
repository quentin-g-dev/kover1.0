<?php
session_start();

if(isset($_GET['disc']) && isset($_SESSION)){
    $_SESSION=[];
    session_destroy();
}
$pageTitle = 'Kover - Accueil';

include './parts/head.php';
include './parts/header.php';
?>

<body>
    
    <!--HOME-->
    <main
        class="container full-container d-flex flex-column p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-baseline h-100 rounded"
        id="home">
        <div class=" d-flex  flex-column flex-no-wrap flex-lg-wrap mx-auto">
            <p class="border-info text-info m-auto p-2 h3 rounded font-weight-bold mr-4">
                Votre lettre de motivation pourrait toucher plusieurs cibles&nbsp;?
            </p>
            <p class="text-dark h4 my-5 mx-4 mx-lg-auto mxtext-center">
                <span class="font-weight-bold">
                    Adaptez votre texte à vos différents destinataires
                </span><br>
                et exportez-le au format DOC ou PDF.
            </p>
        </div>
        <button class="btn btn-info w-50 h-100 rounded mx-auto mt-4 h1" id="startButton">
            COMMENCER
        </button>
    </main>

    <!--MAKE YOUR CHOICE-->
    <main
        class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-center h-100 rounded"
        id="choice">
        <h2 class="text-info mx-auto h2 my-3 font-weight-bold">
            Sélectionnez une option
        </h2>
        <div class="d-flex flex-column flex-lg-row mr-auto ml-auto my-3">
            <button class="btn btn-info w-100 w-lg-75 rounded mx-auto mx-lg-5 mt-4 h3 p-2" id="newTextButton">
                Saisir/coller une lettre de motivation
            </button>
            <button class="btn btn-info w-100 w-lg-75 rounded mx-auto mx-lg-5 mt-4 h3 p-2" id="uploadFileButton">
                Utiliser un fichier existant
            </button>
        </div>
    </main>

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

    <!--HOW MANY LETTERS-->
    <main
        class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-around align-items-center h-100 rounded"
        id="howMany">
        <h2 class="text-info mx-auto  my-3 font-weight-bold">
            <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
            Combien de versions différentes souhaitez-vous générer ?
        </h2>
        <p><span class="text-info">
                ( maximum 5 )
                <input type="number" name="howManyLetters" id="howManyLetters" placeholder="1" min="1" max="5"
                    class="my-3">
                <button class="btn btn-info rounded mx-auto mt-4 h1" id="howManyButton">OK</button>
    </main>

    <!--EDITION STEP-->
    <main
        class="container full-container d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 text-center w-100 w-lg-75 justify-content-start align-items-center h-100  rounded"
        id="edition">
        <h2 class="text-info mx-auto  my-3 font-weight-bold" id="lastTitle">
            <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
            Adaptez <span id="numberOfVersions"></span>
            nouvelles versions
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

    <!--DONE-->
    <main
        class="container full-container  d-flex flex-column flex-no-wrap flex-lg-wrap p-3 mx-auto mt-3 mb-2 w-100 w-lg-75 justify-content-around align-items-center h-100  rounded"
        id="done">
        <h2 class="text-info mx-auto  my-3 font-weight-bold">
            <span class="text-info p-1  w-3" data-to-step="choice">&larr;</span>
            Terminé !
        </h2>

    </main>

<?php include './parts/footer.php'; ?>
<script src="./js/jquery-3.5.1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
</script>
        
<script src="./js/global.js"></script>
<script src="./js/nav_menu.js"></script>
</body>

</html>