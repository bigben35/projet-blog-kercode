// PAGE METEO 
const APIKEY = '4de684117da6ef7c4cd76cefabd7247e';

const imgIcone = document.querySelector('.logo-meteo');


function weatherIceland()
{
    fetch( `https://api.openweathermap.org/data/2.5/weather?lat=64.1184&lon=-21.858&lang=fr&units=metric&exclude=minutely,hourly&appid=${APIKEY}`)
    .then(function(resp) {
        return resp.json()
    })
    .then(function(data) {
        // console.log(data);
        drawWeather(data);
        getIcon(data);
    })
    
    .catch(function(){
        console.log("error");
    });   
}


function drawWeather(data)
{
    let temp = Math.round(parseFloat(data.main.temp));
    
    document.querySelector('.temps').innerHTML = data.weather[0].description;    
    document.querySelector('.temperature').innerHTML = temp + " °C";    
    document.querySelector('.localisation').innerHTML = data.name;        
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

window.onload = () => {
    weatherIceland();
}
