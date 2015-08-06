<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\Authentication\BearerToken;

/**
 * BearerTokenAuthenticationTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class BearerTokenAuthenticationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BearerToken
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new BearerToken();
    }

    public function testIsAuthenticatedIsFalseIfNoAuthenticationAttributesWereSet()
    {
        $this->assertFalse($this->sut->isAuthenticated());
    }

    public function testIsAuthenticatedIsTrueIfAtLeastOneAuthenticationAttributeWasSet()
    {
        $this->sut->addAttribute('token-foo');
        $this->assertTrue($this->sut->isAuthenticated());
    }

    public function testStringRepresentationReturnsConcatenatedAttributes()
    {
        $this->sut->addAttribute('token-foo');
        $this->sut->addAttribute('token-bar');
        $this->assertSame('token-footoken-bar', $this->sut->toString());
    }
}
