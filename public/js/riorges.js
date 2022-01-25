//HAPPY HOUR 


function HappyHour() {
    for (let index = 1; index < 9; index++) {
        prix = document.getElementById(index);
        if (index < 5) {
            if (prix.style.display == "none") {
                prix.style.display = "block"

            } else {
                prix.style.display = "none"
            }
        }
        if (index >= 5) {
            if (prix.style.display == "none") {
                prix.style.display = "block"

            } else {
                prix.style.display = "none"
            }
        }
    }
}
let HappyHours = 0;

//CLOCK 

function currentTime() {
    let date = new Date();
    // const date = new Date('January 22, 2022 0:00:30');
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
                    document.getElementById("Happy-Hour").innerText = "C'EST L'HAPPY HOUR";
                    HappyHours = 1;
                }
            } else {
                if (HappyHours == 1) {
                    document.getElementById("Happy-Hour").innerText = "";
                    HappyHour();
                    HappyHours = 0;
                }
            }
        } else {

            if (hh >= 10 && hh < 24) {
                document.getElementById("status").innerText = "OUVERT";

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