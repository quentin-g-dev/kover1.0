class View {

    constructor(project) {
        this.project = project;
    }

    start() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#startView').innerHTML;
    }

    srcChoice() {
        document.querySelector('#koverProj').innerHTML = document.querySelector('#sourceChoice').innerHTML;
    }

    textEditor() {
        window.scrollTo(0, 0);
        document.querySelector('#koverProj').innerHTML = document.querySelector('#textEdition').innerHTML.replace('<script>', '').replace('</script>', '');
        document.querySelector("#userText").focus();
        document.querySelector("#userText").style.fontSize = "12px";
        document.querySelector('#userText').innerHTML.replace('<script>', '').replace('</script>', '') = this.project.originalText;
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

        document.getElementById("accordion").innerHTML += '<div id="collapse0" class="collapse" data-parent="#accordion" aria-labelledby="heading0"><div class="original card-body body p-5 border border-info rounded-bottom" data-content="0">' + originalText + '</div></div>';
        let editions = document.querySelectorAll('div.original span.toEdit');
        for (let i = 0; i < editions.length; i++) {
            editions[i].outerHTML = editions[i].innerHTML;
        }
        // Injection de chaque nouvelle version avec des inputs texte pré-remplis par les valeurs d'origine:

        for (let i = 0; i < numberOfVersions; i++) {
            document.getElementById('accordion').innerHTML += '<div id="version' + (i + 2) + '" class="versionBlock my-3 card bg-kover text-white"><div class="d-flex flex-row justify-content-start align-items-center "><input class="d-none" type = "checkbox" name = "solidVersion' + (i + 2) + 'Checker" id = "solidVersion' + (i + 2) + 'Checker" ><div class="card-header d-flex align-items-baseline justify-content-start letterNameBlock" data-version="' + (i + 2) + '"><input type="text" data-version="' + (i + 2) + '" class="d-none letterNameEditor"><h3 class="modal-title text-white letterName d-inline" id="heading' + (i + 1) + '" data-version="' + (i + 2) + '">Version' + (i + 2) + '</h3><button class="badge badge-secondary mx-2 my-4 letterNameBadge" data-version="' + (i + 2) + '">Modifier</button></div><button class="text-kover btn bg-white border-light" data-toggle="collapse" data-target="#collapse' + (i + 1) + '">&darr;</button></div></div><div id="collapse' + (i + 1) + '" class="collapse" data-parent="#accordion" aria-labelledby="heading' + i + '"><div class="card-body body p-5  border border-info rounded-bottom" data-content="' + (i + 1) + '">' + preparedText + '</div></div>';
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