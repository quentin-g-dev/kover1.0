// Variables globales
var editCounter = 0;
let urlDOC = "";
let urlPDF = "";
let text = '';
let newText = '';


function toggleClass(id, oldClass, newClass) { // Raccourci
    document.getElementById(id).classList.replace(oldClass, newClass);
    return;
}

function clickMe(elementId, callback) { // Raccourci
    document.getElementById(elementId).addEventListener("click", callback);
    return;
}

function previousStep() { // Retour à l'étape précédente
    for (let i = 0; i < document.querySelectorAll('[data-to-step]').length; i++) {
        document.querySelectorAll('span[data-to-step]')[i].addEventListener("click", function () {
            switch (event.target.dataset.toStep) {
                case "choice":
                    document.getElementById('getUserText').innerHTML = '';
                    document.getElementById('userText').innerHTML = '';
                    choice();
                    break;
                case "sections":
                    document.querySelector('#toModify').innerHTML = '';
                    words = [];
                    editCounter = 0;
                    reverseIndexTable = [];
                    nodesTable = [];
                    endNodesTable = [];
                    indexTable = [];
                    endOffsetTable = [];
                    lengthTable = [];
                    let cross = document.querySelectorAll(".deleteSection"); // Suppression des croix rouges
                    for (let i = 0; i < cross.length; i++) {
                        cross[i].remove();
                    }
                    document.getElementById('goToEditionButton').disabled = true;

                    sections();
                    break;
                case "howMany":
                    document.getElementById('howManyLetters').value = undefined;
                    howMany();
                    break;
                case "edition":
                    document.getElementById('numberOfVersions').innerHTML = '';
                    document.querySelector('#tableHead').innerHTML = '';
                    document.querySelector('#tableInner').innerHTML = '';
                    document.getElementById("accordion").innerHTML = '';
                    tableDimensions = [];
                    urlDoc = '';
                    urlPdF = '';
                    edition();
                    clickMe("finishButton", finish);
                    break;
                default:
                    console.log('nowhere to go !');
            }
        });
    }
    return;
}


/*
    let pdfText = text;
 pdfText = pdfText.replace("<br>", "\n");
 docText = pdfText.replace("<br>", "\r");
 let textTable = text.split('');
 let newStrTable = [];
 let newStr = '';
 for (let i = 0; i < textTable.length; i++) {
     newStrTable.push(text.charCodeAt());
 }
 newStr = newStrTable.join(' ');

 let blob = new Blob([pdfText], {
     type: 'application/pdf'
 });
 urlPDF = URL.createObjectURL(blob);
 return urlPDF;
  */

function selectZone() {
    console.log('text before :', document.getElementById('getUserText').innerHTML);
    if (window.getSelection().toString().length > 0) {
        document.querySelector('#toModify').innerHTML += '<li data-id="' + editCounter + '" class="expressionToModify"><span class="expressionWords" data-id="' + editCounter + '">' + window.getSelection().toString() + '</span><span class="deleteSection ml-3 text-danger font-weight-bold" data-id="' + editCounter + '">X</span></li>'; // +1  sélection à modifier

        let range = window.getSelection().getRangeAt(0);
        let newNode;
        newNode = document.createElement('span');
        newNode.className = "toEdit";
        newNode.dataset.id = editCounter;
        range.surroundContents(newNode);
        window.getSelection().removeAllRanges();
        range.detach();
        // Déselection du texte 
        newNode = undefined;
        console.log('text after :', document.getElementById('getUserText').innerHTML);
        let cross = document.querySelectorAll(".deleteSection"); // Activation des croix rouges
        for (let i = 0; i < cross.length; i++) {
            cross[i].addEventListener("click", function () {
                let index = cross[i].dataset.id;
                deleteFromList(index);
            });
        }
        window.getSelection().removeAllRanges(); // Déselection du texte 

        document.getElementById('addSectionButton').disabled = true; // ADD A SECTION désactivé sans sélection courante
        document.getElementById('goToEditionButton').disabled = false; // Activation GO TO EDITION 
        editCounter++;
        return;
    }
}

function deleteFromList(i) {
    editCounter--; // Compteur décrémenté
    let toDelete = document.querySelector('li[data-id = "' + i + '"]');
    //toDelete.style.display = "none"; // L'élément est retiré de la liste 
    toDelete.remove(); // L'élément est retiré de la liste 
    document.querySelector('span.toEdit[data-id="' + i + '"]').outerHTML = document.querySelector('span.toEdit[data-id="' + i + '"]').innerHTML; // La balise span.toDelete est supprimée
    console.log('text after red cross :', document.getElementById('getUserText').innerHTML);
    return;
}

function editionView() {
    let numberOfVersions = document.getElementById('howManyLetters').value;
    // Titre dynamique :
    document.getElementById('numberOfVersions').innerHTML = numberOfVersions;
    // Injection et nettoyage de l'original
    let originalText = document.getElementById('getUserText').innerHTML;
    document.getElementById("accordion").innerHTML += '<div id="collapseOne" class="collapse" data-parent="#accordion" aria-labelledby="headingOne"><div class="original card-body p-5 border border-info rounded-bottom">' + originalText + '</div></div>';
    let editions = document.querySelectorAll('div.original span.toEdit');
    for (let i = 0; i < editions.length; i++) {
        editions[i].outerHTML = editions[i].innerHTML;
    }
    // Injection de chaque nouvelle version avec des inputs texte pré-remplis par les valeurs d'origine:
    for (i = 0; i < numberOfVersions; i++) {
        document.getElementById('accordion').innerHTML += '<div id="version' + (i + 2) + '" class="versionBlock my-3 card d-flex flex-row justify-content-around align-items-center bg-info text-white"><div><h3 class="d-inline card-header" id="heading' + i + '">Version ' + (i + 2) + '</h3><button class="text-white btn btn-link btn-info border-light" data-toggle="collapse" data-target="#collapse' + i + '">&darr;</button></div></div><div id="collapse' + i + '" class="collapse" data-parent="#accordion" aria-labelledby="heading' + i + '"><div class="card-body p-5  border border-info rounded-bottom" data-content="' + i + '">' + originalText + '</div></div>';
        let editZones = document.querySelectorAll('div#collapse' + i + ' span.toEdit');
        for (let j = 0; j < editZones.length; j++) {
            let placeholder = editZones[j].innerHTML;
            editZones[j].innerHTML = '<input data-version="' + (i + 2) + '" data-edit="' + j + '" type="text" placeholder = "' + placeholder + '">';
        }
    }
    return;
}

function finishTitle() {
    document.querySelector("#lastTitle").innerHTML = 'Terminé !';
}

function generateVersions() {
    // Intégration des saisies de l'utilisateur dans les inputs (s)
    let versions = document.querySelectorAll("div.versionBlock");
    for (let i = 0; i < versions.length; i++) {
        let inputs = document.querySelectorAll("div[data-content='" + i + "'] input");
        let editZones = document.querySelectorAll('div#collapse' + i + ' span.toEdit');
        for (let j = 0; j < editZones.length; j++) {
            if (inputs[j].value.length > 0) {
                editZones[j].innerHTML = inputs[j].value;
                editZones[j].outerHTML = editZones[j].innerHTML;
            } else {
                editZones[j].innerHTML = inputs[j].placeholder.value;
                editZones[j].outerHTML = editZones[j].innerHTML;
            }
        }
    }
    let cards = document.querySelectorAll(".card");
    let allVersions = document.querySelectorAll(".card-body");
    for (let i = 0; i < cards.length; i++) {
        // Génération d'URL pour télécharger DOC ET PDF
        urlDoc = generateDOC(allVersions[i].innerHTML); // BUGS : Affiche les balises insérées pendant l'édition. La fonction de copie affiche le contenu en gras.
        urlPDF = generatePDF(allVersions[i].innerHTML); // BUG : Fonction à refaire | Module externe ? 
        // Injection des boutons PDF, DOC, COPIER, IMPRIMER :
        cards[i].innerHTML += '<div><button class="btn btn-info border-light"><a href="' + urlPDF + '" class="text-white ">PDF</a></button><button class=" btn btn-info border-light "><a href="' + urlDOC + '" class="text-white ">DOC</a></button><button data-copy =" ' + i + '" class="btn btn-info border-light" onclick="copyTool(event);">COPY</button><button class="btn btn-info border-light " onclick="var printWindow = window.open(urlDOC, \'\');printWindow.print();">PRINT</button></div>';
    }
}

function generateDOC(text) {
    let blob = new Blob([text], {
        type: 'application/msword'
    });
    urlDOC = URL.createObjectURL(blob);
    return urlDOC;
}

function generatePDF(text) {
    let pdfText = "%PDF-2.0 ";
    pdfText += text;
    let blob = new Blob([pdfText], {
        type: 'application/pdf'
    });
    urlPDF = URL.createObjectURL(blob);
    return urlPDF;
}

function copyTool(event) { // Fonction appelée dans chaque bouton COPY (onclick)
    let id = Number(event.target.dataset.copy);
    let versions = document.querySelectorAll('.card-body');
    let currentVersion = versions[id].innerHTML;
    currentVersion = currentVersion.replace("<br>", "\n");
    navigator.clipboard.writeText(currentVersion).then(function () {
        alert('Copied !');
    }, function () {
        alert('Problem !');
    });
    return;
}

function textOperate() {
    let ctrlButtons = document.querySelectorAll('.controlButton');
    if (window.getSelection().toString().length > 0) {
        for (let i = 0; i < ctrlButtons.length; i++) {
            ctrlButtons[i].addEventListener("click", function () {
                let range = window.getSelection().getRangeAt(0);
                let newNode;
                let target = event.currentTarget.id;
                console.log('target ? ', target);
                //prepareText(slctData, target);
                switch (target) {
                    case "bold":
                        newNode = document.createElement('strong');
                        break;
                    case "italic":
                        newNode = document.createElement('em');
                        break;
                    case "underline":
                        newNode = document.createElement('u');
                        break;
                    case "left":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "left";
                        break;
                    case "center":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "center";
                        break;
                    case "right":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "right";
                        break;
                    case "justify":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "justify";
                        break;
                }
                range.surroundContents(newNode);
                window.getSelection().removeAllRanges();
                range.detach();
                // Déselection du texte 
                newNode = undefined;
                return;
            });
        }
    }
    return;
}

function pasteMe() { ///////////////////// Collage depuis le presse-papier
    //////////////////// !! Ne fonctionne que sur CHROME :
    document.getElementById('userText').click();
    navigator.clipboard.readText().then(function (data) {
        document.getElementById("userText").innerHTML += data;
        document.getElementById("userText").focus();
    });
    return;
}

function getUserText() { ////Récupération du texte saisi 
    text = document.getElementById('userText').innerHTML;
    //text = text.replace(/\n/g, "<br>");
    //text = text.replace(/\r/g, "<br>");
    document.getElementById('getUserText').innerHTML += text;
    return;
}

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
        if (!isNaN(document.getElementById('howManyLetters').value) && document.getElementById('howManyLetters').value < 6 && document.getElementById('howManyLetters').value > 0) {
            edition();
        }
        return;
    });
}

function edition() {
    editionView();
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
    finishTitle();
    generateVersions();
    document.getElementById("finishButton").style.display = "none";
    return;
}

//  EXECUTION

begin();