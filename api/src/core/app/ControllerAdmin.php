<?php

namespace api\core\app;

use api\core\app\interfaces\IController;
use api\core\helpers\Json;
use Fig\Http\Message\StatusCodeInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class ControllerAdmin implements IController
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
     * @return ControllerAdmin
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
     * @return ControllerAdmin
     */
    public function setResponse($response)
    {
        $this->response = $response;
        return $this;
    }

    /**
     * @return mixed|void
     */
    public function all()
    {
        try
        {
            return Json::response($this->getResponse(), $this->getObjectModel()->all());
        }
        catch(\Exception $e)
        {
            return Json::response($this->getResponse(), [
                'msg' => 'Falha ao obter os registros da lista.',
                'error' => $e->getMessage()
            ], StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        }
    }

    public function find($id)
    {
        try
        {
            $finded = $this->getObjectModel()->find($id);
            if(!$finded)
            {
                return Json::response($this->getResponse(), [
                    'msg' => 'Registro não encontrado.'
                ], StatusCodeInterface::STATUS_NOT_FOUND);
            }

            return Json::response($this->getResponse(), $finded);
        }
        catch(\Exception $e)
        {
            return Json::response($this->getResponse(), [
                'msg' => 'Falha ao obter o registro solicitado.'
            ], StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        }
    }

    public function delete($id)
    {
        try
        {
            $this->getObjectModel()->delete($id);

            return Json::response($this->getResponse(), [
                'msg' => 'Registro excluído com sucesso.'
            ]);
        }
        catch(\Exception $e)
        {
            return Json::response($this->getResponse(), [
                'msg' => 'Falha ao excluir registro solicitado.'
            ], StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        }
    }

    public function create()
    {
        try
        {
            $object = $this->fillObjectModel();
            $object->create();

            return Json::response($this->getResponse(), [
                'msg' => 'Registro adicionado com sucesso.'
            ], StatusCodeInterface::STATUS_CREATED);
        }
        catch(\Exception $e)
        {
            return Json::response($this->getResponse(), [
                'msg' => 'Falha ao adicionado registro.'
            ], StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        }
    }

    public function update($id)
    {
        try
        {
            $object = $this->fillObjectModel();
            $object->update($id);

            return Json::response($this->getResponse(), [
                'msg' => 'Registro atualizado com sucesso.'
            ]);
        }
        catch(\Exception $e)
        {
            return Json::response($this->getResponse(), [
                'msg' => 'Falha ao atualizado registro.'
            ], StatusCodeInterface::STATUS_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @return Model
     */
    public function fillObjectModel()
    {
        $object = $this->getObjectModel();
        foreach($object->fillables() as $field)
        {
            $object->$field = $this->getRequest()->getParsedBody()[$field];
        }

        return $object;
    }

    /**
     * @return Model
     */
    abstract function getObjectModel();
}