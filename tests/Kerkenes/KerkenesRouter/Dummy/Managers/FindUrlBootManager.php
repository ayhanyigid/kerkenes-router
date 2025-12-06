<?php

class FindUrlBootManager implements \Kerkenes\KerkenesRouter\IRouterBootManager
{
    protected $result;

    public function __construct(&$result)
    {
        $this->result = &$result;
    }

    /**
     * Called when router loads it's routes
     *
     * @param \Kerkenes\KerkenesRouter\Router $router
     * @param \Kerkenes\Http\Request $request
     */
    public function boot(\Kerkenes\KerkenesRouter\Router $router, \Kerkenes\Http\Request $request): void
    {
        $contact = $router->findRoute('contact');

        if($contact !== null) {
            $this->result = true;
        }
    }
}
