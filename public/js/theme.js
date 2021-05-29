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
        seconds
    };
}


/* ======================================
    INITIALIZING CLOCK TIMER
======================================== */
function initializeClock(id, endtime, targetUrl) {
    const clock = document.getElementById(id);
    const daysSpan = clock.querySelector('.days');
    const hoursSpan = clock.querySelector('.hours');
    const minutesSpan = clock.querySelector('.minutes');
    const secondsSpan = clock.querySelector('.seconds');


    /* ======================================
        CALLBACK FUNCTION AFTER TIMER ENDS
    ======================================== */
    function updateClock() {
        const t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);


        if (t.total <= 0) {
            location.assign(targetUrl);
        }
    }

    // RUN CALLBACK FUNCTION
    updateClock();
    const timeinterval = setInterval(updateClock, 1000);
}


/* ======================================
    INITIALIZING COUNTER
======================================== */
const targetUrl = "https://users.ionichub.co/";
const deadline = '05 29 2021 17:56:59 GMT+0200'; // From here set up the deadline date.
initializeClock('counter', deadline, targetUrl);
