<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\SecretSanta;

use DreadLabs\VantomasWebsite\Event\ContextInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\Resolver;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverHandler\FactoryInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donee\ResolverInterface;
use DreadLabs\VantomasWebsite\SecretSanta\Donor\RepositoryInterface;
use DreadLabs\VantomasWebsite\Tests\Fixture\Event\EventContextDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeResolverHandlerFactoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorRepositoryDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\ResolverHandlerDummy;
use DreadLabs\VantomasWebsite\User\AbstractUserId;

class ResolverTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var RepositoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $donorRepositoryMock;

    /**
     * @var FactoryInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $resolverFactoryMock;

    /**
     * @var ContextInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $eventContextMock;

    /**
     * @var ResolverInterface
     */
    private $sut;

    public function setUp()
    {
        $this->donorRepositoryMock = $this->getMock(DonorRepositoryDummy::class);
        $this->resolverFactoryMock = $this->getMock(DoneeResolverHandlerFactoryDummy::class);
        $this->eventContextMock = $this->getMock(EventContextDummy::class);

        $this->sut = new Resolver(
            $this->donorRepositoryMock,
            $this->resolverFactoryMock,
            $this->eventContextMock
        );
    }

    public function testResolvingQueriesDonorRepository()
    {
        $doneeMock = $this->getMock(DoneeDummy::class);

        $resolverMock = $this->getMock(ResolverHandlerDummy::class);
        $resolverMock
            ->expects($this->once())
            ->method('resolve')
            ->will($this->returnValue($doneeMock));

        $this->resolverFactoryMock
            ->expects($this->any())
            ->method('create')
            ->will($this->returnValue($resolverMock));

        $donorMock = $this->getMock(DonorDummy::class);

        $userId = $this
            ->getMockBuilder(AbstractUserId::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->donorRepositoryMock
            ->expects($this->once())
            ->method('findOneById')
            ->with($this->equalTo($userId))
            ->will($this->returnValue($donorMock));

        $this->sut->resolveFor($userId);
    }
}
