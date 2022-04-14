//  ANIMATION MENU BURGER
const btnBurger = document.getElementById('btn-burger');
const navbarLinks = document.querySelector('.navbar-links');

btnBurger.addEventListener('click', (event) => {
    event.preventDefault();
    navbarLinks.classList.toggle('active');
})

// CLASS ACTIVE NAVIGATION 

let menuActive = document.querySelector('.nav-list').getElementsByTagName('a');
console.log(location.href);

for (let i = 0; i < menuActive.length; i++) {
    if (menuActive[i].href === location.href){
        menuActive[0].classList.remove('active');
        menuActive[i].classList.add('active');
    }
    };
    


// ---------------PAGE HOME ----------------------

// ANIMATION SLIDER 
let imgSlider = document.getElementsByClassName('imgSlider');

let step = 0;
let imgNumber = imgSlider.length;

// let precedent = document.querySelector('.precedent');
// let suivant = document.querySelector('.suivant');

function enleverImageActive(){
    for (let i = 0; i < imgNumber; i++) {
        imgSlider[i].classList.remove('active'); 
    }
}

// bouton suivant 
// suivant.addEventListener('click', () => {
//     step++;
//     if(step >= imgNumber){
//         step = 0;
//     }
//     enleverImageActive();
//     imgSlider[step].classList.add('active');
// })

// // bouton precedent 
// precedent.addEventListener('click', () => {
//     step--;
//     if (step < 0) {
//         step = imgNumber - 1;
//     }
//     enleverImageActive();
//     imgSlider[step].classList.add('active');
// })

// défilement slider 
setInterval( () => {
    step++;
    if(step >= imgNumber){
        step = 0;
    }
    enleverImageActive();
    imgSlider[step].classList.add('active');
}, 3000)

