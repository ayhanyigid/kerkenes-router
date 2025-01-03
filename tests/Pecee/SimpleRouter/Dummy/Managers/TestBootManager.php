<?php

class TestBootManager implements \Kerkenes\SimpleRouter\IRouterBootManager
{

    protected $rewrite;

    public function __construct(array $rewrite)
    {
        $this->rewrite = $rewrite;
    }

    /**
     * Called when router loads it's routes
     *
     * @param \Kerkenes\SimpleRouter\Router $router
     * @param \Kerkenes\Http\Request $request
     */
    public function boot(\Kerkenes\SimpleRouter\Router $router, \Kerkenes\Http\Request $request): void
    {
        foreach ($this->rewrite as $url => $rewrite) {
            // If the current url matches the rewrite url, we use our custom route

            if ($request->getUrl()->contains($url) === true) {
                $request->setRewriteUrl($rewrite);
            }

        }
    }
}
