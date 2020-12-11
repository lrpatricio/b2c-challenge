<?php

namespace api\core\helpers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class Routes
{
    /**
     * @param $group
     * @param string $controllerClass
     *
     * A variavél $controllerClass deve ser uma classe que implementa IModel
     */
    public static function groupCrud($group, $controllerClass)
    {
        $group->get('[/]', function (Request $request, Response $response) use ($controllerClass)
        {
            $controller = new $controllerClass($request, $response);
            return $controller->all();
        });

        $group->get('/{id}[/]', function (Request $request, Response $response, array $args) use ($controllerClass)
        {
            $controller = new $controllerClass($request, $response);
            return $controller->find($args['id']);
        });

        $group->post('[/]', function (Request $request, Response $response) use ($controllerClass)
        {
            $controller = new $controllerClass($request, $response);
            return $controller->create();
        });

        $group->put('/{id}[/]', function (Request $request, Response $response, array $args) use ($controllerClass)
        {
            $controller = new $controllerClass($request, $response);
            return $controller->update($args['id']);
        });

        $group->delete('/{id}[/]', function (Request $request, Response $response, array $args) use ($controllerClass)
        {
            $controller = new $controllerClass($request, $response);
            return $controller->delete($args['id']);
        });
    }
}