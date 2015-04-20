<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Media;

use DreadLabs\VantomasWebsite\Media\Identifier;

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
