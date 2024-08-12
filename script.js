// script.js

document.addEventListener('DOMContentLoaded', function() {
    const menuIcon = document.getElementById('menuIcon');
    const navbarMenu = document.getElementById('navbarMenu');

    menuIcon.addEventListener('click', function() {
        navbarMenu.classList.toggle('show');
    });
});

new DataTable('employee-details', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});