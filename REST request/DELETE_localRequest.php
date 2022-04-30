<?php
# Recuerda primero activr la API creada por nosotros mismos
# debería estar en otra carpeta, el archivo router.php usa el archivo server.php

# First it is necessary to activate the server wich is located in the other folder
# the other folder contains the files router.php and server.php, router.php is the one we need to activate

# (Windows)
# In the other folder run in the terminal:
# php -S localhost:8000 router.php


echo ''.PHP_EOL;
echo "\e[0;30;46mUsing DELETE method!\e[0m\n".PHP_EOL;
echo '---------------------------'.PHP_EOL;
echo ''.PHP_EOL;


#setting the request
$ch = curl_init('http://localhost:8000/books/2');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

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
echo "\e[0;30;44mEND of --> Using DELETE method!\e[0m\n".PHP_EOL;
echo ''.PHP_EOL;