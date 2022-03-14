//  ANIMATION MENU BURGER
const btnBurger = document.querySelector('.btn-burger');
const navbarLinks = document.querySelector('.navbar-links');

btnBurger.addEventListener('click', () => {
    navbarLinks.classList.toggle('active');
})