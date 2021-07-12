let progressBarUsed = document.querySelector(".progress-used");
if (!progressBarUsed) {
    /* ======================================
    CALCULATE THE REMAINING TiME
    ======================================== */
    function getTimeRemaining(endtime) {
        const total = Date.parse(endtime) - Date.parse(new Date());
        const seconds = Math.floor((total / 1000) % 60);
        const minutes = Math.floor((total / 1000 / 60) % 60);
        const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
        const days = Math.floor(total / (1000 * 60 * 60 * 24));

        return {
            total,
            days,
            hours,
            minutes,
            seconds,
        };
    }

    /* ======================================
    INITIALIZING CLOCK TIMER
    ======================================== */
    function initializeClock(id, endtime, inputTimezoneValue) {
        const clock = document.getElementById(id);
        const daysSpan = clock.querySelector(".days");
        const hoursSpan = clock.querySelector(".hours");
        const minutesSpan = clock.querySelector(".minutes");
        const secondsSpan = clock.querySelector(".seconds");

        /* ======================================
        CALLBACK FUNCTION AFTER TIMER ENDS
        ======================================== */
        function updateClock() {
            const t = getTimeRemaining(endtime);

            // let inputTimezoneValue = 0;

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ("0" + (t.hours + inputTimezoneValue)).slice(-2);
            minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
            secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);

            if (t.total <= 0) {
                location.assign("https://users.ionichub.co/");
            }
        }

        // RUN CALLBACK FUNCTION
        updateClock();
        const timeinterval = setInterval(updateClock, 1000);
    }

    /* ======================================
    INITIALIZING COUNTER
    ======================================== */
    const deadline = "08 29 2021 14:21:59 GMT+0200"; // From here set up the deadline date.
    let inputTimezoneValueOffset = 24;
    initializeClock("counter", deadline, inputTimezoneValueOffset);
}

/* ======================================
PROGRESS
======================================== */
if (progressBarUsed) {
    let progress = document.querySelector(".progress-bar");
    let progressIdentifier = document.querySelector(".progress-status-text");
    let progressIdentifierTip = document.querySelector(".progress-status-tip");

    (function progressing() {
        setInterval(function () {
            let today = new Date();
            let initalDate = new Date("07/10/2021 16:55:00");
            let launchDate = new Date("07/12/2021 22:10:00");

            function timeDiffCalc(initDate, relDate) {
                let diffInMilliSeconds = Math.abs(relDate.getTime() - initDate.getTime()) / 1000;
                // Calculate days
                let days = Math.floor(diffInMilliSeconds / 86400);
                diffInMilliSeconds -= days * 86400;
                // Calculate hours
                let hours = Math.floor(diffInMilliSeconds / 3600) % 24;
                diffInMilliSeconds -= hours * 3600;
                // Calculate minutes
                let minutes = Math.floor(diffInMilliSeconds / 60) % 60;
                diffInMilliSeconds -= minutes * 60;
                progressIdentifier.innerText =`Released in ${days} days - ${hours} hrs - ${minutes} mins`;
                console.log(progressIdentifier.innerText)
            }
            timeDiffCalc(today, launchDate);

            let q = Math.abs(today.getTime() - initalDate.getTime());
            let d = Math.abs(launchDate.getTime() - initalDate.getTime());

            let progressWidth = Math.round((q / d) * 100);

            progressIdentifierTip.style.left = `calc(${progressWidth}% - 7px)`
            progress.style.width = `${progressWidth}%`;
            if (progressWidth > 70) {
                document.querySelector('.progress-status').classList.add('float-end');
            } else if (progressWidth >= 100) {
                location.assign("https://ionichub.co/");
            }
        }, 1000);
    })();
}

/* ======================================
PARALLAX SHADOW EFFECT
======================================== */
let parallaxedHeading = document.querySelector(".theme-2-main-heading.ta");
if (parallaxedHeading) {
    document.addEventListener("mousemove", function (e) {
        let x = e.clientX / 250;
        let y = e.clientY / 250;
        let comma = ",";
        parallaxedHeading.style.textShadow = `${x}px ${y}px 0px #eb452b${comma} ${x*2}px ${y*2}px 0px #353055${comma} ${x*3}px ${y*3}px 0px #46b59b${comma} ${x*4}px ${y*4}px 0px #017e7f`;
    });
}

/* ======================================
PARALLAX ELEMENTS
======================================== */
let pxEls = document.querySelectorAll(".parallax-el");
if (pxEls) {
    document.addEventListener("mousemove", function (e) {
        let x = e.clientX / 50;
        let y = e.clientY / 50;
        let comma = ",";

        pxEls.forEach((pxEl, idx) => {
            pxEl.style.transform = `translate(${x}px${comma}${y}px) rotateX(${x/2}deg)`;
            if (idx === pxEls.length - 1) {
                pxEl.style.transform = `translate(-${x}px${comma}-${y}px)`;
            }
        });
    });
}

/* ======================================
IMPORT DIFFERNT PARTICLE.JS JSON FILES
======================================== */
function compareViewports(jsonFile, jsonAltFile) {
    if (window.innerWidth > 768) {
        particlesJS.load("particles-js", `${jsonFile}`, function () {
            console.log("particles is moving");
        });
    } else {
        particlesJS.load("particles-js", `${jsonAltFile}`, function () {
            console.log("particles is moving");
        });
    }
}
