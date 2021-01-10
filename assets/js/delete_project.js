document.querySelector("#deleteProject").addEventListener("click", function () {
    let myProjName = document.querySelector("#projName").innerHTML;
    let xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.location.href = "./profile.php?vip=" + this.response + "&sect=letters";
        }
    }
    xhr.open('POST', './ajax/project_deletion.php', true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("projName=" + myProjName);
});