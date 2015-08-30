<?php

require_once "WebechoException.php";
require_once "Sender.php";
require_once "EchoRequest.php";

namespace Webecho;

class Webecho {

	const WSDL = 'https://webapi.allegro.pl/service.php?wsdl';
	const WSDL_SANDBOX = 'https://webapi.allegro.pl.webapisandbox.pl/service.php?wsdl';

	//private
	private $config = null;
	private $sender = null;

	//public
	public $country_code = null;

	function __construct($config) {
		if(!isset($config->host)) {
			throw new WebechoException(
				"Must set host for webecho client", WebechoException::CONFIG_INCORRECT
			);
		}

		if(!isset($config->host)) {
			throw new WebechoException(
				"Must set token for webecho client", WebechoException::CONFIG_INCORRECT
			);
		}

		$this->config = $config;
		$this->sender = new Sender($config->host, $config->host);
	}

	public function echo(){
		return new EchoRequest($this->sender);
	}
}
