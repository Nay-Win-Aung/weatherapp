<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Weather App</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

  <div class="container py-5">
    <h1 class="mb-3">Weather App</h1>

    <form id="form-submit">
      <div class="mb-3">
        <label for="city" class="form-label">Enter City Name:</label>
        <input type="text" class="form-control" id="city" placeholder="e.g. London">
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <hr>

    <div id="weather-info" class="mt-4" style="display: none;">
      <h3><span id="city-name"></span></h3>
      <p><strong>Temperature:</strong> <span id="city-temp"></span> &deg;C</p>
      <p><strong>Weather:</strong> <span id="city-weather"></span></p>
    </div>
  </div>

  <!-- Include jQuery and Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

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
          appid: "YOUR_APP_ID", // Replace with your own App ID from OpenWeatherMap
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

</body>
</html>
