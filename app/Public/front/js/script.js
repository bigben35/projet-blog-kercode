// ---------------PAGE HOME ----------------------

//  ANIMATION MENU BURGER
const btnBurger = document.getElementById('btn-burger');
const navbarLinks = document.querySelector('.navbar-links');

btnBurger.addEventListener('click', (event) => {
    event.preventDefault();
    navbarLinks.classList.toggle('active');
});

// CLASS ACTIVE NAVIGATION 

let menuActive = document.querySelector('.nav-list').getElementsByTagName('a');
console.log(location.href);

for (let i = 0; i < menuActive.length; i++) {
    if (menuActive[i].href === location.href){
        menuActive[0].classList.remove('active');
        menuActive[i].classList.add('active');
    }
    else if (location.href.includes("blog&page=")){
        menuActive[0].classList.remove('active');
        menuActive[1].classList.add('active');
    }
    else if (location.href.includes("article&id=")){
        menuActive[0].classList.remove('active');
        menuActive[1].classList.add('active');
    }
    };
    


// ----------------BOUTON FLECHE POUR REMONTER EN HAUT DE LA PAGE / PRESENT DANS FOOTER-----------------

const btnArrow = document.querySelector('.btn-arrow');
const btnVisibility = () => {
    if (window.scrollY > 700) {
        btnArrow.classList.add('visible');
    } else {
        btnArrow.classList.remove('visible');
    }
};
window.addEventListener('scroll', () => {
   btnVisibility();
})


btnArrow.addEventListener('click', () => {
    window.scrollTo({
        top: 0,
        left:0,
        behavior: 'smooth'
    })
});




