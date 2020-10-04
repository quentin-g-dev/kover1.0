var langCode;

function getSessionLang() {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            langCode = this.responseText;
        }
    };
    xmlhttp.open("GET", "./ajax/session_lang.php?getlangCode=1", true);
    xmlhttp.send();
    console.log("get");
    console.log(langCode);
    console.log(this.responseText);
    return langCode;
}

langCode = getSessionLang();
//langCode = ajaxFunction(){//Get $_SESSION['lang'];}

function cleanString(str) {
    let strArr = str.split('');
    for (i in strArr) {
        if (strArr[i] === ' ') {
            strArr[i] === '';
        }
    }
    return strArr.join('');
}

// Avalaible for langCode : 'EN', 'FR'(default), 'ES'

function translate(langCode) {
    var elements = document.querySelectorAll('html *');
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].innerHTML != "" && elements[i].innerHTML != " ") {
            let elementToTest = elements[i].innerHTML;
            for (let j = 0; j < translations.length; j++) {

                /*if (cleanString(elementToTest) === cleanString(translations[j].french) || elementToTest === translations[j].english || elementToTest === translations[j].spanish) {*/
                if (elementToTest.trim() === translations[j].french.trim() || elementToTest.trim() === translations[j].english.trim() || elementToTest.trim() === translations[j].spanish.trim()) {

                    switch (langCode) {
                        case 'EN':
                            elements[i].innerHTML = translations[j].english;
                            break;
                        case 'FR':
                            elements[i].innerHTML = translations[j].french;
                            break;
                        case 'ES':
                            elements[i].innerHTML = translations[j].spanish;
                            break;
                        default:
                            elements[i].innerHTML = translations[j].french;
                            break;
                    }
                }
            }
        }
    }
}



function setSessionLang(langCode) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            langCode = this.responseText;
        }
    };
    xmlhttp.open("GET", "./ajax/session_lang.php?setlangCode=" + langCode, true);
    xmlhttp.send();
    console.log("set");
    console.log(this.responseText);
}


translate(document.querySelector(".selectLang").value);

document.querySelector(".selectLang").addEventListener("change", function () {
    langCode = document.querySelector(".selectLang").value;
    translate(langCode);
    setSessionLang(langCode);
});