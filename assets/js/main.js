/**
 * STARTING KOVER APP
 * @param {object} project 
 */
function start(project) {
    project.view.start();
    document.querySelector('#startButton').addEventListener('click', function () {
        project.view.srcChoice();
        srcChoice(project);
        let links = document.querySelectorAll('a');
        for (let i = 0; i < links.length; i++) {
            if (links[i].target != "_blank") {
                links[i].addEventListener("click", function (e) {
                    if (confirm("Votre projet ne pourra pas être enregistré ! Cliquez sur OK pour confirmer.") == false) {
                        e.preventDefault(e);
                    };
                })

            }
        }
    });
}

/**
 * CHOOSING A SOURCE (empty|template)
 * @param {object} project 
 */
function srcChoice(project) {
    document.querySelector('#newTextButton').addEventListener('click', function () {
        project = new Project();
        project.view = new View(project);
        textEditor(project);
    });

    document.querySelector('#templateButton').addEventListener('click', function () {
        project = new Project(Date.now(), document.querySelector('#templateText').innerHTML);
        project.view = new View(project);
        textEditor(project);
    });
}

/**
 * EDITING THE ORIGINAL TEXT
 * @param {object} project 
 */
function textEditor(project) {
    project.view.textEditor();
    project.projNameEditor();

    document.querySelector('#userText').addEventListener("click", project.textEditorListener);
    document.querySelector('#multiple').addEventListener("click", function () {
        textSelector(project);
    });
    document.querySelector('#single').addEventListener("click", function () {
        project.originalText = document.querySelector('#userText').innerHTML;
        project.projName = document.querySelector('#projectName').value;
        let urlDoc = generateDOC(project.originalText);
        project.view.singleRender(urlDoc);
        project.finalInteractions();
        document.querySelector('main #saveSelected').addEventListener("click", function () {
            window.addEventListener("click", function () {
                $("#nav").load("./index.php #nav");
            });
        });

    });

}

/**
 * SELECTING PARTS TO EDIT
 * @param {object} project 
 */
function textSelector(project) {

    project.originalText = document.querySelector('#userText').innerHTML;
    project.view.textSelector();
    project.projNameEditor();

    document.querySelector("#originalUserText").addEventListener("click", function () {
        if (window.getSelection().toString().length > 0) {
            project.selecting();
        }
    });

    document.querySelector('#textEditSubmit').addEventListener("click", function () {
        let inputVersion = document.querySelector('#lastSteps #originalUserText').innerHTML;
        project.preparedText = inputVersion;
        versionsSetting(project);
    });
    document.querySelector('#backToTextEdit').addEventListener("click", function () {
        textEditor(project);
    });
}

/**
 * EDITING PREVIOUSLY SELECTED PARTS
 * @param {object} project 
 */
function versionsSetting(project) {
    project.numberOfVersions = document.querySelector('#howManyLetters').value;
    project.view.versionsEditor(project.numberOfVersions, project.originalText, project.preparedText);
    project.projNameEditor();

    $('#heading1+button').click();
    /*project.fixVersion();*/
    document.querySelector('#finishButton').addEventListener("click", function (e) {
        let versions = document.querySelectorAll("div.versionBlock");
        let emptyCounter = 0;
        for (let i = 0; i < versions.length; i++) {
            let inputs = document.querySelectorAll("div[data-content='" + (i + 1) + "'] input");

            let editZones = document.querySelectorAll('div#collapse' + (i + 1) + ' span.toEdit');
            for (let j = 0; j < editZones.length; j++) {
                if (inputs[j].value.length == 0) {
                    editZones[j].style.borderColor = 'red';
                    emptyCounter++;
                }
            }
        }
        if (emptyCounter > 0) {
            if (confirm('Certains champs n\'ont pas été remplis. Pour les remplir, cliquez sur Cancel. Pour les laisser vides, cliquez sur OK.') == false) {
                e.preventDefault();
                return;
            }
        }
        finalRender(project);
    });
    document.querySelector('#backToSelect').addEventListener("click", function () {
        textEditor(project);
        textSelector(project);
    });
}

/**
 * DISPLAYING THE WHOLE PROJECT : ORIGINAL VERSION & RENDERED NEW VERSIONS
 * @param {object} project 
 */
function finalRender(project) {
    project.view.generateVersions();
    project.projNameEditor();

    project.finalInteractions();
    document.querySelector('#backToVersionsEdit').addEventListener("click", function () {
        versionsSetting(project);
    });
}


/**
 * COPYING A VERSION INTO THE CLIPBOARD
 * @param {event} event 
 */
function copyTool(event) {
    let id = Number(event.target.dataset.copy);
    let versions = document.querySelectorAll('main .body');
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




/////// EXECUTION

document.addEventListener("DOMContentLoaded", function () {

    if (!document.querySelector('#userTemplate')) {
        let kover = new Project();
        kover.view = new View(kover);
        start(kover);
    } else {
        project = new Project('', document.querySelector('#userTemplate').innerHTML);
        document.getElementById('userTemplate').remove();
        project.view = new View(project);
        project.view.project = project;
        project.view.textEditor();
        textEditor(project);
    }
});