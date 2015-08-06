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

use DreadLabs\VantomasWebsite\Page\PageType;

/**
 * PageTypeTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class PageTypeTest extends \PHPUnit_Framework_TestCase
{

    public function testConstructionCastsToInteger()
    {
        $pageType = new PageType('a');
        $this->assertEquals(0, $pageType->getValue());

        $pageType = new PageType('1');
        $this->assertEquals(1, $pageType->getValue());

        $pageType = new PageType(3);
        $this->assertEquals(3, $pageType->getValue());
    }

    public function testNamedConstructionCastsToInteger()
    {
        $pageType = PageType::fromString('this-is-a-test');
        $this->assertEquals(0, $pageType->getValue());

        $pageType = PageType::fromString('4');
        $this->assertEquals(4, $pageType->getValue());

        $pageType = PageType::fromString(8);
        $this->assertEquals(8, $pageType->getValue());
    }
}
