//HAPPY HOUR 
let HappyHours = 0;

function HappyHourTest(date, hh) {
    if (hh < 20 && hh > 17) {
        DateHappyHour = new Date();
        test = DateHappyHour.setHours(20);
        test = DateHappyHour.setMinutes(0);
        test = DateHappyHour.setSeconds(0);
        var difference = DateHappyHour - date;
        if (difference >= 0) {
            var seconds = Math.floor(difference / 1000);
            var minutes = Math.floor(seconds / 60);
            var hours = Math.floor(minutes / 60);
            hours %= 24;
            minutes %= 60;
            seconds %= 60;
            let countdown = hours + " : " + minutes + " : " + seconds;
            document.getElementById("Happy-Hour-timer").innerText = countdown;
        }
        if (HappyHours == 0) {
            HappyHour();
            document.getElementById("Happy-Hour").innerText = "IL RESTE ";
            document.getElementById("Happy-Hour").innerText = "D'HAPPY HOUR";
            HappyHours = 1;
        }
    } else {
        if (HappyHours == 1) {
            document.getElementById("Happy-Hour").innerText = "";
            HappyHour();
            HappyHours = 0;
        }
    }
}

function HappyHour() {
    divHH = document.getElementById("prix-bieres-HH");
    divNoHH = document.getElementById("prix-bieres");

    if (HappyHours == 1) {
        divHH.style.display = "none";
        divNoHH.style.display = "block";
    } else {
        divNoHH.style.display = "none";
        divHH.style.display = "block";
    }

}


//CLOCK 

function currentTime() {
    let date = new Date();
    // const date = new Date('January 27, 2022 18:00:30');
    let dd = date.getDay();
    let hh = date.getHours();
    let mm = date.getMinutes();
    let ss = date.getSeconds();



    hh = (hh < 10) ? "0" + hh : hh;
    mm = (mm < 10) ? "0" + mm : mm;
    ss = (ss < 10) ? "0" + ss : ss;

    let time = hh + " : " + mm + " : " + ss + " " + dd;
    if (dd != 0 && dd != 1) {
        if (dd == 2 || dd == 3) {
            if (hh < 23 && hh >= 11) {
                document.getElementById("status").innerText = "OUVERT";
            } else {
                document.getElementById("status").innerText = "FERMÉ"
            }
            HappyHourTest(date, hh);
        } else {


            if (hh >= 10 && hh < 24) {
                document.getElementById("status").innerText = "OUVERT";
                HappyHourTest(date, hh);

            } else if (hh >= 0 && hh < 1 && dd != 4) {
                document.getElementById("status").innerText = "OUVERT";
            } else {
                document.getElementById("status").innerText = "FERMÉ";
            }
        }
    } else {
        if (dd == 0 && hh < 1) {
            document.getElementById("status").innerText = "OUVERT";
        } else {

            document.getElementById("status").innerText = "FERMÉ";
        }
    }



    document.getElementById("clock").innerText = time;
    let t = setTimeout(function() {
        currentTime()
    }, 1000);
}

currentTime();

lastMovingBar = "";
lastMovingBarId = "";
first = document.getElementsByClassName("active");
movingBar = document.getElementById("moving-bar");


for (let item of first) {
    lastMovingBar = item;
    width = item.offsetWidth + "px"
    movingBar.style.width = width;
};

function movingbar(el, id) {
    position_left = el.getBoundingClientRect().left
    width = el.offsetWidth + "px"
    movingBar.style.width = width;
    movingBar.style.left = position_left + 'px';
    lastMovingBar.classList.remove("active");
    el.classList.add("active");


    show = document.getElementById(id)

    console.log(lastMovingBarId);

    if (lastMovingBarId == "") {
        hide = document.getElementById(1);
        hide.style.display = "none";
    } else {
        hide = document.getElementById(lastMovingBarId);
        hide.style.display = "none";
    }

    show.style.display = "block";

    lastMovingBar = el;
    lastMovingBarId = id;
}


// SKATE ANIMATION

function skate() {
    document.getElementById("animation_skate")

}