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

$app->run();
