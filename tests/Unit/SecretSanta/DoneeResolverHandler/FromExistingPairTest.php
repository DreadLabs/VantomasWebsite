<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\SecretSanta\DoneeResolverHandler;

use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FromExistingPair;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandlerInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Pair\RepositoryInterface;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\PairDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\PairRepositoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\ResolverHandlerDummy;

class FromExistingPairTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ResolverHandlerInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $nextResolverMock;

    /**
     * @var RepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $pairRepositoryMock;

    /**
     * @var FromExistingPair
     */
    protected $sut;

    public function setUp()
    {
        $this->nextResolverMock = $this->getMock(ResolverHandlerDummy::class);
        $this->pairRepositoryMock = $this->getMock(PairRepositoryDummy::class);

        $this->sut = new FromExistingPair($this->nextResolverMock, $this->pairRepositoryMock);
    }

    public function testExistingPairWillReturnDoneeOfIt()
    {
        $donorMock = $this->getMock(DonorDummy::class);
        $pairMock = $this->getMock(PairDummy::class);

        $pairMock
            ->expects($this->once())
            ->method('getDonee');

        $this->pairRepositoryMock
            ->expects($this->once())
            ->method('findPairFor')
            ->with($this->equalTo($donorMock))
            ->will($this->returnValue($pairMock));

        $this->sut->resolve($donorMock);
    }

    public function testNonExistingWillQueryTheNextResolverHandler()
    {
        $donorMock = $this->getMock(DonorDummy::class);

        $this->pairRepositoryMock
            ->expects($this->once())
            ->method('findPairFor')
            ->with($this->equalTo($donorMock))
            ->will($this->returnValue(null));

        $this->nextResolverMock
            ->expects($this->once())
            ->method('resolve')
            ->with($this->equalTo($donorMock));

        $this->sut->resolve($donorMock);
    }
}
