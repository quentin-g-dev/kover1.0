function toggleMenu() {
    if (document.querySelector("nav").className === "d-none d-md-flex mt-2 mb-3 flex-column flex-md-row flex-no-wrap border-white justify-content-center align-items-center") {
        document.querySelector("nav").className = "d-flex d-md-flex flex-column flex-md-row flex-no-wrap border-white text-white justify-content-center align-items-center";
    } else {
        document.querySelector("nav").className = "d-none d-md-flex mt-2 mb-3 flex-column flex-md-row flex-no-wrap border-white justify-content-center align-items-center";
    }
}


document.addEventListener("DOMContentLoaded", function () {

    document.querySelector(".hamburger").addEventListener("click", toggleMenu);
});