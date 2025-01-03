<?php

namespace Kerkenes\Http\Middleware;

use Kerkenes\Http\Request;

interface IMiddleware
{
    /**
     * @param Request $request
     */
    public function handle(Request $request): void;

}
