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

$app = AppFactory::create();
$app->setBasePath(Directory::getBase(__DIR__));

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

$app->run();