<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather App</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mini.css">

  
</head>

<body>

  
  <div class="container-fluid ">
                  
  <!--Navbar -->

<nav class=" navbar fixed-top rounded-5 ">
    <span class="navbar-brand mb-0 ">မိုးလေဝသ အမြန်ကြည့်ကြ ...</span>  
</nav>
 
<!--/Navbar-->   
  

  <!--images-->
   
   <div class="row mt-5">
    <div class="col text-start mt-5">
      <img src="img/1-Yangon-Shwedagon-Pagoda_Benny-Hanigal_Luminous-Journeys-photo-tours-2.jpg" class="rounded-5 col-12 ">
    </div>
    <div class="col">
    <img src="img/img 1.jpg" class=" rounded-5 col-12 mt-5 ">
    </div>
    <div class="col text-end">
    <img src="img/Karaweik-Palace.JPG" class="rounded-5 col-12 mt-5">
    </div>
  </div>
   
 <!--/images-->   
 
<!--form-->
    <form id="form-submit" class="mt-5">
      <div class=" text-center">
        <label for="city" class="form-label ">အောက်က အကွက်လေးထဲမှာ ကိုယ်ကြည့်ချင်တဲ့ မြို့ကို အင်္ဂလိပ်လို ရိုက်ထည့်ပြီး ကြည့်နိုင်ပါတယ်...</label>
        <input type="text" class="form-control" id="city" placeholder="e.g. London">
      </div>
      <div class="text-center ">
      <button type="submit" class="btn ">Submit</button>
      </div>
    </form>

    <hr>

    <div id="weather-info" class="mt-4" style="display: none;">
      <h3><span id="city-name"></span></h3>
      <p><strong>Temperature:</strong> <span id="city-temp"></span> &deg;C</p>
      <p><strong>Weather:</strong> <span id="city-weather"></span></p>
    </div>
    

  
  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery 3.6.0.min.js"></script>
  <script src="ajax/ajax.bootstrap.bundle.min.js"></script>
  
  <!--api-->
  <script>
    $(document).ready(function() {
      // Submit form when user presses Enter key
      $("#city").keypress(function(e) {
        if (e.which == 13) {
          $("#form-submit").submit();
        }
      });

      // Submit form when user clicks Submit button
      $("#form-submit").submit(function(event) {
        event.preventDefault();
        var city = $("#city").val();
        getWeatherInfo(city);
      });
    });

    function getWeatherInfo(city) {
      // Make AJAX request to OpenWeatherMap API
      $.ajax({
        url: "https://api.openweathermap.org/data/2.5/weather",
        dataType: "json",
        data: {
          q: city,
          appid: "033e9a1195103e6401c41f280648ecb0", // Replace with your own App ID from OpenWeatherMap
          units: "metric"
        },
        success: function(data) {
          // If API request is successful, display weather information
          displayWeatherInfo(data);
        },
        error: function(jqXHR, textStatus, errorThrown) {
          // If API request fails, display error message
          alert("Error: " + textStatus + " - " + errorThrown);
        }
      });
    }

    function displayWeatherInfo(data) {
      var cityName = data.name;
      var cityTemp = data.main.temp;
      var cityWeather = data.weather[0].description;
      $("#city-name").text(cityName);
      $("#city-temp").text(cityTemp);
      $("#city-weather").text(cityWeather);
      $("#weather-info").show();
    }
  </script>
  <!--/api-->
  <!--/form-->
  <h6 class="text-end"> developer - Nay Win Aung</h6>
  </div>
  
</body>

</html>
