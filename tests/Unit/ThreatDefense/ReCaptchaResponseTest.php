<?php

/*
 * This file is part of the VantomasWebsite package.
 *
 * (c) Thomas Juhnke <dev@van-tomas.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DreadLabs\VantomasWebsite\Tests\Unit\ThreatDefense;

use DreadLabs\VantomasWebsite\ThreatDefense\ReCaptchaResponse;

/**
 * ReCaptchaResponseTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ReCaptchaResponseTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @return array
     */
    public function provideInvalidData()
    {
        return [
            'numeric array' => [[0, 1, 2]],
            'associative array' => [['foo' => 'bar', 'lorem' => 'ipsum']],
            'boolean' => [false],
            'object' => [new \stdClass()],
            'null' => [null],
            'integer' => [42],
            'float' => [3.14],
        ];
    }

    /**
     * @param mixed $data
     *
     * @dataProvider provideInvalidData
     */
    public function testItThrowsInvalidArgumentExceptionIfNoStringIsPassedInNamedConstructor($data)
    {
        $this->setExpectedException(\InvalidArgumentException::class);

        ReCaptchaResponse::fromString($data);
    }

    /**
     * @return array
     */
    public function provideValidData()
    {
        return [
            'simple string' => ['foo-bar', 'foo-bar'],
            'leading whitespace' => [' lorem-ipsum', 'lorem-ipsum'],
            'trailing whitespace' => ['hello-world ', 'hello-world'],
            'strip low' => [chr(10) . 'foobar', 'foobar'],
            'strip high' => ['click here »', 'click here'],
            'do not encode single quotes' => ['\'Hi\'', '\'Hi\''],
            'do not encode double quotes' => ['"Hello"', '"Hello"'],
            'do not encode amperesand' => ['Itchy & Scratchy', 'Itchy & Scratchy'],
            'strips tags' => ['<a>Click here</a>', 'Click here'],
        ];
    }

    /**
     * @param string $input
     * @param string $output
     *
     * @dataProvider provideValidData
     */
    public function testItAcceptsStringsAndReturnsThemTrimmedAndSanitized($input, $output)
    {
        $response = ReCaptchaResponse::fromString($input);

        $this->assertEquals($output, $response->getValue());
    }
}
