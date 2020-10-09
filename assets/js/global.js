// Variables globales
var editCounter = 0;
let urlDOC = "";
let urlPDF = "";
let text = '';
let newText = '';
var originalText = '';
let fixedVersions = [];

/////////////////////// REFONTE


function startProj() {
    document.querySelector('#koverProj').innerHTML = document.querySelector('#startStep').innerHTML;
    document.querySelector("#startButton").addEventListener("click", sourceChoice);
}

function sourceChoice() {
    document.querySelector('#koverProj').innerHTML = document.querySelector('#sourceChoice').innerHTML;
    document.querySelector("#newTextButton").addEventListener("click", textEdition);
}

function textEdition() {
    document.querySelector('#koverProj').innerHTML = document.querySelector('#textEdition').innerHTML;
    document.querySelector("#userText").addEventListener("click", textOperate);
    document.querySelector("#userText").focus();
    document.querySelector("#submitText").addEventListener("click", selectZones, 1500);
}

function selectZones() {
    text = getUserText();
    document.querySelector("#projName").innerHTML = getProjectName();
    document.querySelector("#originalUserText").innerHTML = text;
    document.querySelector('#koverProj').innerHTML = document.querySelector('#selectionStep').innerHTML;
    clickMe("originalUserText", function () { // Activation du bouton ADD SECTION 
        if (window.getSelection().toString().length > 0) {
            document.getElementById("addSectionButton").removeAttribute('disabled');
        }
    });
    document.querySelector('#addSectionButton').addEventListener("click", selectingZone);
    document.querySelector("#textEditSubmit").addEventListener("click", setVersions);

}

function setVersions() {
    let numberOfVersions = document.querySelector('input#howManyLetters').value;
    document.querySelector('#lastSteps').innerHTML = document.querySelector('#setVersions').innerHTML;
    editionView(numberOfVersions);

    document.querySelector("#finishButton").addEventListener("click", function () {
        finalStep(numberOfVersions);
    });

}

function finalStep(numberOfVersions) {
    document.querySelector('#lastSteps').innerHTML = document.querySelector('#finishing').innerHTML;
    document.querySelector('#solidOriginal h3').innerHTML = document.querySelector('#version1Title').innerHTML;
    for (let i = 0; i < numberOfVersions; i++) {
        document.querySelector('#versionsGroup').innerHTML += '<div id="solidVersion' + (i + 1) + '" class="row">';
        document.querySelector('#versionsGroup').innerHTML += '<div class="col-1 rowspan-md-2">';
        document.querySelector('#versionsGroup').innerHTML += '<input type="checkbox" name="solidVersion' + (i + 1) + 'Checker" id="solidVersion' + (i + 1) + 'Checker">';
        document.querySelector('#versionsGroup').innerHTML += '</div>';
        document.querySelector('#versionsGroup').innerHTML += '<h3 class ="col-11 col-md-5">' + document.querySelector('#stockVersions #version' + (i + 2) + 'Fixed > h3').innerHTML + '</h3>';
        document.querySelector('#versionsGroup').innerHTML += '<div class = "col-11 col-md-5" >';
        document.querySelector('#versionsGroup').innerHTML += '<button class = "bg-kover text-white" id="saveVersion' + (i + 2) + '"> Sauvegarder </button>';
        document.querySelector('#versionsGroup').innerHTML += '<button class = "bg-kover text-white" id="exportDocVersion' + (i + 2) + '">DOC</button>';
        document.querySelector('#versionsGroup').innerHTML += '<button class = "bg-kover text-white" id="exportPdfVersion' + (i + 2) + '">PDF</button>';
        document.querySelector('#versionsGroup').innerHTML += '<button class = "bg-kover text-white" id="exportZipVersion' + (i + 2) + '">ZIP</button>';
        document.querySelector('#versionsGroup').innerHTML += '</div>';
        document.querySelector('#versionsGroup').innerHTML += '</div>';
    }
}


startProj();

//////////////////////
function cleanUserInput(string) {
    let charArray = string.split('');
    for (let i = 0; i < charArray.length; i++) {
        switch (charArray[i]) {
            case "&":
                charArray[i] = "&amp;"
                break;
            case '"':
                charArray[i] = "&quot;"
                break;
            case "'":
                charArray[i] = "&#039;"
                break;
            case "<":
                charArray[i] = "&lt;"
                break;
            case ">":
                charArray[i] = "&gt;"
                break;
            default:
                charArray[i] = charArray[i]
                break;
        }
    }
    string = charArray.join('');
    return string;
}


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

function saveVersion() {
    console.log("save this version");
    let inputs = document.querySelectorAll('#currentVersion input');
    for (let i = 0; i < inputs.length; i++) {
        let emptyInputs = 0;
        if (inputs[i].value.length < 1) {
            emptyInputs++;
        }
        console.log(emptyInputs);
        if (emptyInputs === 1) {
            alert('Un champ est vide. Pour le compléter, appuyez sur ESC.');
        } else if (emptyInputs > 1) {
            alert('' + emptyInputs + ' champs sont vides. Pour les compléter, appuyez sur <kbd>ESC</kbd>');

        }
        inputs[i].outerHTML = inputs[i].value;
        let validVersion;
        validVersion += document.querySelector('#currentVersion > h3').outerHTML;
        validVersion += document.querySelector('#currentVersion > div').outerHTML;
        return validVersion;
    }
}

function selectingZone() {
    console.log('text before :', document.querySelector('#originalUserText').innerHTML);
    if (window.getSelection().toString().length > 0) {
        console.log(window.getSelection().toString().length);
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
        let cross = document.querySelectorAll(".deleteSection"); // Activation des croix rouges
        for (let i = 0; i < cross.length; i++) {
            cross[i].addEventListener("click", function () {
                let index = cross[i].dataset.id;
                deleteFromList(index);
            });
        }
        console.log('text after :', document.querySelector('#originalUserText').innerHTML);

        window.getSelection().removeAllRanges(); // Déselection du texte 

        document.getElementById('addSectionButton').disabled = true; // ADD A SECTION désactivé sans sélection courante
        document.getElementById('goToEditionButton').disabled = false; // Activation GO TO EDITION 
        editCounter++;
        originalText = document.querySelector('#originalUserText').innerHTML;
        return originalText;
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

function editionView(numberOfVersions) {
    console.log(numberOfVersions);
    // Injection et nettoyage de l'original
    console.log(originalText);
    document.querySelector("#version1Title").innerHTML = 'Version Originale';
    document.querySelector("#version1Content").innerHTML = originalText;
    document.querySelector("#versionsButtons").innerHTML = '<button data-button="1" class="text-kover col-6 py-1 col-lg-4 py-md-3 rounded">Version Originale</button>';
    let editions = document.querySelectorAll('#version1Content span.toEdit');
    for (let i = 0; i < editions.length; i++) {
        editions[i].outerHTML = editions[i].innerHTML;
    }
    //document.querySelector("#stockVersions").innerHTML += document.querySelector("#version0Content").outerHTML;
    // Injection de chaque nouvelle version avec des inputs texte pré-remplis par les valeurs d'origine:
    for (let i = 1; i <= numberOfVersions; i++) {
        document.querySelector('#stockVersions').innerHTML += '<h3 id="version' + (i + 1) + 'Title" class="mt-3">Version ' + (i + 1) + '</h3>';
        document.querySelector('#stockVersions').innerHTML += '<div id="version' + (i + 1) + 'Content" class="version mt-2">' + originalText + '</div>';
        document.querySelector('#stockVersions').innerHTML += '<button class="col-4 col-md-6 bg-kover text-white rounded mt-3" data-valid="' + (i + 1) + '">VALIDER CETTE VERSION</button>';
        console.log(document.querySelector('#version' + (i + 1) + 'Content').innerHTML);
        let editions = document.querySelectorAll('#version' + (i + 1) + 'Content span.toEdit');
        for (let j = 0; j < editions.length; j++) {
            console.log("to edit: ", editions.length);
            let placeholder = editions[j].innerHTML;
            editions[j].innerHTML = '<input data-version="' + (i + 1) + '" data-edit="' + j + '" type="text" size="' + (editions[j].innerHTML.length * 2) + '" placeholder = "' + placeholder + '">';
        }
        document.querySelector("#versionsButtons").innerHTML += '<button data-button="' + (i + 1) + '" class="text-kover col-4 py-1 col-6 col-lg-4 py-md-3 rounded">Version ' + (i + 1) + '</button>';

    }
    for (let i = 0; i <= numberOfVersions; i++) {
        let buttons = document.querySelectorAll("button[data-button]");
        console.log(buttons.length);
        console.log(buttons[i].innerHTML);
        buttons[i].addEventListener("click", function (e) {
            console.log(e.target);
            document.querySelector("#currentVersion").innerHTML = '';
            document.querySelector("#currentVersion").innerHTML += document.querySelector("#version" + (i + 1) + "Title").outerHTML;
            document.querySelector("#currentVersion").innerHTML += document.querySelector('#version' + (i + 1) + 'Content').outerHTML;
            if (i > 0) {
                document.querySelector("#currentVersion").innerHTML += document.querySelector('button[data-valid="' + (i + 1) + '"]').outerHTML;
                document.querySelector('#currentVersion button[data-valid]').addEventListener("click", function () {
                    let fixedVersion = '';
                    fixedVersion = saveVersion();
                    document.querySelector("#stockVersions").innerHTML += '<div id="version"' + (i + 1) + 'Fixed>' + fixedVersion + '</div>';
                    document.querySelector('#currentVersion button[data-valid]').removeEventListener("click", arguments.callee);
                });
            }

        });
    }
}



function generateVersions(numberOfVersions) {
    // Intégration des saisies de l'utilisateur dans les inputs (s)
    for (let i = 0; i < numberOfVersions.length; i++) {
        let inputs = document.querySelectorAll("#version" + (i + 1) + "Content input");
        let editZones = document.querySelectorAll("#version" + (i + 1) + "Content span.toEdit");
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
    let allVersions = document.querySelectorAll(".version");
    for (let i = 0; i < allVersions.length; i++) {
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

function getProjectName() {
    let projName = document.querySelector('#projectName').value;
    if (projName.length > 0) {
        projName = cleanUserInput(projName);
    } else {
        projName = document.querySelector('#projectName').getAttribute("placeholder");
    }
    return projName;
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
    return text;
}

/*

- fonction previousStep() : encore quelques bugs

- Editeur de texte : font-style, font-size (+ autres fonctionnalités ? exposant, line-height, border...)

- Bouton PASTE >> seul Chrome prend en charge. Détecter le navigateur avec PHP

- Export en PDF !

- BUG fonction de copie : les balises insérées pendant l'édition apparaissent dans le texte

- Gestion des événements au clavier / sur smartphone

-Détection automatique de la langue (Navigator.language | équivalent PHP ?)

- CSS

*/




/*
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
    getProjectName();
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
    toggleClass("home", "d-flex", "d-none");3");
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
*/