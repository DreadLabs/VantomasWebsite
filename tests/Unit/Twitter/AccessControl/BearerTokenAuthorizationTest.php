<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Twitter\AccessControl;

use DreadLabs\VantomasWebsite\Http\ClientInterface;
use DreadLabs\VantomasWebsite\Http\ResponseInterface;
use DreadLabs\VantomasWebsite\Tests\Fixture\Twitter\DummyResponse;
use DreadLabs\VantomasWebsite\Tests\Unit\Http\DummyClient;
use DreadLabs\VantomasWebsite\Tests\Unit\Twitter\DummyCache;
use DreadLabs\VantomasWebsite\Tests\Unit\Twitter\DummyConfiguration;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\Authorization\BearerToken;
use DreadLabs\VantomasWebsite\Twitter\AccessControl\Exception\AuthorizationFailedException;
use DreadLabs\VantomasWebsite\Twitter\CacheInterface;
use DreadLabs\VantomasWebsite\Twitter\ConfigurationInterface;

class BearerTokenAuthorizationTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ClientInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $clientMock;

    /**
     * @var ConfigurationInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $configurationMock;

    /**
     * @var CacheInterface|\PHPUnit_Framework_MockObject_MockObject
     */
    protected $cacheMock;

    /**
     * @var BearerToken
     */
    protected $sut;

    public function setUp()
    {
        $this->clientMock = $this->getMock(DummyClient::class);
        $this->configurationMock = $this->getMock(DummyConfiguration::class);
        $this->cacheMock = $this->getMock(DummyCache::class);
    }

    public function testOnConstructionTheCredentialsAreSetByAskingTheConfiguration()
    {
        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerKey')
            ->will($this->returnValue('consumer-key'));
        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerSecret')
            ->will($this->returnValue('consumer-secret'));

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );
    }

    public function testAuthorizationRequestSetsTheUserAgentOnClient()
    {
        $this->configurationMock
            ->expects($this->once())
            ->method('getUserAgent')
            ->will($this->returnValue('Foo/Bar v1.0'));

        $this->clientMock
            ->expects($this->once())
            ->method('setUserAgent')
            ->with($this->equalTo('Foo/Bar v1.0'));

        $this->cacheMock
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(true));

        $this->cacheMock
            ->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    file_get_contents(__DIR__ . '/../../../Fixture/Twitter/DummyToken.json')
                )
            );

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );

        $authorizationMock = $this
            ->getMockBuilder(DummyAuthentication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut->authorize($authorizationMock);
    }

    public function testAuthorizationSetsSpecificContentTypeHeader()
    {
        $this->clientMock
            ->expects($this->at(1))
            ->method('setHeader')
            ->with($this->equalTo('Content-Type'), $this->equalTo('application/x-www-form-urlencoded;charset=UTF-8'));

        $this->cacheMock
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(true));

        $this->cacheMock
            ->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    file_get_contents(__DIR__ . '/../../../Fixture/Twitter/DummyToken.json')
                )
            );

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );

        $authorizationMock = $this
            ->getMockBuilder(DummyAuthentication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut->authorize($authorizationMock);
    }

    public function testAuthorizationSetsTheAuthorizationHeader()
    {
        $credentialsChecksum = base64_encode('consumer-key:consumer-secret');

        $this->clientMock
            ->expects($this->at(2))
            ->method('setHeader')
            ->with($this->equalTo('Authorization'), $this->equalTo('Basic ' . $credentialsChecksum));

        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerKey')
            ->will($this->returnValue('consumer-key'));
        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerSecret')
            ->will($this->returnValue('consumer-secret'));

        $this->cacheMock
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(true));

        $this->cacheMock
            ->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    file_get_contents(__DIR__ . '/../../../Fixture/Twitter/DummyToken.json')
                )
            );

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );

        $authorizationMock = $this
            ->getMockBuilder(DummyAuthentication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut->authorize($authorizationMock);
    }

    public function testIfTokenCacheIsEmptyARemoteTokenFetchingThrowsAnErrorOnUnsuccessfulClientResponse()
    {
        $this->setExpectedException(AuthorizationFailedException::class);

        $this->cacheMock
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(false));

        $responseMock = $this->getMock(ResponseInterface::class);
        $responseMock
            ->expects($this->once())
            ->method('getStatusCode')
            ->will($this->returnValue(403));

        $this->clientMock
            ->expects($this->once())
            ->method('post')
            ->will($this->returnValue($responseMock));

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );

        $authorizationMock = $this
            ->getMockBuilder(DummyAuthentication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut->authorize($authorizationMock);
    }

    public function testSuccessfulFetchingOfRemoteTokenWillStoreItInTheCache()
    {
        $responseMock = $this
            ->getMockBuilder(DummyResponse::class)
            ->setMethods(null)
            ->getMock();

        $this->clientMock
            ->expects($this->once())
            ->method('post')
            ->will($this->returnValue($responseMock));

        $credentialChecksum = md5(base64_encode('consumer-key:consumer-secret'));

        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerKey')
            ->will($this->returnValue('consumer-key'));
        $this->configurationMock
            ->expects($this->once())
            ->method('getConsumerSecret')
            ->will($this->returnValue('consumer-secret'));
        $this->configurationMock
            ->expects($this->once())
            ->method('getBearerCacheLifetime')
            ->will($this->returnValue(3600));

        $this->cacheMock
            ->expects($this->once())
            ->method('has')
            ->will($this->returnValue(false));
        $this->cacheMock
            ->expects($this->once())
            ->method('get')
            ->will(
                $this->returnValue(
                    file_get_contents(__DIR__ . '/../../../Fixture/Twitter/DummyToken.json')
                )
            );

        $this->sut = new BearerToken(
            $this->clientMock,
            $this->configurationMock,
            $this->cacheMock
        );

        $this->cacheMock
            ->expects($this->once())
            ->method('set')
            ->with(
                $this->equalTo($credentialChecksum),
                $this->equalTo('{"access_token":"foo-bar","token_type":"bearer"}'),
                $this->equalTo(array('ident_twitter_bearer')),
                $this->equalTo(3600)
            );

        $authorizationMock = $this
            ->getMockBuilder(DummyAuthentication::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sut->authorize($authorizationMock);
    }
}
