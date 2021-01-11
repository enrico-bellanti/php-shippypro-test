<?php 

include "db.php";

function getCodeAp($lat, $lng, $array_ap){
    foreach ($array_ap as $ap) {
        if ($ap['lat'] == $lat && $ap['lng'] == $lng) {
            return $ap['code'];
        }
    }
}

// Fiumicino
$departure =
[
    'lat' => 43.12,
    'lng' => 12.17
];
// Malpensa
$arrival = 
[
    'lat' => 40.10,
    'lng' => 10.12
];


$dep_ap_code = getCodeAp($departure['lat'], $departure['lng'], $airports);
$arr_ap_code = getCodeAp($arrival['lat'], $arrival['lng'], $airports);


$dep_flights = [];
foreach ($flights as $flight) {
    if ($flight['code_departure'] == $dep_ap_code) {
        $dep_flights[] = $flight;
    }
}


$direct_flights = [];
foreach ($dep_flights as $flight) {
    if ($flight['code_arrival'] == $arr_ap_code) {
        $direct_flights[] = $flight;
    }
}

var_dump($direct_flights);



?>