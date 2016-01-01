<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Event;

use DreadLabs\VantomasWebsite\CodeSnippet\BrushInterface;
use DreadLabs\VantomasWebsite\Event\RegisterCodeSnippetBrush;

/**
 * RegisterCodeSnippetBrushTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class RegisterCodeSnippetBrushTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BrushInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $brushMock;

    public function setUp()
    {
        $this->brushMock = $this->getMock(BrushInterface::class);
    }

    public function testItAddsExactlyOneBrushToTheArgumentStack()
    {
        $sut = RegisterCodeSnippetBrush::fromBrush($this->brushMock);

        $arguments = $sut->getArguments();
        $this->assertCount(1, $arguments);

        $brushMock = array_shift($arguments);
        $this->assertSame($this->brushMock, $brushMock);
    }

    public function testItReturnsAProperLabel()
    {
        $sut = RegisterCodeSnippetBrush::fromBrush($this->brushMock);

        $this->assertEquals('RegisterCodeSnippetBrush', $sut->getLabel());
    }
}
