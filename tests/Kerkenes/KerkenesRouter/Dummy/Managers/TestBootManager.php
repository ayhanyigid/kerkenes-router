<?php

class TestBootManager implements \Kerkenes\KerkenesRouter\IRouterBootManager
{

    protected $rewrite;

    public function __construct(array $rewrite)
    {
        $this->rewrite = $rewrite;
    }

    /**
     * Called when router loads it's routes
     *
     * @param \Kerkenes\KerkenesRouter\Router $router
     * @param \Kerkenes\Http\Request $request
     */
    public function boot(\Kerkenes\KerkenesRouter\Router $router, \Kerkenes\Http\Request $request): void
    {
        foreach ($this->rewrite as $url => $rewrite) {
            // If the current url matches the rewrite url, we use our custom route

            if ($request->getUrl()->contains($url) === true) {
                $request->setRewriteUrl($rewrite);
            }

        }
    }
}
