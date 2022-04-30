<?php
# Recuerda primero activr la API creada por nosotros mismos
# debería estar en otra carpeta, el archivo router.php usa el archivo server.php

# First it is necessary to activate the server wich is located in the other folder
# the other folder contains the files router.php and server.php, router.php is the one we need to activate

# (Windows)
# In the other folder run in the terminal:
# php -S localhost:8000 router.php

echo ''.PHP_EOL;
echo "\e[0;30;46mUsing GET method!\e[0m\n".PHP_EOL;
echo '---------------------------'.PHP_EOL;

#consultando la colección completa (si se unicamente server.php)
#Requesting the whole colection (when server.php was usied only)
$thedata = file_get_contents('http://localhost:8000?resource_type=books').PHP_EOL;
echo "\e[0;30;41mExample 1: (works only with server.php)\e[0m\n".PHP_EOL;
echo 'Request with http://localhost:8000?resource_type=books'.PHP_EOL;
echo $thedata.PHP_EOL;
echo ''.PHP_EOL;

#consultando una colección en específico (si se unicamente server.php)
#Requesting a specific colection (when server.php was usied only)
echo "\e[0;30;41mExample 2: (works only with server.php)\e[0m\n".PHP_EOL;
$thedata = file_get_contents('http://localhost:8000?resource_type=books&resource_id=1').PHP_EOL;
echo 'Request with http://localhost:8000?resource_type=books&resource_id=1'.PHP_EOL;
echo $thedata.PHP_EOL;
echo ''.PHP_EOL;

#consultando la colección completa (ahora usando router.php)
#Requesting the whole colection (now using router.php)
$thedata = file_get_contents('http://localhost:8000/books').PHP_EOL;
echo "\e[0;34;47mExample 3: (works only with router.php)\e[0m\n".PHP_EOL;
echo 'Request with http://localhost:8000/books'.PHP_EOL;
echo $thedata.PHP_EOL;
echo ''.PHP_EOL;

#consultando una colección en específico (ahora usando router.php)
#Requesting a specific colection (now using router.php)
$thedata = file_get_contents('http://localhost:8000/books/1').PHP_EOL;
echo "\e[0;34;47mExample 4: (works only with router.php)\e[0m\n".PHP_EOL;
echo 'Request with http://localhost:8000/books/1'.PHP_EOL;
echo ''.PHP_EOL;
echo $thedata.PHP_EOL;
echo ''.PHP_EOL;
echo "\e[0;34;47mExtra: (works only with router.php)\e[0m\n".PHP_EOL;
echo 'Now everything looking nice with print_r(json_decode($thedata, true)):'.PHP_EOL;
$data = json_decode($thedata, true);
echo ''.PHP_EOL;
print_r( $data).PHP_EOL;
echo ''.PHP_EOL;


echo '---------------------------'.PHP_EOL;
echo "\e[0;30;44mEND of --> Using GET method!\e[0m\n".PHP_EOL;
echo ''.PHP_EOL;