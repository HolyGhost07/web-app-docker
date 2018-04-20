<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;
$app->get('/', function (Request $request, Response $response) {
    $response->getBody()->write(
        "hostname - {$_SERVER['HOSTNAME']}"
    );

    return $response;
});

$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name");

    return $response;
});

$app->get('/api', function (Request $request, Response $response) {
    $response = $response->withHeader('Content-Type', 'application/json')
        ->withStatus(200)
        ->withJson(['code' => 200, 'result' => []]);

    return $response;
});

$app->get('/db', function (Request $request, Response $response) {
    // connect to db from console
    // docker run -it --network webappdocker_default --rm mongo sh -c 'exec mongo "mongodb:27017"'

    $collection = (new MongoDB\Client("mongodb://mongodb:27017"))->test->users;

    // $insertOneResult = $collection->insertOne([
    //     'username' => 'admin',
    //     'email' => 'admin@example.com',
    //     'name' => 'Admin User',
    // ]);

    $id = new MongoDB\BSON\ObjectID("59a2afc2bac4410006572222");
    $record = $collection->findOne(['_id' => $id]);

    print_r($record->getArrayCopy());

    // printf("Inserted %d document(s)\n", $insertOneResult->getInsertedCount());

    // var_dump($insertOneResult->getInsertedId());

    return $response;
});

$app->run();
