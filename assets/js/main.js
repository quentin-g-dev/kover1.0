/**
 * STARTING KOVER APP
 * @param {object} project 
 */
function start(project) {
    project.view.start();
    document.querySelector('#startButton').addEventListener('click', function () {
        project.view.srcChoice();
        srcChoice(project);
    });
}

/**
 * CHOOSING A SOURCE (empty|template|file)
 * @param {object} project 
 */
function srcChoice(project) {
    document.querySelector('#newTextButton').addEventListener('click', function () {
        project = new Project();
        project.view = new View(project);
        project.view.project = project;
        textEditor(project);
    });

    document.querySelector('#templateButton').addEventListener('click', function () {
        project = new Project('', document.querySelector('#templateText').innerHTML);
        project.view = new View(project);
        project.view.project = project;
        textEditor(project);
    });
}

/**
 * EDITING THE ORIGINAL TEXT
 * @param {object} project 
 */
function textEditor(project) {
    project.view.textEditor();
    document.querySelector('#userText').addEventListener("click", project.textEditorListener);
    //project.textEditorListener();
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
    project.projName = document.querySelector('#projectName').value;
    project.originalText = document.querySelector('#userText').innerHTML;
    project.view.textSelector();
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
}

/**
 * EDITING PREVIOUSLY SELECTED PARTS
 * @param {object} project 
 */
function versionsSetting(project) {
    project.numberOfVersions = document.querySelector('#howManyLetters').value;
    project.view.versionsEditor(project.numberOfVersions, project.originalText, project.preparedText);
    project.fixVersion();
    document.querySelector('#finishButton').addEventListener("click", function () {
        finalRender(project);
    });
}

/**
 * DISPLAYING THE WHOLE PROJECT : ORIGINAL VERSION & RENDERED NEW VERSIONS
 * @param {object} project 
 */
function finalRender(project) {
    let originalUrlDoc = generateDOC(project.originalText);
    project.view.finalRenderOriginal(originalUrlDoc);
    for (let i = 0; i < project.numberOfVersions; i++) {
        let index = (i + 2);
        let currentTitle = document.querySelector('#fixedVersions #version' + index + 'Fixed > h3').innerHTML;
        let currentLetter = document.querySelector('#fixedVersions #version' + index + 'Fixed > div').innerHTML;
        let urlDoc = generateDOC(currentLetter);
        project.view.finalRenderVersion(index, currentTitle, currentLetter, urlDoc);

    }
    project.finalInteractions();
    document.querySelector('main #saveSelected').addEventListener("click", function () {
        console.log('watcher');

        document.querySelector("#nav").load("./index.php #nav");
    });
}


/**
 * COPYING A VERSION INTO THE CLIPBOARD
 * @param {event} event 
 */
function copyTool(event) {
    let id = Number(event.target.dataset.copy);
    let versions = document.querySelectorAll('main #versionsGroup .version .version-body');
    let currentVersion = versions[id].innerHTML;
    console.log(currentVersion);
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
    for (let i = 0; i < document.querySelectorAll('button').length; i++) {
        document.querySelectorAll('button')[i].addEventListener("mouseenter", function () {
            console.log('salut');
            if (document.querySelector('main #saveSelected')) {
                document.querySelector('main #saveSelected').addEventListener("click", function () {
                    window.addEventListener("click", function () {
                        $("#nav").load("./index.php #nav");
                    });
                });

            }
        });
    }

});