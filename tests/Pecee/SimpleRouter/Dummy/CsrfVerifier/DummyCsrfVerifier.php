<?php

class DummyCsrfVerifier extends \Kerkenes\Http\Middleware\BaseCsrfVerifier {

    protected array $except = [
        '/exclude-page',
        '/exclude-all/*',
    ];

    protected array $include = [
        '/exclude-all/include-page',
    ];

    public function testSkip(\Kerkenes\Http\Request $request) {
        return $this->skip($request);
    }

}
