<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus\Resource;

use DreadLabs\VantomasWebsite\Disqus\Resource\ResolverPatternProvider;

/**
 * ResolverPatternProviderTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ResolverPatternProviderTest extends \PHPUnit_Framework_TestCase
{

    public function testItReturnsTheDefaultNamespacePattern()
    {
        $patternProvider = new ResolverPatternProvider();
        $pattern = $patternProvider->getPattern();

        $this->assertSame('DreadLabs\\VantomasWebsite\\Disqus\\Resource\\%s\\%s', $pattern);
    }
}
