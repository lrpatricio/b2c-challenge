<?php

use api\app\controllers\admin\CategoriesController;
use api\app\controllers\admin\ProductsController;
use api\app\controllers\site\MenuController;
use api\core\helpers\Directory;
use api\core\helpers\Routes;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Slim\Interfaces\RouteCollectorProxyInterface as RouteCollectorProxy;

use Psr\Http\Server\RequestHandlerInterface;
use Slim\Routing\RouteContext;


$app = AppFactory::create();
$app->setBasePath(Directory::getBase(__DIR__));

$app->addBodyParsingMiddleware();

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

#ADMIN
$app->group('/admin/categories', function (RouteCollectorProxy $group)
{
    Routes::groupCrud($group, CategoriesController::class);
});
$app->group('/admin/products', function (RouteCollectorProxy $group)
{
    Routes::groupCrud($group, ProductsController::class);
});

#SITE
$app->get('/menu[/]', function (Request $request, Response $response)
{
    $controller = new MenuController($request, $response);
    return $controller->categories();
});
$app->get('/products/{categoryId}[/]', function (Request $request, Response $response, array $args)
{
    $controller = new \api\app\controllers\site\ProductsController($request, $response);
    return $controller->get($args['categoryId']);
});

$app->run();