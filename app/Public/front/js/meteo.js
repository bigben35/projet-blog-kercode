// PAGE METEO 

// clé API 
const APIKEY = '4de684117da6ef7c4cd76cefabd7247e';

const imgIcone = document.querySelector('.logo-meteo');
const jourPrevision = document.querySelectorAll('.jour-prevision-nom');
const tempJourPrevision = document.querySelectorAll('.jour-prevision-temp');

// tableau des jours de la semaine 
const joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];


function weatherIceland()
{
    fetch( `https://api.openweathermap.org/data/2.5/weather?lat=64.1184&lon=-21.858&lang=fr&units=metric&exclude=minutely,hourly&appid=${APIKEY}`)
    .then((resp) => {
        return resp.json()
    })
    .then((data) => {
        console.log(data);
        drawWeather(data);
        getIcon(data);
    })
    
    .catch(() => {
        console.log("error");
    });   
}


function drawWeather(data)
{
    let temp = Math.round(parseFloat(data.main.temp));
    
    document.querySelector('.temps').textContent = data.weather[0].description;    
    document.querySelector('.temperature').innerHTML = temp + " °C";    
    document.querySelector('.localisation').textContent = data.name;    
    
    // température jours suivants 
    for(let i = 0; i < 7; i++){
        tempJourPrevision[i].innerText = innerHTML = temp + " °C";
    }
}

function getIcon(data)
{
     // Icone dynamique 

     let heureActuelle = (new Date().getHours() - 2);

     if(heureActuelle >= 7 && heureActuelle < 20) {
         imgIcone.src = `app/Public/ressources/jour/${data.weather[0].icon}.svg`
     } else  {
         imgIcone.src = `app/Public/ressources/nuit/${data.weather[0].icon}.svg`
        }
        
    }
    function tempJour(data){
        
    }

window.onload = () => {
    weatherIceland();
}


// afficher prevision semaine 
let aujourdhui = new Date();
let jourActuel = aujourdhui.toLocaleDateString('fr-FR', {weekday: 'long'});

jourActuel = jourActuel.charAt(0).toUpperCase() + jourActuel.slice(1);

// mettre les jours dans l'ordre à partir d'aujourd'hui 
let ordreJours = joursSemaine.slice(joursSemaine.indexOf(jourActuel)).concat(joursSemaine.slice(0, joursSemaine.indexOf(jourActuel)));

// afficher 3 premieres lettres 
for(let i = 0; i < ordreJours.length; i++){
    jourPrevision[i].innerText = ordreJours[i].slice(0,3);
}


// Température par jour

// console.log(tempJour(data))

