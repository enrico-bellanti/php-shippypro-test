<?php 

// include the database - as making a query from db
include "db.php";

// function to get ap code
function getCodeAp($lat, $lng, $array_ap){
    foreach ($array_ap as $ap) {
        if ($ap['lat'] == $lat && $ap['lng'] == $lng) {
            return $ap['code'];
        }
    }
}

// choose departure and arrival airport
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

// get departure and arrival ap code
$dep_ap_code = getCodeAp($departure['lat'], $departure['lng'], $airports);
$arr_ap_code = getCodeAp($arrival['lat'], $arrival['lng'], $airports);
var_dump($dep_ap_code);

// get all flights which match with dep choice and arr choice
// put the rest of flights which match only with arrival choice in another array to be filtered later
$direct_flights = [];
$arr_flights = [];
$rest_dep_flights = [];

foreach ($flights as $flight) {
    if ($flight['code_departure'] == $dep_ap_code && $flight['code_arrival'] == $arr_ap_code) {
        $direct_flights[] = $flight;
    } elseif ($flight['code_arrival'] == $arr_ap_code) {
        $arr_flights[] = $flight;
    } else {
        $rest_flights[] = $flight;
    }
}

// get all stopovers which match with arr code and dep code
$stopover_flights = [];

foreach ($arr_flights as $second_flight) {
    foreach ($rest_flights as $first_flight) {
        if ($first_flight['code_departure'] == $dep_ap_code && $first_flight['code_arrival'] == $second_flight['code_departure']) {
            $context_not_direct_flight=
                [
                    'code_departure' => $dep_ap_code, 
                    'code_stopover' => '', 
                    'code_arrival' => $arr_ap_code, 
                    'price' => 0
                ];
            $context_not_direct_flight['code_stopover'] =  $first_flight['code_arrival'];
            $context_not_direct_flight['price'] =  $first_flight['price'] + $second_flight['price'];
            $stopover_flights[] = $context_not_direct_flight;
        }
    }
}

// merge arrays with direct flights list and stopover
$results = array_merge($direct_flights, $stopover_flights);

$i = 0;
$lowest_res = 0;
foreach ($results as $res) {
    if ($i == 0) {
        $lowest_res = $res['price'];
    } elseif ($res['price'] < $lowest_res) {
        $lowest_res = $res;
    }
    $i++;
}

// show lowest price in debug
var_dump($lowest_res);

?>