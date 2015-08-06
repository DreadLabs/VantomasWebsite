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

use DreadLabs\VantomasWebsite\Disqus\Api;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyClient;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyConfiguration;
use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResource;

/**
 * DISQUS API TestCase
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ApiTest extends \PHPUnit_Framework_TestCase
{

    public function testClientProxy()
    {
        $configuration = new DummyConfiguration();

        $client = $this->getMock(DummyClient::class);
        $client->expects($this->once())->method('connectWith')->with('foobar');

        $resource = new DummyResource();

        $api = new Api(
            $configuration,
            $client,
            $resource
        );

        $api->connectWith('foobar');
    }
}
