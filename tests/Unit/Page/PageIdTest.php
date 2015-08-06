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

use DreadLabs\VantomasWebsite\Page\PageId;

/**
 * PageIdTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageIdTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructionCastsToInteger()
    {
        $pageId = new PageId('a');
        $this->assertEquals(0, $pageId->getValue());

        $pageId = new PageId('1');
        $this->assertEquals(1, $pageId->getValue());

        $pageId = new PageId(3);
        $this->assertEquals(3, $pageId->getValue());
    }

    public function testNamedConstructionCastsToInteger()
    {
        $pageId = PageId::fromString('this-is-a-test');
        $this->assertEquals(0, $pageId->getValue());

        $pageId = PageId::fromString('4');
        $this->assertEquals(4, $pageId->getValue());

        $pageId = PageId::fromString(8);
        $this->assertEquals(8, $pageId->getValue());
    }
}
