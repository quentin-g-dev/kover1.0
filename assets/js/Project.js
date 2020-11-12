class Project {

    /**
     * Projet global Kover
     * @param {string} projName 
     * @param {string} originalText 
     * @param {string} originalFixedText 
     * @param {array} versions 
     * @param {number} editCounter 
     */
    constructor(projName = '', originalText = '', preparedText = '', versions = [], editCounter = 0) {
        this.dateTime = new Date();
        this.projName = projName;
        this.originalText = originalText;
        this.preparedText = preparedText;
        this.versions = [];
        this.numberOfVersions = versions.length;
        this.editCounter = editCounter;
    }

    setNumberOfVersions(number) {
        this.numberOfVersions = number;
    }

    desc() {
        console.log('projet : ', this.projName, '///', 'date de création : ', this.dateTime, '///', 'version originale : ', this.originalText, '<///>', 'nb de versions : ', this.numberOfVersions);
        for (let i = 0; i < this.numberOfVersions.length; i++) {
            console.log('version ', (i + 1), ' : ', this.versions[i].title);
            console.log('version ', (i + 1), ' : ', this.versions[i].text);
        }
    }

    textEditorListener() {
        console.log('listener');

        let ctrlButtons = document.querySelectorAll('main .controlButton');
        console.log(ctrlButtons.length);
        if (window.getSelection().toString().length > 0) {
            for (let i = 0; i < ctrlButtons.length; i++) {
                ctrlButtons[i].addEventListener("click", function (e) {
                    for (let i = 0; i < window.getSelection().rangeCount; i++) {
                        let range = window.getSelection().getRangeAt(i);
                        let newNode;
                        let target = e.currentTarget.id;
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
                            case "fz10":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "10px";
                                break;
                            case "fz11":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "11px";
                                break;
                            case "fz12":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "12px";
                                break;
                            case "fz13":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "13px";
                                break;
                            case "fz14":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "14px";
                                break;
                            case "fz16":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "16px";
                                break;
                            case "fz18":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "18px";
                                break;
                            case "fz20":
                                newNode = document.createElement('span');
                                newNode.style.fontSize = "20px";
                                break;
                        }


                        range.surroundContents(newNode);
                        range = undefined;

                    }
                    // Déselection du texte 
                    window.getSelection().removeAllRanges();
                });
            }
        }
    }

    selecting() {
        if (window.getSelection().toString().length > 0) {
            document.querySelector('#toModify').innerHTML += '<li data-id="' + this.editCounter + '" class="expressionToModify"><span class="expressionWords" data-id="' + this.editCounter + '">' + window.getSelection().toString() + '</span><span class="deleteSection ml-3 text-danger font-weight-bold" data-id="' + this.editCounter + '">X</span></li>'; // +1  sélection à modifier
            let range = window.getSelection().getRangeAt(0);
            let newNode;
            newNode = document.createElement('span');
            newNode.className = "toEdit";
            newNode.dataset.id = this.editCounter;
            range.surroundContents(newNode);
            window.getSelection().removeAllRanges();
            range.detach();
            // Déselection du texte 
            newNode = undefined;
            let cross = document.querySelectorAll(".deleteSection"); // Activation des croix rouges
            for (let i = 0; i < cross.length; i++) {
                cross[i].addEventListener("click", function () {
                    let index = cross[i].dataset.id;
                    this.editCounter--; // Compteur décrémenté
                    document.querySelector('li[data-id = "' + index + '"]').remove(); // L'élément est retiré de la liste 
                    document.querySelector('span.toEdit[data-id="' + index + '"]').outerHTML = document.querySelector('span.toEdit[data-id="' + index + '"]').innerHTML; // La balise span.toDelete est supprimée
                });
            }
            window.getSelection().removeAllRanges(); // Déselection du texte 
            this.editCounter++;
        }
    }

    fixVersion() {
        document.querySelector('#versionsButtons').addEventListener("click", function () {
            let validButtons = document.querySelectorAll('#currentVersion button[data-valid]');
            for (let i = 0; i < validButtons.length; i++) {
                validButtons[i].addEventListener("click", function () {
                    let inputs = document.querySelectorAll('#currentVersion input');
                    let index = validButtons[i].dataset.valid;
                    let validVersion = '';
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
                        validVersion += document.querySelector('#currentVersion  h3').outerHTML;
                        validVersion += document.querySelector('#currentVersion  .versionContent').outerHTML;
                    }
                    document.querySelector("#fixedVersions").innerHTML += '<div id="version' + index + 'Fixed">' + validVersion + '</div>';
                    document.querySelector('#currentVersion button').classList.add('d-none');
                });
            }
        });
    }

    checkAllVersions() {
        let checkBoxes = document.querySelectorAll('main #versionsGroup input[type="checkbox"]');
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

    finalInteractions() {
        // PDF / PRINT :
        for (let i = 0; i < document.querySelectorAll('.solidVersion .pdf').length; i++) {
            document.querySelectorAll('.solidVersion .pdf')[i].addEventListener("click", function () {
                let pureVersion = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML.replace("<br>", "");
                let elements = document.querySelectorAll('#solidVersion' + (i + 1) + 'ModalBody *');
                for (let j = 0; j < elements.length; j++) {
                    elements[j].outerHTML = elements[j].innerHTML;
                }
                let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML = pureVersion;
                let myTitle = document.querySelector('#solidVersion' + (i + 1) + 'ModalTitle').innerHTML;
                generatePDF(myText, myTitle);
            });
            document.querySelectorAll('.print')[i].addEventListener('click', function () {
                printVersion(document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML);
            });
        }

        // COPY :
        let copyButtons = document.querySelectorAll("[data-copy]");
        for (let i = 0; i < copyButtons.length; i++) {
            copyButtons[i].addEventListener("click", copyTool);
        }

        // SELECT ALL :
        if (document.querySelector('#selectAll')) {
            document.querySelector('#selectAll').addEventListener("click", this.checkAllVersions);
        }
        // MULTIPLE DOC :
        if (document.querySelector('#docExportSelected')) {

            document.querySelector('#docExportSelected').addEventListener("click", function () {
                let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
                let urlList = [];
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked === true) {
                        let myText = document.querySelector('#versionsGroup #solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                        let myURL = generateDOC(myText);
                        urlList.push(myURL);
                    }
                }
                for (let i = 0; i < urlList.length; i++) {
                    window.open(urlList[i]);
                }
            });
        }

        // MULTIPLE PDF :
        if (document.querySelector('#pdfExportSelected')) {

            document.querySelector('#pdfExportSelected').addEventListener("click", function () {
                let checkBoxes = document.querySelectorAll('#versionsGroup input[type="checkbox"]');
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked === true) {
                        let myText = document.querySelector('#versionsGroup #solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                        console.log(myText);
                        let myTitle = document.querySelector('#versionsGroup #solidVersion' + (i + 1) + 'ModalTitle').innerHTML.trim();
                        generatePDF(myText, myTitle);
                    }
                }
            });
        }

        // MULTIPLE SAVE :
        document.querySelector('#saveSelected').addEventListener("click", function () {
            let checkBoxes = document.querySelectorAll('main input[type="checkbox"]');
            console.log(checkBoxes.length);
            for (let i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked === true) {
                    let myText = document.querySelector('#solidVersion' + (i + 1) + 'ModalBody').innerHTML;
                    let myTitle = document.querySelector('#solidVersion' + (i + 1) + 'ModalTitle').innerHTML.trim();
                    let myProjName = document.querySelector('#projName').innerHTML.trim();
                    let xhr = new XMLHttpRequest();
                    xhr.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            if (this.response != "ok") {
                                document.querySelector('#connectionButton').click();
                            } else {
                                document.querySelector('#registerSuccess').click();
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
}