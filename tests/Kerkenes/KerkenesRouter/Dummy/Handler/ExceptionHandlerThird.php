<?php

class ExceptionHandlerThird implements \Kerkenes\KerkenesRouter\Handlers\IExceptionHandler
{
	public function handleError(\Kerkenes\Http\Request $request, \Exception $error) : void
	{
        global $stack;
        $stack[] = static::class;

		throw new ResponseException('ExceptionHandler loaded');
	}

}
