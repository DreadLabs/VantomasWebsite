<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Event;

use DreadLabs\VantomasWebsite\Event\FoundDonee;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;

class FoundDoneeTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FoundDonee
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new FoundDonee();
    }

    public function testLabelCorrespondsToLastPartOfClassName()
    {
        $this->assertEquals('FoundDonee', $this->sut->getLabel());
    }

    public function testAddedArgumentsAreReturnedOrdereddFifo()
    {
        $this->sut->addArgument('foo');
        $this->sut->addArgument('bar');

        $arguments = array('foo', 'bar');

        $this->assertSame($arguments, $this->sut->getArguments());
    }

    public function testNamedConstructorWillAddGivenDonorAndDoneeToArgumentList()
    {
        $donorMock = $this->getMock(DonorDummy::class);
        $doneeMock = $this->getMock(DoneeDummy::class);

        $this->sut = FoundDonee::fromPair($donorMock, $doneeMock);

        $arguments = array($donorMock, $doneeMock);

        $this->assertSame($arguments, $this->sut->getArguments());
    }
}
