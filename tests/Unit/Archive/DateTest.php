<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Archive;

use DreadLabs\VantomasWebsite\Archive\Date;

class DateTest extends \PHPUnit_Framework_TestCase
{

    public function testArchiveDateValueIsSameAsInputValue()
    {
        $wrappedDate = new \DateTime('1981-02-17 14:15:16');
        $sut = new Date($wrappedDate);

        $this->assertSame($wrappedDate, $sut->getValue());
    }

}
