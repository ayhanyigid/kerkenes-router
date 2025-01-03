<?php
require_once 'Exception/MiddlewareLoadedException.php';

use Kerkenes\Http\Request;

class DummyMiddleware implements \Kerkenes\Http\Middleware\IMiddleware
{
	public function handle(Request $request) : void
	{
		throw new MiddlewareLoadedException('Middleware loaded!');
	}

}
