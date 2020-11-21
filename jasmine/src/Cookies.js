var displayCookiesModal = function (cookie) {
    return (cookie === true) ? false : true;
};

var setCookie = function (cookie, userChoice) {
    return (userChoice === true) ? cookie = true : cookie = false;
};

var displayContent = function (cookie) {
    return (cookie === false) ? './no-cookie.php' : window.location.href;
}