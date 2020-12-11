<?php

namespace api\core\app;

use api\core\app\interfaces\IController;
use api\core\helpers\Json;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class ControllerSample
{
    /**
     * @var Request
     */
    private $request;

    /**
     * @var Response
     */
    private $response;

    public function __construct($request, $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @param Request $request
     * @return static
     */
    public function setRequest($request)
    {
        $this->request = $request;
        return $this;
    }

    /**
     * @return Response
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * @param Response $response
     * @return static
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }
}