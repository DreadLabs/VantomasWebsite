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

use DreadLabs\VantomasWebsite\CodeSnippet\SyntaxHighlighterBrush;

/**
 * SyntaxHighlighterBrushTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SyntaxHighlighterBrushTest extends \PHPUnit_Framework_TestCase
{

    public function testItSetsTheAliasToTheIncomingIdentifierOrAliasValue()
    {
        $sut = SyntaxHighlighterBrush::fromIdentifierOrAlias('foo');

        $this->assertEquals('foo', $sut->alias);
    }

    public function testItUsesPlainAsIdentifierIfAliasIsNotInMap()
    {
        $sut = SyntaxHighlighterBrush::fromIdentifierOrAlias('bar');

        $this->assertEquals('Plain', $sut->identifier);
    }

    public function testItUsesAKnownIdentifierIfFoundInMap()
    {
        $sut = SyntaxHighlighterBrush::fromIdentifierOrAlias('json');

        $this->assertEquals('json', $sut->alias);
        $this->assertEquals('JScript', $sut->identifier);
    }
}
