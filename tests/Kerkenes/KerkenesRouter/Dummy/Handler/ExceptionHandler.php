<?php

class ExceptionHandler implements \Kerkenes\KerkenesRouter\Handlers\IExceptionHandler
{
	public function handleError(\Kerkenes\Http\Request $request, \Exception $error)  : void
	{
	    echo $error->getMessage();
	}

}
