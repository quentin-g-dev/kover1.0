/*

- fonction previousStep() : encore quelques bugs

- Editeur de texte : font-style, font-size (+ autres fonctionnalités ? exposant, line-height, border...)

- Bouton PASTE >> seul Chrome prend en charge. Détecter le navigateur avec PHP

- Export en PDF !

- BUG fonction de copie : les balises insérées pendant l'édition apparaissent dans le texte

- Gestion des événements au clavier / sur smartphone

-Détection automatique de la langue (Navigator.language | équivalent PHP ?)

- Cahier des charges projet ++ : Optimisation PHP, Version ES ?, BDD, etc.

- CSS

*/





//Etapes de l'éxécution 

function begin() { //  ACCUEIL
    console.log("begin");
    toggleClass("home", "d-none", "d-flex");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-flex", "d-none");
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-flex", "d-none");
    clickMe("startButton", choice);
    previousStep();
    return;
}

function choice() { //  MAKE YOUR CHOICE
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-none", "d-flex");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-flex", "d-none");
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-flex", "d-none");
    clickMe("newTextButton", choiceHTML);
    clickMe("uploadFileButton", choiceFile);
    return;
}

function choiceHTML() { //  HTML CHOICE
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-none", "d-flex");
    toggleClass("sections", "d-flex", "d-none");
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-flex", "d-none");
    document.getElementById('userText').focus();
    // Réaction au clic sur les boutons d'édition de texte :
    clickMe("userText", textOperate);
    document.getElementById("userText").addEventListener("select", textOperate);
    clickMe("pasteText", pasteMe);
    clickMe("submitText", getUserText);
    clickMe("submitText", sections);
    return;
}

function choiceFile() {
    return; //  STEP1 : FILE CHOICE
}

function sections() { // STEP 2 : SELECTION DE TEXTE A MODIFIER
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-none", "d-flex");
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-flex", "d-none");
    // Le bouton ADD SECTION s'active en cas de sélection dans le texte
    clickMe("getUserText", function () { // Activation du bouton ADD SECTION 
        if (window.getSelection().toString().length > 0) {
            document.getElementById("addSectionButton").removeAttribute('disabled');
        }
        return;
    });
    clickMe("addSectionButton", selectZone);
    clickMe("goToEditionButton", howMany);
    return;
}

function howMany() {
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-flex", "d-none");;
    toggleClass("howMany", "d-none", "d-flex");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-flex", "d-none");
    clickMe("howManyButton", function () {
        if (!isNaN(document.getElementById('howManyLetters').value) && document.getElementById('howManyLetters').value < 5 && document.getElementById('howManyLetters').value > 0) {
            edition();
        }
        return;
    });
}

function edition() {
    editForm();
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-flex", "d-none");;
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-none", "d-flex");
    toggleClass("done", "d-flex", "d-none");
    clickMe("finishButton", finish);
    return;
}

function finish() {
    generateVersions();
    toggleClass("home", "d-flex", "d-none");
    toggleClass("choice", "d-flex", "d-none");
    toggleClass("textarea", "d-flex", "d-none");
    toggleClass("sections", "d-flex", "d-none");;
    toggleClass("howMany", "d-flex", "d-none");
    toggleClass("edition", "d-flex", "d-none");
    toggleClass("done", "d-none", "d-flex");
    return;
}

//  EXECUTION

begin();