<?php
namespace Webecho;

require_once "WebechoException.php";

class WebechoConfig
{

    public $host = null;
    public $token = null;

    function __construct(array $config)
    {
        if (!isset($config['host'])) {
            throw new WebechoException(
                "Must set host for webecho client", WebechoException::CONFIG_INCORRECT
            );
        }

        if (!isset($config['token'])) {
            throw new WebechoException(
                "Must set token for webecho client", WebechoException::CONFIG_INCORRECT
            );
        }

        $this->host = $config['host'];
        $this->token = $config['token'];
    }
}
