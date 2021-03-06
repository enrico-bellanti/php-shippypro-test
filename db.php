<?php 

$airports = [
    [
        'id' => 1,
        'name' => 'Fiumicino',
        'code' => 1784,
        'lat' => 43.12,
        'lng' => 12.17
    ],
    [
        'id' => 2,
        'name' => 'Ciampino',
        'code' => 5986,
        'lat' => 42.17,
        'lng' => 12.89
    ],
    [
        'id' => 3,
        'name' => 'Malpensa-Milano',
        'code' => 4512,
        'lat' => 40.10,
        'lng' => 10.12
    ],
    [
        'id' => 4,
        'name' => 'Caselle-Torino',
        'code' => 6501,
        'lat' => 44.10,
        'lng' => 11.12
    ]
];

$flights = [
    [
        'code_departure' => 1784, //fco
        'code_arrival' => 4512, //malpensa
        'price' => 70.89
    ],
    [
        'code_departure' => 1784, //fco
        'code_arrival' => 4512, //malpensa
        'price' => 120.89
    ],
    [
        'code_departure' => 5986, //cia
        'code_arrival' => 4512, //malpensa
        'price' => 50.89
    ],
    [
        'code_departure' => 1784, //fco
        'code_arrival' => 6501, // torino
        'price' => 22.89
    ],
    [
        'code_departure' => 1784, //fco
        'code_arrival' => 5986, // cia
        'price' => 8.89
    ],
    [
        'code_departure' => 5986, //cia
        'code_arrival' => 6501, // torino
        'price' => 29.89
    ],
    [
        'code_departure' => 4512, //malpensa
        'code_arrival' => 6501, //torino
        'price' => 13.89
    ],
    [
        'code_departure' => 6501, //torino
        'code_arrival' => 4512, //malpensa
        'price' => 12.89
    ]

];

?>


