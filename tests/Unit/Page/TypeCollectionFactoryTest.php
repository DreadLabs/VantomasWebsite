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

use DreadLabs\VantomasWebsite\Page\Type;
use DreadLabs\VantomasWebsite\Page\TypeCollection;
use DreadLabs\VantomasWebsite\Page\TypeCollectionFactory;

/**
 * TypeCollectionFactoryTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class TypeCollectionFactoryTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TypeCollection|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $collectionMock;

    /**
     * @var TypeCollectionFactory
     */
    protected $factory;

    public function setUp()
    {
        $this->collectionMock = $this->getMock(TypeCollection::class);
        $this->factory = new TypeCollectionFactory($this->collectionMock);
    }

    public function testCreationFromArray()
    {
        $types = array('34', 5, '99', 'c');

        $this->collectionMock
            ->expects($this->at(0))
            ->method('add')
            ->with(
                $this->equalTo(Type::fromString('34'))
            );

        $this->collectionMock
            ->expects($this->at(1))
            ->method('add')
            ->with(
                $this->equalTo(Type::fromString(5))
            );

        $this->collectionMock
            ->expects($this->at(2))
            ->method('add')
            ->with(
                $this->equalTo(Type::fromString('99'))
            );

        $this->collectionMock
            ->expects($this->at(3))
            ->method('add')
            ->with(
                $this->equalTo(Type::fromString('c'))
            );

        $collection = $this->factory->createFromArray($types);

        $this->assertInstanceOf(TypeCollection::class, $collection);
    }
}
