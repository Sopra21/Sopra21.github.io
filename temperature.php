<?php
$url = "https://api.openweathermap.org/data/2.5/weather?q=London,uk&appid=a3d9b50b2022aaff3f6b7eb24288e5c8";
$format = "%0.2f";

function celcuis($kelvin){ return $kelvin - 273.15; }
function fahrenheit($kelvin){ return celcuis($kelvin) * 9/5 + 32; }

$response = file_get_contents($url);
$data = json_decode($response, true);
$tempC = sprintf($format, celcuis($data['main']['temp']));
$tempF = sprintf($format, fahrenheit($data['main']['temp']));
$text = "Temperature in London: $tempC °C / $tempF °F";
$file = fopen("temperature.txt", "w");
fwrite($file, $text);
fclose($file);
?>
