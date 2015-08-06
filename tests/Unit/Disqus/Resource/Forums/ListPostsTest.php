<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus\Resource\Forums;

use DreadLabs\VantomasWebsite\Disqus\Resource\Forums\ListPosts;

/**
 * ListPostsTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ListPostsTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ListPosts
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new ListPosts();
    }

    public function testForumParameterIsSetToStringRepresentation()
    {
        $parameters = array(
            'forum' => 1,
        );
        $this->assertContains('forum=1', $this->sut->getPath($parameters));
        $parameters = array(
            'forum' => 'my-disqus-forum',
        );
        $this->assertContains('forum=my-disqus-forum', $this->sut->getPath($parameters));
    }

    public function testSinceOnlyAcceptsIntegerParameterValues()
    {
        $parameters = array(
            'since' => 'foo',
        );
        $this->assertNotContains('since=', $this->sut->getPath($parameters));
        $parameters = array(
            'since' => '124-foo',
        );
        $this->assertNotContains('since=', $this->sut->getPath($parameters));
        $parameters = array(
            'since' => '1430571791',
        );
        $this->assertNotContains('since=', $this->sut->getPath($parameters));
        $parameters = array(
            'since' => 1430571813,
        );
        $this->assertContains('since=1430571813', $this->sut->getPath($parameters));
    }

    public function testRelatedOnlyAcceptsNonEmptyArrays()
    {
        $parameters = array(
            'related' => array(),
        );
        $this->assertNotContains('related=', $this->sut->getPath($parameters));
        $parameters = array(
            'related' => array(
                'foo',
                'bar',
            ),
        );
        $this->assertContains('related=foo', $this->sut->getPath($parameters));
        $this->assertContains('related=bar', $this->sut->getPath($parameters));
    }

    public function testCursorAcceptsAnyNonNullValue()
    {
        $parameters = array(
            'cursor' => null,
        );
        $this->assertNotContains('cursor=', $this->sut->getPath($parameters));
        $parameters = array(
            'cursor' => 'foo',
        );
        $this->assertContains('cursor=foo', $this->sut->getPath($parameters));
        $parameters = array(
            'cursor' => -12
        );
        $this->assertContains('cursor=-12', $this->sut->getPath($parameters));
        $parameters = array(
            'cursor' => false,
        );
        $this->assertContains('cursor=', $this->sut->getPath($parameters));
    }

    public function testLimitOnlyAcceptsNumericValuesAndDefaultsTo25()
    {
        $parameters = array(
            'limit' => 'foo',
        );
        $this->assertContains('limit=25', $this->sut->getPath($parameters));
        $parameters = array(
            'limit' => '123-bar',
        );
        $this->assertContains('limit=25', $this->sut->getPath($parameters));
        $parameters = array(
            'limit' => 'foo-456',
        );
        $this->assertContains('limit=25', $this->sut->getPath($parameters));
        $parameters = array(
            'limit' => '123',
        );
        $this->assertContains('limit=123', $this->sut->getPath($parameters));
        $parameters = array(
            'limit' => 456,
        );
        $this->assertContains('limit=456', $this->sut->getPath($parameters));
    }

    public function testQueryAcceptsNonNullValuesOnly()
    {
        $parameters = array(
            'query' => null,
        );
        $this->assertRegExp('/.*?query=(&|\?)?.*?$/', $this->sut->getPath($parameters));
        $parameters = array(
            'query' => true,
        );
        $this->assertRegExp('/.*?query=1(&|\?)?.*?$/', $this->sut->getPath($parameters));
    }

    public function testIncludeAcceptsNonEmptyArraysOnlyAndDefaultsToApprovedPostsOnly()
    {
        $parameters = array(
            'include' => array(),
        );
        $this->assertContains('include=approved', $this->sut->getPath($parameters));
        $parameters = array(
            'include' => array(
                'lorem',
                'ipsum',
            ),
        );
        $this->assertContains('include=lorem', $this->sut->getPath($parameters));
        $this->assertContains('include=ipsum', $this->sut->getPath($parameters));
    }

    public function testOrderUsesGivenValueAndDefaultsToDescending()
    {
        $parameters = array();
        $this->assertContains('order=desc', $this->sut->getPath($parameters));
        $parameters = array(
            'order' => 'asc',
        );
        $this->assertContains('order=asc', $this->sut->getPath($parameters));
        $parameters = array(
            'order' => 'foo',
        );
        $this->assertContains('order=foo', $this->sut->getPath($parameters));
    }
}
