<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Http;

use DreadLabs\VantomasWebsite\Http\NetHttpAdapter\Client;

class NetHttpAdapterClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \Net_Http_Client|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $netHttpClient;

    /**
     * @var Client
     */
    protected $sut;

    public function setUp()
    {
        $this->netHttpClient = $this->getMock('Net_Http_Client', array(), array(), '', false);
        $this->sut = new Client($this->netHttpClient);
    }

    public function testSettingUserAgentIsProxied()
    {
        $this->netHttpClient->expects($this->once())->method('setUserAgent')->with('Foo/Bar v1.0');
        $this->sut->setUserAgent('Foo/Bar v1.0');
    }

    public function testSettingHeaderIsProxied()
    {
        $this->netHttpClient
            ->expects($this->once())
            ->method('setHeader')
            ->with(
                $this->equalTo('Content-Type'),
                $this->equalTo('foo/bar; charset=utf-8')
            );
        $this->sut->setHeader('Content-Type', 'foo/bar; charset=utf-8');
    }

    public function testHttpGetIsProxied()
    {
        $this->netHttpClient
            ->expects($this->once())
            ->method('get')
            ->with($this->equalTo('http://example.org/foo.json'));
        $this->sut->get('http://example.org/foo.json');
    }

    public function testHttpPostIsProxied()
    {
        $this->netHttpClient
            ->expects($this->once())
            ->method('post')
            ->with(
                $this->equalTo('http://example.org/bar.json'),
                $this->equalTo(
                    array(
                        'field1' => 'value1',
                        'field2' => 'value2',
                    )
                )
            );
        $this->sut->post('http://example.org/bar.json', array('field1' => 'value1', 'field2' => 'value2'));
    }

    public function testQueryingStatusIsProxied()
    {
        $this->netHttpClient
            ->expects($this->once())
            ->method('getStatus');
        $this->sut->getStatus();
    }

    public function testQueryingBodyIsProxied()
    {
        $this->netHttpClient
            ->expects($this->once())
            ->method('getBody');
        $this->sut->getBody();
    }

    public function testQueryingResponseObjectReturnsResponseAdapter()
    {
        $response = $this->sut->getResponse();
        $this->assertInstanceOf('DreadLabs\\VantomasWebsite\\Http\\ResponseInterface', $response);
    }
}
