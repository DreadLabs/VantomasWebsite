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

use DreadLabs\VantomasWebsite\Disqus\Response;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResponse;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResponseResolver;

/**
 * ResponseTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyResponseResolver
     */
    protected $responseResolver = null;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|DummyResponse
     */
    protected $concreteResponse = null;

    public function setUp()
    {
        $this->responseResolver = $this->getMock(DummyResponseResolver::class);

        $this->concreteResponse = $this->getMock(DummyResponse::class);
    }

    public function testSetFormatInitializesConcreteResponseImplementation()
    {

        $this->responseResolver
            ->expects($this->once())
            ->method('resolve')
            ->with($this->equalTo('dummy'))
            ->will($this->returnValue($this->concreteResponse));

        $response = new Response($this->responseResolver);
        $response->setFormat('dummy');
    }

    public function testSetContentProxiesConcreteResponseImplementation()
    {

        $this->responseResolver
            ->expects($this->once())
            ->method('resolve')
            ->will($this->returnValue($this->concreteResponse));

        $this->concreteResponse
            ->expects($this->once())
            ->method('setContent')
            ->with('foobar');

        $response = new Response($this->responseResolver);
        $response->setFormat('dummy');
        $response->setContent('foobar');
    }
}
