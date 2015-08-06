<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Event;

use DreadLabs\VantomasWebsite\Event\FoundDonee;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DoneeDummy;
use DreadLabs\VantomasWebsite\Tests\Fixture\SecretSanta\DonorDummy;

/**
 * FoundDoneeTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
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
