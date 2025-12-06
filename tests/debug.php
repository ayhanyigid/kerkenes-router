<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use \Kerkenes\KerkenesRouter\KerkenesRouter;

KerkenesRouter::get('/user/{name}', 'UserController@show')->where(['name' => '[\w]+']);
$debugInfo = KerkenesRouter::startDebug();
echo sprintf('<pre>%s</pre>', var_export($debugInfo, true));
exit;
