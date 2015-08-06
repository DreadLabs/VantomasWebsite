<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Archive;

use DreadLabs\VantomasWebsite\Archive\Date;

/**
 * DateTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DateTest extends \PHPUnit_Framework_TestCase
{

    public function testItLeavesTheValueUnchanged()
    {
        $wrappedDate = new \DateTime('1981-02-17 14:15:16');
        $sut = new Date($wrappedDate);

        $this->assertSame($wrappedDate, $sut->getValue());
    }
}
