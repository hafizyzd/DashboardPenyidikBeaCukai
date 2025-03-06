window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation on small screens
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
        });
    }

    // Detect screen size change and adjust sidebar visibility
    const adjustSidebarVisibility = () => {
        const screenWidth = window.innerWidth;
        if (screenWidth < 992) {
            document.getElementById('layoutSidenav_nav').classList.add('d-none');
        } else {
            document.getElementById('layoutSidenav_nav').classList.remove('d-none');
        }
    };

    // Initial check and set up
    adjustSidebarVisibility();

    // Add resize event listener to handle dynamic changes in screen size
    window.addEventListener('resize', adjustSidebarVisibility);

});
