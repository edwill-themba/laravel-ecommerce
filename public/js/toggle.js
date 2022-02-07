function hideNavbar() {
    var navigation = document.querySelector(".main-menu");
    navigation.classList.remove("active");
}

function showNavbar() {
    var navigation = document.querySelector(".main-menu");
    navigation.classList.toggle("active");
}