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
                document.location.href === "./profile.php?vip=" + this.response + "&sect=letters";
                console.log("oui ?");
            } else {
                alert('problem');
            }
            xhr.open('POST', './ajax/letter_deletion.php', true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("letter=" + letterId);
        }

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