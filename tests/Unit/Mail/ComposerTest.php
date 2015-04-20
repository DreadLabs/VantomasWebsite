<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\Composer;
use DreadLabs\VantomasWebsite\Mail\ConfigurationInterface;
use DreadLabs\VantomasWebsite\Mail\ConveyableInterface;
use DreadLabs\VantomasWebsite\Mail\Message\ViewInterface;
use DreadLabs\VantomasWebsite\Mail\MessageInterface;
use DreadLabs\VantomasWebsite\Tests\Unit\Mail\Message\ViewDummy;

class ComposerTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ConfigurationInterface
     */
    protected $configurationMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|MessageInterface
     */
    protected $messageMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ViewInterface
     */
    protected $viewMock;

    /**
     * @var \PHPUnit_Framework_MockObject_MockObject|ConveyableInterface
     */
    protected $conveyableMock;

    public function setUp()
    {
        $this->configurationMock = $this->getMock(ConfigurationDummy::class);
        $this->messageMock = $this->getMock(MessageDummy::class);
        $this->viewMock = $this->getMock(ViewDummy::class);
        $this->conveyableMock =  $this->getMock(ConveyableDummy::class);
    }

    public function testConfigurationIsInitializedForConveyable()
    {
        $this->configurationMock
            ->expects($this->once())
            ->method('initializeFor')
            ->with($this->equalTo($this->conveyableMock));

        $sut = new Composer($this->configurationMock, $this->messageMock, $this->viewMock);
        $sut->compose($this->conveyableMock);
    }

    public function testConfigurationConfiguresView()
    {
        $this->configurationMock
            ->expects($this->once())
            ->method('configureView')
            ->with($this->equalTo($this->viewMock));

        $sut = new Composer($this->configurationMock, $this->messageMock, $this->viewMock);
        $sut->compose($this->conveyableMock);
    }

    public function testConfigurationConfiguresMessage()
    {
        $this->configurationMock
            ->expects($this->once())
            ->method('configureMessage')
            ->with($this->equalTo($this->messageMock));

        $sut = new Composer($this->configurationMock, $this->messageMock, $this->viewMock);
        $sut->compose($this->conveyableMock);
    }

    public function testConveyableIsQueriedForViewData()
    {
        $this->conveyableMock
            ->expects($this->once())
            ->method('setMailMessageViewData')
            ->with($this->equalTo($this->viewMock));

        $sut = new Composer($this->configurationMock, $this->messageMock, $this->viewMock);
        $sut->compose($this->conveyableMock);
    }

    public function testMessageIsRenderedByView()
    {
        $this->viewMock
            ->expects($this->once())
            ->method('render')
            ->with($this->equalTo($this->messageMock));

        $sut = new Composer($this->configurationMock, $this->messageMock, $this->viewMock);
        $sut->compose($this->conveyableMock);
    }
}
