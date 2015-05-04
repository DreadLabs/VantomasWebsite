<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Twitter\AccessControl\Authentication\BearerToken;

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
