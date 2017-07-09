<?php


$url = 'http://w1.weather.gov/xml/current_obs/KTHV.xml'; 
$xml = simplexml_load_file($url); 

//print_r($xml);
echo '<img src="' . $xml->icon_url_base . '/' . $xml->icon_url_name . '" height="45" width ="45"/>&nbsp;';
//echo '<b>'. $xml->location . '</b> ';
echo $xml->weather . ' '; 

echo '<b>' . $xml->temperature_string . '</b>'; 
//echo $xml->relative_humidity, '% humidity'; 


?>