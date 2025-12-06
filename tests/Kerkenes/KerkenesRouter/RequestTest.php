<?php

use Kerkenes\Http\Input\InputFile;

require_once 'Dummy/DummyMiddleware.php';
require_once 'Dummy/DummyController.php';
require_once 'Dummy/Handler/ExceptionHandler.php';

class RequestTest extends \PHPUnit\Framework\TestCase
{

    protected function processHeader($name, $value, callable $callback)
    {
        global $_SERVER;

        $_SERVER[$name] = $value;

        $router = TestRouter::router();
        $router->reset();

        $request = $router->getRequest();

        $callback($request);

        // Reset everything
        $_SERVER[$name] = null;
        $router->reset();
    }

    public function testContentTypeParse()
    {
        global $_SERVER;

        // Test normal content-type

        $contentType = 'application/x-www-form-urlencoded';

        $this->processHeader('content_type', $contentType, function(\Kerkenes\Http\Request $request) use($contentType) {
            $this->assertEquals($contentType, $request->getContentType());
        });

        // Test special content-type with encoding

        $contentTypeWithEncoding = 'application/x-www-form-urlencoded; charset=UTF-8';

        $this->processHeader('content_type', $contentTypeWithEncoding, function(\Kerkenes\Http\Request $request) use($contentType) {
            $this->assertEquals($contentType, $request->getContentType());
        });
    }

    public function testGetIp()
    {
        $ip = '1.1.1.1';
        $this->processHeader('remote_addr', $ip, function(\Kerkenes\Http\Request  $request) use($ip) {
            $this->assertEquals($ip, $request->getIp());
        });

        $ip = '2.2.2.2';
        $this->processHeader('http-cf-connecting-ip', $ip, function(\Kerkenes\Http\Request  $request) use($ip) {
            $this->assertEquals($ip, $request->getIp());
        });

        $ip = '3.3.3.3';
        $this->processHeader('http-client-ip', $ip, function(\Kerkenes\Http\Request  $request) use($ip) {
            $this->assertEquals($ip, $request->getIp());
        });

        $ip = '4.4.4.4';
        $this->processHeader('http-x-forwarded-for', $ip, function(\Kerkenes\Http\Request  $request) use($ip) {
            $this->assertEquals($ip, $request->getIp());
        });

        // Test safe

        $ip = '5.5.5.5';
        $this->processHeader('http-x-forwarded-for', $ip, function(\Kerkenes\Http\Request  $request) {
            $this->assertEquals(null, $request->getIp(true));
        });

    }

    // TODO: implement more test-cases

}
