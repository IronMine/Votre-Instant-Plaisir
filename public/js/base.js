const svgs = document.getElementsByClassName("svg");
initiateSwitch();

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

divNavbarMobile = document.getElementById("header_mobile");
NavbarMobileopen = 0;

function mobileNavbar() {

    if (NavbarMobileopen == 1) {
        divNavbarMobile.style.left = "-280px";
        NavbarMobileopen = 0;
    } else {
        divNavbarMobile.style.left = 0
        NavbarMobileopen = 1;
        console.log("close");
    }
}



// LOAD 
const imgs = document.querySelectorAll('[data-src]');

window.onload = loader;

function loader() {
    document.getElementById('loader').innerHTML = "";
    document.getElementById('loader').style.display = "none";
    lazyload();
}


const btn = document.querySelector(".btn-toggle");

const currentTheme = localStorage.getItem("theme");

bodyColor = "";


if (currentTheme == "dark") {
    document.body.classList.toggle("dark-mode");
    if (document.getElementById('toggle').checked == false) {
        document.getElementById('toggle').checked = true;

    }
} else if (currentTheme == "light") {
    document.body.classList.toggle("light-mode");
    if (document.getElementById('toggle').checked == true) {
        document.getElementById('toggle').checked = false;

    }
}
opositeTheme = 0;

function lazyload() {
    if (opositeTheme == 1) {
        if (currentTheme == "dark") {
            dataSrcToSrc("light");
        } else {
            dataSrcToSrc("dark");
        }
        return;
    }
    dataSrcToSrc(currentTheme);
    opositeTheme = 1;
    setTimeout(lazyload, 20000);
}

function dataSrcToSrc(ThemeSrc) {
    for (img of imgs) {
        if (img.classList.contains(ThemeSrc)) {
            img.src = img.dataset.src;
        }
    }
}



function initiateSwitch() {
    bodyColor = window.getComputedStyle(document.body, null).getPropertyValue('background-color');
    if (bodyColor == "rgb(206, 206, 206)") {
        document.getElementById('toggle').checked = false;
        bodyColor = "light"
    } else {
        document.getElementById('toggle').checked = true;
        bodyColor = "dark"
    }
    switchSvg(bodyColor)
}


function switchToggle() {
    bodyColor = window.getComputedStyle(document.body, null).getPropertyValue('background-color');
    if (bodyColor == "rgb(206, 206, 206)") {
        console.log("noir");
        bodyColor = "dark";
        document.body.classList.toggle("dark-mode");
        document.body.classList.remove("light-mode")

    } else {
        console.log("blanc");
        bodyColor = "light"
        document.body.classList.toggle("light-mode");
        document.body.classList.remove("dark-mode")

    }

    var theme = document.body.classList.contains("dark-mode") ? "dark" : "light";



    switchSvg(bodyColor);

    localStorage.setItem("theme", theme);
}

function switchSvg(bodyColor) {
    for (svg of svgs) {
        if (bodyColor == "dark") {
            if (svg.classList.contains('light')) {
                svg.style.display = "none";
            }
            if (svg.classList.contains('dark')) {
                svg.style.display = "";
            }


        } else {
            if (svg.classList.contains('light')) {
                svg.style.display = "";
            }
            if (svg.classList.contains('dark')) {
                svg.style.display = "none";
            }
        }
    };
}