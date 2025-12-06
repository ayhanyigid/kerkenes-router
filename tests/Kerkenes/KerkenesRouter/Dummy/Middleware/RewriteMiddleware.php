<?php

use Kerkenes\Http\Middleware\IMiddleware;
use Kerkenes\Http\Request;

class RewriteMiddleware implements IMiddleware {

    public function handle(Request $request)  : void {

        $request->setRewriteCallback(function() {
            return 'ok';
        });

    }

}
