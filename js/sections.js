function selectZone() { ///STEP 2 // Extraction d'une sélection à modifier 
    let text = document.getElementById('getUserText').innerHTML;
    if (window.getSelection().toString().length > 0) {
        document.querySelector('#toModify').innerHTML += '<li data-id="' + counter + '" class="expressionToModify"><span class="expressionWords" data-words-id="' + counter + '">' + window.getSelection().toString() + '</span><span class="deleteSection ml-3 text-danger font-weight-bold">X</span></li>'; // +1  sélection à modifier

        words.push(window.getSelection().toString()); // Ajout de la sélection dans le tableau words 

        counter++; // Compteur (inutile ?)

        reverseIndexTable.push(text.length - window.getSelection().getRangeAt(0).startOffset); // L'index inversé 
        nodesTable.push(window.getSelection().getRangeAt(0).startContainer); // Le node d'origine de la chaîne est stocké 
        endNodesTable.push(window.getSelection().getRangeAt(0).endContainer); // Le node final de la chaîne est stocké 
        indexTable.push(window.getSelection().getRangeAt(0).startOffset); // L'index la chaîne est stocké 
        endOffsetTable.push(window.getSelection().getRangeAt(0).endOffset); // L'index final la chaîne 
        lengthTable.push(window.getSelection().toString().length); // La longueur de la chaîne 

        let cross = document.querySelectorAll(".deleteSection"); // Activation des croix rouges
        for (let i = 0; i < cross.length; i++) {
            cross[i].addEventListener("click", function () {
                deleteFromList(i);
            });
        }
        window.getSelection().removeAllRanges(); // Déselection du texte 

        document.getElementById('addSectionButton').disabled = true; // ADD A SECTION désactivé sans sélection courante
        document.getElementById('goToEditionButton').disabled = false; // Activation GO TO EDITION 

        return;
    } else {
        document.getElementById('addSectionButton').disabled = true; // Le bouton ADD A SECTION est désactivé jusqu'à la prochaine sélection
        return;
    }
}

function deleteFromList(i) {
    counter--; // Compteur décrémenté
    let toDelete = document.querySelector('li[data-id = "' + i + '"]');
    toDelete.style.display = "none"; // L'élément est retiré de la liste puis retiré des tableaux associés:
    deleteTableItem(words, i);
    deleteTableItem(lengthTable, i);
    deleteTableItem(reverseIndexTable, i);
    deleteTableItem(indexTable, i);
    deleteTableItem(endOffsetTable, i);
    deleteTableItem(nodesTable, i);
    deleteTableItem(endNodesTable, i);
    return;
}

function deleteTableItem(table, indexToDelete) { // Elément transtypé (string=>array (type 'object')) -> isolé par tri alphabétique des typeof -> élément à supprimer placé en fin de tableau ->  array.pop()
    table[indexToDelete] = table[indexToDelete].toString().split('');
    table.sort(function (a, b) {
        let x = (typeof a);
        let y = (typeof b);
        if (x < y) {
            return -1;
        } else {
            return 0;
        }
    });
    table.pop();
    return;
}