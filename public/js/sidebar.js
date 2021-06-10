/* ======================================
    TOGGLE SIDEBAR ON SMALL VIEWPORTS
======================================== */
let sidebar = document.getElementById('sidebar');
let mainContent = document.getElementById('main');
let sidebarToggler = document.getElementById('sidebarToggler');

function toggleSidebar() {
    sidebar.classList.toggle('active');
    mainContent.classList.toggle('active');
}
