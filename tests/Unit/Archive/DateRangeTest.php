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

use DreadLabs\VantomasWebsite\Archive\DateRange;

/**
 * DateRangeTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class DateRangeTest extends \PHPUnit_Framework_TestCase
{

    public function testItReturnsTheDesiredRangeOnConstruction()
    {
        $startDate = new \DateTime('2015-04-01 00:00:00');
        $endDate = new \DateTime('2015-05-01 00:00:00');

        $sut = DateRange::fromMonthAndYear(4, 2015);

        $this->assertEquals($startDate, $sut->getStartDate());
        $this->assertEquals($endDate, $sut->getEndDate());
    }
}
