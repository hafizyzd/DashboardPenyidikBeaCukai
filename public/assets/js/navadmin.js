document.getElementById('navbarDropdown').addEventListener('click', function (e) {
    e.preventDefault();
    var dropdown = new bootstrap.Dropdown(this);
    dropdown.toggle();
});