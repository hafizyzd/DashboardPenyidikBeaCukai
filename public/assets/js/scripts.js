// Add this JavaScript code at the bottom of your HTML file, just before the closing </body> tag
document.addEventListener('DOMContentLoaded', function() {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const layoutSidenav = document.getElementById('layoutSidenav');
    
    sidebarToggle.addEventListener('click', function() {
        if (layoutSidenav.style.display !== 'none') {
            layoutSidenav.style.display = 'none';
        } else {
            layoutSidenav.style.display = '';
        }
    });
});