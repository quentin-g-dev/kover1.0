// Selecting/Unselecting all results

function checkAllVersions() {
    let checkBoxes = document.querySelectorAll('input[type="checkbox"]');
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

document.querySelector('#selectAll').addEventListener("click", checkAllVersions);

// Multiple DOC Exports

document.querySelector('#docExportSelected').addEventListener("click", function () {
    let checkBoxes = document.querySelectorAll('input[type="checkbox"]');
    let urlList = [];
    for (let i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked === true) {
            let index = checkBoxes[i].dataset.letter;
            let myText = document.querySelector('.modal-body[data-letter="' + index + '"').innerHTML;
            let myURL = generateDOC(myText);
            urlList.push(myURL);
        }
    }
    for (let i = 0; i < urlList.length; i++) {
        window.open(urlList[i]);
    }
});

// Multiple PDF Exports

document.querySelector('#pdfExportSelected').addEventListener("click", function () {
    let checkBoxes = document.querySelectorAll('input[type="checkbox"]');
    for (let i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked === true) {
            let index = checkBoxes[i].dataset.letter;
            let myText = document.querySelector('.modal-body[data-letter="' + index + '"').innerHTML;
            let myTitle = document.querySelector('.modal-title[data-letter="' + index + '"').innerHTML.trim();
            console.log(myText, myTitle);
            generatePDF(myText, myTitle);
        }
    }
});


// Multiple Deleting
document.querySelector('#deleteSelected').addEventListener("click", function () {
    let checkBoxes = document.querySelectorAll('input[type="checkbox"]');
    for (let i = 0; i < checkBoxes.length; i++) {
        if (checkBoxes[i].checked === true) {
            let index = checkBoxes[i].dataset.letter;
            let letterId = document.querySelector('input[type="hidden"][data-letter="' + index + '"]').value;
            console.log(letterId);
            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    window.location.reload();
                }
            }
            xhr.open('POST', './ajax/letter_deletion.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("letter=" + letterId);
        }
    }
});




// Activating COPY Buttons

let copyButtons = document.querySelectorAll('.details .copyButton');
for (let i = 0; i < copyButtons.length; i++) {
    copyButtons[i].addEventListener("click", function (event) {
        let index = copyButtons[i].dataset.letter;
        let text = document.querySelector('.modal-body[data-letter="' + index + '"]').innerHTML;
        text = text.replace("<br>", "\n");
        navigator.clipboard.writeText(text).then(function () {
            event.target.innerHTML = 'Copié !';
            event.target.style.color = "green";
            setTimeout(function () {
                event.target.innerHTML = 'COPIER';
                event.target.style.color = "initial";
            }, 2500);
        }, function () {
            alert('Problem !');
        });
    });
}


// Activating DELETE Buttons

let deleteButtons = document.querySelectorAll('.deleteButton');
for (let i = 0; i < deleteButtons.length; i++) {
    deleteButtons[i].addEventListener("click", function () {
        let letterId = document.querySelector('#reference' + i + '').value;
        console.log(letterId);
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                window.location.reload();
            }
        }
        xhr.open('POST', './ajax/letter_deletion.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("letter=" + letterId);
    });
}

// Activating DOC Buttons

let docButtons = document.querySelectorAll('.details .docButton');
for (let i = 0; i < docButtons.length; i++) {

    let index = docButtons[i].dataset.letter;
    let text = document.querySelector('.modal-body[data-letter="' + index + '"]').innerHTML;
    text = text.replace("<br>", "\n");
    let docURL = generateDOC(text);
    docButtons[i].outerHTML = '<a href="' + docURL + '" >' + docButtons[i].outerHTML + '</a>';
}
// Activating PDF Buttons

let pdfButtons = document.querySelectorAll('.details .pdfButton');
for (let i = 0; i < pdfButtons.length; i++) {
    pdfButtons[i].addEventListener("click", function () {
        let index = pdfButtons[i].dataset.letter;
        let text = document.querySelector('.modal-body[data-letter="' + index + '"]').innerHTML;
        text = text.replace("<br>", "\n");
        let title = document.querySelector('.modal-title[data-letter="' + index + '"]').innerHTML;
        generatePDF(text, title);
    });
}

// Activating PRINT Buttons

let printButtons = document.querySelectorAll('.details .printButton');
for (let i = 0; i < printButtons.length; i++) {
    printButtons[i].addEventListener("click", function () {
        let index = printButtons[i].dataset.letter;
        let text = document.querySelector('.modal-body[data-letter="' + index + '"]').innerHTML;
        printVersion(text);
    });
}

// Activating NEW PROJECT Buttons

let newProjButtons = document.querySelectorAll('.newProjButton');
for (let i = 0; i < newProjButtons.length; i++) {
    newProjButtons[i].addEventListener("click", function () {
        let index = newProjButtons[i].dataset.letter;
        let text = document.querySelector('.modal-body[data-letter="' + index + '"').innerHTML;
        let xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                window.open("./index.php");
            }
        }
        xhr.open('POST', './ajax/newproject_oldLetter.php', true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("text=" + text);
    });
}