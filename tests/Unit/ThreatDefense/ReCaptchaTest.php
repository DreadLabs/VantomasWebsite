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

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\NetHttpAdapter\Response;
use DreadLabs\VantomasWebsite\ThreatDefense\ReCaptcha;
use DreadLabs\VantomasWebsite\ThreatDefense\ReCaptchaResponse;

/**
 * ReCaptchaTest
 *
 * @author Thomas Juhnke <dev@van-tomas.de>
 */
class ReCaptchaTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ClientInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    private $client;

    /**
     * @var ReCaptcha
     */
    private $control;

    public function setUp()
    {
        $this->client = $this->getMock(ClientInterface::class);
        $this->control = new ReCaptcha('some-secret-value', $this->client);
    }

    public function testItPostsTheSecretAndTheDataValueWithTheClientToTheApi()
    {
        $response = $this->getMock(Response::class, [], [], '', false);

        $this->getClientPostInvocation()->with(
            $this->isType('string'),
            $this->equalTo(
                [
                    'secret' => 'some-secret-value',
                    'response' => 'lorem-ipsum',
                ]
            )
        )->will($this->returnValue($response));

        $data = ReCaptchaResponse::fromString('lorem-ipsum');
        $this->control->isThreat($data);
    }

    private function getClientPostInvocation()
    {
        return $this->client->expects($this->once())->method('post');
    }

    public function testItReturnsTrueIfResponseIsUnsuccessful()
    {
        $response = $this->getMock(Response::class, [], [], '', false);
        $response->expects($this->once())->method('isSuccess')->will($this->returnValue(false));

        $this->getClientPostInvocation()->will($this->returnValue($response));

        $data = ReCaptchaResponse::fromString('foo-bar');
        $isThreat = $this->control->isThreat($data);

        $this->assertTrue($isThreat);
    }

    public function testItReturnsTrueIfDecodedResponseIsNull()
    {
        $response = $this->getMock(Response::class, [], [], '', false);
        $response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $response->expects($this->once())->method('getBody')->will($this->returnValue('null'));

        $this->getClientPostInvocation()->will($this->returnValue($response));

        $data = ReCaptchaResponse::fromString('hello-world');
        $isThreat = $this->control->isThreat($data);

        $this->assertTrue($isThreat);
    }

    public function provideFalsySuccessProperties()
    {
        return [
            'false' => ['{ "success": false }'],
            'zero' => ['{ "success": 0 }'],
            'empty string' => ['{ "success": "" }'],
            'null' => ['{ "success": null }'],
        ];
    }

    /**
     * @param mixed $falsySuccessProperty
     *
     * @dataProvider provideFalsySuccessProperties
     */
    public function testItReturnsTrueIfDecodedResponseContainsFalsySuccessProperty($falsySuccessProperty)
    {
        $response = $this->getMock(Response::class, [], [], '', false);
        $response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $response->expects($this->once())->method('getBody')->will($this->returnValue($falsySuccessProperty));

        $this->getClientPostInvocation()->will($this->returnValue($response));

        $data = ReCaptchaResponse::fromString('foo-lipsum');
        $isThreat = $this->control->isThreat($data);

        $this->assertTrue($isThreat);
    }

    public function provideTruthySuccessProperties()
    {
        return [
            'true' => ['{ "success": true }'],
            'true-string' => ['{ "success": "true" }'],
            'one' => ['{ "success": 1 }'],
            'one-string' => ['{ "success": "1" }'],
            'non-empty string' => ['{ "success": "test" }'],
        ];
    }

    /**
     * @param mixed $truthySuccessProperty
     *
     * @dataProvider provideTruthySuccessProperties
     */
    public function testItReturnsFalseIfDecodedResponseContainsTruthySuccessProperty($truthySuccessProperty)
    {
        $response = $this->getMock(Response::class, [], [], '', false);
        $response->expects($this->once())->method('isSuccess')->will($this->returnValue(true));
        $response->expects($this->once())->method('getBody')->will($this->returnValue($truthySuccessProperty));

        $this->getClientPostInvocation()->will($this->returnValue($response));

        $data = ReCaptchaResponse::fromString('bar-lorem');
        $isThreat = $this->control->isThreat($data);

        $this->assertFalse($isThreat);
    }
}
