<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Http;

use DreadLabs\VantomasWebsite\Http\NetHttpAdapter\Response;

class NetHttpAdapterResponseTest extends \PHPUnit_Framework_TestCase
{

    public function testStatusCodeWillBeReturned()
    {
        $sut = new Response(200, array(), 'Foo!');
        $this->assertSame(200, $sut->getStatusCode());
    }

    public function testBodyWillBeReturned()
    {
        $sut = new Response(200, array(), 'Bar!');
        $this->assertSame('Bar!', $sut->getBody());
    }

    public function testHeadersWillBeReturned()
    {
        $headers = array('foo' => 'bar');
        $sut = new Response(200, $headers, 'Foo! Bar!');
        $this->assertSame($headers, $sut->getHeaders());
    }
}
