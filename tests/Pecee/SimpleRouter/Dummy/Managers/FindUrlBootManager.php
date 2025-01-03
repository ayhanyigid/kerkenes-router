<?php

class FindUrlBootManager implements \Kerkenes\SimpleRouter\IRouterBootManager
{
    protected $result;

    public function __construct(&$result)
    {
        $this->result = &$result;
    }

    /**
     * Called when router loads it's routes
     *
     * @param \Kerkenes\SimpleRouter\Router $router
     * @param \Kerkenes\Http\Request $request
     */
    public function boot(\Kerkenes\SimpleRouter\Router $router, \Kerkenes\Http\Request $request): void
    {
        $contact = $router->findRoute('contact');

        if($contact !== null) {
            $this->result = true;
        }
    }
}
