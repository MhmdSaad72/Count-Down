/* ======================================
    ADD PAGE TRANSITION
======================================== */
const sidebarLinks = document.querySelectorAll('.sidebar-link');
const pageHolder = document.querySelector('.transitionHolder');

if (sidebarLinks.length > 0) {
    // Make sidebar link hide the current page on click
    sidebarLinks.forEach((sidebarLink) => {
        sidebarLink.addEventListener('click', function (event) {
            if( event.which == 2 || (event.which == 1 && event.ctrlKey )) {
                event.preventDefault();
            } else {
                pageHolder.classList.add('fade');
            }
        });
    });
}

// Showing up the page after it fully reloaded
window.addEventListener("load", () => {
    window.setTimeout(function() {
        pageHolder.classList.remove('fade');
    }, 300);
});

/* ======================================
    SUCCESS FLASH MESSAGE
======================================== */
const alertPopup = document.querySelector('.flash-msg-popup');

if (typeof(alertPopup) != 'undefined' && alertPopup != null) {
    // Showing up the page popup on page reload
    window.addEventListener("load", () => {
        window.setTimeout(function() {
            alertPopup.classList.remove('is-dismissed');
        }, 400);
    });

    // Hiding the page popup on after 4 seconds
    window.addEventListener("load", () => {
        window.setTimeout(function() {
            alertPopup.classList.add('is-dismissed');
        }, 4000);
    });
}
