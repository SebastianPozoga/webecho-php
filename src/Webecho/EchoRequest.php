<?php

namespace Webecho;

require_once "WebechoException.php";

class EchoRequest
{

    private $sender;

    private $action = null;
    private $data = null;
    private $role = 'read';

    const REST_PATH = "/rest/emit";

    function __construct($sender)
    {
        $this->sender = $sender;
    }

    function send()
    {
        if (!$this->action) {
            throw new WebechoException(
                "Must set action", WebechoException::PARAMETER_INCORRECT
            );
        }

        if (!$this->action) {
            throw new WebechoException(
                "Must set data", WebechoException::PARAMETER_INCORRECT
            );
        }

        if (!$this->role) {
            throw new WebechoException(
                "Must set role", WebechoException::PARAMETER_INCORRECT
            );
        }

        if (!$this->data) {
            throw new WebechoException(
                "Must set data", WebechoException::PARAMETER_INCORRECT
            );
        }

        $this->sender->post(self::REST_PATH, array(
            'token' => $this->sender->getToken(),
            'action' => $this->action,
            'role' => $this->role,
            'data' => $this->data
        ));
    }

    public function setAction($action)
    {
        $this->action = $action;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setRole($role)
    {
        $this->role = $role;
    }

}
