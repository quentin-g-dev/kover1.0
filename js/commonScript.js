// Variables globales
let counter = 0;
let reverseIndexTable = [];
let indexTable = [];
let endOffsetTable = [];
let nodesTable = [];
let endNodesTable = [];
let lengthTable = [];
let tableDimensions = [];
let tableContent = '';
let words = [];
let urlDOC = "";
let urlPDF = "";
let text = '';
let versionsTable = [];
let newText = '';


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
                    counter = 0;
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
                    document.getElementById('numberOfVersions').innerHTML = '';
                    document.querySelector('#tableHead').innerHTML = '';
                    document.querySelector('#tableInner').innerHTML = '';
                    document.getElementById("accordion").innerHTML = '';
                    tableDimensions = [];
                    urlDoc = '';
                    urlPdF = '';
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