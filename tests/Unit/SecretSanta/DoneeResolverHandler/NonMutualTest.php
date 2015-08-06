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
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\NonMutual;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface as PairRepositoryInterface;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeRepositoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\PairRepositoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\ResolverHandlerDummy;

/**
 * NonMutualTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class NonMutualTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ResolverHandlerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $nextResolverMock;

    /**
     * @var RepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $doneeRepositoryMock;

    /**
     * @var PairRepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $pairRepositoryMock;

    /**
     * @var NonMutual
     */
    protected $sut;

    public function setUp()
    {
        $this->nextResolverMock = $this->getMock(ResolverHandlerDummy::class);
        $this->doneeRepositoryMock = $this->getMock(DoneeRepositoryDummy::class);
        $this->pairRepositoryMock = $this->getMock(PairRepositoryDummy::class);

        $this->sut = new NonMutual(
            $this->nextResolverMock,
            $this->doneeRepositoryMock,
            $this->pairRepositoryMock
        );
    }

    public function testMaximumMutualLoop()
    {
        $donorMock = $this->getMock(DonorDummy::class);
        $doneeMock = $this->getMock(DoneeDummy::class);

        $this->doneeRepositoryMock
            ->expects($this->any())
            ->method('findOneNonMutualFor')
            ->with($this->equalTo($donorMock))
            ->will($this->returnValue($doneeMock));

        $this->pairRepositoryMock
            ->expects($this->any())
            ->method('isPairMutually')
            ->with($this->equalTo($donorMock), $this->equalTo($doneeMock))
            ->will($this->returnValue(true));

        $this->nextResolverMock
            ->expects($this->once())
            ->method('resolve')
            ->with($this->equalTo($donorMock));

        $this->sut->resolve($donorMock);
    }

    public function testEarlyNonMutualLookupSuccess()
    {
        $donorMock = $this->getMock(DonorDummy::class);
        $doneeMock = $this->getMock(DoneeDummy::class);

        $this->doneeRepositoryMock
            ->expects($this->any())
            ->method('findOneNonMutualFor')
            ->with($this->equalTo($donorMock))
            ->will($this->returnValue($doneeMock));

        $this->pairRepositoryMock
            ->expects($this->at(0))
            ->method('isPairMutually')
            ->with($this->equalTo($donorMock), $this->equalTo($doneeMock))
            ->will($this->returnValue(false));

        $this->sut->resolve($donorMock);
    }
}
