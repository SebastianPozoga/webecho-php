<?php

namespace Webecho;

require_once "WebechoException.php";

class Sender
{

    private $host;
    private $token;

    function __construct($host, $token)
    {
        $this->host = $host;
        $this->token = $token;
    }

    public function post($path, $data)
    {
        $data_string = json_encode($data);

        $ch = curl_init($this->host . $path);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
        );

        return curl_exec($ch) !== false;
    }

    public function getToken()
    {
        return $this->token;
    }
}
