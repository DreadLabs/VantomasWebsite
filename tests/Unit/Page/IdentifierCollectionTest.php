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

/**
 * IdentifierCollectionTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var IdentifierCollection
     */
    protected $collection;

    public function setUp()
    {
        $this->collection = new IdentifierCollection();
    }

    public function testAddIdentifier()
    {
        $identifier = Identifier::fromString(1);
        $this->collection->add($identifier);

        $this->assertTrue(isset($this->collection[0]));
        $this->assertEquals($identifier, $this->collection[0]);
    }

    public function testRemoveIdentifier()
    {
        $identifier = Identifier::fromString(2);
        $this->collection->add($identifier);
        unset($this->collection[$identifier]);
        $this->assertFalse(isset($this->collection[1]));

        unset($this->collection[0]);
        $this->assertFalse(isset($this->collection[0]));
    }

    public function testMixedAccessors()
    {
        $identifier = Identifier::fromString(3);
        $this->collection[0] = $identifier;
        $this->collection->remove($identifier);

        $this->assertFalse(isset($this->collection[0]));
    }

    public function testCounting()
    {
        $identifierOne = Identifier::fromString(4);
        $this->collection->add($identifierOne);

        $identifierTwo = Identifier::fromString(5);
        $this->collection->add($identifierTwo);

        $this->assertEquals(2, $this->collection->count());
    }

    public function testArrayIteratorUsage()
    {
        $identifier = Identifier::fromString(6);
        $this->collection->add($identifier);

        $iterator = $this->collection->getIterator();

        $this->isInstanceOf('ArrayIterator', $iterator);
    }

    public function testArrayCasting()
    {
        $identifierOne = Identifier::fromString(7);
        $this->collection->add($identifierOne);

        $identifierTwo = Identifier::fromString(8);
        $this->collection->add($identifierTwo);

        $expected = array(
            $identifierOne,
            $identifierTwo,
        );

        $this->assertSame($expected, $this->collection->toArray());
    }
}
