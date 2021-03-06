class Project {

    /**
     * Projet global Kover
     * @param {string} projName 
     * @param {string} originalText 
     * @param {string} originalFixedText 
     * @param {array} versions 
     * @param {number} editCounter 
     */
    constructor(projName = Date.now(), originalText = '', preparedText = '', versions = [], editCounter = 0) {
        this.dateTime = new Date();
        this.projName = projName;
        this.originalText = originalText;
        this.preparedText = preparedText;
        this.versions = [];
        this.numberOfVersions = versions.length;
        this.editCounter = editCounter;
    }

    textEditorListener() {
        let ctrlButtons = document.querySelectorAll('main .controlButton');
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



    checkAllVersions() {
        function selectAll() {
            document.querySelector("#selectButtonText").className = "d-none d-sm-none px-3";
            document.querySelector("#unselectButtonText").className = "d-none d-sm-flex px-3";
            document.querySelector("#selectIcon").className = "d-none";
            document.querySelector("#unselectIcon").className = "";
            document.querySelector("#selectAll").dataset.status = "unselectAll";
        }

        function unselectAll() {
            document.querySelector("#selectButtonText").className = "d-none d-sm-flex px-3";
            document.querySelector("#unselectButtonText").className = "d-none d-sm-none px-3";
            document.querySelector("#selectIcon").className = "";
            document.querySelector("#unselectIcon").className = "d-none";
            document.querySelector("#selectAll").dataset.status = "selectAll";
        }
        let checkBoxes = document.querySelectorAll('input[type="checkbox"]');
        if (document.querySelector("#selectAll").dataset.status === "selectAll") {
            selectAll();
            for (let i = 0; i < checkBoxes.length; i++) {
                checkBoxes[i].checked = true;
                checkBoxes[i].addEventListener('change', function () {
                    unselectAll();
                    for (let j = 0; j < checkBoxes.length; j++) {
                        if (checkBoxes[j].checked === false) {
                            return;
                        }
                        unselectAll();
                    }
                });
            }
            return;
        } else {
            unselectAll();
            for (let i = 0; i < checkBoxes.length; i++) {
                checkBoxes[i].checked = false;
                checkBoxes[i].addEventListener('change', function () {
                    for (let j = 0; j < checkBoxes.length; j++) {
                        if (checkBoxes[j].checked === false) {
                            return;
                        }
                        unselectAll();
                    }
                });
            }
            return;
        }
    }

    

    finalInteractions() {
        // PDF / PRINT :
        for (let i = 0; i < document.querySelectorAll('#versionsGroup .pdf').length; i++) {
            document.querySelectorAll('#versionsGroup .pdf')[i].addEventListener("click", function () {
                let pureVersion = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                document.querySelector('.body[data-content="' + i + '"]').innerHTML.replace("<br>", "");
                let elements = document.querySelectorAll('.body[data-content="' + i + '"] *');
                while (document.querySelector('.body[data-content="' + i + '"]>*')) {
                    for (let j = 0; j < elements.length; j++) {
                        elements[j].outerHTML = elements[j].innerHTML;
                    }
                }
                let myText = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                document.querySelector('.body[data-content="' + i + '"]').innerHTML = pureVersion;
                let myTitle = document.querySelector('#heading' + i + '').innerHTML;
                generatePDF(myText, myTitle);
            });
            document.querySelectorAll('.print')[i].addEventListener('click', function () {
                printVersion(document.querySelector('.body[data-content="' + i + '"]').innerHTML);
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
                let checkCounter = 0;
                let checkBoxes = document.querySelectorAll('#accordion input[type="checkbox"]');
                let urlList = [];
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked === true) {
                        checkCounter++;
                        console.log(i);
                        let myText = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                        let myURL = generateDOC(myText);
                        urlList.push(myURL);
                    }
                }
                for (let i = 0; i < urlList.length; i++) {
                    window.open(urlList[i]);
                }
                if (checkCounter === 0) {
                    enableAlert('#emptySelectionAlert');
                }
            });
        }

        
        // MULTIPLE PDF :
        if (document.querySelector('#pdfExportSelected')) {

            document.querySelector('#pdfExportSelected').addEventListener("click", function () {
                let checkCounter = 0;
                let checkBoxes = document.querySelectorAll('#accordion input[type="checkbox"]');
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked === true) {
                        checkCounter++;
                        let pureVersion = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                        document.querySelector('.body[data-content="' + i + '"]').innerHTML.replace("<br>", "");
                        let elements = document.querySelectorAll('.body[data-content="' + i + '"] *');
                        while (document.querySelector('.body[data-content="' + i + '"]>*')) {
                            for (let j = 0; j < elements.length; j++) {
                                elements[j].outerHTML = elements[j].innerHTML;
                            }
                        }
                        let myText = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                        document.querySelector('.body[data-content="' + i + '"]').innerHTML = pureVersion;
                        let myTitle = document.querySelector('#heading' + i + '').innerHTML;
                        generatePDF(myText, myTitle);
                    }
                }
                if (checkCounter === 0) {
                    enableAlert('#emptySelectionAlert');
                }
            });
        }

        // MULTIPLE SAVE :
        document.querySelector('#saveSelected').addEventListener("click", function () {
            let checkCounter = 0;
            let checkBoxes = document.querySelectorAll('main input[type="checkbox"]');
            for (let i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked === true) {
                    checkCounter++;
                }
            }
            if (checkCounter === 0) {
                enableAlert('#emptySelectionAlert');
            } else {
                let myProjName = sanitizeHTML(document.querySelector('#projName').innerHTML.trim());
                let xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (this.response == "true") {
                            let newProjName = sanitizeHTML(prompt('Un de vos projets s\'appelle déjà ' + myProjName + ' : souhaitez-vous conserver le même nom ?', '' + myProjName));
                            if (newProjName == false) {
                                document.querySelector('#projNameBadge').click();
                                return;
                            } else {
                                myProjName = newProjName.trim();
                                document.querySelector('#projName').innerHTML = newProjName;
                            }
                        }
                    }
                };
                xhr.open('POST', './ajax/letters_registration.php', true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("proj=" + myProjName);
                for (let i = 0; i < checkBoxes.length; i++) {
                    if (checkBoxes[i].checked === true) {

                        let myText = document.querySelector('.body[data-content="' + i + '"]').innerHTML;
                        let myTitle = document.querySelector('#heading' + i + '').innerHTML.trim();
                        let xhr2 = new XMLHttpRequest();
                        xhr2.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200) {
                                if (this.response == "ok") {
                                    enableAlert('#savedAlert');
                                } else if (this.response == "changeLetterName") {
                                    let newTitle = sanitizeHTML(prompt('Vous avez déjà enregistré une lettre intitulée ' + myProjName + ' ' + myTitle + '. Merci de choisir un nouveau nom : ', '' + myTitle + '[new]'));
                                    if (newTitle == false) {
                                        enableAlert('#saveCanceledAlert');
                                        return;
                                    } else {
                                        xhr2.open('POST', './ajax/letters_registration.php', true);
                                        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                                        xhr2.send("projName=" + myProjName + "&versionTitle=" + newTitle.trim() + "&version=" + myText + "&projName=" + myProjName + "&forced=1");
                                        document.querySelector('#heading' + i + '').innerHTML = newTitle;
                                    }
                                } else {
                                    console.log(this.response);
                                    if (document.querySelector('#signInButton')) {
                                        document.querySelector('#signInButton').click();
                                    }
                                    return;
                                }
                            }
                        };
                        xhr2.open('POST', './ajax/letters_registration.php', true);
                        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr2.send("projName=" + myProjName + "&versionTitle=" + myTitle + "&version=" + myText + "&projName=" + myProjName);
                    }
                }
            }

        });
    }
}