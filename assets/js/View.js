class View {

    constructor(project) {
        this.project = project;
    }

    srcChoice() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#sourceChoice').innerHTML;
    }

    textEditor() {
        window.scrollTo(0, 0);
        document.querySelector('#koverProj').innerHTML = document.querySelector('#textEdition').innerHTML.replace('<script>', '').replace('</script>', '');
        document.querySelector("#userText").focus();
        document.querySelector("#userText").style.fontSize = "12px";
        document.querySelector('#userText').innerHTML = this.project.originalText.replace('<script>', '').replace('</script>', '');
    }

    singleRender(urlDoc, name) {
        window.scrollTo(0, 0);
        document.querySelector('#koverProj').innerHTML = document.querySelector("#singleRender").innerHTML;
        document.querySelector('#koverProj #heading0').innerHTML = name;
        document.querySelector('#koverProj #versionsGroup #solidVersion1ModalBody').innerHTML = this.project.originalText.replace('<script>', '').replace('</script>', '');
        document.querySelector('#koverProj #versionsGroup #solidOriginalDocLink').href = urlDoc;
    }


    textSelector() {
        window.scrollTo(0, 0);
        document.querySelector('#koverProj').innerHTML = document.querySelector('#selectionStep').innerHTML;
        document.querySelector("#originalUserText").innerHTML = this.project.originalText.replace('<script>', '').replace('</script>', '');
    }

    versionsEditor(numberOfVersions, originalText, preparedText) {
        window.scrollTo(0, 0);
        document.querySelector('#koverProj').innerHTML = document.querySelector('#setVersions').innerHTML;
        // Injection et nettoyage de l'original

        document.getElementById("accordion").innerHTML += '<div id="collapse0" class="collapse" data-parent="#accordion" aria-labelledby="heading0"><div class="original card-body body p-1 p-md-3 border border-info rounded-bottom" data-content="0">' + originalText + '</div></div>';
        let editions = document.querySelectorAll('div.original span.toEdit');
        for (let i = 0; i < editions.length; i++) {
            editions[i].outerHTML = editions[i].innerHTML;
        }
        // Injection de chaque nouvelle version avec des inputs texte pré-remplis par les valeurs d'origine:

        for (let i = 0; i < numberOfVersions; i++) {
            document.getElementById('accordion').innerHTML += '<div id="version' + (i + 2) + '" class="versionBlock my-3 card bg-blue text-snow"><div class="d-flex flex-row justify-content-center bg-blue align-items-baseline"><input class="d-none mr-2" type = "checkbox" name = "solidVersion' + (i + 2) + 'Checker" id = "solidVersion' + (i + 2) + 'Checker" ><div class="d-flex align-items-center justify-content-center  letterNameBlock" data-version="' + (i + 2) + '"><input type="text" data-version="' + (i + 2) + '" class="d-none letterNameEditor"><h3 class="modal-title text-snow letterName d-inline" id="heading' + (i + 1) + '" data-version="' + (i + 2) + '"  data-toggle="collapse" data-target="#collapse' + (i + 1) + '">Version' + (i + 2) + '</h3><button class="badge  bg-snow mx-2 my-4 letterNameBadge" data-version="' + (i + 2) + '"><span><img src="./assets/icons/editor.svg" alt="edit"></span></button></div><span class="p-1 text-snow bg-blue ml-5" data-toggle="collapse" data-target="#collapse' + (i + 1) + '"><span class="bg-hover-snow"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-caret-down-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3.544 6.295A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5a.5.5 0 0 1-.082-.537z"/><path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/></svg></span></span></div></div><div id="collapse' + (i + 1) + '" class="collapse" data-parent="#accordion" aria-labelledby="heading' + i + '"><div class="card-body body p-1 p-md-3  border rounded-bottom" data-content="' + (i + 1) + '">' + preparedText + '</div></div>';
            let editZones = document.querySelectorAll('div#collapse' + (i + 1) + ' span.toEdit');
            for (let j = 0; j < editZones.length; j++) {
                let placeholder = editZones[j].innerHTML;
                editZones[j].innerHTML = '<input data-version="' + (i + 2) + '" data-edit="' + j + '" type="text" placeholder = "' + placeholder + '">';
            }
        }
    }

    generateVersions() {
        window.scrollTo(0, 0);
        // Intégration des saisies de l'utilisateur dans les inputs (s)
        let versions = document.querySelectorAll("div.versionBlock");
        for (let i = 0; i < versions.length; i++) {
            let inputs = document.querySelectorAll("div[data-content='" + (i + 1) + "'] input");
            let editZones = document.querySelectorAll('div#collapse' + (i + 1) + ' span.toEdit');
            for (let j = 0; j < editZones.length; j++) {
                if (inputs[j].value.length > 0) {
                    editZones[j].innerHTML = sanitizeHTML(inputs[j].value);
                    editZones[j].outerHTML = editZones[j].innerHTML;
                } else {
                    editZones[j].innerHTML = '';
                    editZones[j].outerHTML = editZones[j].innerHTML;
                }
            }
        }

        // Boutons d'interactions individuelles
        let cards = document.querySelectorAll(".card");
        let allVersions = document.querySelectorAll(".body");
        for (let i = 0; i < cards.length; i++) {
            // Génération d'URL pour télécharger DOC
            let urlDoc = generateDOC(allVersions[i].innerHTML);
            // Injection des boutons PDF, DOC, COPIER, IMPRIMER :
            cards[i].innerHTML += '<div class="p-2 d-flex justify-content-start justify-content-sm-center align-items-center bg-blue flex-wrap"><button class="pdf btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center"><span class="mr-2"><img src="./assets/icons/pdffile.svg" alt="edit"></span><span>PDF</span></button><button class="btn bg-blue text-snow bg-hover-snow d-flex justify-content-center align-items-center"><a href="' + urlDoc + '"><span><span class="mr-2"><img src="./assets/icons/docfile.svg" alt="edit"></span><span>DOC</span></span></a></button><button data-copy ="' + i + '" class="btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center mr-2"><span><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-clipboard-plus mr-2" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/><path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3zM8 7a.5.5 0 0 1 .5.5V9H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V10H6a.5.5 0 0 1 0-1h1.5V7.5A.5.5 0 0 1 8 7z"/></svg></span><span>COPY</span></button><button class="print btn bg-blue text-snow bg-hover-snow  d-flex justify-content-center align-items-center"><span class="mr-2"><svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-printer-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5z"/><path fill-rule="evenodd" d="M11 9H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/><path fill-rule="evenodd" d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/></svg></span><span>PRINT</span></button></div>';
        }

        // Injection dans la vue finale
        let accordion = document.querySelector('#accordion').outerHTML;
        document.querySelector('#accordion').remove();
        document.querySelector('#koverProj').innerHTML = document.querySelector('#finishing').innerHTML;
        document.querySelector('#koverProj #versionsGroup').innerHTML = accordion;
        let inputs = document.querySelectorAll('#accordion input[type="checkbox"]');
        for (let i = 0; i < inputs.length; i++) {
            inputs[i].classList.remove('d-none');
        }
    }
}