<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\TeaserImage;

use DreadLabs\VantomasWebsite\TeaserImage\Offset;

/**
 * OffsetTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class OffsetTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructionCastsToInteger()
    {
        $offset = new Offset('a', 'b');
        $this->assertEquals('0,0', $offset->getValue());

        $offset = new Offset('1', '2');
        $this->assertEquals('1,2', $offset->getValue());

        $offset = new Offset(33, 66);
        $this->assertEquals('33,66', $offset->getValue());
    }

    public function testNamedConstructorExplodesCommaSeparatedStringOnly()
    {
        $offset = Offset::fromString('a-b-c-d,e-f-g-h');
        $this->assertEquals('0,0', $offset->getValue());

        $offset = Offset::fromString('1, 123,4');
        $this->assertEquals('1,123', $offset->getValue());

        $offset = Offset::fromString('1,5');
        $this->assertEquals('1,5', $offset->getValue());

        $offset = Offset::fromString('null,0');
        $this->assertEquals('0,0', $offset->getValue());
    }
}
