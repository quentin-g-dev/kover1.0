function evalSignUpForm() {
    if (evalUserName() === false) {
        return false;
    } else {
        if (evalUserPass() === false) {
            return false;
        }
    }

}

function evalUserName() {
    if (document.querySelector("input#userName").value.length > 0) {
        if (document.querySelector("input#userName").value.length < 30) {
            if (userNameRegEx(document.querySelector("input#userName").value) === true) {
                return true;
            }
        } else {
            alert('Votre nom d\'utilisateur ne peut dépasser 30 caractères. Merci de faire plus court !');
            return false;
        }
    } else {
        alert('Vous avez oublié de choisir un nom d\'utilisateur !');
        return false;
    }
}

function userNameRegEx(string) {
    // Le nom d'utilisateur ne doit pas comporter de balises.
}

function evalUserPass() {
    if (document.querySelector("input#userPassword").value.length > 0) {
        if (document.querySelector("input#userPassword").value.length < 50) {
            if (userPassRegEx(document.querySelector("input#userPassword").value) === true) {
                if (document.querySelector("input#userPasswordTwice").value === document.querySelector("input#userPassword").value) {
                    return true;
                } else {
                    alert('Les deux saisies du mot de passe ne correspondent pas !');
                    return false;
                }
            } else {
                alert('Votre mot de passe doit être composé de 8 caractères au moins, dont au moins un chiffre, une lettre majuscule une lettre minuscule.');
                return false;
            }
        } else {
            alert('Votre mot de passe ne peut dépasser 50 caractères. Merci de faire plus court !');
            return false;
        }
    } else {
        alert('Vous avez oublié de choisir un mot de passe !');
        return false;
    }
}

function userPassRegEx(string) {
    // Le mot de passe être composé de 8 caractères au moins, dont au moins un chiffre, une lettre majuscule une lettre minuscule. 
    return true;
}