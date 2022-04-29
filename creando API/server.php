<?php

//Definimos los recursos disponibles
$allowedResourceTypes = [
    'books',
    'authors',
    'genres',
];

//validamos que el recueso esté disponible
$resourceType = $_GET['resource_type'];

if (!in_array( $resourceType, $allowedResourceTypes )) {
    # code...
    die;
}

//Defino los recursos
$books = [
    1 =>[
        'titulo' => 'Lo que el viento se llevó',
        'id_autor' => 2,
        'id_genero' => 1,
    ],
    2 =>[
        'titulo' => 'Lo que el viento trajo',
        'id_autor' => 1,
        'id_genero' => 3,
    ],
    3 =>[
        'titulo' => 'Lo que el viento ignoró',
        'id_autor' => 3,
        'id_genero' => 2,
    ],
    ];

header('Content-Type: application/json');

//Levantamos el id del recurso buscado
$resourceId = array_key_exists('resource_id', $_GET) ? $_GET['resource_id'] : '';

//Generamos la respuesta asumiendo que el pedido es correcto
switch( strtoupper($_SERVER['REQUEST_METHOD'])) {
    case 'GET':
        if (empty($resourceId)) {
            echo json_encode($books);
        }
        else{
            if (array_key_exists($resourceId, $books)) {
                echo json_encode($books[$resourceId]);
            }
            else
            {
                echo 'No bro, esa no me la sé';
            }
        }
        break;

    case 'POST':
        $json = file_get_contents('php://input');
        
        $books[] = json_decode($json, true);

        // echo array_keys($books)[ count($books) -1 ];
        echo json_encode($books);
        break;

    case 'PUT':
        # code...
        break;

    case 'DELET':
        # code...
        break;

    default:
        # code...
        break;
}