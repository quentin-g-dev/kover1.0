var displayCookiesModal = function (cookie) {
    return (cookie === true) ? false : true;
};

var setCookie = function (boolean) {
    if (boolean === true) {
        document.cookie = "cookies=true;expires=" + Date.now() + 60 * 100 + ";path=/;Secure;";
        return true;
    } else {
        document.cookie = "cookies=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;Secure;";
        return false;
    }
};

var displayContent = function (cookie) {
    return (cookie === false) ? './no-cookie.php' : window.location.href;
}

var detectCookie = function (cookieName) {
    var clearCookie = decodeURIComponent(document.cookie);
    var cookiesArray = clearCookie.split(';');
    for (var i = 0; i < cookiesArray.length; i++) {
        var cookie = cookiesArray[i];
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        if (cookie.indexOf(cookieName + "=") == 0) {
            var value = cookie.substring((cookieName.length + 1), cookie.length);
            console.log(value);
            if (value === "true") {
                return true;
            }
        }
    }
    document.cookie = "cookies=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;Secure;";
    return undefined;
}

// Exécution:

let cookie = detectCookie("cookies");
if (displayCookiesModal(cookie) === false) {
    displayContent(cookie);
} else {
    $("#cookiesModal").modal();
    $('#yes').click(function () {
        setCookie(true);
        $("#cookiesModal").modal('hide');
        return;
    });
    $('#no').click(function () {
        $("#cookiesModal").modal('hide');
        window.location.replace(displayContent(false));
        setCookie(false);

        return;
    });
}