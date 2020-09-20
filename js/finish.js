function generateVersions() {
    let text = document.getElementById("getUserText").innerHTML;
    document.getElementById("accordion").innerHTML += '<div id="collapseOne" class="collapse" data-parent="#accordion" aria-labelledby="headingOne"><div class=" card-body p-5 border border-info rounded-bottom">' + text + '</div></div>'; // Injection de l'original
    for (let i = 0; i < tableDimensions[0]; i++) { // pour chaque nouvelle version:
        let newVersion = text;
        for (let k = 0; k < tableDimensions[1]; k++) { // pour chaque modification à effectuer :
            let myIndex = newVersion.length - Number(reverseIndexTable[k]);
            console.log("myIndex: ", myIndex);
            let newRange = document.createRange();
            newRange.setStart(nodesTable[k], indexTable[k]);
            newRange.setEnd(endNodesTable[k], endOffsetTable[k]);
            newRange.deleteContents();
            let newSpan = document.createElement("span");
            newSpan.innerHTML = document.querySelector('input[data-id-old="' + k + '"][data-id-new="' + i + '"]').value;
            newRange.insertNode(newSpan);
            newVersion = document.getElementById("getUserText").innerHTML;
            newRange.detach();
        }
        versionsTable[i] = newVersion; // La version est fixée. Injection de la nouvelle version :
        document.getElementById('accordion').innerHTML += '<div class=" my-3 card d-flex flex-row justify-content-around align-items-center bg-info text-white"><div><h3 class="d-inline card-header" id="heading' + i + '">Version ' + (i + 2) + '</h3><button class="text-white btn btn-link btn-info border-light" data-toggle="collapse" data-target="#collapse' + i + '">&darr;</button></div><div><button class="btn btn-info border-light"><a href="' + urlPDF + '" class="text-white ">PDF</a></button><button class=" btn btn-info border-light "><a href="' + urlDOC + '" class="text-white ">DOC</a></button><button data-copy =" ' + i + '" class="btn btn-info border-light" onclick="copyTool(event);">COPY</button><button class="btn btn-info border-light " onclick="var printWindow = window.open(urlDOC, \'\');printWindow.print();">PRINT</button></div></div><div id="collapse' + i + '" class="collapse" data-parent="#accordion" aria-labelledby="headingOne"><div class="p-5  border border-info rounded-bottom" data-content="' + i + '">' + newVersion + '</div></div>';
        urlDoc = generateDOC(newVersion); // BUGS : Affiche les balises insérées pendant l'édition. La fonction de copie affiche le contenu en gras.
        urlPDF = generatePDF(newVersion); // BUG : Fonction à refaire | Module externe ? 
    }
    return;
}


function copyTool(event) { // Fonction appelée dans chaque bouton COPY (onclick)
    let id = Number(event.target.dataset.copy);
    let version = versionsTable[id];
    for (let i = 0; i < version.length; i++) {
        version = version.replace("<br>", "\n");
    }
    navigator.clipboard.writeText(version).then(function () {
        alert('Copied !');
    }, function () {
        alert('Problem !');
    });
    return;
}

function generateDOC(text) {
    let blob = new Blob([text], {
        type: 'application/msword'
    });
    urlDOC = URL.createObjectURL(blob);
    return urlDOC;
}

function generatePDF(text) {
    let pdfText = "%PDF-2.0 ";
    pdfText += text;
    let blob = new Blob([text], {
        type: 'application/pdf'
    });
    urlPDF = URL.createObjectURL(blob);
    return urlPDF;
}


/*
    let pdfText = text;
 pdfText = pdfText.replace("<br>", "\n");
 docText = pdfText.replace("<br>", "\r");
 let textTable = text.split('');
 let newStrTable = [];
 let newStr = '';
 for (let i = 0; i < textTable.length; i++) {
     newStrTable.push(text.charCodeAt());
 }
 newStr = newStrTable.join(' ');

 let blob = new Blob([pdfText], {
     type: 'application/pdf'
 });
 urlPDF = URL.createObjectURL(blob);
 return urlPDF;
  */