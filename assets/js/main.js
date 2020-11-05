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
        project.view.textEditor();
        textEditor(project);
    });

    document.querySelector('#uploadFileButton').addEventListener('click', function () {
        project.view.uploader();
    });

    document.querySelector('#templateButton').addEventListener('click', function () {
        project = new Project('MyTemplate', 'MyText');
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
    project.view.textEditor(project.projName, project.originalText);
    project.textEditorListener();
    document.querySelector('#submitText').addEventListener("click", function () {
        textSelector(project);
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
    document.querySelector('#addSectionButton').addEventListener("click", project.selecting);

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
}


/**
 * COPYING A VERSION INTO THE CLIPBOARD
 * @param {event} event 
 */
function copyTool(event) {
    let id = Number(event.target.dataset.copy);
    let versions = document.querySelectorAll('#versionsGroup .modal .modal-body');
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
            this.copyTool(event);
        });
    }, function () {
        alert('Problem !');
    });
    return;
}


/////// EXECUTION
if (window.location.href === "http://localhost/dwwm/KOVER/kover1.0/index.php" || window.location.href === "http://localhost/dwwm/KOVER/kover1.0/index.php?disc=1") {

    document.addEventListener("DOMContentLoaded", function () {
        let kover = new Project();
        kover.view = new View(kover);

        start(kover);

    });
}