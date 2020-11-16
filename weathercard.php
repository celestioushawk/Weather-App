<?php
if(isset($_POST["submit-button"]))
{
	$place = $_POST['location'];
	$weather_url = 'http://api.openweathermap.org/data/2.5/weather?q=' . $place . '&appid=94b1dbee2a96ebd703b0b69c039837d0&units=metric';
	$data = file_get_contents($weather_url);
	$weather_array = json_decode($data, true);
	//print_r($weather_array);
	$city_name = $weather_array['name'];
	$city_temp = $weather_array['main']['temp'] . "&degC";
	$weather_desc = $weather_array['weather'][0]['main'];
	$wind_speed = $weather_array['wind']['speed'];
	$humidity = $weather_array['main']['humidity'] . "%";
	$pressure = $weather_array['main']['pressure'] . "hpa";
	//$icon_url = "http://openweathermap.org/img/w/". $weather_array['weather'][0]['icon'] . ".png";
	//printf("<img src= '%s' height=50 width=50>", $icon_url);

}
?>



<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
<title>Weather App</title>
</head>
<body>
		<form action="" method="post">
			<div class="search-container">
				<input type="text" name="location" class="search-bar" placeholder="Search for a location...">
				<input type="submit" name="submit-button" value="Search" class="search-button">	
			</div>	
		</form>
		

	<div class="container">
		<div class="widget">
			<div class="left">
				<img src="icon1.png" class="icon">
				<h5 class="weather-status"><?php echo $weather_desc ?></h5>
			</div>
			<div class="right">
				<h5 class="city"><?php echo $city_name ?></h5>
				<h5 class="degree"><?php echo $city_temp ?></h5>
			</div>
			<div class="bottom">
				<div>
					Wind Speed <span><?php echo $wind_speed ?> kmph</span>
				</div>
				<div>
					Humidity <span><?php echo $humidity ?></span>
				</div>
				<div>
					Pressure <span><?php echo $pressure ?> </span>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
	</div>
</body>
</html>

