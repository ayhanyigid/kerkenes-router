<?php

use Kerkenes\Http\Request;

class DummyLoadableRoute extends Kerkenes\KerkenesRouter\Route\LoadableRoute {

    public function matchRoute(string $url, Request $request): bool
    {
        return false;
    }
}
