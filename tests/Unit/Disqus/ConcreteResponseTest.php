<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus;

use DreadLabs\VantomasWebsite\Tests\Fixture\Disqus\DummyResponse;

/**
 * ConcreteResponseTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ConcreteResponseTest extends \PHPUnit_Framework_TestCase
{

    protected $validContent = '';

    protected $invalidContent = '';

    public function setUp()
    {
        $this->validContent = file_get_contents(
            dirname(__FILE__) . '/../../Fixture/Disqus/ValidResponseContent.json'
        );

        $this->invalidContent = file_get_contents(
            dirname(__FILE__) . '/../../Fixture/Disqus/InvalidResponseContent.json'
        );
    }

    public function testContentReturnsAnInstanceOfStdClass()
    {
        $response = new DummyResponse();

        $response->setContent(json_decode($this->validContent));

        $content = $response->getContent();

        $this->assertInstanceOf('stdClass', $content, 'AbstractResponse::getContent() returns a stdClass instance.');
    }

    public function testContentThrowsAnExceptionIfResponseContainsAnError()
    {
        $this->setExpectedException(
            'DreadLabs\\VantomasWebsite\\Disqus\\Response\\Exception',
            'This is an example erroneous response message.'
        );

        $response = new DummyResponse();

        $response->setContent(json_decode($this->invalidContent));

        $response->getContent();
    }
}
