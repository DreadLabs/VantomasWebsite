<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter;

use DreadLabs\VantomasWebsite\Twitter\SimpleEntityParser;

/**
 * SimpleEntityParserTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class SimpleEntityParserTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SimpleEntityParser
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new SimpleEntityParser();
    }

    public function testParserSupportsUrls()
    {
        $rawTweet = json_decode(file_get_contents(__DIR__ . '/DummyTweet.json'));

        $this->sut->setEntities($rawTweet->entities);
        $tweet = $this->sut->parseUrls($rawTweet->dummyTweetWithUrls);

        $this->assertContains('<a href="http://www.example.org/">http://www.example.org/</a>', $tweet);
        $this->assertContains('<a href="http://www.twitter.com/">http://www.twitter.com/</a>', $tweet);
    }

    public function testParserSupportsHashtags()
    {
        $rawTweet = json_decode(file_get_contents(__DIR__ . '/DummyTweet.json'));

        $this->sut->setEntities($rawTweet->entities);
        $tweet = $this->sut->parseHashTags($rawTweet->dummyTweetWithHashtags);

        $this->assertContains('<a href="https://twitter.com/search?q=%23foo&src=hash">#foo</a>', $tweet);
        $this->assertContains('<a href="https://twitter.com/search?q=%23bar&src=hash">#bar</a>', $tweet);
    }
}
