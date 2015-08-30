<?php
require_once "WebechoException.php";

namespace Webecho;

class EchoRequest {

	private $sender;

	private $action = null;
	private $data = null;
	private $role = 'read';

	cost REST_PATH = "/rest/echo";

	function __construct($sender) {
		$this->sender = sender;
	}

	function send($sender) {
		if(!$this->action){
			throw new WebechoException(
				"Must set action", WebechoException::PARAMETER_INCORRECT
			);
		}

		if(!$this->action){
			throw new WebechoException(
				"Must set data", WebechoException::PARAMETER_INCORRECT
			);
		}

		if(!$this->role){
			throw new WebechoException(
				"Must set role", WebechoException::PARAMETER_INCORRECT
			);
		}

		if(!$this->data){
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

}
