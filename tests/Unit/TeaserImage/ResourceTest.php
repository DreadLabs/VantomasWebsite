<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\TeaserImage;

use DreadLabs\VantomasWebsite\TeaserImage;

/**
 * ResourceTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ResourceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function provideInvalidDatatypes()
    {
        return [
            'integer' => [1],
            'float' => [3.14],
            'boolean' => [true],
            'null' => [null],
            'array' => [[]],
            'object' => [new \stdClass()],
            'empty string' => [''],
            'whitespace only string' => [' '],
        ];
    }

    /**
     * @param mixed $invalidDatatype
     *
     * @dataProvider provideInvalidDatatypes
     */
    public function testItThrowsInvalidArgumentExceptionIfInvalidDatatypeIsGiven($invalidDatatype)
    {
        $this->setExpectedException(
            \InvalidArgumentException::class,
            'The given public URL is no valid teaser image resource.',
            1453748046211
        );

        TeaserImage\Resource::createFromPublicUrl($invalidDatatype);
    }

    /**
     * @return array
     */
    public function provideMalformedUrls()
    {
        return [
            ['x://::abc/?'],
            ['http:///blah.com'],
            ['http://:80'],
        ];
    }

    /**
     * @param string $malformedUrl
     *
     * @dataProvider provideMalformedUrls
     */
    public function testItThowsInvalidArgumentExceptionIfMalformedUrlIsGiven($malformedUrl)
    {
        $this->setExpectedException(
            \InvalidArgumentException::class,
            'The given public URL of the teaser image resource is malformed.',
            1453748765907
        );

        TeaserImage\Resource::createFromPublicUrl($malformedUrl);
    }

    /**
     * @return array
     */
    public function provideUrls()
    {
        return [
            'http_url' => ['http://www.example.org/foo/bar/image.jpg', '/foo/bar/image.jpg'],
            'https_url' => ['https://www.foo.bar/bla/blubb.png', '/bla/blubb.png'],
            'ftp_url' => ['ftp://foo.com/bar/blubb.gif', '/bar/blubb.gif'],
            'relative' => ['foo/bar/blah.jpeg', 'foo/bar/blah.jpeg'],
            'relative_leading_slash' => ['/foo/blubb.jpg', '/foo/blubb.jpg'],
        ];
    }

    /**
     * @param string $publicUrl
     * @param string $expectedValue
     *
     * @dataProvider provideUrls
     */
    public function testItReturnsThePathPartOfUrls($publicUrl, $expectedValue)
    {
        $resource = TeaserImage\Resource::createFromPublicUrl($publicUrl);

        $this->assertSame($expectedValue, $resource->getValue());
    }
}
