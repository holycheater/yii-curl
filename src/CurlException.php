<?php
// vim: sw=4:ts=4:noet:sta:
namespace Curl;

class Exception extends \CException {
	public $httpCode;

	public $response;

	public function __construct($msg, $errno, $httpCode = null, $response = null) {
		parent::__construct($msg, $errno);
		$this->httpCode = $httpCode;
		$this->response = $response;
	}
}
