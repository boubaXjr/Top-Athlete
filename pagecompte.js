document.getElementById('signUp').addEventListener('click', () => {
    document.querySelector('.container').classList.add('right-panel-active');
});

document.getElementById('signIn').addEventListener('click', () => {
    document.querySelector('.container').classList.remove('right-panel-active');
});

// js menu contextuel

document.addEventListener('DOMContentLoaded', function() {
    var userMenu = document.querySelector('.user-menu');
    var dropdownMenu = document.querySelector('.dropdown-menu');

    userMenu.addEventListener('mouseenter', function() {
        dropdownMenu.style.display = 'block';
    });

    userMenu.addEventListener('mouseleave', function() {
        dropdownMenu.style.display = 'none';
    });
});

