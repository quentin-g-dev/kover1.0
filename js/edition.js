function editForm() {
    document.getElementById('editionPreview').innerHTML = text; // le texte d'origine est injecté
    let numberOfVersions = document.getElementById('howManyLetters').value;
    document.getElementById('numberOfVersions').innerHTML = numberOfVersions;
    for (let i = 0; i < numberOfVersions; i++) { // Titraille du tableau:
        document.querySelector('#tableHead').innerHTML += "<th scope=\"row\" class=\"bg-info text-white m-1 border-light\">Version " + (i + 2) + "</th>";
    }
    for (let j = 0; j < words.length; j++) { //Injection des rangées du tableau:
        let content = "<tr class=\"mt-3\"><td>" + words[j] + "</td>";
        for (let i = 0; i < numberOfVersions; i++) {
            content += '<td><input data-id-old="' + (j) + '" data-id-new = "' + (i) + '" type="text" placeholder="' + words[j] + '"></td>'; // Les inputs ont deux repères dataset (version cible et position parmi les changements de la version cible)
        }
        content += "</tr>";
        document.querySelector('#tableInner').innerHTML += content;
    }
    return tableDimensions = [document.getElementById('howManyLetters').value, document.querySelectorAll(".expressionToModify").length];
    //  tableDimensions => [0] = nombre de versions à générer ; [1] = nombre d'expressions à modifier
}