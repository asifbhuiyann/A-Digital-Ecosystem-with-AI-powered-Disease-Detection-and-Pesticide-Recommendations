<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Forecast</title>
    <link rel="stylesheet" href="weather.css">
</head>
<style>
    body {
    font-family: Arial, sans-serif;
    background-color: #557e2f; 
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.container {
    text-align: center;
    background-color: #d3e0c7;
    padding: 20px;
    height: 500px;
    width: 500px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

h1 {
    font-size: 28px;
    color: #2e4d1d; 
}

.location {
    font-size: 18px;
    color: #555; 
}

.weather {
    font-size: 24px;
    color: #2e4d1d; 
}

@keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
}

.weather {
    font-size: 24px;
    color: #2e4d1d; 
    animation: fadeIn 1s ease-in-out; 
}

.btn {
    background-color: #4b9741;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 15px 20px;
    font-size: 20px;
    cursor: pointer;
}

.btn:hover {
    background-color: #f07422;
}
</style>
<body>
    
    <div class="container">
        <h1>আবহাওয়ার পূর্বাভাস</h1>
        <div class="location">
            <p>লোড হচ্ছে...</p>
        </div>
        <div class="weather">
            <p> আজকের তাপমাত্রা: <span id="temperature" class="hidden">--°C</span></p>
            <p> অনুভূত হচ্ছে: <span id="feels-like" class="hidden">-- °C</span></p>
            <p> আদ্রতা: <span id="humidity" class="hidden">-- %</span></p>
            <p> বাতাসের গতি: <span id="wind-speed" class="hidden">-- km/h </span></p>
            <p>বিস্তারিত: <span id="description" class="hidden"></p>
                <div id="weather-animation">
                    <div class="sun hidden"></div>
                    <div class="rain hidden"></div>
                </div>
                <button type="button" class="btn" name="weekforecast">আগামী ৭ দিনের তাপমাত্রা দেখতে ক্লিক করুন</button>
        </div>
    </div>

    <script>
        // Replace 'YOUR_API_KEY' with your OpenWeatherMap API key
        const apiKey = 'Provide_Open_Weather_Api';

        function fetchWeatherData() {
            if ("geolocation" in navigator) {
                navigator.geolocation.getCurrentPosition(async (position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    const apiUrl = `https://api.openweathermap.org/data/2.5/weather?lat=${latitude}&lon=${longitude}&appid=${apiKey}&units=metric`;

                    try {
                        const response = await fetch(apiUrl);
                        const data = await response.json();

                        document.querySelector('.location').innerHTML = `<p>Location: ${data.name}, ${data.sys.country}</p>`;
                document.querySelector('#temperature').textContent = `${data.main.temp}°C`;
                document.querySelector('#description').textContent = data.weather[0].description;
                document.querySelector('#humidity').textContent = `Humidity: ${data.main.humidity}%`;
                document.querySelector('#feels-like').textContent = `Feels Like: ${data.main.feels_like}°C`;
                document.querySelector('#wind-speed').textContent = `Wind Speed: ${data.wind.speed} m/s`;
                    } catch (error) {
                        console.error("Error fetching weather data:", error);
                    }
                });
            } else {
                document.querySelector('.location').innerHTML = "<p>Geolocation is not supported by your browser.</p>";
            }
        }

        fetchWeatherData();

function updateWeatherDetails(data) {
    document.querySelector('.location').innerHTML = `<p>Location: ${data.name}, ${data.sys.country}</p>`;
    const temperatureElement = document.querySelector('#temperature');
    const descriptionElement = document.querySelector('#description');
    
    temperatureElement.textContent = `${data.main.temp}°C`;
    descriptionElement.textContent = data.weather[0].description;


    temperatureElement.classList.remove('hidden');
    descriptionElement.classList.remove('hidden');
    const temperature = data.main.temp;
    const description = data.weather[0].description.toLowerCase();

    temperatureElement.textContent = `${temperature}°C`;
    descriptionElement.textContent = data.weather[0].description;

    if (temperature > 30) {
        showSun();
    } else {
        hideSun();
    }

    if (description.includes("rain")) {
        showRain();
    } else {
        hideRain();
    }

    temperatureElement.classList.remove('hidden');
    descriptionElement.classList.remove('hidden');
}
function showSun() {
    const sunElement = document.querySelector('.sun');
    sunElement.classList.remove('hidden');
}

function hideSun() {
    const sunElement = document.querySelector('.sun');
    sunElement.classList.add('hidden');
}

function showRain() {
    const rainElement = document.querySelector('.rain');
    rainElement.classList.remove('hidden');
}

function hideRain() {
    const rainElement = document.querySelector('.rain');
    rainElement.classList.add('hidden');
}


    </script>
</body>
</html>
