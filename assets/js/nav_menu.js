function toggleMenu() {
    if (document.querySelector("nav").classList.contains('d-none')) {
        document.querySelector("nav").classList.remove("d-none");
        document.querySelector("nav").classList.add("d-flex");
        document.querySelector(".hamburger").innerHTML = '<span class="font-weight-bold">x</span>';
    } else {
        document.querySelector("nav").classList.remove("d-flex");
        document.querySelector("nav").classList.add("d-none");
        document.querySelector(".hamburger").innerHTML = "&#9776;";
    }
}



function toggleUserOptions() {
    if (document.querySelector('nav .userOptions').classList.contains('d-md-none')) {
        document.querySelector('nav .userOptions').classList.remove("d-md-none");

    } else {
        document.querySelector('nav .userOptions').classList.add("d-md-none");
    }
}

document.querySelector('header .hamburger').addEventListener('click', toggleMenu);