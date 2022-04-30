<?php

if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW'])) {
    echo json_encode(array(1 => 'uh flaco, no me la conteeeee, necesita autenticarte'));
    die;
}
$user = array('PHP_AUTH_USER', $_SERVER)? $_SERVER['PHP_AUTH_USER'] : '';
$pwd = array('PHP_AUTH_PW', $_SERVER)? $_SERVER['PHP_AUTH_PW'] : '';


if ($user !== 'mauro' || $pwd !== 'pass123')
{
    echo json_encode(array(1 => 'uh flaco, no me la conteeeee, quien eres?'));
    die;
}

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
        //tomamos la entrada 'cruda'
        $json = file_get_contents('php://input');
        
        // transformamos el json recibido a un nuevo elemento del arreglo
        $books[] = json_decode($json, true);
        
        // emitimos hacia la salida la ultima clave del arreglo de los libros
        // echo array_keys($books)[ count($books) -1 ];
        
        //Retornamos la colección
        echo json_encode($books);
        break;
            
    case 'PUT':
        #Recuerda que PUT hace reemplazos! no modificaciones puntuales. Hay que enviar todo completo
        //validamos que el recurso buscado exista
        if (!empty($resourceId) && array_key_exists($resourceId, $books)) 
        {    
            //tomamos la entrada 'cruda'
            $json = file_get_contents('php://input');
            // transformamos el json recibido para editar un elemento del arreglo
            $books[$resourceId] = json_decode($json, true);
            //Retornamos la colección modificada en formato json
            echo json_encode($books);
        }
        break;

    case 'DELETE':
        //Validamos que el recurso exista
        if (!empty($resourceId) && array_key_exists($resourceId, $books)) 
        {
            //Eliminamos el recurso del arreglo con unset()
            unset($books[$resourceId]);
        }
        //Retornamos la colección completa sin el dato eliminado
        echo json_encode($books);
        break;

    default:
        echo json_encode(array(1 => 'uh flaco, no me la conteeeee'));
        break;
}