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
            document.querySelector("#projName").innerHTML = document.querySelector('#projectName').value;
        } else {
            document.querySelector("#projName").innerHTML = document.querySelector('#projectName').placeholder;
        }
        this.projNameEditor();
        document.querySelector("#originalUserText").innerHTML = this.project.originalText;
    }

    versionsEditor(numberOfVersions, originalText, preparedText) {
        // Preparing Original Version :
        document.querySelector('#lastSteps').innerHTML = document.querySelector('#setVersions').innerHTML;
        document.querySelector("#version1Content").innerHTML = originalText;
        document.querySelector("#versionsButtons").innerHTML += '<button data-button="1" " class="text-kover col-4 py-1 col-6 col-lg-4 py-md-3 rounded">Original</button>';
        let editions = document.querySelectorAll('#version1Content span.toEdit');
        for (let i = 0; i < editions.length; i++) {
            editions[i].outerHTML = editions[i].innerHTML;
        }

        // Preparing new versions :
        for (let i = 1; i <= numberOfVersions; i++) {
            document.querySelector('#stockVersions').innerHTML += '<div class="versionTitleBlock" data-version="' + (i + 1) + '"><h3 id="version' + (i + 1) + 'Title" class="mt-3">Version ' + (i + 1) + '</h3><button class="badge versionTitleBadge" data-version="' + (i + 1) + '">Modifier</button></div>';
            document.querySelector('#stockVersions').innerHTML += '<div id="version' + (i + 1) + 'Content" class="versionContent version mt-2">' + preparedText + '</div>';
            let toEdit = document.querySelectorAll('#lastSteps #version' + (i + 1) + 'Content span.toEdit');
            for (let j = 0; j < toEdit.length; j++) {
                let placeholder = toEdit[j].innerHTML;
                toEdit[j].outerHTML = '<input data-version="' + (i + 1) + '" data-edit="' + j + '" type="text" size="' + (toEdit[j].innerHTML.length) + '" placeholder = "' + placeholder + '">';
            }
            document.querySelector('#stockVersions').innerHTML += '<button class = "col-4 col-md-6 bg-kover text-white rounded mt-3" data-valid = "' + (i + 1) + '" > VALIDER CETTE VERSION';

            document.querySelector("#versionsButtons").innerHTML += '<button data-button="' + (i + 1) + '" class="text-kover col-4 py-1 col-6 col-lg-4 py-md-3 rounded">Version ' + (i + 1) + '</button>';
            for (let j = 0; j < editions.length; j++) {
                let placeholder = editions[j].innerHTML;
                editions[j].innerHTML = '<input data-version="' + (i + 1) + '" data-edit="' + j + '" type="text" size="' + (editions[j].innerHTML.length) + '" placeholder = "' + placeholder + '">';
            }
        }
        for (let i = 0; i <= numberOfVersions; i++) {
            let buttons = document.querySelectorAll("button[data-button]");
            buttons[i].addEventListener("click", function () {
                let index = buttons[i].dataset.button;
                document.querySelector('#currentVersion').innerHTML = document.querySelector('.versionTitleBlock[data-version="' + index + '"]').outerHTML;
                document.querySelector('#currentVersion').innerHTML += document.querySelector('#version' + index + 'Content').outerHTML;

                if (i > 0) {
                    document.querySelector('#currentVersion').innerHTML += document.querySelector('button[data-valid="' + index + '"]').outerHTML;
                }
            });
        }
    }

    finalRenderOriginal(originalUrlDoc) {
        document.querySelector('#lastSteps').innerHTML = document.querySelector('#finishing').innerHTML;
        document.querySelector('#lastSteps #solidOriginal').classList.add('solidVersion');
        document.querySelector('#solidOriginal h3').innerHTML = 'Original';
        document.querySelector('#solidVersion1ModalBody').innerHTML = this.project.originalText;
        document.querySelector('#solidOriginalDocLink').href = originalUrlDoc;
    }

    finalRenderVersion(index, title, letter, urlDoc) {
        document.querySelector('#versionsGroup').innerHTML += '<div id="solidVersion' + index + '" class="solidVersion row my-2"></div>';
        document.querySelector('#solidVersion' + index).innerHTML = '<div class="col-1 rowspan-md-2"  id="solidVersion' + index + 'InputCol"></div>';
        document.querySelector('#solidVersion' + index + 'InputCol').innerHTML += '<input type = "checkbox" name = "solidVersion' + index + 'Checker" id = "solidVersion' + index + 'Checker" > ';
        document.querySelector('#solidVersion' + index).innerHTML += '<h3 class ="col-11 col-md-5 cursor-pointer" data-toggle="modal" data-target="#solidVersion' + index + 'Modal">' + title + '</h3>';
        /*
        document.querySelector('#solidVersion' + index).innerHTML += '<div class = "col-11 col-md-6" id="solidVersion' + index + 'ButtonsCol"></div>';
        document.querySelector('#solidVersion' + index + 'ButtonsCol').innerHTML += '<button type="button" aria-label="Copier"> <span class="" aria-hidden="true"  data-copy="' + (index - 1) + '">COPIER</span></button>';
        document.querySelector('#solidVersion' + index + 'ButtonsCol').innerHTML += '<button class = "bg-kover text-white" id="saveVersion' + index + '"> Sauvegarder </button>';
        document.querySelector('#solidVersion' + index + 'ButtonsCol').innerHTML += '<button class = "bg-kover text-white" id="exportDocVersion' + index + '"><a href="' + urlDoc + '" class="text-white ">DOC</a></button>';
        document.querySelector('#solidVersion' + index + 'ButtonsCol').innerHTML += '<button class = "pdf bg-kover text-white" id="exportPdfVersion' + index + '">PDF</button>';
        document.querySelector('#solidVersion' + index + 'ButtonsCol').innerHTML += '<button type="button" aria-label="Imprimer"><span class="print" aria-hidden="true" data-print="0">IMPRIMER</span></button>';
        */
        // MODAL
        document.querySelector('#solidVersion' + index).innerHTML += '<div class="modal fade bd-example-modal-lg" id="solidVersion' + index + 'Modal" tabindex="-1" role="dialog" aria-labelledby="solidVersion' + index + 'Title" aria-hidden="true"></div>';
        document.querySelector('#solidVersion' + index + 'Modal').innerHTML += '<div class="modal-dialog modal-dialog-centered modal-lg  h-100" role="document" id="solidVersion' + index + 'ModalInner"></div>';
        document.querySelector('#solidVersion' + index + 'ModalInner').innerHTML += '<div  class="modal-content h-100" id="solidVersion' + index + 'ModalContent"></div>';
        document.querySelector('#solidVersion' + index + 'ModalContent').innerHTML += '<div class="modal-header  d-flex justify-content-between align-items-baseline"><h5 class="modal-title text-kover" id="solidVersion' + index + 'ModalTitle">' + title + '</h5></div >';
        document.querySelector('#solidVersion' + index + 'ModalContent .modal-header').innerHTML += '<span class="d-flex flex-row align-items-baseline"><button type="button" aria-label="Copier"> <span class="fa fa-clipboard" aria-hidden="true" data-copy="' + (index - 1) + '">COPIER</span></button><button class = "bg-kover text-white" id="exportDocVersion' + index + '"><a href="' + urlDoc + '" class="text-white ">DOC</a></button><button class = "pdf bg-kover text-white" id="exportPdfVersion' + index + '">PDF</button><button type="button" aria-label="Imprimer"><span class="print" aria-hidden="true" data-print="0">IMPRIMER</span></button></span>';
        document.querySelector('#solidVersion' + index + 'ModalContent .modal-header').innerHTML += '<span class="d-flex flex-row align-items-baseline"><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden ="true">&times;</span></button></span>';
        document.querySelector('#solidVersion' + index + 'ModalContent').innerHTML += '<div class="modal-body" id="solidVersion' + index + 'ModalBody" name="solidVersion' + index + 'ModalContent">' + letter + '</div>';
    }

}