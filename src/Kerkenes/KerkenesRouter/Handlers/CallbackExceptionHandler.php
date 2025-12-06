<?php

namespace Kerkenes\KerkenesRouter\Handlers;

use Closure;
use Exception;
use Kerkenes\Http\Request;

/**
 * Class CallbackExceptionHandler
 *
 * Class is used to create callbacks which are fired when an exception is reached.
 * This allows for easy handling 404-exception etc. without creating an custom ExceptionHandler.
 *
 * @package \Kerkenes\KerkenesRouter\Handlers
 */
class CallbackExceptionHandler implements IExceptionHandler
{

    /**
     * @var Closure
     */
    protected Closure $callback;

    public function __construct(Closure $callback)
    {
        $this->callback = $callback;
    }

    /**
     * @param Request $request
     * @param Exception $error
     */
    public function handleError(Request $request, Exception $error): void
    {
        /* Fire exceptions */
        call_user_func($this->callback,
            $request,
            $error
        );
    }
}
