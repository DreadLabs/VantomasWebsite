<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\Disqus\Response;

use DreadLabs\VantomasWebsite\Disqus\Response\Json;

/**
 * JsonTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class JsonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Json
     */
    protected $sut;

    public function setUp()
    {
        $this->sut = new Json();
    }

    public function testJsonResponseGetsDecoded()
    {
        $json = file_get_contents(__DIR__ . '/../../../Fixture/Disqus/DummyResponse.json');
        $this->sut->setContent($json);
        $content = $this->sut->getContent();

        $this->assertInstanceOf('stdClass', $content);
    }
}
