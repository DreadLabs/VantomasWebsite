<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus;

use DreadLabs\VantomasWebsite\Disqus\Client;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyClient;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyClientResolver;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResource;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResponse;

/**
 * ClientTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ClientTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyClientResolver
     */
    protected $clientResolver = null;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyClient
     */
    protected $concreteClient = null;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyResource
     */
    protected $resource = null;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyResponse
     */
    protected $response = null;

    public function setUp()
    {
        $this->clientResolver = $this->getMock(DummyClientResolver::class);

        $this->concreteClient = $this->getMock(DummyClient::class);

        $this->resource = $this->getMock(DummyResource::class);

        $this->response = $this->getMock(DummyResponse::class);
    }

    public function testClientResolverGivesConcreteClient()
    {

        $this->clientResolver
            ->expects($this->once())
            ->method('resolve')
            ->with('dummy')
            ->will($this->returnValue($this->concreteClient));

        $client = new Client(
            $this->clientResolver
        );

        $client->connectWith('dummy');
    }

    public function testResourceConnectionPassesResourceToConcreteClient()
    {

        $this->clientResolver
            ->expects($this->once())
            ->method('resolve')
            ->with('dummy')
            ->will($this->returnValue($this->concreteClient));

        $this->concreteClient
            ->expects($this->once())
            ->method('connectTo')
            ->with($this->resource);

        $client = new Client(
            $this->clientResolver
        );

        $client->connectWith('dummy');
        $client->connectTo($this->resource);
    }

    public function testResponseFetchingFromConcreteClientOnSend()
    {

        $this->clientResolver
            ->expects($this->once())
            ->method('resolve')
            ->with('dummy')
            ->will($this->returnValue($this->concreteClient));

        $this->concreteClient
            ->expects($this->once())
            ->method('getResponse');

        $client = new Client(
            $this->clientResolver
        );

        $client->connectWith('dummy');
        $client->send();
    }

    public function testDisconnectIsProxiedToConcreteClient()
    {

        $this->clientResolver
            ->expects($this->once())
            ->method('resolve')
            ->with('dummy')
            ->will($this->returnValue($this->concreteClient));

        $this->concreteClient
            ->expects($this->once())
            ->method('disconnect');

        $client = new Client($this->clientResolver);

        $client->connectWith('dummy');
        $client->disconnect();
    }

    public function testResponseReturnsResponseObjectFetchedBySendMethod()
    {

        $this->clientResolver
            ->expects($this->once())
            ->method('resolve')
            ->with('dummy')
            ->will($this->returnValue($this->concreteClient));

        $this->concreteClient
            ->expects($this->once())
            ->method('getResponse')
            ->will($this->returnValue($this->response));

        $client = new Client($this->clientResolver);

        $client->connectWith('dummy');
        $client->send();

        $this->assertSame($client->getResponse(), $this->response, 'Client returns response instance.');
    }
}
