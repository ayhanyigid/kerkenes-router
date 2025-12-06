<?php

namespace Kerkenes\KerkenesRouter\Handlers;

use Exception;
use Kerkenes\Http\Request;

interface IExceptionHandler
{
    /**
     * @param Request $request
     * @param Exception $error
     */
    public function handleError(Request $request, Exception $error): void;

}
