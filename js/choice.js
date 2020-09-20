function textOperate() {
    let ctrlButtons = document.querySelectorAll('.controlButton');
    if (window.getSelection().toString().length > 0) {
        for (let i = 0; i < ctrlButtons.length; i++) {
            ctrlButtons[i].addEventListener("click", function () {
                let range = window.getSelection().getRangeAt(0);
                let newNode;
                let target = event.currentTarget.id;
                console.log('target ? ', target);
                //prepareText(slctData, target);
                switch (target) {
                    case "bold":
                        newNode = document.createElement('strong');
                        break;
                    case "italic":
                        newNode = document.createElement('em');
                        break;
                    case "underline":
                        newNode = document.createElement('u');
                        break;
                    case "left":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "left";
                        break;
                    case "center":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "center";
                        break;
                    case "right":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "right";
                        break;
                    case "justify":
                        newNode = document.createElement('div');
                        newNode.style.textAlign = "justify";
                        break;
                }
                range.surroundContents(newNode);
                window.getSelection().removeAllRanges();
                range.detach();
                // Déselection du texte 
                newNode = undefined;
                return;
            });
        }
    }
    return;
}

function pasteMe() { ///////////////////// Collage depuis le presse-papier
    //////////////////// !! Ne fonctionne que sur CHROME :
    document.getElementById('userText').click();
    navigator.clipboard.readText().then(function (data) {
        document.getElementById("userText").innerHTML += data;
        document.getElementById("userText").focus();
    });
    return;
}

function getUserText() { ////Récupération du texte saisi 
    text = document.getElementById('userText').innerHTML;
    text = text.replace(/\n/g, "<br>");
    text = text.replace(/\r/g, "<br>");
    document.getElementById('getUserText').innerHTML += text;
    return;
}