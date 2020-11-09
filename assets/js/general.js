/**
 * CREATING A DOWNLOADABLE .DOC FILE CONTAINING TEXT
 * @param {string} text 
 */
function generateDOC(text) {
    let blob = new Blob([text], {
        type: 'application/msword'
    });
    return URL.createObjectURL(blob);
}

/**
 * CREATING A DOWNLOADABLE AND ENTITLED .PDF FILE CONTAINING TEXT
 * @param {string} text 
 * @param {string} title 
 */
function generatePDF(text, title) {
    var {
        jsPDF
    } = window.jspdf;
    var doc = new jsPDF();
    doc.text(text, 10, 10);
    doc.save("" + title + ".pdf");
}

/**
 * PRINTING THE TEXT (& OPENING A DOC FILE CONTAINING IT)
 * @param {string} text 
 */
function printVersion(text) {
    var printWindow = window.open('', '', 'height=400,width=800');
    printWindow.document.write('<html><head><title>Lettre</title>');
    printWindow.document.write('</head><body >');
    printWindow.document.write(text);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
    return;
}