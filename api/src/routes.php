<?php

use api\core\helpers\Directory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

$app = AppFactory::create();
$app->setBasePath(Directory::getBase(__DIR__));

$app->get('/', function (Request $request, Response $response, array $args)
{
    $response->getBody()->write("Hello World.");
    return $response;
});

$app->run();