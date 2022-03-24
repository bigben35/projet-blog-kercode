// PAGE METEO 
const APIKEY = '4de684117da6ef7c4cd76cefabd7247e';


function weatherIceland()
{
    fetch( `https://api.openweathermap.org/data/2.5/weather?lat=64.1184&lon=-21.858&lang=fr&units=metric&exclude=minutely,hourly&appid=${APIKEY}`)
    .then(function(resp) {
        return resp.json()
    })
    .then(function(data) {
        drawWeather(data);
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

window.onload = () => {
    weatherIceland();
}