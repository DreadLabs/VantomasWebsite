<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Media;

use DreadLabs\VantomasWebsite\Media\Identifier;

/**
 * IdentifierTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierTest extends \PHPUnit_Framework_TestCase
{

    public function testTruthBooleanIsCastedToString()
    {
        $sut = new Identifier(true);
        $this->assertEquals('1', $sut->getValue());
    }

    public function testFalsyBooleanIsCastedToEmptyString()
    {
        $sut = new Identifier(false);
        $this->assertEquals('', $sut->getValue());
    }

    public function testPositiveIntegerIsCastedToString()
    {
        $sut = new Identifier(1);
        $this->assertEquals('1', $sut->getValue());
    }

    public function testNegativeIntegerIsCastedToString()
    {
        $sut = new Identifier(-1);
        $this->assertEquals('-1', $sut->getValue());
    }
}
