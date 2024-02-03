// Kjo është kodi JavaScript që përdoret për menynë mobile në header dhe ndryshimin e ngjyrës së header-it pasi kalon scroll.

// Selektimi i elementeve nga DOM
const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
const header = document.querySelector('.header.container');

// Ngjarja e ndërhyrjes së përdoruesit (klikimi i hamburger-it)
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});

// Ngjarja e scroll-it
document.addEventListener('scroll', () => {
    var scroll_position = window.scrollY;
    if (scroll_position > 250) {
        header.style.backgroundColor = '#29323c';
    } else {
        header.style.backgroundColor = 'transparent';
    }
});

// Ngjarja e klikimit të elementeve të menysë mobile
menu_item.forEach((item) => {
    item.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        mobile_menu.classList.toggle('active');
    });
});
