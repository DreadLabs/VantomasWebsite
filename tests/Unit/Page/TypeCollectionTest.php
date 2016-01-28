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

/**
 * TypeCollectionTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class TypeCollectionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var TypeCollection
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new TypeCollection();
    }

    public function testAddType()
    {
        $type = Type::fromString(1);
        $this->sut->add($type);

        $this->assertTrue(isset($this->sut[0]));
        $this->assertEquals($type, $this->sut[0]);
    }

    public function testRemoveType()
    {
        $type = Type::fromString(2);
        $this->sut->add($type);
        unset($this->sut[$type]);
        $this->assertFalse(isset($this->sut[1]));

        unset($this->sut[0]);
        $this->assertFalse(isset($this->sut[0]));
    }

    public function testMixedAccessors()
    {
        $type = Type::fromString(3);
        $this->sut[0] = $type;
        $this->sut->remove($type);

        $this->assertFalse(isset($this->sut[0]));
    }

    public function testCounting()
    {
        $typeOne = Type::fromString(4);
        $this->sut->add($typeOne);

        $typeTwo = Type::fromString(5);
        $this->sut->add($typeTwo);

        $this->assertEquals(2, $this->sut->count());
    }

    public function testArrayIteratorUsage()
    {
        $type = Type::fromString(6);
        $this->sut->add($type);
        $iterator = $this->sut->getIterator();

        $this->isInstanceOf('ArrayIterator', $iterator);
    }

    public function testArrayCasting()
    {
        $typeOne = Type::fromString(7);
        $this->sut->add($typeOne);

        $typeTwo = Type::fromString(8);
        $this->sut->add($typeTwo);

        $expected = array(
            $typeOne,
            $typeTwo,
        );

        $this->assertSame($expected, $this->sut->toArray());
    }
}
