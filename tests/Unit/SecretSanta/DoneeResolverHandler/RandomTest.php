<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\SecretSanta\DoneeResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\RepositoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\Random;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeRepositoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;

/**
 * RandomTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class RandomTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var RepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $doneeRepositoryMock;

    /**
     * @var Random
     */
    protected $sut;

    public function setUp()
    {
        $this->doneeRepositoryMock = $this->getMock(DoneeRepositoryDummy::class);
        $this->sut = new Random($this->doneeRepositoryMock);
    }

    public function testResolvingQueriesTheDoneeRepository()
    {
        $donorMock = $this->getMock(DonorDummy::class);

        $this->doneeRepositoryMock
            ->expects($this->once())
            ->method('findOneAtRandomFor')
            ->with($donorMock);

        $this->sut->resolve($donorMock);
    }
}
