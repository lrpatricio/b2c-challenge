<?php


namespace api\core\helpers;

use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface as Response;

class Json
{
    /**
     * @param Response $response
     * @param array|object $body
     * @param int $status
     * @return mixed
     */
    public static function response($response, $body, $status = StatusCodeInterface::STATUS_OK)
    {
        $response
            ->getBody()
            ->write(json_encode($body));

        return $response
            ->withHeader('Content-Type', 'application/json')
            ->withStatus($status);
    }
}