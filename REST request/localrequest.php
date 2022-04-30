<?php
####Notebook Way (already another nice files with this organized was created )#####
# Recuerda primero activr la API creada por nosotros mismos
# debería estar en otra carpeta, el archivo router.php usa el archivo server.php

# First it is necessary to activate the server wich is located in the other folder
# the other folder contains the files router.php and server.php, router.php is the one we need to activate

# (Windows)
# In the other folder run in the terminal:
# php -S localhost:8000 router.php

echo 'inicio del del tipo GET'.PHP_EOL;

#consultando todo
// $consulta = file_get_contents('http://localhost:8000?resource_type=books').PHP_EOL;
#consultando una colección en específico
// $consulta = file_get_contents('http://localhost:8000?resource_type=books&resource_id=1').PHP_EOL;
#consultando al router.php en lugar del server.php
// $consulta = file_get_contents('http://localhost:8000/books').PHP_EOL;
#consultando específico al router.php en lugar del server.php
$consulta = file_get_contents('http://localhost:8000/books/1').PHP_EOL;

echo $consulta.PHP_EOL;

$data = json_decode($consulta, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo GET'.PHP_EOL;

echo ''.PHP_EOL;

echo 'inicio del del tipo POST'.PHP_EOL;

$data_to_post = [
    'titulo' => 'Lo que el viento creó',
    'id_autor' => '4',
    'id_genero' => '5',
	"timestamp=".time(),
];

$payload = json_encode($data_to_post);

$key = 'APIKEY';
$secret_key = 'APISECRET';

$timestamp = time(); 
$signature = hash_hmac('sha1', $timestamp, $secret_key);

$ch = curl_init('http://localhost:8000/books');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER,
	[ 
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($payload),
		"key: ".$key,
		"sig: ".$signature
	]
);

$result = curl_exec($ch);
curl_close($ch).PHP_EOL;
$data = json_decode($result, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo POST'.PHP_EOL;


echo ''.PHP_EOL;

echo 'inicio del del tipo PUT'.PHP_EOL;

$data_to_put = [
	'titulo' => 'Lo que el viento modificó',
    'id_autor' => '4',
    'id_genero' => '5',
];

$payload_put = json_encode($data_to_put);

$url = 'http://localhost:8000/books/3';

$ch_put = curl_init($url);
curl_setopt($ch_put, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch_put, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch_put, CURLOPT_HTTPHEADER,
	[ 
	'Content-Type: application/json',
	'Content-Length: ' . strlen($payload_put)
	]
);
curl_setopt($ch_put, CURLOPT_POSTFIELDS, $payload_put);

$result1 = curl_exec($ch_put);
curl_close($ch_put).PHP_EOL;
echo 'listo'.PHP_EOL;

$data = json_decode($result1, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo PUT'.PHP_EOL;

echo ''.PHP_EOL;

echo 'inicio del del tipo DELETE'.PHP_EOL;



$url = 'http://localhost:8000/books/2';

$ch_delete = curl_init($url);
curl_setopt($ch_delete, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch_delete, CURLOPT_RETURNTRANSFER, true);

$result2 = curl_exec($ch_delete);
curl_close($ch_delete).PHP_EOL;
echo 'listo'.PHP_EOL;

$data = json_decode($result2, true);
print_r( $data).PHP_EOL;

echo 'fin del tipo DELETE'.PHP_EOL;


