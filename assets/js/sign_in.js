function evalSignInForm() {
    if (document.querySelector("#signInName").value.toString().length === 0 || document.querySelector("#signInPass").value.toString().length === 0) {
        alert("Vous n'avez pas rempli tous les champs de connexion.");
        console.log($("#signInName").value);
        return false;
    }
}