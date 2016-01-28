<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Page;

use DreadLabs\VantomasWebsite\Page\Identifier;
use DreadLabs\VantomasWebsite\Page\IdentifierCollection;
use DreadLabs\VantomasWebsite\Page\IdentifierCollectionFactory;

/**
 * IdentifierCollectionFactoryTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IdentifierCollection|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionMock;

    /**
     * @var IdentifierCollectionFactory
     */
    protected $sut;

    public function setUp()
    {
        $this->collectionMock = $this->getMock(IdentifierCollection::class);
        $this->sut = new IdentifierCollectionFactory($this->collectionMock);
    }

    public function testCreationFromArray()
    {
        $identifiers = array('1', 2, '34', 'a');

        $this->collectionMock
            ->expects($this->at(0))
            ->method('add')
            ->with(
                $this->equalTo(Identifier::fromString('1'))
            );

        $this->collectionMock
            ->expects($this->at(1))
            ->method('add')
            ->with(
                $this->equalTo(Identifier::fromString(2))
            );

        $this->collectionMock
            ->expects($this->at(2))
            ->method('add')
            ->with(
                $this->equalTo(Identifier::fromString('34'))
            );

        $this->collectionMock
            ->expects($this->at(3))
            ->method('add')
            ->with(
                $this->equalTo(Identifier::fromString('a'))
            );

        $collection = $this->sut->createFromArray($identifiers);

        $this->assertInstanceOf(IdentifierCollection::class, $collection);
    }
}
