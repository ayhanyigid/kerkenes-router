<?php

class ExceptionHandlerSecond implements \Kerkenes\KerkenesRouter\Handlers\IExceptionHandler
{
	public function handleError(\Kerkenes\Http\Request $request, \Exception $error) : void
	{
        global $stack;
        $stack[] = static::class;

        $request->setUrl(new \Kerkenes\Http\Url('/'));
	}

}
