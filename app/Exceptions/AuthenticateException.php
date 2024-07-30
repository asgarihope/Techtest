<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class AuthenticateException extends Exception {

	public function __construct($message, $code = 400, Throwable $previous = null) {
		parent::__construct($message, $code, $previous);

	}

	public function exceptionResponse(): array {
		return [
			'message' => $this->getMessage()
		];
	}

	public function render() {
		return back()->with('error', $this->getMessage());
	}
}
