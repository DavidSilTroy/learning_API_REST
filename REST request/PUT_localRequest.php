<?php
# Recuerda primero activr la API creada por nosotros mismos
# debería estar en otra carpeta, el archivo router.php usa el archivo server.php

# First it is necessary to activate the server wich is located in the other folder
# the other folder contains the files router.php and server.php, router.php is the one we need to activate

# (Windows)
# In the other folder run in the terminal:
# php -S localhost:8000 router.php


echo ''.PHP_EOL;
echo "\e[0;30;46mUsing PUT method!\e[0m\n".PHP_EOL;
echo '---------------------------'.PHP_EOL;
echo ''.PHP_EOL;

#creating the data with the specific structure
$data_to_put = [
	'titulo' => 'Lo que el viento modificó',
    'id_autor' => '4',
    'id_genero' => '5',
];

#encoding the data in json type
$payload = json_encode($data_to_put);

#setting the request
$ch = curl_init('http://localhost:8000/books/3');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER,
	[ 
	'Content-Type: application/json',
	'Content-Length: ' . strlen($payload)
	]
);

#executing the request
$result = curl_exec($ch);


#ending the request
curl_close($ch).PHP_EOL;

#decoding the data getting like json type to array
$data = json_decode($result, true);

#printing every item from the data
print_r( $data).PHP_EOL;


echo ''.PHP_EOL;
echo '---------------------------'.PHP_EOL;
echo "\e[0;30;44mEND of --> Using PUT method!\e[0m\n".PHP_EOL;
echo ''.PHP_EOL;