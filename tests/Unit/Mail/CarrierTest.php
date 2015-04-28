<?php
namespace DreadLabs\VantomasWebsite\Tests\Unit\Mail;

use DreadLabs\VantomasWebsite\Mail\Carrier;
use DreadLabs\VantomasWebsite\Mail\Exception\FailedRecipientsException;

class CarrierTest extends \PHPUnit_Framework_TestCase
{

    public function testFailedRecipientsExceptionIsCatchedAndForwardedToLogger()
    {
        /*
        $this->setExpectedException(
            FailedRecipientsException::class,
            'One or more recipients were not accepted for delivery.',
            1425333667
        );
        */

        $messageMock = $this->getMock(MessageDummy::class);
        $messageMock->expects($this->once())->method('send')->willThrowException(new FailedRecipientsException());

        $composerMock = $this->getMock(ComposerExceptionDummy::class);
        $composerMock->expects($this->once())->method('compose')->willReturn($messageMock);

        $loggerMock = $this->getMock(LoggerDummy::class);
        $loggerMock->expects($this->once())->method('alert');

        $sut = new Carrier($composerMock, $loggerMock);

        $conveyableMock = $this->getMock(ConveyableDummy::class);

        $sut->convey($conveyableMock);
    }
}
