<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Archive;

use DreadLabs\VantomasWebsite\Archive\DateRange;

class DateRangeTest extends \PHPUnit_Framework_TestCase
{

    public function testNamedConstructorReturnsTheDesiredRange()
    {
        $startDate = new \DateTime('2015-04-01 00:00:00');
        $endDate = new \DateTime('2015-05-01 00:00:00');

        $sut = DateRange::fromMonthAndYear(4, 2015);

        $this->assertEquals($startDate, $sut->getStartDate());
        $this->assertEquals($endDate, $sut->getEndDate());
    }

}
