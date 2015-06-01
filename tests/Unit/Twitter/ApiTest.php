<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter;

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\ResponseInterface;
use DreadLabs\VantomasWebsite\Tests\Unit\Http\DummyClient;
use DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl\DummyAuthentication;
use DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl\DummyAuthorization;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthenticationInterface;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\AuthorizationInterface;
use DreadLabs\VantomasWebsite\Twitter\Api;
use DreadLabs\VantomasWebsite\Twitter\ApiInterface;
use DreadLabs\VantomasWebsite\Twitter\ConfigurationInterface;
use Exception;

class ApiTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var AuthenticationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $authenticationMock;

    /**
     * @var AuthorizationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $authorizationMock;

    /**
     * @var ConfigurationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $configurationMock;

    /**
     * @var ClientInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $clientMock;

    /**
     * @var ApiInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $sut;

    public function setUp()
    {
        $this->authenticationMock = $this->getMock(DummyAuthentication::class);
        $this->authorizationMock = $this->getMock(DummyAuthorization::class);
        $this->configurationMock = $this->getMock(DummyConfiguration::class);
        $this->clientMock = $this->getMock(DummyClient::class);

        $this->sut = new Api(
            $this->authenticationMock,
            $this->authorizationMock,
            $this->configurationMock,
            $this->clientMock
        );
    }

    public function testClientErrorWillRaiseAnException()
    {
        $this->setExpectedException(Exception::class);

        $responseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $responseMock->expects($this->once())->method('getStatusCode')->will($this->returnValue(403));

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($responseMock));

        $this->sut->getSearchResult();
    }

    public function testNotBeingAuthenticatedWillQueryAuthorizationProcess()
    {
        $this->authenticationMock
            ->expects($this->once())
            ->method('isAuthenticated')
            ->will($this->returnValue(false));

        $responseMock = $this->getMock(ResponseInterface::class);
        $responseMock
            ->expects($this->once())
            ->method('getStatusCode')
            ->will($this->returnValue(200));

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($responseMock));

        $this->sut->getTimeline();
    }

    public function testQueryingTheApiWillBuildAHttpQueryStringWithGivenParameters()
    {
        $this->authenticationMock
            ->expects($this->once())
            ->method('isAuthenticated')
            ->will($this->returnValue(true));

        $responseMock = $this->getMockBuilder(ResponseInterface::class)->getMock();
        $responseMock
            ->expects($this->once())
            ->method('getStatusCode')
            ->will($this->returnValue(200));

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->will($this->returnValue($responseMock));

        $this->clientMock
            ->expects($this->once())
            ->method('get')
            ->with(
                $this->stringContains('foo=bar&bar=foo')
            );

        $this->sut->addParameter('foo', 'bar');
        $this->sut->addParameter('bar', 'foo');

        $this->sut->getTimeline();
    }
}
