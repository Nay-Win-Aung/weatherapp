$(document) .ready (function() {
    $("#form-submit").submit(function(event){
        performSearch(event)
    });
});

function performSearch(event) {
    var request;
  event.preventDefault();

  request = $.ajax ({
    url:'https://api.openweathermap.org/data/2.5/weather',
    typd :"GET",
    data : {
        q :$ ("#city").val(),
       appid : '033e9a1195103e6401c41f280648ecb0',
       units :('metric')

    
    }
  });

  request.done(function(response){
     formatSearch(response);

  });
}
function formatSearch(jsonObject){
    var city_name = jsonObject.name
    var city_weather = jsonObject.weather[0].main;
    var city_temp = jsonObject.main.temp;
  
     $("#city-name").text(city_name);
     $("#city-weather").text(city_weather);
     $("#city-temp").text(city_temp + "celsius");
}