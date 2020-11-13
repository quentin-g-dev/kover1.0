class View {

    constructor(project = {}) {
        this.project = project;
    }

    start() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#startView').innerHTML;
    }

    srcChoice() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#sourceChoice').innerHTML;
    }

    textEditor() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#textEdition').innerHTML;
        document.querySelector("#userText").focus();
        document.querySelector("#userText").style.fontSize = "12px";
        document.querySelector('#projectName').value = this.project.projName;
        document.querySelector('#userText').innerHTML = this.project.originalText;
    }

    singleRender(urlDoc) {
        let name = '';
        if (document.querySelector("#projectName").value.length > 0) {
            name = document.querySelector("#projectName").value;
        } else {
            name = document.querySelector("#projectName").placeholder;
        }
        document.querySelector('#koverProj').innerHTML = document.querySelector("#singleRender").innerHTML;
        document.querySelector('#koverProj #versionsGroup #heading0').innerHTML = name;


        document.querySelector('#koverProj #versionsGroup #solidVersion1ModalBody').innerHTML = this.project.originalText;
        document.querySelector('#koverProj #versionsGroup #solidOriginalDocLink').href = urlDoc;
    }

    projNameEditor() {
        document.querySelector("#projNameBadge").addEventListener("click", function () {
            document.querySelector("#projNameBadge").classList.add('d-none');
            document.querySelector("#projName").classList.add('d-none');
            document.querySelector("#projNameEditor").classList.remove('d-none');
            document.querySelector("#projNameEditor").placeholder = document.querySelector("#projName").innerHTML;
            document.querySelector("#projNameEditor").addEventListener("focusout", function () {
                document.querySelector("#projNameBadge").classList.remove('d-none');
                document.querySelector("#projName").classList.remove('d-none');
                document.querySelector("#projNameEditor").classList.add('d-none');
                if (document.querySelector("#projNameEditor").value.length > 0) {
                    document.querySelector("#projName").innerHTML = document.querySelector("#projNameEditor").value;
                } else {
                    document.querySelector("#projName").innerHTML = document.querySelector("#projNameEditor").placeholder;
                }
                document.querySelector("#projNameBadge").addEventListener("click", projNameEditor);
            });
        });
    }
    textSelector() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#selectionStep').innerHTML;
        if (document.querySelector('#projectName').value.length > 0) {
            document.querySelector("#projName").innerHTML = this.project.projName;
        } else {
            document.querySelector("#projName").innerHTML = document.querySelector('#projectName').placeholder;
        }
        this.projNameEditor();
        document.querySelector("#originalUserText").innerHTML = this.project.originalText;
    }
    versionsEditor(numberOfVersions, originalText, preparedText) {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#setVersions').innerHTML;
        // Injection et nettoyage de l'original
        document.getElementById("accordion").innerHTML += '<div class=" my-3 card d-flex flex-row justify-content-around align-items-center bg-kover text-white"><div><input class="d-none" type = "checkbox" name = "solidVersion1Checker" id = "solidVersion1Checker" ><h3 class="d-inline card-header" id="heading0">' + this.project.projName + ' [Original]</h3><button class="btn text-white bg-kover text-white border-light" data-toggle="collapse" data-target="#collapse0">&darr;</button></div></div>';
        document.getElementById("accordion").innerHTML += '<div id="collapse0" class="collapse" data-parent="#accordion" aria-labelledby="heading0"><div class="original card-body body p-5 border border-info rounded-bottom" data-content="0">' + originalText + '</div></div>';
        let editions = document.querySelectorAll('div.original span.toEdit');
        for (let i = 0; i < editions.length; i++) {
            editions[i].outerHTML = editions[i].innerHTML;
        }
        console.log(numberOfVersions);
        // Injection de chaque nouvelle version avec des inputs texte pré-remplis par les valeurs d'origine:
        for (let i = 0; i < numberOfVersions; i++) {
            document.getElementById('accordion').innerHTML += '<div id="version' + (i + 2) + '" class="versionBlock my-3 card d-flex flex-row justify-content-around align-items-center bg-kover text-white"><div><input class="d-none" type = "checkbox" name = "solidVersion' + (i + 2) + 'Checker" id = "solidVersion' + (i + 2) + 'Checker" ><h3 class="d-inline card-header" id="heading' + (i + 1) + '">' + this.project.projName + ' [Version ' + (i + 2) + ']</h3><button class="text-white btn bg-kover text-whiteborder-light" data-toggle="collapse" data-target="#collapse' + (i + 1) + '">&darr;</button></div></div><div id="collapse' + (i + 1) + '" class="collapse" data-parent="#accordion" aria-labelledby="heading' + i + '"><div class="card-body body p-5  border border-info rounded-bottom" data-content="' + (i + 1) + '">' + preparedText + '</div></div>';
            let editZones = document.querySelectorAll('div#collapse' + (i + 1) + ' span.toEdit');
            for (let j = 0; j < editZones.length; j++) {
                let placeholder = editZones[j].innerHTML;
                editZones[j].innerHTML = '<input data-version="' + (i + 2) + '" data-edit="' + j + '" type="text" placeholder = "' + placeholder + '">';
            }
        }
    }

    generateVersions() {
        // Intégration des saisies de l'utilisateur dans les inputs (s)
        let versions = document.querySelectorAll("div.versionBlock");
        for (let i = 0; i < versions.length; i++) {
            let inputs = document.querySelectorAll("div[data-content='" + (i + 1) + "'] input");
            let editZones = document.querySelectorAll('div#collapse' + (i + 1) + ' span.toEdit');
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

        // Boutons d'interactions individuelles
        let cards = document.querySelectorAll(".card");
        let allVersions = document.querySelectorAll(".body");
        for (let i = 0; i < cards.length; i++) {
            // Génération d'URL pour télécharger DOC ET PDF
            let urlDoc = generateDOC(allVersions[i].innerHTML);
            // Injection des boutons PDF, DOC, COPIER, IMPRIMER :

            cards[i].innerHTML += '<div><button class="pdf btn bg-kover text-white border-light">PDF</button><button class="btn bg-kover text-white border-light "><a href="' + urlDoc + '" class="text-white ">DOC</a></button><button data-copy ="' + i + '" class="btn bg-kover text-white border-light">COPY</button><button class="print btn bg-kover text-white border-light">PRINT</button></div>';

        }

        // Injection dans la vue finale
        let accordion = document.querySelector('#accordion').outerHTML;
        document.querySelector('#koverProj').innerHTML = document.querySelector('#finishing').innerHTML;
        document.querySelector('#koverProj #versionsGroup').innerHTML = accordion;
        let inputs = document.querySelectorAll('#accordion input[type="checkbox"]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('d-none');
        }
    }
}