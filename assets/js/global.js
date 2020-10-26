// Variables globales
var editCounter = 0;
let text = '';
let newText = '';
var originalText = '';
var originalFixedText = '';
let fixedVersions = [];

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

function checkAllVersions() {
    let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
    if (document.querySelector("#selectAll").dataset.status === "selectAll") {
        document.querySelector("#selectAll").innerHTML = "Tout Désélectionner";
        document.querySelector("#selectAll").dataset.status = "unselectAll";
        for (let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].checked = true;
            checkBoxes[i].addEventListener('change', function () {
                document.querySelector("#selectAll").innerHTML = "Tout Sélectionner";
                document.querySelector("#selectAll").dataset.status = "selectAll"
                for (let j = 0; j < checkBoxes.length; j++) {
                    if (checkBoxes[j].checked === false) {
                        return;
                    }
                    document.querySelector("#selectAll").innerHTML = "Tout Sélectionner";
                    document.querySelector("#selectAll").dataset.status = "selectAll";
                }
            });
        }
        return;
    } else {
        document.querySelector("#selectAll").innerHTML = "Tout Sélectionner";
        document.querySelector("#selectAll").dataset.status = "selectAll";
        for (let i = 0; i < checkBoxes.length; i++) {
            checkBoxes[i].checked = false;
            checkBoxes[i].addEventListener('change', function () {
                for (let j = 0; j < checkBoxes.length; j++) {
                    if (checkBoxes[j].checked === false) {
                        return;
                    }
                    document.querySelector("#selectAll").innerHTML = "Tout Désélectionner";
                    document.querySelector("#selectAll").dataset.status = "unselectAll";
                }
            });
        }
        return;
    }
}

function finalStep(numberOfVersions) {
    let final = document.querySelector('#finishing').innerHTML;
    document.querySelector('#lastSteps').innerHTML = final;
    document.querySelector('#finishing').remove();
    document.querySelector('#solidOriginal h3').innerHTML = document.querySelector('#version1Title').innerHTML;
    document.querySelector('#solidVersion1ModalBody').innerHTML = originalFixedText;
    let originalUrlDoc = generateDOC(originalFixedText);
    document.querySelector('#solidOriginalDocLink').href = originalUrlDoc;
    for (let i = 0; i < numberOfVersions; i++) {
        let currentTitle = document.querySelector('#fixedVersions #version' + (i + 2) + 'Fixed > h3').innerHTML;
        let currentLetter = document.querySelector('#fixedVersions #version' + (i + 2) + 'Fixed > div').innerHTML;
        let urlDoc = generateDOC(currentLetter);
        console.log('doc ', urlDoc);

        document.querySelector('#versionsGroup').innerHTML += '<div id="solidVersion' + (i + 2) + '" class="row my-2 text-center"></div>';
        document.querySelector('#solidVersion' + (i + 2)).innerHTML = '<div class="col-1 rowspan-md-2"  id="solidVersion' + (i + 2) + 'InputCol"></div>';
        document.querySelector('#solidVersion' + (i + 2) + 'InputCol').innerHTML += '<input type = "checkbox" name = "solidVersion' + (i + 2) + 'Checker" id = "solidVersion' + (i + 2) + 'Checker" > ';
        document.querySelector('#solidVersion' + (i + 2)).innerHTML += '<h3 class ="col-11 col-md-5 cursor-pointer" data-toggle="modal" data-target="#solidVersion' + (i + 2) + 'Modal">' + currentTitle + '</h3>';
        document.querySelector('#solidVersion' + (i + 2)).innerHTML += '<div class = "col-11 col-md-6" id="solidVersion' + (i + 2) + 'ButtonsCol"></div>';
        document.querySelector('#solidVersion' + (i + 2) + 'ButtonsCol').innerHTML += '<button type="button" aria-label="Copier"> <span class="" aria-hidden="true" onclick="copyTool(event);" data-copy="' + (i + 1) + '">COPIER</span></button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ButtonsCol').innerHTML += '<button class = "bg-kover text-white" id="saveVersion' + (i + 2) + '"> Sauvegarder </button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ButtonsCol').innerHTML += '<button class = "bg-kover text-white" id="exportDocVersion' + (i + 2) + '"><a href="' + urlDoc + '" class="text-white ">DOC</a></button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ButtonsCol').innerHTML += '<button class = "pdf bg-kover text-white" id="exportPdfVersion' + (i + 2) + '">PDF</button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ButtonsCol').innerHTML += '<button type="button" aria-label="Imprimer"><span class="print" aria-hidden="true" data-copy="0">IMPRIMER</span></button>';
        document.querySelector('#solidVersion' + (i + 2)).innerHTML += '<div class="modal fade bd-example-modal-lg" id="solidVersion' + (i + 2) + 'Modal" tabindex="-1" role="dialog" aria-labelledby="solidVersion' + (i + 2) + 'Title" aria-hidden="true"></div>';
        document.querySelector('#solidVersion' + (i + 2) + 'Modal').innerHTML += '<div class="modal-dialog modal-dialog-centered modal-lg" role="document" id="solidVersion' + (i + 2) + 'ModalInner"></div>';
        document.querySelector('#solidVersion' + (i + 2) + 'ModalInner').innerHTML += '<div  class="modal-content" id="solidVersion' + (i + 2) + 'ModalContent"></div>';
        document.querySelector('#solidVersion' + (i + 2) + 'ModalContent').innerHTML += '<div class="modal-header"><h5 class="modal-title text-kover" id="solidVersion' + (i + 2) + 'ModalTitle">' + currentTitle + '</h5><button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria - hidden = "true" > & times;</span></button></div >';
        document.querySelector('#solidVersion' + (i + 2) + 'ModalContent .modal-header').innerHTML += '<button type="button" aria-label="Copier"> <span class="fa fa-clipboard" aria-hidden="true" onclick="copyTool(event);" data-copy="' + (i + 1) + '">COPIER</span></button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ModalContent .modal-header').innerHTML += '<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden ="true">&times;</span></button>';
        document.querySelector('#solidVersion' + (i + 2) + 'ModalContent').innerHTML += '<div class="modal-body" id="solidVersion' + (i + 2) + 'ModalBody" name="solidVersion' + (i + 2) + 'ModalContent">' + currentLetter + '</div>';
    }

    for (let i = 0; i < document.querySelectorAll('.pdf').length; i++) {
        document.querySelectorAll('.pdf')[i].addEventListener("click", function () {
            let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
            let myTitle = document.querySelector('#solidVersion' + (i + 1) + 'ModalTitle').innerHTML;
            generatePDF(myText, myTitle);
        });
        document.querySelectorAll('.print')[i].addEventListener('click', function () {
            printVersion(document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML);
        });
    }
    document.querySelector('#selectAll').addEventListener("click", checkAllVersions);

    document.querySelector('#docExportSelected').addEventListener("click", function () {
        let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
        let urlList = [];
        for (let i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked === true) {
                let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                let myURL = generateDOC(myText);
                urlList.push(myURL);
            }
        }
        for (let i = 0; i < urlList.length; i++) {
            window.open(urlList[i]);
        }
    });
    document.querySelector('#pdfExportSelected').addEventListener("click", function () {
        let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
        for (let i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked === true) {
                let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                let myTitle = document.querySelector('#solidVersion' + (i + 1) + 'ModalTitle').innerHTML.trim();
                generatePDF(myText, myTitle);
            }
        }
    });
    document.querySelector('#saveSelected').addEventListener("click", function () {
        let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
        for (let i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked === true) {
                let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                let myTitle = document.querySelector('#solidVersion' + (i + 1) + 'ModalTitle').innerHTML.trim();
                let myProjName = document.querySelector('#projName').innerHTML.trim();

                let xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        console.log('enregistrement dans la bdd :', this.response);
                        if (this.response != "ok") {
                            document.querySelector("#pleaseConnect").click();
                        }
                    }
                };
                xhr.open('POST', './ajax/letters_registration.php', true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("projName=" + myProjName + "&versionTitle=" + myTitle + "&version=" + myText);
            }
        }
    });
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
        let validVersion = '';
        validVersion += document.querySelector('#currentVersion  h3').outerHTML;
        validVersion += document.querySelector('#currentVersion  div').outerHTML;
        return validVersion;
    }
}

function selectingZone() {
    originalFixedText = document.querySelector('#originalUserText').innerHTML
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
                    document.querySelector("#fixedVersions").innerHTML += '<div id="version' + (i + 1) + 'Fixed">' + fixedVersion + '</div>';
                    document.querySelector('#currentVersion button[data-valid]').removeEventListener("click", arguments.callee);
                });
            }

        });
    }
}


function printVersion(text) {
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Lettre</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(text);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    return;
}

function generateDOC(text) {

    let blob = new Blob([text], {
        type: 'application/msword'
    });
    urlDoc = URL.createObjectURL(blob);
    return urlDoc;
}

function generatePDF(text, title) {

    var {
        jsPDF
    } = window.jspdf;

    var doc = new jsPDF();
    doc.text(text, 10, 10);
    doc.save("" + title + ".pdf");
}

/*Fonction PDF => BLOB :
var xhr=new XMLHttpRequest();

xhr.open("GET","./template.pdf");
xhr.responseType="arraybuffer";

xhr.onload = function (e){
    var blob = new Blob([xhr.response]);
    var url = URL.createObjectURL(blob)

    console.log(url);

    var embed=document.getElementById("template");
    embed.src = url;
}

xhr.send();*/



function copyTool(event) { // Fonction appelée dans chaque bouton COPY (onclick)
    let id = Number(event.target.dataset.copy);
    let versions = document.querySelectorAll('.modal .modal-body');
    let currentVersion = versions[id].innerHTML;
    currentVersion = currentVersion.replace("<br>", "\n");
    navigator.clipboard.writeText(currentVersion).then(function () {
        event.target.innerHTML = 'Copié !';
        event.target.style.color = "green";
        setTimeout(function () {
            event.target.innerHTML = 'COPIER';
            event.target.style.color = "initial";
        }, 2500);
        event.target.addEventListener('click', function () {
            copyTool(event);
        });
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
            ctrlButtons[i].addEventListener("click", function (e) {
                for (let i = 0; i < window.getSelection().rangeCount; i++) {
                    let range = window.getSelection().getRangeAt(i);

                    let newNode;
                    let target = e.currentTarget.id;
                    console.log('target ? ', target);
                    //prepareText(slctData, target);
                    switch (target) {
                        case "raleway":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Raleway';
                            break;
                        case "playfairDisplay":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Playfair Display';
                            break;
                        case "josefinSans":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Josefin Sans';
                            break;
                        case "crimsonPro":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Crimson Pro';
                            break;
                        case "jost":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Jost';
                            break;
                        case "piazzolla":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Piazzolla';
                            break;
                        case "workSans":
                            newNode = document.createElement('span');
                            newNode.style.fontFamily = 'Work Sans';
                            break;
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
                    console.log('range : ', range);
                    console.log('newNode : ', newNode);
                    range.surroundContents(newNode);
                    console.log(range);

                    // Déselection du texte 
                }
                window.getSelection().removeAllRanges();
                range = undefined;


            });
        }
    }
    return;
}

function pasteMe() { ////////// Collage depuis le presse-papier - Ne fonctionne que sur CHROME 
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