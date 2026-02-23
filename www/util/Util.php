<?php 

require __DIR__ . '/../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

class Util {

	public function __construct() {

	}

	public function generarUUID(): string {
		return Uuid::uuid4()->toString();
	}
}