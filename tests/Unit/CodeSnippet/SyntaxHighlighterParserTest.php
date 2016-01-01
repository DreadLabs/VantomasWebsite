<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\CodeSnippet;

use DreadLabs\VantomasWebsite\CodeSnippet\SyntaxHighlighterParser;
use DreadLabs\VantomasWebsite\Event\ContextInterface;
use DreadLabs\VantomasWebsite\Event\RegisterCodeSnippetBrush;
use DreadLabs\VantomasWebsite\Tests\Fixture\Event\EventContextDummy;

/**
 * SyntaxHighlighterParserTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SyntaxHighlighterParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ContextInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $eventContextMock;

    public function setUp()
    {
        $this->eventContextMock = $this->getMock(EventContextDummy::class);
    }

    public function testItRemovesNullValues()
    {
        $fixture = [
            'collapse' => null,
            'gutter' => true,
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertNotContains('collapse:', $actual);
        $this->assertContains('gutter:', $actual);
    }

    public function testItRemovesInvalidKeys()
    {
        $fixture = [
            'foo' => 'bar',
            'lorem' => null,
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertNotContains('foo:', $actual);
        $this->assertNotContains('lorem:', $actual);
    }

    public function testItEnsuresADefaultBrush()
    {
        $fixture = [
            'collapse' => null,
            'gutter' => null,
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertContains('brush: plain', $actual);
    }

    public function testItDispatchesARegisterCodeSnippetBrushEvent()
    {
        $this->eventContextMock
            ->expects($this->once())
            ->method('dispatch')
            ->with($this->isInstanceOf(RegisterCodeSnippetBrush::class));

        $fixture = [];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $sut->toStringFromYaml($fixture);
    }

    public function testItFormatsParameterValuePairsAccordingToDefaultFormat()
    {
        $fixture = [
            'collapse' => true,
            'gutter' => false,
            'tab-size' => 8,
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertContains('collapse: true', $actual);
        $this->assertContains('gutter: false', $actual);
        $this->assertContains('tab-size: 8', $actual);
    }

    public function testItFormatsParameterValueParisDifferentlyIfAFormatExists()
    {
        $fixture = [
            'collapse' => false,
            'highlight' => '1,2,8-11'
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertContains('highlight: [1,2,8-11]', $actual);
    }

    public function itFormatsParametersAccordingToTheDocumentation()
    {
        $fixture = [
            'brush' => 'javascript',
            'collapse' => false,
            'gutter' => null,
            'highlight' => '3,5,7',
        ];

        $sut = new SyntaxHighlighterParser($this->eventContextMock);
        $actual = $sut->toStringFromYaml($fixture);

        $this->assertEquals('brush: javascript; collapse: false; highlight: [3,5,7]', $actual);
    }
}
