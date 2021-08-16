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
        function updateClock(releaseUrl) {
            const t = getTimeRemaining(endtime);

            // let inputTimezoneValue = 0;

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ("0" + (t.hours + inputTimezoneValue)).slice(-2);
            minutesSpan.innerHTML = ("0" + t.minutes).slice(-2);
            secondsSpan.innerHTML = ("0" + t.seconds).slice(-2);
            console.log(inputTimezoneValue);

            if (t.total <= 0) {
                location.assign(releaseUrl);
            }
        }

        // RUN CALLBACK FUNCTION
        updateClock();
        const timeinterval = setInterval(updateClock, 1000);
    }

    /* ======================================
    INITIALIZING COUNTER
    ======================================== */
    let inputTimezoneValueOffset = 0;
    initializeClock("counter", deadline, inputTimezoneValueOffset, releaseUrl);
}

/* ======================================
PROGRESS
======================================== */
if (progressBarUsed) {
    let progress = document.querySelector(".progress-bar");
    let progressIdentifier = document.querySelector(".progress-status-text");
    let progressIdentifierTip = document.querySelector(".progress-status-tip");


    function progressing(initalDate, launchDate, relURL) {

        let progressInterval = setInterval(() => {
            let relDateStamp = new Date(launchDate)
            let today = new Date()

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
                // Calculate seconds
                let seconds = Math.floor(diffInMilliSeconds) % 60;
                diffInMilliSeconds -= seconds * 60;
                let progressMsg = `Released in ${days} days - ${hours} hrs - ${minutes} mins - ${seconds} secs`
                progressIdentifier.innerText = progressMsg;
            }
            timeDiffCalc(today, relDateStamp)

            let initialDateStamp = new Date(initalDate)

            let q = Math.abs(today.getTime() - initialDateStamp.getTime());
            let d = Math.abs(relDateStamp.getTime() - initialDateStamp.getTime());

            let progressWidth = Math.round((q / d) * 100);

            console.log(progressWidth)

            progressIdentifierTip.style.left = `calc(${progressWidth}% - 7px)`
            progress.style.width = `${progressWidth}%`;
            if (progressWidth >= 100) {
                clearInterval(progressInterval)
                location.assign(relURL)
                progressIdentifierTip.style.display = 'none'
                progressIdentifier.innerText = 'We\'re preparing now';
            }
        }, 1000);
    }

    progressing(finalInitialDate, deadline, releaseUrl);
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
