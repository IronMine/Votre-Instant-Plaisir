// NAV-BAR

const menuBtn = document.querySelector('.menu-btn');
let menuOpen = false;
menuBtn.addEventListener('click', () => {
    if (!menuOpen) {
        menuBtn.classList.add('open');
        menuOpen = true;
    } else {
        menuBtn.classList.remove('open');
        menuOpen = false;
    }
});



icons = document.getElementById("icon_map");

icons.addEventListener("mouseover", function(event) {
    document.getElementById("map").style.display = "block"
});
icons.addEventListener("mouseleave", function(event) {
    document.getElementById("map").style.display = "none"
});

function mobileNavbar() {
    divNavbarMobile = document.getElementById("header_mobile");
    if (divNavbarMobile.offsetLeft == 0) {
        divNavbarMobile.style.left = "-280px";
    } else { divNavbarMobile.style.left = 0 }
}




document.querySelector('#contact-form').addEventListener('submit', (e) => {
    e.preventDefault();
    e.target.elements.name.value = '';
    e.target.elements.email.value = '';
    e.target.elements.message.value = '';
});