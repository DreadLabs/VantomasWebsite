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

/**
 * IdentifierTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class IdentifierTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function provideValues()
    {
        return [
            ['a', 0],
            ['1', 1],
            ['3', 3],
            ['this-is-a-test', 0],
            ['4', 4],
            [8, 8]
        ];
    }

    /**
     * @param mixed $value
     * @param int $expected
     *
     * @dataProvider provideValues
     */
    public function testConstructionCastsToInteger($value, $expected)
    {
        $identifier = Identifier::fromString($value);

        $this->assertEquals($expected, $identifier->getValue());
    }
}
